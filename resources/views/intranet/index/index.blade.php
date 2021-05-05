<?php
$prq_p_num = $pqr_S->where('tipo_pqr_id', 1)->count();
$prq_q_num = $pqr_S->where('tipo_pqr_id', 2)->count();
$prq_r_num = $pqr_S->where('tipo_pqr_id', 3)->count();
$conceptos_num = $conceptos->count();
$solicitudes_datos_num = $solicitudes_datos->count();
$denuncias_num = $denuncias->count();
$felicitacionesnum = $felicitaciones->count();
$solicitudes_docnum = $solicitudes_doc->count();
$sugerencias_num = $sugerencias->count();
?>
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
    Sistema de informaci&oacute;n
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    @if ($usuario->camb_password == 0)
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-8">
                    @include('includes.error-form')
                    @include('includes.mensaje')
                </div>
            </div>
            @if (session('rol_id') == 6)
                @include('intranet.index.index_usuarios')
            @endif
            @if (session('rol_id') == 5)
                @include('intranet.index.index_funcionarios')
            @endif

        </div>
    @else
        @include('intranet.index.cambiopassword')
    @endif
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script src="{{ asset('lte/plugins/chart.js/Chart.min.js') }}"></script>

    <script>
        @if ($prq_q_num > 0)
            $(function() {

            var dataTareas = {
            labels: [
            'Vigentes',
            'Por Vencer',
            'Vencidas',
            ],
            datasets: [{
            data: [ <?php echo $prq_num; ?> , 20, 15],
            backgroundColor: ['#00a65a', '#f39c12', '#f56954'],
            }]
            }
            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            var pieData = dataTareas;
            var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            var pieChart = new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
            })


            })
        @endif

    </script>
@endsection
<!-- ************************************************************* -->
