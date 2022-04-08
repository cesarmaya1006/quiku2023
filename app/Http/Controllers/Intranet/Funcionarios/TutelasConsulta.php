<?php

namespace App\Http\Controllers\Intranet\Funcionarios;

use DateTime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Tutela\TipoAccion;
use App\Models\Tutela\Impugnacion;
use App\Http\Controllers\Controller;
use App\Models\Tutela\AutoAdmisorio;
use App\Models\Tutela\AsignacionTarea;
use Illuminate\Support\Facades\Config;
use App\Models\Tutela\PrimeraInstancia;
use App\Models\Tutela\ImpugnacionExterna;
use App\Models\Tutela\ImpugnacionInterna;
use App\Models\Tutela\ImpugnacionResuelve;
use App\Models\Tutela\AnexoPrimeraInstancia;
use App\Models\Tutela\Anexosentenciaseg;
use App\Models\Tutela\ResuelvePrimeraInstancia;
use App\Models\Tutela\Resuelvesentenciaseg;
use App\Models\Tutela\Sentenciaseginstancia;

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
                return AutoAdmisorio::where('radicado', 'like', '%' . $request['numRadicado'] . '%')->with('accions')->with('accions.tipos_docu_accion')->orderByDesc('fecha_radicado')->get();
            } elseif ($request['tipoBusqueda'] == 'Nombre o apellido del accionante') {
                $nombreApellidos = $request['nombreApellidos'];
                return AutoAdmisorio::with('accions')->with('accions.tipos_docu_accion')->whereHas('accions', function ($q) use ($nombreApellidos) {
                    $q->where('nombres_accion', 'like', '%' . $nombreApellidos . '%')->orWhere('apellidos_accion', 'like', '%' . $nombreApellidos . '%');
                })->orderByDesc('fecha_radicado')->get();
            } else {
                $tipoDoc = $request['tipoDoc'];
                $numDocumento = $request['numDocumento'];
                return AutoAdmisorio::with('accions')->with('accions.tipos_docu_accion')->whereHas('accions', function ($q) use ($tipoDoc, $numDocumento) {
                    $q->where('numero_documento_accion', 'like', '%' . $numDocumento . '%')->whereHas('tipos_docu_accion', function ($p) use ($tipoDoc) {
                        $p->where('id', $tipoDoc);
                    });
                })->orderByDesc('fecha_radicado')->get();
            }
        }
    }
    public function detalles_tutelas($id)
    {
        $tutela = AutoAdmisorio::findOrFail($id);
        return view('intranet.funcionarios.tutela.consulta.detalles', compact('tutela'));
    }
    //-------------------------------------------------------------------------------------
    public function tutelas_primera_instancia($id)
    {
        $tutela = AutoAdmisorio::findOrFail($id);
        return view('intranet.funcionarios.tutela.sentenciap.index', compact('tutela'));
    }
    public function tutelas_primera_instancia_guardar(Request $request, $id)
    {
        $cambioEstado['estadostutela_id'] = '5';
        AutoAdmisorio::findOrFail($id)->update($cambioEstado);
        $tareas = AsignacionTarea::where('auto_admisorio_id', $id)->get();
        foreach ($tareas as $tarea) {
            $updateTarea['estado_id'] = 6;
            AsignacionTarea::findOrFail($tarea->id)->update($updateTarea);
        }
        if ($request['formaCarga'] == 'detalle') {
            $sentenciapinstancia['id'] = $id;
            $sentenciapinstancia['fecha_sentencia'] = $request['fecha_sentencia'];
            $sentenciapinstancia['fecha_notificacion'] = $request['fecha_notificacion'] . ' ' . $request['hora_notificacion'];
            $sentenciapinstancia['sentencia'] = $request['sentencia'];
            $sentenciapinstancia['cantidad_resuelves'] = 0;


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
                    $newResuelve['sentido'] = $request['sentido' . $i];
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
            $sentenciapinstancia['id'] = $id;
            $sentenciapinstancia['fecha_sentencia'] = $request['fecha_sentencia'];
            $sentenciapinstancia['fecha_notificacion'] = $request['fecha_notificacion'] . ' ' . $request['hora_notificacion'];
            $sentenciapinstancia['sentencia'] = $request['sentencia'];
            $sentenciapinstancia['cantidad_resuelves'] = 1;
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
                    $newResuelve['sentido'] = $request['sentido' . $i];
                    $newResuelve['numeracion'] =  $i;
                    $newResuelve['dias'] = $request['diascant' . $i];
                    $newResuelve['horas'] = $request['horascant' . $i];
                    //------------------------------------------
                    ResuelvePrimeraInstancia::create($newResuelve);
                }
            }
            return redirect('funcionario/consulta/detalles_tutelas/' . $id)->with('mensaje', 'Registro de primera instancia con exito.');
        }
    }
    //-------------------------------------------------------------------------------------

    public function tutelas_segunda_instancia($id)
    {
        $tutela = AutoAdmisorio::findOrFail($id);
        return view('intranet.funcionarios.tutela.sentencia_seg.index', compact('tutela'));
    }
    public function tutelas_segunda_instancia_guardar(Request $request, $id)
    {
        $cambioEstado['estadostutela_id'] = '8';
        AutoAdmisorio::findOrFail($id)->update($cambioEstado);
        $tareas = AsignacionTarea::where('auto_admisorio_id', $id)->get();
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        //Preguntar a Wii
        foreach ($tareas as $tarea) {
            $updateTarea['estado_id'] = 6;
            AsignacionTarea::findOrFail($tarea->id)->update($updateTarea);
        }
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        if ($request['formaCarga'] == 'detalle') {
            $sentenciaSeginstancia['id'] = $id;
            $sentenciaSeginstancia['fecha_sentencia'] = $request['fecha_sentencia'];
            $sentenciaSeginstancia['fecha_notificacion'] = $request['fecha_notificacion'] . ' ' . $request['hora_notificacion'];
            $sentenciaSeginstancia['sentencia'] = $request['sentencia'];
            $sentenciaSeginstancia['cantidad_resuelves'] = 0;


            //------------------------------------------
            if ($request->hasFile('url_sentencia')) {
                $ruta = Config::get('constantes.folder_sentencias');
                $ruta = trim($ruta);
                $doc_subido = $request->url_sentencia;
                $nombre_doc = time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName()));
                $sentenciaSeginstancia['url_sentencia'] = $nombre_doc;
                $doc_subido->move($ruta, $nombre_doc);
            }
            //------------------------------------------
            $nuevasentenciaSeginstancia = Sentenciaseginstancia::create($sentenciaSeginstancia);
            //------------------------------------------
            if (intval($request['cantAdjuntos']) > 0) {
                $cantAdjuntos = intval($request['cantAdjuntos']);
                for ($i = 1; $i <= $cantAdjuntos; $i++) {
                    $newAnexoSentencia['sentenciaseginstancia_id'] = $nuevasentenciaSeginstancia->id;
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
                    Anexosentenciaseg::create($newAnexoSentencia);
                }
            }
            //------------------------------------------
            if (intval($request['catnResuelves']) > 0) {
                $catnResuelves = intval($request['catnResuelves']);
                for ($i = 1; $i <= $catnResuelves; $i++) {
                    $newResuelve['sentenciaseginstancia_id'] = $nuevasentenciaSeginstancia->id;
                    $newResuelve['sentido'] = $request['sentido' . $i];
                    $newResuelve['numeracion'] = $request['numeracion' . $i];
                    $newResuelve['resuelve'] = $request['resuelve' . $i];
                    $newResuelve['dias'] = $request['dias' . $i];
                    $newResuelve['horas'] = $request['horas' . $i];
                    //------------------------------------------
                    Resuelvesentenciaseg::create($newResuelve);
                }
            }
            return redirect('funcionario/consulta/detalles_tutelas/' . $id)->with('mensaje', 'Registro de segunda instancia con exito.');
        } else {
            $sentenciaSeginstancia['id'] = $id;
            $sentenciaSeginstancia['fecha_sentencia'] = $request['fecha_sentencia'];
            $sentenciaSeginstancia['fecha_notificacion'] = $request['fecha_notificacion'] . ' ' . $request['hora_notificacion'];
            $sentenciaSeginstancia['sentencia'] = $request['sentencia'];
            $sentenciaSeginstancia['cantidad_resuelves'] = 1;
            //------------------------------------------
            if ($request->hasFile('url_sentencia')) {
                $ruta = Config::get('constantes.folder_sentencias');
                $ruta = trim($ruta);
                $doc_subido = $request->url_sentencia;
                $nombre_doc = time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName()));
                $sentenciaSeginstancia['url_sentencia'] = $nombre_doc;
                $doc_subido->move($ruta, $nombre_doc);
            }
            //------------------------------------------
            $nuevasentenciaSegInstancia = Sentenciaseginstancia::create($sentenciaSeginstancia);
            //------------------------------------------
            if (intval($request['cantResuelves']) > 0) {
                $cantResuelves = intval($request['cantResuelves']);
                for ($i = 1; $i <= $cantResuelves; $i++) {
                    $newResuelve['sentenciapinstancia_id'] = $nuevasentenciaSegInstancia->id;
                    $newResuelve['sentido'] = $request['sentido' . $i];
                    $newResuelve['numeracion'] =  $i;
                    $newResuelve['dias'] = $request['diascant' . $i];
                    $newResuelve['horas'] = $request['horascant' . $i];
                    //------------------------------------------
                    Resuelvesentenciaseg::create($newResuelve);
                }
            }
            return redirect('funcionario/consulta/detalles_tutelas/' . $id)->with('mensaje', 'Registro de segunda instancia con exito.');
        }
    }
    //-------------------------------------------------------------------------------------

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tutelas_impugnacion($id)
    {
        $tutela = AutoAdmisorio::findOrFail($id);
        return view('intranet.funcionarios.tutela.impugnacion.index', compact('tutela'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tutelas_impugnacion_gestion($id)
    {
        $tutela = AutoAdmisorio::findOrFail($id);
        return view('intranet.funcionarios.tutela.impugnacion.gestionar.index', compact('tutela'));
    }

    public function tutelas_impugnacion_registro($id)
    {
        $tipo_accion = TipoAccion::get();
        $tutela = AutoAdmisorio::findOrFail($id);
        return view('intranet.funcionarios.tutela.impugnacion.registrar.index', compact('tutela', 'tipo_accion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tutelas_impugnacion_guardar(Request $request)
    {

        if ($request->ajax()) {
            $id = $request['data_id'];
            $tutela = AutoAdmisorio::findOrFail($id);


                $id_primeraInstancia = $tutela->primeraInstancia->id;
                $firstDate = new DateTime($tutela->primeraInstancia->fecha_notificacion);
                $secondDate = new DateTime(date('d-m-Y', strtotime($tutela->primeraInstancia->fecha_notificacion . '+ 3 days')));
                $intvl = $firstDate->diff($secondDate);

                $impugnacionNueva['sentenciapinstancia_id'] = $tutela->primeraInstancia->id;
                $impugnacionNueva['fecha'] = Carbon::now();
                $impugnacionNueva['descripcion'] = $request->resuelve;
                if ($request->hasFile('url_sentencia')) {
                    $ruta = Config::get('constantes.folder_sentencias');
                    $ruta = trim($ruta);
                    $doc_subido = $request->url_sentencia;
                    $nombre_doc = str_replace(' ', '', time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName())));
                    $impugnacionNueva['url'] = $nombre_doc;

                    $tamaño = $doc_subido->getSize();
                    if ($tamaño > 0) {
                        $tamaño = $tamaño / 1000;
                    }
                    $impugnacionNueva['peso'] = $tamaño;
                    $impugnacionNueva['extension'] = $doc_subido->getClientOriginalExtension();
                    $doc_subido->move($ruta, $nombre_doc);
                }

                $impugnacion = ImpugnacionExterna::create($impugnacionNueva);

                $resuelves_ = explode(",", $request->resuelves);

                foreach ($resuelves_ as $resuelve) {
                    if ($resuelve!='todosResuelves') {
                        $impugnacion->resuelves()->attach($resuelve);
                    }
                }
                //----------------------------------

                if ($request->accionantes != '') {
                    $accionantes = explode(",", $request->accionantes);
                    foreach ($accionantes as $accionante) {
                        if ($accionante!='todosAccionantes') {
                            $impugnacion->accion()->attach($accionante);
                        }

                    }
                }

                if ($request->accionados != '') {
                    $accionados = explode(",", $request->accionados);
                    foreach ($accionados as $accionado) {
                        if ($accionado!='todosAccionados') {
                            $impugnacion->accion()->attach($accionado);
                        }

                    }
                }




            $impugnacionRespuesta = ImpugnacionExterna::where('sentenciapinstancia_id', $id_primeraInstancia)->with('sentenciap')->with('accion')->with('resuelves')->get();
            return response()->json(['mensaje' => 'ok', 'data' => $impugnacionRespuesta]);
        } else {
            abort(404);
        }
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
