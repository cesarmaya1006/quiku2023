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
    Parametros - Analitica
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    @include('intranet.funcionarios.menu.menu')
    <hr>
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row">
                <div class="col-12 col-md-6 form-group">
                    <label for="cargarCanvas">Selector de graficos</label>
                    <select class="form-control form-control-sm" data_url="{{ route('analitica-tipoPQR') }}"
                        id="cargarCanvas">
                        <option value="">---Seleccione---</option>
                        <option value="tipopqr">Tipo de PQR</option>
                        <option value="motivos">Motivos</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <div id="analiticaAjax" style="height: 370px; max-width: auto; margin: 0px auto;"></div>
                </div>
            </div>
            <hr>
        </div>
    </div>

@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/canvas/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('js/canvas/jquery.canvasjs.min.js') }}"></script>
    <script src="{{ asset('js/intranet/analitica/analitica.js') }}"></script>
@endsection
<!-- ************************************************************* -->
