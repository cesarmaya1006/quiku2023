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
    Parametros - Áreas de Influencia
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
                    <h5>listado de áreas de influencia por sedes</h5>
                </div>
                <div class="col-12 col-md-6 col-lg-6 text-md-right text-lg-right pl-2 pr-md-5 pr-lg-5">
                    <a href="{{ route('admin-funcionario-areas-crear') }}"
                        class="btn btn-success btn-sm text-center pl-3 pr-3" style="font-size: 0.9em;"><i
                            class="fas fa-plus-circle mr-2"></i> Nueva Área</a>
                </div>
            </div>
            <hr>
            <div class="row  d-flex justify-content-around">
                <div class="col-12 col-md-11 table-responsive">
                    <table class="table table-striped table-hover table-sm display">
                        <thead class="thead-inverse">
                            <tr>
                                <th class="text-center">Departamento</th>
                                <th>Municipio</th>
                                <th>Sede</th>
                                @foreach ($departamentos as $departamento)
                                    <th class="text-nowrap">
                                        {{ $departamento->departamento }}
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @csrf
                            @foreach ($sedes as $sede)
                                <tr>
                                    <td class="text-nowrap">{{ $sede->municipio->departamento->departamento }}</td>
                                    <td class="text-nowrap">{{ $sede->municipio->municipio }}</td>
                                    <td class="text-nowrap">{{ $sede->nombre }}</td>
                                    @foreach ($departamentos as $departamento)
                                        <td class="text-center">
                                            <div class="form-check text-center">
                                                <input class="form-check-input influencia_check" type="checkbox" value=""
                                                    data-sede="{{ $sede->id }}"
                                                    data-departamento="{{ $departamento->id }}"
                                                    data_url="{{ route('admin-funcionario-areas_influencia-guardar') }}"
                                                    data_sedes=" {{ $sedes->max('id') }}"
                                                    id="sede_depto{{ '-' . $sede->id . '-' . $departamento->id }}"
                                                    {{ $sede->departamentos->where('id', $departamento->id)->count() > 0 ? 'checked disabled' : '' }}>
                                            </div>
                                        </td>
                                    @endforeach
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
    <script src="{{ asset('js/intranet/empresa/influencia.js') }}"></script>
@endsection
<!-- ************************************************************* -->
