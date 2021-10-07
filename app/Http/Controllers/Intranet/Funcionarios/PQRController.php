<?php

namespace App\Http\Controllers\Intranet\Funcionarios;

use App\Mail\Prorroga;
use App\Models\PQR\PQR;
use App\Models\PQR\Tarea;
use App\Mail\RespuestaPQR;
use App\Models\PQR\Estado;
use App\Models\Admin\Cargo;
use App\Models\PQR\Recurso;
use App\Models\PQR\Peticion;
use App\Models\PQR\PqrAnexo;
use Illuminate\Http\Request;
use App\Models\PQR\Prioridad;
use App\Models\PQR\Respuesta;
use App\Models\PQR\Aclaracion;
use App\Models\PQR\DocRecurso;
use App\Models\PQR\RespRecurso;
use App\Models\Empresas\Empresa;
use App\Models\Personas\Persona;
use App\Models\PQR\DocRespuesta;
use App\Mail\RespuestaReposicion;
use App\Mail\ConstanciaAclaracion;
use App\Models\Empleados\Empleado;
use App\Models\PQR\DocRespRecurso;
use App\Models\PQR\HistorialTarea;
use App\Models\PQR\TipoReposicion;
use App\Models\PQR\AsignacionTarea;
use App\Http\Controllers\Controller;
use App\Models\PQR\AclaracionAnexos;
use App\Models\PQR\AsignacionEstado;
use App\Models\PQR\EstadoAsignacion;
use Illuminate\Support\Facades\Mail;
use App\Models\PQR\HistorialPeticion;
use Illuminate\Support\Facades\Config;
use App\Mail\AclaracionComplementacion;
use App\Models\PQR\HistorialAsignacion;
use App\Models\PQR\AsignacionParticular;
use App\Http\Controllers\Fechas\FechasController;
use App\Models\PQR\Resuelve;

