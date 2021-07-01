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
    Parametros - Funcionarios
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    @include('intranet.funcionarios.menu.menu')
    <hr>
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>listado de Funcionarios</h5>
                </div>
                <div class="col-12 col-md-6 col-lg-6 text-md-right text-lg-right pl-2 pr-md-5 pr-lg-5">
                    <a href="{{ route('funcionarios_funcionarios-crear') }}"
                        class="btn btn-success btn-sm text-center pl-3 pr-3" style="font-size: 0.9em;"><i
                            class="fas fa-plus-circle mr-2"></i> Nuevo Funcionario</a>
                </div>
            </div>
            <hr>
            <div class="row  d-flex justify-content-around">
                <div class="col-12 col-md-11 table-responsive">
                    <table class="table table-striped table-hover table-sm display">
                        <thead class="thead-inverse">
                            <tr>
                                <th class="text-center" style="white-space:nowrap;">Sede - Municipio - Departamento</th>
                                <th class="text-center" style="white-space:nowrap;">Cargo</th>
                                <th class="text-center" style="white-space:nowrap;">Identificación</th>
                                <th class="text-center" style="white-space:nowrap;">Primer Nombre</th>
                                <th class="text-center" style="white-space:nowrap;">Segundo Nombre</th>
                                <th class="text-center" style="white-space:nowrap;">Primer Apellido</th>
                                <th class="text-center" style="white-space:nowrap;">Segundo Apellido</th>
                                <th class="text-center" style="white-space:nowrap;">Teléfono</th>
                                <th class="text-center" style="white-space:nowrap;">Dirección</th>
                                <th class="text-center" style="white-space:nowrap;">Email</th>
                                <th class="text-center" style="white-space:nowrap;">Genero</th>
                                <th class="text-center" style="white-space:nowrap;">Fecha de nacimiento</th>
                                <th class="text-center" style="white-space:nowrap;">Estado</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($empleados as $empleado)
                                <tr>
                                    <td class="text-center" style="white-space:nowrap;">
                                        {{ $empleado->sede->nombre . ' - ' . $empleado->sede->municipio->municipio . ' - ' . $empleado->sede->municipio->departamento->departamento }}
                                    </td>
                                    <td class="text-center" style="white-space:nowrap;">{{ $empleado->cargo->cargo }}</td>
                                    <td class="text-center" style="white-space:nowrap;">
                                        {{ $empleado->tipos_docu->abreb_id . '  ' . $empleado->identificacion }}</td>
                                    <td style="white-space:nowrap;">{{ $empleado->nombre1 }}</td>
                                    <td style="white-space:nowrap;">
                                        {{ $empleado->nombre2 != null ? $empleado->nombre2 : '---' }}</td>
                                    <td style="white-space:nowrap;">{{ $empleado->apellido1 }}</td>
                                    <td style="white-space:nowrap;">
                                        {{ $empleado->apellido2 != null ? $empleado->apellido2 : '---' }}</td>
                                    <td class="text-center" style="white-space:nowrap;">
                                        {{ $empleado->telefono_celu != null ? $empleado->telefono_celu : '---' }}</td>
                                    <td style="white-space:nowrap;">
                                        {{ $empleado->direccion != null ? $empleado->direccion : '---' }}</td>
                                    <td style="white-space:nowrap;">
                                        {{ $empleado->email != null ? $empleado->email : '---' }}</td>
                                    <td class="text-center" style="white-space:nowrap;">
                                        {{ $empleado->genero != null ? $empleado->genero : '---' }}</td>
                                    <td class="text-center" style="white-space:nowrap;">
                                        {{ $empleado->fecha_nacimiento != null ? $empleado->fecha_nacimiento : '---' }}
                                    </td>
                                    <td class="text-center" style="white-space:nowrap;">
                                        {{ $empleado->estado == 1 ? 'Activo' : 'Inactivo' }}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('funcionarios_funcionarios-editar', ['id' => $empleado->id]) }}"
                                            class="btn-accion-tabla tooltipsC text-info" title="Editar"><i
                                                class="fa fa-edit" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
