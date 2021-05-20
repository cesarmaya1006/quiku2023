@extends("extranet.plantilla")
<!-- ************************************************************* -->
@section('css_pagina')
    <link rel="stylesheet" href="{{ asset('css/extranet/login.css') }}">
@endsection
@section('cuerpo_pagina')
    <div class="container index">
        <div class="container mt-3">
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-11 col-md-6">
                    @include('includes.error-form')
                    @include('includes.mensaje')
                </div>
            </div>
            <div class="row justify-content-center" style="font-size: 0.8em;">
                <div class="col-10 col-sm-8 col-md-3 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Iniciar sesión</h5>
                            <div class="card-text mt-3">
                                <form action="{{ route('login') }}" method="post" autocomplete="off">
                                    @method('post')
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-12 mb-1">
                                            <label class="requerido" for="validationDefault01">Usuario</label>
                                            <input type="text" class="form-control form-control-sm" id="usuario"
                                                name="usuario" placeholder="usuario" required>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="requerido" for="validationDefault02">Contraseña</label>
                                            <input type="password" class="form-control form-control-sm" id="password"
                                                name="password" placeholder="Contraseña" required>
                                        </div>
                                    </div>
                                    <div class="centrar-items">
                                        <button class="mt-2 btn btn-primary" type="submit">Iniciar sesión</button>
                                    </div>
                                    <div class="centrar-items mt-2">
                                        <p><a class="card-text" href="{{ route('solicitar_password') }}">¿Olvidé mi nombre
                                                de usuario o contraseña?</a></p>
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
                            <p class="card-text mt-5">¿Ya tiene una cuenta? Para acceder a nuestro sistema de registro de
                                peticiones, quejas y reclamos debe estar registrado</p>
                            <div class="centrar-items">
                                <a href="{{ route('registro_ini') }}" class="mt-3 btn btn-primary">Registrarse</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-sm-8 col-md-3 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">preguntas frecuentes</h5>
                            <p class="card-text mt-4">Tienes dudas? Ingresa y conoce las respuestas a las preguntas más
                                frecuentes que nos realizan nuestros usuarios.</p>
                            <div class="centrar-items">
                                <a href="{{ route('preguntas_frecuentes') }}" class="mt-3 btn btn-primary">Ir al sitio</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script_pagina')

@endsection
