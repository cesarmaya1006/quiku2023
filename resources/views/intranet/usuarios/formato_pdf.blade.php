<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro PQR</title>
</head>

<body>
    <header>
        <h3>Registro de PQR</h3>
    </header>
    <section class="section-one">
        <div class="datos-peti">
            <h4>Datos peticionarios</h4>
            <ul>
                <li>Nombre: {{ $nombre }}</li>
                <li>Correo: {{ $correo }}</li>
                <li>Tel&eacute;fono: {{ $telefono }}</li>
                <li>Tipo de Documento: {{ $tipo_doc }}</li>
                <li>N&uacute;mero de Documento: {{ $identificacion }}</li>
            </ul>
        </div>
    </section>
    <hr>
    <section>
        <div class="datos-form">
            <h4>Datos del formulario</h4>
            <ul>
                <li>Fecha: {{ $fecha }}</li>
                <li>N&uacute;mero de radicado: {{ $num_radicado }}</li>
            </ul>
        </div>
    </section>
    <hr>
    <section>
        <h4>Detalles</h4>
        <div>{!! $contenido !!}</div>
    </section>
    <hr>
    <footer>
        <p>Texto de seguimiento: Para cualquier observación, seguimiento o tramite sobre su PQR utilice el número
            de radicado {{ $num_radicado }}</p>
    </footer>
</body>

</html>

<style>
    body{}
    .section-one {
        display: flex;
    }
    .datos-peti{
        width: 50%;
    }
    .datos-form{
        width: 50%;
    }
</style>