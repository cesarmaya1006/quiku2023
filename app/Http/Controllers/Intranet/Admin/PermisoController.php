<?php

namespace App\Http\Controllers\Intranet\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidarPermiso;
use App\Models\Admin\Permiso;
use Illuminate\Http\Request;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        can('listar-permisos');
        $permisos = Permiso::orderBy('id')->get();
        return view('intranet.sistema.permiso.index', compact('permisos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('intranet.sistema.permiso.crear',);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidarPermiso $request)
    {
        Permiso::create($request->all());
        return redirect('admin/permiso-crear/')->with('mensaje', 'Permiso creado con exito');
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
        $data = Permiso::findOrFail($id);
        return view('intranet.sistema.permiso.editar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidarPermiso  $request, $id)
    {
        Permiso::findOrFail($id)->update($request->all());
        return redirect('admin/permiso-index')->with('mensaje', 'Permiso actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request, $id)
    {
        if ($request->ajax()) {
            if (Permiso::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
