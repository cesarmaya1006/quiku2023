{{-- <div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light" style="border: solid 1px blue;">
                <div class="inner">
                    <h3>{{ $pqrs->where('tipo_pqr_id', 1)->count() + $pqrs->where('tipo_pqr_id', 2)->count() +$pqrs->where('tipo_pqr_id', 3)->count() }}</h3>
                    <p style="font-size: 0.8em">Peticiones, Quejas, Reclamos</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag text-primary"></i>
                </div>
                <a href="{{ route('funcionario-index') }}" class="small-box-footer text-primary"
                    style="color: green;">Más info <i class="fas fa-arrow-circle-right text-white;"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light" style="border: solid 1px green;">
                <div class="inner">
                    <h3>{{ $pqrs->where('tipo_pqr_id', 4)->count() }}</h3>

                    <p style="font-size: 0.8em">Consultas</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars text-green"></i>
                </div>
                <a href="{{ route('funcionario-index') }}" class="small-box-footer text-success">Más info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light" style="border: solid 1px yellow;">
                <div class="inner">
                    <h3>{{ $pqrs->where('tipo_pqr_id', 5)->count() }}</h3>

                    <p style="font-size: 0.8em">Solicitud de datos personales</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add text-warning"></i>
                </div>
                <a href="{{ route('funcionario-index') }}" class="small-box-footer text-warning">Más info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light" style="border: solid 1px red;">
                <div class="inner">
                    <h3>{{ $pqrs->where('tipo_pqr_id', 6)->count() }}</h3>

                    <p style="font-size: 0.8em">Reporte de irregularidades</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph text-danger"></i>
                </div>
                <a href="{{ route('funcionario-index') }}" class="small-box-footer text-danger">Más info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light" style="border:  solid 1px pink">
                <div class="inner">
                    <h3>{{ $pqrs->where('tipo_pqr_id', 7)->count() }}</h3>

                    <p style="font-size: 0.8em">Felicitaciones</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph text-pink"></i>
                </div>
                <a href="{{ route('funcionario-index') }}" class="small-box-footer text-pink">Más info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light" style="border: solid 1px teal">
                <div class="inner">
                    <h3>{{ $pqrs->where('tipo_pqr_id', 8)->count() }}</h3>

                    <p style="font-size: 0.8em">Solicitud de documentos o información</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph text-teal"></i>
                </div>
                <a href="{{ route('funcionario-index') }}" class="small-box-footer text-teal">Más info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light" style="border: solid 1px indigo">
                <div class="inner">
                    <h3>{{ $pqrs->where('tipo_pqr_id', 9)->count() }}</h3>

                    <p style="font-size: 0.8em">Sugerencias</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph text-indigo"></i>
                </div>
                <a href="{{ route('funcionario-index') }}" class="small-box-footer text-indigo">Más info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>

</div> --}}
<div class="container-fluid">
    <div class="row">
        @if ($usuario->empleado->cargo->id != 1)
            <div class="col-lg-2 col-md-3 col-sm-6 col-12 ">
                <div class="info-box border">
                    <span class="info-box-icon bg-gradient-primary"><i class="far fa-envelope"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text text-truncate d-inline-block" style="max-width: 150px;">Pqrs sin aceptar</span>
                    <span class="info-box-number">{{ $pqrs->where('estado_asignacion', 0)->count() }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                <div class="info-box border">
                    <span class="info-box-icon bg-gradient-secondary"><i class="far fa-flag"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text text-truncate d-inline-block" style="max-width: 150px;">Pqrs activas</span>
                    <span class="info-box-number">{{ $pqrs->where('estado_asignacion', 1)->where('estadospqr_id', '!=', 6)->where('estadospqr_id', '!=', 7)->where('estadospqr_id', '!=', 9)->where('estadospqr_id', '!=', 10)->count() }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                <div class="info-box border">
                    <span class="info-box-icon bg-gradient-success"><i class="far fa-copy"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text text-truncate d-inline-block" style="max-width: 150px;">Pqrs supervisadas</span>
                    <span class="info-box-number">{{$tareas->where('tareas_id', 1)->where('estado_id', '<', 11)->count()}}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                <div class="info-box border">
                    <span class="info-box-icon bg-gradient-danger"><i class="far fa-star"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text text-truncate d-inline-block" style="max-width: 150px;">Pqrs proyectar</span>
                    <span class="info-box-number">{{$tareas->where('tareas_id', 2)->where('estado_id', '<', 11)->count()}}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                <div class="info-box border">
                    <span class="info-box-icon bg-gradient-warning"><i class="far fa-copy"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text text-truncate d-inline-block" style="max-width: 150px;">Pqrs revisar</span>
                    <span class="info-box-number">{{$tareas->where('tareas_id', 3)->where('estado_id', '<', 11)->count()}}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                <div class="info-box border">
                    <span class="info-box-icon bg-gradient-info"><i class="far fa-star"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text text-truncate d-inline-block" style="max-width: 150px;">Pqrs aprobar</span>
                    <span class="info-box-number">{{$tareas->where('tareas_id', 4)->where('estado_id', '<', 11)->count()}}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                <div class="info-box border">
                    <span class="info-box-icon bg-gradient-dark"><i class="far fa-copy"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text text-truncate d-inline-block" style="max-width: 150px;">Pqrs radicar</span>
                    <span class="info-box-number">{{$tareas->where('tareas_id', 5)->where('estado_id', '<', 11)->count()}}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                <div class="info-box border">
                    <span class="info-box-icon bg-gradient-primary"><i class="far fa-star"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text text-truncate d-inline-block" style="max-width: 150px;">Pqrs cerradas</span>
                    <span class="info-box-number">{{$tareas->where('tareas_id', 5)->where('estado_id', 11)->count()}}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                <div class="info-box border">
                    <span class="info-box-icon bg-gradient-secondary"><i class="far fa-envelope"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text text-truncate d-inline-block" style="max-width: 150px;">Peticiones, Quejas, Reclamos</span>
                    <span class="info-box-number">{{ $pqrs->where('tipo_pqr_id', 1)->count() + $pqrs->where('tipo_pqr_id', 2)->count() +$pqrs->where('tipo_pqr_id', 3)->count() }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                <div class="info-box border">
                    <span class="info-box-icon bg-gradient-success"><i class="far fa-flag"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text text-truncate d-inline-block" style="max-width: 150px;">Consultas</span>
                    <span class="info-box-number">{{ $pqrs->where('tipo_pqr_id', 4)->count() }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                <div class="info-box border">
                    <span class="info-box-icon bg-gradient-danger"><i class="far fa-copy"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text text-truncate d-inline-block" style="max-width: 150px;">Solicitud de datos personales</span>
                    <span class="info-box-number">{{ $pqrs->where('tipo_pqr_id', 5)->count() }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                <div class="info-box border">
                    <span class="info-box-icon bg-gradient-warning"><i class="far fa-star"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text text-truncate d-inline-block" style="max-width: 150px;">Reporte de irregularidades</span>
                    <span class="info-box-number">{{ $pqrs->where('tipo_pqr_id', 6)->count() }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                <div class="info-box border">
                    <span class="info-box-icon bg-gradient-info" ><i class="far fa-copy"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text text-truncate d-inline-block" style="max-width: 150px;">Solicitud de documentos o información</span>
                    <span class="info-box-number">{{ $pqrs->where('tipo_pqr_id', 8)->count() }}</span>
                    </div>
                </div>
            </div>
        @endif
        @if ($usuario->empleado->cargo->id == 1)
            <div class="col-lg-2 col-md-3 col-sm-6 col-12 ">
                <div class="info-box border">
                    <span class="info-box-icon bg-gradient-primary"><i class="far fa-envelope"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text text-truncate d-inline-block" style="max-width: 150px;">Pqrs sin asignar</span>
                    <span class="info-box-number">{{ $pqrs->where('empleado_id', null)->count() }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                <div class="info-box border">
                    <span class="info-box-icon bg-gradient-secondary"><i class="far fa-flag"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text text-truncate d-inline-block" style="max-width: 150px;">Pqrs asignadas</span>
                    <span class="info-box-number">{{ $pqrs->where('empleado_id', '!=', null)->count() }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                <div class="info-box border">
                    <span class="info-box-icon bg-gradient-dark"><i class="far fa-star"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text text-truncate d-inline-block" style="max-width: 150px;">Felicitaciones</span>
                    <span class="info-box-number">{{ $pqrs->where('tipo_pqr_id', 7)->count() }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-12">
                <div class="info-box border">
                    <span class="info-box-icon bg-gradient-primary"><i class="far fa-star"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text text-truncate d-inline-block" style="max-width: 150px;">Sugerencias</span>
                    <span class="info-box-number">{{ $pqrs->where('tipo_pqr_id', 9)->count() }}</span>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@if ($usuario->empleado)
    @if ($usuario->empleado->cargo->id == 1)
        <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">Listado de Pqrs sin asignar</h3>
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
                            <th class="text-center" style="white-space:nowrap;">Estado</th>
                            <th class="text-center" style="white-space:nowrap;">Estado PQR</th>
                            <th class="text-center" style="white-space:nowrap;">Num Radicado</th>
                            <th class="text-center" style="white-space:nowrap;">Tipo de Solicitud</th>
                            <th class="text-center" style="white-space:nowrap;">Cliente</th>
                            <th class="text-center" style="white-space:nowrap;">Prioridad</th>
                            <th class="text-center" style="white-space:nowrap;">Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pqrs as $pqr)
                            @if ($pqr->empleado_id == null)
                                @if (!($pqr->tipo_pqr_id == 7 || $pqr->tipo_pqr_id == 9))
                                    <tr>
                                        <td class="text-center" style="white-space:nowrap;">{{ $pqr->fecha_radicado }}</td>
                                        <td class="text-center" style="white-space:nowrap;">
                                            {{ $pqr->empleado_id != null ? 'Asignada' : 'Sin Asignar' }}</td>
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
                                        <td class="text-center">
                                            <a href="{{ route('funcionario-gestionar-asignacion-asignador', ['id' => $pqr->id]) }}"
                                                class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                                    class="fa fa-edit text-info btn-editar" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">Listado de Pqrs asignadas</h3>
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
                            <th class="text-center" style="white-space:nowrap;">Estado</th>
                            <th class="text-center" style="white-space:nowrap;">Estado PQR</th>
                            <th class="text-center" style="white-space:nowrap;">Num Radicado</th>
                            <th class="text-center" style="white-space:nowrap;">Tipo de Solicitud</th>
                            <th class="text-center" style="white-space:nowrap;">Cliente</th>
                            <th class="text-center" style="white-space:nowrap;">Prioridad</th>
                            <th class="text-center" style="white-space:nowrap;">Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pqrs as $pqr)
                            @if ($pqr->empleado_id)
                                <tr>
                                    <td class="text-center" style="white-space:nowrap;">{{ $pqr->fecha_radicado }}</td>
                                    <td class="text-center" style="white-space:nowrap;">
                                        {{ $pqr->empleado_id != null ? 'Asignada' : 'Sin asignar' }}</td>
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
                                    <td class="text-center">
                                        <a href="{{ route('funcionario-gestionar-asignacion-asignador', ['id' => $pqr->id]) }}"
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
        <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">Listado de sugerencias y felicitaciones</h3>
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
                            <th class="text-center" style="white-space:nowrap;">Estado</th>
                            <th class="text-center" style="white-space:nowrap;">Estado PQR</th>
                            <th class="text-center" style="white-space:nowrap;">Num Radicado</th>
                            <th class="text-center" style="white-space:nowrap;">Tipo de Solicitud</th>
                            <th class="text-center" style="white-space:nowrap;">Cliente</th>
                            <th class="text-center" style="white-space:nowrap;">Prioridad</th>
                            <th class="text-center" style="white-space:nowrap;">Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pqrs as $pqr)
                            @if ($pqr->empleado_id == null)
                                @if ($pqr->tipo_pqr_id == 7 || $pqr->tipo_pqr_id == 9)
                                    <tr>
                                        <td class="text-center" style="white-space:nowrap;">{{ $pqr->fecha_radicado }}</td>
                                        <td class="text-center" style="white-space:nowrap;">
                                            {{ $pqr->empleado_id != null ? 'Asignada' : 'Sin Asignar' }}</td>
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
                                        <td class="text-center">
                                            <a href="{{ route('funcionario-gestionar-asignacion-asignador', ['id' => $pqr->id]) }}"
                                                class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                                    class="fa fa-edit text-info btn-editar" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endif
@if ($usuario->empleado)
    @if ($usuario->empleado->cargo->id != 1)
        {{-- Incio tabla sin aceptar --}}
        <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">Listado de Pqrs sin aceptar</h3>
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
                        @foreach ($pqrs as $pqr)
                        @if ($pqr->estado_asignacion == 0)
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
                                    <td class="text-center">
                                        <a href="{{ route('funcionario-gestionar-asignacion', ['id' => $pqr->id]) }}"
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
                <h3 class="card-title font-weight-bold">Listado de Pqrs activas</h3>
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
                        @foreach ($pqrs as $pqr)
                            @if ($pqr->estado_asignacion == 1 && $pqr->asignaciontareas->sum('estado_id') != 55)
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
                                    <td class="text-center">
                                        <a href="{{ route('funcionario-gestionar-asignacion', ['id' => $pqr->id]) }}"
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
                <h3 class="card-title font-weight-bold">Listado de Pqrs supervisadas</h3>
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
                        @foreach ($tareas as $tarea)
                            @if ($tarea->tareas_id == 1 && ($tarea->estado_id == 1 || $tarea->estado_id == 6 ))
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
                                        <a href="{{ route('funcionario-gestionar-asignacion-supervisa', ['id' => $tarea->pqr->id]) }}"
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
        {{-- Tabla Proyecta --}}
        <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">Listado de Pqrs proyectar</h3>
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
                            <th class="text-center" style="white-space:nowrap;">Estado Peticiones</th>
                            <th class="text-center" style="white-space:nowrap;">Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tareas as $tarea)
                            @if ($tarea->tareas_id == 2 && $tarea->estado_id != 11 )
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
                                        @php
                                            $porcentaje = 0;
                                            foreach ($tarea->pqr->peticiones as $key => $peticion) {
                                                $porcentaje += $peticion->estadopeticion->estado;
                                            }
                                        @endphp
                                        @if ( $porcentaje / $tarea->pqr->peticiones->count() == 100)
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
                                        @endif
                                        <td class="text-center">
                                            <a href="{{ route('funcionario-gestionar-asignacion-proyecta', ['id' => $tarea->pqr->id]) }}"
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
        {{-- Tabla Revisa --}}
        <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">Listado de Pqrs revisar</h3>
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
                        @foreach ($tareas as $tarea)
                            @if ($tarea->tareas_id == 3 && $tarea->estado_id != 11 && sizeOf(($tarea->pqr->asignaciontareas->where('tareas_id', $tarea->tareas_id -1 ))->where('estado_id', 11)))
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
                                            <a href="{{ route('funcionario-gestionar-asignacion-revisa', ['id' => $tarea->pqr->id]) }}"
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
        {{-- Tabla Aprueba--}}
        <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">Listado de Pqrs aprobar</h3>
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
                        @foreach ($tareas as $tarea)
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Tabla Radica--}}
        <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">Listado de Pqrs radicar</h3>
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
                        @foreach ($tareas as $tarea)
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Fin tablas de tareas --}}
        <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">Listado de Pqrs cerradas</h3>
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
                        @foreach ($pqrs as $pqr)
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endif
