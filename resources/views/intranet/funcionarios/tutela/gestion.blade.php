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
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light" style="border: solid 1px teal">
                        <div class="inner">
                            <h3>{{ $aprobadas->count() }}</h3>
                            <p style="font-size: 0.8em">En aprobación</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph text-teal"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light" style="border: solid 1px indigo">
                        <div class="inner">
                            <h3>{{ $radicadas->count() }}</h3>
                            <p style="font-size: 0.8em">En radicación</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph text-indigo"></i>
                        </div>
                    </div>
                </div>
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
                                <a href="{{ route('gestionar_asignacion_supervisa_tutela', ['id' => $supervisada->tutela->id]) }}"
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
                        <th class="text-center" style="white-space:nowrap;">Estado Proceso</th>
                        <th class="text-center" style="white-space:nowrap;">Ver</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proyectadas as $proyecta)
                        <tr>
                            <td class="text-center" style="white-space:nowrap;">{{ $proyecta->tutela->fecha_radicado }}</td>
                            <td class="text-center" style="white-space:nowrap;">{{ $proyecta->tutela->estado->estado_funcionario }}</td>
                            <td class="text-center" style="white-space:nowrap;">{{ $proyecta->tutela->radicado }}</td>
                            @if($proyecta->tutela->prioridad_id == 1)
                                <td class="text-center bg-warning" style="white-space:nowrap;">
                                    {{ $proyecta->tutela->prioridad->prioridad }}
                                </td>
                            @elseif($proyecta->tutela->prioridad_id == 2)
                                <td class="text-center bg-success" style="white-space:nowrap;">
                                    {{ $proyecta->tutela->prioridad->prioridad }}
                                </td>
                            @else
                                <td class="text-center bg-danger" style="white-space:nowrap;">
                                    {{ $proyecta->tutela->prioridad->prioridad }}
                                </td>
                            @endif
                            @php
                                $porcentaje = 0;
                                $totalColaboraciones = 0;
                                foreach ($proyecta->tutela->hechos as $key => $hecho) {
                                    $porcentaje += $hecho->estadohecho->estado;
                                    $totalColaboraciones ++;
                                }
                                foreach ($proyecta->tutela->pretensiones as $key => $pretension) {
                                    $porcentaje += $pretension->estadopretension->estado;
                                    $totalColaboraciones ++;
                                }
                            @endphp 
                            @if ( $porcentaje / $totalColaboraciones == 100)
                                <td class="text-center bg-success" style="white-space:nowrap;">
                                    {{ round($porcentaje / $totalColaboraciones) }}%
                                </td>
                            @elseif($porcentaje / $totalColaboraciones == 0 )
                                <td class="text-center bg-danger" style="white-space:nowrap;">
                                    {{ round($porcentaje / $totalColaboraciones) }}%
                                </td>
                            @else
                                <td class="text-center bg-warning" style="white-space:nowrap;">
                                    {{ round($porcentaje / $totalColaboraciones) }}%
                                </td>
                            @endif
                            <td class="text-center">
                                <a href="{{ route('gestionar_asignacion_proyecta_tutela', ['id' => $proyecta->tutela->id]) }}"
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
                        <th class="text-center" style="white-space:nowrap;">Fecha radica usuario</th>
                        <th class="text-center" style="white-space:nowrap;">Estado Tutela</th>
                        <th class="text-center" style="white-space:nowrap;">Num Radicado</th>
                        <th class="text-center" style="white-space:nowrap;">Prioridad</th>
                        <th class="text-center" style="white-space:nowrap;">Estado Hecho</th>
                        <th class="text-center" style="white-space:nowrap;">Ver</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hechos as $hecho)
                        <tr>
                            <td class="text-center" style="white-space:nowrap;">{{ $hecho->tutela->fecha_radicado }}</td>
                            <td class="text-center" style="white-space:nowrap;">{{ $hecho->tutela->estado->estado_funcionario }}</td>
                            <td class="text-center" style="white-space:nowrap;">{{ $hecho->tutela->radicado }}</td>
                            @if($hecho->tutela->prioridad_id == 1)
                                <td class="text-center bg-warning" style="white-space:nowrap;">
                                    {{ $hecho->tutela->prioridad->prioridad }}
                                </td>
                            @elseif($hecho->tutela->prioridad_id == 2)
                                <td class="text-center bg-success" style="white-space:nowrap;">
                                    {{ $hecho->tutela->prioridad->prioridad }}
                                </td>
                            @else
                                <td class="text-center bg-danger" style="white-space:nowrap;">
                                    {{ $hecho->tutela->prioridad->prioridad }}
                                </td>
                            @endif
                            <td class="text-center" style="white-space:nowrap;">{{ $hecho->estadohecho->estado }} %</td>
                            <td class="text-center">
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
                        <th class="text-center" style="white-space:nowrap;">Fecha radica usuario</th>
                        <th class="text-center" style="white-space:nowrap;">Estado Tutela</th>
                        <th class="text-center" style="white-space:nowrap;">Num Radicado</th>
                        <th class="text-center" style="white-space:nowrap;">Prioridad</th>
                        <th class="text-center" style="white-space:nowrap;">Estado Pretensión</th>
                        <th class="text-center" style="white-space:nowrap;">Ver</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pretensiones as $pretension)
                        <tr>
                            <td class="text-center" style="white-space:nowrap;">{{ $pretension->tutela->fecha_radicado }}</td>
                            <td class="text-center" style="white-space:nowrap;">{{ $pretension->tutela->estado->estado_funcionario }}</td>
                            <td class="text-center" style="white-space:nowrap;">{{ $pretension->tutela->radicado }}</td>
                            @if($pretension->tutela->prioridad_id == 1)
                                <td class="text-center bg-warning" style="white-space:nowrap;">
                                    {{ $pretension->tutela->prioridad->prioridad }}
                                </td>
                            @elseif($pretension->tutela->prioridad_id == 2)
                                <td class="text-center bg-success" style="white-space:nowrap;">
                                    {{ $pretension->tutela->prioridad->prioridad }}
                                </td>
                            @else
                                <td class="text-center bg-danger" style="white-space:nowrap;">
                                    {{ $pretension->tutela->prioridad->prioridad }}
                                </td>
                            @endif
                            <td class="text-center" style="white-space:nowrap;">{{ $pretension->estadopretension->estado }} %</td>
                            <td class="text-center">
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
                            @if($revision->tutela->prioridad_id == 1)
                                <td class="text-center bg-warning" style="white-space:nowrap;">
                                    {{ $revision->tutela->prioridad->prioridad }}
                                </td>
                            @elseif($revision->tutela->prioridad_id == 2)
                                <td class="text-center bg-success" style="white-space:nowrap;">
                                    {{ $revision->tutela->prioridad->prioridad }}
                                </td>
                            @else
                                <td class="text-center bg-danger" style="white-space:nowrap;">
                                    {{ $revision->tutela->prioridad->prioridad }}
                                </td>
                            @endif
                            <td class="text-center">
                                <a href="{{ route('gestionar_asignacion_revisa_tutela', ['id' => $revision->tutela->id]) }}"
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
                        <th class="text-center" style="white-space:nowrap;">Estado Tutela</th>
                        <th class="text-center" style="white-space:nowrap;">Num Radicado</th>
                        <th class="text-center" style="white-space:nowrap;">Prioridad</th>
                        <th class="text-center" style="white-space:nowrap;">Ver</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($aprobadas as $aprobar)
                        <tr>
                            <td class="text-center" style="white-space:nowrap;">{{ $aprobar->tutela->fecha_radicado }}</td>
                            <td class="text-center" style="white-space:nowrap;">{{ $aprobar->tutela->estado->estado_funcionario }}</td>
                            <td class="text-center" style="white-space:nowrap;">{{ $aprobar->tutela->radicado }}</td>
                            @if($aprobar->tutela->prioridad_id == 1)
                                <td class="text-center bg-warning" style="white-space:nowrap;">
                                    {{ $aprobar->tutela->prioridad->prioridad }}
                                </td>
                            @elseif($aprobar->tutela->prioridad_id == 2)
                                <td class="text-center bg-success" style="white-space:nowrap;">
                                    {{ $aprobar->tutela->prioridad->prioridad }}
                                </td>
                            @else
                                <td class="text-center bg-danger" style="white-space:nowrap;">
                                    {{ $aprobar->tutela->prioridad->prioridad }}
                                </td>
                            @endif
                            <td class="text-center">
                                <a href="{{ route('gestionar_asignacion_aprueba_tutela', ['id' => $aprobar->tutela->id]) }}"
                                    class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                        class="fa fa-edit text-info btn-editar" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
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
                        <th class="text-center" style="white-space:nowrap;">Estado Tutela</th>
                        <th class="text-center" style="white-space:nowrap;">Num Radicado</th>
                        <th class="text-center" style="white-space:nowrap;">Prioridad</th>
                        <th class="text-center" style="white-space:nowrap;">Ver</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($radicadas as $radicar)
                        <tr>
                            <td class="text-center" style="white-space:nowrap;">{{ $radicar->tutela->fecha_radicado }}</td>
                            <td class="text-center" style="white-space:nowrap;">{{ $radicar->tutela->estado->estado_funcionario }}</td>
                            <td class="text-center" style="white-space:nowrap;">{{ $radicar->tutela->radicado }}</td>
                            @if($radicar->tutela->prioridad_id == 1)
                                <td class="text-center bg-warning" style="white-space:nowrap;">
                                    {{ $radicar->tutela->prioridad->prioridad }}
                                </td>
                            @elseif($radicar->tutela->prioridad_id == 2)
                                <td class="text-center bg-success" style="white-space:nowrap;">
                                    {{ $radicar->tutela->prioridad->prioridad }}
                                </td>
                            @else
                                <td class="text-center bg-danger" style="white-space:nowrap;">
                                    {{ $radicar->tutela->prioridad->prioridad }}
                                </td>
                            @endif
                            <td class="text-center">
                                <a href="{{ route('gestionar_asignacion_radica_tutela', ['id' => $radicar->tutela->id]) }}"
                                    class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                        class="fa fa-edit text-info btn-editar" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
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
                        <th class="text-center" style="white-space:nowrap;">Fecha radica Funcionario</th>
                        <th class="text-center" style="white-space:nowrap;">Estado</th>
                        <th class="text-center" style="white-space:nowrap;">Num Radicado</th>
                        <th class="text-center" style="white-space:nowrap;">Ver</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cerradas as $tutela)
                        <tr>
                            <td class="text-center" style="white-space:nowrap;">{{ $tutela->created_at }}</td>
                            <td class="text-center" style="white-space:nowrap;">{{ $tutela->estado->estado_funcionario }}</td>
                            <td class="text-center" style="white-space:nowrap;">{{ $tutela->radicado }}</td>
                            <td class="text-center">
                                <a href="{{ route('gestionar_asignacion_tutela', ['id' => $tutela->id]) }}"
                                    class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                        class="fa fa-edit text-info btn-editar" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
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
