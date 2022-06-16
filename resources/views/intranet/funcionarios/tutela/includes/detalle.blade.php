<div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 1em;">
    <div class="card-header">
        <h3 class="card-title font-weight-bold">Detalles tutela</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
            </button>
        </div>
    </div>
    <div class="card-body" style="display: none;">
        <div class="menu-card">
            <div class="col-12 mt-2">
                <h5>Términos</h5>
            </div>
            <div class="row px-2">
                @if ($tutela->dias_termino)
                    <div class="col-12">
                        <p class="text-justify"><strong>Días:</strong> {{ $tutela->dias_termino }}</p>
                    </div>
                @endif
                @if ($tutela->horas_termino)
                    <div class="col-12">
                        <p class="text-justify"><strong>Horas:</strong> {{ $tutela->horas_termino }}</p>
                    </div>
                @endif
                @if ($tutela->url_admisorio)
                    <div class="row">
                        <div class="col-12">
                            <h6>Archivo auto admisorio</h6>
                        </div>
                        <div class="col-12">
                            <table class="table table-light" style="font-size: 0.8em;">
                                <thead>
                                    <tr>
                                        <th scope="col">Titulo</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Descarga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-justify">{{ $tutela->titulo_admisorio }}</td>
                                        <td class="text-justify">{{ $tutela->descripcion_admisorio }}</td>
                                        <td><a href="{{ asset('documentos/autoadmisorios/' . $tutela->url_admisorio) }}"
                                                target="_blank" rel="noopener noreferrer">Descargar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12">
                            <h6>Archivo tutela</h6>
                        </div>
                        <div class="col-12">
                            <table class="table table-light" style="font-size: 0.8em;">
                                <thead>
                                    <tr>
                                        <th scope="col">Titulo</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Descarga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-justify">{{ $tutela->titulo_tutela }}</td>
                                        <td class="text-justify">{{ $tutela->descripcion_tutela }}</td>
                                        <td><a href="{{ asset('documentos/tutelas/' . $tutela->url_tutela) }}"
                                                target="_blank" rel="noopener noreferrer">Descargar</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @if ($tutela->medida_cautelar == 'true')
                            <hr>
                            <div class="col-12 my-2">
                                <h5> Medida Cautelar</h5>
                            </div>
                            <div class="col-12">
                                <p class="text-justify"><strong>Descripción:</strong>
                                    {{ $tutela->text_medida_cautelar }}</p>
                            </div>
                            @if ($tutela->dias_medida_cautelar)
                                <div class="col-12">
                                    <p class="text-justify"><strong>Días:</strong>
                                        {{ $tutela->dias_medida_cautelar }}</p>
                                </div>
                            @endif
                            @if ($tutela->horas_medida_cautelar)
                                <div class="col-12">
                                    <p class="text-justify"><strong>Horas:</strong>
                                        {{ $tutela->horas_medida_cautelar }}</p>
                                </div>
                            @endif
                        @endif
                    </div>
                @endif
            </div>
            <hr>
        </div>
        <div class="row menu-card p-2">
            <div class="col-12">
                <h5>Accionantes</h5>
            </div>
            <div class="col-12 mt-2">
                @foreach ($tutela->accions as $accion)
                    <div class="col-12 row">
                        <div class="col-6">
                            @if ($accion->tipo_accion_id == 1)
                                <div class="col-12 mb-3">
                                    <h6 class="pl-4">Accionante</h6>
                                </div>
                            @else
                                <div class="col-12 mb-3">
                                    <h6 class="pl-4">Accionado</h6>
                                </div>
                            @endif
                            <div class="col-12">
                                <p class="text-justify"><strong>Nombre:</strong> {{ $accion->nombres_accion }}
                                    {{ $accion->apellidos_accion }}</p>
                            </div>
                            <div class="col-12">
                                <p class="text-justify"><strong>Tipo Persona:</strong>
                                    {{ $accion->tipo_persona_accion }}</p>
                            </div>
                            <div class="col-12">
                                <p class="text-justify"><strong>Tipo Documento:</strong>
                                    {{ $accion->docutipos_id_accion }}</p>
                            </div>
                            <div class="col-12">
                                <p class="text-justify"><strong>Número Documento:</strong>
                                    {{ $accion->numero_documento_accion }}</p>
                            </div>
                            <div class="col-12">
                                <p class="text-justify"><strong>Teléfono:</strong> {{ $accion->telefono_accion }}
                                </p>
                            </div>
                            <div class="col-12">
                                <p class="text-justify"><strong>Dirección:</strong> {{ $accion->direccion_accion }}
                                </p>
                            </div>
                            <div class="col-12">
                                <p class="text-justify"><strong>Correo:</strong> {{ $accion->correo_accion }}</p>
                            </div>
                        </div>
                        <div class="col-6">
                            @if ($accion->nombre_apoderado)
                                <div class="col-12  mb-3">
                                    <h6 class="pl-4">Apoderado</h6>
                                </div>
                                <div class="col-12">
                                    <p class="text-justify"><strong>Nombre:</strong>
                                        {{ $accion->nombre_apoderado }}</p>
                                </div>
                                <div class="col-12">
                                    <p class="text-justify"><strong>Tipo Documento:</strong>
                                        {{ $accion->docutipos_id_apoderado }}</p>
                                </div>
                                <div class="col-12">
                                    <p class="text-justify"><strong>Número Documento:</strong>
                                        {{ $accion->numero_documento_apoderado }}</p>
                                </div>
                                <div class="col-12">
                                    <p class="text-justify"><strong>Tarjeta Profesional:</strong>
                                        {{ $accion->tarjeta_profesional_apoderado }}</p>
                                </div>
                                <div class="col-12">
                                    <p class="text-justify"><strong>Teléfono:</strong>
                                        {{ $accion->telefono_apoderado }}</p>
                                </div>
                                <div class="col-12">
                                    <p class="text-justify"><strong>Dirección:</strong>
                                        {{ $accion->direccion_apoderado }}</p>
                                </div>
                                <div class="col-12">
                                    <p class="text-justify"><strong>Correo:</strong>
                                        {{ $accion->correo_apoderado }}</p>
                                </div>
                            @endif
                        </div>
                        <hr>
                    </div>
                @endforeach
            </div>
        </div>
        @if (sizeOf($tutela->anexostutela))
            <div class="menu-card">
                <div class="col-12 row mb-2">
                    <div class="col-6">
                        <h5>Anexos</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="col-12 table-responsive">
                        <table class="table table-light" style="font-size: 0.8em;">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Archivo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tutela->anexostutela as $anexo)
                                    <tr>
                                        <td class="text-justify">{{ $anexo->titulo }}
                                        </td>
                                        <td class="text-justify">
                                            {{ $anexo->descripcion }}
                                        </td>
                                        <td><a href="{{ asset('documentos/tutelas/' . $anexo->url) }}"
                                                target="_blank" rel="noopener noreferrer">Descargar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr>
        @endif
        @if (sizeOf($tutela->argumentos))
            <div class="row menu-card p-2">
                <div class="col-12 mb-2">
                    <h5>Argumentos</h5>
                </div>
                @foreach ($tutela->argumentos as $key => $argumento)
                    <div class="col-12 row t">
                        <div class="col-12 mb-3">
                            <h6 class="pl-4">Argumento # {{ $key + 1 }}</h6>
                        </div>
                        <div class="col-12">
                            <p class="text-justify">{{ $argumento->argumento }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <hr>
        @endif
        @if (sizeOf($tutela->pruebas))
            <div class="row menu-card p-2">
                <div class="col-12 mb-2">
                    <h5>Pruebas</h5>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="col-12 table-responsive">
                            <table class="table table-light" style="font-size: 0.8em;">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Archivo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tutela->pruebas as $anexo)
                                        <tr>
                                            <td class="text-justify">{{ $anexo->titulo }}
                                            </td>
                                            <td class="text-justify">
                                                {{ $anexo->descripcion }}
                                            </td>
                                            <td><a href="{{ asset('documentos/tutelaspruebas/' . $anexo->url) }}"
                                                    target="_blank" rel="noopener noreferrer">Descargar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        @endif
        @if (sizeOf($tutela->motivos))
            <div class="row menu-card p-2">
                <div class="col-12 mb-2">
                    <h5>Motivos</h5>
                </div>
                @foreach ($tutela->motivos as $key => $motivo)
                    <div class="col-6 row">
                        <div class="col-12 mb-3">
                            <h6 class="pl-4">Motivo # {{ $key + 1 }}</h6>
                        </div>
                        <div class="col-12">
                            <p class="text-justify"><strong>Motivo:</strong>
                                {{ $motivo->motivo }}</p>
                        </div>
                        <div class="col-12">
                            <p class="text-justify"><strong>Sub - motivo:</strong>
                                @foreach ($motivo->sub_motivostutelas as $sub_motivostutela)
                                    @foreach ($tutela->submotivos as $submotivo)
                                        @if ($sub_motivostutela->id == $submotivo->id)
                                            {{ $submotivo->sub_motivo }}
                                        @endif
                                    @endforeach
                                @endforeach
                            </p>
                        </div>
                        <div class="col-12">
                            <p class="text-justify"><strong>Tutela sobre:</strong>
                                @foreach ($tutela->motivos_tipo as $tipo_tutela)
                                    {{ $tipo_tutela->tipo_tutela }}
                                @endforeach
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <hr>
        @endif
    </div>
</div>
