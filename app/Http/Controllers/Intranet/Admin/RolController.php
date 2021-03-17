<?php

namespace App\Http\Controllers\Intranet\Admin;

use App\Exports\RolesExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionRol;
use App\Models\Admin\Rol;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Rol::orderBy('id')->get();
        return view('intranet.sistema.rol.index', compact('datas'));
    }
    public function exportarExcel()
    {
        return Excel::download(new RolesExport, 'Roles.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {

        return view('intranet.sistema.rol.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionRol  $request)
    {
        Rol::create($request->all());
        return redirect('admin/rol-crear')->with('mensaje', 'Rol creado con exito');
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
        $data = Rol::findOrFail($id);
        return view('intranet.sistema.rol.editar', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionRol $request, $id)
    {
        Rol::findOrFail($id)->update($request->all());
        $datas = Rol::orderBy('id')->get();
        return redirect('admin/rol-index')->with('mensaje', 'Rol actualizado con exito')->with('datas');
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
            if (Rol::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
