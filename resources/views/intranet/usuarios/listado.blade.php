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

            <div class="col-12 col-md-11 table-responsive">
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
                        @foreach ($pqr_S as $pqr)
                            <tr>
                                <td>{{ $pqr->radicado }}</td>
                                <td>{{ $pqr->fecha_radicado }}</td>
                                <td>{{ $pqr->tipoPqr->tipo }}</td>
                                <td>{{ $pqr->estado->estado_usuario }}</td>
                                <td>{{ date('Y-m-d', strtotime($pqr->fecha_generacion . '+ ' . $pqr->tiempo_limite . ' days')) }}
                                </td>
                                <td><a href="{{ route('download', ['id_tipo_pqr' => $pqr->tipo_pqr_id, 'id_pqr' => $pqr->id]) }}"
                                        class="btn-accion-tabla eliminar tooltipsC" title="Descargar"><i
                                            class="fas fa-download text-primary btn-editar" aria-hidden="true"></a></td>
                                <td>
                                    @if ($pqr->peticiones->count() > 0)
                                        <a href="{{ route('usuario-gestionarPQR', ['id' => $pqr->id]) }}"
                                            class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                                class="fa fa-edit text-info btn-editar" aria-hidden="true"></a>
                                    @else
                                        <a href="{{ route('usuario-generarPQR_motivos', ['id' => $pqr->id]) }}"
                                            class="btn-accion-tabla eliminar tooltipsC" title="Terminar de Registrar"><i
                                                class="fas fa-wrench text-danger btn-editar" aria-hidden="true"></a>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                        @foreach ($conceptos as $concepto)
                            <tr>
                                <td>{{ $concepto->radicado }}</td>
                                <td>{{ $concepto->fecha_radicado }}</td>
                                <td>{{ $concepto->tipoPqr->tipo }}</td>
                                <td>{{ $concepto->estado->estado_usuario }}</td>
                                <td>{{ date('Y-m-d', strtotime($concepto->fecha_generacion . '+ ' . $concepto->tiempo_limite . ' days')) }}
                                </td>
                                <td><a href="{{ route('download', ['id_tipo_pqr' => $concepto->tipo_pqr_id, 'id_pqr' => $concepto->id]) }}"
                                        class="btn-accion-tabla eliminar tooltipsC" title="Descargar"><i
                                            class="fas fa-download text-primary btn-editar" aria-hidden="true"></a>
                                </td>
                                <td><a href="{{ route('funcionario-gestionarConceptoUOpinion', ['id' => $concepto->id]) }}"
                                        class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                            class="fa fa-edit text-info btn-editar" aria-hidden="true"></a>
                                </td>
                            </tr>
                        @endforeach
                        @foreach ($solicitudes_datos as $solicitud_datos)
                            <tr>
                                <td>{{ $solicitud_datos->radicado }}</td>
                                <td>{{ $solicitud_datos->fecha_radicado }}</td>
                                <td>{{ $solicitud_datos->tipoPqr->tipo }}</td>
                                <td>{{ $solicitud_datos->estado->estado_usuario }}</td>
                                <td>{{ date('Y-m-d', strtotime($solicitud_datos->fecha_generacion . '+ ' . $solicitud_datos->tiempo_limite . ' days')) }}
                                </td>
                                <td><a href="{{ route('download', ['id_tipo_pqr' => $solicitud_datos->tipo_pqr_id, 'id_pqr' => $solicitud_datos->id]) }}"
                                        class="btn-accion-tabla eliminar tooltipsC" title="Descargar"><i
                                            class="fas fa-download text-primary btn-editar" aria-hidden="true"></a>
                                </td>
                                <td><a href="{{ route('funcionario-gestionarSolicitudDatos', ['id' => $solicitud_datos->id]) }}"
                                        class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                            class="fa fa-edit text-info btn-editar" aria-hidden="true"></a>
                                </td>
                            </tr>
                        @endforeach
                        @foreach ($denuncias as $denuncia)
                            <tr>
                                <td>{{ $denuncia->radicado }}</td>
                                <td>{{ $denuncia->fecha_radicado }}</td>
                                <td>{{ $denuncia->tipoPqr->tipo }}</td>
                                <td>{{ $denuncia->estado->estado_usuario }}</td>
                                <td>{{ date('Y-m-d', strtotime($denuncia->fecha_generacion . '+ ' . $denuncia->tiempo_limite . ' days')) }}
                                </td>
                                <td><a href="{{ route('download', ['id_tipo_pqr' => $denuncia->tipo_pqr_id, 'id_pqr' => $denuncia->id]) }}"
                                        class="btn-accion-tabla eliminar tooltipsC" title="Descargar"><i
                                            class="fas fa-download text-primary btn-editar" aria-hidden="true"></a>
                                </td>
                                <td><a href="{{ route('funcionario-gestionarDenuncia', ['id' => $denuncia->id]) }}"
                                        class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                            class="fa fa-edit text-info btn-editar" aria-hidden="true"></a>
                                </td>
                            </tr>
                        @endforeach
                        @foreach ($felicitaciones as $felicitacion)
                            <tr>
                                <td>{{ $felicitacion->radicado }}</td>
                                <td>{{ $felicitacion->fecha_radicado }}</td>
                                <td>{{ $felicitacion->tipoPqr->tipo }}</td>
                                <td>{{ $felicitacion->estado->estado_usuario }}</td>
                                <td>{{ date('Y-m-d', strtotime($felicitacion->fecha_generacion . '+ ' . $felicitacion->tiempo_limite . ' days')) }}
                                </td>
                                <td><a href="{{ route('download', ['id_tipo_pqr' => $felicitacion->tipo_pqr_id, 'id_pqr' => $felicitacion->id]) }}"
                                        class="btn-accion-tabla eliminar tooltipsC" title="Descargar"><i
                                            class="fas fa-download text-primary btn-editar" aria-hidden="true"></a>
                                </td>
                                <td><a href="{{ route('funcionario-gestionarFelicitacion', ['id' => $felicitacion->id]) }}"
                                        class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                            class="fa fa-edit text-info btn-editar" aria-hidden="true"></a>
                                </td>
                            </tr>
                        @endforeach
                        @foreach ($solicitudes_doc as $solicitud_doc)
                            <tr>
                                <td>{{ $solicitud_doc->radicado }}</td>
                                <td>{{ $solicitud_doc->fecha_radicado }}</td>
                                <td>{{ $solicitud_doc->tipoPqr->tipo }}</td>
                                <td>{{ $solicitud_doc->estado->estado_usuario }}</td>
                                <td>{{ date('Y-m-d', strtotime($solicitud_doc->fecha_generacion . '+ ' . $solicitud_doc->tiempo_limite . ' days')) }}
                                </td>
                                <td><a href="{{ route('download', ['id_tipo_pqr' => $solicitud_doc->tipo_pqr_id, 'id_pqr' => $solicitud_doc->id]) }}"
                                        class="btn-accion-tabla eliminar tooltipsC" title="Descargar"><i
                                            class="fas fa-download text-primary btn-editar" aria-hidden="true"></a>
                                </td>
                                <td><a href="{{ route('funcionario-gestionarSolicitudDocumentos', ['id' => $solicitud_doc->id]) }}"
                                        class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                            class="fa fa-edit text-info btn-editar" aria-hidden="true"></a>
                                </td>
                            </tr>
                        @endforeach
                        @foreach ($sugerencias as $sugerencia)
                            <tr>
                                <td>{{ $sugerencia->radicado }}</td>
                                <td>{{ $sugerencia->fecha_radicado }}</td>
                                <td>{{ $sugerencia->tipoPqr->tipo }}</td>
                                <td>{{ $sugerencia->estado->estado_usuario }}</td>
                                <td>{{ date('Y-m-d', strtotime($sugerencia->fecha_generacion . '+ ' . $sugerencia->tiempo_limite . ' days')) }}
                                </td>
                                <td><a href="{{ route('download', ['id_tipo_pqr' => $sugerencia->tipo_pqr_id, 'id_pqr' => $sugerencia->id]) }}"
                                        class="btn-accion-tabla eliminar tooltipsC" title="Descargar"><i
                                            class="fas fa-download text-primary btn-editar" aria-hidden="true"></a>
                                </td>
                                <td><a href="{{ route('funcionario-gestionarSugerencia', ['id' => $sugerencia->id]) }}"
                                        class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                            class="fa fa-edit text-info btn-editar" aria-hidden="true"></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script>
        let btnsTabla = document.querySelectorAll('.btn-editar')
        btnsTabla.forEach(btn => {
            if (btn.parentNode.tagName != 'A') {
                btn.remove()
            }
        })

    </script>
@endsection
<!-- ************************************************************* -->
