<?php

namespace App\Http\Controllers\Intranet\Funcionarios;

use App\Http\Controllers\Controller;
use App\Models\Tutela\AutoAdmisorio;
use Illuminate\Http\Request;

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
