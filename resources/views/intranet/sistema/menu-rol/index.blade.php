@extends("theme.back.plantilla")
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('estilosHojas')
    <!-- Pagina CSS -->

@endsection
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('tituloHoja')
    Men&uacute; - Roles
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
                <h3 class="box-title">Administraci&oacute;n de Men&uacute;s y Roles</h3>
            </div>
            <br>
            <div class="box-body  card-primary" style="max-height: 800px;overflow-y: auto;">
                @csrf
                <table class="table table-striped table-bordered table-hover table-responsive" id="tabla-data">
                    <thead>
                        <tr>
                            <th>Men&uacute;</th>
                            @foreach ($rols as $id => $nombre)
                                <th class="text-center" style="width:1px;white-space:nowrap; max-width: 200px;">
                                    {{ utf8_encode(ucwords(strtolower(utf8_decode($nombre)))) }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $key => $menu)
                            @if ($menu['menu_id'] != 0)
                            @break
                        @endif
                        <tr>
                            <td class="font-weight-bold" style="width:1px;white-space:nowrap;"><i
                                    class="fa fa-arrows-alt"></i>
                                {{ utf8_encode(ucfirst(strtolower(utf8_decode($menu['nombre'])))) }}</td>
                            @foreach ($rols as $id => $nombre)
                                <td class="text-center">
                                    <input type="checkbox" class="menu_rol" name="menu_rol[]"
                                        data-menuid={{ $menu['id'] }} value="{{ $id }}"
                                        {{ in_array($id, array_column($menusRols[$menu['id']], 'id')) ? 'checked' : '' }}>
                                </td>
                            @endforeach
                        </tr>
                        @foreach ($menu['submenu'] as $key => $hijo)
                            <tr>
                                <td class="pl-20" style="width:1px;white-space:nowrap;"><i class="fa fa-arrow-right"></i>
                                    {{ utf8_encode(ucfirst(strtolower(utf8_decode($hijo['nombre'])))) }}</td>
                                @foreach ($rols as $id => $nombre)
                                    <td class="text-center">
                                        <input type="checkbox" class="menu_rol" name="menu_rol[]"
                                            data-menuid={{ $hijo['id'] }} value="{{ $id }}"
                                            {{ in_array($id, array_column($menusRols[$hijo['id']], 'id')) ? 'checked' : '' }}>
                                    </td>
                                @endforeach
                            </tr>
                            @foreach ($hijo['submenu'] as $key => $hijo2)
                                <tr>
                                    <td class="pl-30" style="width:1px;white-space:nowrap;"><i
                                            class="fa fa-arrow-right"></i>
                                        {{ utf8_encode(ucfirst(strtolower(utf8_decode($hijo2['nombre'])))) }}</td>
                                    @foreach ($rols as $id => $nombre)
                                        <td class="text-center">
                                            <input type="checkbox" class="menu_rol" name="menu_rol[]"
                                                data-menuid={{ $hijo2['id'] }} value="{{ $id }}"
                                                {{ in_array($id, array_column($menusRols[$hijo2['id']], 'id')) ? 'checked' : '' }}>
                                        </td>
                                    @endforeach
                                </tr>
                                @foreach ($hijo2['submenu'] as $key => $hijo3)
                                    <tr>
                                        <td class="pl-40" style="width:1px;white-space:nowrap;"><i
                                                class="fa fa-arrow-right"></i>
                                            {{ utf8_encode(ucfirst(strtolower(utf8_decode($hijo3['nombre'])))) }}
                                        </td>
                                        @foreach ($rols as $id => $nombre)
                                            <td class="text-center">
                                                <input type="checkbox" class="menu_rol" name="menu_rol[]"
                                                    data-menuid={{ $hijo3['id'] }} value="{{ $id }}"
                                                    {{ in_array($id, array_column($menusRols[$hijo3['id']], 'id')) ? 'checked' : '' }}>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            @endforeach
                        @endforeach
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
    <script src="{{ asset('js/intranet/menu_rol/menu_rol.js') }}"></script>
@endsection
<!-- ************************************************************* -->
