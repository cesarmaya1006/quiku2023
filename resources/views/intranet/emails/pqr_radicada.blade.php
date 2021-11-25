<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        p {
            font-size: 12pt;
            text-align: justify;
        }

        table {
            width: 90%;
            margin: auto;
        }

        @page {
            margin: 0cm 0cm;
            font-family: Arial;
        }

        body {
            margin: 3cm 2cm 2cm;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            color: rgb(0, 0, 0);
            text-align: center;
            line-height: 30px;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            color: rgb(0, 0, 0);
            text-align: center;
            line-height: 35px;
            padding-bottom: 5px;
        }

    </style>
    <title>PQR Radicada</title>
</head>
<body>
    <header>
        <table>
            <tr>
                <td style="width: 25%;text-align: center;">
                    <img src="{{ $imagen }}" alt="" style="width: 100%;max-width: 70px;">
                    <p>{{$imagen}}</p>
                </td>
                <td style="width: 75%;">
                    <div style=" width: 100%;text-align: center;font-weight: bold;font-size: 22pt;">
                        <h3>Sistema Quiku</h3>
                    </div>
                </td>
            </tr>
        </table>
    </header>

    <main>
        <table>
            <tr>
                <td>
                    <p style="float: right;">{{ date('Y-m-d') }}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="margin-top: 50px;">
                        <p>Apreciado/Apreciada:</p>
                        <p>{{ $nombre }}</p>
                    </div>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                @if($tipo_pqr_id == 7)
                    <td style="width: 75%;margin-top: 135px;">
                        <p>Hemos recibido sus felicitaciones para con nuestra empresa y/o funcionarios.</p>
                        <p>Tus felicitaciones nos motivan y llenan de alegria para seguir mejorando cada dia.</p>
                        <p>A continuación podrá verificar los datos e información que han quedado resgistrados en nuestro
                            sistema:</p>
                    </td>
                @elseif($tipo_pqr_id == 9)
                    <td style="width: 75%;margin-top: 135px;">
                        <p>Hemos recibido sus sugerencias para con nuestra empresa y/o funcionarios. </p>
                        <p>Sus sugerencias nos motivan para seguir mejorando cada dia.</p>
                        <p>A continuación podrá verificar los datos e información que han quedado resgistrados en nuestro
                            sistema:</p>
                    </td>
                @else
                    <td>
                        <div>
                            <p>Hemos recibido su solicitud y la atenderemos en el menor tiempo posible. A continuación podrá
                                verificar los datos e información que han quedado resgistrados en
                                nuestro sistema:</p>
                        </div>
                    </td>
                @endif    
            </tr>
        </table>
        <hr>
        <table>
            <tr>
                <td>
                    <p><strong>Fecha de radicación: </strong> {{ $fecha }}</p>
                    <p><strong>No. de identificación de su solicitud: </strong> {{ $num_radicado }}</p>
                    <p><strong>Tipo de PQR:</strong> {{ $pqr_radicada->tipoPqr->tipo }}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Datos del peticionario: {{ $nombre }}</p>
                    <p>Tipo ID: {{ $tipo_doc }} No. ID: {{ $identificacion }}</p>
                    @if($email)
                        <p>E-mail: {{ $email }}</p>
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    <hr>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Información registrada en su PQR</h4>
                    @switch($tipo_pqr_id)
                        @case(1)
                            <p>Lugar de adquisición del producto o servicio: {{ $pqr_radicada->adquisicion }}</p>
                            <p>¿Su PQR es sobre un producto o servicio?: {{ $pqr_radicada->tipo }}</p>
                            @if ($pqr_radicada->tipo == 'Servicio')
                                <p>Tipo de Servicio: {{ $pqr_radicada->servicio->servicio }}</p>
                            @else
                                <p>Referencia: {{ $pqr_radicada->referencia->referencia }}</p>
                            @endif
                            <p>No. Factura: {{ $pqr_radicada->factura }}</p>
                            <p>Fecha de factura: {{ $pqr_radicada->fecha_factura }}</p>
                            <p>Tipo de servicio: {{ $pqr_radicada->servicio_id }}</p>
                            <?php $num_peticion = 0; ?>
                            @foreach ($pqr_radicada->peticiones as $peticion)
                                <?php $num_peticion++; ?>
                                <h5>Motivo: {{ $peticion->motivo->sub_motivo }}</h5>
                                <?php $num_hecho = 0; ?>
                                @foreach ($peticion->hechos as $hecho)
                                    <?php $num_hecho++; ?>
                                    <p>Hecho {{ $num_hecho }}: {{ $hecho->hecho }}</p>
                                @endforeach
                                <p>Solicitud: {{ $peticion->justificacion }}</p>
                            @endforeach
                        @break
                        @case(2)
                            <p>Lugar de adquisición del producto o servicio: {{ $pqr_radicada->adquisicion }}</p>
                            <p>¿Su PQR es sobre un producto o servicio?: {{ $pqr_radicada->tipo }}</p>
                            @if ($pqr_radicada->tipo == 'Servicio')
                                <p>Tipo de Servicio: {{ $pqr_radicada->servicio->servicio }}</p>
                            @else
                                <p>Referencia: {{ $pqr_radicada->referencia->referencia }}</p>
                            @endif
                            <p>No. Factura: {{ $pqr_radicada->factura }}</p>
                            <p>Fecha de factura: {{ $pqr_radicada->fecha_factura }}</p>
                            <p>Tipo de servicio: {{ $pqr_radicada->servicio_id }}</p>
                            <?php $num_peticion = 0; ?>
                            @foreach ($pqr_radicada->peticiones as $peticion)
                                <?php $num_peticion++; ?>
                                <h5>Motivo: {{ $peticion->motivo->sub_motivo }}</h5>
                                <?php $num_hecho = 0; ?>
                                @foreach ($peticion->hechos as $hecho)
                                    <?php $num_hecho++; ?>
                                    <p>Hecho {{ $num_hecho }}: {{ $hecho->hecho }}</p>
                                @endforeach
                                <p>Solicitud: {{ $peticion->justificacion }}</p>
                            @endforeach
                        @break
                        @case(3)
                            <p>Lugar de adquisición del producto o servicio: {{ $pqr_radicada->adquisicion }}</p>
                            <p>¿Su PQR es sobre un producto o servicio?: {{ $pqr_radicada->tipo }}</p>
                            @if ($pqr_radicada->tipo == 'Servicio')
                                <p>Tipo de Servicio: {{ $pqr_radicada->servicio->servicio }}</p>
                            @else
                                <p>Referencia: {{ $pqr_radicada->referencia->referencia }}</p>
                            @endif
                            <p>No. Factura: {{ $pqr_radicada->factura }}</p>
                            <p>Fecha de factura: {{ $pqr_radicada->fecha_factura }}</p>
                            <p>Tipo de servicio: {{ $pqr_radicada->servicio_id }}</p>
                            <?php $num_peticion = 0; ?>
                            @foreach ($pqr_radicada->peticiones as $peticion)
                                <?php $num_peticion++; ?>
                                <h5>Motivo: {{ $peticion->motivo->sub_motivo }}</h5>
                                <?php $num_hecho = 0; ?>
                                @foreach ($peticion->hechos as $hecho)
                                    <?php $num_hecho++; ?>
                                    <p>Hecho {{ $num_hecho }}: {{ $hecho->hecho }}</p>
                                @endforeach
                                <p>Solicitud: {{ $peticion->justificacion }}</p>
                            @endforeach
                        @break
                        @case(4)
                            <h4>Información registrada en sus Consultas</h4>
                            <?php $num_peticion = 0; ?>
                            @foreach ($pqr_radicada->peticiones as $peticion)
                                <?php $num_peticion++; ?>
                                <h5>Tipo de solicitud : {{ $peticion->consulta }}</h5>
                                <?php $num_hecho = 0; ?>
                                @foreach ($peticion->hechos as $hecho)
                                    <?php $num_hecho++; ?>
                                    <p>Hecho {{ $num_hecho }}: {{ $hecho->hecho }}</p>
                                @endforeach
                            @endforeach
                        @break
                        @case(5)
                            <h4>Información registrada en sus Solicitudes</h4>
                            <?php $num_peticion = 0; ?>
                            @foreach ($pqr_radicada->peticiones as $peticion)
                                <?php $num_peticion++; ?>
                                <h5>Tipo de solicitud : {{ $peticion->tiposolicitud }}</h5>
                                <p>Datos personales objeto de la solicitud: {{ $peticion->datossolicitud }}</p>
                                <p>Descripción de la solicitud: {{ $peticion->descripcionsolicitud }}</p>
                            @endforeach
                        @break
                        @case(6)
                            <h4>Información registrada en sus Solicitudes</h4>
                            <?php $num_peticion = 0; ?>
                            @foreach ($pqr_radicada->peticiones as $peticion)
                                <?php $num_peticion++; ?>
                                <h5>Tipo de irregularidad: {{ $peticion->irregularidad }}</h5>
                                <?php $num_hecho = 0; ?>
                                @foreach ($peticion->hechos as $hecho)
                                    <?php $num_hecho++; ?>
                                    <p>Hecho {{ $num_hecho }}: {{ $hecho->hecho }}</p>
                                @endforeach
                            @endforeach
                        @break
                        @case(7)
                            <h4>Felicitacion</h4>
                            @foreach ($pqr_radicada->peticiones as $peticion)
                                @foreach ($peticion->hechos as $hecho)
                                    <p>Hecho: {{ $hecho->hecho }}</p>
                                @endforeach
                                @if ($pqr_radicada->sede_id)
                                    <p>Sede:
                                        {{ $pqr_radicada->sede->nombre . '  (' . $pqr_radicada->sede->municipio->municipio . ')' }}
                                    </p>
                                @endif
                                <p>Nombre de funcionario: {{ $peticion->nombre_funcionario }}</p>
                                <p>Escriba sus felicitaciones: {{ $peticion->felicitacion }}</p>
                            @endforeach
                        @break
                        @case(8)
                            <h4>Información registrada en sus Solicitudes</h4>
                            <?php $num_peticion = 0; ?>
                            @foreach ($pqr_radicada->peticiones as $peticion)
                                <?php $num_peticion++; ?>
                                <h5>Petición : {{ $peticion->peticion }}</h5>
                                <p>Identifique el documento o información requerida: {{ $peticion->indentifiquedocinfo }}</p>
                                <p>Justificaciones de su solicitud: {{ $peticion->justificacion }}</p>
                            @endforeach
                        @break
                        @case(9)
                            <h4>Sugerencia</h4>
                            @foreach ($pqr_radicada->peticiones as $peticion)
                                @foreach ($peticion->hechos as $hecho)
                                    <p>Hecho: {{ $hecho->hecho }}</p>
                                @endforeach
                                <p><strong>Sugerencia:</strong> {{ $peticion->sugerencia }}</p>
                            @endforeach
                        @break
                    @endswitch
                </td>
            </tr>
        </table>
        <table>
            @if($tipo_pqr_id == 1 || $tipo_pqr_id == 2 || $tipo_pqr_id == 3 || $tipo_pqr_id == 4 || $tipo_pqr_id == 5 || $tipo_pqr_id == 6 || $tipo_pqr_id == 8 || $tipo_pqr_id == 9)
                <tr>
                    <td>
                        <h4>Anexos</h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <ul>
                            <?php $num_anexos = 0; ?>
                            @foreach ($pqr_radicada->peticiones as $peticion)
                                @if ($peticion->anexos->count() > 0)
                                    <?php $num_anexos = 1; ?>
                                    @foreach ($peticion->anexos as $anexo)
                                        <li>
                                            <a href="{{ asset('documentos/pqr/' . $anexo->url) }}" target="_blank"
                                                rel="noopener noreferrer">{{ $anexo->titulo }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            @endforeach
                        </ul>
                    </td>
                </tr>
                @if ($num_anexos == 1)
                    <tr>
                        <td>
                            <p> <strong>Nota : La relación de anexos anterior no implica que se ha verificado su
                                    contenido.</strong></p>
                        </td>
                    </tr>
                @endif
                <tr>
                    <td>
                        <p>En cualquier momento usted podrá consultar el estado y las respuestas a su solicitud ingresando a
                            nuestro sistema <a href="{{ route('index') }}" target="_blank"
                                rel="noopener noreferrer">Quiku</a>
                            opción listado PQR</p>
                    </td>
                </tr>
            @endif
        </table>
    </main>
    <footer>
        <table>
            <tr>
                <td>
                    <div style=" width: 100%;text-align: center;font-weight: bold;font-size: 22pt;">
                        <p>
                            <strong>Este documento se ha generado automáticamente a través de Quiku.</strong><img
                                src="{{ $imagen }}" alt="" style="width: 100%;max-width: 30px;">
                        </p>
                    </div>
                </td>
            </tr>
        </table>
    </footer>
</body>

</html>
