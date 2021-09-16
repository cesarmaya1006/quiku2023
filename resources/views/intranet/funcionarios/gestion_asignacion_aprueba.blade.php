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
                        <div class="rounded border p-2 mb-4">
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
                                                    {{-- <th scope="col">Estado</th> --}}
                                                    <th scope="col">Descarga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pqr->anexos as $anexo)
                                                    <tr>
                                                        <td>{{ $anexo->created_at }}</td>
                                                        <td class="text-justify">{{ $anexo->empleado->nombre1 }} {{ $anexo->empleado->apellido1 }}</td>
                                                        <td class="text-justify">{{ $anexo->tarea->tarea }}</td>
                                                        {{-- <td class="text-justify">{{ $anexo->estado ? 'Activo' : 'Rechazado'  }}</td> --}}
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
                        <div class="rounded border p-2">
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
                        @php
                            $recursoValidacion = 1;
                            if($pqr->peticiones->where('recurso','0')->count() == $pqr->peticiones->count()){
                                $recursoValidacion = 0;
                            }
                        @endphp
                        <div class="row px-4">
                            @if(!sizeOf($pqr->peticiones->where('recurso_dias', '0')))
                            <div class="col-12 col-md-6 mt-2">
                                <h6>Recurso</h6>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    Procede recurso: <strong>Si</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Plazo días recurso: <strong>{{ $pqr->peticiones->max('recurso_dias') }}</strong>
                                </div>
                            </div>
                            @else
                                <input class="respuestaRecurso" type="hidden" value="{{ $recursoValidacion }}">
                                <div class="col-12 col-md-6 mt-2">
                                    <h6>¿A las respuestas le procede recurso?</h6>
                                </div>
                                <div class="col-12 col-md-6 d-flex flex-row">
                                    <div class="form-check mb-3 mr-4">
                                        <input id="" name="recurso" type="radio" class="form-check-input recurso_check recurso_si" value="1"/>
                                        <label id="_label" class="form-check-label" for="">SI</label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input id="" name="recurso" type="radio" class="form-check-input recurso_check recurso_no" value="0"/>
                                        <label id="_label" class="form-check-label" for="">NO</label>
                                    </div>
                                </div>
                                <div class="col-12 row recurso-form">
                                    <div class="col-12 col-md-12 form-group">
                                        <label for="">Plazo recurso días hábiles:</label>
                                        <input type="number" class="form-control plazo_recurso col-12 col-md-6"
                                        name="plazo_recurso" id="plazo_recurso" min="0"
                                        max="{{$pqr->tipoPqr->tiempos}}">
                                    </div>
                                    <div class="col-12 col-md-6 mt-2">
                                        <h6>¿Le procede recurso de apelación?</h6>
                                    </div>
                                    <div class="col-12 col-md-6 d-flex flex-row">
                                        <div class="form-check mb-3 mr-4">
                                            <input id="" name="apelacion" type="radio" class="form-check-input apelacion_check apelacion_si" value="1"/>
                                            <label id="_label" class="form-check-label" for="">SI</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input id="" name="apelacion" type="radio" class="form-check-input apelacion_check apelacion_no" value="0" checked/>
                                            <label id="_label" class="form-check-label" for="">NO</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 form-group d-flex align-items-end mt-4">
                                        <button href="" class="btn btn-primary mx-2 px-4" id="plazo_recurso_guardar" data_url="{{ route('plazo_recurso_guardar') }}"
                                        data_token="{{ csrf_token() }}">Guardar plazo recurso</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="rounded border m-3 p-2">
                        <h5 class="mt-2">Aprueba</h5>
                        <div class="m-3 p-2">
                            <div class="col-12 d-flex row pqr-anexo">
                                <div class="my-2 col-12 d-flex justify-content-between">
                                    <h6>Documento de respuesta</h6>
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label for="titulo">Título anexo</label>
                                    <input type="text" class="titulo form-control form-control-sm">
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input type="text" class="descripcion form-control form-control-sm">
                                </div>
                                <div class="col-12 col-md-4 form-group">
                                    <label for="anexo">Anexo</label>
                                    <input class="anexo form-control form-control-sm" type="file">
                                </div>
                                <div class="container-mensaje-historial-tarea form-group col-12">
                                    <label for="" class="">Agregar Historial</label>
                                    <textarea class="form-control mensaje-historial-tarea" rows="3" placeholder="" required></textarea>
                                </div>
                                <div class="row d-flex px-12 p-3"> 
                                    <div class="col-12 col-md-12 form-group d-flex">
                                        <button href="" class="btn btn-danger px-4 btn-pqr-aprueba-regresa" data_url="{{ route('historial_tarea_guardar') }}" data_url2="{{ route('cambiar_estado_tareas_guardar') }}" data_token="{{ csrf_token() }}">Regresar a revisión</button>
                                        @if ($pqr->persona->email)
                                            <button href="" class="btn btn-primary mx-2 px-4 btn-pqr-aprueba-radica" data_url="{{ route('pqr_anexo_guardar') }}" data_url2="{{ route('historial_tarea_guardar') }}" data_url3="{{ route('cambiar_estado_tareas_guardar') }}" data_token="{{ csrf_token() }}">Aprobar y radicar</button>
                                        @else
                                            <button href="" class="btn btn-primary mx-2 px-4 btn-pqr-aprueba" data_url="{{ route('pqr_anexo_guardar') }}" data_url2="{{ route('historial_tarea_guardar') }}" data_url3="{{ route('cambiar_estado_tareas_guardar') }}" data_token="{{ csrf_token() }}">Aprobar y enviar a radicar</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input class="id_tarea" id="id_tarea" name="id_tarea" type="hidden" value="4">
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
    <script src="{{ asset('js/intranet/generar_pqr/gestion_asignacion_aprueba.js') }}"></script>
@endsection
<!-- ************************************************************* -->
