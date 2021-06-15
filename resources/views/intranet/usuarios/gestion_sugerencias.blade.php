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
                    <h3 class="card-title">Sugerencia - Número de radicado:
                        <strong>{{ $sugerencia->radicado }}</strong>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="col-12 rounded border mb-3 p-2">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                @if ($sugerencia->persona_id != null)
                                Persona que interpone la Petición:
                                <strong>{{ $sugerencia->persona->nombre1 . ' ' . $sugerencia->persona->nombre2 . ' ' .
                                    $sugerencia->persona->apellido1 . ' ' . $sugerencia->persona->apellido2 }}</strong>
                                @else
                                Empresa que interpone la Petición:
                                <strong>{{ $sugerencia->empresa->razon_social . ' ' . $sugerencia->empresa->razon_social . ' ' .
                                    $sugerencia->empresa->razon_social . ' ' . $sugerencia->empresa->razon_social }}</strong>
                                @endif
                            </div>
                            <div class="col-12 col-md-6">
                                Tipo petición: <strong>{{ $sugerencia->tipoPQR->tipo }}</strong>
                            </div>
                            @if ($sugerencia->sede_id)
                                <div class="col-12 col-md-6">
                                    Departatmento : <strong>{{ $sugerencia->sede->municipio->departamento->departamento
                                        }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Municipio : <strong>{{ $sugerencia->sede->municipio->municipio }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Sede : <strong>{{ $sugerencia->sede->nombre }}</strong>
                                </div>
                            @endif
                            <div class="col-12 col-md-6">
                                Fecha de radicado: <strong>{{ $sugerencia->fecha_radicado }}</strong>
                            </div>
                            <div class="col-12 col-md-6">
                                Fecha estimada de respuesta:
                                <strong>{{ date('Y-m-d', strtotime($sugerencia->fecha_generacion . '+ ' .
                                    ($sugerencia->tiempo_limite) . ' days')) }}</strong>
                            </div>
                            <div class="col-12 col-md-6">
                                Estado: <strong>{{ $sugerencia->estado->estado_funcionario }}</strong>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: solid 4px black">
                    <div class="col-12 peticion_general rounded border mb-3 p-2">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="col-12">
                                                    <h5>Sugerencia</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <h6>Hechos</h6>
                            </div>
                            <div class="col-12">
                                <table class="table table-light">
                                    <tbody>
                                        @foreach ($sugerencia->hechos as $hecho)
                                        <tr>
                                            <td>{{ $hecho->hecho }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <h6>Sugerencia</h6>
                            </div>
                            <div class="col-12">
                                <table class="table table-light">
                                    <tbody>
                                        <tr>
                                            <td>{{ $sugerencia->sugerencia }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        @if (isset($sugerencia->documentos))
                        <div class="row">
                            <div class="col-12">
                                <div class="col-12">
                                    <h6>Anexos de sugerencia</h6>
                                </div>
                                <table class="table table-light">
                                    <tbody>
                                        @foreach ($sugerencia->documentos as $anexo)
                                        <tr>
                                            <td>{{ $anexo->titulo }}</td>
                                            <td>{{ $anexo->descripcion }}</td>
                                            <td><a href="{{ asset('documentos/respuestas/' . $anexo->url) }}"
                                                    target="_blank" rel="noopener noreferrer">Descargar</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="{{route('usuario-index')}}" class="btn btn-danger px-5 ">Salir</i></a>
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
