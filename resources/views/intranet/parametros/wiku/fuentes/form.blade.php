<div class="row">
    <div class="col-12 col-md-6 form-group">
        <label class="requerido" for="fuente">Titulo Fuente Normativa</label>
        <input type="text" class="form-control form-control-sm" name="fuente" id="fuente" aria-describedby="helpId"
            value="{{ old('fuente', $fuente->fuente ?? '') }}" placeholder="" required>
        <small id="helpId" class="form-text text-muted">Titulo de fuente normativa</small>
    </div>
    <div class="col-12 col-md-3 form-group">
        <label class="requerido" for="numero">Número</label>
        <input type="text" class="form-control form-control-sm" name="numero" id="numero" aria-describedby="helpId"
            value="{{ old('numero', $fuente->numero ?? '') }}" placeholder="" required>
        <small id="helpId" class="form-text text-muted">Número</small>
    </div>
    <div class="col-12 col-md-3 form-group">
        <label class="requerido" for="fecha">Fecha de Emisión</label>
        <input type="date" class="form-control form-control-sm" name="fecha" id="fecha" max="{{ date('Y-m-d') }}"
            value="{{ old('fecha', $fuente->fecha ?? '') }}" required>
        <small id="helpId" class="form-text text-muted">Fecha de Emisión</small>
    </div>
    <div class="col-12 col-md-6 form-group">
        <label class="requerido" for="emisor">Ente Emisor</label>
        <input type="text" class="form-control form-control-sm" name="emisor" id="emisor" aria-describedby="helpId"
            value="{{ old('emisor', $fuente->emisor ?? '') }}" placeholder="" required>
        <small id="helpId" class="form-text text-muted">Ente Emisor</small>
    </div>
    <div class="col-12 col-md-6 form-group">
        <label for="archivo">Documento</label>
        <input class="form-control form-control-sm" type="file" name="archivo" id="archivo" accept="application/pdf">
        <small id="helpId" class="form-text text-muted">Documento Asociado</small>
    </div>
</div>
