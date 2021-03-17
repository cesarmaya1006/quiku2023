@extends("extranet.plantilla")
<!-- ************************************************************* -->
@section('css_pagina')
<link rel="stylesheet" href="{{asset('css/extranet/login.css')}}">
@endsection
@section('cuerpo_pagina')
<div class="header container-fluid">
    <h2 class="container"><a href="/index.html">Acme.</a></h2>
  </div class="header container-fluid">
  <div class="container">
      <div class="row justify-content-center">
        <div class="col-8 mt-5">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Confirmacion de registro</h5>
              <div class="card-text mt-5">
                  <div class="row">
                      <div class="col-12">
                        <h6>Para continuar con el registro, se ha enviado un enlace al correo ingresado. Por favor verifique el buzón de entrada o revise la carpeta de correo no deseado</h6>
                      </div>
                      <br>
                      <div class="col-12">
                          <a href="{{route('index')}}" class="btn btn-primary btn-sm"> Volver</a>
                      </div>
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
