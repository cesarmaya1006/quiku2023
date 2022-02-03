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
    Parametros - Analitica pos volumen
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    @include('intranet.funcionarios.menu.menu')
    <hr>
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row">
                <div class="form-group col-12 col-md-3">
                    <label class="requerido" for="motivo_sub_id">Año de busqueda</label>
                    <select id="annoBusqueda" class="form-control form-control-sm" name="annoBusqueda">
                        @for ($i = $annoini; $i <= $annofin; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="form-group col-12 col-md-3">
                    <label class="requerido" for="motivo_sub_id">Tipo de gráfico</label>
                    <select id="tipoGrafico" class="form-control form-control-sm" name="tipoGrafico">
                        <option value="area">Áreas</option>
                        <option value="line">Lineas</option>
                        <option value="column">Barras</option>
                        <option value="pie">Torta de datos</option>
                    </select>
                </div>
            </div>
            <div class="row mt-4">
                <div class="form-check col-12 mb-5">
                    <h4>Analítica por volumen</h4>
                </div>
                <div class="form-check col-12 col-md-2">
                    <input class="form-check-input check_clase" type="checkbox" value="" id="tipopqrCheck">
                    <label class="form-check-label" for="tipopqrCheck">Tipo</label>
                </div>
                <div class="form-check col-12 col-md-2">
                    <input class="form-check-input check_clase" type="checkbox" value="" id="motivoCheck">
                    <label class="form-check-label" for="motivoCheck">Motivo</label>
                </div>
                <div class="form-check col-12 col-md-2">
                    <input class="form-check-input check_clase" type="checkbox" value="" id="subMotivoCheck">
                    <label class="form-check-label" for="subMotivoCheck">Sub-Motivo</label>
                </div>
                <div class="form-check col-12 col-md-2">
                    <input class="form-check-input check_clase" type="checkbox" value="" id="serviciosCheck">
                    <label class="form-check-label" for="serviciosCheck">Tipo de Servicio</label>
                </div>
                <div class="form-check col-12 col-md-2 d-none" id="cajaserviciosCheck">
                    <input class="form-check-input check_clase" type="checkbox" value="" id="serviciosCheck">
                    <label class="form-check-label" for="serviciosCheck">Servicios</label>
                </div>
                <div class="form-check col-12 col-md-2" id="cajacategoriasCheck">
                    <input class="form-check-input check_clase" type="checkbox" value="" id="categoriasCheck">
                    <label class="form-check-label" for="categoriasCheck">Categorias</label>
                </div>
                <div class="form-check col-12 col-md-2" id="cajaproductosCheck">
                    <input class="form-check-input check_clase" type="checkbox" value="" id="productosCheck">
                    <label class="form-check-label" for="productosCheck">Productos</label>
                </div>
                <div class="form-check col-12 col-md-2" id="cajamarcasCheck">
                    <input class="form-check-input check_clase" type="checkbox" value="" id="marcasCheck">
                    <label class="form-check-label" for="marcasCheck">Marcas</label>
                </div>
                <div class="form-check col-12 col-md-2" id="cajareferenciasCheck">
                    <input class="form-check-input check_clase" type="checkbox" value="" id="referenciasCheck">
                    <label class="form-check-label" for="referenciasCheck">Referencias</label>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="form-group col-12 col-md-6 d-none" id="tipo_pqr">
                    <label class="requerido" for="tipo_p_q_r_id">Tipo</label>
                    <select id="tipo_p_q_r_id" class="form-control form-control-sm" name="tipo_p_q_r_id"
                        data_url="{{ route('admin-funcionario-asignacion_particular-cargar_motivo') }}" required>
                        <option value="">---Seleccione---</option>
                        @foreach ($tipos_pqr as $tipo_pqr)
                            <option value="{{ $tipo_pqr->id }}">{{ $tipo_pqr->tipo }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-12 col-md-6 d-none" id="motivo_pqr">
                    <label class="requerido" for="motivo_id">Motivo</label>
                    <select id="motivo_id" class="form-control form-control-sm" name="motivo_id"
                        data_url="{{ route('admin-funcionario-asignacion_particular-cargar_sub_motivo') }}">
                        <option value="">---Seleccione---</option>
                    </select>
                </div>
                <div class="form-group col-12 col-md-6 d-none" id="sub_motivo_pqr">
                    <label class="requerido" for="motivo_sub_id">Sub-Motivo</label>
                    <select id="motivo_sub_id" class="form-control form-control-sm" name="motivo_sub_id">
                        <option value="">---Seleccione---</option>
                    </select>
                </div>
                <div class="form-group col-12 col-md-6 d-none" id="servicios">
                    <label class="requerido" for="servicio_id">Servicios</label>
                    <select id="servicio_id" class="form-control form-control-sm" name="servicio_id">
                        <option value="">---Seleccione un servcio---</option>
                        @foreach ($servicios as $servicio)
                            <option value="{{ $servicio->id }}">{{ $servicio->servicio }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-12 col-md-6 d-none" id="categorias">
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
                <div class="form-group col-12 col-md-6 d-none" id="productos">
                    <label class="requerido" for="producto_id">Productos</label>
                    <select id="producto_id" class="form-control form-control-sm" name="producto_id"
                        data_url="{{ route('admin-funcionario-asignacion_particular-cargar_marca') }}">
                        <option value="">---Seleccione primero una categoría---</option>
                    </select>
                </div>
                <div class="form-group col-12 col-md-6 d-none" id="marcas">
                    <label class="requerido" for="marca_id">Marcas</label>
                    <select id="marca_id" class="form-control form-control-sm" name="marca_id"
                        data_url="{{ route('admin-funcionario-asignacion_particular-cargar_referencia') }}">
                        <option value="">---Seleccione primero un producto---</option>
                    </select>
                </div>
                <div class="form-group col-12 col-md-6 d-none" id="referencias">
                    <label class="requerido" for="referencia_id">Referencias</label>
                    <select id="referencia_id" class="form-control form-control-sm" name="referencia_id">
                        <option value="">---Seleccione primero una marca---</option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="row mb-3 cajasAnaliticas d-none" id="containerAnalitica">
                <div class="col-12 d-none" id="caja1">
                    <div id="analiticaAjax" style="height: 370px; max-width: auto; margin: 0px auto;"></div>
                </div>
            </div>
            <hr>
            <div class="row mb-3 cajasAnaliticas d-none">
                <div class="col-12 col-md-6 table-responsive d-flex justify-content-center" id="tAnalitica">
                    <table class="table table-striped table-hover table-sm">
                        <thead class="thead-inverse">
                            <tr>
                                <th class="text-center" id="tituloTabla1" style="white-space:nowrapmin-width:250px;">Item
                                </th>
                                <th class="text-center" style="white-space:nowrapmin-width:50px;">Mes</th>
                                <th class="text-center" style="white-space:nowrapmin-width:50px;">Dias Promedio</th>
                            </tr>
                        </thead>
                        <tbody id="bodyTabla">
                            <tr>
                                <td class="text-center">Columna 1</td>
                                <td class="text-center">Val 1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="cargarGraficos" id="cargarGraficos" data_url="{{ route('analitica-cantidad_cargar') }}">
    <input type="hidden" name="graficoExcel" id="graficoExcel" data_url="{{ asset('imagenes/sistema/excel.png') }}">

@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/canvas/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('js/canvas/jquery.canvasjs.min.js') }}"></script>
    <script src="{{ asset('js/intranet/analitica/cantidad.js') }}"></script>
@endsection
<!-- ************************************************************* -->
