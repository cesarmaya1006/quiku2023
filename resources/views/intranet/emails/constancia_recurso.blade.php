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
        p{
            line-height: 15px;
        }

    </style>
    <title>Constancia Recurso</title>
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
                    <div>
                        <p>Apreciado/Apreciada: {{ $nombre }}</p>
                    </div>
                </td>
                <td>
                    <div>
                        <p>Fecha de expedición: {{ Date('Y-m-d H:i:s') }}</p>
                    </div>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <p>Hemos recibido sus recursos y los atenderemos en el menor tiempo posible. A continuación podrá
                        verificar los datos e información que han quedado resgistrados en nuestro sistema:</p>
                    <p>Fecha de radicación: {{ $recurso->fecha_radicacion }}</p>
                    <p>No. de identificación de su solicitud: {{ $num_radicado }}</p>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <h4>Datos del peticionario</h4>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p>Nombres:{{ $nombre }}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Tipo ID: {{ $tipo_doc }}</p>
                </td>
                <td>
                    <p>No. ID: {{ $identificacion }}</p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p>E-mail:{{ $email }}</p>
                </td>
            </tr>
        </table>
        <hr>
        <table>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td>Tipo de Recurso</td>
                            <td>{{ $recurso->tiporeposicion->tipo }}</td>
                        </tr>
                        <tr>
                            <td>Recurso</td>
                            <td>{{ $recurso->recurso }}</td>
                        </tr>
                    </table>
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
                        @foreach ($recurso->documentos as $documento)
                            <li>
                                <a href="{{ asset('documentos/pqr/' . $documento->url) }}" target="_blank"
                                    rel="noopener noreferrer">{{ $documento->titulo }}</a>
                            </li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            @if ($recurso->documentos->count() > 0)
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
