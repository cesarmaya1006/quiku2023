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
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">WIKU</h3>
                </div>
                <div class="card-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 col-md-8 d-flex justify-content-around">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio1" checked="checked" value="todos">
                                <label class="form-check-label">Todos</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio1" value="Normas">
                                <label class="form-check-label">Normas</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio1" value="Jurisprudencias">
                                <label class="form-check-label">Jurisprudencias</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio1" value="Argumentos">
                                <label class="form-check-label">Argumentos</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio1" value="Normas">
                                <label class="form-check-label">Normas</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 col-md-8 form-group d-flex justify-content-center">
                            <label for="query" class="mr-3" style="white-space:nowrap">Busqueda Básica</label>
                            <input type="text" class="form-control" id="query" name="query"
                                placeholder="Ingrese palabras de busqueda">
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
@endsection
<!-- ************************************************************* -->
