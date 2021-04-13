{{-- <div class="row">
    <div class="col-12">
        {{ $usuario->persona->nombre1 . ' ' . $usuario->persona->nombre2 . ' ' . $usuario->persona->apellido1 . ' ' . $usuario->persona->apellido2 }}
    </div>
</div> --}}

<form action="{{ route('registropn-guardar') }}" method="POST" autocomplete="off">
    @csrf
    @method('post')
    <div class="card-body" id="registro_ini">
        <div class="card-text">
            <div class="form-row row">
                <div class="form-group mt-3 col-md-6">
                    <label class="requerido" for="tipodocumento">Tipo documento</label>
                    <select class="form-control" name="docutipos_id" id="docutipos_id" required>
                        <option value="">--Seleccione un tipo--</option>
                        @foreach ($tipos_docu as $tipodocu)
                            <option value="{{ $tipodocu->id }}"
                                {{ $tipodocu->id == $usuario->persona->docutipos_id ? 'selected' : '' }}>
                                {{ $tipodocu->tipo_id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-3 col-md-6">
                    <label class="requerido" for="numerodocumento">Número de documento</label>
                    <input type="text" class="form-control" id="numerodocumento" name="identificacion"
                        placeholder="Número documento" value="{{ $usuario->persona->identificacion }}" readonly
                        required>
                </div>
            </div>
            <div class="form-row row mt-3">
                <div class="col-md-6 mb-3">
                    <label class="requerido" for="nombre1">Primer Nombre</label>
                    <input type="text" class="form-control lcapital" id="nombre1" placeholder="Primer Nombre"
                        name="nombre1" value="{{ $usuario->persona->nombre1 }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="nombre2">Segundo Nombre</label>
                    <input type="text" class="form-control lcapital" id="nombre2" placeholder="Segundo Nombre"
                        name="nombre2" value="{{ $usuario->persona->nombre2 }}">
                </div>
            </div>
            <div class="form-row row mt-3">
                <div class="col-md-6 mb-3">
                    <label class="requerido" for="apellido1">Primer Apellido</label>
                    <input type="text" class="form-control lcapital" id="apellido1" placeholder="Primer Apellido"
                        name="apellido1" value="{{ $usuario->persona->apellido1 }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="apellido2">Segundo Apellido</label>
                    <input type="text" class="form-control lcapital" id="apellido2" placeholder="Segundo Apellido"
                        name="apellido2" value="{{ $usuario->persona->apellido2 }}">
                </div>
            </div>
            <div class="form-row row mt-3">
                <div class="col-md-6 mb-3">
                    <label for="telefono_fijo">Teléfono fijo</label>
                    <input type="tel" class="form-control" id="telefono_fijo" placeholder="Teléfono fijo"
                        name="telefono_fijo"
                        onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;"
                        value="{{ $usuario->persona->telefono_fijo }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="requerido" for="telefono_celu">Teléfono Celular</label>
                    <input type="tel" class="form-control" id="telefono_celu" placeholder="Teléfono Celular"
                        name="telefono_celu"
                        onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;"
                        value="{{ $usuario->persona->telefono_celu }}" required>
                </div>
            </div>
            <div class="form-row row">
                <div class="form-group mt-3 col-md-6">
                    <label class="requerido" for="direccion">Dirección</label>
                    <input type="text" class="form-control" id="direccion" placeholder="Dirección" name="direccion"
                        required value="{{ $usuario->persona->direccion }}">
                </div>
                <div class="form-group mt-3 col-md-6">
                    <label class="requerido" for="pais_id">País</label>
                    <select class="form-control" name="pais_id" id="pais_id" required>
                        <option value="">--Seleccione--</option>
                        @foreach ($paises as $pais)
                            <option value="{{ $pais->id }}" {{ $pais->pais == 'Colombia' ? 'selected' : '' }}>
                                {{ $pais->pais }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row row" id="caja_departamento">
                <div class="form-group mt-3 col-md-6">
                    <label class="requerido" for="departamento">Departamento</label>
                    <select class="form-control departamentos" id="departamento"
                        data_url="{{ route('cargar_municipios') }}">
                        <option value="">--Seleccione--</option>
                        @foreach ($departamentos as $departamento)
                            <option value="{{ $departamento->id }}"
                                {{ $departamento->id == $usuario->persona->municipio->departamento->id ? 'selected' : '' }}>
                                {{ $departamento->departamento }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-3 col-md-6">
                    <label class="requerido" for="municipio_id">Ciudad</label>
                    <select class="form-control" name="municipio_id" id="municipio_id">
                        <option value="">--Seleccione--</option>
                        @foreach ($usuario->persona->municipio->departamento->municipios as $municipio)
                            <option value="{{ $municipio->id }}"
                                {{ $municipio->id == $usuario->persona->municipio->id ? 'selected' : '' }}>
                                {{ $municipio->municipio }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row row mt-3">
                <div class="col-md-6 mb-3">
                    <label class="requerido" for="nacionalidad">Nacionalidad</label>
                    <input type="text" class="form-control" id="nacionalidad" placeholder="Nacionalidad"
                        name="nacionalidad" value="{{ $usuario->persona->nacionalidad }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="requerido" for="grado">Último grado de educación obtenido</label>
                    <select class="form-control" name="grado" id="grado" required>
                        <option value="">--Seleccione--</option>
                        <option value="Basica Primaria"
                            {{ $usuario->persona->grado_educacion == 'Basica Primaria' ? 'selected' : '' }}>Basica
                            Primaria
                        </option>
                        <option value="Bachiller"
                            {{ $usuario->persona->grado_educacion == 'Bachiller' ? 'selected' : '' }}>Bachiller
                        </option>
                        <option value="Tecnico"
                            {{ $usuario->persona->grado_educacion == 'Tecnico' ? 'selected' : '' }}>Tecnico</option>
                        <option value="Tecnologo"
                            {{ $usuario->persona->grado_educacion == 'Tecnologo' ? 'selected' : '' }}>Tecnologo
                        </option>
                        <option value="Superior"
                            {{ $usuario->persona->grado_educacion == 'Superior' ? 'selected' : '' }}>Superior
                        </option>
                        <option value="Post Grado"
                            {{ $usuario->persona->grado_educacion == 'Post Grado' ? 'selected' : '' }}>Post Grado
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-row row mt-3">
                <div class="col-md-6 mb-3">
                    <label class="requerido" for="genero">Elija su Genero</label>
                    <select class="form-control" name="genero" id="genero" required>
                        <option value="">--Seleccione--</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Masculino">Masculino</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="requerido" for="fechanacimiento">Fecha nacimiento</label>
                    <input type="date" class="form-control" id="fechanacimiento" name="fechanacimiento"
                        max="{{ date('Y-m-d', strtotime(date('Y-m-d') . '- 18 years')) }}"
                        value="{{ date('Y-m-d', strtotime(date('Y-m-d') . '- 18 years')) }}" required>
                </div>
            </div>
            <div class="form-row row mt-3">
                <div class="col-md-6 mb-3">
                    <label class="requerido" for="grupoetnico">Grupo Étnico</label>
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
                    <label class="requerido" for="discapacidad">Es usted persona en condición de
                        discapacidad?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="discapasidad" id="discapacidad1" value="si">
                        <label class="form-check-label" for="discapacidad1">
                            Sí
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="discapasidad" id="discapacidad2" value="no"
                            checked>
                        <label class="form-check-label" for="discapacidad2">
                            No
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group mt-3 d-none" id="tipodiscapacidadcaja">
                <label for="tipodiscapacidad">Tipo discapacidad?</label>
                <select class="form-control" name="tipodiscapacidad" id="tipodiscapacidad">
                    <option value="">--Seleccione--</option>
                    <option value="1">Incapacidad Permanente Parcial</option>
                    <option value="2">Incapacidad Permanente Total</option>
                    <option value="3">Incapacidad Permanente Total Cualificada</option>
                    <option value="4">Incapacidad Permanente Absoluta</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label class="requerido" for="email">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico"
                    value="{{ $usuario->persona->email }}" required>
                <p>Al diligenciar su correo electrónico, está aceptando que las respuestas y
                    comunicaciones sobre sus peticiones, quejas y reclamos, sean enviadas a esta
                    dirección.</p>
            </div>
            <button class="mt-3 btn btn-primary" type="submit">Enviar</button>
        </div>
    </div>
</form>
