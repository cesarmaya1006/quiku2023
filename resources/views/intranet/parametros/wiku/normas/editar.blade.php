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
    Parametros - Fuentes Normas
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="card-header">
            <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>Editar Norma - {{ $norma->documento->fuente . ' - Art ' . $norma->articulo }}</h5>
                </div>
                <div class="col-12 col-md-6 col-lg-6 text-md-right text-lg-right pl-2 pr-md-5 pr-lg-5">
                    <a href="{{ route('wiku-index') }}" class="btn btn-success btn-xs btn-sm text-center pl-3 pr-3"
                        style="font-size: 0.9em;"><i class="fas fa-reply mr-2"></i> Volver</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12 ">
                    <a href="{{ route('wiku_norma-area', ['id' => $norma->id]) }}"
                        class="btn btn-primary btn-xs btn-sombra btn-sm text-center pl-3 pr-3 mr-3"
                        style="font-size: 0.9em;"><i class="fas fa-plus-circle mr-2"></i> Área de conocimiento</a>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 col-md-5 form-group">
                    <label for="wikuarea_id">Área de conocimiento</label>
                    <select class="form-control form-control-sm" name="wikuarea_id" id="wikuarea_id">
                        <option value="">--- Seleccione ---</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}"
                                {{ isset($norma) ? ($area->id == $norma->wikuarea_id ? 'selected' : '') : '' }}>
                                {{ $area->area }}</option>
                        @endforeach
                    </select>
                    <small id="helpId" class="form-text text-muted">Fuente Emisor</small>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('wiku_norma-guardar') }}" class="form-horizontal row" method="POST"
                        autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="card-body">
                            @include('intranet.parametros.wiku.normas.form')
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-xs btn-sombra pl-4 pr-4">Guardar</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
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
