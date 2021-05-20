    <?php
    $tareasVige = 0;
    $tareasProx = 0;
    $tareasVenc = 0;
    ?>
    @extends("theme.back.plantilla")
    <!-- ************************************************************* -->
    <!-- Funciones php -->
    @section('funciones_php')
        @include('includes.funciones_php')
    @endsection
    <?php $permiso_menu = 0; ?>
    @foreach ($empleado->menus as $menu)
        @if ($menu->id == 32)
            <?php $permiso_menu = 1; ?>
        @break
    @endif
    @endforeach
    <!-- titulo hoja -->
    @section('estilosHojas')
        <!-- Pagina CSS -->
        <link rel="stylesheet" href="{{ asset('css/intranet/proyectos/index.css') }}">
        <link href="{{ asset('fullcalendar/lib/main.css') }}" rel='stylesheet' />
        <script src="{{ asset('fullcalendar/lib/main.js') }}"></script>
        <script src="{{ asset('fullcalendar/lib/locales-all.js') }}"></script>
        <script>
            $('#calendar').fullCalendar({
                lang: 'es'
            });

        </script>
    @endsection
    <!-- ************************************************************* -->
    <!-- titulo hoja -->
    @section('tituloHoja')
        Módulo Proyectos
        @if ($empleado->lider && $permiso_menu == 1)
            <a href="{{ route('proyecto-crear') }}"
                class="btn btn-info btn-xs btn-sombra pl-3 pr-3 float-md-right mr-md-5 mt-3 mt-md-1"><i
                    class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Nuevo Proyecto</a>
        @endif
    @endsection
    <!-- ************************************************************* -->
    <!-- ************************************************************* -->
    <!-- Cuerpo hoja -->

    @section('cuerpo_pagina')

        @if ($permiso_menu == 1)
            @foreach ($proyectos as $proyecto)
                @foreach ($proyecto->componentes as $componente)
                    @foreach ($componente->tareas as $tarea)
                        <?php
                        //-------------------------------------------------
                        $date1 = new DateTime($tarea->fec_creacion);
                        $date2 = new DateTime($tarea->fec_limite);
                        $diff = date_diff($date1, $date2);
                        $differenceFormat = '%a';
                        $diasTotalTarea = $diff->format($differenceFormat);
                        if ($diasTotalTarea == 0) {
                        $diasTotalTarea = 1;
                        }
                        //-------------------------------------------------
                        $date1 = new DateTime($tarea->fec_creacion);
                        $date2 = new DateTime(date('Y-m-d'));
                        $diff = date_diff($date1, $date2);
                        $differenceFormat = '%a';
                        $diasGestionTarea = $diff->format($differenceFormat);

                        //---------------------------------------------------
                        ?>
                        @if ($empleado->lider)
                            @if ($tarea->fec_limite < date('Y-m-d'))
                                <?php $tareasVenc++; ?>
                            @else
                                <?php $porcVenc = ($diasGestionTarea * 100) / $diasTotalTarea; ?>
                                @if ($porcVenc > 80 || $diasTotalTarea - $diasGestionTarea < 3) <?php $tareasProx++; ?>
                        @else
                                                                                                                                                                                                                                <?php $tareasVige++; ?> @endif @endif
                                @else
                                    @if ($tarea->responsable_id == session('id_usuario'))
                                        @if ($tarea->fec_limite < date('Y-m-d'))
                                            <?php $tareasVenc++; ?>
                                        @else
                                            <?php $porcVenc = ($diasGestionTarea * 100) / $diasTotalTarea;
                                            ?>
                                            @if ($porcVenc > 80) <?php
                                            $tareasProx++; ?>
                                        @else
                                            <?php $tareasVige++; ?> @endif
                                        @endif
                                    @endif
                            @endif
                        @endforeach
                    @endforeach
                @endforeach
                <hr>
                <div class="row">
                    <div class="col-12">
                        @include('includes.error-form')
                        @include('includes.mensaje')
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $proyectos->whereNotBetween('estado', ['Cerrado'])->count() }}</h3>
                                <p>Proyectos Activos</p>
                            </div>
                            <div class="icon"><i class="fas fa-cogs"></i></div>
                            <a href="{{ route('proyecto-listado_proy', ['id' => $empleado->id]) }}"
                                class="small-box-footer">Más
                                info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>{{ $tareasVige }}</h3>
                                <p>Tareas Vigentes</p>
                            </div>
                            <div class="icon"><i class="fas fa-thumbs-up"></i></div>
                            <a href="{{ route('proyecto-listado_tareas', ['id' => $empleado->id]) }}"
                                class="small-box-footer">Más info<i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>{{ $tareasProx }}</h3>
                                <p>Tareas prox. a vencer</p>
                            </div>
                            <div class="icon"><i class="fas fa-bell"></i></div>
                            <a href="{{ route('proyecto-listado_tareas', ['id' => $empleado->id]) }}"
                                class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>{{ $tareasVenc }}</h3>
                                <p>Tareas Vencidas</p>
                            </div>
                            <div class="icon"><i class="fas fa-exclamation-triangle"></i></div>
                            <a href="{{ route('proyecto-listado_tareas', ['id' => $empleado->id]) }}"
                                class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <hr>
                <section class="content">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Proyectos</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0 table-responsive" style="display: block;">
                            <table class="table table-striped projects display">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Proyecto</th>
                                        <th>Líder</th>
                                        <th>Miembros de Equipo</th>
                                        <th>Gestión/Días</th>
                                        <th>Progreso proyecto</th>
                                        <th class="text-center">Estado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proyectos->whereNotBetween('estado', ['Cerrado']) as $proyecto)
                                        <tr>
                                            <td>{{ $proyecto->id }}</td>
                                            <td>
                                                <a
                                                    href="{{ route('proyecto-gestion-inter', ['id' => $proyecto->id]) }}">{{ $proyecto->titulo }}</a>
                                                <br>
                                                <small>Creado {{ $proyecto->fec_creacion }}</small>
                                            </td>
                                            <td>
                                                @if ($proyecto->lider->foto != null)
                                                    <img alt="Avatar" class="table-avatar"
                                                        title="{{ $proyecto->lider->usuario->nombres . ' ' . $proyecto->lider->usuario->apellidos }}"
                                                        src="{{ asset('imagenes/hojas_de_vida/' . $proyecto->lider->foto) }}">
                                                @else
                                                    <img alt="Avatar" class="table-avatar"
                                                        title="{{ $proyecto->lider->usuario->nombres . ' ' . $proyecto->lider->usuario->apellidos }}"
                                                        src="{{ asset('imagenes/usuarios/usuario-inicial.jpg') }}">
                                                @endif
                                            </td>
                                            <td>
                                                <ul class="list-inline">
                                                    @foreach ($proyecto->empleados as $empleado)
                                                        <li class="list-inline-item">
                                                            @if ($empleado->id != $proyecto->lider_id)
                                                                @if ($empleado->foto != null)
                                                                    <img alt="Avatar" class="table-avatar"
                                                                        title="{{ $empleado->usuario->nombres . ' ' . $empleado->usuario->apellidos }}"
                                                                        src="{{ asset('imagenes/hojas_de_vida/' . $empleado->foto) }}">
                                                                @else
                                                                    <img alt="Avatar" class="table-avatar"
                                                                        title="{{ $empleado->usuario->nombres . ' ' . $empleado->usuario->apellidos }}"
                                                                        src="{{ asset('imagenes/usuarios/usuario-inicial.jpg') }}">
                                                                @endif
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                $date1 = new DateTime($proyecto->fec_creacion);
                                                $date2 = new DateTime(Date('Y-m-d'));
                                                $diff = date_diff($date1, $date2);
                                                $differenceFormat = '%a';
                                                ?>
                                                {{ $diff->format($differenceFormat) }} días

                                            </td>
                                            <td class="project_progress">
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-green" role="progressbar"
                                                        aria-volumenow="{{ $proyecto->progreso }}" aria-volumemin="0"
                                                        aria-volumemax="100" style="width: {{ $proyecto->progreso }}%">
                                                    </div>
                                                </div>
                                                <small>
                                                    {{ number_format($proyecto->progreso, 2, ',', '.') }} %
                                                </small>
                                            </td>
                                            <td class="project-state">
                                                <span
                                                    class="badge {{ $proyecto->estado == 'Nuevo' ? 'badge-success' : 'badge-info' }} ">{{ $proyecto->estado }}</span>
                                            </td>
                                            <td class="project-actions text-right">
                                                <a href="{{ route('proyecto-gestion-inter', ['id' => $proyecto->id]) }}"
                                                    class="btn btn-primary btn-sm pl-3 pr-3" style="font-size: 0.8em;"><i
                                                        class="fas fa-folder mr-1"></i>Ver</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </section>
                <!-- *********************************************************************************************************************************** -->
                <hr>
                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-10">
                        <h5>Calendario de Tareas</h5>
                    </div>
                    @if ($empleado2->tipo > 1)
                        <div class="col-12 col-md-10">
                            <div class="row">
                                <div class="col-12 col-md-3 form-group">
                                    <label for="proyecto">Proyecto</label>
                                    <select id="proyecto" name="proyecto" class="form-control form-control-sm"
                                        data_url="{{ route('proyecto-cargar_usuarios_proy') }}">
                                        <option value="">Elija un proyecto</option>
                                        @foreach ($proyectos_all as $proyecto)
                                            <option value="{{ $proyecto->id }}">{{ $proyecto->titulo }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-3 form-group">
                                    <label for="usuarios">Miembros del Equipo</label>
                                    <select id="usuarios" name="usuarios" class="form-control form-control-sm">
                                        <option value="">Elija primero un proyecto</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-3 form-group d-flex align-items-end">
                                    <button class="btn btn-primary btn-xs btn-sombra pl-4 pr-4 ml-md-4" id="cargar_tareas"
                                        data_url="{{ route('proyecto-interfaz') }}">Cargar
                                        Tareas</button>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col-12 col-md-10">
                        {!! $calendar->calendar() !!}
                    </div>
                </div>
                <!-- *********************************************************************************************************************************** -->

            @else
                <div class="row">
                    <div class="col-12">
                        <div class="info-box bg-danger">
                            <span class="info-box-icon"><i class="fas fa-user-alt-slash"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Permiso denegado</span>
                                <p>Lo sentimos!. No tiene autorizacion para ingresar a esta modulo.
                                    si requiere acceso comuniquese con el administrador de recursos de su empresa y
                                    solicite
                                    el acceso respectivo.</p>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </div>
                </div>
            @endif
        @endsection

        <!-- ************************************************************* -->
        <!-- script hoja -->
        @section('scripts_pagina')
            <script src="{{ asset('js/intranet/proyectos/index.js') }}"></script>
            {!! $calendar->script() !!}
        @endsection
        <!-- ************************************************************* -->
