<div class="form-group">
    <label for="categoria">Categoría</label>
    <input type="text" class="form-control" name="categoria" id="categoria" aria-describedby="helpId"
        value="{{ old('categoria', $categoria->categoria ?? '') }}" placeholder="Nombre de categoría" required>
    <small id="helpId" class="form-text text-muted">Categoría</small>
</div>
