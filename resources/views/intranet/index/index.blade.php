<?php
$prq_p_num = $pqr_S->where('tipo_pqr_id', 1)->count();
$prq_p_num_rad_sin = $pqr_S
->where('tipo_pqr_id', 1)
->where('estado', 'Radicada, sin iniciar tramite')
->count();
$prq_p_num_rad_ges = $pqr_S
->where('tipo_pqr_id', 1)
->where('estado', 'En tramite')
->count();
$prq_p_num_rad_ven = $pqr_S
->where('tipo_pqr_id', 1)
->where('estado', 'Vencida')
->count();

$prq_q_num = $pqr_S->where('tipo_pqr_id', 2)->count();
$prq_q_num_rad_sin = $pqr_S
->where('tipo_pqr_id', 2)
->where('estado', 'Radicada, sin iniciar tramite')
->count();
$prq_q_num_rad_ges = $pqr_S
->where('tipo_pqr_id', 2)
->where('estado', 'En tramite')
->count();
$prq_q_num_rad_ven = $pqr_S
->where('tipo_pqr_id', 2)
->where('estado', 'Vencida')
->count();

$prq_r_num = $pqr_S->where('tipo_pqr_id', 3)->count();
$prq_r_num_rad_sin = $pqr_S
->where('tipo_pqr_id', 3)
->where('estado', 'Radicada, sin iniciar tramite')
->count();
$prq_r_num_rad_ges = $pqr_S
->where('tipo_pqr_id', 3)
->where('estado', 'En tramite')
->count();
$prq_r_num_rad_ven = $pqr_S
->where('tipo_pqr_id', 3)
->where('estado', 'Vencida')
->count();

$conceptos_num = $conceptos->count();
$concepto_rad_sin = $conceptos->where('estado', 'Radicada, sin iniciar tramite')->count();
$concepto_rad_ges = $conceptos->where('estado', 'En tramite')->count();
$concepto_rad_ven = $conceptos->where('estado', 'Vencida')->count();

