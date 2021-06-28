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
    Parametros - Asignación particular
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
                    <h5>listado de Asignación particular</h5>
                </div>
                <div class="col-12 col-md-6 col-lg-6 text-md-right text-lg-right pl-2 pr-md-5 pr-lg-5">
                    <a href="{{ route('admin-funcionario-asignacion_particular-crear') }}"
                        class="btn btn-success btn-sm text-center pl-3 pr-3" style="font-size: 0.9em;"><i
                            class="fas fa-plus-circle mr-2"></i> Nueva Asignación</a>
                </div>
            </div>
            <hr>
            <div class="row  d-flex justify-content-around">
                <div class="col-12 col-md-11 table-responsive">
                    <table class="table table-striped table-hover table-sm display">
                        <thead class="thead-inverse">
                            <tr>
                                <th class="text-center" style="white-space:nowrap;">Tipo</th>
                                <th class="text-center" style="white-space:nowrap;">Tipo PQR</th>
                                <th class="text-center" style="white-space:nowrap;">Producto / Servicio</th>
                                <th class="text-center" style="white-space:nowrap;">Adquisicion</th>
                                <th class="text-center" style="white-space:nowrap;">Motivo PQR</th>
                                <th class="text-center" style="white-space:nowrap;">Sub-motivo PQR</th>
                                <th class="text-center" style="white-space:nowrap;">Tipo Servicio</th>
                                <th class="text-center" style="white-space:nowrap;">Categoria</th>
                                <th class="text-center" style="white-space:nowrap;">Producto</th>
                                <th class="text-center" style="white-space:nowrap;">Marca</th>
                                <th class="text-center" style="white-space:nowrap;">Referencia</th>
                                <th class="text-center" style="white-space:nowrap;">Palabra clave 1</th>
                                <th class="text-center" style="white-space:nowrap;">Palabra clave 2</th>
                                <th class="text-center" style="white-space:nowrap;">Palabra clave 3</th>
                                <th class="text-center" style="white-space:nowrap;">Palabra clave 4</th>
                                <th class="text-center" style="white-space:nowrap;">Sede</th>
                                <th class="text-center" style="white-space:nowrap;">Cargo</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($asignaciones_p as $asignacion_p)
                                <tr>
                                    <td class="text-center" style="white-space:nowrap;">{{ $asignacion_p->tipo }}</td>
                                    <td class="text-center" style="white-space:nowrap;">
                                        {{ $asignacion_p->tipo_pqr->tipo }}</td>
                                    <td class="text-center" style="white-space:nowrap;">{{ $asignacion_p->prodserv }}</td>
                                    <td class="text-center" style="white-space:nowrap;">
                                        {{ $asignacion_p->adquisicion == null ? '---' : $asignacion_p->adquisicion }}</td>
                                    <td class="text-center" style="white-space:nowrap;">
                                        {{ $asignacion_p->motivo_id == null ? '---' : $asignacion_p->motivo_pqr->motivo }}
                                    </td>
                                    <td class="text-center" style="white-space:nowrap;">
                                        {{ $asignacion_p->motivo_sub_id == null ? '---' : $asignacion_p->submotivo_pqr->sub_motivo }}
                                    </td>
                                    <td class="text-center" style="white-space:nowrap;">
                                        {{ $asignacion_p->servicio_id == null ? '---' : $asignacion_p->servicio->servicio }}
                                    </td>
                                    <td class="text-center" style="white-space:nowrap;">
                                        {{ $asignacion_p->categoria_id == null ? '---' : $asignacion_p->categoria->categoria }}
                                    </td>
                                    <td class="text-center" style="white-space:nowrap;">
                                        {{ $asignacion_p->producto_id == null ? '---' : $asignacion_p->producto->producto }}
                                    </td>
                                    <td class="text-center" style="white-space:nowrap;">
                                        {{ $asignacion_p->marca_id == null ? '---' : $asignacion_p->marca->marca }}</td>
                                    <td class="text-center" style="white-space:nowrap;">
                                        {{ $asignacion_p->referencia_id == null ? '---' : $asignacion_p->referencia->referencia }}
                                    </td>
                                    <td class="text-center" style="white-space:nowrap;">
                                        {{ $asignacion_p->palabra1 == null ? '---' : $asignacion_p->palabra1 }}</td>
                                    <td class="text-center" style="white-space:nowrap;">
                                        {{ $asignacion_p->palabra2 == null ? '---' : $asignacion_p->palabra2 }}</td>
                                    <td class="text-center" style="white-space:nowrap;">
                                        {{ $asignacion_p->palabra3 == null ? '---' : $asignacion_p->palabra3 }}</td>
                                    <td class="text-center" style="white-space:nowrap;">
                                        {{ $asignacion_p->palabra4 == null ? '---' : $asignacion_p->palabra4 }}</td>
                                    <td class="text-center" style="white-space:nowrap;">
                                        {{ $asignacion_p->sede->nombre . ' - ' . $asignacion_p->sede->municipio->municipio . ' - ' . $asignacion_p->sede->municipio->departamento->departamento }}
                                    </td>
                                    <td class="text-center" style="white-space:nowrap;">{{ $asignacion_p->cargo->cargo }}
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
    <script src="{{ asset('js/intranet/empresa/asignacion/asignacion_part.js') }}"></script>
@endsection
<!-- ************************************************************* -->
