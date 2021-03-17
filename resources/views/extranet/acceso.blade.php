@extends("extranet.plantilla")
<!-- ************************************************************* -->
@section('css_pagina')
    <link rel="stylesheet" href="{{ asset('css/extranet/login.css') }}">
@endsection
@section('cuerpo_pagina')
    <div class="container">
        <div class="container mt-3">
            <h4 class="titulo-principal"></h4>
        </div>
        <div class="row justify-content-center">
            <div class="col-10 col-sm-8 col-md-4 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Iniciar sesión</h5>
                        <div class="card-text mt-5">
                            <form>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationDefault01">Usuario</label>
                                        <input type="text" class="form-control" id="usuario" placeholder="usuario" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationDefault02">Contraseña</label>
                                        <input type="password" class="form-control" id="pasaporte" placeholder="Contraseña"
                                            required>
                                    </div>
                                </div>
                                <button class="mt-3 btn btn-primary" type="submit">Iniciar sesión</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 col-sm-8 col-md-4 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">registro</h5>
                        <p class="card-text mt-5">
                            t is a long established fact that a reader will be distracted by the readable content of a page
                            when looking at its layout. The point of using Lorem Ipsum
                        </p>
                        <a href="{{ route('registro_ini') }}" class="mt-3 btn btn-primary">Regístrese</a>
                    </div>
                </div>
            </div>
            <div class="col-10 col-sm-8 col-md-4 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">preguntas frecuentes</h5>
                        <p class="card-text mt-5">
                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                            alteration in some form, by injected humour, or randomised words which don't look even slightly
                            believable.
                        </p>
                        <a href="preguntas.html" class="mt-3 btn btn-primary">Ir al sitio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script_pagina')

@endsection
