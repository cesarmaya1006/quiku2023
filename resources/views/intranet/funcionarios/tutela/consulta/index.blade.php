@extends("theme.back.plantilla")
<!-- ************************************************************* -->
<!-- Funciones php -->
@section('funciones_php')
    @include('includes.funciones_php')
@endsection
<!-- Pagina CSS -->
@section('estilosHojas')

@endsection
<!-- ************************************************************* -->
@section('tituloHoja')
    Tutelas - Consulta
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
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Consulta de tutelas en el sistema</h3>
                    </div>
                    <div class="card-body m-2">
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5>Sitema de busqueda</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-tutela-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-tutela" type="button" role="tab" aria-controls="nav-tutela"
                                            aria-selected="true">Por Tutelas</button>
                                        <button class="nav-link" id="nav-pqr-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-pqr" type="button" role="tab" aria-controls="nav-pqr"
                                            aria-selected="false">Por PQR</button>
                                        <button class="nav-link" id="nav-desacatos-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-desacatos" type="button" role="tab"
                                            aria-controls="nav-desacatos" aria-selected="false">Por Desacatos</button>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-tutela" role="tabpanel"
                                        aria-labelledby="nav-tutela-tab">
                                        <div class="row">
                                            <div class="col-12 col-md-6 pl-3 pr-3">
                                                <div class="form-group">
                                                    <label for="tipoBusqueda">Opción de busqueda</label>
                                                    <select id="tipoBusqueda" class="form-control form-control-sm"
                                                        name="tipoBusqueda">
                                                        <option>Número de radicado</option>
                                                        <option>Nombre o apellido del accionante</option>
                                                        <option>Documento de identidad del accionante</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 pl-3 pr-3" id="cajaRadicado">
                                                <div class="form-group">
                                                    <label for="numRadicado">Número de radicado</label>
                                                    <input class="form-control form-control-sm" type="text"
                                                        name="numRadicado" id="numRadicado">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 pl-3 pr-3 d-none" id="cajaNombres">
                                                <div class="form-group">
                                                    <label for="nombreApellidos">Nombres y/o Apellidos</label>
                                                    <input class="form-control form-control-sm" type="text"
                                                        name="nombreApellidos" id="nombreApellidos">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 pl-3 pr-3 d-none" id="cajaDocumento">
                                                <div class="row">
                                                    <div class="col-12 col-md-4 pl-3 pr-3">
                                                        <div class="form-group">
                                                            <label for="tipoDoc">Tipo de documento</label>
                                                            <select id="tipoDoc" class="form-control form-control-sm"
                                                                name="tipoDoc" id="tipoDoc">
                                                                <option value="1">Cédula de Ciudadanía</option>
                                                                <option value="2">Cédulade Extranjería</option>
                                                                <option value="3">Pasaporte</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-8 pl-3 pr-3">
                                                        <div class="form-group">
                                                            <label for="numDocumento">Número de documento</label>
                                                            <input class="form-control form-control-sm" type="text"
                                                                name="numDocumento" id="numDocumento">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-sm btn-sombra pl-5 pr-5"
                                                    data_url="{{ route('cargar_tutelas') }}" id="botonBuscar">Realizar
                                                    Busqueda</button>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mt-5">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-striped table-hover table-sm display">
                                                    <thead class="thead-inverse">
                                                        <tr>
                                                            <th class="text-center" style="white-space:nowrap">Número de
                                                                radicado</th>
                                                            <th class="text-center" style="white-space:nowrap">Nombres y
                                                                apellidos del accionante
                                                            </th>
                                                            <th class="text-center" style="white-space:nowrap">Tipo de
                                                                documento de identificación
                                                            </th>
                                                            <th class="text-center" style="white-space:nowrap">Número de
                                                                identificación</th>
                                                            <th class="text-center" style="white-space:nowrap">Fecha de
                                                                radicado</th>
                                                            <th class="text-center" style="white-space:nowrap">Juzgado
                                                            </th>
                                                            <th class="text-center" style="white-space:nowrap">Tiempo
                                                                Terminos</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="contenidoTabla">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-pqr" role="tabpanel" aria-labelledby="nav-pqr-tab">2
                                    </div>
                                    <div class="tab-pane fade" id="nav-desacatos" role="tabpanel"
                                        aria-labelledby="nav-desacatos-tab">3</div>
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
    <script src="{{ asset('js/intranet/tutela/busqueda.js') }}"></script>
@endsection
<!-- ************************************************************* -->
