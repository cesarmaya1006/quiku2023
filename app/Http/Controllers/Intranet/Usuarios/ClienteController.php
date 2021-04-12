<?php

namespace App\Http\Controllers\Intranet\Usuarios;

use App\Http\Controllers\Controller;
use App\Models\Admin\Departamento;
use App\Models\Admin\Pais;
use App\Models\Admin\Tipo_Docu;
use App\Models\Admin\Usuario;
use App\Models\PQR\PQR;
use Illuminate\Http\Request;

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
        return view('intranet.usuarios.crear');
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
    public function direccion(Request $request)
    {
        switch ($request['radio1']) {
            case 'peticion':
                return redirect('/usuario/generarPQR');
                break;
            case 'queja':
                return redirect('/usuario/generarPQR');
                break;
            case 'reclamo':
                return redirect('/usuario/generarPQR');
                break;
            case 'consulta':
                return redirect('/usuario/generarConsulta');
                break;
            case 'solicitud_datos':
                return redirect('/usuario/generarFelicitacion');
                break;
            case 'reporte':
                return redirect('/usuario/reporteIrregularidad');
                break;
            case 'felicitacion':
                return redirect('/usuario/generarSolicitudDatos');
                break;
            case 'solicitud_doc':
                return redirect('/usuario/generarSolicitudDocumentos');
                break;
            case 'sugerencia':
                return redirect('/usuario/generarSugerencia');
                break;
        }
    }
    public function generarPQR()
    {
        return view('intranet.usuarios.crearPQR');
    }

    public function generarConsulta()
    {
        return view('intranet.usuarios.crearConsulta');
    }

    public function generarFelicitaciones()
    {
        return view('intranet.usuarios.crearFelicitaciones');
    }

    public function generarReporteIrregularidad()
    {
        return view('intranet.usuarios.crearReporteIrregularidad');
    }

    public function generarSolicitudDatos()
    {
        return view('intranet.usuarios.crearSolicutudDatos');
    }

    public function generarSugerecias()
    {
        return view('intranet.usuarios.crearSugerecias');
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


}