class PQRController extends Controller
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
        $estados = AsignacionEstado::all();
        return view('intranet.funcionarios.pqr.gestion', compact('pqr', 'estadoPrioridad', 'estados'));
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
                if($email){
                    Mail::to($email)->send(new ConstanciaAclaracion($id_aclaracion));
                }
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
            if ($peticion->respuesta) {
                $totalPeticionesRes++;
            }
            $aclaraciones = Aclaracion::all()->where('peticion_id', $peticion["id"]);
            $totalAclaracionesRes += sizeof($aclaraciones);
            foreach ($aclaraciones as $key => $aclaracion) {
                if ($aclaracion->respuesta) {
                    $respuestaAclaraciones[] = $aclaracion;
                }
            }
            if ($peticion->recurso != 0) {
                $totalRecursos[] = $peticion->recursos;
                $recurso = $peticion->recurso;
            }
        }
        if (sizeOf($respuestaAclaraciones) == $totalAclaracionesRes && $totalAclaracionesRes > 0 && $recurso == 0 && $totalPeticionesRes != sizeOf($peticiones->toArray())) {
            $estado = Estado::findOrFail(2);
            $pqrEstado['estadospqr_id'] = $estado['id'];
            PQR::findOrFail($request['id_pqr'])->update($pqrEstado);
        }
        return redirect('/usuario/listado');
    }

    public function aclaracion_guardar(Request $request)
    {
        if ($request->ajax()) {

            $nuevaAclaracion['peticion_id'] = $request["id_peticion"];
            $nuevaAclaracion['fecha'] = date("Y-m-d");
            $nuevaAclaracion['tipo_solicitud'] = $request["tipoAclaracion"];
            $nuevaAclaracion['aclaracion'] = $request["solicitudAclaracion"];
            $aclaracionNew = Aclaracion::create($nuevaAclaracion);
            $peticion_act = Peticion::findOrfail($request["id_peticion"]);
            $pqr = PQR::findOrfail($peticion_act->pqr_id);
            if($pqr->estadospqr_id <= 5){
                $pqrEstado['estadospqr_id'] = 5; 
                PQR::findOrFail($pqr->id)->update($pqrEstado);
            }
            if ($peticion_act->pqr->persona_id != null) {
                $email = $peticion_act->pqr->persona->email;
            } else {
                $email = $peticion_act->pqr->empresa->email;
            }
            $id_aclaracion = $aclaracionNew->id;
            if($email){
                Mail::to($email)->send(new AclaracionComplementacion($id_aclaracion));
            }
            return response()->json(['mensaje' => 'ok', 'data' => $aclaracionNew]);
        } else {
            abort(404);
        }
    }

    public function aclaracion_usuario_guardar(Request $request)
    {
        if ($request->ajax()) {
            $aclaracion['respuesta'] = $request["respuesta"];
            $aclaracion['fecha_respuesta'] = date("Y-m-d");
            Aclaracion::findOrFail($request["id_aclaracion"])->update($aclaracion);
            $aclaracionNew = Aclaracion::findOrFail($request["id_aclaracion"]);
            $peticion = Peticion::findOrfail($aclaracionNew["peticion_id"]);
            $pqr = PQR::findOrfail($peticion["pqr_id"]);
            $peticiones = $pqr->peticiones;
            $validacionEstadoPQR = 0;
            foreach ($peticiones as $peticion) {
                $cantPet = $peticion->aclaraciones->where('respuesta', null);
                if(sizeOf($cantPet)){
                    $validacionEstadoPQR += 1;
                }
            }
            if ($validacionEstadoPQR == 0 && $pqr->estadospqr_id < 6) {
                $pqrEstado['estadospqr_id'] = 2; 
                PQR::findOrFail($pqr->id)->update($pqrEstado);
            }
            if ($peticion->pqr->persona_id != null) {
                $email = $peticion->pqr->persona->email;
            } else {
                $email = $peticion->pqr->empresa->email;
            }
            $id_aclaracion = $aclaracionNew->id;
            if($email){
                Mail::to($email)->send(new ConstanciaAclaracion($id_aclaracion));
            }
            return response()->json(['mensaje' => 'ok', 'data' => $aclaracionNew]);
        } else {
            abort(404);
        }
    }
    public function aclaracion_anexos_usuario_guardar(Request $request)
    {
        if ($request->ajax()) {
            $documentos = $request->allFiles();
            if ($request->hasFile("archivo")) {
                $ruta = Config::get('constantes.folder_doc_respuestas');
                $ruta = trim($ruta);
                $doc_subido = $documentos["archivo"];
                $tamaño = $doc_subido->getSize();
                if ($tamaño > 0) {
                    $tamaño = $tamaño / 1000;
                }
                $nombre_doc = time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName()));
                $nuevo_documento['aclaracion_id'] = $request["respuesta_id"];
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
                $respuesta = AclaracionAnexos::create($nuevo_documento);
            }
            return response()->json(['mensaje' => 'ok', 'data' => $nuevo_documento]);
        } else {
            abort(404);
        }
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
                    if ($pqr['estadospqr_id'] <= 1) {
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
                    if($email){
                        Mail::to($email)->send(new Prorroga($id_pqr));
                    }
                    //---------------------------------------------------------------------------
                }
            }
            return response()->json(['mensaje' => 'ok', 'data' => $respuestaProrroga]);
        } else {
            abort(404);
        }
    }

    
    public function respuesta_guardar(Request $request)
    {
        if ($request->ajax()) {
            $respuestaValidacion = Respuesta::where('peticion_id', $request["id_peticion"])->get();
            if(!sizeOf($respuestaValidacion)){
                $respuesta['peticion_id'] = $request["id_peticion"];
                $respuesta['fecha'] = date("Y-m-d");
                $respuesta['respuesta'] = $request["respuesta"];
                $respuestaPQR = Respuesta::create($respuesta);
                $id_respuesta = $respuestaPQR['id'];
            }else{
                $respuesta['respuesta'] = $request["respuesta"];
                $id_respuesta = $respuestaValidacion[0]['id'];
                $respuestaPQR = Respuesta::findOrFail($id_respuesta)->update($respuesta);
            }
            if( $request["estado"]){
                $nuevoEstado['estado_id'] = $request["estado"];
                Peticion::findOrFail($request['id_peticion'])->update($nuevoEstado);
            }
            return response()->json(['mensaje' => 'ok', 'data' => $id_respuesta]);
        } else {
            abort(404);
        }
    }

    public function respuesta_anexo_guardar(Request $request)
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
                $nuevo_documento['respuesta_id'] = $request["respuesta_id"];
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
                $respuesta = DocRespuesta::create($nuevo_documento);
            }

            return response()->json(['mensaje' => 'ok', 'data' => $respuesta]);
        } else {
            abort(404);
        }
    }

    public function estado_guardar(Request $request)
    {
        if ($request->ajax()) {
            $nuevoEstado['estado_id'] = $request["estado"];
            $peticion = Peticion::findOrFail($request['id_peticion'])->update($nuevoEstado);
            return response()->json(['mensaje' => 'ok', 'data' => $peticion]);
        } else {
            abort(404);
        }
    }

    public function plazo_recurso_guardar(Request $request)
    {
        if ($request->ajax()) {
            $plazoRecurso['recurso_dias'] = $request['plazo_recurso'];
            $plazoRecurso['apelacion'] = $request['apelacion'];
            $pqr = PQR::findOrfail($request['idPqr']);
            $nuevoLimite = $pqr->tipoPqr->tiempos + $pqr['prorroga_dias'] + $request['plazo_recurso'];
            $respuestaDias = FechasController::festivos($nuevoLimite, $pqr['fecha_generacion']);
            $actualizarPqr['tiempo_limite'] = $respuestaDias;
            $respuestaRecurso = PQR::findOrFail($request['idPqr'])->update($actualizarPqr);
            $peticiones = Peticion::where('pqr_id', $request['idPqr'])->get();
            foreach ($peticiones as $key => $peticion) {
                Peticion::findOrFail($peticion->id)->update($plazoRecurso);
            }
            return response()->json(['mensaje' => 'ok', 'data' => $respuestaRecurso]);
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
            if ($respuestaRecurso->peticion->pqr->persona_id != null) {
                $email = $respuestaRecurso->peticion->pqr->persona->email;
            } else {
                $email = $respuestaRecurso->peticion->pqr->empresa->email;
            }
            $id_recurso = $respuestaRecurso->id;
            if($email){
                Mail::to($email)->send(new RespuestaReposicion($id_recurso));
            }
            if($request['dias']){
                $diasReposicion = $request['dias'];
            }else{
                $tipoReposicion = TipoReposicion::findOrFail($request['tipo_reposicion_id']);
                $diasReposicion = $tipoReposicion->tiempos;
            }
            $fechaActual = date("Y-m-d H:i:s");
            $respuestaDias = FechasController::festivos($diasReposicion, $fechaActual);
            $pqrEstado['tiempo_limite'] = $respuestaDias;
            $pqrEstado['estadospqr_id'] = 8;
            PQR::findOrFail($request['id'])->update($pqrEstado);
            $pqr = PQR::findOrFail($request['id']);
            foreach ($pqr->asignaciontareas as $tarea) {
                $estadoTarea['estado_id'] = 6;
                $asignacionTarea = AsignacionTarea::where('pqr_id',$pqr['id'])->where('tareas_id',$tarea->tareas_id)->get();
                $asignacionTarea[0]->update($estadoTarea);
            }
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
            if($request['respuesta']){
                $nuevoRecurso['respuesta'] = $request['respuesta'];
            }else{
                $nuevoRecurso['respuesta'] = 'respuesta';
            }
            $respuestaRecurso = RespRecurso::create($nuevoRecurso);
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

    public function asignacion_guardar(Request $request)
    {
        if ($request->ajax()) {
            $asignacionData['estado_asignacion'] = (int)$request['confirmacionAsignacion'];
            if( $asignacionData['estado_asignacion'] == 0){
                $asignacionData['empleado_id'] = null;
                $estado = PQR::findOrFail($request['idPqr'])->update($asignacionData);
            }else{
                $asignacionData['estadospqr_id'] = 2;
                $estado = PQR::findOrFail($request['idPqr'])->update($asignacionData);
                $tareas = Tarea::all();
                $validarTareas = AsignacionTarea::where('pqr_id', $request['idPqr'])->get();
                if(!sizeOf($validarTareas)){
                    foreach ($tareas as $value) {
                        $asignacionTarea['pqr_id'] = $request['idPqr'];
                        $asignacionTarea['empleado_id'] = session('id_usuario');
                        $asignacionTarea['tareas_id'] = $value['id'];
                        $asignacionTarea['estado_id'] = 1;
                        AsignacionTarea::create($asignacionTarea);
                    }
                }
            }
            $asignacionHistorial['pqr_id'] = $request['idPqr'];
            $asignacionHistorial['empleado_id'] = session('id_usuario');
            $asignacionHistorial['historial'] = $request['mensajeAsignacion'];
            $historial = HistorialAsignacion::create($asignacionHistorial);

            $respuesta['estado'] = $estado;
            $respuesta['historial'] = $historial;
            return response()->json(['mensaje' => 'ok', 'data' => $respuesta]);
        } else {
            abort(404);
        }
    }

    public function asignacion_asignador_guardar(Request $request)
    {
        if ($request->ajax()) {
            $asignacionData['estado_asignacion'] = 0;
            $asignacionData['empleado_id'] = $request['funcionario'];
            $estado = PQR::findOrFail($request['idPqr'])->update($asignacionData);
            $asignacionHistorial['pqr_id'] = $request['idPqr'];
            $asignacionHistorial['empleado_id'] = session('id_usuario');
            $asignacionHistorial['historial'] = $request['mensajeAsignacion'];
            $historial = HistorialAsignacion::create($asignacionHistorial);

            $respuesta['estado'] = $estado;
            $respuesta['historial'] = $historial;
            return response()->json(['mensaje' => 'ok', 'data' => $respuesta]);
        } else {
            abort(404);
        }
    }

    public function historial_guardar(Request $request)
    {
        if ($request->ajax()) {
            $asignacionHistorial['pqr_id'] = $request['idPqr'];
            $asignacionHistorial['empleado_id'] = session('id_usuario');
            $asignacionHistorial['historial'] = $request['mensajeHistorial'];
            $historial = HistorialAsignacion::create($asignacionHistorial);
            return response()->json(['mensaje' => 'ok', 'data' => $historial]);
        } else {
            abort(404);
        }
    }

    public function historial_tarea_guardar(Request $request)
    {
        if ($request->ajax()) {
            $asignacionHistorial['pqr_id'] = $request['idPqr'];
            if($request['idTarea']){
                $asignacionHistorial['tareas_id'] = $request['idTarea'];
            }
            $asignacionHistorial['empleado_id'] = session('id_usuario');
            $asignacionHistorial['historial'] = $request['mensajeHistorial'];
            $historial = HistorialTarea::create($asignacionHistorial);
            return response()->json(['mensaje' => 'ok', 'data' => $historial]);
        } else {
            abort(404);
        }
    }

    public function historial_peticion_guardar(Request $request)
    {
        if ($request->ajax()) {
            $asignacionHistorial['pqr_id'] = $request['idPqr'];
            $asignacionHistorial['peticion_id'] = $request['idPeticion'];
            $asignacionHistorial['empleado_id'] = session('id_usuario');
            $asignacionHistorial['historial'] = $request['mensajeHistorial'];
            $historial = HistorialPeticion::create($asignacionHistorial);
            return response()->json(['mensaje' => 'ok', 'data' => $historial]);
        } else {
            abort(404);
        }
    }

    public function asignacion_tarea_guardar(Request $request)
    {
        if ($request->ajax()) {
            $asignacionTarea['empleado_id'] = (int)$request['funcionario'];
            $tareas = AsignacionTarea::where('pqr_id', $request['idPqr'])->where('tareas_id', $request['tarea'])->get();
            foreach ($tareas as $tarea) {
                $id = $tarea->id;
            }
            $tareaActualizar = AsignacionTarea::findOrFail($id)->update($asignacionTarea);
            return response()->json(['mensaje' => 'ok', 'data' => $tareaActualizar]);
        } else {
            abort(404);
        }
    }

    public function asignacion_peticion_guardar(Request $request)
    {
        if ($request->ajax()) {
            $asignacionPeticion['empleado_id'] = (int)$request['funcionario'];
            $peticionActualizar = Peticion::findOrFail($request['peticion'])->update($asignacionPeticion);
            return response()->json(['mensaje' => 'ok', 'data' => $peticionActualizar]);
        } else {
            abort(404);
        }
    }

    public function prioridad_guardar(Request $request)
    {
        if ($request->ajax()) {
            $prioridad['prioridad_id'] = (int)$request['prioridad'];
            $pqrActualizar = PQR::findOrFail($request['idPqr'])->update($prioridad);
            return response()->json(['mensaje' => 'ok', 'data' => $pqrActualizar]);
        } else {
            abort(404);
        }
    }

    public function pqr_anexo_guardar(Request $request)
    {
        if ($request->ajax()) {
            $documentos = $request->allFiles();
            if ($request->hasFile('archivo')) {
                $ruta = Config::get('constantes.folder_doc_tareas');
                $ruta = trim($ruta);
                $doc_subido = $documentos["archivo"];
                $tamaño = $doc_subido->getSize();
                if ($tamaño > 0) {
                    $tamaño = $tamaño / 1000;
                }
                $nombre_doc = time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName()));
                $nuevo_documento['pqr_id'] = $request["pqr_id"];
                $nuevo_documento['titulo'] = $request["titulo"];
                if ($request["descripcion"]) {
                    $nuevo_documento['descripcion'] = $request["descripcion"];
                } else {
                    $nuevo_documento['descripcion'] = '';
                }
                $nuevo_documento['extension'] = $doc_subido->getClientOriginalExtension();
                $nuevo_documento['peso'] = $tamaño;
                $nuevo_documento['url'] = $nombre_doc;
                $nuevo_documento['tareas_id'] = $request["idTarea"];
                $nuevo_documento['empleado_id'] = session('id_usuario');
                $doc_subido->move($ruta, $nombre_doc);
                $respuesta = PqrAnexo::create($nuevo_documento);

                $pqr = PQR::findOrfail($request["pqr_id"]);
                $peticiones = Peticion::where('pqr_id', $pqr->id)->get();
                if(sizeof($peticiones)){
                    $pqr['recurso_dias'] = $peticiones[0]->recurso_dias;
                }
                $pqr_id = $pqr->id;
                if ($pqr->persona_id != null) {
                    $email = $pqr->persona->email;
                }elseif($pqr->empresa_id != null){
                    $email = $pqr->empresa->email;
                } 
                if($request["idTarea"] == 4 && $request["apruebaRadica"] ){
                    if($email){
                        Mail::to($email)->send(new RespuestaPQR($pqr_id));
                    }
                }
                if( ($request["idTarea"] == 4 && $request["apruebaRadica"]) || $request["idTarea"] == 5 ){
                    PQRController::actualizar_estados($pqr);
                }
            }
            return response()->json(['mensaje' => 'ok', 'data' => $pqr]);
        } else {
            abort(404);
        }
    }

    static public function actualizar_estados($pqr){
        $cantPeticionRecurso = 0;
        $cantPericionRecursoRespuesta = 0;
        $cantPeticionRecursoRespuestaCerrar = 0;
        $peticiones = $pqr->peticiones;
        foreach ($peticiones as $peticion) {
            if(sizeOf($peticion->recursos)){
                $cantPeticionRecurso += 1;
                if(sizeOf($peticion->recursos) == 1){
                    foreach ($peticion->recursos as $recurso) {
                        if($recurso->respuestarecurso){
                            $cantPericionRecursoRespuesta ++;
                            if($recurso->tipo_reposicion_id != 1){
                                $cantPeticionRecursoRespuestaCerrar ++;
                            }
                        }
                    }
                }else {
                    $cantRecursos = sizeOf($peticion->recursos);
                    $cantRecursosRepuestas = 0;
                    foreach ($peticion->recursos as $recurso) {
                        if($recurso->respuestarecurso){
                            $cantRecursosRepuestas ++;
                        }
                    }
                    if($cantRecursos == $cantRecursosRepuestas){
                        $cantPericionRecursoRespuesta += 1;
                        $cantPeticionRecursoRespuestaCerrar += 1;
                    }
                }
            }
        }
        if($cantPeticionRecursoRespuestaCerrar == $peticiones->count()){
            $pqrEstado['estadospqr_id'] = 10; 
        }elseif($cantPeticionRecurso == $cantPericionRecursoRespuesta && $cantPeticionRecurso > 0 ){
            $pqrEstado['estadospqr_id'] = 9;
            if($pqr['recurso_dias']){
                $fechaActual = date("Y-m-d H:i:s");
                $respuestaDias = FechasController::festivos($pqr['recurso_dias'], $fechaActual);
                $pqrEstado['tiempo_limite'] = $respuestaDias;
            }
        }elseif($cantPeticionRecurso == 0){
            if($pqr->peticiones->sum('recurso_dias')){
                $pqrEstado['estadospqr_id'] = 7;
                if($pqr['recurso_dias']){
                    $fechaActual = date("Y-m-d H:i:s");
                    $respuestaDias = FechasController::festivos($pqr['recurso_dias'], $fechaActual);
                    $pqrEstado['tiempo_limite'] = $respuestaDias;
                }
            }else{
                $pqrEstado['estadospqr_id'] = 6; 
            }
        }
        $respuesta = PQR::findOrFail($pqr->id)->update($pqrEstado);
        return $respuesta;
    }

    public function cambiar_estado_tareas_guardar(Request $request)
    {
        if ($request->ajax()) {
            if($request['estado']){
                $estado['estado_id'] = $request['estado'];
                $tarea = $request['idTarea'] - 1;
            }else{
                $estado['estado_id'] = 11;
                $tarea = $request['idTarea'];
            }
            $respuesta = AsignacionTarea::where('pqr_id',$request['idPqr'])->where('tareas_id',$tarea)->update($estado);
            if($request['idTarea'] == 5){
                AsignacionTarea::where('pqr_id',$request['idPqr'])->where('tareas_id', 1)->update($estado);
            }
            return response()->json(['mensaje' => 'ok', 'data' => $respuesta]);
        } else {
            abort(404);
        }
    }

    public function historial_resuelve_guardar(Request $request)
    {
        if ($request->ajax()) {
            $resuelves = Resuelve::where('pqr_id', $request['idPqr'])->get();
            $resuelve['orden'] = $resuelves->count() + 1;
            $resuelve['pqr_id'] = $request['idPqr'];
            $resuelve['empleado_id'] = session('id_usuario');
            $resuelve['resuelve'] = $request['mensajeResuelve'];
            $respuesta = Resuelve::create($resuelve);
            return response()->json(['mensaje' => 'ok', 'data' => $respuesta]);
        } else {
            abort(404);
        }
    }

    public function historial_resuelve_eliminar(Request $request)
    {
        if ($request->ajax()) {
            $resuelve = Resuelve::findOrFail($request['value']);
            $index = $resuelve['orden'];
            $pqr = $resuelve->pqr_id;
            $respuesta = $resuelve->delete(); 
            $resuelves = Resuelve::where('pqr_id', $pqr)->get(); 
            foreach ($resuelves as $key => $resuel) {
                if($index < $resuel['orden'] )
                $orden['orden'] =  $resuel['orden'] - 1;
                Resuelve::findOrFail($resuel->id)->update($orden);
            }
            return response()->json(['mensaje' => 'ok', 'data' => $respuesta]);
        } else {
            abort(404);
        }
    }
    public function historial_resuelve_editar(Request $request)
    {
        if ($request->ajax()) {
            $resuelve['resuelve'] = $request['resuelveNuevo'];
            $respuesta = Resuelve::findOrFail($request['value'])->update($resuelve);
            return response()->json(['mensaje' => 'ok', 'data' => $respuesta]);
        } else {
            abort(404);
        }
    }
    public function resuelve_orden_guardar(Request $request)
    {
        if ($request->ajax()) {
            $resuelve['orden'] = $request['orden'];
            $respuesta = Resuelve::findOrFail($request['id'])->update($resuelve);
            return response()->json(['mensaje' => 'ok', 'data' => $respuesta]);
        } else {
            abort(404);
        }
    }

    public function cargar_tareas(Request $request)
    {
        if ($request->ajax()) {
            return Tarea::all();
        }
    }

    public function cargar_cargos(Request $request)
    {
        if ($request->ajax()) {
            return Cargo::all();
        }
    }
    
    public function cargar_funcionarios(Request $request)
    {
        if ($request->ajax()) {
            $id = $_GET['id'];
            return Empleado::where('cargo_id', $id)->get();
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
    public function asigacion_automatica($id)
    {
        $resp = '';
        $pqr = PQR::findOrFail($id);
        $asignaciones = AsignacionParticular::where('tipo', 'Permanente')->get();
        // **************************************************************************************************** */
        $resp = '';
        $respuesta['no_null'] = 0;
        $respuesta['asignacion_id'] = 0;
        foreach ($asignaciones as $asignacion) {
            $resp .= '      id Asignacion = ' . $asignacion->id . '***';
            $coincidencia = 0;
            $no_null = 0;
            if ($asignacion->tipo_pqr_id != null) {
                $no_null++;
                $resp .= 'tipo pqr:';
                if ($asignacion->tipo_pqr_id == $pqr->tipo_pqr_id) {
                    $coincidencia++;
                    $resp .= 'tipo pqr';
                }
            }
            $resp .= ',';
            if ($pqr->tipo != null) {
                if ($asignacion->prodserv != null) {
                    $no_null++;
                    $resp .= 'producto serv:';
                    if ($asignacion->prodserv == $pqr->tipo) {
                        $coincidencia++;
                        $resp .= 'producto serv';
                    }
                }
            }
            $resp .= ',';

            if ($asignacion->motivo_id != null) {
                $no_null++;
                $resp .= 'motivo:';
                if ($pqr->peticiones->count() > 0) {
                    foreach ($pqr->peticiones as $peticion) {
                        if ($peticion->motivo_sub_id != null) {
                            if ($asignacion->motivo_id == $peticion->motivo->motivo_id) {
                                $coincidencia++;
                                $resp .= 'motivo';
                            }
                        }
                    }
                }
            }
            $resp .= ',';
            if ($asignacion->motivo_sub_id != null) {
                $no_null++;
                $resp .= 'sub motivo:';
                if ($pqr->peticiones->count() > 0) {
                    foreach ($pqr->peticiones as $peticion) {
                        if ($peticion->motivo_sub_id != null) {
                            if ($asignacion->motivo_sub_id == $peticion->motivo_sub_id) {
                                $coincidencia++;
                                $resp .= 'sub motivo';
                            }
                        }
                    }
                }
            }
            $resp .= ',';

            if ($pqr->servicio_id != null) {
                if ($asignacion->servicio_id != null) {
                    $no_null++;
                    $resp .= 'servicio:';
                    if ($asignacion->servicio_id == $pqr->servicio_id) {
                        $coincidencia++;
                        $resp .= 'servicio';
                    }
                }
            }
            $resp .= ',';
            if ($pqr->referencia_id != null) {
                if ($asignacion->categoria_id != null) {
                    $no_null++;
                    $resp .= 'categoria:';
                    if ($asignacion->categoria_id == $pqr->referencia->marca->producto->categoria_id) {
                        $coincidencia++;
                        $resp .= 'categoria';
                    }
                }
                $resp .= ',';
                if ($asignacion->producto_id != null) {
                    $no_null++;
                    $resp .= 'producto:';
                    if ($asignacion->producto_id == $pqr->referencia->marca->producto_id) {
                        $coincidencia++;
                        $resp .= 'producto';
                    }
                }
                $resp .= ',';
                if ($asignacion->marca_id != null) {
                    $no_null++;
                    $resp .= 'marca:';
                    if ($asignacion->marca_id == $pqr->referencia->marca_id) {
                        $coincidencia++;
                        $resp .= 'marca';
                    }
                }
                $resp .= ',';
                if ($asignacion->referencia_id != null) {
                    $no_null++;
                    $resp .= 'referencia:';
                    if ($asignacion->referencia_id == $pqr->referencia_id) {
                        $coincidencia++;
                        $resp .= 'referencia';
                    }
                }
                $resp .= ',';
            }
            if ($asignacion->adquisicion != null) {
                $no_null++;
                $resp .= 'adquisicion:';
                if ($pqr->adquisicion != null) {
                    if ($asignacion->adquisicion == $pqr->adquisicion) {
                        $coincidencia++;
                        $resp .= 'adquisicion';
                    }
                }
            }
            $resp .= ',';
            if ($asignacion->palabra1 != null) {
                $no_null++;
                $encontrada = 0;
                foreach ($pqr->peticiones as $peticion) {
                    if ($encontrada === 0) {
                        $pos = strpos($peticion->justificacion, $asignacion->palabra1);
                        if ($pos !== false) {
                            $encontrada++;
                            $coincidencia++;
                        }
                    }
                    if ($encontrada === 0) {
                        foreach ($peticion->hechos as $hecho) {
                            if ($encontrada === 0) {
                                $pos = strpos($hecho->hecho, $asignacion->palabra1);
                                if ($pos !== false) {
                                    $encontrada++;
                                    $coincidencia++;
                                }
                            }
                        }
                    }
                }
            }
            if ($asignacion->palabra2 != null) {
                $no_null++;
                $encontrada = 0;
                foreach ($pqr->peticiones as $peticion) {
                    if ($encontrada === 0) {
                        $pos = strpos($peticion->justificacion, $asignacion->palabra2);
                        if ($pos !== false) {
                            $encontrada++;
                            $coincidencia++;
                        }
                    }
                    if ($encontrada === 0) {
                        foreach ($peticion->hechos as $hecho) {
                            if ($encontrada === 0) {
                                $pos = strpos($hecho->hecho, $asignacion->palabra2);
                                if ($pos !== false) {
                                    $encontrada++;
                                    $coincidencia++;
                                }
                            }
                        }
                    }
                }
            }
            if ($asignacion->palabra3 != null) {
                $no_null++;
                $encontrada = 0;
                foreach ($pqr->peticiones as $peticion) {
                    if ($encontrada === 0) {
                        $pos = strpos($peticion->justificacion, $asignacion->palabra3);
                        if ($pos !== false) {
                            $encontrada++;
                            $coincidencia++;
                        }
                    }
                    if ($encontrada === 0) {
                        foreach ($peticion->hechos as $hecho) {
                            if ($encontrada === 0) {
                                $pos = strpos($hecho->hecho, $asignacion->palabra3);
                                if ($pos !== false) {
                                    $encontrada++;
                                    $coincidencia++;
                                }
                            }
                        }
                    }
                }
            }
            if ($asignacion->palabra4 != null) {
                $no_null++;
                $encontrada = 0;
                foreach ($pqr->peticiones as $peticion) {
                    if ($encontrada === 0) {
                        $pos = strpos($peticion->justificacion, $asignacion->palabra4);
                        if ($pos !== false) {
                            $encontrada++;
                            $coincidencia++;
                        }
                    }
                    if ($encontrada === 0) {
                        foreach ($peticion->hechos as $hecho) {
                            if ($encontrada === 0) {
                                $pos = strpos($hecho->hecho, $asignacion->palabra4);
                                if ($pos !== false) {
                                    $encontrada++;
                                    $coincidencia++;
                                }
                            }
                        }
                    }
                }
            }
            $resp .= '  ------ salto ---  ';
            if ($no_null > 0 && $coincidencia > 0) {
                $resp .= 'no null->' . $no_null . '-conicidencia->' . $coincidencia . '   -   ASignacion->' . $asignacion->id . '   -   ';
                if ($coincidencia === $no_null) {
                    if ($no_null > $respuesta['no_null']) {
                        $respuesta['no_null'] = $no_null;
                        $respuesta['asignacion_id'] = $asignacion->id;
                    }
                }
            }
        }
        $asignacion_final = AsignacionParticular::findOrFail($respuesta['asignacion_id']);
        if ($pqr->sede_id != null) {
            if ($pqr->sede_id == $asignacion_final->sede_id) {
                $empleados = Empleado::where('estado', 1)->where('cargo_id', $asignacion_final->cargo_id)->where('sede_id', $asignacion_final->sede_id)->get();
            } else {
                if ($pqr->persona_id != null) {
                    $persona = Persona::findOrfail($pqr->persona_id);
                    foreach ($persona->municipio->departamento->sedes as $sede) {
                        $sede_id = $sede->id;
                    }
                    $empleados = Empleado::where('estado', 1)->where('cargo_id', $asignacion_final->cargo_id)->where('sede_id', $sede_id)->get();
                } else {
                    $empresa = Empresa::findOrfail($pqr->empresa_id);
                    foreach ($empresa->municipio->departamento->sedes as $sede) {
                        $sede_id = $sede->id;
                    }
                    $empleados = Empleado::where('estado', 1)->where('cargo_id', $asignacion_final->cargo_id)->where('sede_id', $sede_id)->get();
                }
            }
        } else {
            if ($pqr->persona_id != null) {
                $persona = Persona::findOrfail($pqr->persona_id);
                foreach ($persona->municipio->departamento->sedes as $sede) {
                    $sede_id = $sede->id;
                }
                $empleados = Empleado::where('estado', 1)->where('cargo_id', $asignacion_final->cargo_id)->where('sede_id', $sede_id)->get();
            } else {
                $empresa = Empresa::findOrfail($pqr->empresa_id);
                foreach ($empresa->municipio->departamento->sedes as $sede) {
                    $sede_id = $sede->id;
                }
                $empleados = Empleado::where('estado', 1)->where('cargo_id', $asignacion_final->cargo_id)->where('sede_id', $sede_id)->get();
            }
        }
        $max_pqr = 0;
        foreach ($empleados as $empleado) {
            $empleados_sel_max[] = ['cant' => $empleado->pqrs->count(), 'id' => $empleado->id];
        }
        $empleado_final = min($empleados_sel_max);
        $pqr_act['empleado_id'] = $empleado_final['id'];
        $pqr->update($pqr_act);


        // **************************************************************************************************** */

    }
    // Ajustes nuevos de tramite


}
