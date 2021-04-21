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
    Sistema de informaci&oacute;n
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
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        Usuario asistido
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="lead">
                                    <b>{{ $persona->nombre1 . ' ' . $persona->nombre2 . ' ' . $persona->apellido1 . ' ' . $persona->apellido2 }}</b>
                                    <br>
                                    <p>{{ $persona->tipos_docu->abreb_id }}: {{ $persona->identificacion }}</p>
                                </h2>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="row">
                                            <div class="col-6">
                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                    <li class="small">Teléfono fijo:</li>
                                                    <li class="small">Teléfono Cel:</li>
                                                    <li class="small">Dirección:</li>
                                                    <li class="small">País:</li>
                                                    <li class="small">Departamento:</li>
                                                    <li class="small">Municipio:</li>
                                                    <li class="small">Nacionalidad:</li>
                                                    <li class="small">Grado de educación:</li>
                                                    <li class="small">Genero:</li>
                                                    <li class="small">Fecha de nacimiento:</li>
                                                    <li class="small">Email:</li>
                                                </ul>
                                            </div>
                                            <div class="col-6">
                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                    <li class="small">
                                                        {{ $persona->telefono_fijo ? $persona->telefono_fijo : '---' }}
                                                    </li>
                                                    <li class="small">{{ $persona->telefono_celu }}</li>
                                                    <li class="small">{{ $persona->direccion }}</li>
                                                    <li class="small">{{ $persona->pais->pais }}</li>
                                                    <li class="small">
                                                        {{ $persona->municipio->departamento->departamento }}</li>
                                                    <li class="small">{{ $persona->municipio->municipio }}</li>
                                                    <li class="small">
                                                        {{ $persona->nacionalidad ? $persona->nacionalidad : '---' }}
                                                    </li>
                                                    <li class="small">{{ $persona->grado_educacion }}</li>
                                                    <li class="small">{{ $persona->genero }}</li>
                                                    <li class="small">{{ $persona->fecha_nacimiento }}</li>
                                                    <li class="small">{{ $persona->email }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4 mb-3 ml-3">
                            <div class="col-12">
                                <a href="{{ route('funcionario-crear_usuario') }}" class="btn btn-info btn-xs"><i
                                        class="fa fa-reply" aria-hidden="true"></i>
                                    Volver</a>
                            </div>
                        </div>
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
