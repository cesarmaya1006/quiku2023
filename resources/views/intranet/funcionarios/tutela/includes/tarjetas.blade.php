<div class="row">
    <div class="col-12">
        <div class="row">
            @if ($tutela->estado->id < 4)
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-primary">
                        <span class="info-box-icon"><i class="fas fa-medal"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text text-center">En Gesti�n</span>
                            <span class="progress-description" style="font-size: 0.8em;">

                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            @else
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-danger">
                        <span class="info-box-icon"><i class="fas fa-medal"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text text-center">Cerrada</span>
                            <span class="progress-description" style="font-size: 0.8em;">
                                Tutela cerrada
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            @endif
            <div class="col-md-3 col-sm-6 col-12">
                @if ($tutela->primeraInstancia)
                    <div class="info-box bg-success">
                        <span class="info-box-icon"><i class="fas fa-medal"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">
                                Registro Sentencia <br> en primera instancia
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                @else
                    <a href="{{ route('tutelas_primera_instancia', ['id' => $tutela->id]) }}">
                        <div class="info-box" style="border: 1px solid black">
                            <span class="info-box-icon"><i class="fas fa-medal"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">
                                    Registro Sentencia <br> en primera instancia
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    </a>
                @endif
                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                @if ($tutela->primeraInstancia)
                    @php
                        $primeraInstancia = $tutela->primeraInstancia;
                    @endphp

                    @php
                        $firstDate = new DateTime($primeraInstancia->fecha_notificacion);
                        $secondDate = new DateTime(date('d-m-Y', strtotime($primeraInstancia->fecha_notificacion . '+ 3 days')));
                        $intvl = $firstDate->diff($secondDate);
                    @endphp
                    @if ($intvl->days > 3)
                        <div class="info-box bg-danger">
                            <span class="info-box-icon"><i class="fas fa-medal"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">
                                    Recursos de Impugnación
                                    <br>
                                    Tiempo cumplido
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    @else
                        <a href="{{ route('tutelas_impugnacion', ['id' => $tutela->id]) }}">
                            <div class="info-box" style="border: 1px solid black">
                                <span class="info-box-icon"><i class="fas fa-medal"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">
                                        Recursos de Impugnación
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a>
                    @endif
                @else
                    <div class="info-box" style="border: 1px solid black">
                        <span class="info-box-icon"><i class="fas fa-medal"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">
                                Recursos de Impugnación
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                @endif


                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                @if ($tutela->segundaInstancia)
                    <div class="info-box bg-success">
                        <span class="info-box-icon"><i class="fas fa-medal"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">
                                Registro Sentencia <br> en segunda instancia
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                @else
                    @if ($tutela->primeraInstancia)
                        <a href="{{ route('tutelas_segunda_instancia', ['id' => $tutela->id]) }}">
                            <div class="info-box" style="border: 1px solid black">
                                <span class="info-box-icon"><i class="fas fa-medal"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">
                                        Registro Sentencia <br> en primera instancia
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a>
                    @else
                        <div class="info-box bg-secondary">
                            <span class="info-box-icon"><i class="fas fa-medal"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">
                                    Registro Sentencia <br> en segunda instancia
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    @endif
                @endif
                <!-- /.info-box -->
            </div>
        </div>
    </div>
</div>
