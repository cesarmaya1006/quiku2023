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
    <!-- Modal salas-->
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
                    <button type="button" class="btn btn-primary" data_url="{{ route('wiku_jurisprudencia-cargarsala') }}"
                        id="crearSala" data-bs-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- . . . . . . .  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .-->
    <!-- Modal -->
    <div class="modal fade" id="modalSubSala" tabindex="-1" aria-labelledby="modalSubSalaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalSubSalaLabel">Nueva Sub Sala</h5>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-11 form-group">
                            <label class="requerido" for="subsala">Sub sala</label>
                            <input type="text" class="form-control form-control-sm" name="subsala" id="subsala"
                                aria-describedby="helpId" value="{{ old('subsala') }}" placeholder="" required>
                            <small id="helpId" class="form-text text-muted">Nombre de la sub-sala</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary"
                        data_url="{{ route('wiku_jurisprudencia-cargarsubsala') }}" id="crearSubSala"
                        data-bs-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- . . . . . . .  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .-->
    <!-- Modal -->
    <div class="modal fade" id="modalMagistrado" tabindex="-1" aria-labelledby="modalMagistradoLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalMagistradoLabel">Nuevo Magistrado</h5>
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
                                aria-describedby="helpId" value="{{ old('nombre2') }}" placeholder="">
                        </div>
                        <div class="col-11 form-group">
                            <label class="requerido" for="apellido1">Primer Apellido</label>
                            <input type="text" class="form-control form-control-sm" name="apellido1" id="apellido1"
                                aria-describedby="helpId" value="{{ old('apellido1') }}" placeholder="" required>
                        </div>
                        <div class="col-11 form-group">
                            <label for="apellido2">Segundo Apellido</label>
                            <input type="text" class="form-control form-control-sm" name="apellido2" id="apellido2"
                                aria-describedby="helpId" value="{{ old('apellido2') }}" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary"
                        data_url="{{ route('wiku_jurisprudencia-crearmagistrado') }}" id="crearMagistrado"
                        data-bs-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- . . . . . . .  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .-->
    <!-- Modal -->
    <div class="modal fade" id="modalDemandante" tabindex="-1" aria-labelledby="modalDemandanteLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDemandanteLabel">Nuevo Demandante</h5>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-11 form-group">
                            <label class="requerido" for="demandante">Demandante</label>
                            <input type="text" class="form-control form-control-sm" name="demandante" id="demandante"
                                aria-describedby="helpId" value="{{ old('demandante') }}" placeholder="" required>
                            <small id="helpId" class="form-text text-muted">Nombre del demandante</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary"
                        data_url="{{ route('wiku_jurisprudencia-creardemandante') }}" id="crearDemandante"
                        data-bs-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- . . . . . . .  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . .-->
    <!-- Modal -->
    <div class="modal fade" id="modalDemandado" tabindex="-1" aria-labelledby="modalDemandadoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDemandadoLabel">Nuevo Demandado</h5>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-11 form-group">
                            <label class="requerido" for="demandado">Demandado</label>
                            <input type="text" class="form-control form-control-sm" name="demandado" id="demandado"
                                aria-describedby="helpId" value="{{ old('demandado') }}" placeholder="" required>
                            <small id="helpId" class="form-text text-muted">Nombre del demandado</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary"
                        data_url="{{ route('wiku_jurisprudencia-creardemandado') }}" id="crearDemandado"
                        data-bs-dismiss="modal">Guardar</button>
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
