<?php

namespace App\Http\Controllers\Intranet\Funcionarios;

use App\Http\Controllers\Controller;
use App\Models\Admin\WikuArgumento;
use App\Models\Admin\WikuDoctrina;
use App\Models\Admin\WikuJurisprudencia;
use App\Models\Admin\WikuNorma;
use App\Models\Tutela\Motivotutela;
use App\Models\Tutela\Submotivotutela;
use Illuminate\Http\Request;

class AsociacionTutelaWiku extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $normas = WikuNorma::all();
        $argumentos = WikuArgumento::all();
        $jurisprudencias = WikuJurisprudencia::all();
        $doctrinas = WikuDoctrina::all();
        $motivos = Motivotutela::all();
        return view('intranet.parametros.tutela.index', compact(
            'normas',
            'argumentos',
            'jurisprudencias',
            'doctrinas',
            'motivos'
        ));
    }

    public function asociar_agumento($wiku_argumento_id)
    {
        $argumento = WikuArgumento::findOrFail($wiku_argumento_id);
        $motivos = Motivotutela::all();
        return view('intranet.parametros.tutela.jurisprudencias.asignacion', compact('argumento', 'motivos'));
    }

    public function asociar(Request $request)
    {
        if ($request->ajax()) {
            if ($request['tipo_wiku'] == 'argumento') {
                $argumento = WikuArgumento::findOrFail($request['wiku_argumento_id']);
                if ($request['val_check'] == 'sip') {
                    $argumento->asociacion_submotivotutelas()->attach([$request['submotivotutela_id']]);
                    return response()->json(['mensaje' => 'ok']);
                } else {
                    $argumento->asociacion_submotivotutelas()->detach($request['submotivotutela_id']);
                    return response()->json(['mensaje' => 'no']);
                }
            }
        } else {
            abort(404);
        }
    }
    public function eliminar(Request $request, $wiku_argumento_id, $submotivotutela_id)
    {
        if ($request->ajax()) {
            $argumento = WikuArgumento::findOrFail($wiku_argumento_id);
            $argumento->asociacion_submotivotutelas()->detach($submotivotutela_id);
            return response()->json(['mensaje' => 'ok']);
        } else {
            abort(404);
        }
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
