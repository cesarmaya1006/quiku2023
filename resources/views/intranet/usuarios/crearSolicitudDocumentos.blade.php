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
Sistema de informaci&oacute;n
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        {{-- Solicitud de documentos o información --}}
        <div class="col-12">
            <div class="card card-primary solicitudDocInfo">
                <div class="card-header">
                    <h3 class="card-title">Crear Solicitud de documentos o información</h3>
                </div>
                <form action="{{ route('usuario-generarSolicitudDocumentos-guardar') }}" method="POST"
                    autocomplete="off" enctype="multipart/form-data" id="fromSolicitudDocInfo">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="col-12 d-flex justify-content-end flex-row">
                            <button class="btn btn-success btn-xs btn-sombra pl-2 pr-2" id="crearSolicitud"><i
                                    class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Añadir
                                otro solicitud</button>
                        </div>
                        <div class="col-12  mt-2 pt-2" id="solicitudes">
                            <div class="col-12 solicitud rounded border mb-3">
                                <div class="form-group col-12 mt-2">
                                    <label for="">Petición</label>
                                    <select name="peticion" id="peticion" class="custom-select rounded-0">
                                        <option value="">--Seleccione--</option>
                                        <option value="Que se me entregue un documento">Que se me entregue un documento</option>
                                        <option value="Que me entregue información">Que me entregue información</option>
                                    </select>
                                </div>
                                <div class="form-group col-12">
                                    <label for="">Identifique el documento o información requerida</label>
                                    <input class="form-control" type="text" name="indentifiqueDocInfo" id="indentifiqueDocInfo">
                                </div>
                                <div class="form-group col-12">
                                    <label for="">Justificaciones de su solicitud</label>
                                    <input class="form-control" type="text" name="justificacion" id="justificacion">
                                </div>
                                <div class="form-group col-12 mt-4">
                                    <h6>Anexo o prueba</h6>
                                </div>
                                <div class="col-12" id="anexosSolicitud">
                                    <div class="col-12 d-flex row anexosolicitud">
                                        <div class="col-12 titulo-anexo d-flex justify-content-between">
                                            <h6>Anexo</h6>
                                            <button type="button"
                                                class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminaranexoSolicitud"><i
                                                    class="fas fa-minus-circle"></i></button>
                                        </div>
                                        <div class="col-12 col-md-4 form-group titulo-anexoSolicitud">
                                            <label for="titulo">Título anexo</label>
                                            <input type="text" class="form-control form-control-sm" name="titulo" id="titulo">
                                        </div>
                                        <div class="col-12 col-md-4 form-group descripcion-anexoSolicitud">
                                            <label for="descripcion">Descripción</label>
                                            <input type="text" class="form-control form-control-sm" name="descripcion"
                                                id="descripcion">
                                        </div>
                                        <div class="col-12 col-md-4 form-group doc-anexoSolicitud">
                                            <label for="documentos">Anexos o Pruebas</label>
                                            <input class="form-control form-control-sm" type="file" name="documentos"
                                                id="documentos">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end flex-row">
                                    <button class="btn btn-success btn-xs btn-sombra pl-2 pr-2" id="crearAnexo"><i
                                            class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Añadir
                                        otro Anexo</button>
                                </div>
                                <input id="cantidadAnexosSolicitud" name="cantidadAnexosSolicitud" type="hidden" value="0">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary px-4">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
<script src="{{ asset('js/intranet/solicitud_doc_info/solicitud.js') }}"></script>
@endsection
<!-- ************************************************************* -->