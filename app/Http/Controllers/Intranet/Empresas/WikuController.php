<?php

namespace App\Http\Controllers\Intranet\Empresas;

use App\Http\Controllers\Controller;
use App\Models\Admin\WikuArea;
use App\Models\Admin\WikuCriterio;
use App\Models\Admin\WikuDocument;
use App\Models\Admin\WikuNorma;
use App\Models\Admin\WikuPalabras;
use App\Models\Admin\WikuTema;
use App\Models\Admin\WikuTemaEspecifico;
use App\Models\PQR\tipoPQR;
use App\Models\Productos\Categoria;
use App\Models\Servicios\Servicio;
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
        $temasEspecifico = WikuTemaEspecifico::all();
        $areas = WikuArea::all();
        return view('intranet.parametros.wiku.normas.crear', compact('fuentes', 'temasEspecifico', 'areas'));
    }
    public function guardar_norma(Request $request)
    {
        WikuNorma::create($request->all());
        return redirect('admin/funcionario/wiku/index')->with('mensaje', 'Norma creada con exito.');
    }
    public function editar_norma($id)
    {
        $fuentes = WikuDocument::all();
        $temasEspecifico = WikuTemaEspecifico::all();
        $areas = WikuArea::all();
        $norma = WikuNorma::findOrFail($id);
        return view('intranet.parametros.wiku.normas.editar', compact('norma', 'fuentes', 'temasEspecifico', 'areas'));
    }
    public function actualizar_norma(Request $request, $id)
    {
        WikuNorma::findOrFail($id)->update($request->all());
        return redirect('admin/funcionario/wiku/index')->with('mensaje', 'Norma actualizada con exito.');
    }
    public function cargar_temasespec(Request $request)
    {
        if ($request->ajax()) {
            $id = $_GET['id'];
            return WikuTemaEspecifico::where('tema_id', $id)->get();
        }
    }
    //*************************************************************************************************** */
    public function volver_temaespecifico($id, $wiku)
    {
        if ($wiku == 'norma') {
            if ($id == 0) {
                $areas = WikuArea::all();
                $fuentes = WikuDocument::all();
                $temasEspecifico = WikuTemaEspecifico::all();
                return view('intranet.parametros.wiku.normas.crear', compact('fuentes', 'temasEspecifico', 'areas'));
            } else {
                $fuentes = WikuDocument::all();
                $norma = WikuNorma::findOrFail($id);
                $areas = WikuArea::all();
                $temasEspecifico = WikuTemaEspecifico::all();
                return view('intranet.parametros.wiku.normas.editar', compact('norma', 'fuentes', 'areas', 'temasEspecifico'));
            }
        }
    }
    public function index_temaespecifico($id, $wiku)
    {
        $temasEspecificos = WikuTemaEspecifico::all();
        $temas = WikuTema::all();
        return view('intranet.parametros.wiku.areas_temas.temasespecificos.index', compact('temasEspecificos', 'temas', 'id', 'wiku'));
    }
    public function crear_temaespecifico($id, $wiku)
    {
        $areas = WikuArea::all();
        return view('intranet.parametros.wiku.areas_temas.temasespecificos.crear', compact('id', 'wiku', 'areas'));
    }
    public function guardar_temaespecifico(Request $request, $id, $wiku)
    {
        WikuTemaEspecifico::create($request->all());
        $temasEspecificos = WikuTemaEspecifico::all();
        $temas = WikuTema::all();
        return redirect('admin/funcionario/wiku_temaespecifico/index/' . $id . '/' . $wiku)->with('mensaje', 'Tema Específico creada con éxito')->with('id')->with('wiku')->with('temasEspecificos')->with('temas');
    }
    public function editar_temaespecifico(Request $request, $id_especifico, $id, $wiku)
    {
        $areas = WikuArea::all();
        $temaespecif = WikuTemaEspecifico::findOrFail($id_especifico);
        return view('intranet.parametros.wiku.areas_temas.temasespecificos.editar', compact('areas', 'temaespecif', 'id', 'wiku'));
    }
    public function actualizar_temaespecifico(Request $request, $id_especifico, $id, $wiku)
    {
        WikuTemaEspecifico::findOrFail($id_especifico)->update($request->all());
        $temas = WikuTema::all();
        $areas = WikuArea::all();
        return redirect('admin/funcionario/wiku_temaespecifico/index/' . $id . '/' . $wiku)->with('mensaje', 'Tema actualizada con éxito')->with('id')->with('wiku')->with('temasEspecificos')->with('temas');
    }
    public function cargar_temas(Request $request)
    {
        if ($request->ajax()) {
            $id = $_GET['id'];
            return WikuTema::where('area_id', $id)->get();
        }
    }
    //*************************************************************************************************** */
    public function volver_tema($id, $wiku)
    {
        if ($wiku == 'norma') {
            if ($id == 0) {
                $temasEspecificos = WikuTemaEspecifico::all();
                $temas = WikuTema::all();
                return view('intranet.parametros.wiku.areas_temas.temasespecificos.index', compact('temasEspecificos', 'temas', 'id', 'wiku'));
            } else {
                $temasEspecificos = WikuTemaEspecifico::all();
                $temas = WikuTema::all();
                return view('intranet.parametros.wiku.areas_temas.temasespecificos.index', compact('temasEspecificos', 'temas', 'id', 'wiku'));
            }
        }
    }
    public function index_tema($id, $wiku)
    {
        $temas = WikuTema::all();
        $areas = WikuArea::all();
        return view('intranet.parametros.wiku.areas_temas.temas.index', compact('areas', 'temas', 'id', 'wiku'));
    }
    public function crear_tema($id, $wiku)
    {
        $areas = WikuArea::all();
        return view('intranet.parametros.wiku.areas_temas.temas.crear', compact('id', 'wiku', 'areas'));
    }
    public function guardar_tema(Request $request, $id, $wiku)
    {
        WikuTema::create($request->all());
        $areas = WikuArea::all();
        $temas = WikuTema::all();
        return redirect('admin/funcionario/wiku_tema/index/' . $id . '/' . $wiku)->with('mensaje', 'Tema creada con éxito')->with('id')->with('wiku')->with('areas')->with('temas');
    }
    public function editar_tema(Request $request, $id_tema, $id, $wiku)
    {
        $areas = WikuArea::all();
        $tema = WikuTema::findOrFail($id_tema);
        return view('intranet.parametros.wiku.areas_temas.temas.editar', compact('areas', 'tema', 'id', 'wiku'));
    }
    public function actualizar_tema(Request $request, $id_tema, $id, $wiku)
    {
        WikuTema::findOrFail($id_tema)->update($request->all());
        $temas = WikuTema::all();
        $areas = WikuArea::all();
        return redirect('admin/funcionario/wiku_tema/index/' . $id . '/' . $wiku)->with('mensaje', 'Tema actualizada con éxito')->with('id')->with('wiku')->with('areas')->with('temas');
    }
    //*************************************************************************************************** */
    public function volver_area($id, $wiku)
    {
        if ($wiku == 'norma') {
            if ($id == 0) {
                $temas = WikuTema::all();
                $areas = WikuArea::all();
                return view('intranet.parametros.wiku.areas_temas.temas.index', compact('areas', 'temas', 'id', 'wiku'));
            } else {
                $temas = WikuTema::all();
                $areas = WikuArea::all();
                return view('intranet.parametros.wiku.areas_temas.temas.index', compact('areas', 'temas', 'id', 'wiku'));
            }
        }
    }
    public function index_area($id, $wiku)
    {
        $areas = WikuArea::all();
        return view('intranet.parametros.wiku.areas_temas.areas.index', compact('areas', 'id', 'wiku'));
    }

    public function crear_area($id, $wiku)
    {
        return view('intranet.parametros.wiku.areas_temas.areas.crear', compact('id', 'wiku'));
    }
    public function guardar_area(Request $request, $id, $wiku)
    {
        WikuArea::create($request->all());
        $areas = WikuArea::all();
        return redirect('admin/funcionario/wiku_area/index/' . $id . '/' . $wiku)->with('mensaje', 'Área creada con éxito')->with('id')->with('wiku')->with('areas');
    }
    public function editar_area(Request $request, $id_area, $id, $wiku)
    {
        $area = WikuArea::findOrFail($id_area);
        return view('intranet.parametros.wiku.areas_temas.areas.editar', compact('area', 'id', 'wiku'));
    }
    public function actualizar_area(Request $request, $id_area, $id, $wiku)
    {
        WikuArea::findOrFail($id_area)->update($request->all());
        $areas = WikuArea::all();
        return redirect('admin/funcionario/wiku_area/index/' . $id . '/' . $wiku)->with('mensaje', 'Área actualizada con éxito')->with('id')->with('wiku')->with('areas');
    }
    //*************************************************************************************************** */

    public function wiku_volver_criterios($id, $wiku)
    {
        if ($wiku == 'norma') {

            $fuentes = WikuDocument::all();
            $temasEspecifico = WikuTemaEspecifico::all();
            $areas = WikuArea::all();
            $norma = WikuNorma::findOrFail($id);
            return view('intranet.parametros.wiku.normas.editar', compact('norma', 'fuentes', 'temasEspecifico', 'areas'));
        }
    }
    public function index_criterios($id, $wiku)
    {
        $norma = WikuNorma::findOrFail($id);
        $criterios = WikuCriterio::where('norma_id', $id)->get();
        return view('intranet.parametros.wiku.criterios.index', compact('norma', 'criterios', 'wiku'));
    }
    public function crear_criterios($id, $wiku)
    {
        return view('intranet.parametros.wiku.criterios.crear', compact('id', 'wiku'));
    }
    public function guardar_criterios(Request $request, $id, $wiku)
    {
        $nuevo_criterio = $request->all();
        unset($nuevo_criterio['tipo_criterio']);
        WikuCriterio::create($nuevo_criterio);
        $norma = WikuNorma::findOrFail($id);
        $criterios = WikuCriterio::where('norma_id', $id)->get();
        return redirect('/admin/funcionario/wiku_criterios/index/' . $id . '/norma')->with('mensaje', 'Criterio creado con éxito')->with('norma')->with('criterios')->with('wiku');
    }
    public function editar_criterios($id_criterios, $id, $wiku)
    {
        $criterio = WikuCriterio::findOrFail($id_criterios);
        return view('intranet.parametros.wiku.criterios.editar', compact('criterio', 'id', 'wiku'));
    }
    public function actualizar_criterios(Request $request, $id_criterios, $id, $wiku)
    {
        $nuevo_criterio = $request->all();
        unset($nuevo_criterio['tipo_criterio']);
        WikuCriterio::findOrFail($id_criterios)->update($nuevo_criterio);
        $norma = WikuNorma::findOrFail($id);
        $criterios = WikuCriterio::where('norma_id', $id)->get();
        return redirect('/admin/funcionario/wiku_criterios/index/' . $id . '/norma')->with('mensaje', 'Criterio actualizado con éxito')->with('norma')->with('criterios')->with('wiku');
    }
    //*************************************************************************************************** */

    public function wiku_volver_palabras($id, $wiku)
    {
        if ($wiku == 'norma') {

            $fuentes = WikuDocument::all();
            $temasEspecifico = WikuTemaEspecifico::all();
            $areas = WikuArea::all();
            $norma = WikuNorma::findOrFail($id);
            return view('intranet.parametros.wiku.normas.editar', compact('norma', 'fuentes', 'temasEspecifico', 'areas'));
        }
    }
    public function index_palabras($id, $wiku)
    {
        $norma = WikuNorma::findOrFail($id);
        /*$palabras = WikuPalabras::with('normas')->whereHas('normas', function ($q) use ($id) {
            $q->where('wiku_norma_id', $id);
        })->get();*/
        $palabras = WikuPalabras::all();

        return view('intranet.parametros.wiku.palabras.index', compact('norma', 'palabras', 'wiku'));
    }
    public function crear_palabras($id, $wiku)
    {
        return view('intranet.parametros.wiku.palabras.crear', compact('id', 'wiku'));
    }
    public function guardar_palabras(Request $request, $id, $wiku)
    {

        $palabras = WikuPalabras::with('normas')->whereHas('normas', function ($q) use ($id) {
            $q->where('wiku_norma_id', $id);
        })->get();
        foreach ($palabras as $palabra) {
            $palabras_norma[] = $palabra['id'];
        }
        $nueva_palabra = $request->all();
        unset($nueva_palabra['norma_id']);
        $palabraNueva = WikuPalabras::create($nueva_palabra);
        $palabras_norma[] = $palabraNueva->id;
        $norma = WikuNorma::findOrFail($id);
        $norma->palabras()->sync($palabras_norma);
        $palabras = WikuPalabras::all();
        return redirect('/admin/funcionario/wiku_palabras/index/' . $id . '/norma')->with('mensaje', 'Palabra creada con éxito y asociada a la norma')->with('norma')->with('palabras')->with('wiku');
    }
    public function editar_palabras($id_palabras, $id, $wiku)
    {
        $palabra = WikuPalabras::findOrFail($id_palabras);
        return view('intranet.parametros.wiku.palabras.editar', compact('palabra', 'id', 'wiku'));
    }
    public function actualizar_palabras(Request $request, $id_palabras, $id, $wiku)
    {
        $nueva_palabra = $request->all();
        unset($nueva_palabra['norma_id']);
        WikuPalabras::findOrFail($id_palabras)->update($nueva_palabra);
        $norma = WikuNorma::findOrFail($id);
        $palabras = WikuPalabras::all();
        return redirect('/admin/funcionario/wiku_palabras/index/' . $id . '/norma')->with('mensaje', 'Palabra actualizada con éxito')->with('norma')->with('palabras')->with('wiku');
    }
    public function wiku_palabras_eliminar(Request $request, $id)
    {
        if ($request->ajax()) {
            $palabra = WikuPalabras::findOrfail($id);
            if ($palabra->normas->count() == 0) {
                if (WikuPalabras::destroy($id)) {
                    return response()->json(['mensaje' => 'ok']);
                } else {
                    return response()->json(['mensaje' => 'ng']);
                }
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
    public function adicionar_palabras(Request $request, $id_palabras, $id)
    {
        if ($request->ajax()) {
            $palabra_ini = WikuPalabras::findOrfail($id_palabras);
            $norma = WikuNorma::findOrFail($id);
            $palabras = WikuPalabras::with('normas')->whereHas('normas', function ($q) use ($id) {
                $q->where('wiku_norma_id', $id);
            })->get();
            foreach ($palabras as $palabra) {
                $palabras_norma[] = $palabra['id'];
            }
            $palabras_norma[] = $palabra_ini->id;
            $norma->palabras()->sync($palabras_norma);
            return response()->json(['mensaje' => 'ok']);
        } else {
            abort(404);
        }
    }
    public function restar_palabras(Request $request, $id_palabras, $id)
    {
        if ($request->ajax()) {
            $normas = new WikuNorma();
            $normas->find($id)->palabras()->detach($id_palabras);
            return response()->json(['mensaje' => 'ok']);
        } else {
            abort(404);
        }
    }
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    public function wiku_volver_asociacion($id, $wiku)
    {
        if ($wiku == 'norma') {

            $fuentes = WikuDocument::all();
            $temasEspecifico = WikuTemaEspecifico::all();
            $areas = WikuArea::all();
            $norma = WikuNorma::findOrFail($id);
            return view('intranet.parametros.wiku.normas.editar', compact('norma', 'fuentes', 'temasEspecifico', 'areas'));
        }
    }
    public function crear_asociacion($id, $wiku)
    {
        $tipos_pqr = tipoPQR::get();
        $categorias = Categoria::get();
        $servicios = Servicio::get();
        return view('intranet.parametros.wiku.asociacion.crear', compact('id', 'wiku', 'tipos_pqr', 'categorias', 'servicios',));
    }
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
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
