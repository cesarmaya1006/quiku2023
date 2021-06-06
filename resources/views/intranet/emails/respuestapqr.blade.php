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
    <br>
    <br>
    <br>
    <table>
        <tr>
            <td>
                <div style="margin-top: 50px;">
                    <p>Bogota {{ date('Y-m-d') }}</p>
                </div>
            </td>
        </tr>
    </table>
    <br><br>
    <table>
        <tr>
            <td>
                <div style="margin-top: 50px;">
                    <p>Apreciado/Apreciada: {{ $nombre }}</p>
                </div>
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
                <p>E-mail:{{ $correo }}</p>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <table>
        <tr>
            <td>
                <p>Asunto: Respuesta a su solicitud.</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Referencia: {{ $num_radicado }}</p>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <table>
        <tr>
            <td>
                <p>Reciba un cordial saludo, </p>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <table>
        <tr>
            <td>
                <p>De manera atenta damos respuesta a la solicitud radicada en nuestro sistema de gestión de PQRs, por
                    medio del cual nos informa lo siguiente: </p>
            </td>
        </tr>
        <tr>
            <td>
                <p>{{ $hechos }}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Frente a lo anterior y a las peticiones elevadas en su solicitud a continuación nos permitimos
                    resolver cada una de estas en el orden por usted presentado:</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>{{ $peticiones }}</p>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <table>
        <tr>
            <td>
                <p>En merito de lo expuesto, </p>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                <h5>Resuleve</h5>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <table>
        <tr>
            <td>
                <p>Primero: </p>
                <p>{{ $respuestas }}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Segundo:</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Le informamos que, de conformidad con la Ley 137 de 2011, y si usted tiene alguna inconformidad con
                    la presente respuesta puede interponer recursos de reposición y/o apelación dentro de los
                    {{ $dias_recurso }}
                    dìías siguientes a la notificación de este documento. Para interponer alguno de los recursos
                    mencionados debe dirigirse a ___________________.</p>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <br>
    <table>
        <tr>
            <td>
                <p>Esperamos haber atendido satisfactoriamente su solicitud, no obstante lo anterior sea esta la
                    oportunidad para reiterarle nuestro compromiso con brindarle el mejor servicio y recordarle que
                    permanecemos a su disposición.</p>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <br>
    <table>
        <tr>
            <td class="nombres" id="nombre1" style="width: 75%;margin-top: 135px;">
                <p>Cordialmente, </p>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <br>
    <table>
        <tr>
            <td class="nombres">
                <img src="{{ $firma }}" alt="" style="width: 100%;max-width: 50px;">
            </td>
        </tr>
        <tr>
            <td>
                <p>{{ $funcionario }}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>{{ $cargo }}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>{{ $razonsocial }}</p>
            </td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <td style="font-size: 0.8em;">
                <p>Proyecto{{ $razonsocial }}</p>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <br>
    <table>
        <tr>
            <td>
                <div style=" width: 100%;text-align: center;font-weight: bold;font-size: 22pt;">
                    <p>
                        <strong>Este documento se ha generado automáticamente a través de Quiku.</strong><img
                            src="{{ $imagen }}" alt="" style="width: 100%;max-width: 70px;">
                    </p>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>
