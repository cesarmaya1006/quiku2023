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
    {{-- Sistema de informaci&oacute;n PQR LEGAL PROCEEDINGS --}}
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
                        <h3 class="card-title">Tutela con número de radicado:
                            <strong>{{ $tutela->radicado }}</strong>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Registro de Impugnación</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-outline card-primary collapsed-card">
                                    <div class="card-header">
                                        <h5 class="card-title">Sentencia
                                            en primera instancia</h5>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <!-- /.card-tools -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="row px-2">
                                            <div class="row">
                                                @foreach ($tutela->primeraInstancia as $primeraInstancia)
                                                    <div class="col-12 col-md-3 text-center form-group">
                                                        <label>Fecha de la sentencia</label>
                                                        <br>
                                                        <span
                                                            class="">{{ $primeraInstancia->fecha_sentencia }}</span>
                                                    </div>
                                                    <div class="col-12 col-md-3 text-center form-group">
                                                        <label>Fecha de notificación</label>
                                                        <br>
                                                        <span
                                                            class="">{{ $primeraInstancia->fecha_notificacion }}</span>
                                                    </div>
                                                    <div class="col-12 col-md-3 text-center form-group">
                                                        <label>Sentido de la sentencia</label>
                                                        <br>
                                                        <span
                                                            class="">{{ $primeraInstancia->sentencia }}</span>
                                                    </div>
                                                    <div class="col-12 col-md-3 text-center form-group">
                                                        <label>Documento de sentencia</label>
                                                        <br>
                                                        <span class=""><a
                                                                href="{{ asset('documentos/tutelas/sentencias/' . $primeraInstancia->url_sentencia) }}"
                                                                target="_blank"
                                                                rel="noopener noreferrer">Descargar</a></span>
                                                    </div>
                                                    @if ($primeraInstancia->anexosPrimeraInstancia->count() > 0)
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-12 mt-3 mb-4">
                                                                    <h6>Archivos Adjuntos</h6>
                                                                </div>
                                                                @foreach ($primeraInstancia->anexosPrimeraInstancia as $anexo)
                                                                    <div class="col-12">
                                                                        <div class="row">
                                                                            <div class="col-4">
                                                                                <div
                                                                                    class="col-12 col-md-3 text-center form-group">
                                                                                    <label>Titulo
                                                                                        Anexo</label>
                                                                                    <br>
                                                                                    <span
                                                                                        class="">{{ $anexo->titulo_anexo }}</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4">
                                                                                <div
                                                                                    class="col-12 col-md-3 text-center form-group">
                                                                                    <label>Descripción
                                                                                        Anexo</label>
                                                                                    <br>
                                                                                    <span
                                                                                        class="">{{ $anexo->descripcion_anexo }}</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-4">
                                                                                <div
                                                                                    class="col-12 col-md-3 text-center form-group">
                                                                                    <label>Archivo
                                                                                        Anexo</label>
                                                                                    <br>
                                                                                    <span class=""><a
                                                                                            href="{{ asset('documentos/tutelas/sentencias/' . $anexo->url_anexo) }}"
                                                                                            target="_blank"
                                                                                            rel="noopener noreferrer">Descargar</a></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('tutelas_primera_instancia_guardar', ['id' => $tutela->id]) }}"
                                    class="form-horizontal row" method="POST" autocomplete="off"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <div class="row mt-5 mb-3">
                                        <div class="col-12">
                                            @if ($primeraInstancia->resuelvesPrimeraInstancia->count() > 0)
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12 mt-3 mb-4">
                                                            <h6>Resuleves Desfavorables o parcialmente desfavorables Primera
                                                                Instancia</h6>
                                                        </div>
                                                        @php
                                                            $contador = 0;
                                                        @endphp
                                                        @foreach ($primeraInstancia->resuelvesPrimeraInstancia as $resuelve)
                                                            @if ($resuelve->sentido != 'Favorable')
                                                                @php
                                                                    $contador++;
                                                                @endphp
                                                                <div class="row mb-5">
                                                                    <div class="col-1">N° {{ $contador }}
                                                                    </div>
                                                                    <div class="col-12 col-md-3 mb-2">
                                                                        Tiempo de cumplimiento:
                                                                        <strong>
                                                                            @if ($resuelve->dias != null)
                                                                                {{ $resuelve->dias . ' dias ' }}
                                                                            @endif
                                                                            @if ($resuelve->horas != null)
                                                                                {{ $resuelve->horas . ' horas ' }}
                                                                            @endif
                                                                        </strong>
                                                                    </div>
                                                                    <div class="col-12 col-md-3 mb-2">
                                                                        Fecha de Cumplimiento:
                                                                        <strong>
                                                                            @if ($resuelve->dias != null)
                                                                                {{ date('Y-m-d', strtotime($resuelve->sentencia->fecha_notificacion . '+ ' . ($resuelve->dias + 1) . ' days')) }}
                                                                            @endif
                                                                            @if ($resuelve->horas != null)
                                                                                {{ date('Y-m-d', strtotime($resuelve->sentencia->fecha_notificacion . '+ 1 days')) }}
                                                                            @endif
                                                                        </strong>
                                                                    </div>
                                                                    @if ($resuelve->resuelve != null)
                                                                        <div class="col-12 col-md-4 mb-2">
                                                                            <p class="text-justify">
                                                                                {{ $resuelve->resuelve }}</p>
                                                                        </div>
                                                                    @else
                                                                        <div class="col-12 col-md-4 mb-2">
                                                                            Inscrito por cantidad, omitido el resuleve
                                                                        </div>
                                                                    @endif
                                                                    <div class="col-12 col-md-1 mb-2">
                                                                        <a href="#"
                                                                            class="btn btn-primary btn-xs pl-3 pr-3">Gestionar</a>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <hr class="border border-dark border-top-5">
                                                    <div class="row">
                                                        <div class="col-12 mt-3 mb-4">
                                                            <h6>Resuleves Favorables Primera
                                                                Instancia</h6>
                                                        </div>
                                                        @php
                                                            $contador = 0;
                                                        @endphp
                                                        @foreach ($primeraInstancia->resuelvesPrimeraInstancia as $resuelve)
                                                            @if ($resuelve->sentido == 'Favorable')
                                                                @php
                                                                    $contador++;
                                                                @endphp
                                                                <div class="row mb-5">
                                                                    <div class="col-1">N° {{ $contador }}
                                                                    </div>
                                                                    @if ($resuelve->resuelve != null)
                                                                        <div class="col-12 col-md-10 mb-2">
                                                                            <p class="text-justify">
                                                                                {{ $resuelve->resuelve }}</p>
                                                                        </div>
                                                                    @else
                                                                        <div class="col-12 col-md-10 mb-2">
                                                                            Inscrito por cantidad, omitido el resuleve
                                                                        </div>
                                                                    @endif
                                                                    <div class="col-12 col-md-1 mb-2">
                                                                        <a href="#"
                                                                            class="btn btn-info btn-xs pl-3 pr-3">Registrar</a>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>

                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit"
                                            class="btn btn-primary btn-sm btn-sombra pl-4 pr-4">Guardar</button>
                                        <a href="{{ route('detalles_tutelas', ['id' => $tutela->id]) }}"
                                            class="btn btn-danger btn-sm btn-sombra mx-2 px-4 float-end">Regresar</a>
                                    </div>
                                    <!-- /.card-footer -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/tutela/sentenciap.js') }}"></script>
@endsection
<!-- ************************************************************* -->
