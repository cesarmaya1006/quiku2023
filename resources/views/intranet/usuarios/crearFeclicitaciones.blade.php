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
        {{-- Felicitaciones --}}
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Crear Felicitaciones</h3>
                </div>
                <form action="{{ route('usuario-generarFelicitacion-guardar') }}" method="POST"
                    autocomplete="off" enctype="multipart/form-data" id="fromFelicitacion">
                    @csrf
                    @method('post')
                    <div class="card-body">
                        <div class="col-12" id="hechos">
                            <div class="form-group felicitacionHecho">
                                <div class="title-felicitacion d-flex justify-content-between mt-2">
                                    <label for="hecho">Hecho</label>
                                    <button type="button" class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminarHecho"><i class="fas fa-minus-circle"></i></button>
                                </div>
                                <input class="form-control mt-2" type="text" name="hecho" id="hecho">
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end flex-row">
                            <button class="btn btn-success btn-xs btn-sombra pl-2 pr-2" id="crearHecho"><i
                                class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Añadir
                                otro hecho</button>
                        </div>
                        <div class="form-group col-12">
                            <label for="">Nombre de funcionario</label>
                            <input class="form-control" type="text" name="nombre_funcionario" id="nombre_funcionario">
                        </div>
                        <div class="form-group col-12">
                            <label for="">Elija una sede que desea felicitar:</label>
                            <select name="sede" id="sede" class="custom-select rounded-0">
                                <option value="">--Seleccione--</option>
                                <option value="sede1">Sede 1</option>
                                <option value="sede2">Sede 2</option>
                                <option value="sede3">Sede 3</option>
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <label for="">Escriba sus felicitaciones</label>
                            <textarea class="form-control" rows="3" placeholder="" name="felicitacion" id="felicitacion"></textarea>
                        </div>
                        <input id="cantidadHechos" name="cantidadHechos" type="hidden" value="0">
                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-4">Crear</button>
                        </div>
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
    <script src="{{ asset('js/intranet/felicitacion/felicitacion.js') }}"></script>
@endsection
<!-- ************************************************************* -->