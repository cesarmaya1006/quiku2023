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
    $numerador = 0;
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
                    <h3 class="card-title">Gestión a Solicitud Número de radicado:
                        <strong>{{ $solicitud_doc->radicado }}</strong>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('funcionario-gestionar_solicitudDocInfo_guardar') }}" method="POST" autocomplete="off"
                        enctype="multipart/form-data" id="fromGestionSolicitudDatosUsuario">
                        @csrf
                        @method('post')
                        <div class="col-12 rounded border mb-3 p-2">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    @if ($solicitud_doc->persona_id != null)
                                    Persona que interpone la Solicitud:
                                    <strong>{{ $solicitud_doc->persona->nombre1 . ' ' . $solicitud_doc->persona->nombre2 . ' ' .
                                        $solicitud_doc->persona->apellido1 . ' ' . $solicitud_doc->persona->apellido2 }}</strong>
                                    @else
                                    Empresa que interpone la Solicitud:
                                    <strong>{{ $solicitud_doc->empresa->razon_social . ' ' . $solicitud_doc->empresa->razon_social . ' ' .
                                        $solicitud_doc->empresa->razon_social . ' ' . $solicitud_doc->empresa->razon_social }}</strong>
                                    @endif
                                </div>
                                <div class="col-12 col-md-6">
                                    Tipo Solicitud: <strong>{{ $solicitud_doc->tipoPqr->tipo }}</strong>
                                </div>
                                @if ($solicitud_doc->adquisicion == 'Sede física')
                                <div class="col-12 col-md-6">
                                    Departatmento : <strong>{{ $solicitud_doc->sede->municipio->departamento->departamento
                                        }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Municipio : <strong>{{ $solicitud_doc->sede->municipio->municipio }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Sede : <strong>{{ $solicitud_doc->sede->nombre }}</strong>
                                </div>
                                @endif
                                <div class="col-12 col-md-6">
                                    Plazo de respuesta prorroga días hábiles: <strong>{{ $solicitud_doc->prorroga_dias }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Fecha de radicado: <strong>{{ $solicitud_doc->fecha_radicado }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Fecha estimada de respuesta:
                                    <strong>{{ date('Y-m-d', strtotime($solicitud_doc->fecha_generacion . '+ ' .
                                        ($solicitud_doc->tiempo_limite) . ' days')) }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Estado: <strong>{{ $solicitud_doc->estado->estado_funcionario }}</strong>
                                </div>
                            </div>

                            @foreach ($solicitud_doc->Peticiones as $solicitud)
                                @php
                                $recursoValidacion += $solicitud->recurso;
                                if( $plazoRecurso != $solicitud->recurso_dias){
                                    $plazoRecurso += $solicitud->recurso_dias;
                                }
                                @endphp
                            @endforeach
        
                        </div>
                        @foreach ($solicitud_doc->Peticiones as $solicitud)
                        @php
                            $numerador++;
                        @endphp
                        <hr style="border-top: solid 4px black">
                        <div class="col-12 peticion_general rounded border mb-3 p-2">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h5>Peticón #{{$numerador}}</h5>
                                                        </div>
                                                        <div class="col-12">{{ $solicitud->peticion }}</div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <h6>Datos personales objeto de la solicitud:</h6>
                                                        <div class="col-12">{{ $solicitud->indentifiquedocinfo }}</div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <h6>Descripción de la solicitud:</h6>
                                                        <div class="col-12">{{ $solicitud->justificacion }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <h6>Anexos</h6>
                                </div>
                                <div class="col-12">
                                    <table class="table table-light">
                                        <tbody>
                                            @foreach ($solicitud->documentos as $anexo)
                                            <tr>
                                                <td>{{ $anexo->titulo }}</td>
                                                <td>{{ $anexo->descripcion }}</td>
                                                <td><a href="{{ asset('documentos/solicituddocinfo/' . $anexo->url) }}"
                                                        target="_blank" rel="noopener noreferrer">Descargar</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <input class="respuestaAclaracion" type="hidden" value="{{$solicitud->aclaracion}}">
                                <div class="col-12 col-md-6">
                                    <h6>Aclaraciones</h6>
                                </div>
                                @if($solicitud_doc->estadospqr_id < 6)
                                    <div class="col-12 col-md-6 d-flex flex-row">
                                        <div class="form-check mb-3 mr-4">
                                            <input id="" name="aclaracion_check" type="radio"
                                                class="form-check-input aclaracion_check aclaracion_check_si" value="1" />
                                            <label class="form-check-label" for="">SI</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input id="" name="aclaracion_check" type="radio"
                                                class="form-check-input aclaracion_check aclaracion_check_no" value="0" />
                                            <label class="form-check-label" for="">NO</label>
                                        </div>
                                    </div>
                                @endif
                                @if ($solicitud->aclaracion == 1)
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Fecha</th>
                                                        <th scope="col">Aclaración</th>
                                                        <th scope="col">Solicitud</th>
                                                        <th scope="col">Fecha Respuesta</th>
                                                        <th scope="col">Respuesta</th>
                                                        <th scope="col">Anexos Respuesta</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($solicitud->aclaraciones as $aclaracion)
                                                    <tr>
                                                        <th scope="row">{{$aclaracion->fecha}}</th>
                                                        <td>{{$aclaracion->tipo_solicitud}}</td>
                                                        <td>{{$aclaracion->aclaracion}}</td>
                                                        <td>{{$aclaracion->fecha_respuesta}}</td>
                                                        <td>{{$aclaracion->respuesta}}</td>
                                                        <td>
                                                            @foreach($aclaracion->anexos as $anexo)
                                                                <a href="{{ asset('documentos/respuestas/' . $anexo->url) }}" target="_blank" rel="noopener noreferrer">{{$anexo->titulo}}</a>
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($solicitud_doc->estadospqr_id < 6)
                                    <div class="col-12">
                                        <div class="col-12  mt-2 pt-2 aclaraciones " id="aclaraciones">
                                            <div class="col-12 aclaracion rounded border mb-3">
                                                <div class="form-group col-12 mt-2 titulo-aclaracion">
                                                    <div class="col-12 d-flex justify-content-between mb-2">
                                                        <label for="">Aclaración</label>
                                                        <button type="button"
                                                            class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminarAclaracion"><i
                                                                class="fas fa-minus-circle"></i> Eliminar
                                                            Aclaración</button>
                                                    </div>
                                                    <select name="tipo_aclaracion" id="tipo_aclaracion"
                                                        class="custom-select rounded-0 tipo_aclaracion">
                                                        <option value="">--Seleccione--</option>
                                                        <option value="aclaracion">Aclaración</option>
                                                        <option value="complementacion">Complementación</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="">Solicitud</label>
                                                    <input class="form-control solicitud_aclaracion" type="text"
                                                        name="solicitud_aclaracion" id="solicitud_aclaracion">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end flex-row">
                                            <button class="btn btn-info btn-xs btn-sombra pl-2 pr-2 crearAclaracion"><i
                                                    class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Añadir
                                                otro aclaración</button>
                                        </div>
                                        <input class="totalPeticionAclaraciones" id="totalPeticionAclaraciones"
                                            name="totalPeticionAclaraciones" type="hidden" value="0">
                                    </div>
                                @endif
                            </div>
                            <hr>
                            <div class="row">
                                <input class="respuestaRespuesta" type="hidden"
                                    value="{{ isset($solicitud->respuesta->id) ? $solicitud->respuesta->id : '' }}">
                                <div class="col-12 col-md-6">
                                    <h6>Respuesta Solicitud</h6>
                                </div>
                                <div class="col-12 form-group">
                                    <textarea type="text" class="form-control form-control-sm respuesta"
                                        name="respuesta"
                                        id="">{{ isset($solicitud->respuesta->respuesta) ? $solicitud->respuesta->respuesta : '' }}</textarea>
                                </div>
                                <div class="col-12" id="anexosConsulta">
                                    <div class="col-12 d-flex row anexoconsulta">
                                        <div class="col-12 titulo-anexo d-flex justify-content-between">
                                            <h6>Anexo</h6>
                                            <button type="button"
                                                class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminaranexoConsulta"><i
                                                    class="fas fa-minus-circle"></i> Eliminar anexo</button>
                                        </div>
                                        <div class="col-12 col-md-4 form-group titulo-anexoConsulta">
                                            <label for="titulo">Título anexo</label>
                                            <input type="text" class="form-control form-control-sm" name="titulo"
                                                id="titulo">
                                        </div>
                                        <div class="col-12 col-md-4 form-group descripcion-anexoConsulta">
                                            <label for="descripcion">Descripción</label>
                                            <input type="text" class="form-control form-control-sm" name="descripcion"
                                                id="descripcion">
                                        </div>
                                        <div class="col-12 col-md-4 form-group doc-anexoConsulta">
                                            <label for="documentos">Anexos o Pruebas</label>
                                            <input class="form-control form-control-sm" type="file" name="documentos"
                                                id="documentos">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end flex-row mb-3">
                                    <button class="btn btn-success btn-xs btn-sombra pl-2 pr-2 crearAnexo"
                                        id="crearAnexo"><i class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Añadir
                                        otro Anexo</button>
                                </div>
                                @if (isset($solicitud->respuesta->documentos))
                                <div class="row respuestaAnexos">
                                    <div class="col-12">
                                        <div class="col-12">
                                            <h6>Anexos respuesta Solicitud</h6>
                                        </div>
                                        <table class="table table-light">
                                            <tbody>
                                                @foreach ($solicitud->respuesta->documentos as $anexo)
                                                <tr>
                                                    <td>{{ $anexo->titulo }}</td>
                                                    <td>{{ $anexo->descripcion }}</td>
                                                    <td><a href="{{ asset('documentos/respuestas/' . $anexo->url) }}"
                                                            target="_blank" rel="noopener noreferrer">Descargar</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @endif
                                <input class="totalPeticionAnexos" id="totalPeticionAnexos" name="totalPeticionAnexos"
                                    type="hidden" value="0">
                            </div>
                            <hr>
                            <div class="row">
                                @if (sizeOf($solicitud->recursos))
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Historial de recursos</h6>
                                    </div>
                                    <div class="col-12 table-responsive">
                                        <table class="table table-light" style="font-size: 0.8em;">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Fecha recurso</th>
                                                    <th scope="col">Tipo de recurso</th>
                                                    <th scope="col">Recurso</th>
                                                    <th scope="col">Estado</th>
                                                    <th scope="col">Documentos recurso</th>
                                                    <th scope="col">Fecha respuesta recurso</th>
                                                    <th scope="col">Documentos respuesta recurso</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($solicitud->recursos as $recurso)
                                                <tr>
                                                    <td>{{ $recurso->fecha_radicacion }}</td>
                                                    <td>{{ $recurso->tiporeposicion->tipo }}</td>
                                                    <td>{{ $recurso->recurso }}</td>
                                                    <td>Resuelta</td>
                                                    @if ($recurso->documentos)
                                                        <td>
                                                            @foreach ($recurso->documentos as $anexo)
                                                                <a href="{{ asset('documentos/respuestas/' . $anexo->url) }}" target="_blank" rel="noopener noreferrer">{{$anexo->titulo}}</a>
                                                            @endforeach
                                                        </td>
                                                    @else
                                                    <td>---</td>
                                                    @endif
                                                    @if ($recurso->respuestarecurso)
                                                        <td>{{ $recurso->respuestarecurso->fecha }}</td>
                                                    @else
                                                        <td>---</td>
                                                    @endif
                                                    <td>
                                                        @if ($recurso->respuestarecurso)
                                                            @foreach ($recurso->respuestarecurso->documentos as $anexoRespuesta)
                                                            <a href="{{ asset('documentos/respuestas/' . $anexoRespuesta->url) }}" target="_blank" rel="noopener noreferrer">{{$anexoRespuesta->titulo}}</a>
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <hr class="mt-5">
                                    </div>
                                    @foreach ($solicitud->recursos as $recurso)
                                    @if(!$recurso->respuestaRecurso)
                                        <div class="row form-respuesta-recursos">
                                            <input class="id_recurso" type="hidden" value="{{$recurso->id}}">
                                            <input class="tipo_reposicion_id" type="hidden" value="{{$recurso->tipo_reposicion_id}}">
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <h6>Recurso de {{$recurso->tiporeposicion->tipo}} </h6>
                                                </div> 
                                                <textarea type="text" class="form-control form-control-sm" disabled>{{$recurso->recurso}}</textarea>
                                                <div class="col-12" id="anexosRespuestaRecursos">
                                                    <div class="col-12 d-flex row anexoRespuestaRecurso" id="anexoRespuestaRecurso">
                                                        <div class="col-12 col-md-4 form-group titulo-anexoRespuestaRecurso">
                                                            <label for="titulo">Título anexo</label>
                                                            <input type="text" class="form-control form-control-sm">
                                                        </div>
                                                        <div class="col-12 col-md-4 form-group descripcion-anexoRespuestaRecurso">
                                                            <label for="descripcion">Descripción</label>
                                                            <input type="text" class="form-control form-control-sm">
                                                        </div>
                                                        <div class="col-12 col-md-4 form-group doc-anexoRespuestaRecurso">
                                                            <label for="documentoRecurso">Anexos o Pruebas</label>
                                                            <input class="form-control form-control-sm" type="file">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer d-flex justify-content-end guardarRespuestaRecurso">
                                                <button type="" class="btn btn-primary px-4" data_url="{{ route('respuesta_recurso_guardar_sdi') }}" data_url_anexos="{{ route('respuesta_recurso_anexos_guardar_sdi') }}" data_token="{{ csrf_token() }}">Guardar recurso</button>
                                            </div>
                                        </div>
                                    @endif
                                    @endforeach
                                </div>
                                @endif
                            </div>
                            <input class="id_peticion" id="id_peticion" name="id_peticion" type="hidden"
                                value="{{$solicitud->id}}">
                        </div>
                        @endforeach
                        <div class="col-12 rounded border mb-3 p-2 pt-3">
                            <div class="form-group mt-3">
                                <label class="" for="">Prioridad</label>
                                <select class="form-control form-control-sm col-12 col-md-6" name="prioridad" required>
                                    @foreach ($estadoPrioridad as $prioridad)
                                        <option value="{{ $prioridad->id }}"
                                            {{ $solicitud_doc->prioridad_id == $prioridad->id ? 'selected' : '' }}>
                                            {{ $prioridad->prioridad }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <hr>
                            @if($solicitud_doc->estadospqr_id < 6 && $solicitud_doc->prorroga == 0 || $solicitud_doc->estadospqr_id > 6 && $solicitud_doc->prorroga == 1)
                                <div class="row pb-3 form-respuestaProrroga">
                                    <input class="respuestaProrroga" type="hidden" value="{{$solicitud_doc->prorroga}}">
                                    <div class="col-12 col-md-6 ">
                                        <h6>Prorroga</h6>
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
                                                <label for="plazo" class="col-md-6">Plazo prorroga días hábiles:</label>
                                                <input type="number" class="form-control form-control-sm plazo_prorroga col-md-3"
                                                    name="plazo_prorroga" id="plazo_prorroga" min="1"
                                                    max="{{$solicitud_doc->tipoPqr->tiempos * 2}}">
                                            </div>
                                            <div class="col-12 d-flex row">
                                                <label for="prorroga_pdf">Justificacion de prorroga</label>
                                                <textarea type="text" class="form-control form-control-sm prorroga_pdf"
                                                    name="prorroga_pdf" id="prorroga_pdf">{{$solicitud_doc->prorroga_pdf}}</textarea>
                                            </div>
                                        </div>
                                        @if($solicitud_doc->estadospqr_id < 6 && $solicitud_doc->prorroga == 0)
                                            <div class="card-footer d-flex justify-content-end" id="guardarProrroga">
                                                <button type="" class="btn btn-primary px-4" data_url="{{ route('prorroga_guardar_sdi') }}" data_token="{{ csrf_token() }}">Guardar prorroga</button>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                            @endif
                            @if($solicitud_doc->estadospqr_id < 6)
                                <div class="row">
                                    <input class="respuestaRecurso" type="hidden" value="{{ $recursoValidacion }}">
                                    <div class="col-12 col-md-6">
                                        <h6>¿A las respuestas le procede recurso?</h6>
                                    </div>
                                    <div class="col-12 col-md-6 d-flex flex-row">
                                        <div class="form-check mb-3 mr-4">
                                            <input id="" name="recurso" type="radio" class="form-check-input recurso_check recurso_si" value="1"/>
                                            <label id="_label" class="form-check-label" for="">SI</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input id="" name="recurso" type="radio" class="form-check-input recurso_check recurso_no" value="0"/>
                                            <label id="_label" class="form-check-label" for="">NO</label>
                                        </div>
                                    </div>
                                    <div class="col-12 row px-3 recurso-form">
                                        @if ($plazoRecurso == 0)
                                            <div class="col-12 col-md-3 form-group">
                                                <label for="plazo">Plazo recurso días hábiles:</label>
                                                <input type="number" class="form-control form-control-sm plazo_recurso"
                                                    name="plazo_recurso" id="plazo_recurso" min="0"
                                                    max="{{$solicitud_doc->tipoPqr->tiempos}}">
                                            </div>
                                        @else
                                            <div class="col-12 col-md- form-group">
                                                <label for="plazo">Plazo recurso días hábiles: {{ $plazoRecurso}}</label>
                                                <input class="plazoRecurso" type="hidden" value="{{ $plazoRecurso }}">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                        
                        <div class="card-footer d-flex justify-content-end">
                            <a href="{{ route('funcionario-index') }}" class="btn btn-danger mx-2 px-4">Regresar</a>
                            @if(!($solicitud_doc->estadospqr_id == 6 || $solicitud_doc->estadospqr_id == 10))
                                <button type="submit" class="btn btn-primary px-4">Guardar</button>
                            @endif
                        </div>
                        <input class="totalGeneralaclaraciones" id="totalGeneralaclaraciones"
                            name="totalGeneralaclaraciones" type="hidden" value="0">
                        <input class="totalGeneralAnexos" id="totalGeneralAnexos" name="totalGeneralAnexos"
                            type="hidden" value="0">
                        <input class="totalPeticiones" id="totalPeticiones" name="totalPeticiones" type="hidden"
                            value="{{$solicitud_doc->id}}">
                        <input class="id_pqr" id="id_pqr" name="id_pqr" type="hidden" value="{{$solicitud_doc->id}}">
                        <input class="id_estado_pqr" id="id_estado_pqr" type="hidden" value="{{$solicitud_doc->estadospqr_id}}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/solicituddocinfo/gestion.js') }}"></script>
@endsection
<!-- ************************************************************* -->