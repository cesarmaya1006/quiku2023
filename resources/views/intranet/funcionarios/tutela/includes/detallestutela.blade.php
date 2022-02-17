<div class="row p-3">
    <div class="col-12 rounded border mb-3">
        <div class="row">
            <div class="col-12 col-md-6">
                Número de radicado:
                <strong>{{ $tutela->radicado }}</strong>
            </div>
            <div class="col-12 col-md-6">
                Fecha de notificación: <strong>{{ $tutela->fecha_notificacion }}</strong>
            </div>
            <div class="col-12 col-md-6">
                Fecha de radicado: <strong>{{ $tutela->fecha_radicado }}</strong>
            </div>
            <div class="col-12 col-md-6">
                Jurisdicción: <strong>{{ $tutela->jurisdiccion }}</strong>
            </div>
            <div class="col-12 col-md-6">
                Juzgado: <strong>{{ $tutela->juzgado }}</strong>
            </div>
            <div class="col-12 col-md-6">
                Departatmento :
                <strong>{{ $tutela->departamento }}</strong>
            </div>
            <div class="col-12 col-md-6">
                Municipio : <strong>{{ $tutela->municipio }}</strong>
            </div>
            <div class="col-12 col-md-6">
                Nombre Juez : <strong>{{ $tutela->nombre_juez }}</strong>
            </div>
            <div class="col-12 col-md-6">
                Dirección Juzgado : <strong>{{ $tutela->direccion_juez }}</strong>
            </div>
            <div class="col-12 col-md-6">
                Teléfono Juzgado: <strong>{{ $tutela->telefono_juez }}</strong>
            </div>
            <div class="col-12 col-md-6">
                Correo Juzgado: <strong>{{ $tutela->correo_juez }}</strong>
            </div>
            <div class="col-12 col-md-6">
                Estado : <strong>{{ $tutela->estado->estado_funcionario }}</strong>
            </div>
            <div class="col-12 col-md-6">
                Prioridad : <strong>{{ $tutela->prioridad->prioridad }}</strong>
            </div>
        </div>
    </div>
