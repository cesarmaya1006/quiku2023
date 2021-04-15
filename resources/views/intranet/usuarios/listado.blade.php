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
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-10">
                <div class="row d-flex justify-content-center mt-3">
                    <div class="col-11 col-md-6">
                        @include('includes.error-form')
                        @include('includes.mensaje')
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-10 table-responsive">
                <table class="table table-striped table-hover table-sm display">
                    <thead>
                        <tr>
                            <th>Id Radicado</th>
                            <th>Fecha de Radicado</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($consultas as $consulta)
                            <tr>
                                <td scope="row">{{ $consulta->id }}</td>
                                <td>{{ $consulta->fecha_radicado }}</td>
                                <td>{{ $consulta->estado }}</td>
                                <td>
                                    <a href="#" class="btn btn-accion-tabla text-primary">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')

@endsection
<!-- ************************************************************* -->
