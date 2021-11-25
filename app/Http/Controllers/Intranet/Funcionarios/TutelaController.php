<?php

namespace App\Http\Controllers\Intranet\Funcionarios;

use Illuminate\Http\Request;
use App\Models\Tutela\Accions;
use App\Models\Tutela\Acccions;
use App\Models\Tutela\Despachos;
use App\Http\Controllers\Controller;
use App\Models\Tutela\AnexoTutela;
use App\Models\Tutela\ArgumentosTutela;
use App\Models\Tutela\AutoAdmisorio;
use App\Models\Tutela\HechosTutela;
use App\Models\Tutela\MotivosTutela;
use App\Models\Tutela\PretensionesTutela;
use App\Models\Tutela\PruebasTutela;
use Illuminate\Support\Facades\Config;

class TutelaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function auto_admisorio_complemento($id)
    {
        return view('intranet.funcionarios.tutela.registro_complemento', compact('id'));
    }

    public function crear_auto_admisorio(Request $request)
    {
        if ($request->ajax()) {
            $nuevo_auto_admisorio['empleado_rigistro_id'] = session('id_usuario');
            $nuevo_auto_admisorio['empleado_asignado_id'] = session('id_usuario');
            // $nuevo_auto_admisorio['fecha_generacion'] = $request['fecha_generacion'];
            // $nuevo_auto_admisorio['fecha_radicado'] = $request['fecha_radicado'];
            $nuevo_auto_admisorio['radicado'] = $request['radicado'];
            $nuevo_auto_admisorio['jurisdiccion'] = $request['jurisdiccion'];
            $nuevo_auto_admisorio['juzgado'] = $request['juzgado'];
            $nuevo_auto_admisorio['departamento'] = $request['departamento'];
            $nuevo_auto_admisorio['municipio'] = $request['municipio'];
            $nuevo_auto_admisorio['fecha_notificacion'] = $request['fecha_notificacion'];
        
            $nuevo_auto_admisorio['nombre_juez'] = $request['nombreApellido_juez'];
            $nuevo_auto_admisorio['direccion_juez'] = $request['direccion_juez'];
            $nuevo_auto_admisorio['telefono_juez'] = $request['telefono_fijo_juez'];
            $nuevo_auto_admisorio['correo_juez'] = $request['correo_juez'];

            $nuevo_auto_admisorio['dias_termino'] = $request['cantidad_dias'];
            $nuevo_auto_admisorio['horas_termino'] = $request['cantidad_horas'];

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
}
