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
                        @if (isset($argumento))
                            <a href="{{ route('wiku_temaespecifico-index', ['id' => $argumento->id, 'wiku' => 'jurisprudencia']) }}"
                                class="btn btn-success btn-sombra btn-sm text-center pl-3 pr-3"
                                style="font-size: 0.9em;"><i class="fas fa-plus-circle mr-2"></i> Añadir tema
                                especifico</a>
                        @else
                            <a href="{{ route('wiku_temaespecifico-index', ['id' => '0', 'wiku' => 'jurisprudencia']) }}"
                                class="btn btn-success btn-sombra btn-sm text-center pl-3 pr-3"
                                style="font-size: 0.9em;"><i class="fas fa-plus-circle mr-2"></i> Añadir tema
                                especifico</a>
                        @endif
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-md-6">
                        <a href="{{ route('wiku_temaespecifico-index', ['id' => '0', 'wiku' => 'jurisprudencia']) }}"
                            class="btn btn-success btn-sombra btn-sm text-center pl-3 pr-3" style="font-size: 0.9em;">
                            <i class="fas fa-plus-circle mr-2"></i> Añadir tema especifico</a>
                    </div>
                    @if ($temasEspecifico->count() > 0)
                        <div class="form-group col-12 col-md-6">
                            <label class="requerido" for="area_id">Área</label>
                            <select class="form-control form-control-sm" id="area_id"
                                data_url="{{ route('cargar_temas') }}" required>
                                <option value="">---Seleccione---</option>
                                @foreach ($areas as $area)
                                    <option value="{{ $area->id }}"
                                        {{ isset($jurisprudencia) ? ($area->id == $jurisprudencia->temaEspecifico->tema_->area_id ? 'selected' : '') : '' }}>
                                        {{ $area->area }}</option>
                                @endforeach
                            </select>
                            <small id="helpId" class="form-text text-muted">Área</small>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label class="requerido" for="tema_id">Tema</label>
                            <select class="form-control form-control-sm" id="tema_id"
                                data_url="{{ route('cargar_temasespec') }}" required>
                                @if (isset($jurisprudencia))
                                    <option value="">---Seleccione---</option>
                                    @foreach ($jurisprudencia->temaEspecifico->tema_->area->temas as $tema)
                                        <option value="{{ $tema->id }}"
                                            {{ isset($jurisprudencia) ? ($tema->id == $jurisprudencia->temaEspecifico->tema_id ? 'selected' : '') : '' }}>
                                            {{ $tema->tema }}</option>
                                    @endforeach
                                @else
                                    <option value="">Seleccione primero un Área</option>
                                @endif
                            </select>
                            <small id="helpId" class="form-text text-muted">Tema</small>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label class="requerido" for="wikutemaespecifico_id">Tema Especí­fico</label>
                            <select class="form-control form-control-sm" name="wikutemaespecifico_id"
                                id="wikutemaespecifico_id" required>
                                @if (isset($jurisprudencia))
                                    <option value="">---Seleccione---</option>
                                    @foreach ($jurisprudencia->temaEspecifico->tema_->temasespecificos as $temaespecif)
                                        <option value="{{ $temaespecif->id }}"
                                            {{ isset($jurisprudencia) ? ($temaespecif->id == $jurisprudencia->wikutemaespecifico_id ? 'selected' : '') : '' }}>
                                            {{ $temaespecif->tema }}</option>
                                    @endforeach
                                @else
                                    <option value="">Seleccione primero un Tema</option>
                                @endif
                            </select>
                            <small id="helpId" class="form-text text-muted">Tema Especí­fico</small>
                        </div>
                    @endif
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
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col-12" id="cajaEnte">
                                <label id="labelEnte" class="requerido" for="ente_id">Ente Emisor</label>
                                <div class="input-group mb-3">
                                    <select class="form-control form-control-sm enteClass" id="ente_id"
                                        data_url="{{ route('wiku-cargarsalas') }}" required>
                                        <option value="">---Seleccione---</option>
                                        @foreach ($entes as $ente)
                                            <option value="{{ $ente->id }}"
                                                {{ $jurisprudencia->subsala->sala->ente_id == $ente->id ? 'selected' : '' }}>
                                                {{ $ente->ente }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append d-flex align-items-center">
                                        <a class="btn btn-info btn-sm" id="nuevoEnte"><i class="fa fa-plus-circle"
                                                aria-hidden="true" style="cursor: pointer;"></i></a>
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
                                    <select class="form-control form-control-sm" id="sala_id"
                                        data_url="{{ route('wiku-cargarsubsalas') }}" required>
                                        <option value="">---Seleccione---</option>
                                        @foreach ($jurisprudencia->subsala->sala->ente->salas as $sala)
                                            <option value="{{ $sala->id }}"
                                                {{ $jurisprudencia->subsala->sala_id == $sala->id ? 'selected' : '' }}>
                                                {{ $sala->sala }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append d-flex align-items-center">
                                        <a class="btn btn-info btn-sm" id="nuevaSala"><i class="fa fa-plus-circle"
                                                aria-hidden="true" style="cursor: pointer;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col-12" id="cajaSubSala">
                                <label id="labelSubSala" class="requerido" for="subsala_id">Sub Sala</label>
                                <div class="input-group mb-3">
                                    <select class="form-control form-control-sm" id="subsala_id" name="subsala_id"
                                        required>
                                        @foreach ($jurisprudencia->subsala->sala->subsalas as $subsala)
                                            <option value="{{ $subsala->id }}"
                                                {{ $jurisprudencia->subsala_id == $subsala->id ? 'selected' : '' }}>
                                                {{ $subsala->subsala }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append d-flex align-items-center">
                                        <a class="btn btn-info btn-sm" id="nuevaSubSala"><i class="fa fa-plus-circle"
                                                aria-hidden="true" style="cursor: pointer;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12 col-md-3 form-group">
                        <label class="requerido" for="radicado">Número de radicado</label>
                        <input type="text" class="form-control form-control-sm" name="radicado" id="radicado"
                            aria-describedby="helpId" value="{{ old('radicado', $jurisprudencia->radicado ?? '') }}"
                            placeholder="" required>
                        <small id="helpId" class="form-text text-muted">Número de radicado</small>
                    </div>
                    <div class="col-12 col-md-3 form-group">
                        <label for="fecha">Fecha de creación</label>
                        <input type="date" class="form-control form-control-sm" name="fecha" id="fecha"
                            max="{{ date('Y-m-d') }}"
                            value="{{ old('fecha', $jurisprudencia->fecha ?? date('Y-m-d')) }}">
                        <small id="helpId" class="form-text text-muted">Fecha de creación</small>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col-12" id="cajaMagistrado">
                                <label id="labelmagistrado_id" class="requerido"
                                    for="magistrado_id">Magistrado</label>
                                <div class="input-group mb-3">
                                    <select class="form-control form-control-sm magistradoClass" id="magistrado_id"
                                        name="magistrado_id" required>
                                        <option value="">---Seleccione---</option>
                                        @foreach ($magistrados as $magistrado)
                                            <option value="{{ $magistrado->id }}"
                                                {{ $jurisprudencia->magistrado_id == $magistrado->id ? 'selected' : '' }}>
                                                {{ $magistrado->nombre1 . ' ' . $magistrado->nombre2 . ' ' . $magistrado->apellido1 . ' ' . $magistrado->apellido2 }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append d-flex align-items-center">
                                        <a class="btn btn-info btn-sm" id="nuevoMagistrado"><i class="fa fa-plus-circle"
                                                aria-hidden="true" style="cursor: pointer;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col-12" id="cajaDemandante">
                                <label id="labelDemandante" for="demandante_id">Demandante</label>
                                <div class="input-group mb-3">
                                    <select class="form-control form-control-sm" id="demandante_id"
                                        name="demandante_id">
                                        <option value="">---Seleccione---</option>
                                        @foreach ($demandantes as $demandante)
                                            <option value="{{ $demandante->id }}"
                                                {{ $jurisprudencia->demandante_id == $demandante->id ? 'selected' : '' }}>
                                                {{ $demandante->demandante }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append d-flex align-items-center">
                                        <a class="btn btn-info btn-sm" id="nuevoDemandante"><i class="fa fa-plus-circle"
                                                aria-hidden="true" style="cursor: pointer;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col-12" id="cajaDemandado">
                                <label id="labelDemandado" for="demandado_id">Demandado</label>
                                <div class="input-group mb-3">
                                    <select class="form-control form-control-sm" id="demandado_id" name="demandado_id">
                                        <option value="">---Seleccione---</option>
                                        @foreach ($demandados as $demandado)
                                            <option value="{{ $demandado->id }}"
                                                {{ $jurisprudencia->demandado_id == $demandado->id ? 'selected' : '' }}>
                                                {{ $demandado->demandado }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append d-flex align-items-center">
                                        <a class="btn btn-info btn-sm" id="nuevoDemandado"><i class="fa fa-plus-circle"
                                                aria-hidden="true" style="cursor: pointer;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 form-group">
                        <label for="archivo">Archivo</label>
                        <input class="form-control form-control-sm" type="file" name="archivo" id="archivo"
                            accept="application/pdf">
                        <small id="helpId" class="form-text text-muted">Archivo adjunto</small>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12 col-md-6 form-group">
                        <label class="requerido" for="texto">Texto Principal</label>
                        <textarea name="texto" id="texto" class="form-control form-control-sm" cols="30" rows="5"
                            style="resize: none;" required>{{ old('texto', $jurisprudencia->texto ?? '') }}</textarea>
                        <small id="helpId" class="form-text text-muted">Texto Principal</small>
                    </div>
                    <div class="col-12 col-md-6 form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control form-control-sm" cols="30"
                            rows="5"
                            style="resize: none;">{{ old('descripcion', $jurisprudencia->descripcion ?? '') }}</textarea>
                        <small id="helpId" class="form-text text-muted">Descripción</small>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
<hr>
