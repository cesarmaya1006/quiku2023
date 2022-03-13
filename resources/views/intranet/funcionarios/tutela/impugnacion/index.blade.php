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
                            <strong>{{ $tutela->radicado }}</strong> - <strong>Registro de Impugnación</strong>
                        </h3>
                    </div>
                    <div class="card-body">
                        @include(
                            'intranet.funcionarios.tutela.includes.infoPrincipalTutela'
                        )
                        @include(
                            'intranet.funcionarios.tutela.includes.detalle'
                        )
                        @include(
                            'intranet.funcionarios.tutela.includes.infoSentenciaPrimeraInstancia'
                        )
                        <div class="row mt-3 mb-5">
                            <div class="col-6 d-flex justify-content-center">
                                <a href="{{ route('tutelas_impugnacion_registro', ['id' => $tutela->id]) }}"
                                    class="btn btn-primary pl-5 pr-5 btn-sombra">Registrar Impugnación Externa</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ route('detalles_tutelas', ['id' => $tutela->id]) }}"
                                    class="btn btn-danger btn-sm btn-sombra mx-2 px-4 float-end">Regresar</a>
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
