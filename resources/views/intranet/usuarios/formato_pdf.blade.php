<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <div>Registro de pqr</div>
        <div>
            <div>Datos peticionarios</div>
            <div>
                <ul>
                    <li>Nombre: {{ $nombre }}</li>
                    <li>Correo: {{ $correo }}</li>
                    <li>Tel&eacute;fono: {{ $telefono }}</li>
                    <li>Tipo de Documento: {{ $tipo_doc }}</li>
                    <li>N&uacute;mero de Documento: {{ $identificacion }}</li>
                </ul>
            </div>
        </div>
        <hr>
        <div>
            <div>Datos del formulario</div>
            <div>
                <ul>
                    <li>Fecha: {{ $fecha }}</li>
                    <li>N&uacute;mero de radicado: {{ $num_radicado }}</li>
                    <li>Contenido: {{ $contenido }}</li>
                </ul>
            </div>
        </div>
        <hr>
        <div>
            <div>Texto de seguimiento: Para cualquier observación, seguimiento o tramite sobre su PQR utilice el número
                de radicado {{ $num_radicado }}</div>
        </div>
    </div>
</body>

</html>
