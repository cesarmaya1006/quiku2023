<?php

namespace App\Http\Controllers\Intranet\Funcionarios;

use App\Http\Controllers\Controller;
use App\Models\Admin\Departamento;
use App\Models\Admin\Municipio;
use App\Models\Empresas\Sede;
use App\Models\PQR\AsignacionParticular;
use App\Models\PQR\Motivo;
use App\Models\PQR\SubMotivo;
use App\Models\PQR\tipoPQR;
use App\Models\Productos\Categoria;
use App\Models\Productos\Marca;
use App\Models\Productos\Producto;
use App\Models\Productos\Referencia;
use App\Models\Servicios\Servicio;
use Illuminate\Http\Request;

class AsignacionParticularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignaciones = AsignacionParticular::get();
        return view('intranet.parametros.asignacion_part.index', compact('asignaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $tipos_pqr = tipoPQR::get();
        $categorias = Categoria::get();
        $servicios = Servicio::get();
        $departamentos = Departamento::get();
        return view('intranet.parametros.asignacion_part.crear', compact('tipos_pqr', 'categorias', 'servicios', 'departamentos'));
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

    public function cargar_motivo(Request $request)
    {
        if ($request->ajax()) {
            return Motivo::where('tipo_pqr_id', $request['id'])->get();
        } else {
            abort(404);
        }
    }
    public function cargar_sub_motivo(Request $request)
    {
        if ($request->ajax()) {
            return SubMotivo::where('motivo_id', $request['id'])->get();
        } else {
            abort(404);
        }
    }
    public function cargar_producto(Request $request)
    {
        if ($request->ajax()) {
            return Producto::where('categoria_id', $request['id'])->get();
        } else {
            abort(404);
        }
    }
    public function cargar_marca(Request $request)
    {
        if ($request->ajax()) {
            return Marca::where('producto_id', $request['id'])->get();
        } else {
            abort(404);
        }
    }
    public function cargar_referencia(Request $request)
    {
        if ($request->ajax()) {
            return Referencia::where('marca_id', $request['id'])->get();
        } else {
            abort(404);
        }
    }
    public function cargar_municipio(Request $request)
    {
        if ($request->ajax()) {
            return Municipio::where('departamento_id', $request['id'])->get();
        } else {
            abort(404);
        }
    }
    public function cargar_sede(Request $request)
    {
        if ($request->ajax()) {
            return Sede::where('municipio_id', $request['id'])->get();
        } else {
            abort(404);
        }
    }
}
