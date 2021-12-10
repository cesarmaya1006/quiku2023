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
                        <h3 class="card-title">Listado tutelas</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-12 col-md-12 table-responsive">
                            <table class="table table-striped table-hover table-sm display tabla-listado">
                                <thead>
                                    <tr>
                                        <th>Num. Radicado</th>
                                        <th>Fecha de creación</th>
                                        <th>Fecha de radicación</th>
                                        <th>Jurisdicción</th>
                                        <th>Fecha de Notificación</th>
                                        <th>Estado creación</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tutelas as $tutela)
                                        <tr>
                                            <td>{{ $tutela->radicado }}</td>
                                            <td>{{ $tutela->created_at }}</td>
                                            <td>{{ $tutela->fecha_radicado }}</td>
                                            <td>{{ $tutela->jurisdiccion }}</td>
                                            <td>{{ $tutela->fecha_notificacion }}</td>
                                            @if($tutela->estado_creacion)
                                                <td>Radicada</td>
                                            @else
                                                <td>Sin radicar</td>
                                            @endif
                                            <td>
                                                @if($tutela->estado_creacion)
                                                    <a href="{{ route('vista_tutela', ['id' => $tutela->id]) }}"
                                                        class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                                            class="fa fa-edit text-info btn-editar" aria-hidden="true"></i></a>
                                                @else
                                                    <a href="{{ route('auto_admisorio_complemento', ['id' => $tutela->id]) }}"
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
