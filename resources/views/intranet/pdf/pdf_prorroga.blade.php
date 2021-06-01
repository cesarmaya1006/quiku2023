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

    </style>
    <title>PQR Radicada</title>
</head>

<body>
    <table>
        <tr>
            <td style="width: 25%;text-align: center;">
                <img src="{{ $imagen }}" alt="" style="width: 100%;max-width: 100px;">
            </td>
            <td style="width: 75%;">
                <div style=" width: 100%;text-align: center;font-weight: bold;font-size: 22pt;">
                    <h3>Sistema Quiku</h3>
                </div>
            </td>
        </tr>
    </table>
    <br><br>
    <table>
        <tr>
            <td>{{ $apreciado }}:</td>
            <td>
                <p><strong>{{ $nombre }}</strong></p>
            </td>
        </tr>
        <tr>
            <td>{{ $tipo_docu . ': ' . $identificacion }}</td>
            <td>{{ $representante }}</td>
            <td>{{ $empresa }}</td>
        </tr>
        <tr>
            <td>{{ $email }}</td>
        </tr>
    </table>
    <br><br>
    <table>
        <tr>
            <td>
                <p>Reciba un cordial saludo,</p>
            </td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <td>
                <p>De conformidad con el parágrafo del artículo 14 de la Ley 1755 de 2015, y en aras de responder de
                    fondo y de manera completa a su solicitud, requerimos adicionar el plazo máximo de respuesta en
                    (cant. Días prórroga) días hábiles.</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Esta ampliación del plazo de la respuesta se genera por los siguientes motivos:</p>
            </td>
        </tr>
    </table>

    <br>
    <table>
        <tr>
            <td>
                <ul>
                    {{ $motivos }}
                </ul>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <br>
    <br>
    <br>
    <table>
        <tr>
            <td>
                <p>Agradecemos su comprensión y reiteramos nuestro compromiso de emitir una respuesta de fondo a su
                    solicitud lo antes posible. </p>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <table>
        <tr>
            <td>
                <p>En cualquier momento usted podrá consultar el estado y las respuestas a su solicitud a través de la
                    opción _____________________</p>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <br>
    <table>
        <tr>
            <td>
                <p>Cordialmente,</p>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <br>
    <table>
        <tr>
            <td>
                <img src="{{ $imagen }}" alt="" style="width: 100%;max-width: 80px;;height: auto;">
            </td>
        </tr>
        <tr>
            <td>
                <p><strong>{{ $funcionario }}</strong></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><strong>{{ $cargo }}</strong></p>
            </td>
        </tr>
        <tr>
            <td>
                <p><strong>{{ $empresaFuncionario }}</strong></p>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <table>
        <tr>
            <td>
                <p style="font-size: 9pt;">Proyectó: <strong>{{ $funcionario_activo }}</strong></p>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <br>
    <table>
        <tr>
            <td>
                <div style=" width: 100%;text-align: center;font-weight: bold;font-size: 10pt;">
                    <p>
                        <strong>Este documento se ha generado automáticamente a través de Quiku.</strong><img
                            src="{{ $imagen }}" alt="" style="width: 100%;max-width: 30px;">
                    </p>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>
