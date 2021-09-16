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
            <div class="col-12 col-md-10">
                <div class="row d-flex justify-content-center mt-3">
                    <div class="col-11 col-md-6">
                        @include('includes.error-form')
                        @include('includes.mensaje')
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-11 d-flex align-items-stretch flex-column">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Listado PQR</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-12 col-md-12 table-responsive">
                            <table class="table table-striped table-hover table-sm display tabla-listado">
                                <thead>
                                    <tr>
                                        <th>Num. Radicado</th>
                                        <th>Fecha de creación</th>
                                        <th>Fecha de radicación</th>
                                        <th>Tipo de PQR</th>
                                        <th>Estado PQR</th>
                                        <th>Fecha estimada de respuesta</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pqrs as $pqr)
                                        <tr>
                                            <td>{{ $pqr->radicado }}</td>
                                            <td>{{ $pqr->created_at }}</td>
                                            <td>{{ $pqr->fecha_generacion }}</td>
                                            <td>{{ $pqr->tipoPqr->tipo }}</td>
                                            @if($pqr->estado)
                                                <td>{{ $pqr->estado->estado_usuario }}</td>
                                            @else
                                                <td>Borrador</td>
                                            @endif
                                            @if($pqr->estadospqr_id < 6)
                                                <td>{{ date('Y-m-d', strtotime($pqr->fecha_generacion . '+ ' . $pqr->tiempo_limite . ' days')) }}</td>
                                            @else
                                                <td></td>
                                            @endif
                                            <td>
                                                @if($pqr->fecha_generacion)
                                                    <a href="{{ route('pqrRadicadaPdf', $pqr->id) }}"
                                                        class="btn-accion-tabla eliminar tooltipsC" title="Descargar"><i
                                                            class="fas fa-download text-primary btn-editar" aria-hidden="true"></i></a></td>
                                                @endif
                                            <td>
                                                @if ($pqr->peticiones->count() > 0)
                                                    <a href="{{ route('usuario-gestionarPQR', ['id' => $pqr->id]) }}"
                                                        class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                                            class="fa fa-edit text-info btn-editar" aria-hidden="true"></i></a>
                                                @else
                                                    <a href="{{ route('usuario-generarPQR_motivos', ['id' => $pqr->id]) }}"
                                                        class="btn-accion-tabla eliminar tooltipsC" title="Terminar de Registrar"><i
                                                            class="fas fa-wrench text-danger btn-editar" aria-hidden="true"></i></a>
                                                @endif

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
