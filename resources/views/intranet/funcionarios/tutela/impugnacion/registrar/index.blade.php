@extends("theme.back.plantilla")
<!-- ************************************************************* -->
<!-- Funciones php -->
@section('funciones_php')
    @include('includes.funciones_php')
@endsection
<!-- Pagina CSS -->
@section('estilosHojas')
    <link rel="stylesheet" href="{{ asset('css/intranet/index.css') }}">
    <style>
        .loader {
            background-color: rgb(249, 249, 249);
        }

    </style>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
<!-- ************************************************************* -->
@section('tituloHoja')
    {{-- Sistema de informaci&oacute;n PQR LEGAL PROCEEDINGS --}}
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="loader" id="cargando"><img class="img-fluid" src="{{ asset('imagenes/sistema/cargando.gif') }}"
            alt="">
    </div>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8">
                @include('includes.error-form')
                @include('includes.mensaje')
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-11 d-flex align-items-stretch flex-column">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tutela con número de radicado:
                            <strong>{{ $tutela->radicado }}</strong> - <strong>Registro de Impugnación</strong>
                        </h3>
                    </div>
                    @php
                        $primeraInstancia = $tutela->primeraInstancia;
                    @endphp
                    <div class="card-body">
                        <div class="row mt-3 mb-3">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-10">
                                        <h5>Impugnaciones externas registradas</h5>
                                    </div>
                                    <div class="col-2 text-center">
                                        <a href="#" class="btn-accion-tabla tooltipsC text-info mr-4" id="nuevaImpugnacion"
                                            title="Editar">
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Resuelves Primera Instancia</th>
                                            <th>Accionantes / Acionados</th>
                                            <th>Archivo de Impugnación</th>
                                            <th>Descripción</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cuerpoTabla">
                                        @php
                                            $idImpugnacion = 0;
                                        @endphp
                                        @foreach ($primeraInstancia->resuelvesPrimeraInstancia as $resuelve)
                                            @if ($resuelve->impugnacionexterna->count() > 0)
                                                @foreach ($resuelve->impugnacionexterna as $impugnacionexterna)
                                                    @if ($idImpugnacion != $impugnacionexterna->id)
                                                        @php
                                                            $idImpugnacion = $impugnacionexterna->id;
                                                        @endphp
                                                        <tr>
                                                            <td>
                                                                @foreach ($impugnacionexterna->resuelves as $resuelvePrimeraInts)
                                                                    <p># {{ $resuelvePrimeraInts->numeracion }}</p>
                                                                @endforeach

                                                            </td>
                                                            <td>
                                                                @foreach ($impugnacionexterna->accion as $accionante)
                                                                    <p>{{ $accionante->nombres_accion . ' ' . $accionante->apellidos_accion }}
                                                                    </p>
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                <a href="{{ asset('documentos/tutelas/sentencias/' . $impugnacionexterna->url) }}"
                                                                    target="_blank" rel="noopener noreferrer">Descargar</a>
                                                            </td>
                                                            <td>{{ $impugnacionexterna->descripcion }}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ route('tutelas_impugnacion', ['id' => $tutela->id]) }}"
                                    class="btn btn-danger btn-sm btn-sombra mx-2 px-4 float-end">Regresar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="impugnacionModal" tabindex="-1" aria-labelledby="impugnacionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="impugnacionModalLabel">Registro Impugnación de accionantes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="row mt-3 mb-3">
                                <div class="col-12">
                                    <h5>Lista de resuelves en primera instancia</h5>
                                </div>
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th>Numeracion</th>
                                                <th>Sentido</th>
                                                <th>Resuelve</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($primeraInstancia->resuelvesPrimeraInstancia as $resuelve)
                                                <tr>
                                                    <td scope="row">
                                                        {{ $resuelve->numeracion }}
                                                    </td>
                                                    <td>{{ $resuelve->sentido }}</td>
                                                    @if ($resuelve->resuelve != null)
                                                        <td>{{ $resuelve->resuelve }}</td>
                                                    @else
                                                        <td>Registrado por cantidad</td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">

                        </div>
                    </div>
                    <form action="" id="form_nuevodoc" class="form-horizontal" autocomplete="off"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('post')
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 col-md-3 mb-2">
                                        <select id="acionanteaccionado" class="form-control form-control-sm">
                                            <option value="accionante">Accionante</option>
                                            <option value="accionado">Acionado</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    @php
                                        $accionantes = $tutela->accions->where('tipo_accion_id', '1');
                                        $accionados = $tutela->accions->where('tipo_accion_id', '2');
                                    @endphp
                                    <div class="col-12 col-md-4" id="cajaAccionante">
                                        <div class="row">
                                            <div class="col-12">
                                                <h6><label class="requerido"> Accionantes</label></h6>
                                            </div>
                                            <hr>
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input check-todos-accionantes"
                                                        name="accionantes" value="todosAccionantes">
                                                    <label class="form-check-label"><strong>Seleccionar todos los
                                                            accionantes</strong></label>
                                                </div>
                                            </div>
                                            @foreach ($accionantes as $accionante)
                                                <div class="col-12">
                                                    <div class="form-check mb-4">
                                                        <input type="checkbox" class="form-check-input select-accionantes"
                                                            name="accionantes" value="{{ $accionante->id }}">
                                                        <label
                                                            class="form-check-label">{{ $accionante->nombres_accion . ' ' . $accionante->apellidos_accion }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @if ($accionados->count() > 0)
                                        <div class="col-12 col-md-4" id="cajaAccionado">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h6><label class="requerido"> Accionados</label></h6>
                                                </div>
                                                <hr>
                                                <div class="col-12">
                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                            class="form-check-input check-todos-accionados"
                                                            name="accionados" value="todosAccionados">
                                                        <label class="form-check-label"><strong>Seleccionar todos los
                                                                accionados</strong></label>
                                                    </div>
                                                </div>
                                                @foreach ($accionados as $accionado)
                                                    <div class="col-12">
                                                        <div class="form-check mb-4">
                                                            <input type="checkbox"
                                                                class="form-check-input select-accionados" name="accionados"
                                                                value="{{ $accionado->id }}">
                                                            <label
                                                                class="form-check-label">{{ $accionado->nombres_accion . ' ' . $accionado->apellidos_accion }}</label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-4 pr-5">
                                        <div class="row">
                                            <div class="col-12">
                                                <h6><label class="requerido"> Resuelves en primera
                                                        instancia</label></h6>
                                            </div>
                                            <hr>
                                            <div class="col-12">
                                                <div class="row d-flex px-4">
                                                    <div class="col-12 form-group">
                                                        <div class="form-check mb-1">
                                                            <input type="checkbox"
                                                                class="form-check-input check-todos-resuelves"
                                                                name="resuelve" value="todosResuelves">
                                                            <label class="form-check-label"><strong>Seleccionar todos
                                                                    los
                                                                    resuelve</strong></label>
                                                        </div>
                                                        @foreach ($primeraInstancia->resuelvesPrimeraInstancia as $resuelve)
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox"
                                                                    class="form-check-input select-resuelve" name="resuelve"
                                                                    value="{{ $resuelve->id }}">
                                                                <label class="form-check-label"><strong>#
                                                                        {{ $resuelve->numeracion }}</strong></label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 form-group">
                                <label class="requerido" for="sentencia">Archivo Impugnación</label>
                                <input class="form-control form-control-sm" type="file" accept="application/pdf"
                                    id="url_sentencia" name="url_sentencia" required>
                            </div>
                            <div class="col-12 col-md-6 form-group">
                                <label for="resuelve">Descripción impugnación registrada</label>
                                <input type="text" class="form-control form-control-sm" name="resuelve" id="resuelve">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm btn-sombra" id="guardarImpugnacion"
                        data_url="{{ route('tutelas_impugnacion_guardar')}}"
                        data_id="{{$tutela->id}}"
                        data_archivos="{{ asset('documentos/tutelas/sentencias/') }}">Registrar
                        Impugnación</button>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/tutela/inpugnacion.js') }}"></script>
@endsection
<!-- ************************************************************* -->
