@extends("extranet.plantilla2")
<!-- ************************************************************* -->
@section('css_pagina')
    <link rel="stylesheet" href="{{ asset('css/extranet/login2.css') }}">
@endsection
@section('cuerpo_pagina')
    <div class="row d-flex justify-content-center">
        <div class=" col-12 col-md-9">
            <div class="row mt-5">
                <!-- Brand Box -->
                <div class="col-sm-6 brand">
                    <div class="heading text-center">
                        <img class="img-fluid" src="{{ asset('imagenes/sistema/' . $parametro->logo) }}" alt=""
                            style="max-width: 120px">
                        <h3 class="mt-3">Bienvenido</h3>
                        <p>Sistema de Registro de Peticiones,Quejas y Reclamos</p>
                    </div>
                </div>
                <!-- Form Box -->
                <div class="col-sm-6 form">
                    <!-- Signup Form -->
                    <div class="signup form-peice switched">
                        <form class="signup-form" action="#" method="post">
                            <div class="form-group">
                                <label for="tipo_persona">Tipo persona</label>
                                <select class="form-control form-control-sm" name="tipo_persona" id="tipo_persona" required>
                                    <option value="2">Persona natural</option>
                                    <option value="1">Persona Jurídica</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="labelinput" for="email">Email Adderss</label>
                                <input type="email" name="emailAdress" id="email" class="email">
                            </div>
                            <div class="form-group">
                                <label class="labelinput" for="phone">Phone Number - <small>Optional</small></label>
                                <input type="text" name="phone" id="phone">
                            </div>
                            <div class="form-group">
                                <label class="labelinput" for="password">Password</label>
                                <input type="password" name="password" id="password" class="pass">
                                <span class="error"></span>
                            </div>
                            <div class="form-group">
                                <label class="labelinput" for="passwordCon">Confirm Password</label>
                                <input type="password" name="passwordCon" id="passwordCon" class="passConfirm">
                                <span class="error"></span>
                            </div>
                            <div class="CTA">
                                <input type="submit" value="Signup Now" id="submit">
                                <a href="#" class="switch">Iniciar sesión</a>
                            </div>
                        </form>
                    </div>
                    <!-- End Signup Form -->
                    <!-- Login Form -->
                    <div class="login form-peice">
                        <form class="login-form" action="#" method="post">
                            <div class="form-group">
                                <label class="labelinput" for="loginemail">Usuario</label>
                                <input type="text" name="usuario" id="loginemail" required>
                            </div>
                            <div class="form-group">
                                <label class="labelinput" for="loginPassword">Contraseña</label>
                                <input type="password" name="loginPassword" id="loginPassword" required>
                            </div>
                            <div class="CTA">
                                <input type="submit" value="Iniciar Sesión">
                                <a href="#" class="switch">Registrarse</a>
                            </div>
                        </form>
                    </div>
                    <!-- End Login Form -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script_pagina')
    <script src="{{ asset('js/extranet/login.js') }}"></script>
@endsection
