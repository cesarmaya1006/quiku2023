@extends("theme.back.plantilla")
<!-- ************************************************************* -->
<!-- Funciones php -->
@section('funciones_php')
    @include('includes.funciones_php')
@endsection
<!-- Pagina CSS -->
@section('estilosHojas')
    <link rel="stylesheet" href="{{ asset('css/intranet/normas/normas.css') }}">
@endsection
<!-- ************************************************************* -->
@section('tituloHoja')
    Parametros - Wiku
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    @include('intranet.funcionarios.menu.menu')
    <hr>
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>Configuración de la Wiku</h5>
                </div>
            </div>
            <hr>
            <div class="row  d-flex justify-content-around">
                <div class="col-12">
                    <div class="card card-primary card-outline card-tabs">
                        <div class="card-header p-0 pt-1 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-three-normas-tab" data-toggle="pill"
                                        href="#custom-tabs-three-normas" role="tab" aria-controls="custom-tabs-three-normas"
                                        aria-selected="false">Normas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-jurisprudencia-tab" data-toggle="pill"
                                        href="#custom-tabs-three-jurisprudencia" role="tab"
                                        aria-controls="custom-tabs-three-jurisprudencia"
                                        aria-selected="false">Jurisprudencia</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-doctrinas-tab" data-toggle="pill"
                                        href="#custom-tabs-three-doctrinas" role="tab"
                                        aria-controls="custom-tabs-three-doctrinas" aria-selected="false">Doctrinas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-argumento-tab" data-toggle="pill"
                                        href="#custom-tabs-three-argumento" role="tab"
                                        aria-controls="custom-tabs-three-argumento" aria-selected="false">Argumentos</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-three-normas" role="tabpanel"
                                    aria-labelledby="custom-tabs-three-normas-tab">
                                    <div class="row d-flex justify-content-around">
                                        <div class="col-12 col-md-4 text-md-left pl-2">
                                            <h5>Listado de Normas actuales</h5>
                                        </div>
                                        <div class="col-12 col-md-3 text-md-right pl-2 pr-md-5">
                                            <a href="{{ route('wiku_norma-crear') }}"
                                                class="btn btn-success btn-sm text-center pl-3 pr-3"
                                                style="font-size: 0.8em;{{ $fuentes->count() == 0 ? 'opacity: 0.4; cursor: default;pointer-events: none;' : '' }}"><i
                                                    class="fas fa-plus-circle mr-2"></i> Nueva Norma</a>
                                        </div>
                                        <div class="col-12 col-md-4 text-md-right pl-2 pr-md-5">
                                            <a href="{{ route('wiku-index_fuenteN') }}"
                                                class="btn btn-info btn-sm text-center pl-3 pr-3"
                                                style="font-size: 0.8em;"><i class="fas fa-plus-circle mr-2"></i> Configurar
                                                Fuentes Normativas</a>
                                        </div>
                                    </div>
                                    <div class="row mt-3" style="font-size: 0.8em;">
                                        <div class="col-12">
                                            <table class="table table-striped table-hover table-sm displayScroll">
                                                <thead class="thead-inverse">
                                                    <tr>
                                                        <th class="text-center">Fuente</th>
                                                        <th class="text-center">Fecha de Emisión</th>
                                                        <th class="text-center">Ente Emisor</th>
                                                        <th class="text-center">Artículo</th>
                                                        <th class="text-center">Fecha de entrada en vigencia</th>
                                                        <th class="text-center">Texto Principal</th>
                                                        <th class="text-center">Descripción del articulo</th>
                                                        <th class="text-center">Área de conocimiento</th>
                                                        <th class="text-center">Tema</th>
                                                        <th class="text-center">Tema Específico</th>
                                                        <th>Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($normas as $norma)
                                                        <tr>
                                                            <td>{{ $norma->documento->fuente }}</td>
                                                            <td class="text-center">{{ $norma->documento->fecha }}</td>
                                                            <td class="text-center">{{ $norma->documento->emisor }}
                                                            </td>
                                                            <td class="text-center">{{ $norma->articulo }}</td>
                                                            <td class="text-center">{{ $norma->fecha }}</td>
                                                            <td class="text-center">{{ $norma->texto }}</td>
                                                            <td class="text-center">{{ $norma->descripcion }}</td>
                                                            <td>{{ $norma->temaEspecifico->tema_->area->area }}</td>
                                                            <td style="min-width:100px;">
                                                                {{ $norma->temaEspecifico->tema_->tema }}</td>
                                                            <td style="min-width:150px;">
                                                                {{ $norma->temaespecifico->tema }}</td>
                                                            <td class="d-flex">
                                                                <a href="{{ route('wiku_norma-editar', ['id' => $norma->id]) }}"
                                                                    class="btn-accion-tabla tooltipsC text-info"
                                                                    title="Editar"><i class="fa fa-edit"
                                                                        aria-hidden="true"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-three-jurisprudencia" role="tabpanel"
                                    aria-labelledby="custom-tabs-three-jurisprudencia-tab">
                                    Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus
                                    volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce
                                    nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue
                                    ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur
                                    eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur,
                                    ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex
                                    vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus.
                                    Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-three-doctrinas" role="tabpanel"
                                    aria-labelledby="custom-tabs-three-doctrinas-tab">
                                    Texto Doctrinas
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-three-argumento" role="tabpanel"
                                    aria-labelledby="custom-tabs-three-argumento-tab">
                                    Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus
                                    turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis
                                    vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum
                                    pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget
                                    aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac
                                    habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/parametros/wiku.js') }}"></script>
@endsection
<!-- ************************************************************* -->