</div>
<div class="row p-3">
    <div class="col-12 rounded border mb-3">
        <div class="menu-card">
            <div class="col-12 mt-2">
                <h5>Detalle Tutela</h5>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-primary collapsed-card">
                        <div class="card-header">
                            <h5 class="card-title">Términos</h5>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row px-2">
                                @if ($tutela->dias_termino)
                                    <div class="col-12">
                                        <p class="text-justify"><strong>Dí­as:</strong>
                                            {{ $tutela->dias_termino }}
                                        </p>
                                    </div>
                                @endif
                                @if ($tutela->horas_termino)
                                    <div class="col-12">
                                        <p class="text-justify"><strong>Horas:</strong>
                                            {{ $tutela->horas_termino }}</p>
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
                                                        <td class="text-justify">
                                                            {{ $tutela->titulo_admisorio }}
                                                        </td>
                                                        <td class="text-justify">
                                                            {{ $tutela->descripcion_admisorio }}
                                                        </td>
                                                        <td><a href="{{ asset('documentos/autoadmisorios/' . $tutela->url_admisorio) }}"
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
                                                <p class="text-justify">
                                                    <strong>Descripción:</strong>
                                                    {{ $tutela->text_medida_cautelar }}
                                                </p>
                                            </div>
                                            @if ($tutela->dias_medida_cautelar)
                                                <div class="col-12">
                                                    <p class="text-justify">
                                                        <strong>DÃ­as:</strong>
                                                        {{ $tutela->dias_medida_cautelar }}
                                                    </p>
                                                </div>
                                            @endif
                                            @if ($tutela->horas_medida_cautelar)
                                                <div class="col-12">
                                                    <p class="text-justify">
                                                        <strong>Horas:</strong>
                                                        {{ $tutela->horas_medida_cautelar }}
                                                    </p>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-primary collapsed-card">
                        <div class="card-header">
                            <h5 class="card-title">Accionantes</h5>

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
                                <div class="col-12 mt-2">
                                    @foreach ($tutela->accions as $accion)
                                        <div class="col-12 row">
                                            <div class="col-6">
                                                @if ($accion->tipo_accion == 'Accionante')
                                                    <div class="col-12 mb-3">
                                                        <h6 class="pl-4">Accionante
                                                        </h6>
                                                    </div>
                                                @else
                                                    <div class="col-12 mb-3">
                                                        <h6 class="pl-4">Accionado
                                                        </h6>
                                                    </div>
                                                @endif
                                                <div class="col-12">
                                                    <p class="text-justify">
                                                        <strong>Nombre:</strong>
                                                        {{ $accion->nombres_accion }}
                                                        {{ $accion->apellidos_accion }}
                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="text-justify"><strong>Tipo
                                                            Persona:</strong>
                                                        {{ $accion->tipo_persona_accion }}
                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="text-justify"><strong>Tipo
                                                            Documento:</strong>
                                                        {{ $accion->docutipos_id_accion }}
                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="text-justify"><strong>Número
                                                            Documento:</strong>
                                                        {{ $accion->numero_documento_accion }}
                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="text-justify">
                                                        <strong>Teléfono:</strong>
                                                        {{ $accion->telefono_accion }}
                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="text-justify">
                                                        <strong>Dirección:</strong>
                                                        {{ $accion->direccion_accion }}
                                                    </p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="text-justify">
                                                        <strong>Correo:</strong>
                                                        {{ $accion->correo_accion }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                @if ($accion->nombre_apoderado)
                                                    <div class="col-12  mb-3">
                                                        <h6 class="pl-4">Apoderado
                                                        </h6>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="text-justify">
                                                            <strong>Nombre:</strong>
                                                            {{ $accion->nombre_apoderado }}
                                                        </p>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Tipo
                                                                Documento:</strong>
                                                            {{ $accion->docutipos_id_apoderado }}
                                                        </p>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="text-justify">
                                                            <strong>Número
                                                                Documento:</strong>
                                                            {{ $accion->numero_documento_apoderado }}
                                                        </p>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="text-justify">
                                                            <strong>Tarjeta
                                                                Profesional:</strong>
                                                            {{ $accion->tarjeta_profesional_apoderado }}
                                                        </p>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="text-justify">
                                                            <strong>Teléfono:</strong>
                                                            {{ $accion->telefono_apoderado }}
                                                        </p>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="text-justify">
                                                            <strong>Dirección:</strong>
                                                            {{ $accion->direccion_apoderado }}
                                                        </p>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="text-justify">
                                                            <strong>Correo:</strong>
                                                            {{ $accion->correo_apoderado }}
                                                        </p>
                                                    </div>
                                                @endif
                                            </div>
                                            <hr>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            @if (sizeOf($tutela->anexostutela))
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-primary collapsed-card">
                            <div class="card-header">
                                <h5 class="card-title">Anexos</h5>

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
                                                            <td class="text-justify">
                                                                {{ $anexo->titulo }}
                                                            </td>
                                                            <td class="text-justify">
                                                                {{ $anexo->descripcion }}
                                                            </td>
                                                            <td><a href="{{ asset('documentos/tutelas/' . $anexo->url) }}"
                                                                    target="_blank"
                                                                    rel="noopener noreferrer">Descargar</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-primary collapsed-card">
                        <div class="card-header">
                            <h5 class="card-title">Hechos</h5>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row px-2">
                                @foreach ($tutela->hechos as $key => $hecho)
                                    <div class="col-12 row t">
                                        <div class="col-12 mb-3">
                                            <h6 class="pl-4">Hecho #
                                                {{ $key + 1 }}
                                            </h6>
                                        </div>
                                        <div class="col-12">
                                            <p class="text-justify">{{ $hecho->hecho }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-primary collapsed-card">
                        <div class="card-header">
                            <h5 class="card-title">Pretensiones</h5>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row px-2">
                                @foreach ($tutela->pretensiones as $key => $pretension)
                                    <div class="col-12 row t">
                                        <div class="col-12 mb-3">
                                            <h6 class="pl-4">Pretensión #
                                                {{ $key + 1 }}</h6>
                                        </div>
                                        <div class="col-12">
                                            <p class="text-justify">
                                                {{ $pretension->pretension }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            @if (sizeOf($tutela->argumentos))
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-primary collapsed-card">
                            <div class="card-header">
                                <h5 class="card-title">Argumentos</h5>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row px-2">
                                    @foreach ($tutela->argumentos as $key => $argumento)
                                        <div class="col-12 row t">
                                            <div class="col-12 mb-3">
                                                <h6 class="pl-4">Argumento #
                                                    {{ $key + 1 }}</h6>
                                            </div>
                                            <div class="col-12">
                                                <p class="text-justify">
                                                    {{ $argumento->argumento }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            @endif
            @if (sizeOf($tutela->pruebas))
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-primary collapsed-card">
                            <div class="card-header">
                                <h5 class="card-title">Pruebas</h5>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row px-2">
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
                                                            <td class="text-justify">
                                                                {{ $anexo->titulo }}
                                                            </td>
                                                            <td class="text-justify">
                                                                {{ $anexo->descripcion }}
                                                            </td>
                                                            <td><a href="{{ asset('documentos/tutelaspruebas/' . $anexo->url) }}"
                                                                    target="_blank"
                                                                    rel="noopener noreferrer">Descargar</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            @endif
            @if (sizeOf($tutela->motivos))
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-primary collapsed-card">
                            <div class="card-header">
                                <h5 class="card-title">Motivos</h5>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row px-2">
                                    @foreach ($tutela->motivos as $key => $motivo)
                                        <div class="col-6 row">
                                            <div class="col-12 mb-3">
                                                <h6 class="pl-4">Motivo #
                                                    {{ $key + 1 }}</h6>
                                            </div>
                                            <div class="col-12">
                                                <p class="text-justify">
                                                    <strong>Motivo:</strong>
                                                    {{ $motivo->motivo_tutela }}
                                                </p>
                                            </div>
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Sub -
                                                        motivo:</strong>
                                                    {{ $motivo->sub_motivo_tutela }}</p>
                                            </div>
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Tutela
                                                        sobre:</strong>
                                                    {{ $motivo->tipo_tutela }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            @endif
            @if ($tutela->primeraInstancia->count() > 0)
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-primary collapsed-card">
                            <div class="card-header">
                                <h5 class="card-title">Sentencia
                                    en primera instancia</h5>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row px-2">
                                    <div class="row">
                                        @foreach ($tutela->primeraInstancia as $primeraInstancia)
                                            <div class="col-12 col-md-3 text-center form-group">
                                                <label>Fecha de la sentencia</label>
                                                <br>
                                                <span
                                                    class="">{{ $primeraInstancia->fecha_sentencia }}</span>
                                            </div>
                                            <div class="col-12 col-md-3 text-center form-group">
                                                <label>Fecha de notificación</label>
                                                <br>
                                                <span
                                                    class="">{{ $primeraInstancia->fecha_notificacion }}</span>
                                            </div>
                                            <div class="col-12 col-md-3 text-center form-group">
                                                <label>Sentido de la sentencia</label>
                                                <br>
                                                <span
                                                    class="">{{ $primeraInstancia->sentencia }}</span>
                                            </div>
                                            <div class="col-12 col-md-3 text-center form-group">
                                                <label>Documento de sentencia</label>
                                                <br>
                                                <span class=""><a
                                                        href="{{ asset('documentos/tutelas/sentencias/' . $primeraInstancia->url_sentencia) }}"
                                                        target="_blank" rel="noopener noreferrer">Descargar</a></span>
                                            </div>
                                            @if ($primeraInstancia->anexosPrimeraInstancia)
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12 mt-3 mb-4">
                                                            <h6>Archivos Adjuntos</h6>
                                                        </div>
                                                        @foreach ($primeraInstancia->anexosPrimeraInstancia as $anexo)
                                                            <div class="col-12">
                                                                <div class="row">
                                                                    <div class="col-4">
                                                                        <div
                                                                            class="col-12 col-md-3 text-center form-group">
                                                                            <label>Titulo
                                                                                Anexo</label>
                                                                            <br>
                                                                            <span
                                                                                class="">{{ $anexo->titulo_anexo }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <div
                                                                            class="col-12 col-md-3 text-center form-group">
                                                                            <label>Descripción
                                                                                Anexo</label>
                                                                            <br>
                                                                            <span
                                                                                class="">{{ $anexo->descripcion_anexo }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <div
                                                                            class="col-12 col-md-3 text-center form-group">
                                                                            <label>Archivo
                                                                                Anexo</label>
                                                                            <br>
                                                                            <span class=""><a
                                                                                    href="{{ asset('documentos/tutelas/sentencias/' . $anexo->url_anexo) }}"
                                                                                    target="_blank"
                                                                                    rel="noopener noreferrer">Descargar</a></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($primeraInstancia->resuelvesPrimeraInstancia)
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12 mt-3 mb-4">
                                                            <h6>Resuleves Primera Instancia</h6>
                                                        </div>
                                                        @foreach ($primeraInstancia->resuelvesPrimeraInstancia as $resuelve)
                                                            @if ($resuelve->numeracion != null)
                                                                <?php $tipo = 'detalle'; ?>
                                                            @else
                                                                <?php $tipo = 'cantidad'; ?>
                                                            @endif
                                                        @endforeach
                                                        @if ($tipo == 'detalle')
                                                            <div class="col-12 mb-4">
                                                                <div class="row">
                                                                    <div class="col-12 table-responsive">
                                                                        <table class="table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Numeracion</th>
                                                                                    <th>Resuelve</th>
                                                                                    <th>Tiempo de cumplimiento</th>
                                                                                    <th>Fecha de Cumplimiento</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($primeraInstancia->resuelvesPrimeraInstancia as $resuelve)
                                                                                    <tr>
                                                                                        <td scope="row">
                                                                                            {{ $resuelve->numeracion }}
                                                                                        </td>
                                                                                        <td>{{ $resuelve->resuelve }}
                                                                                        </td>
                                                                                        <td>
                                                                                            @if ($resuelve->dias != null)
                                                                                                {{ $resuelve->dias . ' dias ' }}
                                                                                            @endif
                                                                                            @if ($resuelve->horas != null)
                                                                                                {{ $resuelve->horas . ' horas ' }}
                                                                                            @endif
                                                                                        </td>
                                                                                        <td>
                                                                                            @if ($resuelve->dias != null)
                                                                                                {{ date('Y-m-d', strtotime($resuelve->sentencia->fecha_notificacion . '+ ' . ($resuelve->dias + 1) . ' days')) }}
                                                                                            @endif
                                                                                            @if ($resuelve->horas != null)
                                                                                                {{ date('Y-m-d', strtotime($resuelve->sentencia->fecha_notificacion . '+ 1 days')) }}
                                                                                            @endif
                                                                                        </td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="col-12 mb-4">
                                                                <div class="row">
                                                                    <div class="col-12 table-responsive">
                                                                        <table class="table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Sentido</th>
                                                                                    <th>Tiempo de cumplimiento</th>
                                                                                    <th>Fecha de Cumplimiento</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach ($primeraInstancia->resuelvesPrimeraInstancia as $resuelve)
                                                                                    <tr>
                                                                                        <td>{{ $resuelve->sentido }}
                                                                                        </td>
                                                                                        <td>
                                                                                            @if ($resuelve->dias != null)
                                                                                                {{ $resuelve->dias . ' dias ' }}
                                                                                            @endif
                                                                                            @if ($resuelve->horas != null)
                                                                                                {{ $resuelve->horas . ' horas ' }}
                                                                                            @endif
                                                                                        </td>
                                                                                        <td>
                                                                                            @if ($resuelve->dias != null)
                                                                                                {{ date('Y-m-d', strtotime($resuelve->sentencia->fecha_notificacion . '+ ' . ($resuelve->dias + 1) . ' days')) }}
                                                                                            @endif
                                                                                            @if ($resuelve->horas != null)
                                                                                                {{ date('Y-m-d', strtotime($resuelve->sentencia->fecha_notificacion . '+ 1 days')) }}
                                                                                            @endif
                                                                                        </td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            @endif
            <hr>
        </div>
    </div>
</div>
