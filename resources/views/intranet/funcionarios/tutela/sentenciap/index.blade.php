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
                                                <label class="requerido" for="fecha_sentencia">Fecha sentencia</label>
                                                <input type="date" class="form-control form-control-sm"
                                                    name="fecha_sentencia" id="fecha_sentencia" aria-describedby="helpId"
                                                    value="{{ date('Y-m-d') }}" required>
                                            </div>
                                            <div class="col-12 col-md-2 form-group">
                                                <label class="requerido" for="fecha_notificacion">Fecha de notificación</label>
                                                <input type="date" class="form-control form-control-sm"
                                                    name="fecha_notificacion" id="fecha_notificacion"
                                                    aria-describedby="helpId" value="{{ date('Y-m-d') }}" required>
                                            </div>
                                            <div class="col-12 col-md-2 form-group">
                                                <label class="requerido" for="hora_notificacion">Hora de notificación</label>
                                                <input type="time" class="form-control form-control-sm"
                                                    name="hora_notificacion" id="hora_notificacion"
                                                    aria-describedby="helpId" value="{{ date('H:i:s') }}" required>
                                            </div>
                                            <div class="col-12 col-md-2 form-group">
                                                <label class="requerido" for="sentencia">Decisión</label>
                                                <select id="sentencia" class="form-control form-control-sm"
                                                    name="sentencia">
                                                    <option value="Favorable">Favorable</option>
                                                    <option value="Desfavorable">Desfavorable</option>
                                                    <option value="Parcialmente desfavorable">Parcialmente desfavorable
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-4 form-group">
                                                <label class="requerido" for="sentencia">Archivo Sentencia</label>
                                                <input class="form-control form-control-sm" type="file"
                                                    accept="application/pdf" id="url_sentencia" name="url_sentencia"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <h6>Archivos Adjuntos</h6>
                                        </div>
                                        <div class="col-12 mb-5">
                                            <a class="btn btn-info btn-xs btn-sombra pl-4 pr-3"
                                                id="anadirArchivoAdjunto">Añadir
                                                Archivo adjunto
                                                <i class="fa fa-plus-circle"></i></a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <div class="row cajaAdjunto" id="cajaAdjunto">
                                                <div class="col-12  archivoAdjuntoC" id="archivoAdjuntoC0">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6 pl-3 pr-3 form-group">
                                                            <label for="fecha_notificacion">Archivo Adjunto</label>
                                                            <div
                                                                class="input-group d-flex justify-content-center align-items-center">
                                                                <input class="form-control form-control-sm url_anexo"
                                                                    type="file" accept="application/pdf" id="url_anexo0"
                                                                    name="url_anexo0">
                                                                <a class="btn-accion-tabla tooltipsC text-danger float-end eliminarResuelve ml-3"
                                                                    idAnexo="0" title="Quitar" onclick="eliminarDiv(0)"><i
                                                                        class="fa fa-trash" aria-hidden="true"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6 pl-3 pr-3 form-group">
                                                            <label for="fecha_notificacion">Titulo Anexo</label>
                                                            <input type="text"
                                                                class="form-control form-control-sm titulo_anexo"
                                                                name="titulo_anexo0" id="titulo_anexo0">
                                                        </div>
                                                        <div class="col-12 form-group">
                                                            <label for="descripcion_anexo0">Descripcion Anexo</label>
                                                            <textarea class="form-control form-control-sm descripcion_anexo"
                                                                name="descripcion_anexo0" id="descripcion_anexo0" cols="30"
                                                                rows="5" style="resize: none;"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-4">
                                        <div class="col-12 col-md-6">
                                            <h6>Cargar Resuelves</h6>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="formaCarga"
                                                            value="cantidad" id="cantidad">
                                                        <label class="form-check-label" for="cantidad">
                                                            Cargar por cantidad
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="formaCarga"
                                                            id="detalle" value="detalle" checked>
                                                        <label class="form-check-label" for="detalle">
                                                            Cargar en detalle
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="cajaCantiodad">
                                        <div class="col-12 col-md-2 form-group">
                                            <label for="fecha_notificacion">Cantidad de resuelves</label>
                                            <input type="number" class="form-control form-control-sm" name="cantResuelves"
                                                id="cantResuelves" value="1" min="1">
                                        </div>
                                    </div>
                                    <div class="row" id="cajaDetalle">
                                        <div class="col-12 mb-4">
                                            <a class="btn btn-info btn-xs btn-sombra" id="anadirResuelve">Añadir Resuelve <i
                                                    class="fa fa-plus-circle"></i></a>
                                        </div>
                                        <input type="hidden" class="form-control form-control-sm"
                                            name="sentenciapinstancia_id" id="sentenciapinstancia_id"
                                            value="{{ $tutela->id }}">
                                        <div class="col-12" id="cajaDetalleP">
                                            <div class="row detallesTarjeta pt-3 pb-3 mb-4" id="detalles0">
                                                <input type="hidden" class="form-control form-control-sm numeracion"
                                                    name="numeracion" id="numeracion" value="0">
                                                <div class="col-12 form-group" id="resuelve0">
                                                    <label for="resuelve" class="resuelveLabel" id="resuelveLabel">Resuelve
                                                        N° 0</label>
                                                    <textarea class="form-control form-control-sm resuelve" name="resuelve"
                                                        id="resuelve" cols="30" rows="10" style="resize: none;"></textarea>
                                                </div>
                                                <div class="col-12 col-md-2 form-group">
                                                    <label for="dias" id="diasLabel">Dias Cumplimiento</label>
                                                    <input type="number" class="form-control form-control-sm dias"
                                                        name="dias" id="dias" value="0" min="0">
                                                </div>
                                                <div class="col-12 col-md-2 form-group">
                                                    <label for="horas" id="horasLabel">Horas Cumplimiento</label>
                                                    <input type="number" class="form-control form-control-sm horas"
                                                        name="horas" id="horas" value="0" min="0" max="23">
                                                </div>
                                                <div class="col-12 col-md-8 form-group">
                                                    <a class="btn-accion-tabla tooltipsC text-danger float-end eliminarResuelve"
                                                        idResuelve="0" title="Quitar" onclick="eliminarDiv(0)"><i
                                                            class="fa fa-trash" aria-hidden="true"></i>
                                                        Eliminar Resuelve</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="catnResuelves" id="catnResuelves" value="0">
                                    <input type="hidden" name="cantAdjuntos" id="cantAdjuntos" value="0">
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit"
                                            class="btn btn-primary btn-sm btn-sombra pl-4 pr-4">Guardar</button>
                                        <a href="{{ route('detalles_tutelas', ['id' => $tutela->id]) }}"
                                            class="btn btn-danger btn-sm btn-sombra mx-2 px-4 float-end">Regresar</a>
                                    </div>
                                    <!-- /.card-footer -->
                                </form>
                            </div>
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
    <script src="{{ asset('js/intranet/tutela/sentenciap.js') }}"></script>
@endsection
<!-- ************************************************************* -->
