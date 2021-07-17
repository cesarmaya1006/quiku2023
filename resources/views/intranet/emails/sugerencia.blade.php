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
    <title>Sugerencia Radicada</title>
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
                        <p>{{ $fecha }}</p>
                    </div>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <table>
            <tr>
                <td style="width: 75%;margin-top: 135px;">
                    <p>Hemos recibido sus sugerencias para con nuestra empresa y/o funcionarios. </p>
                    <p>Sus sugerencias nos motivan para seguir mejorando cada dia.</p>
                    <p>A continuación podrá verificar los datos e información que han quedado resgistrados en nuestro
                        sistema:</p>
                </td>
            </tr>
        </table>
        <br>
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
                <td colspan="3">
                    <p>Nombres:{{ $nombre }}</p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p>Tipo ID: {{ $tipo_doc }}</p>
                </td>
                <td colspan="2">
                    <p>No. ID: {{ $identificacion }}</p>
                </td>
                <td colspan="2">
                    <p>E-mail:{{ $email }}</p>
                </td>
            </tr>
        </table>
        <br>
        <hr>
        <br>
        <table>
            <tr>
                <td>
                    <h4>Sugerencia</h4>
                    @foreach ($sugerencia->peticiones as $peticion)
                        @foreach ($peticion->hechos as $hecho)
                            <p>Hecho: {{ $hecho->hecho }}
                            <p>
                        @endforeach
                    @endforeach
                    <p><strong>Sugerencia:</strong> {{ $sugerencia->sugerencia }}</p>
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
                        @foreach ($sugerencia->peticiones as $peticion)
                            @if ($peticion->anexos->count() > 0)
                                @foreach ($peticion->anexos as $documento)
                                    <li>
                                        <a href="{{ asset('documentos/pqr/' . $documento->url) }}" target="_blank"
                                            rel="noopener noreferrer">{{ $documento->titulo }}</a>
                                    </li>
                                @endforeach
                            @endif
                        @endforeach
                    </ul>
                </td>
            </tr>
            @foreach ($sugerencia->peticiones as $peticion)
                @if ($peticion->anexos->count() > 0)
                    <tr>
                        <td>
                            <p> <strong>Nota : La relación de anexos anterior no implica que se ha verificado su
                                    contenido.</strong></p>
                        </td>
                    </tr>
                @endif
            @endforeach
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
