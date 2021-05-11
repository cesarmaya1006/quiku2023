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
    Sistema de informaci&oacute;n PQR LEGAL PROCEEDINGS
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
                                        <strong>{{ $pqr->municipio->departamento->departamento }}</strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        Municipio : <strong>{{ $pqr->municipio->municipio }}</strong>
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
                                    Días de prorroga: <strong>{{ $pqr->prorroga_dias }}</strong>
                                    @if ($pqr->prorroga_dias > 0)
                                        <a href="{{ asset('documentos/pqr/' . $pqr->prorroga_pdf) }}" target="_blank"
                                            rel="noopener noreferrer">Documento Soporte</a>
                                    @endif
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
                        </div>
                        <hr style="border-top: solid 4px black">
                        <div class="col-12 rounded border mb-3 p-2">
                            <div class="row">
                                <div class="col-12">
                                    <h5>Peticiones</h5>
                                </div>
                            </div>
                            <hr style="border-bottom: outset 3px gray;">
                            <?php $n_peticion = 0; ?>
                            @foreach ($pqr->peticiones as $peticion)
                                <?php $n_peticion++; ?>
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Petición {{ $n_peticion }}</h6>
                                    </div>
                                    <div class="col-12">
                                        <p><strong>Solicitud:</strong> {{ $peticion->motivo->sub_motivo }}</p>
                                    </div>
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
                                @if ($peticion->aclaraciones->count() > 0)
                                    <hr>
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
                                                                @if ($aclaracion->pdf != '')
                                                                    <td><a href="{{ asset('documentos/pqr/' . $aclaracion->pdf) }}"
                                                                            target="_blank"
                                                                            rel="noopener noreferrer">Descargar</a>
                                                                    </td>
                                                                @else
                                                                    <td>---</td>
                                                                @endif
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        @if ($peticion->aclaraciones->where('respuesta', '')->count() > 0)
                                            <br>
                                            <div class="col-12">
                                                <h6>Pendientes de aclaración o complementación</h6>
                                            </div>
                                            <table class="table table-light" style="font-size: 0.8em;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Fecha Sol Aclaración</th>
                                                        <th scope="col">Aclaracion</th>
                                                        <th scope="col">Estado</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($peticion->aclaraciones as $aclaracion)
                                                    @if ($aclaracion->respuesta == '')
                                                            <tr>
                                                                <td>{{ $aclaracion->fecha }}</td>
                                                                <td>{{ $aclaracion->aclaracion }}</td>
                                                                <td>Pendiente</td>
                                                                <td></td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <form class="col-12" action="#" method="POST" autocomplete="off"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('post')
                                                @foreach ($peticion->aclaraciones as $aclaracion)
                                                    @if ($aclaracion->respuesta == '')
                                                        <div class="row" style="font-size: 0.7em;">
                                                            <div class="col-12 col-md-3 form-group">
                                                                <label for="fecha{{ $aclaracion->id }}">Fecha de
                                                                    aclaración</label>
                                                                <span
                                                                    class="form-control form-control-sm">{{ $aclaracion->fecha }}</span>
                                                            </div>
                                                            <div class="col-12 col-md-3 form-group">
                                                                <label
                                                                    for="aclaracion{{ $aclaracion->id }}">Aclaración</label>
                                                                <span
                                                                    class="form-control form-control-sm">{{ $aclaracion->aclaracion }}</span>
                                                            </div>
                                                            <div class="col-12 col-md-3 form-group">
                                                                <label
                                                                    for="respuesta{{ $aclaracion->id }}">Respuesta</label>
                                                                <input type="text" name="respuesta{{ $aclaracion->id }}"
                                                                    id="respuesta{{ $aclaracion->id }}"
                                                                    class="form-control form-control-sm" placeholder=""
                                                                    aria-describedby="helpId" required>
                                                            </div>
                                                            <div class="col-12 col-md-3 form-group">
                                                                <label for="respuesta{{ $aclaracion->id }}">Anexo
                                                                    Respuesta</label>
                                                                <input type="file"
                                                                    name="pdf_aclaracion{{ $aclaracion->id }}"
                                                                    id="pdf_aclaracion{{ $aclaracion->id }}"
                                                                    class="form-control form-control-sm" placeholder=""
                                                                    aria-describedby="helpId" accept="application/pdf">
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </form>
                                        @endif
                                    </div>
                                @endif
                                <br>
                                <hr>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Respuesta</h6>
                                    </div>
                                    <div class="col-12">
                                        <table class="table table-light" style="font-size: 0.8em;">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Fecha</th>
                                                    <th scope="col">Respuesta</th>
                                                    <th scope="col">Documentos</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($peticion->respuestas as $respuesta)
                                                    <tr>
                                                        <td>{{ $anexo->fecha }}</td>
                                                        <td>{{ $anexo->respuesta }}</td>
                                                        <td>
                                                            @foreach ($respuesta->documentos as $documento)
                                                                <p>
                                                                    <a href="{{ asset('documentos/pqr/' . $documento->url) }}"
                                                                        target="_blank"
                                                                        rel="noopener noreferrer">{{ $documento->titulo }}</a>
                                                                </p>
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endforeach
                        </div>
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

@endsection
<!-- ************************************************************* -->
