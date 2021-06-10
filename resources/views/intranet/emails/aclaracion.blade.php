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
    <title>Aclaración</title>
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
                    <p>E-mail:{{ $email }}</p>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <table>
            <tr>
                <td>
                    <p>Asunto: Solicitud de aclaración o complementación</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Referencia: radicado PQR</p>
                    <p>No. de identificación de su solicitud: {{ $num_radicado }}</p>
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
                    <p>Hemos recibido su solicitud identificada con el número de la referencia. De conformidad con el
                        artículo 17 y 19 de la Ley 1755 de 2015, solicitamos respetuosamente aclare y/o complemente su
                        petición en los siguientes puntos:</p>
                </td>
            </tr>
            <tr>
                <td>
                    <h5>Aclaración</h5>
                    <p>Tipo: {{ $aclaracion->tipo_solicitud }}</p>
                    <p>{{ $aclaracion->aclaracion }}</p>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <table>
            <tr>
                <td>
                    <p>Para aclarar o complementar su solicitud, por favor cargue su respuesta en la opción
                        {{ route('index') }}. Una vez lo haya hecho, se reactivará la gestión y el plazo de
                        respuesta.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>La aclaración y/o complementación solicitada se hace necesaria para adoptar una decisión de
                        fondo. De
                        conformidad con lo previsto en la Ley 1755 de 2015, usted cuenta con un plazo máximo de un (1)
                        mes
                        para responder a este requerimiento. De lo contrario, se entenderá que ha desistido de su
                        solicitud
                        y ésta se archivará.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>En cualquier momento usted podrá consultar el estado y las respuestas a su solicitud a través de
                        la
                        opción {{ route('index') }}</p>
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
                    <img src="{{ $firma }}" alt="" style="width: 100%;max-width: 150px;">
                </td>
            </tr>
            <tr>
                <td>
                    <p>{{ $aclaracion->peticion->empleado->nombre1 . ' ' . $aclaracion->peticion->empleado->apellido1 }}
                    </p>
                    <p>{{ $aclaracion->peticion->empleado->cargo->cargo }}</p>
                    <p>Empresa 1</p>
                    <br><br>
                    <p><strong style="font-size: 0.8em;">Proyecto
                            {{ $aclaracion->peticion->empleado->nombre1 . ' ' . $aclaracion->peticion->empleado->apellido1 }}</strong>
                    </p>
                </td>
            </tr>
        </table>
    </main>
</body>

</html>
