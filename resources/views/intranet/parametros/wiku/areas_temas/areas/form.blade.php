<div class="form-group">
    <label class="requerido" for="area">Área</label>
    <input type="text" class="form-control form-control-sm" name="area" id="area" aria-describedby="helpId"
        value="{{ old('area', $area->area ?? '') }}" placeholder="Área" required>
    <small id="helpId" class="form-text text-muted">Área</small>
</div>
