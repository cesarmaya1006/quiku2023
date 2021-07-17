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
    $plazoRecurso = 0;
    $aclaracionesMenu = 0;
    $aclaraciones = 0;
    $aclaracionesRespuesta = 0;
    $solicitudes = $reporte->peticiones->count();
    $solicitudesRespuesta = 0;
    $recursosMenu = 0;
    foreach ($reporte->peticiones as $solicitud) {
        if ($solicitud->aclaraciones) {
            foreach ($solicitud->aclaraciones as $aclaracion) {
                $aclaraciones++;
                if ($aclaracion->respuesta != null) {
                    $aclaracionesRespuesta++;
                }
            }
        }
        if ($solicitud->respuesta) {
            $solicitudesRespuesta++;
        }
        if ($solicitud->recurso) {
            $recursosMenu++;
        }
        if( $plazoRecurso != $solicitud->recurso_dias){
            $plazoRecurso += $solicitud->recurso_dias;
        }
    }
    if ($aclaraciones > 0) {
        if ($aclaraciones == $aclaracionesRespuesta) {
            $aclaracionesMenu = 1;
        } else {
            $aclaracionesMenu = 2;
        }
    }
    if ($solicitudes == $solicitudesRespuesta) {
        $respuestaMenu = 1;
    } elseif ($solicitudesRespuesta > 0) {
        $respuestaMenu = 2;
    } else {
        $respuestaMenu = 0;
    }

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
                        <h3 class="card-title">Gestión a Petición Número de radicado:
                            <strong>{{ $reporte->radicado }}</strong>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('usuario-gestionar_reporte_guardar') }}" method="POST" autocomplete="off"
                            enctype="multipart/form-data" id="fromGestionSolicitudDatosUsuario">
                            @csrf
                            @method('post')
                            <div class="col-12 solicitud rounded border mb-3 p-2">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        @if ($reporte->persona_id != null)
                                            Persona que interpone la Petición:
                                            <strong>{{ $reporte->persona->nombre1 . ' ' . $reporte->persona->nombre2 . ' ' . $reporte->persona->apellido1 . ' ' . $reporte->persona->apellido2 }}</strong>
                                        @else
                                            Empresa que interpone la Petición:
                                            <strong>{{ $reporte->empresa->razon_social . ' ' . $reporte->empresa->razon_social . ' ' . $reporte->empresa->razon_social . ' ' . $reporte->empresa->razon_social }}</strong>
                                        @endif
                                    </div>
                                    <div class="col-12 col-md-6">
                                        Tipo petición: <strong>{{ $reporte->tipoPqr->tipo }}</strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        Fecha de radicado: <strong>{{ $reporte->fecha_radicado }}</strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        Fecha estimada de respuesta:
                                        <strong>{{ date('Y-m-d', strtotime($reporte->fecha_generacion . '+ ' . $reporte->tiempo_limite . ' days')) }}</strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        Estado: <strong>{{ $reporte->estado->estado_usuario }}</strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <strong><a href="{{ route('pqrRadicadaPdfRi', ['id' => $reporte->id]) }}"
                                                target="_blank" rel="noopener noreferrer"><i class="fa fa-download"
                                                    aria-hidden="true"></i>
                                                Descargar
                                                Radicado</a></strong>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 d-flex flex-wrap rounded border justify-content-center m-2 p-2 ">
                                <a href="" class="menu-radicado btn card-step verificado activo"
                                    data-content='menu-card-radicado'>
                                    <div class="">
                                        <span style="font-size: 2.5em;">
                                            <i class="far fa-file-alt"></i>
                                        </span>
                                        <h6>Radicacion de la Solicitud</h6>
                                    </div>
                                </a>
                                @if ($reporte->prorroga)
                                    <a href="" class="menu-prorroga btn card-step verificado"
                                        data-content='menu-card-prorroga'>
                                        <div class="">
                                            <span style="font-size: 2.5em;">
                                                <i class="fas fa-check"></i>
                                            </span>
                                            <h6>Prórroga</h6>
                                        </div>
                                    </a>
                                @endif
                                @if ($aclaracionesMenu == 1)
                                    <a href="" class="menu-aclaracion btn card-step verificado "
                                        data-content='menu-card-aclaraciones'>
                                        <div class="">
                                            <span style="font-size: 2.5em;">
                                                <i class="fas fa-check"></i>
                                            </span>
                                            <h6>Aclaración y/o complementación</h6>
                                        </div>
                                    </a>
                                @elseif($aclaracionesMenu == 2)
                                    <a href="" class="menu-aclaracion btn card-step tramite"
                                        data-content='menu-card-aclaraciones'>
                                        <div class="">
                                            <span style="font-size: 2.5em;">
                                                <i class="fas fa-hourglass-half"></i>
                                            </span>
                                            <h6>Aclaración y/o complementación</h6>
                                        </div>
                                    </a>
                                @endif
                                @if ($respuestaMenu == 1)
                                    <a href="" class="menu-respuesta btn card-step verificado"
                                        data-content='menu-card-respuesta'>
                                        <div class="">
                                            <span style="font-size: 2.5em;">
                                                <i class="fas fa-check"></i>
                                            </span>
                                            <h6>Respuesta PQR</h6>
                                        </div>
                                    </a>
                                @elseif($respuestaMenu == 2)
                                    <a href="" class="menu-respuesta btn card-step tramite"
                                        data-content='menu-card-respuesta'>
                                        <div class="">
                                            <span style="font-size: 2.5em;">
                                                <i class="fas fa-hourglass-half"></i>
                                            </span>
                                            <h6>Respuesta PQR</h6>
                                        </div>
                                    </a>
                                @else
                                    <a href="" class="menu-respuesta btn card-step desativado"
                                        data-content='menu-card-respuesta'>
                                        <div class="">
                                            <span style="font-size: 2.5em;">
                                                <i class="fas fa-hourglass-half"></i>
                                            </span>
                                            <h6>Respuesta PQR</h6>
                                        </div>
                                    </a>
                                @endif
                                @if ($reporte->estadospqr_id == 7 || $reporte->estadospqr_id == 8 || $reporte->estadospqr_id == 9)
                                    <a href="" class="menu-recurso btn card-step tramite" data-content='menu-card-recursos'>
                                        <div class="">
                                            <span style="font-size: 2.5em;">
                                                <i class="fas fa-hourglass-half"></i>
                                            </span>
                                            <h6>Recurso</h6>
                                        </div>
                                    </a>
                                @elseif($reporte->estadospqr_id == 10)
                                    <a href="" class="menu-recurso btn card-step verificado"
                                        data-content='menu-card-recursos'>
                                        <div class="">
                                            <span style="font-size: 2.5em;">
                                                <i class="fas fa-check"></i>
                                            </span>
                                            <h6>Recurso</h6>
                                        </div>
                                    </a>
                                @endif
                                @if ($reporte->estadospqr_id == 6 || $reporte->estadospqr_id == 10 )
                                    <a  href="{{ route('usuario-index') }}" class="menu-cierre btn card-step verificado" data-content = 'menu-salir-inicio'>
                                        <div class="">
                                            <span style="font-size: 2.5em;">
                                                <i class="fas fa-check"></i>
                                            </span>
                                            <h6>Cierre del proceso de GESTION PQR</h6>
                                        </div>
                                    </a>
                                @endif
                            </div>
                            <hr style="border-top: solid 4px black">
                            <?php $n_solicitud = 0; ?>
                            @if ($reporte->prorroga_dias)
                                <div class="menu-card-prorroga menu-card d-none rounded border mb-3 p-2 ">
                                    <div class="col-12 col-md-6">
                                        Días de prórroga: <strong>{{ $reporte->prorroga_dias }} </strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <strong><a href="{{ route('prorrogaPdfRi', ['id' => $reporte->id]) }}" target="_blank"
                                                rel="noopener noreferrer"><i class="fa fa-download" aria-hidden="true"></i>
                                                Descargar Radicado Prórroga</a></strong>
                                    </div>
                                </div>
                            @endif
                            @foreach ($reporte->peticiones as $solicitud)
                                <?php $n_solicitud++; ?>
                                <div class="col-12 rounded border mb-3 p-2 solicitud_general">
                                    <div class="menu-card-radicado menu-card">
                                        <div class="row">
                                            <div class="col-12">
                                                <h5>Petición {{ $n_solicitud }}</h5>
                                            </div>
                                            @if (!$solicitud->otro)
                                                <div class="col-12">
                                                    <p class="text-justify"><strong>Tipo de irregularidad:</strong> {{ $solicitud->irregularidad }}</p>
                                                </div>
                                            @else
                                                <div class="col-12">
                                                    <p class="text-justify"><strong>Tipo de irregularidad:</strong> {{ $solicitud->irregularidad }}</p>
                                                    <p class="text-justify">{{ $solicitud->otro }}</p>
                                                </div>
                                            @endif
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12">
                                                <h6>Hechos</h6>
                                            </div>
                                            <div class="col-12">
                                                <table class="table table-light">
                                                    <tbody>
                                                        @foreach ($solicitud->hechos as $hecho)
                                                        <tr>
                                                            <td class="text-justify">{{ $hecho->hecho }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <hr>
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
                                                        @foreach ($solicitud->anexos as $anexo)
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
                                    </div>
                                    @if ($solicitud->aclaraciones->count() > 0)
                                        <div class="row menu-card-aclaraciones menu-card d-none">
                                            <div class="col-12">
                                                <h5>Petición {{ $n_solicitud }}</h5>
                                            </div>
                                            <div class="col-12">
                                                <h6>Aclaraciones</h6>
                                            </div>
                                            <div class="col-12 table-responsive">
                                                <table class="table table-light" style="font-size: 0.8em;">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Fecha Sol Aclaración</th>
                                                            <th scope="col">Aclaracion</th>
                                                            <th scope="col">Estado</th>
                                                            <th scope="col">Fecha Resp.</th>
                                                            <th scope="col">Respuesta</th>
                                                            <th scope="col">Documento</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($solicitud->aclaraciones as $aclaracion)
                                                            @if ($aclaracion->respuesta != '')
                                                                <tr>
                                                                    <td>{{ $aclaracion->fecha }}</td>
                                                                    <td class="text-justify">{{ $aclaracion->aclaracion }}</td>
                                                                    <td>Resuelta</td>
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
                                            @if ($solicitud->aclaraciones->where('respuesta', '')->count() > 0)
                                                <br>
                                                <div class="col-12">
                                                    <h6>Pendientes de aclaración o complementación</h6>
                                                </div>
                                                @foreach ($solicitud->aclaraciones as $aclaracion)
                                                    @if ($aclaracion->respuesta == '')
                                                        <div class="content rounded border aclaracion p-3">
                                                            <div class="row mt-2">
                                                                <div class="col-12 col-md-3 form-group">
                                                                    <label for="fecha{{ $aclaracion->id }}">Fecha de
                                                                        aclaración</label>
                                                                    <span
                                                                        class="text-break">{{ $aclaracion->fecha }}</span>
                                                                </div>
                                                                <div class="col-12 col-md-9 form-group">
                                                                    <label
                                                                        for="aclaracion{{ $aclaracion->id }}">Aclaración</label>
                                                                    <span
                                                                        class="text-break">{{ $aclaracion->aclaracion }}</span>
                                                                </div>
                                                                <div class="col-12 form-group">
                                                                    <strong><a
                                                                            href="{{ route('aclaracionPdfRi', ['id' => $aclaracion->id]) }}"
                                                                            target="_blank" rel="noopener noreferrer"><i
                                                                                class="fa fa-download"
                                                                                aria-hidden="true"></i>
                                                                            Descargar
                                                                            Documento aclaración</a></strong>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label for="">Respuesta aclaracion:</label>
                                                                <textarea class="aclaracionRespuesta"
                                                                    name="aclaracionRespuesta"></textarea>
                                                            </div>
                                                            <div class="row mt-3">
                                                                <div class="col-12" id="anexosConsulta">
                                                                    <div class="col-12 d-flex row anexoconsulta">
                                                                        <div
                                                                            class="col-12 titulo-anexo d-flex justify-content-between">
                                                                            <h6>Anexo</h6>
                                                                            <button type="button"
                                                                                class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminaranexoConsulta"><i
                                                                                    class="fas fa-minus-circle"></i>
                                                                                Eliminar anexo</button>
                                                                        </div>
                                                                        <div
                                                                            class="col-12 col-md-4 form-group titulo-anexoConsulta">
                                                                            <label for="titulo">Título anexo</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-sm"
                                                                                name="titulo" id="titulo">
                                                                        </div>
                                                                        <div
                                                                            class="col-12 col-md-4 form-group descripcion-anexoConsulta">
                                                                            <label for="descripcion">Descripción</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-sm"
                                                                                name="descripcion" id="descripcion">
                                                                        </div>
                                                                        <div
                                                                            class="col-12 col-md-4 form-group doc-anexoConsulta">
                                                                            <label for="documentos">Anexos o Pruebas</label>
                                                                            <input class="form-control form-control-sm"
                                                                                type="file" name="documentos"
                                                                                id="documentos">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="col-12 d-flex justify-content-end flex-row mb-3">
                                                                    <button
                                                                        class="btn btn-success btn-xs btn-sombra pl-2 pr-2 crearAnexo"
                                                                        id="crearAnexo"><i class="fa fa-plus-circle mr-2"
                                                                            aria-hidden="true"></i> Añadir
                                                                        otro Anexo</button>
                                                                </div>
                                                            </div>
                                                            <input class="id_aclaracion" name="id_aclaracion" type="hidden"
                                                                value="{{ $aclaracion->id }}">
                                                            <input class="totalanexos" name="totalanexos" type="hidden"
                                                                value="">
                                                            <hr>
                                                            <p class="text-danger">Se recuerda que el tiempo maximo para dar respuesta a esta aclaracion es de 30 dias, despues de este tiempo la pqr se cerrara por vencimiento de terminos.</p>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                    @endif
                                    <br>
                                    @if ($solicitud->respuesta)
                                        <div class="row menu-card-respuesta menu-card d-none">
                                            <div class="col-12">
                                                <h5>Petición {{ $n_solicitud }}</h5>
                                            </div>
                                            <div class="col-12">
                                                <h6>Respuesta petición</h6>
                                            </div>
                                            <div class="col-12 form-group">
                                                <textarea type="text" class="form-control form-control-sm respuesta"
                                                    rows="5"
                                                    readonly>{{ isset($solicitud->respuesta->respuesta) ? $solicitud->respuesta->respuesta : '' }}</textarea>
                                            </div>
                                            @if (isset($solicitud->respuesta->documentos))
                                                <div class="row respuestaAnexos">
                                                    <div class="col-12">
                                                        <div class="col-12">
                                                            <h6>Anexos respuesta petición</h6>
                                                        </div>
                                                        <table class="table table-light">
                                                            <tbody>
                                                                @foreach ($solicitud->respuesta->documentos as $anexo)
                                                                    <tr>
                                                                        <td class="text-justify">{{ $anexo->titulo }}</td>
                                                                        <td class="text-justify">{{ $anexo->descripcion }}</td>
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
                                            @endif
                                        </div>
                                    @endif
                                    <div class="menu-card-recursos menu-card d-none">
                                        <div class="col-12">
                                            <h5>Petición {{ $n_solicitud }}</h5>
                                        </div>
                                        @if (sizeOf($solicitud->recursos))
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
                                                                    <td class="text-justify">{{ $recurso->tiporeposicion->tipo }}</td>
                                                                    <td class="text-justify">{{ $recurso->recurso }}</td>
                                                                    <td>Resuelta</td>
                                                                    @if ($recurso->documentos)
                                                                        <td>
                                                                            @foreach ($recurso->documentos as $anexo)
                                                                                <a href="{{ asset('documentos/respuestas/' . $anexo->url) }}"
                                                                                    target="_blank"
                                                                                    rel="noopener noreferrer">{{ $anexo->titulo }}</a>
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
                                                    <hr class="mt-5">
                                                </div>
                                            </div>
                                        @endif

                                        @if ($solicitud->recurso == 1 && $solicitud->respuesta && !sizeOf($solicitud->recursos))
                                            <input class="respuestaProcedeRecurso" type="hidden" value="1">
                                            <div class="col-12 col-md-6">
                                                <h6>¿Desea interponer un recurso?</h6>
                                            </div>
                                            <div class="col-12 col-md-6 d-flex flex-row">
                                                <div class="form-check mb-3 mr-4">
                                                    <input id="" name="check-recurso-procede-form{{ $n_solicitud }}"
                                                        type="radio"
                                                        class="form-check-input recurso_procede_check recurso_procede_si"
                                                        value="1" />
                                                    <label id="_label" class="form-check-label" for="">SI</label>
                                                </div>
                                                <div class="form-check mb-3">
                                                    <input id="" name="check-recurso-procede-form{{ $n_solicitud }}"
                                                        type="radio"
                                                        class="form-check-input recurso_procede_check recurso_procede_no"
                                                        value="0" checked />
                                                    <label id="_label" class="form-check-label" for="">NO</label>
                                                </div>
                                            </div>
                                            <div class="row form-recursos">
                                                <input class="id_solicitudRecurso" type="hidden"
                                                    value="{{ $solicitud->id }}">
                                                <div class="row">
                                                    <div class="form-group col-12 col-md-12 titulo-recurso">
                                                        <div class="col-12 d-flex justify-content-between">
                                                            <label for="">Tipo de recurso</label>
                                                        </div>
                                                        <select class="custom-select rounded-0 tipo_reposicion requerido">
                                                            <option value="">--Seleccione--</option>
                                                            <option value="1">Aclaración y/o corrección</option>
                                                            <option value="2">Reposición</option>
                                                            <option value="3">Apelación</option>
                                                            <option value="4">Reposición y apelación</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <h6>Recurso</h6>
                                                    </div>
                                                    <div class="col-12 form-group">
                                                        <textarea type="text"
                                                            class="form-control form-control-sm respuestaRecurso"></textarea>
                                                    </div>
                                                    <div class="col-12" id="anexosRecursos">
                                                        <div class="col-12 d-flex row anexoRecurso" id="anexoRecurso">
                                                            <div class="col-12 titulo-anexo d-flex justify-content-between">
                                                                <h6>Anexo</h6>
                                                                <button type="button"
                                                                    class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminaranexoRecurso"><i
                                                                        class="fas fa-minus-circle"></i> Eliminar
                                                                    anexo</button>
                                                            </div>
                                                            <div class="col-12 col-md-4 form-group titulo-anexoRecurso">
                                                                <label for="titulo">Título anexo</label>
                                                                <input type="text" class="form-control form-control-sm"
                                                                    id="titulo">
                                                            </div>
                                                            <div
                                                                class="col-12 col-md-4 form-group descripcion-anexoRecurso">
                                                                <label for="descripcion">Descripción</label>
                                                                <input type="text" class="form-control form-control-sm"
                                                                    id="descripcion">
                                                            </div>
                                                            <div class="col-12 col-md-4 form-group doc-anexoRecurso">
                                                                <label for="documentoRecurso">Anexos o Pruebas</label>
                                                                <input class="form-control form-control-sm" type="file"
                                                                    id="documentoRecurso">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end flex-row mb-3">
                                                        <button
                                                            class="btn btn-success btn-xs btn-sombra pl-2 pr-2 crearAnexoRecurso"
                                                            id="crearAnexoRecurso"><i class="fa fa-plus-circle mr-2"
                                                                aria-hidden="true"></i> Añadir
                                                            otro Anexo</button>
                                                    </div>
                                                </div>
                                                <div class="card-footer d-flex justify-content-end guardarRecurso">
                                                    <button type="" class="btn btn-primary px-4"
                                                        data_url="{{ route('recurso_guardar_d') }}"
                                                        data_url_anexos="{{ route('recurso_anexos_guardar_d') }}"
                                                        data_token="{{ csrf_token() }}">Guardar recurso</button>
                                                </div>
                                            </div>
                                        @endif
                                        @php
                                            $validacionRecurso2 = false;
                                            $tipoRecursoValidacion = 0;
                                            $respuestaRecurso = $solicitud->recursos;
                                            foreach ($respuestaRecurso as $key => $value) {
                                                if ($key == 0) {
                                                    if ($value->respuestaRecurso && $value->tipo_reposicion_id) {
                                                        $tipoRecursoValidacion = $value->tipo_reposicion_id;
                                                        $validacionRecurso2 = true;
                                                    }
                                                }
                                            }
                                            $totalrecursos = sizeOf($respuestaRecurso);
                                        @endphp
                                        @if ($solicitud->recurso == 1 && $solicitud->respuesta && (sizeOf($solicitud->recursos) && $validacionRecurso2 && $totalrecursos <= 1) && $tipoRecursoValidacion == 1)
                                            <input class="respuestaProcedeRecurso" type="hidden" value="1">
                                            <div class="col-12 col-md-6">
                                                <h6>¿Desea interponer otro recurso?</h6>
                                            </div>
                                            <div class="col-12 col-md-6 d-flex flex-row">
                                                <div class="form-check mb-3 mr-4">
                                                    <input id="" name="check-recurso-procede-form{{ $n_solicitud }}"
                                                        type="radio"
                                                        class="form-check-input recurso_procede_check recurso_procede_si"
                                                        value="1" />
                                                    <label id="_label" class="form-check-label" for="">SI</label>
                                                </div>
                                                <div class="form-check mb-3">
                                                    <input id="" name="check-recurso-procede-form{{ $n_solicitud }}"
                                                        type="radio"
                                                        class="form-check-input recurso_procede_check recurso_procede_no"
                                                        value="0" checked />
                                                    <label id="_label" class="form-check-label" for="">NO</label>
                                                </div>
                                            </div>
                                            <div class="row form-recursos">
                                                <input class="id_solicitudRecurso" type="hidden"
                                                    value="{{ $solicitud->id }}">
                                                <div class="row">
                                                    <div class="form-group col-12 col-md-12 titulo-recurso">
                                                        <div class="col-12 d-flex justify-content-between">
                                                            <label for="">Tipo de recurso</label>
                                                        </div>
                                                        <select class="custom-select rounded-0 tipo_reposicion requerido">
                                                            <option value="">--Seleccione--</option>
                                                            <option value="2">Reposición</option>
                                                            <option value="3">Apelación</option>
                                                            <option value="4">Reposición y apelación</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <h6>Recurso</h6>
                                                    </div>
                                                    <div class="col-12 form-group">
                                                        <textarea type="text"
                                                            class="form-control form-control-sm respuestaRecurso"></textarea>
                                                    </div>
                                                    <div class="col-12" id="anexosRecursos">
                                                        <div class="col-12 d-flex row anexoRecurso" id="anexoRecurso">
                                                            <div class="col-12 titulo-anexo d-flex justify-content-between">
                                                                <h6>Anexo</h6>
                                                                <button type="button"
                                                                    class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminaranexoRecurso"><i
                                                                        class="fas fa-minus-circle"></i> Eliminar
                                                                    anexo</button>
                                                            </div>
                                                            <div class="col-12 col-md-4 form-group titulo-anexoRecurso">
                                                                <label for="titulo">Título anexo</label>
                                                                <input type="text" class="form-control form-control-sm"
                                                                    id="titulo">
                                                            </div>
                                                            <div
                                                                class="col-12 col-md-4 form-group descripcion-anexoRecurso">
                                                                <label for="descripcion">Descripción</label>
                                                                <input type="text" class="form-control form-control-sm"
                                                                    id="descripcion">
                                                            </div>
                                                            <div class="col-12 col-md-4 form-group doc-anexoRecurso">
                                                                <label for="documentoRecurso">Anexos o Pruebas</label>
                                                                <input class="form-control form-control-sm" type="file"
                                                                    id="documentoRecurso">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end flex-row mb-3">
                                                        <button
                                                            class="btn btn-success btn-xs btn-sombra pl-2 pr-2 crearAnexoRecurso"
                                                            id="crearAnexoRecurso"><i class="fa fa-plus-circle mr-2"
                                                                aria-hidden="true"></i> Añadir
                                                            otro Anexo</button>
                                                    </div>
                                                </div>
                                                <div class="card-footer d-flex justify-content-end guardarRecurso">
                                                    <button type="" class="btn btn-primary px-4"
                                                        data_url="{{ route('recurso_guardar_d') }}"
                                                        data_url_anexos="{{ route('recurso_anexos_guardar_d') }}"
                                                        data_token="{{ csrf_token() }}">Guardar recurso</button>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <input class="totalsolicitudAclaraciones" name="totalsolicitudAclaraciones" type="hidden"
                                        value="">
                                    <input class="id_solicitud" name="id_solicitud" type="hidden"
                                        value="{{ $solicitud->id }}">
                                </div>
                                <input class="totalAclaraciones" name="totalAclaraciones" type="hidden" value="">
                            @endforeach
                            <input class="plazoRecurso" name="plazoRecurso" type="hidden" value="{{ $plazoRecurso }}">
                            <input class="id_pqr" id="id_pqr" name="id_pqr" type="hidden" value="{{ $reporte->id }}">
                            <input class="totalGeneralAnexos" id="totalGeneralAnexos" name="totalGeneralAnexos"
                                type="hidden" value="{{ $reporte->id }}">
                            <input class="totalGeneralaclaraciones" id="totalGeneralaclaraciones"
                                name="totalGeneralaclaraciones" type="hidden" value="{{ $reporte->id }}">
                            <div class="card-footer d-flex justify-content-end">
                                <button href="{{ route('usuario-index') }}" class="btn btn-danger mx-2 px-4">Regresar</button>
                                @if (!($reporte->estadospqr_id == 6 || $reporte->estadospqr_id == 10))
                                    <button type="submit" class="btn btn-primary px-4">Guardar</button>
                                @endif
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/denuncia/gestion_usuario.js') }}"></script>
@endsection
<!-- ************************************************************* -->
