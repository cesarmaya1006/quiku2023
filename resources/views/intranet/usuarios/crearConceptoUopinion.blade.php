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
            {{-- Consulta --}}
            <div class="col-12">
                <div class="card card-primary pb-4">
                    <div class="card-header">
                        <h3 class="card-title">Crear Concepto u opinión</h3>
                    </div>
                    <form action="{{ route('usuario-generarConceptoUOpinion-guardar') }}" method="POST" autocomplete="off"
                        enctype="multipart/form-data" id="fromConceptoUOpinion">
                        @csrf
                        @method('post')
                        <div class="card-body">
                            <div class="col-12 mt-2">
                                <div class="d-flex form-group grupo-sede rounded border p-2">
                                    <div class="col-12 col-md-3 form-group" id="cajadepartamento"><label
                                        for="">Departamento:</label>
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
                                            for="">Municipio:</label>
                                        <select class="custom-select rounded-0" data_url="{{ route('cargar_sedes') }}"
                                            id="municipio_id">
                                            <option value="">--Seleccione--</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6 form-group cajasede_id" id="cajasede_id">
                                        <label for="">Sede:</label>
                                        <select name="sede_id" id="sede_id" class="custom-select rounded-0" >
                                            <option value="">--Seleccione--</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12  mt-2 pt-2" id="consultas">
                                <div class="col-12 consulta rounded border mb-3">
                                    <div class="form-group col-12 mt-2 titulo-consulta">
                                        <div class="col-12 d-flex justify-content-between mb-2">
                                            <label for="">Consulta</label>
                                            <button type="button"
                                                class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminarConsulta"><i
                                                    class="fas fa-minus-circle"></i> Eliminar consulta</button>
                                        </div>
                                        <input class="form-control" type="text" name="consulta" id="consulta">
                                    </div>
                                    <div class="col-12" id="hechos">
                                        <div class="form-group hechoConsulta">
                                            <div class="title-hecho d-flex justify-content-between mt-2">
                                                <label for="hecho">Hecho</label>
                                                <button type="button" class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminarHecho"><i class="fas fa-minus-circle"></i></button>
                                            </div>
                                            <input class="form-control mt-2 hecho" type="text" name="hecho" id="hecho">
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end flex-row">
                                        <button class="btn btn-success btn-xs btn-sombra pl-2 pr-2 crearHecho" id="crearHecho"><i
                                            class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Añadir
                                            otro hecho</button>
                                    </div>
                                    <div class="form-group col-12 mt-4">
                                        <h6>Anexo o prueba</h6>
                                    </div>
                                    <div class="col-12" id="anexosConsulta">
                                        <div class="col-12 d-flex row anexoconsulta">
                                            <div class="col-12 titulo-anexo d-flex justify-content-between">
                                                <h6>Anexo</h6>
                                                <button type="button"
                                                    class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminaranexoConsulta"><i
                                                        class="fas fa-minus-circle"></i></button>
                                            </div>
                                            <div class="col-12 col-md-4 form-group titulo-anexoConsulta">
                                                <label for="titulo">Título anexo</label>
                                                <input type="text" class="form-control form-control-sm" name="titulo" id="titulo">
                                            </div>
                                            <div class="col-12 col-md-4 form-group descripcion-anexoConsulta">
                                                <label for="descripcion">Descripción</label>
                                                <input type="text" class="form-control form-control-sm" name="descripcion"
                                                    id="descripcion">
                                            </div>
                                            <div class="col-12 col-md-4 form-group doc-anexoConsulta">
                                                <label for="documentos">Anexos o Pruebas</label>
                                                <input class="form-control form-control-sm" type="file" name="documentos"
                                                    id="documentos">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end flex-row mb-3">
                                        <button class="btn btn-success btn-xs btn-sombra pl-2 pr-2 crearAnexo" id="crearAnexo"><i
                                                class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Añadir
                                            otro Anexo</button>
                                    </div>
                                    <input class="cantidadHechosConsulta" id="cantidadHechosConsulta" name="cantidadHechosConsulta" type="hidden" value="0">
                                    <input class="cantidadAnexosConsulta" id="cantidadAnexosConsulta" name="cantidadAnexosConsulta" type="hidden" value="0">
                                </div>
                            </div>
                            <input class="cantidadConsultas" id="cantidadConsultas" name="cantidadConsultas" type="hidden" value="0">
                            <div class="col-12 d-flex justify-content-end flex-row">
                                <button class="btn btn-success btn-xs btn-sombra pl-2 pr-2" id="crearConsulta"><i
                                        class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Añadir
                                    otro consulta</button>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-4">Crear</button>
                        </div>
                        <input class="totalCantidadAnexosConsultas" id="totalCantidadAnexosConsultas" name="totalCantidadAnexosConsultas" type="hidden" value="0">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/conceptouopinion/conceptouopinion.js') }}"></script>  
@endsection
<!-- ************************************************************* -->
