@extends("extranet.plantilla")
<!-- ************************************************************* -->
@section('css_pagina')
    <link rel="stylesheet" href="{{ asset('css/extranet/login.css') }}">
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
                            <form action="{{ route('registropn-guardar') }}" method="POST" autocomplete="off">
                                @csrf
                                @method('post')
                                <div class="form-row row">
                                    <div class="form-group mt-3 col-md-6">
                                        <label class="requerido" for="tipodocumento">Tipo documento</label>
                                        <select class="form-control" name="docutipos_id" id="docutipos_id" required
                                            readonly="true">
                                            <option value="">--Seleccione un tipo--</option>
                                            @foreach ($tipos_docu as $tipodocu)
                                                <option value="{{ $tipodocu->id }}"
                                                    {{ $tipodocu->id == $docutipos_id ? 'selected' : '' }}>
                                                    {{ $tipodocu->abreb_id }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mt-3 col-md-6">
                                        <label for="numerodocumento">Número de documento</label>
                                        <input type="text" class="form-control" id="numerodocumento"
                                            placeholder="Número documento" value="{{ $identificacion }}" required
                                            readonly="true">
                                    </div>
                                </div>
                                <div class="form-row row mt-3">
                                    <div class="col-md-6 mb-3">
                                        <label class="requerido" for="primernombre">Primer Nombre</label>
                                        <input type="text" class="form-control" id="primernombre"
                                            placeholder="Primer Nombre" name="primernombre" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="segundonombre">Segundo Nombre</label>
                                        <input type="text" class="form-control" id="segundonombre"
                                            placeholder="Segundo Nombre" name="segundonombre">
                                    </div>
                                </div>
                                <div class="form-row row mt-3">
                                    <div class="col-md-6 mb-3">
                                        <label class="requerido" for="primerapellido">Primer Apellido</label>
                                        <input type="text" class="form-control" id="primerapellido"
                                            placeholder="Primer Apellido" name="primerapellido" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="segundoapelldio">Segundo Apellido</label>
                                        <input type="text" class="form-control" id="segundoapelldio"
                                            placeholder="Segundo Apellido" name="segundoapelldio">
                                    </div>
                                </div>
                                <div class="form-row row mt-3">
                                    <div class="col-md-6 mb-3">
                                        <label for="telefonofijo">Teléfono fijo</label>
                                        <input type="text" class="form-control" id="telefonofijo"
                                            placeholder="Teléfono fijo" name="telefonofijo">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="requerido" for="telefonocelular">Teléfono Celular</label>
                                        <input type="text" class="form-control" id="telefonocelular"
                                            placeholder="Teléfono Celular" name="telefonocelular" required>
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="form-group mt-3 col-md-6">
                                        <label class="requerido" for="direccion">Dirección</label>
                                        <input type="text" class="form-control" id="direccion" placeholder="Dirección"
                                            name="direccion" required>
                                    </div>
                                    <div class="form-group mt-3 col-md-6">
                                        <label for="pais">País</label>
                                        <select class="form-control" name="pais" id="pais" required>
                                            <option value="">--Seleccione--</option>
                                            @foreach ($paises as $pais)
                                                <option value="{{ $pais->id }}"
                                                    {{ $pais->pais == 'Colombia' ? 'selected' : '' }}>{{ $pais->pais }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row row" id="caja_departamento">
                                    <div class="form-group mt-3 col-md-6">
                                        <label for="departamento">Departamento</label>
                                        <select class="form-control departamentos" id="departamento"
                                            data_url="{{ route('cargar_municipios') }}" required>
                                            <option value="">--Seleccione--</option>
                                            @foreach ($departamentos as $departamento)
                                                <option value="{{ $departamento->id }}">
                                                    {{ $departamento->departamento }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mt-3 col-md-6">
                                        <label for="municipio_id">Ciudad</label>
                                        <select class="form-control" name="municipio_id" id="municipio_id" required>
                                            <option value="">--Seleccione--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row row mt-3">
                                    <div class="col-md-6 mb-3">
                                        <label for="nacionalidad">Nacionalidad</label>
                                        <input type="text" class="form-control" id="nacionalidad" placeholder="Nacionalidad"
                                            name="nacionalidad" required>
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
                                        <input type="date" class="form-control" id="fechanacimiento" name="fechanacimiento"
                                            required>
                                    </div>
                                </div>
                                <div class="form-row row mt-3">
                                    <div class="col-md-6 mb-3">
                                        <label for="grupoetnico">Grupo Étnico</label>
                                        <select class="form-control" name="grupoetnico" id="grupoetnico" required>
                                            <option value="">--Seleccione--</option>
                                            <option value="1">Sin pertenencia étnica</option>
                                            <option value="2">Negro, mulato, afrodescendiente, afrocolombiano</option>
                                            <option value="3">Indígena</option>
                                            <option value="4">Raizal</option>
                                            <option value="5">Palenquero</option>
                                            <option value="6">Gitano</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="discapacidad">Es usted persona en condición de discapacidad?</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="discapasidad"
                                                id="discapacidad1" value="si">
                                            <label class="form-check-label" for="discapacidad1">
                                                Sí
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="discapasidad"
                                                id="discapacidad2" value="no" checked>
                                            <label class="form-check-label" for="discapacidad2">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3 d-none" id="tipodiscapacidadcaja">
                                    <label for="tipodiscapacidad">Tipo discapacidad?</label>
                                    <select class="form-control" name="tipodiscapacidad" id="tipodiscapacidad" required>
                                        <option value="">--Seleccione--</option>
                                        <option value="1">Incapacidad Permanente Parcial</option>
                                        <option value="2">Incapacidad Permanente Total</option>
                                        <option value="3">Incapacidad Permanente Total Cualificada</option>
                                        <option value="4">Incapacidad Permanente Absoluta</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="email">Correo electrónico</label>
                                    <input type="email" class="form-control" id="email" placeholder="Correo electrónico"
                                        value="{{ $email }}" required>
                                    <p>Al diligenciar su correo electrónico, está aceptando que las respuestas y
                                        comunicaciones sobre sus peticiones, quejas y reclamos, sean enviadas a esta
                                        dirección.</p>
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
    <script src="{{ asset('js/extranet/registro.js') }}"></script>
@endsection
