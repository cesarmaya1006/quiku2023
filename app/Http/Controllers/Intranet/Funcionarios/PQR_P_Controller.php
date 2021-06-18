<?php

namespace App\Http\Controllers\Intranet\Funcionarios;

use App\Models\PQR\PQR;
use App\Models\PQR\Estado;
use App\Models\PQR\Peticion;
use Illuminate\Http\Request;
use App\Models\PQR\Respuesta;
use App\Models\PQR\Aclaracion;
use App\Models\PQR\DocRespuesta;
use App\Http\Controllers\Controller;
use App\Models\PQR\AclaracionAnexos;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\Fechas\FechasController;
use App\Mail\AclaracionComplementacion;
use App\Mail\ConstanciaAclaracion;
use App\Mail\Prorroga;
use App\Mail\Recurso_mail;
use App\Mail\RespuestaPQR;
use App\Mail\RespuestaReposicion;
use App\Models\PQR\DocRecurso;
use App\Models\PQR\DocRespRecurso;
use App\Models\PQR\Prioridad;
use App\Models\PQR\Recurso;
use App\Models\PQR\RespRecurso;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Concerns\ToArray;

class PQR_P_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gestionar($id)
    {
        $pqr = PQR::findOrFail($id);
        $estadoPrioridad = Prioridad::all();

        return view('intranet.funcionarios.pqr_p.gestion', compact('pqr', 'estadoPrioridad'));
    }

    public function gestionar_guardar(Request $request)
    {
        $pqrEstadoPrioridad['prioridad_id'] = $request['prioridad'];
        PQR::findOrFail($request['id_pqr'])->update($pqrEstadoPrioridad);
        $documentos = $request->allFiles();
        $totalPeticiones = $request['totalPeticiones'];
        $contadorAclaraciones = 0;
        $iteradorAclaraciones = 0;
        $contadorAnexos = 0;
        $iteradorAnexos = 0;
        for ($i = 0; $i < $totalPeticiones; $i++) {
            $actualizarPeticion['aclaracion'] = $request["aclaracion_check$i"];
            if ($request["recurso"] == 1) {
                if ($request["plazo_recurso"] != null) {
                    $actualizarPeticion['recurso'] = $request["recurso"];
                    $actualizarPeticion['recurso_dias'] = $request["plazo_recurso"];
                    $actualizarPeticion['fecha_notificacion'] = date('Y-m-d');
                }
            }
            Peticion::findOrFail($request["id_peticion$i"])->update($actualizarPeticion);
            $contadorAclaraciones += $request["totalPeticionAclaraciones$i"];
            for ($j = $iteradorAclaraciones; $j < $contadorAclaraciones; $j++) {
                if ($request["solicitud_aclaracion$j"] != null) {
                    $nuevaAclaracion['peticion_id'] = $request["id_peticion$i"];
                    $nuevaAclaracion['fecha'] = date("Y-m-d");
                    $nuevaAclaracion['tipo_solicitud'] = $request["tipo_aclaracion$j"];
                    $nuevaAclaracion['aclaracion'] = $request["solicitud_aclaracion$j"];
                    $aclaracionNew = Aclaracion::create($nuevaAclaracion);
                    $peticion_act = Peticion::findOrfail($request["id_peticion$i"]);
                    if ($peticion_act->pqr->persona_id != null) {
                        $email = $peticion_act->pqr->persona->email;
                    } else {
                        $email = $peticion_act->pqr->empresa->email;
                    }
                    $id_aclaracion = $aclaracionNew->id;
                    Mail::to($email)->send(new AclaracionComplementacion($id_aclaracion));
                }
            }
            $contadorAnexos += $request["totalPeticionAnexos$i"];
            if ($request["respuesta$i"]) {
                $respuesta['peticion_id'] = $request["id_peticion$i"];
                $respuesta['fecha'] = date("Y-m-d");
                $respuesta['respuesta'] = $request["respuesta$i"];
                $respuestaPQR = Respuesta::create($respuesta);
                //----------------------------------------------------------------------
                if ($respuestaPQR->peticion->pqr->persona_id != null) {
                    $email = $respuestaPQR->peticion->pqr->persona->email;
                } else {
                    $email = $respuestaPQR->peticion->pqr->empresa->email;
                }
                $id_pqr = $respuestaPQR->peticion->pqr->id;
                Mail::to($email)->send(new RespuestaPQR($id_pqr));
                //----------------------------------------------------------------------
                for ($k = $iteradorAnexos; $k < $contadorAnexos; $k++) {
                    if ($request->hasFile("documentos$k")) {
                        $ruta = Config::get('constantes.folder_doc_respuestas');
                        $ruta = trim($ruta);
                        $doc_subido = $documentos["documentos$k"];
                        $tamaño = $doc_subido->getSize();
                        if ($tamaño > 0) {
                            $tamaño = $tamaño / 1000;
                        }
                        $nombre_doc = time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName()));
                        $nuevo_documento['respuesta_id'] = $respuestaPQR["id"];
                        $nuevo_documento['titulo'] = $request["titulo$k"];
                        if ($request["descripcion$k"]) {
                            $nuevo_documento['descripcion'] = $request["descripcion$k"];
                        } else {
                            $nuevo_documento['descripcion'] = '';
                        }
                        $nuevo_documento['extension'] = $doc_subido->getClientOriginalExtension();
                        $nuevo_documento['peso'] = $tamaño;
                        $nuevo_documento['url'] = $nombre_doc;
                        $doc_subido->move($ruta, $nombre_doc);
                        $doc = DocRespuesta::create($nuevo_documento);
                    }
                }
            }
            $iteradorAclaraciones += $request["totalPeticionAclaraciones$i"];
            $iteradorAnexos += $request["totalPeticionAnexos$i"];
        }
        $peticiones = Peticion::all()->where('pqr_id', $request["id_pqr"]);
        $respuestasPeticiones = [];
        $totalAclaracionesRes = 0;
        $respuestaAclaraciones = [];
        $recurso = 0;
        $totalRecursos = [];
        foreach ($peticiones as $key => $peticion) {
            if ($peticion->respuesta) {
                $respuestasPeticiones[] = $peticion->respuesta;
            }
            if ($peticion->recurso != 0) {
                $recurso = $peticion->recurso;
                if(!empty($peticion->recursos)){
                    if(sizeOf($peticion->recursos)){
                        $totalRecursos [] = $peticion->recursos;
                    }
                }
            }
            $aclaraciones = Aclaracion::all()->where('peticion_id', $peticion["id"]);
            $totalAclaracionesRes += sizeof($aclaraciones);
            foreach ($aclaraciones as $key => $aclaracion) {
                if ($aclaracion->respuesta) {
                    $respuestaAclaraciones[] = $aclaracion;
                }
            }
        }
        if ($request["plazo_recurso"] && $request["recurso"] == 1) {
            $pqrFechaLimiteRecurso = PQR::findOrFail($request['id_pqr']);
            $nuevoLimite = $pqrFechaLimiteRecurso->prorroga_dias + $pqrFechaLimiteRecurso->tipoPqr->tiempos + $request["plazo_recurso"];
            $respuestaDias = FechasController::festivos($nuevoLimite, $pqrFechaLimiteRecurso['fecha_generacion']);
            $actualizarPqr['tiempo_limite'] = $respuestaDias;
            PQR::findOrFail($request['id_pqr'])->update($actualizarPqr);
        }

        if (sizeOf($peticiones) == sizeOf($respuestasPeticiones)) {
            if ($recurso && sizeOf($totalRecursos) == 0) {
                $estado = Estado::findOrFail(7);
                $pqrEstado['estadospqr_id'] = $estado['id'];
                PQR::findOrFail($request['id_pqr'])->update($pqrEstado);
            } elseif($recurso == 0) {
                $estado = Estado::findOrFail(6);
                $pqrEstado['estadospqr_id'] = $estado['id'];
                PQR::findOrFail($request['id_pqr'])->update($pqrEstado);
            }
        } elseif (sizeOf($respuestaAclaraciones) != $totalAclaracionesRes && $recurso == 0) {
            $estado = Estado::findOrFail(5);
            $pqrEstado['estadospqr_id'] = $estado['id'];
            PQR::findOrFail($request['id_pqr'])->update($pqrEstado);
        } elseif (sizeOf($respuestasPeticiones)) {
            $estado = Estado::findOrFail(2);
            $pqrEstado['estadospqr_id'] = $estado['id'];
            PQR::findOrFail($request['id_pqr'])->update($pqrEstado);
        }
        return redirect('/funcionario/listado');
    }


    public function gestionar_guardar_usuario(Request $request)
    {
        $contadorAnexos = 0;
        $iteradorAnexos = 0;
        $documentos = $request->allFiles();
        for ($i = 0; $i < $request['totalGeneralaclaraciones']; $i++) {
            if ($request["aclaracionRespuesta$i"]) {
                $aclaracion['respuesta'] = $request["aclaracionRespuesta$i"];
                $aclaracion['fecha_respuesta'] = date("Y-m-d");
                Aclaracion::findOrFail($request["id_aclaracion$i"])->update($aclaracion);
                $aclaracionNew = Aclaracion::findOrFail($request["id_aclaracion$i"]);
                //----------------------------------------------------------------------
                $peticion_act = Peticion::findOrfail($request["id_peticion$i"]);
                if ($peticion_act->pqr->persona_id != null) {
                    $email = $peticion_act->pqr->persona->email;
                } else {
                    $email = $peticion_act->pqr->empresa->email;
                }
                $id_aclaracion = $aclaracionNew->id;
                Mail::to($email)->send(new ConstanciaAclaracion($id_aclaracion));
                //----------------------------------------------------------------------
                $contadorAnexos += $request["totalanexos$i"];
                for ($k = $iteradorAnexos; $k < $contadorAnexos; $k++) {
                    if ($request->hasFile("documentos$k")) {
                        $ruta = Config::get('constantes.folder_doc_respuestas');
                        $ruta = trim($ruta);
                        $doc_subido = $documentos["documentos$k"];
                        $tamaño = $doc_subido->getSize();
                        if ($tamaño > 0) {
                            $tamaño = $tamaño / 1000;
                        }
                        $nombre_doc = time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName()));
                        $nuevo_documento['aclaracion_id'] = $request["id_aclaracion$i"];
                        $nuevo_documento['titulo'] = $request["titulo$k"];
                        if ($request["descripcion$k"]) {
                            $nuevo_documento['descripcion'] = $request["descripcion$k"];
                        } else {
                            $nuevo_documento['descripcion'] = '';
                        }
                        $nuevo_documento['extension'] = $doc_subido->getClientOriginalExtension();
                        $nuevo_documento['peso'] = $tamaño;
                        $nuevo_documento['url'] = $nombre_doc;
                        $doc_subido->move($ruta, $nombre_doc);
                        AclaracionAnexos::create($nuevo_documento);
                    }
                }
                $iteradorAnexos += $request["totalanexos$i"];
            }
        }
        $peticiones = Peticion::all()->where('pqr_id', $request["id_pqr"]);
        $respuestaAclaraciones = [];
        $totalPeticionesRes = 0;
        $totalAclaracionesRes = 0;
        $recurso = 0;
        $totalRecursos = [];
        foreach ($peticiones as $key => $peticion) {
            if($peticion->respuesta){
                $totalPeticionesRes ++;
            }
            $aclaraciones = Aclaracion::all()->where('peticion_id', $peticion["id"]);
            $totalAclaracionesRes += sizeof($aclaraciones);
            foreach ($aclaraciones as $key => $aclaracion) {
                if ($aclaracion->respuesta) {
                    $respuestaAclaraciones[] = $aclaracion;
                }
            }
            if ($peticion->recurso != 0) {
                $totalRecursos [] = $peticion->recursos;
                $recurso = $peticion->recurso;
            }
        }
        if (sizeOf($respuestaAclaraciones) == $totalAclaracionesRes && $totalAclaracionesRes > 0 && $recurso == 0 && $totalPeticionesRes != sizeOf($peticiones->toArray()) ) {
            $modeloAclaracion = Aclaracion::with('peticion')->whereHas('peticion', function ($peticiones) {
                        $peticiones->with('pqr')->where('id', request('id_pqr'));
                    })->get();
            $fechaIncial = $modeloAclaracion->min('fecha');
            $fechaFinal = $modeloAclaracion->max('fecha_respuesta');
            $diasAclaracion = (strtotime($fechaIncial)-strtotime($fechaFinal))/86400;
            $diasAclaracion = abs($diasAclaracion);
            $pqr = PQR::findOrfail($request['id_pqr']);
            $nuevoLimite = $pqr->tipoPqr->tiempos + $request['plazo_prorroga'] + $request['plazoRecurso'] + $diasAclaracion;
            $respuestaDias = FechasController::festivos($nuevoLimite, $pqr['fecha_generacion']);
            $estado = Estado::findOrFail(2);
            $pqrEstado['estadospqr_id'] = $estado['id'];
            $pqrEstado['tiempo_limite'] = $respuestaDias;
            PQR::findOrFail($request['id_pqr'])->update($pqrEstado);
        }
        return redirect('/usuario/listado');
    }

    public function prorroga_guardar(Request $request)
    {
        if ($request->ajax()) {
            $pqr = PQR::findOrfail($request['idPqr']);
            $validacionProrroga = PQR::findOrFail($request['idPqr']);
            if (isset($request['prorroga'])) {
                if ($validacionProrroga->prorroga == 0 && $request['plazo_prorroga'] != null && $request['prorroga_pdf'] != null) {
                    $actualizarPqr['prorroga'] = $request['prorroga'];
                    $actualizarPqr['prorroga_dias'] = $request['plazo_prorroga'];
                    $actualizarPqr['prorroga_pdf'] = $request['prorroga_pdf'];
                    $nuevoLimite = $pqr->tipoPqr->tiempos + $request['plazo_prorroga'] + $request['plazoRecurso'];
                    $respuestaDias = FechasController::festivos($nuevoLimite, $pqr['fecha_generacion']);
                    $actualizarPqr['tiempo_limite'] = $respuestaDias;
                    if($pqr['estadospqr_id'] <= 1){
                        $estado = Estado::findOrFail(2);
                        $actualizarPqr['estadospqr_id'] = $estado['id'];
                    }
                    $respuestaProrroga = PQR::findOrFail($request['idPqr'])->update($actualizarPqr);
                    //---------------------------------------------------------------------------
                    if ($pqr->persona_id != null) {
                        $email = $pqr->persona->email;
                    } else {
                        $email = $pqr->empresa->email;
                    }
                    $id_pqr = $pqr->id;
                    Mail::to($email)->send(new Prorroga($id_pqr));
                    //---------------------------------------------------------------------------
                }
            }
            return response()->json(['mensaje' => 'ok', 'data' => $respuestaProrroga]);
        } else {
            abort(404);
        }
    }


    public function recurso_guardar(Request $request)
    {
        if ($request->ajax()) {
            $nuevoRecurso['peticion_id'] = $request['peticion_id'];
            $nuevoRecurso['tipo_reposicion_id'] = $request['tipo_reposicion_id'];
            $nuevoRecurso['fecha_radicacion'] = date("Y-m-d");
            $nuevoRecurso['recurso'] = $request['recurso'];
            $respuestaRecurso = Recurso::create($nuevoRecurso);
            //---------------------------------------------------------------------------
            if ($respuestaRecurso->peticion->pqr->persona_id != null) {
                $email = $respuestaRecurso->peticion->pqr->persona->email;
            } else {
                $email = $respuestaRecurso->peticion->pqr->empresa->email;
            }
            $id_recurso = $respuestaRecurso->id;
            Mail::to($email)->send(new RespuestaReposicion($id_recurso));
            $estado = Estado::findOrFail(8);
            $pqrEstado['estadospqr_id'] = $estado['id'];
            PQR::findOrFail($request['id'])->update($pqrEstado);

            return response()->json(['mensaje' => 'ok', 'data' => $respuestaRecurso]);
        } else {
            abort(404);
        }
    }

    public function recurso_anexos_guardar(Request $request)
    {
        if ($request->ajax()) {
            $documentos = $request->allFiles();
            if ($request->hasFile('archivo')) {
                $ruta = Config::get('constantes.folder_doc_respuestas');
                $ruta = trim($ruta);
                $doc_subido = $documentos["archivo"];
                $tamaño = $doc_subido->getSize();
                if ($tamaño > 0) {
                    $tamaño = $tamaño / 1000;
                }
                $nombre_doc = time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName()));
                $nuevo_documento['recurso_id'] = $request["recurso_id"];
                $nuevo_documento['titulo'] = $request["titulo"];
                if ($request["descripcion"]) {
                    $nuevo_documento['descripcion'] = $request["descripcion"];
                } else {
                    $nuevo_documento['descripcion'] = '';
                }
                $nuevo_documento['extension'] = $doc_subido->getClientOriginalExtension();
                $nuevo_documento['peso'] = $tamaño;
                $nuevo_documento['url'] = $nombre_doc;
                $doc_subido->move($ruta, $nombre_doc);
                $respuesta = DocRecurso::create($nuevo_documento);
            }

            return response()->json(['mensaje' => 'ok', 'data' => $respuesta]);
        } else {
            abort(404);
        }
    }

    public function respuesta_recurso_guardar(Request $request)
    {
        if ($request->ajax()) {
            $nuevoRecurso['recurso_id'] = $request['recurso_id'];
            $nuevoRecurso['fecha'] = date("Y-m-d");
            $nuevoRecurso['respuesta'] = 'respuesta';
            $respuestaRecurso = RespRecurso::create($nuevoRecurso);
            $peticiones = Peticion::all()->where('pqr_id', $request['id']);
            $recursototal = 0;
            $recursoRespuestaTotal = 0;
            $contadorValidacion = sizeof($peticiones);
            $validacionCierre = 0;
            foreach ($peticiones as $peticion) {
                if ($peticion->recurso != 0) {
                    if($peticion->recursos){
                        if($peticion->recursos->count() > 1){
                            $recursosTotal = 0; 
                            $recursosRespuestasTotal = 0; 
                            foreach ($peticion->recursos as $recurso) {
                                $recursosTotal ++; 
                                if($recurso->respuestarecurso){
                                    $recursosRespuestasTotal ++; 
                                }
                            }
                            if($recursosTotal == $recursosRespuestasTotal){
                                $validacionCierre ++;
                            }

                        }elseif($peticion->recursos->count() == 1){
                            foreach ($peticion->recursos as $recurso) {
                                if($recurso->tipo_reposicion_id > 1 && $recurso->respuestarecurso ){
                                    $validacionCierre ++;
                                }
                            }
                        }
                    }

                    foreach ($peticion->recursos as $recurso) {  
                        $recursototal++;
                        if ($recurso->respuestarecurso) {
                            $recursoRespuestaTotal++;
                        }
                    }

                }
            }
            if($contadorValidacion == 1 ){
                if($recursototal > 1 && $recursototal == $recursoRespuestaTotal) {
                    $estado = Estado::findOrFail(10);
                    $pqrEstado['estadospqr_id'] = $estado['id'];
                    PQR::findOrFail($request['id'])->update($pqrEstado);
                }
                else{
                    $validadorif[] = $request['tipo_reposicion_id'];
                    if($request['tipo_reposicion_id'] == 1){
                        $estado = Estado::findOrFail(9);
                        $pqrEstado['estadospqr_id'] = $estado['id'];
                        PQR::findOrFail($request['id'])->update($pqrEstado);
                    }elseif($recursototal == $recursoRespuestaTotal && $recursototal > 1){
                        $estado = Estado::findOrFail(10);
                        $pqrEstado['estadospqr_id'] = $estado['id'];
                        PQR::findOrFail($request['id'])->update($pqrEstado);
                    }else{
                        $estado = Estado::findOrFail(8);
                        $pqrEstado['estadospqr_id'] = $estado['id'];
                        PQR::findOrFail($request['id'])->update($pqrEstado);
                    }
                }
            }else {
                if($recursototal == $recursoRespuestaTotal && $validacionCierre == $contadorValidacion){
                    $estado = Estado::findOrFail(10);
                    $pqrEstado['estadospqr_id'] = $estado['id'];
                    PQR::findOrFail($request['id'])->update($pqrEstado);
                }elseif($recursototal == $recursoRespuestaTotal){
                    $estado = Estado::findOrFail(9);
                    $pqrEstado['estadospqr_id'] = $estado['id'];
                    PQR::findOrFail($request['id'])->update($pqrEstado);
                }
            }
            return response()->json(['mensaje' => 'ok', 'data' => $respuestaRecurso]);
        } else {
            abort(404);
        }
    }

    public function respuesta_recurso_anexos_guardar(Request $request)
    {
        if ($request->ajax()) {
            $documentos = $request->allFiles();
            if ($request->hasFile('archivo')) {
                $ruta = Config::get('constantes.folder_doc_respuestas');
                $ruta = trim($ruta);
                $doc_subido = $documentos["archivo"];
                $tamaño = $doc_subido->getSize();
                if ($tamaño > 0) {
                    $tamaño = $tamaño / 1000;
                }
                $nombre_doc = time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName()));
                $nuevo_documento['resprecursos_id'] = $request["resprecursos_id"];
                $nuevo_documento['titulo'] = $request["titulo"];
                if ($request["descripcion"]) {
                    $nuevo_documento['descripcion'] = $request["descripcion"];
                } else {
                    $nuevo_documento['descripcion'] = '';
                }
                $nuevo_documento['extension'] = $doc_subido->getClientOriginalExtension();
                $nuevo_documento['peso'] = $tamaño;
                $nuevo_documento['url'] = $nombre_doc;
                $doc_subido->move($ruta, $nombre_doc);
                $respuesta = DocRespRecurso::create($nuevo_documento);
            }

            return response()->json(['mensaje' => 'ok', 'data' => $respuesta]);
        } else {
            abort(404);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
