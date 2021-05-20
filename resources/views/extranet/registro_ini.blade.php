@extends("extranet.plantilla")
<!-- ************************************************************* -->
@section('css_pagina')
    <link rel="stylesheet" href="{{ asset('css/extranet/login.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
@endsection
@section('cuerpo_pagina')
    <div class="container pt-5">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-7 col-sm-10 col-11 mt-4 mb-4">
                <div class="card">
                    @include('includes.error-form')
                    @include('includes.mensaje')
                    <div class="card-body">
                        <h5 class="card-title">Registro</h5>
                        <div class="row">
                            <div id="stepper1" class="bs-stepper linear">
                                <div class="bs-stepper-header" role="tablist">
                                    <div class="step active" data-target="#test-l-1">
                                        <button type="button" class="step-trigger" role="tab" id="stepper1trigger1"
                                            aria-controls="test-l-1" aria-selected="true">
                                            <span class="bs-stepper-circle">1</span>
                                            {{-- <span class="bs-stepper-label">Email</span> --}}
                                        </button>
                                    </div>
                                    <div class="bs-stepper-line"></div>
                                    <div class="step" data-target="#test-l-2">
                                        <button type="button" class="step-trigger" role="tab" id="stepper1trigger2"
                                            aria-controls="test-l-2" aria-selected="false" disabled="disabled">
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
                                    {{-- <div class="step" data-target="#test-l-4">
                                        <button type="button" class="step-trigger" role="tab" id="stepper1trigger4"
                                            aria-controls="test-l-4" aria-selected="false" disabled="disabled">
                                            <span class="bs-stepper-circle">4</span>
                                            <span class="bs-stepper-label">Validate</span>
                                        </button>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="card-text mt-2">
                            <form action="{{ route('registro_ini-guardar') }}" method="POST" autocomplete="off">
                                @csrf
                                @method('post')
                                <div class="form-group mt-3">
                                    <label class="requerido" for="tipo_persona">Tipo persona</label>
                                    <select class="form-control form-control-sm" name="tipo_persona" id="tipo_persona"
                                        required>
                                        <option value="">--Seleccione un tipo--</option>
                                        <option value="1">Persona Jurídica</option>
                                        <option value="2" selected>Persona natural</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label class="requerido" for="docutipos_id">Tipo documento</label>
                                    <select class="form-control form-control-sm" name="docutipos_id" id="docutipos_id"
                                        required>
                                        <option value="">--Seleccione un tipo--</option>
                                        @foreach ($tipos_docu as $tipodocu)
                                            <option value="{{ $tipodocu->id }}"
                                                {{ $tipodocu->id == 1 ? 'selected' : '' }}>
                                                {{ $tipodocu->abreb_id }} ({{ $tipodocu->tipo_id }})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label class="requerido" for="identificacion">Número de documento</label>
                                    <input type="text" class="form-control form-control-sm" id="identificacion"
                                        name="identificacion" placeholder="Número documento" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label class="requerido" for="email">Correo electrónico</label>
                                    <input type="email" class="form-control form-control-sm" id="email" name="email"
                                        placeholder="Correo electrónico" required>
                                </div>
                                <button class="mt-3 btn btn-primary" type="submit">Siguiente</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script_pagina')
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
@endsection
