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
                        <h3 class="card-title">Gestión a Tutela Número de radicado:
                            <strong>{{ $tutela->radicado }}</strong>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="col-12 rounded border mb-3">
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

                        <div class="col-12 rounded border mb-3 p-2 pt-3">
                            <div class="row d-flex px-4">
                                <div class="col-12 col-md-5 form-group">
                                    <label for="">Prioridad</label>
                                    <select class="custom-select rounded-0 prioridad" required>
                                        @foreach ($estadoPrioridad as $prioridad)
                                            <option value="{{ $prioridad->id }}"
                                                {{ $tutela->prioridad->id == $prioridad->id ? 'selected' : '' }}>
                                                {{ $prioridad->prioridad }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-4 form-group d-flex align-items-end">
                                    <button href="" class="btn btn-primary mx-2 px-4 prioridad_guardar"
                                        data_url="{{ route('prioridad_tutela_guardar') }}"
                                        data_token="{{ csrf_token() }}">Guardar prioridad</button>
                                </div>
                            </div>
                        </div>
                        <hr style="border-top: solid 4px black">

                        <div class="col-12 mb-3 p-2">
                            <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 1em;">
                                <div class="card-header">
                                    <h3 class="card-title font-weight-bold">Detalles tutela</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: none;">
                                    <div class="menu-card">
                                        <div class="col-12 mt-2">
                                            <h5>Términos</h5>
                                        </div>
                                        <div class="row px-2">
                                            @if ($tutela->dias_termino)
                                                <div class="col-12">
                                                    <p class="text-justify"><strong>Días:</strong>
                                                        {{ $tutela->dias_termino }}</p>
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
                                                                    <td class="text-justify">
                                                                        {{ $tutela->titulo_admisorio }}</td>
                                                                    <td class="text-justify">
                                                                        {{ $tutela->descripcion_admisorio }}</td>
                                                                    <td><a href="{{ asset('documentos/autoadmisorios/' . $tutela->url_admisorio) }}"
                                                                            target="_blank"
                                                                            rel="noopener noreferrer">Descargar</a>
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
                                                                    <td class="text-justify">
                                                                        {{ $tutela->titulo_tutela }}</td>
                                                                    <td class="text-justify">
                                                                        {{ $tutela->descripcion_tutela }}</td>
                                                                    <td><a href="{{ asset('documentos/tutelas/' . $tutela->url_tutela) }}"
                                                                            target="_blank"
                                                                            rel="noopener noreferrer">Descargar</a>
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
                                                        @if ($accion->tipo_accion_id == 1)
                                                            <div class="col-12 mb-3">
                                                                <h6 class="pl-4">Accionante</h6>
                                                            </div>
                                                        @else
                                                            <div class="col-12 mb-3">
                                                                <h6 class="pl-4">Accionado</h6>
                                                            </div>
                                                        @endif
                                                        <div class="col-12">
                                                            <p class="text-justify"><strong>Nombre:</strong>
                                                                {{ $accion->nombres_accion }}
                                                                {{ $accion->apellidos_accion }}</p>
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
                                                                <p class="text-justify"><strong>Tarjeta
                                                                        Profesional:</strong>
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
                                        <hr>
                                    @endif
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
                                </div>
                            </div>

                            @if (sizeOf($tutela->respuestasHechos))
                                <div class="card card-outline card-primary collapsed-card mx-1 py-2"
                                    style="font-size: 1em;">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold">Respuestas hechos</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                        @if (sizeOf($tutela->hechos))
                                            <div class="col-12 row mb-2">
                                                @if (sizeOf($tutela->respuestasHechos))
                                                    @foreach ($tutela->respuestasHechos as $key => $respuesta)
                                                        <div class="rounded border my-3 p-3">
                                                            <div class="col-12 col-md-12 mt-2 mb-4">
                                                                <h5>Respuesta #{{ $key + 1 }}</h5>
                                                            </div>

                                                            @if ($respuesta->estado_id != 11)
                                                                <div class="row col-12">
                                                                    <div class="col-12 col-md-4 form-group">
                                                                        <label for="">Cargo</label>
                                                                        <select class="custom-select rounded-0 cargo"
                                                                            required=""
                                                                            data_url="{{ route('cargar_cargos') }}"
                                                                            data_url2="{{ route('cargar_funcionarios') }}">
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-12 col-md-4 form-group">
                                                                        <label for="">Funcionario</label>
                                                                        <select class="custom-select rounded-0 funcionario"
                                                                            required="">
                                                                            <option value="">--Seleccione--</option>
                                                                        </select>
                                                                    </div>
                                                                    <div
                                                                        class="col-12 col-md-4 form-group d-flex align-items-end">
                                                                        <button href=""
                                                                            class="btn btn-primary px-4 reasignacion_hecho_guardar"
                                                                            data_url="{{ route('asignacion_hecho_guardar') }}"
                                                                            data_url2="{{ route('respuesta_hecho_editar_guardar') }}"
                                                                            data_token="{{ csrf_token() }}">Asignar
                                                                            hecho</button>
                                                                    </div>
                                                                </div>
                                                            @endif

                                                            <div class="col-12 row">
                                                                @foreach ($respuesta->relacion as $relacion)
                                                                    @if ($tutela->cantidad_hechos)
                                                                        <div class="d-flex col-10 col-md-5 col-lg-3">
                                                                            @if ($respuesta->estado_id != 11)
                                                                                <div class="mr-3">
                                                                                    <button type="button"
                                                                                        class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminarHecho"
                                                                                        data_url="{{ route('eliminar_respuesta_hecho_guardar') }}"
                                                                                        data_token="{{ csrf_token() }}"><i
                                                                                            class="fas fa-minus-circle"></i></button>
                                                                                    <input class="id_relacion_hecho"
                                                                                        type="hidden"
                                                                                        value="{{ $relacion->hecho->id }}">
                                                                                </div>
                                                                            @endif
                                                                            <div class="my-2">
                                                                                <strong class="">Hecho #
                                                                                    {{ $relacion->hecho->consecutivo }}</strong>{{ $relacion->hecho->hecho }}
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <div class="row">
                                                                            <div class="my-2 col-11">
                                                                                <strong
                                                                                    class="">#{{ $relacion->hecho->consecutivo }}
                                                                                    Hecho:
                                                                                </strong>{{ $relacion->hecho->hecho }}
                                                                            </div>
                                                                            @if ($respuesta->estado_id != 11)
                                                                                <div class="col-1">
                                                                                    <button type="button"
                                                                                        class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminarHecho"
                                                                                        data_url="{{ route('eliminar_respuesta_hecho_guardar') }}"
                                                                                        data_token="{{ csrf_token() }}"><i
                                                                                            class="fas fa-minus-circle"></i></button>
                                                                                    <input class="id_relacion_hecho"
                                                                                        type="hidden"
                                                                                        value="{{ $relacion->hecho->id }}">
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                            <div class="row respuesta-hecho">
                                                                <div class="col-12 row mt-4 mb-2 ">
                                                                    <div class="col-12 col-md-5">
                                                                        <h6 class="font-weight-bold">Respuesta hecho</h6>
                                                                    </div>
                                                                    <div
                                                                        class="col-12 col-md-7 row estado-hecho justify-content-end">
                                                                        <input class="estado_actual" type="hidden"
                                                                            value="{{ $respuesta->estado_id }}">
                                                                        @if ($tutela->estadostutela_id < 4)
                                                                            <div
                                                                                class="col-9 row estado-hecho justify-content-end">
                                                                                <div class="col-3 d-flex mb-2">
                                                                                    <h6>Avance:</h6>
                                                                                </div>
                                                                                <select
                                                                                    class="custom-select rounded-0 estadoHecho col-4">
                                                                                    @foreach ($estados as $estado)
                                                                                        <option value="{{ $estado->id }}"
                                                                                            {{ $respuesta->estadorepuestahecho->id == $estado->id ? 'selected' : '' }}>
                                                                                            {{ $estado->estado }} %
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <button type=""
                                                                                    class="btn btn-primary btn-estado-hecho col-2 mx-2"
                                                                                    data_url="{{ route('estado_respuesta_hecho_guardar') }}"
                                                                                    data_token="{{ csrf_token() }}"><span
                                                                                        style="font-size: 1em;"><i
                                                                                            class="far fa-save"></i></span></button>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="col-12 form-group mt-3">
                                                                        <div class="respuesta mt-2">
                                                                            @if ($respuesta->respuesta)
                                                                                {!! $respuesta->respuesta !!}
                                                                            @endif
                                                                        </div>
                                                                        <input class="id_respuesta" type="hidden"
                                                                            value="{{ $respuesta->id }}">
                                                                    </div>
                                                                    @if (isset($respuesta))
                                                                        @if (sizeOf($respuesta->documentos))
                                                                            <hr class="my-4">
                                                                            <div class="row respuestaAnexos">
                                                                                <div class="col-12">
                                                                                    <div class="col-12">
                                                                                        <h6>Anexos respuesta</h6>
                                                                                    </div>
                                                                                    <div class="col-12 table-responsive">
                                                                                        <table class="table table-light"
                                                                                            style="font-size: 0.8em;">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th scope="col">Nombre
                                                                                                    </th>
                                                                                                    <th scope="col">
                                                                                                        Descripción</th>
                                                                                                    <th scope="col">Archivo
                                                                                                    </th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @foreach ($respuesta->documentos as $anexo)
                                                                                                    <tr>
                                                                                                        <td
                                                                                                            class="text-justify">
                                                                                                            {{ $anexo->titulo }}
                                                                                                        </td>
                                                                                                        <td
                                                                                                            class="text-justify">
                                                                                                            {{ $anexo->descripcion }}
                                                                                                        </td>
                                                                                                        <td><a href="{{ asset('documentos/tutelas/hechos/' . $anexo->url) }}"
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
                                                                        @endif
                                                                    @endif
                                                                    @if (isset($respuesta))
                                                                        @if (sizeOf($respuesta->historial))
                                                                            <hr class="mt-3">
                                                                            <h6 class="">Historial de
                                                                                respuestas</h6>
                                                                            <div class="row d-flex px-12 p-3">
                                                                                <div class="col-12 table-responsive">
                                                                                    <table class="table table-light"
                                                                                        style="font-size: 0.8em;">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th scope="col">Fecha</th>
                                                                                                <th scope="col">Empleado
                                                                                                </th>
                                                                                                <th scope="col">Historial
                                                                                                </th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            @foreach ($respuesta->historial as $historial)
                                                                                                <tr>
                                                                                                    <td>{{ $historial->created_at }}
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-justify">
                                                                                                        {{ $historial->empleado->nombre1 }}
                                                                                                        {{ $historial->empleado->apellido1 }}
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-justify">
                                                                                                        {{ strip_tags($historial->historial) }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                            @endforeach
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                        <hr class="mt-3">
                                                                        <div
                                                                            class="row d-flex px-12 p-3 mensaje-respuesta-hecho">
                                                                            <input class="id_respuesta_hecho" type="hidden"
                                                                                value="{{ $respuesta->id }}">
                                                                            <div
                                                                                class="container-mensaje-historial form-group col-12">
                                                                                <label for=""
                                                                                    class="">Agregar
                                                                                    Historial de respuesta</label>
                                                                                <textarea class="form-control mensaje-historial-respuesta-hecho" rows="3" placeholder="" required></textarea>
                                                                            </div>
                                                                            <div
                                                                                class="col-12 col-md-12 form-group d-flex">
                                                                                <button href=""
                                                                                    class="btn btn-primary px-4 guardarHistorialRespuestaHecho"
                                                                                    data_url="{{ route('historial_respuesta_hecho_guardar') }}"
                                                                                    data_token="{{ csrf_token() }}">Guardar
                                                                                    historial</button>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            @if (sizeOf($tutela->respuestasPretensiones))
                                <div class="card card-outline card-primary collapsed-card mx-1 py-2"
                                    style="font-size: 1em;">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold">Respuestas pretensiones</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                        @if (sizeOf($tutela->pretensiones))
                                            <div class="col-12 row mb-2">
                                                @if (sizeOf($tutela->respuestasPretensiones))
                                                    @foreach ($tutela->respuestasPretensiones as $key => $respuesta)
                                                        <div class="rounded border my-3 p-3">
                                                            <div class="col-12 col-md-12 mt-2 mb-4">
                                                                <h5>Respuesta #{{ $key + 1 }}</h5>
                                                            </div>

                                                            @if ($respuesta->estado_id != 11)
                                                                <div class="row col-12">
                                                                    <div class="col-12 col-md-4 form-group">
                                                                        <label for="">Cargo</label>
                                                                        <select class="custom-select rounded-0 cargo"
                                                                            required=""
                                                                            data_url="{{ route('cargar_cargos') }}"
                                                                            data_url2="{{ route('cargar_funcionarios') }}">
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-12 col-md-4 form-group">
                                                                        <label for="">Funcionario</label>
                                                                        <select class="custom-select rounded-0 funcionario"
                                                                            required="">
                                                                            <option value="">--Seleccione--</option>
                                                                        </select>
                                                                    </div>
                                                                    <div
                                                                        class="col-12 col-md-4 form-group d-flex align-items-end">
                                                                        <button href=""
                                                                            class="btn btn-primary px-4 reasignacion_pretension_guardar"
                                                                            data_url="{{ route('asignacion_pretension_guardar') }}"
                                                                            data_url2="{{ route('respuesta_pretension_editar_guardar') }}"
                                                                            data_token="{{ csrf_token() }}">Asignar
                                                                            pretensión</button>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            <div class="col-12 row">
                                                                @foreach ($respuesta->relacion as $relacion)
                                                                    @if ($tutela->cantidad_pretensiones)
                                                                        <div class="d-flex col-10 col-md-5 col-lg-3">
                                                                            @if ($respuesta->estado_id != 11)
                                                                                <div class="mr-3">
                                                                                    <button type="button"
                                                                                        class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminarPretension"
                                                                                        data_url="{{ route('eliminar_respuesta_pretension_guardar') }}"
                                                                                        data_token="{{ csrf_token() }}"><i
                                                                                            class="fas fa-minus-circle"></i></button>
                                                                                    <input class="id_relacion_pretension"
                                                                                        type="hidden"
                                                                                        value="{{ $relacion->pretension->id }}">
                                                                                </div>
                                                                            @endif
                                                                            <div class="my-2">
                                                                                <strong class="">Pretensión #
                                                                                    {{ $relacion->pretension->consecutivo }}</strong>{{ $relacion->pretension->pretension }}
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <div class="row">
                                                                            <div class="my-2 col-11">
                                                                                <strong
                                                                                    class="">#{{ $relacion->pretension->consecutivo }}
                                                                                    Pretensión:
                                                                                </strong>{{ $relacion->pretension->pretension }}
                                                                            </div>
                                                                            @if ($respuesta->estado_id != 11)
                                                                                <div class="col-1">
                                                                                    <button type="button"
                                                                                        class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminarPretension"
                                                                                        data_url="{{ route('eliminar_respuesta_pretension_guardar') }}"
                                                                                        data_token="{{ csrf_token() }}"><i
                                                                                            class="fas fa-minus-circle"></i></button>
                                                                                    <input class="id_relacion_pretension"
                                                                                        type="hidden"
                                                                                        value="{{ $relacion->pretension->id }}">
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                            <div class="row respuesta-pretension">
                                                                <div class="col-12 row mt-4 mb-2 ">
                                                                    <div class="col-12 col-md-5">
                                                                        <h6 class="font-weight-bold">Respuesta pretensión
                                                                        </h6>
                                                                    </div>
                                                                    <div
                                                                        class="col-12 col-md-7 row estado-pretension justify-content-end">
                                                                        <input class="estado_actual" type="hidden"
                                                                            value="{{ $respuesta->estado_id }}">
                                                                        @if ($tutela->estadostutela_id < 4)
                                                                            <div
                                                                                class="col-9 row estado-pretension justify-content-end">
                                                                                <div class="col-3 d-flex mb-2">
                                                                                    <h6>Avance:</h6>
                                                                                </div>
                                                                                <select
                                                                                    class="custom-select rounded-0 estadoPretension col-4">
                                                                                    @foreach ($estados as $estado)
                                                                                        <option
                                                                                            value="{{ $estado->id }}"
                                                                                            {{ $respuesta->estadorespuestapretension->id == $estado->id ? 'selected' : '' }}>
                                                                                            {{ $estado->estado }} %
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <button type=""
                                                                                    class="btn btn-primary btn-estado-pretension col-2 mx-2"
                                                                                    data_url="{{ route('estado_respuesta_pretension_guardar') }}"
                                                                                    data_token="{{ csrf_token() }}"><span
                                                                                        style="font-size: 1em;"><i
                                                                                            class="far fa-save"></i></span></button>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="col-12 form-group mt-3">
                                                                        <div class="respuesta mt-2">
                                                                            @if ($respuesta->respuesta)
                                                                                {!! $respuesta->respuesta !!}
                                                                            @endif
                                                                        </div>
                                                                        <input class="id_respuesta" type="hidden"
                                                                            value="{{ $respuesta->id }}">
                                                                    </div>
                                                                    @if (isset($respuesta))
                                                                        @if (sizeOf($respuesta->documentos))
                                                                            <hr class="my-4">
                                                                            <div class="row respuestaAnexos">
                                                                                <div class="col-12">
                                                                                    <div class="col-12">
                                                                                        <h6>Anexos respuesta</h6>
                                                                                    </div>
                                                                                    <div class="col-12 table-responsive">
                                                                                        <table class="table table-light"
                                                                                            style="font-size: 0.8em;">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th scope="col">Nombre
                                                                                                    </th>
                                                                                                    <th scope="col">
                                                                                                        Descripción</th>
                                                                                                    <th scope="col">Archivo
                                                                                                    </th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @foreach ($respuesta->documentos as $anexo)
                                                                                                    <tr>
                                                                                                        <td
                                                                                                            class="text-justify">
                                                                                                            {{ $anexo->titulo }}
                                                                                                        </td>
                                                                                                        <td
                                                                                                            class="text-justify">
                                                                                                            {{ $anexo->descripcion }}
                                                                                                        </td>
                                                                                                        <td><a href="{{ asset('documentos/tutelas/pretensiones/' . $anexo->url) }}"
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
                                                                        @endif
                                                                    @endif
                                                                    @if (isset($respuesta))
                                                                        @if (sizeOf($respuesta->historial))
                                                                            <hr class="mt-3">
                                                                            <h6 class="">Historial de
                                                                                respuestas</h6>
                                                                            <div class="row d-flex px-12 p-3">
                                                                                <div class="col-12 table-responsive">
                                                                                    <table class="table table-light"
                                                                                        style="font-size: 0.8em;">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th scope="col">Fecha</th>
                                                                                                <th scope="col">Empleado
                                                                                                </th>
                                                                                                <th scope="col">Historial
                                                                                                </th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            @foreach ($respuesta->historial as $historial)
                                                                                                <tr>
                                                                                                    <td>{{ $historial->created_at }}
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-justify">
                                                                                                        {{ $historial->empleado->nombre1 }}
                                                                                                        {{ $historial->empleado->apellido1 }}
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-justify">
                                                                                                        {{ strip_tags($historial->historial) }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                            @endforeach
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                        <hr class="mt-3">
                                                                        <div
                                                                            class="row d-flex px-12 p-3 mensaje-respuesta-pretension">
                                                                            <input class="id_respuesta_pretension"
                                                                                type="hidden"
                                                                                value="{{ $respuesta->id }}">
                                                                            <div
                                                                                class="container-mensaje-historial form-group col-12">
                                                                                <label for=""
                                                                                    class="">Agregar
                                                                                    Historial de respuesta</label>
                                                                                <textarea class="form-control mensaje-historial-respuesta-pretension" rows="3" placeholder="" required></textarea>
                                                                            </div>
                                                                            <div
                                                                                class="col-12 col-md-12 form-group d-flex">
                                                                                <button href=""
                                                                                    class="btn btn-primary px-4 guardarHistorialRespuestaPretension"
                                                                                    data_url="{{ route('historial_respuesta_pretension_guardar') }}"
                                                                                    data_token="{{ csrf_token() }}">Guardar
                                                                                    historial</button>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            @if (sizeOf($tutela->primeraInstancia->impugnacionesinternas))
                                <div class="card card-outline card-primary collapsed-card mx-1 py-2"
                                    style="font-size: 1em;">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold">Respuestas Sentencia en primera Instancia</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                        @if (sizeOf($tutela->primeraInstancia->impugnacionesinternas))
                                            <div class="col-12 row mb-2">
                                                @if (sizeOf($tutela->primeraInstancia->respuestasImpugnacionesiInternas))
                                                    @foreach ($tutela->primeraInstancia->respuestasImpugnacionesiInternas as $key => $respuesta)
                                                        <div class="rounded border my-3 p-3">
                                                            <div class="col-12 col-md-12 mt-2 mb-4">
                                                                <h5>Respuesta #{{ $key + 1 }}</h5>
                                                            </div>

                                                            @if ($respuesta->estado_id != 11)
                                                                <div class="row col-12">
                                                                    <div class="col-12 col-md-4 form-group">
                                                                        <label for="">Cargo</label>
                                                                        <select class="custom-select rounded-0 cargo"
                                                                            required=""
                                                                            data_url="{{ route('cargar_cargos') }}"
                                                                            data_url2="{{ route('cargar_funcionarios') }}">
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-12 col-md-4 form-group">
                                                                        <label for="">Funcionario</label>
                                                                        <select class="custom-select rounded-0 funcionario"
                                                                            required="">
                                                                            <option value="">--Seleccione--</option>
                                                                        </select>
                                                                    </div>
                                                                    <div
                                                                        class="col-12 col-md-4 form-group d-flex align-items-end">
                                                                        <button href=""
                                                                            class="btn btn-primary px-4 reasignacion_pretension_guardar"
                                                                            data_url="{{ route('asignacion_pretension_guardar') }}"
                                                                            data_url2="{{ route('respuesta_pretension_editar_guardar') }}"
                                                                            data_token="{{ csrf_token() }}">Asignar
                                                                            pretensión</button>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            <div class="col-12 row">
                                                                @foreach ($respuesta->relacion as $relacion)
                                                                    @if ($tutela->primeraInstancia->cantidad_resuelves)
                                                                        <div class="d-flex col-10 col-md-5 col-lg-3">
                                                                            @if ($respuesta->estado_id != 11)
                                                                                <div class="mr-3">
                                                                                    <button type="button"
                                                                                        class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminarPretension"
                                                                                        data_url="{{ route('eliminar_respuesta_pretension_guardar') }}"
                                                                                        data_token="{{ csrf_token() }}"><i
                                                                                            class="fas fa-minus-circle"></i></button>
                                                                                    <input class="id_relacion_pretension"
                                                                                        type="hidden"
                                                                                        value="{{ $relacion->impugancion->id }}">
                                                                                </div>
                                                                            @endif
                                                                            <div class="my-2">
                                                                                <strong class="">Pretensión #
                                                                                    {{ $relacion->impugancion->consecutivo }}</strong>{{ $relacion->impugancion->resuelve }}
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <div class="row">
                                                                            <div class="my-2 col-11">
                                                                                <strong
                                                                                    class="">#{{ $relacion->impugancion->consecutivo }}
                                                                                    Pretensión:
                                                                                </strong>{{ $relacion->impugancion->resuelve }}
                                                                            </div>
                                                                            @if ($respuesta->estado_id != 11)
                                                                                <div class="col-1">
                                                                                    <button type="button"
                                                                                        class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminarPretension"
                                                                                        data_url="{{ route('eliminar_respuesta_pretension_guardar') }}"
                                                                                        data_token="{{ csrf_token() }}"><i
                                                                                            class="fas fa-minus-circle"></i></button>
                                                                                    <input class="id_relacion_pretension"
                                                                                        type="hidden"
                                                                                        value="{{ $relacion->impugancion->id }}">
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                            <div class="row respuesta-pretension">
                                                                <div class="col-12 row mt-4 mb-2 ">
                                                                    <div class="col-12 col-md-5">
                                                                        <h6 class="font-weight-bold">Respuesta Resuelve</h6>
                                                                    </div>
                                                                    <div
                                                                        class="col-12 col-md-7 row estado-pretension justify-content-end">
                                                                        <input class="estado_actual" type="hidden"
                                                                            value="{{ $respuesta->estado_id }}">
                                                                        @if ($tutela->estadostutela_id < 6)
                                                                            <div
                                                                                class="col-9 row estado-pretension justify-content-end">
                                                                                <div class="col-3 d-flex mb-2">
                                                                                    <h6>Avance:</h6>
                                                                                </div>
                                                                                <select
                                                                                    class="custom-select rounded-0 estadoPretension col-4">
                                                                                    @foreach ($estados as $estado)
                                                                                        <option
                                                                                            value="{{ $estado->id }}"
                                                                                            {{ $respuesta->estadorepuestaimpugnacion->id == $estado->id ? 'selected' : '' }}>
                                                                                            {{ $estado->estado }} %
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <button type=""
                                                                                    class="btn btn-primary btn-estado-pretension col-2 mx-2"
                                                                                    data_url="{{ route('estado_respuesta_pretension_guardar') }}"
                                                                                    data_token="{{ csrf_token() }}"><span
                                                                                        style="font-size: 1em;"><i
                                                                                            class="far fa-save"></i></span></button>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="col-12 form-group mt-3">
                                                                        <div class="respuesta mt-2">
                                                                            @if ($respuesta->respuesta)
                                                                                {!! $respuesta->respuesta !!}
                                                                            @endif
                                                                        </div>
                                                                        <input class="id_respuesta" type="hidden"
                                                                            value="{{ $respuesta->id }}">
                                                                    </div>
                                                                    @if (isset($respuesta))
                                                                        @if (sizeOf($respuesta->documentos))
                                                                            <hr class="my-4">
                                                                            <div class="row respuestaAnexos">
                                                                                <div class="col-12">
                                                                                    <div class="col-12">
                                                                                        <h6>Anexos respuesta</h6>
                                                                                    </div>
                                                                                    <div class="col-12 table-responsive">
                                                                                        <table class="table table-light"
                                                                                            style="font-size: 0.8em;">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th scope="col">Nombre
                                                                                                    </th>
                                                                                                    <th scope="col">
                                                                                                        Descripción</th>
                                                                                                    <th scope="col">Archivo
                                                                                                    </th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                @foreach ($respuesta->documentos as $anexo)
                                                                                                    <tr>
                                                                                                        <td
                                                                                                            class="text-justify">
                                                                                                            {{ $anexo->titulo }}
                                                                                                        </td>
                                                                                                        <td
                                                                                                            class="text-justify">
                                                                                                            {{ $anexo->descripcion }}
                                                                                                        </td>
                                                                                                        <td><a href="{{ asset('documentos/tutelas/sentencias/resuelves/' . $anexo->url) }}"
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
                                                                        @endif
                                                                    @endif
                                                                    @if (isset($respuesta))
                                                                        @if (sizeOf($respuesta->historial))
                                                                            <hr class="mt-3">
                                                                            <h6 class="">Historial de
                                                                                respuestas</h6>
                                                                            <div class="row d-flex px-12 p-3">
                                                                                <div class="col-12 table-responsive">
                                                                                    <table class="table table-light"
                                                                                        style="font-size: 0.8em;">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th scope="col">Fecha</th>
                                                                                                <th scope="col">Empleado
                                                                                                </th>
                                                                                                <th scope="col">Historial
                                                                                                </th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            @foreach ($respuesta->historial as $historial)
                                                                                                <tr>
                                                                                                    <td>{{ $historial->created_at }}
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-justify">
                                                                                                        {{ $historial->empleado->nombre1 }}
                                                                                                        {{ $historial->empleado->apellido1 }}
                                                                                                    </td>
                                                                                                    <td
                                                                                                        class="text-justify">
                                                                                                        {{ strip_tags($historial->historial) }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                            @endforeach
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                        <hr class="mt-3">
                                                                        <div
                                                                            class="row d-flex px-12 p-3 mensaje-respuesta-pretension">
                                                                            <input class="id_respuesta_pretension"
                                                                                type="hidden"
                                                                                value="{{ $respuesta->id }}">
                                                                            <div
                                                                                class="container-mensaje-historial form-group col-12">
                                                                                <label for=""
                                                                                    class="">Agregar
                                                                                    Historial de respuesta</label>
                                                                                <textarea class="form-control mensaje-historial-respuesta-pretension" rows="3" placeholder="" required></textarea>
                                                                            </div>
                                                                            <div
                                                                                class="col-12 col-md-12 form-group d-flex">
                                                                                <button href=""
                                                                                    class="btn btn-primary px-4 guardarHistorialRespuestaPretension"
                                                                                    data_url="{{ route('historial_respuesta_pretension_guardar') }}"
                                                                                    data_token="{{ csrf_token() }}">Guardar
                                                                                    historial</button>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 1em;">
                                <div class="card-header">
                                    <h3 class="card-title font-weight-bold">Historial hechos</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: none;">
                                    <div class="row menu-card p-2">
                                        <div class="col-12 mb-2">
                                            <h5>Hechos</h5>
                                        </div>
                                        @foreach ($tutela->hechos->sortBy('consecutivo') as $key => $hecho)
                                            <div class="rounded border my-3">
                                                <div class="col-12 row my-3">
                                                    <div class="col-6 mb-3">
                                                        <h5 class="pl-4">Hecho # {{ $hecho->consecutivo }}
                                                        </h5>
                                                    </div>
                                                    <div class="col-6 row estado-hecho justify-content-end pb-3">
                                                        <div class="col-2 d-flex mb-2">
                                                            <h6>Avance: {{ $hecho->estadohecho->estado }} %</h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="text-justify">{{ $hecho->hecho }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h6 class="">Historial hecho</h6>
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
                                                                @foreach ($hecho->historialHechos as $historialHecho)
                                                                    <tr>
                                                                        <td>{{ $historialHecho->created_at }}</td>
                                                                        <td class="text-justify">
                                                                            {{ $historialHecho->empleado->nombre1 }}
                                                                            {{ $historialHecho->empleado->apellido1 }}
                                                                        </td>
                                                                        <td class="text-justify">
                                                                            {{ strip_tags($historialHecho->historial) }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row d-flex px-12 p-3 mensaje-hecho">
                                                    <input class="id_hecho" type="hidden"
                                                        value="{{ $hecho->id }}">
                                                    <div class="container-mensaje-historial form-group col-12">
                                                        <label for="" class="">Agregar Historial</label>
                                                        <textarea class="form-control mensaje-historial-hecho" rows="3" placeholder="" required></textarea>
                                                    </div>
                                                    <div class="col-12 col-md-12 form-group d-flex">
                                                        <button href="" class="btn btn-primary px-4 guardarHistorialHecho"
                                                            data_url="{{ route('historial_hecho_guardar') }}"
                                                            data_token="{{ csrf_token() }}">Guardar historial</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 1em;">
                                <div class="card-header">
                                    <h3 class="card-title font-weight-bold">Historial pretensiones</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: none;">
                                    <div class="row menu-card p-2">
                                        <div class="col-12 mb-2">
                                            <h5>Pretensiones</h5>
                                        </div>
                                        @foreach ($tutela->pretensiones->sortBy('consecutivo') as $key => $pretension)
                                            <div class="rounded border my-3">
                                                <div class="col-12 row my-3">
                                                    <div class="col-6 mb-3">
                                                        <h5 class="pl-4">Pretensión #
                                                            {{ $pretension->consecutivo }}</h5>
                                                    </div>
                                                    <div class="col-6 row estado-pretension justify-content-end pb-3">
                                                        <div class="col-2 d-flex mb-2">
                                                            <h6>Avance: {{ $pretension->estadopretension->estado }} %
                                                            </h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="text-justify">{{ $pretension->pretension }}</p>
                                                    </div>
                                                </div>
                                                <h6 class="">Historial pretensión</h6>
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
                                                                @foreach ($pretension->historialPretensiones as $historialPretension)
                                                                    <tr>
                                                                        <td>{{ $historialPretension->created_at }}</td>
                                                                        <td class="text-justify">
                                                                            {{ $historialPretension->empleado->nombre1 }}
                                                                            {{ $historialPretension->empleado->apellido1 }}
                                                                        </td>
                                                                        <td class="text-justify">
                                                                            {{ strip_tags($historialPretension->historial) }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row d-flex px-12 p-3 mensaje-pretension">
                                                    <input class="id_pretension" type="hidden"
                                                        value="{{ $pretension->id }}">
                                                    <div class="container-mensaje-historial form-group col-12">
                                                        <label for="" class="">Agregar Historial</label>
                                                        <textarea class="form-control mensaje-historial-pretension" rows="3" placeholder="" required></textarea>
                                                    </div>
                                                    <div class="col-12 col-md-12 form-group d-flex">
                                                        <button href=""
                                                            class="btn btn-primary px-4 guardarHistorialPretension"
                                                            data_url="{{ route('historial_pretension_guardar') }}"
                                                            data_token="{{ csrf_token() }}">Guardar historial</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 1em;">
                                <div class="card-header">
                                    <h3 class="card-title font-weight-bold">Gestión Hechos</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: none;">
                                    <div class="col-12 table-responsive d-flex justify-content-center">
                                        <table class="table table-striped col-12" style="font-size: 0.8em;">
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
                                                        @if ($hecho->empleado)
                                                            <td class="text-success font-weight-bold">
                                                                {{ $hecho->consecutivo }}</td>
                                                            <td class="text-success font-weight-bold">
                                                                {{ $hecho->empleado->nombre1 }}
                                                                {{ $hecho->empleado->apellido1 }}</td>
                                                            <td class="text-success font-weight-bold">
                                                                {{ $hecho->estadohecho->estado }}%</td>
                                                        @else
                                                            <td class="text-danger font-weight-bold">
                                                                {{ $hecho->consecutivo }}</td>
                                                            <td class="text-danger font-weight-bold">Sin asignar</td>
                                                            <td class="text-danger font-weight-bold">
                                                                {{ $hecho->estadohecho->estado }}%</td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr>
                                    <h5 class="">Reasignación Hechos</h5>
                                    <div class="row d-flex px-4">
                                        <div class="col-12 col-md-12 form-group mt-3">
                                            <div class="form-check mb-4">
                                                <input type="checkbox" class="form-check-input check-todos-hechos">
                                                <label class="form-check-label"><strong>Seleccionar todos los
                                                        hechos</strong></label>
                                            </div>
                                            @foreach ($tutela->hechos->sortBy('consecutivo') as $key => $hecho)
                                                <div class="form-check form-check-inline">
                                                    @if ($hecho->estadohecho->estado == 0)
                                                        <input type="checkbox" class="form-check-input select-hecho"
                                                            value="{{ $hecho->id }}">
                                                        <label
                                                            class="form-check-label"><strong>#{{ $hecho->consecutivo }}</strong></label>
                                                    @else
                                                        <input type="checkbox" class="form-check-input select-hecho"
                                                            disabled>
                                                        <label
                                                            class="form-check-label"><strong>#{{ $hecho->consecutivo }}</strong></label>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-12 col-md-5 form-group">
                                            <label for="">Cargo</label>
                                            <select class="custom-select rounded-0 cargo" required=""
                                                data_url="{{ route('cargar_cargos') }}"
                                                data_url2="{{ route('cargar_funcionarios') }}">
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-5 form-group">
                                            <label for="">Funcionario</label>
                                            <select class="custom-select rounded-0 funcionario" required="">
                                                <option value="">--Seleccione--</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-4 form-group d-flex align-items-end">
                                            <button href="" class="btn btn-primary mx-2 px-4 asignacion_hecho_guardar"
                                                data_url="{{ route('asignacion_hecho_guardar') }}"
                                                data_token="{{ csrf_token() }}">Asignar hecho</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 1em;">
                                <div class="card-header">
                                    <h3 class="card-title font-weight-bold">Gestión Pretensiones</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: none;">
                                    <div class="col-12 table-responsive d-flex justify-content-center">
                                        <table class="table table-striped col-12" style="font-size: 0.8em;">
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
                                                        @if ($pretension->empleado)
                                                            <td class="text-success font-weight-bold">
                                                                {{ $pretension->consecutivo }}</td>
                                                            <td class="text-success font-weight-bold">
                                                                {{ $pretension->empleado->nombre1 }}
                                                                {{ $pretension->empleado->apellido1 }}</td>
                                                            <td class="text-success font-weight-bold">
                                                                {{ $pretension->estadopretension->estado }}%</td>
                                                        @else
                                                            <td class="text-danger font-weight-bold">
                                                                {{ $pretension->consecutivo }}</td>
                                                            <td class="text-danger font-weight-bold">Sin asignar</td>
                                                            <td class="text-danger font-weight-bold">
                                                                {{ $pretension->estadopretension->estado }}%</td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr>
                                    <h5 class="">Reasignación Pretensiones</h5>
                                    <div class="row d-flex px-4">
                                        <div class="col-12 col-md-12 form-group mt-3">
                                            <div class="form-check mb-4">
                                                <input type="checkbox" class="form-check-input check-todos-pretensiones">
                                                <label class="form-check-label"><strong>Seleccionar todos las
                                                        pretensines</strong></label>
                                            </div>
                                            @foreach ($tutela->pretensiones->sortBy('consecutivo') as $key => $pretension)
                                                <div class="form-check form-check-inline">
                                                    @if ($pretension->estadopretension->estado == 0)
                                                        <input type="checkbox" class="form-check-input select-pretension"
                                                            value="{{ $pretension->id }}">
                                                        <label
                                                            class="form-check-label"><strong>#{{ $pretension->consecutivo }}</strong></label>
                                                    @else
                                                        <input type="checkbox" class="form-check-input select-pretension"
                                                            disabled>
                                                        <label
                                                            class="form-check-label"><strong>#{{ $pretension->consecutivo }}</strong></label>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-12 col-md-5 form-group">
                                            <label for="">Cargo</label>
                                            <select class="custom-select rounded-0 cargo" required=""
                                                data_url="{{ route('cargar_cargos') }}"
                                                data_url2="{{ route('cargar_funcionarios') }}">
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-5 form-group">
                                            <label for="">Funcionario</label>
                                            <select class="custom-select rounded-0 funcionario" required="">
                                                <option value="">--Seleccione--</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-4 form-group d-flex align-items-end">
                                            <button href="" class="btn btn-primary mx-2 px-4 asignacion_pretension_guardar"
                                                data_url="{{ route('asignacion_pretension_guardar') }}"
                                                data_token="{{ csrf_token() }}">Asignar pretensión</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 1em;">
                                <div class="card-header">
                                    <h3 class="card-title font-weight-bold">Historial de tareas</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: none;">
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
                                                                <td class="text-justify">
                                                                    {{ $historial->tarea->tarea }}</td>
                                                            @else
                                                                <td class="text-justify">ADMINISTRADOR</td>
                                                            @endif
                                                            <td class="text-justify">
                                                                {{ $historial->empleado->nombre1 }}
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
                                        <input class="id_tarea" type="hidden" value="2">
                                        <div class="container-mensaje-historial-tarea form-group col-12">
                                            <label for="" class="">Agregar Historial</label>
                                            <textarea class="form-control mensaje-historial-tarea" rows="3" placeholder="" required></textarea>
                                        </div>
                                        <div
                                            class="col-12 col-md-12 form-group d-flex align-items-end justify-content-end">
                                            <button href="" class="btn btn-primary mx-2 px-4 guardarHistorialTarea"
                                                data_url="{{ route('historial_tarea_tutela_guardar') }}"
                                                data_token="{{ csrf_token() }}">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if (($tutela->hechos->sum('estado_id') / $tutela->hechos->count() / 11) * 100 == 100)
                                @if (($tutela->pretensiones->sum('estado_id') / $tutela->pretensiones->count() / 11) * 100 == 100)
                                    <div class="card card-outline card-primary collapsed-card mx-1 py-2"
                                        style="font-size: 1em;">
                                        <div class="card-header">
                                            <h3 class="card-title font-weight-bold">Hechos de la defensa</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body" style="display: none;">
                                            <div class="rounded border my-3 p-2 px-4">
                                                <h5 class="mt-2">Hechos de la defensa</h5>
                                                @if (sizeof($tutela->resuelves))
                                                    <div class="row d-flex px-12 p-3">
                                                        <div class="col-12 table-responsive">
                                                            <table class="table table-light" style="font-size: 0.8em;">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Orden</th>
                                                                        <th scope="col">Fecha</th>
                                                                        <th scope="col">Empleado</th>
                                                                        <th scope="col">Hecho de defensa</th>
                                                                        <th scope="col">Opciones</th>
                                                                    </tr>
                                                                </thead>
                                                                @php
                                                                    $totalResuelves = $tutela->resuelves->count();
                                                                @endphp
                                                                <tbody class="orden-resuelve">
                                                                    @foreach ($tutela->resuelves as $key => $resuelve)
                                                                        <tr>
                                                                            <td>{{ $resuelve->orden }}</td>
                                                                            <td>{{ $resuelve->created_at }}</td>
                                                                            <td class="text-justify">
                                                                                {{ $resuelve->empleado->nombre1 }}
                                                                                {{ $resuelve->empleado->apellido1 }}
                                                                            </td>
                                                                            <td class="text-justify contenido-resuelve">
                                                                                {{ strip_tags($resuelve->resuelve) }}
                                                                                <input type="hidden"
                                                                                    value="{{ $resuelve->resuelve }}">
                                                                            </td>
                                                                            <td class="text-justify">
                                                                                <div class="col-12 d-flex">
                                                                                    <button type="button"
                                                                                        class="btn btn-warning btn-xs btn-sombra editarResuelveTutela py-1 px-2 mx-1 col-4"
                                                                                        data-toggle="modal"
                                                                                        data-target=".bd-resuelve"
                                                                                        value="{{ $resuelve->id }}"><i
                                                                                            class="fas fa-edit editarResuelveTutela-i"></i></button>
                                                                                    <button type="button"
                                                                                        class="btn btn-danger btn-xs btn-sombra eliminarResuelveTutela py-1 px-2 mx-1 col-4"
                                                                                        data_url="{{ route('historial_resuelve_tutela_eliminar') }}"
                                                                                        data_token="{{ csrf_token() }}"
                                                                                        value="{{ $resuelve->id }}"><i
                                                                                            class="far fa-trash-alt"></i></button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                                <tbody class="editar-orden-resuelve d-none">
                                                                    @foreach ($tutela->resuelves as $key => $resuelve)
                                                                        <tr>
                                                                            <td class="td-orden">
                                                                                <select class="select-orden">
                                                                                    @for ($i = 1; $i < $totalResuelves + 1; $i++)
                                                                                        <option
                                                                                            value="{{ $i }}"
                                                                                            {{ $i == $resuelve->orden ? 'selected' : '' }}>
                                                                                            {{ $i }}</option>
                                                                                    @endfor
                                                                                </select>
                                                                            </td>
                                                                            <td>{{ $resuelve->created_at }}</td>
                                                                            <td class="text-justify">
                                                                                {{ $resuelve->empleado->nombre1 }}
                                                                                {{ $resuelve->empleado->apellido1 }}
                                                                            </td>
                                                                            <td class="text-justify contenido-resuelve">
                                                                                {{ strip_tags($resuelve->resuelve) }}
                                                                            </td>
                                                                            <td class="text-justify">
                                                                                <div class="col-12 d-flex">
                                                                                    <button type="button"
                                                                                        class="btn btn-warning btn-xs btn-sombra editarResuelveTutela py-1 px-2 mx-1 col-4"
                                                                                        value="{{ $resuelve->id }}"
                                                                                        disabled><i
                                                                                            class="fas fa-edit editarResuelveTutela-i"></i></button>
                                                                                    <button type="button"
                                                                                        class="btn btn-danger btn-xs btn-sombra eliminarResuelveTutela py-1 px-2 mx-1 col-4"
                                                                                        value="{{ $resuelve->id }}"
                                                                                        disabled><i
                                                                                            class="far fa-trash-alt"></i></button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                            <div class="row d-flex px-12 p-3">
                                                                <div class="col-12 col-md-12 form-group d-flex">
                                                                    <button href=""
                                                                        class="btn btn-primary mx-2 px-4 btn-ordenar">Ordenar</button>
                                                                    <button href=""
                                                                        class="btn btn-primary mx-2 px-4 btn-ordenar-guardar d-none"
                                                                        data_url="{{ route('resuelve_orden_tutela_guardar') }}"
                                                                        data_token="{{ csrf_token() }}">Guardar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal fade bd-resuelve" tabindex="-1" role="dialog"
                                                            aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Editar resuelve</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <textarea class="form-control mensaje-resuelve-editar mt-2" rows="3" cols="40" placeholder="" required></textarea>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-primary editarResuelveTutelaGuardar"
                                                                            data_url="{{ route('historial_resuelve_tutela_editar') }}"
                                                                            data_token="{{ csrf_token() }}">Guardar</button>
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Cerrar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                @endif
                                                <div class="col-12 d-flex row">
                                                    <div class="container-mensaje-resuelve form-group col-12 row">
                                                        <label for="" class="col-10">Nuevo hecho</label>
                                                        <textarea class="form-control mensaje-resuelve mt-2" rows="3" placeholder="" required></textarea>
                                                    </div>
                                                    <div class="row d-flex px-12 p-1">
                                                        <div class="col-12 col-md-12 form-group d-flex">
                                                            <button href=""
                                                                class="btn btn-primary mx-2 px-4 btn-tutela-resuelve"
                                                                data_url="{{ route('historial_resuelve_tutela_guardar') }}"
                                                                data_token="{{ csrf_token() }}">Crear hecho</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif

                            @if (($tutela->hechos->sum('estado_id') / $tutela->hechos->count() / 11) * 100 == 100)
                                @if (($tutela->pretensiones->sum('estado_id') / $tutela->pretensiones->count() / 11) * 100 == 100)
                                    {{-- @if (sizeOf($pqr->anexos))
                                        <div class="rounded border m-3 p-2">
                                            <h5 class="">Historial de respuesta </h5>
                                            <div class="row d-flex px-12 p-3">
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
                                                            @foreach ($pqr->anexos as $anexo)
                                                                <tr>
                                                                    <td>{{ $anexo->created_at }}</td>
                                                                    <td class="text-justify">{{ $anexo->empleado->nombre1 }} {{ $anexo->empleado->apellido1 }}</td>
                                                                    <td class="text-justify">{{ $anexo->tarea->tarea }}</td>
                                                                    @if ($anexo->tipo_respuesta == 0)
                                                                        <td>Respuesta PQR</td>
                                                                    @elseif($anexo->tipo_respuesta == 1)
                                                                        <td>Respuesta aclaración</td>
                                                                    @elseif($anexo->tipo_respuesta == 2)
                                                                        <td>Respuesta reposición</td>
                                                                    @elseif($anexo->tipo_respuesta == 3)
                                                                        <td>Respuesta apelación</td>
                                                                    @endif
                                                                    <td class="text-justify"><a href="{{ asset('documentos/tareas/' . $anexo->url) }}" target="_blank" rel="noopener noreferrer"><i class="fa fa-download" aria-hidden="true"></i></a></td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    @endif - --}}
                                    <div class="card card-outline card-primary collapsed-card mx-1 py-2"
                                        style="font-size: 1em;">
                                        <div class="card-header">
                                            <h3 class="card-title font-weight-bold">Proyectar</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body" style="display: none;">
                                            <div class="rounded border m-3 p-2">
                                                <h5 class="mt-2">Proyectar</h5>
                                                <div class="col-12 d-flex row pqr-anexo">
                                                    <div class="my-2 col-12 d-flex">
                                                        <h6 class="mr-2">Documento de respuesta</h6>
                                                        <strong class="mx-2">
                                                            <a href="{{ route('respuesta_tutela', ['id' => $tutela->id]) }}"
                                                                target="_blank" rel="noopener noreferrer">
                                                                <i class="fas fa-eye"></i> Vista previa</a>
                                                        </strong>
                                                    </div>
                                                    <div class="container-mensaje-historial-tarea form-group col-12">
                                                        <label for="" class="">Agregar Historial</label>
                                                        <textarea class="form-control mensaje-historial-tarea" rows="3" placeholder="" required></textarea>
                                                    </div>
                                                    <div class="row d-flex px-12 p-3">
                                                        <div class="col-12 col-md-12 form-group d-flex">
                                                            <button href="" class="btn btn-primary mx-2 px-4 btn-tutela"
                                                                data_url2="{{ route('historial_tarea_tutela_guardar') }}"
                                                                data_url3="{{ route('cambiar_estado_tareas_tutela_guardar') }}"
                                                                data_token="{{ csrf_token() }}">Enviar a
                                                                revisión</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif

                            @if ($tutela->estadostutela_id == 5)
                                <div class="card card-outline card-primary collapsed-card mx-1 py-2"
                                    style="font-size: 1em;">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold">Gestión Sentencia en primera Instancia</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                        <div class="col-12">
                                            @php
                                                $primeraInstancia = $tutela->primeraInstancia;
                                            @endphp
                                            <div class="col-12 d-flex justify-content-center">
                                                <div class="row">
                                                    <div class="col-12 mt-3 mb-4">
                                                        <h6>Resuleves Primera Instancia</h6>
                                                    </div>
                                                    @foreach ($primeraInstancia->resuelvesPrimeraInstancia as $resuelve)
                                                        @if ($resuelve->resuelve != null)
                                                            <?php $tipo = 'detalle'; ?>
                                                        @else
                                                            <?php $tipo = 'cantidad'; ?>
                                                        @endif
                                                    @endforeach
                                                    @if ($tipo == 'detalle')
                                                        <div class="col-12 mb-4">
                                                            <div class="row">
                                                                <div class="col-12 table-responsive">
                                                                    <table class="table table-striped table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Numeracion</th>
                                                                                <th>Resuelve</th>
                                                                                <th>Tiempo de cumplimiento</th>
                                                                                <th>Fecha de Cumplimiento</th>
                                                                                <th>Sentido</th>
                                                                                <th></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($primeraInstancia->resuelvesPrimeraInstancia as $resuelve)
                                                                                <tr>
                                                                                    <td scope="row">
                                                                                        {{ $resuelve->numeracion }}
                                                                                    </td>
                                                                                    <td>{{ $resuelve->resuelve }}
                                                                                    </td>
                                                                                    <td>
                                                                                        @if ($resuelve->dias != null)
                                                                                            {{ $resuelve->dias . ' dias ' }}
                                                                                        @endif
                                                                                        @if ($resuelve->horas != null)
                                                                                            {{ $resuelve->horas . ' horas ' }}
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>
                                                                                        @if ($resuelve->dias != null)
                                                                                            {{ date('Y-m-d', strtotime($resuelve->sentencia->fecha_notificacion . '+ ' . ($resuelve->dias + 1) . ' days')) }}
                                                                                        @endif
                                                                                        @if ($resuelve->horas != null)
                                                                                            {{ date('Y-m-d', strtotime($resuelve->sentencia->fecha_notificacion . '+ 1 days')) }}
                                                                                        @endif
                                                                                    </td>
                                                                                    <td style="min-width: 150px;">
                                                                                        <div class="col-12 form-group">
                                                                                            <select id="sentido"
                                                                                                class="form-control form-control-sm sentidoResuelve"
                                                                                                name="sentido"
                                                                                                id_resuelve="{{ $resuelve->id }}"
                                                                                                data_url="{{ route('cambiosentidoresuelve', ['id' => $resuelve->id]) }}">
                                                                                                @if ($resuelve->sentido == 'Favorable')
                                                                                                    <option
                                                                                                        value="Favorable"
                                                                                                        selected>
                                                                                                        Favorable
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="Desfavorable">
                                                                                                        Desfavorable
                                                                                                    </option>
                                                                                                @else
                                                                                                    <option
                                                                                                        value="Favorable">
                                                                                                        Favorable
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="Desfavorable"
                                                                                                        selected>
                                                                                                        Desfavorable
                                                                                                    </option>
                                                                                                @endif

                                                                                            </select>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        @if ($resuelve->sentido == 'Favorable')
                                                                                            <div class="form-check">
                                                                                                <input
                                                                                                    class="form-check-input crearimpugnacion"
                                                                                                    type="checkbox" value=""
                                                                                                    id="gestion"
                                                                                                    name="gestion"
                                                                                                    id_resuelve="{{ $resuelve->id }}"
                                                                                                    data_url="{{ route('crearimpugnacion', ['id' => $resuelve->id]) }}">
                                                                                                <label
                                                                                                    class="form-check-label"
                                                                                                    for="flexCheckChecked">
                                                                                                    Impugnar
                                                                                                </label>
                                                                                            </div>
                                                                                        @else
                                                                                            @if ($resuelve->gestion == '1')
                                                                                                <div
                                                                                                    class="form-check">
                                                                                                    <input
                                                                                                        class="form-check-input crearimpugnacion"
                                                                                                        type="checkbox"
                                                                                                        value=""
                                                                                                        id="gestion"
                                                                                                        name="gestion"
                                                                                                        id_resuelve="{{ $resuelve->id }}"
                                                                                                        data_url="{{ route('crearimpugnacion', ['id' => $resuelve->id]) }}"
                                                                                                        checked>
                                                                                                    <label
                                                                                                        class="form-check-label"
                                                                                                        for="flexCheckChecked">
                                                                                                        Gestionar
                                                                                                        Impugnación
                                                                                                    </label>
                                                                                                </div>
                                                                                            @else
                                                                                                <div
                                                                                                    class="form-check">
                                                                                                    <input
                                                                                                        class="form-check-input crearimpugnacion"
                                                                                                        type="checkbox"
                                                                                                        value=""
                                                                                                        id="gestion"
                                                                                                        name="gestion"
                                                                                                        id_resuelve="{{ $resuelve->id }}"
                                                                                                        data_url="{{ route('crearimpugnacion', ['id' => $resuelve->id]) }}">
                                                                                                    <label
                                                                                                        class="form-check-label"
                                                                                                        for="flexCheckChecked">
                                                                                                        Gestionar
                                                                                                        Impugnación
                                                                                                    </label>
                                                                                                </div>
                                                                                            @endif
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="col-12 mb-4">
                                                            <div class="row">
                                                                <div class="col-12 table-responsive">
                                                                    @csrf
                                                                    <table class="table table-striped table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Numeracion</th>
                                                                                <th>Tiempo de cumplimiento</th>
                                                                                <th>Fecha de Cumplimiento</th>
                                                                                <th>Sentido</th>
                                                                                <th></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($primeraInstancia->resuelvesPrimeraInstancia as $resuelve)
                                                                                <tr>
                                                                                    <td scope="row">
                                                                                        {{ $resuelve->numeracion }}
                                                                                    </td>
                                                                                    <td>
                                                                                        @if ($resuelve->dias != null)
                                                                                            {{ $resuelve->dias . ' dias ' }}
                                                                                        @endif
                                                                                        @if ($resuelve->horas != null)
                                                                                            {{ $resuelve->horas . ' horas ' }}
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>
                                                                                        @if ($resuelve->dias != null)
                                                                                            {{ date('Y-m-d', strtotime($resuelve->sentencia->fecha_notificacion . '+ ' . ($resuelve->dias + 1) . ' days')) }}
                                                                                        @endif
                                                                                        @if ($resuelve->horas != null)
                                                                                            {{ date('Y-m-d', strtotime($resuelve->sentencia->fecha_notificacion . '+ 1 days')) }}
                                                                                        @endif
                                                                                    </td>
                                                                                    <td style="min-width: 150px;">
                                                                                        <div class="col-12 form-group">
                                                                                            <select id="sentido"
                                                                                                class="form-control form-control-sm sentidoResuelve"
                                                                                                name="sentido1"
                                                                                                id_resuelve="{{ $resuelve->id }}"
                                                                                                data_url="{{ route('cambiosentidoresuelve', ['id' => $resuelve->id]) }}">
                                                                                                @if ($resuelve->sentido == 'Favorable')
                                                                                                    <option
                                                                                                        value="Favorable"
                                                                                                        selected>
                                                                                                        Favorable
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="Desfavorable">
                                                                                                        Desfavorable
                                                                                                    </option>
                                                                                                @else
                                                                                                    <option
                                                                                                        value="Favorable">
                                                                                                        Favorable
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="Desfavorable"
                                                                                                        selected>
                                                                                                        Desfavorable
                                                                                                    </option>
                                                                                                @endif

                                                                                            </select>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        @if ($resuelve->sentido == 'Favorable')
                                                                                            <div class="form-check">
                                                                                                <input
                                                                                                    class="form-check-input crearimpugnacion"
                                                                                                    type="checkbox" value=""
                                                                                                    id="gestion"
                                                                                                    name="gestion"
                                                                                                    id_resuelve="{{ $resuelve->id }}"
                                                                                                    data_url="{{ route('crearimpugnacion', ['id' => $resuelve->id]) }}">
                                                                                                <label
                                                                                                    class="form-check-label"
                                                                                                    for="flexCheckChecked">
                                                                                                    Impugnar
                                                                                                </label>
                                                                                            </div>
                                                                                        @else
                                                                                            @if ($resuelve->gestion == '1')
                                                                                                <div
                                                                                                    class="form-check">
                                                                                                    <input
                                                                                                        class="form-check-input crearimpugnacion"
                                                                                                        type="checkbox"
                                                                                                        value=""
                                                                                                        id="gestion"
                                                                                                        name="gestion"
                                                                                                        id_resuelve="{{ $resuelve->id }}"
                                                                                                        data_url="{{ route('crearimpugnacion', ['id' => $resuelve->id]) }}"
                                                                                                        checked>
                                                                                                    <label
                                                                                                        class="form-check-label"
                                                                                                        for="flexCheckChecked">
                                                                                                        Gestionar
                                                                                                        Impugnación
                                                                                                    </label>
                                                                                                </div>
                                                                                            @else
                                                                                                <div
                                                                                                    class="form-check">
                                                                                                    <input
                                                                                                        class="form-check-input crearimpugnacion"
                                                                                                        type="checkbox"
                                                                                                        value=""
                                                                                                        id="gestion"
                                                                                                        name="gestion"
                                                                                                        id_resuelve="{{ $resuelve->id }}"
                                                                                                        data_url="{{ route('crearimpugnacion', ['id' => $resuelve->id]) }}">
                                                                                                    <label
                                                                                                        class="form-check-label"
                                                                                                        for="flexCheckChecked">
                                                                                                        Gestionar
                                                                                                        Impugnación
                                                                                                    </label>
                                                                                                </div>
                                                                                            @endif
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 table-responsive d-flex justify-content-center">
                                            <table class="table table-striped col-12" style="font-size: 0.8em;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Resuelve #</th>
                                                        <th scope="col">Funcionario</th>
                                                        <th scope="col">Porcentaje</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($tutela->primeraInstancia->impugnacionesinternas->sortBy('consecutivo') as $key => $impugnacion)
                                                        <tr>
                                                            @if ($impugnacion->empleado)
                                                                <td class="text-success font-weight-bold">
                                                                    {{ $impugnacion->consecutivo }}</td>
                                                                <td class="text-success font-weight-bold">
                                                                    {{ $impugnacion->empleado->nombre1 }}
                                                                    {{ $impugnacion->empleado->apellido1 }}</td>
                                                                <td class="text-success font-weight-bold">
                                                                    {{ $impugnacion->estado->estado }}%</td>
                                                            @else
                                                                <td class="text-danger font-weight-bold">
                                                                    {{ $impugnacion->consecutivo }}</td>
                                                                <td class="text-danger font-weight-bold">Sin asignar</td>
                                                                <td class="text-danger font-weight-bold">
                                                                    {{ $impugnacion->estado->estado }}%</td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <hr>
                                        <h5 class="">Reasignación Impugnación</h5>
                                        <div class="row d-flex px-4">
                                            <div class="col-12 col-md-12 form-group mt-3">
                                                <div class="form-check mb-4">
                                                    <input type="checkbox" class="form-check-input check-todos-hechos">
                                                    <label class="form-check-label"><strong>Seleccionar todos las
                                                            impugnaciones</strong></label>
                                                </div>
                                                @foreach ($tutela->primeraInstancia->impugnacionesinternas->sortBy('consecutivo') as $key => $impugnacion)
                                                    <div class="form-check form-check-inline">
                                                        @if ($impugnacion->estado->estado == 0)
                                                            <input type="checkbox" class="form-check-input select-hecho"
                                                                value="{{ $impugnacion->id }}">
                                                            <label
                                                                class="form-check-label"><strong>#{{ $impugnacion->consecutivo }}</strong></label>
                                                        @else
                                                            <input type="checkbox" class="form-check-input select-hecho"
                                                                disabled>
                                                            <label
                                                                class="form-check-label"><strong>#{{ $impugnacion->consecutivo }}</strong></label>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="col-12 col-md-5 form-group">
                                                <label for="">Cargo</label>
                                                <select class="custom-select rounded-0 cargo" required=""
                                                    data_url="{{ route('cargar_cargos') }}"
                                                    data_url2="{{ route('cargar_funcionarios') }}">
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-5 form-group">
                                                <label for="">Funcionario</label>
                                                <select class="custom-select rounded-0 funcionario" required="">
                                                    <option value="">--Seleccione--</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-4 form-group d-flex align-items-end">
                                                <button href="" class="btn btn-primary mx-2 px-4 asignacion_hecho_guardar"
                                                    data_url="{{ route('asignacion_hecho_guardar') }}"
                                                    data_token="{{ csrf_token() }}">Asignar hecho</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <input class="id_tarea" type="hidden" value="2">
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
    <script src="{{ asset('js/intranet/tutela/gestion_asignacion_proyecta.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endsection
<!-- ************************************************************* -->
