<div class="form-group row">
    <label for="nombre" class="col-lg-3 col-form-label requerido">
        <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Nombre Men&uacute;</font>
        </font>
    </label>
    <div class="col-lg-8">
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del Men&uacute;"
            value="{{ old('nombre', $data->nombre ?? ' ') }}" required>
    </div>
</div>
<div class="form-group row">
    <label for="url" class="col-lg-3 col-form-label requerido">
        <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Url Men&uacute;</font>
        </font>
    </label>
    <div class="col-lg-8">
        <input type="text" class="form-control" id="url" name="url" placeholder="Url del Men&uacute;"
            value="{{ old('url', $data->url ?? ' ') }}" required>
    </div>
</div>
<div class="form-group row">
    <label for="icono" class="col-lg-3 col-form-label">
        <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Icono Men&uacute;</font>
        </font>
    </label>
    <div class="col-lg-7">
        <select id="icono" class="form-control" name="icono">
            <option>Elija un Icono</option>
            @foreach ($iconos as $icono)
                @if ($data != null)
                    <option value="{{ $icono->clase_icono }}" @if ($icono->clase_icono == $data->icono) selected @endif>
                        {{ $icono->nom_icono }}</option>
                @else
                    <option value="{{ $icono->clase_icono }}">{{ $icono->nom_icono }} </option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="col-lg-1 text-center">
        @if ($data != null)
            <span id="mostrar-icono" class="{{ old('icono', $data->icono . ' fa-3x' ?? ' ') }}"></span>
        @else
            <span id="mostrar-icono" class="{{ old('icono') }}"></span>
        @endif
    </div>
</div>
