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
    @if ($usuario->camb_password == 0)
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-8">
                    @include('includes.error-form')
                    @include('includes.mensaje')
                </div>
            </div>
            @if (session('rol_id') == 6)
                @include('intranet.index.index_usuarios')
            @endif
            @if (session('rol_id') == 5)
                @include('intranet.index.index_funcionarios')
            @endif

        </div>
    @else
        @include('intranet.index.cambiopassword')
    @endif
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')

@endsection
<!-- ************************************************************* -->
