<div class="row">
    <input type="hidden" name="argumento_id" value="{{ $id }}">
    <div class="col-12 form-group">
        <label class="requerido" for="autores">Autor(es)</label>
        <input type="text" class="form-control form-control-sm" name="autores" id="autores" aria-describedby="helpId"
            value="{{ old('autores', $criterio->autores ?? '') }}" placeholder="" required>
        <small id="helpId" class="form-text text-muted">Autor o autores separados por coma.</small>
    </div>
    <div class="col-12 mb-3">
        <div class="row">
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tipo_criterio" id="tipo_criterio1" value="si"
                        {{ isset($criterio) ? ($criterio->criterio_si != null ? 'checked' : '') : 'checked' }}>
                    <label class="form-check-label" for="tipo_criterio1">
                        Criterios jurídicos de aplicación del argumento
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tipo_criterio" id="tipo_criterio2" value="no"
                        {{ isset($criterio) ? ($criterio->criterio_no != null ? 'checked' : '') : '' }}>
                    <label class="form-check-label" for="tipo_criterio2">
                        Criterios jurídicos que definen la no aplicación del argumento
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="tipo_criterio" id="tipo_criterio3" value="ambos"
                        {{ isset($criterio) ? ($criterio->criterio_no != null ? 'checked' : '') : '' }}>
                    <label class="form-check-label" for="tipo_criterio2">
                        Incluir ambos criterios
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 form-group {{ isset($criterio) ? ($criterio->criterio_si == null ? 'd-none' : '') : '' }}"
        id="requerido_si">
        <label class="requerido" for="criterio_si">Criterios jurídicos de aplicación del argumento</label>
        <textarea name="criterio_si" id="criterio_si" class="form-control form-control-sm" cols="30" rows="5"
            style="resize: none;" required>{{ old('criterio_si', $criterio->criterio_si ?? '') }}</textarea>
        <small id="helpId" class="form-text text-muted">Criterios jurídicos de aplicación del argumento</small>
    </div>
    <div class="col-12 col-md-6 form-group {{ isset($criterio) ? ($criterio->criterio_no == null ? 'd-none' : '') : 'd-none' }}"
        id="requerido_no">
        <label class="requerido" for="criterio_no">Criterios jurídicos que definen la no aplicación del
            artículo</label>
        <textarea name="criterio_no" id="criterio_no" class="form-control form-control-sm" cols="30" rows="5"
            style="resize: none;">{{ old('criterio_no', $criterio->criterio_no ?? '') }}</textarea>
        <small id="helpId" class="form-text text-muted">Criterios jurídicos que definen la no aplicación del
            artículo</small>
    </div>
    <div class="col-12 col-md-6 form-group">
        <label for="notas">Notas de vigencia</label>
        <textarea name="notas" id="notas" class="form-control form-control-sm" cols="30" rows="5"
            style="resize: none;">{{ old('criterio_no', $criterio->notas ?? '') }}</textarea>
        <small id="helpId" class="form-text text-muted">Notas de vigencia</small>
    </div>
</div>
