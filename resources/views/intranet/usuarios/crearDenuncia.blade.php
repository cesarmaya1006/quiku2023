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
            {{-- Reporte de denuncia --}}
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Reporte irregularidad</h3>
                    </div>
                    <form action="{{ route('usuario-gererarDenuncia-guardar') }}" method="POST" autocomplete="off"
                        enctype="multipart/form-data" id="fromDenuncia">
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
                                        <select name="sede_id" id="sede_id" class="custom-select rounded-0">
                                            <option value="">--Seleccione--</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12  mt-2 pt-2" id="irregularidades">
                                <div class="col-12 irregularidad rounded border mb-3">
                                    <div class="form-group col-12 mt-2 titulo-irregularidad">
                                        <div class="col-12 d-flex justify-content-between mb-2">
                                            <label for="" class="requerido">Tipo de irregularidad</label>
                                            <button type="button"
                                                class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminarIrregularidad"><i
                                                    class="fas fa-minus-circle"></i> Eliminar irregularidad</button>
                                        </div>
                                        <select name="tipo_irregularidad" id="tipo_irregularidad"
                                            class="custom-select rounded-0 tipo_irregularidad" required>
                                            <option value="">--Seleccione--</option>
                                            <option value="Maltrato al cliente">Maltrato al cliente</option>
                                            <option value="Sospecha de hurto">Sospecha de hurto</option>
                                            <option value="Sospecha de fraude">Sospecha de fraude</option>
                                            <option value="Sospecha de acoso">Sospecha de acoso</option>
                                            <option value="otro">Otro</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-12 otro d-none">
                                        <input class="form-control mt-2" type="text" name="otro" id="otro"
                                            placeholder="Otro">
                                    </div>
                                    <div class="col-12" id="hechos">
                                        <div class="form-group hechoIrregularidad">
                                            <div class="title-hecho d-flex justify-content-between mt-2">
                                                <label for="hecho" class="requerido">Hecho</label>
                                                <button type="button"
                                                    class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminarHecho"><i
                                                        class="fas fa-minus-circle"></i></button>
                                            </div>
                                            <input class="form-control mt-2 hecho" type="text" name="hecho" id="hecho"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end flex-row">
                                        <button class="btn btn-success btn-xs btn-sombra pl-2 pr-2 crearHecho"
                                            id="crearHecho"><i class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Añadir
                                            otro hecho</button>
                                    </div>
                                    <div class="form-group col-12 mt-4">
                                        <h6>Anexo o prueba</h6>
                                    </div>
                                    <div class="col-12" id="anexosIrregularidad">
                                        <div class="col-12 d-flex row anexoirregularidad">
                                            <div class="col-12 titulo-anexo d-flex justify-content-between">
                                                <h6>Anexo</h6>
                                                <button type="button"
                                                    class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminaranexoIrregularidad"><i
                                                        class="fas fa-minus-circle"></i></button>
                                            </div>
                                            <div class="col-12 col-md-4 form-group titulo-anexoIrregularidad">
                                                <label for="titulo">Título anexo</label>
                                                <input type="text" class="form-control form-control-sm" name="titulo"
                                                    id="titulo">
                                            </div>
                                            <div class="col-12 col-md-4 form-group descripcion-anexoIrregularidad">
                                                <label for="descripcion">Descripción</label>
                                                <input type="text" class="form-control form-control-sm" name="descripcion"
                                                    id="descripcion">
                                            </div>
                                            <div class="col-12 col-md-4 form-group doc-anexoIrregularidad">
                                                <label for="documentos">Anexos o Pruebas</label>
                                                <input class="form-control form-control-sm" type="file" name="documentos"
                                                    accept="application/pdf" id="documentos">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end flex-row mb-3">
                                        <button class="btn btn-success btn-xs btn-sombra pl-2 pr-2 crearAnexo"
                                            id="crearAnexo"><i class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Añadir
                                            otro Anexo</button>
                                    </div>
                                    <input class="cantidadHechosIrregularidad" id="cantidadHechosIrregularidad"
                                        name="cantidadHechosIrregularidad" type="hidden" value="0">
                                    <input class="cantidadAnexosIrregularidad" id="cantidadAnexosIrregularidad"
                                        name="cantidadAnexosIrregularidad" type="hidden" value="0">
                                </div>
                            </div>
                            <input class="cantidadIrregularidades" id="cantidadIrregularidades"
                                name="cantidadIrregularidades" type="hidden" value="0">
                            <div class="col-12 d-flex justify-content-end flex-row">
                                <button class="btn btn-success btn-xs btn-sombra pl-2 pr-2" id="crearIrregularidad"><i
                                        class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Añadir
                                    otro irregularidad</button>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-4">Crear</button>
                        </div>
                        <input class="totalCantidadAnexosIrregularidades" id="totalCantidadAnexosIrregularidades"
                            name="totalCantidadAnexosIrregularidades" type="hidden" value="0">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/denuncia/denuncia.js') }}"></script>
@endsection
<!-- ************************************************************* -->
