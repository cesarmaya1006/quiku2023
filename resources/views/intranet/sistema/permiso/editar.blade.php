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
    Editar Permisos
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
                <h3 class="box-title">Editar Permiso {{ $data->nombre }}</h3>
            </div>
            <br>
            <div class="box-body  card-primary no-padding pt-3 pb-3 pl-3 pr-3"
                style="max-height: 800px;overflow-y: auto; overflow-x: auto">
                <form action="{{ route('admin-actualizar_permiso', ['id' => $data->id]) }}" id="form-general"
                    class="form-horizontal" method="POST" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        @include('intranet.sistema.permiso.form')
                    </div>
                    <div class="box-footer">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            @include('includes.botones_editar')
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
