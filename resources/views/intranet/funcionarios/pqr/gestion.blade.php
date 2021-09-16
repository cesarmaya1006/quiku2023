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
    @php
    $recursoValidacion = 0;
    $plazoRecurso = 0;
    @endphp
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
                        <h3 class="card-title">Gestión a Petición Número de radicado:
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
                                @if($pqr->adquisicion)
                                    <div class="col-12 col-md-6">
                                        Lugar de adquisición del producto o servicio:
                                        <strong>{{ $pqr->adquisicion }}</strong>
                                    </div>
                                @endif
                                <div class="col-12 col-md-6">
                                    Tipo pqr: <strong>{{ $pqr->tipoPqr->tipo }}</strong>
                                </div>
                                @if ($pqr->sede_id)
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
                                @elseif($pqr->servicio_id)
                                    <div class="col-12 col-md-6">
                                        Servicio : <strong>{{ $pqr->servicio->servicio }}</strong>
                                    </div>
                                @endif
                                @if($pqr->factura)
                                    <div class="col-12 col-md-6">
                                        Número de factura: <strong>{{ $pqr->factura }}</strong>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        Fecha de factura: <strong>{{ $pqr->fecha_factura }}</strong>
                                    </div>
                                @endif
                                @if($pqr->prorroga)
                                    <div class="col-12 col-md-6">
                                        Plazo de respuesta prórroga días hábiles:
                                        <strong>{{ $pqr->prorroga_dias }}</strong>
                                    </div>
                                @endif
                                <div class="col-12 col-md-6">
                                    Fecha de radicado: <strong>{{ $pqr->fecha_generacion }}</strong>
                                </div>
                                @if($pqr->estadospqr_id < 6)
                                    <div class="col-12 col-md-6">
                                        Fecha estimada de respuesta:
                                        <strong>{{ date('Y-m-d', strtotime($pqr->fecha_generacion . '+ ' . $pqr->tiempo_limite . ' days')) }}</strong>
                                    </div>
                                @endif
                                <div class="col-12 col-md-6">
                                    Estado: <strong>{{ $pqr->estado->estado_funcionario }}</strong>
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
                        @foreach ($pqr->peticiones as $key => $peticion)
                        <div class="col-12 peticion_general rounded border mb-3 p-3">
                                {{-- Inicio reasignacion petición --}}
                                @if (session('id_usuario') == $peticion->empleado_id)
                                    <div class="row form-reasignarPeticion">
                                        <div class="col-12 col-md-6 ">
                                            <h5>Reasignar Petición</h5>
                                        </div>
                                        <div class="col-12 col-md-6 d-flex flex-row">
                                            <div class="form-check mb-3 mr-4">
                                                <input type="radio" name='reasignarPeticion{{$key}}' class="form-check-input reasignarPeticion reasignarPeticion_si" value="1" />
                                                <label class="form-check-label" for="" >SI</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input type="radio" name="reasignarPeticion{{$key}}" class="form-check-input reasignarPeticion reasignarPeticion_no" checked value="0" />
                                                <label class="form-check-label" for="" >NO</label>
                                            </div>
                                        </div>
                                        <div class="col-12 contentReasignacion d-none" id="contentReasignacion">
                                            <div class="row d-flex px-4"> 
                                                <div class="col-12 col-md-5 form-group">
                                                    <label for="">Cargo</label>
                                                    <select class="cargo custom-select rounded-0" required="" data_url="{{ route('cargar_cargos') }}" data_url2="{{ route('cargar_funcionarios') }}">
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-5 form-group">
                                                    <label for="">Funcionario</label>
                                                    <select class="funcionario custom-select rounded-0" required="">
                                                    </select>
                                                </div>
                                                <div class="container-mensaje-historial-peticion form-group col-12">
                                                    <label for="" class="">Agregar Historial</label>
                                                    <textarea class="form-control mensaje-historial-peticion" name="container-mensaje-historial-tarea" rows="3" placeholder="" required></textarea>
                                                </div>
                                                <div class="col-12 col-md-2 form-group d-flex align-items-end">
                                                    <button href="" class="btn btn-primary mx-2 px-4 reasignacion_peticion_guardar" data_url="{{ route('asignacion_peticion_guardar') }}"
                                                    data_token="{{ csrf_token() }}"  data_url2="{{ route('historial_peticion_guardar') }}">Asignar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="border-top: solid 4px black">
                                @endif
                                {{-- Fin reasignacion petición --}}
                                {{-- Inicio datos petición --}}
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h5>Petición #{{ $key + 1 }}</h5>
                                                            </div>
                                                        </div>
                                                        @if($peticion->motivo)
                                                            <div class="col-12 mt-2">
                                                                <h6>Categoría Motivo:</h6>
                                                                {{ $peticion->motivo->motivo->motivo }}
                                                            </div>
                                                            <div class="col-12 mt-2">
                                                                <h6>Sub - Categoría Motivo:</h6>
                                                                {{ $peticion->motivo->sub_motivo }}
                                                            </div>
                                                        @endif
                                                        @if ($peticion->otro)
                                                            <p class="text-justify"><strong>Otro:</strong> {{ $peticion->otro }}</p>
                                                        @endif
                                                        @if ($peticion->peticion)
                                                            <div class="row mt-2">
                                                                <h6>Petición:</h6>
                                                                <div class="col-12 text-justify">
                                                                    {{ $peticion->peticion }}</div>
                                                            </div>
                                                        @endif
                                                        @if ($peticion->indentifiquedocinfo)
                                                            <div class="row mt-2">
                                                                <h6>Documento o información requerida:</h6>
                                                                <div class="col-12 text-justify">
                                                                    {{ $peticion->indentifiquedocinfo }}</div>
                                                            </div>
                                                        @endif
                                                        @if ($peticion->justificacion)
                                                            <div class="row mt-2">
                                                                <h6>Justificacion:</h6>
                                                                <div class="col-12 text-justify pl-3">
                                                                    {{ $peticion->justificacion }}</div>
                                                            </div>
                                                        @endif
                                                        @if ($peticion->tiposolicitud)
                                                            <div class="row mt-2">
                                                                <h6>Tipo de solicitud:</h6>
                                                                <div class="col-12 text-justify">
                                                                    {{ $peticion->tiposolicitud }}</div>
                                                            </div>
                                                        @endif
                                                        @if ($peticion->datossolicitud)
                                                            <div class="row mt-2">
                                                                <h6>Datos personales objeto de la solicitud :</h6>
                                                                <div class="col-12 text-justify">
                                                                    {{ $peticion->datossolicitud }}</div>
                                                            </div>
                                                        @endif
                                                        @if ($peticion->descripcionsolicitud)
                                                            <div class="row mt-2">
                                                                <h6>Descripción de la solicitud:</h6>
                                                                <div class="col-12 text-justify">
                                                                    {{ $peticion->descripcionsolicitud }}</div>
                                                            </div>
                                                        @endif
                                                        @if ($peticion->consulta)
                                                            <div class="row mt-2">
                                                                <h6>Concepto u opinión:</h6>
                                                                <div class="col-12 text-justify">
                                                                    {{ $peticion->consulta }}</div>
                                                            </div>
                                                        @endif
                                                        @if ($peticion->irregularidad)
                                                            <div class="row mt-2">
                                                                <h6>Tipo de irregularidad:</h6>
                                                                <div class="col-12 text-justify">
                                                                    {{ $peticion->irregularidad }}</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Fin datos petición --}}
                                {{-- Inicio bloque de anexos --}}
                                @if(sizeOf($peticion->anexos))
                                    <hr>
                                    <div class="row">
                                        <div class="col-12">
                                            <h6>Anexos</h6>
                                        </div>
                                        <div class="col-12">
                                            <table class="table table-light">
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
                                @endif
                                {{-- Fin bloque de anexos --}}
                                {{-- Inicio bloque de hechos --}}
                                @if(sizeOf($peticion->hechos))
                                    <hr>
                                    <div class="row">
                                        <div class="col-12">
                                            <h6>Hechos</h6>
                                        </div>
                                        <div class="col-12">
                                            <table class="table table-light">
                                                <tbody>
                                                    @foreach ($peticion->hechos as $hecho)
                                                        <tr>
                                                            <td class="text-justify">{{ $hecho->hecho }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif
                                {{-- Fin bloque de hechos --}}
                                {{-- Incio bloque de Aclaraciones --}}
                                @if(sizeOf($peticion->aclaraciones))
                                    <hr>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Fecha</th>
                                                            <th scope="col">Aclaración</th>
                                                            <th scope="col">Solicitud</th>
                                                            <th scope="col">Fecha Respuesta</th>
                                                            <th scope="col">Respuesta</th>
                                                            <th scope="col">Anexos Respuesta</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($peticion->aclaraciones as $aclaracion)
                                                            <tr>
                                                                <th scope="row">{{ $aclaracion->fecha }}</th>
                                                                <td class="text-justify">
                                                                    {{ $aclaracion->tipo_solicitud }}</td>
                                                                <td class="text-justify">
                                                                    {{ $aclaracion->aclaracion }}</td>
                                                                <td>{{ $aclaracion->fecha_respuesta }}</td>
                                                                <td class="text-justify">
                                                                    {{ $aclaracion->respuesta }}</td>
                                                                <td>
                                                                    @foreach ($aclaracion->anexos as $anexo)
                                                                        <a href="{{ asset('documentos/respuestas/' . $anexo->url) }}"
                                                                            target="_blank"
                                                                            rel="noopener noreferrer">{{ $anexo->titulo }}</a>
                                                                    @endforeach
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (session('id_usuario') == $peticion->empleado_id)
                                    <hr>
                                    <div class="row">
                                        <input class="respuestaAclaracion" type="hidden"
                                            value="{{ sizeOf($peticion->aclaraciones) }}">
                                        <div class="col-12 col-md-6">
                                            <h6>Aclaraciones</h6>
                                        </div>
                                        @if ($pqr->estadospqr_id < 6)
                                            <div class="col-12 col-md-6 d-flex flex-row">
                                                <div class="form-check mb-3 mr-4">
                                                    <input type="radio"
                                                        class="form-check-input aclaracion_check aclaracion_check_si"
                                                        value="1" name="aclaracion{{$key}}" />
                                                    <label class="form-check-label" for="">SI</label>
                                                </div>
                                                <div class="form-check mb-3">
                                                    <input type="radio"
                                                        class="form-check-input aclaracion_check aclaracion_check_no"
                                                        value="0" name="aclaracion{{$key}}"/>
                                                    <label class="form-check-label" for="">NO</label>
                                                </div>
                                            </div>
                                        @endif

                                        @if ($pqr->estadospqr_id < 6)
                                            <div class="col-12">
                                                <div class="col-12 aclaracion mb-3">
                                                    <div class="form-group col-12 mt-2 titulo-aclaracion">
                                                        <div class="col-12 d-flex justify-content-between mb-2">
                                                            <label for="">Aclaración</label>
                                                        </div>
                                                        <select class="custom-select rounded-0 tipo_aclaracion">
                                                            <option value="">--Seleccione--</option>
                                                            <option value="Aclaración">Aclaración</option>
                                                            <option value="Complementación">Complementación</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-12">
                                                        <label for="">Solicitud</label>
                                                        <input class="form-control solicitud_aclaracion" type="text">
                                                    </div>
                                                    <button type="" class="btn btn-primary px-4 btn-aclaracion"
                                                        data_url="{{ route('aclaracion_guardar') }}"
                                                        data_token="{{ csrf_token() }}">Guardar aclaración</button>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                                    {{-- Fin bloque de Aclaraciones --}}
                                    {{-- Inicio bloque de respuesta peticion --}}
                                @if (session('id_usuario') == $peticion->empleado_id)
                                    <hr>
                                    <div class="row respuesta-peticion">
                                        <div class="col-12 row mb-2">
                                            <div class="col-6">
                                                <h5>Respuesta petición</h5>
                                            </div>
                                            @if ($pqr->estadospqr_id < 6)
                                                <div class="col-6 row estado-peticion">
                                                    <div class="col-2 d-flex mb-2">
                                                        <h6>Avance:</h6>
                                                    </div>
                                                    <select class="custom-select rounded-0 estadoPeticion col-4">
                                                        @foreach ($estados as $estado)
                                                            <option value="{{ $estado->id }}"
                                                            {{ $peticion->estadopeticion->id == $estado->id ? 'selected' : '' }}>
                                                            {{ $estado->estado }} %</option>
                                                        @endforeach
                                                    </select>
                                                    <button type="" class="btn btn-primary btn-estado col-2 mx-2"
                                                        data_url="{{ route('estado_guardar') }}"
                                                        data_token="{{ csrf_token() }}"><span style="font-size: 1em;"><i class="far fa-save"></i></span></button>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-12 form-group">
                                            @if ($peticion->estadopeticion->estado == 100 || sizeOf($peticion->recursos))
                                                <textarea type="text" class="form-control form-control-sm respuesta" rows="6" disabled>{{ isset($peticion->respuesta->respuesta) ? $peticion->respuesta->respuesta : '' }}</textarea>
                                            @else
                                                <textarea type="text" class="form-control form-control-sm respuesta" rows="6" max>{{ isset($peticion->respuesta->respuesta) ? $peticion->respuesta->respuesta : '' }}</textarea>
                                            @endif
                                            @if(isset($peticion->respuesta->respuesta))
                                                <input class="respuesta_anterior" type="hidden" value="{{ $peticion->respuesta->respuesta }}" data_url="{{ route('historial_peticion_guardar') }}">
                                            @endif
                                        </div>
                                        @if($peticion->estadopeticion->estado != 100 && !sizeOf($peticion->recursos))
                                            <div class="col-12 anexosConsulta">
                                                <div class="col-12 d-flex row anexoconsulta">
                                                    <div class="col-12 titulo-anexo d-flex justify-content-between">
                                                        <h6>Anexo</h6>
                                                        <button type="button"
                                                            class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminaranexoConsulta"><i
                                                                class="fas fa-minus-circle"></i> Eliminar anexo</button>
                                                    </div>
                                                    <div class="col-12 col-md-4 form-group titulo-anexoConsulta">
                                                        <label for="titulo">Título anexo</label>
                                                        <input type="text" class="titulo form-control form-control-sm">
                                                    </div>
                                                    <div class="col-12 col-md-4 form-group descripcion-anexoConsulta">
                                                        <label for="descripcion">Descripción</label>
                                                        <input type="text" class="descripcion form-control form-control-sm">
                                                    </div>
                                                    <div class="col-12 col-md-4 form-group doc-anexoConsulta">
                                                        <label for="documento">Anexos o Pruebas</label>
                                                        <input class="documento form-control form-control-sm" type="file">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end flex-row mb-3">
                                                <button class="btn btn-success btn-xs btn-sombra pl-2 pr-2 crearAnexo"
                                                    id="crearAnexo"><i class="fa fa-plus-circle mr-2"
                                                        aria-hidden="true"></i>
                                                    Añadir
                                                    otro Anexo</button>
                                            </div>
                                            <button type="" class="btn btn-primary mx-2 btn-respuesta col-md-3 col-12"
                                                data_url="{{ route('respuesta_guardar') }}" data_url2="{{ route('respuesta_anexo_guardar') }}"
                                                data_token="{{ csrf_token() }}">Guardar respuesta</button>
                                        @endif
                                        @if (isset($peticion->respuesta))
                                            @if (sizeOf($peticion->respuesta->documentos))
                                                <hr class="my-4">
                                                <div class="row respuestaAnexos">
                                                    <div class="col-12">
                                                        <div class="col-12">
                                                            <h6>Anexos respuesta petición</h6>
                                                        </div>
                                                        <div class="col-12 table-responsive">
                                                            <table class="table table-light" style="font-size: 0.8em;" >
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
                                            @endif
                                        @endif
                                    </div>
                                @endif
                                {{-- Fin bloque de respuesta peticion --}}
                                {{-- Inicio bloque de respuesta recurso --}}
                                @if (session('id_usuario') == $peticion->empleado_id)
                                <hr>
                                <div class="row">
                                    @if (sizeOf($peticion->recursos))
                                        <div class="row">
                                            <div class="col-12">
                                                <h6>Historial de recursos</h6>
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
                                                                <td class="text-justify">
                                                                    {{ $recurso->tiporeposicion->tipo }}</td>
                                                                <td class="text-justify">{{ $recurso->recurso }}
                                                                </td>
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
                                                                    <td>{{ $recurso->respuestarecurso->fecha }}
                                                                    </td>
                                                                @else
                                                                    <td></td>
                                                                @endif
                                                                @if ($recurso->respuestarecurso)
                                                                    <td>{{ $recurso->respuestarecurso->respuesta }}
                                                                    </td>
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
                                                <hr class="mt-5">
                                                <div class="col-12 d-flex justify-content-end">
                                                    <div class="col-6 row estado-peticion">
                                                        <div class="col-2 d-flex mb-2">
                                                            <h6>Avance:</h6>
                                                        </div>
                                                        <select class="custom-select rounded-0 estadoPeticion col-4">
                                                            @foreach ($estados as $estado)
                                                                <option value="{{ $estado->id }}"
                                                                {{ $peticion->estadopeticion->id == $estado->id ? 'selected' : '' }}>
                                                                {{ $estado->estado }} %</option>
                                                            @endforeach
                                                        </select>
                                                        <button type="" class="btn btn-primary btn-estado-recurso col-2 mx-2"
                                                            data_url="{{ route('estado_guardar') }}"
                                                            data_token="{{ csrf_token() }}"><span style="font-size: 1em;"><i class="far fa-save"></i></span></button>
                                                    </div>
                                                </div>
                                            </div>
                                            @php
                                                $numRecursos = $peticion->recursos->count();
                                                $numRecursosRespuestas = 0;
                                                $validadcion = false;
                                                foreach ($peticion->recursos as $recurso) {
                                                    if($recurso->respuestaRecurso){
                                                        $numRecursosRespuestas ++;
                                                    }
                                                }
                                                if(($numRecursos - 1) == $numRecursosRespuestas ){
                                                    $validadcion = true;
                                                }
                                            @endphp
                                            @foreach ($peticion->recursos as $recurso)
                                                @if (!$recurso->respuestaRecurso)
                                                    @if ($recurso->tipo_reposicion_id == 3)
                                                        <div class="row form-respuesta-recursos">
                                                            <input class="id_recurso" type="hidden"
                                                                value="{{ $recurso->id }}">
                                                            <input class="tipo_reposicion_id" type="hidden"
                                                                value="{{ $recurso->tipo_reposicion_id }}">
                                                            <div class="row">
                                                                <div class="col-12 col-md-6">
                                                                    <h6>Respuesta recurso de
                                                                        {{ $recurso->tiporeposicion->tipo }}
                                                                    </h6>
                                                                </div>
                                                                <textarea type="text"
                                                                    class="form-control form-control-sm text-justify"
                                                                    disabled>{{ $recurso->recurso }}</textarea>
                                                                <div class="col-12" id="anexosRespuestaRecursos">
                                                                    <div class="col-12 d-flex row anexoRespuestaRecurso"
                                                                        id="anexoRespuestaRecurso">
                                                                        <div
                                                                            class="col-12 col-md-4 form-group titulo-anexoRespuestaRecurso">
                                                                            <label for="titulo">Título anexo</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-sm">
                                                                        </div>
                                                                        <div
                                                                            class="col-12 col-md-4 form-group descripcion-anexoRespuestaRecurso">
                                                                            <label
                                                                                for="descripcion">Descripción</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-sm">
                                                                        </div>
                                                                        <div
                                                                            class="col-12 col-md-4 form-group doc-anexoRespuestaRecurso">
                                                                            <label for="documentoRecurso">Anexos o
                                                                                Pruebas</label>
                                                                            <input
                                                                                class="form-control form-control-sm"
                                                                                type="file">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @if($validadcion)
                                                                <div
                                                                    class="card-footer d-flex guardarRespuestaRecurso mb-2">
                                                                    <button type="" class="btn btn-primary px-4"
                                                                        data_url="{{ route('respuesta_recurso_guardar') }}"
                                                                        data_url_anexos="{{ route('respuesta_recurso_anexos_guardar') }}"
                                                                        data_token="{{ csrf_token() }}">Guardar
                                                                        recurso</button>
                                                                </div>
                                                            @else
                                                                <div
                                                                    class="card-footer d-flex guardarRespuestaRecurso mb-2">
                                                                    <button type="" class="btn btn-grey px-4 border" disabled>Guardar
                                                                        recurso</button>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <hr class="mt-3">
                                                    @else
                                                        <div class="row form-respuesta-recursos">
                                                            <input class="id_recurso" type="hidden"
                                                                value="{{ $recurso->id }}">
                                                            <input class="tipo_reposicion_id" type="hidden"
                                                                value="{{ $recurso->tipo_reposicion_id }}">
                                                            <div class="row">
                                                                <div class="col-12 col-md-6">
                                                                    <h6>Respuesta recurso de
                                                                        {{ $recurso->tiporeposicion->tipo }}
                                                                    </h6>
                                                                </div>
                                                                <textarea type="text"
                                                                    class="form-control form-control-sm text-justify"
                                                                    disabled>{{ $recurso->recurso }}</textarea>
                                                                <div class="col-12" id="anexosRespuestaRecursos">
                                                                    <div class="col-12 d-flex row anexoRespuestaRecurso"
                                                                        id="anexoRespuestaRecurso">
                                                                        <div
                                                                            class="col-12 col-md-4 form-group titulo-anexoRespuestaRecurso">
                                                                            <label for="titulo">Título anexo</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-sm">
                                                                        </div>
                                                                        <div
                                                                            class="col-12 col-md-4 form-group descripcion-anexoRespuestaRecurso">
                                                                            <label
                                                                                for="descripcion">Descripción</label>
                                                                            <input type="text"
                                                                                class="form-control form-control-sm">
                                                                        </div>
                                                                        <div
                                                                            class="col-12 col-md-4 form-group doc-anexoRespuestaRecurso">
                                                                            <label for="documentoRecurso">Anexos o
                                                                                Pruebas</label>
                                                                            <input
                                                                                class="form-control form-control-sm"
                                                                                type="file">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="card-footer d-flex guardarRespuestaRecurso mb-2">
                                                                <button type="" class="btn btn-primary px-4"
                                                                    data_url="{{ route('respuesta_recurso_guardar') }}"
                                                                    data_url_anexos="{{ route('respuesta_recurso_anexos_guardar') }}"
                                                                    data_token="{{ csrf_token() }}">Guardar
                                                                    recurso</button>
                                                            </div>
                                                        </div>
                                                        <hr class="mt-3">
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                @endif   
                                {{-- Fin bloque de respuesta recurso --}}
                                {{-- Incio historial petición  --}}

                                <h6 class="">Historial peticiones</h6>
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
                                                        <td class="text-justify">{{ $historial->historial }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <hr>
                                @if (session('id_usuario') == $peticion->empleado_id)
                                    <div class="row d-flex px-12 p-3 mensaje-peticion"> 
                                        <div class="container-mensaje-historial form-group col-12">
                                            <label for="" class="">Agregar Historial</label>
                                            <textarea class="form-control mensaje-historial-peticion" rows="3" placeholder="" required></textarea>
                                        </div>
                                        <div class="col-12 col-md-12 form-group d-flex">
                                            <button href="" class="btn btn-primary mx-2 px-4 guardarHistorialPeticion" data_url="{{ route('historial_peticion_guardar') }}"
                                            data_token="{{ csrf_token() }}">Guardar Historial</button>
                                        </div>
                                    </div>
                                @endif
                                {{-- Fin historial petición --}}
                                <input class="id_peticion" type="hidden" value="{{ $peticion->id }}">
                            </div>
                        @endforeach
                        <div class="card-footer d-flex justify-content-end">
                            <a href="{{ route('funcionario-index') }}" class="btn btn-danger mx-2 px-4">Regresar</a>
                        </div>
                        <input class="id_pqr" id="id_pqr" name="id_pqr" type="hidden" value="{{ $pqr->id }}">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/generar_pqr/gestion.js') }}"></script>
@endsection
<!-- ************************************************************* -->
