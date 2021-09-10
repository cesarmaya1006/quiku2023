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
                        <div class="col-12 solicitud rounded border mb-3 p-2">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    @if ($pqr->persona_id != null)
                                        Persona que interpone la Petición:
                                        <strong>{{ $pqr->persona->nombre1 . ' ' . $pqr->persona->nombre2 . ' ' . $pqr->persona->apellido1 . ' ' . $pqr->persona->apellido2 }}</strong>
                                    @else
                                        Empresa que interpone la Petición:
                                        <strong>{{ $pqr->empresa->razon_social . ' ' . $pqr->empresa->razon_social . ' ' . $pqr->empresa->razon_social . ' ' . $pqr->empresa->razon_social }}</strong>
                                    @endif
                                </div>
                                @if ($pqr->adquisicion)
                                    <div class="col-12 col-md-6">
                                        Lugar de adquisición del producto o servicio:
                                        <strong>{{ $pqr->adquisicion }}</strong>
                                    </div>
                                @endif
                                @if ($pqr->tipo)
                                    <div class="col-12 col-md-6">
                                        Tipo petición: <strong>{{ $pqr->tipo }}</strong>
                                    </div>
                                @endif
                                @if ($pqr->sede)
                                    <div class="col-12 col-md-6">
                                        Departatmento :
                                        <strong>{{ $pqr->sede->municipio->departamento->departamento }}</strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        Municipio : <strong>{{ $pqr->sede->municipio->municipio }}</strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        Sede : <strong>{{ $pqr->sede->nombre }}</strong>
                                    </div>
                                @endif
                                @if ($pqr->tipo == 'Producto')
                                    <div class="col-12 col-md-6">
                                        Categoria :
                                        <strong>{{ $pqr->referencia->marca->producto->categoria->categoria }}</strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        producto : <strong>{{ $pqr->referencia->marca->producto->producto }}</strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        Marca : <strong>{{ $pqr->referencia->marca->marca }}</strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        Referencia : <strong>{{ $pqr->referencia->referencia }}</strong>
                                    </div>
                                @endif
                                @if($pqr->servicio)
                                    <div class="col-12 col-md-6">
                                        Servicio : <strong>{{ $pqr->servicio->servicio }}</strong>
                                    </div>
                                @endif
                                @if($pqr->factura)
                                    <div class="col-12 col-md-6">
                                        Número de factura: <strong>{{ $pqr->factura }}</strong>
                                    </div>
                                @endif
                                @if($pqr->fecha_factura)
                                    <div class="col-12 col-md-6">
                                        Fecha de factura: <strong>{{ $pqr->fecha_factura }}</strong>
                                    </div>
                                @endif
                                @if($pqr->fecha_radicado)
                                    <div class="col-12 col-md-6">
                                        Fecha de radicado: <strong>{{ $pqr->fecha_generacion }}</strong>
                                    </div>
                                @endif

                                <div class="col-12 col-md-6">
                                    Fecha estimada de respuesta:
                                    <strong>{{ date('Y-m-d', strtotime($pqr->fecha_generacion . '+ ' . $pqr->tiempo_limite . ' days')) }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Estado: <strong>{{ $pqr->estado->estado_usuario }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Prioridad: <strong>{{ $pqr->prioridad->prioridad }}</strong>
                                </div>
                                @if(!sizeOf($pqr->peticiones->where('recurso_dias', '0')))
                                    <div class="col-12 col-md-6">
                                        Procede recurso: <strong>Si</strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        Plazo días recurso: <strong>{{ $pqr->peticiones->max('recurso_dias') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @if ($pqr->persona_id)
                            @if (!$pqr->persona->email)
                                <div class="col-12 rounded border border-danger mb-4 p-3">
                                    <div class="row">
                                        <h6 class="text-danger pl-2">el usuario no posee correo electrónico se debe enviar correo físico.</h6>
                                        <div class="col-12 col-md-6">
                                            <strong>Nombre:</strong> {{ $pqr->persona->nombre1 . ' ' . $pqr->persona->nombre2 . ' ' . $pqr->persona->apellido1 . ' ' . $pqr->persona->apellido2 }}
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <strong>Teléfono:</strong> {{ $pqr->persona->telefono_celu }}
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <strong>Dirección:</strong> {{ $pqr->persona->direccion }}
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <strong>Departatmento:</strong> {{ $pqr->persona->municipio->departamento->departamento }}
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <strong>Ciudad:</strong> {{ $pqr->persona->municipio->municipio }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                        <div class="rounded border p-2">
                            <h5 class="">Respuesta </h5>
                            @if ($pqr->anexos)
                                @php
                                    $respuesta = $pqr->anexos->where('tareas_id', '4')->last();
                                @endphp
                                @if($respuesta)
                                    <div class="rounded border p-2 mt-3">
                                        @if ($respuesta->estado == 1)
                                            @if($respuesta->extension == 'pdf')
                                                <iframe src="{{ asset('documentos/tareas/' . $respuesta->url) }}" frameborder="0" class="col-12" height="600"></iframe>
                                            @else
                                                <div class="col-12 ">
                                                    <strong><a href="{{ asset('documentos/tareas/' . $respuesta->url) }}" target="_blank" rel="noopener noreferrer"><i class="fa fa-download" aria-hidden="true"></i>
                                                            Descargar Respuesta</a></strong>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                @endif
                            @endif
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
                        <h5 class="mt-2">Radica</h5>
                        <div class="col-12 d-flex row pqr-revisa">
                            <div class="container-mensaje-historial-tarea form-group col-12">
                                <label for="" class="">Agregar Historial</label>
                                <textarea class="form-control mensaje-historial-tarea" rows="3" placeholder="" required></textarea>
                            </div>
                            <div class="row d-flex px-12 p-3"> 
                                <div class="col-12 col-md-12 form-group d-flex">
                                    <button href="" class="btn btn-primary px-4 btn-pqr-radica" data_url="{{ route('historial_tarea_guardar') }}" data_url2="{{ route('cambiar_estado_tareas_guardar') }}" data_token="{{ csrf_token() }}">Radicar</button>
                                    {{-- <button href="" class="btn btn-danger mx-2 px-4 btn-pqr-revisa-regresa" data_url="{{ route('historial_tarea_guardar') }}" data_url2="{{ route('cambiar_estado_tareas_guardar') }}" data_token="{{ csrf_token() }}">Regresar a proyecta</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <input class="id_tarea" id="id_tarea" name="id_tarea" type="hidden" value="5">
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
    <script src="{{ asset('js/intranet/generar_pqr/gestion_asignacion_radica.js') }}"></script>
@endsection
<!-- ************************************************************* -->
