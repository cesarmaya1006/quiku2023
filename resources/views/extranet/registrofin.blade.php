<?php
$colores = ['#6D53A6', '#4BA69D', '#F2CB9B', '#F24949', '#F2D8D8', '#343A40', '#4B81D1BE', '#0D6EFD', '#6610F2',
'#6F42C1', '#D63384', '#DC3545', '#FD7E14', '#FFC107', '#198754', '#20C997', '#0DCAF0', '#FFFFFF', '#6C757D', '#343A40',
'#0D6EFd', '#6C757D', '#198754', '#0DCAF0', '#FFC107', '#DC3545', '#F8F9FA', '#212529', '#000000']; ?>
@extends("extranet.plantilla")
<!-- ************************************************************* -->
@section('css_pagina')
    <link rel="stylesheet" href="{{ asset('css/extranet/login.css') }}">
@endsection
@section('cuerpo_pagina')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mt-4">
                <div class="card">
                    @include('includes.error-form')
                    @include('includes.mensaje')
                    <div class="card-body">
                        <h5 class="card-title">Registro</h5>
                        <div class="card-text mt-5">
                            <form action="{{ route('registro_ini-guardar') }}" method="POST" autocomplete="off">
                                @csrf
                                @method('post')
                                <div class="form-group mt-3">
                                    <label for="tipo_persona">Tipo persona</label>
                                    <select class="form-control" name="tipo_persona" id="tipo_persona" required>
                                        <option value="">--Seleccione un tipo--</option>
                                        <option value="1">Persona Jurídica</option>
                                        <option value="2">Persona natural</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="docutipos_id">Tipo documento</label>
                                    <select class="form-control" name="docutipos_id" id="docutipos_id" required>
                                        <option value="">--Seleccione un tipo--</option>
                                        @foreach ($tipos_docu as $tipodocu)
                                            <option value="{{ $tipodocu->id }}">{{ $tipodocu->abreb_id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="identificacion">Número de documento</label>
                                    <input type="text" class="form-control" id="identificacion" name="identificacion"
                                        placeholder="Número documento" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="email">Correo electrónico</label>
                                    <input type="email" class="form-control" id="email" name="email"
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

@endsection
