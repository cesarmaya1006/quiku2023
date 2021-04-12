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
                                <div class="col-md-12 mb-3">
                                    <label class="requerido" for="password1">Contraseña nueva</label>
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
@section('script_pagina')

@endsection
