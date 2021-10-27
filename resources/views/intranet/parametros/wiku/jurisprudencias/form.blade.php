<div class="row mt-3">
    <div class="col-12 col-md-6">
        <a href="{{ route('wiku_temaespecifico-index', ['id' => '0', 'wiku' => 'jurisprudencia']) }}"
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

    <div class="col-12 col-md-6">
        <div class="row">
            <div class="col-12" id="cajaEnte">
                <label id="labelEnte" class="requerido" for="ente_id">Ente Emisor</label>
                <div class="input-group mb-3">
                    <select class="form-control form-control-sm enteClass" id="ente_id" name="ente_id"
                        data_url="{{ route('wiku-cargarsalas') }}">
                        <option value="">---Seleccione---</option>
                        @foreach ($entes as $ente)
                            <option value="{{ $ente->id }}">
                                {{ $ente->ente }}
                            </option>
                        @endforeach
                    </select>
                    <div class="input-group-append d-flex align-items-center">
                        <a class="btn btn-info btn-sm" id="nuevoEnte"><i class="fa fa-plus-circle" aria-hidden="true"
                                style="cursor: pointer;"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="row">
            <div class="col-12" id="cajaSala">
                <label id="labelSala" class="requerido" for="sala_id">Sala</label>
                <div class="input-group mb-3">
                    <select class="form-control form-control-sm" id="sala_id" name="sala_id"
                        data_url="{{ route('wiku-cargarsubsalas') }}">
                        <option value="">---Seleccione---</option>
                    </select>
                    <div class="input-group-append d-flex align-items-center">
                        <a class="btn btn-info btn-sm" id="nuevaSala"><i class="fa fa-plus-circle" aria-hidden="true"
                                style="cursor: pointer;"></i></a>
                    </div>
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
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion" class="form-control form-control-sm" cols="30" rows="5"
            style="resize: none;">{{ old('descripcion') }}</textarea>
        <small id="helpId" class="form-text text-muted">Descripción</small>
    </div>
</div>
