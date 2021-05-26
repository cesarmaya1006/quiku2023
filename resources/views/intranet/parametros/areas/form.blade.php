<div class="form-group">
    <label for="area">Área</label>
    <input type="text" class="form-control" name="area" id="area" aria-describedby="helpId"
        value="{{ old('area', $area->area ?? '') }}" placeholder="Nombre de área" required>
    <small id="helpId" class="form-text text-muted">Área</small>
</div>
