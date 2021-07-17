<?php

namespace App\Http\Controllers\Intranet\Funcionarios;

use App\Models\Admin\Pais;
use Illuminate\Http\Request;
use App\Models\Admin\Usuario;
use App\Models\Admin\Tipo_Docu;
use App\Models\Admin\Departamento;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidarRegistroAsistido;
use App\Models\ConceptosUOpiniones\ConceptoUOpinion;
use App\Models\Consultas\Consulta;
use App\Models\Denuncias\Denuncia;
use App\Models\Empleados\Empleado;
use App\Models\Felicitaciones\Felicitacion;
use App\Models\Personas\Persona;
use App\Models\PQR\PQR;
use App\Models\SolicitudDatos\SolicitudDatos;
use App\Models\SolicitudesDocInfo\SolicitudDocInfo;
use App\Models\Sugerencias\Sugerencia;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Usuario::findOrFail(session('id_usuario'));
        $pqr_S = PQR::where('empleado_id', session('id_usuario'))->get();
        $conceptos = ConceptoUOpinion::all();
        $solicitudes_datos = SolicitudDatos::all();
        $denuncias = Denuncia::all();
        $felicitaciones = Felicitacion::all();
        $solicitudes_doc = SolicitudDocInfo::all();
        $sugerencias = Sugerencia::all();
        return view('intranet.funcionarios.listado_pqr', compact('pqr_S', 'conceptos', 'solicitudes_datos', 'denuncias', 'felicitaciones', 'solicitudes_doc', 'sugerencias', 'usuario'));
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
        $pqr = PQR::findorFail($id);
        return view('intranet.funcionarios.gestion_asignacion', compact('pqr'));
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
