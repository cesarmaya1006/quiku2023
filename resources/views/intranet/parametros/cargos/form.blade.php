<div class="col-12 col-md-6 form-group">
    <label for="area_id">Área</label>
    <select class="form-control form-control-sm" data_url="{{ route('cargar_niveles') }}" id="area_id">
        <option value="">---Seleccione---</option>
        @foreach ($areas as $area)
            <option value="{{ $area->id }}"
                {{ isset($cargo) ? ($area->id == $cargo->nivel->area_id ? 'selected' : '') : '' }}>
                {{ $area->area }}</option>
        @endforeach
    </select>
    <small id="helpId" class="form-text text-muted">Área</small>
</div>
<div class="col-12 col-md-6 form-group">
    <label for="nivel_id">Nivel</label>
    <select class="form-control form-control-sm" name="nivel_id" id="nivel_id" required>
        @if (isset($cargo))
            @foreach ($cargo->nivel->area->niveles as $nivel)
                <option value="{{ $nivel->id }}" {{ $nivel->id == $cargo->nivel_id ? 'selected' : '' }}>
                    {{ $nivel->nivel }}</option>
            @endforeach
        @else
            <option value="">Seleccione primero un área</option>
        @endif
    </select>
    <small id="helpId" class="form-text text-muted">Nivel</small>
</div>
<div class="col-12 col-md-6 form-group">
    <label for="cargo">Cargo</label>
    <input type="text" class="form-control form-control-sm" name="cargo" id="cargo" aria-describedby="helpId"
        value="{{ old('cargo', $cargo->cargo ?? '') }}" placeholder="Nombre de cargo" required>
    <small id="helpId" class="form-text text-muted">Cargo</small>
</div>
