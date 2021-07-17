<?php

namespace App\Http\Controllers\Intranet\Funcionarios;

use App\Models\PQR\PQR;
use App\Mail\SD_Prorroga;
use App\Mail\RespuestaPQR;
use App\Mail\SD_Respuesta;
use App\Models\PQR\Estado;
use Illuminate\Http\Request;
use App\Models\PQR\Prioridad;
use App\Models\PQR\Respuesta;
use App\Http\Controllers\Controller;
use App\Mail\SD_RespuestaReposicion;
use Illuminate\Support\Facades\Mail;
use App\Mail\SD_ConstanciaAclaracion;
use Illuminate\Support\Facades\Config;
use App\Mail\AclaracionComplementacion;
use App\Mail\SD_AclaracionComplementacion;
use App\Models\SolicitudDatos\SolicitudDatos;
use App\Http\Controllers\Fechas\FechasController;
use App\Models\SolicitudDatos\SolicitudDatosRecurso;
use App\Models\SolicitudDatos\SolicitudDatosRespuesta;
use App\Models\SolicitudDatos\SolicitudDatosSolicitud;
use App\Models\SolicitudDatos\SolicitudDatosAclaracion;
use App\Models\SolicitudDatos\SolicitudDatosDocRecurso;
use App\Models\SolicitudDatos\SolicitudDatosRespRecurso;
use App\Models\SolicitudDatos\SolicitudDatosDocRespuesta;
use App\Models\SolicitudDatos\SolicitudDatosDocRespRecurso;
use App\Models\SolicitudDatos\SolicitudDatosAclaracionAnexos;

class SolicitudDatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gestionar($id)
    {
        $solicitudDatos = PQR::findOrFail($id);
        $estadoPrioridad = Prioridad::all();
        return view('intranet.funcionarios.solicitud_dat.gestion', compact('solicitudDatos', 'estadoPrioridad'));
    }

    public function gestionar_guardar(Request $request)
    {
        $pqrEstadoPrioridad['prioridad_id'] = $request['prioridad'];
        SolicitudDatos::findOrFail($request['id_pqr'])->update($pqrEstadoPrioridad);
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
            // dd($request->all());
            SolicitudDatosSolicitud::findOrFail($request["id_peticion$i"])->update($actualizarPeticion);
            $contadorAclaraciones += $request["totalPeticionAclaraciones$i"];
            for ($j = $iteradorAclaraciones; $j < $contadorAclaraciones; $j++) {
                if ($request["solicitud_aclaracion$j"] != null) {
                    $nuevaAclaracion['solicituddatossolicitudes_id'] = $request["id_peticion$i"];
                    $nuevaAclaracion['fecha'] = date("Y-m-d");
                    $nuevaAclaracion['tipo_solicitud'] = $request["tipo_aclaracion$j"];
                    $nuevaAclaracion['aclaracion'] = $request["solicitud_aclaracion$j"];
                    $aclaracionNew = SolicitudDatosAclaracion::create($nuevaAclaracion);
                    $peticion_act = SolicitudDatosSolicitud::findOrfail($request["id_peticion$i"]);
                    if ($peticion_act->solicitud->persona_id != null) {
                        $email = $peticion_act->solicitud->persona->email;
                    } else {
                        $email = $peticion_act->solicitud->empresa->email;
                    }
                    $id_aclaracion = $aclaracionNew->id;
                    Mail::to($email)->send(new SD_AclaracionComplementacion($id_aclaracion));
                }
            }
            $contadorAnexos += $request["totalPeticionAnexos$i"];
            if ($request["respuesta$i"]) {
                $respuesta['solicituddatossolicitudes_id'] = $request["id_peticion$i"];
                $respuesta['fecha'] = date("Y-m-d");
                $respuesta['respuesta'] = $request["respuesta$i"];
                $respuestaPQR = SolicitudDatosRespuesta::create($respuesta);
                //----------------------------------------------------------------------
                if ($respuestaPQR->peticion->solicitud->persona_id != null) {
                    $email = $respuestaPQR->peticion->solicitud->persona->email;
                } else {
                    $email = $respuestaPQR->peticion->solicitud->empresa->email;
                }
                $id_pqr = $respuestaPQR->peticion->solicitud->id;
                Mail::to($email)->send(new SD_Respuesta($id_pqr));
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
                        $nuevo_documento['respuesta_soli_datos_id'] = $respuestaPQR["id"];
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
                        $doc = SolicitudDatosDocRespuesta::create($nuevo_documento);
                    }
                }
            }
            $iteradorAclaraciones += $request["totalPeticionAclaraciones$i"];
            $iteradorAnexos += $request["totalPeticionAnexos$i"];
        }
        $peticiones = SolicitudDatosSolicitud::all()->where('solicituddatos_id', $request["id_pqr"]);
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
            $aclaraciones = SolicitudDatosAclaracion::all()->where('solicituddatossolicitudes_id', $peticion["id"]);
            $totalAclaracionesRes += sizeof($aclaraciones);
            foreach ($aclaraciones as $key => $aclaracion) {
                if ($aclaracion->respuesta) {
                    $respuestaAclaraciones[] = $aclaracion;
                }
            }
        }
        if ($request["plazo_recurso"] && $request["recurso"] == 1) {
            $pqrFechaLimiteRecurso = SolicitudDatos::findOrFail($request['id_pqr']);
            $nuevoLimite = $pqrFechaLimiteRecurso->prorroga_dias + $pqrFechaLimiteRecurso->tipoPqr->tiempos + $request["plazo_recurso"];
            $respuestaDias = FechasController::festivos($nuevoLimite, $pqrFechaLimiteRecurso['fecha_generacion']);
            $actualizarPqr['tiempo_limite'] = $respuestaDias;
            SolicitudDatos::findOrFail($request['id_pqr'])->update($actualizarPqr);
        }
        if (sizeOf($peticiones) == sizeOf($respuestasPeticiones)) {
            if ($recurso && sizeOf($totalRecursos) == 0) {
                $estado = Estado::findOrFail(7);
                $pqrEstado['estadospqr_id'] = $estado['id'];
                SolicitudDatos::findOrFail($request['id_pqr'])->update($pqrEstado);
            } elseif($recurso == 0) {
                $estado = Estado::findOrFail(6);
                $pqrEstado['estadospqr_id'] = $estado['id'];
                SolicitudDatos::findOrFail($request['id_pqr'])->update($pqrEstado);
            }
        } elseif (sizeOf($respuestaAclaraciones) != $totalAclaracionesRes && $recurso == 0) {
            $estado = Estado::findOrFail(5);
            $pqrEstado['estadospqr_id'] = $estado['id'];
            SolicitudDatos::findOrFail($request['id_pqr'])->update($pqrEstado);
        } elseif (sizeOf($respuestasPeticiones)) {
            $estado = Estado::findOrFail(2);
            $pqrEstado['estadospqr_id'] = $estado['id'];
            SolicitudDatos::findOrFail($request['id_pqr'])->update($pqrEstado);
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
                SolicitudDatosAclaracion::findOrFail($request["id_aclaracion$i"])->update($aclaracion);
                $aclaracionNew = SolicitudDatosAclaracion::findOrFail($request["id_aclaracion$i"]);
                //----------------------------------------------------------------------
                $peticion_act = SolicitudDatosSolicitud::findOrfail($request["id_solicitud$i"]);
                if ($peticion_act->solicitud->persona_id != null) {
                    $email = $peticion_act->solicitud->persona->email;
                } else {
                    $email = $peticion_act->solicitud->empresa->email;
                }
                $id_aclaracion = $aclaracionNew->id;
                Mail::to($email)->send(new SD_ConstanciaAclaracion($id_aclaracion));
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
                        $nuevo_documento['aclaracion_soli_datos_id'] = $request["id_aclaracion$i"];
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
                        SolicitudDatosAclaracionAnexos::create($nuevo_documento);
                    }
                }
                $iteradorAnexos += $request["totalanexos$i"];
            }
        }
        $peticiones = SolicitudDatosSolicitud::all()->where('solicituddatos_id', $request["id_pqr"]);
        $respuestaAclaraciones = [];
        $totalPeticionesRes = 0;
        $totalAclaracionesRes = 0;
        $recurso = 0;
        $totalRecursos = [];
        foreach ($peticiones as $key => $peticion) {
            if($peticion->respuesta){
                $totalPeticionesRes ++;
            }
            $aclaraciones = SolicitudDatosAclaracion::all()->where('solicituddatossolicitudes_id', $peticion["id"]);
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
            $estado = Estado::findOrFail(2);
            $pqrEstado['estadospqr_id'] = $estado['id'];
            SolicitudDatos::findOrFail($request['id_pqr'])->update($pqrEstado);
        }
        return redirect('/usuario/listado');
    }

    public function prorroga_guardar(Request $request)
    {
        if ($request->ajax()) {
            $pqr = SolicitudDatos::findOrfail($request['idPqr']);
            $validacionProrroga = SolicitudDatos::findOrFail($request['idPqr']);
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
                    $respuestaProrroga = SolicitudDatos::findOrFail($request['idPqr'])->update($actualizarPqr);
                    //---------------------------------------------------------------------------
                    if ($pqr->persona_id != null) {
                        $email = $pqr->persona->email;
                    } else {
                        $email = $pqr->empresa->email;
                    }
                    $id_pqr = $pqr->id;
                    Mail::to($email)->send(new SD_Prorroga($id_pqr));
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
            $nuevoRecurso['solicituddatossolicitudes_id'] = $request['peticion_id'];
            $nuevoRecurso['tipo_reposicion_id'] = $request['tipo_reposicion_id'];
            $nuevoRecurso['fecha_radicacion'] = date("Y-m-d");
            $nuevoRecurso['recurso'] = $request['recurso'];
            $respuestaRecurso = SolicitudDatosRecurso::create($nuevoRecurso);
            //---------------------------------------------------------------------------
            // if ($respuestaRecurso->peticion->pqr->persona_id != null) {
            //     $email = $respuestaRecurso->peticion->pqr->persona->email;
            // } else {
            //     $email = $respuestaRecurso->peticion->pqr->empresa->email;
            // }
            // $id_recurso = $respuestaRecurso->id;
            // Mail::to($email)->send(new RespuestaReposicion($id_recurso));
            $estado = Estado::findOrFail(8);
            $pqrEstado['estadospqr_id'] = $estado['id'];
            SolicitudDatos::findOrFail($request['id'])->update($pqrEstado);

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
                $nuevo_documento['recursos_soli_datos_id'] = $request["recurso_id"];
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
                $respuesta = SolicitudDatosDocRecurso::create($nuevo_documento);
            }

            return response()->json(['mensaje' => 'ok', 'data' => $respuesta]);
        } else {
            abort(404);
        }
    }

    public function respuesta_recurso_guardar(Request $request)
    {
        if ($request->ajax()) {
            $nuevoRecurso['recursos_soli_datos_id'] = $request['recurso_id'];
            $nuevoRecurso['fecha'] = date("Y-m-d");
            $nuevoRecurso['respuesta'] = 'respuesta';
            $respuestaRecurso = SolicitudDatosRespRecurso::create($nuevoRecurso);
            $peticiones = SolicitudDatosSolicitud::all()->where('solicituddatos_id', $request['id']);
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
                    SolicitudDatos::findOrFail($request['id'])->update($pqrEstado);
                }
                else{
                    if($request['tipo_reposicion_id'] == 1){
                        $estado = Estado::findOrFail(9);
                        $pqrEstado['estadospqr_id'] = $estado['id'];
                        SolicitudDatos::findOrFail($request['id'])->update($pqrEstado);
                    }elseif($recursototal == $recursoRespuestaTotal && $recursototal > 1){
                        $estado = Estado::findOrFail(10);
                        $pqrEstado['estadospqr_id'] = $estado['id'];
                        SolicitudDatos::findOrFail($request['id'])->update($pqrEstado);
                    }else{
                        $estado = Estado::findOrFail(8);
                        $pqrEstado['estadospqr_id'] = $estado['id'];
                        SolicitudDatos::findOrFail($request['id'])->update($pqrEstado);
                    }
                }
            }else {
                if($recursototal == $recursoRespuestaTotal && $validacionCierre == $contadorValidacion){
                    $estado = Estado::findOrFail(10);
                    $pqrEstado['estadospqr_id'] = $estado['id'];
                    SolicitudDatos::findOrFail($request['id'])->update($pqrEstado);
                }elseif($recursototal == $recursoRespuestaTotal){
                    $estado = Estado::findOrFail(9);
                    $pqrEstado['estadospqr_id'] = $estado['id'];
                    SolicitudDatos::findOrFail($request['id'])->update($pqrEstado);
                }
            }
            $solicitud = SolicitudDatos::findOrFail($request['id']);
            if ($solicitud->persona_id != null) {
                $email = $solicitud->persona->email;
            } else {
                $email = $solicitud->empresa->email;
            }
            $id_recurso = $respuestaRecurso->id;
            Mail::to($email)->send(new SD_RespuestaReposicion($id_recurso));
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
                $nuevo_documento['resprecursos_soli_datos_id'] = $request["resprecursos_id"];
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
                $respuesta = SolicitudDatosDocRespRecurso::create($nuevo_documento);
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
