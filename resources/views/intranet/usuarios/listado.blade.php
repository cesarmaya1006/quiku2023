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
    Sistema de informaci&oacute;n PQR LEGAL PROCEEDINGS
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-10">
                <h4>Listado de PQR´s</h4>
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
                        @foreach ($pqr_S as $pqr)
                            <tr>
                                <td scope="row">{{ $pqr->id }}</td>
                                <td>{{ $pqr->fecha_radicado }}</td>
                                <td>{{ $pqr->estado }}</td>
                                <td></td>
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
