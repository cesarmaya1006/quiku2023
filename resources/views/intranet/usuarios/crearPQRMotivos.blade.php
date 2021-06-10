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
            {{-- PQR --}}
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><strong>{{ $pqr->tipoPqr->tipo }}</strong></h3>
                    </div>
                    <form action="{{ route('usuario-generarPQR_motivos-guardar') }}" method="POST" autocomplete="off"
                        enctype="multipart/form-data" id="fromPQRMotivos">
                        @csrf
                        @method('post')
                        <div class="card-body">
                            <div class="col-12  mt-2 pt-2" id="motivos">
                                <div class="motivo rounded border mb-3 row">
                                    <div class="col-12 my-2 d-flex justify-content-between">
                                        <h5 class="titulo-principal-card">Motivo #</h5>
                                        <button type="button"
                                            class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminarMotivo"><i
                                                class="fas fa-minus-circle"></i></button>
                                    </div>
                                    <div class="form-group col-12 col-md-6 titulo-motivo">
                                        <div class="col-12 d-flex justify-content-between">
                                            <label for="">Categoría Motivo</label>
                                        </div>
                                        <select name="motivo_pqr" id="motivo_pqr"
                                            data_url="{{ route('cargar_submotivos') }}"
                                            class="custom-select rounded-0 motivo_pqr" required>
                                            <option value="">--Seleccione--</option>
                                            @foreach ($pqr->tipoPqr->motivos as $motivo)
                                                <option value="{{ $motivo->id }}">{{ $motivo->motivo }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-12 col-md-6 indentifiquedocinfo-motivo">
                                        <label for="motivo_sub_id">Sub - Categoría Motivo</label>
                                        <select name="motivo_sub_id" id="motivo_sub_id"
                                            class="custom-select rounded-0 motivo_sub_id" required>
                                            <option value="">--Seleccione--</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-12 otro d-none">
                                        <input class="form-control mt-2" type="text" name="otro" id="otro"
                                            placeholder="Otra">
                                    </div>
                                    <div class="col-12" id="hechos">
                                        <div class="form-group hechoMotivo">
                                            <div class="title-hecho d-flex justify-content-between mt-2">
                                                <label for="hecho">Hecho</label>
                                                <button type="button"
                                                    class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminarHecho"><i
                                                        class="fas fa-minus-circle"></i></button>
                                            </div>
                                            <input class="form-control mt-2 hecho" type="text" name="hecho" id="hecho"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end flex-row">
                                        <button class="btn btn-secondary btn-xs btn-sombra pl-2 pr-2 crearHecho"
                                            id="crearHecho"><i class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Añadir
                                            otro hecho</button>
                                    </div>
                                    <div class="form-group col-12 justificacion-motivo">
                                        <label for="">Justificación</label>
                                        <input class="form-control" type="text" name="justificacion" id="justificacion"
                                            required>
                                    </div>
                                    <div class="form-group col-12 mt-4">
                                        <h6>Anexo o prueba</h6>
                                    </div>
                                    <div class="col-12" id="anexosmotivo">
                                        <div class="col-12 d-flex row anexomotivo">
                                            <div class="col-12 titulo-anexo d-flex justify-content-between">
                                                <h6>Anexo</h6>
                                                <button type="button"
                                                    class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminaranexomotivo"><i
                                                        class="fas fa-minus-circle"></i></button>
                                            </div>
                                            <div class="col-12 col-md-4 form-group titulo-anexomotivo">
                                                <label for="titulo">Título anexo</label>
                                                <input type="text" class="form-control form-control-sm" name="titulo"
                                                    id="titulo">
                                            </div>
                                            <div class="col-12 col-md-4 form-group descripcion-anexomotivo">
                                                <label for="descripcion">Descripción</label>
                                                <input type="text" class="form-control form-control-sm" name="descripcion"
                                                    id="descripcion">
                                            </div>
                                            <div class="col-12 col-md-4 form-group doc-anexomotivo">
                                                <label for="documentos">Anexos o Pruebas</label>
                                                <input class="form-control form-control-sm" type="file" name="documentos"
                                                    id="documentos" accept="application/pdf">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end flex-row mb-3">
                                        <button class="btn btn-success btn-xs btn-sombra pl-2 pr-2 crearAnexo"
                                            id="crearAnexo"><i class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Añadir
                                            otro Anexo</button>
                                    </div>
                                    <input class="cantidadHechosMotivo" id="cantidadHechosMotivo"
                                        name="cantidadHechosMotivo" type="hidden" value="0">
                                    <input class="cantidadAnexosMotivo" id="cantidadAnexosMotivo"
                                        name="cantidadAnexosMotivo" type="hidden" value="0">
                                </div>
                            </div>
                            <input class="cantidadmotivos" id="cantidadmotivos" name="cantidadmotivos" type="hidden"
                                value="0">
                            <div class="col-12 d-flex justify-content-end flex-row">
                                <button class="btn btn-info btn-xs btn-sombra pl-2 pr-2" id="crearMotivo"><i
                                        class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Añadir
                                    otro motivo</button>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-4">Crear</button>
                        </div>
                        <input class="totalCantidadAnexosmotivos" id="totalCantidadAnexosmotivos"
                            name="totalCantidadAnexosmotivos" type="hidden" value="0">
                        <input class="pqr_id" id="pqr_id" name="pqr_id" type="hidden" value="{{ $pqr->id }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/pqr/assets_pqr.js') }}"></script>
    <script src="{{ asset('js/intranet/pqr/pqr_motivos.js') }}"></script>
@endsection
<!-- ************************************************************* -->
