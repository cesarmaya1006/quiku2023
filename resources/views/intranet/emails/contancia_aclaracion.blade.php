<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
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
            font-size: 10pt;
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

        p {
            line-height: 15px;
            text-align: justify;
        }

    </style>
    <title>Constancia Aclaración</title>
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
                    <div style=" width: 100%;text-align: center;font-weight: bold;font-size: 0.8em;">
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
                    <p style="float: right;"> Bogotá, {{ date('Y-m-d') }}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="margin-top: 15px;">
                        <p>Apreciado/Apreciada:</p>
                        <p><strong>{{ $nombre }}</strong></p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <hr>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Hemos recibido la aclaración y/o complementación a su solicitud. Daremos una respuesta en el
                        menor tiempo posible. A continuación podrá verificar los datos e información que han quedado
                        registrados en nuestro sistema.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <hr>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Fecha de radicación: {{ $aclaracion->peticion->pqr->fecha_radicado }}</p>
                    <p>No. de identificación de su solicitud: {{ $num_radicado }}</p>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="text-align: center;">
                    <h4>Datos del peticionario</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Nombres:{{ $nombre }}</p>
                    <p>Tipo ID: {{ $tipo_doc }} No. ID: {{ $identificacion }}</p>
                    <p>E-mail:{{ $email }}</p>
                </td>
            </tr>
        </table>
        <hr>
        <table>
            <tr>
                <td colspan="5">
                    Aclaración
                </td>
            </tr>
            <tr>
                <td>Fecha</td>
                <td>Aclaración</td>
                <td>Solicitud</td>
                <td>Fecha Respuesta</td>
                <td>Respuesta</td>
            </tr>
            <tr>
                <td style="font-size: 0.8em;">{{ $aclaracion->fecha }}</td>
                <td style="font-size: 0.8em;">{{ $aclaracion->aclaracion }}</td>
                <td style="font-size: 0.8em;">{{ $aclaracion->tipo_solicitud }}</td>
                <td style="font-size: 0.8em;">{{ $aclaracion->fecha_respuesta }}</td>
                <td style="font-size: 0.8em;">{{ $aclaracion->respuesta }}</td>
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
                        @foreach ($aclaracion->anexos as $anexo)
                            <li>
                                <a href="{{ asset('documentos/pqr/' . $anexo->url) }}" target="_blank"
                                    rel="noopener noreferrer">{{ $anexo->titulo }}</a>
                            </li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            @if ($aclaracion->anexos->count() > 0)
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
