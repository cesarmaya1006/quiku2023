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
