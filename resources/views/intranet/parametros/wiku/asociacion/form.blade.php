<div class="row" id="ajustesAsignacion">
    <div class="col-12 mb-3">
        <h6>Seleccione los ajustes del parametro de asociación</h6>
    </div>
    <div class="col-12">
        <div class="row">
            <div class="form-check col-12 col-md-2">
                <input class="form-check-input check_clase" type="checkbox" value="" id="tipopqrCheck">
                <label class="form-check-label" for="tipopqrCheck">Tipo de PQR</label>
            </div>
            <div class="form-check col-12 col-md-2">
                <input class="form-check-input check_clase" type="checkbox" value="" id="motivoCheck">
                <label class="form-check-label" for="motivoCheck">Motivo PQR</label>
            </div>
            <div class="form-check col-12 col-md-2">
                <input class="form-check-input check_clase" type="checkbox" value="" id="subMotivoCheck">
                <label class="form-check-label" for="subMotivoCheck">Sub-Motivo PQR</label>
            </div>
            <div class="form-check col-12 col-md-2">
                <input class="form-check-input check_clase" type="checkbox" value="" id="serviciosCheck">
                <label class="form-check-label" for="serviciosCheck">Tipo de Servicio</label>
            </div>
            <div class="form-check col-12 col-md-2 d-none" id="cajaserviciosCheck">
                <input class="form-check-input check_clase" type="checkbox" value="" id="serviciosCheck">
                <label class="form-check-label" for="serviciosCheck">Servicios</label>
            </div>
            <div class="form-check col-12 col-md-2" id="cajacategoriasCheck">
                <input class="form-check-input check_clase" type="checkbox" value="" id="categoriasCheck">
                <label class="form-check-label" for="categoriasCheck">Categorias</label>
            </div>
            <div class="form-check col-12 col-md-2" id="cajaproductosCheck">
                <input class="form-check-input check_clase" type="checkbox" value="" id="productosCheck">
                <label class="form-check-label" for="productosCheck">Productos</label>
            </div>
            <div class="form-check col-12 col-md-2" id="cajamarcasCheck">
                <input class="form-check-input check_clase" type="checkbox" value="" id="marcasCheck">
                <label class="form-check-label" for="marcasCheck">Marcas</label>
            </div>
            <div class="form-check col-12 col-md-2" id="cajareferenciasCheck">
                <input class="form-check-input check_clase" type="checkbox" value="" id="referenciasCheck">
                <label class="form-check-label" for="referenciasCheck">Referencias</label>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="form-group col-12 col-md-6 d-none" id="tipo_pqr">
        <label class="requerido" for="tipo_pqr_id">Tipo de PQR</label>
        <select id="tipo_pqr_id" class="form-control form-control-sm" name="tipo_pqr_id"
            data_url="{{ route('admin-funcionario-asignacion_particular-cargar_motivo') }}" required>
            <option value="">---Seleccione---</option>
            @foreach ($tipos_pqr as $tipo_pqr)
                <option value="{{ $tipo_pqr->id }}">{{ $tipo_pqr->tipo }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-12 col-md-6 d-none" id="motivo_pqr">
        <label class="requerido" for="motivo_id">Motivo de PQR</label>
        <select id="motivo_id" class="form-control form-control-sm" name="motivo_id"
            data_url="{{ route('admin-funcionario-asignacion_particular-cargar_sub_motivo') }}">
            <option value="">---Seleccione---</option>
        </select>
    </div>
    <div class="form-group col-12 col-md-6 d-none" id="sub_motivo_pqr">
        <label class="requerido" for="motivo_sub_id">Sub-Motivo de PQR</label>
        <select id="motivo_sub_id" class="form-control form-control-sm" name="motivo_sub_id">
            <option value="">---Seleccione---</option>
        </select>
    </div>
    <div class="form-group col-12 col-md-6 d-none" id="servicios">
        <label class="requerido" for="servicio_id">Servicios</label>
        <select id="servicio_id" class="form-control form-control-sm" name="servicio_id">
            <option value="">---Seleccione un servcio---</option>
            @foreach ($servicios as $servicio)
                <option value="{{ $servicio->id }}">{{ $servicio->servicio }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-12 col-md-6 d-none" id="categorias">
        <label class="requerido" for="categoria_id">Categoría de producto</label>
        <select id="categoria_id" class="form-control form-control-sm"
            data_url="{{ route('admin-funcionario-asignacion_particular-cargar_producto') }}" name="categoria_id">
            <option value="">---Seleccione---</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-12 col-md-6 d-none" id="productos">
        <label class="requerido" for="producto_id">Productos</label>
        <select id="producto_id" class="form-control form-control-sm" name="producto_id"
            data_url="{{ route('admin-funcionario-asignacion_particular-cargar_marca') }}">
            <option value="">---Seleccione primero una categoría---</option>
        </select>
    </div>
    <div class="form-group col-12 col-md-6 d-none" id="marcas">
        <label class="requerido" for="marca_id">Marcas</label>
        <select id="marca_id" class="form-control form-control-sm" name="marca_id"
            data_url="{{ route('admin-funcionario-asignacion_particular-cargar_referencia') }}">
            <option value="">---Seleccione primero un producto---</option>
        </select>
    </div>
    <div class="form-group col-12 col-md-6 d-none" id="referencias">
        <label class="requerido" for="referencia_id">Referencias</label>
        <select id="referencia_id" class="form-control form-control-sm" name="referencia_id">
            <option value="">---Seleccione primero una marca---</option>
        </select>
    </div>
</div>
