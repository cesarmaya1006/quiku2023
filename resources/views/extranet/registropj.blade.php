@extends("extranet.plantilla")
<!-- ************************************************************* -->
@section('css_pagina')
    <link rel="stylesheet" href="{{ asset('css/extranet/login.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
@endsection
@section('cuerpo_pagina')
    <div class="container pb-5">
        <div class="row justify-content-center mb-5">
            <div class="col-10">
                @include('includes.error-form')
                @include('includes.mensaje')
            </div>
            <div class="col-11 col-sm-10 col-md-8 mt-5 mb-4">
                <div class="card">
                    <div class="card-body">
                        <p class="m-0 text-right"><strong>1/3</strong></p>
                        <h5 class="card-title">REGISTRO</h5>
                        <h5 class="card-title">DATOS PERSONA JURÍDICA</h5>
                        <div class="row">
                            <div id="stepper1" class="bs-stepper linear">
                                <div class="bs-stepper-header" role="tablist">
                                    <div class="step" data-target="#test-l-1">
                                        <button type="button" class="step-trigger" role="tab" id="stepper1trigger1"
                                            aria-controls="test-l-1" aria-selected="false" disabled="disabled">
                                            <span class="bs-stepper-circle">1</span>
                                            {{-- <span class="bs-stepper-label">Email</span> --}}
                                        </button>
                                    </div>
                                    <div class="bs-stepper-line"></div>
                                    <div class="step active" data-target="#test-l-2">
                                        <button type="button" class="step-trigger" role="tab" id="stepper1trigger2"
                                            aria-controls="test-l-2" aria-selected="true">
                                            <span class="bs-stepper-circle">2</span>
                                            {{-- <span class="bs-stepper-label">Password</span> --}}
                                        </button>
                                    </div>
                                    <div class="bs-stepper-line"></div>
                                    <div class="step" data-target="#test-l-3">
                                        <button type="button" class="step-trigger" role="tab" id="stepper1trigger3"
                                            aria-controls="test-l-3" aria-selected="false" disabled="disabled">
                                            <span class="bs-stepper-circle">3</span>
                                            {{-- <span class="bs-stepper-label">Validate</span> --}}
                                        </button>
                                    </div>
                                    <div class="bs-stepper-line bs-stepper-line-4 "></div>
                                    <div class="step" data-target="#test-l-4">
                                        <button type="button" class="step-trigger" role="tab" id="stepper1trigger4"
                                            aria-controls="test-l-4" aria-selected="false" disabled="disabled">
                                            <span class="bs-stepper-circle">4</span>
                                            {{-- <span class="bs-stepper-label">Validate</span> --}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-text mt-2">
                            <form action="{{ route('registropj-guardar') }}" method="POST" autocomplete="off">
                                @csrf
                                @method('post')
                                <div class="form-row row">
                                    <div class="form-group mt-3 col-md-5">
                                        <label class="requerido" for="docutipos_id">Tipo documento</label>
                                        <select class="form-control" name="docutipos_id" id="docutipos_id" required
                                            readonly="true">
                                            <option value="">--Seleccione un tipo--</option>
                                            @foreach ($tipos_docu as $tipodocu)
                                                <option value="{{ $tipodocu->id }}"
                                                    {{ $tipodocu->id == $docutipos_id ? 'selected' : '' }}>
                                                    {{ $tipodocu->abreb_id }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mt-3 col-md-5">
                                        <label class="requerido" for="identificacion">Número de documento</label>
                                        <input type="text" class="form-control" id="identificacion" name="identificacion"
                                            placeholder="Número documento" value="{{ $identificacion }}" required
                                            readonly="true">
                                    </div>
                                    <div class="form-group mt-3 col-md-2">
                                        <label class="requerido" for="dv">DV</label>
                                        <input type="text" class="form-control" id="dv" placeholder="" name="dv" value=""
                                            required>
                                    </div>
                                </div>
                                <div class="form-row row mt-3">
                                    <div class="col-md-12 mb-3">
                                        <label class="requerido" for="razon_social">Razón Social</label>
                                        <input type="text" class="form-control" id="razon_social"
                                            placeholder="Primer Nombre" name="razon_social" required>
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="form-group mt-3 col-md-6">
                                        <label class="requerido" for="direccion">Dirección</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-info"><i class="fa fa-plus-circle"
                                                        aria-hidden="true" data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrop"></i></button>
                                            </div>
                                            <!-- /btn-group -->
                                            <input type="text" class="form-control readonly" id="direccion"
                                                placeholder="Dirección" name="direccion" required
                                                value="{{ old('direccion') }}">
                                        </div>
                                    </div>
                                    <div class="form-group mt-3 col-md-6">
                                        <label class="requerido" for="pais_id">País</label>
                                        <select class="form-control" name="pais_id" id="pais_id" required>
                                            <option value="">--Seleccione--</option>
                                            @foreach ($paises as $pais)
                                                <option value="{{ $pais->id }}"
                                                    {{ $pais->pais == 'Colombia' ? 'selected' : '' }}>
                                                    {{ $pais->pais }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row row" id="caja_departamento">
                                    <div class="form-group mt-3 col-md-6">
                                        <label class="requerido" for="departamento">Departamento</label>
                                        <select class="form-control departamentos" id="departamento"
                                            data_url="{{ route('cargar_municipios') }}">
                                            <option value="">--Seleccione--</option>
                                            @foreach ($departamentos as $departamento)
                                                <option value="{{ $departamento->id }}">
                                                    {{ $departamento->departamento }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mt-3 col-md-6">
                                        <label class="requerido" for="municipio_id">Ciudad</label>
                                        <select class="form-control" name="municipio_id" id="municipio_id">
                                            <option value="">--Seleccione--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row row mt-3">
                                    <div class="col-md-6 mb-3">
                                        <label for="telefono_fijo">Teléfono fijo</label>
                                        <input type="text" class="form-control" id="telefono_fijo"
                                            placeholder="Teléfono fijo" name="telefono_fijo">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="requerido" for="telefono_celu">Teléfono Celular</label>
                                        <input type="text" class="form-control" id="telefono_celu"
                                            placeholder="Teléfono Celular" name="telefono_celu" required>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label class="requerido" for="email">Correo electrónico</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Correo electrónico" value="{{ $email }}" required
                                        readonly="true">
                                    <p>Al diligenciar su correo electrónico, está aceptando que las respuestas y
                                        comunicaciones sobre sus peticiones, quejas y reclamos, sean enviadas a esta
                                        dirección.</p>
                                </div>
                                <button class="mt-3 btn btn-primary" type="submit">Continuar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
@section('script_pagina')
    <script src="{{ asset('js/extranet/registro.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
@endsection
