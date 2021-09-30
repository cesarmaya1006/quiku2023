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
    Parametros - Criterios
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    @include('intranet.funcionarios.menu.menu')
    <hr>
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>Listado de criterios</h5>
                </div>
                <div class="col-12 col-md-6 col-lg-6 text-md-right text-lg-right pl-2 pr-md-5 pr-lg-5">
                    <a href="{{ route('wiku_argcriterios-crear', ['id' => $argumento->id, 'wiku' => $wiku]) }}"
                        class="btn btn-success btn-xs text-center pl-3 pr-3 mr-4" style="font-size: 0.9em;"><i
                            class="fas fa-plus-circle mr-2"></i> Nuevo criterio</a>
                    <a href="{{ route('wiku_argumento-editar', ['id' => $argumento->id]) }}"
                        class="btn btn-primary btn-xs btn-sm text-center pl-3 pr-3" style="font-size: 0.9em;"><i
                            class="fas fa-reply mr-2"></i> Volver</a>
                </div>
            </div>
            <hr>
            <div class="row  d-flex justify-content-around" style="font-size: 0.8em;">
                <div class="col-12">
                    <table class="table table-striped table-hover table-sm display" id="tabla-data">
                        <thead class="thead-inverse">
                            <tr>
                                <th class="text-center">Autor(es)</th>
                                <th class="text-center" style="white-space:nowrap">Criterios jurídicos de aplicación</th>
                                <th class="text-center" style="white-space:nowrap">Criterios jurídicos que definen la no
                                    aplicación</th>
                                <th class="text-center">Notas de vigencia</th>
                                <th class="text-center">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($criterios as $criterio)
                                <tr>
                                    <td>{{ $criterio->autores }}</td>
                                    <td>{{ $criterio->criterio_si }}</td>
                                    <td>{{ $criterio->criterio_no }}</td>
                                    <td>{{ $criterio->notas }}</td>
                                    <td>
                                        <a href="{{ route('wiku_argcriterios-editar', ['id_criterios' => $criterio->id, 'id' => $argumento->id, 'wiku' => $wiku]) }}"
                                            class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                            <i class="fas fa-pen-square"></i>
                                        </a>
                                        <form action="{{ route('wiku_argcriterios-eliminar', ['id' => $criterio->id]) }}"
                                            class="d-inline form-eliminar" method="POST">
                                            @csrf @method("delete")
                                            <button type="submit" class="btn-accion-tabla eliminar tooltipsC"
                                                title="Eliminar este registro">
                                                <i class="fa fa-fw fa-trash text-danger"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/parametros/argcriterios.js') }}"></script>
@endsection
<!-- ************************************************************* -->
