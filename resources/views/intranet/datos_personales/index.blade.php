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
                        <h3 class="card-title">Actualizar datos</h3>
                    </div>
                        @if ($usuario->persona)
                            @include('intranet.datos_personales.persona')
                        @endif
                        @if ($usuario->representante)
                            @include('intranet.datos_personales.representante')
                        @endif
                        @if ($usuario->empleado)
                            @include('intranet.datos_personales.empleado')
                        @endif
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/extranet/registro.js') }}"></script>
@endsection
<!-- ************************************************************* -->
