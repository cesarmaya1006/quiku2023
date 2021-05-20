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
    Sistema de informaci&oacute;n
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            {{-- Generar PQR --}}
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Generar PQR</h3>
                    </div>
                    <div class="card-body">
                        <div class="row d-flex">
                            @foreach ($tipoPQR as $tipo)
                                <div class="col-12 col-md-4">
                                    <div class="card card-Light collapsed-card" style="box-shadow: 0px 0px 0px 0px ;">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                @if ($tipo->id < 4)
                                                    <a
                                                        href="{{ route($tipo->url, ['id' => $tipo->id]) }}">{{ $tipo->tipo }}</a>
                                                @else
                                                    <a href="{{ route($tipo->url) }}"
                                                        style="text-decoration: none;">{{ $tipo->tipo }}</a>
                                                @endif
                                            </h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                        class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                            <!-- /.card-tools -->
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body" style="display: none;">
                                            {{ $tipo->descripcion }}
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if (session("id"))
                            <input class="" id="id" type="hidden" value="{{ utf8_encode(utf8_decode(session("id"))) }}">
                            <input class="" id="pqr_tipo"  type="hidden" value="{{ utf8_encode(utf8_decode(session("pqr_tipo"))) }}">
                            <input class="" id="radicado"  type="hidden" value="{{ utf8_encode(utf8_decode(session("radicado"))) }}">
                            <input class="" id="fecha_radicado"  type="hidden" value="{{ utf8_encode(utf8_decode(session("fecha_radicado"))) }}">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/generar_pqr/index.js') }}"></script> 
@endsection
<!-- ************************************************************* -->
