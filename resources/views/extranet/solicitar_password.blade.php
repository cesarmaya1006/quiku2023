@extends("extranet.plantilla")
<!-- ************************************************************* -->
@section('css_pagina')
    <link rel="stylesheet" href="{{ asset('css/extranet/login.css') }}">
@endsection
@section('cuerpo_pagina')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-sm-10 col-11 mt-4">
                <div class="card">
                    @include('includes.error-form')
                    @include('includes.mensaje')
                    <div class="card-body">
                        <h5 class="card-title">Cambiar Contraseña</h5>
                        <div class="card-text mt-5 justify-content-center">
                            <form action="{{ route('solicitar_password') }}" method="POST" autocomplete="off">
                                @csrf
                                @method('post')
                                <div class="form-group mt-3">
                                    <p>Ingresa el correo electrónico que tienes asociado a tu cuenta. Te enviaremos un correo electrónico desde el que prodrás cambiar tu Contraseña</p>
                                </div>
                                <div class="form-group mt-3">
                                    <label class="requerido" for="email">Correo electrónico</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Correo electrónico" required>
                                </div>
                                <div class="justify-content-end d-flex">
                                    <button class="mt-3 btn btn-primary" type="submit">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script_pagina')

@endsection
