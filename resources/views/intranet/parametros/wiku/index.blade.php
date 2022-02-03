@extends("theme.back.plantilla")
<!-- ************************************************************* -->
<!-- Funciones php -->
@section('funciones_php')
    @include('includes.funciones_php')
@endsection
<!-- Pagina CSS -->
@section('estilosHojas')
    <link rel="stylesheet" href="{{ asset('css/intranet/normas/normas.css') }}">
@endsection
<!-- ************************************************************* -->
@section('tituloHoja')

@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    @include('intranet.funcionarios.menu.menu')
    <hr>
    <div class="card">
        @include('includes.error-form')
        @include('includes.mensaje')
        <div class="row  d-flex justify-content-around">
            <div class="col-12">
                <div class="card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-three-argumento-tab" data-toggle="pill"
                                    href="#custom-tabs-three-argumento" role="tab"
                                    aria-controls="custom-tabs-three-argumento" aria-selected="false">Argumentos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-three-normas-tab" data-toggle="pill"
                                    href="#custom-tabs-three-normas" role="tab" aria-controls="custom-tabs-three-normas"
                                    aria-selected="false">Normas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-three-jurisprudencia-tab" data-toggle="pill"
                                    href="#custom-tabs-three-jurisprudencia" role="tab"
                                    aria-controls="custom-tabs-three-jurisprudencia"
                                    aria-selected="false">Jurisprudencia</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-three-doctrinas-tab" data-toggle="pill"
                                    href="#custom-tabs-three-doctrinas" role="tab"
                                    aria-controls="custom-tabs-three-doctrinas" aria-selected="false">Doctrinas</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-three-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-three-argumento" role="tabpanel"
                                aria-labelledby="custom-tabs-three-argumento-tab">
                                <div class="row d-flex justify-content-around">
                                    <div class="col-12 col-md-4 text-md-left pl-2">
                                        <h5>Listado de Argumentos actuales</h5>
                                    </div>
                                    <div class="col-12 col-md-3 text-md-right pl-2 pr-md-5">
                                        <a href="{{ route('wiku_argumento-crear') }}"
                                            class="btn btn-success btn-sm text-center pl-3 pr-3 float-right"
                                            style="font-size: 0.8em;"><i class="fas fa-plus-circle mr-2"></i> Nuevo
                                            Argumento</a>
                                    </div>
                                </div>
                                <div class="row mt-3" style="font-size: 0.8em;">
                                    <div class="col-12">
                                        <table class="table table-striped table-hover table-sm displayScroll"
                                            style="min-width: 100%;">
                                            <thead class="thead-inverse">
                                                <tr>
                                                    <th class="text-center">Id</th>
                                                    <th class="text-center">Fecha de Creación</th>
                                                    <th class="text-center">Tipo</th>
                                                    <th class="text-center">Autor(es)</th>
                                                    <th class="text-center">Texto Principal</th>
                                                    <th class="text-center">Descripción del articulo</th>
                                                    <th class="text-center">Área de conocimiento</th>
                                                    <th class="text-center">Tema</th>
                                                    <th class="text-center">Tema Específico</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($argumentos as $argumento)
                                                    <tr>
                                                        <td class="text-center">{{ $argumento->id }}</td>
                                                        <td class="text-center">{{ $argumento->fecha }}</td>

                                                        <td class="text-center">
                                                            {{ $argumento->publico ? 'Privado' : 'Publico' }}
                                                        </td>
                                                        <td class="text-center">
                                                            @if ($argumento->autorInst != null)
                                                                {{ $argumento->autorInst->institucion . ';' }}
                                                            @endif
                                                            @if ($argumento->autor != null)
                                                                {{ $argumento->autor->nombre1 .' ' .$argumento->autor->nombre2 .' ' .$argumento->autor->apellido1 .' ' .$argumento->autor->apellido2 }}

                                                            @endif
                                                        </td>
                                                        <td class="text-justify" style="min-width:100px;">
                                                            {!! $argumento->texto !!}
                                                        </td>
                                                        <td class="text-justify" style="min-width:100px;">
                                                            {{ $argumento->descripcion }}
                                                        </td>
                                                        <td>
                                                            {{ $argumento->temaEspecifico->tema_->area->area }}
                                                        </td>
                                                        <td style="min-width:100px;">
                                                            {{ $argumento->temaEspecifico->tema_->tema }}
                                                        </td>
                                                        <td style="min-width:150px;">
                                                            {{ $argumento->temaespecifico->tema }}
                                                        </td>
                                                        <td class="d-flex">
                                                            <a href="{{ route('wiku_argumento-editar', ['id' => $argumento->id]) }}"
                                                                class="btn-accion-tabla tooltipsC text-info"
                                                                title="Editar"><i class="fa fa-edit"
                                                                    aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-three-normas" role="tabpanel"
                                aria-labelledby="custom-tabs-three-normas-tab">
                                <div class="row d-flex justify-content-around">
                                    <div class="col-12 col-md-4 text-md-left pl-2">
                                        <h5>Listado de Normas actuales</h5>
                                    </div>
                                    <div class="col-12 col-md-3 text-md-right pl-2 pr-md-5">
                                        <a href="{{ route('wiku_norma-crear') }}"
                                            class="btn btn-success btn-sm text-center pl-3 pr-3"
                                            style="font-size: 0.8em;{{ $fuentes->count() == 0 ? 'opacity: 0.4; cursor: default;pointer-events: none;' : '' }}"><i
                                                class="fas fa-plus-circle mr-2"></i> Nueva Norma</a>
                                    </div>
                                    <div class="col-12 col-md-4 text-md-right pl-2 pr-md-5">
                                        <a href="{{ route('wiku-index_fuenteN') }}"
                                            class="btn btn-info btn-sm text-center pl-3 pr-3" style="font-size: 0.8em;"><i
                                                class="fas fa-plus-circle mr-2"></i> Configurar
                                            Fuentes Normativas</a>
                                    </div>
                                </div>
                                <div class="row mt-3" style="font-size: 0.8em;">
                                    <div class="col-12">
                                        <table class="table table-striped table-hover table-sm displayScroll"
                                            style="min-width: 100%;">
                                            <thead class="thead-inverse">
                                                <tr>
                                                    <th class="text-center">Fuente</th>
                                                    <th class="text-center">Fecha de Emisión</th>
                                                    <th class="text-center">Ente Emisor</th>
                                                    <th class="text-center">Artículo</th>
                                                    <th class="text-center">Fecha de entrada en vigencia</th>
                                                    <th class="text-center">Texto Principal</th>
                                                    <th class="text-center">Descripción del articulo</th>
                                                    <th class="text-center">Área de conocimiento</th>
                                                    <th class="text-center">Tema</th>
                                                    <th class="text-center">Tema Específico</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($normas as $norma)
                                                    <tr>
                                                        <td>{{ $norma->documento->fuente . ' - ' . $norma->id }}</td>
                                                        <td class="text-center">{{ $norma->documento->fecha }}</td>
                                                        <td class="text-center">{{ $norma->documento->emisor }}
                                                        </td>
                                                        <td class="text-center">{{ $norma->articulo }}</td>
                                                        <td class="text-center">{{ $norma->fecha }}</td>
                                                        <td class="text-center">{{ $norma->texto }}</td>
                                                        <td class="text-center">{{ $norma->descripcion }}</td>
                                                        <td>{{ $norma->temaEspecifico->tema_->area->area }}</td>
                                                        <td style="min-width:100px;">
                                                            {{ $norma->temaEspecifico->tema_->tema }}</td>
                                                        <td style="min-width:150px;">
                                                            {{ $norma->temaespecifico->tema }}</td>
                                                        <td class="d-flex">
                                                            <a href="{{ route('wiku_norma-editar', ['id' => $norma->id]) }}"
                                                                class="btn-accion-tabla tooltipsC text-info"
                                                                title="Editar"><i class="fa fa-edit"
                                                                    aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-three-jurisprudencia" role="tabpanel"
                                aria-labelledby="custom-tabs-three-jurisprudencia-tab">
                                <div class="row d-flex justify-content-around">
                                    <div class="col-12 col-md-4 text-md-left pl-2">
                                        <h5>Listado de Jurispruencias actuales</h5>
                                    </div>
                                    <div class="col-12 col-md-3 text-md-right pl-2 pr-md-5">
                                        <a href="{{ route('wiku_jurisprudencia-crear') }}"
                                            class="btn btn-success btn-sm text-center pl-3 pr-3"
                                            style="font-size: 0.8em;{{ $fuentes->count() == 0 ? 'opacity: 0.4; cursor: default;pointer-events: none;' : '' }}"><i
                                                class="fas fa-plus-circle mr-2"></i> Nueva Jurisprudencia</a>
                                    </div>
                                </div>
                                <div class="row mt-3" style="font-size: 0.8em;">
                                    <div class="col-12">
                                        <table class="table table-striped table-hover table-sm displayScroll"
                                            style="min-width: 100%;">
                                            <thead class="thead-inverse">
                                                <tr>
                                                    <th class="text-center">Ente Emisor</th>
                                                    <th class="text-center">Sala o Sección</th>
                                                    <th class="text-center">Sub-sala o subsección</th>
                                                    <th class="text-center">N° radicado</th>
                                                    <th class="text-center">Fecha de emisión</th>
                                                    <th class="text-center">Magistrado</th>
                                                    <th class="text-center">Demandante</th>
                                                    <th class="text-center">Demandado</th>
                                                    <th class="text-center">Texto</th>
                                                    <th class="text-center">Descripción</th>
                                                    <th class="text-center">Archivo</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($jurisprudencias as $jurisprudencia)
                                                    <tr>
                                                        <td class="text-center">
                                                            {{ $jurisprudencia->subsala->sala->ente->ente }}</td>
                                                        <td class="text-center">
                                                            {{ $jurisprudencia->subsala->sala->sala }}</td>
                                                        <td class="text-center">
                                                            {{ $jurisprudencia->subsala->subsala }}</td>
                                                        <td class="text-center">{{ $jurisprudencia->radicado }}</td>
                                                        <td class="text-center">
                                                            {{ $jurisprudencia->fecha != null ? $jurisprudencia->fecha : '---' }}
                                                        </td>
                                                        <td>
                                                            {{ $jurisprudencia->magistrado->nombre1 .' ' .$jurisprudencia->magistrado->nombre2 .' ' .$jurisprudencia->magistrado->apellido1 .' ' .$jurisprudencia->magistrado->apellido2 }}
                                                        </td>
                                                        <td>
                                                            {{ $jurisprudencia->demandante ? $jurisprudencia->demandante->demandante : '' }}
                                                        </td>
                                                        <td>
                                                            {{ $jurisprudencia->texto }}
                                                        </td>
                                                        <td>
                                                            {{ $jurisprudencia->descripcion ? $jurisprudencia->descripcion : '' }}
                                                        </td>
                                                        <td>
                                                            {{ $jurisprudencia->demandado ? $jurisprudencia->demandado->demandado : '' }}
                                                        </td>
                                                        <td>
                                                            {{ $jurisprudencia->archivo != null ? $jurisprudencia->archivo : '---' }}
                                                        </td>
                                                        <td class="d-flex">
                                                            <a href="{{ route('wiku_jurisprudencia-editar', ['id' => $jurisprudencia->id]) }}"
                                                                class="btn-accion-tabla tooltipsC text-info"
                                                                title="Editar"><i class="fa fa-edit"
                                                                    aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-three-doctrinas" role="tabpanel"
                                aria-labelledby="custom-tabs-three-doctrinas-tab">
                                <div class="row d-flex justify-content-around">
                                    <div class="col-12 col-md-4 text-md-left pl-2">
                                        <h5>Listado de Doctrinas actuales</h5>
                                    </div>
                                    <div class="col-12 col-md-3 text-md-right pl-2 pr-md-5">
                                        <a href="{{ route('wiku_doctrina-crear') }}"
                                            class="btn btn-success btn-sm text-center pl-3 pr-3"
                                            style="font-size: 0.8em;{{ $fuentes->count() == 0 ? 'opacity: 0.4; cursor: default;pointer-events: none;' : '' }}"><i
                                                class="fas fa-plus-circle mr-2"></i> Nueva Doctrina</a>
                                    </div>
                                </div>
                                <div class="row mt-3" style="font-size: 0.8em;">
                                    <div class="col-12">
                                        <table class="table table-striped table-hover table-sm displayScroll"
                                            style="min-width: 100%;">
                                            <thead class="thead-inverse">
                                                <tr>
                                                    <th class="text-center">Id</th>
                                                    <th class="text-center">Tipo de publicación</th>
                                                    <th class="text-center">Título</th>
                                                    <th class="text-center">Descripción</th>
                                                    <th class="text-center">Año</th>
                                                    <th class="text-center">Mes</th>
                                                    <th class="text-center">Dia</th>
                                                    <th class="text-center">Cuidad</th>
                                                    <th class="text-center">Editorial</th>
                                                    <th class="text-center">Nombre de revista</th>
                                                    <th class="text-center">Url</th>
                                                    <th class="text-center">Autor(es)</th>
                                                    <th class="text-center">Cita</th>
                                                    <th class="text-center">Páginas</th>
                                                    <th class="text-center">Área de conocimiento</th>
                                                    <th class="text-center">Tema</th>
                                                    <th class="text-center">Tema Específico</th>
                                                    <th class="text-center">Archivo</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($doctrinas as $doctrina)
                                                    <tr>
                                                        <td class="text-center">{{ $doctrina->id }}</td>
                                                        <td class="text-center">{{ $doctrina->tipo }}</td>
                                                        <td class="text-center">
                                                            {{ $doctrina->titulo != null ? $doctrina->titulo : '---' }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $doctrina->descripcion != null ? $doctrina->descripcion : '---' }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $doctrina->anno != null ? $doctrina->anno : '---' }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $doctrina->mes != null ? $doctrina->mes : '---' }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $doctrina->dia != null ? $doctrina->dia : '---' }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $doctrina->ciudad != null ? $doctrina->ciudad : '---' }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $doctrina->editorial != null ? $doctrina->editorial : '---' }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $doctrina->revista != null ? $doctrina->revista : '---' }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $doctrina->url != null ? $doctrina->url : '---' }}
                                                        </td>
                                                        <td class="text-center">
                                                            @if ($doctrina->autorInst != null)
                                                                {{ $doctrina->autorInst->institucion . ';' }}
                                                            @endif
                                                            @if ($doctrina->autor != null)
                                                                {{ $doctrina->autor->nombre1 .' ' .$doctrina->autor->nombre2 .' ' .$doctrina->autor->apellido1 .' ' .$doctrina->autor->apellido2 }}

                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $doctrina->texto }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $doctrina->paginas != null ? $doctrina->paginas : '---' }}
                                                        </td>
                                                        <td>
                                                            {{ $doctrina->temaEspecifico->tema_->area->area }}
                                                        </td>
                                                        <td style="min-width:100px;">
                                                            {{ $doctrina->temaEspecifico->tema_->tema }}
                                                        </td>
                                                        <td style="min-width:150px;">
                                                            {{ $doctrina->temaespecifico->tema }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $doctrina->archivo != null ? $doctrina->archivo : '---' }}
                                                        </td>
                                                        <td class="d-flex">
                                                            <a href="{{ route('wiku_doctrina-editar', ['id' => $doctrina->id]) }}"
                                                                class="btn-accion-tabla tooltipsC text-info"
                                                                title="Editar"><i class="fa fa-edit"
                                                                    aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/parametros/wiku.js') }}"></script>
@endsection
<!-- ************************************************************* -->
