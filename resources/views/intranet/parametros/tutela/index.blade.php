@extends('theme.back.plantilla')
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
    Parametros - Asociación Tutelas Wiku
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
                @if ($normas->count() > 0)
                    <div class="col-12">
                        <div class="card card-info collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title">Asociación Normas</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-plus"></i>
                                    </button>
                                </div>

                            </div>

                            <div class="card-body" style="display: none;">
                                The body of the card
                            </div>
                        </div>
                    </div>
                @endif
                @if ($argumentos->count() > 0)
                    <div class="col-12">
                        <div class="card card-success collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title">Asociación Argumentos</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-plus"></i>
                                    </button>
                                </div>

                            </div>

                            <div class="card-body" style="display: none;">
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped table-hover table-sm display"
                                            style="min-width: 100%;">
                                            <thead class="thead-inverse">
                                                <tr>
                                                    <th class="text-center">Id</th>
                                                    <th class="text-center">Fecha de Creación</th>
                                                    <th class="text-center">Tipo</th>
                                                    <th class="text-center">Autor(es)</th>
                                                    <th class="text-center">Descripción del articulo</th>
                                                    <th class="text-center">Asociaciones</th>
                                                    <th class="text-center">Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($argumentos as $argumento)
                                                    <tr>
                                                        <td class="text-center">{{ $argumento->id }}</td>
                                                        <td class="text-center">{{ $argumento->fecha }}</td>
                                                        <td class="text-center">
                                                            {{ $argumento->publico ? 'Privado' : 'Publico' }}
                                                        </td>
                                                        <td class="text-center">
                                                            @if ($argumento->autorInst != null)
                                                                {{ $argumento->autorInst->institucion . ';' }}
                                                            @endif
                                                            @if ($argumento->autor != null)
                                                                {{ $argumento->autor->nombre1 . ' ' . $argumento->autor->nombre2 . ' ' . $argumento->autor->apellido1 . ' ' . $argumento->autor->apellido2 }}
                                                            @endif
                                                        </td>
                                                        <td class="text-justify" style="min-width:100px;">
                                                            {{ $argumento->descripcion }}
                                                        </td>
                                                        <td style="font-size: 0.8em;">
                                                            @foreach ($motivos as $motivo)
                                                                @if ($argumento->asociacion_submotivotutelas->where('motivotutelas_id', $motivo->id)->count() > 0)
                                                                    @foreach ($argumento->asociacion_submotivotutelas->where('motivotutelas_id', $motivo->id) as $submotivo)
                                                                        @php
                                                                            $motivotutelas_id = $submotivo->motivotutelas_id;
                                                                        @endphp
                                                                    @endforeach
                                                                    <table class="table table-hover tabla-data">
                                                                        <thead class="thead-inverse">
                                                                            <tr>
                                                                                <th scope="col" colspan="2"
                                                                                    class="text-center">
                                                                                    {{ $motivo->motivo }}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($argumento->asociacion_submotivotutelas->where('motivotutelas_id', $motivo->id) as $submotivo)
                                                                                <tr>
                                                                                    <td class="text-nowrap text-center">
                                                                                        {{ $submotivo->sub_motivo }}</td>
                                                                                    <td class="text-center">
                                                                                        <form action="{{ route('admin-funcionario-asociacion_wiku_tutelas-eliminar', ['wiku_argumento_id' => $argumento->id,'submotivotutela_id' => $submotivo->id]) }}"
                                                                                            class="d-inline form-eliminar"
                                                                                            method="POST">
                                                                                            @csrf @method('delete')
                                                                                            <button type="submit"
                                                                                                class="btn-accion-tabla eliminar tooltipsC"
                                                                                                title="Eliminar este registro">
                                                                                                <i
                                                                                                    class="fa fa-fw fa-trash text-danger"></i>
                                                                                            </button>
                                                                                        </form>
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="{{ route('admin-funcionario-asociacion_wiku_tutelas-asociar_agumento', ['wiku_argumento_id' => $argumento->id]) }}" class="btn-accion-tabla tooltipsC text-info"
                                                                title="Editar"><i class="fa fa-edit"
                                                                    aria-hidden="true"></i></a>
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
                @endif
                <div class="col-12">
                    <div class="card card-warning collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title">Asociación Jurisprudencias</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-plus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: none;">
                            The body of the card
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card card-primary collapsed-card">
                        <div class="card-header">
                            <h3 class="card-title">Asociación Doctrinas</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-plus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: none;">
                            The body of the card
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
    <script src="{{ asset('js/intranet/parametros/asociacionwikututelas.js') }}"></script>
@endsection
<!-- ************************************************************* -->
