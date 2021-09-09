<?php

namespace App\Http\Controllers\Intranet\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidarPassword;
use App\Models\Admin\Usuario;
use App\Models\PQR\AsignacionTarea;
use App\Models\PQR\PQR;
use App\Models\PQR\tipoPQR;
use Illuminate\Http\Request;

class IntranetPageCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoPQR = tipoPQR::all();
        $usuario = Usuario::findOrFail(session('id_usuario'));
        $tareas = AsignacionTarea::where('empleado_id', $usuario->id)->get();
        if (session('rol_id') == 6) {
            if ($usuario->persona->count() > 0) {
                $pqrs = PQR::where('persona_id', session('id_usuario'))->get();
            } else {
                foreach ($usuario->representante->empresas as $empresa) {
                    $pqrs = PQR::where('empresa_id', session('id_usuario'))->get();
                }
            }
        } elseif (session('rol_id') == 5) {
            if ($usuario->empleado->cargo->id == 1) {
                $pqrs = PQR::all();
                $pqrs = $pqrs->where("estado_creacion", 1);
            } else {
                $pqrs = PQR::where('empleado_id', $usuario->id)->get();
            }
        } elseif (session('rol_id') == 4) {
            $pqrs = PQR::where('empleado_id', session('id_usuario'))->get();
        } elseif (session('rol_id') == 1) {
            $pqrs = PQR::get();
        } elseif (session('rol_id') == 3) {
            $pqrs = PQR::get();
        }

        return view('intranet.index.index', compact('pqrs', 'usuario', 'tipoPQR', 'tareas'));
    }

    public function restablecer_password(ValidarPassword $request)
    {
        $nuevoPassword['password'] = bcrypt(utf8_encode($request['password1']));
        $nuevoPassword['camb_password'] = 0;
        Usuario::findOrFail($request['id'])->update($nuevoPassword);
        return redirect('admin/index')->with('mensaje', 'Se cambio la contraseña de manera exitosa en la plataforma');
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
