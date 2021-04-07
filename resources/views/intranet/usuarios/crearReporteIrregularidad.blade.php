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
        {{-- Reporte de irregularidad --}}
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Crear Reporte de irregularidad</h3>
                </div>
                <form>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Tipo de solicitud</label>
                            <select name="" id="" class="custom-select rounded-0">
                                <option value="">--Seleccione--</option>
                                <option value="">Ninguna</option>
                                <option value="">Ninguna</option>
                                <option value="">Ninguna</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Hechos</label>
                            <input class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label for="">Anexos o Pruebas</label>
                            <input class="form-control" type="file">
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