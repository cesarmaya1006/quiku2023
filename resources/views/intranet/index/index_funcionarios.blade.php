<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $pqr_S->count() }}</h3>
                    <p>Peticiones,Quejas,Reclamos</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $conceptos->count() }}</h3>

                    <p>Consultas</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $solicitudes_datos->count() }}</h3>

                    <p>Solicitud de datos personales</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $denuncias->count() }}</h3>

                    <p>Denuncias</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-pink">
                <div class="inner">
                    <h3>{{ $felicitaciones->count() }}</h3>

                    <p>Felicitaciones</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-teal">
                <div class="inner">
                    <h3>{{ $solicitudes_doc->count() }}</h3>

                    <p>Solicitud de documentos o información</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-ingo"></i>
                </div>
                <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-indigo">
                <div class="inner">
                    <h3>{{ $sugerencias->count() }}</h3>

                    <p>Sugerencias</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <hr>
    <div class="row d-flex justify-content-around">
        @if ($prq_p_num > 0)
            <div class="col-10 col-md-3 px-1">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Peticiones</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="pieChart_1"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        @endif
        @if ($prq_q_num > 0)
            <div class="col-10 col-md-3 px-1">
                <div class="card card-purple">
                    <div class="card-header">
                        <h3 class="card-title">Quejas</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="pieChart_2"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        @endif
        @if ($prq_r_num > 0)
            <div class="col-10 col-md-3 px-1">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Reclamos</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="pieChart_3"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        @endif
        @if ($conceptos_num > 0)
            <div class="col-10 col-md-3 px-1">
                <div class="card card-indigo">
                    <div class="card-header">
                        <h3 class="card-title">Concepto u Opinion</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="pieChart_4"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        @endif
        @if ($solicitudes_datos_num > 0)
            <div class="col-10 col-md-3 px-1">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Solicitud de datos personales</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="pieChart_5"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        @endif
    </div>
</div>
