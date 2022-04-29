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
            <div class="col-12 col-md-6">
                Fecha límite: <strong>{{ $tutela->fecha_limite }}</strong>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-primary collapsed-card">
            <div class="card-header">
                <h5 class="card-title">Detalle Tutela</h5>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
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
                    @if ($tutela->url_admisorio || $tutela->url_tutela || $tutela->primeraInstancia )
                        <div class="row">
                            <div class="col-12">
                                <h6>Archivos</h6>
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
                                        @if ($tutela->url_admisorio)
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
                                        @endif
                                        @if ($tutela->url_tutela)
                                        <tr>
                                            <td class="text-justify">
                                                {{ $tutela->titulo_tutela }}
                                            </td>
                                            <td class="text-justify">
                                                {{ $tutela->descripcion_tutela }}
                                            </td>
                                            <td><a href="{{ asset('documentos/autoadmisorios/' . $tutela->url_tutela) }}"
                                                    target="_blank" rel="noopener noreferrer">Descargar</a>
                                            </td>
                                        </tr>
                                        @endif
                                        @if ($tutela->primeraInstancia)
                                            <tr>
                                                <td class="text-justify">
                                                    Sentencia en primera instancia
                                                </td>
                                                <td class="text-justify">
                                                    ---
                                                </td>
                                                <td><a href="{{ asset('documentos/autoadmisorios/' . $tutela->primeraInstancia->url_tutela) }}"
                                                        target="_blank" rel="noopener noreferrer">Descargar</a>
                                                </td>
                                            </tr>
                                        @endif
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
                                            <strong>Dí­as:</strong>
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
        </div>
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
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mt-2">
                        @foreach ($tutela->accions as $accion)
                            <div class="col-12 row">
                                <div class="col-6">
                                    @if ($accion->tipo_accion_id == 1)
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
        </div>
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
                </div>
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
            </div>
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
            </div>
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
        </div>
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
            </div>
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
        </div>
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
                </div>
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
            </div>
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
                </div>
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
            </div>
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
                </div>
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
            </div>
        </div>
    </div>
