<?php

namespace App\Http\Controllers\Intranet\Funcionarios;

use App\Models\PQR\PQR;
use App\Models\PQR\Peticion;
use Illuminate\Http\Request;
use App\Models\Admin\Usuario;
use App\Models\PQR\Respuesta;
use App\Models\PQR\Aclaracion;
use App\Http\Controllers\Controller;
use App\Models\PQR\DocRespuesta;
use Illuminate\Support\Facades\Config;

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

        return view('intranet.funcionarios.pqr_p.gestion', compact('pqr'));
    }

    public function gestionar_guardar(Request $request)
    {
        // $usuario = Usuario::findOrFail(session('id_usuario'));
        // dd($usuario->empleado->id);
        // $actualizarPqr['empresa_id'] = $usuario->empleado->id;
        // dd($request->all()); 
        
        if(isset($request['prorroga'])){
            $actualizarPqr['prorroga'] = $request['prorroga']; 
            $actualizarPqr['prorroga_dias'] = $request['plazo_prorroga'];
            $documentos = $request->allFiles();
            if ($request->hasFile("documentos_prorroga")) {
                $ruta = Config::get('constantes.folder_doc_pqr');
                $ruta = trim($ruta);
                $doc_subido = $documentos["documentos_prorroga"];
                $tamaño = $doc_subido->getSize();
                if ($tamaño > 0) {
                    $tamaño = $tamaño / 1000;
                }
                $nombre_doc = time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName()));
                $actualizarPqr['extension'] = $doc_subido->getClientOriginalExtension();
                $actualizarPqr['peso'] = $tamaño;
                $actualizarPqr['prorroga_pdf'] = $nombre_doc;
                $doc_subido->move($ruta, $nombre_doc);
            }
            PQR::findOrFail($request['id_pqr'])->update($actualizarPqr);    
        } 
        // dd($request->all()); 
        $documentos = $request->allFiles();
        $totalPeticiones = $request['totalPeticiones'];
        $contadorAclaraciones = 0;
        $iteradorAclaraciones = 0;
        $contadorAnexos = 0;
        $iteradorAnexos = 0;
        for ($i = 0; $i < $totalPeticiones; $i++) {
            $actualizarPeticion['aclaracion'] = $request["aclaracion_check$i"];
            Peticion::findOrFail($request["id_peticion$i"])->update($actualizarPeticion);
            $contadorAclaraciones += $request["totalPeticionAclaraciones$i"];
            $contadorAnexos += $request["totalPeticionAnexos$i"];
            for ($j = $iteradorAclaraciones; $j < $contadorAclaraciones; $j++) {
                if($request["aclaracion$i"]){
                    $nuevaAclaracion['peticion_id'] = $request["id_peticion$i"];
                    $nuevaAclaracion['aclaracion'] = $request["aclaracion$j"];
                    $nuevaAclaracion['fecha'] = date("Y-m-d");
                    Aclaracion::create($nuevaAclaracion);
                }
            } 
            if($request["respuesta$i"]){
                $respuesta['peticion_id'] = $request["id_peticion$i"];
                $respuesta['fecha'] = date("Y-m-d");
                $respuesta['respuesta'] = $request["respuesta$i"];
                $respuestaPQR = Respuesta::create($respuesta);  
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
        // dd($totalPeticiones); 

        return redirect('/funcionario/listado');
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
