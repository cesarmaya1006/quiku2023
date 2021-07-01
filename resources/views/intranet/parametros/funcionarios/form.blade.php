<div class="row" style="font-size: 0.9em;">
    @isset($empleado)
        <div class="col-12 mb-3">
            <h6>Estado:</h6>
            <p><strong>Activo</strong></p>
            <p>
                @if ($empleado->estado === 1)
                    <a href="#" class="btn btn-primary btn-xs pl-4 pr-4">Desactivar - <i class="fas fa-user"
                            aria-hidden="true"></i></a>
                @else
                    <a href="#" class="btn btn-warning btn-xs pl-4 pr-4">Activar - <i class="far fa-user"
                            aria-hidden="true"></i></a>
                @endif
            </p>
        </div>
        <hr>
    @endisset
    <div class="col-12 mb-3">
        <h6>Información por sedes</h6>
    </div>
    <div class="form-group col-12 col-md-4">
        <label class="requerido" for="departamento_id">Departamentos</label>
        <select class="form-control form-control-sm" name="departamento_id" id="departamento_id"
            data_url="{{ route('admin-funcionario-asignacion_particular-cargar_municipio') }}" required>
            <option value="">--Seleccione un Depto--</option>
            @foreach ($departamentos as $departamento)
                @if (isset($empleado))
                    <option value="{{ $departamento->id }}"
                        {{ $empleado->sede->municipio->departamento_id == $departamento->id ? 'selected' : '' }}>
                        {{ $departamento->departamento }}</option>
                @else
                    <option value="{{ $departamento->id }}"
                        {{ old('departamento_id') == $departamento->id ? 'selected' : '' }}>
                        {{ $departamento->departamento }}</option>
                @endif
            @endforeach
        </select>
        <small id="helpId" class="form-text text-muted">Deptos con municipios con sedes</small>
    </div>
    <div class="form-group col-12 col-md-4">
        <label class="requerido" for="municipio_id">Municipios</label>
        <select class="form-control form-control-sm" name="municipio_id" id="municipio_id"
            data_url="{{ route('admin-funcionario-asignacion_particular-cargar_sede') }}" required>
            @if (isset($empleado))
                <option value="">--Seleccione--</option>
                @foreach ($empleado->sede->municipio->departamento->municipios as $municipio)
                    <option value="{{ $municipio->id }}"
                        {{ $empleado->sede->municipio_id == $municipio->id ? 'selected' : '' }}>
                        {{ $municipio->municipio }}</option>
                @endforeach
            @else
                <option value="">--Seleccione primero un Depto--</option>
            @endif
        </select>
        <small id="helpId" class="form-text text-muted">Municipios con sedes</small>
    </div>
    <div class="form-group col-12 col-md-4">
        <label class="requerido" for="sede_id">Sedes</label>
        <select class="form-control form-control-sm" name="sede_id" id="sede_id" required>
            @if (isset($empleado))
                <option value="">--Seleccione--</option>
                @foreach ($empleado->sede->municipio->sedes as $sede)
                    <option value="{{ $sede->id }}" {{ $empleado->sede_id == $sede->id ? 'selected' : '' }}>
                        {{ $sede->nombre }}</option>
                @endforeach
            @else
                <option value="">--Seleccione primero una sede--</option>
            @endif
        </select>
        <small id="helpId" class="form-text text-muted">Sedes</small>
    </div>
    <hr>
    <div class="col-12 mb-3">
        <h6>Información de Cargos</h6>
    </div>
    <div class="form-group col-12 col-md-4">
        <label class="requerido" for="area_id">Áreas</label>
        <select class="form-control form-control-sm" name="area_id" id="area_id"
            data_url="{{ route('funcionarios_funcionarios-cargar_niveles') }}" required>
            <option value="">--Seleccione un Área--</option>
            @foreach ($areas as $area)
                @if (isset($empleado))
                    <option value="{{ $area->id }}"
                        {{ $empleado->cargo->nivel->area_id == $area->id ? 'selected' : '' }}>
                        {{ $area->area }}</option>
                @else
                    <option value="{{ $area->id }}" {{ old('area_id') == $area->id ? 'selected' : '' }}>
                        {{ $area->area }}</option>
                @endif

            @endforeach
        </select>
        <small id="helpId" class="form-text text-muted">Áreas con niveles y cargos</small>
    </div>
    <div class="form-group col-12 col-md-4">
        <label class="requerido" for="nivel_id">Niveles</label>
        <select class="form-control form-control-sm" name="nivel_id" id="nivel_id"
            data_url="{{ route('funcionarios_funcionarios-cargar_cargos') }}" required>
            @if (isset($empleado))
                <option value="">--Seleccione--</option>
                @foreach ($empleado->cargo->nivel->area->niveles as $nivel)
                    <option value="{{ $nivel->id }}"
                        {{ $empleado->cargo->nivel_id == $nivel->id ? 'selected' : '' }}>
                        {{ $nivel->nivel }}</option>
                @endforeach
            @else
                <option value="">--Seleccione primero un área--</option>
            @endif
        </select>
        <small id="helpId" class="form-text text-muted">niveles con cargos</small>
    </div>
    <div class="form-group col-12 col-md-4">
        <label class="requerido" for="cargo_id">Cargos</label>
        <select class="form-control form-control-sm" name="cargo_id" id="cargo_id" required>
            @if (isset($empleado))
                <option value="">--Seleccione--</option>
                @foreach ($empleado->cargo->nivel->cargos as $cargo)
                    <option value="{{ $cargo->id }}" {{ $empleado->cargo_id == $cargo->id ? 'selected' : '' }}>
                        {{ $cargo->cargo }}</option>
                @endforeach
            @else
                <option value="">--Seleccione primero un nivel--</option>
            @endif
        </select>
        <small id="helpId" class="form-text text-muted">Cargos</small>
    </div>
    <hr>
    <div class="col-12 mb-3">
        <h6>Información de Personal</h6>
    </div>
    <div class="col-12">
        <div class="row">
            <div class="form-group col-12 col-md-3">
                <label class="requerido" for="docutipos_id">Tipo documento</label>
                <select class="form-control form-control-sm" name="docutipos_id" id="docutipos_id" required>
                    <option value="">--Seleccione un tipo--</option>
                    @foreach ($tipos_doc as $tipodocu)
                        <option value="{{ $tipodocu->id }}"
                            {{ old('docutipos_id') == $tipodocu->id ? 'selected' : ($tipodocu->id == 1 ? 'selected' : '') }}>
                            {{ $tipodocu->abreb_id }} ({{ $tipodocu->tipo_id }})</option>
                    @endforeach
                </select>
                <small id="helpId" class="form-text text-muted">Tipo documento</small>
            </div>
            <div class="form-group col-12 col-md-3">
                <label class="requerido" for="identificacion">Num. Identificación</label>
                <input type="text" class="form-control form-control-sm" name="identificacion" id="identificacion"
                    value="{{ old('identificacion', $empleado->identificacion ?? '') }}" required>
                <small id="helpId" class="form-text text-muted">Número de identificación</small>
            </div>
        </div>
    </div>
    <div class="form-group col-12 col-md-3">
        <label class="requerido" for="nombre1">Primer nombre</label>
        <input type="text" class="form-control form-control-sm" name="nombre1" id="nombre1"
            value="{{ old('nombre1', $empleado->nombre1 ?? '') }}" required>
        <small id="helpId" class="form-text text-muted">Primer nombre</small>
    </div>
    <div class="form-group col-12 col-md-3">
        <label for="nombre2">Segundo nombre</label>
        <input type="text" class="form-control form-control-sm" name="nombre2" id="nombre2"
            value="{{ old('nombre2', $empleado->nombre2 ?? '') }}">
        <small id="helpId" class="form-text text-muted">Segundo nombre</small>
    </div>
    <div class="form-group col-12 col-md-3">
        <label class="requerido" for="apellido1">Primer apellido</label>
        <input type="text" class="form-control form-control-sm" name="apellido1" id="apellido1"
            value="{{ old('apellido1', $empleado->apellido1 ?? '') }}" required>
        <small id="helpId" class="form-text text-muted">Primer apellido</small>
    </div>
    <div class="form-group col-12 col-md-3">
        <label for="apellido2">Segundo apellido</label>
        <input type="text" class="form-control form-control-sm" name="apellido2" id="apellido2"
            value="{{ old('apellido2', $empleado->apellido2 ?? '') }}">
        <small id="helpId" class="form-text text-muted">Segundo apellido</small>
    </div>
    <div class="form-group col-12 col-md-3">
        <label class="requerido" for="telefono_celu">Teléfono</label>
        <input type="tel" class="form-control form-control-sm" name="telefono_celu" id="telefono_celu"
            onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;"
            value="{{ old('telefono_celu', $empleado->telefono_celu ?? '') }}" required>
        <small id="helpId" class="form-text text-muted">Teléfono</small>
    </div>
    <div class="form-group col-12 col-md-9">
        <label class="requerido" for="direccion">Dirección</label>
        <input type="text" class="form-control form-control-sm" name="direccion" id="direccion"
            value="{{ old('direccion', $empleado->direccion ?? '') }}" required>
        <small id="helpId" class="form-text text-muted">Dirección</small>
    </div>
    <div class="form-group col-12 col-md-3">
        <label class="requerido" for="direccion">Genero</label>
        <select class="form-control form-control-sm" name="genero" id="genero" required>
            <option value="">--Seleccione--</option>
            @if (isset($empleado))
                <option value="Femenino" {{ $empleado->genero == 'Femenino' ? 'selected' : '' }}>
                    Femenino</option>
                <option value="Masculino" {{ $empleado->genero == 'Masculino' ? 'selected' : '' }}>
                    Masculino</option>
            @else
                <option value="Femenino" {{ old('genero') == 'Femenino' ? 'selected' : '' }}>
                    Femenino</option>
                <option value="Masculino" {{ old('genero') == 'Masculino' ? 'selected' : '' }}>
                    Masculino</option>
            @endif
        </select>
        <small id="helpId" class="form-text text-muted">Genero</small>
    </div>
    <div class="form-group col-12 col-md-3">
        <label class="requerido" for="fecha_nacimiento">Fecha de nacimiento</label>
        <input type="date" class="form-control form-control-sm" name="fecha_nacimiento" id="fecha_nacimiento"
            max="{{ date('Y-m-d', strtotime(date('Y-m-d') . '- 18 years')) }}"
            value="{{ old('fecha_nacimiento', $empleado->fecha_nacimiento ?? '') }}" required>
        <small id="helpId" class="form-text text-muted">Fecha de nacimiento</small>
    </div>
    <div class="form-group col-12 col-md-6">
        <label class="requerido" for="email">Email</label>
        <input type="email" class="form-control form-control-sm" name="email" id="email"
            value="{{ old('email', $empleado->email ?? '') }}" required>
        <small id="helpId" class="form-text text-muted">Email</small>
    </div>

    @empty($empleado)
        <hr>
        <div class="col-12 mb-3">
            <h6>Datos de Acceso</h6>
        </div>
        <div class="form-group col-12 col-md-4">
            <label class="requerido" for="usuario">Usuario de acceso</label>
            <input type="text" class="form-control form-control-sm" name="usuario" id="usuario" required>
            <small id="helpId" class="form-text text-muted">Nombre de acceso</small>
        </div>
        <div class="form-group col-12 col-md-4">
            <label class="requerido" for="password">Contraseña</label>
            <input type="password" class="form-control form-control-sm" name="password" id="password" required>
            <small id="helpId" class="form-text text-muted">Contraseña</small>
        </div>
        <div class="form-group col-12 col-md-4">
            <label class="requerido" for="repassword">Validación de Contraseña</label>
            <input type="password" class="form-control form-control-sm" name="repassword" id="repassword" required>
            <small id="helpId" class="form-text text-muted">Validación de Contraseña</small>
        </div>
    @endempty
</div>
