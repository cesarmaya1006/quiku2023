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
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Gestión a Petición Número de radicado:
                            <strong>{{ $pqr->radicado }}</strong>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('usuario-gestionar_pqr_p_guardar') }}" method="POST" autocomplete="off"
                            enctype="multipart/form-data" id="fromGestionPqrUsuario">
                            @csrf
                            @method('post')
                            <div class="col-12 solicitud rounded border mb-3 p-2">
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
                                    <div class="col-12 col-md-6">
                                        Lugar de adquisición del producto o servicio:
                                        <strong>{{ $pqr->adquisicion }}</strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        Tipo petición: <strong>{{ $pqr->tipo }}</strong>
                                    </div>
                                    @if ($pqr->adquisicion == 'Sede física')
                                        <div class="col-12 col-md-6">
                                            Departatmento :
                                            <strong>{{ $pqr->sede->municipio->departamento->departamento }}</strong>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            Municipio : <strong>{{ $pqr->sede->municipio->municipio }}</strong>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            Sede : <strong>{{ $pqr->sede->sede }}</strong>
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
                                    @else
                                        <div class="col-12 col-md-6">
                                            Servicio : <strong>{{ $pqr->servicio->servicio }}</strong>
                                        </div>
                                    @endif
                                    <div class="col-12 col-md-6">
                                        Número de factura: <strong>{{ $pqr->factura }}</strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        Fecha de factura: <strong>{{ $pqr->fecha_factura }}</strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        Días de prorroga: <strong>{{ $pqr->prorroga_dias }} </strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        Fecha de radicado: <strong>{{ $pqr->fecha_radicado }}</strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        Fecha estimada de respuesta:
                                        <strong>{{ date('Y-m-d', strtotime($pqr->fecha_generacion . '+ ' . $pqr->tiempo_limite . ' days')) }}</strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        Estado: <strong>{{ $pqr->estado->estado_usuario }}</strong>
                                    </div>
                                </div>
                            </div>

                            <hr style="border-top: solid 4px black">
                            <?php $n_peticion = 0; ?>
                            @foreach ($pqr->peticiones as $peticion)
                                <?php $n_peticion++; ?>
                                <div class="col-12 rounded border mb-3 p-2 peticion_general">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5>Petición {{ $n_peticion }}</h5>
                                        </div>
                                        <div class="col-12">
                                            <p><strong>Solicitud:</strong> {{ $peticion->motivo->sub_motivo }}</p>
                                        </div>
                                        @if($peticion->otro)
                                            <p>{{$peticion->otro}}</p>
                                        @endif
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12">
                                            <h6>Hechos</h6>
                                        </div>
                                        <div class="col-12">
                                            <ul>
                                                @foreach ($peticion->hechos as $hecho)
                                                    <li>
                                                        <p>{{ $hecho->hecho }}</p>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <br>
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
                                                            <td>{{ $anexo->titulo }}</td>
                                                            <td>{{ $anexo->descripcion }}</td>
                                                            <td><a href="{{ asset('documentos/pqr/' . $anexo->url) }}"
                                                                    target="_blank" rel="noopener noreferrer">Descargar</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <hr>
                                    @if ($peticion->aclaraciones->count() > 0)
                                        <div class="row">
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
                                                        @foreach ($peticion->aclaraciones as $aclaracion)
                                                            @if ($aclaracion->respuesta != '')
                                                                <tr>
                                                                    <td>{{ $aclaracion->fecha }}</td>
                                                                    <td>{{ $aclaracion->aclaracion }}</td>
                                                                    <td>Resuelta</td>
                                                                    <td>{{ $aclaracion->fecha_respuesta }}</td>
                                                                    <td>{{ $aclaracion->respuesta }}</td>
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
                                            @if ($peticion->aclaraciones->where('respuesta', '')->count() > 0)
                                                <br>
                                                <div class="col-12">
                                                    <h6>Pendientes de aclaración o complementación</h6>
                                                </div>
                                                @foreach ($peticion->aclaraciones as $aclaracion)
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
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                    @endif
                                    <br>
                                    @if ($peticion->respuesta)
                                        <div class="row">
                                            <div class="col-12">
                                                <h6>Respuesta petición</h6>
                                            </div>
                                            <div class="col-12 form-group">
                                                <textarea type="text" class="form-control form-control-sm respuesta"
                                                    rows="5"
                                                    readonly>{{ isset($peticion->respuesta->respuesta) ? $peticion->respuesta->respuesta : '' }}</textarea>
                                            </div>
                                            @if (isset($peticion->respuesta->documentos))
                                                <div class="row respuestaAnexos">
                                                    <div class="col-12">
                                                        <div class="col-12">
                                                            <h6>Anexos respuesta petición</h6>
                                                        </div>
                                                        <table class="table table-light">
                                                            <tbody>
                                                                @foreach ($peticion->respuesta->documentos as $anexo)
                                                                    <tr>
                                                                        <td>{{ $anexo->titulo }}</td>
                                                                        <td>{{ $anexo->descripcion }}</td>
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
                                    @if (sizeOf($peticion->recursos))
                                        <div class="row">
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
                                                        @foreach ($peticion->recursos as $recurso)
                                                            <tr>
                                                                <td>{{ $recurso->fecha_radicacion }}</td>
                                                                <td>{{ $recurso->tiporeposicion->tipo }}</td>
                                                                <td>{{ $recurso->recurso }}</td>
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

                                    @if ($peticion->recurso == 1 && $peticion->respuesta && !sizeOf($peticion->recursos))
                                        <input class="respuestaProcedeRecurso" type="hidden" value="1">
                                        <div class="col-12 col-md-6">
                                            <h6>¿Desea interponer un recurso?</h6>
                                        </div>
                                        <div class="col-12 col-md-6 d-flex flex-row">
                                            <div class="form-check mb-3 mr-4">
                                                <input id="" name="check-recurso-procede-form" type="radio"
                                                    class="form-check-input recurso_procede_check recurso_procede_si"
                                                    value="1" />
                                                <label id="_label" class="form-check-label" for="">SI</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input id="" name="check-recurso-procede-form" type="radio"
                                                    class="form-check-input recurso_procede_check recurso_procede_no"
                                                    value="0" checked />
                                                <label id="_label" class="form-check-label" for="">NO</label>
                                            </div>
                                        </div>
                                        <div class="row form-recursos">
                                            <input class="id_peticionRecurso" type="hidden" value="{{ $peticion->id }}">
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
                                                                    class="fas fa-minus-circle"></i> Eliminar anexo</button>
                                                        </div>
                                                        <div class="col-12 col-md-4 form-group titulo-anexoRecurso">
                                                            <label for="titulo">Título anexo</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="titulo">
                                                        </div>
                                                        <div class="col-12 col-md-4 form-group descripcion-anexoRecurso">
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
                                                    data_url="{{ route('recurso_guardar') }}"
                                                    data_url_anexos="{{ route('recurso_anexos_guardar') }}"
                                                    data_token="{{ csrf_token() }}">Guardar recurso</button>
                                            </div>
                                        </div>
                                    @endif
                                    @php
                                        $validacionRecurso2 = false;
                                        $tipoRecursoValidacion = 0;
                                        $respuestaRecurso = $peticion->recursos;
                                        foreach ($respuestaRecurso as $key => $value) {
                                            if ($key == 0) {
                                                if ($value->respuestaRecurso && $value->tipo_reposicion_id) {
                                                    $tipoRecursoValidacion= $value->tipo_reposicion_id;
                                                    $validacionRecurso2 = true;
                                                }
                                            }
                                        }
                                        $totalrecursos = sizeOf($respuestaRecurso);
                                    @endphp
                                    @if ($peticion->recurso == 1 && $peticion->respuesta && (sizeOf($peticion->recursos) && $validacionRecurso2 && $totalrecursos <= 1) && $tipoRecursoValidacion == 1)
                                        <input class="respuestaProcedeRecurso" type="hidden" value="1">
                                        <div class="col-12 col-md-6">
                                            <h6>¿Desea interponer otro recurso?</h6>
                                        </div>
                                        <div class="col-12 col-md-6 d-flex flex-row">
                                            <div class="form-check mb-3 mr-4">
                                                <input id="" name="check-recurso-procede-form" type="radio"
                                                    class="form-check-input recurso_procede_check recurso_procede_si"
                                                    value="1" />
                                                <label id="_label" class="form-check-label" for="">SI</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input id="" name="check-recurso-procede-form" type="radio"
                                                    class="form-check-input recurso_procede_check recurso_procede_no"
                                                    value="0" checked />
                                                <label id="_label" class="form-check-label" for="">NO</label>
                                            </div>
                                        </div>
                                        <div class="row form-recursos">
                                            <input class="id_peticionRecurso" type="hidden" value="{{ $peticion->id }}">
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
                                                                    class="fas fa-minus-circle"></i> Eliminar anexo</button>
                                                        </div>
                                                        <div class="col-12 col-md-4 form-group titulo-anexoRecurso">
                                                            <label for="titulo">Título anexo</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="titulo">
                                                        </div>
                                                        <div class="col-12 col-md-4 form-group descripcion-anexoRecurso">
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
                                                    data_url="{{ route('recurso_guardar') }}"
                                                    data_url_anexos="{{ route('recurso_anexos_guardar') }}"
                                                    data_token="{{ csrf_token() }}">Guardar recurso</button>
                                            </div>
                                        </div>
                                    @endif

                                    <input class="totalPeticionAclaraciones" name="totalPeticionAclaraciones" type="hidden"
                                        value="">
                                    <input class="id_peticion" name="id_peticion" type="hidden"
                                        value="{{ $peticion->id }}">
                                </div>
                                <input class="totalAclaraciones" name="totalAclaraciones" type="hidden" value="">
                            @endforeach
                            <input class="id_pqr" id="id_pqr" name="id_pqr" type="hidden" value="{{ $pqr->id }}">
                            <input class="totalGeneralAnexos" id="totalGeneralAnexos" name="totalGeneralAnexos"
                                type="hidden" value="{{ $pqr->id }}">
                            <input class="totalGeneralaclaraciones" id="totalGeneralaclaraciones"
                                name="totalGeneralaclaraciones" type="hidden" value="{{ $pqr->id }}">
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary px-4">Guardar</button>
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
    <script src="{{ asset('js/intranet/generar_pqr/gestion_usuario.js') }}"></script>
@endsection
<!-- ************************************************************* -->
