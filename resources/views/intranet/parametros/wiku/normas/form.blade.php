<div class="row">
    <div class="col-12 col-md-5 form-group">
        <label for="fuente_id">Fuente emisora</label>
        <select class="form-control form-control-sm" name="fuente_id" id="fuente_id">
            <option value="">--- Seleccione ---</option>
            @foreach ($fuentes as $fuente)
                <option value="{{ $fuente->id }}"
                    {{ isset($norma) ? ($fuente->id == $norma->fuente_id ? 'selected' : '') : '' }}>
                    {{ $fuente->fuente }}</option>
            @endforeach
        </select>
        <small id="helpId" class="form-text text-muted">Fuente Emisor</small>
    </div>
    <div class="col-12 col-md-5 form-group">
        <label class="requerido" for="articulo">Artículo</label>
        <input type="text" class="form-control form-control-sm" name="articulo" id="articulo" aria-describedby="helpId"
            value="{{ old('articulo', $norma->articulo ?? '') }}" placeholder="" required>
        <small id="helpId" class="form-text text-muted">Artículo</small>
    </div>
    <div class="col-12 col-md-2 form-group">
        <label for="fecha">Entrada en vigencia</label>
        <input type="date" class="form-control form-control-sm" name="fecha" id="fecha" max="{{ date('Y-m-d') }}"
            value="{{ old('fecha', $norma->fecha ?? '') }}">
        <small id="helpId" class="form-text text-muted">Entrada en vigencia</small>
    </div>
    <div class="col-12 col-md-6 form-group">
        <label class="requerido" for="texto">Detalle</label>
        <textarea name="texto" id="texto" class="form-control form-control-sm" cols="30" rows="5"
            style="resize: none;">{{ old('texto', $norma->texto ?? '') }}</textarea>
        <small id="helpId" class="form-text text-muted">Detalle</small>
    </div>
    <div class="col-12 col-md-6 form-group">
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion" class="form-control form-control-sm" cols="30" rows="5" required
            style="resize: none;">{{ old('descripcion', $norma->descripcion ?? '') }}</textarea>
        <small id="helpId" class="form-text text-muted">Descripción</small>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-12">
        <h6>Datos complementarios</h6>
    </div>
    <div class="col-12 col-md-6 form-group">
        <label for="libro">Libro</label>
        <input type="text" class="form-control form-control-sm" name="libro" id="libro" aria-describedby="helpId"
            value="{{ old('libro', $norma->libro ?? '') }}" placeholder="">
        <small id="helpId" class="form-text text-muted">Libro</small>
    </div>
    <div class="col-12 col-md-6 form-group">
        <label for="parte">Parte</label>
        <input type="text" class="form-control form-control-sm" name="parte" id="parte" aria-describedby="helpId"
            value="{{ old('parte', $norma->parte ?? '') }}" placeholder="">
        <small id="helpId" class="form-text text-muted">Parte</small>
    </div>
    <div class="col-12 col-md-6 form-group">
        <label for="seccion">Sección</label>
        <input type="text" class="form-control form-control-sm" name="seccion" id="seccion" aria-describedby="helpId"
            value="{{ old('seccion', $norma->seccion ?? '') }}" placeholder="">
        <small id="helpId" class="form-text text-muted">Sección</small>
    </div>
    <div class="col-12 col-md-6 form-group">
        <label for="titulo">Título</label>
        <input type="text" class="form-control form-control-sm" name="titulo" id="titulo" aria-describedby="helpId"
            value="{{ old('titulo', $norma->titulo ?? '') }}" placeholder="">
        <small id="helpId" class="form-text text-muted">Título</small>
    </div>
</div>
