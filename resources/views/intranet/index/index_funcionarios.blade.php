<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light" style="border: solid 1px blue;">
                <div class="inner">
                    <h3>{{ $pqrs->where('tipo_pqr_id', 1)->count() + $pqrs->where('tipo_pqr_id', 2)->count() +$pqrs->where('tipo_pqr_id', 3)->count() }}</h3>
                    <p style="font-size: 0.8em">Peticiones,Quejas,Reclamos</p>
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

</div>
@if ($usuario->empleado)
    @if ($usuario->empleado->cargo->id == 1)
        <hr>
        <div class="container-fluid" style="font-size: 0.8em;">
            <div class="row">
                <div class="col-12">
                    <h6>Listado de Pqrs sin asignadas</h6>
                </div>
                <div class="col-12">
                    <table class="table table-striped table-hover table-sm display">
                        <thead class="thead-inverse">
                            <tr>
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
        </div>
        <hr>
        <div class="container-fluid" style="font-size: 0.8em;">
            <div class="row">
                <div class="col-12">
                    <h6>Listado de Pqrs asignadas</h6>
                </div>
                <div class="col-12">
                    <table class="table table-striped table-hover table-sm display">
                        <thead class="thead-inverse">
                            <tr>
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
        </div>
    @endif
@endif
@if ($usuario->empleado)
    @if ($usuario->empleado->cargo->id != 1)
        <div class="container-fluid" style="font-size: 0.8em;">
            <div class="row">
                <div class="col-12">
                    <h6>Listado de Pqrs sin aceptar</h6>
                </div>
                <div class="col-12">
                    <table class="table table-striped table-hover table-sm display">
                        <thead class="thead-inverse">
                            <tr>
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
                                @if ($pqr->estado_asignacion == 0)
                                    <tr>
                                        <td class="text-center" style="white-space:nowrap;">
                                            {{ $pqr->empleado_id != null ? 'Asignada' : '---' }}</td>
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
        </div>
        <hr>
        <div class="container-fluid" style="font-size: 0.8em;">
            <div class="row">
                <div class="col-12">
                    <h6>Listado de Pqrs activas</h6>
                </div>
                <div class="col-12">
                    <table class="table table-striped table-hover table-sm display">
                        <thead class="thead-inverse">
                            <tr>
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
        </div>
        {{-- Incio tablas de tareas --}}
        {{-- Tabla Supervisa --}}
        <hr>
        <div class="container-fluid" style="font-size: 0.8em;">
            <div class="row">
                <div class="col-12">
                    <h6>Listado de Pqrs supervisadas</h6>
                </div>
                <div class="col-12">
                    <table class="table table-striped table-hover table-sm display">
                        <thead class="thead-inverse">
                            <tr>
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
        </div>
        {{-- Tabla Proyecta --}}
        <hr>
        <div class="container-fluid" style="font-size: 0.8em;">
            <div class="row">
                <div class="col-12">
                    <h6>Listado de Pqrs proyectar</h6>
                </div>
                <div class="col-12">
                    <table class="table table-striped table-hover table-sm display">
                        <thead class="thead-inverse">
                            <tr>
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
        </div>
        {{-- Tabla Revisa --}}
        <hr>
        <div class="container-fluid" style="font-size: 0.8em;">
            <div class="row">
                <div class="col-12">
                    <h6>Listado de Pqrs revisar</h6>
                </div>
                <div class="col-12">
                    <table class="table table-striped table-hover table-sm display">
                        <thead class="thead-inverse">
                            <tr>
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
        </div>
        {{-- Tabla Aprueba--}}
        <hr>
        <div class="container-fluid" style="font-size: 0.8em;">
            <div class="row">
                <div class="col-12">
                    <h6>Listado de Pqrs aprobar</h6>
                </div>
                <div class="col-12">
                    <table class="table table-striped table-hover table-sm display">
                        <thead class="thead-inverse">
                            <tr>
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
        </div>
        {{-- Tabla Radica--}}
        <hr>
        <div class="container-fluid" style="font-size: 0.8em;">
            <div class="row">
                <div class="col-12">
                    <h6>Listado de Pqrs radicar</h6>
                </div>
                <div class="col-12">
                    <table class="table table-striped table-hover table-sm display">
                        <thead class="thead-inverse">
                            <tr>
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
        </div>
        {{-- Fin tablas de tareas --}}
        <hr>
        <div class="container-fluid" style="font-size: 0.8em;">
            <div class="row">
                <div class="col-12">
                    <h6>Listado de Pqrs cerradas</h6>
                </div>
                <div class="col-12">
                    <table class="table table-striped table-hover table-sm display">
                        <thead class="thead-inverse">
                            <tr>
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
        </div>
    @endif
@endif
