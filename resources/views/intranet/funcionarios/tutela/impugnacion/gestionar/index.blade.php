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
            <div class="col-12 col-md-11 d-flex align-items-stretch flex-column">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tutela con número de radicado:
                            <strong>{{ $tutela->radicado }}</strong> - <strong>Gestión de Impugnación</strong>
                        </h3>
                        <a href="{{ route('tutelas_impugnacion', ['id' => $tutela->id]) }}"
                            class="btn btn-danger btn-sm btn-sombra mx-2 px-4 float-end">Regresar</a>
                    </div>
                    @foreach ($tutela->primeraInstancia as $primeraInstancia)
                        <div class="card-body">
                            <div class="row mt-3 mb-3">
                                <div class="col-12">
                                    <h5>Lista de resulves en primera instancia desfavorables</h5>
                                </div>
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Numeracion</th>
                                                <th>Sentido</th>
                                                <th>Tiempo de cumplimiento</th>
                                                <th>Fecha de Cumplimiento</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($primeraInstancia->resuelvesPrimeraInstancia as $resuelve)
                                                @if ($resuelve->sentido == 'Desfavorable')
                                                    <tr>
                                                        <td scope="row">
                                                            {{ $resuelve->numeracion }}
                                                        </td>
                                                        <td>{{ $resuelve->sentido }}
                                                        </td>
                                                        <td>
                                                            @if ($resuelve->dias != null)
                                                                {{ $resuelve->dias . ' dias ' }}
                                                            @endif
                                                            @if ($resuelve->horas != null)
                                                                {{ $resuelve->horas . ' horas ' }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($resuelve->dias != null)
                                                                {{ date('Y-m-d', strtotime($resuelve->sentencia->fecha_notificacion . '+ ' . ($resuelve->dias + 1) . ' days')) }}
                                                            @endif
                                                            @if ($resuelve->horas != null)
                                                                {{ date('Y-m-d', strtotime($resuelve->sentencia->fecha_notificacion . '+ 1 days')) }}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="">Asignación Resuelve</h5>
                                </div>
                                <div class="col-12">
                                    <div class="row d-flex px-4">
                                        <div class="col-12 col-md-12 form-group mt-3">
                                            <div class="form-check mb-4">
                                                <input type="checkbox" class="form-check-input check-todos-resuelves">
                                                <label class="form-check-label"><strong>Seleccionar todos los
                                                        resuelve</strong></label>
                                            </div>
                                            @foreach ($primeraInstancia->resuelvesPrimeraInstancia as $resuelve)
                                                @if ($resuelve->sentido == 'Desfavorable')
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" class="form-check-input select-resuelve"
                                                            value="{{ $resuelve->id }}">
                                                        <label
                                                            class="form-check-label"><strong>#{{ $resuelve->numeracion }}</strong></label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-12 col-md-5 form-group">
                                            <label for="">Cargo</label>
                                            <select class="form-control form-control-sm rounded-0 cargo" required=""
                                                data_url="{{ route('cargar_cargos') }}"
                                                data_url2="{{ route('cargar_funcionarios') }}">
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-5 form-group">
                                            <label for="">Funcionario</label>
                                            <select class="form-control form-control-sm rounded-0 funcionario" required="">
                                                <option value="">--Seleccione--</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-4 form-group d-flex align-items-end">
                                            <button href="" class="btn btn-primary mx-2 px-4 asignacion_hecho_guardar"
                                                data_url="{{ route('asignacion_hecho_guardar') }}"
                                                data_token="{{ csrf_token() }}">Asignar Impugnacion</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/tutela/inpugnacion.js') }}"></script>
@endsection
<!-- ************************************************************* -->
