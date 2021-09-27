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
    Parametros - fuentes Normativas
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    @include('intranet.funcionarios.menu.menu')
    <hr>
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>Listado de Fuentes Normativas Actuales</h5>
                </div>
                <div class="col-12 col-md-6 col-lg-6 text-md-right text-lg-right pl-2 pr-md-5 pr-lg-5">
                    <a href="{{ route('wiku_fuenteN-crear') }}" class="btn btn-success btn-xs text-center pl-3 pr-3 mr-4"
                        style="font-size: 0.9em;"><i class="fas fa-plus-circle mr-2"></i> Nueva Fuente Normativa</a>
                    <a href="{{ route('wiku-index') }}" class="btn btn-primary btn-xs btn-sm text-center pl-3 pr-3"
                        style="font-size: 0.9em;"><i class="fas fa-reply mr-2"></i> Volver</a>
                </div>
            </div>
            <hr>
            <div class="row  d-flex justify-content-around" style="font-size: 0.8em;">
                <div class="col-12">
                    <table class="table table-striped table-hover table-sm display">
                        <thead class="thead-inverse">
                            <tr>
                                <th class="text-center">Fuente Normativa</th>
                                <th>Número</th>
                                <th>Fecha de Emisión</th>
                                <th>Ente Emisor</th>
                                <th>Descarga</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fuentes as $fuente)
                                <tr>
                                    <td>{{ $fuente->fuente }}</td>
                                    <td>{{ $fuente->numero }}</td>
                                    <td>{{ $fuente->fecha }}</td>
                                    <td>{{ $fuente->emisor }}</td>
                                    <td class="text-center">
                                        @if ($fuente->archivo != null)
                                            <a href="{{ asset('documentos/wiku/fuentes/' . $fuente->archivo) }}"
                                                target="_blank" rel="noopener noreferrer">Descarga</a>
                                        @else
                                            ---
                                        @endif
                                    </td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
