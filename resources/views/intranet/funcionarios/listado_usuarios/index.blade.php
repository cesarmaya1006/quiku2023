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
        <div class="d-flex justify-content-center">
            <div class="col-12 col-md-8">
                @include('includes.error-form')
                @include('includes.mensaje')
            </div>
        </div>
        <div class="justify-content-center">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Listado Usuarios</h3>
                </div>
                <div class="card-body">
                    <div class="col-12 col-md-12 table-responsive">
                        <table class="table table-striped table-hover table-sm display">
                            <thead>
                                <tr>
                                    <th>Usuario</th>
                                    <th>Tipo documento</th>
                                    <th>Numero Documento</th>
                                    <th>Primer nombre</th>
                                    <th>Segundo nombre</th>
                                    <th>Primer apellido</th>
                                    <th>Segundo apellido</th>
                                    <th>Fecha de creación</th>
                                    <th>Cambio de contraseña</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $usuario)
                                    @if($usuario->persona)
                                        <tr>
                                            <td>{{ $usuario->usuario }}</td>
                                            <td>{{ $usuario->persona->tipos_docu->abreb_id }}</td>
                                            <td>{{ $usuario->persona->identificacion }}</td>
                                            <td>{{ $usuario->persona->nombre1 }}</td>
                                            <td>{{ $usuario->persona->nombre2 }}</td>
                                            <td>{{ $usuario->persona->apellido1 }}</td>
                                            <td>{{ $usuario->persona->apellido2 }}</td>
                                            <td>{{ $usuario->created_at }}</td>
                                            <td>
                                                <a href="{{ route('funcionario_cambiar_password_asistido', ['id' => $usuario->id]) }}"
                                                    class="d-flex justify-content-center" title="Cambio de contraseña"><i
                                                        class="fa fa-edit text-info btn-editar" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td>{{ $usuario->usuario }}</td>
                                            <td>{{ $usuario->representante->tipos_docu->abreb_id }}</td>
                                            <td>{{ $usuario->representante->identificacion }}</td>
                                            <td>{{ $usuario->representante->nombre1 }}</td>
                                            <td>{{ $usuario->representante->nombre2 }}</td>
                                            <td>{{ $usuario->representante->apellido1 }}</td>
                                            <td>{{ $usuario->representante->apellido2 }}</td>
                                            <td>{{ $usuario->created_at }}</td>
                                            <td>
                                                <a href="{{ route('funcionario_cambiar_password_asistido', ['id' => $usuario->id]) }}"
                                                    class="d-flex justify-content-center" title="Cambio de contraseña"><i
                                                        class="fa fa-edit text-info btn-editar" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/extranet/registro.js') }}"></script>
@endsection
<!-- ************************************************************* -->
