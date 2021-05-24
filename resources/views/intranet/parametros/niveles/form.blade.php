<div class="col-12 col-md-6 form-group">
    <label for="area_id">Área</label>
    <select class="form-control form-control-sm" name="area_id" id="area_id">
        @foreach ($areas as $area)
            <option value="{{ $area->id }}" {{ isset($nivel) ? ($area->id == $nivel->area_id ? 'selected' : '') : '' }}>
                {{ $area->area }}</option>
        @endforeach
    </select>
    <small id="helpId" class="form-text text-muted">Área</small>
</div>
<div class="col-12 col-md-6 form-group">
    <label for="nivel">Nivel</label>
    <input type="text" class="form-control form-control-sm" name="nivel" id="nivel" aria-describedby="helpId"
        value="{{ old('nivel', $nivel->nivel ?? '') }}" placeholder="Nombre de nivel" required>
    <small id="helpId" class="form-text text-muted">Nivel</small>
</div>
