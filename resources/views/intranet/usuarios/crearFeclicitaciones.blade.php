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
            <div class="card card-primary pb-4">
                <div class="card-header">
                    <h3 class="card-title">Crear Felicitaciones</h3>
                </div>
                <form action="{{ route('usuario-generarFelicitacion-guardar') }}" method="POST"
                    autocomplete="off" enctype="multipart/form-data" id="fromFelicitacion">
                    @csrf
                    @method('post')
                    <div class="card-body"> 
                        <div class="col-12  mt-2 pt-2" id="felicitaciones">
                            <div class="col-12 consulta rounded border mb-3">
                                <div class="col-12" id="hechos">
                                    <div class="form-group hechoFelicitacion">
                                        <div class="title-hecho d-flex justify-content-between mt-2">
                                            <label for="hecho" class="requerido">Hecho</label>
                                            <button type="button" class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminarHecho"><i class="fas fa-minus-circle"></i></button>
                                        </div>
                                        <input class="form-control mt-2 hecho" type="text" name="hecho" id="hecho" required>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end flex-row">
                                    <button class="btn btn-success btn-xs btn-sombra pl-2 pr-2 crearHecho" id="crearHecho"><i
                                        class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Añadir
                                        otro hecho</button>
                                </div>
                                <div class="form-group col-12">
                                    <label for="">Nombre de funcionario</label>
                                    <input class="form-control" type="text" name="nombre_funcionario" id="nombre_funcionario">
                                </div>
                                <div class="col-md-12 margin-bottom-0">
                                    <label  for="felicitarSede">Desea felicitar una sede:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="felicitarSede"
                                            id="felicitarSede1" value="si">
                                        <label class="form-check-label" for="felicitarSede1">
                                            Sí
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="felicitarSede"
                                            id="felicitarSede2" value="no" checked>
                                        <label class="form-check-label" for="felicitarSede2">
                                            No
                                        </label>
                                    </div>
                                </div>
                                    <div class="p-2 d-none row group-sede">
                                        <div class="col-12 col-md-3 form-group" id="cajadepartamento"><label
                                            for="" class="requerido">Departamento:</label>
                                            <select class="custom-select rounded-0 departamentos" id="departamento"
                                                data_url="{{ route('cargar_municipios') }}">
                                                <option value="">--Seleccione--</option>
                                                @foreach ($departamentos as $departamento)
                                                    <option value="{{ $departamento->id }}">
                                                        {{ $departamento->departamento }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-3 form-group" id="cajamunicipio_id"><label
                                                for="" class="requerido">Municipio:</label>
                                            <select class="custom-select rounded-0" data_url="{{ route('cargar_sedes') }}"
                                                id="municipio_id">
                                                <option value="">--Seleccione--</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6 form-group cajasede_id" id="cajasede_id">
                                            <label for="" class="requerido">Sede:</label>
                                            <select name="sede_id" id="sede_id" class="custom-select rounded-0" >
                                                <option value="">--Seleccione--</option>
                                            </select>
                                        </div>
                                    </div>
                                <div class="form-group col-12">
                                    <label for="" class="requerido">Escriba sus felicitaciones</label>
                                    <textarea class="form-control" rows="3" placeholder="" name="felicitacion" id="felicitacion" required></textarea>
                                </div>
                                <input id="cantidadHechos" name="cantidadHechos" type="hidden" value="0">
                                <div class="card-footer d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary px-4">Crear</button>
                                </div>
                            </div>
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