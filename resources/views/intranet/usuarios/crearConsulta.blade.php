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
    Sistema de informaci&oacute;n
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            {{-- Consulta --}}
            <div class="col-12">
                <div class="card card-primary pb-4">
                    <div class="card-header">
                        <h3 class="card-title">Crear Consulta</h3>
                    </div>
                    <form action="{{ route('usuario-generarConsulta-guardar') }}" method="POST" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        @if ($usuario->persona)
                            <input type="hidden" name="persona_id" value="{{ $usuario->persona->id }}">
                        @endif
                        @if ($usuario->representante)
                            <input type="hidden" name="empresa_id" value="{{ $usuario->representante->empresa->id }}">
                        @endif
                        <input type="hidden" name="fecha_generacion" value="{{ date('Y-m-d') }}">
                        <input type="hidden" name="fecha_radicado"
                            value="{{ date('Y-m-d', strtotime(date('Y-m-d') . '+ 1 days')) }}">
                        <div class="row d-flex card-body pl-md-5 pr-md-5">
                            <div class="col-12 col-md-6 form-group">
                                <label for="consulta">Consulta</label>
                                <input class="form-control form-control-sm" name="consulta" id="consulta" type="text">
                            </div>
                            <div class="col-12 col-md-6 form-group">
                                <label for="justificacion">Justificacion</label>
                                <input class="form-control form-control-sm" name="justificacion" id="justificacion"
                                    type="text">
                            </div>
                            <div class="col-12 col-md-6 form-group">
                                <label for="">Anexos o Pruebas</label>
                                <input class="form-control form-control-sm" type="file" id="documentos[]"
                                    name="documentos[]" multiple="">
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-star pl-md-5">
                            <button type="submit" class="btn btn-primary btn-sombra btn-xs px-4 pl-5 pr-5">Crear</button>
                        </div>
                    </form>
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
