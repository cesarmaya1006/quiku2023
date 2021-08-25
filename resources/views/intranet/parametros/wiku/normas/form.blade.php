<div class="row mt-3">
    <div class="col-12 col-md-4 form-group">
        <label class="requerido" for="wikuarea_id">Área de conocimiento</label>
        <select class="form-control form-control-sm" name="wikuarea_id" id="wikuarea_id">
            <option value="">--- Seleccione ---</option>
            @foreach ($areas as $area)
                <option value="{{ $area->id }}"
                    {{ isset($norma) ? ($area->id == $norma->wikuarea_id ? 'selected' : '') : '' }}>
                    {{ $area->area }}</option>
            @endforeach
        </select>
        <small id="helpId" class="form-text text-muted">Fuente Emisor</small>
    </div>
    <div class="col-12 col-md-4 form-group d-flex flex-column">
        <label class="requerido" for="articulo">Tema</label>
        <span class="tema" id="tema">algo</span>
        <small id="helpId" class="form-text text-muted">Artículo</small>
    </div>
    <div class="col-12 col-md-4 form-group d-flex flex-column">
        <label class="requerido" for="articulo">tema Específico</label>
        <span class="temaespecifico" id="temaespecifico">Lorem Ipsum es simplemente el texto de relleno de las imprentas
            y archivos de texto. Lorem Ipsum
            ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T.
            persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que
            logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto
            de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s
            con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente
            con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem
            Ipsum.</span>
        <small id="helpId" class="form-text text-muted">Artículo</small>
    </div>
</div>
<hr>
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
