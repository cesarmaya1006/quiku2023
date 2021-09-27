<div class="form-group">
    <label class="requerido" for="area_id">Área</label>
    <select class="form-control form-control-sm" id="area_id" data_url="{{ route('cargar_temas') }}">
        <option value="">---Seleccione---</option>
        @foreach ($areas as $area)
            <option value="{{ $area->id }}"
                {{ isset($temaespecif) ? ($area->id == $temaespecif->tema_->area_id ? 'selected' : '') : '' }}>
                {{ $area->area }}</option>
        @endforeach
    </select>
    <small id="helpId" class="form-text text-muted">Área</small>
</div>
<div class="form-group">
    <label class="requerido" for="tema_id">Tema</label>
    <select class="form-control form-control-sm" name="tema_id" id="tema_id" required>
        @if (isset($temaespecif))
            @foreach ($temaespecif->tema_->area->temas as $tema)
                <option value="{{ $tema->id }}" {{ $tema->id == $temaespecif->tema_id ? 'selected' : '' }}>
                    {{ $tema->tema }}</option>
            @endforeach
        @else
            <option value="">Seleccione primero un área</option>
        @endif
    </select>
    <small id="helpId" class="form-text text-muted">Tema</small>
</div>
<div class="form-group">
    <label class="requerido" for="tema">Tema Específico</label>
    <input type="text" class="form-control form-control-sm" name="tema" id="tema" aria-describedby="helpId"
        value="{{ old('tema', $temaespecif->tema ?? '') }}" placeholder="Tema" required>
    <small id="helpId" class="form-text text-muted">Tema Específico</small>
</div>
