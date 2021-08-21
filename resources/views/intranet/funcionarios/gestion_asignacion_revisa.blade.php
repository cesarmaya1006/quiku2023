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
                        <h3 class="card-title">Gestión a PQR Número de radicado:
                            <strong>{{ $pqr->radicado }}</strong>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="rounded border p-2">
                            <h5 class="">Historial de respuesta </h5>
                            @if ($pqr->anexos)
                                <div class="row d-flex px-12 p-3">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-light" style="font-size: 0.8em;">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Fecha</th>
                                                    <th scope="col">Empleado</th>
                                                    <th scope="col">Tarea</th>
                                                    <th scope="col">Descarga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pqr->anexos as $anexo)
                                                    <tr>
                                                        <td>{{ $anexo->created_at }}</td>
                                                        <td class="text-justify">{{ $anexo->empleado->nombre1 }} {{ $anexo->empleado->apellido1 }}</td>
                                                        <td class="text-justify">{{ $anexo->tarea->tarea }}</td>
                                                        <td class="text-justify"><a href="{{ asset('documentos/tareas/' . $anexo->url) }}" target="_blank" rel="noopener noreferrer"><i class="fa fa-download" aria-hidden="true"></i></a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                            <hr>
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
                                            @foreach ($pqr->historialtareas as $historial)
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
                        <h5 class="mt-2">Revisa</h5>
                        <div class="col-12 d-flex row pqr-revisa">
                            <div class="container-mensaje-historial-tarea form-group col-12">
                                <label for="" class="">Agregar Historial</label>
                                <textarea class="form-control mensaje-historial-tarea" rows="3" placeholder="" required></textarea>
                            </div>
                            <div class="row d-flex px-12 p-3"> 
                                <div class="col-12 col-md-12 form-group d-flex">
                                    <button href="" class="btn btn-danger mx-2 px-4 btn-pqr-revisa-regresa" data_url="{{ route('historial_tarea_guardar') }}" data_url2="{{ route('cambiar_estado_tareas_guardar') }}" data_token="{{ csrf_token() }}">Regresar a proyecta</button>
                                    <button href="" class="btn btn-primary px-4 btn-pqr-revisa" data_url="{{ route('historial_tarea_guardar') }}" data_url2="{{ route('cambiar_estado_tareas_guardar') }}" data_token="{{ csrf_token() }}">Enviar a aprobación</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input class="id_tarea" id="id_tarea" name="id_tarea" type="hidden" value="3">
                    <input class="id_pqr" id="id_pqr" name="id_pqr" type="hidden" value="{{ $pqr->id }}">
                    <div class="card-footer d-flex justify-content-end">
                        <a href="{{ route('admin-index') }}" class="btn btn-danger mx-2 px-4">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/generar_pqr/gestion_asignacion_revisa.js') }}"></script>
@endsection
<!-- ************************************************************* -->
