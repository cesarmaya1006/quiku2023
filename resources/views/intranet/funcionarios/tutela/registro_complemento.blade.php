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
        <div class="row d-flex justify-content-center">
            {{-- Inicio complemento tutela --}}
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Complemento de tutela</h3>
                    </div>
                    <div class="form_auto_admisorio_complemento">
                        <div class="card-body m-2">
                            <div class="row d-flex ">
                                <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold">Hechos</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                        {{-- <div class="form-row">
                                            <div class="col-12 col-md-6 form-group"><label class="requerido" for="">Radicado</label>
                                                <input class="form-control radicado" type="text" required>
                                            </div>
                                            <div class="col-12 col-md-6 form-group" id="cajadepartamento"><label class="requerido"
                                                    for="">Departamento</label>
                                                <select class="custom-select rounded-0 departamentos departamento_id" id="departamentos"
                                                    data_url="{{ route('cargar_municipios') }}">
                                                    <option value="">--Seleccione--</option>
                                                    @foreach ($departamentos as $departamento)
                                                        <option value="{{ $departamento->id }}">
                                                            {{ $departamento->departamento }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-6 form-group" id="cajamunicipio_id"><label class="requerido"
                                                    for="">Municipio</label>
                                                <select class="custom-select rounded-0 municipio_id" data_url="{{ route('cargar_sedes') }}"
                                                    id="municipio_id">
                                                    <option value="">--Seleccione--</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-6 form-group" id="cajajurisdiccion_id">
                                                <label class="requerido" for="">Jurisdiccion</label>
                                                <select id="jurisdiccion_id" class="custom-select rounded-0 jurisdiccion_id">
                                                    <option value="">--Seleccione--</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-6 form-group" id="cajajuzgado_id">
                                                <label class="requerido" for="">Juzgado</label>
                                                <select id="juzgado_id" class="custom-select rounded-0 juzgado_id">
                                                    <option value="">--Seleccione--</option>
                                                </select>
                                            </div> 
                                            <div class="form-group col-md-6">
                                                <label class="requerido" for="fecha">Fecha de notificación</label>
                                                <input type="date" class="form-control fecha_notificacion" id="fecha_notificacion" required>
                                            </div>                               
                                        </div> --}}
                                        <div class="col-12" id="hechos">
                                            <div class="form-group hechoFelicitacion">
                                                <div class="title-hecho d-flex justify-content-between mt-2">
                                                    <label for="hecho" class="">Hecho</label>
                                                    <button type="button"
                                                        class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminarHecho"><i
                                                            class="fas fa-minus-circle"></i></button>
                                                </div>
                                                <input class="form-control mt-2 hecho" type="text" name="hecho" id="hecho"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end flex-row">
                                            <button class="btn btn-secondary btn-xs btn-sombra pl-2 pr-2 crearHecho"
                                                id="crearHecho"><i class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Añadir
                                                otro hecho</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold">Pretensiones</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                        {{-- <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label class="requerido" for="nombreApellido_juez">Nombre y apellido</label>
                                                <input type="text" class="form-control lcapital nombreApellido_juez" id="nombreApellido_juez"
                                                    placeholder="Nombre y apellido" name="nombreApellido_juez" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="requerido" for="direccion_juez">Dirección Juzgado</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <button type="button" class="btn btn-info"><i class="fa fa-plus-circle"
                                                                aria-hidden="true" data-bs-toggle="modal"
                                                                data-bs-target="#staticBackdrop"></i></button>
                                                    </div>
                                                    <input type="text" class="form-control readonly direccion_juez" id="direccion_juez"
                                                        placeholder="Dirección" required>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="requerido" for="telefono_fijo_juez">Teléfono Juzgado</label>
                                                <input type="text" class="form-control telefono_fijo_juez" id="telefono_fijo_juez"
                                                    placeholder="Teléfono fijo">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="requerido" for="email_juez">Correo electrónico</label>
                                                <input type="email" class="form-control email_juez" id="email_juez" placeholder="Correo electrónico" required>
                                            </div>
                                        </div> --}}
                                        <div class="col-12" id="hechos">
                                            <div class="form-group hechoFelicitacion">
                                                <div class="title-hecho d-flex justify-content-between mt-2">
                                                    <label for="hecho" class="">Pretensión</label>
                                                    <button type="button"
                                                        class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminarHecho"><i
                                                            class="fas fa-minus-circle"></i></button>
                                                </div>
                                                <input class="form-control mt-2 hecho" type="text" name="hecho" id="hecho"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end flex-row">
                                            <button class="btn btn-secondary btn-xs btn-sombra pl-2 pr-2 crearHecho"
                                                id="crearHecho"><i class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Añadir
                                                otra pretensión</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold">Argumentos</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                        {{-- <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="requerido" for="">Días</label>
                                                <input type="number" class="form-control cantidad_dias" id="cantidad_dias" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="requerido" for="">Horas</label>
                                                <input type="time" class="form-control cantidad_horas" id="cantidad_horas" required>
                                            </div>
                                            <div class="col-12 d-flex row anexo">
                                                <div class="col-12 titulo-anexo d-flex justify-content-between">
                                                    <h6>Cargar auto admisorio</h6>
                                                </div>
                                                <div class="col-12 col-md-4 form-group titulo-anexo">
                                                    <label for="titulo">Título archivo</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="titulo">
                                                </div>
                                                <div class="col-12 col-md-4 form-group descripcion-anexo">
                                                    <label for="descripcion">Descripción archivo</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="descripcion">
                                                </div>
                                                <div class="col-12 col-md-4 form-group doc-anexo">
                                                    <label for="documentos">Archivo</label>
                                                    <input class="form-control form-control-sm" type="file"
                                                        id="documentos">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 d-flex flex-row mt-3">
                                                <div class="col-12 col-md-6">
                                                    <h6 class="font-weight-bold">Tiene Medida Cautelar?</h6>
                                                </div>
                                                <div class="form-check mb-3 mr-4">
                                                    <input type="radio"
                                                        class="form-check-input medidaCautelar_check medidaCautelar_check_si"
                                                        value="1" name="medidaCautelar" />
                                                    <label class="form-check-label" for="">SI</label>
                                                </div>
                                                <div class="form-check mb-3">
                                                    <input type="radio"
                                                        class="form-check-input medidaCautelar_check medidaCautelar_check_no"
                                                        value="0" name="medidaCautelar" checked />
                                                    <label class="form-check-label" for="">NO</label>
                                                </div>
                                            </div>
                                            <div class="col-12 medidaCautelar d-none mb-3">
                                                <div class="form-group row">
                                                    <label for="" class="">Texto Medida cautelar</label>
                                                    <textarea class="form-control medidaCautelar-text" rows="3" placeholder=""></textarea>
                                                </div>
                                                <h6 class="mt-3 font-weight-bold mb-3">Plazo medida cautelar</h6>
                                                <div class="form-group row">
                                                    <div class="form-group col-md-6">
                                                        <label class="" for="">Días</label>
                                                        <input type="number" class="form-control medidaCautelar-dias">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="" for="">Horas</label>
                                                        <input type="time" class="form-control medidaCautelar-horas">
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col-12" id="hechos">
                                            <div class="form-group hechoFelicitacion">
                                                <div class="title-hecho d-flex justify-content-between mt-2">
                                                    <label for="hecho" class="">Argumento</label>
                                                    <button type="button"
                                                        class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminarHecho"><i
                                                            class="fas fa-minus-circle"></i></button>
                                                </div>
                                                <input class="form-control mt-2 hecho" type="text" name="hecho" id="hecho"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end flex-row">
                                            <button class="btn btn-secondary btn-xs btn-sombra pl-2 pr-2 crearHecho"
                                                id="crearHecho"><i class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Añadir
                                                otro argumento</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold">Pruebas</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                        {{-- <div class="form-row">
                                            <div class="col-12 d-flex row accions">
                                                <div class="col-12 bloque_accions">
                                                    <div class="col-12 d-flex row contenido_accion">
                                                        <div class="col-12 d-flex justify-content-between">
                                                            <h6>Accionante/Accionado</h6>
                                                            <button type="button"
                                                                class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminar_contenido_accion"><i
                                                                    class="fas fa-minus-circle"></i></button>
                                                        </div>
                                                        <div class="form-group col-md-6 mt-3">
                                                            <label class="requerido" for="tipo_rol_accion">Tipo</label>
                                                            <select class="form-control form-control-sm tipo_rol_accion"
                                                                required>
                                                                <option value="">--Seleccione un tipo--</option>
                                                                <option value="1">Accionante</option>
                                                                <option value="2">Accionado</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6 mt-3">
                                                            <label class="requerido" for="tipo_persona_accion">Tipo persona</label>
                                                            <select class="form-control form-control-sm tipo_persona_accion"
                                                                required>
                                                                <option value="">--Seleccione un tipo--</option>
                                                                <option value="1">Persona Jurídica</option>
                                                                <option value="2">Persona natural</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6 mt-3">
                                                            <label class="requerido" for="docutipos_id">Tipo documento</label>
                                                            <select class="form-control form-control-sm docutipos_id_accion"
                                                                required>
                                                                <option value="">--Seleccione un tipo--</option>
                                                                @foreach ($tipos_docu as $tipodocu)
                                                                    <option value="{{ $tipodocu->id }}"
                                                                        {{ $tipodocu->id == 1 ? 'selected' : '' }}>
                                                                        {{ $tipodocu->abreb_id }} ({{ $tipodocu->tipo_id }})</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6 mt-3">
                                                            <label class="requerido" for="identificacion_accion">Número de documento</label>
                                                            <input type="text" class="form-control form-control-sm identificacion_accion" placeholder="Número documento" required>
                                                        </div>
                                                        <div class="col-12 col-md-6 form-group">
                                                            <label class="requerido" for="nombres_accion">Nombres</label>
                                                            <input type="text" class="form-control form-control-sm nombres_accion">
                                                        </div>
                                                        <div class="col-12 col-md-6 form-group">
                                                            <label class="requerido" for="titulo">Apellidos</label>
                                                            <input type="text" class="form-control form-control-sm apellidos_accion">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="requerido" for="email_accion">Correo electrónico</label>
                                                            <input type="email" class="form-control email_accion" id="email_accion" placeholder="Correo electrónico" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="requerido" for="direccion_accion">Dirección Juzgado</label>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <button type="button" class="btn btn-info"><i class="fa fa-plus-circle"
                                                                            aria-hidden="true" data-bs-toggle="modal"
                                                                            data-bs-target="#staticBackdrop"></i></button>
                                                                </div>
                                                                <input type="text" class="form-control readonly direccion_accion" id="direccion_accion"
                                                                    placeholder="Dirección" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class ="requerido" for="telefono_accion">Teléfono</label>
                                                            <input type="text" class="form-control telefono_accion" id="telefono_accion"
                                                                placeholder="Teléfono">
                                                        </div>
                                                        <h6 class="font-weight-bold my-3">Datos apoderado</h6>
                                                        <div class="form-group col-md-12">
                                                            <label class="" for="nombreApellido_apoderado">Nombre y apellido</label>
                                                            <input type="text" class="form-control lcapital nombreApellido_apoderado" id="nombreApellido_apoderado"
                                                                placeholder="Nombre y apellido" name="nombreApellido_apoderado" required>
                                                        </div>
                                                        <div class="form-group col-md-6 mt-3">
                                                            <label class="" for="docutipos_id_apoderado">Tipo documento</label>
                                                            <select class="form-control form-control-sm docutipos_id_apoderado"
                                                                required>
                                                                <option value="">--Seleccione un tipo--</option>
                                                                @foreach ($tipos_docu as $tipodocu)
                                                                    <option value="{{ $tipodocu->id }}"
                                                                        {{ $tipodocu->id == 1 ? 'selected' : '' }}>
                                                                        {{ $tipodocu->abreb_id }} ({{ $tipodocu->tipo_id }})</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6 mt-3">
                                                            <label class="" for="identificacion_apoderado">Número de documento</label>
                                                            <input type="text" class="form-control form-control-sm identificacion_apoderado" placeholder="Número documento" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="" for="tarjetaProfesional_apoderado">Tarjeta profesional</label>
                                                            <input type="text" class="form-control lcapital tarjetaProfesional_apoderado" id="tarjetaProfesional_apoderado"
                                                                placeholder="">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="" for="email_apoderado">Correo electrónico</label>
                                                            <input type="email" class="form-control email_apoderado" id="email_apoderado" placeholder="Correo electrónico" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="" for="direccion_apoderado">Dirección</label>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <button type="button" class="btn btn-info"><i class="fa fa-plus-circle"
                                                                            aria-hidden="true" data-bs-toggle="modal"
                                                                            data-bs-target="#staticBackdrop"></i></button>
                                                                </div>
                                                                <input type="text" class="form-control readonly direccion_apoderado" id="direccion_apoderado"
                                                                    placeholder="Dirección" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="telefono_apoderado">Teléfono</label>
                                                            <input type="text" class="form-control telefono_apoderado" id="telefono_apoderado"
                                                                placeholder="Teléfono">
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end flex-row mb-3">
                                                    <button class="btn btn-success btn-xs btn-sombra pl-2 pr-2 crearAccion"><i class="fa fa-plus-circle mr-2 crearAccion" aria-hidden="true"></i> Añadir otro Accionante/Accionado</button>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="form-group col-12">
                                            <h6>Anexo o prueba</h6>
                                        </div>
                                        <div class="col-12" id="anexosSolicitud">
                                            <div class="col-12 d-flex row anexosolicitud">
                                                <div class="col-12 titulo-anexo d-flex justify-content-between">
                                                    <h6>Anexo</h6>
                                                    <button type="button"
                                                        class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminaranexoSolicitud"><i
                                                            class="fas fa-minus-circle"></i></button>
                                                </div>
                                                <div class="col-12 col-md-4 form-group titulo-anexoSolicitud">
                                                    <label for="titulo">Título anexo</label>
                                                    <input type="text" class="form-control form-control-sm" name="titulo"
                                                        id="titulo">
                                                </div>
                                                <div class="col-12 col-md-4 form-group descripcion-anexoSolicitud">
                                                    <label for="descripcion">Descripción</label>
                                                    <input type="text" class="form-control form-control-sm" name="descripcion"
                                                        id="descripcion">
                                                </div>
                                                <div class="col-12 col-md-4 form-group doc-anexoSolicitud">
                                                    <label for="documentos">Anexos o Pruebas</label>
                                                    <input class="form-control form-control-sm" type="file" name="documentos"
                                                        id="documentos">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end flex-row mb-3">
                                            <button class="btn btn-success btn-xs btn-sombra pl-2 pr-2 crearAnexo"
                                                id="crearAnexo"><i class="fa fa-plus-circle mr-2" aria-hidden="true"></i> Añadir
                                                otro Anexo</button>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold">Tutela</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                        <div class="form-row">
                                            <div class="form-group col-12 col-md-6">
                                                <div class="col-12 d-flex justify-content-between">
                                                    <label class="requerido" for="">Categoría Motivo</label>
                                                </div>
                                                <select id="motivo_id" class="custom-select rounded-0 motivo_id">
                                                    <option value="">--Seleccione--</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-12 col-md-6">
                                                <label for="motivo_sub_id">Sub - Categoría Motivo</label>
                                                <select name="motivo_sub_id"
                                                    class="custom-select rounded-0 motivo_sub_id">
                                                    <option value="">--Seleccione--</option>
                                                </select>
                                            </div>  
                                            <div class="col-12 col-md-6 form-group">
                                                <label for="tipo">¿Su Tutela es sobre un producto o servicio?</label>
                                                <select name="tipo" id="tipo" class="custom-select rounded-0" required>
                                                    <option value="Producto">Producto</option>
                                                    <option value="Servicio">Servicio</option>
                                                </select>
                                            </div>
                                            <div class="col-12 d-flex row anexo">
                                                <div class="col-12 titulo-anexo d-flex justify-content-between">
                                                    <h6>Cargar tutela</h6>
                                                </div>
                                                <div class="col-12 col-md-4 form-group titulo-anexo">
                                                    <label for="titulo">Título archivo</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="titulo">
                                                </div>
                                                <div class="col-12 col-md-4 form-group descripcion-anexo">
                                                    <label for="descripcion">Descripción archivo</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="descripcion">
                                                </div>
                                                <div class="col-12 col-md-4 form-group doc-anexo">
                                                    <label for="documentos">Archivo</label>
                                                    <input class="form-control form-control-sm" type="file"
                                                        id="documentos">
                                                </div>
                                            </div>                          
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="mt-2 mb-3 pl-4 d-flex justify-content-end">
                                <button type="button" class="btn btn-primary pl-5 pr-5 btn-auto-admisorio" data_url="{{ route('crear_auto_admisorio') }}" data_url2="{{ route('crear_auto_admisorio') }}" data_token="{{ csrf_token() }}" >Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Fin complemento tutela --}}
        </div>
    </div>
@endsection 
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/tutela/complemento_tutela.js') }}"></script>
@endsection
<!-- ************************************************************* -->
