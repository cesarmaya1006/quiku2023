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
    Parametros - Temas Especificos
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
                    <h5>Listado de Temas Especificos</h5>
                </div>
                <div class="col-12 col-md-8 text-md-right pr-md-5">
                    <a href="{{ route('wiku_temaespecifico-crear', ['id' => $id, 'wiku' => $wiku]) }}"
                        class="btn btn-success btn-xs text-center pl-1 pr-1 mr-1"
                        style="font-size: 0.9em;{{ $temas->count() == 0 ? 'opacity: 0.4; cursor: default;pointer-events: none;' : '' }}"><i
                            class="fas fa-plus-circle mr-2"></i> Nuevo tema específico</a>
                    <a href="{{ route('wiku_tema-index', ['id' => $id, 'wiku' => $wiku]) }}"
                        class="btn btn-info btn-xs text-center pl-1 pr-1 mr-1" style="font-size: 0.9em;"><i
                            class="fas fa-plus-circle mr-2"></i> Nuevo tema</a>
                    <a href="{{ route('wiku_volver_temaespecifico', ['id' => $id, 'wiku' => $wiku]) }}"
                        class="btn btn-primary btn-xs btn-sm text-center pl-1 pr-1" style="font-size: 0.9em;"><i
                            class="fas fa-reply mr-2"></i> Volver</a>
                </div>
            </div>
            <hr>
            <div class="row  d-flex justify-content-around" style="font-size: 0.8em;">
                <div class="col-12">
                    <table class="table table-striped table-hover table-sm display">
                        <thead class="thead-inverse">
                            <tr>
                                <th class="text-center">Área</th>
                                <th class="text-center">Tema</th>
                                <th class="text-center">Tema Específico</th>
                                <th class="text-center">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($temasEspecificos as $temaEspecifico)
                                <tr>
                                    <td class="text-center">{{ $temaEspecifico->tema_->area->area }}</td>
                                    <td class="text-center">{{ $temaEspecifico->tema_->tema }}</td>
                                    <td class="text-center">{{ $temaEspecifico->tema }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('wiku_temaespecifico-editar', ['id_especifico' => $temaEspecifico->id, 'id' => $id, 'wiku' => $wiku]) }}"
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
