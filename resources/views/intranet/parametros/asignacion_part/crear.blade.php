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
    Parametros - Asignación Particular
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>Nueva Asignación particular</h5>
                </div>
                <div class="col-12 col-md-6 col-lg-6 text-md-right text-lg-right pl-2 pr-md-5 pr-lg-5">
                    <a href="{{ route('admin-funcionario-asignacion_particular-index') }}"
                        class="btn btn-success btn-sm text-center pl-3 pr-3" style="font-size: 0.9em;"><i
                            class="fas fa-reply mr-2"></i> Volver</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin-funcionario-areas-guardar') }}" class="form-horizontal" method="POST"
                        autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="row">
                            <div class="form-group col-12 col-md-3">
                                <label class="requerido" for="tipo">Tipo de asignación</label>
                                <select id="tipo" class="form-control form-control-sm" name="tipo">
                                    <option value="Permanente">Permanente</option>
                                    <option value="Particular">Particular</option>
                                </select>
                            </div>
                            <div class="form-group col-12 col-md-3">
                                <label class="requerido" for="tipo_pqr_id">Tipo de PQR</label>
                                <select id="tipo_pqr_id" class="form-control form-control-sm" name="tipo_pqr_id"
                                    data_url="{{ route('admin-funcionario-asignacion_particular-cargar_motivo') }}"
                                    required>
                                    <option value="">---Seleccione---</option>
                                    @foreach ($tipos_pqr as $tipo_pqr)
                                        <option value="{{ $tipo_pqr->id }}">{{ $tipo_pqr->tipo }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12 col-md-3">
                                <label class="requerido" for="prod_serv">Tipo de Producto / Servicio</label>
                                <select id="prod_serv" class="form-control form-control-sm" name="prod_serv">
                                    <option value="Producto">Producto</option>
                                    <option value="Servicio">Servicio</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="row d-none" id="ajustesAsignacion">
                            <div class="col-12 mb-3">
                                <h6>Ajustes de parametro de asignación</h6>
                            </div>
                            <div class="col-12">
                                <p>Seleccione los ajustes del parametro de asignación</p>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="form-check col-12 col-md-2">
                                        <input class="form-check-input" type="checkbox" value="" id="adquisicionCheck">
                                        <label class="form-check-label" for="adquisicionCheck">
                                            Adquisición
                                        </label>
                                    </div>
                                    <div class="form-check col-12 col-md-2">
                                        <input class="form-check-input" type="checkbox" value="" id="motivoCheck">
                                        <label class="form-check-label" for="motivoCheck">
                                            Motivo PQR
                                        </label>
                                    </div>
                                    <div class="form-check col-12 col-md-2">
                                        <input class="form-check-input" type="checkbox" value="" id="subMotivoCheck">
                                        <label class="form-check-label" for="subMotivoCheck">
                                            Sub-Motivo PQR
                                        </label>
                                    </div>
                                    <div class="form-check col-12 col-md-2 d-none" id="cajaserviciosCheck">
                                        <input class="form-check-input" type="checkbox" value="" id="serviciosCheck">
                                        <label class="form-check-label" for="serviciosCheck">Servicios</label>
                                    </div>
                                    <div class="form-check col-12 col-md-2" id="cajaproductosCheck">
                                        <input class="form-check-input" type="checkbox" value="" id="productosCheck">
                                        <label class="form-check-label" for="productosCheck">Productos</label>
                                    </div>
                                    <div class="form-check col-12 col-md-2" id="cajamarcasCheck">
                                        <input class="form-check-input" type="checkbox" value="" id="marcasCheck">
                                        <label class="form-check-label" for="marcasCheck">Marcas</label>
                                    </div>
                                    <div class="form-check col-12 col-md-2" id="cajareferenciasCheck">
                                        <input class="form-check-input" type="checkbox" value="" id="referenciasCheck">
                                        <label class="form-check-label" for="referenciasCheck">Referencias</label>
                                    </div>
                                    <div class="form-check col-12 col-md-2">
                                        <input class="form-check-input" type="checkbox" value="" id="palabrasCheck">
                                        <label class="form-check-label" for="palabrasCheck">Palabras Clave</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row d-none" id="adquisicion_p_s">
                            <hr>
                            <div class="form-group col-12 col-md-6">
                                <label class="requerido" for="adquisicion">Tipo de adquisición</label>
                                <select name="adquisicion" id="adquisicion" class="custom-select rounded-0" required>
                                    <option value="">--Seleccione--</option>
                                    <option value="Sede física">Sede física</option>
                                    <option value="Página web">Página web</option>
                                    <option value="APP">APP</option>
                                </select>
                            </div>
                        </div>
                        <div class="row d-none" id="motivo_pqr">
                            <hr>
                            <div class="form-group col-12 col-md-6">
                                <label class="requerido" for="motivo_id">Motivo de PQR</label>
                                <select id="motivo_id" class="form-control form-control-sm" name="motivo_id"
                                    data_url="{{ route('admin-funcionario-asignacion_particular-cargar_sub_motivo') }}"
                                    required>
                                    <option value="">---Seleccione---</option>
                                </select>
                            </div>
                        </div>
                        <div class="row d-none" id="sub_motivo_pqr">
                            <hr>
                            <div class="form-group col-12 col-md-6">
                                <label class="requerido" for="motivo_sub_id">Sub-Motivo de PQR</label>
                                <select id="motivo_sub_id" class="form-control form-control-sm" name="motivo_sub_id"
                                    required>
                                    <option value="">---Seleccione---</option>
                                </select>
                            </div>
                        </div>
                        <div class="row d-none" id="servicios">
                            <hr>
                            <div class="form-group col-12 col-md-6">
                                <label class="requerido" for="servicioo_id">Servicios</label>
                                <select id="servicio_id" class="form-control form-control-sm" name="servicio_id" required>
                                    <option value="">---Seleccione un servcio---</option>
                                    @foreach ($servicios as $servicio)
                                        <option value="{{ $servicio->id }}">{{ $servicio->servicio }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row d-none" id="categorias">
                            <hr>
                            <div class="form-group col-12 col-md-6">
                                <label class="requerido" for="categoria_id">Categoría de producto</label>
                                <select id="categoria_id" class="form-control form-control-sm"
                                    data_url="{{ route('admin-funcionario-asignacion_particular-cargar_producto') }}"
                                    required>
                                    <option value="">---Seleccione---</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row d-none" id="productos">
                            <hr>
                            <div class="form-group col-12 col-md-6">
                                <label class="requerido" for="producto_id">Productos</label>
                                <select id="producto_id" class="form-control form-control-sm" name="producto_id"
                                    data_url="{{ route('admin-funcionario-asignacion_particular-cargar_marca') }}"
                                    required>
                                    <option value="">---Seleccione una categoría---</option>
                                </select>
                            </div>
                        </div>
                        <div class="row d-none" id="marcas">
                            <hr>
                            <div class="form-group col-12 col-md-6">
                                <label class="requerido" for="marca_id">Marcas</label>
                                <select id="marca_id" class="form-control form-control-sm" name="marca_id"
                                    data_url="{{ route('admin-funcionario-asignacion_particular-cargar_referencia') }}"
                                    required>
                                    <option value="">---Seleccione un producto---</option>
                                </select>
                            </div>
                        </div>
                        <div class="row d-none" id="referencias">
                            <hr>
                            <div class="form-group col-12 col-md-6">
                                <label class="requerido" for="referencia_id">Referencias</label>
                                <select id="referencia_id" class="form-control form-control-sm" name="referencia_id"
                                    required>
                                    <option value="">---Seleccione una marca---</option>
                                </select>
                            </div>
                        </div>
                        <div class="row d-none" id="palabrasClave">
                            <hr>
                            <div class="form-group col-12">
                                <p><strong>Palabras Clave</strong></p>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label class="requerido" for="palabra1">Palabra Clave 1</label>
                                <input type="text" class="form-control form-control-sm" name="palabra1" id="palabra1"
                                    required>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="palabra2">Palabra Clave 2</label>
                                <input type="text" class="form-control form-control-sm" name="palabra2" id="palabra2">
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="palabra3">Palabra Clave 3</label>
                                <input type="text" class="form-control form-control-sm" name="palabra3" id="palabra3">
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="palabra4">Palabra Clave 4</label>
                                <input type="text" class="form-control form-control-sm" name="palabra4" id="palabra4">
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="palabra5">Palabra Clave 5</label>
                                <input type="text" class="form-control form-control-sm" name="palabra5" id="palabra5">
                            </div>
                        </div>
                        <div class="row">
                            <hr style="border-top: solid 4px black">
                            <div class="col-12">
                                <h6>Datos de asignacion por cargo</h6>
                            </div>
                            <br>
                            <div class="form-group col-12 col-md-3">
                                <label class="requerido" for="departamento_id">Departamentos con sedes</label>
                                <select id="departamento_id" class="form-control form-control-sm"
                                    data_url="{{ route('admin-funcionario-asignacion_particular-cargar_municipio') }}"
                                    required>
                                    <option value="">---Seleccione---</option>
                                    @foreach ($departamentos as $departamento)
                                        @foreach ($departamento->municipios as $municipio)
                                            @if ($municipio->sedes->count() > 0)
                                                <option value="{{ $departamento->id }}">
                                                    {{ $departamento->departamento }}</option>
                                            @break
                                        @endif
                                    @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12 col-md-3">
                                <label class="requerido" for="municipio_id">Municipios con sedes</label>
                                <select id="municipio_id" class="form-control form-control-sm"
                                    data_url="{{ route('admin-funcionario-asignacion_particular-cargar_sede') }}" required>
                                    <option value="">---Seleccione un departamento---</option>
                                </select>
                            </div>
                            <div class="form-group col-12 col-md-3">
                                <label class="requerido" for="sede_id">Sedes</label>
                                <select id="sede_id" class="form-control form-control-sm" required>
                                    <option value="">---Seleccione un municipio---</option>
                                </select>
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
    <script src="{{ asset('js/intranet/empresa/asignacion/asignacion_part.js') }}"></script>
@endsection
<!-- ************************************************************* -->
