@extends("theme.back.plantilla")
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('estilosHojas')
    <!-- Pagina CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/admin_rol.css') }}">
@endsection
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('tituloHoja')
    Crear Roles
@endsection
<!-- ************************************************************* -->
<!-- ************************************************************* -->
<!-- titulo hoja -->
@section('cuerpo_pagina')
    <div class="card" style="border-top: 8px solid rgb(38, 160, 241);">
        {{ $mensaje ?? '' }}
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <h3 class="card-title">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Nuevo Rol</font>
                </font>
            </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('admin-rol-guardar') }}" class="form-horizontal" method="POST">
            @csrf
            @method('post')
            <div class="card-body">
                @include('intranet.sistema.rol.form')
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                @include('includes.botones_crear')
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- scripts hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/admin/crear.js') }}"></script>
@endsection
<!-- ************************************************************* -->
