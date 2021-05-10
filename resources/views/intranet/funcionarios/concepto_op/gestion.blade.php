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
        <div class="col-12 col-md-11 d-flex align-items-stretch flex-column">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Gestión a Consulta u Opinión Número de radicado:
                        <strong>{{ $concepto->radicado }}</strong>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            @if ($concepto->persona_id != null)
                            Persona que interpone la Consulta u Opinión:
                            <strong>{{ $concepto->persona->nombre1 . ' ' . $concepto->persona->nombre2 . ' ' .
                                $concepto->persona->apellido1 . ' ' . $concepto->persona->apellido2 }}</strong>
                            @else
                            Empresa que interpone la Consulta u Opinión:
                            <strong>{{ $concepto->empresa->razon_social . ' ' . $concepto->empresa->razon_social . ' ' .
                                $concepto->empresa->razon_social . ' ' . $concepto->empresa->razon_social }}</strong>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            @foreach ($concepto->consultas as $consulta)
                                            <div class="row">
                                                <div class="col-12">
                                                    <h5>Consulta:</h5>
                                                </div>
                                                <div class="col-12">
                                                    <p>{{ $consulta->consulta}}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <h6>Hechos</h6>
                                                </div>
                                                <div class="col-12">
                                                    <table class="table table-light">
                                                        <tbody>
                                                            @foreach ($consulta->hechos as $hecho)
                                                            <tr>
                                                                <td><p>{{ $hecho->hecho }}</p></td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <h6>Anexos</h6>
                                                </div>
                                                <div class="col-12">
                                                    <table class="table table-light">
                                                        <tbody>
                                                            @foreach ($consulta->documentos as $documento)
                                                            <tr>
                                                                <td><p>{{ $documento->titulo }}</p></td>
                                                                <td><p>{{ $documento->descripcion }}</p></td>
                                                                <td><a href="{{ asset('documentos/conceptouopinion/' . $documento->url) }}" target="_blank"
                                                                        rel="noopener noreferrer">Descargar</a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <hr>
                                            @endforeach
                                        </div>
                                        <div class="col-12 col-md-6"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex">
                            <h6>Aclaraciones</h6>
                            <button class="btn btn-info">Solicitar aclaracion</button>
                        </div>
                        <div class="col-12">
                            <form class="row" action="" method="post">

                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
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