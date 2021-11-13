<div class="row mt-3">
    <div class="col-12 col-md-6">
        <a href="{{ route('wiku_temaespecifico-index', ['id' => '0', 'wiku' => 'doctrina']) }}"
            class="btn btn-success btn-sombra btn-sm text-center pl-3 pr-3" style="font-size: 0.9em;">
            <i class="fas fa-plus-circle mr-2"></i> Añadir tema especifico</a>
    </div>
    @if ($temasEspecifico->count() > 0)
        <div class="form-group col-12 col-md-6">
            <label class="requerido" for="area_id">Área</label>
            <select class="form-control form-control-sm" id="area_id" data_url="{{ route('cargar_temas') }}" required>
                <option value="">---Seleccione---</option>
                @foreach ($areas as $area)
                    <option value="{{ $area->id }}"
                        {{ isset($norma) ? ($area->id == $norma->temaEspecifico->tema_->area_id ? 'selected' : '') : '' }}>
                        {{ $area->area }}</option>
                @endforeach
            </select>
            <small id="helpId" class="form-text text-muted">Área</small>
        </div>
        <div class="form-group col-12 col-md-6">
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
        <div class="form-group col-12 col-md-6">
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
    @endif
</div>
<hr>
<div class="row">
    <div class="col-12 col-md-3 form-group">
        <label class="requerido" for="fecha">Tipo de doctrina</label>
        <select class="form-control form-control-sm" id="tipo" name="tipo" required>
            <option value="">---Seleccione---</option>
            <option value="Libro">Libro</option>
            <option value="Artículo de revista online">Artículo de revista online</option>
            <option value="Informe">Informe</option>
            <option value="Artículo de revista">Artículo de revista</option>
            <option value="Sitio web">Sitio web</option>
            <option value="Documento de sitio web">Documento de sitio web</option>
            <option value="Varios">Varios</option>
        </select>
        <small id="helpId" class="form-text text-muted">Tipo doctrina</small>
    </div>
    <div class="col-12 col-md-3 form-group">
        <label class="requerido" for="titulo">Titulo</label>
        <input type="text" class="form-control form-control-sm" name="titulo" id="titulo" value="{{ old('titulo') }}"
            required>
        <small id="helpId" class="form-text text-muted">Titulo</small>
    </div>
    <div class="col-12 col-md-6 form-group">
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion" class="form-control form-control-sm" cols="30" rows="5"
            style="resize: none;">{{ old('descripcion') }}</textarea>
        <small id="helpId" class="form-text text-muted">Descripción</small>
    </div>
    <div class="col-12 col-md-3 form-group">
        <label for="fecha">Fecha</label>
        <input type="date" class="form-control form-control-sm" name="fecha" id="fecha" max="{{ date('Y-m-d') }}"
            value="{{ old('fecha', $norma->fecha ?? date('Y-m-d')) }}">
        <small id="helpId" class="form-text text-muted">Fecha</small>
    </div>
    <div class="col-12 col-md-3 form-group">
        <label for="ciudad">Ciudad</label>
        <input type="text" class="form-control form-control-sm" name="ciudad" id="ciudad"
            value="{{ old('ciudad') }}">
        <small id="helpId" class="form-text text-muted">Ciudad</small>
    </div>
    <div class="col-12 col-md-3 form-group">
        <label for="editorial">Editorial</label>
        <input type="text" class="form-control form-control-sm" name="editorial" id="editorial"
            value="{{ old('editorial') }}">
        <small id="helpId" class="form-text text-muted">Editorial</small>
    </div>
    <div class="col-12 col-md-3 form-group">
        <label for="revista">Nombre de revista</label>
        <input type="text" class="form-control form-control-sm" name="revista" id="revista"
            value="{{ old('revista') }}">
        <small id="helpId" class="form-text text-muted">Nombre de revista</small>
    </div>
    <div class="col-12 col-md-3 form-group">
        <label for="url">Url</label>
        <input type="text" class="form-control form-control-sm" name="url" id="url" value="{{ old('url') }}">
        <small id="helpId" class="form-text text-muted">Url</small>
    </div>
    <div class="col-12 col-md-6 form-group">
        <label for="archivo">Archivo</label>
        <input class="form-control form-control-sm" type="file" name="archivo" id="archivo" accept="application/pdf">
        <small id="helpId" class="form-text text-muted">Archivo adjunto</small>
    </div>
    <div class="col-12 col-md-6">
        <div class="row">
            <div class="col-12 d-none" id="cajainstitucion">
                <label id="labelinstitucion" class="requerido" for="wikuautorinstitu_id">Autor
                    Institucional</label>
                <div class="input-group mb-3">
                    <select class="form-control form-control-sm" id="wikuautorinstitu_id" name="wikuautorinstitu_id"
                        data_url="{{ route('cargar_temas') }}">
                        <option value="">---Seleccione---</option>
                        @foreach ($autoresInst as $autorI)
                            <option value="{{ $autorI->id }}">
                                {{ $autorI->institucion }}</option>
                        @endforeach
                    </select>
                    <div class="input-group-append d-flex align-items-center">
                        <a class="btn btn-info btn-sm" id="nuevoAutorInst"><i class="fa fa-plus-circle"
                                aria-hidden="true" style="cursor: pointer;"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-12" id="cajaautorpersona">
                <label id="labelautorpersona" class="requerido" for="wikuautores_id">Autor</label>
                <div class="input-group mb-3">
                    <select class="form-control form-control-sm" id="wikuautores_id" name="wikuautores_id"
                        data_url="{{ route('cargar_temas') }}">
                        <option value="">---Seleccione---</option>
                        @foreach ($autores as $autor)
                            <option value="{{ $autor->id }}">
                                {{ $autor->nombre1 . ' ' . $autor->nombre2 . ' ' . $autor->apellido1 . ' ' . $autor->apellido2 }}
                            </option>
                        @endforeach
                    </select>
                    <div class="input-group-append d-flex align-items-center">
                        <a class="btn btn-info btn-sm" id="nuevoAutor"><i class="fa fa-plus-circle" aria-hidden="true"
                                style="cursor: pointer;"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex flex-row justify-content-around">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="autortipo" id="checkinstitucion"
                        value="checkinstitucion">
                    <label class="form-check-label" for="checkinstitucion">
                        Autor Institucional
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="autortipo" id="checkautorpersona"
                        value="checkautorpersona" checked>
                    <label class="form-check-label" for="checkautorpersona">
                        Autor persona natural
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-12 col-md-6 form-group">
        <label class="requerido" for="texto">Texto Principal</label>
        <textarea name="texto" id="texto" class="form-control form-control-sm" cols="30" rows="5" style="resize: none;"
            required>{{ old('texto') }}</textarea>
        <small id="helpId" class="form-text text-muted">Texto Principal</small>
    </div>
    <div class="col-12 col-md-6 form-group">
        <label for="paginas">Paginas</label>
        <input type="text" class="form-control form-control-sm" name="paginas" id="paginas"
            value="{{ old('paginas') }}">
        <small id="helpId" class="form-text text-muted">Paginas</small>
    </div>
</div>
