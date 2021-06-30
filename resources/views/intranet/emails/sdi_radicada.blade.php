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
                <td>
                    <div>
                        <p>Hemos recibido su solicitud y la atenderemos en el menor tiempo posible.A continuación podrá
                            verificar los datos e información que han quedado resgistrados en
                            nuestro sistema:</p>
                    </div>
                </td>
            </tr>
        </table>
        <hr>
        <table>
            <tr>
                <td>
                    <p><strong>Fecha de radicación: </strong> {{ $fecha }}</p>
                    <p><strong>No. de identificación de su solicitud: </strong> {{ $num_radicado }}</p>
                    <p><strong>Tipo de PQR:</strong> Solicitud de documentos o información</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Datos del peticionario: {{ $nombre }}</p>
                    <p>Tipo ID: {{ $tipo_doc }} No. ID: {{ $identificacion }}</p>
                    <p>E-mail: {{ $email }}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <hr>
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Información registrada en sus Solicitudes</h4>
                    <?php $num_peticion = 0; ?>
                    @foreach ($pqr_radicada->peticiones as $peticion)
                        <?php $num_peticion++; ?>
                        <h5>Petición : {{ $peticion->peticion }}</h5>
                        <p>Identifique el documento o información requerida: {{ $peticion->indentifiquedocinfo }}</p>
                        <p>Justificaciones de su solicitud: {{ $peticion->justificacion }}</p>
                    @endforeach
                </td>
            </tr>
        </table>
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
                            @if ($peticion->documentos->count() > 0)
                                <?php $num_anexos = 1; ?>
                                @foreach ($peticion->documentos as $anexo)
                                    <li>
                                        <a href="{{ asset('documentos/solicituddocinfo/' . $anexo->url) }}" target="_blank"
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
