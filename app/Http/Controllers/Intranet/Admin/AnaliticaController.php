<?php

namespace App\Http\Controllers\Intranet\Admin;

use App\Http\Controllers\Controller;
use App\Models\PQR\Motivo;
use App\Models\PQR\PQR;
use App\Models\PQR\tipoPQR;
use Illuminate\Http\Request;

class AnaliticaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiempomedio = [];
        $tiposPqr = tipoPQR::get();
        $dias = 1;
        foreach ($tiposPqr as $tipoPqr) {
            $pqrs = PQR::where('tipo_pqr_id', $tipoPqr->id)->get();
            $cantidadDias = [];
            foreach ($pqrs as $pqr) {
                $fechaAntigua  = $pqr->fecha_radicado;
                $fechaReciente = $pqr->fecha_respuesta;
                $cantidadDias[] = $fechaAntigua->diffInDays($fechaReciente);
            }
            $mediadias = collect($cantidadDias);
            if ($mediadias->median() > 0) {
                $tiempomedio[] = ['y' => $mediadias->median(), 'label' => $tipoPqr->tipo];
            } else {
                $tiempomedio[] = ['y' => 0, 'label' => $tipoPqr->tipo];
            }
        }
        return view('intranet.funcionarios.analitica.index', compact('tiempomedio'));
    }

    public function tipoPQR(Request $request)
    {
        if ($request->ajax()) {
            $tiempomedio = [];
            if ($request['busqueda' == 'tipopqr']) {
                $tiposPqr = tipoPQR::get();
                foreach ($tiposPqr as $tipoPqr) {
                    $pqrs = PQR::where('tipo_pqr_id', $tipoPqr->id)->get();
                    $cantidadDias = [];
                    foreach ($pqrs as $pqr) {
                        $fechaAntigua  = $pqr->fecha_radicado;
                        $fechaReciente = $pqr->fecha_respuesta;
                        $cantidadDias[] = $fechaAntigua->diffInDays($fechaReciente);
                    }
                    $mediadias = collect($cantidadDias);
                    if ($mediadias->median() > 0) {
                        $tiempomedio[] = ['y' => $mediadias->median(), 'label' => $tipoPqr->tipo];
                    } else {
                        $tiempomedio[] = ['y' => 0, 'label' => $tipoPqr->tipo];
                    }
                }
            } else if ($request['busqueda' == 'motivos']) {
                $motivos = Motivo::get();
                foreach ($motivos as $motivo) {
                    $pqrs = PQR::get();

                    /*$pqrs = PQR::with('normas')->whereHas('normas', function ($q) use ($id) {
                        $q->where('wiku_norma_id', $id);
                    })->get();
                    $cantidadDias = [];
                    foreach ($pqrs as $pqr) {
                        $fechaAntigua  = $pqr->fecha_radicado;
                        $fechaReciente = $pqr->fecha_respuesta;
                        $cantidadDias[] = $fechaAntigua->diffInDays($fechaReciente);
                    }
                    $mediadias = collect($cantidadDias);
                    if ($mediadias->median() > 0) {
                        $tiempomedio[] = ['y' => $mediadias->median(), 'label' => $tipoPqr->tipo];
                    } else {
                        $tiempomedio[] = ['y' => 0, 'label' => $tipoPqr->tipo];
                    }
                    */
                }
            }
            return response()->json(
                $tiempomedio,
                200,
                ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
                JSON_UNESCAPED_UNICODE
            );
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
