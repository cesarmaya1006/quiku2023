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
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-8">
            @include('includes.error-form')
            @include('includes.mensaje')
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            {{-- @if ($usuario->empleado->cargo->id != 1) --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light" style="border: solid 1px blue;">
                        <div class="inner">
                            <h3>{{ $sin_aceptar->count() }}</h3>
                            <p style="font-size: 0.8em">Sin aceptar</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag text-primary"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light" style="border: solid 1px green;">
                        <div class="inner">
                            <h3>{{ $aceptadas->count() }}</h3>
                            <p style="font-size: 0.8em">Aceptadas</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars text-green"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light" style="border: solid 1px yellow;">
                        <div class="inner">
                            <h3>{{ $supervisadas->count() }}</h3>
                            <p style="font-size: 0.8em">En supervisión</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add text-warning"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light" style="border: solid 1px red;">
                        <div class="inner">
                            <h3>{{ $proyectadas->count() }}</h3>
                            <p style="font-size: 0.8em">Por proyectar</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph text-danger"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light" style="border: solid 1px grey">
                        <div class="inner">
                            <h3>{{ $hechos->count() + $pretensiones->count() }}</h3>
                            <p style="font-size: 0.8em">Colaboraciones</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph text-grey"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light" style="border:  solid 1px pink">
                        <div class="inner">
                            <h3>{{ $revisiones->count() }}</h3>
                            <p style="font-size: 0.8em">En revisión</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph text-pink"></i>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-3 col-6">
                    <div class="small-box bg-light" style="border: solid 1px teal">
                        <div class="inner">
                            <h3>{{$tareas->where('tareas_id', 4)->where('estado_id', '<', 11)->count()}}</h3>
                            <p style="font-size: 0.8em">En aprobación</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph text-teal"></i>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-lg-3 col-6">
                    <div class="small-box bg-light" style="border: solid 1px indigo">
                        <div class="inner">
                            <h3>{{$tareas->where('tareas_id', 5)->where('estado_id', '<', 11)->count()}}</h3>
                            <p style="font-size: 0.8em">En radicación</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph text-indigo"></i>
                        </div>
                    </div>
                </div> --}}
            {{-- @endif --}}
            {{-- @if ($usuario->empleado->cargo->id == 1)
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light" style="border: solid 1px blue;">
                        <div class="inner">
                            <h3>{{ $pqrs->where('empleado_id', null)->count() }}</h3>
                            <p style="font-size: 0.8em">Sin asignar</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag text-primary"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light" style="border: solid 1px green;">
                        <div class="inner">
                            <h3>{{ $pqrs->where('empleado_id', '!=', null)->count() }}</h3>
                            <p style="font-size: 0.8em">Asignadas</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars text-green"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light" style="border: solid 1px yellow;">
                        <div class="inner">
                            <h3>{{ $pqrs->where('tipo_pqr_id', 7)->count() }}</h3>
                            <p style="font-size: 0.8em">Felicitaciones</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add text-warning"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light" style="border: solid 1px red;">
                        <div class="inner">
                            <h3>{{ $pqrs->where('tipo_pqr_id', 9)->count() }}</h3>
                            <p style="font-size: 0.8em">Sugerencias</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph text-danger"></i>
                        </div>
                    </div>
                </div>
            @endif --}}
        </div>
    </div>
    {{-- Incio tabla sin aceptar --}}
    <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">Sin aceptar</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="card-body" style="display: none;">
            <table class="table table-striped table-hover table-sm display">
                <thead class="thead-inverse">
                    <tr>
                        <th class="text-center" style="white-space:nowrap;">Fecha radica Funcionario</th>
                        <th class="text-center" style="white-space:nowrap;">Estado</th>
                        <th class="text-center" style="white-space:nowrap;">Num Radicado</th>
                        <th class="text-center" style="white-space:nowrap;">Prioridad</th>
                        <th class="text-center" style="white-space:nowrap;">Ver</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tutelas as $tutela)
                    @if (!$tutela->estado_asignacion && $tutela->estado_creacion && $tutela->empleado_asignado_id  )
                            <tr>
                                <td class="text-center" style="white-space:nowrap;">{{ $tutela->created_at }}</td>
                                <td class="text-center" style="white-space:nowrap;">{{ $tutela->estado->estado_funcionario }}</td>
                                <td class="text-center" style="white-space:nowrap;">{{ $tutela->radicado }}</td>
                                <td class="text-center" style="white-space:nowrap;">{{ $tutela->prioridad->prioridad }}</td>
                                <td class="text-center">
                                    <a href="{{ route('gestionar_asignacion_tutela', ['id' => $tutela->id]) }}"
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
    {{-- Incio tabla pqrs activas --}}
    <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">Aceptadas</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="card-body" style="display: none;">
            <table class="table table-striped table-hover table-sm display">
                <thead class="thead-inverse">
                    <tr>
                        <th class="text-center" style="white-space:nowrap;">Fecha radica Funcionario</th>
                        <th class="text-center" style="white-space:nowrap;">Estado</th>
                        <th class="text-center" style="white-space:nowrap;">Num Radicado</th>
                        <th class="text-center" style="white-space:nowrap;">Prioridad</th>
                        <th class="text-center" style="white-space:nowrap;">Ver</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tutelas as $tutela)
                        @if ($tutela->estado_asignacion == 1 && $tutela->asignaciontareas->sum('estado_id') != 55)
                        <tr>
                            <td class="text-center" style="white-space:nowrap;">{{ $tutela->created_at }}</td>
                            <td class="text-center" style="white-space:nowrap;">{{ $tutela->estado->estado_funcionario }}</td>
                            <td class="text-center" style="white-space:nowrap;">{{ $tutela->radicado }}</td>
                            <td class="text-center" style="white-space:nowrap;">{{ $tutela->prioridad->prioridad }}</td>
                            <td class="text-center">
                                <a href="{{ route('gestionar_asignacion_tutela', ['id' => $tutela->id]) }}"
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
    {{-- Incio tablas de tareas --}}
    {{-- Tabla Supervisa --}}
    <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">En supervisión</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="card-body" style="display: none;">
            <table class="table table-striped table-hover table-sm display">
                <thead class="thead-inverse">
                    <tr>
                        <th class="text-center" style="white-space:nowrap;">Fecha radica usuario</th>
                        <th class="text-center" style="white-space:nowrap;">Estado Tutela</th>
                        <th class="text-center" style="white-space:nowrap;">Num Radicado</th>
                        <th class="text-center" style="white-space:nowrap;">Prioridad</th>
                        <th class="text-center" style="white-space:nowrap;">Ver</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($supervisadas as $supervisada)
                        <tr>
                            <td class="text-center" style="white-space:nowrap;">{{ $supervisada->tutela->fecha_radicado }}</td>
                            <td class="text-center" style="white-space:nowrap;">{{ $supervisada->tutela->estado->estado_funcionario }}</td>
                            <td class="text-center" style="white-space:nowrap;">{{ $supervisada->tutela->radicado }}</td>
                            <td class="text-center" style="white-space:nowrap;">
                                {{ $supervisada->tutela->prioridad->prioridad }}
                            </td>
                            <td class="text-center">
                                <a href="{{ route('gestionar-asignacion-supervisa_tutela', ['id' => $supervisada->tutela->id]) }}"
                                    class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                        class="fa fa-edit text-info btn-editar" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- Tabla Proyecta --}}
    <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">Por proyectar</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="card-body" style="display: none;">
            <table class="table table-striped table-hover table-sm display">
                <thead class="thead-inverse">
                    <tr>
                        <th class="text-center" style="white-space:nowrap;">Fecha radica usuario</th>
                        <th class="text-center" style="white-space:nowrap;">Estado Tutela</th>
                        <th class="text-center" style="white-space:nowrap;">Num Radicado</th>
                        <th class="text-center" style="white-space:nowrap;">Prioridad</th>
                        <th class="text-center" style="white-space:nowrap;">Estado Peticiones</th>
                        <th class="text-center" style="white-space:nowrap;">Ver</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proyectadas as $proyecta)
                        <tr>
                            <td class="text-center" style="white-space:nowrap;">{{ $proyecta->tutela->fecha_radicado }}</td>
                            <td class="text-center" style="white-space:nowrap;">{{ $proyecta->tutela->estado->estado_funcionario }}</td>
                            <td class="text-center" style="white-space:nowrap;">{{ $proyecta->tutela->radicado }}</td>
                            </td>
                            <td class="text-center" style="white-space:nowrap;">
                                {{ $proyecta->tutela->prioridad->prioridad }}
                            </td>
                            {{-- @php
                                $porcentaje = 0;
                                foreach ($tarea->pqr->peticiones as $key => $peticion) {
                                    $porcentaje += $peticion->estadopeticion->estado;
                                }
                            @endphp --}}
                            {{-- @if ( $porcentaje / $tarea->pqr->peticiones->count() == 100)
                                <td class="text-center bg-success" style="white-space:nowrap;">
                                    {{ $porcentaje / $tarea->pqr->peticiones->count() }}%
                                </td>
                            @elseif($porcentaje / $tarea->pqr->peticiones->count() == 0 )
                                <td class="text-center bg-danger" style="white-space:nowrap;">
                                    {{ $porcentaje / $tarea->pqr->peticiones->count() }}%
                                </td>
                            @else
                                <td class="text-center bg-warning" style="white-space:nowrap;">
                                    {{ $porcentaje / $tarea->pqr->peticiones->count() }}%
                                </td>
                            @endif --}}
                            <td>
                                -----
                            </td>
                            <td class="text-center">
                                <a href="{{ route('gestionar-asignacion-proyecta_tutela', ['id' => $proyecta->tutela->id]) }}"
                                    class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                        class="fa fa-edit text-info btn-editar" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- Tabla Colaboración --}}
    <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
        {{-- @php
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
        @endphp --}}
        <div class="card-header">
            <h3 class="card-title font-weight-bold">Colaboraciones</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="card-body" style="display: none;">
            <h6 class="mb-3">Hechos</h6>
            <table class="table table-striped table-hover table-sm display">
                <thead class="thead-inverse">
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
                        <th>Ver</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hechos as $hecho)
                        <tr>
                            {{-- @php
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
                            <td>{{ $fechaFinal }}</td> --}}
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="{{ route('gestionar_tutela', ['id' => $hecho->tutela->id]) }}"
                                    class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                        class="fa fa-edit text-info btn-editar" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <h6 class="mb-3">Pretensiones</h6>
            <table class="table table-striped table-hover table-sm display">
                <thead class="thead-inverse">
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
                        <th>Ver</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pretensiones as $pretension)
                        <tr>
                            {{-- @php
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
                            <td>{{ $fechaFinal }}</td> --}}
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="{{ route('gestionar_tutela', ['id' => $pretension->tutela->id]) }}"
                                    class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                        class="fa fa-edit text-info btn-editar" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- Tabla Revisa --}}
    <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">En revisión</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="card-body" style="display: none;">
            <table class="table table-striped table-hover table-sm display">
                <thead class="thead-inverse">
                    <tr>
                        <th class="text-center" style="white-space:nowrap;">Fecha radica usuario</th>
                        <th class="text-center" style="white-space:nowrap;">Estado Tutela</th>
                        <th class="text-center" style="white-space:nowrap;">Num Radicado</th>
                        <th class="text-center" style="white-space:nowrap;">Prioridad</th>
                        <th class="text-center" style="white-space:nowrap;">Ver</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($revisiones as $revision)
                        <tr>
                            <td class="text-center" style="white-space:nowrap;">{{ $revision->tutela->fecha_radicado }}</td>
                            <td class="text-center" style="white-space:nowrap;">{{ $revision->tutela->estado->estado_funcionario }}</td>
                            <td class="text-center" style="white-space:nowrap;">{{ $revision->tutela->radicado }}</td>
                            </td>
                            <td class="text-center" style="white-space:nowrap;">
                                {{ $revision->tutela->prioridad->prioridad }}
                            </td>
                            {{-- @php
                                $porcentaje = 0;
                                foreach ($tarea->pqr->peticiones as $key => $peticion) {
                                    $porcentaje += $peticion->estadopeticion->estado;
                                }
                            @endphp --}}
                            {{-- @if ( $porcentaje / $tarea->pqr->peticiones->count() == 100)
                                <td class="text-center bg-success" style="white-space:nowrap;">
                                    {{ $porcentaje / $tarea->pqr->peticiones->count() }}%
                                </td>
                            @elseif($porcentaje / $tarea->pqr->peticiones->count() == 0 )
                                <td class="text-center bg-danger" style="white-space:nowrap;">
                                    {{ $porcentaje / $tarea->pqr->peticiones->count() }}%
                                </td>
                            @else
                                <td class="text-center bg-warning" style="white-space:nowrap;">
                                    {{ $porcentaje / $tarea->pqr->peticiones->count() }}%
                                </td>
                            @endif --}}
                            <td class="text-center">
                                <a href="{{ route('gestionar-asignacion-proyecta_tutela', ['id' => $revision->tutela->id]) }}"
                                    class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                        class="fa fa-edit text-info btn-editar" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- Tabla Aprueba--}}
    <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">En aprobación</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="card-body" style="display: none;">
            <table class="table table-striped table-hover table-sm display">
                <thead class="thead-inverse">
                    <tr>
                        <th class="text-center" style="white-space:nowrap;">Fecha radica usuario</th>
                        <th class="text-center" style="white-space:nowrap;">Estado PQR</th>
                        <th class="text-center" style="white-space:nowrap;">Num Radicado</th>
                        <th class="text-center" style="white-space:nowrap;">Tipo de Solicitud</th>
                        <th class="text-center" style="white-space:nowrap;">Cliente</th>
                        <th class="text-center" style="white-space:nowrap;">Prioridad</th>
                        <th class="text-center" style="white-space:nowrap;">Ver</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($tareas as $tarea)
                        @if ($tarea->tareas_id == 4 && $tarea->estado_id != 11 && sizeOf(($tarea->pqr->asignaciontareas->where('tareas_id', $tarea->tareas_id -1 ))->where('estado_id', 11)))
                                <tr>
                                    <td class="text-center" style="white-space:nowrap;">{{ $pqr->fecha_radicado }}</td>
                                    <td class="text-center" style="white-space:nowrap;">{{ $pqr->estado->estado_funcionario }}</td>
                                    <td class="text-center" style="white-space:nowrap;">{{ $tarea->pqr->radicado }}</td>
                                    <td class="text-center" style="white-space:nowrap;">{{ $tarea->pqr->tipoPqr->tipo }}
                                    </td>
                                    <td class="text-center" style="white-space:nowrap;">
                                        {{ $tarea->pqr->persona_id != null ? $tarea->pqr->persona->nombre1 . ' ' . $tarea->pqr->persona->nombre2 . ' ' . $tarea->pqr->persona->apellido1 . ' ' . $tarea->pqr->persona->apellido2 : $tarea->pqr->empresa->nombre1 . ' ' . $tarea->pqr->empresa->nombre2 . ' ' . $tarea->pqr->empresa->apellido1 . ' ' . $tarea->pqr->empresa->apellido2 }}
                                    </td>
                                    <td class="text-center" style="white-space:nowrap;">
                                        {{ $tarea->pqr->prioridad->prioridad }}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('funcionario-gestionar-asignacion-aprueba', ['id' => $tarea->pqr->id]) }}"
                                            class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                                class="fa fa-edit text-info btn-editar" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                        @endif
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
    {{-- Tabla Radica--}}
    <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">En radicación</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="card-body" style="display: none;">
            <table class="table table-striped table-hover table-sm display">
                <thead class="thead-inverse">
                    <tr>
                        <th class="text-center" style="white-space:nowrap;">Fecha radica usuario</th>
                        <th class="text-center" style="white-space:nowrap;">Estado PQR</th>
                        <th class="text-center" style="white-space:nowrap;">Num Radicado</th>
                        <th class="text-center" style="white-space:nowrap;">Tipo de Solicitud</th>
                        <th class="text-center" style="white-space:nowrap;">Cliente</th>
                        <th class="text-center" style="white-space:nowrap;">Prioridad</th>
                        <th class="text-center" style="white-space:nowrap;">Ver</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($tareas as $tarea)
                        @if ($tarea->tareas_id == 5 && $tarea->estado_id != 11 && sizeOf(($tarea->pqr->asignaciontareas->where('tareas_id', $tarea->tareas_id -1 ))->where('estado_id', 11)))
                                <tr>
                                    <td class="text-center" style="white-space:nowrap;">{{ $pqr->fecha_radicado }}</td>
                                    <td class="text-center" style="white-space:nowrap;">{{ $pqr->estado->estado_funcionario }}</td>
                                    <td class="text-center" style="white-space:nowrap;">{{ $tarea->pqr->radicado }}</td>
                                    <td class="text-center" style="white-space:nowrap;">{{ $tarea->pqr->tipoPqr->tipo }}
                                    </td>
                                    <td class="text-center" style="white-space:nowrap;">
                                        {{ $tarea->pqr->persona_id != null ? $tarea->pqr->persona->nombre1 . ' ' . $tarea->pqr->persona->nombre2 . ' ' . $tarea->pqr->persona->apellido1 . ' ' . $tarea->pqr->persona->apellido2 : $tarea->pqr->empresa->nombre1 . ' ' . $tarea->pqr->empresa->nombre2 . ' ' . $tarea->pqr->empresa->apellido1 . ' ' . $tarea->pqr->empresa->apellido2 }}
                                    </td>
                                    <td class="text-center" style="white-space:nowrap;">
                                        {{ $tarea->pqr->prioridad->prioridad }}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('funcionario-gestionar-asignacion-radica', ['id' => $tarea->pqr->id]) }}"
                                            class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                                class="fa fa-edit text-info btn-editar" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                        @endif
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
    {{-- Fin tablas de tareas --}}
    <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">Cerradas</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="card-body" style="display: none;">
            <table class="table table-striped table-hover table-sm display">
                <thead class="thead-inverse">
                    <tr>
                        <th class="text-center" style="white-space:nowrap;">Fecha radica usuario</th>
                        <th class="text-center" style="white-space:nowrap;">Estado PQR</th>
                        <th class="text-center" style="white-space:nowrap;">Num Radicado</th>
                        <th class="text-center" style="white-space:nowrap;">Tipo de Solicitud</th>
                        <th class="text-center" style="white-space:nowrap;">Cliente</th>
                        <th class="text-center" style="white-space:nowrap;">Prioridad</th>
                        <th class="text-center" style="white-space:nowrap;">Ver</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($pqrs as $pqr)
                        @if (($pqr->estadospqr_id == 6 || $pqr->estadospqr_id == 7 || $pqr->estadospqr_id == 9 || $pqr->estadospqr_id == 10 ) && $pqr->asignaciontareas->sum('estado_id') == 55)
                            <tr>
                                <td class="text-center" style="white-space:nowrap;">{{ $pqr->fecha_radicado }}</td>
                                <td class="text-center" style="white-space:nowrap;">{{ $pqr->estado->estado_funcionario }}</td>
                                <td class="text-center" style="white-space:nowrap;">{{ $pqr->radicado }}</td>
                                <td class="text-center" style="white-space:nowrap;">{{ $pqr->tipoPqr->tipo }}
                                </td>
                                <td class="text-center" style="white-space:nowrap;">
                                    {{ $pqr->persona_id != null ? $pqr->persona->nombre1 . ' ' . $pqr->persona->nombre2 . ' ' . $pqr->persona->apellido1 . ' ' . $pqr->persona->apellido2 : $pqr->empresa->nombre1 . ' ' . $pqr->empresa->nombre2 . ' ' . $pqr->empresa->apellido1 . ' ' . $pqr->empresa->apellido2 }}
                                </td>
                                <td class="text-center" style="white-space:nowrap;">
                                    {{ $pqr->prioridad->prioridad }}
                                </td>
                                <td>
                                    <a href="{{ route('funcionario-gestionar-asignacion', ['id' => $pqr->id]) }}"
                                        class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                            class="fa fa-edit text-info btn-editar" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endif
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
@endsection
<!-- ************************************************************* -->
