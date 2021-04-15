<?php

namespace App\Http\Controllers\Intranet\Usuarios;

use App\Http\Controllers\Controller;
use App\Models\Admin\Departamento;
use App\Models\Admin\Pais;
use App\Models\Admin\Tipo_Docu;
use App\Models\Admin\Usuario;
use App\Models\PQR\PQR;
use App\Models\PQR\SubMotivo;
use App\Models\PQR\tipoPQR;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pqr_S = PQR::where('persona_id', session('id_usuario'));
        return view('intranet.usuarios.listado', compact('pqr_S'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generar()
    {
        $tipoPQR = tipoPQR::all();
        return view('intranet.usuarios.crear', compact('tipoPQR'));
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
    public function generarPQR($id)
    {
        $usuario = Usuario::findOrFail(session('id_usuario'));
        $tipo_pqr = tipoPQR::findOrFail($id);
        $departamentos = Departamento::get();
        return view('intranet.usuarios.crearPQR', compact('usuario', 'tipo_pqr', 'departamentos'));
    }

    public function generarConsulta()
    {
        $usuario = Usuario::findOrFail(session('id_usuario'));
        return view('intranet.usuarios.crearConsulta', compact('usuario'));
    }
    public function generarConsulta_guardar(Request $request)
    {

        $usuario = Usuario::findOrFail(session('id_usuario'));
        if ($usuario->persona) {
            $nuevaConsulta['persona_id'] = $request['persona_id'];
        } else {
            $nuevaConsulta['empresa_id'] = $request['empresa_id'];
        }
        $nuevaConsulta['consulta'] = $request['consulta'];
        $nuevaConsulta['justificacion'] = $request['justificacion'];
        $nuevaConsulta['fecha_generacion'] = $request['fecha_generacion'];
        $nuevaConsulta['fecha_radicado'] = $request['fecha_radicado'];
        if ($request->hasFile('documentos')) {
            $ruta = Config::get('constantes.folder_doc_consultas');
            $ruta = trim($ruta);
            foreach ($request['documentos'] as $documento) {
                dd($documento);
                $doc_subido = $documento;
                $tamaño = $documento->getSize();
                $nombre_doc = time() . '-' . utf8_encode(utf8_decode($doc_subido->getClientOriginalName()));
                $nuevo_documento['documento'] = $nombre_doc;
                $doc_subido->move($ruta, $nombre_doc);
            }
            dd($tamaño);
        } else {
            dd('no');
        }
    }

    public function generarFelicitacion()
    {
        return view('intranet.usuarios.crearFeclicitaciones');
    }

    public function reporteIrregularidad()
    {
        return view('intranet.usuarios.crearReporteIrregularidad');
    }

    public function generarSolicitudDatos()
    {
        return view('intranet.usuarios.crearSolicitudDatos');
    }
    public function generarSolicitudDocumentos()
    {
        return view('intranet.usuarios.crearSolicitudDocumentos');
    }

    public function generarSugerencia()
    {
        return view('intranet.usuarios.crearSugerencia');
    }
    public function actualizar_datos()
    {

        $tipos_docu = Tipo_Docu::get();
        $paises = Pais::get();
        $departamentos = Departamento::get();
        $usuario = Usuario::findorFail(session('id_usuario'));
        return view('intranet/datos_personales.index', compact('usuario', 'tipos_docu', 'paises', 'departamentos'));
    }

    public function cambiar_password()
    {
        return view('intranet/password.index');
    }

    public function crear_usuario()
    {
        $tipos_docu = Tipo_Docu::get();
        $paises = Pais::get();
        $departamentos = Departamento::get();
        $usuario = Usuario::findorFail(session('id_usuario'));
        return view('intranet/crear_usuario_asistido.index', compact('usuario', 'tipos_docu', 'paises', 'departamentos'));
    }

    public function consulta_politicas()
    {
        return view('intranet/consulta_politicas.index');
    }

    public function cargar_submotivos(Request $request)
    {
        if ($request->ajax()) {
            $id = $_GET['id'];
            return SubMotivo::where('motivo_id', $id)->get();
        }
    }
}
