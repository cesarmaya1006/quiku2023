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
        <div class="row justify-content-center">
            <div class="col-12 col-md-11 d-flex align-items-stretch flex-column">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Gestión a tutela Número de radicado:
                            <strong>{{ $tutela->radicado }}</strong>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="col-12 rounded border mb-3 p-2">
                            @include(
                                'intranet.funcionarios.tutela.includes.tarjetas'
                            )
                            <hr>
                    @include(
                        'intranet.funcionarios.tutela.includes.detallestutela'
                    )
                            {{--<div class="row">
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
                            </div> --}}
                        </div>
                        {{-- Inicio Bloque Tarjetas --}}

                        {{-- Fin Bloque Tarjetas --}}
                        @if ($tutela->estadostutela_id == 4)
                            <div class="col-12 rounded border mb-3 p-2">
                                <div class="row d-flex px-4">
                                    <div class="col-12 col-md-5 form-group mt-2">
                                        <label for="">Seleccionar nuevo proceso</label>
                                        <select class="custom-select rounded-0">
                                            <option value="">Registro Sentencia 1ra Instancia</option>
                                            <option value="">Recurso de Impugnación</option>
                                            <option value="">Registro Sentencia 2ra Instancia</option>
                                            <option value="">Registro Sentencia de Revisión</option>
                                            <option value="">Registro de Desacato</option>
                                            <option value="">Respuesta Desacato</option>
                                            <option value="">Decisión Desacato</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6 form-group d-flex align-items-end">
                                        <button href="" class="btn btn-primary py-2 px-3">Iniciar</button>
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{-- <div class="col-12 rounded border mb-3 p-2">
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
                            @if (sizeOf($tutela->anexosTutela))
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
                                                    {{ $motivo->motivo_tutela }}</p>
                                            </div>
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Sub - motivo:</strong>
                                                    {{ $motivo->sub_motivo_tutela }}</p>
                                            </div>
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Tutela sobre:</strong>
                                                    {{ $motivo->tipo_tutela }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <hr>
                            @endif
                        </div> --}}
                    </div>
                    {{-- @if (sizeOf($tutela->historialasignacion))
                        <div class="rounded border mx-3 my-0 p-3">
                            <h5 class="m-2">Historial asignación</h5>
                            <div class="row d-flex px-12 p-3">
                                <div class="col-12 table-responsive">
                                    <table class="table table-light" style="font-size: 0.8em;">
                                        <thead>
                                            <tr>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Empleado</th>
                                                <th scope="col">Historial</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tutela->historialasignacion as $historial)
                                                <tr>
                                                    <td>{{ $historial->created_at }}</td>
                                                    <td class="text-justify">{{ $historial->empleado->nombre1 }}
                                                        {{ $historial->empleado->apellido1 }}</td>
                                                    <td class="text-justify">{{ $historial->historial }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @if ($tutela->estadostutela_id != 4)
                                <hr>
                                <div class="row d-flex px-12 p-3">
                                    <div class="container-mensaje-historial form-group col-12">
                                        <label for="" class="">Agregar Historial</label>
                                        <textarea class="form-control mensaje-historial" rows="3" placeholder="" required></textarea>
                                    </div>
                                    <div class="col-12 col-md-12 form-group d-flex">
                                        <button href="" class="btn btn-primary px-4 guardarHistorial"
                                            data_url="{{ route('historial_tutela_guardar') }}"
                                            data_token="{{ csrf_token() }}">Guardar historial</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif
                    <input class="id_auto_admisorio" type="hidden" value="{{ $tutela->id }}">

                    @if ($tutela->estado_asignacion == 0)
                        @php
                            $hechosAsignados = $tutela->hechos->where('empleado_id', '!=', null);
                            $pretensionesAsignados = $tutela->pretensiones->where('empleado_id', '!=', null);
                            if (sizeOf($hechosAsignados) || sizeOf($pretensionesAsignados)) {
                                $asignados = 1;
                            } else {
                                $asignados = 0;
                            }
                        @endphp
                        <div class="rounded border m-3 p-2">
                            <h5 class="">Gestion asignación</h5>
                            <div class="row d-flex px-12 p-3">
                                <div class="col-12 col-md-5 form-group">
                                    <label for="">¿Acepta la asignación?</label>
                                    <select class="custom-select rounded-0 confirmacion-asignacion" required="">
                                        <option value="1">Aceptar</option>
                                        <option value="0">Rechazar</option>
                                    </select>
                                </div>
                                <div class="container-mensaje-asigacion form-group col-10 d-none">
                                    <label for="" class="">Mensaje</label>
                                    <textarea class="form-control mensaje-asignacion" rows="3" placeholder="" required></textarea>
                                </div>
                                <input class="asignados" type="hidden" value="{{ $asignados }}">
                                <div class="col-12 col-md-3 form-group d-flex align-items-end">
                                    <button href="" class="btn btn-primary mx-2 px-4 guardarAsignacion"
                                        data_url="{{ route('asignacion_tutela_guardar') }}"
                                        data_token="{{ csrf_token() }}">Guardar</button>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($tutela->estado_asignacion)
                        <div class="rounded border m-3 p-2">
                            <h5 class="">Gestión tareas</h5>
                            <div class="col-12 table-responsive d-flex justify-content-center">
                                <table class="table table-light col-12" style="font-size: 0.8em;">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tarea</th>
                                            <th scope="col">Funcionario</th>
                                            <th scope="col">Fecha de asignación</th>
                                            <th scope="col">Estado Tarea</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tutela->asignaciontareas as $asignacion)
                                            <tr>
                                                <td>{{ $asignacion->tarea->tarea }}</td>
                                                <td>{{ $asignacion->empleado->nombre1 }}
                                                    {{ $asignacion->empleado->apellido1 }}</td>
                                                <td>{{ $asignacion->created_at }}</td>
                                                <td>{{ $asignacion->estadotarea->estado }} %</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if ($tutela->estadostutela_id != 4)
                                <hr>
                                <h5 class="">Asignación tareas</h5>
                                <div class="row d-flex px-4">
                                    <div class="col-12 col-md-5 form-group">
                                        <label for="">Tarea</label>
                                        <select class="custom-select rounded-0 tarea" required=""
                                            data_url="{{ route('cargar_tareas') }}"></select>
                                    </div>
                                    <div class="col-12 col-md-5 form-group">
                                        <label for="">Cargo</label>
                                        <select class="custom-select rounded-0 cargo" required=""
                                            data_url="{{ route('cargar_cargos') }}"
                                            data_url2="{{ route('cargar_funcionarios') }}">
                                            <option value="">--Seleccione--</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-5 form-group">
                                        <label for="">Funcionario</label>
                                        <select class="custom-select rounded-0 funcionario" required="">
                                            <option value="">--Seleccione--</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6 form-group d-flex align-items-end">
                                        <button href="" class="btn btn-primary py-2 px-3 asignacion_tarea_guardar"
                                            data_url="{{ route('asignacion_tarea_tutela_guardar') }}"
                                            data_token="{{ csrf_token() }}">Guardar asignación</button>
                                    </div>
                                </div>
                            @endif
                            <hr>
                            <h5 class="">Historial tareas</h5>
                            <div class="col-12 table-responsive">
                                <table class="table table-light" style="font-size: 0.8em;">
                                    <thead>
                                        <tr>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Empleado</th>
                                            <th scope="col">Tarea</th>
                                            <th scope="col">Historial</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tutela->historialtareas as $historial)
                                            <tr>
                                                <td>{{ $historial->created_at }}</td>
                                                <td class="text-justify">{{ $historial->empleado->nombre1 }}
                                                    {{ $historial->empleado->apellido1 }}</td>
                                                @if ($historial->tarea)
                                                    <td class="text-justify">{{ $historial->tarea->tarea }}</td>
                                                @else
                                                    <td class="text-justify">ADMINISTRADOR</td>
                                                @endif
                                                <td class="text-justify">{{ $historial->historial }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if ($tutela->estadostutela_id != 4)
                                <hr>
                                <div class="row d-flex px-12 p-3">
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
                            @endif

                            @if (sizeOf($tutela->respuestas))
                                <hr>
                                <div class="p-2 mb-4">
                                    <h5 class="">Historial de respuesta </h5>
                                    <div class="col-12 table-responsive">
                                        <table class="table table-light" style="font-size: 0.8em;">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Fecha</th>
                                                    <th scope="col">Empleado</th>
                                                    <th scope="col">Tarea</th>
                                                    <th scope="col">Tipo</th>
                                                    <th scope="col">Descarga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tutela->respuestas as $respuesta)
                                                    <tr>
                                                        <td>{{ $respuesta->created_at }}</td>
                                                        <td class="text-justify">{{ $respuesta->empleado->nombre1 }}
                                                            {{ $respuesta->empleado->apellido1 }}</td>
                                                        <td class="text-justify">{{ $respuesta->tarea->tarea }}</td>
                                                        <td>Respuesta  {{ $respuesta->tipo_respuesta == 1 ? 'tutela' : 'sentencia 1° instancia' }}</td>
                                                        <td class="text-justify"><a
                                                                href="{{ route('descarga_respuesta_tutela', ['id' => $respuesta->id]) }}"
                                                                target="_blank" rel="noopener noreferrer">
                                                                <i class="fas fa-file-download"></i> Descarga</a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <hr class="mt-5">
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif --}}
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
    <script src="{{ asset('js/intranet/tutela/gestion_asignacion.js') }}"></script>
@endsection
<!-- ************************************************************* -->
