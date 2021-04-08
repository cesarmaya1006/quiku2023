<?php

namespace App\Http\Controllers\Intranet\Usuarios;

use App\Http\Controllers\Controller;
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
}
