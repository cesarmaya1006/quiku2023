@extends("theme.back.plantilla")
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('estilosHojas')
    <!-- Pagina CSS -->
    <link rel="stylesheet" href="{{ asset('css/intranet/menu/menu_nestable.css') }}">
    <link rel="stylesheet" href="{{ asset('css/intranet/menu/admin_menu.css') }}">
@endsection
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('tituloHoja')
    Men&uacute;s
@endsection
<!-- ************************************************************* -->
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('cuerpo_pagina')
    @include('includes.mensaje')
    @include('includes.error-form')
    <div class="cuerpo">
        <div class="box-header with-border">
            <h3 class="box-title">Listado de Men&uacute;s</h3>
            <div class="box-tools pull-right">
                <a href="{{ route('admin-menu-crear') }}" class="btn btn-block btn-success btn-sm"
                    style="max-width: 200px">
                    <i class="fa fa-fw fa-plus-circle"></i> Nuevo Men&uacute;
                </a>
            </div>
        </div>
        <br>
        @csrf
        <div class="cf nestable-lists">
            <div class="dd" id="nestable">
                <ol class="dd-list" id="dd_list99" data-url="{{ route('admin-menu-guardar-orden') }}">
                    @foreach ($menus as $key => $item)
                        @if ($item['menu_id'] != 0)
                            @break
                        @endif
                        @include('intranet.sistema.menu.menu-item')
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/menu/jquery.nestable.js') }}"></script>
    <script src="{{ asset('js/intranet/menu/index.js') }}"></script>
@endsection
<!-- ************************************************************* -->
