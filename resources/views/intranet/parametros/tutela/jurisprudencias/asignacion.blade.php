@extends('theme.back.plantilla')
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
    Parametros - Asociación Argumentos - Wiku
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
                <div class="col-12 text-right">
                    <a href="{{ route('admin-funcionario-asociacion_wiku_tutelas-index') }}"
                        class="btn btn-success btn-sm text-center pl-3 pr-3" style="font-size: 0.9em;"><i
                            class="fas fa-reply mr-2"></i> Volver</a>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-12">
                    <h5><strong>Asociación de argumento</strong> {{ $argumento->descripcion }}</h5>
                </div>
            </div>
            @foreach ($motivos as $motivo)
                @if ($motivo->sub_motivostutelas->count() > 0)
                    <div class="row mt-3 mb-4">
                        <div class="col-12 col-md-2"><strong>{{ $motivo->motivo }}</strong></div>
                        <div class="col-12 col-md-10">
                            <div class="row">
                                @foreach ($motivo->sub_motivostutelas as $sub_motivotutelas)
                                    <div class="col-12 col-md-2">
                                        <div class="form-check">
                                            @php
                                                $arg_check = 0;
                                            @endphp
                                            @foreach ($sub_motivotutelas->asociacion_wikuargumentos as $argumentow)
                                                @if ($argumentow->id == $argumento->id)
                                                    @php
                                                        $arg_check = 1;
                                                    @endphp
                                                @endif
                                            @endforeach
                                            @if ($arg_check == 1)
                                                <input  class="form-check-input check_sub_motivotutelas"
                                                        type="checkbox"
                                                        name="sub_motivotutelas"
                                                        value="{{ $sub_motivotutelas->id }}"
                                                        id="{{ 'Check' . $sub_motivotutelas->id }}"
                                                        data_url="{{ route('admin-funcionario-asociacion_wiku_tutelas-asociar') }}"
                                                        wiku_argumento_id="{{$argumento->id}}"
                                                        submotivotutela_id="{{$sub_motivotutelas->id}}"
                                                        tipo_wiku="argumento"
                                                        checked>
                                            @else
                                                <input  class="form-check-input check_sub_motivotutelas"
                                                        type="checkbox"
                                                        name="sub_motivotutelas"
                                                        value="{{ $sub_motivotutelas->id }}"
                                                        id="{{ 'Check' . $sub_motivotutelas->id }}"
                                                        data_url="{{ route('admin-funcionario-asociacion_wiku_tutelas-asociar') }}"
                                                        wiku_argumento_id="{{$argumento->id}}"
                                                        submotivotutela_id="{{$sub_motivotutelas->id}}"
                                                        tipo_wiku="argumento">
                                            @endif
                                            <label class="form-check-label" for="{{ 'Check' . $sub_motivotutelas->id }}">
                                                {{ $sub_motivotutelas->sub_motivo }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/parametros/asociacionwikututelas.js') }}"></script>
@endsection
<!-- ************************************************************* -->
