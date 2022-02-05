<?php

namespace App\Http\Controllers\Intranet\Funcionarios;

use App\Models\PQR\tipoPQR;
use App\Models\Tutela\Tarea;
use Illuminate\Http\Request;
use App\Models\PQR\Prioridad;
use App\Models\Admin\WikuArea;
use App\Models\Tutela\Accions;
use App\Models\Tutela\Acccions;
use App\Models\Tutela\Despachos;
use App\Models\Admin\WikuDocument;
use App\Models\Servicios\Servicio;
use App\Models\Tutela\AnexoTutela;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Productos\Categoria;
use App\Models\Tutela\HechosTutela;
use App\Http\Controllers\Controller;
use App\Models\Tutela\AutoAdmisorio;
use App\Models\Tutela\MotivosTutela;
use App\Models\Tutela\PruebasTutela;
use App\Models\Tutela\RelacionHecho;
use App\Models\Tutela\HistorialHecho;
use App\Models\Tutela\ResuelveTutela;
use App\Models\Tutela\AsignacionTarea;
use App\Models\Tutela\HistorialTareas;
use App\Models\Tutela\RespuestaHechos;
use App\Models\Tutela\TutelaRespuesta;
use Illuminate\Support\Facades\Config;
use App\Models\Tutela\ArgumentosTutela;
use App\Models\Tutela\AsignacionEstados;
use App\Models\Tutela\DocRespuestaHecho;
use App\Models\Tutela\PretensionesTutela;
use App\Models\Tutela\RelacionPretension;
use App\Models\Tutela\HistorialAsignacion;
use App\Models\Tutela\HistorialPretension;
use App\Models\Tutela\RespuestaPretensiones;
use App\Models\Tutela\DocRespuestaPretension;
use App\Models\Tutela\HistorialRespuestaHecho;
use App\Models\Tutela\HistorialRespuestaPretension;

class TutelaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gestionar_tutela($id)
    {
        $areas = WikuArea::all();
        $fuentes = WikuDocument::all();
        $tipos_pqr = tipoPQR::get();
        $categorias = Categoria::get();
        $servicios = Servicio::get();
        $tutela = AutoAdmisorio::findorFail($id);
        $estados = AsignacionEstados::all();
        return view('intranet.funcionarios.tutela.tutela_tareas.gestion_colaboracion', compact('tutela', 'estados', 'areas', 'fuentes', 'tipos_pqr', 'servicios', 'categorias'));
    }

    public function auto_admisorio_complemento($id)
    {
        return view('intranet.funcionarios.tutela.registro_complemento', compact('id'));
    }

    public function crear_auto_admisorio(Request $request)
    {
        if ($request->ajax()) {
            $nuevo_auto_admisorio['empleado_rigistro_id'] = session('id_usuario');
            $nuevo_auto_admisorio['estadostutela_id'] = 1;
            $nuevo_auto_admisorio['radicado'] = $request['radicado'];
            $nuevo_auto_admisorio['jurisdiccion'] = $request['jurisdiccion'];
            $despacho =  Despachos::findOrFail($request["juzgado"]);
            $nuevo_auto_admisorio['juzgado'] = $despacho['nombre_despacho'];
            $nuevo_auto_admisorio['departamento'] = $despacho['departamento'];
            $nuevo_auto_admisorio['municipio'] = $despacho['municipio'];
            $nuevo_auto_admisorio['fecha_notificacion'] = $request['fecha_notificacion'];

            $nuevo_auto_admisorio['nombre_juez'] = $request['nombreApellido_juez'];
            $nuevo_auto_admisorio['direccion_juez'] = $request['direccion_juez'];
            $nuevo_auto_admisorio['telefono_juez'] = $request['telefono_fijo_juez'];
            $nuevo_auto_admisorio['correo_juez'] = $request['correo_juez'];


            $nuevo_auto_admisorio['dias_termino'] = $request['cantidad_dias'];
            $nuevo_auto_admisorio['horas_termino'] = $request['cantidad_horas'];
            if($request['cantidad_dias']){
                $nuevo_auto_admisorio['fecha_limite'] = strtotime ( "+{$request['cantidad_dias']} days" , strtotime ($request['fecha_notificacion']) );
                $nuevo_auto_admisorio['fecha_limite'] = date ( 'Y-m-d H:i:s' , $nuevo_auto_admisorio['fecha_limite']); 
            }else{
                $nuevo_auto_admisorio['fecha_limite'] = strtotime ( "+{$request['cantidad_horas']} hour" , strtotime ($request['fecha_notificacion']) );
                $nuevo_auto_admisorio['fecha_limite'] = date ( 'Y-m-d H:i:s' , $nuevo_auto_admisorio['fecha_limite']); 
            }

            $nuevo_auto_admisorio['medida_cautelar'] = $request['medida_cautelar'];
            if($request['medida_cautelar']){
                $nuevo_auto_admisorio['text_medida_cautelar'] = $request['text_medida_cautelar'];
                $nuevo_auto_admisorio['dias_medida_cautelar'] = $request['dias_medida_cautelar'];
                $nuevo_auto_admisorio['horas_medida_cautelar'] = $request['horas_medida_cautelar'];
            }
            $repuesta = AutoAdmisorio::create($nuevo_auto_admisorio);
            return response()->json(['mensaje' => 'ok', 'data' => $repuesta]);
        } else {
            abort(404);
        }
    }

    public function update_auto_admisorio(Request $request)
    {
        if ($request->ajax()) {
            $documento = $request->allFiles();
            if ($request->hasFile("archivo_anexo_admisorio")) {
                $ruta = Config::get('constantes.folder_auto_admisorios');
                $ruta = trim($ruta);
                $doc_subido = $documento["archivo_anexo_admisorio"];
                $tamaño = $doc_subido->getSize();
                if ($tamaño > 0) {
                    $tamaño = $tamaño / 1000;
                }
                $nombre_doc = time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName()));
                $nuevo_auto_admisorio['titulo_admisorio'] = $request["titulo_anexo_admisorio"];
                $nuevo_auto_admisorio['descripcion_admisorio'] = $request["descripcion_anexo_admisorio"];
                $nuevo_auto_admisorio['url_admisorio'] = $nombre_doc;
                $nuevo_auto_admisorio['extension_admisorio'] = $doc_subido->getClientOriginalExtension();
                $nuevo_auto_admisorio['peso_admisorio'] = $tamaño;
                $doc_subido->move($ruta, $nombre_doc);
                $repuesta = AutoAdmisorio::findOrFail($request["id"])->update($nuevo_auto_admisorio);
            }
            return response()->json(['mensaje' => 'ok', 'data' => $repuesta]);
        } else {
            abort(404);
        }
    }

    public function update_tutela(Request $request)
    {
        if ($request->ajax()) {
            $update_tutela['empleado_asignado_id'] = session('id_usuario');
            $update_tutela['fecha_radicado'] = date("Y-m-d H:i:s");
            $update_tutela['estado_creacion'] = 1;
            $update_tutela['estadostutela_id'] = 2;
            $repuesta = AutoAdmisorio::findOrFail($request["id"])->update($update_tutela);
            return response()->json(['mensaje' => 'ok', 'data' => $repuesta]);
        } else {
            abort(404);
        }
    }

    public function crear_accion(Request $request)
    {
        if ($request->ajax()) {
            $nuevo_accion['auto_admisorio_id'] = $request['id'];
            $nuevo_accion['tipo_accion'] = $request['tipo_accion'];
            $nuevo_accion['tipo_persona_accion'] = $request['tipo_persona_accion'];
            $nuevo_accion['docutipos_id_accion'] = $request['docutipos_id_accion'];
            $nuevo_accion['numero_documento_accion'] = $request['numero_documento_accion'];
            $nuevo_accion['nombres_accion'] = $request['nombres_accion'];
            $nuevo_accion['apellidos_accion'] = $request['apellidos_accion'];
            $nuevo_accion['correo_accion'] = $request['correo_accion'];
            $nuevo_accion['direccion_accion'] = $request['direccion_accion'];
            $nuevo_accion['telefono_accion'] = $request['telefono_accion'];

            $nuevo_accion['nombre_apoderado'] = $request['nombre_apoderado'];
            $nuevo_accion['docutipos_id_apoderado'] = $request['docutipos_id_apoderado'];
            $nuevo_accion['numero_documento_apoderado'] = $request['numero_documento_apoderado'];
            $nuevo_accion['tarjeta_profesional_apoderado'] = $request['tarjeta_profesional_apoderado'];
            $nuevo_accion['correo_apoderado'] = $request['correo_apoderado'];
            $nuevo_accion['direccion_apoderado'] = $request['direccion_apoderado'];
            $nuevo_accion['telefono_apoderado'] = $request['telefono_apoderado'];

            $repuesta = Accions::create($nuevo_accion);
            return response()->json(['mensaje' => 'ok', 'data' => $repuesta]);
        } else {
            abort(404);
        }
    }

    public function crear_motivos_tutela(Request $request)
    {
        if ($request->ajax()) {
            $nuevo_motivo['auto_admisorio_id'] = $request['id'];
            $nuevo_motivo['motivo_tutela'] = $request['motivo_tutela'];
            $nuevo_motivo['sub_motivo_tutela'] = $request['sub_motivo_tutela'];
            $nuevo_motivo['tipo_tutela'] = $request['tipo_tutela'];
            $repuesta = MotivosTutela::create($nuevo_motivo);
            return response()->json(['mensaje' => 'ok', 'data' => $repuesta]);
        } else {
            abort(404);
        }
    }

    public function crear_anexo_tutela(Request $request)
    {
        if ($request->ajax()) {
            $documento = $request->allFiles();
            if ($request->hasFile("archivo_anexo")) {
                $ruta = Config::get('constantes.folder_tutelas');
                $ruta = trim($ruta);
                $doc_subido = $documento["archivo_anexo"];
                $tamaño = $doc_subido->getSize();
                if ($tamaño > 0) {
                    $tamaño = $tamaño / 1000;
                }
                $nombre_doc = time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName()));
                $nuevo_anexo['titulo'] = $request["titulo"];
                $nuevo_anexo['descripcion'] = $request["descripcion"];
                $nuevo_anexo['url'] = $nombre_doc;
                $nuevo_anexo['extension'] = $doc_subido->getClientOriginalExtension();
                $nuevo_anexo['peso'] = $tamaño;
                $nuevo_anexo['auto_admisorio_id'] = $request['id'];
                $doc_subido->move($ruta, $nombre_doc);
                $repuesta = AnexoTutela::create($nuevo_anexo);
            }
            return response()->json(['mensaje' => 'ok', 'data' => $repuesta]);
        } else {
            abort(404);
        }
    }

    public function crear_hechos_tutela(Request $request)
    {
        if ($request->ajax()) {
            $nuevo_hecho['auto_admisorio_id'] = $request['auto_admisorio_id'];
            $nuevo_hecho['hecho'] = $request['hecho'];
            $nuevo_hecho['consecutivo'] = $request['consecutivo'];
            $repuesta = HechosTutela::create($nuevo_hecho);
            return response()->json(['mensaje' => 'ok', 'data' => $repuesta]);
        } else {
            abort(404);
        }
    }
    
    public function crear_pretensiones_tutela(Request $request)
    {
        if ($request->ajax()) {
            $nuevo_pretension['auto_admisorio_id'] = $request['auto_admisorio_id'];
            $nuevo_pretension['pretension'] = $request['pretension'];
            $nuevo_pretension['consecutivo'] = $request['consecutivo'];
            $repuesta = PretensionesTutela::create($nuevo_pretension);
            return response()->json(['mensaje' => 'ok', 'data' => $repuesta]);
        } else {
            abort(404);
        }
    }

    public function crear_argumentos_tutela(Request $request)
    {
        if ($request->ajax()) {
            $nuevo_argumento['auto_admisorio_id'] = $request['auto_admisorio_id'];
            $nuevo_argumento['argumento'] = $request['argumento'];
            $repuesta = ArgumentosTutela::create($nuevo_argumento);
            return response()->json(['mensaje' => 'ok', 'data' => $repuesta]);
        } else {
            abort(404);
        }
    }

    public function crear_pruebas_tutela(Request $request)
    {
        if ($request->ajax()) {
            $documento = $request->allFiles();
            if ($request->hasFile("archivo_anexo")) {
                $ruta = Config::get('constantes.folder_tutelas_pruebas');
                $ruta = trim($ruta);
                $doc_subido = $documento["archivo_anexo"];
                $tamaño = $doc_subido->getSize();
                if ($tamaño > 0) {
                    $tamaño = $tamaño / 1000;
                }
                $nombre_doc = time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName()));
                $nuevo_anexo['titulo'] = $request["titulo"];
                $nuevo_anexo['descripcion'] = $request["descripcion"];
                $nuevo_anexo['url'] = $nombre_doc;
                $nuevo_anexo['extension'] = $doc_subido->getClientOriginalExtension();
                $nuevo_anexo['peso'] = $tamaño;
                $nuevo_anexo['auto_admisorio_id'] = $request['id'];
                $doc_subido->move($ruta, $nombre_doc);
                $repuesta = PruebasTutela::create($nuevo_anexo);
            }
            return response()->json(['mensaje' => 'ok', 'data' => $repuesta]);
        } else {
            abort(404);
        }
    }

    public function historial_tutela_guardar(Request $request)
    {
        if ($request->ajax()) {
            $asignacionHistorial['auto_admisorio_id'] = $request['idAuto'];
            $asignacionHistorial['empleado_id'] = session('id_usuario');
            $asignacionHistorial['historial'] = $request['mensajeHistorial'];
            $historial = HistorialAsignacion::create($asignacionHistorial);
            return response()->json(['mensaje' => 'ok', 'data' => $historial]);
        } else {
            abort(404);
        }
    }

    public function asignacion_tutela_guardar(Request $request)
    {
        if ($request->ajax()) {
            $asignacionData['estado_asignacion'] = (int)$request['confirmacionAsignacion'];
            if( $asignacionData['estado_asignacion'] == 0){
                $asignacionData['empleado_asignado_id'] = null;
                $estado = AutoAdmisorio::findOrFail($request['idAuto'])->update($asignacionData);
            }else{
                $asignacionData['estadostutela_id'] = 3;
                $estado = AutoAdmisorio::findOrFail($request['idAuto'])->update($asignacionData);
                $tareas = Tarea::all();
                $validarTareas = AsignacionTarea::where('auto_admisorio_id', $request['idAuto'])->get();
                if(!sizeOf($validarTareas)){
                    foreach ($tareas as $value) {
                        $asignacionTarea['auto_admisorio_id'] = $request['idAuto'];
                        $asignacionTarea['empleado_id'] = session('id_usuario');
                        $asignacionTarea['tareas_id'] = $value['id'];
                        $asignacionTarea['estado_id'] = 1;
                        AsignacionTarea::create($asignacionTarea);
                    }
                }
                if($request['reAsignacion'] === "true"){
                    $hechos =  HechosTutela::where('auto_admisorio_id', $request['idAuto'])->get();
                    foreach ($hechos as $hecho) {
                        $id = $hecho['id'];
                        $hechoActualizar['empleado_id'] = session('id_usuario');
                        HechosTutela::findOrFail($id)->update($hechoActualizar); 
                    }
                    $pretensiones =  PretensionesTutela::where('auto_admisorio_id', $request['idAuto'])->get();
                    foreach ($pretensiones as $pretension) {
                        $id = $pretension['id'];
                        $pretensionActualizar['empleado_id'] = session('id_usuario');
                        PretensionesTutela::findOrFail($id)->update($pretensionActualizar); 
                    }
                }
            }
            $asignacionHistorial['auto_admisorio_id'] = $request['idAuto'];
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

    public function asignacion_tarea_tutela_guardar(Request $request)
    {
        if ($request->ajax()) {
            $asignacionTarea['empleado_id'] = (int)$request['funcionario'];
            $tareas = AsignacionTarea::where('auto_admisorio_id', $request['idAuto'])->where('tareas_id', $request['tarea'])->get();
            foreach ($tareas as $tarea) {
                $id = $tarea->id;
            }
            $tareaActualizar = AsignacionTarea::findOrFail($id)->update($asignacionTarea);
            return response()->json(['mensaje' => 'ok', 'data' => $tareaActualizar]);
        } else {
            abort(404);
        }
    }

    public function historial_tarea_tutela_guardar(Request $request)
    {
        if ($request->ajax()) {
            $asignacionHistorial['auto_admisorio_id'] = $request['idAuto'];
            if($request['idTarea']){
                $asignacionHistorial['tareas_tutela_id'] = $request['idTarea'];
            }
            $asignacionHistorial['empleado_id'] = session('id_usuario');
            $asignacionHistorial['historial'] = $request['mensajeHistorial'];
            $historial = HistorialTareas::create($asignacionHistorial);
            return response()->json(['mensaje' => 'ok', 'data' => $historial]);
        } else {
            abort(404);
        }
    }

    public function gestionar_asignacion_supervisa_tutela($id)
    {
        $estados = AsignacionEstados::all();
        $tutela = AutoAdmisorio::findorFail($id);
        $estadoPrioridad = Prioridad::all();
        return view('intranet.funcionarios.tutela.tutela_tareas.gestion_asignacion_supervisa', compact('tutela', 'estadoPrioridad', 'estados'));
    }

    public function gestionar_asignacion_proyecta_tutela($id)
    {
        $estados = AsignacionEstados::all();
        $tutela = AutoAdmisorio::findorFail($id);
        $estadoPrioridad = Prioridad::all();
        return view('intranet.funcionarios.tutela.tutela_tareas.gestion_asignacion_proyecta', compact('tutela', 'estadoPrioridad', 'estados'));
    }

    public function gestionar_asignacion_revisa_aprueba_tutela($id)
    {
        $estados = AsignacionEstados::all();
        $tutela = AutoAdmisorio::findorFail($id);
        $estadoPrioridad = Prioridad::all();
        return view('intranet.funcionarios.tutela.tutela_tareas.gestion_asignacion_revisa_aprueba', compact('tutela', 'estadoPrioridad', 'estados'));
    }

    public function gestionar_asignacion_radica_tutela($id)
    {
        $estados = AsignacionEstados::all();
        $tutela = AutoAdmisorio::findorFail($id);
        $estadoPrioridad = Prioridad::all();
        return view('intranet.funcionarios.tutela.tutela_tareas.gestion_asignacion_radica', compact('tutela', 'estadoPrioridad', 'estados'));
    }

    public function prioridad_tutela_guardar(Request $request)
    {
        if ($request->ajax()) {
            $prioridad['prioridad_id'] = (int)$request['prioridad'];
            $tutelaActualizar = AutoAdmisorio::findOrFail($request['idAuto'])->update($prioridad);
            return response()->json(['mensaje' => 'ok', 'data' => $tutelaActualizar]);
        } else {
            abort(404);
        }
    }

    public function estado_hecho_guardar(Request $request)
    {
        if ($request->ajax()) {
            $nuevoEstado['estado_id'] = $request["estado"];
            $hecho = HechosTutela::findOrFail($request['id_hecho'])->update($nuevoEstado);
            return response()->json(['mensaje' => 'ok', 'data' => $hecho]);
        } else {
            abort(404);
        }
    }

    public function estado_pretension_guardar(Request $request)
    {
        if ($request->ajax()) {
            $nuevoEstado['estado_id'] = $request["estado"];
            $pretension = PretensionesTutela::findOrFail($request['id_pretension'])->update($nuevoEstado);
            return response()->json(['mensaje' => 'ok', 'data' => $pretension]);
        } else {
            abort(404);
        }
    }

    public function asignacion_hecho_guardar(Request $request)
    {
        if ($request->ajax()) {
            $asignacionHecho['empleado_id'] = (int)$request['funcionario'];
            $hechoActualizar = HechosTutela::findOrFail($request['hecho'])->update($asignacionHecho);
            return response()->json(['mensaje' => 'ok', 'data' => $hechoActualizar]);
        } else {
            abort(404);
        }
    }

    public function asignacion_pretension_guardar(Request $request)
    {
        if ($request->ajax()) {
            $asignacionPretension['empleado_id'] = (int)$request['funcionario'];
            $pretensionActualizar = PretensionesTutela::findOrFail($request['pretension'])->update($asignacionPretension);
            return response()->json(['mensaje' => 'ok', 'data' => $pretensionActualizar]);
        } else {
            abort(404);
        }
    }

    public function historial_hecho_guardar(Request $request)
    {
        if ($request->ajax()) {
            $asignacionHistorial['auto_admisorio_id'] = $request['idAuto'];
            $asignacionHistorial['hechos_tutela_id'] = $request['idHecho'];
            $asignacionHistorial['empleado_id'] = session('id_usuario');
            $asignacionHistorial['historial'] = $request['mensajeHistorial'];
            $historial = HistorialHecho::create($asignacionHistorial);
            return response()->json(['mensaje' => 'ok', 'data' => $historial]);
        } else {
            abort(404);
        }
    }

    public function historial_respuesta_hecho_guardar(Request $request)
    {
        if ($request->ajax()) {
            $asignacionHistorial['respuesta_hecho_id'] = $request['respuesta_hecho_id'];
            $asignacionHistorial['empleado_id'] = session('id_usuario');
            $asignacionHistorial['historial'] = $request['historial'];
            $historial = HistorialRespuestaHecho::create($asignacionHistorial);
            return response()->json(['mensaje' => 'ok', 'data' => $historial]);
        } else {
            abort(404);
        }
    }

    public function historial_pretension_guardar(Request $request)
    {
        if ($request->ajax()) {
            $asignacionHistorial['auto_admisorio_id'] = $request['idAuto'];
            $asignacionHistorial['pretensiones_tutela_id'] = $request['idPretension'];
            $asignacionHistorial['empleado_id'] = session('id_usuario');
            $asignacionHistorial['historial'] = $request['mensajeHistorial'];
            $historial = HistorialPretension::create($asignacionHistorial);
            return response()->json(['mensaje' => 'ok', 'data' => $historial]);
        } else {
            abort(404);
        }
    }

    public function historial_respuesta_pretension_guardar(Request $request)
    {
        if ($request->ajax()) {
            $asignacionHistorial['respuesta_pretension_id'] = $request['respuesta_pretension_id'];
            $asignacionHistorial['empleado_id'] = session('id_usuario');
            $asignacionHistorial['historial'] = $request['historial'];
            $historial = HistorialRespuestaPretension::create($asignacionHistorial);
            return response()->json(['mensaje' => 'ok', 'data' => $historial]);
        } else {
            abort(404);
        }
    }

    public function respuesta_pretension_guardar(Request $request)
    {
        if ($request->ajax()) {
            $respuesta['auto_admisorio_id'] = $request["id_auto"];
            $respuesta['respuesta'] = $request["respuesta"];
            $respuesta['estado_id'] = $request["estado"];
            $respuesta['empleado_id'] = session('id_usuario');
            $respuesta['fecha'] = date("Y-m-d");
            $respuestaPretension = RespuestaPretensiones::create($respuesta);
            $id_respuesta = $respuestaPretension['id'];
            return response()->json(['mensaje' => 'ok', 'data' => $id_respuesta]);
        } else {
            abort(404);
        }
    }

    public function respuesta_hecho_guardar(Request $request)
    {
        if ($request->ajax()) {
            $respuesta['auto_admisorio_id'] = $request["id_auto"];
            $respuesta['respuesta'] = $request["respuesta"];
            $respuesta['estado_id'] = $request["estado"];
            $respuesta['empleado_id'] = session('id_usuario');
            $respuesta['fecha'] = date("Y-m-d");
            $respuestaHecho = RespuestaHechos::create($respuesta);
            $id_respuesta = $respuestaHecho['id'];
            return response()->json(['mensaje' => 'ok', 'data' => $id_respuesta]);
        } else {
            abort(404);
        }
    }

    public function respuesta_pretension_editar_guardar(Request $request)
    {
        if ($request->ajax()) {
            if($request['respuesta']){
                $respuestaActualizada['respuesta'] = $request['respuesta'];
                $respuestaActualizada['estado_id'] = $request['estado'];
            }
            if($request['funcionario']){
                $respuestaActualizada['empleado_id'] = $request['funcionario'];
            }
            $respuesta = RespuestaPretensiones::findOrFail($request['id_respuesta'])->update($respuestaActualizada);
            return response()->json(['mensaje' => 'ok', 'data' => $respuesta]);
        } else {
            abort(404);
        }
    }

    public function respuesta_hecho_editar_guardar(Request $request)
    {
        if ($request->ajax()) {
            if($request['respuesta']){
                $respuestaActualizada['respuesta'] = $request['respuesta'];
                $respuestaActualizada['estado_id'] = $request['estado'];
            }
            if($request['funcionario']){
                $respuestaActualizada['empleado_id'] = $request['funcionario'];
            }
            $respuesta = RespuestaHechos::findOrFail($request['id_respuesta'])->update($respuestaActualizada);
            return response()->json(['mensaje' => 'ok', 'data' => $respuesta]);
        } else {
            abort(404);
        }
    }

    public function respuesta_pretension_anexo_guardar(Request $request)
    {
        if ($request->ajax()) {
            $documentos = $request->allFiles();
            if ($request->hasFile('archivo')) {
                $ruta = Config::get('constantes.folder_pretensiones');
                $ruta = trim($ruta);
                $doc_subido = $documentos["archivo"];
                $tamaño = $doc_subido->getSize();
                if ($tamaño > 0) {
                    $tamaño = $tamaño / 1000;
                }
                $nombre_doc = time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName()));
                $nuevo_documento['respuesta_pretensiones_id'] = $request["respuesta_pretensiones_id"];
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
                $respuesta = DocRespuestaPretension::create($nuevo_documento);
            }

            return response()->json(['mensaje' => 'ok', 'data' => $respuesta]);
        } else {
            abort(404);
        }
    }

    public function respuesta_hecho_anexo_guardar(Request $request)
    {
        if ($request->ajax()) {
            $documentos = $request->allFiles();
            if ($request->hasFile('archivo')) {
                $ruta = Config::get('constantes.folder_hechos');
                $ruta = trim($ruta);
                $doc_subido = $documentos["archivo"];
                $tamaño = $doc_subido->getSize();
                if ($tamaño > 0) {
                    $tamaño = $tamaño / 1000;
                }
                $nombre_doc = time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName()));
                $nuevo_documento['respuesta_hechos_id'] = $request["respuesta_hechos_id"];
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
                $respuesta = DocRespuestaHecho::create($nuevo_documento);
            }

            return response()->json(['mensaje' => 'ok', 'data' => $respuesta]);
        } else {
            abort(404);
        }
    }

    public function relacion_respuesta_hecho_guardar(Request $request)
    {
        if ($request->ajax()) {
            $relacion['auto_admisorio_id'] = $request["id_auto"];
            $relacion['hecho_tutela_id'] = $request["id_hecho"];
            $relacion['respuesta_hechos_id'] = $request["id_respuesta"];
            $respuestaRelacion = RelacionHecho::create($relacion);
            return response()->json(['mensaje' => 'ok', 'data' => $respuestaRelacion]);
        } else {
            abort(404);
        }
    }

    public function estado_respuesta_hecho_guardar(Request $request)
    {
        if ($request->ajax()) {
            $hechos = RelacionHecho::where('respuesta_hechos_id', $request["id_respuesta"])->get();
            foreach ($hechos as $hecho) {
                $nuevoEstado['estado_id'] = $request["estado"];
                $respuesta = HechosTutela::findOrFail($hecho['hecho_tutela_id'])->update($nuevoEstado);
            }
            $nuevoEstado['estado_id'] = $request["estado"];
            $respuesta = RespuestaHechos::findOrFail($request['id_respuesta'])->update($nuevoEstado);
            return response()->json(['mensaje' => 'ok', 'data' => $respuesta]);
        } else {
            abort(404);
        }
    }

    public function eliminar_respuesta_hecho_guardar(Request $request)
    {
        if ($request->ajax()) {
            $relacionHecho = RelacionHecho::where('hecho_tutela_id', $request["hecho_id"])->get();
            $relacionHecho = $relacionHecho[0];
            $respuestaHechos = RespuestaHechos::findOrFail($relacionHecho['respuesta_hechos_id']);
            if(sizeOf($respuestaHechos->relacion) == 1 ){
                RelacionHecho::where('hecho_tutela_id', $request["hecho_id"])->delete();
                $anexos = DocRespuestaHecho::where('respuesta_hechos_id', $respuestaHechos['id'])->get();
                if(sizeOf($anexos)){
                    foreach ($anexos as $anexo) {
                        DocRespuestaHecho::where('respuesta_hechos_id', $anexo['id'])->delete();
                    }
                }
                $historiales = HistorialRespuestaHecho::where('respuesta_hecho_id', $respuestaHechos['id'])->get();
                if(sizeOf($historiales)){
                    foreach ($historiales as $historial) {
                        HistorialRespuestaHecho::where('respuesta_hecho_id', $historial['id'])->delete();
                    }
                }
                RespuestaHechos::findOrFail($relacionHecho['respuesta_hechos_id'])->delete();
                $nuevoEstado['estado_id'] = 1;
                HechosTutela::findOrFail($relacionHecho['hecho_tutela_id'])->update($nuevoEstado);
            }else {
                RelacionHecho::where('hecho_tutela_id', $request["hecho_id"])->delete();
                $nuevoEstado['estado_id'] = 1;
                HechosTutela::findOrFail($relacionHecho['hecho_tutela_id'])->update($nuevoEstado);
            }
            return response()->json(['mensaje' => 'ok', 'data' => 'ok']);
        } else {
            abort(404);
        }
    }

    public function relacion_respuesta_pretension_guardar(Request $request)
    {
        if ($request->ajax()) {
            $relacion['auto_admisorio_id'] = $request["id_auto"];
            $relacion['pretension_tutela_id'] = $request["id_pretension"];
            $relacion['respuesta_pretensiones_id'] = $request["id_respuesta"];
            $respuestaRelacion = RelacionPretension::create($relacion);
            return response()->json(['mensaje' => 'ok', 'data' => $respuestaRelacion]);
        } else {
            abort(404);
        }
    }

    public function estado_respuesta_pretension_guardar(Request $request)
    {
        if ($request->ajax()) {
            $pretensiones = RelacionPretension::where('respuesta_pretensiones_id', $request["id_respuesta"])->get();
            foreach ($pretensiones as $pretension) {
                $nuevoEstado['estado_id'] = $request["estado"];
                PretensionesTutela::findOrFail($pretension['pretension_tutela_id'])->update($nuevoEstado);
            }
            $nuevoEstado['estado_id'] = $request["estado"];
            $respuesta = RespuestaPretensiones::findOrFail($request['id_respuesta'])->update($nuevoEstado);
            return response()->json(['mensaje' => 'ok', 'data' => $respuesta]);
        } else {
            abort(404);
        }
    }

    public function eliminar_respuesta_pretension_guardar(Request $request)
    {
        if ($request->ajax()) {
            $relacionPretension = RelacionPretension::where('pretension_tutela_id', $request["pretension_id"])->get();
            $relacionPretension = $relacionPretension[0];
            $respuestaPretensiones = RespuestaPretensiones::findOrFail($relacionPretension['respuesta_pretensiones_id']);
            if(sizeOf($respuestaPretensiones->relacion) == 1 ){
                RelacionPretension::where('pretension_tutela_id', $request["pretension_id"])->delete();
                $anexos = DocRespuestaPretension::where('respuesta_pretensiones_id', $respuestaPretensiones['id'])->get();
                if(sizeOf($anexos)){
                    foreach ($anexos as $anexo) {
                        DocRespuestaPretension::where('respuesta_pretensiones_id', $anexo['id'])->delete();
                    }
                }
                $historiales = HistorialRespuestaPretension::where('respuesta_pretension_id', $respuestaPretensiones['id'])->get();
                if(sizeOf($historiales)){
                    foreach ($historiales as $historial) {
                        HistorialRespuestaPretension::where('respuesta_pretension_id', $historial['id'])->delete();
                    }
                }
                RespuestaPretensiones::findOrFail($relacionPretension['respuesta_pretensiones_id'])->delete();
                $nuevoEstado['estado_id'] = 1;
                PretensionesTutela::findOrFail($relacionPretension['pretension_tutela_id'])->update($nuevoEstado);
            }else {
                RelacionPretension::where('pretension_tutela_id', $request["pretension_id"])->delete();
                $nuevoEstado['estado_id'] = 1;
                PretensionesTutela::findOrFail($relacionPretension['pretension_tutela_id'])->update($nuevoEstado);
            }
            return response()->json(['mensaje' => 'ok', 'data' => 'ok']);
        } else {
            abort(404);
        }
    }

    public function respuesta_tutela($id)
    {
        $tutela = AutoAdmisorio::findOrFail($id);
        $resuelves =ResuelveTutela::where('auto_admisorio_id', $id)->orderBy('orden')->get();
        $imagen = public_path('imagenes\sistema\icono_sistema.png');
        $firma  = '';
        return view('intranet.funcionarios.tutela.tutela_tareas.respuesta_tutela', compact('tutela', 'imagen', 'resuelves', 'firma'));
    }

    public function descarga_respuesta_tutela($id)
    {
        $respuesta = TutelaRespuesta::findOrFail($id);
        $tutela =$respuesta->tutela;
        $pdf = PDF::loadHTML($respuesta->respuesta);
        return $pdf->download( 'Respuesta-'. $tutela->radicado . '.pdf');
    }

    public function tutela_respuesta_guardar(Request $request)
    {
        if ($request->ajax()) {
            if($request["idTarea"] == 4){
                $tutela = AutoAdmisorio::findOrFail($request["idAuto"]);
                // $imagen = public_path('imagenes\sistema\logo_mgl.png');
                // $firma = public_path('documentos\usuarios\\' . $tutela->empleadoasignado->url);
                $imagen = asset('imagenes/sistema/logo_mgl.png'); //url_servidor
                $firma = asset('documentos/usuarios/' . $tutela->empleado->url); //url_servidor
                $resuelves = ResuelveTutela::where('auto_admisorio_id', $request["idAuto"])->orderBy('orden')->get();
                $rPdf['respuesta'] = view('intranet.funcionarios.tutela.tutela_tareas.respuesta_tutela', compact('tutela', 'imagen', 'resuelves', 'firma'));
                $rPdf['auto_admisorio_id'] = $request["idAuto"];
                $rPdf['tipo_respuesta'] = $request["tipo_respuesta"];
                $rPdf['tareas_id'] = $request["idTarea"];
                $rPdf['empleado_id'] = session('id_usuario');
                $rrr = TutelaRespuesta::create($rPdf);
            }
            $tutela = AutoAdmisorio::findOrfail($request["idAuto"]);
            // $pqr_id = $pqr->id;
            // if ($pqr->persona_id != null) {
            //     $email = $pqr->persona->email;
            // }elseif($pqr->empresa_id != null){
            //     $email = $pqr->empresa->email;
            // } 
            if($request["idTarea"] == 4 && $request["apruebaRadica"] ){
                // if($email){
                //     Mail::to($email)->send(new RespuestaPQR($pqr_id));
                // }
            }
            if( ($request["idTarea"] == 4 && $request["apruebaRadica"]) || $request["idTarea"] == 5 ){
                $tutelaEstado['estadostutela_id'] = 4;
                AutoAdmisorio::findOrFail($tutela->id)->update($tutelaEstado);
            }
        return response()->json(['mensaje' => 'ok', 'data' => $rPdf]);
    } else {
        abort(404);
    }
    }

    public function cambiar_estado_tareas_tutela_guardar(Request $request)
    {
        if ($request->ajax()) {
            if($request['estado']){
                $estado['estado_id'] = $request['estado'];
                $tarea = $request['idTarea'] - 1;
            }else{
                $estado['estado_id'] = 11;
                $tarea = $request['idTarea'];
            }
            $respuesta = AsignacionTarea::where('auto_admisorio_id',$request['idAuto'])->where('tareas_id',$tarea)->update($estado);
            if($request['idTarea'] == 5){
                AsignacionTarea::where('auto_admisorio_id',$request['idAuto'])->where('tareas_id', 1)->update($estado);
            }
            return response()->json(['mensaje' => 'ok', 'data' => $respuesta]);
        } else {
            abort(404);
        }
    }


    public function historial_resuelve_tutela_guardar(Request $request)
    {
        if ($request->ajax()) {
            $resuelves = ResuelveTutela::where('auto_admisorio_id', $request['idAuto'])->get();
            $resuelve['orden'] = $resuelves->count() + 1;
            $resuelve['auto_admisorio_id'] = $request['idAuto'];
            $resuelve['empleado_id'] = session('id_usuario');
            $resuelve['resuelve'] = $request['mensajeResuelve'];
            $respuesta = ResuelveTutela::create($resuelve);
            return response()->json(['mensaje' => 'ok', 'data' => $respuesta]);
        } else {
            abort(404);
        }
    }

    public function historial_resuelve_tutela_eliminar(Request $request)
    {
        if ($request->ajax()) {
            $resuelve = ResuelveTutela::findOrFail($request['value']);
            $index = $resuelve['orden'];
            $tutela = $resuelve->auto_admisorio_id;
            $respuesta = $resuelve->delete(); 
            $resuelves = ResuelveTutela::where('auto_admisorio_id', $tutela)->get(); 
            foreach ($resuelves as $key => $resuel) {
                if($index < $resuel['orden'] ){
                    $orden['orden'] =  $resuel['orden'] - 1;
                    ResuelveTutela::findOrFail($resuel->id)->update($orden);
                }
            }
            return response()->json(['mensaje' => 'ok', 'data' => $respuesta]);
        } else {
            abort(404);
        }
    }

    public function resuelve_orden_tutela_guardar(Request $request)
    {
        if ($request->ajax()) {
            $resuelve['orden'] = $request['orden'];
            $respuesta = ResuelveTutela::findOrFail($request['id'])->update($resuelve);
            return response()->json(['mensaje' => 'ok', 'data' => $respuesta]);
        } else {
            abort(404);
        }
    }

    public function historial_resuelve_tutela_editar(Request $request)
    {
        if ($request->ajax()) {
            $resuelve['resuelve'] = $request['resuelveNuevo'];
            $respuesta = ResuelveTutela::findOrFail($request['value'])->update($resuelve);
            return response()->json(['mensaje' => 'ok', 'data' => $respuesta]);
        } else {
            abort(404);
        }
    }

    public function cargar_nombre_despachos(Request $request)
    {
        if ($request->ajax()) {
            $id = $_GET['id'];
            return Despachos::where('jurisdiccion', $id)->get();
        }
    }

    public function cargar_ubicacion_despachos(Request $request)
    {
        if ($request->ajax()) {
            $id = $_GET['id'];
            return Despachos::findOrfail($id);
        }
    }

    public function vista_tutela($id)
    {
        $tutela = AutoAdmisorio::findOrfail($id);
        return view('intranet.funcionarios.tutela.vista', compact('tutela'));
    }
}
