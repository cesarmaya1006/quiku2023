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
    Sistema de informaci&oacute;n
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
            <div class="col-12 col-md-11 table-responsive">
                <table class="table table-striped table-hover table-sm display">
                    <thead>
                        <tr>
                            <th>Num. Radicado</th>
                            <th>Tipo de PQR</th>
                            <th>Estado</th>
                            <th>Fecha de radicación</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pqr_S as $pqr)
                            <tr>
                                <td>{{ $pqr->radicado }}</td>
                                <td>{{ $pqr->tipoPqr->tipo }}</td>
                                <td>{{ $pqr->estado }}</td>
                                <td>{{ $pqr->fecha_radicado }}</td>
                                <td>
                                    @if ($pqr->tipo_pqr_id == 1)
                                        <a href="{{ route('funcionario-gestionar_pqr_p', ['id' => $pqr->id]) }}"
                                            class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                                class="fa fa-edit text-info btn-editar" aria-hidden="true"></a>
                                    @elseif ($pqr->tipo_pqr_id == 2)
                                        <a href="{{ route('funcionario-gestionar_pqr_q', ['id' => $pqr->id]) }}"
                                            class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                                class="fa fa-edit text-info btn-editar" aria-hidden="true"></a>
                                    @else
                                        <a href="{{ route('funcionario-gestionar_pqr_r', ['id' => $pqr->id]) }}"
                                            class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                                class="fa fa-edit text-info btn-editar" aria-hidden="true"></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        @foreach ($conceptos as $concepto)
                            <tr>
                                <td>{{ $concepto->radicado }}</td>
                                <td>{{ $concepto->tipoPqr->tipo }}</td>
                                <td>{{ $concepto->estado }}</td>
                                <td>{{ $concepto->fecha_radicado }}</td>
                                <td><a href="{{ route('funcionario-gestionarConceptoUOpinion', ['id' => $concepto->id]) }}"
                                        class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                            class="fa fa-edit text-info btn-editar" aria-hidden="true"></a></td>
                            </tr>
                        @endforeach
                        @foreach ($solicitudes_datos as $solicitud_datos)
                            <tr>
                                <td>{{ $solicitud_datos->radicado }}</td>
                                <td>{{ $solicitud_datos->tipoPqr->tipo }}</td>
                                <td>{{ $solicitud_datos->estado }}</td>
                                <td>{{ $solicitud_datos->fecha_radicado }}</td>
                                <td><a href="{{ route('funcionario-gestionarSolicitudDatos', ['id' => $solicitud_datos->id]) }}"
                                        class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                            class="fa fa-edit text-info btn-editar" aria-hidden="true"></a></td>
                            </tr>
                        @endforeach
                        @foreach ($denuncias as $denuncia)
                            <tr>
                                <td>{{ $denuncia->radicado }}</td>
                                <td>{{ $denuncia->tipoPqr->tipo }}</td>
                                <td>{{ $denuncia->estado }}</td>
                                <td>{{ $denuncia->fecha_radicado }}</td>
                                <td><a href="{{ route('funcionario-gestionarDenuncia', ['id' => $denuncia->id]) }}"
                                        class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                            class="fa fa-edit text-info btn-editar" aria-hidden="true"></a></td>
                            </tr>
                        @endforeach
                        @foreach ($felicitaciones as $felicitacion)
                            <tr>
                                <td>{{ $felicitacion->radicado }}</td>
                                <td>{{ $felicitacion->tipoPqr->tipo }}</td>
                                <td>{{ $felicitacion->estado }}</td>
                                <td>{{ $felicitacion->fecha_radicado }}</td>
                                <td><a href="{{ route('funcionario-gestionarFelicitacion', ['id' => $felicitacion->id]) }}"
                                        class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                            class="fa fa-edit text-info btn-editar" aria-hidden="true"></a></td>
                            </tr>
                        @endforeach
                        @foreach ($solicitudes_doc as $solicitud_doc)
                            <tr>
                                <td>{{ $solicitud_doc->radicado }}</td>
                                <td>{{ $solicitud_doc->tipoPqr->tipo }}</td>
                                <td>{{ $solicitud_doc->estado }}</td>
                                <td>{{ $solicitud_doc->fecha_radicado }}</td>
                                <td><a href="{{ route('funcionario-gestionarSolicitudDocumentos', ['id' => $solicitud_doc->id]) }}"
                                        class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                            class="fa fa-edit text-info btn-editar" aria-hidden="true"></a></td>
                            </tr>
                        @endforeach
                        @foreach ($sugerencias as $sugerencia)
                            <tr>
                                <td>{{ $sugerencia->radicado }}</td>
                                <td>{{ $sugerencia->tipoPqr->tipo }}</td>
                                <td>{{ $sugerencia->estado }}</td>
                                <td>{{ $sugerencia->fecha_radicado }}</td>
                                <td><a href="{{ route('funcionario-gestionarSugerencia', ['id' => $sugerencia->id]) }}"
                                        class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                            class="fa fa-edit text-info btn-editar" aria-hidden="true"></a></td>
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
        btnsTabla.forEach(btn =>{
            if(btn.parentNode.tagName != 'A'){
                btn.remove()
            }
        })
    </script>
@endsection
<!-- ************************************************************* -->
