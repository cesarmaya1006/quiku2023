@extends("extranet.plantilla")
<!-- ************************************************************* -->
@section('css_pagina')
<link rel="stylesheet" href="{{asset('css/extranet/login.css')}}">
@endsection
@section('cuerpo_pagina')
  <div class="container">
      <div class="row justify-content-center">
        <div class="col-10 mt-5">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Registro</h5>
              <h5 class="card-title">DATOS PERSONA JURÍDICA</h5>
              <div class="card-text mt-5">
                  <form>
                    <div class="form-row row">
                      <div class="form-group mt-3 col-md-6">
                        <label class="requerido" for="tipodocumento">Tipo documento</label>
                        <select class="form-control" name="tipodocumento" id="tipodocumento" required>
                          <option value="">--Seleccione--</option>
                          <option value="1">CC</option>
                          <option value="2">CE</option>
                          <option value="3">Pasaporte</option>
                          <option value="4">NIT</option>
                        </select>
                      </div>
                      <div class="form-group mt-3 col-md-6">
                        <label class="requerido" for="numerodocumento">Número de documento</label>
                        <input type="text" class="form-control" id="numerodocumento" placeholder="Número documento" required>
                      </div>
                    </div>
                    <div class="form-row row mt-3">
                      <div class="col-md-12 mb-3">
                        <label class="requerido" for="primernombre">Razón Social</label>
                        <input type="text" class="form-control" id="primernombre" placeholder="Primer Nombre" name="primernombre" required>
                      </div>
                    </div>
                    <div class="form-row row">
                      <div class="form-group mt-3 col-md-6">
                        <label class="requerido" for="direccion">Dirección</label>
                        <input type="text" class="form-control" id="direccion" placeholder="Dirección" name="direccion" required>
                      </div>
                      <div class="form-group mt-3 col-md-6">
                        <label class="requerido" for="pais">País</label>
                        <select class="form-control" name="pais" id="pais" required>
                          <option value="">--Seleccione--</option>
                          <option value="1">Colombia</option>
                          <option value="2">Venezuela</option>
                          <option value="3">Ecuador</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-row row">
                      <div class="form-group mt-3 col-md-6">
                        <label class="requerido" for="departamento">Departamento</label>
                        <select class="form-control" name="departamento" id="departamento" required>
                          <option value="">--Seleccione--</option>
                          <option value="1">Cundinamarca</option>
                          <option value="2">Antioquia</option>
                          <option value="3">Amazonas</option>
                        </select>
                      </div>
                      <div class="form-group mt-3 col-md-6">
                        <label class="requerido" for="ciudad">Ciudad</label>
                        <select class="form-control" name="ciudad" id="ciudad" required>
                          <option value="">--Seleccione--</option>
                          <option value="1">Bogotá</option>
                          <option value="2">Medellín</option>
                          <option value="3">Leticia</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-row row mt-3">
                      <div class="col-md-6 mb-3">
                        <label for="telefonofijo">Teléfono fijo</label>
                        <input type="text" class="form-control" id="telefonofijo" placeholder="Teléfono fijo" name="telefonofijo">
                      </div>
                      <div class="col-md-6 mb-3">
                        <label class="requerido" for="telefonocelular">Teléfono Celular</label>
                        <input type="text" class="form-control" id="telefonocelular" placeholder="Teléfono Celular" name="telefonocelular" required>
                      </div>
                    </div>
                    <div class="form-group mt-3">
                      <label class="requerido" for="email">Correo electrónico</label>
                      <input type="email" class="form-control" id="email" placeholder="Correo electrónico" required>
                      <p>Al diligenciar su correo electrónico, está aceptando que las respuestas y comunicaciones sobre sus peticiones, quejas y reclamos, sean enviadas a esta dirección.</p>
                    </div>
                    <button class="mt-3 btn btn-primary" type="submit">Continuar</button>
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
