@extends("theme.back.plantilla")
<!-- ************************************************************* -->
<!-- Funciones php -->
@section('funciones_php')
    @include('includes.funciones_php')
@endsection
<!-- Pagina CSS -->
@section('estilosHojas')
    <link rel="stylesheet" href="{{ asset('css/intranet/index.css') }}">
@endsection
<!-- ************************************************************* -->
@section('tituloHoja')
    {{-- Sistema de informaci&oacute;n PQR LEGAL PROCEEDINGS --}}
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8">
                @include('includes.error-form')
                @include('includes.mensaje')
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-11 d-flex align-items-stretch flex-column">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tutela con número de radicado:
                            <strong>{{ $tutela->radicado }}</strong>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-3 col-sm-6 col-12">
                                        <div class="info-box bg-info">
                                            <span class="info-box-icon"><i class="fas fa-medal"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text text-center">En Gestión</span>
                                                <span class="progress-description" style="font-size: 0.8em;">
                                                    Dias gestión restante 80% / 8 Dias
                                                </span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-12">
                                        <a href="#">
                                            <div class="info-box bg-gray">
                                                <span class="info-box-icon"><i class="fas fa-medal"></i></span>

                                                <div class="info-box-content">
                                                    <span class="info-box-text">
                                                        Registro Sentencia <br> en primera instancia
                                                    </span>
                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                        </a>
                                        <!-- /.info-box -->
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-12">
                                        <div class="info-box bg-gray">
                                            <span class="info-box-icon"><i class="fas fa-medal"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">
                                                    Recursos de Impugnación
                                                </span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-12">
                                        <div class="info-box bg-gray">
                                            <span class="info-box-icon"><i class="fas fa-medal"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">
                                                    Registro Sentencia <br> en segunda instancia
                                                </span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12 rounded border mb-3 p-2">
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
                            <div class="col-12 rounded border mb-3 p-2">
                                <div class="menu-card">
                                    <div class="col-12 mt-2">
                                        <h5>Detalle Tutela</h5>
                                    </div>
                                    <hr>
                                    <div class="col-12 mt-2">
                                        <h5>Términos</h5>
                                    </div>
                                    <div class="row px-2">
                                        @if ($tutela->dias_termino)
                                            <div class="col-12">
                                                <p class="text-justify"><strong>Días:</strong>
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
                                                                    {{ $tutela->descripcion_admisorio }}</td>
                                                                <td><a href="{{ asset('documentos/autoadmisorios/' . $tutela->url_admisorio) }}"
                                                                        target="_blank"
                                                                        rel="noopener noreferrer">Descargar</a>
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
                                                    @if ($accion->tipo_accion == 'Accionante')
                                                        <div class="col-12 mb-3">
                                                            <h6 class="pl-4">Accionante</h6>
                                                        </div>
                                                    @else
                                                        <div class="col-12 mb-3">
                                                            <h6 class="pl-4">Accionado</h6>
                                                        </div>
                                                    @endif
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Nombre:</strong>
                                                            {{ $accion->nombres_accion }}
                                                            {{ $accion->apellidos_accion }}
                                                        </p>
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
                                                        <p class="text-justify"><strong>Teléfono:</strong>
                                                            {{ $accion->telefono_accion }}</p>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Dirección:</strong>
                                                            {{ $accion->direccion_accion }}</p>
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="text-justify"><strong>Correo:</strong>
                                                            {{ $accion->correo_accion }}</p>
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
                                    <hr>
                                @endif
                                <div class="row menu-card p-2">
                                    <div class="col-12 mb-2">
                                        <h5>Hechos</h5>
                                    </div>
                                    @foreach ($tutela->hechos as $key => $hecho)
                                        <div class="col-12 row t">
                                            <div class="col-12 mb-3">
                                                <h6 class="pl-4">Hecho # {{ $key + 1 }}</h6>
                                            </div>
                                            <div class="col-12">
                                                <p class="text-justify">{{ $hecho->hecho }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <hr>
                                <div class="row menu-card p-2">
                                    <div class="col-12 mb-2">
                                        <h5>Pretensiones</h5>
                                    </div>
                                    @foreach ($tutela->pretensiones as $key => $pretension)
                                        <div class="col-12 row t">
                                            <div class="col-12 mb-3">
                                                <h6 class="pl-4">Pretensión # {{ $key + 1 }}</h6>
                                            </div>
                                            <div class="col-12">
                                                <p class="text-justify">{{ $pretension->pretension }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <hr>
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
                                                        {{ $motivo->motivo_tutela }}</p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="text-justify"><strong>Sub - motivo:</strong>
                                                        {{ $motivo->sub_motivo_tutela }}</p>
                                                </div>
                                                <div class="col-12">
                                                    <p class="text-justify"><strong>Tutela sobre:</strong>
                                                        {{ $motivo->tipo_tutela }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <hr>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="{{ route('index_consulta') }}" class="btn btn-danger mx-2 px-4">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')

@endsection
<!-- ************************************************************* -->
