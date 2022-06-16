@extends('theme.back.plantilla')
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
        <div class="row justify-content-center">
            <div class="col-12 col-md-11 d-flex align-items-stretch flex-column">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Gestión a Tutela Número de radicado:
                            <strong>{{ $tutela->radicado }}</strong>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="col-12 solicitud rounded border mb-3 p-2">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    Número de radicado:
                                    <strong>{{ $tutela->radicado }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Fecha de notificación: <strong>{{ $tutela->fecha_notificacion }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Fecha de radicado: <strong>{{ $tutela->fecha_radicado }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Jurisdicción: <strong>{{ $tutela->jurisdiccion }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Juzgado: <strong>{{ $tutela->juzgado }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Departatmento :
                                    <strong>{{ $tutela->departamento }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Municipio : <strong>{{ $tutela->municipio }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Nombre Juez : <strong>{{ $tutela->nombre_juez }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Dirección Juzgado : <strong>{{ $tutela->direccion_juez }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Teléfono Juzgado: <strong>{{ $tutela->telefono_juez }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Correo Juzgado: <strong>{{ $tutela->correo_juez }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Estado : <strong>{{ $tutela->estado->estado_funcionario }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Prioridad : <strong>{{ $tutela->prioridad->prioridad }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Fecha límite: <strong>{{ $tutela->fecha_limite }}</strong>
                                </div>
                            </div>
                        </div>
                        <hr style="border-top: solid 4px black">
                        <div class="col-12 rounded border mb-3 p-2">
                            <div class="menu-card">
                                <div class="col-12 mt-2">
                                    <h5>Detalle Tutela</h5>
                                </div>
                                <hr>
                                <div class="col-12 mt-2">
                                    <h5>Términos</h5>
                                </div>
                                <div class="row px-2">
                                    @if ($tutela->dias_termino)
                                        <div class="col-12">
                                            <p class="text-justify"><strong>Días:</strong> {{ $tutela->dias_termino }}
                                            </p>
                                        </div>
                                    @endif
                                    @if ($tutela->horas_termino)
                                        <div class="col-12">
                                            <p class="text-justify"><strong>Horas:</strong>
                                                {{ $tutela->horas_termino }}</p>
                                        </div>
                                    @endif
                                    @if ($tutela->url_admisorio)
                                        <div class="row">
                                            <div class="col-12">
                                                <h6>Archivo auto admisorio</h6>
                                            </div>
                                            <div class="col-12">
                                                <table class="table table-light" style="font-size: 0.8em;">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Titulo</th>
                                                            <th scope="col">Descripción</th>
                                                            <th scope="col">Descarga</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-justify">{{ $tutela->titulo_admisorio }}
                                                            </td>
                                                            <td class="text-justify">
                                                                {{ $tutela->descripcion_admisorio }}</td>
                                                            <td><a href="{{ asset('documentos/autoadmisorios/' . $tutela->url_admisorio) }}"
                                                                    target="_blank" rel="noopener noreferrer">Descargar</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-12">
                                                <h6>Archivo tutela</h6>
                                            </div>
                                            <div class="col-12">
                                                <table class="table table-light" style="font-size: 0.8em;">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Titulo</th>
                                                            <th scope="col">Descripción</th>
                                                            <th scope="col">Descarga</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-justify">{{ $tutela->titulo_tutela }}
                                                            </td>
                                                            <td class="text-justify">
                                                                {{ $tutela->descripcion_tutela }}</td>
                                                            <td><a href="{{ asset('documentos/tutelas/' . $tutela->url_tutela) }}"
                                                                    target="_blank" rel="noopener noreferrer">Descargar</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            @if ($tutela->medida_cautelar == 'true')
                                                <hr>
                                                <div class="col-12 my-2">
                                                    <h5> Medida Cautelar</h5>
                                                </div>
                                                <div class="col-12">
                                                    <p class="text-justify"><strong>Descripción:</strong>
                                                        {{ $tutela->text_medida_cautelar }}</p>
                                                </div>
                                                @if ($tutela->dias_medida_cautelar)
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Días:</strong>
                                                            {{ $tutela->dias_medida_cautelar }}</p>
                                                    </div>
                                                @endif
                                                @if ($tutela->horas_medida_cautelar)
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Horas:</strong>
                                                            {{ $tutela->horas_medida_cautelar }}</p>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                    @endif
                                </div>
                                <hr>
                            </div>
                            <div class="row menu-card p-2">
                                <div class="col-12">
                                    <h5>Accionantes</h5>
                                </div>
                                <div class="col-12 mt-2">
                                    @foreach ($tutela->accions as $accion)
                                        <div class="col-12 row">
                                            <div class="col-6">
                                                <div class="col-12">
                                                    <p class="text-justify"><strong>Nombre:</strong>
                                                        {{ $accion->nombres_accion }} {{ $accion->apellidos_accion }}
                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="text-justify"><strong>Tipo Persona:</strong>
                                                        {{ $accion->tipo_persona_accion }}</p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="text-justify"><strong>Tipo Documento:</strong>
                                                        {{ $accion->docutipos_id_accion }}</p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="text-justify"><strong>Número Documento:</strong>
                                                        {{ $accion->numero_documento_accion }}</p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="text-justify"><strong>Teléfono:</strong>
                                                        {{ $accion->telefono_accion }}</p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="text-justify"><strong>Dirección:</strong>
                                                        {{ $accion->direccion_accion }}</p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="text-justify"><strong>Correo:</strong>
                                                        {{ $accion->correo_accion }}</p>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                @if ($accion->nombre_apoderado)
                                                    <div class="col-12  mb-3">
                                                        <h6 class="pl-4">Apoderado</h6>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Nombre:</strong>
                                                            {{ $accion->nombre_apoderado }}</p>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Tipo Documento:</strong>
                                                            {{ $accion->docutipos_id_apoderado }}</p>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Número Documento:</strong>
                                                            {{ $accion->numero_documento_apoderado }}</p>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Tarjeta Profesional:</strong>
                                                            {{ $accion->tarjeta_profesional_apoderado }}</p>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Teléfono:</strong>
                                                            {{ $accion->telefono_apoderado }}</p>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Dirección:</strong>
                                                            {{ $accion->direccion_apoderado }}</p>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Correo:</strong>
                                                            {{ $accion->correo_apoderado }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                            <hr>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @if (sizeOf($tutela->anexostutela))
                                <div class="menu-card">
                                    <div class="col-12 row mb-2">
                                        <div class="col-6">
                                            <h5>Anexos</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="col-12 table-responsive">
                                            <table class="table table-light" style="font-size: 0.8em;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Nombre</th>
                                                        <th scope="col">Descripción</th>
                                                        <th scope="col">Archivo</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($tutela->anexostutela as $anexo)
                                                        <tr>
                                                            <td class="text-justify">{{ $anexo->titulo }}
                                                            </td>
                                                            <td class="text-justify">
                                                                {{ $anexo->descripcion }}
                                                            </td>
                                                            <td><a href="{{ asset('documentos/tutelas/' . $anexo->url) }}"
                                                                    target="_blank" rel="noopener noreferrer">Descargar</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endif
                            @if ($tutela->cantidad_hechos && $tutela->cantidad_pretensiones)
                                <div class="row menu-card p-2">
                                    <div class="col-12 mb-2">
                                        <h5>Hechos y pretensiones</h5>
                                    </div>
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item"
                                            src="{{ asset('documentos/tutelas/' . $tutela->url_tutela) }}"
                                            allowfullscreen></iframe>
                                    </div>
                                    <h6 class="pl-4 mt-3">Cantidad de hechos {{ sizeOf($tutela->hechos) }}</h6>
                                    <h6 class="pl-4 mt-3">Cantidad de pretensiones
                                        {{ sizeOf($tutela->pretensiones) }}</h6>
                                </div>
                            @else
                                <div class="row menu-card p-2">
                                    <div class="col-12 mb-2">
                                        <h5>Hechos</h5>
                                    </div>
                                    @if ($tutela->cantidad_hechos)
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item"
                                                src="{{ asset('documentos/tutelas/' . $tutela->url_tutela) }}"
                                                allowfullscreen></iframe>
                                        </div>
                                        <h6 class="pl-4 mt-3">Cantidad de hechos {{ sizeOf($tutela->hechos) }}</h6>
                                    @else
                                        @foreach ($tutela->hechos->sortBy('consecutivo') as $key => $hecho)
                                            <div class="col-12 row t">
                                                <div class="col-12 mb-3">
                                                    <h6 class="pl-4">Hecho # {{ $hecho->consecutivo }}</h6>
                                                </div>
                                                <div class="col-12">
                                                    <p class="text-justify">{{ $hecho->hecho }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <hr>
                                <div class="row menu-card p-2">
                                    <div class="col-12 mb-2">
                                        <h5>Pretensiones</h5>
                                    </div>
                                    @if ($tutela->cantidad_pretensiones)
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item"
                                                src="{{ asset('documentos/tutelas/' . $tutela->url_tutela) }}"
                                                allowfullscreen></iframe>
                                        </div>
                                        <h6 class="pl-4 mt-3">Cantidad de pretensiones
                                            {{ sizeOf($tutela->pretensiones) }}</h6>
                                    @else
                                        @foreach ($tutela->pretensiones->sortBy('consecutivo') as $key => $pretension)
                                            <div class="col-12 row t">
                                                <div class="col-12 mb-3">
                                                    <h6 class="pl-4">Pretensión # {{ $pretension->consecutivo }}
                                                    </h6>
                                                </div>
                                                <div class="col-12">
                                                    <p class="text-justify">{{ $pretension->pretension }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            @endif
                            <hr>
                            @if (sizeOf($tutela->argumentos))
                                <div class="row menu-card p-2">
                                    <div class="col-12 mb-2">
                                        <h5>Argumentos</h5>
                                    </div>
                                    @foreach ($tutela->argumentos as $key => $argumento)
                                        <div class="col-12 row t">
                                            <div class="col-12 mb-3">
                                                <h6 class="pl-4">Argumento # {{ $key + 1 }}</h6>
                                            </div>
                                            <div class="col-12">
                                                <p class="text-justify">{{ $argumento->argumento }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <hr>
                            @endif
                            @if (sizeOf($tutela->pruebas))
                                <div class="row menu-card p-2">
                                    <div class="col-12 mb-2">
                                        <h5>Pruebas</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-light" style="font-size: 0.8em;">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Nombre</th>
                                                            <th scope="col">Descripción</th>
                                                            <th scope="col">Archivo</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($tutela->pruebas as $anexo)
                                                            <tr>
                                                                <td class="text-justify">{{ $anexo->titulo }}
                                                                </td>
                                                                <td class="text-justify">
                                                                    {{ $anexo->descripcion }}
                                                                </td>
                                                                <td><a href="{{ asset('documentos/tutelaspruebas/' . $anexo->url) }}"
                                                                        target="_blank"
                                                                        rel="noopener noreferrer">Descargar</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endif
                            @if (sizeOf($tutela->motivos))
                                <div class="row menu-card p-2">
                                    <div class="col-12 mb-2">
                                        <h5>Motivos</h5>
                                    </div>
                                    @foreach ($tutela->motivos as $key => $motivo)
                                        <div class="col-6 row">
                                            <div class="col-12 mb-3">
                                                <h6 class="pl-4">Motivo # {{ $key + 1 }}</h6>
                                            </div>
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Motivo:</strong>
                                                    {{ $motivo->motivo }}</p>
                                            </div>
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Sub - motivo:</strong>
                                                    @foreach ($motivo->sub_motivostutelas as $sub_motivostutela)
                                                        @foreach ($tutela->submotivos as $submotivo)
                                                            @if ($sub_motivostutela->id == $submotivo->id)
                                                                {{ $submotivo->sub_motivo }}
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </p>
                                            </div>
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Tutela sobre:</strong>
                                                    @foreach ($tutela->motivos_tipo as $tipo_tutela)
                                                        {{ $tipo_tutela->tipo_tutela }}
                                                    @endforeach
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <hr>
                            @endif
                        </div>
                    </div>
                    <div class="rounded border m-3 p-2">
                        <h5 class="">Gestión Hechos</h5>
                        <div class="col-12 table-responsive d-flex justify-content-center">
                            <table class="table table-light col-12" style="font-size: 0.8em;">
                                <thead>
                                    <tr>
                                        <th scope="col">Hecho #</th>
                                        <th scope="col">Funcionario</th>
                                        <th scope="col">Porcentaje</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tutela->hechos->sortBy('consecutivo') as $key => $hecho)
                                        <tr>
                                            <td>{{ $hecho->consecutivo }}</td>
                                            @if ($hecho->empleado)
                                                <td>{{ $hecho->empleado->nombre1 }} {{ $hecho->empleado->apellido1 }}
                                                </td>
                                            @else
                                                <td>Sin asignar</td>
                                            @endif
                                            <td class="">{{ $hecho->estadohecho->estado }}%</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <hr>
                    </div>
                    <div class="rounded border m-3 p-2">
                        <h5 class="">Gestión Pretensiones</h5>
                        <div class="col-12 table-responsive d-flex justify-content-center">
                            <table class="table table-light col-12" style="font-size: 0.8em;">
                                <thead>
                                    <tr>
                                        <th scope="col">Pretensión #</th>
                                        <th scope="col">Funcionario</th>
                                        <th scope="col">Porcentaje</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tutela->pretensiones->sortBy('consecutivo') as $key => $pretension)
                                        <tr>
                                            <td>{{ $pretension->consecutivo }}</td>
                                            @if ($pretension->empleado)
                                                <td>{{ $pretension->empleado->nombre1 }}
                                                    {{ $pretension->empleado->apellido1 }}</td>
                                            @else
                                                <td>Sin asignar</td>
                                            @endif
                                            <td class="">{{ $pretension->estadopretension->estado }}%</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <hr>
                    </div>
                    <div class="rounded border m-3 p-2">
                        <h5 class="">Historial de tareas</h5>
                        <div class="row d-flex px-12 p-3">
                            <div class="col-12 table-responsive">
                                <table class="table table-light" style="font-size: 0.8em;">
                                    <thead>
                                        <tr>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Tarea</th>
                                            <th scope="col">Empleado</th>
                                            <th scope="col">Historial</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tutela->historialtareas as $historial)
                                            <tr>
                                                <td>{{ $historial->created_at }}</td>
                                                @if ($historial->tarea)
                                                    <td class="text-justify">{{ $historial->tarea->tarea }}</td>
                                                @else
                                                    <td class="text-justify">ADMINISTRADOR</td>
                                                @endif
                                                <td class="text-justify">{{ $historial->empleado->nombre1 }}
                                                    {{ $historial->empleado->apellido1 }}</td>
                                                <td class="text-justify">{{ $historial->historial }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="row d-flex px-12 p-3">
                            <input class="id_tarea" type="hidden" value="1">
                            <div class="container-mensaje-historial-tarea form-group col-12">
                                <label for="" class="">Agregar Historial</label>
                                <textarea class="form-control mensaje-historial-tarea" rows="3" placeholder="" required></textarea>
                            </div>
                            <div class="col-12 col-md-12 form-group d-flex align-items-end justify-content-end">
                                <button href="" class="btn btn-primary mx-2 px-4 guardarHistorialTarea"
                                    data_url="{{ route('historial_tarea_tutela_guardar') }}"
                                    data_token="{{ csrf_token() }}">Guardar</button>
                            </div>
                        </div>
                    </div>
                    <input class="id_auto" type="hidden" value="{{ $tutela->id }}">
                    <div class="card-footer d-flex justify-content-end">
                        <a href="{{ route('tutela-gestion') }}" class="btn btn-danger mx-2 px-4">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/tutela/gestion_asignacion_supervisa.js') }}"></script>
@endsection
<!-- ************************************************************* -->
