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
        {{-- Sugerencia --}}
        <div class="col-12">
            <div class="card card-primary sugerencia">
                <div class="card-header">
                    <h3 class="card-title">Crear Sugerencia</h3>
                </div>
                <form action="{{ route('usuario-generarSugerencia-guardar') }}" method="POST" autocomplete="off"
                enctype="multipart/form-data" id="fromSugerencia">
                @csrf
                @method('post')
                    <div class="row d-flex card-body pl-md-5 pr-md-5">
                        <div class="col-12" id="hechos">
                            <div class="form-group sugerenciaHecho">
                                <div class="title-sugerencias d-flex justify-content-between mt-2">
                                    <label for="hecho">Hecho</label>
                                    <button type="button" class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminarHecho"><i class="fas fa-minus-circle"></i></button>
                                </div>
                                <input class="form-control mt-2" type="text" name="hecho">
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end flex-row">
                            <button class="btn btn-success btn-xs btn-sombra pl-2 pr-2" id="crearHecho"><i
                                class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Añadir
                                otro hecho</button>
                        </div>
                        <div class="col-12 mb-4">
                            <label for="">Escriba su sugerencia:</label>
                            <input class="form-control" type="text" name="sugerencia" id="sugerencia">
                        </div>

                        <div class="col-12">
                            <h6>Anexo o prueba</h6>
                        </div>
                        <div class="col-12" id="anexosHechos">
                            <div class="col-12 d-flex row anexoHecho">
                                <div class="col-12 titulo-anexo d-flex justify-content-between">
                                    <h6>Anexo</h6>
                                    <button type="button" class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminaranexoHecho"><i class="fas fa-minus-circle"></i></button>
                                </div>
                                <div class="col-12 col-md-4 form-group titulo-anexoSugerencias">
                                    <label for="titulo">Título anexo</label>
                                    <input type="text" class="form-control form-control-sm" name="titulo" id="titulo">
                                </div>
                                <div class="col-12 col-md-4 form-group descripcion-anexoSugerencias">
                                    <label for="descripcion">Descripción</label>
                                    <input type="text" class="form-control form-control-sm" name="descripcion" id="descripcion">
                                </div>
                                <div class="col-12 col-md-4 form-group doc-anexoSugerencias">
                                    <label for="documentos">Anexos o Pruebas</label>
                                    <input class="form-control form-control-sm" type="file" name="documentos" id="documentos">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end flex-row">
                            <button class="btn btn-success btn-xs btn-sombra pl-2 pr-2" id="crearAnexo"><i
                                class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Añadir
                                otro Anexo</button>
                        </div>
                        <input id="cantidadHechos" name="cantidadHechos" type="hidden" value="0">
                        <input id="cantidadAnexosHechos" name="cantidadAnexosHechos" type="hidden" value="0">
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary px-4" >Crear</button>
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
<script src="{{ asset('js/intranet/sugerencia/sugerencia.js') }}"></script>
@endsection
<!-- ************************************************************* -->