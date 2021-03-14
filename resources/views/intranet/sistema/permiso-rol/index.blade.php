@extends("theme.back.plantilla")
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('estilosHojas')
    <!-- Pagina CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/admin_permiso_rol.css') }}">
@endsection
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('tituloHoja')
    Permisos - Roles
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
                <h3 class="box-title">Administraci&oacute;n de Permisos y Roles</h3>
            </div>
            <br>
            <div class="box-body  card-primary" style="max-height: 800px;overflow-y: auto;">
                @csrf
                <table class="table table-striped table-bordered table-hover" id="tabla-data">
                    <thead>
                        <tr>
                            <th>Permiso</th>
                            @foreach ($rols as $id => $nombre)
                                <th class="text-center">{{ $nombre }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permisos as $key => $permiso)
                            <tr>
                                <td class="font-weight-bold">{{ $permiso['nombre'] }}</td>
                                @foreach ($rols as $id => $nombre)
                                    <td class="text-center">
                                        <input type="checkbox" class="permiso_rol" name="permiso_rol[]"
                                            data-permisoid={{ $permiso['id'] }} value="{{ $id }}"
                                            {{ in_array($id, array_column($permisosRols[$permiso['id']], 'id')) ? 'checked' : '' }}>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/admin/permiso-rol/permiso-rol.js') }}"></script>
@endsection
<!-- ************************************************************* -->