@endif
@if ($tutela->primeraInstancia)
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
                </div>
                <div class="card-body">
                    <div class="row px-2">
                        <div class="row">
                            @php
                                $primeraInstancia = $tutela->primeraInstancia;
                            @endphp
                            <div class="col-12 col-md-3 text-center form-group">
                                <label>Fecha de la sentencia</label>
                                <br>
                                <span class="">{{ $primeraInstancia->fecha_sentencia }}</span>
                            </div>
                            <div class="col-12 col-md-3 text-center form-group">
                                <label>Fecha de notificación</label>
                                <br>
                                <span class="">{{ $primeraInstancia->fecha_notificacion }}</span>
                            </div>
                            <div class="col-12 col-md-3 text-center form-group">
                                <label>Sentido de la sentencia</label>
                                <br>
                                <span class="">{{ $primeraInstancia->sentencia }}</span>
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
                                                        <div class="col-12 col-md-3 text-center form-group">
                                                            <label>Titulo
                                                                Anexo</label>
                                                            <br>
                                                            <span
                                                                class="">{{ $anexo->titulo_anexo }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="col-12 col-md-3 text-center form-group">
                                                            <label>Descripción
                                                                Anexo</label>
                                                            <br>
                                                            <span
                                                                class="">{{ $anexo->descripcion_anexo }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="col-12 col-md-3 text-center form-group">
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
                                            @if ($resuelve->resuelve != null)
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
                                                                    <th>Numeracion</th>
                                                                    <th>Sentido</th>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@if (sizeOf($tutela->historialasignacion))
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary collapsed-card">
                <div class="card-header">
                    <h5 class="card-title">Historial asignación</h5>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row px-2">
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-light" style="font-size: 0.8em;">
                                    <thead>
                                        <tr>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Empleado</th>
                                            <th scope="col">Historial</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tutela->historialasignacion as $historial)
                                            <tr>
                                                <td>{{ $historial->created_at }}</td>
                                                <td class="text-justify">{{ $historial->empleado->nombre1 }}
                                                    {{ $historial->empleado->apellido1 }}</td>
                                                <td class="text-justify">{{ $historial->historial }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @if ($tutela->estadostutela_id != 4)
                            <hr>
                            <div class="row d-flex px-12 p-3">
                                <div class="container-mensaje-historial form-group col-12">
                                    <label for="" class="">Agregar Historial</label>
                                    <textarea class="form-control mensaje-historial" rows="3" placeholder="" required></textarea>
                                </div>
                                <div class="col-12 col-md-12 form-group d-flex">
                                    <button href="" class="btn btn-primary px-4 guardarHistorial"
                                        data_url="{{ route('historial_tutela_guardar') }}"
                                        data_token="{{ csrf_token() }}">Guardar historial</button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@if ($tutela->estado_asignacion == 0)
    @php
        $hechosAsignados = $tutela->hechos->where('empleado_id', '!=', null);
        $pretensionesAsignados = $tutela->pretensiones->where('empleado_id', '!=', null);
        if (sizeOf($hechosAsignados) || sizeOf($pretensionesAsignados)) {
            $asignados = 1;
        } else {
            $asignados = 0;
        }
    @endphp
    <div class="row">
        <input class="id_auto_admisorio" type="hidden" value="{{ $tutela->id }}">
        <div class="col-12">
            <div class="card card-outline card-primary collapsed-card">
                <div class="card-header">
                    <h5 class="card-title">Gestion asignación</h5>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row px-2">
                        <div class="row">
                            <div class="col-12 col-md-5 form-group">
                                <label for="">¿Acepta la asignación?</label>
                                <select class="custom-select rounded-0 confirmacion-asignacion" required="">
                                    <option value="1">Aceptar</option>
                                    <option value="0">Rechazar</option>
                                </select>
                            </div>
                            <div class="container-mensaje-asigacion form-group col-10 d-none">
                                <label for="" class="">Mensaje</label>
                                <textarea class="form-control mensaje-asignacion" rows="3" placeholder="" required></textarea>
                            </div>
                            <input class="asignados" type="hidden" value="{{ $asignados }}">
                            <div class="col-12 col-md-3 form-group d-flex align-items-end">
                                <button href="" class="btn btn-primary mx-2 px-4 guardarAsignacion"
                                    data_url="{{ route('asignacion_tutela_guardar') }}"
                                    data_token="{{ csrf_token() }}">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@if ($tutela->estado_asignacion)
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary collapsed-card">
                <div class="card-header">
                    <h5 class="card-title">Gestión tareas</h5>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row px-2">
                        <div class="row">
                            <div class="col-12 table-responsive d-flex justify-content-center">
                                <table class="table table-light col-12" style="font-size: 0.8em;">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tarea</th>
                                            <th scope="col">Funcionario</th>
                                            <th scope="col">Fecha de asignación</th>
                                            <th scope="col">Estado Tarea</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tutela->asignaciontareas as $asignacion)
                                            <tr>
                                                <td>{{ $asignacion->tarea->tarea }}</td>
                                                <td>{{ $asignacion->empleado->nombre1 }}
                                                    {{ $asignacion->empleado->apellido1 }}</td>
                                                <td>{{ $asignacion->created_at }}</td>
                                                <td>{{ $asignacion->estadotarea->estado }} %</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if ($tutela->estadostutela_id != 4)
                                <hr>
                                <div class="col-12">
                                    <h5 class="">Asignación tareas</h5>
                                    <div class="row d-flex px-4">
                                        <div class="col-12 col-md-5 form-group">
                                            <label for="">Tarea</label>
                                            <select class="custom-select rounded-0 tarea" required=""
                                                data_url="{{ route('cargar_tareas') }}"></select>
                                        </div>
                                        <div class="col-12 col-md-5 form-group">
                                            <label for="">Cargo</label>
                                            <select class="custom-select rounded-0 cargo" required=""
                                                data_url="{{ route('cargar_cargos') }}"
                                                data_url2="{{ route('cargar_funcionarios') }}">
                                                <option value="">--Seleccione--</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-5 form-group">
                                            <label for="">Funcionario</label>
                                            <select class="custom-select rounded-0 funcionario" required="">
                                                <option value="">--Seleccione--</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6 form-group d-flex align-items-end">
                                            <button href="" class="btn btn-primary py-2 px-3 asignacion_tarea_guardar"
                                                data_url="{{ route('asignacion_tarea_tutela_guardar') }}"
                                                data_token="{{ csrf_token() }}">Guardar asignación</button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <hr>
                            <h5 class="">Historial tareas</h5>
                            <div class="col-12 table-responsive">
                                <table class="table table-light" style="font-size: 0.8em;">
                                    <thead>
                                        <tr>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Empleado</th>
                                            <th scope="col">Tarea</th>
                                            <th scope="col">Historial</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tutela->historialtareas as $historial)
                                            <tr>
                                                <td>{{ $historial->created_at }}</td>
                                                <td class="text-justify">{{ $historial->empleado->nombre1 }}
                                                    {{ $historial->empleado->apellido1 }}</td>
                                                @if ($historial->tarea)
                                                    <td class="text-justify">{{ $historial->tarea->tarea }}</td>
                                                @else
                                                    <td class="text-justify">ADMINISTRADOR</td>
                                                @endif
                                                <td class="text-justify">{{ $historial->historial }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if ($tutela->estadostutela_id != 4)
                                <hr>
                                <div class="col-12">
                                    <div class="row d-flex px-12 p-3">
                                        <div class="container-mensaje-historial-tarea form-group col-12">
                                            <label for="" class="">Agregar Historial</label>
                                            <textarea class="form-control mensaje-historial-tarea" rows="3" placeholder="" required></textarea>
                                        </div>
                                        <div
                                            class="col-12 col-md-12 form-group d-flex align-items-end justify-content-end">
                                            <button href="" class="btn btn-primary mx-2 px-4 guardarHistorialTarea"
                                                data_url="{{ route('historial_tarea_tutela_guardar') }}"
                                                data_token="{{ csrf_token() }}">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (sizeOf($tutela->respuestas))
                                <hr>
                                <div class="p-2 mb-4">
                                    <h5 class="">Respuesta </h5>
                                    <div class="col-12 table-responsive">
                                        <table class="table table-light" style="font-size: 0.8em;">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Fecha</th>
                                                    <th scope="col">Empleado</th>
                                                    <th scope="col">Tarea</th>
                                                    <th scope="col">Tipo</th>
                                                    <th scope="col">Descarga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tutela->respuestas as $respuesta)
                                                    <tr>
                                                        <td>{{ $respuesta->created_at }}</td>
                                                        <td class="text-justify">
                                                            {{ $respuesta->empleado->nombre1 }}
                                                            {{ $respuesta->empleado->apellido1 }}</td>
                                                        <td class="text-justify">{{ $respuesta->tarea->tarea }}
                                                        </td>
                                                        <td>Respuesta
                                                            {{ $respuesta->tipo_respuesta == 1 ? 'tutela' : 'sentencia 1° instancia' }}
                                                        </td>
                                                        <td class="text-justify"><a
                                                                href="{{ route('descarga_respuesta_tutela', ['id' => $respuesta->id]) }}"
                                                                target="_blank" rel="noopener noreferrer">
                                                                <i class="fas fa-file-download"></i> Descarga</a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <hr class="mt-5">
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@if ($tutela->segundaInstancia)
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-primary collapsed-card">
                <div class="card-header">
                    <h5 class="card-title">Sentencia
                        en segunda instancia</h5>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row px-2">
                        <div class="row">
                            @php
                                $segundaInstancia = $tutela->segundaInstancia;
                            @endphp
                            <div class="col-12 col-md-3 text-center form-group">
                                <label>Fecha de la sentencia</label>
                                <br>
                                <span class="">{{ $segundaInstancia->fecha_sentencia }}</span>
                            </div>
                            <div class="col-12 col-md-3 text-center form-group">
                                <label>Fecha de notificación</label>
                                <br>
                                <span class="">{{ $segundaInstancia->fecha_notificacion }}</span>
                            </div>
                            <div class="col-12 col-md-3 text-center form-group">
                                <label>Sentido de la sentencia</label>
                                <br>
                                <span class="">{{ $segundaInstancia->sentencia }}</span>
                            </div>
                            <div class="col-12 col-md-3 text-center form-group">
                                <label>Documento de sentencia</label>
                                <br>
                                <span class=""><a
                                        href="{{ asset('documentos/tutelas/sentencias/' . $segundaInstancia->url_sentencia) }}"
                                        target="_blank" rel="noopener noreferrer">Descargar</a></span>
                            </div>
                            @if ($segundaInstancia->anexosSegundaInstancia)
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 mt-3 mb-4">
                                            <h6>Archivos Adjuntos</h6>
                                        </div>
                                        @foreach ($segundaInstancia->anexosSegundaInstancia as $anexo)
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="col-12 col-md-3 text-center form-group">
                                                            <label>Titulo
                                                                Anexo</label>
                                                            <br>
                                                            <span
                                                                class="">{{ $anexo->titulo_anexo }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="col-12 col-md-3 text-center form-group">
                                                            <label>Descripción
                                                                Anexo</label>
                                                            <br>
                                                            <span
                                                                class="">{{ $anexo->descripcion_anexo }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="col-12 col-md-3 text-center form-group">
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
                            @if ($segundaInstancia->resuelvesSegundaInstancia)
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 mt-3 mb-4">
                                            <h6>Resuleves Primera Instancia</h6>
                                        </div>
                                        @foreach ($segundaInstancia->resuelvesSegundaInstancia as $resuelve)
                                            @if ($resuelve->resuelve != null)
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
                                                                @foreach ($segundaInstancia->resuelvesSegundaInstancia as $resuelve)
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
                                                                    <th>Numeracion</th>
                                                                    <th>Sentido</th>
                                                                    <th>Tiempo de cumplimiento</th>
                                                                    <th>Fecha de Cumplimiento</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($segundaInstancia->resuelvesSegundaInstancia as $resuelve)
                                                                    <tr>
                                                                        <td scope="row">
                                                                            {{ $resuelve->numeracion }}
                                                                        </td>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@if ($tutela->primeraInstancia)
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
                </div>
                <div class="card-body">
                    <div class="row px-2">
                        <div class="row">
                            @php
                                $primeraInstancia = $tutela->primeraInstancia;
                            @endphp
                            <div class="col-12 col-md-3 text-center form-group">
                                <label>Fecha de la sentencia</label>
                                <br>
                                <span class="">{{ $primeraInstancia->fecha_sentencia }}</span>
                            </div>
                            <div class="col-12 col-md-3 text-center form-group">
                                <label>Fecha de notificación</label>
                                <br>
                                <span class="">{{ $primeraInstancia->fecha_notificacion }}</span>
                            </div>
                            <div class="col-12 col-md-3 text-center form-group">
                                <label>Sentido de la sentencia</label>
                                <br>
                                <span class="">{{ $primeraInstancia->sentencia }}</span>
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
                                                        <div class="col-12 col-md-3 text-center form-group">
                                                            <label>Titulo
                                                                Anexo</label>
                                                            <br>
                                                            <span
                                                                class="">{{ $anexo->titulo_anexo }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="col-12 col-md-3 text-center form-group">
                                                            <label>Descripción
                                                                Anexo</label>
                                                            <br>
                                                            <span
                                                                class="">{{ $anexo->descripcion_anexo }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="col-12 col-md-3 text-center form-group">
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
                                            @if ($resuelve->resuelve != null)
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
                                                                    <th>Numeracion</th>
                                                                    <th>Sentido</th>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
