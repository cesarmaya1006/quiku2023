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
    <title>Prorroga</title>
</head>

<body>
    <header>
        <table>
            <tr>
                <td style="width: 25%;text-align: center;">
                    <img src="{{ $imagen }}" alt="" style="width: 100%;max-width: 70px;">
                </td>
                <td style="width: 75%;">
                    <div style=" width: 100%;text-align: center;font-weight: bold;font-size: 16pt;">
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
                    <div style="margin-top: 50px;">
                        <p>Bogota {{ date('Y-m-d') }}</p>
                    </div>
                </td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td colspan="2">
                    <div style="margin-top: 50px;">
                        <p>Apreciado/Apreciada: {{ $nombre }}</p>
                    </div>
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
                    <p>E-mail: {{ $email }}</p>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <p>Asunto: Ampliación de plazo de respuesta.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Referencia: {{ $num_radicado }}</p>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <p>Reciba un cordial saludo, </p>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <p>De conformidad con el parágrafo del artículo 14 de la Ley 1755 de 2015, y en aras de responder de
                        fondo y de manera completa a su solicitud, requerimos adicionar el plazo máximo de respuesta en
                        {{ $cant_dias }} días hábiles. </p>
                        <p>Esta ampliación del plazo de la respuesta se genera por los siguientes motivos:</p>
                        <p>{{ $pqr->prorroga_pdf }}</p>
                        <p>Agradecemos su comprensión y reiteramos nuestro compromiso de emitir una respuesta de fondo a su
                            solicitud lo antes posible. </p>
                        <p>En cualquier momento usted podrá consultar el estado y las respuestas a su solicitud ingresando a
                                nuestro sistema <a href="{{ route('index') }}" target="_blank"
                                    rel="noopener noreferrer">Quiku</a>
                                opción listado PQR</p>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <p>Cordialmente, </p>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <img src="{{ $firma }}" alt="" style="width: 100%;max-width: 100px;">
                </td>
            </tr>
            <tr>
                <td>
                    <p>{{ $empleado->nombre1 . ' ' . $empleado->apellido1 }}</p>
                    <p>{{ $empleado->cargo->cargo }}</p>
                    <p>Empresa 1</p>
                    <br><br>
                    <p><strong style="font-size: 0.8em;">Proyecto
                            {{ $empleado->nombre1 . ' ' . $empleado->apellido1 }}</strong></p>
                </td>
            </tr>
        </table>
    </main>
</body>

</html>
