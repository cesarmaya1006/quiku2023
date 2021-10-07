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
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8">
                @include('includes.error-form')
                @include('includes.mensaje')
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">WIKU</h3>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Busqueda Basica</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">Busqueda Avanzada</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="row d-flex justify-content-center">
                                <div class="col-12 col-md-8 d-flex justify-content-around">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio1" checked="checked"
                                            value="todos">
                                        <label class="form-check-label">Todos</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio1" value="Argumentos">
                                        <label class="form-check-label">Argumentos</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio1" value="Normas">
                                        <label class="form-check-label">Normas</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio1" value="Jurisprudencias">
                                        <label class="form-check-label">Jurisprudencias</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="radio1" value="Normas">
                                        <label class="form-check-label">Doctrinas</label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row d-flex justify-content-center">
                                <div class="col-12 col-md-8 form-group d-flex justify-content-center">
                                    <label for="query" class="mr-3" style="white-space:nowrap">Busqueda
                                        Básica</label>
                                    <input type="text" class="form-control" id="query" name="query"
                                        data_url="{{ route('wiku_busqueda_basica') }}"
                                        placeholder="Ingrese palabras de busqueda">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="row d-flex justify-content-star">
                                <div class="col-12 mb-3">
                                    <h6>Por tipo de wiku...</h6>
                                </div>
                                <div class="form-group col-12 col-md-4">
                                    <label class="requerido" for="tipo_wiku">Categoria de Wiku</label>
                                    <select class="form-control form-control-sm" id="tipo_wiku"
                                        data_url="{{ route('wiku-cargarargumentos') }}">
                                        <option value="">---Seleccione Wiku---</option>
                                        <option value="Argumentos">Argumentos</option>
                                        <option value="Normas">Normas</option>
                                        <option value="Jurisprudencias">Jurisprudencias</option>
                                        <option value="Doctrinas">Doctrinas</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="row d-flex justify-content-center" id="cajaArea">
                                <div class="col-12 mb-3 d-none cajaArea">
                                    <h6>Por área, tema y tema específico...</h6>
                                </div>
                                <div class="form-group col-12 col-md-4  d-none cajaArea">
                                    <label for="area_id">Área</label>
                                    <select class="form-control form-control-sm" id="area_id"
                                        data_url="{{ route('cargar_temas') }}">
                                        <option value="">---Seleccione---</option>
                                        @foreach ($areas as $area)
                                            <option value="{{ $area->id }}">{{ $area->area }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-12 col-md-4  d-none cajaArea">
                                    <label for="tema_id">Tema</label>
                                    <select class="form-control form-control-sm" id="tema_id"
                                        data_url="{{ route('cargar_temasespec') }}">
                                        <option value="">Seleccione primero un área</option>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-md-4  d-none cajaArea">
                                    <label for="wikutemaespecifico_id">Tema Específico</label>
                                    <select class="form-control form-control-sm" name="wikutemaespecifico_id"
                                        id="wikutemaespecifico_id">
                                        <option value="">Seleccione primero un Tema</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="d-none cajaArea">
                            <div class="row">
                                <div class="col-12 mb-3 d-none seccionAreaTemas">
                                    <h6>Por fuente, artículo y fecha de entrada en vigencia...</h6>
                                </div>
                                <div class="col-12 col-md-5 form-group d-none seccionFuenteEmisora">
                                    <label for="fuente_id">Fuente emisora</label>
                                    <select class="form-control form-control-sm" name="fuente_id" id="fuente_id"
                                        data_url="{{ route('cargar_normas') }}">
                                        <option value="">--- Seleccione ---</option>
                                        @foreach ($fuentes as $fuente)
                                            <option value="{{ $fuente->id }}">{{ $fuente->fuente }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-5 form-group d-none seccionAreaTemas">
                                    <label for="fuente_id" id="tituloID">Artículo</label>
                                    <select class="form-control form-control-sm" id="id">
                                        <option value="">Seleccione primero una Fuente Emisora</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-2 form-group d-none d-none seccionAreaTemas">
                                    <label for="fecha">Entrada en vigencia</label>
                                    <input type="date" class="form-control form-control-sm" name="fecha" id="fecha"
                                        max="{{ date('Y-m-d') }}">
                                </div>
                                <hr class="d-none seccionAreaTemas">
                                <div class="col-12 mb-3 d-none seccionProductosTipoPQR">
                                    <h6>Por asociación servicio / producto..</h6>
                                </div>
                                <div class="form-group col-12 col-md-4  d-none seccionProductosTipoPQR">
                                    <label class="requerido" for="prod_serv">Producto / Servicio</label>
                                    <select class="form-control form-control-sm" id="prod_serv">
                                        <option value="">---Selecione---</option>
                                        <option value="Producto">Producto</option>
                                        <option value="Servicio">Servicio</option>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-md-4  d-none seccionProductosTipoPQR" id="tipo_pqr">
                                    <label class="requerido" for="tipo_p_q_r_id">Tipo de PQR</label>
                                    <select id="tipo_p_q_r_id" class="form-control form-control-sm" name="tipo_p_q_r_id"
                                        data_url="{{ route('admin-funcionario-asignacion_particular-cargar_motivo') }}"
                                        required>
                                        <option value="">---Seleccione---</option>
                                        @foreach ($tipos_pqr as $tipo_pqr)
                                            <option value="{{ $tipo_pqr->id }}">{{ $tipo_pqr->tipo }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-12 col-md-4  d-none seccionProductosTipoPQR" id="motivo_pqr">
                                    <label class="requerido" for="motivo_id">Motivo de PQR</label>
                                    <select id="motivo_id" class="form-control form-control-sm" name="motivo_id"
                                        data_url="{{ route('admin-funcionario-asignacion_particular-cargar_sub_motivo') }}">
                                        <option value="">---Seleccione---</option>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-md-4  d-none seccionProductosTipoPQR" id="sub_motivo_pqr">
                                    <label class="requerido" for="motivo_sub_id">Sub-Motivo de PQR</label>
                                    <select id="motivo_sub_id" class="form-control form-control-sm" name="motivo_sub_id">
                                        <option value="">---Seleccione---</option>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-md-4  d-none seccionProductosTipoPQR" id="servicios">
                                    <label for="servicio_id">Servicios</label>
                                    <select id="servicio_id" class="form-control form-control-sm" name="servicio_id">
                                        <option value="">---Seleccione un servcio---</option>
                                        @foreach ($servicios as $servicio)
                                            <option value="{{ $servicio->id }}">{{ $servicio->servicio }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-12 col-md-4   d-none seccionProductosTipoPQR" id="categorias">
                                    <label class="requerido" for="categoria_id">Categoría de producto</label>
                                    <select id="categoria_id" class="form-control form-control-sm"
                                        data_url="{{ route('admin-funcionario-asignacion_particular-cargar_producto') }}"
                                        name="categoria_id">
                                        <option value="">---Seleccione---</option>
                                        @foreach ($categorias as $categoria)
                                            <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-12 col-md-4   d-none seccionProductosTipoPQR" id="productos">
                                    <label class="requerido" for="producto_id">Productos</label>
                                    <select id="producto_id" class="form-control form-control-sm" name="producto_id"
                                        data_url="{{ route('admin-funcionario-asignacion_particular-cargar_marca') }}">
                                        <option value="">---Seleccione primero una categoría---</option>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-md-4   d-none seccionProductosTipoPQR" id="marcas">
                                    <label class="requerido" for="marca_id">Marcas</label>
                                    <select id="marca_id" class="form-control form-control-sm" name="marca_id"
                                        data_url="{{ route('admin-funcionario-asignacion_particular-cargar_referencia') }}">
                                        <option value="">---Seleccione primero un producto---</option>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-md-4   d-none seccionProductosTipoPQR" id="referencias">
                                    <label class="requerido" for="referencia_id">Referencias</label>
                                    <select id="referencia_id" class="form-control form-control-sm" name="referencia_id">
                                        <option value="">---Seleccione primero una marca---</option>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-md-4 pl-4 d-flex align-items-end">
                                    <button class="btn btn-primary btn-xs btn-sombra pl-5 pr-5 form-control-sm"
                                        id="btn_buscar" onclick="busquedaAvanzada()"
                                        data_url="{{ route('wiku_busqueda_avanzada') }}">Buscar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-around" id="coleccionrespuesta">
                        <div class="col-md-6  d-none">
                            <div class="card card-primary collapsed-card card-mini-sombra">
                                <div class="card-header">
                                    <div class="user-block">
                                        <span class="username"><a href="#" id="tituloNoma"></a></span>
                                        <span class="description"></span>
                                    </div>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <p><strong>Texto:</strong> El Texto...</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12">
                                            <h6>Criterios Juridicos</h6>
                                        </div>
                                        <div class="col-12 table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Autor(es)</th>
                                                        <th>Criterios jurídicos de aplicación</th>
                                                        <th>Criterios jurídicos de no aplicación</th>
                                                        <th>Notas de la Vigencia</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/parametros/busqueda.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
<!-- ************************************************************* -->