$solicitudes_datos_num = $solicitudes_datos->count();
$solicitudes_datos_sin = $solicitudes_datos->where('estado', 'Radicada, sin iniciar tramite')->count();
$solicitudes_datos_ges = $solicitudes_datos->where('estado', 'En tramite')->count();
$solicitudes_datos_ven = $solicitudes_datos->where('estado', 'Vencida')->count();

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
            @if (session('rol_id') == 1)
                @include('intranet.index.adminsistema')
            @endif
            @if (session('rol_id') == 3)
                @include('intranet.index.indexadmin')
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
    @if ($prq_p_num > 0)
        <script>
            $(function() {

                var dataTareas = {
                    labels: [
                        'Sin Gestion',
                        'En Tramite',
                        'Vencidas',
                    ],
                    datasets: [{
                        data: [<?php echo $prq_p_num_rad_sin; ?>, <?php echo $prq_p_num_rad_ges; ?>,
                            <?php echo $prq_p_num_rad_ven; ?>,
                        ],
                        backgroundColor: ['#00a65a', '#f39c12', '#f56954'],
                    }]
                }
                //-------------
                //- PIE CHART -
                //-------------
                // Get context with jQuery - using jQuery's .get() method.
                var pieChartCanvas = $('#pieChart_1').get(0).getContext('2d')
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
        </script>
    @endif
    @if ($prq_q_num > 0)
        <script>
            $(function() {

                var dataTareas = {
                    labels: [
                        'Sin Gestion',
                        'En Tramite',
                        'Vencidas',
                    ],
                    datasets: [{
                        data: [<?php echo $prq_q_num_rad_sin; ?>, <?php echo $prq_q_num_rad_ges; ?>,
                            <?php echo $prq_q_num_rad_ven; ?>,
                        ],
                        backgroundColor: ['#00a65a', '#f39c12', '#f56954'],
                    }]
                }
                //-------------
                //- PIE CHART -
                //-------------
                // Get context with jQuery - using jQuery's .get() method.
                var pieChartCanvas = $('#pieChart_2').get(0).getContext('2d')
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
        </script>
    @endif
    @if ($prq_r_num > 0)
        <script>
            $(function() {

                var dataTareas = {
                    labels: [
                        'Sin Gestion',
                        'En Tramite',
                        'Vencidas',
                    ],
                    datasets: [{
                        data: [<?php echo $prq_r_num_rad_sin; ?>, <?php echo $prq_r_num_rad_ges; ?>,
                            <?php echo $prq_r_num_rad_ven; ?>,
                        ],
                        backgroundColor: ['#00a65a', '#f39c12', '#f56954'],
                    }]
                }
                //-------------
                //- PIE CHART -
                //-------------
                // Get context with jQuery - using jQuery's .get() method.
                var pieChartCanvas = $('#pieChart_3').get(0).getContext('2d')
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
        </script>
    @endif
    @if ($conceptos_num > 0)
        <script>
            $(function() {

                var dataTareas = {
                    labels: [
                        'Vigentes',
                        'Por Vencer',
                        'Vencidas',
                    ],
                    datasets: [{
                        data: [<?php echo $concepto_rad_sin; ?>, <?php echo $concepto_rad_ges; ?>,
                            <?php echo $concepto_rad_ven; ?>,
                        ],
                        backgroundColor: ['#00a65a', '#f39c12', '#f56954'],
                    }]
                }
                //-------------
                //- PIE CHART -
                //-------------
                // Get context with jQuery - using jQuery's .get() method.
                var pieChartCanvas = $('#pieChart_4').get(0).getContext('2d')
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
        </script>
    @endif

    @if ($solicitudes_datos_num > 0)
        <script>
            $(function() {

                var dataTareas = {
                    labels: [
                        'Vigentes',
                        'Por Vencer',
                        'Vencidas',
                    ],
                    datasets: [{
                        data: [<?php echo $solicitudes_datos_sin; ?>, <?php echo $solicitudes_datos_ges; ?>,
                            <?php echo $solicitudes_datos_ven; ?>,
                        ],
                        backgroundColor: ['#00a65a', '#f39c12', '#f56954'],
                    }]
                }
                //-------------
                //- PIE CHART -
                //-------------
                // Get context with jQuery - using jQuery's .get() method.
                var pieChartCanvas = $('#pieChart_5').get(0).getContext('2d')
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
        </script>
    @endif
    @if ($denuncias_num > 0)
        <script>
            $(function() {

                var dataTareas = {
                    labels: [
                        'Vigentes',
                        'Por Vencer',
                        'Vencidas',
                    ],
                    datasets: [{
                        data: [<?php echo $denuncias_num; ?>, 20, 15],
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
        </script>
    @endif
    @if ($felicitacionesnum > 0)
        <script>
            $(function() {

                var dataTareas = {
                    labels: [
                        'Vigentes',
                        'Por Vencer',
                        'Vencidas',
                    ],
                    datasets: [{
                        data: [<?php echo $felicitacionesnum; ?>, 20,
                            15
                        ],
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
        </script>
    @endif
    @if ($solicitudes_docnum > 0)
        <script>
            $(function() {

                var dataTareas = {
                    labels: [
                        'Vigentes',
                        'Por Vencer',
                        'Vencidas',
                    ],
                    datasets: [{
                        data: [<?php echo $solicitudes_docnum; ?>, 20,
                            15
                        ],
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
        </script>
    @endif
    @if ($sugerencias_num > 0)
        <script>
            $(function() {

                var dataTareas = {
                    labels: [
                        'Vigentes',
                        'Por Vencer',
                        'Vencidas',
                    ],
                    datasets: [{
                        data: [<?php echo $sugerencias_num; ?>, 20,
                            15
                        ],
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
        </script>
    @endif
@endsection
<!-- ************************************************************* -->
