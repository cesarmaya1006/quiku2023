<?php

namespace App\Http\Controllers\Intranet\Empresas;

use App\Http\Controllers\Controller;
use App\Models\Admin\WikuArea;
use App\Models\Admin\WikuArgCriterio;
use App\Models\Admin\WikuArgumento;
use App\Models\Admin\WikuAsociacion;
use App\Models\Admin\WikuAsociacionArg;
use App\Models\Admin\WikuAsociacionDoc;
use App\Models\Admin\WikuAsociacionJur;
use App\Models\Admin\WikuAutor;
use App\Models\Admin\WikuAutorInst;
use App\Models\Admin\WikuCriterio;
use App\Models\Admin\WikuDemandado;
use App\Models\Admin\WikuDemandante;
use App\Models\Admin\WikuDocCritero;
use App\Models\Admin\WikuDoctrina;
use App\Models\Admin\WikuDocument;
use App\Models\Admin\WikuEnteEmisor;
use App\Models\Admin\WikuJurisprudencia;
use App\Models\Admin\WikuMagistrado;
use App\Models\Admin\WikuNorma;
use App\Models\Admin\WikuPalabras;
use App\Models\Admin\WikuSala;
use App\Models\Admin\WikuSubsala;
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
        $jurisprudencias = WikuJurisprudencia::all();
        $doctrinas = WikuDoctrina::all();
        return view('intranet.parametros.wiku.index', compact('normas', 'fuentes', 'argumentos', 'jurisprudencias', 'doctrinas'));
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
        } elseif ($wiku == 'jurisprudencia') {
            if ($id == 0) {
                $entes = WikuEnteEmisor::all();
                $magistrados = WikuMagistrado::all();
                $demandantes = WikuDemandante::all();
                $demandados = WikuDemandado::all();

                $temasEspecifico = WikuTemaEspecifico::all();
                $areas = WikuArea::all();
                $autoresInst = WikuAutorInst::all();
                $autores = WikuAutor::all();
                return view('intranet.parametros.wiku.jurisprudencias.crear', compact(
                    'entes',
                    'magistrados',
                    'demandantes',
                    'demandados',
                    'temasEspecifico',
                    'areas',
                    'autoresInst',
                    'autores'
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
        } elseif ($wiku == 'doctrina') {
            if ($id == 0) {
                $temasEspecifico = WikuTemaEspecifico::all();
                $areas = WikuArea::all();
                $autoresInst = WikuAutorInst::all();
                $autores = WikuAutor::all();
                return view('intranet.parametros.wiku.doctrinas.crear', compact(
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
                $doctrina = WikuDoctrina::findOrFail($id);
                return view('intranet.parametros.wiku.doctrinas.editar', compact(
                    'doctrina',
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
        } elseif ($wiku == 'jurisprudencia') {
            $jurisprudencia = WikuJurisprudencia::findOrFail($id);
            $palabras = WikuPalabras::all();
            return view('intranet.parametros.wiku.palabras.index', compact('jurisprudencia', 'palabras', 'wiku'));
        } elseif ($wiku == 'doctrina') {
            $doctrina = WikuDoctrina::findOrFail($id);
            $palabras = WikuPalabras::all();
            return view('intranet.parametros.wiku.palabras.index', compact('doctrina', 'palabras', 'wiku'));
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
        } elseif ($wiku == 'jurisprudencia') {
            $palabras = WikuPalabras::with('jurisprudencias')->whereHas('jurisprudencias', function ($q) use ($id) {
                $q->where('wiku_jurisprudencia_id', $id);
            })->get();
            foreach ($palabras as $palabra) {
                $palabras_jurisprudencia[] = $palabra['id'];
            }
            $nueva_palabra = $request->all();
            unset($nueva_palabra['norma_id']);
            $palabraNueva = WikuPalabras::create($nueva_palabra);
            $palabras_jurisprudencia[] = $palabraNueva->id;
            $jurisprudencia = WikuJurisprudencia::findOrFail($id);
            $jurisprudencia->palabras()->sync($palabras_jurisprudencia);
            $palabras = WikuPalabras::all();
            return redirect('/admin/funcionario/wiku_palabras/index/' . $id . '/jurisprudencia')->with('mensaje', 'Palabra creada con éxito y asociada a la jurisprudencia')->with('jurisprudencia')->with('palabras')->with('wiku');
        } elseif ($wiku == 'doctrina') {
            $palabras = WikuPalabras::with('doctrinas')->whereHas('doctrinas', function ($q) use ($id) {
                $q->where('wiku_doctrina_id', $id);
            })->get();
            foreach ($palabras as $palabra) {
                $palabras_doctrina[] = $palabra['id'];
            }
            $nueva_palabra = $request->all();
            unset($nueva_palabra['norma_id']);
            $palabraNueva = WikuPalabras::create($nueva_palabra);
            $palabras_doctrina[] = $palabraNueva->id;
            $doctrina = WikuDoctrina::findOrFail($id);
            $doctrina->palabras()->sync($palabras_doctrina);
            $palabras = WikuPalabras::all();
            return redirect('/admin/funcionario/wiku_palabras/index/' . $id . '/doctrina')->with('mensaje', 'Palabra creada con éxito y asociada a la doctrina')->with('doctrina')->with('palabras')->with('wiku');
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
        } elseif ($wiku == 'jurisprudencia') {
            $jurisprudencia = WikuJurisprudencia::findOrFail($id);
            $palabras = WikuPalabras::all();
            return redirect('/admin/funcionario/wiku_palabras/index/' . $id . '/jurisprudencia')->with('mensaje', 'Palabra actualizada con éxito')->with('jurisprudencia')->with('palabras')->with('wiku');
        } elseif ($wiku == 'doctrina') {
            $doctrina = WikuDoctrina::findOrFail($id);
            $palabras = WikuPalabras::all();
            return redirect('/admin/funcionario/wiku_palabras/index/' . $id . '/doctrina')->with('mensaje', 'Palabra actualizada con éxito')->with('doctrina')->with('palabras')->with('wiku');
        }
    }
    public function wiku_palabras_eliminar(Request $request, $id)
    {
        if ($request->ajax()) {
            $palabra = WikuPalabras::findOrfail($id);
            if ($palabra->normas->count() == 0 && $palabra->argumentos->count() == 0 && $palabra->jurisprudencias->count() == 0 && $palabra->doctrinas->count() == 0) {
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
            } elseif ($wiku == 'jurisprudencia') {
                $palabra_ini = WikuPalabras::findOrfail($id_palabras);
                $jurisprudencia = WikuJurisprudencia::findOrFail($id);
                $palabras = WikuPalabras::with('jurisprudencias')->whereHas('jurisprudencias', function ($q) use ($id) {
                    $q->where('wiku_jurisprudencia_id', $id);
                })->get();
                foreach ($palabras as $palabra) {
                    $palabras_juris[] = $palabra['id'];
                }
                $palabras_juris[] = $palabra_ini->id;
                $jurisprudencia->palabras()->sync($palabras_juris);
                return response()->json(['mensaje' => 'ok']);
            } elseif ($wiku == 'doctrina') {
                $palabra_ini = WikuPalabras::findOrfail($id_palabras);
                $doctrina = WikuDoctrina::findOrFail($id);
                $palabras = WikuPalabras::with('doctrinas')->whereHas('doctrinas', function ($q) use ($id) {
                    $q->where('wiku_doctrina_id', $id);
                })->get();
                foreach ($palabras as $palabra) {
                    $palabras_doc[] = $palabra['id'];
                }
                $palabras_doc[] = $palabra_ini->id;
                $doctrina->palabras()->sync($palabras_doc);
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
            } elseif ($wiku == 'jurisprudencia') {
                $jurisprudencias = new WikuJurisprudencia();
                $jurisprudencias->find($id)->palabras()->detach($id_palabras);
                return response()->json(['mensaje' => 'ok']);
            } elseif ($wiku == 'doctrina') {
                $doctrinas = new WikuDoctrina();
                $doctrinas->find($id)->palabras()->detach($id_palabras);
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
        $entes = WikuEnteEmisor::get();
        $magistrados = WikuMagistrado::get();
        $demandantes = WikuDemandante::get();
        $demandados = WikuDemandado::get();
        $anno = date('Y');
        return view('intranet.parametros.wiku.funcionario.index', compact('areas', 'fuentes', 'tipos_pqr', 'categorias', 'servicios', 'entes', 'magistrados', 'demandantes', 'demandados', 'anno'));
    }
    public function indexWikuNormas()
    {
        $normas = WikuNorma::all();
        return view('intranet.parametros.wiku.funcionario.normas.index', compact('normas'));
    }
    public function cargarArgumentos(Request $request)
    {
        if ($request->ajax()) {
            return WikuArgumento::all();
        } else {
            abort(404);
        }
    }
    //-----------

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
            $wikuNormas = [];
            $wikuArgumentos = [];
            $wikuJurisprudencias = [];
            $wikuDoctrinas = [];
            if ($radio == 'todos') {
                $wikuNormas = WikuNorma::with('palabras', 'criterios', 'temaEspecifico', 'temaEspecifico.tema_', 'temaEspecifico.tema_.area', 'documento')->whereHas('palabras', function ($q) use ($ids) {
                    $q->whereIn('wiku_palabras_id', $ids);
                })->get();
                $wikuArgumentos = WikuArgumento::with('palabras', 'criterios', 'temaEspecifico', 'temaEspecifico.tema_', 'temaEspecifico.tema_.area')->whereHas('palabras', function ($q) use ($ids) {
                    $q->whereIn('wiku_palabras_id', $ids);
                })->get();
                $wikuJurisprudencias = WikuJurisprudencia::with('palabras', 'criterios', 'temaEspecifico', 'temaEspecifico.tema_', 'temaEspecifico.tema_.area')->whereHas('palabras', function ($q) use ($ids) {
                    $q->whereIn('wiku_palabras_id', $ids);
                })->get();
                $wikuDoctrinas = WikuDoctrina::with('palabras', 'criterios', 'temaEspecifico', 'temaEspecifico.tema_', 'temaEspecifico.tema_.area')->whereHas('palabras', function ($q) use ($ids) {
                    $q->whereIn('wiku_palabras_id', $ids);
                })->get();
            } elseif ($radio == 'Normas') {
                $wikuNormas = WikuNorma::with('palabras', 'criterios', 'temaEspecifico', 'temaEspecifico.tema_', 'temaEspecifico.tema_.area', 'documento')->whereHas('palabras', function ($q) use ($ids) {
                    $q->whereIn('wiku_palabras_id', $ids);
                })->get();
            } elseif ($radio == 'Argumentos') {
                $wikuArgumentos = WikuArgumento::with('palabras', 'criterios', 'temaEspecifico', 'temaEspecifico.tema_', 'temaEspecifico.tema_.area')->whereHas('palabras', function ($q) use ($ids) {
                    $q->whereIn('wiku_palabras_id', $ids);
                })->get();
            } elseif ($radio == 'jurisprudencias') {
                $wikuJurisprudencias = WikuJurisprudencia::with('palabras', 'criterios', 'temaEspecifico', 'temaEspecifico.tema_', 'temaEspecifico.tema_.area')->whereHas('palabras', function ($q) use ($ids) {
                    $q->whereIn('wiku_palabras_id', $ids);
                })->get();
            } elseif ($radio == 'doctrinas') {
                $wikuDoctrinas = WikuDoctrina::with('palabras', 'criterios', 'temaEspecifico', 'temaEspecifico.tema_', 'temaEspecifico.tema_.area')->whereHas('palabras', function ($q) use ($ids) {
                    $q->whereIn('wiku_palabras_id', $ids);
                })->get();
            }
            //$wikuNormas = [count($palabras)];
            return response()->json(['normas' => $wikuNormas, 'argumentos' => $wikuArgumentos, 'jurisprudencias' => $wikuJurisprudencias, 'doctrinas' => $wikuDoctrinas]);
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
                    $area_id = $request['area_id'];
                    $tema_id = $request['tema_id'];
                    $wikutemaespecifico_id = $request['wikutemaespecifico_id'];
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
                    $query = WikuArgumento::with('palabras', 'criterios', 'temaEspecifico', 'temaEspecifico.tema_', 'temaEspecifico.tema_.area', 'tipopqr', 'asociaciones');
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
                    if ($id != null) {
                        $respuesta = $respuesta->where('id', $id);
                    }
                    if ($fecha != null) {
                        $respuesta = $respuesta->where('fecha', '>', $fecha);
                    }

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
                    $area_id = $request['area_id'];
                    $tema_id = $request['tema_id'];
                    $wikutemaespecifico_id = $request['wikutemaespecifico_id'];
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
                    $ente_id = $request['ente_id'];
                    $sala_id = $request['sala_id'];
                    $subsala_id = $request['subsala_id'];
                    $magistrado_id = $request['magistrado_id'];
                    $demandante_id = $request['demandante_id'];
                    $demandado_id = $request['demandado_id'];
                    //=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=
                    $query = WikuJurisprudencia::with(
                        'palabras',
                        'criterios',
                        'subsala.sala',
                        'subsala',
                        'temaEspecifico',
                        'temaEspecifico.tema_',
                        'temaEspecifico.tema_.area',
                        'tipopqr',
                        'asociaciones'
                    );
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
                    if ($ente_id != null) {
                        $respuesta = $respuesta->where('subsala.sala.ente_id', $ente_id);
                    }
                    if ($sala_id != null) {
                        $respuesta = $respuesta->where('subsala.sala_id', $sala_id);
                    }
                    if ($subsala_id != null) {
                        $respuesta = $respuesta->where('subsala_id', $subsala_id);
                    }
                    if ($id != null) {
                        $respuesta = $respuesta->where('id', $id);
                    }
                    if ($fecha != null) {
                        $respuesta = $respuesta->where('fecha', '>', $fecha);
                    }
                    if ($magistrado_id != null) {
                        $respuesta = $respuesta->where('magistrado_id', $magistrado_id);
                    }
                    if ($demandante_id != null) {
                        $respuesta = $respuesta->where('demandante_id', $demandante_id);
                    }
                    if ($demandado_id != null) {
                        $respuesta = $respuesta->where('demandado_id', $demandado_id);
                    }
                    break;

                case 'Doctrinas':
                    $area_id = $request['area_id'];
                    $tema_id = $request['tema_id'];
                    $wikutemaespecifico_id = $request['wikutemaespecifico_id'];
                    $fecha = $request['fecha'];
                    $tipo_p_q_r_id = $request['tipo_p_q_r_id'];
                    $motivo_id = $request['motivo_id'];
                    $motivo_sub_id = $request['motivo_sub_id'];
                    $servicio_id = $request['servicio_id'];
                    $categoria_id = $request['categoria_id'];
                    $producto_id = $request['producto_id'];
                    $marca_id = $request['marca_id'];
                    $referencia_id = $request['referencia_id'];
                    $tipo = $request['tipo'];
                    $titulo = $request['titulo'];
                    $anno = $request['anno'];
                    $mes = $request['mes'];
                    $ciudad = $request['ciudad'];
                    $editorial = $request['editorial'];
                    $revista = $request['revista'];
                    $url = $request['url'];
                    //=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=.=
                    $query = WikuDoctrina::with(
                        'palabras',
                        'criterios',
                        'temaEspecifico',
                        'temaEspecifico.tema_',
                        'temaEspecifico.tema_.area',
                        'tipopqr',
                        'asociaciones'
                    );
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
                    if ($fecha != null) {
                        $fechaComoEntero = strtotime($fecha);
                        $respuesta = $respuesta->where('anno', date("Y", $fechaComoEntero))->where('mes', date("m", $fechaComoEntero))->where('dia', date("d", $fechaComoEntero));
                    }
                    if ($tipo != null) {
                        $respuesta = $respuesta->where('tipo', $tipo);
                    }
                    if ($titulo != null) {
                        $respuesta = $respuesta->where('titulo', $titulo);
                    }
                    if ($anno != null) {
                        $respuesta = $respuesta->where('anno', $anno);
                    }
                    if ($mes != null) {
                        $respuesta = $respuesta->where('mes', $mes);
                    }
                    if ($ciudad != null) {
                        $respuesta = $respuesta->where('ciudad', $ciudad);
                    }
                    if ($editorial != null) {
                        $respuesta = $respuesta->where('editorial', $editorial);
                    }
                    if ($revista != null) {
                        $respuesta = $respuesta->where('revista', $revista);
                    }
                    if ($url != null) {
                        $respuesta = $respuesta->where('url', $url);
                    }
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
    public function cargar_salas(Request $request)
    {
        if ($request->ajax()) {
            $id = $_GET['id'];
            return WikuSala::where('ente_id', $id)->get();
        }
    }
    public function cargar_subsalas(Request $request)
    {
        if ($request->ajax()) {
            $id = $_GET['id'];
            return WikuSubsala::where('sala_id', $id)->get();
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
        return redirect('/admin/funcionario/wiku/argasociacion/crear/' . $id . '/argumento')->with('mensaje', 'Asociación actualizada con éxito')->with('argumento')->with('palabras')->with('wiku');
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
    //================================================================================================
    //************************************************************************************************

    public function crear_jurisprudencia()
    {
        $entes = WikuEnteEmisor::all();
        $magistrados = WikuMagistrado::all();
        $demandantes = WikuDemandante::all();
        $demandados = WikuDemandado::all();

        $temasEspecifico = WikuTemaEspecifico::all();
        $areas = WikuArea::all();
        return view('intranet.parametros.wiku.jurisprudencias.crear', compact(
            'entes',
            'temasEspecifico',
            'areas',
            'magistrados',
            'demandantes',
            'demandados'
        ));
    }
    public function cargarente(Request $request)
    {
        if ($request->ajax()) {
            WikuEnteEmisor::create($request->all());
            return WikuEnteEmisor::get();
        }
    }
    public function cargarSalas(Request $request)
    {
        if ($request->ajax()) {

            return WikuSala::where('ente_id', $request['ente_id'])->get();
        }
    }

    public function crearSala(Request $request)
    {
        if ($request->ajax()) {
            WikuSala::create($request->all());
            return WikuSala::where('ente_id', $request['ente_id'])->get();
        }
    }
    public function cargarsubsalas(Request $request)
    {
        if ($request->ajax()) {

            return WikuSubsala::where('sala_id', $request['sala_id'])->get();
        }
    }
    public function crearSubSala(Request $request)
    {
        if ($request->ajax()) {
            WikuSubsala::create($request->all());
            return WikuSubsala::where('sala_id', $request['sala_id'])->get();
        }
    }
    public function crearMagistrado(Request $request)
    {
        if ($request->ajax()) {
            WikuMagistrado::create($request->all());
            return WikuMagistrado::get();
        }
    }
    public function crearDemandante(Request $request)
    {
        if ($request->ajax()) {
            WikuDemandante::create($request->all());
            return WikuDemandante::get();
        }
    }
    public function crearDemandado(Request $request)
    {
        if ($request->ajax()) {
            WikuDemandado::create($request->all());
            return WikuDemandado::get();
        }
    }
    public function guardar_jurisprudencia(Request $request)
    {
        $nuevajurisprudencia = $request->all();

        if ($request->hasFile('archivo')) {
            unset($nuevajurisprudencia['archivo']);
            $ruta = Config::get('constantes.folder_doc_fuentes');
            $ruta = trim($ruta);
            $doc_subido = $request->archivo;
            $nombre_doc = time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName()));
            $nueva_fuente['archivo'] = $nombre_doc;
            $doc_subido->move($ruta, $nombre_doc);
            $nuevajurisprudencia['archivo'] = $nombre_doc;
        }
        WikuJurisprudencia::create($nuevajurisprudencia);
        return redirect('admin/funcionario/wiku/index')->with('mensaje', 'Jurisprudencia creada con exito.');
    }
    public function editar_jurisprudencia($id)
    {
        $entes = WikuEnteEmisor::all();
        $magistrados = WikuMagistrado::all();
        $demandantes = WikuDemandante::all();
        $demandados = WikuDemandado::all();

        $temasEspecifico = WikuTemaEspecifico::all();
        $areas = WikuArea::all();
        $jurisprudencia = WikuJurisprudencia::findOrFail($id);
        return view('intranet.parametros.wiku.jurisprudencias.editar', compact(
            'entes',
            'temasEspecifico',
            'areas',
            'magistrados',
            'demandantes',
            'demandados',
            'jurisprudencia'
        ));
    }
    public function actualizar_jurisprudencia(Request $request, $id)
    {
        $nuevajurisprudencia = $request->all();

        if ($request->hasFile('archivo')) {
            unset($nuevajurisprudencia['archivo']);
            $ruta = Config::get('constantes.folder_doc_fuentes');
            $ruta = trim($ruta);
            $doc_subido = $request->archivo;
            $nombre_doc = time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName()));
            $nueva_fuente['archivo'] = $nombre_doc;
            $doc_subido->move($ruta, $nombre_doc);
            $nuevajurisprudencia['archivo'] = $nombre_doc;
        }
        WikuJurisprudencia::findOrFail($id)->update($nuevajurisprudencia);
        return redirect('admin/funcionario/wiku/index')->with('mensaje', 'Jurisprudencia actualizada con exito.');
    }
    //================================================================================================
    public function crear_jurasociacion($id, $wiku)
    {
        $tipos_pqr = tipoPQR::get();
        $categorias = Categoria::get();
        $servicios = Servicio::get();
        return view('intranet.parametros.wiku.jurasociacion.crear', compact('id', 'wiku', 'tipos_pqr', 'categorias', 'servicios',));
    }
    public function guardar_jurasociacion(Request $request, $id, $wiku)
    {

        if ($request['servicio_id'] == null) {
            $request['prodserv'] = 'Producto';
        } else {
            $request['prodserv'] = 'Servicio';
        }
        $request['wiku_jurisprudencia_id'] = $id;
        WikuAsociacionJur::create($request->all());
        return redirect('/admin/funcionario/wiku/jurasociacion/crear/' . $id . '/jurisprudencia')->with('mensaje', 'Asociación actualizada con éxito')->with('argumento')->with('palabras')->with('wiku');
    }
    public function wiku_jurasociacion_eliminar(Request $request, $id)
    {
        if ($request->ajax()) {
            if (WikuAsociacionJur::destroy($id)) {
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
    //================================================================================================
    //************************************************************************************************

    public function crear_doctrina()
    {
        $temasEspecifico = WikuTemaEspecifico::all();
        $areas = WikuArea::all();
        $autoresInst = WikuAutorInst::all();
        $autores = WikuAutor::all();
        return view('intranet.parametros.wiku.doctrinas.crear', compact(
            'temasEspecifico',
            'areas',
            'autoresInst',
            'autores'
        ));
    }
    public function guardar_doctrina(Request $request)
    {
        unset($request['autortipo']);
        $fecha = strtotime($request['fecha']);
        $request['anno'] = date("Y", $fecha);
        $request['mes'] = date("m", $fecha);
        $request['dia'] = date("d", $fecha);
        unset($request['fecha']);
        if ($request->hasFile('archivo')) {
            $ruta = Config::get('constantes.folder_doc_fuentes');
            $ruta = trim($ruta);
            $doc_subido = $request->archivo;
            unset($request['archivo']);
            $nombre_doc = time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName()));
            $nueva_fuente['archivo'] = $nombre_doc;
            $doc_subido->move($ruta, $nombre_doc);
            $request['archivo'] = $nombre_doc;
        }
        WikuDoctrina::create($request->all());
        return redirect('admin/funcionario/wiku/index')->with('mensaje', 'Doctrina creada con exito.');
    }
    public function editar_doctrina(Request $request, $id)
    {
        $temasEspecifico = WikuTemaEspecifico::all();
        $areas = WikuArea::all();
        $autoresInst = WikuAutorInst::all();
        $autores = WikuAutor::all();
        $doctrina = WikuDoctrina::findOrFail($id);
        return view('intranet.parametros.wiku.doctrinas.editar', compact(
            'temasEspecifico',
            'areas',
            'autoresInst',
            'autores',
            'doctrina'
        ));
    }
    public function actualizar_doctrina(Request $request, $id)
    {
        $nuevadoctrina = $request->all();
        unset($nuevadoctrina['autortipo']);
        $fecha = strtotime($request['fecha']);
        $nuevadoctrina['anno'] = date("Y", $fecha);
        $nuevadoctrina['mes'] = date("m", $fecha);
        $nuevadoctrina['dia'] = date("d", $fecha);
        unset($nuevadoctrina['fecha']);
        if ($request->hasFile('archivo')) {
            unset($nuevadoctrina['archivo']);
            $ruta = Config::get('constantes.folder_doc_fuentes');
            $ruta = trim($ruta);
            $doc_subido = $request->archivo;
            $nombre_doc = time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName()));
            $nueva_fuente['archivo'] = $nombre_doc;
            $doc_subido->move($ruta, $nombre_doc);
            $nuevadoctrina['archivo'] = $nombre_doc;
        }
        WikuDoctrina::findOrFail($id)->update($nuevadoctrina);
        return redirect('admin/funcionario/wiku/index')->with('mensaje', 'Doctrina actualizada con exito.');
    }
    //************************************************************************************************
    public function index_doccriterios($id, $wiku)
    {
        $doctrina = WikuDoctrina::findOrFail($id);
        $criterios = WikuDocCritero::where('doctrina_id', $id)->get();
        return view('intranet.parametros.wiku.doccriterios.index', compact('doctrina', 'criterios', 'wiku'));
    }
    public function crear_doccriterios($id, $wiku)
    {
        return view('intranet.parametros.wiku.doccriterios.crear', compact('id', 'wiku'));
    }
    public function guardar_doccriterios(Request $request, $id, $wiku)
    {
        $nuevo_criterio = $request->all();
        unset($nuevo_criterio['tipo_criterio']);
        WikuDocCritero::create($nuevo_criterio);
        $doctrina = WikuDoctrina::findOrFail($id);
        $criterios = WikuDocCritero::where('doctrina_id', $id)->get();
        return redirect('/admin/funcionario/wiku_doccriterios/index/' . $id . '/doctrina')->with('mensaje', 'Criterio creado con éxito')->with('doctrina')->with('criterios')->with('wiku');
    }
    public function editar_doccriterios($id_criterios, $id, $wiku)
    {
        $criterio = WikuDocCritero::findOrFail($id_criterios);
        return view('intranet.parametros.wiku.doccriterios.editar', compact('criterio', 'id', 'wiku'));
    }
    public function actualizar_doccriterios(Request $request, $id_criterios, $id, $wiku)
    {
        $nuevo_criterio = $request->all();
        unset($nuevo_criterio['tipo_criterio']);
        WikuDocCritero::findOrFail($id_criterios)->update($nuevo_criterio);
        $doctrina = WikuDoctrina::findOrFail($id);
        $criterios = WikuDocCritero::where('doctrina_id', $id)->get();
        return redirect('/admin/funcionario/wiku_doccriterios/index/' . $id . '/doctrina')->with('mensaje', 'Criterio actualizado con éxito')->with('doctrina')->with('criterios')->with('wiku');
    }
    public function wiku_doccriterios_eliminar(Request $request, $id)
    {
        if ($request->ajax()) {
            if (WikuDocCritero::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
    //================================================================================================
    public function crear_docasociacion($id, $wiku)
    {
        $tipos_pqr = tipoPQR::get();
        $categorias = Categoria::get();
        $servicios = Servicio::get();
        return view('intranet.parametros.wiku.docasociacion.crear', compact('id', 'wiku', 'tipos_pqr', 'categorias', 'servicios',));
    }
    public function guardar_docasociacion(Request $request, $id, $wiku)
    {

        if ($request['servicio_id'] == null) {
            $request['prodserv'] = 'Producto';
        } else {
            $request['prodserv'] = 'Servicio';
        }
        $request['wiku_doctrina_id'] = $id;
        WikuAsociacionDoc::create($request->all());
        return redirect('/admin/funcionario/wiku/docasociacion/crear/' . $id . '/doctrina')->with('mensaje', 'Asociación actualizada con éxito')->with('wiku');
    }
    public function wiku_docasociacion_eliminar(Request $request, $id)
    {
        if ($request->ajax()) {
            if (WikuAsociacionDoc::destroy($id)) {
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
