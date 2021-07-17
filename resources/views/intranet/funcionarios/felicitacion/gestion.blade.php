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
                    <h3 class="card-title">Felicitaciones - Número de radicado:
                        <strong>{{ $felicitacion->radicado }}</strong>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="col-12 rounded border mb-3 p-2">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                @if ($felicitacion->persona_id != null)
                                Persona que interpone la Petición:
                                <strong>{{ $felicitacion->persona->nombre1 . ' ' . $felicitacion->persona->nombre2 . ' ' .
                                    $felicitacion->persona->apellido1 . ' ' . $felicitacion->persona->apellido2 }}</strong>
                                @else
                                Empresa que interpone la Petición:
                                <strong>{{ $felicitacion->empresa->razon_social . ' ' . $felicitacion->empresa->razon_social . ' ' .
                                    $felicitacion->empresa->razon_social . ' ' . $felicitacion->empresa->razon_social }}</strong>
                                @endif
                            </div>
                            <div class="col-12 col-md-6">
                                Tipo petición: <strong>{{ $felicitacion->tipoPQR->tipo }}</strong>
                            </div>
                            @if ($felicitacion->sede_id)
                                <div class="col-12 col-md-6">
                                    Departatmento : <strong>{{ $felicitacion->sede->municipio->departamento->departamento
                                        }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Municipio : <strong>{{ $felicitacion->sede->municipio->municipio }}</strong>
                                </div>
                                <div class="col-12 col-md-6">
                                    Sede : <strong>{{ $felicitacion->sede->nombre }}</strong>
                                </div>
                            @endif
                            <div class="col-12 col-md-6">
                                Fecha de radicado: <strong>{{ $felicitacion->fecha_radicado }}</strong>
                            </div>
                            <div class="col-12 col-md-6">
                                Fecha estimada de respuesta:
                                <strong>{{ date('Y-m-d', strtotime($felicitacion->fecha_generacion . '+ ' .
                                    ($felicitacion->tiempo_limite) . ' days')) }}</strong>
                            </div>
                            <div class="col-12 col-md-6">
                                Estado: <strong>{{ $felicitacion->estado->estado_funcionario }}</strong>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: solid 4px black">
                    <div class="col-12 peticion_general rounded border mb-3 p-2">
                        @foreach ($felicitacion->peticiones as $peticion)
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="col-12">
                                                        <h5>Felicitaciones</h5>
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
                                            @foreach ($peticion->hechos as $hecho)
                                            <tr>
                                                <td class="text-justify">{{ $hecho->hecho }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <h6>Nombre de funcionario</h6>
                                </div>
                                <div class="col-12">
                                    <table class="table table-light">
                                        <tbody>
                                            <tr>
                                                <td class="text-justify">{{ $peticion->nombre_funcionario }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <div class="col-12 col-md-12">
                                    <h6>Escriba sus felicitaciones</h6>
                                </div>
                                <div class="col-12">
                                    <table class="table table-light">
                                        <tbody>
                                            <tr>
                                                <td class="text-justify">{{ $peticion->felicitacion }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="{{route('funcionario-index')}}" class="btn btn-primary px-5 ">Salir</i></a>
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
