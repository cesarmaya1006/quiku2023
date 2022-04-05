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
                            <h3>{{ $hechos->count() + $pretensiones->count() + $resuelves->count() }}</h3>
                            <p style="font-size: 0.8em">Colaboraciones</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph text-grey"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light" style="border: solid 1px teal">
                        <div class="inner">
                            <h3>{{ sizeOf($activasAprobar) }}</h3>
                            <p style="font-size: 0.8em">En revisión y aprobación</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph text-teal"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light" style="border: solid 1px indigo">
                        <div class="inner">
                            <h3>{{ sizeOf($activasRadicar) }}</h3>
                            <p style="font-size: 0.8em">En radicación</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph text-indigo"></i>
                        </div>
                    </div>
                </div>
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
                            <th class="text-center" style="white-space:nowrap;">Fecha límite</th>
                            <th class="text-center" style="white-space:nowrap;">Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tutelas as $tutela)
                            @if (!$tutela->estado_asignacion && $tutela->estado_creacion && $tutela->empleado_asignado_id)
                                <tr>
                                    <td class="text-center" style="white-space:nowrap;">{{ $tutela->created_at }}</td>
                                    <td class="text-center" style="white-space:nowrap;">
                                        {{ $tutela->estado->estado_funcionario }}</td>
                                    <td class="text-center" style="white-space:nowrap;">{{ $tutela->radicado }}</td>
                                    @if ($tutela->prioridad_id == 1)
                                        <td class="text-center bg-warning" style="white-space:nowrap;">
                                            {{ $tutela->prioridad->prioridad }}
                                        </td>
                                    @elseif($tutela->prioridad_id == 2)
                                        <td class="text-center bg-success" style="white-space:nowrap;">
                                            {{ $tutela->prioridad->prioridad }}
                                        </td>
                                    @else
                                        <td class="text-center bg-danger" style="white-space:nowrap;">
                                            {{ $tutela->prioridad->prioridad }}
                                        </td>
                                    @endif
                                    @if (strtotime(date('Y-m-d')) >= strtotime(date('Y-m-d', strtotime($tutela->fecha_limite))))
                                        <td class="text-center bg-danger" style="white-space:nowrap;">
                                            {{ $tutela->fecha_limite }}</td>
                                    @elseif(strtotime(date('Y-m-d')) - strtotime(date('Y-m-d', strtotime($tutela->fecha_limite))) > -172800)
                                        <td class="text-center bg-warning" style="white-space:nowrap;">
                                            {{ $tutela->fecha_limite }}</td>
                                    @else
                                        <td class="text-center bg-success" style="white-space:nowrap;">
                                            {{ $tutela->fecha_limite }}</td>
                                    @endif
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
                            <th class="text-center" style="white-space:nowrap;">Fecha límite</th>
                            <th class="text-center" style="white-space:nowrap;">Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tutelas as $tutela)
                            @if ($tutela->estado_asignacion == 1 && $tutela->asignaciontareas->sum('estado_id') != 55)
                                <tr>
                                    <td class="text-center" style="white-space:nowrap;">{{ $tutela->created_at }}</td>
                                    <td class="text-center" style="white-space:nowrap;">
                                        {{ $tutela->estado->estado_funcionario }}</td>
                                    <td class="text-center" style="white-space:nowrap;">{{ $tutela->radicado }}</td>
                                    @if ($tutela->prioridad_id == 1)
                                        <td class="text-center bg-warning" style="white-space:nowrap;">
                                            {{ $tutela->prioridad->prioridad }}
                                        </td>
                                    @elseif($tutela->prioridad_id == 2)
                                        <td class="text-center bg-success" style="white-space:nowrap;">
                                            {{ $tutela->prioridad->prioridad }}
                                        </td>
                                    @else
                                        <td class="text-center bg-danger" style="white-space:nowrap;">
                                            {{ $tutela->prioridad->prioridad }}
                                        </td>
                                    @endif
                                    @if (strtotime(date('Y-m-d')) >= strtotime(date('Y-m-d', strtotime($tutela->fecha_limite))))
                                        <td class="text-center bg-danger" style="white-space:nowrap;">
                                            {{ $tutela->fecha_limite }}</td>
                                    @elseif(strtotime(date('Y-m-d')) - strtotime(date('Y-m-d', strtotime($tutela->fecha_limite))) > -172800)
                                        <td class="text-center bg-warning" style="white-space:nowrap;">
                                            {{ $tutela->fecha_limite }}</td>
                                    @else
                                        <td class="text-center bg-success" style="white-space:nowrap;">
                                            {{ $tutela->fecha_limite }}</td>
                                    @endif
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
                            <th class="text-center" style="white-space:nowrap;">Fecha límite</th>
                            <th class="text-center" style="white-space:nowrap;">Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($supervisadas as $supervisada)
                            <tr>
                                <td class="text-center" style="white-space:nowrap;">
                                    {{ $supervisada->tutela->fecha_radicado }}</td>
                                <td class="text-center" style="white-space:nowrap;">
                                    {{ $supervisada->tutela->estado->estado_funcionario }}</td>
                                <td class="text-center" style="white-space:nowrap;">
                                    {{ $supervisada->tutela->radicado }}</td>
                                @if ($supervisada->tutela->prioridad_id == 1)
                                    <td class="text-center bg-warning" style="white-space:nowrap;">
                                        {{ $supervisada->tutela->prioridad->prioridad }}
                                    </td>
                                @elseif($supervisada->tutela->prioridad_id == 2)
                                    <td class="text-center bg-success" style="white-space:nowrap;">
                                        {{ $supervisada->tutela->prioridad->prioridad }}
                                    </td>
                                @else
                                    <td class="text-center bg-danger" style="white-space:nowrap;">
                                        {{ $supervisada->tutela->prioridad->prioridad }}
                                    </td>
                                @endif
                                @if (strtotime(date('Y-m-d')) >= strtotime(date('Y-m-d', strtotime($supervisada->tutela->fecha_limite))))
                                    <td class="text-center bg-danger" style="white-space:nowrap;">
                                        {{ $supervisada->tutela->fecha_limite }}</td>
                                @elseif(strtotime(date('Y-m-d')) - strtotime(date('Y-m-d', strtotime($supervisada->tutela->fecha_limite))) > -172800)
                                    <td class="text-center bg-warning" style="white-space:nowrap;">
                                        {{ $supervisada->tutela->fecha_limite }}</td>
                                @else
                                    <td class="text-center bg-success" style="white-space:nowrap;">
                                        {{ $supervisada->tutela->fecha_limite }}</td>
                                @endif
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
                            <th class="text-center" style="white-space:nowrap;">Fecha límite</th>
                            <th class="text-center" style="white-space:nowrap;">Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($proyectadas as $proyecta)
                            <tr>
                                <td class="text-center" style="white-space:nowrap;">
                                    {{ $proyecta->tutela->fecha_radicado }}</td>
                                <td class="text-center" style="white-space:nowrap;">
                                    {{ $proyecta->tutela->estado->estado_funcionario }}</td>
                                <td class="text-center" style="white-space:nowrap;">{{ $proyecta->tutela->radicado }}
                                </td>
                                @if ($proyecta->tutela->prioridad_id == 1)
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
                                    if ($proyecta->tutela->estadostutela_id < 5) {
                                        foreach ($proyecta->tutela->hechos as $key => $hecho) {
                                            $porcentaje += $hecho->estadohecho->estado;
                                            $totalColaboraciones++;
                                        }
                                        foreach ($proyecta->tutela->pretensiones as $key => $pretension) {
                                            $porcentaje += $pretension->estadopretension->estado;
                                            $totalColaboraciones++;
                                        }
                                    } else {
                                        foreach ($proyecta->tutela->primeraInstancia->impugnacionesinternas as $key => $resuelve) {
                                            $porcentaje += $resuelve->estado->estado;
                                            $totalColaboraciones++;
                                        }
                                    }
                                    if ($totalColaboraciones == 0) {
                                        $totalColaboraciones = 1;
                                    }
                                @endphp

                                @if ($porcentaje / $totalColaboraciones == 100)
                                    <td class="text-center bg-success" style="white-space:nowrap;">
                                        {{ round($porcentaje / $totalColaboraciones) }}%
                                    </td>
                                @elseif($porcentaje / $totalColaboraciones == 0)
                                    <td class="text-center bg-danger" style="white-space:nowrap;">
                                        {{ round($porcentaje / $totalColaboraciones) }}%
                                    </td>
                                @else
                                    <td class="text-center bg-warning" style="white-space:nowrap;">
                                        {{ round($porcentaje / $totalColaboraciones) }}%
                                    </td>
                                @endif
                                @if ($proyecta->tutela->estadostutela_id < 5)
                                    @if (strtotime(date('Y-m-d')) >= strtotime(date('Y-m-d', strtotime($proyecta->tutela->fecha_limite))))
                                        <td class="text-center bg-danger" style="white-space:nowrap;">
                                            {{ $proyecta->tutela->fecha_limite }}</td>
                                    @elseif(strtotime(date('Y-m-d')) - strtotime(date('Y-m-d', strtotime($proyecta->tutela->fecha_limite))) > -172800)
                                        <td class="text-center bg-warning" style="white-space:nowrap;">
                                            {{ $proyecta->tutela->fecha_limite }}</td>
                                    @else
                                        <td class="text-center bg-success" style="white-space:nowrap;">
                                            {{ $proyecta->tutela->fecha_limite }}</td>
                                    @endif
                                @else
                                    @php
                                        $date1 = new DateTime($proyecta->tutela->primeraInstancia->fecha_notificacion);
                                        $date2 = new DateTime(Date('Y-m-d'));
                                        $diff = date_diff($date1, $date2);
                                        $differenceFormat = '%a';
                                        $diferencia = $diff->format($differenceFormat);
                                    @endphp
                                    @if ($diferencia <= 1)
                                        <td class="text-center bg-success" style="white-space:nowrap;">
                                            {{ date('Y-m-d', strtotime($proyecta->tutela->primeraInstancia->fecha_notificacion . '+ ' . $diferencia . ' days')) }}
                                        </td>
                                    @elseif($diferencia == 2)
                                        <td class="text-center bg-warning" style="white-space:nowrap;">
                                            {{ date('Y-m-d', strtotime($proyecta->tutela->primeraInstancia->fecha_notificacion . '+ ' . $diferencia . ' days')) }}
                                        </td>
                                    @elseif($diferencia == 3)
                                        <td class="text-center bg-danger" style="white-space:nowrap;">
                                            {{ date('Y-m-d', strtotime($proyecta->tutela->primeraInstancia->fecha_notificacion . '+ ' . $diferencia . ' days')) }}
                                        </td>
                                    @else
                                        <td class="text-center bg-danger" style="white-space:nowrap;">Proceso Gestion en
                                            primera instancia Cerrado</td>
                                    @endif
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
                @if ($hechos->count()>0)
                <h6 class="mb-3">Hechos</h6>
                <table class="table table-striped table-hover table-sm display">
                    <thead class="thead-inverse">
                        <tr>
                            <th class="text-center" style="white-space:nowrap;">Fecha radica usuario</th>
                            <th class="text-center" style="white-space:nowrap;">Estado Tutela</th>
                            <th class="text-center" style="white-space:nowrap;">Num Radicado</th>
                            <th class="text-center" style="white-space:nowrap;">Prioridad</th>
                            <th class="text-center" style="white-space:nowrap;">Estado Hecho</th>
                            <th class="text-center" style="white-space:nowrap;">Fecha límite</th>
                            <th class="text-center" style="white-space:nowrap;">Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hechos as $hecho)
                            <tr>
                                <td class="text-center" style="white-space:nowrap;">
                                    {{ $hecho->tutela->fecha_radicado }}</td>
                                <td class="text-center" style="white-space:nowrap;">
                                    {{ $hecho->tutela->estado->estado_funcionario }}</td>
                                <td class="text-center" style="white-space:nowrap;">{{ $hecho->tutela->radicado }}
                                </td>
                                @if ($hecho->tutela->prioridad_id == 1)
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
                                @if ($hecho->estadohecho->estado >= 66)
                                    <td class="text-center bg-success" style="white-space:nowrap;">
                                        {{ $hecho->estadohecho->estado }} %</td>
                                @elseif($hecho->estadohecho->estado <= 33)
                                    <td class="text-center bg-danger" style="white-space:nowrap;">
                                        {{ $hecho->estadohecho->estado }} %</td>
                                @else
                                    <td class="text-center bg-warning" style="white-space:nowrap;">
                                        {{ $hecho->estadohecho->estado }} %</td>
                                @endif
                                @if (strtotime(date('Y-m-d')) >= strtotime(date('Y-m-d', strtotime($hecho->tutela->fecha_limite))))
                                    <td class="text-center bg-danger" style="white-space:nowrap;">
                                        {{ $hecho->tutela->fecha_limite }}</td>
                                @elseif(strtotime(date('Y-m-d')) - strtotime(date('Y-m-d', strtotime($hecho->tutela->fecha_limite))) > -172800)
                                    <td class="text-center bg-warning" style="white-space:nowrap;">
                                        {{ $hecho->tutela->fecha_limite }}</td>
                                @else
                                    <td class="text-center bg-success" style="white-space:nowrap;">
                                        {{ $hecho->tutela->fecha_limite }}</td>
                                @endif
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
                @endif
                @if ($pretensiones->count()>0)
                <h6 class="mb-3">Pretensiones</h6>
                <table class="table table-striped table-hover table-sm display">
                    <thead class="thead-inverse">
                        <tr>
                            <th class="text-center" style="white-space:nowrap;">Fecha radica usuario</th>
                            <th class="text-center" style="white-space:nowrap;">Estado Tutela</th>
                            <th class="text-center" style="white-space:nowrap;">Num Radicado</th>
                            <th class="text-center" style="white-space:nowrap;">Prioridad</th>
                            <th class="text-center" style="white-space:nowrap;">Estado Pretensión</th>
                            <th class="text-center" style="white-space:nowrap;">Fecha límite</th>
                            <th class="text-center" style="white-space:nowrap;">Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pretensiones as $pretension)
                            <tr>
                                <td class="text-center" style="white-space:nowrap;">
                                    {{ $pretension->tutela->fecha_radicado }}</td>
                                <td class="text-center" style="white-space:nowrap;">
                                    {{ $pretension->tutela->estado->estado_funcionario }}</td>
                                <td class="text-center" style="white-space:nowrap;">
                                    {{ $pretension->tutela->radicado }}</td>
                                @if ($pretension->tutela->prioridad_id == 1)
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
                                @if ($pretension->estadopretension->estado >= 66)
                                    <td class="text-center bg-success" style="white-space:nowrap;">
                                        {{ $pretension->estadopretension->estado }} %</td>
                                @elseif($pretension->estadopretension->estado <= 33)
                                    <td class="text-center bg-danger" style="white-space:nowrap;">
                                        {{ $pretension->estadopretension->estado }} %</td>
                                @else
                                    <td class="text-center bg-warning" style="white-space:nowrap;">
                                        {{ $pretension->estadopretension->estado }} %</td>
                                @endif
                                @if (strtotime(date('Y-m-d')) >= strtotime(date('Y-m-d', strtotime($pretension->tutela->fecha_limite))))
                                    <td class="text-center bg-danger" style="white-space:nowrap;">
                                        {{ $pretension->tutela->fecha_limite }}</td>
                                @elseif(strtotime(date('Y-m-d')) - strtotime(date('Y-m-d', strtotime($pretension->tutela->fecha_limite))) > -172800)
                                    <td class="text-center bg-warning" style="white-space:nowrap;">
                                        {{ $pretension->tutela->fecha_limite }}</td>
                                @else
                                    <td class="text-center bg-success" style="white-space:nowrap;">
                                        {{ $pretension->tutela->fecha_limite }}</td>
                                @endif
                                <td class="text-center">
                                    <a href="{{ route('gestionar_tutela', ['id' => $pretension->tutela->id]) }}"
                                        class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                            class="fa fa-edit text-info btn-editar" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                @endif
                @if ($resuelves->count()>0)
                <h6 class="mb-3">Resuelves en primera instancia</h6>
                <table class="table table-striped table-hover table-sm display">
                    <thead class="thead-inverse">
                        <tr>
                            <th class="text-center" style="white-space:nowrap;">Fecha radica usuario</th>
                            <th class="text-center" style="white-space:nowrap;">Estado Tutela</th>
                            <th class="text-center" style="white-space:nowrap;">Num Radicado</th>
                            <th class="text-center" style="white-space:nowrap;">Prioridad</th>
                            <th class="text-center" style="white-space:nowrap;">Estado Resuelve</th>
                            <th class="text-center" style="white-space:nowrap;">Fecha límite</th>
                            <th class="text-center" style="white-space:nowrap;">Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($resuelves as $resuelve)
                            <tr>
                                <td class="text-center" style="white-space:nowrap;">
                                    {{ $resuelve->sentenciap->tutela->fecha_radicado }}</td>
                                <td class="text-center" style="white-space:nowrap;">
                                    {{ $resuelve->sentenciap->tutela->estado->estado_funcionario }}</td>
                                <td class="text-center" style="white-space:nowrap;">
                                    {{ $resuelve->sentenciap->tutela->radicado }}</td>
                                @if ($resuelve->sentenciap->tutela->prioridad_id == 1)
                                    <td class="text-center bg-warning" style="white-space:nowrap;">
                                        {{ $resuelve->sentenciap->tutela->prioridad->prioridad }}
                                    </td>
                                @elseif($resuelve->sentenciap->tutela->prioridad_id == 2)
                                    <td class="text-center bg-success" style="white-space:nowrap;">
                                        {{ $resuelve->sentenciap->tutela->prioridad->prioridad }}
                                    </td>
                                @else
                                    <td class="text-center bg-danger" style="white-space:nowrap;">
                                        {{ $resuelve->sentenciap->tutela->prioridad->prioridad }}
                                    </td>
                                @endif
                                @if ($resuelve->estado->estado >= 66)
                                    <td class="text-center bg-success" style="white-space:nowrap;">
                                        {{ $resuelve->estado->estado }} %</td>
                                @elseif($resuelve->estado->estado <= 33)
                                    <td class="text-center bg-danger" style="white-space:nowrap;">
                                        {{ $resuelve->estado->estado }} %</td>
                                @else
                                    <td class="text-center bg-warning" style="white-space:nowrap;">
                                        {{ $resuelve->estado->estado }} %</td>
                                @endif
                                @if (strtotime(date('Y-m-d')) >= strtotime(date('Y-m-d', strtotime($resuelve->sentenciap->tutela->fecha_limite))))
                                    <td class="text-center bg-danger" style="white-space:nowrap;">
                                        {{ $resuelve->sentenciap->tutela->fecha_limite }}</td>
                                @elseif(strtotime(date('Y-m-d')) - strtotime(date('Y-m-d', strtotime($resuelve->sentenciap->tutela->fecha_limite))) > -172800)
                                    <td class="text-center bg-warning" style="white-space:nowrap;">
                                        {{ $resuelve->sentenciap->tutela->fecha_limite }}</td>
                                @else
                                    <td class="text-center bg-success" style="white-space:nowrap;">
                                        {{ $resuelve->sentenciap->tutela->fecha_limite }}</td>
                                @endif
                                <td class="text-center">
                                    <a href="{{ route('gestionar_tutela', ['id' => $resuelve->sentenciap->tutela->id]) }}"
                                        class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                            class="fa fa-edit text-info btn-editar" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
        {{-- Tabla Revisa Aprueba --}}
        <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">En revisión y aprobación</h3>
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
                            <th class="text-center" style="white-space:nowrap;">Fecha límite</th>
                            <th class="text-center" style="white-space:nowrap;">Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activasAprobar as $aprobar)
                            <tr>
                                <td class="text-center" style="white-space:nowrap;">
                                    {{ $aprobar->tutela->fecha_radicado }}</td>
                                <td class="text-center" style="white-space:nowrap;">
                                    {{ $aprobar->tutela->estado->estado_funcionario }}</td>
                                <td class="text-center" style="white-space:nowrap;">{{ $aprobar->tutela->radicado }}
                                </td>
                                @if ($aprobar->tutela->prioridad_id == 1)
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
                                @if (strtotime(date('Y-m-d')) >= strtotime(date('Y-m-d', strtotime($aprobar->tutela->fecha_limite))))
                                    <td class="text-center bg-danger" style="white-space:nowrap;">
                                        {{ $aprobar->tutela->fecha_limite }}</td>
                                @elseif(strtotime(date('Y-m-d')) - strtotime(date('Y-m-d', strtotime($aprobar->tutela->fecha_limite))) > -172800)
                                    <td class="text-center bg-warning" style="white-space:nowrap;">
                                        {{ $aprobar->tutela->fecha_limite }}</td>
                                @else
                                    <td class="text-center bg-success" style="white-space:nowrap;">
                                        {{ $aprobar->tutela->fecha_limite }}</td>
                                @endif
                                <td class="text-center">
                                    <a href="{{ route('gestionar_asignacion_revisa_aprueba_tutela', ['id' => $aprobar->tutela->id]) }}"
                                        class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                            class="fa fa-edit text-info btn-editar" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Tabla Radica --}}
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
                            <th class="text-center" style="white-space:nowrap;">Fecha límite</th>
                            <th class="text-center" style="white-space:nowrap;">Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activasRadicar as $radicar)
                            <tr>
                                <td class="text-center" style="white-space:nowrap;">
                                    {{ $radicar->tutela->fecha_radicado }}</td>
                                <td class="text-center" style="white-space:nowrap;">
                                    {{ $radicar->tutela->estado->estado_funcionario }}</td>
                                <td class="text-center" style="white-space:nowrap;">{{ $radicar->tutela->radicado }}
                                </td>
                                @if ($radicar->tutela->prioridad_id == 1)
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
                                @if (strtotime(date('Y-m-d')) >= strtotime(date('Y-m-d', strtotime($radicar->tutela->fecha_limite))))
                                    <td class="text-center bg-danger" style="white-space:nowrap;">
                                        {{ $radicar->tutela->fecha_limite }}</td>
                                @elseif(strtotime(date('Y-m-d')) - strtotime(date('Y-m-d', strtotime($radicar->tutela->fecha_limite))) > -172800)
                                    <td class="text-center bg-warning" style="white-space:nowrap;">
                                        {{ $radicar->tutela->fecha_limite }}</td>
                                @else
                                    <td class="text-center bg-success" style="white-space:nowrap;">
                                        {{ $radicar->tutela->fecha_limite }}</td>
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
                                <td class="text-center" style="white-space:nowrap;">
                                    {{ $tutela->estado->estado_funcionario }}</td>
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
