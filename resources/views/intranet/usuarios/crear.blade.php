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
                    <form action="{{ route('usuario-generar_direccion') }}" method="POST" autocomplete="off">
                        @csrf
                        @method('post')
                        <div class="card-body">
                            <div class="row d-flex">
                                <div class="form-check col-md-4 col-6">
                                    <input class="form-check-input" type="radio"  value="peticion" name="radio1" checked="">
                                    <label class="form-check-label">Petición</label>
                                </div>
                                <div class="form-check col-md-4 col-6">
                                    <input class="form-check-input" type="radio" value="queja" name="radio1">
                                    <label class="form-check-label">Queja</label>
                                </div>
                                <div class="form-check col-md-4 col-6">
                                    <input class="form-check-input" type="radio" value="reclamo" name="radio1">
                                    <label class="form-check-label">Reclamo</label>
                                </div>
                                <div class="form-check col-md-4 col-6">
                                    <input class="form-check-input" type="radio" value="consulta" name="radio1">
                                    <label class="form-check-label">Consulta</label>
                                </div>
                                <div class="form-check col-md-4 col-6">
                                    <input class="form-check-input" type="radio" value="solicitud_datos" name="radio1">
                                    <label class="form-check-label">Solicitud sobre mis datos personales</label>
                                </div>
                                <div class="form-check col-md-4 col-6">
                                    <input class="form-check-input" type="radio" value="reporte" name="radio1">
                                    <label class="form-check-label">Reporte irregularidad</label>
                                </div>
                                <div class="form-check col-md-4 col-6">
                                    <input class="form-check-input" type="radio" value="felicitacion" name="radio1">
                                    <label class="form-check-label">Felicitación</label>
                                </div>
                                <div class="form-check col-md-4 col-6">
                                    <input class="form-check-input" type="radio" value="solicitud_doc" name="radio1">
                                    <label class="form-check-label">Solicitud documentos o información</label>
                                </div>
                                <div class="form-check col-md-4 col-6">
                                    <input class="form-check-input" type="radio" value="sugerencia" name="radio1">
                                    <label class="form-check-label">Sugerencia</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-4">Crear</button>
                        </div>
                    </form>
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
