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
                            <strong>{{ $tutela->radicado }}</strong>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Registro Sentencia en primera instancia</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('tutelas_primera_instancia_guardar', ['id' => $tutela->id]) }}"
                                    class="form-horizontal row" method="POST" autocomplete="off"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <div class="col-">
                                        <div class="row">
                                            <div class="col-12 col-md-2 form-group">
                                                <label for="fecha_sentencia">Fecha sentencia</label>
                                                <input type="date" class="form-control form-control-sm"
                                                    name="fecha_sentencia" id="fecha_sentencia" aria-describedby="helpId"
                                                    value="{{ date('Y-m-d') }}" required>
                                            </div>
                                            <div class="col-12 col-md-2 form-group">
                                                <label for="fecha_notificacion">Fecha de notificación</label>
                                                <input type="date" class="form-control form-control-sm"
                                                    name="fecha_notificacion" id="fecha_notificacion"
                                                    aria-describedby="helpId" value="{{ date('Y-m-d') }}" required>
                                            </div>
                                            <div class="col-12 col-md-2 form-group">
                                                <label for="hora_notificacion">Hora de notificación</label>
                                                <input type="time" class="form-control form-control-sm"
                                                    name="hora_notificacion" id="hora_notificacion"
                                                    aria-describedby="helpId" value="{{ date('H:i:s') }}" required>
                                            </div>
                                            <div class="col-12 col-md-2 form-group">
                                                <label for="sentencia">Decisión</label>
                                                <select id="sentencia" class="form-control form-control-sm"
                                                    name="sentencia">
                                                    <option value="Favorable">Favorable</option>
                                                    <option value="Desfavorable">Desfavorable</option>
                                                    <option value="Parcialmente desfavorable">Parcialmente desfavorable
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-4 form-group">
                                                <label for="sentencia">Archivo Sentencia</label>
                                                <input class="form-control form-control-sm" type="file"
                                                    accept="application/pdf">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12">
                                            <h6>Cargar Resuelves</h6>
                                        </div>
                                        <div class="col-12 mt-4">

                                        </div>
                                    </div>

                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit"
                                            class="btn btn-primary btn-sm btn-sombra pl-4 pr-4">Guardar</button>
                                    </div>
                                    <!-- /.card-footer -->
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="{{ route('detalles_tutelas', ['id' => $tutela->id]) }}"
                            class="btn btn-danger mx-2 px-4">Regresar</a>
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
