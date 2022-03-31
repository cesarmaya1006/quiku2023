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
            <div class="col-12 col-md-11 d-flex align-items-stretch flex-column">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Gestión a Tutela Número de radicado:
                            <strong>{{ $tutela->radicado }}</strong>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="rounded border p-2">
                            @if ($tutela->estadostutela_id !== 6)
                                <h5 class="mb-3">Historial de respuesta </h5>
                                <strong>
                                    <a href="{{ route('respuesta_tutela', ['id' => $tutela->id]) }}" target="_blank" rel="noopener noreferrer">
                                        <i class="fas fa-eye"></i> Vista previa</a>
                                </strong>
                                <input class="tipo_respuesta" type="hidden" value="1">
                            @else
                                <h5 class="mb-3">Historial de respuesta sentencia 1° Instancia </h5>
                                <strong class="mx-2">
                                    <a href="{{ route('respuesta_sentencia_primera_instancia', ['id' => $tutela->id]) }}"
                                        target="_blank" rel="noopener noreferrer">
                                        <i class="fas fa-eye"></i> Vista previa</a>
                                </strong>
                                <input class="tipo_respuesta" type="hidden" value="2">
                            @endif
                        </div>
                        <div class="rounded border p-2 mt-5">
                            <h5 class="">Historial de tareas</h5>
                            <div class="row d-flex px-12 p-3">
                                <div class="col-12 table-responsive">
                                    <table class="table table-light" style="font-size: 0.8em;">
                                        <thead>
                                            <tr>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Tarea</th>
                                                <th scope="col">Empleado</th>
                                                <th scope="col">Historial</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tutela->historialtareas as $historial)
                                                <tr>
                                                    <td>{{ $historial->created_at }}</td>
                                                    @if($historial->tarea)
                                                        <td class="text-justify">{{ $historial->tarea->tarea }}</td>
                                                    @else
                                                        <td class="text-justify">ADMINISTRADOR</td>
                                                    @endif
                                                    <td class="text-justify">{{ $historial->empleado->nombre1 }} {{ $historial->empleado->apellido1 }}</td>
                                                    <td class="text-justify">{{ $historial->historial }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="rounded border m-3 p-2">
                        <h5 class="mt-2">Aprueba</h5>
                        <div class="m-3 p-2">
                            <div class="col-12 d-flex row aprueba">
                                <div class="container-mensaje-historial-tarea form-group col-12">
                                    <label for="" class="">Agregar Historial</label>
                                    <textarea class="form-control mensaje-historial-tarea" rows="3" placeholder="" required></textarea>
                                </div>
                                <div class="row d-flex px-12 p-2"> 
                                    <div class="col-12 col-md-12 form-group d-flex">
                                        <button href="" class="btn btn-danger px-4 btn-tutela-aprueba-regresa" data_url="{{ route('historial_tarea_tutela_guardar') }}" data_url2="{{ route('cambiar_estado_tareas_tutela_guardar') }}" data_token="{{ csrf_token() }}">Regresar a revisión</button>
                                        @if ($tutela->correo_juez)
                                            <button href="" class="btn btn-primary mx-2 px-4 btn-tutela-aprueba-radica" data_url="{{ route('tutela_respuesta_guardar') }}" data_url2="{{ route('historial_tarea_tutela_guardar') }}" data_url3="{{ route('cambiar_estado_tareas_tutela_guardar') }}" data_token="{{ csrf_token() }}">Aprobar y radicar</button>
                                        @else
                                            <button href="" class="btn btn-primary mx-2 px-4 btn-tutela-aprueba" data_url="{{ route('tutela_respuesta_guardar') }}" data_url2="{{ route('historial_tarea_tutela_guardar') }}" data_url3="{{ route('cambiar_estado_tareas_tutela_guardar') }}" data_token="{{ csrf_token() }}">Aprobar y enviar a radicar</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input class="id_tarea" type="hidden" value="4">
                    <input class="id_auto" type="hidden" value="{{ $tutela->id }}">
                    <div class="card-footer d-flex justify-content-end">
                        <a href="{{ route('tutela-gestion') }}" class="btn btn-danger mx-2 px-4">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/tutela/gestion_asignacion_revisa_aprueba.js') }}"></script>
@endsection
<!-- ************************************************************* -->
