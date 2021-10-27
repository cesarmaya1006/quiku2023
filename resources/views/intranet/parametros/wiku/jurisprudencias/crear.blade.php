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
    Parametros - Jurisprudencias
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>Nueva Jurisprudencia</h5>
                </div>
                <div class="col-12 col-md-6 col-lg-6 text-md-right text-lg-right pl-2 pr-md-5 pr-lg-5">
                    <a href="{{ route('wiku-index') }}" class="btn btn-success btn-xs btn-sm text-center pl-3 pr-3"
                        style="font-size: 0.9em;"><i class="fas fa-reply mr-2"></i> Volver</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('wiku_jurisprudencia-guardar') }}" class="form-horizontal row" method="POST"
                        autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="card-body">
                            @include('intranet.parametros.wiku.jurisprudencias.form')
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
    <div class="modal fade" id="modalEnteEmisor" tabindex="-1" aria-labelledby="modalEnteEmisorLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEnteEmisorLabel">Nuevo Ente Emisor</h5>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-11 form-group">
                            <label class="requerido" for="ente">Ente Emisor</label>
                            <input type="text" class="form-control form-control-sm" name="ente" id="ente"
                                aria-describedby="helpId" value="{{ old('ente') }}" placeholder="" required>
                            <small id="helpId" class="form-text text-muted">Nombre del ente emisor</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data_url="{{ route('wiku_jurisprudencia-cargarente') }}"
                        id="crearEnteEmisor" data-bs-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- . . . . . . .  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .-->
    <!-- Modal -->
    <div class="modal fade" id="modalSala" tabindex="-1" aria-labelledby="modalSalaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalSalaLabel">Nueva Sala</h5>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-11" id="cajaEnte">
                            <label id="labelEnte" class="requerido" for="enteSala_id">Ente Emisor</label>
                            <select class="form-control form-control-sm enteClass" id="enteSala_id" name="enteSala_id"
                                data_url="{{ route('wiku-cargarsalas') }}">
                                <option value="">---Seleccione---</option>
                                @foreach ($entes as $ente)
                                    <option value="{{ $ente->id }}">
                                        {{ $ente->ente }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-11 form-group">
                            <label class="requerido" for="sala">Sala</label>
                            <input type="text" class="form-control form-control-sm" name="sala" id="sala"
                                aria-describedby="helpId" value="{{ old('sala') }}" placeholder="" required>
                            <small id="helpId" class="form-text text-muted">Nombre de la sala</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data_url="{{ route('wiku_jurisprudencia-cargarente') }}"
                        id="crearSala" data-bs-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- . . . . . . .  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .-->
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/intranet/parametros/jurisprudencias.js') }}"></script>
    <script src="{{ asset('js/intranet/parametros/fuentes.js') }}"></script>
@endsection
<!-- ************************************************************* -->
