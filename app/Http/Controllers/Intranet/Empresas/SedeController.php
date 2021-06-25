<?php

namespace App\Http\Controllers\Intranet\Empresas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Empresa\ValidacionSede;
use App\Models\Admin\Departamento;
use App\Models\Empresas\Sede;
use Illuminate\Http\Request;

class SedeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sedes = Sede::orderBy('municipio_id', 'ASC')->orderBy('nombre', 'ASC')->get();
        return view('intranet.parametros.sedes.index', compact('sedes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $departamentos = Departamento::get();
        return view('intranet.parametros.sedes.crear', compact('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionSede $request)
    {
        Sede::create($request->all());
        return redirect('admin/funcionario/sedes-index')->with('mensaje', 'Sede creada con exito');
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
        $departamentos = Departamento::get();
        $sede = Sede::findOrFail($id);
        return view('intranet.parametros.sedes.editar', compact('sede', 'departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionSede $request, $id)
    {
        Sede::findOrFail($id)->update($request->all());
        return redirect('admin/funcionario/sedes-index')->with('mensaje', 'Sede actualizada con exito');
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
            $sede = Sede::findOrFail($id);
            if ($sede->departamentos->count() > 0) {
                return response()->json(['mensaje' => 'ng']);
            } else {
                if (Sede::destroy($id)) {
                    return response()->json(['mensaje' => 'ok']);
                } else {
                    return response()->json(['mensaje' => 'ng']);
                }
            }
        } else {
            abort(404);
        }
    }
}
