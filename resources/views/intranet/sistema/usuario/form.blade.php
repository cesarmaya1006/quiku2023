<div class="row d-flex justify-content-center">
    <div class="col-10 col-md-3 form-group">
        <label for="rol_id" class="requerido">Rol de Usuario</label>
        <select name="rol_id[]" id="rol_id_form" class="form-control" required {{ isset($data) ? 'disabled' : '' }}>
            <option value="">Elija un Rol</option>
            @foreach ($roles as $id => $nombre)
                <option value="{{ $id }}"
                    {{ is_array(old('rol_id')) ? (in_array($id, old('rol_id')) ? 'selected' : '') : (isset($data) ? ($data->roles->firstWhere('id', $id) ? 'selected' : '') : '') }}>
                    {{ $nombre }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-10 col-md-4 form-group">
        <label for="nombres" class="requerido">Nombres</label>
        <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres del Usuario"
            value="{{ old('nombres', $data->nombres ?? '') }}" required>
        <small id="helpId" class="form-text text-muted">Nombres</small>
    </div>
    <div class="col-10 col-md-4 form-group">
        <label for="apellidos" class="requerido">Apellidos</label>
        <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos del Usuario"
            value="{{ old('apellidos', $data->apellidos ?? '') }}" required>
        <small id="helpId" class="form-text text-muted">Apellidos</small>
    </div>
    <div class="col-10 col-md-3 form-group">
        <label for="docutipos_id" class="requerido">Tipo Documento</label>
        <select name="docutipos_id" id="docutipos_id" class="form-control" required>
            <option value="">Tipo de Documento</option>
            @foreach ($tiposdocu as $tipo_docu)
                <option value="{{ $tipo_docu->id }}"
                    {{ is_array(old('docutipos_id')) ? (in_array($tipo_docu->id, old('docutipos_id')) ? 'selected' : '') : (isset($data) ? ($data->docutipos_id == $tipo_docu->id ? 'selected' : '') : '') }}>
                    {{ $tipo_docu->abreb_id }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-10 col-md-3 form-group">
        <label for="identificacion" class="requerido">N° de Identificaci&oacute;n</label>
        <input type="text" class="form-control" id="identificacion" name="identificacion"
            placeholder="N° de Identificación de  del Usuario"
            value="{{ old('identificacion', $data->identificacion ?? '') }}" required>
        <small id="helpId" class="form-text text-muted">N° de Identificaci&oacute;n</small>
    </div>
    <div class="col-10 col-md-3 form-group">
        <label for="email" class="requerido">Correo Electr&oacute;nico</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email de  del Usuario"
            value="{{ old('email', isset($data) ? ($data->email != 'Sin Email' ? $data->email : '') : '') }}"
            required>
        <small id="helpId" class="form-text text-muted">Correo Electr&oacute;nico</small>
    </div>
    <div class="col-10 col-md-3 form-group">
        <label for="telefono" class="requerido">Tel&eacute;fono</label>
        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Tel&eacute;fono Usuario"
            value="{{ old('telefono', isset($data) ? ($data->telefono != 'Sin Telefono' ? $data->telefono : '') : '') }}"
            required>
        <small id="helpId" class="form-text text-muted">Tel&eacute;fono</small>
    </div>
    @if (!isset($data))
        <div class="col-10 col-md-3 form-group float-none">
            <label for="password" class="requerido">Contrase&ntilde;a</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <small id="helpId" class="form-text text-muted">Contrase&ntilde;a</small>
        </div>
        <div class="col-10 col-md-3 form-group float-left">
            <label for="re_password" class="requerido">Confirmaci&oacute;n Contrase&ntilde;a</label>
            <input type="password" class="form-control" id="re_password" name="re_password" required>
            <small id="helpId" class="form-text text-muted">Confirmaci&oacute;n Contrase&ntilde;a</small>
        </div>
    @endif
</div>
