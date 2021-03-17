<?php

namespace App\Http\Controllers\Intranet\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Rol;
use App\Models\Admin\Tipo_Docu;
use App\Models\Admin\Usuario;
use App\Models\Mgl\Apoderado;
use App\Models\Mgl\Asistente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Rol::get();
        return view('intranet.sistema.usuario.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $tiposdocu = Tipo_Docu::orderBy('id')->get();
        $roles = Rol::whereIn('id', [2, 3, 4])->orderBy('id')->pluck('nombre', 'id')->toArray();
        return view('intranet.sistema.usuario.crear', compact('roles', 'tiposdocu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {

        //.........................................................................
        $nuevoUsuario['docutipos_id'] = $request['docutipos_id'];
        $nuevoUsuario['identificacion'] = $request['identificacion'];
        $nuevoUsuario['nombres'] = utf8_encode(ucwords($request['nombres']));
        $nuevoUsuario['apellidos'] = utf8_encode(ucwords($request['apellidos']));
        $nuevoUsuario['email'] = strtolower($request['email']);
        $nuevoUsuario['telefono'] = $request['telefono'];
        $nuevoUsuario['password'] = bcrypt(utf8_encode($request['password']));
        $nuevoUsuario['camb_password'] = 0;
        $roles = $request->rol_id;
        $roles['estado'] = 1;
        $usuario = Usuario::create($nuevoUsuario);
        $usuario->roles()->sync($request->rol_id);
        //...........................................................................
        return redirect('admin/usuario-index')->with('mensaje', 'Usuario creado con exito');
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
        $tiposdocu = Tipo_Docu::orderBy('id')->get();
        $roles = Rol::where('id', '>', 1)->orderBy('id')->pluck('nombre', 'id')->toArray();
        $data = Usuario::findOrFail($id);
        return view('intranet.sistema.usuario.editar', compact('data', 'roles', 'tiposdocu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, $id)
    {
        $actualizar_usuario['docutipos_id'] = $request['docutipos_id'];
        $actualizar_usuario['identificacion'] = $request['identificacion'];
        $actualizar_usuario['nombres'] = $request['nombres'];
        $actualizar_usuario['apellidos'] = $request['apellidos'];
        $actualizar_usuario['email'] = $request['email'];
        $actualizar_usuario['telefono'] = $request['telefono'];
        $roles = $request->rol_id;
        $roles['estado'] = 1;
        $usuario = Usuario::findOrFail($id);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
        Usuario::findOrFail($id)->update($actualizar_usuario);
        $usuario->update($actualizar_usuario);
        //-------------------------------------------
        return redirect('admin/usuario-index')->with('mensaje', 'Usuario Actualizado con exito');
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
