<div class="row">
    <div class="form-group col-12 col-md-4">
        <label class="requerido" for="departamento">Departamento</label>
        <select class="form-control form-control-sm departamentos" id="departamento"
            data_url="{{ route('cargar_municipios') }}" required>
            <option value="">--Seleccione--</option>
            @foreach ($departamentos as $departamento)
                @if (isset($sede))
                    <option value="{{ $departamento->id }}"
                        {{ $sede->municipio->departamento_id == $departamento->id ? 'selected' : '' }}>
                        {{ $departamento->departamento }}
                    </option>
                @else
                    <option value="{{ $departamento->id }}"
                        {{ old('direccion') == $departamento->id ? 'selected' : '' }}>
                        {{ $departamento->departamento }}
                    </option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group col-12 col-md-4">
        <label class="requerido" for="municipio_id">Ciudad</label>
        <select class="form-control form-control-sm" name="municipio_id" id="municipio_id">
            @if (isset($sede))
                @foreach ($sede->municipio->departamento->municipios as $municipio)
                    <option value="{{ $municipio->id }}"
                        {{ $sede->municipio_id == $municipio->id ? 'selected' : '' }}>
                        {{ $municipio->municipio }}
                    </option>
                @endforeach
            @else
                <option value="">--Seleccione--</option>
            @endif
        </select>
    </div>
    <div class="form-group col-12 col-md-4">
        <label class="requerido" for="nombre">Sede</label>
        <input type="text" class="form-control form-control-sm" name="nombre" id="nombre"
            value="{{ old('nombre', $sede->nombre ?? '') }}" required>
    </div>
</div>
