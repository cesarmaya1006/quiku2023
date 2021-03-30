@extends("extranet.plantilla")
<!-- ************************************************************* -->
@section('css_pagina')
    <link rel="stylesheet" href="{{ asset('css/extranet/login.css') }}">
@endsection
@section('cuerpo_pagina')
    <div class="container index">
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-10 col-sm-8 col-md-3 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Iniciar sesión</h5>
                            <div class="card-text mt-5">
                                <form action="{{ route('login') }}" method="post" autocomplete="off">
                                    @method('post')
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label class="requerido" for="validationDefault01">Usuario</label>
                                            <input type="text" class="form-control" id="usuario" name="usuario"
                                                placeholder="usuario" required>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="requerido" for="validationDefault02">Contraseña</label>
                                            <input type="password" class="form-control" id="pasaporte" name="password"
                                                placeholder="Contraseña" required>
                                        </div>
                                    </div>
                                    <div class="centrar-items">
                                        <button class="mt-3 btn btn-primary" type="submit">Iniciar sesión</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-sm-8 col-md-3 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">registro</h5>
                            <p class="card-text mt-5">
                                t is a long established fact that a reader will be distracted by the readable content of a
                                page
                                when looking at its layout. The point of using Lorem Ipsum
                            </p>
                            <div class="centrar-items">
                                <a href="{{ route('registro_ini') }}" class="mt-3 btn btn-primary">Regístrese</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-sm-8 col-md-3 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">preguntas frecuentes</h5>
                            <p class="card-text mt-4">
                                There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered
                                alteration in some form, by injected humour, or randomised words which don't look even
                                slightly
                                believable.
                            </p>
                            <div class="centrar-items">
                                <a href="preguntas.html" class="mt-3 btn btn-primary">Ir al sitio</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-11 col-md-6">
                    @include('includes.error-form')
                    @include('includes.mensaje')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script_pagina')

@endsection
