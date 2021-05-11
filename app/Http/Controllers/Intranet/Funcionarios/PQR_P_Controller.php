<?php

namespace App\Http\Controllers\Intranet\Funcionarios;

use App\Models\PQR\PQR;
use Illuminate\Http\Request;
use App\Models\Admin\Usuario;
use App\Http\Controllers\Controller;
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
        return view('intranet.funcionario.listado');
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
