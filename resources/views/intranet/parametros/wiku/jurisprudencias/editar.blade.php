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
    Parametros - Fuentes Argumentos
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>Editar Argumento</h5>
                </div>
                <div class="col-12 col-md-6 col-lg-6 text-md-right text-lg-right pl-2 pr-md-5 pr-lg-5">
                    <a href="{{ route('wiku-index') }}" class="btn btn-success btn-xs btn-sm text-center pl-3 pr-3"
                        style="font-size: 0.9em;"><i class="fas fa-reply mr-2"></i> Volver</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('wiku_argumento-actualizar', ['id' => $argumento->id]) }}"
                        class="form-horizontal row" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="ror mb-3 mt-3">
                                <div class="col-12">
                                    <button type="submit"
                                        class="btn btn-primary btn-xs btn-sombra pl-4 pr-4">Actualizar</button>
                                </div>
                            </div>
                            @include('intranet.parametros.wiku.argumentos.formeditar')
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer"></div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h6>Datos de asociación (Opcional)</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-primary collapsed-card">
                        <div class="card-header">
                            <h6 class="card-title">Criterios Jurídicos</h6>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                                    <h6>Criterios Juridicos Asociados</h6>
                                </div>
                                <div class="col-12 col-md-6 text-md-right pl-2">
                                    <a href="{{ route('wiku_argcriterios-index', ['id' => $argumento->id, 'wiku' => 'argumento']) }}"
                                        class="btn btn-info btn-xs text-center pl-3 pr-3" style="font-size: 0.9em;"><i
                                            class="fas fa-plus-circle mr-2"></i> Asociar criterio
                                        jurídico</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" style="font-size: 0.8em;">
                                    <table class="table table-striped table-hover table-sm">
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th class="text-center">Autor (es)</th>
                                                <th class="text-center">Criterios jurídicos de aplicación</th>
                                                <th class="text-center">Criterios jurídicos que definen la no aplicación
                                                </th>
                                                <th class="text-center">Notas de vigencia</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($argumento->criterios as $criterio)
                                                <tr>
                                                    <td>{{ $criterio->autores }}</td>
                                                    <td>{{ $criterio->criterio_si }}</td>
                                                    <td>{{ $criterio->criterio_no }}</td>
                                                    <td>{{ $criterio->notas }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-primary collapsed-card">
                        <div class="card-header">
                            <h6 class="card-title">Palabras Claves</h6>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                                    <h6>Palabras claves asociadas</h6>
                                </div>
                                <div class="col-12 col-md-6 text-md-right pl-2">
                                    <a href="{{ route('wiku_palabras-index', ['id' => $argumento->id, 'wiku' => 'argumento']) }}"
                                        class="btn btn-info btn-xs text-center pl-3 pr-3" style="font-size: 0.9em;"><i
                                            class="fas fa-plus-circle mr-2"></i> Asociar palabra clave</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" style="font-size: 0.8em;">
                                    <ul>
                                        @if ($argumento->palabras->count() > 0)
                                            @foreach ($argumento->palabras as $palabra)
                                                <li>{{ $palabra->palabra }}</li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-primary collapsed-card">
                        <div class="card-header">
                            <h6 class="card-title">Parametros de asociación</h6>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                                    <h6>Asociaciones al sistema</h6>
                                </div>
                                <div class="col-12 col-md-6 text-md-right pl-2">
                                    <a href="{{ route('wiku_argasociacion-crear', ['id' => $argumento->id, 'wiku' => 'argumento']) }}"
                                        class="btn btn-info btn-xs text-center pl-3 pr-3" style="font-size: 0.9em;"><i
                                            class="fas fa-plus-circle mr-2"></i> Nueva Asociación</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" style="font-size: 0.8em;">
                                    <table class="table table-striped table-hover table-sm display" id="tabla-data">
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th class="text-center">Tipo de PQR</th>
                                                <th class="text-center">Motivo PQR</th>
                                                <th class="text-center">Sub-Motivo PQR</th>
                                                <th class="text-center">Producto/Servicio</th>
                                                <th class="text-center">Tipo de Servicio</th>
                                                <th class="text-center">Categoria</th>
                                                <th class="text-center">Producto</th>
                                                <th class="text-center">Marca</th>
                                                <th class="text-center">Referencia</th>
                                                <th class="text-center">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($argumento->asociaciones as $asociacion)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ count($asociacion->tipopqr) > 0 ? $asociacion->tipopqr[0]->tipo : '' }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ count($asociacion->motivo_pqr) > 0 ? $asociacion->motivo_pqr[0]->motivo : '' }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ count($asociacion->submotivo_pqr) > 0 ? $asociacion->submotivo_pqr[0]->sub_motivo : '' }}
                                                    </td>
                                                    <td class="text-center">{{ $asociacion->prodserv }}</td>
                                                    <td class="text-center">
                                                        {{ $asociacion->servicio_id ? $asociacion->servicio[0]->servicio : '---' }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $asociacion->categoria_id ? $asociacion->categoria[0]->categoria : '---' }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $asociacion->producto_id ? $asociacion->producto[0]->producto : '---' }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $asociacion->marca_id ? $asociacion->marca[0]->marca : '---' }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $asociacion->referencia_id ? $asociacion->referencia[0]->referencia : '---' }}
                                                    </td>
                                                    <td class="text-center">
                                                        <form
                                                            action="{{ route('wiku_argasociacion-eliminar', ['id' => $asociacion->id]) }}"
                                                            class="d-inline form-eliminar" method="POST">
                                                            @csrf @method("delete")
                                                            <button type="submit"
                                                                class="btn-accion-tabla eliminar tooltipsC"
                                                                title="Eliminar este registro"><i
                                                                    class="fa fa-times-circle text-danger"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modales -->
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="modalAutorInst" tabindex="-1" aria-labelledby="modalAutorInstLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAutorInstLabel">NUevo Autor Institucional</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-11 form-group">
                            <label class="requerido" for="institucion">Institución</label>
                            <input type="text" class="form-control form-control-sm" name="institucion" id="institucion"
                                aria-describedby="helpId" value="{{ old('institucion') }}" placeholder="" required>
                            <small id="helpId" class="form-text text-muted">Nombre de la institución</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data_url="{{ route('wiku_argumento-cargarautori') }}"
                        id="crearAutorInst" data-bs-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAutor" tabindex="-1" aria-labelledby="modalAutorLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAutorLabel">Nuevo Autor Institucional</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-11 form-group">
                            <label class="requerido" for="nombre1">Primer Nombre</label>
                            <input type="text" class="form-control form-control-sm" name="nombre1" id="nombre1"
                                aria-describedby="helpId" value="{{ old('nombre1') }}" placeholder="" required>
                        </div>
                        <div class="col-11 form-group">
                            <label for="nombre2">Segundo Nombre</label>
                            <input type="text" class="form-control form-control-sm" name="nombre2" id="nombre2"
                                aria-describedby="helpId" value="{{ old('nombre2') }}" placeholder="" required>
                        </div>
                        <div class="col-11 form-group">
                            <label class="requerido" for="apellido1">Primer Apellido</label>
                            <input type="text" class="form-control form-control-sm" name="apellido1" id="apellido1"
                                aria-describedby="helpId" value="{{ old('apellido1') }}" placeholder="" required>
                        </div>
                        <div class="col-11 form-group">
                            <label for="apellido2">Segundo Apellido</label>
                            <input type="text" class="form-control form-control-sm" name="apellido2" id="apellido2"
                                aria-describedby="helpId" value="{{ old('apellido2') }}" placeholder="" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data_url="{{ route('wiku_argumento-cargarautor') }}"
                        id="crearAutor" data-bs-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/parametros/argumentos.js') }}"></script>
    <script src="{{ asset('js/intranet/parametros/fuentes.js') }}"></script>
@endsection
<!-- ************************************************************* -->
