@extends("theme.back.plantilla")
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('estilosHojas')
    <!-- Pagina CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/usuario.css') }}">
@endsection
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('tituloHoja')
    Usuarios
@endsection
<!-- ************************************************************* -->
<!-- ************************************************************* -->
<!-- Cuerpo hoja -->
@section('cuerpo_pagina')
    @include('includes.mensaje')
    @include('includes.error-form')
    <div class="cuerpo">
        <div class="box">
            <div class="box-header with-border">
                <div class="row w-100">
                    <div class="col-12 col-md-6">
                        <h3 class="box-title">Listado de Usuarios</h3>
                    </div>
                    <div class="col-12 col-md-6">
                        <a href="{{ route('admin-usuario-crear') }}"
                            class="btn btn-info btn-xs pl-4 pr-4 btn-sombra float-right">
                            <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro
                        </a>
                    </div>
                </div>
            </div>
            <br>
            <div class="box-body  card-primary">
                @foreach ($roles as $rol)
                    @if ($rol->usuarios->count() && $rol->id != 1 && $rol->id < 5)
                        <div class="row d-flex justify-content-around">
                            <div class="col-12 mt-3 mb-2">
                                <h3>{{ $rol->nombre }}</h3>
                            </div>
                            <div class="col-12 col-md-11 table-responsive">
                                <table class="table table-striped table-bordered table-hover display">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="text-center" scope="col">Id</th>
                                            <th class="text-center" scope="col">N. Identificacion</th>
                                            <th class="text-center" scope="col">Nombres y Apellidos</th>
                                            <th class="text-center" scope="col">Email</th>
                                            <th class="text-center" scope="col">Telefono</th>
                                            <th class="text-center" scope="col">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cuerpo_tabla_usuarios2">
                                        @foreach ($rol->usuarios as $usuario)
                                            <tr>
                                                <td class="text-center">{{ $usuario->id }}</td>
                                                <td class="text-center">
                                                    {{ $usuario->tipos_docu->abreb_id . ' ' . $usuario->identificacion }}
                                                </td>
                                                <td>{{ $usuario->nombres . ' ' . $usuario->apellidos }}</td>
                                                <td>{{ $usuario->email }}</td>
                                                <td>{{ $usuario->telefono }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin-usuario-editar', ['id' => $usuario->id]) }}"
                                                        class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form
                                                        action="{{ route('admin-usuario-eliminar', ['id' => $usuario->id]) }}"
                                                        class="d-inline form-eliminar" method="POST">
                                                        @csrf @method("delete")
                                                        <button type="submit" class="btn-accion-tabla eliminar tooltipsC"
                                                            title="Eliminar este registro">
                                                            <i class="fa fa-fw fa-trash text-danger"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/usuario/usuario.js') }}"></script>
@endsection
<!-- ************************************************************* -->
