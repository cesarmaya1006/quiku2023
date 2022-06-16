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
                        <h3 class="card-title">Gestión a PQR Número de radicado:
                            <strong>{{ $pqr->radicado }}</strong>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="col-12 rounded border mb-3 p-2">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    @if ($pqr->persona_id != null)
                                        Persona que interpone la Petición:
                                        <strong>{{ $pqr->persona->nombre1 .' ' .$pqr->persona->nombre2 .' ' .$pqr->persona->apellido1 .' ' .$pqr->persona->apellido2 }}</strong>
                                    @else
                                        Empresa que interpone la Petición:
                                        <strong>{{ $pqr->empresa->razon_social .' ' .$pqr->empresa->razon_social .' ' .$pqr->empresa->razon_social .' ' .$pqr->empresa->razon_social }}</strong>
                                    @endif
                                </div>
                                @if ($pqr->adquisicion)
                                    <div class="col-12 col-md-6">
                                        Lugar de adquisición del producto o servicio:
                                        <strong>{{ $pqr->adquisicion }}</strong>
                                    </div>
                                @endif
                                @if ($pqr->tipo)
                                    <div class="col-12 col-md-6">
                                        Tipo petición: <strong>{{ $pqr->tipo }}</strong>
                                    </div>
                                @endif
                                @if ($pqr->sede)
                                    <div class="col-12 col-md-6">
                                        Departatmento :
                                        <strong>{{ $pqr->sede->municipio->departamento->departamento }}</strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        Municipio : <strong>{{ $pqr->sede->municipio->municipio }}</strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        Sede : <strong>{{ $pqr->sede->nombre }}</strong>
                                    </div>
                                @endif
                                @if ($pqr->tipo == 'Producto')
                                    <div class="col-12 col-md-6">
                                        Categoria :
                                        <strong>{{ $pqr->referencia->marca->producto->categoria->categoria }}</strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        producto : <strong>{{ $pqr->referencia->marca->producto->producto }}</strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        Marca : <strong>{{ $pqr->referencia->marca->marca }}</strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        Referencia : <strong>{{ $pqr->referencia->referencia }}</strong>
                                    </div>
                                @endif
                                @if ($pqr->servicio)
                                    <div class="col-12 col-md-6">
                                        Servicio : <strong>{{ $pqr->servicio->servicio }}</strong>
                                    </div>
                                @endif
                                @if ($pqr->factura)
                                    <div class="col-12 col-md-6">
                                        Número de factura: <strong>{{ $pqr->factura }}</strong>
                                    </div>
                                @endif
                                @if ($pqr->fecha_factura)
                                    <div class="col-12 col-md-6">
                                        Fecha de factura: <strong>{{ $pqr->fecha_factura }}</strong>
                                    </div>
                                @endif
                                @if ($pqr->fecha_radicado)
                                    <div class="col-12 col-md-6">
                                        Fecha de radicado: <strong>{{ $pqr->fecha_generacion }}</strong>
                                    </div>
                                @endif
                                @if ($pqr->estadospqr_id < 6)
                                    <div class="col-12 col-md-6">
                                        Fecha estimada de respuesta:
                                        <strong>{{ date('Y-m-d', strtotime($pqr->fecha_generacion . '+ ' . $pqr->tiempo_limite . ' days')) }}</strong>
                                    </div>
                                @endif
                                <div class="col-12 col-md-6">
                                    Estado: <strong>{{ $pqr->estado->estado_usuario }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Prioridad: <strong>{{ $pqr->prioridad->prioridad }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    {{-- Porcentaje PQR: <strong>{{ ( $pqr->peticiones->count() / ($pqr->peticiones->sum('estado_id') - $pqr->peticiones->count()) * 100  )}} %</strong> --}}
                                </div>
                                @if (!sizeOf($pqr->peticiones->where('recurso_dias', '0')))
                                    <div class="col-12 col-md-6">
                                        Procede recurso: <strong>Si</strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        Plazo días recurso: <strong>{{ $pqr->peticiones->max('recurso_dias') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @if ($pqr->persona_id)
                            @if (!$pqr->persona->email)
                                <div class="col-12 rounded border border-danger mb-4 p-3">
                                    <div class="row">
                                        <h6 class="text-danger pl-2">el usuario no posee correo electrónico se debe enviar
                                            correo físico.</h6>
                                        <div class="col-12 col-md-6">
                                            <strong>Nombre:</strong>
                                            {{ $pqr->persona->nombre1 .' ' .$pqr->persona->nombre2 .' ' .$pqr->persona->apellido1 .' ' .$pqr->persona->apellido2 }}
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <strong>Teléfono:</strong> {{ $pqr->persona->telefono_celu }}
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <strong>Dirección:</strong> {{ $pqr->persona->direccion }}
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <strong>Departatmento:</strong>
                                            {{ $pqr->persona->municipio->departamento->departamento }}
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <strong>Ciudad:</strong> {{ $pqr->persona->municipio->municipio }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                        <hr style="border-top: solid 4px black">
                        <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
                            <div class="card-header">
                                <h3 class="card-title font-weight-bold">Prórroga y Prioridad</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body" style="display: none;">
                                @if ($pqr->prorroga_dias)
                                    <div class="menu-card-prorroga menu-card rounded border mb-3 p-2 ">
                                        <div class="col-12 col-md-6 ">
                                            <h5>Prórroga</h5>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            Días de prórroga: <strong>{{ $pqr->prorroga_dias }} </strong>
                                        </div>
                                        <div class="col-12 col-md-6 mt-2">
                                            <strong>
                                                <a href="{{ route('prorrogaPdf', ['id' => $pqr->id]) }}" target="_blank"
                                                    rel="noopener noreferrer">
                                                    <i class="fa fa-download" aria-hidden="true"></i> Descargar Radicado
                                                    Prórroga</a>
                                            </strong>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-12 rounded border mb-3 p-2 pt-3">
                                    <div class="row d-flex px-4">
                                        <div class="col-12 col-md-5 form-group">
                                            <label for="">Prioridad</label>
                                            <select class="custom-select rounded-0" id="prioridad" required>
                                                @foreach ($estadoPrioridad as $prioridad)
                                                    <option value="{{ $prioridad->id }}"
                                                        {{ $pqr->prioridad->id == $prioridad->id ? 'selected' : '' }}>
                                                        {{ $prioridad->prioridad }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-4 form-group d-flex align-items-end">
                                            <button href="" class="btn btn-primary mx-2 px-4" id="prioridad_guardar"
                                                data_url="{{ route('prioridad_guardar') }}"
                                                data_token="{{ csrf_token() }}">Guardar prioridad</button>
                                        </div>
                                    </div>
                                    @if ($pqr->estadospqr_id < 6 && $pqr->prorroga == 0)
                                        <hr>
                                        <div class="row px-4 form-respuestaProrroga">
                                            <input class="respuestaProrroga" type="hidden" value="{{ $pqr->prorroga }}">
                                            <div class="col-12 col-md-6 ">
                                                <h6>Prórroga</h6>
                                            </div>
                                            <div class="col-12 col-md-6 d-flex flex-row">
                                                <div class="form-check mb-3 mr-4">
                                                    <input id="" name="prorroga" type="radio" class="form-check-input prorroga_si"
                                                        value="1" />
                                                    <label id="_label" class="form-check-label" for="">SI</label>
                                                </div>
                                                <div class="form-check mb-3">
                                                    <input id="" name="prorroga" type="radio" class="form-check-input prorroga_no"
                                                        value="0" />
                                                    <label id="_label" class="form-check-label" for="">NO</label>
                                                </div>
                                            </div>
                                            <div class="col-12 contentProrroga" id="contentProrroga">
                                                <div class="col-12 d-flex row">
                                                    <div class="col-12 form-group">
                                                        <label for="plazo" class="col-md-6">Plazo prórroga días
                                                            hábiles:</label>
                                                        <input type="number"
                                                            class="form-control form-control-sm plazo_prorroga col-md-3"
                                                            name="plazo_prorroga" id="plazo_prorroga" min="1"
                                                            max="{{ $pqr->tipoPqr->tiempos * 2 }}">
                                                        <p>El máximo de días de prórroga es: {{ $pqr->tipoPqr->tiempos * 2 }}</p>
                                                    </div>
                                                    <div class="col-12 d-flex row mb-2">
                                                        <label for="prorroga_pdf">Justificacion de prórroga</label>
                                                        <textarea type="text" class="form-control form-control-sm prorroga_pdf" name="prorroga_pdf"
                                                            id="prorroga_pdf">{{ $pqr->prorroga_pdf }}</textarea>
                                                    </div>
                                                </div>
                                                @if ($pqr->estadospqr_id < 6 && $pqr->prorroga == 0)
                                                    <div class="" id="guardarProrroga">
                                                        <button type="" class="btn btn-primary"
                                                            data_url="{{ route('prorroga_guardar') }}"
                                                            data_token="{{ csrf_token() }}">Guardar prórroga</button>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <hr>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
                            <div class="card-header">
                                <h3 class="card-title font-weight-bold">Peticiones</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body" style="display: none;">
                                @foreach ($pqr->peticiones as $key => $peticion)
                                    <div class="card card-outline card-primary collapsed-card mx-1 py-2">
                                        <div class="card-header">
                                            <h3 class="card-title font-weight-bold">Petición # {{ $key + 1 }}</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body" style="display: none;">
                                            <div class="col-12 row estado-peticion justify-content-end mb-3">
                                                <div class="col-2 d-flex mb-2">
                                                    <h6>Avance:</h6>
                                                </div>
                                                <select class="custom-select rounded-0 estadoPeticion col-2">
                                                    @foreach ($estados as $estado)
                                                        <option value="{{ $estado->id }}"
                                                            {{ $peticion->estadopeticion->id == $estado->id ? 'selected' : '' }}>
                                                            {{ $estado->estado }} %</option>
                                                    @endforeach
                                                </select>
                                                <button type="" class="btn btn-primary btn-estado col-2 mx-2"
                                                    data_url="{{ route('estado_guardar') }}"
                                                    data_token="{{ csrf_token() }}"><span style="font-size: 1em;"><i
                                                            class="far fa-save"></i></span></button>
                                            </div>
                                            <hr>
                                            @if ($peticion->motivo_sub_id)
                                                <div class="row">
                                                    <div class="col-12 col-lg-6">
                                                        <p class="text-justify"><strong>Categoría Motivo:</strong>
                                                            {{ $peticion->motivo->motivo->motivo }}</p>
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <p class="text-justify"><strong>Sub - Categoría Motivo:</strong>
                                                            {{ $peticion->motivo->sub_motivo }}</p>
                                                    </div>
                                                    @if ($peticion->otro)
                                                        <p class="text-justify"><strong>Otro:</strong> {{ $peticion->otro }}
                                                        </p>
                                                    @endif
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Solicitud:</strong>
                                                            {{ $peticion->justificacion }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                            @endif
                                            @if ($peticion->consulta)
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Consulta:</strong>
                                                            {{ $peticion->consulta }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                            @endif
                                            @if ($peticion->tiposolicitud)
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Tipo de solicitud:</strong>
                                                            {{ $peticion->tiposolicitud }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Datos personales objeto de la
                                                                solicitud:</strong> {{ $peticion->datossolicitud }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Descripción de la solicitud:</strong>
                                                            {{ $peticion->descripcionsolicitud }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                            @endif
                                            @if ($peticion->peticion)
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Tipo de petición:</strong>
                                                            {{ $peticion->peticion }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Documento o información
                                                                requerida:</strong> {{ $peticion->indentifiquedocinfo }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Justificacion:</strong>
                                                            {{ $peticion->justificacion }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                            @endif
                                            @if ($peticion->irregularidad)
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Tipo de irregularidad:</strong>
                                                            {{ $peticion->irregularidad }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                            @endif
                                            @if ($peticion->felicitacion)
                                                @if ($peticion->nombre_funcionario)
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <p class="text-justify"><strong>Nombre de funcionario:</strong>
                                                                {{ $peticion->nombre_funcionario }}</p>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Felicitaciones:</strong>
                                                            {{ $peticion->felicitacion }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                            @endif
                                            @if ($peticion->hechos)
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6>Hechos</h6>
                                                    </div>
                                                    <div class="col-12">
                                                        <ul>
                                                            @foreach ($peticion->hechos as $hecho)
                                                                <li>
                                                                    <p class="text-justify">{{ $hecho->hecho }}</p>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                                <hr>
                                            @endif
                                            @if (sizeof($peticion->anexos))
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6>Anexos</h6>
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
                                                                @foreach ($peticion->anexos as $anexo)
                                                                    <tr>
                                                                        <td class="text-justify">{{ $anexo->titulo }}</td>
                                                                        <td class="text-justify">{{ $anexo->descripcion }}
                                                                        </td>
                                                                        <td><a href="{{ asset('documentos/pqr/' . $anexo->url) }}"
                                                                                target="_blank"
                                                                                rel="noopener noreferrer">Descargar</a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <hr>
                                            @endif
                                            @if (sizeOf($peticion->aclaraciones))
                                                <div class="row menu-card-aclaraciones menu-card">
                                                    <div class="col-12">
                                                        <h6>Aclaraciones</h6>
                                                    </div>
                                                    <div class="col-12 table-responsive">
                                                        <table class="table table-light" style="font-size: 0.8em;">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Fecha Sol Aclaración</th>
                                                                    <th scope="col">Aclaracion</th>
                                                                    <th scope="col">Fecha Resp.</th>
                                                                    <th scope="col">Respuesta</th>
                                                                    <th scope="col">Documento</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($peticion->aclaraciones as $aclaracion)
                                                                    @if ($aclaracion->respuesta != '')
                                                                        <tr>
                                                                            <td>{{ $aclaracion->fecha }}</td>
                                                                            <td class="text-justify">{{ $aclaracion->aclaracion }}
                                                                            </td>
                                                                            <td>{{ $aclaracion->fecha_respuesta }}</td>
                                                                            <td class="text-justify">{{ $aclaracion->respuesta }}
                                                                            </td>
                                                                            @if ($aclaracion->anexos)
                                                                                <td>
                                                                                    @foreach ($aclaracion->anexos as $anexo)
                                                                                        <a href="{{ asset('documentos/respuestas/' . $anexo->url) }}"
                                                                                            target="_blank"
                                                                                            rel="noopener noreferrer">{{ $anexo->titulo }}</a>
                                                                                    @endforeach
                                                                                </td>
                                                                            @else
                                                                                <td>---</td>
                                                                            @endif
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        <hr class="mt-5">
                                                    </div>
                                                </div>
                                            @endif
                                            <br>
                                            @if (isset($peticion->respuesta->respuesta))
                                                <div class="menu-card-recursos menu-card">
                                                    <div class="col-12 row mb-2">
                                                        <div class="col-6">
                                                            <h5>Respuesta petición</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 form-group">
                                                        <div class="respuesta mt-2">
                                                            {!! $peticion->respuesta->respuesta !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                @if (sizeOf($peticion->respuesta->documentos))
                                                    <div class="row respuestaAnexos">
                                                        <div class="col-12">
                                                            <div class="col-12">
                                                                <h6>Anexos respuesta petición</h6>
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
                                                                        @foreach ($peticion->respuesta->documentos as $anexo)
                                                                            <tr>
                                                                                <td class="text-justify">{{ $anexo->titulo }}
                                                                                </td>
                                                                                <td class="text-justify">
                                                                                    {{ $anexo->descripcion }}
                                                                                </td>
                                                                                <td><a href="{{ asset('documentos/respuestas/' . $anexo->url) }}"
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
                                            @endif

                                            @if (sizeOf($peticion->recursos))
                                                <div class="menu-card-recursos menu-card">
                                                    <div class="row card-recursos">
                                                        <div class="col-12">
                                                            <h6>Recursos</h6>
                                                        </div>
                                                        <div class="col-12 table-responsive">
                                                            <table class="table table-light" style="font-size: 0.8em;">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Fecha recurso</th>
                                                                        <th scope="col">Tipo de recurso</th>
                                                                        <th scope="col">Recurso</th>
                                                                        <th scope="col">Documentos recurso</th>
                                                                        <th scope="col">Fecha respuesta recurso</th>
                                                                        <th scope="col">Respuesta recurso</th>
                                                                        <th scope="col">Descripción archvio</th>
                                                                        <th scope="col">Documento respuesta recurso</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($peticion->recursos as $recurso)
                                                                        <tr>
                                                                            <td>{{ $recurso->fecha_radicacion }}</td>
                                                                            <td class="text-justify">
                                                                                {{ $recurso->tiporeposicion->tipo }}</td>
                                                                            <td class="text-justify">{{ $recurso->recurso }}</td>
                                                                            @if ($recurso->documentos)
                                                                                <td>
                                                                                    @foreach ($recurso->documentos as $anexo)
                                                                                        <a href="{{ asset('documentos/respuestas/' . $anexo->url) }}"
                                                                                            target="_blank"
                                                                                            rel="noopener noreferrer">{{ $anexo->titulo }}</a>
                                                                                    @endforeach
                                                                                </td>
                                                                            @else
                                                                                <td></td>
                                                                            @endif
                                                                            @if ($recurso->respuestarecurso)
                                                                                <td>{{ $recurso->respuestarecurso->fecha }}</td>
                                                                            @else
                                                                                <td></td>
                                                                            @endif
                                                                            @if ($recurso->respuestarecurso)
                                                                                <td>{{ strip_tags($recurso->respuestarecurso->respuesta) }}
                                                                                </td>
                                                                            @else
                                                                                <td></td>
                                                                            @endif
                                                                            <td>
                                                                                @if ($recurso->respuestarecurso)
                                                                                    @foreach ($recurso->respuestarecurso->documentos as $anexoRespuesta)
                                                                                        {{ strip_tags($anexoRespuesta->descripcion) }}
                                                                                    @endforeach
                                                                                @endif
                                                                            </td>
                                                                            <td>
                                                                                @if ($recurso->respuestarecurso)
                                                                                    @foreach ($recurso->respuestarecurso->documentos as $anexoRespuesta)
                                                                                        <a href="{{ asset('documentos/respuestas/' . $anexoRespuesta->url) }}"
                                                                                            target="_blank"
                                                                                            rel="noopener noreferrer">{{ $anexoRespuesta->titulo }}</a>
                                                                                    @endforeach
                                                                                @endif
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
                                            <h5 class="">Historial petición</h5>
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
                                                            @foreach ($peticion->historialpeticiones as $historial)
                                                                <tr>
                                                                    <td>{{ $historial->created_at }}</td>
                                                                    <td class="text-justify">{{ $historial->empleado->nombre1 }}
                                                                        {{ $historial->empleado->apellido1 }}</td>
                                                                    <td class="text-justify">
                                                                        {{ strip_tags($historial->historial) }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row d-flex px-12 p-3 mensaje-peticion">
                                                <input class="id_peticion" type="hidden" value="{{ $peticion->id }}">
                                                <div class="container-mensaje-historial form-group col-12">
                                                    <label for="" class="">Agregar Historial</label>
                                                    <textarea class="form-control mensaje-historial-peticion" rows="3" placeholder="" required></textarea>
                                                </div>
                                                <div class="col-12 col-md-12 form-group d-flex">
                                                    <button href="" class="btn btn-primary px-4 guardarHistorialPeticion"
                                                        data_url="{{ route('historial_peticion_guardar') }}"
                                                        data_token="{{ csrf_token() }}">Guardar historial</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <input class="id_pqr" id="id_pqr" name="id_pqr" type="hidden" value="{{ $pqr->id }}">

                        @if ($pqr->peticiones)
                            <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
                                <div class="card-header">
                                    <h3 class="card-title font-weight-bold">Gestión Peticiones</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: none;">
                                    <h6 class="">Porcentaje de avance peticiones</h6>
                                    <div class="col-12 table-responsive d-flex justify-content-center">
                                        <table class="table table-striped col-12" style="font-size: 0.8em;">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Petición #</th>
                                                    <th scope="col">Funcionario</th>
                                                    <th scope="col">Porcentaje</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pqr->peticiones as $key => $peticion)
                                                    <tr>
                                                        @if ($peticion->empleado)
                                                            <td class="text-success font-weight-bold">{{ $key + 1 }}</td>
                                                            <td class="text-success font-weight-bold">{{ $peticion->empleado->nombre1 }}
                                                                {{ $peticion->empleado->apellido1 }}</td>
                                                            <td class="text-success font-weight-bold">{{ $peticion->estadopeticion->estado }}%</td>
                                                        @else
                                                            <td class="text-danger font-weight-bold">{{ $key + 1 }}</td>
                                                            <td class="text-danger font-weight-bold">Sin asignar</td>
                                                            <td class="text-danger font-weight-bold">{{ $peticion->estadopeticion->estado }}%</td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr>
                                    <h5 class="">Reasignación Peticiones</h5>
                                    <div class="row d-flex px-4">
                                        <div class="col-12 col-md-12 form-group mt-3">
                                            <div class="form-check mb-4">
                                                <input type="checkbox"
                                                    class="form-check-input check-todos-peticiones">
                                                <label class="form-check-label"><strong>Seleccionar todos las
                                                        peticiones</strong></label>
                                            </div>
                                            @foreach ($pqr->peticiones as $key => $peticion)
                                                <div class="form-check form-check-inline">
                                                    @if ($peticion->estadopeticion->estado == 0)
                                                        <input type="checkbox"
                                                            class="form-check-input select-peticion"
                                                            value="{{ $peticion->id }}">
                                                        <label
                                                            class="form-check-label"><strong>#{{ $key + 1 }}</strong></label>
                                                    @else
                                                        <input type="checkbox"
                                                            class="form-check-input select-peticion" disabled>
                                                        <label
                                                            class="form-check-label"><strong>#{{ $key + 1 }}</strong></label>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-12 col-md-5 form-group">
                                            <label for="">Cargo</label>
                                            <select name="cargo" id="cargo" class="cargo custom-select rounded-0" required=""
                                                data_url="{{ route('cargar_cargos') }}"
                                                data_url2="{{ route('cargar_funcionarios') }}">
                                                <option value="">--Seleccione--</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-5 form-group">
                                            <label for="">Funcionario</label>
                                            <select name="funcionario" id="funcionario" class="funcionario custom-select rounded-0"
                                                required="">
                                                <option value="">--Seleccione--</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-4 form-group d-flex align-items-end">
                                            <button href=""
                                                class="btn btn-primary mx-2 px-4 asignacion_peticion_guardar"
                                                data_url="{{ route('asignacion_peticion_guardar') }}"
                                                data_token="{{ csrf_token() }}">Asignar pretensión</button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>

                            <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
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
                                                    @foreach ($pqr->historialtareas as $historial)
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
                                        <input class="id_tarea" id="id_tarea" name="id_tarea" type="hidden" value="2">
                                        <div class="container-mensaje-historial-tarea form-group col-12">
                                            <label for="" class="">Agregar Historial</label>
                                            <textarea class="form-control" rows="3" placeholder="" name="mensaje-historia-tarea" id="mensaje-historial-tarea"
                                                required></textarea>
                                        </div>
                                        <div class="col-12 col-md-12 form-group d-flex">
                                            <button href="" class="btn btn-primary px-4" id="guardarHistorialTarea"
                                                data_url="{{ route('historial_tarea_guardar') }}"
                                                data_token="{{ csrf_token() }}">Guardar Historial</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if (sizeOf($pqr->anexos))
                                <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold">VER PROYECTO DE RESPUESTA PQR </h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                        <div class="rounded border m-3 p-2">
                                            <h5 class="">VER PROYECTO DE RESPUESTA PQR</h5>
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
                                                                    <td class="text-justify">{{ $anexo->empleado->nombre1 }}
                                                                        {{ $anexo->empleado->apellido1 }}</td>
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
                                                                    <td class="text-justify"><a
                                                                            href="{{ asset('documentos/tareas/' . $anexo->url) }}"
                                                                            target="_blank" rel="noopener noreferrer"><i
                                                                                class="fa fa-download" aria-hidden="true"></i></a></td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (($pqr->peticiones->sum('estado_id') / $pqr->peticiones->count() / 11) * 100 == 100)
                                @if ($pqr->estadospqr_id < 6)
                                    <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
                                        <div class="card-header">
                                            <h3 class="card-title font-weight-bold">Resuelve</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body" style="display: none;">
                                            <div class="rounded border m-3 p-2">
                                                <h5 class="mt-2">Resuelve</h5>
                                                @if (sizeof($pqr->resuelves))
                                                    <div class="row d-flex px-12 p-3">
                                                        <div class="col-12 table-responsive">
                                                            <table class="table table-light" style="font-size: 0.8em;">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Orden</th>
                                                                        <th scope="col">Fecha</th>
                                                                        <th scope="col">Empleado</th>
                                                                        <th scope="col">Resuelve</th>
                                                                        <th scope="col">Opciones</th>
                                                                    </tr>
                                                                </thead>
                                                                @php
                                                                    $totalResuelves = $pqr->resuelves->count();
                                                                @endphp
                                                                <tbody class="orden-resuelve">
                                                                    @foreach ($pqr->resuelves as $key => $resuelve)
                                                                        <tr>
                                                                            <td>{{ $resuelve->orden }}</td>
                                                                            <td>{{ $resuelve->created_at }}</td>
                                                                            <td class="text-justify">
                                                                                {{ $resuelve->empleado->nombre1 }}
                                                                                {{ $resuelve->empleado->apellido1 }}</td>
                                                                            <td class="text-justify contenido-resuelve">
                                                                                {{ strip_tags($resuelve->resuelve) }} <input
                                                                                    type="hidden" value="{{ $resuelve->resuelve }}">
                                                                            </td>
                                                                            <td class="text-justify">
                                                                                <div class="col-12 d-flex">
                                                                                    <button type="button"
                                                                                        class="btn btn-warning btn-xs btn-sombra editarResuelveRecurso py-1 px-2 mx-1 col-4"
                                                                                        data-toggle="modal" data-target=".bd-resuelve"
                                                                                        value="{{ $resuelve->id }}"><i
                                                                                            class="fas fa-edit editarResuelveRecurso-i"></i></button>
                                                                                    <button type="button"
                                                                                        class="btn btn-danger btn-xs btn-sombra eliminarResuelve py-1 px-2 mx-1 col-4"
                                                                                        data_url="{{ route('historial_resuelve_eliminar') }}"
                                                                                        data_token="{{ csrf_token() }}"
                                                                                        value="{{ $resuelve->id }}"><i
                                                                                            class="far fa-trash-alt"></i></button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                                <tbody class="editar-orden-resuelve d-none">
                                                                    @foreach ($pqr->resuelves as $key => $resuelve)
                                                                        <tr>
                                                                            <td class="td-orden">
                                                                                <select class="select-orden">
                                                                                    @for ($i = 1; $i < $totalResuelves + 1; $i++)
                                                                                        <option value="{{ $i }}"
                                                                                            {{ $i == $resuelve->orden ? 'selected' : '' }}>
                                                                                            {{ $i }}</option>
                                                                                    @endfor
                                                                                </select>
                                                                            </td>
                                                                            <td>{{ $resuelve->created_at }}</td>
                                                                            <td class="text-justify">
                                                                                {{ $resuelve->empleado->nombre1 }}
                                                                                {{ $resuelve->empleado->apellido1 }}</td>
                                                                            <td class="text-justify contenido-resuelve">
                                                                                {{ strip_tags($resuelve->resuelve) }}</td>
                                                                            <td class="text-justify">
                                                                                <div class="col-12 d-flex">
                                                                                    <button type="button"
                                                                                        class="btn btn-warning btn-xs btn-sombra editarResuelve py-1 px-2 mx-1 col-4"
                                                                                        data-toggle="modal" data-target=".bd-resuelve"
                                                                                        value="{{ $resuelve->id }}" disabled><i
                                                                                            class="fas fa-edit editarResuelve-i"></i></button>
                                                                                    <button type="button"
                                                                                        class="btn btn-danger btn-xs btn-sombra eliminarResuelve py-1 px-2 mx-1 col-4"
                                                                                        data_url="{{ route('historial_resuelve_eliminar') }}"
                                                                                        data_token="{{ csrf_token() }}"
                                                                                        value="{{ $resuelve->id }}" disabled><i
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
                                                                        data_url="{{ route('resuelve_orden_guardar') }}"
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
                                                                            class="btn btn-primary editarResuelveGuardar"
                                                                            data_url="{{ route('historial_resuelve_editar') }}"
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
                                                        <label for="" class="col-10">Nuevo resuelve</label>
                                                        <textarea class="form-control mensaje-resuelve mt-2" rows="3" placeholder="" required></textarea>
                                                    </div>

                                                    <div class="row d-flex px-12 p-3">
                                                        <div class="col-12 col-md-12 form-group d-flex">
                                                            <button href="" class="btn btn-primary mx-2 px-4 btn-pqr-resuelve"
                                                                data_url="{{ route('historial_resuelve_guardar') }}"
                                                                data_token="{{ csrf_token() }}">Crear resuelve</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
                                        <div class="card-header">
                                            <h3 class="card-title font-weight-bold">Resuelve Recurso</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body" style="display: none;">
                                            <div class="rounded border m-3 p-2">
                                                <h5 class="mt-2">Resuelve Recurso</h5>
                                                @php
                                                    if ($pqr->recurso_aclaracion && !sizeOf($pqr->anexos->where('tipo_respuesta', 1))) {
                                                        $recursosRevision = $pqr->resuelvesrecursos->where('tipo_reposicion_id', 1);
                                                    } elseif ($pqr->recurso_reposicion && !sizeOf($pqr->anexos->where('tipo_respuesta', 2))) {
                                                        $recursosRevision = $pqr->resuelvesrecursos->where('tipo_reposicion_id', 2);
                                                    } elseif ($pqr->recurso_apelacion && !sizeOf($pqr->anexos->where('tipo_respuesta', 3))) {
                                                        $recursosRevision = $pqr->resuelvesrecursos->where('tipo_reposicion_id', 3);
                                                    } else {
                                                        $recursosRevision = 0;
                                                    }
                                                @endphp
                                                @if (sizeof($recursosRevision))
                                                    <div class="row d-flex px-12 p-3">
                                                        <div class="col-12 table-responsive">
                                                            <table class="table table-light" style="font-size: 0.8em;">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Orden</th>
                                                                        <th scope="col">Fecha</th>
                                                                        <th scope="col">Empleado</th>
                                                                        <th scope="col">Resuelve</th>
                                                                        <th scope="col">Opciones</th>
                                                                    </tr>
                                                                </thead>
                                                                @php
                                                                    $totalResuelves = $recursosRevision->count();
                                                                @endphp
                                                                <tbody class="orden-resuelve">
                                                                    @foreach ($recursosRevision as $key => $resuelve)
                                                                        <tr>
                                                                            <td>{{ $resuelve->orden }}</td>
                                                                            <td>{{ $resuelve->created_at }}</td>
                                                                            <td class="text-justify">
                                                                                {{ $resuelve->empleado->nombre1 }}
                                                                                {{ $resuelve->empleado->apellido1 }}</td>
                                                                            <td class="text-justify contenido-resuelve">
                                                                                {{ strip_tags($resuelve->resuelve) }} <input
                                                                                    type="hidden" value="{{ $resuelve->resuelve }}">
                                                                            </td>
                                                                            <td class="text-justify">
                                                                                <div class="col-12 d-flex">
                                                                                    <button type="button"
                                                                                        class="btn btn-warning btn-xs btn-sombra editarResuelveRecurso py-1 px-2 mx-1 col-4"
                                                                                        data-toggle="modal" data-target=".bd-resuelve"
                                                                                        value="{{ $resuelve->id }}"><i
                                                                                            class="fas fa-edit editarResuelveRecurso-i"></i></button>
                                                                                    <button type="button"
                                                                                        class="btn btn-danger btn-xs btn-sombra eliminarResuelveRecurso py-1 px-2 mx-1 col-4"
                                                                                        data_url="{{ route('historial_resuelve_recurso_eliminar') }}"
                                                                                        data_token="{{ csrf_token() }}"
                                                                                        value="{{ $resuelve->id }}"><i
                                                                                            class="far fa-trash-alt"></i></button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                                <tbody class="editar-orden-resuelve d-none">
                                                                    @foreach ($recursosRevision as $key => $resuelve)
                                                                        <tr>
                                                                            <td class="td-orden">
                                                                                <select class="select-orden">
                                                                                    @for ($i = 1; $i < $totalResuelves + 1; $i++)
                                                                                        <option value="{{ $i }}"
                                                                                            {{ $i == $resuelve->orden ? 'selected' : '' }}>
                                                                                            {{ $i }}</option>
                                                                                    @endfor
                                                                                </select>
                                                                            </td>
                                                                            <td>{{ $resuelve->created_at }}</td>
                                                                            <td class="text-justify">
                                                                                {{ $resuelve->empleado->nombre1 }}
                                                                                {{ $resuelve->empleado->apellido1 }}</td>
                                                                            <td class="text-justify contenido-resuelve">
                                                                                {{ strip_tags($resuelve->resuelve) }}</td>
                                                                            <td class="text-justify">
                                                                                <div class="col-12 d-flex">
                                                                                    <button type="button"
                                                                                        class="btn btn-warning btn-xs btn-sombra editarResuelveRecurso py-1 px-2 mx-1 col-4"
                                                                                        data-toggle="modal" data-target=".bd-resuelve"
                                                                                        value="{{ $resuelve->id }}" disabled><i
                                                                                            class="fas fa-edit editarResuelveRecurso-i"></i></button>
                                                                                    <button type="button"
                                                                                        class="btn btn-danger btn-xs btn-sombra eliminarResuelveRecurso py-1 px-2 mx-1 col-4"
                                                                                        data_url="{{ route('historial_resuelve_recurso_eliminar') }}"
                                                                                        data_token="{{ csrf_token() }}"
                                                                                        value="{{ $resuelve->id }}" disabled><i
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
                                                                        class="btn btn-primary mx-2 px-4 btn-ordenar-recurso">Ordenar</button>
                                                                    <button href=""
                                                                        class="btn btn-primary mx-2 px-4 btn-ordenar-recurso-guardar d-none"
                                                                        data_url="{{ route('resuelve_orden_recurso_guardar') }}"
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
                                                                            class="btn btn-primary editarResuelveRecursoGuardar"
                                                                            data_url="{{ route('historial_resuelve_recurso_editar') }}"
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
                                                        <label for="" class="col-10">Nuevo resuelve</label>
                                                        <textarea class="form-control mensaje-resuelve mt-2" rows="3" placeholder="" required></textarea>
                                                    </div>
                                                    @if ($pqr->recurso_aclaracion && !sizeOf($pqr->anexos->where('tipo_respuesta', 1)))
                                                        <input class="resuelve-recurso_tipo" type="hidden" value="1">
                                                    @endif
                                                    @if ($pqr->recurso_reposicion && !sizeOf($pqr->anexos->where('tipo_respuesta', 2)))
                                                        <input class="resuelve-recurso_tipo" type="hidden" value="2">
                                                    @endif
                                                    @if ($pqr->recurso_apelacion && !sizeOf($pqr->anexos->where('tipo_respuesta', 3)))
                                                        <input class="resuelve-recurso_tipo" type="hidden" value="3">
                                                    @endif
                                                    <div class="row d-flex px-12 p-3">
                                                        <div class="col-12 col-md-12 form-group d-flex">
                                                            <button href="" class="btn btn-primary mx-2 px-4 btn-pqr-resuelve-recurso"
                                                                data_url="{{ route('historial_resuelve_recurso_guardar') }}"
                                                                data_token="{{ csrf_token() }}">Crear resuelve</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold">Proyectar</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                        <div class="m-3 p-2">
                                            <div class="col-12 d-flex row pqr-anexo">
                                                @if (sizeOf($pqr->anexos) == 0)
                                                    <div class="my-2 col-12 d-flex">
                                                        <h6 class="mr-2">Documento de respuesta</h6>
                                                        <strong class="mx-2">
                                                            <a href="{{ route('respuestaPQR', ['id' => $pqr->id]) }}"
                                                                target="_blank" rel="noopener noreferrer">
                                                                <i class="fas fa-eye"></i> Vista previa</a>
                                                        </strong>
                                                    </div>
                                                @endif
                                                @if ($pqr->recurso_aclaracion && !sizeOf($pqr->anexos->where('tipo_respuesta', 1)))
                                                    <div class="my-2 col-12 d-flex">
                                                        <h6 class="mr-2">Documento de respuesta aclaración</h6>
                                                        <strong class="mx-2">
                                                            <a href="{{ route('respuestaPQRRecurso', ['id' => $pqr->id, 'tipo_recurso' => '1']) }}"
                                                                target="_blank" rel="noopener noreferrer">
                                                                <i class="fas fa-eye"></i> Vista previa </a>
                                                        </strong>
                                                    </div>
                                                @endif
                                                @if ($pqr->recurso_reposicion && !sizeOf($pqr->anexos->where('tipo_respuesta', 2)))
                                                    <div class="my-2 col-12 d-flex">
                                                        <h6 class="mr-2">Documento de respuesta reposición</h6>
                                                        <strong class="mx-2">
                                                            <a href="{{ route('respuestaPQRRecurso', ['id' => $pqr->id, 'tipo_recurso' => '2']) }}"
                                                                target="_blank" rel="noopener noreferrer">
                                                                <i class="fas fa-eye"></i> Vista previa</a>
                                                        </strong>
                                                    </div>
                                                @endif
                                                @php
                                                    $verificacion = $pqr->recurso_aclaracion + $pqr->recurso_reposicion + $pqr->recurso_apelacion - sizeOf($pqr->anexos->where('tipo_respuesta', '!=', 0));
                                                @endphp
                                                @if ($pqr->recurso_apelacion && !sizeOf($pqr->anexos->where('tipo_respuesta', 3)) && $verificacion == 1)
                                                    <div class="my-2 col-12 d-flex">
                                                        <h6 class="mr-2">Documento de respuesta apelación</h6>
                                                        <strong class="mx-2">
                                                            <a href="{{ route('respuestaPQRRecurso', ['id' => $pqr->id, 'tipo_recurso' => '3']) }}"
                                                                target="_blank" rel="noopener noreferrer">
                                                                <i class="fas fa-eye"></i> Vista previa</a>
                                                        </strong>
                                                    </div>
                                                @endif
                                                <div class="container-mensaje-historial-tarea form-group col-12">
                                                    <label for="" class="">Agregar Historial</label>
                                                    <textarea class="form-control mensaje-historial-tarea" rows="3" placeholder="" required></textarea>
                                                </div>
                                                <div class="row d-flex px-12 p-3">
                                                    <div class="col-12 col-md-12 form-group d-flex">
                                                        <button href="" class="btn btn-primary mx-2 px-4 btn-pqr-anexo"
                                                            data_url="{{ route('pqr_anexo_guardar') }}"
                                                            data_url2="{{ route('historial_tarea_guardar') }}"
                                                            data_url3="{{ route('cambiar_estado_tareas_guardar') }}"
                                                            data_token="{{ csrf_token() }}">Enviar a revisión</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif

                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="{{ route('gestion_pqr') }}" class="btn btn-danger mx-2 px-4">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/generar_pqr/gestion_asignacion_proyecta.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endsection
<!-- ************************************************************* -->
