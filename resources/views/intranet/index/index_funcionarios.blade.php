<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light" style="border: solid 1px blue;">
                <div class="inner">
                    <h3>{{ $pqr_S->count() }}</h3>
                    <p style="font-size: 0.8em">Peticiones,Quejas,Reclamos</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag text-primary"></i>
                </div>
                <a href="#" class="small-box-footer text-primary" style="color: green;">Más info <i
                        class="fas fa-arrow-circle-right text-white;"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light" style="border: solid 1px green;">
                <div class="inner">
                    <h3>{{ $conceptos->count() }}</h3>

                    <p style="font-size: 0.8em">Consultas</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars text-green"></i>
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

                    <p style="font-size: 0.8em">Solicitud de datos personales</p>
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

                    <p style="font-size: 0.8em">Reporte de irregularidades</p>
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

                    <p style="font-size: 0.8em">Felicitaciones</p>
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

                    <p style="font-size: 0.8em">Solicitud de documentos o información</p>
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

                    <p style="font-size: 0.8em">Sugerencias</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>

</div>
