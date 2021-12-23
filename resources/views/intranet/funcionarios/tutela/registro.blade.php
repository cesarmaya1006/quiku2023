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
            {{-- Inicio Tutela --}}
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Registro auto admisorio</h3>
                    </div>
                    <div class="form_auto_admisorio">
                        <div class="card-body m-2">
                            <div class="row d-flex ">
                                <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold">Auto admisorio - Juzgado</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                        <div class="form-row">
                                            <div class="col-12 col-md-6 form-group"><label class="requerido" for="">Radicado</label>
                                                <input class="form-control radicado" type="text" required>
                                            </div>
                                            <div class="col-12 col-md-6 form-group cajajurisdiccion">
                                                <label class="requerido" for="">Jurisdiccion</label>
                                                <select class="custom-select rounded-0 jurisdiccion" data_url="{{ route('cargar_nombre_despachos') }}">
                                                    <option value="">--Seleccione--</option>
                                                    <option value="CONSEJO SUPERIOR DE LA JUDICATURA">CONSEJO SUPERIOR DE LA JUDICATURA</option>
                                                    <option value="CONSTITUCIONAL">CONSTITUCIONAL</option>
                                                    <option value="CONTENCIOSO ADMINISTRATIVO">CONTENCIOSO ADMINISTRATIVO</option>
                                                    <option value="DISCIPLINARIA">DISCIPLINARIA</option>
                                                    <option value="ORDINARIA">ORDINARIA</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-6 form-group cajajuzgado">
                                                <label class="requerido" for="">Juzgado</label>
                                                <select class="custom-select rounded-0 juzgado" data_url="{{ route('cargar_ubicacion_despachos') }}">
                                                    <option value="">--Seleccione--</option>
                                                </select>
                                            </div> 
                                            <div class="col-12 col-md-6 form-group cajadepartamento"><label class="requerido" for="">Departamento</label>
                                                <select class="custom-select rounded-0 departamento">
                                                    <option value="">--Seleccione--</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-6 form-group cajamunicipio"><label class="requerido"
                                                    for="">Municipio</label>
                                                <select class="custom-select rounded-0 municipio">
                                                    <option value="">--Seleccione--</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="requerido" for="fecha">Fecha de notificación</label>
                                                <input type="date" class="form-control fecha_notificacion" id="fecha_notificacion" required>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label class="requerido" for="">Hora de notificación</label>
                                                <input type="time" class="form-control fecha_notificacion_horas" required>
                                            </div>                               
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold">Auto admisorio - Juez</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label class="requerido" for="nombreApellido_juez">Nombre y apellido</label>
                                                <input type="text" class="form-control lcapital nombreApellido_juez"
                                                    placeholder="Nombre y apellido" name="nombreApellido_juez" required readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="requerido" for="direccion_juez">Dirección Juzgado</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <button type="button" class="btn btn-info"><i class="fa fa-plus-circle"
                                                                aria-hidden="true" data-bs-toggle="modal"
                                                                data-bs-target="#staticBackdrop"></i></button>
                                                    </div>
                                                    <input type="text" class="form-control readonly direccion_juez"
                                                        placeholder="Dirección" required readonly>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="requerido" for="telefono_fijo_juez">Teléfono Juzgado</label>
                                                <input type="text" class="form-control telefono_fijo_juez"
                                                    placeholder="Teléfono fijo" readonly>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="requerido" for="email_juez">Correo electrónico</label>
                                                <input type="email" class="form-control email_juez" placeholder="Correo electrónico" required readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold">Auto admisorio - Término</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                        <div class="form-row">
                                            <div class="col-12 col-md-6 form-group selectorTiempoTermino">
                                                <label class="requerido" for="">Selector tiempo terminos</label>
                                                <select class="custom-select rounded-0 selector">
                                                    <option value="">--Seleccione--</option>
                                                    <option value="1">Días</option>
                                                    <option value="2">Horas</option>
                                                </select>
                                            </div>
                                            <div class="row tiempo-terminos">
                                                <div class="form-group col-md-12 content-dias d-none">
                                                    <label class="requerido" for="">Días</label>
                                                    <input type="number" class="form-control cantidad_dias" required>
                                                </div>
                                                <div class="form-group col-md-12 content-horas d-none">
                                                    <label class="requerido" for="">Horas</label>
                                                    <input type="number" class="form-control cantidad_horas" required>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex row bolque-anexo-admisorio">
                                                <div class="col-12 titulo-anexo d-flex justify-content-between">
                                                    <h6>Cargar auto admisorio</h6>
                                                </div>
                                                <div class="col-12 col-md-4 form-group titulo-anexo-admisorio">
                                                    <label for="titulo">Título archivo</label>
                                                    <input type="text" class="form-control form-control-sm">
                                                </div>
                                                <div class="col-12 col-md-4 form-group descripcion-anexo-admisorio">
                                                    <label for="descripcion">Descripción archivo</label>
                                                    <input type="text" class="form-control form-control-sm">
                                                </div>
                                                <div class="col-12 col-md-4 form-group archivo-admisorio">
                                                    <label for="documentos">Archivo</label>
                                                    <input class="form-control form-control-sm" type="file">
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
                                                    <div class="col-12 col-md-6 form-group selectorTiempoMedida">
                                                        <label class="" for="">Selector tiempo medida cautelar</label>
                                                        <select class="custom-select rounded-0 selector">
                                                            <option value="">--Seleccione--</option>
                                                            <option value="1">Días</option>
                                                            <option value="2">Horas</option>
                                                        </select>
                                                    </div>
                                                    <div class="row tiempo-medida col-12 col-md-6">
                                                        <div class="form-group col-md-6 content-dias d-none">
                                                            <label class="" for="">Días</label>
                                                            <input type="number" class="form-control medidaCautelar-dias">
                                                        </div>
                                                        <div class="form-group col-md-6 content-horas d-none">
                                                            <label class="" for="">Horas</label>
                                                            <input type="number" class="form-control medidaCautelar-horas">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold">Accionantes</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                        <div class="form-row">
                                            <div class="col-12 d-flex row accions">
                                                <div class="col-12 bloque_accions">
                                                    <div class="col-12 d-flex row contenido_accion">
                                                        <div class="col-12 d-flex justify-content-between">
                                                            <h6>Accionante</h6>
                                                            <button type="button"
                                                                class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminar_contenido_accion"><i
                                                                    class="fas fa-minus-circle"></i></button>
                                                        </div>
                                                        <input type="hidden" class="tipo_rol_accion" value="Accionante" >
                                                        <div class="form-group col-md-6 mt-3">
                                                            <label class="requerido" for="tipo_persona_accion">Tipo persona</label>
                                                            <select class="form-control form-control-sm tipo_persona_accion"
                                                                required>
                                                                <option value="">--Seleccione un tipo--</option>
                                                                <option value="Persona Natural">Persona Natural</option>
                                                                <option value="Persona Jurídica">Persona Jurídica</option>
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

                                                        <div class="form-group col-md-6">
                                                            <label class="requerido" for="identificacion_accion">Número de documento</label>
                                                            <input type="text" class="form-control form-control-sm identificacion_accion" placeholder="Número documento" required>
                                                        </div>

                                                        <div class="col-12 col-md-6 form-group">
                                                            <label class="requerido" for="nombres_accion">Nombres</label>
                                                            <input type="text" class="form-control form-control-sm nombres_accion">
                                                        </div>

                                                        <div class="col-12 col-md-6 form-group">
                                                            <label class="" for="titulo">Apellidos</label>
                                                            <input type="text" class="form-control form-control-sm apellidos_accion">
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label class="" for="email_accion">Correo electrónico</label>
                                                            <input type="email" class="form-control correo_accion" placeholder="Correo electrónico" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="" for="direccion_accion">Dirección</label>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <button type="button" class="btn btn-info"><i class="fa fa-plus-circle"
                                                                            aria-hidden="true" data-bs-toggle="modal"
                                                                            data-bs-target="#staticBackdrop"></i></button>
                                                                </div>
                                                                <input type="text" class="form-control readonly direccion_accion"
                                                                    placeholder="Dirección" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class ="" for="telefono_accion">Teléfono</label>
                                                            <input type="text" class="form-control telefono_accion"
                                                                placeholder="Teléfono">
                                                        </div>
                                                        <h6 class="font-weight-bold my-3">Datos apoderado</h6>
                                                        <div class="form-group col-md-12">
                                                            <label class="" for="nombreApellido_apoderado">Nombre y apellido</label>
                                                            <input type="text" class="form-control lcapital nombreApellido_apoderado"
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
                                                            <input type="email" class="form-control correo_apoderado" placeholder="Correo electrónico" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="" for="direccion_apoderado">Dirección</label>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <button type="button" class="btn btn-info"><i class="fa fa-plus-circle"
                                                                            aria-hidden="true" data-bs-toggle="modal"
                                                                            data-bs-target="#staticBackdrop"></i></button>
                                                                </div>
                                                                <input type="text" class="form-control readonly direccion_apoderado"
                                                                    placeholder="Dirección" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="telefono_apoderado">Teléfono</label>
                                                            <input type="text" class="form-control telefono_apoderado"
                                                                placeholder="Teléfono">
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end flex-row mb-3">
                                                    <button class="btn btn-success btn-xs btn-sombra pl-2 pr-2 crearAccion"><i class="fa fa-plus-circle mr-2 crearAccion" aria-hidden="true"></i> Añadir otro Accionante/Accionado</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 0.8em;">
                                    <div class="card-header">
                                        <h3 class="card-title font-weight-bold">Tutela - Anexos</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                        <div class="form-row">
                                            <div class="col-12 d-flex row anexos">
                                                <div class="col-12 bloque_anexos">
                                                    <div class="col-12 d-flex row contenido_anexo">
                                                        <div class="col-12 d-flex justify-content-between">
                                                            <h6>Anexo</h6>
                                                            <button type="button" class="btn btn-danger btn-xs btn-sombra pl-2 pr-2 eliminar_contenido_anexo"><i class="fas fa-minus-circle"></i></button>
                                                        </div>
                                                        <div class="col-12 col-md-4 form-group titulo-anexo">
                                                            <label for="titulo">Título archivo</label>
                                                            <input type="text" class="form-control form-control-sm">
                                                        </div>
                                                        <div class="col-12 col-md-4 form-group descripcion-anexo">
                                                            <label for="descripcion">Descripción archivo</label>
                                                            <input type="text" class="form-control form-control-sm">
                                                        </div>
                                                        <div class="col-12 col-md-4 form-group anexo">
                                                            <label for="documentos">Archivo</label>
                                                            <input class="form-control form-control-sm" type="file">
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end flex-row mb-3">
                                                <button class="btn btn-success btn-xs btn-sombra pl-2 pr-2 crearAnexo"><i class="fa fa-plus-circle mr-2 crearAnexo" aria-hidden="true"></i> Añadir otro anexo</button>
                                            </div>                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2 mb-3 pl-4 d-flex justify-content-end">
                                <button type="button" class="btn btn-primary pl-5 pr-5 btn-auto-admisorio" data_url="{{ route('crear_auto_admisorio') }}" data_url1="{{ route('update_auto_admisorio') }}" data_url2="{{ route('crear_accion') }}"  data_url3="{{ route('crear_anexo_tutela') }}" data_token="{{ csrf_token() }}" >Crear</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Fin Tutela --}}
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Agregue la dirección</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div class="col-2 form-group">
                        <select class="form-control form-control-sm direccion_parte" name="dir1" id="dir1">
                            <option value="Avenida calle">Avenida calle</option>
                            <option value="Avenida carrera">Avenida carrera</option>
                            <option value="Calle">Calle</option>
                            <option value="Diagonal">Diagonal</option>
                            <option value="Carrera">Carrera</option>
                            <option value="Transversal">Transversal</option>
                        </select>
                    </div>
                    <div class="col-1 form-group">
                        <input class="text-center form-control form-control-sm direccion_parte" type="text" name="dir2"
                            id="dir2">
                    </div>
                    <div class="col-1 form-group">
                        <select class="form-control form-control-sm direccion_parte" name="dir3" id="dir3">
                            <option value=""></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                            <option value="I">I</option>
                            <option value="J">J</option>
                            <option value="K">K</option>
                            <option value="L">L</option>
                            <option value="M">M</option>
                            <option value="N">N</option>
                            <option value="O">O</option>
                            <option value="P">P</option>
                            <option value="Q">Q</option>
                            <option value="R">R</option>
                            <option value="S">S</option>
                            <option value="T">T</option>
                            <option value="U">U</option>
                            <option value="V">V</option>
                            <option value="W">W</option>
                            <option value="X">X</option>
                            <option value="Y">Y</option>
                            <option value="Z">Z</option>

                        </select>
                    </div>
                    <div class="col-1 form-group">
                        <select class="form-control form-control-sm direccion_parte" name="dir4" id="dir4">
                            <option value=""></option>
                            <option value="BIS">BIS</option>
                        </select>
                    </div>
                    <div class="col-1 form-group">
                        <select class="form-control form-control-sm direccion_parte" name="dir5" id="dir5">
                            <option value=""></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                            <option value="I">I</option>
                            <option value="J">J</option>
                            <option value="K">K</option>
                            <option value="L">L</option>
                            <option value="M">M</option>
                            <option value="N">N</option>
                            <option value="O">O</option>
                            <option value="P">P</option>
                            <option value="Q">Q</option>
                            <option value="R">R</option>
                            <option value="S">S</option>
                            <option value="T">T</option>
                            <option value="U">U</option>
                            <option value="V">V</option>
                            <option value="W">W</option>
                            <option value="X">X</option>
                            <option value="Y">Y</option>
                            <option value="Z">Z</option>

                        </select>
                    </div>
                    <div class="col-1 form-group">
                        <select class="form-control form-control-sm direccion_parte" name="dir6" id="dir6">
                            <option value=""></option>
                            <option value="SUR">SUR</option>
                            <option value="ESTE">ESTE</option>
                        </select>
                    </div>
                    <div class="col-1 form-group">
                        <span class="form-control form-control-sm">No.</span>
                    </div>
                    <div class="col-4 form-group d-flex flex-row">
                        <input class="text-center form-control form-control-sm direccion_parte" type="text" name="dir7"
                            id="dir7">
                        <select class="form-control form-control-sm direccion_parte" name="dir8" id="dir8">
                            <option value=""></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                            <option value="I">I</option>
                            <option value="J">J</option>
                            <option value="K">K</option>
                            <option value="L">L</option>
                            <option value="M">M</option>
                            <option value="N">N</option>
                            <option value="O">O</option>
                            <option value="P">P</option>
                            <option value="Q">Q</option>
                            <option value="R">R</option>
                            <option value="S">S</option>
                            <option value="T">T</option>
                            <option value="U">U</option>
                            <option value="V">V</option>
                            <option value="W">W</option>
                            <option value="X">X</option>
                            <option value="Y">Y</option>
                            <option value="Z">Z</option>

                        </select>
                        <span class="form-control form-control-sm text-center">-</span>
                        <input class="text-center form-control form-control-sm direccion_parte" type="text" name="dir9"
                            id="dir9">
                        <select class="form-control form-control-sm direccion_parte" name="dir10" id="dir10">
                            <option value=""></option>
                            <option value="SUR">SUR</option>
                            <option value="ESTE">ESTE</option>
                        </select>
                    </div>
                    <div class="col-12 form-group">
                        <label for="">Complemento de direccion (bloque,apartamento, etc)</label>
                        <input type="text" name="complemento" id="complemento"
                            class="form-control form-control-sm direccion_parte" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="col-12 form-group">
                        <span class="form-control form-control-sm text-center" id="direccion_completa"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-xs" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary btn-xs" id="agregar_dir_fomulario"
                        data-bs-dismiss="modal">Agregar</button>
                </div>
            </div>
        </div>
    </div>
@endsection 
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/tutela/tutela.js') }}"></script>
@endsection
<!-- ************************************************************* -->
