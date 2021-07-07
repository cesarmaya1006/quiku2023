<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light" style="border: solid 1px blue;">
                <div class="inner">
                    <h3>{{ $pqr_S->count() }}</h3>
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
                    <h3>{{ $conceptos->count() }}</h3>

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
                    <h3>{{ $solicitudes_datos->count() }}</h3>

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
                    <h3>{{ $denuncias->count() }}</h3>

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
                    <h3>{{ $felicitaciones->count() }}</h3>

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
                    <h3>{{ $solicitudes_doc->count() }}</h3>

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
                    <h3>{{ $sugerencias->count() }}</h3>

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
    @if ($usuario->empleado->cargo->cargo == 'Asignador PQR')
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
                                <th class="text-center" style="white-space:nowrap;">Ref</th>
                                <th class="text-center" style="white-space:nowrap;">Estado</th>
                                <th class="text-center" style="white-space:nowrap;">Área</th>
                                <th class="text-center" style="white-space:nowrap;">Nivel</th>
                                <th class="text-center" style="white-space:nowrap;">Cargo</th>
                                <th class="text-center" style="white-space:nowrap;">Funcionario</th>
                                <th class="text-center" style="white-space:nowrap;">Num Radicado</th>
                                <th class="text-center" style="white-space:nowrap;">Tipo de Solicitud</th>
                                <th class="text-center" style="white-space:nowrap;">Cliente</th>
                                <th class="text-center" style="white-space:nowrap;">Producto / Servicio</th>
                                <th class="text-center" style="white-space:nowrap;">Adquisición</th>
                                <th class="text-center" style="white-space:nowrap;">Departamento</th>
                                <th class="text-center" style="white-space:nowrap;">Municipio</th>
                                <th class="text-center" style="white-space:nowrap;">Sede</th>
                                <th class="text-center" style="white-space:nowrap;">Servicio</th>
                                <th class="text-center" style="white-space:nowrap;">Categoría</th>
                                <th class="text-center" style="white-space:nowrap;">Producto</th>
                                <th class="text-center" style="white-space:nowrap;">Marca</th>
                                <th class="text-center" style="white-space:nowrap;">Refefencia</th>
                                <th class="text-center" style="white-space:nowrap;">Prioridad</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pqr_S as $pqr)
                                @if ($pqr->empleado_id != null)
                                    <tr>
                                        <td class="text-center" style="white-space:nowrap;">{{ $pqr->id }}</td>
                                        <td class="text-center" style="white-space:nowrap;">
                                            {{ $pqr->empleado_id != null ? 'Asignada' : '---' }}</td>
                                        <td class="text-center" style="white-space:nowrap;">
                                            {{ $pqr->empleado_id != null ? $pqr->empleado->cargo->nivel->area->area : '---' }}
                                        </td>
                                        <td class="text-center" style="white-space:nowrap;">
                                            {{ $pqr->empleado_id != null ? $pqr->empleado->cargo->nivel->nivel : '---' }}
                                        </td>
                                        <td class="text-center" style="white-space:nowrap;">
                                            {{ $pqr->empleado_id != null ? $pqr->empleado->cargo->cargo : '---' }}
                                        </td>
                                        <td class="text-center" style="white-space:nowrap;">
                                            {{ $pqr->empleado_id != null ? $pqr->empleado->nombre1 . ' ' . $pqr->empleado->nombre2 . ' ' . $pqr->empleado->apellido1 . ' ' . $pqr->empleado->apellido2 : '---' }}
                                        </td>
                                        <td class="text-center" style="white-space:nowrap;">{{ $pqr->radicado }}</td>
                                        <td class="text-center" style="white-space:nowrap;">{{ $pqr->tipoPqr->tipo }}
                                        </td>
                                        <td class="text-center" style="white-space:nowrap;">
                                            {{ $pqr->persona_id != null ? $pqr->persona->nombre1 . ' ' . $pqr->persona->nombre2 . ' ' . $pqr->persona->apellido1 . ' ' . $pqr->persona->apellido2 : $pqr->empresa->nombre1 . ' ' . $pqr->empresa->nombre2 . ' ' . $pqr->empresa->apellido1 . ' ' . $pqr->empresa->apellido2 }}
                                        </td>
                                        <td class="text-center" style="white-space:nowrap;">{{ $pqr->tipo }}</td>
                                        <td class="text-center" style="white-space:nowrap;">{{ $pqr->adquisicion }}
                                        </td>
                                        <td class="text-center" style="white-space:nowrap;">
                                            {{ $pqr->adquisicion == 'Sede física' ? $pqr->sede->municipio->departamento->departamento : '---' }}
                                        </td>
                                        <td class="text-center" style="white-space:nowrap;">
                                            {{ $pqr->adquisicion == 'Sede física' ? $pqr->sede->municipio->municipio : '---' }}
                                        </td>
                                        <td class="text-center" style="white-space:nowrap;">
                                            {{ $pqr->adquisicion == 'Sede física' ? $pqr->sede->nombre : '---' }}
                                        </td>
                                        <td class="text-center" style="white-space:nowrap;">
                                            {{ $pqr->servicio_id != null ? $pqr->servicio->servicio : '---' }}</td>
                                        <td class="{{ $pqr->referencia_id != null ? '' : 'text-center' }}"
                                            style="white-space:nowrap;">
                                            {{ $pqr->referencia_id != null ? $pqr->referencia->marca->producto->categoria->categoria : '---' }}
                                        </td>
                                        <td class="{{ $pqr->referencia_id != null ? '' : 'text-center' }}"
                                            style="white-space:nowrap;">
                                            {{ $pqr->referencia_id != null ? $pqr->referencia->marca->producto->producto : '---' }}
                                        </td>
                                        <td class="{{ $pqr->referencia_id != null ? '' : 'text-center' }}"
                                            style="white-space:nowrap;">
                                            {{ $pqr->referencia_id != null ? $pqr->referencia->marca->marca : '---' }}
                                        </td>
                                        <td class="{{ $pqr->referencia_id != null ? '' : 'text-center' }}"
                                            style="white-space:nowrap;">
                                            {{ $pqr->referencia_id != null ? $pqr->referencia->referencia : '---' }}
                                        </td>
                                        <td class="text-center" style="white-space:nowrap;">
                                            {{ $pqr->prioridad->prioridad }}
                                        </td>
                                        <td></td>
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
                    <h6>Listado de Pqrs sin asignar</h6>
                </div>
                <div class="col-12">
                    <table class="table table-striped table-hover table-sm display">
                        <thead class="thead-inverse">
                            <tr>
                                <th class="text-center" style="white-space:nowrap;">Ref</th>
                                <th class="text-center" style="white-space:nowrap;">Estado</th>
                                <th class="text-center" style="white-space:nowrap;">Área</th>
                                <th class="text-center" style="white-space:nowrap;">Nivel</th>
                                <th class="text-center" style="white-space:nowrap;">Cargo</th>
                                <th class="text-center" style="white-space:nowrap;">Funcionario</th>
                                <th class="text-center" style="white-space:nowrap;">Num Radicado</th>
                                <th class="text-center" style="white-space:nowrap;">Tipo de Solicitud</th>
                                <th class="text-center" style="white-space:nowrap;">Cliente</th>
                                <th class="text-center" style="white-space:nowrap;">Producto / Servicio</th>
                                <th class="text-center" style="white-space:nowrap;">Adquisición</th>
                                <th class="text-center" style="white-space:nowrap;">Departamento</th>
                                <th class="text-center" style="white-space:nowrap;">Municipio</th>
                                <th class="text-center" style="white-space:nowrap;">Sede</th>
                                <th class="text-center" style="white-space:nowrap;">Servicio</th>
                                <th class="text-center" style="white-space:nowrap;">Categoría</th>
                                <th class="text-center" style="white-space:nowrap;">Producto</th>
                                <th class="text-center" style="white-space:nowrap;">Marca</th>
                                <th class="text-center" style="white-space:nowrap;">Refefencia</th>
                                <th class="text-center" style="white-space:nowrap;">Prioridad</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pqr_S as $pqr)
                                @if ($pqr->empleado_id == null)
                                    <tr>
                                        <td class="text-center" style="white-space:nowrap;">{{ $pqr->id }}</td>
                                        <td class="text-center" style="white-space:nowrap;">
                                            {{ $pqr->empleado_id != null ? 'Asignada' : '---' }}</td>
                                        <td class="text-center" style="white-space:nowrap;">
                                            {{ $pqr->empleado_id != null ? $pqr->empleado->cargo->nivel->area->area : '---' }}
                                        </td>
                                        <td class="text-center" style="white-space:nowrap;">
                                            {{ $pqr->empleado_id != null ? $pqr->empleado->cargo->nivel->nivel : '---' }}
                                        </td>
                                        <td class="text-center" style="white-space:nowrap;">
                                            {{ $pqr->empleado_id != null ? $pqr->empleado->cargo->cargo : '---' }}
                                        </td>
                                        <td class="text-center" style="white-space:nowrap;">
                                            {{ $pqr->empleado_id != null ? $pqr->empleado->nombre1 . ' ' . $pqr->empleado->nombre2 . ' ' . $pqr->empleado->apellido1 . ' ' . $pqr->empleado->apellido2 : '---' }}
                                        </td>
                                        <td class="text-center" style="white-space:nowrap;">{{ $pqr->radicado }}</td>
                                        <td class="text-center" style="white-space:nowrap;">{{ $pqr->tipoPqr->tipo }}
                                        </td>
                                        <td class="text-center" style="white-space:nowrap;">
                                            {{ $pqr->persona_id != null ? $pqr->persona->nombre1 . ' ' . $pqr->persona->nombre2 . ' ' . $pqr->persona->apellido1 . ' ' . $pqr->persona->apellido2 : $pqr->empresa->nombre1 . ' ' . $pqr->empresa->nombre2 . ' ' . $pqr->empresa->apellido1 . ' ' . $pqr->empresa->apellido2 }}
                                        </td>
                                        <td class="text-center" style="white-space:nowrap;">{{ $pqr->tipo }}</td>
                                        <td class="text-center" style="white-space:nowrap;">{{ $pqr->adquisicion }}
                                        </td>
                                        <td class="text-center" style="white-space:nowrap;">
                                            {{ $pqr->adquisicion == 'Sede física' ? $pqr->sede->municipio->departamento->departamento : '---' }}
                                        </td>
                                        <td class="text-center" style="white-space:nowrap;">
                                            {{ $pqr->adquisicion == 'Sede física' ? $pqr->sede->municipio->municipio : '---' }}
                                        </td>
                                        <td class="text-center" style="white-space:nowrap;">
                                            {{ $pqr->adquisicion == 'Sede física' ? $pqr->sede->nombre : '---' }}
                                        </td>
                                        <td class="text-center" style="white-space:nowrap;">
                                            {{ $pqr->servicio_id != null ? $pqr->servicio->servicio : '---' }}</td>
                                        <td class="{{ $pqr->referencia_id != null ? '' : 'text-center' }}"
                                            style="white-space:nowrap;">
                                            {{ $pqr->referencia_id != null ? $pqr->referencia->marca->producto->categoria->categoria : '---' }}
                                        </td>
                                        <td class="{{ $pqr->referencia_id != null ? '' : 'text-center' }}"
                                            style="white-space:nowrap;">
                                            {{ $pqr->referencia_id != null ? $pqr->referencia->marca->producto->producto : '---' }}
                                        </td>
                                        <td class="{{ $pqr->referencia_id != null ? '' : 'text-center' }}"
                                            style="white-space:nowrap;">
                                            {{ $pqr->referencia_id != null ? $pqr->referencia->marca->marca : '---' }}
                                        </td>
                                        <td class="{{ $pqr->referencia_id != null ? '' : 'text-center' }}"
                                            style="white-space:nowrap;">
                                            {{ $pqr->referencia_id != null ? $pqr->referencia->referencia : '---' }}
                                        </td>
                                        <td class="text-center" style="white-space:nowrap;">
                                            {{ $pqr->prioridad->prioridad }}
                                        </td>
                                        <td></td>
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
