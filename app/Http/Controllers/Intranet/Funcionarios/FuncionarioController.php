<?php

namespace App\Http\Controllers\Intranet\Funcionarios;

use App\Models\PQR\PQR;
use App\Models\Admin\Pais;
use Illuminate\Http\Request;
use App\Models\Admin\Usuario;
use App\Models\PQR\Prioridad;
use App\Models\Admin\Tipo_Docu;
use App\Models\Personas\Persona;
use App\Models\Admin\Departamento;
use App\Models\Empleados\Empleado;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidarRegistroAsistido;
use App\Models\PQR\AsignacionEstado;
use App\Models\PQR\Peticion;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peticiones = Peticion::where('empleado_id', session('id_usuario'))->get();
        $pqr = PQR::where('empleado_id', session('id_usuario'))->get();
        $estados = AsignacionEstado::get();
        return view('intranet.funcionarios.listado_pqr', compact('pqr', 'peticiones', 'estados'));
    }
    public function crear_usuario()
    {
        $tipos_docu = Tipo_Docu::get();
        $paises = Pais::get();
        $departamentos = Departamento::get();
        $usuario = Usuario::findorFail(session('id_usuario'));
        return view('intranet/crear_usuario_asistido.index', compact('usuario', 'tipos_docu', 'paises', 'departamentos'));
    }
    public function cambiar_password()
    {
        return view('intranet/password.index');
    }
    
    public function listado_usuarios()
    {
        $usuariosTotales = Usuario::all();
        $usuarios = [];
        foreach ($usuariosTotales as $usuario) {
            if(sizeOf($usuario->roles) == 1){
                if($usuario->roles[0]->id == 6){
                    $usuarios[] = $usuario;
                }
            }
        }
        return view('intranet/funcionarios/listado_usuarios.index', compact('usuarios'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registro_asistido(ValidarRegistroAsistido $request)
    {

        $direccion = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $request['direccion']);
        $nuevoUsuario['usuario'] = $request['usuario'];
        $nuevoUsuario['password'] = bcrypt(utf8_encode($request['password']));
        $usuario = Usuario::create($nuevoUsuario);
        $roles['rol_id'] = 6;
        $usuario->roles()->sync($roles);

        $nuevaPersona['id'] = $usuario->id;
        $nuevaPersona['docutipos_id'] = $request['docutipos_id'];
        $nuevaPersona['identificacion'] = $request['identificacion'];
        $nuevaPersona['nombre1'] = $request['primernombre'];
        $nuevaPersona['nombre2'] = $request['segundonombre'];
        $nuevaPersona['apellido1'] = $request['primerapellido'];
        $nuevaPersona['apellido2'] = $request['segundoapelldio'];
        $nuevaPersona['telefono_fijo'] = $request['telefonofijo'];
        $nuevaPersona['telefono_celu'] = $request['telefonocelular'];
        $nuevaPersona['direccion'] = $direccion;
        $nuevaPersona['pais_id'] = $request['pais'];
        $nuevaPersona['municipio_id'] = $request['municipio_id'];
        $nuevaPersona['nacionalidad'] = $request['nacionalidad'];
        $nuevaPersona['grado_educacion'] = $request['grado'];
        $nuevaPersona['genero'] = $request['genero'];
        $nuevaPersona['fecha_nacimiento'] = $request['fechanacimiento'];
        $nuevaPersona['grupo_etnico'] = $request['grupoetnico'];
        if ($request['discapasidad'] == 'no') {
            $nuevaPersona['discapacidad'] = 0;
        } else {
            $nuevaPersona['discapacidad'] = 1;
        }
        $nuevaPersona['tipo_discapacidad'] = $request['tipodiscapacidad'];
        $nuevaPersona['email'] = $request['email'];
        $nuevaPersona['comunicaciones'] = 1;
        $nuevaPersona['asistido'] = 1;
        Persona::create($nuevaPersona);
        return redirect('funcionario/crear-usuario-creado/' . $usuario->id)->with('mensaje', 'Usuario Creado con éxito');
    }

    public function usuario_creado($id)
    {
        $persona = Persona::findOrFail($id);
        return view('intranet.funcionarios.usuario_creado', compact('persona'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request)
    {
        Empleado::findOrFail(session('id_usuario'))->update($request->all());
        return redirect('admin/index')->with('mensaje', 'Se actualizaron los datos de manera exitosa en la plataforma');
    }

    public function gestionar_asignacion($id)
    {
        $estados = AsignacionEstado::all();
        $pqr = PQR::findorFail($id);
        return view('intranet.funcionarios.gestion_asignacion', compact('pqr', 'estados'));
    }
    public function gestionar_asignacion_asignador($id)
    {
        $estados = AsignacionEstado::all();
        $pqr = PQR::findorFail($id);
        return view('intranet.funcionarios.gestion_asignacion_asignador', compact('pqr', 'estados'));
    }

    public function gestionar_asignacion_supervisa($id)
    {
        $estados = AsignacionEstado::all();
        $pqr = PQR::findorFail($id);
        $estadoPrioridad = Prioridad::all();
        return view('intranet.funcionarios.gestion_asignacion_supervisa', compact('pqr', 'estadoPrioridad', 'estados'));
    }

    public function gestionar_asignacion_proyecta($id)
    {
        $estados = AsignacionEstado::all();
        $pqr = PQR::findorFail($id);
        $estadoPrioridad = Prioridad::all();
        return view('intranet.funcionarios.gestion_asignacion_proyecta', compact('pqr', 'estadoPrioridad', 'estados'));
    }

    public function gestionar_asignacion_revisa($id)
    {
        $estados = AsignacionEstado::all();
        $pqr = PQR::findorFail($id);
        $estadoPrioridad = Prioridad::all();
        return view('intranet.funcionarios.gestion_asignacion_revisa', compact('pqr', 'estadoPrioridad', 'estados'));
    }

    public function gestionar_asignacion_aprueba($id)
    {
        $estados = AsignacionEstado::all();
        $pqr = PQR::findorFail($id);
        $estadoPrioridad = Prioridad::all();
        return view('intranet.funcionarios.gestion_asignacion_aprueba', compact('pqr', 'estadoPrioridad', 'estados'));
    }

    public function gestionar_asignacion_radica($id)
    {
        $estados = AsignacionEstado::all();
        $pqr = PQR::findorFail($id);
        $estadoPrioridad = Prioridad::all();
        return view('intranet.funcionarios.gestion_asignacion_radica', compact('pqr', 'estadoPrioridad', 'estados'));
    }

    public function registro()
    {
        $tipos_docu = Tipo_Docu::get();
        $paises = Pais::get();
        $departamentos = Departamento::get();
        $usuario = Usuario::findorFail(session('id_usuario'));
        return view('intranet.funcionarios.tutela.registro', compact('usuario', 'tipos_docu', 'paises', 'departamentos'));
    }

    public function listado()
    {
        return view('intranet.funcionarios.tutela.listado');
    }

    public function gestion()
    {
        return view('intranet.funcionarios.tutela.gestion');
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
    public function editar()
    {
        $tipos_docu = Tipo_Docu::get();
        $paises = Pais::get();
        $departamentos = Departamento::get();
        $usuario = Usuario::findorFail(session('id_usuario'));
        return view('intranet/datos_personales.index', compact('usuario', 'tipos_docu', 'paises', 'departamentos'));

        // return view('intranet.funcionarios.editar');
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
