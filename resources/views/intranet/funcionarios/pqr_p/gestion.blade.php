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
    Sistema de informaci&oacute;n
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
                        <form action="{{ route('funcionario-gestionar_pqr_p_guardar') }}" method="POST" autocomplete="off"
                            enctype="multipart/form-data" id="fromGestionPqr">
                            @csrf
                            @method('post')
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
                                    <div class="col-12 col-md-6">
                                        Lugar de adquisición del producto o servicio: <strong>{{ $pqr->adquisicion }}</strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        Tipo petición: <strong>{{ $pqr->tipo }}</strong>
                                    </div>
                                    @if ($pqr->adquisicion == 'Sede física')
                                        <div class="col-12 col-md-6">
                                            Departatmento : <strong>{{ $pqr->sede->municipio->departamento->departamento }}</strong>
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
                                        Días de prorroga: <strong>{{ $pqr->prorroga_dias }}</strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        Fecha de radicado: <strong>{{ $pqr->fecha_radicado }}</strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        Fecha estimada de respuesta:
                                        <strong>{{ date('Y-m-d', strtotime($pqr->fecha_radicado . '+ ' . ($pqr->tipoPqr->tiempos + $pqr->prorroga_dias) . ' days')) }}</strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        Estado: <strong>{{ $pqr->estado }}</strong>
                                    </div>
                                </div>
                                <hr>
                                <div class="row pb-3">
                                    <div class="col-12 col-md-6 ">
                                        <h6>Prorroga</h6>
                                    </div>
                                    @if (!$pqr->prorroga)
                                        <div class="col-12 col-md-6 d-flex flex-row">
                                            <div class="form-check mb-3 mr-4">
                                                <input id="" name="prorroga" type="radio" class="form-check-input" value="1"
                                                    {{ $pqr->prorroga == 1 ? 'checked' : '' }} />
                                                <label id="_label" class="form-check-label" for="">SI</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input id="" name="prorroga" type="radio" class="form-check-input" value="0"
                                                    {{ $pqr->prorroga == 0 ? 'checked' : '' }} />
                                                <label id="_label" class="form-check-label" for="">NO</label>
                                            </div>
                                        </div>
                                    @else 
                                        <div class="col-12 col-md-6 d-flex flex-row">
                                            <div class="form-check mb-3 mr-4">
                                                <input id="" name="prorroga" type="radio" class="form-check-input" value="1"
                                                    {{ $pqr->prorroga == 1 ? 'checked' : '' }} disabled />
                                                <label id="_label" class="form-check-label" for="">SI</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input id="" name="prorroga" type="radio" class="form-check-input" value="0"
                                                    {{ $pqr->prorroga == 0 ? 'checked' : '' }} disabled/>
                                                <label id="_label" class="form-check-label" for="">NO</label>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-12 d-none" id="anexosProrroga">
                                        <div class="col-12 d-flex row anexo">
                                            <div class="col-12 col-md-8 form-group">
                                                <label for="documentos">Anexos o Pruebas</label>
                                                <input class="form-control form-control-sm" type="file" name="documentos_prorroga" accept="application/pdf"
                                                id="documentos">
                                            </div>
                                            <div class="col-12 col-md-4 form-group">
                                                <label for="plazo">Nuevo Plazo:</label>
                                                <input type="number" class="form-control form-control-sm" name="plazo_prorroga" id="plazo_prorroga" min="1" max="{{$pqr->tipoPqr->tiempos}}">
                                            </div>
                                        </div>
                                    </div>
                                    @if ($pqr->prorroga)
                                        <div class="col-12">
                                            <a href="#" target="_blank" rel="noopener noreferrer">SOPORTE DE PRORROGA</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @foreach ($pqr->peticiones as $peticion)
                                <hr style="border-top: solid 4px black">
                                <div class="col-12 peticion_general rounded border mb-3 p-2"> 
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row" action="" method="post">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <h5>Petición</h5>
                                                                </div>
                                                                <div class="col-12">{{ $peticion->motivo->sub_motivo }}</div>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <h6>Justificacion:</h6>
                                                                <div class="col-12">{{ $peticion->justificacion }}</div>
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
                                    <div class="row">
                                        <div class="col-12">
                                            <h6>Hechos</h6>
                                        </div>
                                        <div class="col-12">
                                            <table class="table table-light">
                                                <tbody>
                                                    @foreach ($peticion->hechos as $hecho)
                                                        <tr>
                                                            <td>{{ $hecho->hecho }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <h6>Aclaraciones</h6>
                                        </div>
                                        <div class="col-12 col-md-6 d-flex flex-row">
                                            <div class="form-check mb-3 mr-4">
                                                <input id="" name="aclaracion_check" type="radio" class="form-check-input aclaracion_check" value="1"
                                                    {{ $peticion->aclaracion == 1 ? 'checked' : '' }} {{ $peticion->aclaracion == 1 ? 'disabled' : '' }} />
                                                <label id="_label" class="form-check-label" for="">SI</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input id="" name="aclaracion_check" type="radio" class="form-check-input aclaracion_check" value="0"
                                                    {{ $peticion->aclaracion == 0 ? 'checked' : '' }} {{ $peticion->aclaracion == 1 ? 'disabled' : '' }}/>
                                                <label id="_label" class="form-check-label" for="">NO</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12 table-responsive">
                                                    <table>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="col-12 d-none aclaracion-form">
                                                <div class="col-12" id="aclaraciones">
                                                    <div class="form-group block_aclaracion">
                                                        <div class="title-aclaracion d-flex justify-content-between mt-2">
                                                            <label for="aclaracion">Aclaración</label>
                                                            <button type="button" class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminarAclaracion"><i class="fas fa-minus-circle"></i></button>
                                                        </div>
                                                        <input class="form-control mt-2 aclaracion" type="text" name="aclaracion" id="aclaracion">
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end flex-row">
                                                    <button class="btn btn-success btn-xs btn-sombra pl-2 pr-2 crearAclaracion" id="crearAclaracion"><i
                                                        class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Añadir
                                                        otro Aclaración</button>
                                                </div>
                                            </div>
                                            <input class="totalPeticionAclaraciones" id="totalPeticionAclaraciones" name="totalPeticionAclaraciones" type="hidden" value="0">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <h6>Respuesta</h6>
                                        </div>
                                        <div class="col-12 form-group">
                                            <textarea type="text" class="form-control form-control-sm respuesta" name="respuesta" id=""></textarea>
                                        </div>
                                        <div class="col-12" id="anexosConsulta">
                                            <div class="col-12 d-flex row anexoconsulta">
                                                <div class="col-12 titulo-anexo d-flex justify-content-between">
                                                    <h6>Anexo</h6>
                                                    <button type="button"
                                                        class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminaranexoConsulta"><i
                                                            class="fas fa-minus-circle"></i></button>
                                                </div>
                                                <div class="col-12 col-md-4 form-group titulo-anexoConsulta">
                                                    <label for="titulo">Título anexo</label>
                                                    <input type="text" class="form-control form-control-sm" name="titulo" id="titulo">
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
                                            <button class="btn btn-success btn-xs btn-sombra pl-2 pr-2 crearAnexo" id="crearAnexo"><i
                                                    class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Añadir
                                                otro Anexo</button>
                                        </div>
                                        <input class="totalPeticionAnexos" id="totalPeticionAnexos" name="totalPeticionAnexos" type="hidden" value="0">
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <h6>¿A la petición le procede recurso?</h6>
                                        </div>
                                        <div class="col-12 col-md-6 d-flex flex-row">
                                            <div class="form-check mb-3 mr-4">
                                                <input id="" name="peticion" type="radio" class="form-check-input peticion" value="1"
                                                    {{ $pqr->recurso == 1 ? 'checked' : '' }} />
                                                <label id="_label" class="form-check-label" for="">SI</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input id="" name="peticion" type="radio" class="form-check-input peticion" value="0"
                                                    {{ $pqr->recurso == 0 ? 'checked' : '' }} />
                                                <label id="_label" class="form-check-label" for="">NO</label>
                                            </div>
                                        </div>
                                        <div class="col-12 row px-3 peticion-form d-none">
                                            <input type="date" class="form-control col-12 col-md-6" name="" id="">
                                            <span class="col-12 col-md-6 d-flex justify-content-center align-items-center">Fecha Max Notificacion:
                                                {{ date('Y-m-d', strtotime($peticion->fecha_notificacion . '+ ' . ($peticion->recurso_dias + 1) . ' days')) }}
                                            </span>
                                        </div>
                                    </div>
                                    <input class="id_peticion" id="id_peticion" name="id_peticion" type="hidden" value="{{$peticion->id}}">
                                </div>
                            @endforeach
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary px-4">Guardar</button>
                            </div>
                            <input class="totalGeneralaclaraciones" id="totalGeneralaclaraciones" name="totalGeneralaclaraciones" type="hidden" value="0">
                            <input class="totalGeneralAnexos" id="totalGeneralAnexos" name="totalGeneralAnexos" type="hidden" value="0">
                            <input class="totalPeticiones" id="totalPeticiones" name="totalPeticiones" type="hidden" value="{{$pqr->id}}">
                            <input class="id_pqr" id="id_pqr" name="id_pqr" type="hidden" value="{{$pqr->id}}">
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
    <script src="{{ asset('js/intranet/generar_pqr/gestion.js') }}"></script>
@endsection
<!-- ************************************************************* -->
