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
                    <form>
                        @if ($usuario->persona)
                            <input type="hidden" name="persona_id " value="{{ $usuario->persona->id }}">
                        @endif
                        @if ($usuario->representante)
                            <input type="hidden" name="empresa_id  " value="{{ $usuario->representante->empresa->id }}">
                        @endif
                        <div class="card-body">
                            <div class="row d-flex">
                                <div class="col-12 col-md-6 form-group">
                                    <label for="">Categoría Motivo</label>
                                    <select name="motivo_pqr" id="motivo_pqr" data_url="{{ route('cargar_submotivos') }}"
                                        class="custom-select rounded-0">
                                        <option value="">--Seleccione--</option>
                                        @foreach ($tipo_pqr->motivos as $motivo)
                                            <option value="{{ $motivo->id }}">{{ $motivo->motivo }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 form-group"><label for="adquisicion">Lugar de adquisición del
                                        producto o servicio:</label>
                                    <select name="adquisicion" id="adquisicion" class="custom-select rounded-0">
                                        <option value="">--Seleccione--</option>
                                        <option value="">Sede física</option>
                                        <option value="">Página web</option>
                                        <option value="">APP</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 form-group"><label for="">Departamento:</label>
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
                                <div class="col-12 col-md-6 form-group"><label for="">Municipio:</label>
                                    <select class="custom-select rounded-0" name="municipio_id" id="municipio_id">
                                        <option value="">--Seleccione--</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 form-group">
                                    <label for="">Sede:</label>
                                    <select name="" id="" class="custom-select rounded-0">
                                        <option value="">--Seleccione--</option>
                                        <option value="">Ninguna</option>
                                        <option value="">Ninguna</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 form-group">
                                    <label for="tipo">¿Su PQR es sobre un producto o servicio?</label>
                                    <select name="tipo" id="tipo" class="custom-select rounded-0">
                                        <option value="Producto">Producto</option>
                                        <option value="Servicio">Servicio</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 form-group grupo_producto">
                                    <label for="">Categoria del producto</label>
                                    <select name="" id="" class="custom-select rounded-0">
                                        <option value="">--Seleccione--</option>
                                        <option value="">Celulares y Smartphones</option>
                                        <option value="">Tecnología</option>
                                        <option value="">Electrodomésticos</option>
                                        <option value="">Muebles</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 form-group grupo_producto">
                                    <label for="">Producto</label>
                                    <select name="" id="" class="custom-select rounded-0">
                                        <option value="">--Seleccione--</option>
                                        <option value="">Nunguno</option>
                                        <option value="">Nunguno</option>
                                        <option value="">Nunguno</option>
                                        <option value="">Nunguno</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 form-group grupo_producto">
                                    <label for="">Marca:</label>
                                    <select name="" id="" class="custom-select rounded-0">
                                        <option value="">--Seleccione--</option>
                                        <option value="">LG</option>
                                        <option value="">Samsung</option>
                                        <option value="">Sony</option>
                                        <option value="">Mabe</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 form-group grupo_producto">
                                    <label for="">Referencia:</label>
                                    <select name="" id="" class="custom-select rounded-0">
                                        <option value="">--Seleccione--</option>
                                        <option value="">Ninguna</option>
                                        <option value="">Ninguna</option>
                                        <option value="">Ninguna</option>
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 form-group"><label for="">No. Factura:</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="col-12 col-md-6 form-group">
                                    <label>Fecha de factura:</label>
                                    <div class="input-group">
                                        <input type="date" max="{{ date('Y-m-d') }}" name="" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 form-group d-none grupo_servicio">
                                    <label for="">Tipo de servicio:</label>
                                    <select name="" id="" class="custom-select rounded-0">
                                        <option value="">--Seleccione--</option>
                                        <option value="">Ninguna</option>
                                        <option value="">Ninguna</option>
                                        <option value="">Ninguna</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div id="peticiones" class="mt-5">
                                <div class="col-12 mb-4 d-flex justify-content-between flex-row">
                                    <h5><strong>Motivos- {{ $tipo_pqr->tipo }}</strong></h5>
                                    <button class="btn btn-success btn-xs btn-sombra pl-4 pr-4"><i
                                            class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Añadir
                                        categoría motivo</button>
                                </div>
                                <div class="row p-3" id="p1" style="border: 1px solid black; border-radius: 5px;">

                                    <div class="col-12 col-md-6 form-group">
                                        <label for="motivo_sub_id">Sub - Categoría Motivo</label>
                                        <select name="motivo_sub_id" id="motivo_sub_id" class="custom-select rounded-0">
                                            <option value="">--Seleccione--</option>
                                        </select>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="">Hechos</label>
                                        <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="col-12 form-group">
                                        <label for="">Justificación</label>
                                        <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="col-12 col-md-6 form-group">
                                        <label for="">Anexos o Pruebas</label>
                                        <input class="form-control" type="file">
                                    </div>
                                </div>
                            </div>
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
    <script src="{{ asset('js/intranet/usuarios/crear_pqr.js') }}"></script>
@endsection
<!-- ************************************************************* -->
