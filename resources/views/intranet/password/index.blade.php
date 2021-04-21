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
            <div class="col-12 col-md-8">
                @include('includes.error-form')
                @include('includes.mensaje')
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="card-title">Cambiar contraseña</h5>
                    </div>
                    <div class="card-body">
                        <div class="card-text mt-2 justify-content-center">
                            <form action="{{ route('admin-restablecer_password') }}" method="POST" autocomplete="off">
                                @csrf
                                @method('post')
                                <div class="col-md-12 mb-3">
                                    <label class="requerido" for="password1">Contraseña nueva</label>
                                    <input type="hidden" name="id" value="{{ session('id_usuario') }}">
                                    <input type="password" class="form-control" id="password1" name="password1"
                                        placeholder="Contraseña" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="requerido" for="password2">Confirmar la nueva contraseña</label>
                                    <input type="password" class="form-control" id="password2" name="password2"
                                        placeholder="Contraseña" required>
                                </div>
                                <div class="justify-content-end d-flex">
                                    <button class="mt-3 btn btn-primary" type="submit">Cambiar</button>
                                </div>
                            </form>
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
    <script src="{{ asset('js/extranet/registro.js') }}"></script>
@endsection
<!-- ************************************************************* -->
