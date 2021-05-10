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
            {{-- PQR --}}
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Crear PQR - {{ $tipo_pqr->tipo }}</h3>
                    </div>
                    <form action="{{ route('usuario-generarPQR-guardar') }}" method="POST" autocomplete="off"
                        enctype="multipart/form-data" id="fromPQR">
                        @csrf
                        @method('post')
                        @if ($usuario->persona)
                            <input type="hidden" name="persona_id " value="{{ $usuario->persona->id }}">
                        @endif
                        @if ($usuario->representante)
                            <input type="hidden" name="empresa_id  " value="{{ $usuario->representante->empresa->id }}">
                        @endif
                        <div class="card-body m-2">
                            <div class="row d-flex">
                                <div class="col-12 col-md-6 form-group"><label for="adquisicion">Lugar de adquisición del
                                        producto o servicio:</label>
                                    <select name="adquisicion" id="adquisicion" class="custom-select rounded-0" required>
                                        <option value="">--Seleccione--</option>
                                        <option value="Sede física">Sede física</option>
                                        <option value="Página web">Página web</option>
                                        <option value="APP">APP</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 form-group d-none" id="cajadepartamento"><label
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
                                <div class="col-12 col-md-6 form-group d-none" id="cajamunicipio_id"><label
                                        for="">Municipio:</label>
                                    <select class="custom-select rounded-0" data_url="{{ route('cargar_sedes') }}"
                                        id="municipio_id">
                                        <option value="">--Seleccione--</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 form-group d-none" id="cajasede_id">
                                    <label for="">Sede:</label>
                                    <select name="sede_id" id="sede_id" class="custom-select rounded-0" >
                                        <option value="">--Seleccione--</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 form-group">
                                    <label for="tipo">¿Su PQR es sobre un producto o servicio?</label>
                                    <select name="tipo" id="tipo" class="custom-select rounded-0" required>
                                        <option value="Producto">Producto</option>
                                        <option value="Servicio">Servicio</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 form-group grupo_producto">
                                    <label for="">Categoria del producto</label>
                                    <select name="categoria" id="categoria" class="custom-select rounded-0"  data_url="{{ route('cargar_productos') }}">
                                        <option value="">--Seleccione--</option>
                                        @foreach ($categorias as $categoria)
                                            <option value="{{ $categoria->id }}">
                                                {{ $categoria->categoria }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 form-group grupo_producto">
                                    <label for="">Producto</label>
                                    <select name="producto" id="producto" class="custom-select rounded-0" data_url="{{ route('cargar_marcas') }}">
                                        <option value="">--Seleccione--</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 form-group grupo_producto">
                                    <label for="">Marca:</label>
                                    <select name="marca" id="marca" class="custom-select rounded-0" data_url="{{ route('cargar_referencias') }}">
                                        <option value="">--Seleccione--</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 form-group grupo_producto">
                                    <label for="">Referencia:</label>
                                    <select name="referencia_id" id="referencia_id" class="custom-select rounded-0">
                                        <option value="">--Seleccione--</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 form-group"><label for="">No. Factura:</label>
                                    <input class="form-control" type="text" name="factura" id="factura" required>
                                </div>
                                <div class="col-12 col-md-6 form-group">
                                    <label>Fecha de factura:</label>
                                    <div class="input-group">
                                        <input type="date" max="{{ date('Y-m-d') }}" name="fecha_factura" id="fecha_factura" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 form-group d-none grupo_servicio">
                                    <label for="">Tipo de servicio:</label>
                                    <select name="servicio_id" id="servicio_id" class="custom-select rounded-0">
                                        <option value="">--Seleccione--</option>
                                        @foreach ($servicios as $servicio)
                                            <option value="{{ $servicio->id }}">
                                                {{ $servicio->servicio }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input id="tipo_pqr_id" name="tipo_pqr_id" type="hidden" value="{{ $tipo_pqr->id }}">
                            <div class="card-footer mt-5 mb-3 pl-4">
                                <button type="submit" class="btn btn-primary pl-5 pr-5">Crear</button>
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
    <script src="{{ asset('js/intranet/pqr/assets_pqr.js') }}"></script>
@endsection
<!-- ************************************************************* -->
