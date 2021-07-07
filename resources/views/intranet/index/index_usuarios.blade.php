<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        {{-- Generar PQR --}}
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Generar PQR</h3>
                </div>
                <div class="card-body">
                    <div class="row d-flex">
                        @foreach ($tipoPQR as $tipo)
                            @if ($tipo->id == 1 || $tipo->id == 2 || $tipo->id == 3 || $tipo->id == 5 || $tipo->id == 7 || $tipo->id == 8)
                                <div class="col-12 col-md-4">
                                    <div class="card card-Light collapsed-card" style="box-shadow: 0px 0px 0px 0px ;">
                                        <div class="card-header">
                                            <h3 class="card-title col-11 justify-content-center">
                                                @if ($tipo->id < 4)
                                                    <a class="col-12"
                                                        href="{{ route($tipo->url, ['id' => $tipo->id]) }}">
                                                        @switch($tipo->id)
                                                            @case(1)
                                                                <span class="justify-content-center"
                                                                    style="font-size: 2.5em; color: #007bff;">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </span>
                                                            @break
                                                            @case(2)
                                                                <span class="justify-content-center"
                                                                    style="font-size: 2.5em; color: #007bff;">
                                                                    <i class="far fa-envelope"></i>
                                                                </span>
                                                            @break
                                                            @case(3)
                                                                <span class="justify-content-center"
                                                                    style="font-size: 2.5em; color: #007bff;">
                                                                    <i class="far fa-comment-alt"></i>
                                                                </span>
                                                            @break
                                                            @default
                                                        @endswitch
                                                        <p class="mt-3">{{ $tipo->tipo }}</p>
                                                    </a>
                                                @else
                                                    <a href="{{ route($tipo->url) }}" style="text-decoration: none;">
                                                        @switch($tipo->id)
                                                            @case(5)
                                                                <span class="justify-content-center"
                                                                    style="font-size: 2.5em; color: #007bff;">
                                                                    <i class="far fa-edit"></i>
                                                                </span>
                                                            @break
                                                            @case(7)
                                                                <span class="justify-content-center"
                                                                    style="font-size: 2.5em; color: #007bff;">
                                                                    <i class="far fa-grin"></i>
                                                                </span>
                                                            @break
                                                            @case(8)
                                                                <span class="justify-content-center"
                                                                    style="font-size: 2.5em; color: #007bff;">
                                                                    <i class="fas fa-list"></i>
                                                                </span>
                                                            @break
                                                            @default
                                                        @endswitch
                                                        <p class="mt-3">{{ $tipo->tipo }}</p>
                                                    </a>
                                                @endif
                                            </h3>
                                            <div class="card-tools col-1">
                                                <button type="button" class="btn btn-tool"
                                                    data-card-widget="collapse"><i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                            <!-- /.card-tools -->
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body" style="display: none;">
                                            {{ $tipo->descripcion }}
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <div class="col-12 col-md-12">
                            <div class="card card-Light collapsed-card" style="box-shadow: 0px 0px 0px 0px ;">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <a href="" style="text-decoration: none;" class="otros-btn">Otros</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="row card-otros d-none">
                            @foreach ($tipoPQR as $tipo)
                                @if ($tipo->id == 4 || $tipo->id == 6 || $tipo->id == 9)
                                    <div class="col-12 col-md-4">
                                        <div class="card card-Light collapsed-card"
                                            style="box-shadow: 0px 0px 0px 0px ;">
                                            <div class="card-header">
                                                <h3 class="card-title col-11">
                                                    @if ($tipo->id < 4)
                                                        <a href="{{ route($tipo->url, ['id' => $tipo->id]) }}">
                                                            <p>{{ $tipo->tipo }}</p>
                                                        </a>
                                                    @else
                                                        <a href="{{ route($tipo->url) }}"
                                                            style="text-decoration: none;">
                                                            @switch($tipo->id)
                                                                @case(4)
                                                                    <span class="justify-content-center"
                                                                        style="font-size: 2.5em; color: #007bff;">
                                                                        <i class="far fa-file-alt"></i>
                                                                    </span>
                                                                @break
                                                                @case(6)
                                                                    <span class="justify-content-center"
                                                                        style="font-size: 2.5em; color: #007bff;">
                                                                        <i class="far fa-file-alt"></i>
                                                                    </span>
                                                                @break
                                                                @case(9)
                                                                    <span class="justify-content-center"
                                                                        style="font-size: 2.5em; color: #007bff;">
                                                                        <i class="far fa-comment"></i>
                                                                    </span>
                                                                @break
                                                                @default
                                                            @endswitch
                                                            <p class="mt-3">{{ $tipo->tipo }}</p>
                                                        </a>
                                                    @endif
                                                </h3>
                                                <div class="card-tools col-1">
                                                    <button type="button" class="btn btn-tool"
                                                        data-card-widget="collapse"><i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                                <!-- /.card-tools -->
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body" style="display: none;">
                                                {{ $tipo->descripcion }}
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    @if (session('id'))
                        <input class="" id="id" type="hidden" value="{{ utf8_encode(utf8_decode(session('id'))) }}">
                        <input class="" id="pqr_tipo" type="hidden"
                            value="{{ utf8_encode(utf8_decode(session('pqr_tipo'))) }}">
                        <input class="" id="radicado" type="hidden"
                            value="{{ utf8_encode(utf8_decode(session('radicado'))) }}">
                        <input class="" id="fecha_radicado" type="hidden"
                            value="{{ utf8_encode(utf8_decode(session('fecha_radicado'))) }}">
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/generar_pqr/index.js') }}"></script>
@endsection
<!-- ************************************************************* -->
