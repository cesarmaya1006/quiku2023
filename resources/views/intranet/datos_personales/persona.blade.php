{{-- <div class="row">
    <div class="col-12">
        {{ $usuario->persona->nombre1 . ' ' . $usuario->persona->nombre2 . ' ' . $usuario->persona->apellido1 . ' ' . $usuario->persona->apellido2 }}
    </div>
</div> --}}

<form action="{{ route('usuario-actualizar') }}" method="POST" autocomplete="off">
    @csrf
    @method('post')
    <input type="hidden" name="id" value="{{ session('id_usuario') }}">
    <div class="card-body" id="registro_ini">
        <div class="card-text">
            <div class="form-row row">
                <div class="form-group mt-3 col-md-6">
                    <label class="requerido" for="tipodocumento">Tipo documento</label>
                    <span class="form-control myPopover"
                        data-toggle="popover">{{ $usuario->persona->tipos_docu->tipo_id }}</span>
                </div>
                <div class="form-group mt-3 col-md-6">
                    <label class="requerido" for="numerodocumento">Número de documento</label>
                    <span class="form-control myPopover"
                        data-toggle="popover">{{ $usuario->persona->identificacion }}</span>
                </div>
            </div>
            <div class="form-row row mt-3">
                <div class="col-md-6 mb-3">
                    <label class="requerido" for="nombre1">Primer Nombre</label>
                    <span class="form-control myPopover" data-toggle="popover">{{ $usuario->persona->nombre1 }}</span>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="nombre2">Segundo Nombre</label>
                    <span class="form-control myPopover" data-toggle="popover">{{ $usuario->persona->nombre2 }}</span>
                </div>
            </div>
            <div class="form-row row mt-3">
                <div class="col-md-6 mb-3">
                    <label class="requerido" for="apellido1">Primer Apellido</label>
                    <span class="form-control myPopover"
                        data-toggle="popover">{{ $usuario->persona->apellido1 }}</span>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="apellido2">Segundo Apellido</label>
                    <span class="form-control myPopover"
                        data-toggle="popover">{{ $usuario->persona->apellido2 }}</span>
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
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button type="button" class="btn btn-info"><i class="fa fa-plus-circle" aria-hidden="true"
                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop"></i></button>
                        </div>
                        <!-- /btn-group -->
                        <input type="text" class="form-control" id="direccion" placeholder="Dirección" name="direccion"
                            required value="{{ $usuario->persona->direccion }}" readonly>
                    </div>
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
                    <span class="form-control myPopover"
                        data-toggle="popover">{{ $usuario->persona->nacionalidad }}</span>
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
                    <span class="form-control myPopover" data-toggle="popover">{{ $usuario->persona->genero }}</span>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="requerido" for="fechanacimiento">Fecha nacimiento</label>
                    <span class="form-control myPopover"
                        data-toggle="popover">{{ $usuario->persona->fecha_nacimiento }}</span>
                </div>
            </div>
            <div class="form-row row mt-3">
                <div class="col-md-6 mb-3">
                    <label class="requerido" for="grupoetnico">Grupo Étnico</label>
                    <span class="form-control myPopover"
                        data-toggle="popover">{{ $usuario->persona->grupo_etnico }}</span>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="requerido" for="discapacidad">Es usted persona en condición de
                        discapacidad?</label>
                    @if ($usuario->persona->discapacidad == 1)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="discapasidad" id="discapacidad1"
                                value="si" {{ $usuario->persona->discapacidad == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="discapacidad1">
                                Sí
                            </label>
                        </div>
                    @else
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="discapasidad" id="discapacidad2"
                                value="no" {{ $usuario->persona->discapacidad == 0 ? 'checked' : '' }}>
                            <label class="form-check-label" for="discapacidad2">
                                No
                            </label>
                        </div>
                    @endif
                </div>
            </div>
            @if ($usuario->persona->discapacidad == 1)
                <div class="form-group mt-3 d-none" id="tipodiscapacidadcaja">
                    <label for="tipodiscapacidad">Tipo discapacidad?</label>
                    <select class="form-control" name="tipodiscapacidad" id="tipodiscapacidad" readonly="true">
                        <option value="">--Seleccione--</option>
                        <option value="1">Incapacidad Permanente Parcial</option>
                        <option value="2">Incapacidad Permanente Total</option>
                        <option value="3">Incapacidad Permanente Total Cualificada</option>
                        <option value="4">Incapacidad Permanente Absoluta</option>
                    </select>
                </div>
            @endif
            <div class="form-group mt-3">
                <label class="requerido" for="email">Correo electrónico</label>
                <span class="form-control myPopover" data-toggle="popover">{{ $usuario->persona->email }}</span>
                <p>Al diligenciar su correo electrónico, está aceptando que las respuestas y
                    comunicaciones sobre sus peticiones, quejas y reclamos, sean enviadas a esta
                    dirección.</p>
            </div>
            <button class="mt-3 btn btn-primary" type="submit">Enviar</button>
        </div>
    </div>
</form>
