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
    Parametros - Temas
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
                <div class="col-12 col-md-4 text-md-left pl-2">
                    <h5>Listado de Temas</h5>
                </div>
                <div class="col-12 col-md-8 text-md-right pr-md-5">

                    <a href="{{ route('wiku_tema-crear', ['id' => $id, 'wiku' => $wiku]) }}"
                        class="btn btn-success btn-xs text-center pl-1 pr-1 mr-1"
                        style="font-size: 0.9em;{{ $areas->count() == 0 ? 'opacity: 0.4; cursor: default;pointer-events: none;' : '' }}"><i
                            class="fas fa-plus-circle mr-2"></i> Nuevo tema</a>

                    <a href="{{ route('wiku_area-index', ['id' => $id, 'wiku' => $wiku]) }}"
                        class="btn btn-info btn-xs text-center pl-1 pr-1 mr-1" style="font-size: 0.9em;"><i
                            class="fas fa-plus-circle mr-2"></i> Nueva área</a>

                    <a href="{{ route('wiku_volver_tema', ['id' => $id, 'wiku' => $wiku]) }}"
                        class="btn btn-primary btn-xs btn-sm text-center pl-1 pr-1" style="font-size: 0.9em;"><i
                            class="fas fa-reply mr-2"></i> Volver</a>
                </div>
            </div>
            <hr>
            <div class="row  d-flex justify-content-around" style="font-size: 0.8em;">
                <div class="col-12 col-md-6">
                    <table class="table table-striped table-hover table-sm display">
                        <thead class="thead-inverse">
                            <tr>
                                <th class="text-center">Área</th>
                                <th class="text-center">Tema</th>
                                <th class="text-center">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($temas as $tema)
                                <tr>
                                    <td class="text-center">{{ $tema->area->area }}</td>
                                    <td class="text-center">{{ $tema->tema }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('wiku_tema-editar', ['id_tema' => $tema->id, 'id' => $id, 'wiku' => $wiku]) }}"
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
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')

@endsection
<!-- ************************************************************* -->
