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
    $plazoRecurso = 0;
    $aclaracionesMenu = 0;
    $aclaraciones = 0;
    $aclaracionesRespuesta = 0;
    $peticiones = $pqr->peticiones->count();
    $peticionesRespuesta = 0;
    $recursosMenu = 0;
    foreach ($pqr->peticiones as $peticion) {
        if ($peticion->aclaraciones) {
            foreach ($peticion->aclaraciones as $aclaracion) {
                $aclaraciones++;
                if ($aclaracion->respuesta != null) {
                    $aclaracionesRespuesta++;
                }
            }
        }
        if ($peticion->respuesta) {
            $peticionesRespuesta++;
        }
        if ($peticion->recurso) {
            $recursosMenu++;
        }
        if( $plazoRecurso != $peticion->recurso_dias){
            $plazoRecurso += $peticion->recurso_dias;
        }
    }
    if ($aclaraciones > 0) {
        if ($aclaraciones == $aclaracionesRespuesta) {
            $aclaracionesMenu = 1;
        } else {
            $aclaracionesMenu = 2;
        }
    }
    if ($peticiones == $peticionesRespuesta) {
        $respuestaMenu = 1;
    } elseif ($peticionesRespuesta > 0) {
        $respuestaMenu = 2;
    } else {
        $respuestaMenu = 0;
    }

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
                        <h3 class="card-title">Gestión a PQR Número de radicado:
                            <strong>{{ $pqr->radicado }}</strong>
                        </h3>
                    </div>
                    <div class="card-body">
                        {{-- Inicio Bloque header --}}
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
                                @if($pqr->tipo)
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
                                <div class="col-12 col-md-6">
                                    <strong><a href="{{ route('pqrRadicadaPdf', ['id' => $pqr->id]) }}"
                                            target="_blank" rel="noopener noreferrer"><i class="fa fa-download"
                                                aria-hidden="true"></i>
                                            Descargar
                                            Radicado</a></strong>
                                </div>
                            </div>
                        </div>
                        {{-- Fin Bloque header --}}

                        {{-- Inicio Bloque Tarjetas --}}
                        @if(!($pqr->tipo_pqr_id == 7 || $pqr->tipo_pqr_id == 9))
                            <div class="col-12 d-flex flex-wrap rounded border justify-content-center my-2 p-2 ">
                                <a href="" class="menu-radicado btn card-step verificado activo"
                                    data-content='menu-card-radicado'>
                                    <div class="">
                                        <span style="font-size: 2.5em;">
                                            <i class="far fa-file-alt"></i>
                                        </span>
                                        <h6>Radicacion de la PQR</h6>
                                    </div>
                                </a>
                                @if ($pqr->prorroga)
                                    <a href="" class="menu-prorroga btn card-step verificado"
                                        data-content='menu-card-prorroga'>
                                        <div class="">
                                            <span style="font-size: 2.5em;">
                                                <i class="fas fa-check"></i>
                                            </span>
                                            <h6>Prórroga</h6>
                                        </div>
                                    </a>
                                @endif
                                @if ($aclaracionesMenu == 1)
                                    <a href="" class="menu-aclaracion btn card-step verificado "
                                        data-content='menu-card-aclaraciones'>
                                        <div class="">
                                            <span style="font-size: 2.5em;">
                                                <i class="fas fa-check"></i>
                                            </span>
                                            <h6>Aclaración y/o complementación</h6>
                                        </div>
                                    </a>
                                @elseif($aclaracionesMenu == 2)
                                    <a href="" class="menu-aclaracion btn card-step tramite"
                                        data-content='menu-card-aclaraciones'>
                                        <div class="">
                                            <span style="font-size: 2.5em;">
                                                <i class="fas fa-hourglass-half"></i>
                                            </span>
                                            <h6>Aclaración y/o complementación</h6>
                                        </div>
                                    </a>
                                @endif
                                @if ($respuestaMenu == 1 && $pqr->asignaciontareas->sum('estado_id') == 55 )
                                    <a href="" class="menu-respuesta btn card-step verificado"
                                        data-content='menu-card-respuesta'>
                                        <div class="">
                                            <span style="font-size: 2.5em;">
                                                <i class="fas fa-check"></i>
                                            </span>
                                            <h6>Respuesta PQR</h6>
                                        </div>
                                    </a>
                                @elseif($respuestaMenu == 2)
                                    <a href="" class="menu-respuesta btn card-step tramite"
                                        data-content='menu-card-respuesta'>
                                        <div class="">
                                            <span style="font-size: 2.5em;">
                                                <i class="fas fa-hourglass-half"></i>
                                            </span>
                                            <h6>Respuesta PQR</h6>
                                        </div>
                                    </a>
                                @else
                                    <a href="" class="menu-respuesta btn card-step desativado"
                                        data-content='menu-card-respuesta'>
                                        <div class="">
                                            <span style="font-size: 2.5em;">
                                                <i class="fas fa-hourglass-half"></i>
                                            </span>
                                            <h6>Respuesta PQR</h6>
                                        </div>
                                    </a>
                                @endif
                                @if ($pqr->estadospqr_id == 7 || $pqr->estadospqr_id == 8 || $pqr->estadospqr_id == 9)
                                    <a href="" class="menu-recurso btn card-step tramite" data-content='menu-card-recursos'>
                                        <div class="">
                                            <span style="font-size: 2.5em;">
                                                <i class="fas fa-hourglass-half"></i>
                                            </span>
                                            <h6>Recurso</h6>
                                        </div>
                                    </a>
                                @elseif($pqr->estadospqr_id == 10)
                                    <a href="" class="menu-recurso btn card-step verificado"
                                        data-content='menu-card-recursos'>
                                        <div class="">
                                            <span style="font-size: 2.5em;">
                                                <i class="fas fa-check"></i>
                                            </span>
                                            <h6>Recurso</h6>
                                        </div>
                                    </a>
                                @endif
                                @if ($pqr->estadospqr_id == 6 || $pqr->estadospqr_id == 10 )
                                    <a  href="{{ route('usuario-index') }}" class="menu-cierre btn card-step verificado" data-content = 'menu-salir-inicio'>
                                        <div class="">
                                            <span style="font-size: 2.5em;">
                                                <i class="fas fa-check"></i>
                                            </span>
                                            <h6>Cierre del proceso de GESTION PQR</h6>
                                        </div>
                                    </a>
                                @endif
                            </div>
                        @endif
                        {{-- Fin Bloque Tarjetas --}}
                        
                        {{-- Incio Bloque PQR --}}
                        <hr style="border-top: solid 4px black">
                        <div class="rounded border mb-3 p-2 ">
                            {{-- Inicio bloque prorroga --}}
                            @if ($pqr->prorroga_dias)
                            <div class="menu-card-prorroga menu-card d-none rounded border mb-3 p-2 ">
                                <div class="col-12 col-md-6">
                                    Días de prórroga: <strong>{{ $pqr->prorroga_dias }} </strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    <strong><a href="{{ route('prorrogaPdf', ['id' => $pqr->id]) }}" target="_blank"
                                        rel="noopener noreferrer"><i class="fa fa-download" aria-hidden="true"></i>
                                        Descargar Radicado Prórroga</a></strong>
                                    </div>
                                </div>
                            @endif
                            {{-- Fin bloque prorroga --}}

                            {{-- Incio bloque peticiones --}}
                            <div class="peticiones">
                                @foreach ($pqr->peticiones as $key => $peticion)
                                    <div class="col-12 rounded border mb-3 p-2 peticion">
                                        {{-- Incio Bloque menu-card-radicado--}}
                                        <div class="menu-card-radicado menu-card">
                                            <div class="col-12">
                                                <div class="col-12 row my-2 ">
                                                    <div class="col-6">
                                                        <h5>Petición {{ $key + 1 }}</h5>
                                                    </div>
                                                </div>
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
                                            @if($peticion->sugerencia)
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Sugerencia:</strong> {{ $peticion->sugerencia }}</p>
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
                                            @if(sizeOf($peticion->hechos))
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
                                        {{-- Fin Bloque menu-card-radicado--}}

                                        {{-- Inicio Bloque menu-card-aclaraciones--}}
                                        @if (sizeOf($peticion->aclaraciones))
                                            <div class="row menu-card-aclaraciones menu-card d-none">
                                                <div class="col-12">
                                                    <h5>Petición {{ $key + 1 }}</h5>
                                                </div>
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
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    <hr class="mt-5">
                                                </div>
                                                @if ($peticion->aclaraciones->where('respuesta', '')->count() > 0)
                                                    <br>
                                                    <div class="col-12">
                                                        <h6>Pendientes de aclaración o complementación</h6>
                                                    </div>
                                                    @foreach ($peticion->aclaraciones as $aclaracion)
                                                        @if ($aclaracion->respuesta == '')
                                                            <div class="content aclaracion p-3">
                                                                <div class="row mt-2">
                                                                    <div class="col-12 col-md-3 form-group">
                                                                        <label for="fecha{{ $aclaracion->id }}">Fecha de
                                                                            aclaración</label>
                                                                        <span
                                                                            class="text-break">{{ $aclaracion->fecha }}</span>
                                                                    </div>
                                                                    <div class="col-12 col-md-9 form-group">
                                                                        <label
                                                                            for="aclaracion{{ $aclaracion->id }}">Aclaración</label>
                                                                        <span
                                                                            class="text-break">{{ $aclaracion->aclaracion }}</span>
                                                                    </div>
                                                                    <div class="col-12 form-group">
                                                                        <strong><a
                                                                                href="{{ route('aclaracionPdf', ['id' => $aclaracion->id]) }}"
                                                                                target="_blank" rel="noopener noreferrer"><i
                                                                                    class="fa fa-download"
                                                                                    aria-hidden="true"></i>
                                                                                Descargar
                                                                                Documento aclaración</a></strong>
                                                                    </div>
                                                                </div>
                                                                <div class="block-aclaracion">
                                                                    <div class="row">
                                                                        <label for="">Respuesta aclaracion:</label>
                                                                        <textarea class="aclaracionRespuesta"></textarea>
                                                                    </div>
                                                                    <div class="row mt-3">
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
                                                                    </div>
                                                                    <input class="id_aclaracion" name="id_aclaracion" type="hidden"
                                                                        value="{{ $aclaracion->id }}">
                                                                    <div class="col-12 col-md-12 form-group d-flex">
                                                                        <button href="" class="btn btn-primary px-4 btn-guardar-aclaracion" data_url="{{ route('aclaracion_usuario_guardar') }}" data_url2="{{ route('aclaracion_anexos_usuario_guardar') }}"
                                                                        data_token="{{ csrf_token() }}">Guardar aclaración</button>
                                                                    </div>
                                                                    <hr>
                                                                    <p class="text-danger">Se recuerda que el tiempo máximo para dar respuesta a esta aclaración es de 30 días, después de este tiempo la PQR se cerrara por vencimiento de términos.</p>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        @endif
                                        <br>
                                        {{-- Fin Bloque menu-card-aclaraciones--}}
                                        
                                        {{-- Inicio bloque respuesta petición--}}
                                        @if ($peticion->respuesta && $pqr->asignaciontareas->sum('estado_id') == 55)
                                            <div class="row menu-card-respuesta menu-card d-none">
                                                <div class="col-12">
                                                    <h5>Petición {{ $key + 1 }}</h5>
                                                </div>
                                                <div class="col-12">
                                                    <h6>Respuesta petición</h6>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <textarea type="text" class="form-control form-control-sm respuesta"
                                                    rows="5"
                                                    readonly>{{ isset($peticion->respuesta->respuesta) ? strip_tags($peticion->respuesta->respuesta) : '' }}</textarea>
                                                </div>
                                            </div>
                                            @endif
                                        {{-- Fin bloque respuesta petición--}}
                                        
                                        {{-- Inicio bloque recursos petición--}}
                                        <div class="menu-card-recursos menu-card d-none">
                                            <div class="col-12">
                                                <h5>Petición {{ $key + 1 }}</h5>
                                            </div>
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
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($peticion->recursos as $recurso)
                                                                    <tr>
                                                                        <td>{{ $recurso->fecha_radicacion }}</td>
                                                                        <td class="text-justify">{{ $recurso->tiporeposicion->tipo }}</td>
                                                                        <td class="text-justify">{{ $recurso->recurso }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        <hr class="mt-5">
                                                    </div>
                                                </div>
                                            @endif

                                            {{-- @if ($peticion->recurso == 1 && $peticion->respuesta && !sizeOf($peticion->recursos)) --}}
                                            <input class="respuestaProcedeRecurso" type="hidden" value="1">
                                            <div class="col-12">
                                                <h6>Respuesta petición</h6>
                                            </div>
                                            <div class="col-12 form-group">
                                                <textarea type="text" class="form-control form-control-sm respuesta"
                                                    rows="5"
                                                    readonly>{{ isset($peticion->respuesta->respuesta) ? $peticion->respuesta->respuesta : '' }}</textarea>
                                            </div>
                                            @php
                                                $valiRecurso = 0;
                                                if(sizeOf($peticion->recursos)){
                                                    $recursos = $peticion->recursos;
                                                    foreach ($recursos as $recurso) {
                                                        if($recurso->tipo_reposicion_id == 1 && $recurso->respuestarecurso){
                                                            $valiRecurso = 1;
                                                        }
                                                    }
                                                }  
                                            @endphp
                                            @if (sizeOf($peticion->recursos) == 0 || ($valiRecurso && sizeOf($peticion->recursos) == 1 ))
                                                <div class="col-12 col-md-6">
                                                    <h6>¿Desea interponer un recurso?</h6>
                                                </div>
                                                <div class="col-12 col-md-6 d-flex flex-row">
                                                    <div class="form-check mb-3 mr-4">
                                                        <input id="" name="check-recurso-procede-form{{ $key + 1 }}"
                                                            type="radio"
                                                            class="form-check-input recurso_procede_check recurso_procede_si"
                                                            value="1" />
                                                        <label id="_label" class="form-check-label" for="">SI</label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input id="" name="check-recurso-procede-form{{ $key + 1 }}"
                                                            type="radio"
                                                            class="form-check-input recurso_procede_check recurso_procede_no"
                                                            value="0" checked />
                                                        <label id="_label" class="form-check-label" for="">NO</label>
                                                    </div>
                                                </div>
                                                <div class="row form-recursos">
                                                    <input class="id_peticionRecurso" type="hidden"
                                                        value="{{ $peticion->id }}">
                                                        <div class="row">
                                                            <div class="form-group col-12 col-md-12 titulo-recurso">
                                                                <div class="col-12 d-flex justify-content-between">
                                                                    <label for="">Tipo de recurso</label>
                                                                </div>
                                                            <select class="custom-select rounded-0 tipo_reposicion requerido">
                                                                <option value="">--Seleccione--</option>
                                                                @if(!sizeOf($peticion->recursos))
                                                                    <option value="1">Aclaración y/o corrección</option>
                                                                @endif
                                                                <option value="2">Reposición</option>
                                                                @if($peticion->apelacion)
                                                                    <option value="3">Apelación</option>
                                                                    <option value="4">Reposición y apelación</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <h6>Recurso</h6>
                                                        </div>
                                                        <div class="col-12 form-group">
                                                            <textarea type="text"
                                                                class="form-control form-control-sm respuestaRecurso"></textarea>
                                                        </div>
                                                        <div class="row mt-3">
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
                                                        </div>
                                                    </div>
                                                    <div class="card-footer d-flex guardarRecurso">
                                                        <button type="" class="btn btn-primary px-4 btn-recurso"
                                                            data_url="{{ route('recurso_guardar') }}"
                                                            data_url_anexos="{{ route('recurso_anexos_guardar') }}"
                                                            data_token="{{ csrf_token() }}">Guardar recurso</button>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        {{-- Inicio bloque recursos petición--}}
                                    </div>
                                @endforeach
                            </div>
                            {{-- Incio bloque peticiones --}}
                        </div>
                        {{-- Fin Bloque PQR --}}

                        {{-- Inicio Bloque respuesta PQR --}}
                        @if ($pqr->estadospqr_id > 5)
                            <div class="rounded border p-2">
                                <h4 class="mb-4">Respuesta PQR</h4>
                                {{-- @if ($pqr->anexos->count() == 1) --}}
                                    <strong class="mx-2">
                                        <a href="{{ route('descarga_respuestaPQR', ['id' => $pqr->id]) }}" target="_blank" rel="noopener noreferrer">
                                            <i class="fas fa-file-download"></i> Descarga</a>
                                    </strong>
                                {{-- @endif --}}

                                <hr>
                            </div>
                        @endif
                        {{-- Fin Bloque respuesta PQR --}}
                        <input class="id_pqr" type="hidden" value="{{ $pqr->id }}">
                        <div class="card-footer d-flex justify-content-end">
                            <a href="{{ route('usuario-index') }}" class="btn btn-danger mx-2 px-4">Regresar</a>
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
    <script src="{{ asset('js/intranet/generar_pqr/gestion_usuario.js') }}"></script>
@endsection
<!-- ************************************************************* -->
