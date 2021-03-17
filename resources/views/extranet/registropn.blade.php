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
        <div class="col-10 mt-5">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Registro</h5>
              <h5 class="card-title">Datos Persona Natural</h5>
              <div class="card-text mt-5">
                  <form>
                    <div class="form-row row">
                      <div class="form-group mt-3 col-md-6">
                        <label for="tipodocumento">Tipo documento</label>
                        <select class="form-control" name="tipodocumento" id="tipodocumento" required>
                          <option value="">--Seleccione--</option>
                          <option value="1">CC</option>
                          <option value="2">CE</option>
                          <option value="3">Pasaporte</option>
                        </select>
                      </div>
                      <div class="form-group mt-3 col-md-6">
                        <label for="numerodocumento">Número de documento</label>
                        <input type="text" class="form-control" id="numerodocumento" placeholder="Número documento" required>
                      </div>
                    </div>
                    <div class="form-row row mt-3">
                      <div class="col-md-6 mb-3">
                        <label for="primernombre">Primer Nombre</label>
                        <input type="text" class="form-control" id="primernombre" placeholder="Primer Nombre" name="primernombre" required>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="segundonombre">Segundo Nombre</label>
                        <input type="text" class="form-control" id="segundonombre" placeholder="Segundo Nombre" name="segundonombre" required>
                      </div>
                    </div>
                    <div class="form-row row mt-3">
                      <div class="col-md-6 mb-3">
                        <label for="primerapellido">Primer Apellido</label>
                        <input type="text" class="form-control" id="primerapellido" placeholder="Primer Apellido" name="primerapellido" required>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="segundoapelldio">Segundo Apellido</label>
                        <input type="text" class="form-control" id="segundoapelldio" placeholder="Segundo Apellido" name="segundoapelldio" required>
                      </div>
                    </div>
                    <div class="form-row row mt-3">
                      <div class="col-md-6 mb-3">
                        <label for="telefonofijo">Teléfono fijo</label>
                        <input type="text" class="form-control" id="telefonofijo" placeholder="Teléfono fijo" name="telefonofijo" required>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="telefonocelular">Teléfono Celular</label>
                        <input type="text" class="form-control" id="telefonocelular" placeholder="Teléfono Celular" name="telefonocelular" required>
                      </div>
                    </div>
                    <div class="form-row row">
                      <div class="form-group mt-3 col-md-6">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" id="direccion" placeholder="Dirección" name="direccion" required>
                      </div>
                      <div class="form-group mt-3 col-md-6">
                        <label for="pais">País</label>
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
                        <label for="departamento">Departamento</label>
                        <select class="form-control" name="departamento" id="departamento" required>
                          <option value="">--Seleccione--</option>
                          <option value="1">Cundinamarca</option>
                          <option value="2">Antioquia</option>
                          <option value="3">Amazonas</option>
                        </select>
                      </div>
                      <div class="form-group mt-3 col-md-6">
                        <label for="ciudad">Ciudad</label>
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
                        <label for="nacionalidad">Nacionalidad</label>
                        <input type="text" class="form-control" id="nacionalidad" placeholder="Nacionalidad" name="nacionalidad" required>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="grado">Último grado de educación obtenido</label>
                        <select class="form-control" name="grado" id="grado" required>
                          <option value="">--Seleccione--</option>
                      </select>
                      </div>
                    </div>
                    <div class="form-row row mt-3">
                      <div class="col-md-6 mb-3">
                        <label for="grado">Elija su Genero</label>
                        <select class="form-control" name="grado" id="grado" required>
                          <option value="">--Seleccione--</option>
                          <option value="">Femenino</option>
                          <option value="">Masculino</option>
                        </select>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="fechanacimiento">Fecha nacimiento</label>
                        <input type="date" class="form-control" id="fechanacimiento" name="fechanacimiento" required>
                      </div>
                    </div>
                    <div class="form-row row mt-3">
                      <div class="col-md-6 mb-3">
                        <label for="grupoetnico">Grupo Étnico</label>
                        <select class="form-control" name="grupoetnico" id="grupoetnico" required>
                          <option value="">--Seleccione--</option>
                        </select>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="discapacidad">Es usted persona en condición de discapacidad?</label>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="discapacidad1" name="discapacidad" class="custom-control-input">
                          <label class="custom-control-label" for="discapacidad1">Si</label>
                          <input type="radio" id="discapacidad2" name="discapacidad" class="custom-control-input">
                          <label class="custom-control-label" for="discapacidad2">No</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="tipodiscapacidad">Tipo discapacidad?</label>
                        <select class="form-control" name="tipodiscapacidad" id="tipodiscapacidad" required>
                            <option value="">--Seleccione--</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                      <label for="email">Correo electrónico</label>
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
