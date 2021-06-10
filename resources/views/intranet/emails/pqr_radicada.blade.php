<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        p {
            font-size: 12pt;
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
                </td>
                <td style="width: 75%;">
                    <div style=" width: 100%;text-align: center;font-weight: bold;font-size: 22pt;">
                        <h3>Sistema Quiku</h3>
                    </div>
                </td>
            </tr>
        </table>
    </header>

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
    <main>
        <table>
            <tr>
                <td style="width: 75%;margin-top: 135px;">
                    <div style="margin-top: 50px;">
                        <p>Apreciado/Apreciada: {{ $nombre }}</p>
                    </div>
                </td>
                <td style="width: 25%;margin-top: 135px;text-align: center;">
                    <div style="margin-top: 50px;">
                        <p>{{ date('Y-m-d') }}</p>
                    </div>
                </td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td style="width: 75%;margin-top: 135px;">
                    <div style="margin-top: 50px;">
                        <p>Hemos recibido su solicitud y la atenderemos en el menor tiempo posible.</p>
                        <p>A continuación podrá verificar los datos e información que han quedado resgistrados en
                            nuestro sistema:</p>
                    </div>
                </td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td style="width: 75%;margin-top: 135px;">
                    <p>Fecha de radicación: {{ $fecha }}</p>
                    <p>No. de identificación de su solicitud: {{ $num_radicado }}</p>
                </td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td colspan="6" style="text-align: center;">
                    <h4>Datos del peticionario</h4>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p>Nombres: {{ $nombre }}</p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p>Tipo ID: {{ $tipo_doc }}</p>
                </td>
                <td colspan="2">
                    <p>No. ID: {{ $identificacion }}</p>
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <p>E-mail: {{ $email }}</p>
                </td>
            </tr>
        </table>
        <br>
        <hr>
        <br>
        <table>
            <tr>
                <td>
                    @switch($tipo_pqr_id)
                        @case(1)
                            <h4>Peticion</h4>
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
                            @foreach ($pqr_radicada->peticiones as $peticion)
                                <h5>Motivo: {{ $peticion->motivo->sub_motivo }}</h5>
                                @foreach ($peticion->hechos as $hecho)
                                    <p>Hecho: {{ $hecho->hecho }}</p>
                                @endforeach
                                <p>Justificación: {{ $peticion->justificacion }}</p>
                            @endforeach
                        @break
                        @case(2)
                            <h4>Queja</h4>
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
                            @foreach ($pqr_radicada->peticiones as $peticion)
                                <h5>Motivo: {{ $peticion->motivo->sub_motivo }}</h5>
                                @foreach ($peticion->hechos as $hecho)
                                    <p>Hecho: {{ $hecho->hecho }}</p>
                                @endforeach
                                <p>Justificación: {{ $peticion->justificacion }}</p>
                            @endforeach
                        @break
                        @default
                            <h4>Reclamo</h4>
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
                            @foreach ($pqr_radicada->peticiones as $peticion)
                                <h5>Motivo: {{ $peticion->motivo->sub_motivo }}</h5>
                                @foreach ($peticion->hechos as $hecho)
                                    <p>Hecho: {{ $hecho->hecho }}</p>
                                @endforeach
                                <p>Justificación: {{ $peticion->justificacion }}</p>
                            @endforeach
                    @endswitch
                </td>
            </tr>
        </table>
        <br>
        <table>
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
        </table>
    </main>
</body>

</html>
