<?php

namespace App\Http\Controllers\Intranet\Empresas;

use App\Http\Controllers\Controller;
use App\Models\Admin\WikuArea;
use App\Models\Admin\WikuDocument;
use App\Models\Admin\WikuNorma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class WikuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fuentes = WikuDocument::all();
        $normas = WikuNorma::all();
        return view('intranet.parametros.wiku.index', compact('normas', 'fuentes'));
    }

    public function index_fuenteN()
    {
        $fuentes = WikuDocument::all();
        return view('intranet.parametros.wiku.fuentes.index', compact('fuentes'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear_fuente()
    {
        return view('intranet.parametros.wiku.fuentes.crear');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar_fuenteN(Request $request)
    {
        $nueva_fuente['fuente'] = $request['fuente'];
        $nueva_fuente['numero'] = $request['numero'];
        $nueva_fuente['fecha'] = $request['fecha'];
        $nueva_fuente['emisor'] = $request['emisor'];
        //------------------------------------------
        if ($request->hasFile('archivo')) {
            $ruta = Config::get('constantes.folder_doc_fuentes');
            $ruta = trim($ruta);
            $doc_subido = $request->archivo;
            $nombre_doc = time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName()));
            $nueva_fuente['archivo'] = $nombre_doc;
            $doc_subido->move($ruta, $nombre_doc);
        }
        WikuDocument::create($nueva_fuente);
        return redirect('admin/funcionario/wiku/index_fuenteN')->with('mensaje', 'Fuente creada con exito.');
    }

    public function crear_norma()
    {
        $fuentes = WikuDocument::all();
        $areas = WikuArea::all();
        return view('intranet.parametros.wiku.normas.crear', compact('fuentes', 'areas'));
    }
    public function guardar_norma(Request $request)
    {
        WikuNorma::create($request->all());
        return redirect('admin/funcionario/wiku/index')->with('mensaje', 'Norma creada con exito.');
    }
    public function editar_norma($id)
    {
        $fuentes = WikuDocument::all();
        $norma = WikuNorma::findOrFail($id);
        $areas = WikuArea::all();
        return view('intranet.parametros.wiku.normas.editar', compact('norma', 'fuentes', 'areas'));
    }
    public function norma_area($id)
    {
        $norma = WikuNorma::findOrFail($id);
        return view('intranet.parametros.wiku.normas.area', compact('norma'));
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
