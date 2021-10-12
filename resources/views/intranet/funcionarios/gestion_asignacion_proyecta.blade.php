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
                                        <strong>{{ $pqr->persona->nombre1 . ' ' . $pqr->persona->nombre2 . ' ' . $pqr->persona->apellido1 . ' ' . $pqr->persona->apellido2 }}</strong>
                                    @else
                                        Empresa que interpone la Petición:
                                        <strong>{{ $pqr->empresa->razon_social . ' ' . $pqr->empresa->razon_social . ' ' . $pqr->empresa->razon_social . ' ' . $pqr->empresa->razon_social }}</strong>
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
                                @if($pqr->servicio)
                                    <div class="col-12 col-md-6">
                                        Servicio : <strong>{{ $pqr->servicio->servicio }}</strong>
                                    </div>
                                @endif
                                @if($pqr->factura)
                                    <div class="col-12 col-md-6">
                                        Número de factura: <strong>{{ $pqr->factura }}</strong>
                                    </div>
                                @endif
                                @if($pqr->fecha_factura)
                                    <div class="col-12 col-md-6">
                                        Fecha de factura: <strong>{{ $pqr->fecha_factura }}</strong>
                                    </div>
                                @endif
                                @if($pqr->fecha_radicado)
                                    <div class="col-12 col-md-6">
                                        Fecha de radicado: <strong>{{ $pqr->fecha_generacion }}</strong>
                                    </div>
                                @endif
                                @if($pqr->estadospqr_id < 6)
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
                                @if(!sizeOf($pqr->peticiones->where('recurso_dias', '0')))
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
                                        <h6 class="text-danger pl-2">el usuario no posee correo electrónico se debe enviar correo físico.</h6>
                                        <div class="col-12 col-md-6">
                                            <strong>Nombre:</strong> {{ $pqr->persona->nombre1 . ' ' . $pqr->persona->nombre2 . ' ' . $pqr->persona->apellido1 . ' ' . $pqr->persona->apellido2 }}
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <strong>Teléfono:</strong> {{ $pqr->persona->telefono_celu }}
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <strong>Dirección:</strong> {{ $pqr->persona->direccion }}
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <strong>Departatmento:</strong> {{ $pqr->persona->municipio->departamento->departamento }}
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <strong>Ciudad:</strong> {{ $pqr->persona->municipio->municipio }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                        <hr style="border-top: solid 4px black">
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
                                        <a href="{{ route('prorrogaPdf', ['id' => $pqr->id]) }}" target="_blank" rel="noopener noreferrer">
                                            <i class="fa fa-download" aria-hidden="true"></i> Descargar Radicado Prórroga</a>
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
                                    <button href="" class="btn btn-primary mx-2 px-4" id="prioridad_guardar" data_url="{{ route('prioridad_guardar') }}"
                                    data_token="{{ csrf_token() }}">Guardar prioridad</button>
                                </div>
                            </div>
                            <hr>

                            @if($pqr->estadospqr_id < 6 && $pqr->prorroga == 0)
                                <div class="row px-4 form-respuestaProrroga">
                                    <input class="respuestaProrroga" type="hidden" value="{{$pqr->prorroga}}">
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
                                                <label for="plazo" class="col-md-6">Plazo prórroga días hábiles:</label>
                                                <input type="number" class="form-control form-control-sm plazo_prorroga col-md-3"
                                                    name="plazo_prorroga" id="plazo_prorroga" min="1"
                                                    max="{{$pqr->tipoPqr->tiempos * 2}}">
                                                <p>El máximo de días de prórroga es: {{$pqr->tipoPqr->tiempos * 2}}</p>
                                            </div>
                                            <div class="col-12 d-flex row mb-2">
                                                <label for="prorroga_pdf">Justificacion de prórroga</label>
                                                <textarea type="text" class="form-control form-control-sm prorroga_pdf"
                                                    name="prorroga_pdf" id="prorroga_pdf">{{$pqr->prorroga_pdf}}</textarea>
                                            </div>
                                        </div>
                                        @if($pqr->estadospqr_id < 6 && $pqr->prorroga == 0)
                                            <div class="" id="guardarProrroga">
                                                <button type="" class="btn btn-primary" data_url="{{ route('prorroga_guardar') }}" data_token="{{ csrf_token() }}">Guardar prórroga</button>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                            @endif
                        </div>
                        @foreach ($pqr->peticiones as $key => $peticion)
                            <div class="col-12 rounded border mb-3 p-2 peticion_general">
                                <div class="menu-card-radicado menu-card">
                                    <div class="col-12">
                                        <div class="col-12 row my-2 ">
                                            <div class="col-6">
                                                <h5>Petición {{ $key + 1 }}</h5>
                                            </div>
                                            <div class="col-6 row estado-peticion">
                                                <div class="col-2 d-flex mb-2">
                                                    <h6>Avance:</h6>
                                                </div>
                                                <select class="custom-select rounded-0 estadoPeticion col-4">
                                                    @foreach ($estados as $estado)
                                                        <option value="{{ $estado->id }}"
                                                        {{ $peticion->estadopeticion->id == $estado->id ? 'selected' : '' }}>
                                                        {{ $estado->estado }} %</option>
                                                    @endforeach
                                                </select>
                                                <button type="" class="btn btn-primary btn-estado col-2 mx-2"
                                                    data_url="{{ route('estado_guardar') }}"
                                                    data_token="{{ csrf_token() }}"><span style="font-size: 1em;"><i class="far fa-save"></i></span></button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    @if($peticion->motivo_sub_id)
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Categoría Motivo:</strong> {{ $peticion->motivo->motivo->motivo }}</p>
                                            </div>
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Sub - Categoría Motivo:</strong> {{ $peticion->motivo->sub_motivo }}</p>
                                            </div>
                                            @if ($peticion->otro)
                                                <p class="text-justify"><strong>Otro:</strong> {{ $peticion->otro }}</p>
                                            @endif
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Solicitud:</strong> {{ $peticion->justificacion }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                    @endif
                                    @if($peticion->consulta)
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Consulta:</strong> {{ $peticion->consulta }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                    @endif
                                    @if($peticion->tiposolicitud)
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Tipo de solicitud:</strong> {{ $peticion->tiposolicitud }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Datos personales objeto de la solicitud:</strong> {{ $peticion->datossolicitud }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Descripción de la solicitud:</strong> {{ $peticion->descripcionsolicitud }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                    @endif
                                    @if($peticion->peticion)
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Tipo de petición:</strong> {{ $peticion->peticion }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Documento o información requerida:</strong> {{ $peticion->indentifiquedocinfo }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Justificacion:</strong> {{ $peticion->justificacion }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                    @endif
                                    @if($peticion->irregularidad)
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Tipo de irregularidad:</strong> {{ $peticion->irregularidad }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                    @endif
                                    @if($peticion->felicitacion)
                                        @if($peticion->nombre_funcionario)
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="text-justify"><strong>Nombre de funcionario:</strong> {{ $peticion->nombre_funcionario }}</p>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Felicitaciones:</strong> {{ $peticion->felicitacion }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                    @endif
                                    @if($peticion->hechos)
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
                                        <br>
                                    @endif
                                    @if(sizeof($peticion->anexos))
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
                                                                <td class="text-justify">{{ $anexo->descripcion }}</td>
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
                                </div>
                                @if(sizeOf($peticion->aclaraciones))
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
                                                                <td class="text-justify">{{ $aclaracion->aclaracion }}</td>
                                                                <td>{{ $aclaracion->fecha_respuesta }}</td>
                                                                <td class="text-justify">{{ $aclaracion->respuesta }}</td>
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
                                            <textarea type="text" class="form-control form-control-sm respuesta" cols="10" disabled>{{ strip_tags($peticion->respuesta->respuesta) }}</textarea>
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
                                                    <table class="table table-light"  style="font-size: 0.8em;" >
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
                                                            <th scope="col">Descripción</th>
                                                            <th scope="col">Documentos respuesta recurso</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($peticion->recursos as $recurso)
                                                            <tr>
                                                                <td>{{ $recurso->fecha_radicacion }}</td>
                                                                <td class="text-justify">{{ $recurso->tiporeposicion->tipo }}</td>
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
                                                                    <td>{{ $recurso->respuestarecurso->respuesta }}</td>
                                                                @else
                                                                    <td></td>
                                                                @endif
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
                                <h5 class="">Historial peticiones</h5>
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
                                                        <td class="text-justify">{{ $historial->empleado->nombre1 }} {{ $historial->empleado->apellido1 }}</td>
                                                        <td class="text-justify">{{ strip_tags($historial->historial) }}</td>
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
                                        <button href="" class="btn btn-primary px-4 guardarHistorialPeticion" data_url="{{ route('historial_peticion_guardar') }}"
                                        data_token="{{ csrf_token() }}">Guardar historial</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div> 
                    <!-- /.card-body -->
                    <input class="id_pqr" id="id_pqr" name="id_pqr" type="hidden" value="{{ $pqr->id }}">
                    @if ($pqr->peticiones)
                        <div class="rounded border m-3 p-2">
                            <h5 class="">Gestión Peticiones</h5>
                            <div class="col-12 table-responsive d-flex justify-content-center">
                                <table class="table table-striped col-12" style="font-size: 0.8em;">
                                    <thead>
                                        <tr>
                                            <th scope="col">Petición #</th>
                                            <th scope="col">Funcionario</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pqr->peticiones as $key=> $peticion)
                                            <tr>
                                                @if($peticion->empleado)
                                                    <td class="bg-success">{{$key + 1}}</td>
                                                    <td class="bg-success">{{$peticion->empleado->nombre1 }} {{$peticion->empleado->apellido1}}</td>
                                                @else    
                                                    <td class="bg-danger">{{$key + 1}}</td>
                                                    <td class="bg-danger">Sin asignar</td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <h5 class="">Asignación Peticiones</h5>
                            <div class="row d-flex px-4"> 
                                <div class="col-12 col-md-5 form-group">
                                    <label for="">Peticion</label>
                                    <select name="peticion" id="peticion" class="custom-select rounded-0" required="">                                    
                                    @foreach($pqr->peticiones as $key=> $peticion)
                                        <option value="{{$peticion->id}}">{{$key + 1}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-5 form-group">
                                    <label for="">Cargo</label>
                                    <select name="cargo" id="cargo" class="custom-select rounded-0" required="" data_url="{{ route('cargar_cargos') }}" data_url2="{{ route('cargar_funcionarios') }}">
                                    </select>
                                </div>
                                <div class="col-12 col-md-5 form-group">
                                    <label for="">Funcionario</label>
                                    <select name="funcionario" id="funcionario" class="custom-select rounded-0" required="">
                                    </select>
                                </div>
                                <div class="col-12 col-md-4 form-group d-flex align-items-end">
                                    <button href="" class="btn btn-primary mx-2 px-4" id="asignacion_peticion_guardar" data_url="{{ route('asignacion_peticion_guardar') }}"
                                    data_token="{{ csrf_token() }}">Asignar peticion</button>
                                </div>
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
                                            @foreach ($pqr->historialtareas as $historial)
                                                <tr>
                                                    <td>{{ $historial->created_at }}</td>
                                                    @if($historial->tarea)
                                                        <td class="text-justify">{{ $historial->tarea->tarea }}</td>
                                                    @else
                                                        <td class="text-justify">ADMINISTRADOR</td>
                                                    @endif
                                                    <td class="text-justify">{{ $historial->empleado->nombre1 }} {{ $historial->empleado->apellido1 }}</td>
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
                                    <textarea class="form-control" rows="3" placeholder="" name="mensaje-historia-tarea"
                                        id="mensaje-historial-tarea" required></textarea>
                                </div>
                                <div class="col-12 col-md-12 form-group d-flex">
                                    <button href="" class="btn btn-primary px-4" id="guardarHistorialTarea" data_url="{{ route('historial_tarea_guardar') }}"
                                    data_token="{{ csrf_token() }}">Guardar Historial</button>
                                </div>
                            </div>
                        </div>
                        @if(sizeOf($pqr->anexos))
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
                                                    {{-- <th scope="col">Estado</th> --}}
                                                    <th scope="col">Descarga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pqr->anexos as $anexo)
                                                    <tr>
                                                        <td>{{ $anexo->created_at }}</td>
                                                        <td class="text-justify">{{ $anexo->empleado->nombre1 }} {{ $anexo->empleado->apellido1 }}</td>
                                                        <td class="text-justify">{{ $anexo->tarea->tarea }}</td>
                                                        {{-- <td class="text-justify">{{ $anexo->estado ? 'Activo' : 'Rechazado'  }}</td> --}}
                                                        <td class="text-justify"><a href="{{ asset('documentos/tareas/' . $anexo->url) }}" target="_blank" rel="noopener noreferrer"><i class="fa fa-download" aria-hidden="true"></i></a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        @endif
                        @if (((($pqr->peticiones->sum('estado_id') / $pqr->peticiones->count())/ 11) * 100) == 100 )
                            <div class="rounded border m-3 p-2">
                                <h5 class="mt-2">Resuelve</h5>
                                @if(sizeof($pqr->resuelves))
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
                                                    $totalResuelves = $pqr->resuelves->count()
                                                @endphp
                                                <tbody class="orden-resuelve">
                                                    @foreach ($pqr->resuelves as $key=> $resuelve )
                                                        <tr >
                                                            <td>{{ $resuelve->orden }}</td>
                                                            <td>{{ $resuelve->created_at }}</td>
                                                            <td class="text-justify">{{ $resuelve->empleado->nombre1 }} {{ $resuelve->empleado->apellido1 }}</td>
                                                            <td class="text-justify contenido-resuelve">{{ strip_tags($resuelve->resuelve) }}</td>
                                                            <td class="text-justify">
                                                                <div class="col-12 d-flex">
                                                                    <button type="button" class="btn btn-warning btn-xs btn-sombra editarResuelve py-1 px-2 mx-1 col-4" data-toggle="modal" data-target=".bd-resuelve" value="{{$resuelve->id}}"><i class="fas fa-edit editarResuelve-i"></i></button>
                                                                    <button type="button" class="btn btn-danger btn-xs btn-sombra eliminarResuelve py-1 px-2 mx-1 col-4" data_url="{{ route('historial_resuelve_eliminar') }}"  data_token="{{ csrf_token() }}" value="{{$resuelve->id}}"><i class="far fa-trash-alt"></i></button>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                    @endforeach
                                                </tbody>
                                                <tbody  class="editar-orden-resuelve d-none">
                                                    @foreach ($pqr->resuelves as $key=> $resuelve )
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
                                                        <td class="text-justify">{{ $resuelve->empleado->nombre1 }} {{ $resuelve->empleado->apellido1 }}</td>
                                                        <td class="text-justify contenido-resuelve">{{ strip_tags($resuelve->resuelve) }}</td>
                                                        <td class="text-justify">
                                                            <div class="col-12 d-flex">
                                                                <button type="button" class="btn btn-warning btn-xs btn-sombra editarResuelve py-1 px-2 mx-1 col-4" data-toggle="modal" data-target=".bd-resuelve" value="{{$resuelve->id}}" disabled><i class="fas fa-edit editarResuelve-i"></i></button>
                                                                <button type="button" class="btn btn-danger btn-xs btn-sombra eliminarResuelve py-1 px-2 mx-1 col-4" data_url="{{ route('historial_resuelve_eliminar') }}"  data_token="{{ csrf_token() }}" value="{{$resuelve->id}}" disabled><i class="far fa-trash-alt"></i></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="row d-flex px-12 p-3"> 
                                                <div class="col-12 col-md-12 form-group d-flex">
                                                    <button href="" class="btn btn-primary mx-2 px-4 btn-ordenar">Ordenar</button>
                                                    <button href="" class="btn btn-primary mx-2 px-4 btn-ordenar-guardar d-none"
                                                        data_url="{{ route('resuelve_orden_guardar') }}"  data_token="{{ csrf_token() }}"
                                                    >Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade bd-resuelve" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Editar resuelve</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <textarea class="form-control mensaje-resuelve-editar mt-2" rows="3" cols="40" placeholder="" required></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary editarResuelveGuardar" data_url="{{ route('historial_resuelve_editar') }}"  data_token="{{ csrf_token() }}">Guardar</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
                                        {{-- Inicio btn Modal de busqueda --}}
                                        <div class="col-2 row estado-peticion justify-content-end">
                                            <button type="" class="btn btn-success btn-estado col-12 mx-2 mb-2" data-toggle="modal" data-target="#buscar"><span style="font-size: 1em;"><i class="fas fa-search"></i> Wiku</span>
                                            </button>
                                        </div>
                                        {{-- Fin btn Modal de busqueda --}}
                                        {{-- Inicio Modal de busqueda --}}
                                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="buscar">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Buscar En Wiku</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card-body">
                                                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                                <li class="nav-item" role="presentation">
                                                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                                                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                                                        aria-selected="true">Busqueda Basica</button>
                                                                </li>
                                                                <li class="nav-item" role="presentation">
                                                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                                                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                                                        aria-selected="false">Busqueda Avanzada</button>
                                                                </li>
                                                            </ul>
                                                            <div class="tab-content" id="pills-tabContent">
                                                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                                                    aria-labelledby="pills-home-tab">
                                                                    <div class="row d-flex justify-content-center">
                                                                        <div class="col-12 col-md-8 d-flex justify-content-around">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="radio1" checked="checked"
                                                                                    value="todos">
                                                                                <label class="form-check-label">Todos</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="radio1" value="Normas">
                                                                                <label class="form-check-label">Normas</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="radio1" value="Jurisprudencias">
                                                                                <label class="form-check-label">Jurisprudencias</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="radio1" value="Argumentos">
                                                                                <label class="form-check-label">Argumentos</label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="radio1" value="Normas">
                                                                                <label class="form-check-label">Doctrinas</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row d-flex justify-content-center">
                                                                        <div class="col-12 col-md-8 form-group d-flex justify-content-center">
                                                                            <label for="query" class="mr-3" style="white-space:nowrap">Busqueda
                                                                                Básica</label>
                                                                            <input type="text" class="form-control" id="query" name="query"
                                                                                data_url="{{ route('wiku_busqueda_basica') }}"
                                                                                placeholder="Ingrese palabras de busqueda">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                                    <div class="row d-flex justify-content-star">
                                                                        <div class="col-12 mb-3">
                                                                            <h6>Por tipo de wiku...</h6>
                                                                        </div>
                                                                        <div class="form-group col-12 col-md-4">
                                                                            <label class="requerido" for="tipo_wiku">Categoria de Wiku</label>
                                                                            <select class="form-control form-control-sm" id="tipo_wiku">
                                                                                <option value="">---Seleccione Wiku---</option>
                                                                                <option value="Argumentos">Argumentos</option>
                                                                                <option value="Normas">Normas</option>
                                                                                <option value="Jurisprudencias">Jurisprudencias</option>
                                                                                <option value="Doctrinas">Doctrinas</option>
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
                                                                            <select class="form-control form-control-sm" id="area_id"
                                                                                data_url="{{ route('cargar_temas') }}">
                                                                                <option value="">---Seleccione---</option>
                                                                                {{-- @foreach ($areas as $area)
                                                                                    <option value="{{ $area->id }}">{{ $area->area }}</option>
                                                                                @endforeach --}}
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-12 col-md-4">
                                                                            <label for="tema_id">Tema</label>
                                                                            <select class="form-control form-control-sm" id="tema_id"
                                                                                data_url="{{ route('cargar_temasespec') }}">
                                                                                <option value="">Seleccione primero un área</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-12 col-md-4">
                                                                            <label for="wikutemaespecifico_id">Tema Específico</label>
                                                                            <select class="form-control form-control-sm" name="wikutemaespecifico_id"
                                                                                id="wikutemaespecifico_id">
                                                                                <option value="">Seleccione primero un Tema</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-12 mb-3">
                                                                            <h6>Por fuente, artículo y fecha de entrada en vigencia...</h6>
                                                                        </div>
                                                                        <div class="col-12 col-md-5 form-group">
                                                                            <label for="fuente_id">Fuente emisora</label>
                                                                            <select class="form-control form-control-sm" name="fuente_id" id="fuente_id"
                                                                                data_url="{{ route('cargar_normas') }}">
                                                                                <option value="">--- Seleccione ---</option>
                                                                                {{-- @foreach ($fuentes as $fuente)
                                                                                    <option value="{{ $fuente->id }}">{{ $fuente->fuente }}</option>
                                                                                @endforeach --}}
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-12 col-md-5 form-group">
                                                                            <label for="fuente_id">Artículo</label>
                                                                            <select class="form-control form-control-sm" id="id">
                                                                                <option value="">Seleccione primero una Fuente Emisora</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-12 col-md-2 form-group">
                                                                            <label for="fecha">Entrada en vigencia</label>
                                                                            <input type="date" class="form-control form-control-sm" name="fecha" id="fecha"
                                                                                max="{{ date('Y-m-d') }}">
                                                                        </div>
                                                                        <hr>
                                                                        <div class="col-12 mb-3">
                                                                            <h6>Por asociación servicio / producto..</h6>
                                                                        </div>
                                                                        <div class="form-group col-12 col-md-4">
                                                                            <label class="requerido" for="prod_serv">Producto / Servicio</label>
                                                                            <select class="form-control form-control-sm" id="prod_serv">
                                                                                <option value="">---Selecione---</option>
                                                                                <option value="Producto">Producto</option>
                                                                                <option value="Servicio">Servicio</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-12 col-md-4" id="tipo_pqr">
                                                                            <label class="requerido" for="tipo_p_q_r_id">Tipo de PQR</label>
                                                                            <select id="tipo_p_q_r_id" class="form-control form-control-sm" name="tipo_p_q_r_id"
                                                                                data_url="{{ route('admin-funcionario-asignacion_particular-cargar_motivo') }}"
                                                                                required>
                                                                                <option value="">---Seleccione---</option>
                                                                                {{-- @foreach ($tipos_pqr as $tipo_pqr)
                                                                                    <option value="{{ $tipo_pqr->id }}">{{ $tipo_pqr->tipo }}</option>
                                                                                @endforeach --}}
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-12 col-md-4" id="motivo_pqr">
                                                                            <label class="requerido" for="motivo_id">Motivo de PQR</label>
                                                                            <select id="motivo_id" class="form-control form-control-sm" name="motivo_id"
                                                                                data_url="{{ route('admin-funcionario-asignacion_particular-cargar_sub_motivo') }}">
                                                                                <option value="">---Seleccione---</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-12 col-md-4" id="sub_motivo_pqr">
                                                                            <label class="requerido" for="motivo_sub_id">Sub-Motivo de PQR</label>
                                                                            <select id="motivo_sub_id" class="form-control form-control-sm" name="motivo_sub_id">
                                                                                <option value="">---Seleccione---</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-12 col-md-4 d-none" id="servicios">
                                                                            <label for="servicio_id">Servicios</label>
                                                                            <select id="servicio_id" class="form-control form-control-sm" name="servicio_id">
                                                                                <option value="">---Seleccione un servcio---</option>
                                                                                {{-- @foreach ($servicios as $servicio)
                                                                                    <option value="{{ $servicio->id }}">{{ $servicio->servicio }}</option>
                                                                                @endforeach --}}
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-12 col-md-4 d-none" id="categorias">
                                                                            <label class="requerido" for="categoria_id">Categoría de producto</label>
                                                                            <select id="categoria_id" class="form-control form-control-sm"
                                                                                data_url="{{ route('admin-funcionario-asignacion_particular-cargar_producto') }}"
                                                                                name="categoria_id">
                                                                                <option value="">---Seleccione---</option>
                                                                                {{-- @foreach ($categorias as $categoria)
                                                                                    <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                                                                                @endforeach --}}
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-12 col-md-4 d-none" id="productos">
                                                                            <label class="requerido" for="producto_id">Productos</label>
                                                                            <select id="producto_id" class="form-control form-control-sm" name="producto_id"
                                                                                data_url="{{ route('admin-funcionario-asignacion_particular-cargar_marca') }}">
                                                                                <option value="">---Seleccione primero una categoría---</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-12 col-md-4 d-none" id="marcas">
                                                                            <label class="requerido" for="marca_id">Marcas</label>
                                                                            <select id="marca_id" class="form-control form-control-sm" name="marca_id"
                                                                                data_url="{{ route('admin-funcionario-asignacion_particular-cargar_referencia') }}">
                                                                                <option value="">---Seleccione primero un producto---</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-12 col-md-4 d-none" id="referencias">
                                                                            <label class="requerido" for="referencia_id">Referencias</label>
                                                                            <select id="referencia_id" class="form-control form-control-sm" name="referencia_id">
                                                                                <option value="">---Seleccione primero una marca---</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-12 col-md-4 pl-4 d-flex align-items-end">
                                                                            <button class="btn btn-primary btn-xs btn-sombra pl-5 pr-5 form-control-sm"
                                                                                id="btn_buscar" onclick="busquedaAvanzada()"
                                                                                data_url="{{ route('wiku_busqueda_avanzada') }}">Buscar</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row justify-content-around" id="coleccionrespuesta">
                                                                <div class="col-md-6  d-none">
                                                                    <div class="card card-primary collapsed-card card-mini-sombra">
                                                                        <div class="card-header">
                                                                            <div class="user-block">
                                                                                <span class="username"><a href="#" id="tituloNoma"></a></span>
                                                                                <span class="description"></span>
                                                                            </div>
                                                                            <div class="card-tools">
                                                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                                    <i class="fas fa-minus"></i>
                                                                                </button>
                                                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                                                    <i class="fas fa-times"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <p><strong>Texto:</strong> El Texto...</p>
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
                                                                                                <th>Criterios jurídicos de aplicación</th>
                                                                                                <th>Criterios jurídicos de no aplicación</th>
                                                                                                <th>Notas de la Vigencia</th>
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
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Inicio Modal de busqueda --}}
                                        <textarea class="form-control mensaje-resuelve mt-2" rows="3" placeholder="" required></textarea>
                                    </div>

                                    <div class="row d-flex px-12 p-3"> 
                                        <div class="col-12 col-md-12 form-group d-flex">
                                            <button href="" class="btn btn-primary mx-2 px-4 btn-pqr-resuelve"
                                            data_url="{{ route('historial_resuelve_guardar') }}"  data_token="{{ csrf_token() }}">Crear resuelve</button>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                            <div class="rounded border m-3 p-2">
                                <h5 class="mt-2">Proyectar</h5>
                                <div class="col-12 d-flex row pqr-anexo">
                                    <div class="my-2 col-12 d-flex">
                                        <h6 class="mr-2">Documento de respuesta</h6>
                                        <strong class="mx-2">
                                            <a href="{{ route('respuestaPQR', ['id' => $pqr->id]) }}" target="_blank" rel="noopener noreferrer">
                                                <i class="fas fa-eye"></i> Vista previa</a>
                                        </strong>
                                    </div>
                                    <div class="container-mensaje-historial-tarea form-group col-12">
                                        <label for="" class="">Agregar Historial</label>
                                        <textarea class="form-control mensaje-historial-tarea" rows="3" placeholder="" required></textarea>
                                    </div>
                                    <div class="row d-flex px-12 p-3"> 
                                        <div class="col-12 col-md-12 form-group d-flex">
                                            <button href="" class="btn btn-primary mx-2 px-4 btn-pqr-anexo" data_url="{{ route('pqr_anexo_guardar') }}"
                                            data_url2="{{ route('historial_tarea_guardar') }}" data_url3="{{ route('cambiar_estado_tareas_guardar') }}" data_token="{{ csrf_token() }}">Enviar a revisión</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                    <div class="card-footer d-flex justify-content-end">
                        <a href="{{ route('admin-index') }}" class="btn btn-danger mx-2 px-4">Regresar</a>
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
    <script>
        $(document).ready(function() {
            $('.mensaje-resuelve').summernote()
        });
    </script>
@endsection
<!-- ************************************************************* -->
