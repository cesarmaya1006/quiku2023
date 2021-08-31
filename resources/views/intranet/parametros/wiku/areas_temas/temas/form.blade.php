<div class="form-group">
    <label class="requerido" for="area_id">Área</label>
    <select class="form-control form-control-sm" name="area_id" id="area_id" required>
        <option value="">--- Seleccione ---</option>
        @foreach ($areas as $area)
            <option value="{{ $area->id }}"
                {{ isset($tema) ? ($area->id == $tema->area_id ? 'selected' : '') : '' }}>
                {{ $area->area }}</option>
        @endforeach
    </select>
    <small id="helpId" class="form-text text-muted">Área</small>
</div>
<div class="form-group">
    <label class="requerido" for="area">Tema</label>
    <input type="text" class="form-control form-control-sm" name="tema" id="tema" aria-describedby="helpId"
        value="{{ old('tema', $tema->tema ?? '') }}" placeholder="Tema" required>
    <small id="helpId" class="form-text text-muted">Tema</small>
</div>
