@extends("theme.back.plantilla")
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('estilosHojas')
    <!-- Pagina CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/permiso.css') }}">
@endsection
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('tituloHoja')
    Permisos
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
                <h3 class="box-title">Crear Nuevo Permiso</h3>
            </div>
            <br>
            <div class="box-body  card-primary no-padding pt-3 pb-3 pl-3 pr-3"
                style="max-height: 800px;overflow-y: auto; overflow-x: auto">
                <form action="{{ route('admin-guardar_permiso') }}" id="form-general" class="form-horizontal"
                    method="POST" autocomplete="off">
                    @csrf
                    @method('post')
                    <div class="box-body">
                        @include('intranet.sistema.permiso.form')
                    </div>
                    <div class="box-footer">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            @include('includes.botones_crear')
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/admin/permiso/permiso.js') }}"></script>
@endsection
<!-- ************************************************************* -->
