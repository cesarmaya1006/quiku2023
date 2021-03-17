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
                        <h5 class="card-title">Parametros </h5>
                        <div class="card-text mt-5">
                            <form class="row d-flex justify-content-between" action="{{ route('parametros-guardar') }}"
                                method="POST" autocomplete="off" enctype="multipart/form-data" style="font-size: 0.8em;">
                                @csrf
                                @method('post')
                                <div class="col-12 col-md-3">
                                    <div class="row">
                                        <div class="col-12 form-group text-center">
                                            <img class="img-fluid"
                                                src="{{ asset('imagenes/sistema/' . $parametro->logo) }}" alt=""
                                                style="max-width: 150px;">
                                            <label for="logo">Logo de la aplicación</label>
                                            <input type="file" class="form-control-file form-control form-control-sm"
                                                name="logo" id="logo" placeholder="" aria-describedby="fileHelpId">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label for="titulo">Titulo Aplicación</label>
                                            <input type="text" name="titulo" id="titulo" class="form-control" placeholder=""
                                                aria-describedby="helpId" value="{{ $parametro->titulo }}" required>
                                            <small id="helpId" class="text-muted">Help text</small>
                                        </div>
                                        <div class="col-12 col-md-3 form-group">
                                            <label for="bg_titulo">Color fondo titulo</label>
                                            <select class="form-control fondos" id="bg_titulo" name="bg_titulo" required
                                                style="background-color:{{ $parametro->bg_titulo }} ">
                                                @foreach ($colores as $color)
                                                    <option value="{{ $color }}"
                                                        {{ $parametro->bg_titulo == $color ? 'selected' : '' }}
                                                        style="background-color: {{ $color }};">
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-3 form-group">
                                            <label for="color_titulo">Color texto titulo</label>
                                            <select class="form-control" id="color_titulo" name="color_titulo" required
                                                style="background-color:{{ $parametro->color_titulo }} ">
                                                @foreach ($colores as $color)
                                                    <option value="{{ $color }}"
                                                        {{ $parametro->color_titulo == $color ? 'selected' : '' }}
                                                        style="background-color: {{ $color }};">
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-3 form-group">
                                            <label for="bg_caja">Color fondo cajas</label>
                                            <select class="form-control" id="bg_caja" name="bg_caja" required
                                                style="background-color:{{ $parametro->bg_caja }} ">
                                                @foreach ($colores as $color)
                                                    <option value="{{ $color }}"
                                                        {{ $parametro->bg_caja == $color ? 'selected' : '' }}
                                                        style="background-color: {{ $color }};">
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-3 form-group">
                                            <label for="bg_botones">Color fondo botones</label>
                                            <select class="form-control" id="bg_botones" name="bg_botones" required
                                                style="background-color:{{ $parametro->bg_botones }} ">
                                                @foreach ($colores as $color)
                                                    <option value="{{ $color }}"
                                                        {{ $parametro->bg_botones == $color ? 'selected' : '' }}
                                                        style="background-color: {{ $color }};">
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-3 form-group">
                                            <label for="color_botones">Color texto botones</label>
                                            <select class="form-control" id="color_botones" name="color_botones" required
                                                style="background-color:{{ $parametro->color_botones }} ">
                                                @foreach ($colores as $color)
                                                    <option value="{{ $color }}"
                                                        {{ $parametro->color_botones == $color ? 'selected' : '' }}
                                                        style="background-color: {{ $color }};">
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-3 form-group">
                                            <label for="color_titulos">Color texto sub-titulos</label>
                                            <select class="form-control" id="color_titulos" name="color_titulos" required
                                                style="background-color:{{ $parametro->color_titulos }} ">
                                                @foreach ($colores as $color)
                                                    <option value="{{ $color }}"
                                                        {{ $parametro->color_titulos == $color ? 'selected' : '' }}
                                                        style="background-color: {{ $color }};">
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-3 form-group">
                                            <label for="fondo1">Color 1 fondo principal</label>
                                            <select class="form-control" id="fondo1" name="fondo1" required
                                                style="background-color:{{ $parametro->fondo1 }} ">
                                                @foreach ($colores as $color)
                                                    <option value="{{ $color }}"
                                                        {{ $parametro->fondo1 == $color ? 'selected' : '' }}
                                                        style="background-color: {{ $color }};">
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-3 form-group">
                                            <label for="fondo2">Color 2 fondo principal</label>
                                            <select class="form-control" id="fondo2" name="fondo2" required
                                                style="background-color:{{ $parametro->fondo2 }} ">
                                                @foreach ($colores as $color)
                                                    <option value="{{ $color }}"
                                                        {{ $parametro->fondo2 == $color ? 'selected' : '' }}
                                                        style="background-color: {{ $color }};">
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 mt-4">
                                            <button type="submit" class="btn btn-primary btn-sm pl-4 pr-4">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script_pagina')
    <script>
        $(document).ready(function() {
            $('select').on('change', function() {
                $(this).css("background-color", this.value);
            });
        });

    </script>
@endsection
