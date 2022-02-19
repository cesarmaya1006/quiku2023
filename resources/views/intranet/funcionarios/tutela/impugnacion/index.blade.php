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
    {{-- Sistema de informaci&oacute;n PQR LEGAL PROCEEDINGS --}}
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
                        <h3 class="card-title">Tutela con número de radicado:
                            <strong>{{ $tutela->radicado }}</strong>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <h6>Registro de Impugnación</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('tutelas_primera_instancia_guardar', ['id' => $tutela->id]) }}"
                                    class="form-horizontal row" method="POST" autocomplete="off"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('post')

                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit"
                                            class="btn btn-primary btn-sm btn-sombra pl-4 pr-4">Guardar</button>
                                        <a href="{{ route('detalles_tutelas', ['id' => $tutela->id]) }}"
                                            class="btn btn-danger btn-sm btn-sombra mx-2 px-4 float-end">Regresar</a>
                                    </div>
                                    <!-- /.card-footer -->
                                </form>
                            </div>
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
    <script src="{{ asset('js/intranet/tutela/sentenciap.js') }}"></script>
@endsection
<!-- ************************************************************* -->
