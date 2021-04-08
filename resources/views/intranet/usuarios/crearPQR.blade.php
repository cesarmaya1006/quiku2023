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
                    <h3 class="card-title">Crear PQR</h3>
                </div>
                <form>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Tipo de PQR</label>
                                    <select name="" id="" class="custom-select rounded-0">
                                        <option value="">--Seleccione--</option>
                                        <option value="">Petición</option>
                                        <option value="">Queja</option>
                                        <option value="">Reclamo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Motivo de la PQR</label>
                                    <select name="" id="" class="custom-select rounded-0">
                                        <option value="">--Seleccione--</option>
                                        <option value="">Petición</option>
                                        <option value="">Retracto</option>
                                        <option value="">Queja por mal trato de un funcionario</option>
                                        <option value="">Queja por mal funcionamiento de página web o APP</option>
                                        <option value="">Queja por mal servicio</option>
                                        <option value="">Reclamo de garantía de un bien o servicio</option>
                                        <option value="">Reclamo por publicidad engañosa</option>
                                        <option value="">Reclamo por demora en entrega o prestación de un servicio
                                        </option>
                                        <option value="">Reclamo por haber recibido un producto o servicio incorrecto
                                        </option>
                                        <option value="">Reclamo por facturación y pago</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Lugar de adquisición del producto o servicio:</label>
                            <select name="" id="" class="custom-select rounded-0">
                                <option value="">--Seleccione--</option>
                                <option value="">Sede física</option>
                                <option value="">Página web</option>
                                <option value="">APP</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Departamento:</label>
                                    <select name="" id="" class="custom-select rounded-0">
                                        <option value="">--Seleccione--</option>
                                        <option value="">Bogotá</option>
                                        <option value="">Cundinamarca</option>
                                        <option value="">Antioquia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Municipio:</label>
                                    <select name="" id="" class="custom-select rounded-0">
                                        <option value="">--Seleccione--</option>
                                        <option value="">Mosquera</option>
                                        <option value="">Medellín</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Sede:</label>
                            <select name="" id="" class="custom-select rounded-0">
                                <option value="">--Seleccione--</option>
                                <option value="">Ninguna</option>
                                <option value="">Ninguna</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">¿Su PQR es sobre un producto o servicio?</label>
                            <select name="" id="" class="custom-select rounded-0">
                                <option value="">--Seleccione--</option>
                                <option value="">Producto</option>
                                <option value="">Servicio</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Categoria del producto</label>
                                    <select name="" id="" class="custom-select rounded-0">
                                        <option value="">--Seleccione--</option>
                                        <option value="">Celulares y Smartphones</option>
                                        <option value="">Tecnología</option>
                                        <option value="">Electrodomésticos</option>
                                        <option value="">Muebles</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Producto</label>
                                    <select name="" id="" class="custom-select rounded-0">
                                        <option value="">--Seleccione--</option>
                                        <option value="">Nunguno</option>
                                        <option value="">Nunguno</option>
                                        <option value="">Nunguno</option>
                                        <option value="">Nunguno</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Marca:</label>
                                    <select name="" id="" class="custom-select rounded-0">
                                        <option value="">--Seleccione--</option>
                                        <option value="">LG</option>
                                        <option value="">Samsung</option>
                                        <option value="">Sony</option>
                                        <option value="">Mabe</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Referencia:</label>
                                    <select name="" id="" class="custom-select rounded-0">
                                        <option value="">--Seleccione--</option>
                                        <option value="">Ninguna</option>
                                        <option value="">Ninguna</option>
                                        <option value="">Ninguna</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">No. Factura:</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Fecha de factura:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" data-inputmask-alias="datetime"
                                            data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Tipo de servicio:</label>
                            <select name="" id="" class="custom-select rounded-0">
                                <option value="">--Seleccione--</option>
                                <option value="">Ninguna</option>
                                <option value="">Ninguna</option>
                                <option value="">Ninguna</option>
                            </select>
                        </div>
                        <div class="list-group-item">
                            <div class="form-group">
                                <label for="">Petición / Queja / Reclamo</label>
                                <select name="" id="" class="custom-select rounded-0">
                                    <option value="">--Seleccione--</option>
                                    <option value="">Ninguna</option>
                                    <option value="">Ninguna</option>
                                    <option value="">Ninguna</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Hechos</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">Justificaciones</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">Anexos o Pruebas</label>
                                <input class="form-control" type="file">
                            </div>
                        </div>
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

@endsection
<!-- ************************************************************* -->