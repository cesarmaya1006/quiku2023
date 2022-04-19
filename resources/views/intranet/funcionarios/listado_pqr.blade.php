@extends("theme.back.plantilla")
<!-- ************************************************************* -->
<!-- Funciones php -->
@section('funciones_php')
    @include('includes.funciones_php')
@endsection
<!-- Pagina CSS -->
@section('estilosHojas')
    <link rel="stylesheet" href="{{ asset('css/intranet/index.css') }}">
@endsection
<!-- ************************************************************* -->
@section('tituloHoja')
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
@php
    function dias_restantes($fecha_inicial,$fecha_final){
        $dias = (strtotime($fecha_inicial)-strtotime($fecha_final))/86400;
        $dias = abs($dias); 
        $dias = floor($dias);
        return $dias;
    }

    function dias_estado($fecha_inicial,$fecha_final, $estadoPQR){
        $totaldias = (strtotime($fecha_inicial)-strtotime($fecha_final))/86400;
        $totaldias = abs($totaldias); 
        $totaldias = floor($totaldias);
        $contdias = (strtotime(date('Y-m-d') )-strtotime($fecha_final))/86400;
        $contdias = abs($contdias); 
        $contdias = floor($contdias - 1 );
        $porcentaje = floor((($contdias) / $totaldias) * 100 );
        $respuesta = 0 ;
        if($porcentaje >= 30){
            $respuesta = 1;
        }elseif ($porcentaje > 0) {
            $respuesta = 2;
        }else {
            $respuesta = 3;
        }
        if($estadoPQR == 6 || $estadoPQR == 9 || $estadoPQR == 10){
            $respuesta = 4;
        }
        return $respuesta;
    }
@endphp
    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <div class="col-12 col-md-12">
                @include('includes.error-form')
                @include('includes.mensaje')
            </div>
        </div>
        <div class="justify-content-center">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Listado PQR</h3>
                </div>
                <div class="card-body">
                    <div class="col-12 col-md-12 table-responsive">
                        <table class="table table-striped table-hover table-sm display">
                            <thead>
                                <tr>
                                    <th>Num. Radicado</th>
                                    <th>Fecha de radicación</th>
                                    <th>Tipo de PQR</th>
                                    <th>Tramite PQR</th>
                                    <th>Prioridad</th>
                                    <th>Estado PQR</th>
                                    <th>Petición PQR</th>
                                    <th>Plazo de respuesta (Días hábiles)</th>
                                    <th>Dias de vencimiento calendario</th>
                                    <th>Fecha estimada de respuesta</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($peticiones as $peticion)
                                    @if($peticion->estado_id != 11)
                                        <tr>
                                            @php
                                            $fechaFinal = date('Y-m-d', strtotime($peticion->pqr->fecha_generacion . '+ ' . ($peticion->pqr->tiempo_limite) . ' days'));
                                            @endphp
                                            <td>{{ $peticion->pqr->radicado }}</td>
                                            <td>{{ $peticion->pqr->created_at }}</td>
                                            <td>{{ $peticion->pqr->tipoPqr->tipo }}</td>
                                            <td>{{ $peticion->pqr->estado->estado_funcionario }}</td>
                                            @if ($peticion->pqr->prioridad_id == 1)
                                                <td class="bg-green">{{ $peticion->pqr->prioridad->prioridad}}</td>
                                            @elseif($peticion->pqr->prioridad_id == 2)
                                                <td class="bg-yellow">{{ $peticion->pqr->prioridad->prioridad}}</td>
                                            @elseif($peticion->pqr->prioridad_id == 3)
                                                <td class="bg-red">{{ $peticion->pqr->prioridad->prioridad}}</td>
                                            @endif
                                            @php
                                                $diasEstado = dias_estado($peticion->pqr->fecha_radicado, $fechaFinal, $peticion->pqr->estado->id);
                                            @endphp
                                            @if ($diasEstado == 1)
                                                <td class="bg-green" >
                                                    En terminos
                                                </td>
                                            @elseif ($diasEstado == 2)
                                                <td class="bg-yellow">
                                                    Proxima a vencer
                                                </td>
                                            @elseif($diasEstado == 3)
                                                <td class="bg-red">
                                                    Vencida
                                                </td>
                                            @elseif($diasEstado == 4)
                                                <td class="bg-blue">
                                                    Cerrado 
                                                </td>
                                            @endif
                                            <td>{{ $peticion->estadopeticion->estado }} %</td>
                                            <td>{{ $peticion->pqr->tipoPqr->tiempos + $peticion->pqr->prorroga_dias + $peticion->recurso_dias }}</td>
                                            <td>{{ dias_restantes(date('Y-m-d'), $fechaFinal) }}</td>
                                            <td>{{ $fechaFinal }}</td>
                                            <td>
                                                <a href="{{ route('funcionario-gestionar-asignacion-colaboracion', ['id' => $peticion->pqr->id]) }}"
                                                    class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                                        class="fa fa-edit text-info btn-editar" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
@endsection
<!-- ************************************************************* -->
