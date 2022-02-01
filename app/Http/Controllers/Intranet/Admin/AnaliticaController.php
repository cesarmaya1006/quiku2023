<?php

namespace App\Http\Controllers\Intranet\Admin;

use App\Http\Controllers\Controller;
use App\Models\PQR\Motivo;
use App\Models\PQR\PQR;
use App\Models\PQR\SubMotivo;
use App\Models\PQR\tipoPQR;
use App\Models\Productos\Categoria;
use App\Models\Servicios\Servicio;
use Carbon\Carbon;
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
        $tipos_pqr = tipoPQR::get();
        $categorias = Categoria::get();
        $servicios = Servicio::get();
        $dias = 1;
        $primeraPqr = PQR::first();
        $ultimaPqr = PQR::latest('fecha_radicado')->first();
        $fechaannoini = Carbon::parse($primeraPqr->fecha_radicado);
        $annoini = $fechaannoini->year;

        $fechaannofin = Carbon::parse($ultimaPqr->fecha_radicado);
        $annofin = $fechaannofin->year;
        foreach ($tipos_pqr as $tipoPqr) {
            $pqrs = PQR::where('tipo_pqr_id', $tipoPqr->id)->get();
            $cantidadDias = [];
            foreach ($pqrs as $pqr) {
                $fechaAntigua  = Carbon::parse($pqr->fecha_radicado);
                $fechaReciente = Carbon::parse($pqr->fecha_respuesta);
                $cantidadDias[] = $fechaAntigua->diffInDays($fechaReciente);
            }
            $mediadias = collect($cantidadDias);
            if ($mediadias->median() > 0) {
                $tiempomedio[] = ['y' => $mediadias->median(), 'label' => $tipoPqr->tipo];
            } else {
                $tiempomedio[] = ['y' => 0, 'label' => $tipoPqr->tipo];
            }
        }
        return view('intranet.funcionarios.analitica.index', compact(
            'tipos_pqr',
            'categorias',
            'servicios',
            'tiempomedio',
            'annoini',
            'annofin'
        ));
    }

    public function cantidad()
    {
        $tipos_pqr = tipoPQR::get();
        $categorias = Categoria::get();
        $servicios = Servicio::get();
        $primeraPqr = PQR::first();
        $ultimaPqr = PQR::latest('fecha_radicado')->first();
        $fechaannoini = Carbon::parse($primeraPqr->fecha_radicado);
        $annoini = $fechaannoini->year;
        $fechaannofin = Carbon::parse($ultimaPqr->fecha_radicado);
        $annofin = $fechaannofin->year;
        return view('intranet.funcionarios.analitica.analiticacantidad', compact(
            'tipos_pqr',
            'categorias',
            'servicios',
            'annoini',
            'annofin'
        ));
    }
    public function tipoPQR(Request $request)
    {
        $meses = array(
            1 => 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
        );
        if ($request->ajax()) {
            $medianas = [];
            $respuesta = [];
            $annoBusqueda = $request['annoBusqueda'];
            $annoFin  = date("Y");
            $tiposPqr = tipoPQR::get();
            for ($i = $annoBusqueda; $i <= $annoFin; $i++) {
                for ($j = 1; $j <= 12; $j++) {
                    if ($request['busqueda'] == 'tipopqr_id') {
                        $motivos = Motivo::where('tipo_pqr_id', $request['id'])->get();
                        foreach ($motivos as $motivo) {
                            $pqrs = PQR::where('tipo_pqr_id', $request['id'])
                                ->whereYear('fecha_radicado', date("Y", $i))
                                ->whereMonth('fecha_radicado', date("m", $j))
                                ->get();
                            $cantidadDias = [];
                            if ($pqrs->count() > 0) {
                                foreach ($pqrs as $pqr) {
                                    $fechaAntigua  = Carbon::parse($pqr->fecha_radicado);
                                    $fechaReciente = Carbon::parse($pqr->fecha_respuesta);
                                    $cantidadDias[] = $fechaAntigua->diffInDays($fechaReciente);
                                }
                                $mediadias = collect($cantidadDias);
                                $medianas[] = ['anno' => $i, 'mes' => $j, 'tipo_pqr_id' => $motivo->id, 'tipo' => $motivo->tipo, 'mediana' => $mediadias->median()];
                            } else {
                                $medianas[] = ['anno' => $i, 'mes' => $j, 'tipo_pqr_id' => $motivo->id, 'tipo' => $motivo->tipo, 'mediana' => '0'];
                            }
                        }
                    }
                }
            }
            foreach ($motivos as $motivo) {
                $dataPoints = [];
                for ($i = $annoBusqueda; $i <= $annoFin; $i++) {
                    for ($j = 1; $j <= 12; $j++) {
                        foreach ($medianas as $item) {
                            if ($motivo->id == $item['tipo_pqr_id'] && $i == $item['anno'] && $j == $item['mes']) {
                                $dataPoints[] = ['x' => $j, 'y' => rand(1, 50)];
                            }
                        }
                    }
                }
                $respuesta[] = [
                    'type' => $_REQUEST['tipo_grafico'],
                    'name' => $motivo->motivo,
                    'markerSize' => 5,
                    'showInLegend' => true,
                    'dataPoints' => $dataPoints
                ];
            }

            /*if ($request['busqueda'] == 'tipopqr') {
                $tiposPqr = tipoPQR::get();
                foreach ($tiposPqr as $tipoPqr) {
                    $pqrs = PQR::where('tipo_pqr_id', $tipoPqr->id)
                        ->whereYear('fecha_radicado', '>=', date("Y", $fechaini))
                        ->whereYear('fecha_radicado', '<=', date("Y", $fechafin))
                        ->whereMonth('fecha_radicado', '>=', date("m", $fechaini))
                        ->whereMonth('fecha_radicado', '<=', date("m", $fechafin))
                        ->get();
                    $cantidadDias = [];
                    foreach ($pqrs as $pqr) {
                        $fechaAntigua  = Carbon::parse($pqr->fecha_radicado);
                        $fechaReciente = Carbon::parse($pqr->fecha_respuesta);
                        $cantidadDias[] = $fechaAntigua->diffInDays($fechaReciente);
                    }
                    $mediadias = collect($cantidadDias);
                    if ($mediadias->median() > 0) {
                        $tiempomedio[] = [
                            'type' => 'area',
                            'name' => $tipoPqr->tipo,
                            'markerSize' => 5,
                            'showInLegend' => true,
                            'xValueFormatString' => 'MMMM',
                            'dataPoints' => array(
                                array('x' => Carbon::parse(date("Y", $fechaini), date("m", $fechaini)), 'y' => $mediadias->median()),
                            )
                        ];
                    } else {
                        $tiempomedio[] = [
                            'type' => 'area',
                            'name' => $tipoPqr->tipo,
                            'markerSize' => 5,
                            'showInLegend' => true,
                            'xValueFormatString' => 'MMMM',
                            'dataPoints' => array(
                                array('x' => Carbon::parse(date("Y", $fechaini), date("m", $fechaini)), 'y' => rand(1, 50)),
                            )
                        ];
                    }
                }
            } else if ($request['busqueda'] == 'motivos') {
                $motivos = Motivo::get();
                foreach ($motivos as $motivo) {

                    $pqrs = PQR::whereYear('fecha_radicado', '>=', date("Y", $fechaini))
                        ->whereYear('fecha_radicado', '<=', date("Y", $fechafin))
                        ->whereMonth('fecha_radicado', '>=', date("m", $fechaini))
                        ->whereMonth('fecha_radicado', '<=', date("m", $fechafin))
                        ->with('peticiones')->whereHas('peticiones.motivo', function ($q) use ($motivo) {
                            $q->where('motivo_id', $motivo->id);
                        })->get();


                    $cantidadDias = [];
                    foreach ($pqrs as $pqr) {

                        $fechaAntigua  = Carbon::parse($pqr->fecha_radicado);
                        $fechaReciente = Carbon::parse($pqr->fecha_respuesta);
                        $cantidadDias[] = $fechaAntigua->diffInDays($fechaReciente);
                    }
                    $mediadias = collect($cantidadDias);
                    if ($mediadias->median() > 0) {
                        $tiempomedio[] = ['y' => $mediadias->median(), 'label' => $motivo->motivo];
                    } else {
                        $tiempomedio[] = ['y' => rand(10, 30), 'label' => $motivo->motivo];
                    }
                }
            } else if ($request['busqueda'] == 'tipopqr_id') {
                $motivos = Motivo::where('tipo_pqr_id', $request['id'])->get();
                foreach ($motivos as $motivo) {
                    $pqrs = PQR::where('tipo_pqr_id', $request['id'])
                        ->whereYear('fecha_radicado', '>=', date("Y", $fechaini))
                        ->whereYear('fecha_radicado', '<=', date("Y", $fechafin))
                        ->whereMonth('fecha_radicado', '>=', date("m", $fechaini))
                        ->whereMonth('fecha_radicado', '<=', date("m", $fechafin))
                        ->get();
                    $cantidadDias = [];
                    foreach ($pqrs as $pqr) {
                        $fechaAntigua  = Carbon::parse($pqr->fecha_radicado);
                        $fechaReciente = Carbon::parse($pqr->fecha_respuesta);
                        $cantidadDias[] = $fechaAntigua->diffInDays($fechaReciente);
                    }
                    $mediadias = collect($cantidadDias);
                    if ($mediadias->median() > 0) {
                        $tiempomedio[] = ['label' => $motivo->motivo, 'y' => $mediadias->median(), 'legendText' => $motivo->motivo];
                    } else {
                        $tiempomedio[] = ['label' => $motivo->motivo, 'y' => rand(10, 30), 'legendText' => $motivo->motivo];
                    }
                }
            } else if ($request['busqueda'] == 'motivo_id') {
                $submotivos = SubMotivo::where('motivo_id', $request['id'])->get();
                foreach ($submotivos as $submotivo) {
                    $motivo = Motivo::findOrFail($request['id']);
                    $pqrs = PQR::whereYear('fecha_radicado', '>=', date("Y", $fechaini))
                        ->whereYear('fecha_radicado', '<=', date("Y", $fechafin))
                        ->whereMonth('fecha_radicado', '>=', date("m", $fechaini))
                        ->whereMonth('fecha_radicado', '<=', date("m", $fechafin))
                        ->with('peticiones')->whereHas('peticiones.motivo', function ($q) use ($motivo) {
                            $q->where('motivo_id', $motivo->id);
                        })->get();
                    $cantidadDias = [];
                    foreach ($pqrs as $pqr) {
                        $fechaAntigua  = Carbon::parse($pqr->fecha_radicado);
                        $fechaReciente = Carbon::parse($pqr->fecha_respuesta);
                        $cantidadDias[] = $fechaAntigua->diffInDays($fechaReciente);
                    }
                    $mediadias = collect($cantidadDias);
                    if ($mediadias->median() > 0) {
                        $tiempomedio[] = ['label' => $submotivo->sub_motivo, 'y' => $mediadias->median(), 'legendText' => $submotivo->sub_motivo];
                    } else {
                        $tiempomedio[] = ['label' => $submotivo->sub_motivo, 'y' => rand(10, 30), 'legendText' => $submotivo->sub_motivo];
                    }
                }
            }*/
            return response()->json(
                $respuesta,
                200,
                ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
                JSON_UNESCAPED_UNICODE
            );
        }
    }
    public function cantidad_cargar(Request $request)
    {
        $meses = array(
            'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
        );
        if ($request->ajax()) {

            $cantidad = [];
            $respuesta = [];
            $annoBusqueda = $request['annoBusqueda'];
            $annoFin  = date("Y");
            $tiposPqr = tipoPQR::get();
            for ($i = $annoBusqueda; $i <= $annoFin; $i++) {
                for ($j = 1; $j <= 12; $j++) {
                    if ($request['busqueda'] == 'tipopqr_id') {
                        $motivos = Motivo::where('tipo_pqr_id', $request['id'])->get();
                        foreach ($motivos as $motivo) {
                            $pqrs = PQR::where('tipo_pqr_id', $request['id'])
                                ->whereYear('fecha_radicado', date("Y", $i))
                                ->whereMonth('fecha_radicado', date("m", $j))
                                ->get();
                            $cantidadDias = [];
                            if ($pqrs->count() > 0) {
                                $cantidad_pqr = 0;
                                foreach ($pqrs as $pqr) {
                                    foreach ($pqr->peticiones as $peticion) {
                                        if ($peticion->motivo->motivo_id == $motivo->id) {
                                            $cantidad_pqr++;
                                        }
                                    }
                                }
                                $cantidad[] = ['anno' => $i, 'mes' => $j, 'tipo_pqr_id' => $motivo->id, 'tipo' => $motivo->tipo, 'cantidad' => $cantidad_pqr];
                            } else {
                                $cantidad[] = ['anno' => $i, 'mes' => $j, 'tipo_pqr_id' => $motivo->id, 'tipo' => $motivo->tipo, 'cantidad' => 0];
                            }
                        }
                    }
                }
            }
            if ($_REQUEST['tipo_grafico'] == 'pie') {
                foreach ($motivos as $motivo) {
                    $dataPoints = [];
                    for ($i = $annoBusqueda; $i <= $annoFin; $i++) {
                        for ($j = 1; $j <= 12; $j++) {
                            foreach ($cantidad as $item) {
                                if ($motivo->id == $item['tipo_pqr_id'] && $i == $item['anno'] && $j == $item['mes']) {
                                    $dataPoints[] = ['y' => rand(1, 50), 'name' => $meses[$j - 1]];
                                }
                            }
                        }
                    }
                    $respuesta[] = [
                        'motivo' => $motivo->motivo,
                        'type' => "pie",
                        'showInLegend' => true,
                        'indexLabel' => "{name}",
                        'toolTipContent' => "<b>{name}</b>: \${y} (#percent%)",
                        'legendText' => "{name} (#percent%)",
                        'indexLabelPlacement' => "inside",
                        'dataPoints' => $dataPoints
                    ];
                }
            } else {
                foreach ($motivos as $motivo) {
                    $dataPoints = [];
                    for ($i = $annoBusqueda; $i <= $annoFin; $i++) {
                        for ($j = 1; $j <= 12; $j++) {
                            foreach ($cantidad as $item) {
                                if ($motivo->id == $item['tipo_pqr_id'] && $i == $item['anno'] && $j == $item['mes']) {
                                    $dataPoints[] = ['x' => $j, 'y' => rand(1, 50)];
                                }
                            }
                        }
                    }
                    $respuesta[] = [
                        'type' => $_REQUEST['tipo_grafico'],
                        'name' => $motivo->motivo,
                        'markerSize' => 5,
                        'showInLegend' => true,
                        'dataPoints' => $dataPoints
                    ];
                }
            }
        }
        return response()->json(
            $respuesta,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
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
