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
    {{-- Sistema de informaci&oacute;n PQR LEGAL PROCEEDINGS --}}
    Sistema de informaci&oacute;n
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            {{-- Generar PQR --}}
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Actualizar datos</h3>
                    </div>
                    @if ($usuario->persona)
                        @include('intranet.datos_personales.persona')
                    @endif
                    @if ($usuario->representante)
                        @include('intranet.datos_personales.representante')
                    @endif
                    @if ($usuario->empleado)
                        @include('intranet.datos_personales.empleado')
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Agregue la dirección</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div class="col-2 form-group">
                        <select class="form-control form-control-sm direccion_parte" name="dir1" id="dir1">
                            <option value="Avenida calle">Avenida calle</option>
                            <option value="Avenida carrera">Avenida carrera</option>
                            <option value="Calle">Calle</option>
                            <option value="Diagonal">Diagonal</option>
                            <option value="Carrera">Carrera</option>
                            <option value="Transversal">Transversal</option>
                        </select>
                    </div>
                    <div class="col-1 form-group">
                        <input class="text-center form-control form-control-sm direccion_parte" type="text" name="dir2"
                            id="dir2">
                    </div>
                    <div class="col-1 form-group">
                        <select class="form-control form-control-sm direccion_parte" name="dir3" id="dir3">
                            <option value=""></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                            <option value="I">I</option>
                            <option value="J">J</option>
                            <option value="K">K</option>
                            <option value="L">L</option>
                            <option value="M">M</option>
                            <option value="N">N</option>
                            <option value="O">O</option>
                            <option value="P">P</option>
                            <option value="Q">Q</option>
                            <option value="R">R</option>
                            <option value="S">S</option>
                            <option value="T">T</option>
                            <option value="U">U</option>
                            <option value="V">V</option>
                            <option value="W">W</option>
                            <option value="X">X</option>
                            <option value="Y">Y</option>
                            <option value="Z">Z</option>

                        </select>
                    </div>
                    <div class="col-1 form-group">
                        <select class="form-control form-control-sm direccion_parte" name="dir4" id="dir4">
                            <option value=""></option>
                            <option value="BIS">BIS</option>
                        </select>
                    </div>
                    <div class="col-1 form-group">
                        <select class="form-control form-control-sm direccion_parte" name="dir5" id="dir5">
                            <option value=""></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                            <option value="I">I</option>
                            <option value="J">J</option>
                            <option value="K">K</option>
                            <option value="L">L</option>
                            <option value="M">M</option>
                            <option value="N">N</option>
                            <option value="O">O</option>
                            <option value="P">P</option>
                            <option value="Q">Q</option>
                            <option value="R">R</option>
                            <option value="S">S</option>
                            <option value="T">T</option>
                            <option value="U">U</option>
                            <option value="V">V</option>
                            <option value="W">W</option>
                            <option value="X">X</option>
                            <option value="Y">Y</option>
                            <option value="Z">Z</option>

                        </select>
                    </div>
                    <div class="col-1 form-group">
                        <select class="form-control form-control-sm direccion_parte" name="dir6" id="dir6">
                            <option value=""></option>
                            <option value="SUR">SUR</option>
                            <option value="ESTE">ESTE</option>
                        </select>
                    </div>
                    <div class="col-1 form-group">
                        <span class="form-control form-control-sm">No.</span>
                    </div>
                    <div class="col-4 form-group d-flex flex-row">
                        <input class="text-center form-control form-control-sm direccion_parte" type="text" name="dir7"
                            id="dir7">
                        <select class="form-control form-control-sm direccion_parte" name="dir8" id="dir8">
                            <option value=""></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                            <option value="I">I</option>
                            <option value="J">J</option>
                            <option value="K">K</option>
                            <option value="L">L</option>
                            <option value="M">M</option>
                            <option value="N">N</option>
                            <option value="O">O</option>
                            <option value="P">P</option>
                            <option value="Q">Q</option>
                            <option value="R">R</option>
                            <option value="S">S</option>
                            <option value="T">T</option>
                            <option value="U">U</option>
                            <option value="V">V</option>
                            <option value="W">W</option>
                            <option value="X">X</option>
                            <option value="Y">Y</option>
                            <option value="Z">Z</option>

                        </select>
                        <span class="form-control form-control-sm text-center">-</span>
                        <input class="text-center form-control form-control-sm direccion_parte" type="text" name="dir9"
                            id="dir9">
                        <select class="form-control form-control-sm direccion_parte" name="dir10" id="dir10">
                            <option value=""></option>
                            <option value="SUR">SUR</option>
                            <option value="ESTE">ESTE</option>
                        </select>
                    </div>
                    <div class="col-12 form-group">
                        <span class="form-control form-control-sm text-center" id="direccion_completa"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-xs" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary btn-xs" id="agregar_dir_fomulario"
                        data-bs-dismiss="modal">Agregar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('js/intranet/registro/registro.js') }}"></script>
    <script>
        $('.myPopover').popover({
            html: true,
            placement: 'top',
            trigger: 'hover',
            title: 'Campo Bloqueado',
            content: '<p>Para hacer el cambio de alguno de estos datos, lo invitamos a utilizar la opción "Solicitud sobre mis datos personales"</p>'
        });

    </script>
@endsection
<!-- ************************************************************* -->
