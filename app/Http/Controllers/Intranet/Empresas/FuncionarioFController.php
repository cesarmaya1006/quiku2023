<?php

namespace App\Http\Controllers\Intranet\Empresas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Empresa\ValidacionEmpleados;
use App\Models\Admin\Area;
use App\Models\Admin\Cargo;
use App\Models\Admin\Departamento;
use App\Models\Admin\Municipio;
use App\Models\Admin\Nivel;
use App\Models\Admin\Tipo_Docu;
use App\Models\Admin\Usuario;
use App\Models\Empleados\Empleado;
use Illuminate\Http\Request;

class FuncionarioFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::get();
        return view('intranet.parametros.funcionarios.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $departamentos = Departamento::with('municipios')->whereHas('municipios', function ($q) {
            $q->withCount('sedes')->having('sedes_count', '>', 0);
        })->get();
        $areas = Area::with('niveles')->whereHas('niveles', function ($q) {
            $q->withCount('cargos')->having('cargos_count', '>', 0);
        })->get();
        $tipos_doc = Tipo_Docu::get();
        return view('intranet.parametros.funcionarios.crear', compact('tipos_doc', 'departamentos', 'areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionEmpleados $request)
    {
        $usuario_new['usuario'] = $request['usuario'];
        $usuario_new['password'] = bcrypt(utf8_encode($request['password']));
        $usuario = Usuario::create($usuario_new);
        $roles['rol_id'] = 5;
        $usuario->roles()->sync($roles);
        //--------------------------------------------------
        $empleado_new['id'] = $usuario->id;
        $empleado_new['docutipos_id'] = $request['docutipos_id'];
        $empleado_new['cargo_id'] = $request['cargo_id'];
        $empleado_new['sede_id'] = $request['sede_id'];
        $empleado_new['estado'] = 1;
        $empleado_new['identificacion'] = $request['identificacion'];
        $empleado_new['nombre1'] = $request['nombre1'];
        $empleado_new['nombre2'] = $request['nombre2'];
        $empleado_new['apellido1'] = $request['apellido1'];
        $empleado_new['apellido2'] = $request['apellido2'];
        $empleado_new['telefono_celu'] = $request['telefono_celu'];
        $empleado_new['direccion'] = $request['direccion'];
        $empleado_new['genero'] = $request['genero'];
        $empleado_new['fecha_nacimiento'] = $request['fecha_nacimiento'];
        $empleado_new['email'] = $request['email'];
        Empleado::create($empleado_new);
        return redirect('admin/funcionario/funcionarios/index')->with('mensaje', 'Funcionario creado con exito');
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
    public function editar($id)
    {
        $departamentos = Departamento::with('municipios')->whereHas('municipios', function ($q) {
            $q->withCount('sedes')->having('sedes_count', '>', 0);
        })->get();
        $areas = Area::with('niveles')->whereHas('niveles', function ($q) {
            $q->withCount('cargos')->having('cargos_count', '>', 0);
        })->get();
        $tipos_doc = Tipo_Docu::get();
        $empleado = Empleado::findOrFail($id);
        return view('intranet.parametros.funcionarios.editar', compact('empleado', 'tipos_doc', 'departamentos', 'areas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionEmpleados $request, $id)
    {
        $empleado_new['docutipos_id'] = $request['docutipos_id'];
        $empleado_new['cargo_id'] = $request['cargo_id'];
        $empleado_new['sede_id'] = $request['sede_id'];
        $empleado_new['identificacion'] = $request['identificacion'];
        $empleado_new['nombre1'] = $request['nombre1'];
        $empleado_new['nombre2'] = $request['nombre2'];
        $empleado_new['apellido1'] = $request['apellido1'];
        $empleado_new['apellido2'] = $request['apellido2'];
        $empleado_new['telefono_celu'] = $request['telefono_celu'];
        $empleado_new['direccion'] = $request['direccion'];
        $empleado_new['genero'] = $request['genero'];
        $empleado_new['fecha_nacimiento'] = $request['fecha_nacimiento'];
        $empleado_new['email'] = $request['email'];
        Empleado::findOrFail($id)->update($empleado_new);
        return redirect('admin/funcionario/funcionarios/index')->with('mensaje', 'Funcionario actualizado con exito');
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
    public function cargar_niveles(Request $request)
    {
        if ($request->ajax()) {
            return Nivel::where('area_id', $request['id'])->withCount('cargos')->having('cargos_count', '>', 0)->get();
        } else {
            abort(404);
        }
    }
    public function cargar_cargos(Request $request)
    {
        if ($request->ajax()) {
            return Cargo::where('nivel_id', $request['id'])->get();
        } else {
            abort(404);
        }
    }
}
