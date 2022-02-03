@extends("theme.back.plantilla")
<!-- ************************************************************* -->
<!-- Funciones php -->
@section('funciones_php')
    @include('includes.funciones_php')
@endsection
<!-- Pagina CSS -->
@section('estilosHojas')
    <link rel="stylesheet" href="{{ asset('css/intranet/parametros/argumentos.css') }}">
@endsection
<!-- ************************************************************* -->
@section('tituloHoja')
    Parametros - Fuentes Argumentos
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>Nuevo Argumento</h5>
                </div>
                <div class="col-12 col-md-6 col-lg-6 text-md-right text-lg-right pl-2 pr-md-5 pr-lg-5">
                    <a href="{{ route('wiku-index') }}" class="btn btn-success btn-xs btn-sm text-center pl-3 pr-3"
                        style="font-size: 0.9em;"><i class="fas fa-reply mr-2"></i> Volver</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('wiku_argumento-guardar') }}" class="form-horizontal row" method="POST"
                        autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="card-body">
                            @include('intranet.parametros.wiku.argumentos.form')
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-xs btn-sombra pl-4 pr-4">Guardar</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modales -->
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="modalAutorInst" tabindex="-1" aria-labelledby="modalAutorInstLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAutorInstLabel">NUevo Autor Institucional</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-11 form-group">
                            <label class="requerido" for="institucion">Institución</label>
                            <input type="text" class="form-control form-control-sm" name="institucion" id="institucion"
                                aria-describedby="helpId" value="{{ old('institucion') }}" placeholder="" required>
                            <small id="helpId" class="form-text text-muted">Nombre de la institución</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data_url="{{ route('wiku_argumento-cargarautori') }}"
                        id="crearAutorInst" data-bs-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAutor" tabindex="-1" aria-labelledby="modalAutorLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAutorLabel">Nuevo Autor Institucional</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-11 form-group">
                            <label class="requerido" for="nombre1">Primer Nombre</label>
                            <input type="text" class="form-control form-control-sm" name="nombre1" id="nombre1"
                                aria-describedby="helpId" value="{{ old('nombre1') }}" placeholder="" required>
                        </div>
                        <div class="col-11 form-group">
                            <label for="nombre2">Segundo Nombre</label>
                            <input type="text" class="form-control form-control-sm" name="nombre2" id="nombre2"
                                aria-describedby="helpId" value="{{ old('nombre2') }}" placeholder="" required>
                        </div>
                        <div class="col-11 form-group">
                            <label class="requerido" for="apellido1">Primer Apellido</label>
                            <input type="text" class="form-control form-control-sm" name="apellido1" id="apellido1"
                                aria-describedby="helpId" value="{{ old('apellido1') }}" placeholder="" required>
                        </div>
                        <div class="col-11 form-group">
                            <label for="apellido2">Segundo Apellido</label>
                            <input type="text" class="form-control form-control-sm" name="apellido2" id="apellido2"
                                aria-describedby="helpId" value="{{ old('apellido2') }}" placeholder="" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data_url="{{ route('wiku_argumento-cargarautor') }}"
                        id="crearAutor" data-bs-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/intranet/parametros/argumentos.js') }}"></script>
    <script src="{{ asset('js/intranet/parametros/fuentes.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endsection
<!-- ************************************************************* -->
