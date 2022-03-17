<div class="card card-outline card-primary collapsed-card mx-1 py-2" style="font-size: 1em;">
    <div class="card-header">
        <h3 class="card-title font-weight-bold">Sentencia
            en primera instancia</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-plus"></i>
            </button>
        </div>
    </div>
    <div class="card-body" style="display: none;">
        <div class="menu-card">
            <div class="row">
                @php
                    $primeraInstancia = $tutela->primeraInstancia;
                @endphp
                <div class="col-12 col-md-3 text-center form-group">
                    <label>Fecha de la sentencia</label>
                    <br>
                    <span class="">{{ $primeraInstancia->fecha_sentencia }}</span>
                </div>
                <div class="col-12 col-md-3 text-center form-group">
                    <label>Fecha de notificación</label>
                    <br>
                    <span class="">{{ $primeraInstancia->fecha_notificacion }}</span>
                </div>
                <div class="col-12 col-md-3 text-center form-group">
                    <label>Sentido de la sentencia</label>
                    <br>
                    <span class="">{{ $primeraInstancia->sentencia }}</span>
                </div>
                <div class="col-12 col-md-3 text-center form-group">
                    <label>Documento de sentencia</label>
                    <br>
                    <span class=""><a
                            href="{{ asset('documentos/tutelas/sentencias/' . $primeraInstancia->url_sentencia) }}"
                            target="_blank" rel="noopener noreferrer">Descargar</a></span>
                </div>
                @if ($primeraInstancia->anexosPrimeraInstancia->count() > 0)
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 mt-3 mb-4">
                                <h6>Archivos Adjuntos</h6>
                            </div>
                            @foreach ($primeraInstancia->anexosPrimeraInstancia as $anexo)
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="col-12 col-md-3 text-center form-group">
                                                <label>Titulo
                                                    Anexo</label>
                                                <br>
                                                <span class="">{{ $anexo->titulo_anexo }}</span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="col-12 col-md-3 text-center form-group">
                                                <label>Descripción
                                                    Anexo</label>
                                                <br>
                                                <span class="">{{ $anexo->descripcion_anexo }}</span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="col-12 col-md-3 text-center form-group">
                                                <label>Archivo
                                                    Anexo</label>
                                                <br>
                                                <span class=""><a
                                                        href="{{ asset('documentos/tutelas/sentencias/' . $anexo->url_anexo) }}"
                                                        target="_blank" rel="noopener noreferrer">Descargar</a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
