<?php

namespace App\Http\Controllers\Intranet\Empresas;

use App\Http\Controllers\Controller;
use App\Models\Admin\WikuArea;
use App\Models\Admin\WikuArgCriterio;
use App\Models\Admin\WikuArgumento;
use App\Models\Admin\WikuAsociacion;
use App\Models\Admin\WikuAsociacionArg;
use App\Models\Admin\WikuAutor;
use App\Models\Admin\WikuAutorInst;
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
use Illuminate\Support\Facades\DB;

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
        $argumentos = WikuArgumento::with('autorInst', 'autor')->get();
        return view('intranet.parametros.wiku.index', compact('normas', 'fuentes', 'argumentos'));
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
        } elseif ($wiku == 'argumento') {
            if ($id == 0) {
                $temasEspecifico = WikuTemaEspecifico::all();
                $areas = WikuArea::all();
                $autoresInst = WikuAutorInst::all();
                $autores = WikuAutor::all();
                return view('intranet.parametros.wiku.argumentos.crear', compact(
                    'autoresInst',
                    'autores',
                    'temasEspecifico',
                    'areas'
                ));
            } else {
                $temasEspecifico = WikuTemaEspecifico::all();
                $areas = WikuArea::all();
                $autoresInst = WikuAutorInst::all();
                $autores = WikuAutor::all();
                $argumento = WikuArgumento::findOrFail($id);
                return view('intranet.parametros.wiku.argumentos.editar', compact(
                    'argumento',
                    'autoresInst',
                    'autores',
                    'areas',
                    'temasEspecifico'
                ));
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
        } elseif ($wiku == 'argumento') {
            $temasEspecifico = WikuTemaEspecifico::all();
            $areas = WikuArea::all();
            $argumento = WikuArgumento::findOrFail($id);
            $autoresInst = WikuAutorInst::all();
            $autores = WikuAutor::all();
            return view('intranet.parametros.wiku.argumentos.editar', compact(
                'argumento',
                'temasEspecifico',
                'areas',
                'autoresInst',
                'autores'
            ));
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
        } elseif ($wiku == 'argumento') {
            $temasEspecifico = WikuTemaEspecifico::all();
            $areas = WikuArea::all();
            $argumento = WikuArgumento::findOrFail($id);
            $autoresInst = WikuAutorInst::all();
            $autores = WikuAutor::all();


            return view('intranet.parametros.wiku.argumentos.editar', compact(
                'argumento',
                'temasEspecifico',
                'areas',
                'autoresInst',
                'autores'
            ));
        }
    }
    public function index_palabras($id, $wiku)
    {
        if ($wiku == 'norma') {
            $norma = WikuNorma::findOrFail($id);
            $palabras = WikuPalabras::all();
            return view('intranet.parametros.wiku.palabras.index', compact('norma', 'palabras', 'wiku'));
        } elseif ($wiku == 'argumento') {
            $argumento = WikuArgumento::findOrFail($id);
            $palabras = WikuPalabras::all();
            return view('intranet.parametros.wiku.palabras.index', compact('argumento', 'palabras', 'wiku'));
        }
    }
    public function crear_palabras($id, $wiku)
    {
        return view('intranet.parametros.wiku.palabras.crear', compact('id', 'wiku'));
    }
    public function guardar_palabras(Request $request, $id, $wiku)
    {
        if ($wiku == 'norma') {
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
        } elseif ($wiku == 'argumento') {
            $palabras = WikuPalabras::with('argumentos')->whereHas('argumentos', function ($q) use ($id) {
                $q->where('wiku_argumento_id', $id);
            })->get();
            foreach ($palabras as $palabra) {
                $palabras_argumento[] = $palabra['id'];
            }
            $nueva_palabra = $request->all();
            unset($nueva_palabra['norma_id']);
            $palabraNueva = WikuPalabras::create($nueva_palabra);
            $palabras_argumento[] = $palabraNueva->id;
            $argumento = WikuArgumento::findOrFail($id);
            $argumento->palabras()->sync($palabras_argumento);
            $palabras = WikuPalabras::all();
            return redirect('/admin/funcionario/wiku_palabras/index/' . $id . '/argumento')->with('mensaje', 'Palabra creada con éxito y asociada al argumento')->with('argumento')->with('palabras')->with('wiku');
        }
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
        if ($wiku == 'norma') {
            $norma = WikuNorma::findOrFail($id);
            $palabras = WikuPalabras::all();
            return redirect('/admin/funcionario/wiku_palabras/index/' . $id . '/norma')->with('mensaje', 'Palabra actualizada con éxito')->with('norma')->with('palabras')->with('wiku');
        } elseif ($wiku == 'argumento') {
            $argumento = WikuArgumento::findOrFail($id);
            $palabras = WikuPalabras::all();
            return redirect('/admin/funcionario/wiku_palabras/index/' . $id . '/argumento')->with('mensaje', 'Palabra actualizada con éxito')->with('argumento')->with('palabras')->with('wiku');
        }
    }
    public function wiku_palabras_eliminar(Request $request, $id)
    {
        if ($request->ajax()) {
            $palabra = WikuPalabras::findOrfail($id);
            if ($palabra->normas->count() == 0 && $palabra->argumentos->count() == 0) {
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
    public function adicionar_palabras(Request $request, $id_palabras, $id, $wiku)
    {
        if ($request->ajax()) {
            if ($wiku == 'norma') {
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
            } elseif ($wiku == 'argumento') {
                $palabra_ini = WikuPalabras::findOrfail($id_palabras);
                $argumento = WikuArgumento::findOrFail($id);
                $palabras = WikuPalabras::with('argumentos')->whereHas('argumentos', function ($q) use ($id) {
                    $q->where('wiku_argumento_id', $id);
                })->get();
                foreach ($palabras as $palabra) {
                    $palabras_norma[] = $palabra['id'];
                }
                $palabras_norma[] = $palabra_ini->id;
                $argumento->palabras()->sync($palabras_norma);
                return response()->json(['mensaje' => 'ok']);
            }
        } else {
            abort(404);
        }
    }
    public function restar_palabras(Request $request, $id_palabras, $id, $wiku)
    {
        if ($request->ajax()) {
            if ($wiku == 'norma') {
                $normas = new WikuNorma();
                $normas->find($id)->palabras()->detach($id_palabras);
                return response()->json(['mensaje' => 'ok']);
            } elseif ($wiku == 'argumento') {
                $argumentos = new WikuArgumento();
                $argumentos->find($id)->palabras()->detach($id_palabras);
                return response()->json(['mensaje' => 'ok']);
            }
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
            return view('intranet.parametros.wiku.normas.editar', compact('norma', 'fuentes', 'temasEspecifico', 'areas', 'id', 'wiku'));
        }
    }
    public function crear_asociacion($id, $wiku)
    {
        $tipos_pqr = tipoPQR::get();
        $categorias = Categoria::get();
        $servicios = Servicio::get();
        return view('intranet.parametros.wiku.asociacion.crear', compact('id', 'wiku', 'tipos_pqr', 'categorias', 'servicios',));
    }
    public function guardar_asociacion(Request $request, $id, $wiku)
    {

        if ($request['servicio_id'] == null) {
            $request['prodserv'] = 'Producto';
        } else {
            $request['prodserv'] = 'Servicio';
        }
        $request['wiku_norma_id'] = $id;
        WikuAsociacion::create($request->all());
        return redirect('/admin/funcionario/wiku/asociacion/crear/' . $id . '/norma')->with('mensaje', 'Asociación actualizada con éxito')->with('norma')->with('palabras')->with('wiku');
    }
    public function wiku_asociacion_eliminar(Request $request, $id)
    {
        if ($request->ajax()) {
            if (WikuAsociacion::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
    //------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function indexWiku()
    {
        $areas = WikuArea::all();
        $fuentes = WikuDocument::all();
        $tipos_pqr = tipoPQR::get();
        $categorias = Categoria::get();
        $servicios = Servicio::get();
        return view('intranet.parametros.wiku.funcionario.index', compact('areas', 'fuentes', 'tipos_pqr', 'categorias', 'servicios'));
    }
    public function indexWikuNormas()
    {
        $normas = WikuNorma::all();
        return view('intranet.parametros.wiku.funcionario.normas.index', compact('normas'));
    }

    public function WikuBusquedaBasica(Request $request)
    {
        if ($request->ajax()) {
            $radio = $request['radio'];
            $palabras = explode(" ", $request['query']);
            foreach ($palabras as &$valor) {
                $mParams[] = ['palabra', 'LIKE', $valor . '%'];
            }
            if (count($palabras) == 1) {
                $wikuPalabras = WikuPalabras::where('palabra', 'LIKE',  '%' . $palabras[0] . '%')->get();
            } else {
                $wikuPalabras = WikuPalabras::Where(function ($query) use ($palabras) {
                    foreach ($palabras as $palabra) {
                        $query->orWhere('palabra', 'LIKE',  $palabra . '%');
                    }
                })->get();
            }
            //$wikuNormas = $wikuPalabras;
            $ids = [];
            foreach ($wikuPalabras as $wikuPalabra) {
                $ids[] = $wikuPalabra->id;
            }
            if ($radio == 'todos' || $radio == 'Normas') {
                $wikuNormas = WikuNorma::with('palabras', 'criterios', 'temaEspecifico', 'temaEspecifico.tema_', 'temaEspecifico.tema_.area', 'documento')->whereHas('palabras', function ($q) use ($ids) {
                    $q->whereIn('wiku_palabras_id', $ids);
                })->get();
            } else {
                $wikuNormas = [];
            }
            //$wikuNormas = [count($palabras)];
            return response()->json([$wikuNormas]);
        } else {
            abort(404);
        }
    }
    public function WikuBusquedaAvanzada(Request $request)
    {
        if ($request->ajax()) {
            $tipowiku = $request['tipowiku'];
            switch ($tipowiku) {
                case 'Argumentos':
                    # code...
                    break;

                case 'Normas':
                    $area_id = $request['area_id'];
                    $tema_id = $request['tema_id'];
                    $wikutemaespecifico_id = $request['wikutemaespecifico_id'];
                    $fuente_id = $request['fuente_id'];
                    $id = $request['id'];
                    $fecha = $request['fecha'];
                    $prod_serv = $request['prod_serv'];
                    $tipo_p_q_r_id = $request['tipo_p_q_r_id'];
                    $motivo_id = $request['motivo_id'];
                    $motivo_sub_id = $request['motivo_sub_id'];
                    $servicio_id = $request['servicio_id'];
                    $categoria_id = $request['categoria_id'];
                    $producto_id = $request['producto_id'];
                    $marca_id = $request['marca_id'];
                    $referencia_id = $request['referencia_id'];
                    //=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=
                    $query = WikuNorma::with('palabras', 'criterios', 'temaEspecifico', 'temaEspecifico.tema_', 'temaEspecifico.tema_.area', 'documento', 'tipopqr', 'asociaciones');
                    if ($tipo_p_q_r_id != null) {
                        $query->whereHas('tipopqr', function ($q) use ($tipo_p_q_r_id) {
                            $q->where('tipo_p_q_r_id', $tipo_p_q_r_id);
                        });
                    }
                    if ($motivo_id != null) {
                        $query->whereHas('asociaciones', function ($q) use ($motivo_id) {
                            $q->where('motivo_id', $motivo_id);
                        });
                    }
                    if ($motivo_sub_id != null) {
                        $query->whereHas('asociaciones', function ($q) use ($motivo_sub_id) {
                            $q->where('motivo_sub_id', $motivo_sub_id);
                        });
                    }
                    if ($servicio_id != null) {
                        $query->whereHas('asociaciones', function ($q) use ($servicio_id) {
                            $q->where('servicio_id', $servicio_id);
                        });
                    }
                    if ($categoria_id != null) {
                        $query->whereHas('asociaciones', function ($q) use ($categoria_id) {
                            $q->where('categoria_id', $categoria_id);
                        });
                    }
                    if ($producto_id != null) {
                        $query->whereHas('asociaciones', function ($q) use ($producto_id) {
                            $q->where('producto_id', $producto_id);
                        });
                    }
                    if ($marca_id != null) {
                        $query->whereHas('asociaciones', function ($q) use ($marca_id) {
                            $q->where('marca_id', $marca_id);
                        });
                    }
                    if ($referencia_id != null) {
                        $query->whereHas('asociaciones', function ($q) use ($referencia_id) {
                            $q->where('referencia_id', $referencia_id);
                        });
                    }
                    $respuesta = $query->get();
                    //=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=
                    if ($area_id != null) {
                        $respuesta = $respuesta->where('temaEspecifico.tema_.area_id', $area_id);
                    }
                    if ($tema_id != null) {
                        $respuesta = $respuesta->where('temaEspecifico.tema_id', $tema_id);
                    }
                    if ($wikutemaespecifico_id != null) {
                        $respuesta = $respuesta->where('wikutemaespecifico_id', $wikutemaespecifico_id);
                    }
                    if ($fuente_id != null) {
                        $respuesta = $respuesta->where('fuente_id', $fuente_id);
                    }
                    if ($id != null) {
                        $respuesta = $respuesta->where('id', $id);
                    }
                    if ($fecha != null) {
                        $respuesta = $respuesta->where('fecha', '>', $fecha);
                    }
                    break;

                case 'Jurisprudencias':
                    # code...
                    break;

                default:
                    # code...
                    break;
            }
            return response()->json($respuesta);
        } else {
            abort(404);
        }
    }
    public function cargar_normas(Request $request)
    {
        if ($request->ajax()) {
            $id = $request['id'];
            return WikuNorma::where('id', $id)->get();
        }
    }
    //================================================================================================
    //************************************************************************************************

    public function crear_argumento()
    {
        $temasEspecifico = WikuTemaEspecifico::all();
        $areas = WikuArea::all();
        $autoresInst = WikuAutorInst::all();
        $autores = WikuAutor::all();
        return view('intranet.parametros.wiku.argumentos.crear', compact(
            'temasEspecifico',
            'areas',
            'autoresInst',
            'autores'
        ));
    }
    public function guardar_argumento(Request $request)
    {
        unset($request['autortipo']);
        WikuArgumento::create($request->all());
        return redirect('admin/funcionario/wiku/index')->with('mensaje', 'Argumento creado con exito.');
    }
    public function editar_argumento($id)
    {
        $temasEspecifico = WikuTemaEspecifico::all();
        $areas = WikuArea::all();
        $argumento = WikuArgumento::findOrFail($id);
        $autoresInst = WikuAutorInst::all();
        $autores = WikuAutor::all();
        return view('intranet.parametros.wiku.argumentos.editar', compact(
            'argumento',
            'temasEspecifico',
            'areas',
            'autoresInst',
            'autores'
        ));
    }
    public function actualizar_argumento(Request $request, $id)
    {
        if (is_null($request['publico'])) {
            $request['publico'] = 0;
        }
        unset($request['autortipo']);
        WikuArgumento::findOrFail($id)->update($request->all());
        return redirect('admin/funcionario/wiku/index')->with('mensaje', 'Argumento actualizado con exito.');
    }
    //------------------------------------------------------------------------------------------
    public function cargarautori(Request $request)
    {
        if ($request->ajax()) {

            WikuAutorInst::create($request->all());
            return WikuAutorInst::get();
        }
    }
    public function cargarautor(Request $request)
    {
        if ($request->ajax()) {

            WikuAutor::create($request->all());
            return WikuAutor::get();
        }
    }
    //************************************************************************************************
    public function index_argcriterios($id, $wiku)
    {
        $argumento = WikuArgumento::findOrFail($id);
        $criterios = WikuArgCriterio::where('argumento_id', $id)->get();
        return view('intranet.parametros.wiku.argcriterios.index', compact('argumento', 'criterios', 'wiku'));
    }
    public function crear_argcriterios($id, $wiku)
    {
        return view('intranet.parametros.wiku.argcriterios.crear', compact('id', 'wiku'));
    }
    public function guardar_argcriterios(Request $request, $id, $wiku)
    {
        $nuevo_criterio = $request->all();
        unset($nuevo_criterio['tipo_criterio']);
        WikuArgCriterio::create($nuevo_criterio);
        $argumento = WikuArgumento::findOrFail($id);
        $criterios = WikuArgCriterio::where('argumento_id', $id)->get();
        return redirect('/admin/funcionario/wiku_argcriterios/index/' . $id . '/argumento')->with('mensaje', 'Criterio creado con éxito')->with('argumento')->with('criterios')->with('wiku');
    }
    public function editar_argcriterios($id_criterios, $id, $wiku)
    {
        $criterio = WikuArgCriterio::findOrFail($id_criterios);
        return view('intranet.parametros.wiku.argcriterios.editar', compact('criterio', 'id', 'wiku'));
    }
    public function actualizar_argcriterios(Request $request, $id_criterios, $id, $wiku)
    {
        $nuevo_criterio = $request->all();
        unset($nuevo_criterio['tipo_criterio']);
        WikuArgCriterio::findOrFail($id_criterios)->update($nuevo_criterio);
        $argumento = WikuArgumento::findOrFail($id);
        $criterios = WikuArgCriterio::where('argumento_id', $id)->get();
        return redirect('/admin/funcionario/wiku_argcriterios/index/' . $id . '/argumento')->with('mensaje', 'Criterio actualizado con éxito')->with('argumento')->with('criterios')->with('wiku');
    }
    public function wiku_argcriterios_eliminar(Request $request, $id)
    {
        if ($request->ajax()) {
            if (WikuArgCriterio::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
    //================================================================================================
    public function crear_argasociacion($id, $wiku)
    {
        $tipos_pqr = tipoPQR::get();
        $categorias = Categoria::get();
        $servicios = Servicio::get();
        return view('intranet.parametros.wiku.argasociacion.crear', compact('id', 'wiku', 'tipos_pqr', 'categorias', 'servicios',));
    }
    public function guardar_argasociacion(Request $request, $id, $wiku)
    {

        if ($request['servicio_id'] == null) {
            $request['prodserv'] = 'Producto';
        } else {
            $request['prodserv'] = 'Servicio';
        }
        $request['wiku_argumento_id'] = $id;
        WikuAsociacionArg::create($request->all());
        return redirect('/admin/funcionario/wiku/asociacion/crear/' . $id . '/argumento')->with('mensaje', 'Asociación actualizada con éxito')->with('argumento')->with('palabras')->with('wiku');
    }
    public function wiku_argasociacion_eliminar(Request $request, $id)
    {
        if ($request->ajax()) {
            if (WikuAsociacionArg::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
    //------------------------------------------------------------------------------------------

}
