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
                    <h3 class="card-title">WIKU NORMAS</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-striped table-hover table-sm display">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th class="text-center">Fuente</th>
                                        <th class="text-center">Fecha de Emisión</th>
                                        <th class="text-center">Ente Emisor</th>
                                        <th class="text-center">Artículo</th>
                                        <th class="text-center">Fecha de entrada en vigencia</th>
                                        <th class="text-center">Texto Principal</th>
                                        <th class="text-center">Descripción del articulo</th>
                                        <th class="text-center">Área de conocimiento</th>
                                        <th class="text-center">Tema</th>
                                        <th class="text-center">Tema Específico</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($normas as $norma)
                                        <tr>
                                            <td>{{ $norma->documento->fuente }}</td>
                                            <td class="text-center">{{ $norma->documento->fecha }}</td>
                                            <td class="text-center">{{ $norma->documento->emisor }}
                                            </td>
                                            <td class="text-center">{{ $norma->articulo }}</td>
                                            <td class="text-center">{{ $norma->fecha }}</td>
                                            <td class="text-center">{{ $norma->texto }}</td>
                                            <td class="text-center">{{ $norma->descripcion }}</td>
                                            <td>{{ $norma->temaEspecifico->tema_->area->area }}</td>
                                            <td style="min-width:100px;">
                                                {{ $norma->temaEspecifico->tema_->tema }}</td>
                                            <td style="min-width:150px;">
                                                {{ $norma->temaespecifico->tema }}</td>
                                            <td class="d-flex">
                                                <a href="{{ route('wiku_norma-editar', ['id' => $norma->id]) }}"
                                                    class="btn-accion-tabla tooltipsC text-info" title="Editar"><i
                                                        class="fa fa-edit" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
