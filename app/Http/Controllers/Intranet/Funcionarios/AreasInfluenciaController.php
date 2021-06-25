<?php

namespace App\Http\Controllers\Intranet\Funcionarios;

use App\Http\Controllers\Controller;
use App\Models\Admin\Departamento;
use App\Models\Empresas\Sede;
use Illuminate\Http\Request;

class AreasInfluenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sedes = Sede::get();
        $departamentos = Departamento::get();
        return view('intranet.parametros.areas_influencia.index', compact('sedes', 'departamentos'));
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
    public function guardar(Request $request)
    {
        if ($request->ajax()) {
            $sede_id = $request['sede_id'];
            $departamento_id = $request['departamento_id'];
            $sedes = new Sede();

            $sedes_f = Sede::with('departamentos')->whereHas('departamentos', function ($q) use ($departamento_id) {
                $q->where('departamento_id', $departamento_id);
            })->get();

            if ($sedes_f->count() > 0) {

                foreach ($sedes_f as $sede) {
                    $sede_act = $sede;
                }
                $sedes->find($sede_act->id)->departamentos()->detach($request->input('departamento_id'));
            }

            $sedes->find($request->input('sede_id'))->departamentos()->attach($request->input('departamento_id'));

            return response()->json(['respuesta' => 'El área de influencia se asigno correctamente']);
        } else {
            abort(404);
        }
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
