@extends("extranet.plantilla")
<!-- ************************************************************* -->
@section('css_pagina')
    <link rel="stylesheet" href="{{ asset('css/extranet/login.css') }}">
@endsection
@section('cuerpo_pagina')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                @include('includes.error-form')
                @include('includes.mensaje')
            </div>
            <div class="col-10 mt-5">
                <div class="card">
                    <div class="card-body">
                        <p class="m-0 text-right"><strong>1/3</strong></p>
                        <h5 class="card-title">REGISTRO</h5>
                        <h5 class="card-title">DATOS PERSONA JURÍDICA</h5>
                        <div class="card-text mt-5">
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
                                        <input type="text" class="form-control" id="direccion" placeholder="Dirección"
                                            name="direccion" required value="{{ old('direccion') }}">
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
@endsection
@section('script_pagina')
    <script src="{{ asset('js/extranet/registro.js') }}"></script>
@endsection
