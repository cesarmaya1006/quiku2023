<div class="row">
    <div class="col-12">
        @if (isset($norma))
            <a href="{{ route('wiku_temaespecifico-index', ['id' => $norma->id, 'wiku' => 'norma']) }}"
                class="btn btn-success btn-sombra btn-sm text-center pl-3 pr-3" style="font-size: 0.9em;"><i
                    class="fas fa-plus-circle mr-2"></i> Añadir tema especifico</a>
        @else
            <a href="{{ route('wiku_temaespecifico-index', ['id' => '0', 'wiku' => 'norma']) }}"
                class="btn btn-success btn-sombra btn-sm text-center pl-3 pr-3" style="font-size: 0.9em;"><i
                    class="fas fa-plus-circle mr-2"></i> Añadir tema especifico</a>
        @endif
    </div>
</div>
@if ($temasEspecifico->count() > 0)
    <div class="row mt-3">
        <div class="form-group col-12">
            <label class="requerido" for="area_id">Área</label>
            <select class="form-control form-control-sm" id="area_id" data_url="{{ route('cargar_temas') }}">
                <option value="">---Seleccione---</option>
                @foreach ($areas as $area)
                    <option value="{{ $area->id }}"
                        {{ isset($norma) ? ($area->id == $norma->temaEspecifico->tema_->area_id ? 'selected' : '') : '' }}>
                        {{ $area->area }}</option>
                @endforeach
            </select>
            <small id="helpId" class="form-text text-muted">Área</small>
        </div>
        <div class="form-group col-12">
            <label class="requerido" for="tema_id">Tema</label>
            <select class="form-control form-control-sm" id="tema_id" data_url="{{ route('cargar_temasespec') }}"
                required>
                @if (isset($norma))
                    <option value="">---Seleccione---</option>
                    @foreach ($norma->temaEspecifico->tema_->area->temas as $tema)
                        <option value="{{ $tema->id }}"
                            {{ isset($norma) ? ($tema->id == $norma->temaEspecifico->tema_id ? 'selected' : '') : '' }}>
                            {{ $tema->tema }}</option>
                    @endforeach
                @else
                    <option value="">Seleccione primero un área</option>
                @endif
            </select>
            <small id="helpId" class="form-text text-muted">Tema</small>
        </div>
        <div class="form-group col-12">
            <label class="requerido" for="wikutemaespecifico_id">Tema Específico</label>
            <select class="form-control form-control-sm" name="wikutemaespecifico_id" id="wikutemaespecifico_id"
                required>
                @if (isset($norma))
                    <option value="">---Seleccione---</option>
                    @foreach ($norma->temaEspecifico->tema_->temasespecificos as $temaespecif)
                        <option value="{{ $temaespecif->id }}"
                            {{ isset($norma) ? ($temaespecif->id == $norma->wikutemaespecifico_id ? 'selected' : '') : '' }}>
                            {{ $temaespecif->tema }}</option>
                    @endforeach
                @else
                    <option value="">Seleccione primero un Tema</option>
                @endif
            </select>
            <small id="helpId" class="form-text text-muted">Tema Específico</small>
        </div>
    </div>
@endif
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
