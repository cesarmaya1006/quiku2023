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
                                    Departatmento : <strong>{{ $pqr->municipio->departamento->departamento }}</strong>
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
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h6>Prorroga</h6>
                            </div>
                            <div class="col-12 col-md-6 d-flex flex-row">
                                <div class="form-check mb-3 mr-4">
                                    <input id="" name="cherck_prorroga" type="radio" class="form-check-input" value="1"
                                        {{ $pqr->prorroga == 1 ? 'checked' : '' }} />
                                    <label id="_label" class="form-check-label" for="">SI</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input id="" name="cherck_prorroga" type="radio" class="form-check-input" value="0"
                                        {{ $pqr->prorroga == 0 ? 'checked' : '' }} />
                                    <label id="_label" class="form-check-label" for="">NO</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <a href="#" target="_blank" rel="noopener noreferrer">SOPORTE DE PRORROGA</a>
                            </div>
                        </div>
                        @foreach ($pqr->peticiones as $peticion)
                            <hr style="border-top: solid 4px black">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row" action="" method="post">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h5>Petición</h5>
                                                        </div>
                                                        <div class="col-12">{{ $peticion->motivo->sub_motivo }}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">Justificacion:</div>
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
                                <div class="col-12 col-md-6"><button class="btn btn-success float-end" type="button"><i
                                            class="fa fa-plus-circle" aria-hidden="true"></i> Solicitar aclaracion</button>
                                </div>
                                <div class="col-12">
                                    <form class="row" action="" method="post">

                                    </form>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <h6>Respuesta</h6>
                                </div>
                                <div class="col-12 col-md-6"><button class="btn btn-success float-end" type="button"><i
                                            class="fa fa-plus-circle" aria-hidden="true"></i> Añadir respuesta</button>
                                </div>
                                <div class="col-12">
                                    <form class="row" action="" method="post">
                                        <input type="file" name="" id="">
                                    </form>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <h6>Recurso</h6>
                                </div>
                                <div class="col-12 col-md-6 d-flex flex-row">
                                    <div class="form-check mb-3 mr-4">
                                        <input id="" name="cherck_prorroga" type="radio" class="form-check-input" value="1"
                                            {{ $pqr->recurso == 1 ? 'checked' : '' }} />
                                        <label id="_label" class="form-check-label" for="">SI</label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input id="" name="cherck_prorroga" type="radio" class="form-check-input" value="0"
                                            {{ $pqr->recurso == 0 ? 'checked' : '' }} />
                                        <label id="_label" class="form-check-label" for="">NO</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <form class="row" action="" method="post">
                                        <input type="number" name="" id="">
                                        <input type="date" name="" id="">
                                        <span>Fecha Max Notificacion:
                                            {{ date('Y-m-d', strtotime($peticion->fecha_notificacion . '+ ' . ($peticion->recurso_dias + 1) . ' days')) }}
                                        </span>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
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
