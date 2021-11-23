<?php

namespace App\Http\Controllers\Intranet\Funcionarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TutelaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function auto_admisorio_complemento(Request $request)
    {
        return view('intranet.funcionarios.tutela.registro_complemento');
    }

    public function crear_auto_admisorio(Request $request)
    {
        if ($request->ajax()) {
            // $documentos = $request->allFiles();
            // if ($request->hasFile("archivo")) {
            //     $ruta = Config::get('constantes.folder_doc_respuestas');
            //     $ruta = trim($ruta);
            //     $doc_subido = $documentos["archivo"];
            //     $tamaño = $doc_subido->getSize();
            //     if ($tamaño > 0) {
            //         $tamaño = $tamaño / 1000;
            //     }
            //     $nombre_doc = time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName()));
            //     $nuevo_documento['aclaracion_id'] = $request["respuesta_id"];
            //     $nuevo_documento['titulo'] = $request["titulo"];
            //     if ($request["descripcion"]) {
            //         $nuevo_documento['descripcion'] = $request["descripcion"];
            //     } else {
            //         $nuevo_documento['descripcion'] = '';
            //     }
            //     $nuevo_documento['extension'] = $doc_subido->getClientOriginalExtension();
            //     $nuevo_documento['peso'] = $tamaño;
            //     $nuevo_documento['url'] = $nombre_doc;
            //     $doc_subido->move($ruta, $nombre_doc);
            //     $respuesta = AclaracionAnexos::create($nuevo_documento);
            // }
            return view('intranet.funcionario.tutela.crear_auto_admisorio_complemento');
            // return response()->json(['mensaje' => 'ok', 'data' => '$nuevo_documento']);
        } else {
            abort(404);
        }
        // $peticiones = Peticion::where('empleado_id', session('id_usuario'))->get();
        // $pqr = PQR::where('empleado_id', session('id_usuario'))->get();
        // $estados = AsignacionEstado::get();
        // return view('intranet.funcionarios.listado_pqr', compact('pqr', 'peticiones', 'estados'));
    }
}
