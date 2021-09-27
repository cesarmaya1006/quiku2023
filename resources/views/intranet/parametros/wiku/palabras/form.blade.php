<div class="row">
    <input type="hidden" name="norma_id" value="{{ $id }}">
    <div class="col-12 col-md-6 form-group">
        <label class="requerido" for="palabra">Palabra Clave</label>
        <input type="text" class="form-control form-control-sm" name="palabra" id="palabra" aria-describedby="helpId"
            value="{{ old('palabra', $palabra->palabra ?? '') }}" placeholder="" required>
        <small id="helpId" class="form-text text-muted">Palabra Clave.</small>
    </div>
</div>
