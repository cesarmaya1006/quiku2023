<?php

namespace App\Http\Controllers\Intranet\Funcionarios;

use App\Http\Controllers\Controller;
use App\Models\Tutela\AnexoPrimeraInstancia;
use App\Models\Tutela\AutoAdmisorio;
use App\Models\Tutela\PrimeraInstancia;
use App\Models\Tutela\ResuelvePrimeraInstancia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class TutelasConsulta extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('intranet.funcionarios.tutela.consulta.index');
    }

    public function cargar_tutelas(Request $request)
    {
        if ($request->ajax()) {
            if ($request['tipoBusqueda'] == 'Número de radicado') {
                return AutoAdmisorio::where('radicado', 'like', '%' . $request['numRadicado'] . '%')->with('accions')->with('accions.tipos_docu_accion')->get();
            } elseif ($request['tipoBusqueda'] == 'Nombre o apellido del accionante') {
                $nombreApellidos = $request['nombreApellidos'];
                return AutoAdmisorio::with('accions')->with('accions.tipos_docu_accion')->whereHas('accions', function ($q) use ($nombreApellidos) {
                    $q->where('nombres_accion', 'like', '%' . $nombreApellidos . '%')->orWhere('apellidos_accion', 'like', '%' . $nombreApellidos . '%');
                })->get();
            } else {
                $tipoDoc = $request['tipoDoc'];
                $numDocumento = $request['numDocumento'];
                return AutoAdmisorio::with('accions')->with('accions.tipos_docu_accion')->whereHas('accions', function ($q) use ($tipoDoc, $numDocumento) {
                    $q->where('numero_documento_accion', 'like', '%' . $numDocumento . '%')->whereHas('tipos_docu_accion', function ($p) use ($tipoDoc) {
                        $p->where('id', $tipoDoc);
                    });
                })->get();
            }
        }
    }
    public function detalles_tutelas($id)
    {
        $tutela = AutoAdmisorio::findOrFail($id);
        return view('intranet.funcionarios.tutela.consulta.detalles', compact('tutela'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tutelas_primera_instancia($id)
    {
        $tutela = AutoAdmisorio::findOrFail($id);
        return view('intranet.funcionarios.tutela.sentenciap.index', compact('tutela'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tutelas_primera_instancia_guardar(Request $request, $id)
    {
        if ($request['formaCarga'] == 'detalle') {
            $sentenciapinstancia['auto_admisorio_id'] = $id;
            $sentenciapinstancia['fecha_sentencia'] = $request['fecha_sentencia'];
            $sentenciapinstancia['fecha_notificacion'] = $request['fecha_notificacion'] . ' ' . $request['hora_notificacion'];
            $sentenciapinstancia['sentencia'] = $request['sentencia'];
            //------------------------------------------
            if ($request->hasFile('url_sentencia')) {
                $ruta = Config::get('constantes.folder_sentencias');
                $ruta = trim($ruta);
                $doc_subido = $request->url_sentencia;
                $nombre_doc = time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName()));
                $sentenciapinstancia['url_sentencia'] = $nombre_doc;
                $doc_subido->move($ruta, $nombre_doc);
            }
            //------------------------------------------
            $nuevasentenciapinstancia = PrimeraInstancia::create($sentenciapinstancia);
            //------------------------------------------
            if (intval($request['cantAdjuntos']) > 0) {
                $cantAdjuntos = intval($request['cantAdjuntos']);
                for ($i = 1; $i <= $cantAdjuntos; $i++) {
                    $newAnexoSentencia['sentenciapinstancia_id'] = $nuevasentenciapinstancia->id;
                    $newAnexoSentencia['titulo_anexo'] = $request['titulo_anexo' . $i];
                    $newAnexoSentencia['descripcion_anexo'] = $request['descripcion_anexo' . $i];
                    //------------------------------------------
                    if ($request->hasFile('url_anexo' . $i)) {
                        $ruta = Config::get('constantes.folder_sentencias');
                        $ruta = trim($ruta);
                        $doc_subido = $request['url_anexo' . $i];
                        $nombre_doc = time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName()));
                        $newAnexoSentencia['url_anexo'] = $nombre_doc;
                        $doc_subido->move($ruta, $nombre_doc);
                    }
                    //------------------------------------------
                    AnexoPrimeraInstancia::create($newAnexoSentencia);
                }
            }
            //------------------------------------------
            if (intval($request['catnResuelves']) > 0) {
                $catnResuelves = intval($request['catnResuelves']);
                for ($i = 1; $i <= $catnResuelves; $i++) {
                    $newResuelve['sentenciapinstancia_id'] = $nuevasentenciapinstancia->id;
                    $newResuelve['numeracion'] = $request['numeracion' . $i];
                    $newResuelve['resuelve'] = $request['resuelve' . $i];
                    $newResuelve['dias'] = $request['dias' . $i];
                    $newResuelve['horas'] = $request['horas' . $i];
                    //------------------------------------------
                    ResuelvePrimeraInstancia::create($newResuelve);
                }
            }
            return redirect('funcionario/consulta/detalles_tutelas/' . $id)->with('mensaje', 'Registro de primera instancia con exito.');
        } else {
            $sentenciapinstancia['auto_admisorio_id'] = $id;
            $sentenciapinstancia['fecha_sentencia'] = $request['fecha_sentencia'];
            $sentenciapinstancia['fecha_notificacion'] = $request['fecha_notificacion'] . ' ' . $request['hora_notificacion'];
            $sentenciapinstancia['sentencia'] = $request['sentencia'];
            //------------------------------------------
            if ($request->hasFile('url_sentencia')) {
                $ruta = Config::get('constantes.folder_sentencias');
                $ruta = trim($ruta);
                $doc_subido = $request->url_sentencia;
                $nombre_doc = time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName()));
                $sentenciapinstancia['url_sentencia'] = $nombre_doc;
                $doc_subido->move($ruta, $nombre_doc);
            }
            //------------------------------------------
            $nuevasentenciapinstancia = PrimeraInstancia::create($sentenciapinstancia);
            //------------------------------------------
            if (intval($request['cantResuelves']) > 0) {
                $cantResuelves = intval($request['cantResuelves']);
                for ($i = 1; $i <= $cantResuelves; $i++) {
                    $newResuelve['sentenciapinstancia_id'] = $nuevasentenciapinstancia->id;
                    //------------------------------------------
                    ResuelvePrimeraInstancia::create($newResuelve);
                }
            }
            return redirect('funcionario/consulta/detalles_tutelas/' . $id)->with('mensaje', 'Registro de primera instancia con exito.');
        }
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
