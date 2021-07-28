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
            <div class="col-12 col-md-10">
                <div class="row d-flex justify-content-center mt-3">
                    <div class="col-11 col-md-6">
                        @include('includes.error-form')
                        @include('includes.mensaje')
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-11 d-flex align-items-stretch flex-column">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Listado PQR</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-12 col-md-12 table-responsive">
                            <table class="table table-striped table-hover table-sm display tabla-listado">
                                <thead>
                                    <tr>
                                        <th>Num. Radicado</th>
                                        <th>Fecha de radicación</th>
                                        <th>Tipo de PQR</th>
                                        <th>Estado PQR</th>
                                        <th>Fecha estimada de respuesta</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pqrs as $pqr)
                                        <tr>
                                            <td>{{ $pqr->radicado }}</td>
                                            <td>{{ $pqr->created_at }}</td>
                                            <td>{{ $pqr->tipoPqr->tipo }}</td>
                                            <td>{{ $pqr->estado->estado_usuario }}</td>
                                            <td>{{ date('Y-m-d', strtotime($pqr->fecha_generacion . '+ ' . $pqr->tiempo_limite . ' days')) }}</td>
                                            @if ($pqr->tipo_pqr_id == 1 || $pqr->tipo_pqr_id == 2 || $pqr->tipo_pqr_id == 3)
                                                <td><a href="{{ route('pqrRadicadaPdf', $pqr->id) }}"
                                                        class="btn-accion-tabla eliminar tooltipsC" title="Descargar"><i
                                                            class="fas fa-download text-primary btn-editar" aria-hidden="true"></i></a></td>
                                                <td>
                                                    @if ($pqr->peticiones->count() > 0)
                                                        <a href="{{ route('usuario-gestionarPQR', ['id' => $pqr->id]) }}"
                                                            class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                                                class="fa fa-edit text-info btn-editar" aria-hidden="true"></i></a>
                                                    @else
                                                        <a href="{{ route('usuario-generarPQR_motivos', ['id' => $pqr->id]) }}"
                                                            class="btn-accion-tabla eliminar tooltipsC" title="Terminar de Registrar"><i
                                                                class="fas fa-wrench text-danger btn-editar" aria-hidden="true"></i></a>
                                                    @endif

                                                </td>
                                            @elseif ($pqr->tipo_pqr_id == 4)
                                                <td>
                                                    <a href="{{ route('pqrRadicadaPdfCuo', ['id' => $pqr->id]) }}"
                                                        class="btn-accion-tabla eliminar tooltipsC" title="Descargar"><i
                                                            class="fas fa-download text-primary btn-editar" aria-hidden="true"></i></a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('usuario-gestionarConceptoUOpinion', ['id' => $pqr->id]) }}"
                                                        class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                                            class="fa fa-edit text-info btn-editar" aria-hidden="true"></i></a>
                                                </td>
                                            @elseif ($pqr->tipo_pqr_id == 5)
                                                <td>
                                                    <a href="{{ route('pqrRadicadaPdfSd', ['id' => $pqr->id]) }}"
                                                    class="btn-accion-tabla eliminar tooltipsC" title="Descargar"><i
                                                        class="fas fa-download text-primary btn-editar" aria-hidden="true"></i></a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('usuario-gestionarSolicitudDatos', ['id' => $pqr->id]) }}"
                                                        class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                                            class="fa fa-edit text-info btn-editar" aria-hidden="true"></i></a>
                                                </td>
                                            @elseif ($pqr->tipo_pqr_id == 6)
                                                <td>
                                                    <a href="{{ route('pqrRadicadaPdfRi', ['id' => $pqr->id]) }}"
                                                    class="btn-accion-tabla eliminar tooltipsC" title="Descargar"><i
                                                        class="fas fa-download text-primary btn-editar" aria-hidden="true"></i></a>
                                                </td>
                                            <td>
                                                <a href="{{ route('usuario-gestionarReporte', ['id' => $pqr->id]) }}"
                                                    class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                                        class="fa fa-edit text-info btn-editar" aria-hidden="true"></i></a>
                                            </td>
                                            @elseif ($pqr->tipo_pqr_id == 7)
                                                <td>
                                                    <a href="{{ route('felicitacionRadicadaPdf',$pqr->id) }}"
                                                    class="btn-accion-tabla eliminar tooltipsC" title="Descargar"><i
                                                        class="fas fa-download text-primary btn-editar" aria-hidden="true"></i></a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('usuario-gestionarFelicitacion', ['id' => $pqr->id]) }}"
                                                        class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                                            class="fa fa-edit text-info btn-editar" aria-hidden="true"></i></a>
                                                </td>
                                            @elseif ($pqr->tipo_pqr_id == 8)
                                                <td>
                                                    <a href="{{ route('pqrRadicadaPdfSdi', ['id' => $pqr->id]) }}"
                                                        class="btn-accion-tabla eliminar tooltipsC" title="Descargar"><i
                                                            class="fas fa-download text-primary btn-editar" aria-hidden="true"></i></a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('usuario-gestionarSolicitudDocInfo', ['id' => $pqr->id]) }}"
                                                        class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                                            class="fa fa-edit text-info btn-editar" aria-hidden="true"></i></a>
                                                </td>
                                            @elseif ($pqr->tipo_pqr_id == 9)
                                                <td>
                                                    <a href="{{ route('sugerenciaRadicadaPdf', $pqr->id) }}"
                                                    class="btn-accion-tabla eliminar tooltipsC" title="Descargar"><i
                                                        class="fas fa-download text-primary btn-editar" aria-hidden="true"></i></a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('usuario-gestionarsugerencia', ['id' => $pqr->id]) }}"
                                                        class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                                            class="fa fa-edit text-info btn-editar" aria-hidden="true"></i></a>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    {{-- @foreach ($conceptos as $concepto)
                                        <tr>
                                            <td>{{ $concepto->radicado }}</td>
                                            <td>{{ $concepto->created_at }}</td>
                                            <td>{{ $concepto->tipoPqr->tipo }}</td>
                                            <td>{{ $concepto->estado->estado_usuario }}</td>
                                            <td>{{ date('Y-m-d', strtotime($concepto->fecha_generacion . '+ ' . $concepto->tiempo_limite . ' days')) }}
                                            </td>
                                            <td><a href="{{ route('pqrRadicadaPdfCuo', ['id' => $concepto->id]) }}"
                                                    class="btn-accion-tabla eliminar tooltipsC" title="Descargar"><i
                                                        class="fas fa-download text-primary btn-editar" aria-hidden="true"></a>
                                            </td>
                                            <td><a href="{{ route('usuario-gestionarConceptoUOpinion', ['id' => $concepto->id]) }}"
                                                    class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                                        class="fa fa-edit text-info btn-editar" aria-hidden="true"></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach ($solicitudes_datos as $solicitud_datos)
                                        <tr>
                                            <td>{{ $solicitud_datos->radicado }}</td>
                                            <td>{{ $solicitud_datos->created_at }}</td>
                                            <td>{{ $solicitud_datos->tipoPqr->tipo }}</td>
                                            <td>{{ $solicitud_datos->estado->estado_usuario }}</td>
                                            <td>{{ date('Y-m-d', strtotime($solicitud_datos->fecha_generacion . '+ ' . $solicitud_datos->tiempo_limite . ' days')) }}
                                            </td>
                                            <td><a href="{{ route('pqrRadicadaPdfSd', ['id' => $solicitud_datos->id]) }}"
                                                    class="btn-accion-tabla eliminar tooltipsC" title="Descargar"><i
                                                        class="fas fa-download text-primary btn-editar" aria-hidden="true"></a>
                                            </td>
                                            <td>
                                                <a href="{{ route('usuario-gestionarSolicitudDatos', ['id' => $solicitud_datos->id]) }}"
                                                    class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                                        class="fa fa-edit text-info btn-editar" aria-hidden="true"></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach ($denuncias as $denuncia)
                                        <tr>
                                            <td>{{ $denuncia->radicado }}</td>
                                            <td>{{ $denuncia->created_at }}</td>
                                            <td>{{ $denuncia->tipoPqr->tipo }}</td>
                                            <td>{{ $denuncia->estado->estado_usuario }}</td>
                                            <td>{{ date('Y-m-d', strtotime($denuncia->fecha_generacion . '+ ' . $denuncia->tiempo_limite . ' days')) }}
                                            </td>
                                            <td><a href="{{ route('pqrRadicadaPdfRi', ['id' => $denuncia->id]) }}"
                                                    class="btn-accion-tabla eliminar tooltipsC" title="Descargar"><i
                                                        class="fas fa-download text-primary btn-editar" aria-hidden="true"></a>
                                            </td>
                                            <td><a href="{{ route('usuario-gestionarReporte', ['id' => $denuncia->id]) }}"
                                                    class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                                        class="fa fa-edit text-info btn-editar" aria-hidden="true"></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach ($felicitaciones as $felicitacion)
                                        <tr>
                                            <td>{{ $felicitacion->radicado }}</td>
                                            <td>{{ $felicitacion->created_at }}</td>
                                            <td>{{ $felicitacion->tipoPqr->tipo }}</td>
                                            <td>{{ $felicitacion->estado->estado_usuario }}</td>
                                            <td>{{ date('Y-m-d', strtotime($felicitacion->fecha_generacion . '+ ' . $felicitacion->tiempo_limite . ' days')) }}
                                            </td>
                                            <td><a href="{{ route('felicitacionRadicadaPdf',$felicitacion->id) }}"
                                                    class="btn-accion-tabla eliminar tooltipsC" title="Descargar"><i
                                                        class="fas fa-download text-primary btn-editar" aria-hidden="true"></a>
                                            </td>
                                            <td><a href="{{ route('usuario-gestionarFelicitacion', ['id' => $felicitacion->id]) }}"
                                                    class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                                        class="fa fa-edit text-info btn-editar" aria-hidden="true"></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach ($solicitudes_doc as $solicitud_doc)
                                        <tr>
                                            <td>{{ $solicitud_doc->radicado }}</td>
                                            <td>{{ $solicitud_doc->created_at }}</td>
                                            <td>{{ $solicitud_doc->tipoPqr->tipo }}</td>
                                            <td>{{ $solicitud_doc->estado->estado_usuario }}</td>
                                            <td>{{ date('Y-m-d', strtotime($solicitud_doc->fecha_generacion . '+ ' . $solicitud_doc->tiempo_limite . ' days')) }}
                                            </td>
                                            <td><a href="{{ route('pqrRadicadaPdfSdi', ['id' => $solicitud_doc->id]) }}"
                                                    class="btn-accion-tabla eliminar tooltipsC" title="Descargar"><i
                                                        class="fas fa-download text-primary btn-editar" aria-hidden="true"></a>
                                            </td>
                                            <td><a href="{{ route('usuario-gestionarSolicitudDocInfo', ['id' => $solicitud_doc->id]) }}"
                                                    class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                                        class="fa fa-edit text-info btn-editar" aria-hidden="true"></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach ($sugerencias as $sugerencia)
                                        <tr>
                                            <td>{{ $sugerencia->radicado }}</td>
                                            <td>{{ $sugerencia->created_at }}</td>
                                            <td>{{ $sugerencia->tipoPqr->tipo }}</td>
                                            <td>{{ $sugerencia->estado->estado_usuario }}</td>
                                            <td>{{ date('Y-m-d', strtotime($sugerencia->fecha_generacion . '+ ' . $sugerencia->tiempo_limite . ' days')) }}
                                            </td>
                                            <td><a href="{{ route('sugerenciaRadicadaPdf', $sugerencia->id) }}"
                                                    class="btn-accion-tabla eliminar tooltipsC" title="Descargar"><i
                                                        class="fas fa-download text-primary btn-editar" aria-hidden="true"></a>
                                            </td>
                                            <td><a href="{{ route('usuario-gestionarsugerencia', ['id' => $sugerencia->id]) }}"
                                                    class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                                        class="fa fa-edit text-info btn-editar" aria-hidden="true"></a>
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
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
@endsection
<!-- ************************************************************* -->
