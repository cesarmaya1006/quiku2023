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
    function dias_restantes($fecha_inicial,$fecha_final){
        $dias = (strtotime($fecha_inicial)-strtotime($fecha_final))/86400;
        $dias = abs($dias); 
        $dias = floor($dias);
        return $dias;
    }

    function dias_estado($fecha_inicial,$fecha_final, $estadoPQR){
        $totaldias = (strtotime($fecha_inicial)-strtotime($fecha_final))/86400;
        $totaldias = abs($totaldias); 
        $totaldias = floor($totaldias);
        $contdias = (strtotime(date('Y-m-d') )-strtotime($fecha_final))/86400;
        $contdias = abs($contdias); 
        $contdias = floor($contdias - 1 );
        $porcentaje = floor((($contdias) / $totaldias) * 100 );
        $respuesta = 0 ;
        if($porcentaje >= 30){
            $respuesta = 1;
        }elseif ($porcentaje > 0) {
            $respuesta = 2;
        }else {
            $respuesta = 3;
        }
        if($estadoPQR == 6 || $estadoPQR == 9 || $estadoPQR == 10){
            $respuesta = 4;
        }
        return $respuesta;
    }
@endphp
    <div class="container-fluid">
        {{-- <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Navbar</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Link</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Dropdown
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                                </li>
                            </ul>
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <hr><br> --}}
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8">
                @include('includes.error-form')
                @include('includes.mensaje')
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Listado PQR</h3>
                </div>
                <div class="card-body">
                    <div class="col-12 col-md-12 table-responsive">
                        <table class="table table-striped table-hover table-sm display">
                            <thead>
                                <tr>
                                    <th>Num. Radicado</th>
                                    <th>Fecha de radicación</th>
                                    <th>Tipo de PQR</th>
                                    <th>Tramite PQR</th>
                                    <th>Estado PQR</th>
                                    <th>Plazo de respuesta (Días hábiles)</th>
                                    <th>Dias de vencimiento calendario</th>
                                    <th>Fecha estimada de respuesta</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pqr_S as $pqr)
                                        @php
                                            $diasRecurso = 0;
                                        @endphp
                                    @foreach ($pqr->peticiones as $peticion)
                                        @php
                                            if( $peticion->recurso_dias > 0){
                                                $diasRecurso = $peticion->recurso_dias;
                                            }
                                        @endphp
                                    @endforeach
                                    <tr>
                                        @php
                                        $fechaFinal = date('Y-m-d', strtotime($pqr->fecha_generacion . '+ ' . ($pqr->tiempo_limite) . ' days'));
                                        @endphp
                                        <td>{{ $pqr->radicado }}</td>
                                        <td>{{ $pqr->created_at }}</td>
                                        <td>{{ $pqr->tipoPqr->tipo }}</td>
                                        <td>{{ $pqr->estado->estado_funcionario }}</td>
                                        @php
                                            $diasEstado = dias_estado($pqr->fecha_radicado, $fechaFinal, $pqr->estado->id);
                                        @endphp
                                        @if ($diasEstado == 1)
                                            <td class="bg-green" >
                                                En terminos
                                            </td>
                                        @elseif ($diasEstado == 2)
                                            <td class="bg-yellow">
                                                Proxima a vencer
                                            </td>
                                        @elseif($diasEstado == 3)
                                            <td class="bg-red">
                                                Vencida
                                            </td>
                                        @elseif($diasEstado == 4)
                                            <td class="bg-blue">
                                                Cerrado 
                                            </td>
                                        @endif
                                        <td>{{ $pqr->tipoPqr->tiempos + $pqr->prorroga_dias + $diasRecurso }}</td>
                                        <td>{{ dias_restantes(date('Y-m-d'), $fechaFinal) }}</td>
                                        <td>{{ $fechaFinal }}</td>
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
                                        @php
                                        $fechaFinal = date('Y-m-d', strtotime($concepto->fecha_generacion . '+ ' . ($concepto->tiempo_limite) . ' days'));
                                        @endphp
                                        <td>{{ $concepto->radicado }}</td>
                                        <td>{{ $concepto->created_at }}</td>
                                        <td>{{ $concepto->tipoPqr->tipo }}</td>
                                        <td>{{ $concepto->estado->estado_funcionario }}</td>
                                        @php
                                            $diasEstado = dias_estado($pqr->fecha_radicado, $fechaFinal, $concepto->estado->id);
                                        @endphp
                                        @if ($diasEstado == 1)
                                            <td class="bg-green" >
                                                En terminos
                                            </td>
                                        @elseif ($diasEstado == 2)
                                            <td class="bg-yellow">
                                                Proxima a vencer
                                            </td>
                                        @elseif($diasEstado == 3)
                                            <td class="bg-red">
                                                Vencida
                                            </td>
                                        @elseif($diasEstado == 4)
                                            <td class="bg-blue">
                                                Cerrado 
                                            </td>
                                        @endif
                                        <td>{{ $concepto->tipoPqr->tiempos }}</td>
                                        <td>{{ dias_restantes(date('Y-m-d'),$fechaFinal ) }}</td>
                                        <td>{{ $fechaFinal }}</td>
                                        <td><a href="{{ route('funcionario-gestionarConceptoUOpinion', ['id' => $concepto->id]) }}"
                                                class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                                    class="fa fa-edit text-info btn-editar" aria-hidden="true"></a></td>
                                    </tr>
                                @endforeach
                                @foreach ($solicitudes_datos as $solicitud_datos)
                                    <tr>
                                        @php
                                        $fechaFinal = date('Y-m-d', strtotime($solicitud_datos->fecha_generacion . '+ ' . ($solicitud_datos->tiempo_limite) . ' days'));
                                        @endphp
                                        <td>{{ $solicitud_datos->radicado }}</td>
                                        <td>{{ $solicitud_datos->created_at }}</td>
                                        <td>{{ $solicitud_datos->tipoPqr->tipo }}</td>
                                        <td>{{ $solicitud_datos->estado->estado_funcionario }}</td>
                                        @php
                                            $diasEstado = dias_estado($pqr->fecha_radicado, $fechaFinal, $solicitud_datos->estado->id);
                                        @endphp
                                        @if ($diasEstado == 1)
                                            <td class="bg-green" >
                                                En terminos
                                            </td>
                                        @elseif ($diasEstado == 2)
                                            <td class="bg-yellow">
                                                Proxima a vencer
                                            </td>
                                        @elseif($diasEstado == 3)
                                            <td class="bg-red">
                                                Vencida
                                            </td>
                                        @elseif($diasEstado == 4)
                                            <td class="bg-blue">
                                                Cerrado 
                                            </td>
                                        @endif
                                        <td>{{ $solicitud_datos->tipoPqr->tiempos }}</td>
                                        <td>{{ dias_restantes(date('Y-m-d'),$fechaFinal ) }}</td>
                                        <td>{{ $fechaFinal }}</td>
                                        <td><a href="{{ route('funcionario-gestionarSolicitudDatos', ['id' => $solicitud_datos->id]) }}"
                                                class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                                    class="fa fa-edit text-info btn-editar" aria-hidden="true"></a></td>
                                    </tr>
                                @endforeach
                                @foreach ($denuncias as $denuncia)
                                    <tr>
                                        @php
                                        $fechaFinal = date('Y-m-d', strtotime($denuncia->fecha_generacion . '+ ' . ($denuncia->tiempo_limite) . ' days'));
                                        @endphp
                                        <td>{{ $denuncia->radicado }}</td>
                                        <td>{{ $denuncia->created_at }}</td>
                                        <td>{{ $denuncia->tipoPqr->tipo }}</td>
                                        <td>{{ $denuncia->estado->estado_funcionario }}</td>
                                        @php
                                            $diasEstado = dias_estado($pqr->fecha_radicado, $fechaFinal, $denuncia->estado->id);
                                        @endphp
                                        @if ($diasEstado == 1)
                                            <td class="bg-green" >
                                                En terminos
                                            </td>
                                        @elseif ($diasEstado == 2)
                                            <td class="bg-yellow">
                                                Proxima a vencer
                                            </td>
                                        @elseif($diasEstado == 3)
                                            <td class="bg-red">
                                                Vencida
                                            </td>
                                        @elseif($diasEstado == 4)
                                            <td class="bg-blue">
                                                Cerrado 
                                            </td>
                                        @endif
                                        <td>{{ $denuncia->tipoPqr->tiempos }}</td>
                                        <td>{{ dias_restantes(date('Y-m-d'),$fechaFinal ) }}</td>
                                        <td>{{ $fechaFinal }}</td>
                                        <td><a href="{{ route('funcionario-gestionarDenuncia', ['id' => $denuncia->id]) }}"
                                                class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                                    class="fa fa-edit text-info btn-editar" aria-hidden="true"></a></td>
                                    </tr>
                                @endforeach
                                @foreach ($felicitaciones as $felicitacion)
                                    <tr>
                                        @php
                                        $fechaFinal = date('Y-m-d', strtotime($felicitacion->fecha_generacion . '+ ' . ($felicitacion->tiempo_limite) . ' days'));
                                        @endphp
                                        <td>{{ $felicitacion->radicado }}</td>
                                        <td>{{ $felicitacion->created_at }}</td>
                                        <td>{{ $felicitacion->tipoPqr->tipo }}</td>
                                        <td>{{ $felicitacion->estado->estado_funcionario }}</td>
                                        <td class="bg-blue">Cerrado</td>
                                        <td>{{ $felicitacion->tipoPqr->tiempos }}</td>
                                        <td>{{ dias_restantes(date('Y-m-d'),$fechaFinal ) }}</td>
                                        <td>{{ $fechaFinal }}</td>
                                        <td><a href="{{ route('funcionario-gestionarFelicitacion', ['id' => $felicitacion->id]) }}"
                                                class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                                    class="fa fa-edit text-info btn-editar" aria-hidden="true"></a></td>
                                    </tr>
                                @endforeach
                                @foreach ($solicitudes_doc as $solicitud_doc)
                                    <tr>
                                        @php
                                        $fechaFinal = date('Y-m-d', strtotime($solicitud_doc->fecha_generacion . '+ ' . ($solicitud_doc->tiempo_limite) . ' days'));
                                        @endphp
                                        <td>{{ $solicitud_doc->radicado }}</td>
                                        <td>{{ $solicitud_doc->created_at }}</td>
                                        <td>{{ $solicitud_doc->tipoPqr->tipo }}</td>
                                        <td>{{ $solicitud_doc->estado->estado_funcionario }}</td>
                                        @php
                                            $diasEstado = dias_estado($pqr->fecha_radicado, $fechaFinal, $solicitud_doc->estado->id);
                                        @endphp
                                        @if ($diasEstado == 1)
                                            <td class="bg-green" >
                                                En terminos
                                            </td>
                                        @elseif ($diasEstado == 2)
                                            <td class="bg-yellow">
                                                Proxima a vencer
                                            </td>
                                        @elseif($diasEstado == 3)
                                            <td class="bg-red">
                                                Vencida
                                            </td>
                                        @elseif($diasEstado == 4)
                                            <td class="bg-blue">
                                                Cerrado 
                                            </td>
                                        @endif
                                        <td>{{ $solicitud_doc->tipoPqr->tiempos }}</td>
                                        <td>{{ dias_restantes(date('Y-m-d'),$fechaFinal ) }}</td>
                                        <td>{{ $fechaFinal }}</td>
                                        <td><a href="{{ route('funcionario-gestionarSolicitudDocumentos', ['id' => $solicitud_doc->id]) }}"
                                                class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                                    class="fa fa-edit text-info btn-editar" aria-hidden="true"></a></td>
                                    </tr>
                                @endforeach
                                @foreach ($sugerencias as $sugerencia)
                                    <tr>
                                        @php
                                        $fechaFinal = date('Y-m-d', strtotime($sugerencia->fecha_generacion . '+ ' . ($sugerencia->tiempo_limite) . ' days'));
                                        @endphp
                                        <td>{{ $sugerencia->radicado }}</td>
                                        <td>{{ $sugerencia->created_at }}</td>
                                        <td>{{ $sugerencia->tipoPqr->tipo }}</td>
                                        <td>{{ $sugerencia->estado->estado_funcionario }}</td>
                                        <td class="bg-blue">Cerrado</td>
                                        <td>{{ $sugerencia->tipoPqr->tiempos }}</td>
                                        <td>{{ dias_restantes(date('Y-m-d'),$fechaFinal ) }}</td>
                                        <td>{{ $fechaFinal }}</td>
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
