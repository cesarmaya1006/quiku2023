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
    Parametros - Palabras
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
                <div class="col-12 col-md-6 col-lg-6 text-md-left text-lg-left pl-2">
                    <h5>Listado de Palabras</h5>
                </div>
                <div class="col-12 col-md-6 col-lg-6 text-md-right text-lg-right pl-2 pr-md-5 pr-lg-5">
                    <a href="{{ route('wiku_palabras-crear', ['id' => $norma->id, 'wiku' => $wiku]) }}"
                        class="btn btn-success btn-xs text-center pl-3 pr-3 mr-4" style="font-size: 0.9em;"><i
                            class="fas fa-plus-circle mr-2"></i> Nueva Palabra clave</a>
                    <a href="{{ route('wiku_volver_palabras', ['id' => $norma->id, 'wiku' => $wiku]) }}"
                        class="btn btn-primary btn-xs btn-sm text-center pl-3 pr-3" style="font-size: 0.9em;"><i
                            class="fas fa-reply mr-2"></i> Volver</a>
                </div>
            </div>
            <hr>
            <div class="row  d-flex justify-content-around" style="font-size: 0.8em;">
                <div class="col-12 col-md-6">
                    <table class="table table-striped table-hover table-sm display" id="tabla-data">
                        <thead class="thead-inverse">
                            <tr>
                                <th class="text-center">Palabras</th>
                                <th class="text-center">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($palabras as $palabra)
                                <tr>
                                    <td>{{ $palabra->palabra }}</td>
                                    <td class="text-center">
                                        @if ($palabra->normas->count() > 0)
                                            <?php $esta = 0; ?>
                                            @foreach ($palabra->normas as $norma_p)
                                                @if ($norma->id === $norma_p->id)
                                                    <?php $esta = 1; ?>
                                                @endif
                                            @endforeach
                                            @if ($esta == 1)
                                                @foreach ($palabra->normas as $norma_p)
                                                    @if ($norma->id === $norma_p->id)
                                                        <form
                                                            action="{{ route('wiku_palabras-restar', ['id_palabras' => $palabra->id, 'id' => $norma->id]) }}"
                                                            action_restar="{{ route('wiku_palabras-adicionar', ['id_palabras' => $palabra->id, 'id' => $norma->id]) }}"
                                                            class="d-inline form-restar" method="POST">
                                                            @csrf @method("post")
                                                            <button type="submit"
                                                                class="btn-accion-tabla eliminar tooltipsC"
                                                                title="Restar palabra">
                                                                <i class="fa fa-minus-square text-danger"
                                                                    aria-hidden="true"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                @endforeach
                                            @else
                                                <form
                                                    action="{{ route('wiku_palabras-adicionar', ['id_palabras' => $palabra->id, 'id' => $norma->id]) }}"
                                                    action_restar="{{ route('wiku_palabras-restar', ['id_palabras' => $palabra->id, 'id' => $norma->id]) }}"
                                                    class="d-inline form-adicionar" method="POST">
                                                    @csrf @method("post")
                                                    <button type="submit" class="btn-accion-tabla eliminar tooltipsC"
                                                        title="Asociar palabra">
                                                        <i class="fa fa-plus-square text-success" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        @else
                                            <form
                                                action="{{ route('wiku_palabras-restar', ['id_palabras' => $palabra->id, 'id' => $norma->id]) }}"
                                                action_restar="{{ route('wiku_palabras-adicionar', ['id_palabras' => $palabra->id, 'id' => $norma->id]) }}"
                                                class="d-inline form-restar" method="POST">
                                                @csrf @method("post")
                                                <button type="submit" class="btn-accion-tabla eliminar tooltipsC"
                                                    title="Restar palabra">
                                                    <i class="fa fa-minus-square text-danger" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        @endif
                                        <a href="{{ route('wiku_palabras-editar', ['id_palabras' => $palabra->id, 'id' => $norma->id, 'wiku' => $wiku]) }}"
                                            class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                            <i class="fas fa-pen-square"></i>
                                        </a>
                                        <form action="{{ route('wiku_palabras-eliminar', ['id' => $palabra->id]) }}"
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
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/parametros/palabras.js') }}"></script>
@endsection
<!-- ************************************************************* -->
