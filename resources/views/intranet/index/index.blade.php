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
    Sistema de informaci&oacute;n jurídico MGL Y ASOCIADOS
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="cuerpo">
        @if (session('camb_password') == 0)
            @include('intranet.index.cambio-password.cambiarPassword')
        @else
            @if (session('rol_id') == 2)
                @include('intranet.index.administradores.index')
            @endif
            @if (session('rol_id') == 3 || session('rol_id') == 4)
                @include('intranet.index.apoderados.index')
            @endif
            @if (session('rol_id') == 5)
                @include('intranet.index.clientes.index')
            @endif
            @if (session('rol_id') == 6)
                @include('intranet.index.empleados.index')
            @endif
            @if (session('rol_id') == 1)
                @include('intranet.index.administradores.index')
            @endif
        @endif
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@endsection
<!-- ************************************************************* -->
