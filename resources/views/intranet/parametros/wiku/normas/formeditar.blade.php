<div class="row">
    <div class="col-12">
        <div class="card card-outline card-primary collapsed-card">
            <div class="card-header">
                <h6 class="card-title">Datos Área de Conocimiento</h6>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        @if (isset($norma))
                            <a href="{{ route('wiku_temaespecifico-index', ['id' => $norma->id, 'wiku' => 'norma']) }}"
                                class="btn btn-success btn-sombra btn-sm text-center pl-3 pr-3"
                                style="font-size: 0.9em;"><i class="fas fa-plus-circle mr-2"></i> Añadir tema
                                especifico</a>
                        @else
                            <a href="{{ route('wiku_temaespecifico-index', ['id' => '0', 'wiku' => 'norma']) }}"
                                class="btn btn-success btn-sombra btn-sm text-center pl-3 pr-3"
                                style="font-size: 0.9em;"><i class="fas fa-plus-circle mr-2"></i> Añadir tema
                                especifico</a>
                        @endif
                    </div>
                </div>
                @if ($temasEspecifico->count() > 0)
                    <div class="row mt-3">
                        <div class="form-group col-12">
                            <label class="requerido" for="area_id">Área</label>
                            <select class="form-control form-control-sm" id="area_id"
                                data_url="{{ route('cargar_temas') }}">
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
                            <select class="form-control form-control-sm" id="tema_id"
                                data_url="{{ route('cargar_temasespec') }}" required>
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
                            <select class="form-control form-control-sm" name="wikutemaespecifico_id"
                                id="wikutemaespecifico_id" required>
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
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-primary collapsed-card">
            <div class="card-header">
                <h6 class="card-title">Datos Básicos</h6>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
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
                        <input type="text" class="form-control form-control-sm" name="articulo" id="articulo"
                            aria-describedby="helpId" value="{{ old('articulo', $norma->articulo ?? '') }}"
                            placeholder="" required>
                        <small id="helpId" class="form-text text-muted">Artículo</small>
                    </div>
                    <div class="col-12 col-md-2 form-group">
                        <label for="fecha">Entrada en vigencia</label>
                        <input type="date" class="form-control form-control-sm" name="fecha" id="fecha"
                            max="{{ date('Y-m-d') }}" value="{{ old('fecha', $norma->fecha ?? '') }}">
                        <small id="helpId" class="form-text text-muted">Entrada en vigencia</small>
                    </div>
                    <div class="col-12 col-md-6 form-group">
                        <label class="requerido" for="texto">Texto Principal</label>
                        <textarea name="texto" id="texto" class="form-control form-control-sm" cols="30" rows="5"
                            style="resize: none;">{{ old('texto', $norma->texto ?? '') }}</textarea>
                        <small id="helpId" class="form-text text-muted">Texto Principal</small>
                    </div>
                    <div class="col-12 col-md-6 form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control form-control-sm" cols="30"
                            rows="5" required
                            style="resize: none;">{{ old('descripcion', $norma->descripcion ?? '') }}</textarea>
                        <small id="helpId" class="form-text text-muted">Descripción</small>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-primary collapsed-card">
            <div class="card-header">
                <h6 class="card-title">Datos complementarios</h6>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-6 form-group">
                        <label for="libro">Libro</label>
                        <input type="text" class="form-control form-control-sm" name="libro" id="libro"
                            aria-describedby="helpId" value="{{ old('libro', $norma->libro ?? '') }}" placeholder="">
                        <small id="helpId" class="form-text text-muted">Libro</small>
                    </div>
                    <div class="col-12 col-md-6 form-group">
                        <label for="parte">Parte</label>
                        <input type="text" class="form-control form-control-sm" name="parte" id="parte"
                            aria-describedby="helpId" value="{{ old('parte', $norma->parte ?? '') }}" placeholder="">
                        <small id="helpId" class="form-text text-muted">Parte</small>
                    </div>
                    <div class="col-12 col-md-6 form-group">
                        <label for="seccion">Sección</label>
                        <input type="text" class="form-control form-control-sm" name="seccion" id="seccion"
                            aria-describedby="helpId" value="{{ old('seccion', $norma->seccion ?? '') }}"
                            placeholder="">
                        <small id="helpId" class="form-text text-muted">Sección</small>
                    </div>
                    <div class="col-12 col-md-6 form-group">
                        <label for="titulo">Título</label>
                        <input type="text" class="form-control form-control-sm" name="titulo" id="titulo"
                            aria-describedby="helpId" value="{{ old('titulo', $norma->titulo ?? '') }}"
                            placeholder="">
                        <small id="helpId" class="form-text text-muted">Título</small>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-primary collapsed-card">
            <div class="card-header">
                <h6 class="card-title">Criterios Jurídicos</h6>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                        <h6>Criterios Juridicos Asociados</h6>
                    </div>
                    <div class="col-12 col-md-6 text-md-right pl-2">
                        <a href="{{ route('wiku_criterios-index', ['id' => $norma->id, 'wiku' => 'norma']) }}"
                            class="btn btn-info btn-xs text-center pl-3 pr-3" style="font-size: 0.9em;"><i
                                class="fas fa-plus-circle mr-2"></i> Asociar criterio
                            jurídico</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12" style="font-size: 0.8em;">
                        <table class="table table-striped table-hover table-sm">
                            <thead class="thead-inverse">
                                <tr>
                                    <th class="text-center">Autor (es)</th>
                                    <th class="text-center">Criterios jurídicos de aplicación</th>
                                    <th class="text-center">Criterios jurídicos que definen la no aplicación</th>
                                    <th class="text-center">Notas de vigencia</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($norma->criterios as $criterio)
                                    <tr>
                                        <td>{{ $criterio->autores }}</td>
                                        <td>{{ $criterio->criterio_si }}</td>
                                        <td>{{ $criterio->criterio_no }}</td>
                                        <td>{{ $criterio->notas }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card card-outline card-primary collapsed-card">
            <div class="card-header">
                <h6 class="card-title">Palabras Claves</h6>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                        <h6>Palabras claves asociadas</h6>
                    </div>
                    <div class="col-12 col-md-6 text-md-right pl-2">
                        <a href="{{ route('wiku_palabras-index', ['id' => $norma->id, 'wiku' => 'norma']) }}"
                            class="btn btn-info btn-xs text-center pl-3 pr-3" style="font-size: 0.9em;"><i
                                class="fas fa-plus-circle mr-2"></i> Asociar palabra clave</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12" style="font-size: 0.8em;">
                        <ul>
                            @if ($norma->palabras->count() > 0)
                                @foreach ($norma->palabras as $palabra)
                                    <li>{{ $palabra->palabra }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-primary collapsed-card">
            <div class="card-header">
                <h6 class="card-title">Parametros de asociación</h6>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                        <h6>Asociaciones al sistema</h6>
                    </div>
                    <div class="col-12 col-md-6 text-md-right pl-2">
                        <a href="{{ route('wiku_asociacion-crear', ['id' => $norma->id, 'wiku' => 'norma']) }}"
                            class="btn btn-info btn-xs text-center pl-3 pr-3" style="font-size: 0.9em;"><i
                                class="fas fa-plus-circle mr-2"></i> Nueva Asociación</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12" style="font-size: 0.8em;">
                        <table class="table table-striped table-hover table-sm">
                            <thead class="thead-inverse">
                                <tr>
                                    <th class="text-center">Tipo de PQR</th>
                                    <th class="text-center">Motivo PQR</th>
                                    <th class="text-center">Sub-Motivo PQR</th>
                                    <th class="text-center">Producto/Servicio</th>
                                    <th class="text-center">Categoria</th>
                                    <th class="text-center">Producto</th>
                                    <th class="text-center">Marca</th>
                                    <th class="text-center">Referencia</th>
                                    <th class="text-center">Tipo de Servicio</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
