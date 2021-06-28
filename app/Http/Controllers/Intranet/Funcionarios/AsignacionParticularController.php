<?php

namespace App\Http\Controllers\Intranet\Funcionarios;

use App\Http\Controllers\Controller;
use App\Http\Requests\Empresa\ValidacionAsignacionParticular;
use App\Models\Admin\Cargo;
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
        $asignaciones_p = AsignacionParticular::where('tipo', 'Permanente')->get();
        $asignaciones_t = AsignacionParticular::where('tipo', 'Temporal')->get();
        return view('intranet.parametros.asignacion_part.index', compact('asignaciones_p', 'asignaciones_t'));
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
    public function guardar(ValidacionAsignacionParticular $request)
    {
        if ($request['tipo'] == 'Temporal') {
            $asignacionTemp = AsignacionParticular::where('tipo_pqr_id', $request['tipo_pqr_id'])
                ->where('prod_serv', $request['prod_serv'])
                ->where('adquisicion', $request['adquisicion'])
                ->where('motivo_id', $request['motivo_id'])
                ->where('motivo_sub_id', $request['motivo_sub_id'])
                ->where('servicio_id', $request['servicio_id'])
                ->where('producto_id', $request['producto_id'])
                ->where('marca_id', $request['marca_id'])
                ->where('referencia_id', $request['referencia_id'])
                ->where('palabra1', $request['palabra1'])
                ->where('palabra2', $request['palabra2'])
                ->where('palabra3', $request['palabra3'])
                ->where('palabra4', $request['palabra4'])
                ->get();
            if ($asignacionTemp->count() > 0) {
                $request['cantidad'] = $asignacionTemp->cantidad + 1;
            } else {
                $request['cantidad'] = 1;
            }
        } else {
            $request['cantidad'] = 1;
        }
        AsignacionParticular::create($request->all());
        return redirect('admin/funcionario/asignacion_particular-index')->with('mensaje', 'Se guardo la asignacion particular de manera correcta');
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
            return Municipio::where('departamento_id', $request['id'])->withCount('sedes')->having('sedes_count', '>', 0)->get();
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
    public function cargar_cargo(Request $request)
    {
        if ($request->ajax()) {
            $sede_id = $request['id'];
            return Cargo::with('sedes')->whereHas('sedes', function ($q) use ($sede_id) {
                $q->where('sede_id', $sede_id);
            })->get();
        } else {
            abort(404);
        }
    }
}
