<?php

namespace App\Http\Controllers\Intranet\Funcionarios;

use App\Models\PQR\PQR;
use App\Models\PQR\Peticion;
use Illuminate\Http\Request;
use App\Models\Admin\Usuario;
use App\Models\PQR\Respuesta;
use App\Models\PQR\Aclaracion;
use App\Models\PQR\DocRespuesta;
use App\Http\Controllers\Controller;
use App\Models\PQR\AclaracionAnexos;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\Fechas\FechasController;

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
        $pqr = PQR::findOrfail($request['id_pqr']);
        $validacionProrroga = PQR::findOrFail($request['id_pqr']);
        if(isset($request['prorroga'])){
            if($validacionProrroga->prorroga == 0 && $request['plazo_prorroga'] != null && $request['prorroga_pdf'] != null){
                $actualizarPqr['prorroga'] = $request['prorroga']; 
                $actualizarPqr['prorroga_dias'] = $request['plazo_prorroga'];
                $actualizarPqr['prorroga_pdf'] = $request['prorroga_pdf'];
                $nuevoLimite = $pqr->tipoPqr->tiempos + $request['plazo_prorroga'];
                $respuestaDias = FechasController::festivos($nuevoLimite, $pqr['fecha_generacion']);
                $actualizarPqr['tiempo_limite'] = $respuestaDias;
                PQR::findOrFail($request['id_pqr'])->update($actualizarPqr);    
            }
        } 
        $documentos = $request->allFiles();
        $totalPeticiones = $request['totalPeticiones'];
        $contadorAclaraciones = 0;
        $iteradorAclaraciones = 0;
        $contadorAnexos = 0;
        $iteradorAnexos = 0;
        // dd($request->all());
        for ($i = 0; $i < $totalPeticiones; $i++) {
            $actualizarPeticion['aclaracion'] = $request["aclaracion_check$i"];
            Peticion::findOrFail($request["id_peticion$i"])->update($actualizarPeticion);
            $contadorAclaraciones += $request["totalPeticionAclaraciones$i"];
            for ($j = $iteradorAclaraciones; $j < $contadorAclaraciones; $j++) {
                if($request["solicitud_aclaracion$j"] != null){
                    // dd($request->all());
                    $nuevaAclaracion['peticion_id'] = $request["id_peticion$i"];
                    $nuevaAclaracion['fecha'] = date("Y-m-d");
                    $nuevaAclaracion['tipo_solicitud'] = $request["tipo_aclaracion$j"];
                    $nuevaAclaracion['aclaracion'] = $request["solicitud_aclaracion$j"];
                    Aclaracion::create($nuevaAclaracion);
                }
            } 
            $contadorAnexos += $request["totalPeticionAnexos$i"];
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
        return redirect('/funcionario/listado');
    }


    public function gestionar_guardar_usuario (Request $request)
    {
        // dd($request->all());
        $contadorAnexos = 0;
        $iteradorAnexos = 0;
        $documentos = $request->allFiles();
        for ($i = 0; $i < $request['totalGeneralaclaraciones']; $i++) {
            if($request["aclaracionRespuesta$i"]){
                $aclaracion['respuesta'] = $request["aclaracionRespuesta$i"];
                $aclaracion['fecha_respuesta'] = date("Y-m-d");
                Aclaracion::findOrFail($request["id_aclaracion$i"])->update($aclaracion); 
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
        return redirect('/usuario/listado');
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
