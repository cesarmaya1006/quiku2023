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
                        <div class="col-12 rounded border mb-3 p-2">
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
                                @if($pqr->estadospqr_id < 6)
                                    <div class="col-12 col-md-6">
                                        Fecha estimada de respuesta:
                                        <strong>{{ date('Y-m-d', strtotime($pqr->fecha_generacion . '+ ' . $pqr->tiempo_limite . ' days')) }}</strong>
                                    </div>
                                @endif
                                <div class="col-12 col-md-6">
                                    Estado: <strong>{{ $pqr->estado->estado_usuario }}</strong>
                                </div>
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
                        <hr style="border-top: solid 4px black">
                        <?php $n_peticion = 0; ?>
                        @if ($pqr->prorroga_dias)
                            <div class="menu-card-prorroga menu-card d-none rounded border mb-3 p-2 ">
                                <div class="col-12 col-md-6">
                                    Días de prórroga: <strong>{{ $pqr->prorroga_dias }} </strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    <strong>
                                        <a href="{{ route('prorrogaPdf', ['id' => $pqr->id]) }}" target="_blank" rel="noopener noreferrer">
                                            <i class="fa fa-download" aria-hidden="true"></i>Descargar Radicado Prórroga</a>
                                    </strong>
                                </div>
                            </div>
                        @endif
                        @foreach ($pqr->peticiones as $peticion)
                            <?php $n_peticion++; ?>
                            <div class="col-12 rounded border mb-3 p-2 peticion_general">
                                <div class="menu-card-radicado menu-card">
                                    <div class="col-12">
                                        <h5>Petición {{ $n_peticion }}</h5>
                                    </div>
                                    <hr>
                                    @if($peticion->motivo_sub_id)
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Categoría Motivo:</strong> {{ $peticion->motivo->motivo->motivo }}</p>
                                            </div>
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Sub - Categoría Motivo:</strong> {{ $peticion->motivo->sub_motivo }}</p>
                                            </div>
                                            @if ($peticion->otro)
                                                <p class="text-justify"><strong>Otro:</strong> {{ $peticion->otro }}</p>
                                            @endif
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Solicitud:</strong> {{ $peticion->justificacion }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                    @endif
                                    @if($peticion->consulta)
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Consulta:</strong> {{ $peticion->consulta }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                    @endif
                                    @if($peticion->tiposolicitud)
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Tipo de solicitud:</strong> {{ $peticion->tiposolicitud }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Datos personales objeto de la solicitud:</strong> {{ $peticion->datossolicitud }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Descripción de la solicitud:</strong> {{ $peticion->descripcionsolicitud }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                    @endif
                                    @if($peticion->peticion)
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Tipo de petición:</strong> {{ $peticion->peticion }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Documento o información requerida:</strong> {{ $peticion->indentifiquedocinfo }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Justificacion:</strong> {{ $peticion->justificacion }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                    @endif
                                    @if($peticion->irregularidad)
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Tipo de irregularidad:</strong> {{ $peticion->irregularidad }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                    @endif
                                    @if($peticion->felicitacion)
                                        @if($peticion->nombre_funcionario)
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="text-justify"><strong>Nombre de funcionario:</strong> {{ $peticion->nombre_funcionario }}</p>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Felicitaciones:</strong> {{ $peticion->felicitacion }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                    @endif
                                    @if(sizeof($peticion->hechos))
                                        <div class="row">
                                            <div class="col-12">
                                                <h6>Hechos</h6>
                                            </div>
                                            <div class="col-12">
                                                <ul>
                                                    @foreach ($peticion->hechos as $hecho)
                                                        <li>
                                                            <p class="text-justify">{{ $hecho->hecho }}</p>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <br>
                                    @endif
                                    @if(sizeof($peticion->anexos))
                                        <div class="row">
                                            <div class="col-12">
                                                <h6>Anexos</h6>
                                            </div>
                                            <div class="col-12">
                                                <table class="table table-light" style="font-size: 0.8em;">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Titulo</th>
                                                            <th scope="col">Descripción</th>
                                                            <th scope="col">Descarga</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($peticion->anexos as $anexo)
                                                            <tr>
                                                                <td class="text-justify">{{ $anexo->titulo }}</td>
                                                                <td class="text-justify">{{ $anexo->descripcion }}</td>
                                                                <td><a href="{{ asset('documentos/pqr/' . $anexo->url) }}"
                                                                        target="_blank"
                                                                        rel="noopener noreferrer">Descargar</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <hr>
                                    @endif
                                </div>

                                @if(sizeOf($peticion->aclaraciones))
                                    <div class="row menu-card-aclaraciones menu-card">
                                        <div class="col-12">
                                            <h6>Aclaraciones</h6>
                                        </div>
                                        <div class="col-12 table-responsive">
                                            <table class="table table-light" style="font-size: 0.8em;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Fecha Sol Aclaración</th>
                                                        <th scope="col">Aclaracion</th>
                                                        <th scope="col">Fecha Resp.</th>
                                                        <th scope="col">Respuesta</th>
                                                        <th scope="col">Documento</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($peticion->aclaraciones as $aclaracion)
                                                        @if ($aclaracion->respuesta != '')
                                                            <tr>
                                                                <td>{{ $aclaracion->fecha }}</td>
                                                                <td class="text-justify">{{ $aclaracion->aclaracion }}</td>
                                                                <td>{{ $aclaracion->fecha_respuesta }}</td>
                                                                <td class="text-justify">{{ $aclaracion->respuesta }}</td>
                                                                @if ($aclaracion->anexos)
                                                                    <td>
                                                                        @foreach ($aclaracion->anexos as $anexo)
                                                                            <a href="{{ asset('documentos/respuestas/' . $anexo->url) }}"
                                                                                target="_blank"
                                                                                rel="noopener noreferrer">{{ $anexo->titulo }}</a>
                                                                        @endforeach
                                                                    </td>
                                                                @else
                                                                    <td>---</td>
                                                                @endif
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <hr class="mt-5">
                                        </div>
                                    </div>
                                @endif
                                @if (isset($peticion->respuesta->respuesta))
                                    <div class="menu-card-recursos menu-card">
                                        <div class="col-12 row mb-2">
                                            <div class="col-6">
                                                <h5>Respuesta petición</h5>
                                            </div>
                                        </div>
                                        <div class="col-12 form-group">
                                            <textarea type="text" class="form-control form-control-sm respuesta" disabled>{{ strip_tags($peticion->respuesta->respuesta) }}</textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    @if (sizeOf($peticion->respuesta->documentos))
                                        <div class="row respuestaAnexos">
                                            <div class="col-12">
                                                <div class="col-12">
                                                    <h6>Anexos respuesta petición</h6>
                                                </div>
                                                <div class="col-12 table-responsive">
                                                    <table class="table table-light"  style="font-size: 0.8em;" >
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Nombre</th>
                                                                <th scope="col">Descripción</th>
                                                                <th scope="col">Archivo</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($peticion->respuesta->documentos as $anexo)
                                                                <tr>
                                                                    <td class="text-justify">{{ $anexo->titulo }}
                                                                    </td>
                                                                    <td class="text-justify">
                                                                        {{ $anexo->descripcion }}
                                                                    </td>
                                                                    <td><a href="{{ asset('documentos/respuestas/' . $anexo->url) }}"
                                                                            target="_blank"
                                                                            rel="noopener noreferrer">Descargar</a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    @endif
                                 @endif
                                <br>
                                <div class="menu-card-recursos menu-card">
                                    @if (sizeOf($peticion->recursos))
                                        <div class="row card-recursos">
                                            <div class="col-12">
                                                <h6>Recursos</h6>
                                            </div>
                                            <div class="col-12 table-responsive">
                                                <table class="table table-light" style="font-size: 0.8em;">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Fecha recurso</th>
                                                            <th scope="col">Tipo de recurso</th>
                                                            <th scope="col">Recurso</th>
                                                            <th scope="col">Documentos recurso</th>
                                                            <th scope="col">Fecha respuesta recurso</th>
                                                            <th scope="col">Descripción</th>
                                                            <th scope="col">Documentos respuesta recurso</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($peticion->recursos as $recurso)
                                                            <tr>
                                                                <td>{{ $recurso->fecha_radicacion }}</td>
                                                                <td class="text-justify">{{ $recurso->tiporeposicion->tipo }}</td>
                                                                <td class="text-justify">{{ $recurso->recurso }}</td>
                                                                @if ($recurso->documentos)
                                                                    <td>
                                                                        @foreach ($recurso->documentos as $anexo)
                                                                            <a href="{{ asset('documentos/respuestas/' . $anexo->url) }}"
                                                                                target="_blank"
                                                                                rel="noopener noreferrer">{{ $anexo->titulo }}</a>
                                                                        @endforeach
                                                                    </td>
                                                                @else
                                                                    <td></td>
                                                                @endif
                                                                @if ($recurso->respuestarecurso)
                                                                    <td>{{ $recurso->respuestarecurso->fecha }}</td>
                                                                @else
                                                                    <td></td>
                                                                @endif
                                                                @if ($recurso->respuestarecurso)
                                                                    <td>{{ $recurso->respuestarecurso->respuesta }}</td>
                                                                @else
                                                                    <td></td>
                                                                @endif
                                                                <td>
                                                                    @if ($recurso->respuestarecurso)
                                                                        @foreach ($recurso->respuestarecurso->documentos as $anexoRespuesta)
                                                                            <a href="{{ asset('documentos/respuestas/' . $anexoRespuesta->url) }}"
                                                                                target="_blank"
                                                                                rel="noopener noreferrer">{{ $anexoRespuesta->titulo }}</a>
                                                                        @endforeach
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                @if(sizeOf($peticion->historialpeticiones))
                                    <hr>
                                    <h5 class="">Historial peticiones</h5>
                                    <div class="row d-flex px-12 p-3">
                                        <div class="col-12 table-responsive">
                                            <table class="table table-light" style="font-size: 0.8em;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Fecha</th>
                                                        <th scope="col">Empleado</th>
                                                        <th scope="col">Historial</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($peticion->historialpeticiones as $historial)
                                                        <tr>
                                                            <td>{{ $historial->created_at }}</td>
                                                            <td class="text-justify">{{ $historial->empleado->nombre1 }} {{ $historial->empleado->apellido1 }}</td>
                                                            <td class="text-justify">{{ strip_tags($historial->historial) }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div> 
                    @if (sizeOf($pqr->historialasignacion) )
                        <div class="rounded border m-3 p-2">
                            <h5 class="">Historial asignación</h5>
                            <div class="row d-flex px-12 p-3">
                                <div class="col-12 table-responsive">
                                    <table class="table table-light" style="font-size: 0.8em;">
                                        <thead>
                                            <tr>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Empleado</th>
                                                <th scope="col">Historial</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pqr->historialasignacion as $historial)
                                                <tr>
                                                    <td>{{ $historial->created_at }}</td>
                                                    <td class="text-justify">{{ $historial->empleado->nombre1 }} {{ $historial->empleado->apellido1 }}</td>
                                                    <td class="text-justify">{{ $historial->historial }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <div class="row d-flex px-12 p-3"> 
                                <div class="container-mensaje-historial form-group col-12">
                                    <label for="" class="">Agregar Historial</label>
                                    <textarea class="form-control" rows="3" placeholder="" name="mensaje-historial"
                                        id="mensaje-historial" required></textarea>
                                </div>
                                <div class="col-12 col-md-12 form-group d-flex">
                                    <button href="" class="btn btn-primary px-4" id="guardarHistorial" data_url="{{ route('historial_guardar') }}"
                                    data_token="{{ csrf_token() }}">Guardar historial</button>
                                </div>
                            </div>
                        </div>
                    @endif
                    <input class="id_pqr" id="id_pqr" name="id_pqr" type="hidden" value="{{ $pqr->id }}">
                    
                    @if ($pqr->estado_asignacion == 0)
                        <div class="rounded border m-3 p-2">
                            <h5 class="">Gestion asignación</h5>
                            <div class="row d-flex px-12 p-3"> 
                                <div class="col-12 col-md-5 form-group">
                                    <label for="">¿Acepta la asignación?</label>
                                    <select name="confirmacion-asignacion" id="confirmacion-asignacion" class="custom-select rounded-0" required="">
                                        <option value="1">Aceptar</option>
                                        <option value="0">Rechazar</option>
                                    </select>
                                </div>
                                <div class="container-mensaje-asigacion form-group col-10 d-none">
                                    <label for="" class="">Mensaje</label>
                                    <textarea class="form-control" rows="3" placeholder="" name="mensaje-asignacion"
                                        id="mensaje-asignacion" required></textarea>
                                </div>
                                <div class="col-12 col-md-3 form-group d-flex align-items-end">
                                    <button href="" class="btn btn-primary mx-2 px-4" id="guardarAsignacion" data_url="{{ route('asignacion_guardar') }}"
                                    data_token="{{ csrf_token() }}">Guardar</button>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($pqr->estado_asignacion)
                        <div class="rounded border m-3 p-2">
                            <h5 class="">Gestión tareas</h5>
                            <div class="col-12 table-responsive d-flex justify-content-center">
                                <table class="table table-light col-12" style="font-size: 0.8em;">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tarea</th>
                                            <th scope="col">Funcionario</th>
                                            <th scope="col">Fecha de asignación</th>
                                            <th scope="col">Estado Tarea</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pqr->asignaciontareas as $asignacion)
                                            <tr>
                                                <td>{{$asignacion->tarea->tarea}}</td>
                                                <td>{{$asignacion->empleado->nombre1}} {{$asignacion->empleado->apellido1}}</td>
                                                <td>{{$asignacion->created_at}}</td>
                                                <td>{{$asignacion->estadotarea->estado}} %</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <h5 class="">Asignación tareas</h5>
                            <div class="row d-flex px-4"> 
                                <div class="col-12 col-md-5 form-group">
                                    <label for="">Tarea</label>
                                    <select name="tarea" id="tarea" class="custom-select rounded-0" required="" data_url="{{ route('cargar_tareas') }}">                                    </select>
                                </div>
                                <div class="col-12 col-md-5 form-group">
                                    <label for="">Cargo</label>
                                    <select name="cargo" id="cargo" class="custom-select rounded-0" required="" data_url="{{ route('cargar_cargos') }}" data_url2="{{ route('cargar_funcionarios') }}">
                                    </select>
                                </div>
                                <div class="col-12 col-md-5 form-group">
                                    <label for="">Funcionario</label>
                                    <select name="funcionario" id="funcionario" class="custom-select rounded-0" required="">
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 form-group d-flex align-items-end">
                                    <button href="" class="btn btn-primary py-2 px-3" id="asignacion_tarea_guardar" data_url="{{ route('asignacion_tarea_guardar') }}"
                                    data_token="{{ csrf_token() }}">Guardar asignación</button>
                                </div>
                            </div>
                            {{-- @if (sizeOf($pqr->historialtareas)) --}}
                            <hr>
                            <h5 class="">Historial tareas</h5>
                                <div class="col-12 table-responsive">
                                    <table class="table table-light" style="font-size: 0.8em;">
                                        <thead>
                                            <tr>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Empleado</th>
                                                <th scope="col">Tarea</th>
                                                <th scope="col">Historial</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pqr->historialtareas as $historial)
                                                <tr>
                                                    <td>{{ $historial->created_at }}</td>
                                                    <td class="text-justify">{{ $historial->empleado->nombre1 }} {{ $historial->empleado->apellido1 }}</td>
                                                    @if($historial->tarea)
                                                        <td class="text-justify">{{ $historial->tarea->tarea }}</td>
                                                    @else
                                                        <td class="text-justify">ADMINISTRADOR</td>
                                                    @endif
                                                    <td class="text-justify">{{ $historial->historial }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <div class="row d-flex px-12 p-3"> 
                                    <div class="container-mensaje-historial-tarea form-group col-12">
                                        <label for="" class="">Agregar Historial</label>
                                        <textarea class="form-control" rows="3" placeholder="" name="mensaje-historia-tarea"
                                            id="mensaje-historial-tarea" required></textarea>
                                    </div>
                                    <div class="col-12 col-md-12 form-group d-flex align-items-end justify-content-end">
                                        <button href="" class="btn btn-primary mx-2 px-4" id="guardarHistorialTarea" data_url="{{ route('historial_tarea_guardar') }}"
                                        data_token="{{ csrf_token() }}">Guardar</button>
                                    </div>
                                </div>
                            {{-- @endif --}}

                            @if(sizeOf($pqr->anexos))   
                                <hr>
                                <div class="p-2 mb-4">
                                    <h5 class="">Historial de respuesta </h5>
                                    <div class="col-12 table-responsive">
                                        <table class="table table-light" style="font-size: 0.8em;">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Fecha</th>
                                                    <th scope="col">Empleado</th>
                                                    <th scope="col">Tarea</th>
                                                    <th scope="col">Tipo</th>
                                                    <th scope="col">Descarga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pqr->anexos as $anexo)
                                                    <tr>
                                                        <td>{{ $anexo->created_at }}</td>
                                                        <td class="text-justify">{{ $anexo->empleado->nombre1 }} {{ $anexo->empleado->apellido1 }}</td>
                                                        <td class="text-justify">{{ $anexo->tarea->tarea }}</td>
                                                        @if($anexo->tipo_respuesta == 0)
                                                            <td>Respuesta PQR</td>
                                                        @elseif($anexo->tipo_respuesta == 1)
                                                            <td>Respuesta aclaración</td>
                                                        @elseif($anexo->tipo_respuesta == 2)
                                                            <td>Respuesta reposición</td>
                                                        @elseif($anexo->tipo_respuesta == 3)
                                                            <td>Respuesta apelación</td>
                                                        @endif
                                                        <td class="text-justify"><a href="{{ asset('documentos/tareas/' . $anexo->url) }}" target="_blank" rel="noopener noreferrer"><i class="fa fa-download" aria-hidden="true"></i></a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <hr class="mt-5">
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif
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
    <script src="{{ asset('js/intranet/generar_pqr/gestion_asignacion.js') }}"></script>
@endsection
<!-- ************************************************************* -->
