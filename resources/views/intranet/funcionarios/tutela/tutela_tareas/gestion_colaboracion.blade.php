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
    @php
    $recursoValidacion = 0;
    $plazoRecurso = 0;
    @endphp
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
                        <h3 class="card-title" id="pruebaPegar">Gestión a Tutela Número de radicado:
                            <strong>{{ $tutela->radicado }}</strong>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="col-12 rounded border mb-3 p-2">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    Número de radicado:
                                    <strong>{{ $tutela->radicado }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Fecha de notificación: <strong>{{ $tutela->fecha_notificacion}}</strong>
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
                        <div class="col-12">
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
                                            @if($tutela->dias_termino)
                                                <div class="col-12">
                                                    <p class="text-justify"><strong>Días:</strong> {{ $tutela->dias_termino }}</p>
                                                </div>
                                            @endif
                                            @if($tutela->horas_termino)
                                                <div class="col-12">
                                                    <p class="text-justify"><strong>Horas:</strong> {{ $tutela->horas_termino }}</p>
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
                                                                <td class="text-justify">{{ $tutela->titulo_admisorio }}</td>
                                                                <td class="text-justify">{{ $tutela->descripcion_admisorio }}</td>
                                                                <td><a href="{{ asset('documentos/autoadmisorios/' . $tutela->url_admisorio) }}"
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
                                                        <p class="text-justify"><strong>Descripción:</strong> {{ $tutela->text_medida_cautelar }}</p>
                                                    </div>
                                                    @if($tutela->dias_medida_cautelar)
                                                        <div class="col-12">
                                                            <p class="text-justify"><strong>Días:</strong> {{ $tutela->dias_medida_cautelar }}</p>
                                                        </div>
                                                    @endif
                                                    @if($tutela->horas_medida_cautelar)
                                                        <div class="col-12">
                                                            <p class="text-justify"><strong>Horas:</strong> {{ $tutela->horas_medida_cautelar }}</p>
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
                                            @foreach ( $tutela->accions as $accion)
                                                <div class="col-12 row">
                                                    <div class="col-6">
                                                        @if($accion->tipo_accion == 'Accionante')
                                                            <div class="col-12 mb-3">
                                                                <h6 class="pl-4">Accionante</h6>
                                                            </div>
                                                        @else
                                                            <div class="col-12 mb-3">
                                                                <h6 class="pl-4">Accionado</h6>
                                                            </div>
                                                        @endif
                                                        <div class="col-12">
                                                            <p class="text-justify"><strong>Nombre:</strong> {{ $accion->nombres_accion }}  {{ $accion->apellidos_accion }}</p>
                                                        </div>
                                                        <div class="col-12">
                                                            <p class="text-justify"><strong>Tipo Persona:</strong> {{ $accion->tipo_persona_accion }}</p>
                                                        </div>
                                                        <div class="col-12">
                                                            <p class="text-justify"><strong>Tipo Documento:</strong> {{ $accion->docutipos_id_accion }}</p>
                                                        </div>
                                                        <div class="col-12">
                                                            <p class="text-justify"><strong>Número Documento:</strong> {{ $accion->numero_documento_accion }}</p>
                                                        </div>
                                                        <div class="col-12">
                                                            <p class="text-justify"><strong>Teléfono:</strong> {{ $accion->telefono_accion }}</p>
                                                        </div>
                                                        <div class="col-12">
                                                            <p class="text-justify"><strong>Dirección:</strong> {{ $accion->direccion_accion }}</p>
                                                        </div>
                                                        <div class="col-12">
                                                            <p class="text-justify"><strong>Correo:</strong> {{ $accion->correo_accion }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        @if($accion->nombre_apoderado)
                                                            <div class="col-12  mb-3">
                                                                <h6 class="pl-4">Apoderado</h6>
                                                            </div>
                                                            <div class="col-12">
                                                                <p class="text-justify"><strong>Nombre:</strong> {{ $accion->nombre_apoderado }}</p>
                                                            </div>
                                                            <div class="col-12">
                                                                <p class="text-justify"><strong>Tipo Documento:</strong> {{ $accion->docutipos_id_apoderado }}</p>
                                                            </div>
                                                            <div class="col-12">
                                                                <p class="text-justify"><strong>Número Documento:</strong> {{ $accion->numero_documento_apoderado }}</p>
                                                            </div>
                                                            <div class="col-12">
                                                                <p class="text-justify"><strong>Tarjeta Profesional:</strong> {{ $accion->tarjeta_profesional_apoderado }}</p>
                                                            </div>
                                                            <div class="col-12">
                                                                <p class="text-justify"><strong>Teléfono:</strong> {{ $accion->telefono_apoderado }}</p>
                                                            </div>
                                                            <div class="col-12">
                                                                <p class="text-justify"><strong>Dirección:</strong> {{ $accion->direccion_apoderado }}</p>
                                                            </div>
                                                            <div class="col-12">
                                                                <p class="text-justify"><strong>Correo:</strong> {{ $accion->correo_apoderado }}</p>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <hr>
                                                </div>
                                            @endforeach  
                                        </div>
                                    </div>
                                    @if(sizeOf($tutela->anexostutela))
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
                                                    <table class="table table-light"  style="font-size: 0.8em;" >
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
                                    @if(sizeOf($tutela->argumentos))
                                        <div class="row menu-card p-2">
                                            <div class="col-12 mb-2">
                                                <h5>Argumentos</h5>
                                            </div>
                                            @foreach ( $tutela->argumentos as $key => $argumento)
                                                <div class="col-12 row t">
                                                    <div class="col-12 mb-3">
                                                        <h6 class="pl-4">Argumento # {{$key + 1}}</h6>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="text-justify">{{ $argumento->argumento }}</p>
                                                    </div>
                                                </div>
                                            @endforeach  
                                        </div>
                                        <hr>
                                    @endif
                                    @if(sizeOf($tutela->pruebas))
                                        <div class="row menu-card p-2">
                                            <div class="col-12 mb-2">
                                                <h5>Pruebas</h5>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="col-12 table-responsive">
                                                        <table class="table table-light"  style="font-size: 0.8em;" >
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
                                    @if(sizeOf($tutela->motivos))
                                        <div class="row menu-card p-2">
                                            <div class="col-12 mb-2">
                                                <h5>Motivos</h5>
                                            </div>
                                            @foreach ( $tutela->motivos as $key => $motivo)
                                                <div class="col-6 row">
                                                    <div class="col-12 mb-3">
                                                        <h6 class="pl-4">Motivo # {{$key + 1}}</h6>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Motivo:</strong> {{ $motivo->motivo_tutela }}</p>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Sub - motivo:</strong> {{ $motivo->sub_motivo_tutela }}</p>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Tutela sobre:</strong> {{ $motivo->tipo_tutela }}</p>
                                                    </div>
                                                </div>
                                            @endforeach  
                                        </div>
                                        <hr>
                                    @endif
                                </div>
                            </div>

                            <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 1em;">
                                <div class="card-header">
                                    <h3 class="card-title font-weight-bold">Respuestas hechos</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: none;">
                                    @if(sizeOf($tutela->hechos))
                                        <div class="col-12 row mb-2">
                                            @php
                                                $validacionHechos = false;
                                                foreach ($tutela->hechos->where('empleado_id', session('id_usuario')) as $hecho) {
                                                    if(!sizeOf($hecho->relacionesHechos)){
                                                        $validacionHechos = true;
                                                        break;
                                                    }
                                                }
                                            @endphp
                                            @if($validacionHechos)
                                                <div class="rounded border my-3 p-3">
                                                    <div class="col-12 col-md-5 my-3">
                                                        <h5>Respuestas hechos</h5>
                                                    </div>
                                                    <hr>
                                                    <div class="col-12 bloque-seleccion-hechos">
                                                        <div class="form-check my-4 text-right">
                                                            <input type="checkbox" class="form-check-input check-todos-hechos">
                                                            <label class="form-check-label"><strong>Seleccionar todos los hechos</strong></label>
                                                        </div>
                                                        @foreach ( $tutela->hechos->sortBy('consecutivo') as $key => $hecho)
                                                            @if (session('id_usuario') == $hecho->empleado_id && !sizeOf($hecho->relacionesHechos))
                                                                <div class="form-check my-2">
                                                                    <input type="checkbox" class="form-check-input select-hecho" value="{{$hecho->id}}">
                                                                    <label class="form-check-label"><strong>#{{$hecho->consecutivo}}</strong> - {{$hecho->hecho}}</label>
                                                                </div>
                                                                <hr>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <div class="row col-12">
                                                        <div class="col-12 col-md-5">
                                                            <h5>Respuesta</h5>
                                                        </div>
                                                        <div class="col-12 col-md-7 row estado-hechos justify-content-end">
                                                            @if ($tutela->estadostutela_id < 4)
                                                            <div class="col-9 row estado-hechos justify-content-end">
                                                                <div class="col-3 d-flex mb-2">
                                                                    <h6>Avance:</h6>
                                                                </div>
                                                                <select class="custom-select rounded-0 estadoHecho col-4">
                                                                    @foreach ($estados as $estado)
                                                                        <option value="{{ $estado->id }}">{{ $estado->estado }} %</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            @endif
                                                            <div class="col-3 row modal-hecho">
                                                                <button type="" class="btn btn-success col-12 mx-2" data-toggle="modal"
                                                                    data-target=".buscar-hecho"><span
                                                                        style="font-size: 1em;"><i class="fas fa-search"></i>
                                                                        Wiku</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade buscar-hecho" tabindex="-1" role="dialog"
                                                        data-value="hecho" aria-labelledby="myLargeModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Buscar En
                                                                        Wiku</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card-body">
                                                                        <ul class="nav nav-pills mb-3" id="pills-tab"
                                                                            role="tablist">
                                                                            <li class="nav-item" role="presentation">
                                                                                <button class="nav-link active" id="pills-home-tab"
                                                                                    data-bs-toggle="pill"
                                                                                    data-bs-target="#pills-home" type="button"
                                                                                    role="tab" aria-controls="pills-home"
                                                                                    aria-selected="true">Busqueda Basica</button>
                                                                            </li>
                                                                            <li class="nav-item" role="presentation">
                                                                                <button class="nav-link"
                                                                                    id="pills-profile-tab" data-bs-toggle="pill"
                                                                                    data-bs-target="#pills-profile" type="button"
                                                                                    role="tab" aria-controls="pills-profile"
                                                                                    aria-selected="false">Busqueda Avanzada</button>
                                                                            </li>
                                                                        </ul>
                                                                        <div class="tab-content" id="pills-tabContent">
                                                                            <div class="tab-pane fade show active" id="pills-home"
                                                                                role="tabpanel" aria-labelledby="pills-home-tab">
                                                                                <div class="row d-flex justify-content-center">
                                                                                    <div
                                                                                        class="col-12 col-md-8 d-flex justify-content-around">
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="radio1"
                                                                                                checked="checked" value="todos">
                                                                                            <label
                                                                                                class="form-check-label">Todos</label>
                                                                                        </div>
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="radio1"
                                                                                                value="Normas">
                                                                                            <label
                                                                                                class="form-check-label">Normas</label>
                                                                                        </div>
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="radio1"
                                                                                                value="Jurisprudencias">
                                                                                            <label
                                                                                                class="form-check-label">Jurisprudencias</label>
                                                                                        </div>
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="radio1"
                                                                                                value="Argumentos">
                                                                                            <label
                                                                                                class="form-check-label">Argumentos</label>
                                                                                        </div>
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="radio1"
                                                                                                value="Normas">
                                                                                            <label
                                                                                                class="form-check-label">Doctrinas</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <hr>
                                                                                <div class="row d-flex justify-content-center">
                                                                                    <div
                                                                                        class="col-12 col-md-8 form-group d-flex justify-content-center">
                                                                                        <label for="query" class="mr-3"
                                                                                            style="white-space:nowrap">Busqueda
                                                                                            Básica</label>
                                                                                        <input type="text"
                                                                                            class="form-control query" id="query"
                                                                                            name="query"
                                                                                            data_url="{{ route('wiku_busqueda_basica') }}"
                                                                                            placeholder="Ingrese palabras de busqueda">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane fade" id="pills-profile"
                                                                                role="tabpanel" aria-labelledby="pills-profile-tab">
                                                                                <div class="row d-flex justify-content-star">
                                                                                    <div class="col-12 mb-3">
                                                                                        <h6>Por tipo de wiku...</h6>
                                                                                    </div>
                                                                                    <div class="form-group col-12 col-md-4">
                                                                                        <label class="requerido"
                                                                                            for="tipo_wiku">Categoria de
                                                                                            Wiku</label>
                                                                                        <select
                                                                                            class="form-control form-control-sm tipo_wiku"
                                                                                            id="tipo_wiku"
                                                                                            data_url="{{ route('wiku-cargarargumentos') }}">
                                                                                            <option value="">---Seleccione Wiku---
                                                                                            </option>
                                                                                            <option value="Argumentos">Argumentos
                                                                                            </option>
                                                                                            <option value="Normas">Normas</option>
                                                                                            <option value="Jurisprudencias">
                                                                                                Jurisprudencias</option>
                                                                                            <option value="Doctrinas">Doctrinas
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <hr>
                                                                                <div class="row d-flex justify-content-center">
                                                                                    <div class="col-12 mb-3">
                                                                                        <h6>Por área, tema y tema específico...</h6>
                                                                                    </div>
                                                                                    <div class="form-group col-12 col-md-4">
                                                                                        <label for="area_id">Área</label>
                                                                                        <select
                                                                                            class="form-control form-control-sm"
                                                                                            id="area_id"
                                                                                            data_url="{{ route('cargar_temas') }}">
                                                                                            <option value="">---Seleccione---
                                                                                            </option>
                                                                                            @foreach ($areas as $area)
                                                                                                <option
                                                                                                    value="{{ $area->id }}">
                                                                                                    {{ $area->area }}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-12 col-md-4">
                                                                                        <label for="tema_id">Tema</label>
                                                                                        <select
                                                                                            class="form-control form-control-sm"
                                                                                            id="tema_id"
                                                                                            data_url="{{ route('cargar_temasespec') }}">
                                                                                            <option value="">Seleccione primero un
                                                                                                área</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-12 col-md-4">
                                                                                        <label for="wikutemaespecifico_id">Tema
                                                                                            Específico</label>
                                                                                        <select
                                                                                            class="form-control form-control-sm"
                                                                                            name="wikutemaespecifico_id"
                                                                                            id="wikutemaespecifico_id">
                                                                                            <option value="">Seleccione primero un
                                                                                                Tema</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <hr>
                                                                                <div class="row">
                                                                                    <div class="col-12 mb-3">
                                                                                        <h6>Por fuente, artículo y fecha de entrada
                                                                                            en vigencia...</h6>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-5 form-group">
                                                                                        <label for="fuente_id">Fuente
                                                                                            emisora</label>
                                                                                        <select
                                                                                            class="form-control form-control-sm"
                                                                                            name="fuente_id" id="fuente_id"
                                                                                            data_url="{{ route('cargar_normas') }}">
                                                                                            <option value="">--- Seleccione ---
                                                                                            </option>
                                                                                            @foreach ($fuentes as $fuente)
                                                                                                <option
                                                                                                    value="{{ $fuente->id }}">
                                                                                                    {{ $fuente->fuente }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-5 form-group">
                                                                                        <label for="fuente_id">Artículo</label>
                                                                                        <select
                                                                                            class="form-control form-control-sm"
                                                                                            id="id">
                                                                                            <option value="">Seleccione primero una
                                                                                                Fuente Emisora</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-2 form-group">
                                                                                        <label for="fecha">Entrada en
                                                                                            vigencia</label>
                                                                                        <input type="date"
                                                                                            class="form-control form-control-sm"
                                                                                            name="fecha" id="fecha"
                                                                                            max="{{ date('Y-m-d') }}">
                                                                                    </div>
                                                                                    <hr>
                                                                                    <div class="col-12 mb-3">
                                                                                        <h6>Por asociación servicio / producto..
                                                                                        </h6>
                                                                                    </div>
                                                                                    <div class="form-group col-12 col-md-4">
                                                                                        <label class="requerido"
                                                                                            for="prod_serv">Producto /
                                                                                            Servicio</label>
                                                                                        <select
                                                                                            class="form-control form-control-sm"
                                                                                            id="prod_serv">
                                                                                            <option value="">---Selecione---
                                                                                            </option>
                                                                                            <option value="Producto">Producto
                                                                                            </option>
                                                                                            <option value="Servicio">Servicio
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-12 col-md-4"
                                                                                        id="tipo_pqr">
                                                                                        <label class="requerido"
                                                                                            for="tipo_p_q_r_id">Tipo de PQR</label>
                                                                                        <select id="tipo_p_q_r_id"
                                                                                            class="form-control form-control-sm"
                                                                                            name="tipo_p_q_r_id"
                                                                                            data_url="{{ route('admin-funcionario-asignacion_particular-cargar_motivo') }}"
                                                                                            required>
                                                                                            <option value="">---Seleccione---
                                                                                            </option>
                                                                                            @foreach ($tipos_pqr as $tipo_pqr)
                                                                                                <option
                                                                                                    value="{{ $tipo_pqr->id }}">
                                                                                                    {{ $tipo_pqr->tipo }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-12 col-md-4"
                                                                                        id="motivo_pqr">
                                                                                        <label class="requerido"
                                                                                            for="motivo_id">Motivo de PQR</label>
                                                                                        <select id="motivo_id"
                                                                                            class="form-control form-control-sm"
                                                                                            name="motivo_id"
                                                                                            data_url="{{ route('admin-funcionario-asignacion_particular-cargar_sub_motivo') }}">
                                                                                            <option value="">---Seleccione---
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-12 col-md-4"
                                                                                        id="sub_motivo_pqr">
                                                                                        <label class="requerido"
                                                                                            for="motivo_sub_id">Sub-Motivo de
                                                                                            PQR</label>
                                                                                        <select id="motivo_sub_id"
                                                                                            class="form-control form-control-sm"
                                                                                            name="motivo_sub_id">
                                                                                            <option value="">---Seleccione---
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-12 col-md-4 d-none"
                                                                                        id="servicios">
                                                                                        <label for="servicio_id">Servicios</label>
                                                                                        <select id="servicio_id"
                                                                                            class="form-control form-control-sm"
                                                                                            name="servicio_id">
                                                                                            <option value="">---Seleccione un
                                                                                                servcio---</option>
                                                                                            @foreach ($servicios as $servicio)
                                                                                                <option
                                                                                                    value="{{ $servicio->id }}">
                                                                                                    {{ $servicio->servicio }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-12 col-md-4 d-none"
                                                                                        id="categorias">
                                                                                        <label class="requerido"
                                                                                            for="categoria_id">Categoría de
                                                                                            producto</label>
                                                                                        <select id="categoria_id"
                                                                                            class="form-control form-control-sm"
                                                                                            data_url="{{ route('admin-funcionario-asignacion_particular-cargar_producto') }}"
                                                                                            name="categoria_id">
                                                                                            <option value="">---Seleccione---
                                                                                            </option>
                                                                                            @foreach ($categorias as $categoria)
                                                                                                <option
                                                                                                    value="{{ $categoria->id }}">
                                                                                                    {{ $categoria->categoria }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-12 col-md-4 d-none"
                                                                                        id="productos">
                                                                                        <label class="requerido"
                                                                                            for="producto_id">Productos</label>
                                                                                        <select id="producto_id"
                                                                                            class="form-control form-control-sm"
                                                                                            name="producto_id"
                                                                                            data_url="{{ route('admin-funcionario-asignacion_particular-cargar_marca') }}">
                                                                                            <option value="">---Seleccione primero
                                                                                                una categoría---</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-12 col-md-4 d-none"
                                                                                        id="marcas">
                                                                                        <label class="requerido"
                                                                                            for="marca_id">Marcas</label>
                                                                                        <select id="marca_id"
                                                                                            class="form-control form-control-sm"
                                                                                            name="marca_id"
                                                                                            data_url="{{ route('admin-funcionario-asignacion_particular-cargar_referencia') }}">
                                                                                            <option value="">---Seleccione primero
                                                                                                un producto---</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-12 col-md-4 d-none"
                                                                                        id="referencias">
                                                                                        <label class="requerido"
                                                                                            for="referencia_id">Referencias</label>
                                                                                        <select id="referencia_id"
                                                                                            class="form-control form-control-sm"
                                                                                            name="referencia_id">
                                                                                            <option value="">---Seleccione primero
                                                                                                una marca---</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div
                                                                                        class="form-group col-12 col-md-4 pl-4 d-flex align-items-end">
                                                                                        <button
                                                                                            class="btn btn-primary btn-xs btn-sombra pl-5 pr-5 form-control-sm busquedaAvanzada"
                                                                                            id="btn_buscar"
                                                                                            data_url="{{ route('wiku_busqueda_avanzada') }}">Buscar</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <hr>
                                                                        <div class="row justify-content-around coleccionrespuesta"
                                                                            id="coleccionrespuesta">
                                                                            <div class="col-md-6  d-none">
                                                                                <div
                                                                                    class="card card-primary collapsed-card card-mini-sombra">
                                                                                    <div class="card-header">
                                                                                        <div class="user-block">
                                                                                            <span class="username"><a
                                                                                                    href="#"
                                                                                                    id="tituloNoma"></a></span>
                                                                                            <span class="description"></span>
                                                                                        </div>
                                                                                        <div class="card-tools">
                                                                                            <button type="button"
                                                                                                class="btn btn-tool"
                                                                                                data-card-widget="collapse">
                                                                                                <i class="fas fa-minus"></i>
                                                                                            </button>
                                                                                            <button type="button"
                                                                                                class="btn btn-tool"
                                                                                                data-card-widget="remove">
                                                                                                <i class="fas fa-times"></i>
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="card-body">
                                                                                        <div class="row">
                                                                                            <div class="col-12">
                                                                                                <p><strong>Texto:</strong></p>
                                                                                                <p class="textoCopiar">El
                                                                                                    Texto...</p>
                                                                                            </div>
                                                                                        </div>
                                                                                        <hr>
                                                                                        <div class="row">
                                                                                            <div class="col-12">
                                                                                                <h6>Criterios Juridicos</h6>
                                                                                            </div>
                                                                                            <div class="col-12 table-responsive">
                                                                                                <table class="table">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                            <th>Autor(es)</th>
                                                                                                            <th>Criterios jurídicos
                                                                                                                de aplicación</th>
                                                                                                            <th>Criterios jurídicos
                                                                                                                de no aplicación
                                                                                                            </th>
                                                                                                            <th>Notas de la Vigencia
                                                                                                            </th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td></td>
                                                                                                            <td></td>
                                                                                                            <td></td>
                                                                                                            <td></td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="card-footer ">
                                                                                        <div class="row">
                                                                                            <div class="col-12">
                                                                                                <button
                                                                                                    class="btn btn-info btn-xs pl-4 pr-4 agregarTexto">Agregar</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 form-group mt-3">
                                                        <textarea type="text" class="form-control form-control-sm respuesta respuesta-editar"
                                                            rows="6"></textarea>
                                                    </div>
                                                    <div class="col-12 anexosConsulta">
                                                        <div class="col-12 d-flex row anexoconsulta">
                                                            <div class="col-12 titulo-anexo d-flex justify-content-between">
                                                                <h6>Anexo</h6>
                                                                <button type="button"
                                                                    class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminaranexoConsulta"><i
                                                                        class="fas fa-minus-circle"></i> Eliminar
                                                                    anexo</button>
                                                            </div>
                                                            <div class="col-12 col-md-4 form-group titulo-anexoConsulta">
                                                                <label for="titulo">Título anexo</label>
                                                                <input type="text" class="titulo form-control form-control-sm">
                                                            </div>
                                                            <div class="col-12 col-md-4 form-group descripcion-anexoConsulta">
                                                                <label for="descripcion">Descripción</label>
                                                                <input type="text"
                                                                    class="descripcion form-control form-control-sm">
                                                            </div>
                                                            <div class="col-12 col-md-4 form-group doc-anexoConsulta">
                                                                <label for="documento">Anexos o Pruebas</label>
                                                                <input class="documento form-control form-control-sm"
                                                                    type="file">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end flex-row mb-3">
                                                        <button class="btn btn-success btn-xs btn-sombra pl-2 pr-2 crearAnexo"
                                                            id="crearAnexo"><i class="fa fa-plus-circle mr-2"
                                                                aria-hidden="true"></i>
                                                            Añadir
                                                            otro Anexo</button>
                                                    </div>
                                                    <button type="" class="btn btn-primary mx-2 btn-respuesta-hecho col-md-3 col-12 mb-3"
                                                        data_url="{{ route('respuesta_hecho_guardar') }}"
                                                        data_url2="{{ route('respuesta_hecho_anexo_guardar') }}" 
                                                        data_url3="{{ route('estado_hecho_guardar') }}"
                                                        data_url4="{{ route('relacion_respuesta_hecho_guardar') }}"
                                                        data_token="{{ csrf_token() }}">Guardar respuesta</button>
                                                </div>
                                            @endif
                                            @if(sizeOf($tutela->respuestasHechos))
                                                @foreach ($tutela->respuestasHechos as $key => $respuesta)
                                                    @if (session('id_usuario') ==  $respuesta->empleado_id)
                                                        <div class="rounded border my-3 p-3">
                                                            <div class="col-12 col-md-12 mt-2 mb-4">
                                                                <h5>Respuesta #{{$key + 1}}</h5>
                                                            </div>
                                                            @if($respuesta->estado_id != 11)
                                                                <div class="col-12 row justify-content-end my-2">
                                                                    <div class="col-lg-4 col-xl-3 d-flex mb-2">
                                                                        <h6>Agregar hecho a respuesta:</h6>
                                                                    </div>
                                                                    <select class="custom-select respuesta-hecho-asignar col-lg-3 col-xl-2">
                                                                        <option value="">---Seleccione Hecho---</option>
                                                                        @foreach ( $tutela->hechos->sortBy('consecutivo') as $key => $hecho)
                                                                            @if (session('id_usuario') == $hecho->empleado_id && !sizeOf($hecho->relacionesHechos))
                                                                                <option value="{{ $hecho->id }}">Hecho #{{ $hecho->id }}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                    <button type="" class="btn btn-primary btn-respuesta-hecho-asignar col-lg-2 col-xl-1 mx-2"
                                                                        data_url="{{ route('relacion_respuesta_hecho_guardar') }}"
                                                                        data_url2="{{ route('estado_hecho_guardar') }}"
                                                                        data_token="{{ csrf_token() }}">Agregar</button>
                                                                </div>
                                                            @endif
                                                            <hr>
                                                            @foreach ($respuesta->relacion as $relacion)
                                                                <div class="row">
                                                                    <div class="my-2 col-11">
                                                                        <strong class="">#{{ $relacion->hecho->consecutivo }} Hecho: </strong>{{$relacion->hecho->hecho}}
                                                                    </div>
                                                                    @if($respuesta->estado_id != 11)
                                                                        <div class="col-1">
                                                                            <button type="button" class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminarHecho" data_url="{{ route('eliminar_respuesta_hecho_guardar') }}" data_token="{{ csrf_token() }}" ><i class="fas fa-minus-circle"></i></button>
                                                                            <input class="id_relacion_hecho" type="hidden" value="{{ $relacion->hecho->id }}">
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                            <div class="row respuesta-hecho">
                                                                <div class="col-12 row mt-4 mb-2 ">
                                                                    <div class="col-12 col-md-5">
                                                                        <h6 class="font-weight-bold">Respuesta hecho</h6>
                                                                    </div>
                                                                    <div class="col-12 col-md-7 row estado-hecho justify-content-end">
                                                                        <input class="estado_actual" type="hidden" value="{{ $respuesta->estado_id }}">
                                                                        @if ($tutela->estadostutela_id < 4)
                                                                            <div class="col-9 row estado-hecho justify-content-end">
                                                                                <div class="col-3 d-flex mb-2">
                                                                                    <h6>Avance:</h6>
                                                                                </div>
                                                                                <select class="custom-select rounded-0 estadoHecho col-4">
                                                                                    @foreach ($estados as $estado)
                                                                                        <option value="{{ $estado->id }}"
                                                                                        {{ $respuesta->estadorepuestahecho->id == $estado->id ? 'selected' : '' }}>
                                                                                        {{ $estado->estado }} %</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <button type="" class="btn btn-primary btn-estado-hecho col-2 mx-2"
                                                                                    data_url="{{ route('estado_respuesta_hecho_guardar') }}"
                                                                                    data_token="{{ csrf_token() }}"><span style="font-size: 1em;"><i class="far fa-save"></i></span></button>
                                                                            </div>
                                                                        @endif
                                                                        @if($respuesta->estado_id != 11)
                                                                            <div class="col-3 row estado-hecho">
                                                                                <button type="" class="btn btn-success col-12 mx-2" data-toggle="modal"
                                                                                    data-target=".buscar-{{ $key }}"><span
                                                                                        style="font-size: 1em;"><i class="fas fa-search"></i>
                                                                                        Wiku</span>
                                                                                </button>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="modal fade buscar-{{ $key }}" tabindex="-1" role="dialog"
                                                                        data-value="{{ $key }}" aria-labelledby="myLargeModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog modal-lg">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Buscar En
                                                                                        Wiku</h5>
                                                                                    <button type="button" class="close"
                                                                                        data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="card-body">
                                                                                        <ul class="nav nav-pills mb-3" id="pills-tab"
                                                                                            role="tablist">
                                                                                            <li class="nav-item" role="presentation">
                                                                                                <button class="nav-link active" id="pills-home-tab"
                                                                                                    data-bs-toggle="pill"
                                                                                                    data-bs-target="#pills-home" type="button"
                                                                                                    role="tab" aria-controls="pills-home"
                                                                                                    aria-selected="true">Busqueda Basica</button>
                                                                                            </li>
                                                                                            <li class="nav-item" role="presentation">
                                                                                                <button class="nav-link"
                                                                                                    id="pills-profile-tab" data-bs-toggle="pill"
                                                                                                    data-bs-target="#pills-profile" type="button"
                                                                                                    role="tab" aria-controls="pills-profile"
                                                                                                    aria-selected="false">Busqueda Avanzada</button>
                                                                                            </li>
                                                                                        </ul>
                                                                                        <div class="tab-content" id="pills-tabContent">
                                                                                            <div class="tab-pane fade show active" id="pills-home"
                                                                                                role="tabpanel" aria-labelledby="pills-home-tab">
                                                                                                <div class="row d-flex justify-content-center">
                                                                                                    <div
                                                                                                        class="col-12 col-md-8 d-flex justify-content-around">
                                                                                                        <div class="form-check">
                                                                                                            <input class="form-check-input"
                                                                                                                type="radio" name="radio1"
                                                                                                                checked="checked" value="todos">
                                                                                                            <label
                                                                                                                class="form-check-label">Todos</label>
                                                                                                        </div>
                                                                                                        <div class="form-check">
                                                                                                            <input class="form-check-input"
                                                                                                                type="radio" name="radio1"
                                                                                                                value="Normas">
                                                                                                            <label
                                                                                                                class="form-check-label">Normas</label>
                                                                                                        </div>
                                                                                                        <div class="form-check">
                                                                                                            <input class="form-check-input"
                                                                                                                type="radio" name="radio1"
                                                                                                                value="Jurisprudencias">
                                                                                                            <label
                                                                                                                class="form-check-label">Jurisprudencias</label>
                                                                                                        </div>
                                                                                                        <div class="form-check">
                                                                                                            <input class="form-check-input"
                                                                                                                type="radio" name="radio1"
                                                                                                                value="Argumentos">
                                                                                                            <label
                                                                                                                class="form-check-label">Argumentos</label>
                                                                                                        </div>
                                                                                                        <div class="form-check">
                                                                                                            <input class="form-check-input"
                                                                                                                type="radio" name="radio1"
                                                                                                                value="Normas">
                                                                                                            <label
                                                                                                                class="form-check-label">Doctrinas</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <hr>
                                                                                                <div class="row d-flex justify-content-center">
                                                                                                    <div
                                                                                                        class="col-12 col-md-8 form-group d-flex justify-content-center">
                                                                                                        <label for="query" class="mr-3"
                                                                                                            style="white-space:nowrap">Busqueda
                                                                                                            Básica</label>
                                                                                                        <input type="text"
                                                                                                            class="form-control query" id="query"
                                                                                                            name="query"
                                                                                                            data_url="{{ route('wiku_busqueda_basica') }}"
                                                                                                            placeholder="Ingrese palabras de busqueda">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade" id="pills-profile"
                                                                                                role="tabpanel" aria-labelledby="pills-profile-tab">
                                                                                                <div class="row d-flex justify-content-star">
                                                                                                    <div class="col-12 mb-3">
                                                                                                        <h6>Por tipo de wiku...</h6>
                                                                                                    </div>
                                                                                                    <div class="form-group col-12 col-md-4">
                                                                                                        <label class="requerido"
                                                                                                            for="tipo_wiku">Categoria de
                                                                                                            Wiku</label>
                                                                                                        <select
                                                                                                            class="form-control form-control-sm tipo_wiku"
                                                                                                            id="tipo_wiku"
                                                                                                            data_url="{{ route('wiku-cargarargumentos') }}">
                                                                                                            <option value="">---Seleccione Wiku---
                                                                                                            </option>
                                                                                                            <option value="Argumentos">Argumentos
                                                                                                            </option>
                                                                                                            <option value="Normas">Normas</option>
                                                                                                            <option value="Jurisprudencias">
                                                                                                                Jurisprudencias</option>
                                                                                                            <option value="Doctrinas">Doctrinas
                                                                                                            </option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <hr>
                                                                                                <div class="row d-flex justify-content-center">
                                                                                                    <div class="col-12 mb-3">
                                                                                                        <h6>Por área, tema y tema específico...</h6>
                                                                                                    </div>
                                                                                                    <div class="form-group col-12 col-md-4">
                                                                                                        <label for="area_id">Área</label>
                                                                                                        <select
                                                                                                            class="form-control form-control-sm"
                                                                                                            id="area_id"
                                                                                                            data_url="{{ route('cargar_temas') }}">
                                                                                                            <option value="">---Seleccione---
                                                                                                            </option>
                                                                                                            @foreach ($areas as $area)
                                                                                                                <option
                                                                                                                    value="{{ $area->id }}">
                                                                                                                    {{ $area->area }}</option>
                                                                                                            @endforeach
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group col-12 col-md-4">
                                                                                                        <label for="tema_id">Tema</label>
                                                                                                        <select
                                                                                                            class="form-control form-control-sm"
                                                                                                            id="tema_id"
                                                                                                            data_url="{{ route('cargar_temasespec') }}">
                                                                                                            <option value="">Seleccione primero un
                                                                                                                área</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group col-12 col-md-4">
                                                                                                        <label for="wikutemaespecifico_id">Tema
                                                                                                            Específico</label>
                                                                                                        <select
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="wikutemaespecifico_id"
                                                                                                            id="wikutemaespecifico_id">
                                                                                                            <option value="">Seleccione primero un
                                                                                                                Tema</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <hr>
                                                                                                <div class="row">
                                                                                                    <div class="col-12 mb-3">
                                                                                                        <h6>Por fuente, artículo y fecha de entrada
                                                                                                            en vigencia...</h6>
                                                                                                    </div>
                                                                                                    <div class="col-12 col-md-5 form-group">
                                                                                                        <label for="fuente_id">Fuente
                                                                                                            emisora</label>
                                                                                                        <select
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="fuente_id" id="fuente_id"
                                                                                                            data_url="{{ route('cargar_normas') }}">
                                                                                                            <option value="">--- Seleccione ---
                                                                                                            </option>
                                                                                                            @foreach ($fuentes as $fuente)
                                                                                                                <option
                                                                                                                    value="{{ $fuente->id }}">
                                                                                                                    {{ $fuente->fuente }}
                                                                                                                </option>
                                                                                                            @endforeach
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="col-12 col-md-5 form-group">
                                                                                                        <label for="fuente_id">Artículo</label>
                                                                                                        <select
                                                                                                            class="form-control form-control-sm"
                                                                                                            id="id">
                                                                                                            <option value="">Seleccione primero una
                                                                                                                Fuente Emisora</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="col-12 col-md-2 form-group">
                                                                                                        <label for="fecha">Entrada en
                                                                                                            vigencia</label>
                                                                                                        <input type="date"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="fecha" id="fecha"
                                                                                                            max="{{ date('Y-m-d') }}">
                                                                                                    </div>
                                                                                                    <hr>
                                                                                                    <div class="col-12 mb-3">
                                                                                                        <h6>Por asociación servicio / producto..
                                                                                                        </h6>
                                                                                                    </div>
                                                                                                    <div class="form-group col-12 col-md-4">
                                                                                                        <label class="requerido"
                                                                                                            for="prod_serv">Producto /
                                                                                                            Servicio</label>
                                                                                                        <select
                                                                                                            class="form-control form-control-sm"
                                                                                                            id="prod_serv">
                                                                                                            <option value="">---Selecione---
                                                                                                            </option>
                                                                                                            <option value="Producto">Producto
                                                                                                            </option>
                                                                                                            <option value="Servicio">Servicio
                                                                                                            </option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group col-12 col-md-4"
                                                                                                        id="tipo_pqr">
                                                                                                        <label class="requerido"
                                                                                                            for="tipo_p_q_r_id">Tipo de PQR</label>
                                                                                                        <select id="tipo_p_q_r_id"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="tipo_p_q_r_id"
                                                                                                            data_url="{{ route('admin-funcionario-asignacion_particular-cargar_motivo') }}"
                                                                                                            required>
                                                                                                            <option value="">---Seleccione---
                                                                                                            </option>
                                                                                                            @foreach ($tipos_pqr as $tipo_pqr)
                                                                                                                <option
                                                                                                                    value="{{ $tipo_pqr->id }}">
                                                                                                                    {{ $tipo_pqr->tipo }}
                                                                                                                </option>
                                                                                                            @endforeach
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group col-12 col-md-4"
                                                                                                        id="motivo_pqr">
                                                                                                        <label class="requerido"
                                                                                                            for="motivo_id">Motivo de PQR</label>
                                                                                                        <select id="motivo_id"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="motivo_id"
                                                                                                            data_url="{{ route('admin-funcionario-asignacion_particular-cargar_sub_motivo') }}">
                                                                                                            <option value="">---Seleccione---
                                                                                                            </option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group col-12 col-md-4"
                                                                                                        id="sub_motivo_pqr">
                                                                                                        <label class="requerido"
                                                                                                            for="motivo_sub_id">Sub-Motivo de
                                                                                                            PQR</label>
                                                                                                        <select id="motivo_sub_id"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="motivo_sub_id">
                                                                                                            <option value="">---Seleccione---
                                                                                                            </option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group col-12 col-md-4 d-none"
                                                                                                        id="servicios">
                                                                                                        <label for="servicio_id">Servicios</label>
                                                                                                        <select id="servicio_id"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="servicio_id">
                                                                                                            <option value="">---Seleccione un
                                                                                                                servcio---</option>
                                                                                                            @foreach ($servicios as $servicio)
                                                                                                                <option
                                                                                                                    value="{{ $servicio->id }}">
                                                                                                                    {{ $servicio->servicio }}
                                                                                                                </option>
                                                                                                            @endforeach
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group col-12 col-md-4 d-none"
                                                                                                        id="categorias">
                                                                                                        <label class="requerido"
                                                                                                            for="categoria_id">Categoría de
                                                                                                            producto</label>
                                                                                                        <select id="categoria_id"
                                                                                                            class="form-control form-control-sm"
                                                                                                            data_url="{{ route('admin-funcionario-asignacion_particular-cargar_producto') }}"
                                                                                                            name="categoria_id">
                                                                                                            <option value="">---Seleccione---
                                                                                                            </option>
                                                                                                            @foreach ($categorias as $categoria)
                                                                                                                <option
                                                                                                                    value="{{ $categoria->id }}">
                                                                                                                    {{ $categoria->categoria }}
                                                                                                                </option>
                                                                                                            @endforeach
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group col-12 col-md-4 d-none"
                                                                                                        id="productos">
                                                                                                        <label class="requerido"
                                                                                                            for="producto_id">Productos</label>
                                                                                                        <select id="producto_id"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="producto_id"
                                                                                                            data_url="{{ route('admin-funcionario-asignacion_particular-cargar_marca') }}">
                                                                                                            <option value="">---Seleccione primero
                                                                                                                una categoría---</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group col-12 col-md-4 d-none"
                                                                                                        id="marcas">
                                                                                                        <label class="requerido"
                                                                                                            for="marca_id">Marcas</label>
                                                                                                        <select id="marca_id"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="marca_id"
                                                                                                            data_url="{{ route('admin-funcionario-asignacion_particular-cargar_referencia') }}">
                                                                                                            <option value="">---Seleccione primero
                                                                                                                un producto---</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group col-12 col-md-4 d-none"
                                                                                                        id="referencias">
                                                                                                        <label class="requerido"
                                                                                                            for="referencia_id">Referencias</label>
                                                                                                        <select id="referencia_id"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="referencia_id">
                                                                                                            <option value="">---Seleccione primero
                                                                                                                una marca---</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="form-group col-12 col-md-4 pl-4 d-flex align-items-end">
                                                                                                        <button
                                                                                                            class="btn btn-primary btn-xs btn-sombra pl-5 pr-5 form-control-sm busquedaAvanzada"
                                                                                                            id="btn_buscar"
                                                                                                            data_url="{{ route('wiku_busqueda_avanzada') }}">Buscar</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <hr>
                                                                                        <div class="row justify-content-around coleccionrespuesta"
                                                                                            id="coleccionrespuesta">
                                                                                            <div class="col-md-6  d-none">
                                                                                                <div
                                                                                                    class="card card-primary collapsed-card card-mini-sombra">
                                                                                                    <div class="card-header">
                                                                                                        <div class="user-block">
                                                                                                            <span class="username"><a
                                                                                                                    href="#"
                                                                                                                    id="tituloNoma"></a></span>
                                                                                                            <span class="description"></span>
                                                                                                        </div>
                                                                                                        <div class="card-tools">
                                                                                                            <button type="button"
                                                                                                                class="btn btn-tool"
                                                                                                                data-card-widget="collapse">
                                                                                                                <i class="fas fa-minus"></i>
                                                                                                            </button>
                                                                                                            <button type="button"
                                                                                                                class="btn btn-tool"
                                                                                                                data-card-widget="remove">
                                                                                                                <i class="fas fa-times"></i>
                                                                                                            </button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="card-body">
                                                                                                        <div class="row">
                                                                                                            <div class="col-12">
                                                                                                                <p><strong>Texto:</strong></p>
                                                                                                                <p class="textoCopiar">El
                                                                                                                    Texto...</p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <hr>
                                                                                                        <div class="row">
                                                                                                            <div class="col-12">
                                                                                                                <h6>Criterios Juridicos</h6>
                                                                                                            </div>
                                                                                                            <div class="col-12 table-responsive">
                                                                                                                <table class="table">
                                                                                                                    <thead>
                                                                                                                        <tr>
                                                                                                                            <th>Autor(es)</th>
                                                                                                                            <th>Criterios jurídicos
                                                                                                                                de aplicación</th>
                                                                                                                            <th>Criterios jurídicos
                                                                                                                                de no aplicación
                                                                                                                            </th>
                                                                                                                            <th>Notas de la Vigencia
                                                                                                                            </th>
                                                                                                                        </tr>
                                                                                                                    </thead>
                                                                                                                    <tbody>
                                                                                                                        <tr>
                                                                                                                            <td></td>
                                                                                                                            <td></td>
                                                                                                                            <td></td>
                                                                                                                            <td></td>
                                                                                                                        </tr>
                                                                                                                    </tbody>
                                                                                                                </table>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="card-footer ">
                                                                                                        <div class="row">
                                                                                                            <div class="col-12">
                                                                                                                <button
                                                                                                                    class="btn btn-info btn-xs pl-4 pr-4 agregarTexto">Agregar</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 form-group mt-3">
                                                                        @if ($respuesta->estadorepuestahecho->estado == 100)
                                                                            <div class="respuesta mt-2">
                                                                                @if($respuesta->respuesta)
                                                                                    {!! $respuesta->respuesta !!}
                                                                                @endif
                                                                            </div>
                                                                        @else
                                                                            <textarea type="text"
                                                                                class="form-control form-control-sm respuesta respuesta-editar"
                                                                                rows="6"
                                                                                max>{{ isset($respuesta->respuesta) ? $respuesta->respuesta : '' }}</textarea>
                                                                        @endif
                                                                        
                                                                        @if (isset($respuesta->respuesta))
                                                                            <input class="respuesta_anterior" type="hidden"
                                                                                value="{{ $respuesta->respuesta }}"
                                                                                data_url="{{ route('historial_respuesta_hecho_guardar') }}">
                                                                        @endif
                                                                        <input class="id_respuesta" type="hidden" value="{{ $respuesta->id }}">
                                                                    </div>
                                                                    @if ($respuesta->estadorepuestahecho->estado != 100)
                                                                        <div class="col-12 anexosConsulta">
                                                                            <div class="col-12 d-flex row anexoconsulta">
                                                                                <div class="col-12 titulo-anexo d-flex justify-content-between">
                                                                                    <h6>Anexo</h6>
                                                                                    <button type="button"
                                                                                        class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminaranexoConsulta"><i
                                                                                            class="fas fa-minus-circle"></i> Eliminar
                                                                                        anexo</button>
                                                                                </div>
                                                                                <div class="col-12 col-md-4 form-group titulo-anexoConsulta">
                                                                                    <label for="titulo">Título anexo</label>
                                                                                    <input type="text" class="titulo form-control form-control-sm">
                                                                                </div>
                                                                                <div class="col-12 col-md-4 form-group descripcion-anexoConsulta">
                                                                                    <label for="descripcion">Descripción</label>
                                                                                    <input type="text"
                                                                                        class="descripcion form-control form-control-sm">
                                                                                </div>
                                                                                <div class="col-12 col-md-4 form-group doc-anexoConsulta">
                                                                                    <label for="documento">Anexos o Pruebas</label>
                                                                                    <input class="documento form-control form-control-sm"
                                                                                        type="file">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 d-flex justify-content-end flex-row mb-3">
                                                                            <button class="btn btn-success btn-xs btn-sombra pl-2 pr-2 crearAnexo"
                                                                                id="crearAnexo"><i class="fa fa-plus-circle mr-2"
                                                                                    aria-hidden="true"></i>
                                                                                Añadir
                                                                                otro Anexo</button>
                                                                        </div>
                                                                        <button type="" class="btn btn-primary mx-2 btn-respuesta-hecho-editar col-md-3 col-12"
                                                                            data_url="{{ route('respuesta_hecho_editar_guardar') }}"
                                                                            data_url2="{{ route('respuesta_hecho_anexo_guardar') }}" 
                                                                            data_url3="{{ route('estado_respuesta_hecho_guardar') }}"
                                                                            data_token="{{ csrf_token() }}">Guardar respuesta</button>
                                                                    @endif
                                                                    @if (isset($respuesta))
                                                                        @if (sizeOf($respuesta->documentos))
                                                                            <hr class="my-4">
                                                                            <div class="row respuestaAnexos">
                                                                                <div class="col-12">
                                                                                    <div class="col-12">
                                                                                        <h6>Anexos respuesta</h6>
                                                                                    </div>
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
                                                                                                @foreach ($respuesta->documentos as $anexo)
                                                                                                    <tr>
                                                                                                        <td class="text-justify">
                                                                                                            {{ $anexo->titulo }}
                                                                                                        </td>
                                                                                                        <td class="text-justify">
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
                                                                            <h6 class="">Historial de respuestas</h6>
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
                                                                                            @foreach ($respuesta->historial as $historial)
                                                                                                <tr>
                                                                                                    <td>{{ $historial->created_at }}</td>
                                                                                                    <td class="text-justify">{{ $historial->empleado->nombre1 }} {{ $historial->empleado->apellido1 }}</td>
                                                                                                    <td class="text-justify">{{ strip_tags($historial->historial) }}</td>
                                                                                                </tr>
                                                                                            @endforeach
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                        <hr class="mt-3">
                                                                        <div class="row d-flex px-12 p-3 mensaje-respuesta-hecho"> 
                                                                            <input class="id_respuesta_hecho" type="hidden" value="{{ $respuesta->id }}">
                                                                            <div class="container-mensaje-historial form-group col-12">
                                                                                <label for="" class="">Agregar Historial de respuesta</label>
                                                                                <textarea class="form-control mensaje-historial-respuesta-hecho" rows="3" placeholder="" required></textarea>
                                                                            </div>
                                                                            <div class="col-12 col-md-12 form-group d-flex">
                                                                                <button href="" class="btn btn-primary px-4 guardarHistorialRespuestaHecho" data_url="{{ route('historial_respuesta_hecho_guardar') }}"
                                                                                data_token="{{ csrf_token() }}">Guardar historial</button>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>    
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 1em;">
                                <div class="card-header">
                                    <h3 class="card-title font-weight-bold">Respuestas pretensiones</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: none;">
                                    @if(sizeOf($tutela->pretensiones))
                                        <div class="col-12 row mb-2">
                                            @php
                                                $validacionPretensiones = false;
                                                foreach ($tutela->pretensiones->where('empleado_id', session('id_usuario')) as $pretension) {
                                                    if(!sizeOf($pretension->relacionesPretensiones)){
                                                        $validacionPretensiones = true;
                                                        break;
                                                    }
                                                }
                                            @endphp
                                            @if($validacionPretensiones)
                                                <div class="rounded border my-3 p-3">
                                                    <div class="col-12 col-md-5 my-3">
                                                        <h5>Respuestas Pretensiones</h5>
                                                    </div>
                                                    <hr>
                                                    <div class="col-12 bloque-seleccion-pretensiones">
                                                        <div class="form-check my-4 text-right">
                                                            <input type="checkbox" class="form-check-input check-todos-pretensiones">
                                                            <label class="form-check-label"><strong>Seleccionar todos las pretensiones</strong></label>
                                                        </div>
                                                        @foreach ( $tutela->pretensiones->sortBy('consecutivo') as $key => $pretension)
                                                            @if (session('id_usuario') == $pretension->empleado_id && !sizeOf($pretension->relacionesPretensiones))
                                                                <div class="form-check my-2">
                                                                    <input type="checkbox" class="form-check-input select-pretension" value="{{$pretension->id}}">
                                                                    <label class="form-check-label"><strong>#{{$pretension->consecutivo}}</strong> - {{$pretension->pretension}}</label>
                                                                </div>
                                                                <hr>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <div class="row col-12">
                                                        <div class="col-12 col-md-5">
                                                            <h5>Respuesta</h5>
                                                        </div>
                                                        <div class="col-12 col-md-7 row estado-pretensiones justify-content-end">
                                                            @if ($tutela->estadostutela_id < 4)
                                                            <div class="col-9 row estado-pretensiones justify-content-end">
                                                                <div class="col-3 d-flex mb-2">
                                                                    <h6>Avance:</h6>
                                                                </div>
                                                                <select class="custom-select rounded-0 estadoPretension col-4">
                                                                    @foreach ($estados as $estado)
                                                                        <option value="{{ $estado->id }}">{{ $estado->estado }} %</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            @endif
                                                            <div class="col-3 row modal-pretension">
                                                                <button type="" class="btn btn-success col-12 mx-2" data-toggle="modal"
                                                                    data-target=".buscar-pretension"><span
                                                                        style="font-size: 1em;"><i class="fas fa-search"></i>
                                                                        Wiku</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade buscar-pretension" tabindex="-1" role="dialog"
                                                        data-value="pretension" aria-labelledby="myLargeModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Buscar En
                                                                        Wiku</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card-body">
                                                                        <ul class="nav nav-pills mb-3" id="pills-tab"
                                                                            role="tablist">
                                                                            <li class="nav-item" role="presentation">
                                                                                <button class="nav-link active" id="pills-home-tab"
                                                                                    data-bs-toggle="pill"
                                                                                    data-bs-target="#pills-home" type="button"
                                                                                    role="tab" aria-controls="pills-home"
                                                                                    aria-selected="true">Busqueda Basica</button>
                                                                            </li>
                                                                            <li class="nav-item" role="presentation">
                                                                                <button class="nav-link"
                                                                                    id="pills-profile-tab" data-bs-toggle="pill"
                                                                                    data-bs-target="#pills-profile" type="button"
                                                                                    role="tab" aria-controls="pills-profile"
                                                                                    aria-selected="false">Busqueda Avanzada</button>
                                                                            </li>
                                                                        </ul>
                                                                        <div class="tab-content" id="pills-tabContent">
                                                                            <div class="tab-pane fade show active" id="pills-home"
                                                                                role="tabpanel" aria-labelledby="pills-home-tab">
                                                                                <div class="row d-flex justify-content-center">
                                                                                    <div
                                                                                        class="col-12 col-md-8 d-flex justify-content-around">
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="radio1"
                                                                                                checked="checked" value="todos">
                                                                                            <label
                                                                                                class="form-check-label">Todos</label>
                                                                                        </div>
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="radio1"
                                                                                                value="Normas">
                                                                                            <label
                                                                                                class="form-check-label">Normas</label>
                                                                                        </div>
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="radio1"
                                                                                                value="Jurisprudencias">
                                                                                            <label
                                                                                                class="form-check-label">Jurisprudencias</label>
                                                                                        </div>
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="radio1"
                                                                                                value="Argumentos">
                                                                                            <label
                                                                                                class="form-check-label">Argumentos</label>
                                                                                        </div>
                                                                                        <div class="form-check">
                                                                                            <input class="form-check-input"
                                                                                                type="radio" name="radio1"
                                                                                                value="Normas">
                                                                                            <label
                                                                                                class="form-check-label">Doctrinas</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <hr>
                                                                                <div class="row d-flex justify-content-center">
                                                                                    <div
                                                                                        class="col-12 col-md-8 form-group d-flex justify-content-center">
                                                                                        <label for="query" class="mr-3"
                                                                                            style="white-space:nowrap">Busqueda
                                                                                            Básica</label>
                                                                                        <input type="text"
                                                                                            class="form-control query" id="query"
                                                                                            name="query"
                                                                                            data_url="{{ route('wiku_busqueda_basica') }}"
                                                                                            placeholder="Ingrese palabras de busqueda">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="tab-pane fade" id="pills-profile"
                                                                                role="tabpanel" aria-labelledby="pills-profile-tab">
                                                                                <div class="row d-flex justify-content-star">
                                                                                    <div class="col-12 mb-3">
                                                                                        <h6>Por tipo de wiku...</h6>
                                                                                    </div>
                                                                                    <div class="form-group col-12 col-md-4">
                                                                                        <label class="requerido"
                                                                                            for="tipo_wiku">Categoria de
                                                                                            Wiku</label>
                                                                                        <select
                                                                                            class="form-control form-control-sm tipo_wiku"
                                                                                            id="tipo_wiku"
                                                                                            data_url="{{ route('wiku-cargarargumentos') }}">
                                                                                            <option value="">---Seleccione Wiku---
                                                                                            </option>
                                                                                            <option value="Argumentos">Argumentos
                                                                                            </option>
                                                                                            <option value="Normas">Normas</option>
                                                                                            <option value="Jurisprudencias">
                                                                                                Jurisprudencias</option>
                                                                                            <option value="Doctrinas">Doctrinas
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <hr>
                                                                                <div class="row d-flex justify-content-center">
                                                                                    <div class="col-12 mb-3">
                                                                                        <h6>Por área, tema y tema específico...</h6>
                                                                                    </div>
                                                                                    <div class="form-group col-12 col-md-4">
                                                                                        <label for="area_id">Área</label>
                                                                                        <select
                                                                                            class="form-control form-control-sm"
                                                                                            id="area_id"
                                                                                            data_url="{{ route('cargar_temas') }}">
                                                                                            <option value="">---Seleccione---
                                                                                            </option>
                                                                                            @foreach ($areas as $area)
                                                                                                <option
                                                                                                    value="{{ $area->id }}">
                                                                                                    {{ $area->area }}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-12 col-md-4">
                                                                                        <label for="tema_id">Tema</label>
                                                                                        <select
                                                                                            class="form-control form-control-sm"
                                                                                            id="tema_id"
                                                                                            data_url="{{ route('cargar_temasespec') }}">
                                                                                            <option value="">Seleccione primero un
                                                                                                área</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-12 col-md-4">
                                                                                        <label for="wikutemaespecifico_id">Tema
                                                                                            Específico</label>
                                                                                        <select
                                                                                            class="form-control form-control-sm"
                                                                                            name="wikutemaespecifico_id"
                                                                                            id="wikutemaespecifico_id">
                                                                                            <option value="">Seleccione primero un
                                                                                                Tema</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <hr>
                                                                                <div class="row">
                                                                                    <div class="col-12 mb-3">
                                                                                        <h6>Por fuente, artículo y fecha de entrada
                                                                                            en vigencia...</h6>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-5 form-group">
                                                                                        <label for="fuente_id">Fuente
                                                                                            emisora</label>
                                                                                        <select
                                                                                            class="form-control form-control-sm"
                                                                                            name="fuente_id" id="fuente_id"
                                                                                            data_url="{{ route('cargar_normas') }}">
                                                                                            <option value="">--- Seleccione ---
                                                                                            </option>
                                                                                            @foreach ($fuentes as $fuente)
                                                                                                <option
                                                                                                    value="{{ $fuente->id }}">
                                                                                                    {{ $fuente->fuente }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-5 form-group">
                                                                                        <label for="fuente_id">Artículo</label>
                                                                                        <select
                                                                                            class="form-control form-control-sm"
                                                                                            id="id">
                                                                                            <option value="">Seleccione primero una
                                                                                                Fuente Emisora</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-2 form-group">
                                                                                        <label for="fecha">Entrada en
                                                                                            vigencia</label>
                                                                                        <input type="date"
                                                                                            class="form-control form-control-sm"
                                                                                            name="fecha" id="fecha"
                                                                                            max="{{ date('Y-m-d') }}">
                                                                                    </div>
                                                                                    <hr>
                                                                                    <div class="col-12 mb-3">
                                                                                        <h6>Por asociación servicio / producto..
                                                                                        </h6>
                                                                                    </div>
                                                                                    <div class="form-group col-12 col-md-4">
                                                                                        <label class="requerido"
                                                                                            for="prod_serv">Producto /
                                                                                            Servicio</label>
                                                                                        <select
                                                                                            class="form-control form-control-sm"
                                                                                            id="prod_serv">
                                                                                            <option value="">---Selecione---
                                                                                            </option>
                                                                                            <option value="Producto">Producto
                                                                                            </option>
                                                                                            <option value="Servicio">Servicio
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-12 col-md-4"
                                                                                        id="tipo_pqr">
                                                                                        <label class="requerido"
                                                                                            for="tipo_p_q_r_id">Tipo de PQR</label>
                                                                                        <select id="tipo_p_q_r_id"
                                                                                            class="form-control form-control-sm"
                                                                                            name="tipo_p_q_r_id"
                                                                                            data_url="{{ route('admin-funcionario-asignacion_particular-cargar_motivo') }}"
                                                                                            required>
                                                                                            <option value="">---Seleccione---
                                                                                            </option>
                                                                                            @foreach ($tipos_pqr as $tipo_pqr)
                                                                                                <option
                                                                                                    value="{{ $tipo_pqr->id }}">
                                                                                                    {{ $tipo_pqr->tipo }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-12 col-md-4"
                                                                                        id="motivo_pqr">
                                                                                        <label class="requerido"
                                                                                            for="motivo_id">Motivo de PQR</label>
                                                                                        <select id="motivo_id"
                                                                                            class="form-control form-control-sm"
                                                                                            name="motivo_id"
                                                                                            data_url="{{ route('admin-funcionario-asignacion_particular-cargar_sub_motivo') }}">
                                                                                            <option value="">---Seleccione---
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-12 col-md-4"
                                                                                        id="sub_motivo_pqr">
                                                                                        <label class="requerido"
                                                                                            for="motivo_sub_id">Sub-Motivo de
                                                                                            PQR</label>
                                                                                        <select id="motivo_sub_id"
                                                                                            class="form-control form-control-sm"
                                                                                            name="motivo_sub_id">
                                                                                            <option value="">---Seleccione---
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-12 col-md-4 d-none"
                                                                                        id="servicios">
                                                                                        <label for="servicio_id">Servicios</label>
                                                                                        <select id="servicio_id"
                                                                                            class="form-control form-control-sm"
                                                                                            name="servicio_id">
                                                                                            <option value="">---Seleccione un
                                                                                                servcio---</option>
                                                                                            @foreach ($servicios as $servicio)
                                                                                                <option
                                                                                                    value="{{ $servicio->id }}">
                                                                                                    {{ $servicio->servicio }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-12 col-md-4 d-none"
                                                                                        id="categorias">
                                                                                        <label class="requerido"
                                                                                            for="categoria_id">Categoría de
                                                                                            producto</label>
                                                                                        <select id="categoria_id"
                                                                                            class="form-control form-control-sm"
                                                                                            data_url="{{ route('admin-funcionario-asignacion_particular-cargar_producto') }}"
                                                                                            name="categoria_id">
                                                                                            <option value="">---Seleccione---
                                                                                            </option>
                                                                                            @foreach ($categorias as $categoria)
                                                                                                <option
                                                                                                    value="{{ $categoria->id }}">
                                                                                                    {{ $categoria->categoria }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-12 col-md-4 d-none"
                                                                                        id="productos">
                                                                                        <label class="requerido"
                                                                                            for="producto_id">Productos</label>
                                                                                        <select id="producto_id"
                                                                                            class="form-control form-control-sm"
                                                                                            name="producto_id"
                                                                                            data_url="{{ route('admin-funcionario-asignacion_particular-cargar_marca') }}">
                                                                                            <option value="">---Seleccione primero
                                                                                                una categoría---</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-12 col-md-4 d-none"
                                                                                        id="marcas">
                                                                                        <label class="requerido"
                                                                                            for="marca_id">Marcas</label>
                                                                                        <select id="marca_id"
                                                                                            class="form-control form-control-sm"
                                                                                            name="marca_id"
                                                                                            data_url="{{ route('admin-funcionario-asignacion_particular-cargar_referencia') }}">
                                                                                            <option value="">---Seleccione primero
                                                                                                un producto---</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="form-group col-12 col-md-4 d-none"
                                                                                        id="referencias">
                                                                                        <label class="requerido"
                                                                                            for="referencia_id">Referencias</label>
                                                                                        <select id="referencia_id"
                                                                                            class="form-control form-control-sm"
                                                                                            name="referencia_id">
                                                                                            <option value="">---Seleccione primero
                                                                                                una marca---</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div
                                                                                        class="form-group col-12 col-md-4 pl-4 d-flex align-items-end">
                                                                                        <button
                                                                                            class="btn btn-primary btn-xs btn-sombra pl-5 pr-5 form-control-sm busquedaAvanzada"
                                                                                            id="btn_buscar"
                                                                                            data_url="{{ route('wiku_busqueda_avanzada') }}">Buscar</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <hr>
                                                                        <div class="row justify-content-around coleccionrespuesta"
                                                                            id="coleccionrespuesta">
                                                                            <div class="col-md-6  d-none">
                                                                                <div
                                                                                    class="card card-primary collapsed-card card-mini-sombra">
                                                                                    <div class="card-header">
                                                                                        <div class="user-block">
                                                                                            <span class="username"><a
                                                                                                    href="#"
                                                                                                    id="tituloNoma"></a></span>
                                                                                            <span class="description"></span>
                                                                                        </div>
                                                                                        <div class="card-tools">
                                                                                            <button type="button"
                                                                                                class="btn btn-tool"
                                                                                                data-card-widget="collapse">
                                                                                                <i class="fas fa-minus"></i>
                                                                                            </button>
                                                                                            <button type="button"
                                                                                                class="btn btn-tool"
                                                                                                data-card-widget="remove">
                                                                                                <i class="fas fa-times"></i>
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="card-body">
                                                                                        <div class="row">
                                                                                            <div class="col-12">
                                                                                                <p><strong>Texto:</strong></p>
                                                                                                <p class="textoCopiar">El
                                                                                                    Texto...</p>
                                                                                            </div>
                                                                                        </div>
                                                                                        <hr>
                                                                                        <div class="row">
                                                                                            <div class="col-12">
                                                                                                <h6>Criterios Juridicos</h6>
                                                                                            </div>
                                                                                            <div class="col-12 table-responsive">
                                                                                                <table class="table">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                            <th>Autor(es)</th>
                                                                                                            <th>Criterios jurídicos
                                                                                                                de aplicación</th>
                                                                                                            <th>Criterios jurídicos
                                                                                                                de no aplicación
                                                                                                            </th>
                                                                                                            <th>Notas de la Vigencia
                                                                                                            </th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td></td>
                                                                                                            <td></td>
                                                                                                            <td></td>
                                                                                                            <td></td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="card-footer ">
                                                                                        <div class="row">
                                                                                            <div class="col-12">
                                                                                                <button
                                                                                                    class="btn btn-info btn-xs pl-4 pr-4 agregarTexto">Agregar</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 form-group mt-3">
                                                        <textarea type="text" class="form-control form-control-sm respuesta respuesta-editar"
                                                            rows="6"></textarea>
                                                    </div>
                                                    <div class="col-12 anexosConsulta">
                                                        <div class="col-12 d-flex row anexoconsulta">
                                                            <div class="col-12 titulo-anexo d-flex justify-content-between">
                                                                <h6>Anexo</h6>
                                                                <button type="button"
                                                                    class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminaranexoConsulta"><i
                                                                        class="fas fa-minus-circle"></i> Eliminar
                                                                    anexo</button>
                                                            </div>
                                                            <div class="col-12 col-md-4 form-group titulo-anexoConsulta">
                                                                <label for="titulo">Título anexo</label>
                                                                <input type="text" class="titulo form-control form-control-sm">
                                                            </div>
                                                            <div class="col-12 col-md-4 form-group descripcion-anexoConsulta">
                                                                <label for="descripcion">Descripción</label>
                                                                <input type="text"
                                                                    class="descripcion form-control form-control-sm">
                                                            </div>
                                                            <div class="col-12 col-md-4 form-group doc-anexoConsulta">
                                                                <label for="documento">Anexos o Pruebas</label>
                                                                <input class="documento form-control form-control-sm"
                                                                    type="file">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end flex-row mb-3">
                                                        <button class="btn btn-success btn-xs btn-sombra pl-2 pr-2 crearAnexo"
                                                            id="crearAnexo"><i class="fa fa-plus-circle mr-2"
                                                                aria-hidden="true"></i>
                                                            Añadir
                                                            otro Anexo</button>
                                                    </div>
                                                    <button type="" class="btn btn-primary mx-2 btn-respuesta-pretension col-md-3 col-12 mb-3"
                                                        data_url="{{ route('respuesta_pretension_guardar') }}"
                                                        data_url2="{{ route('respuesta_pretension_anexo_guardar') }}" 
                                                        data_url3="{{ route('estado_pretension_guardar') }}"
                                                        data_url4="{{ route('relacion_respuesta_pretension_guardar') }}"
                                                        data_token="{{ csrf_token() }}">Guardar respuesta</button>
                                                </div>
                                            @endif
                                            @if(sizeOf($tutela->respuestasPretensiones))
                                                @foreach ($tutela->respuestasPretensiones as $key => $respuesta)
                                                    @if (session('id_usuario') ==  $respuesta->empleado_id)
                                                        <div class="rounded border my-3 p-3">
                                                            <div class="col-12 col-md-12 mt-2 mb-4">
                                                                <h5>Respuesta #{{$key + 1}}</h5>
                                                            </div>
                                                            @if($respuesta->estado_id != 11)
                                                                <div class="col-12 row justify-content-end my-2">
                                                                    <div class="col-lg-4 col-xl-3 d-flex mb-2">
                                                                        <h6>Agregar pretensión a respuesta:</h6>
                                                                    </div>
                                                                    <select class="custom-select respuesta-pretension-asignar col-lg-3 col-xl-2">
                                                                        <option value="">---Seleccione Pretensión---</option>
                                                                        @foreach ( $tutela->pretensiones->sortBy('consecutivo') as $key => $pretension)
                                                                            @if (session('id_usuario') == $pretension->empleado_id && !sizeOf($pretension->relacionesPretensiones))
                                                                                <option value="{{ $pretension->id }}">Pretensión #{{ $pretension->id }}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                    <button type="" class="btn btn-primary btn-respuesta-pretension-asignar col-lg-2 col-xl-1 mx-2"
                                                                        data_url="{{ route('relacion_respuesta_pretension_guardar') }}"
                                                                        data_url2="{{ route('estado_pretension_guardar') }}"
                                                                        data_token="{{ csrf_token() }}">Agregar</button>
                                                                </div>
                                                            @endif
                                                            <hr>
                                                            @foreach ($respuesta->relacion as $relacion)
                                                                <div class="row">
                                                                    <div class="my-2 col-11">
                                                                        <strong class="">#{{ $relacion->pretension->consecutivo }} Pretensión: </strong>{{$relacion->pretension->pretension}}
                                                                    </div>
                                                                    @if($respuesta->estado_id != 11)
                                                                        <div class="col-1">
                                                                            <button type="button" class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminarPretension" data_url="{{ route('eliminar_respuesta_pretension_guardar') }}" data_token="{{ csrf_token() }}" ><i class="fas fa-minus-circle"></i></button>
                                                                            <input class="id_relacion_pretension" type="hidden" value="{{ $relacion->pretension->id }}">
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                            <div class="row respuesta-pretension">
                                                                <div class="col-12 row mt-4 mb-2 ">
                                                                    <div class="col-12 col-md-5">
                                                                        <h6 class="font-weight-bold">Respuesta pretensión</h6>
                                                                    </div>
                                                                    <div class="col-12 col-md-7 row estado-pretension justify-content-end">
                                                                        <input class="estado_actual" type="hidden" value="{{ $respuesta->estado_id }}">
                                                                        @if ($tutela->estadostutela_id < 4)
                                                                            <div class="col-9 row estado-pretension justify-content-end">
                                                                                <div class="col-3 d-flex mb-2">
                                                                                    <h6>Avance:</h6>
                                                                                </div>
                                                                                <select class="custom-select rounded-0 estadoPretension col-4">
                                                                                    @foreach ($estados as $estado)
                                                                                        <option value="{{ $estado->id }}"
                                                                                        {{ $respuesta->estadorespuestapretension->id == $estado->id ? 'selected' : '' }}>
                                                                                        {{ $estado->estado }} %</option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <button type="" class="btn btn-primary btn-estado-pretension col-2 mx-2"
                                                                                    data_url="{{ route('estado_respuesta_pretension_guardar') }}"
                                                                                    data_token="{{ csrf_token() }}"><span style="font-size: 1em;"><i class="far fa-save"></i></span></button>
                                                                            </div>
                                                                        @endif
                                                                        @if($respuesta->estado_id != 11)
                                                                            <div class="col-3 row estado-pretension">
                                                                                <button type="" class="btn btn-success col-12 mx-2" data-toggle="modal"
                                                                                    data-target=".buscar-{{ $key }}"><span
                                                                                        style="font-size: 1em;"><i class="fas fa-search"></i>
                                                                                        Wiku</span>
                                                                                </button>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="modal fade buscar-{{ $key }}" tabindex="-1" role="dialog"
                                                                        data-value="{{ $key }}" aria-labelledby="myLargeModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog modal-lg">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Buscar En
                                                                                        Wiku</h5>
                                                                                    <button type="button" class="close"
                                                                                        data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="card-body">
                                                                                        <ul class="nav nav-pills mb-3" id="pills-tab"
                                                                                            role="tablist">
                                                                                            <li class="nav-item" role="presentation">
                                                                                                <button class="nav-link active" id="pills-home-tab"
                                                                                                    data-bs-toggle="pill"
                                                                                                    data-bs-target="#pills-home" type="button"
                                                                                                    role="tab" aria-controls="pills-home"
                                                                                                    aria-selected="true">Busqueda Basica</button>
                                                                                            </li>
                                                                                            <li class="nav-item" role="presentation">
                                                                                                <button class="nav-link"
                                                                                                    id="pills-profile-tab" data-bs-toggle="pill"
                                                                                                    data-bs-target="#pills-profile" type="button"
                                                                                                    role="tab" aria-controls="pills-profile"
                                                                                                    aria-selected="false">Busqueda Avanzada</button>
                                                                                            </li>
                                                                                        </ul>
                                                                                        <div class="tab-content" id="pills-tabContent">
                                                                                            <div class="tab-pane fade show active" id="pills-home"
                                                                                                role="tabpanel" aria-labelledby="pills-home-tab">
                                                                                                <div class="row d-flex justify-content-center">
                                                                                                    <div
                                                                                                        class="col-12 col-md-8 d-flex justify-content-around">
                                                                                                        <div class="form-check">
                                                                                                            <input class="form-check-input"
                                                                                                                type="radio" name="radio1"
                                                                                                                checked="checked" value="todos">
                                                                                                            <label
                                                                                                                class="form-check-label">Todos</label>
                                                                                                        </div>
                                                                                                        <div class="form-check">
                                                                                                            <input class="form-check-input"
                                                                                                                type="radio" name="radio1"
                                                                                                                value="Normas">
                                                                                                            <label
                                                                                                                class="form-check-label">Normas</label>
                                                                                                        </div>
                                                                                                        <div class="form-check">
                                                                                                            <input class="form-check-input"
                                                                                                                type="radio" name="radio1"
                                                                                                                value="Jurisprudencias">
                                                                                                            <label
                                                                                                                class="form-check-label">Jurisprudencias</label>
                                                                                                        </div>
                                                                                                        <div class="form-check">
                                                                                                            <input class="form-check-input"
                                                                                                                type="radio" name="radio1"
                                                                                                                value="Argumentos">
                                                                                                            <label
                                                                                                                class="form-check-label">Argumentos</label>
                                                                                                        </div>
                                                                                                        <div class="form-check">
                                                                                                            <input class="form-check-input"
                                                                                                                type="radio" name="radio1"
                                                                                                                value="Normas">
                                                                                                            <label
                                                                                                                class="form-check-label">Doctrinas</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <hr>
                                                                                                <div class="row d-flex justify-content-center">
                                                                                                    <div
                                                                                                        class="col-12 col-md-8 form-group d-flex justify-content-center">
                                                                                                        <label for="query" class="mr-3"
                                                                                                            style="white-space:nowrap">Busqueda
                                                                                                            Básica</label>
                                                                                                        <input type="text"
                                                                                                            class="form-control query" id="query"
                                                                                                            name="query"
                                                                                                            data_url="{{ route('wiku_busqueda_basica') }}"
                                                                                                            placeholder="Ingrese palabras de busqueda">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="tab-pane fade" id="pills-profile"
                                                                                                role="tabpanel" aria-labelledby="pills-profile-tab">
                                                                                                <div class="row d-flex justify-content-star">
                                                                                                    <div class="col-12 mb-3">
                                                                                                        <h6>Por tipo de wiku...</h6>
                                                                                                    </div>
                                                                                                    <div class="form-group col-12 col-md-4">
                                                                                                        <label class="requerido"
                                                                                                            for="tipo_wiku">Categoria de
                                                                                                            Wiku</label>
                                                                                                        <select
                                                                                                            class="form-control form-control-sm tipo_wiku"
                                                                                                            id="tipo_wiku"
                                                                                                            data_url="{{ route('wiku-cargarargumentos') }}">
                                                                                                            <option value="">---Seleccione Wiku---
                                                                                                            </option>
                                                                                                            <option value="Argumentos">Argumentos
                                                                                                            </option>
                                                                                                            <option value="Normas">Normas</option>
                                                                                                            <option value="Jurisprudencias">
                                                                                                                Jurisprudencias</option>
                                                                                                            <option value="Doctrinas">Doctrinas
                                                                                                            </option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <hr>
                                                                                                <div class="row d-flex justify-content-center">
                                                                                                    <div class="col-12 mb-3">
                                                                                                        <h6>Por área, tema y tema específico...</h6>
                                                                                                    </div>
                                                                                                    <div class="form-group col-12 col-md-4">
                                                                                                        <label for="area_id">Área</label>
                                                                                                        <select
                                                                                                            class="form-control form-control-sm"
                                                                                                            id="area_id"
                                                                                                            data_url="{{ route('cargar_temas') }}">
                                                                                                            <option value="">---Seleccione---
                                                                                                            </option>
                                                                                                            @foreach ($areas as $area)
                                                                                                                <option
                                                                                                                    value="{{ $area->id }}">
                                                                                                                    {{ $area->area }}</option>
                                                                                                            @endforeach
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group col-12 col-md-4">
                                                                                                        <label for="tema_id">Tema</label>
                                                                                                        <select
                                                                                                            class="form-control form-control-sm"
                                                                                                            id="tema_id"
                                                                                                            data_url="{{ route('cargar_temasespec') }}">
                                                                                                            <option value="">Seleccione primero un
                                                                                                                área</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group col-12 col-md-4">
                                                                                                        <label for="wikutemaespecifico_id">Tema
                                                                                                            Específico</label>
                                                                                                        <select
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="wikutemaespecifico_id"
                                                                                                            id="wikutemaespecifico_id">
                                                                                                            <option value="">Seleccione primero un
                                                                                                                Tema</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <hr>
                                                                                                <div class="row">
                                                                                                    <div class="col-12 mb-3">
                                                                                                        <h6>Por fuente, artículo y fecha de entrada
                                                                                                            en vigencia...</h6>
                                                                                                    </div>
                                                                                                    <div class="col-12 col-md-5 form-group">
                                                                                                        <label for="fuente_id">Fuente
                                                                                                            emisora</label>
                                                                                                        <select
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="fuente_id" id="fuente_id"
                                                                                                            data_url="{{ route('cargar_normas') }}">
                                                                                                            <option value="">--- Seleccione ---
                                                                                                            </option>
                                                                                                            @foreach ($fuentes as $fuente)
                                                                                                                <option
                                                                                                                    value="{{ $fuente->id }}">
                                                                                                                    {{ $fuente->fuente }}
                                                                                                                </option>
                                                                                                            @endforeach
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="col-12 col-md-5 form-group">
                                                                                                        <label for="fuente_id">Artículo</label>
                                                                                                        <select
                                                                                                            class="form-control form-control-sm"
                                                                                                            id="id">
                                                                                                            <option value="">Seleccione primero una
                                                                                                                Fuente Emisora</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="col-12 col-md-2 form-group">
                                                                                                        <label for="fecha">Entrada en
                                                                                                            vigencia</label>
                                                                                                        <input type="date"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="fecha" id="fecha"
                                                                                                            max="{{ date('Y-m-d') }}">
                                                                                                    </div>
                                                                                                    <hr>
                                                                                                    <div class="col-12 mb-3">
                                                                                                        <h6>Por asociación servicio / producto..
                                                                                                        </h6>
                                                                                                    </div>
                                                                                                    <div class="form-group col-12 col-md-4">
                                                                                                        <label class="requerido"
                                                                                                            for="prod_serv">Producto /
                                                                                                            Servicio</label>
                                                                                                        <select
                                                                                                            class="form-control form-control-sm"
                                                                                                            id="prod_serv">
                                                                                                            <option value="">---Selecione---
                                                                                                            </option>
                                                                                                            <option value="Producto">Producto
                                                                                                            </option>
                                                                                                            <option value="Servicio">Servicio
                                                                                                            </option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group col-12 col-md-4"
                                                                                                        id="tipo_pqr">
                                                                                                        <label class="requerido"
                                                                                                            for="tipo_p_q_r_id">Tipo de PQR</label>
                                                                                                        <select id="tipo_p_q_r_id"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="tipo_p_q_r_id"
                                                                                                            data_url="{{ route('admin-funcionario-asignacion_particular-cargar_motivo') }}"
                                                                                                            required>
                                                                                                            <option value="">---Seleccione---
                                                                                                            </option>
                                                                                                            @foreach ($tipos_pqr as $tipo_pqr)
                                                                                                                <option
                                                                                                                    value="{{ $tipo_pqr->id }}">
                                                                                                                    {{ $tipo_pqr->tipo }}
                                                                                                                </option>
                                                                                                            @endforeach
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group col-12 col-md-4"
                                                                                                        id="motivo_pqr">
                                                                                                        <label class="requerido"
                                                                                                            for="motivo_id">Motivo de PQR</label>
                                                                                                        <select id="motivo_id"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="motivo_id"
                                                                                                            data_url="{{ route('admin-funcionario-asignacion_particular-cargar_sub_motivo') }}">
                                                                                                            <option value="">---Seleccione---
                                                                                                            </option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group col-12 col-md-4"
                                                                                                        id="sub_motivo_pqr">
                                                                                                        <label class="requerido"
                                                                                                            for="motivo_sub_id">Sub-Motivo de
                                                                                                            PQR</label>
                                                                                                        <select id="motivo_sub_id"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="motivo_sub_id">
                                                                                                            <option value="">---Seleccione---
                                                                                                            </option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group col-12 col-md-4 d-none"
                                                                                                        id="servicios">
                                                                                                        <label for="servicio_id">Servicios</label>
                                                                                                        <select id="servicio_id"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="servicio_id">
                                                                                                            <option value="">---Seleccione un
                                                                                                                servcio---</option>
                                                                                                            @foreach ($servicios as $servicio)
                                                                                                                <option
                                                                                                                    value="{{ $servicio->id }}">
                                                                                                                    {{ $servicio->servicio }}
                                                                                                                </option>
                                                                                                            @endforeach
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group col-12 col-md-4 d-none"
                                                                                                        id="categorias">
                                                                                                        <label class="requerido"
                                                                                                            for="categoria_id">Categoría de
                                                                                                            producto</label>
                                                                                                        <select id="categoria_id"
                                                                                                            class="form-control form-control-sm"
                                                                                                            data_url="{{ route('admin-funcionario-asignacion_particular-cargar_producto') }}"
                                                                                                            name="categoria_id">
                                                                                                            <option value="">---Seleccione---
                                                                                                            </option>
                                                                                                            @foreach ($categorias as $categoria)
                                                                                                                <option
                                                                                                                    value="{{ $categoria->id }}">
                                                                                                                    {{ $categoria->categoria }}
                                                                                                                </option>
                                                                                                            @endforeach
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group col-12 col-md-4 d-none"
                                                                                                        id="productos">
                                                                                                        <label class="requerido"
                                                                                                            for="producto_id">Productos</label>
                                                                                                        <select id="producto_id"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="producto_id"
                                                                                                            data_url="{{ route('admin-funcionario-asignacion_particular-cargar_marca') }}">
                                                                                                            <option value="">---Seleccione primero
                                                                                                                una categoría---</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group col-12 col-md-4 d-none"
                                                                                                        id="marcas">
                                                                                                        <label class="requerido"
                                                                                                            for="marca_id">Marcas</label>
                                                                                                        <select id="marca_id"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="marca_id"
                                                                                                            data_url="{{ route('admin-funcionario-asignacion_particular-cargar_referencia') }}">
                                                                                                            <option value="">---Seleccione primero
                                                                                                                un producto---</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="form-group col-12 col-md-4 d-none"
                                                                                                        id="referencias">
                                                                                                        <label class="requerido"
                                                                                                            for="referencia_id">Referencias</label>
                                                                                                        <select id="referencia_id"
                                                                                                            class="form-control form-control-sm"
                                                                                                            name="referencia_id">
                                                                                                            <option value="">---Seleccione primero
                                                                                                                una marca---</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="form-group col-12 col-md-4 pl-4 d-flex align-items-end">
                                                                                                        <button
                                                                                                            class="btn btn-primary btn-xs btn-sombra pl-5 pr-5 form-control-sm busquedaAvanzada"
                                                                                                            id="btn_buscar"
                                                                                                            data_url="{{ route('wiku_busqueda_avanzada') }}">Buscar</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <hr>
                                                                                        <div class="row justify-content-around coleccionrespuesta"
                                                                                            id="coleccionrespuesta">
                                                                                            <div class="col-md-6  d-none">
                                                                                                <div
                                                                                                    class="card card-primary collapsed-card card-mini-sombra">
                                                                                                    <div class="card-header">
                                                                                                        <div class="user-block">
                                                                                                            <span class="username"><a
                                                                                                                    href="#"
                                                                                                                    id="tituloNoma"></a></span>
                                                                                                            <span class="description"></span>
                                                                                                        </div>
                                                                                                        <div class="card-tools">
                                                                                                            <button type="button"
                                                                                                                class="btn btn-tool"
                                                                                                                data-card-widget="collapse">
                                                                                                                <i class="fas fa-minus"></i>
                                                                                                            </button>
                                                                                                            <button type="button"
                                                                                                                class="btn btn-tool"
                                                                                                                data-card-widget="remove">
                                                                                                                <i class="fas fa-times"></i>
                                                                                                            </button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="card-body">
                                                                                                        <div class="row">
                                                                                                            <div class="col-12">
                                                                                                                <p><strong>Texto:</strong></p>
                                                                                                                <p class="textoCopiar">El
                                                                                                                    Texto...</p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <hr>
                                                                                                        <div class="row">
                                                                                                            <div class="col-12">
                                                                                                                <h6>Criterios Juridicos</h6>
                                                                                                            </div>
                                                                                                            <div class="col-12 table-responsive">
                                                                                                                <table class="table">
                                                                                                                    <thead>
                                                                                                                        <tr>
                                                                                                                            <th>Autor(es)</th>
                                                                                                                            <th>Criterios jurídicos
                                                                                                                                de aplicación</th>
                                                                                                                            <th>Criterios jurídicos
                                                                                                                                de no aplicación
                                                                                                                            </th>
                                                                                                                            <th>Notas de la Vigencia
                                                                                                                            </th>
                                                                                                                        </tr>
                                                                                                                    </thead>
                                                                                                                    <tbody>
                                                                                                                        <tr>
                                                                                                                            <td></td>
                                                                                                                            <td></td>
                                                                                                                            <td></td>
                                                                                                                            <td></td>
                                                                                                                        </tr>
                                                                                                                    </tbody>
                                                                                                                </table>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="card-footer ">
                                                                                                        <div class="row">
                                                                                                            <div class="col-12">
                                                                                                                <button
                                                                                                                    class="btn btn-info btn-xs pl-4 pr-4 agregarTexto">Agregar</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 form-group mt-3">
                                                                        @if ($respuesta->estadorespuestapretension->estado == 100)
                                                                            <div class="respuesta mt-2">
                                                                                @if($respuesta->respuesta)
                                                                                    {!! $respuesta->respuesta !!}
                                                                                @endif
                                                                            </div>
                                                                        @else
                                                                            <textarea type="text"
                                                                                class="form-control form-control-sm respuesta respuesta-editar"
                                                                                rows="6"
                                                                                max>{{ isset($respuesta->respuesta) ? $respuesta->respuesta : '' }}</textarea>
                                                                        @endif
                                                                        
                                                                        @if (isset($respuesta->respuesta))
                                                                            <input class="respuesta_anterior" type="hidden"
                                                                                value="{{ $respuesta->respuesta }}"
                                                                                data_url="{{ route('historial_respuesta_pretension_guardar') }}">
                                                                        @endif
                                                                        <input class="id_respuesta" type="hidden" value="{{ $respuesta->id }}">
                                                                    </div>
                                                                    @if ($respuesta->estadorespuestapretension->estado != 100)
                                                                        <div class="col-12 anexosConsulta">
                                                                            <div class="col-12 d-flex row anexoconsulta">
                                                                                <div class="col-12 titulo-anexo d-flex justify-content-between">
                                                                                    <h6>Anexo</h6>
                                                                                    <button type="button"
                                                                                        class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminaranexoConsulta"><i
                                                                                            class="fas fa-minus-circle"></i> Eliminar
                                                                                        anexo</button>
                                                                                </div>
                                                                                <div class="col-12 col-md-4 form-group titulo-anexoConsulta">
                                                                                    <label for="titulo">Título anexo</label>
                                                                                    <input type="text" class="titulo form-control form-control-sm">
                                                                                </div>
                                                                                <div class="col-12 col-md-4 form-group descripcion-anexoConsulta">
                                                                                    <label for="descripcion">Descripción</label>
                                                                                    <input type="text"
                                                                                        class="descripcion form-control form-control-sm">
                                                                                </div>
                                                                                <div class="col-12 col-md-4 form-group doc-anexoConsulta">
                                                                                    <label for="documento">Anexos o Pruebas</label>
                                                                                    <input class="documento form-control form-control-sm"
                                                                                        type="file">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 d-flex justify-content-end flex-row mb-3">
                                                                            <button class="btn btn-success btn-xs btn-sombra pl-2 pr-2 crearAnexo"
                                                                                id="crearAnexo"><i class="fa fa-plus-circle mr-2"
                                                                                    aria-hidden="true"></i>
                                                                                Añadir
                                                                                otro Anexo</button>
                                                                        </div>
                                                                        <button type="" class="btn btn-primary mx-2 btn-respuesta-pretension-editar col-md-3 col-12"
                                                                            data_url="{{ route('respuesta_pretension_editar_guardar') }}"
                                                                            data_url2="{{ route('respuesta_pretension_anexo_guardar') }}" 
                                                                            data_url3="{{ route('estado_respuesta_pretension_guardar') }}"
                                                                            data_token="{{ csrf_token() }}">Guardar respuesta</button>
                                                                    @endif
                                                                    @if (isset($respuesta))
                                                                        @if (sizeOf($respuesta->documentos))
                                                                            <hr class="my-4">
                                                                            <div class="row respuestaAnexos">
                                                                                <div class="col-12">
                                                                                    <div class="col-12">
                                                                                        <h6>Anexos respuesta</h6>
                                                                                    </div>
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
                                                                                                @foreach ($respuesta->documentos as $anexo)
                                                                                                    <tr>
                                                                                                        <td class="text-justify">
                                                                                                            {{ $anexo->titulo }}
                                                                                                        </td>
                                                                                                        <td class="text-justify">
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
                                                                            <h6 class="">Historial de respuestas</h6>
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
                                                                                            @foreach ($respuesta->historial as $historial)
                                                                                                <tr>
                                                                                                    <td>{{ $historial->created_at }}</td>
                                                                                                    <td class="text-justify">{{ $historial->empleado->nombre1 }} {{ $historial->empleado->apellido1 }}</td>
                                                                                                    <td class="text-justify">{{ strip_tags($historial->historial) }}</td>
                                                                                                </tr>
                                                                                            @endforeach
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                        <hr class="mt-3">
                                                                        <div class="row d-flex px-12 p-3 mensaje-respuesta-pretension"> 
                                                                            <input class="id_respuesta_pretension" type="hidden" value="{{ $respuesta->id }}">
                                                                            <div class="container-mensaje-historial form-group col-12">
                                                                                <label for="" class="">Agregar Historial de respuesta</label>
                                                                                <textarea class="form-control mensaje-historial-respuesta-pretension" rows="3" placeholder="" required></textarea>
                                                                            </div>
                                                                            <div class="col-12 col-md-12 form-group d-flex">
                                                                                <button href="" class="btn btn-primary px-4 guardarHistorialRespuestaPretension" data_url="{{ route('historial_respuesta_pretension_guardar') }}"
                                                                                data_token="{{ csrf_token() }}">Guardar historial</button>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>    
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>

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
                                        @foreach ( $tutela->hechos->sortBy('consecutivo') as $key => $hecho)
                                            <div class="rounded border my-3">
                                                @if (session('id_usuario') == $hecho->empleado_id && $hecho->estadohecho->estado != 100 && !sizeOf($hecho->relacionesHechos) ) 
                                                    <div class="row form-reasignarHecho p-4">
                                                        <div class="col-12 col-md-6 ">
                                                            <h5>Reasignar Hecho</h5>
                                                        </div>
                                                        <div class="col-12 col-md-6 d-flex flex-row">
                                                            <div class="form-check mb-3 mr-4">
                                                                <input type="radio" name='reasignarHecho{{ $key }}'
                                                                    class="form-check-input reasignarHecho reasignarHecho_si"
                                                                    value="1" />
                                                                <label class="form-check-label" for="">SI</label>
                                                            </div>
                                                            <div class="form-check mb-3">
                                                                <input type="radio" name="reasignarHecho{{ $key }}"
                                                                    class="form-check-input reasignarHecho reasignarHecho_no" checked
                                                                    value="0" />
                                                                <label class="form-check-label" for="">NO</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 contentReasignacion d-none" id="contentReasignacion">
                                                            <div class="row d-flex px-4">
                                                                <div class="col-12 col-md-5 form-group">
                                                                    <label for="">Cargo</label>
                                                                    <select class="cargo custom-select rounded-0" required=""
                                                                        data_url="{{ route('cargar_cargos') }}"
                                                                        data_url2="{{ route('cargar_funcionarios') }}">
                                                                    </select>
                                                                </div>
                                                                <div class="col-12 col-md-5 form-group">
                                                                    <label for="">Funcionario</label>
                                                                    <select class="funcionario custom-select rounded-0" required="">
                                                                    </select>
                                                                </div>
                                                                <div class="container-mensaje-historial-hecho form-group col-12">
                                                                    <label for="" class="">Agregar Historial</label>
                                                                    <textarea class="form-control mensaje-historial-hecho"
                                                                        name="container-mensaje-historial-tarea" rows="3" placeholder=""
                                                                        required></textarea>
                                                                </div>
                                                                <div class="col-12 col-md-2 form-group d-flex align-items-end">
                                                                    <button href=""
                                                                        class="btn btn-primary mx-2 px-4 reasignacion_hecho_guardar"
                                                                        data_url="{{ route('asignacion_hecho_guardar') }}"
                                                                        data_token="{{ csrf_token() }}"
                                                                        data_url2="{{ route('historial_hecho_guardar') }}">Asignar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr style="border-top: solid 4px black">
                                                @endif
                                                <div class="col-12 row my-3">
                                                    <div class="col-6 mb-3">
                                                        <h5 class="pl-4">Hecho # {{$hecho->consecutivo}}</h5>
                                                    </div>
                                                    @if (session('id_usuario') == $hecho->empleado_id)
                                                        <div class="col-6 row estado-hecho justify-content-end pb-3">
                                                            <div class="col-2 d-flex mb-2">
                                                                <h6>Avance: {{$hecho->estadohecho->estado}} %</h6>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="col-12">
                                                        <p class="text-justify">{{ $hecho->hecho }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                @if(sizeOf($hecho->historialHechos))
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
                                                                            <td class="text-justify">{{ $historialHecho->empleado->nombre1 }} {{ $historialHecho->empleado->apellido1 }}</td>
                                                                            <td class="text-justify">{{ strip_tags($historialHecho->historial) }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                @endif
                                                @if (session('id_usuario') == $hecho->empleado_id)
                                                    <div class="row d-flex px-12 p-3 mensaje-hecho"> 
                                                        <input class="id_hecho" type="hidden" value="{{ $hecho->id }}">
                                                        <div class="container-mensaje-historial form-group col-12">
                                                            <label for="" class="">Agregar Historial</label>
                                                            <textarea class="form-control mensaje-historial-hecho" rows="3" placeholder="" required></textarea>
                                                        </div>
                                                        <div class="col-12 col-md-12 form-group d-flex">
                                                            <button href="" class="btn btn-primary px-4 guardarHistorialHecho" data_url="{{ route('historial_hecho_guardar') }}"
                                                            data_token="{{ csrf_token() }}">Guardar historial</button>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <input class="id_hecho" type="hidden" value="{{$hecho->id}}">
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
                                        @foreach ( $tutela->pretensiones->sortBy('consecutivo') as $key => $pretension)
                                            <div class="rounded border my-3">
                                                @if (session('id_usuario') == $pretension->empleado_id && $pretension->estadopretension->estado != 100 && !sizeOf($pretension->relacionesPretensiones)) 
                                                    <div class="row form-reasignarPretension p-4">
                                                        <div class="col-12 col-md-6 ">
                                                            <h5>Reasignar Pretensión</h5>
                                                        </div>
                                                        <div class="col-12 col-md-6 d-flex flex-row">
                                                            <div class="form-check mb-3 mr-4">
                                                                <input type="radio" name='reasignarPretension{{ $key }}'
                                                                    class="form-check-input reasignarPretension reasignarPretension_si"
                                                                    value="1" />
                                                                <label class="form-check-label" for="">SI</label>
                                                            </div>
                                                            <div class="form-check mb-3">
                                                                <input type="radio" name="reasignarPretension{{ $key }}"
                                                                    class="form-check-input reasignarPretension reasignarPretension_no" checked
                                                                    value="0" />
                                                                <label class="form-check-label" for="">NO</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 contentReasignacion d-none" id="contentReasignacion">
                                                            <div class="row d-flex px-4">
                                                                <div class="col-12 col-md-5 form-group">
                                                                    <label for="">Cargo</label>
                                                                    <select class="cargo custom-select rounded-0" required=""
                                                                        data_url="{{ route('cargar_cargos') }}"
                                                                        data_url2="{{ route('cargar_funcionarios') }}">
                                                                    </select>
                                                                </div>
                                                                <div class="col-12 col-md-5 form-group">
                                                                    <label for="">Funcionario</label>
                                                                    <select class="funcionario custom-select rounded-0" required="">
                                                                    </select>
                                                                </div>
                                                                <div class="container-mensaje-historial-pretension form-group col-12">
                                                                    <label for="" class="">Agregar Historial</label>
                                                                    <textarea class="form-control mensaje-historial-pretension"
                                                                        name="container-mensaje-historial-tarea" rows="3" placeholder=""
                                                                        required></textarea>
                                                                </div>
                                                                <div class="col-12 col-md-2 form-group d-flex align-items-end">
                                                                    <button href=""
                                                                        class="btn btn-primary mx-2 px-4 reasignacion_pretension_guardar"
                                                                        data_url="{{ route('asignacion_pretension_guardar') }}"
                                                                        data_token="{{ csrf_token() }}"
                                                                        data_url2="{{ route('historial_pretension_guardar') }}">Asignar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr style="border-top: solid 4px black">
                                                @endif

                                                <div class="col-12 row my-3">
                                                    <div class="col-6 mb-3">
                                                        <h5 class="pl-4">Pretensión # {{$pretension->consecutivo}}</h5>
                                                    </div>
                                                    @if (session('id_usuario') == $pretension->empleado_id)
                                                        <div class="col-6 row estado-pretension justify-content-end pb-3">
                                                            <div class="col-2 d-flex mb-2">
                                                                <h6>Avance: {{$pretension->estadopretension->estado}} %</h6>
                                                            </div>
                                                        </div>
                                                    @endif  
                                                    <div class="col-12">
                                                        <p class="text-justify">{{ $pretension->pretension }}</p>
                                                    </div>
                                                </div>
                                                @if(sizeOf($pretension->historialPretensiones))
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
                                                                            <td class="text-justify">{{ $historialPretension->empleado->nombre1 }} {{ $historialPretension->empleado->apellido1 }}</td>
                                                                            <td class="text-justify">{{ strip_tags($historialPretension->historial) }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                @endif
                                                @if (session('id_usuario') == $pretension->empleado_id)
                                                    <div class="row d-flex px-12 p-3 mensaje-pretension"> 
                                                        <input class="id_pretension" type="hidden" value="{{ $pretension->id }}">
                                                        <div class="container-mensaje-historial form-group col-12">
                                                            <label for="" class="">Agregar Historial</label>
                                                            <textarea class="form-control mensaje-historial-pretension" rows="3" placeholder="" required></textarea>
                                                        </div>
                                                        <div class="col-12 col-md-12 form-group d-flex">
                                                            <button href="" class="btn btn-primary px-4 guardarHistorialPretension" data_url="{{ route('historial_pretension_guardar') }}"
                                                            data_token="{{ csrf_token() }}">Guardar historial</button>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <input class="id_pretension" type="hidden" value="{{$pretension->id}}">
                                        @endforeach  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="{{ route('tutela-gestion') }}" class="btn btn-danger mx-2 px-4">Regresar</a>
                        </div>
                        <input class="id_auto_admisorio" type="hidden" value="{{ $tutela->id }}">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/tutela/gestion_colaboracion.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endsection
<!-- ************************************************************* -->
