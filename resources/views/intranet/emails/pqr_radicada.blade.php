<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @page {
            margin: 0cm 0cm;
            font-family: Arial;
        }
        body { margin: 3.5cm 2cm 2cm; }
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
            color: rgb(0, 0, 0);
            text-align: center;
            line-height: 30px;
        }
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
            color: rgb(0, 0, 0);
            text-align: center;
            line-height: 35px;
            padding-bottom: 2px;
            margin: 0cm 2cm;
            align-items: center;
            padding-top: 2%;
        }
        p { font-size: 12pt; text-align: justify; }
        table {width: 90%; margin: auto; }
        /* header */
        .page-break { page-break-after: always; }
        .logo{ width: 35%; }
        .titulo-principal{ width: 65%; text-align: center; }
        .header{ margin-top: 3%; margin-right: 5% }
        /* footer  */
        .p-azul { font-size: 13px; color: #3359fa; line-height: .5; font-style: italic }
        /* main  */
        .main { margin-top: 2%; }
        .line-height{ line-height: .4; }
        .center{ text-align: center; }
        .mb-6{ margin-bottom: 6%; }
    </style>
    <title>PQR Radicada</title>
</head>
<body>
    <header>
        <table class="header">
            <tr >
                <td class="logo">
                    <img src="{{ $imagen }}" alt="" style="width: 100%; max-width: 150px;">
                </td>
                <td class="titulo-principal">
                    <h3 style="color: #3359fa;">Sistema Quiku</h3>
                </td>
            </tr>
        </table>
        </div>
    </header>
    <footer>
        <div style="footer width: 100%;text-align: center;font-weight: bold;font-size: 0.6em;">
            <p class="p-azul">57-1-7229497</p>
            <p class="p-azul">www.mglasociados.com</p>
            <p class="p-azul">Carrera 13 # 76-12 Of. 301 y Carrera 5 # 16-14 Of. 803</p>
            <p class="p-azul">3208380622</p>
        </div>
    </footer>
    <main class="main">
        <p style="float: right;">{{ date('Y-m-d') }}</p>
        <div style="margin-top: 50px;">
            <p>Apreciado/Apreciada:</p>
            <p>{{ $nombre }}</p>
        </div>
        @if($tipo_pqr_id == 7)
            <p>Hemos recibido sus felicitaciones para con nuestra empresa y/o funcionarios.</p>
            <p>Tus felicitaciones nos motivan y llenan de alegria para seguir mejorando cada dia.</p>
            <p>A continuación podrá verificar los datos e información que han quedado resgistrados en nuestro
                sistema:</p>
        @elseif($tipo_pqr_id == 9)
            <p>Hemos recibido sus sugerencias para con nuestra empresa y/o funcionarios. </p>
            <p>Sus sugerencias nos motivan para seguir mejorando cada dia.</p>
            <p>A continuación podrá verificar los datos e información que han quedado resgistrados en nuestro
                sistema:</p>
        @else
            <p>Hemos recibido su solicitud y la atenderemos en el menor tiempo posible. A continuación podrá
                verificar los datos e información que han quedado resgistrados en
                nuestro sistema:</p>
        @endif
        <hr>
        <p class="line-height"><strong>Fecha de radicación: </strong> {{ $fecha }}</p>
        <p class="line-height"><strong>No. de identificación de su solicitud: </strong> {{ $num_radicado }}</p>
        <p class="line-height"><strong>Tipo de PQR:</strong> {{ $pqr_radicada->tipoPqr->tipo }}</p>
        <p class="line-height"><strong>Datos del peticionario:</strong> {{ $nombre }}</p>
        <p class="line-height"><strong>Tipo ID: {{ $tipo_doc }} No. ID:</strong> {{ $identificacion }}</p>
        @if($email)
            <p class="line-height"><strong>E-mail: </strong>{{ $email }}</p>
        @endif
        <hr>
        <h3 class="center mb-6">Información registrada en su PQR</h3>
        @switch($tipo_pqr_id)
            @case(1)
                <p>Lugar de adquisición del producto o servicio: {{ $pqr_radicada->adquisicion }}</p>
                <p>¿Su PQR es sobre un producto o servicio?: {{ $pqr_radicada->tipo }}</p>
                @if ($pqr_radicada->tipo == 'Servicio')
                    <p>Tipo de Servicio: {{ $pqr_radicada->servicio->servicio }}</p>
                @else
                    <p>Referencia: {{ $pqr_radicada->referencia->referencia }}</p>
                @endif
                <p>No. Factura: {{ $pqr_radicada->factura }}</p>
                <p>Fecha de factura: {{ $pqr_radicada->fecha_factura }}</p>
                <p>Tipo de servicio: {{ $pqr_radicada->servicio_id }}</p>
                <?php $num_peticion = 0; ?>
                @foreach ($pqr_radicada->peticiones as $peticion)
                    <?php $num_peticion++; ?>
                    <h5>Motivo: {{ $peticion->motivo->sub_motivo }}</h5>
                    <?php $num_hecho = 0; ?>
                    @foreach ($peticion->hechos as $hecho)
                        <?php $num_hecho++; ?>
                        <p>Hecho {{ $num_hecho }}: {{ $hecho->hecho }}</p>
                    @endforeach
                    <p>Solicitud: {{ $peticion->justificacion }}</p>
                @endforeach
            @break
            @case(2)
                <p>Lugar de adquisición del producto o servicio: {{ $pqr_radicada->adquisicion }}</p>
                <p>¿Su PQR es sobre un producto o servicio?: {{ $pqr_radicada->tipo }}</p>
                @if ($pqr_radicada->tipo == 'Servicio')
                    <p>Tipo de Servicio: {{ $pqr_radicada->servicio->servicio }}</p>
                @else
                    <p>Referencia: {{ $pqr_radicada->referencia->referencia }}</p>
                @endif
                <p>No. Factura: {{ $pqr_radicada->factura }}</p>
                <p>Fecha de factura: {{ $pqr_radicada->fecha_factura }}</p>
                <p>Tipo de servicio: {{ $pqr_radicada->servicio_id }}</p>
                <?php $num_peticion = 0; ?>
                @foreach ($pqr_radicada->peticiones as $peticion)
                    <?php $num_peticion++; ?>
                    <h5>Motivo: {{ $peticion->motivo->sub_motivo }}</h5>
                    <?php $num_hecho = 0; ?>
                    @foreach ($peticion->hechos as $hecho)
                        <?php $num_hecho++; ?>
                        <p>Hecho {{ $num_hecho }}: {{ $hecho->hecho }}</p>
                    @endforeach
                    <p>Solicitud: {{ $peticion->justificacion }}</p>
                @endforeach
            @break
            @case(3)
                <p>Lugar de adquisición del producto o servicio: {{ $pqr_radicada->adquisicion }}</p>
                <p>¿Su PQR es sobre un producto o servicio?: {{ $pqr_radicada->tipo }}</p>
                @if ($pqr_radicada->tipo == 'Servicio')
                    <p>Tipo de Servicio: {{ $pqr_radicada->servicio->servicio }}</p>
                @else
                    <p>Referencia: {{ $pqr_radicada->referencia->referencia }}</p>
                @endif
                <p>No. Factura: {{ $pqr_radicada->factura }}</p>
                <p>Fecha de factura: {{ $pqr_radicada->fecha_factura }}</p>
                <p>Tipo de servicio: {{ $pqr_radicada->servicio_id }}</p>
                <?php $num_peticion = 0; ?>
                @foreach ($pqr_radicada->peticiones as $peticion)
                    <?php $num_peticion++; ?>
                    <h5>Motivo: {{ $peticion->motivo->sub_motivo }}</h5>
                    <?php $num_hecho = 0; ?>
                    @foreach ($peticion->hechos as $hecho)
                        <?php $num_hecho++; ?>
                        <p>Hecho {{ $num_hecho }}: {{ $hecho->hecho }}</p>
                    @endforeach
                    <p>Solicitud: {{ $peticion->justificacion }}</p>
                @endforeach
            @break
            @case(4)
                <h4 class="line-height">Información registrada en sus Consultas</h4>
                <?php $num_peticion = 0; ?>
                @foreach ($pqr_radicada->peticiones as $peticion)
                    <?php $num_peticion++; ?>
                    <h5>Tipo de solicitud : {{ $peticion->consulta }}</h5>
                    <?php $num_hecho = 0; ?>
                    @foreach ($peticion->hechos as $hecho)
                        <?php $num_hecho++; ?>
                        <p>Hecho {{ $num_hecho }}: {{ $hecho->hecho }}</p>
                    @endforeach
                @endforeach
            @break
            @case(5)
                <h4 class="line-height">Información registrada en sus Solicitudes</h4>
                <?php $num_peticion = 0; ?>
                @foreach ($pqr_radicada->peticiones as $peticion)
                    <?php $num_peticion++; ?>
                    <h5>Tipo de solicitud : {{ $peticion->tiposolicitud }}</h5>
                    <p>Datos personales objeto de la solicitud: {{ $peticion->datossolicitud }}</p>
                    <p>Descripción de la solicitud: {{ $peticion->descripcionsolicitud }}</p>
                @endforeach
            @break
            @case(6)
                <h4 class="line-height">Información registrada en sus Solicitudes</h4>
                <?php $num_peticion = 0; ?>
                @foreach ($pqr_radicada->peticiones as $peticion)
                    <?php $num_peticion++; ?>
                    <h5>Tipo de irregularidad: {{ $peticion->irregularidad }}</h5>
                    <?php $num_hecho = 0; ?>
                    @foreach ($peticion->hechos as $hecho)
                        <?php $num_hecho++; ?>
                        <p>Hecho {{ $num_hecho }}: {{ $hecho->hecho }}</p>
                    @endforeach
                @endforeach
            @break
            @case(7)
                <h4 class="line-height">Felicitacion</h4>
                @foreach ($pqr_radicada->peticiones as $peticion)
                    @foreach ($peticion->hechos as $hecho)
                        <p>Hecho: {{ $hecho->hecho }}</p>
                    @endforeach
                    @if ($pqr_radicada->sede_id)
                        <p>Sede:
                            {{ $pqr_radicada->sede->nombre . '  (' . $pqr_radicada->sede->municipio->municipio . ')' }}
                        </p>
                    @endif
                    <p>Nombre de funcionario: {{ $peticion->nombre_funcionario }}</p>
                    <p>Escriba sus felicitaciones: {{ $peticion->felicitacion }}</p>
                @endforeach
            @break
            @case(8)
                <h4 class="line-height">Información registrada en sus Solicitudes</h4>
                <?php $num_peticion = 0; ?>
                @foreach ($pqr_radicada->peticiones as $peticion)
                    <?php $num_peticion++; ?>
                    <h5>Petición : {{ $peticion->peticion }}</h5>
                    <p>Identifique el documento o información requerida: {{ $peticion->indentifiquedocinfo }}</p>
                    <p>Justificaciones de su solicitud: {{ $peticion->justificacion }}</p>
                @endforeach
            @break
            @case(9)
                <h4 class="line-height">Sugerencia</h4>
                @foreach ($pqr_radicada->peticiones as $peticion)
                    @foreach ($peticion->hechos as $hecho)
                        <p>Hecho: {{ $hecho->hecho }}</p>
                    @endforeach
                    <p><strong>Sugerencia:</strong> {{ $peticion->sugerencia }}</p>
                @endforeach
            @break
        @endswitch
        @if($tipo_pqr_id == 1 || $tipo_pqr_id == 2 || $tipo_pqr_id == 3 || $tipo_pqr_id == 4 || $tipo_pqr_id == 5 || $tipo_pqr_id == 6 || $tipo_pqr_id == 8 || $tipo_pqr_id == 9)
            <h4>Anexos</h4>
            <ul>
                <?php $num_anexos = 0; ?>
                @foreach ($pqr_radicada->peticiones as $peticion)
                    @if ($peticion->anexos->count() > 0)
                        <?php $num_anexos = 1; ?>
                        @foreach ($peticion->anexos as $anexo)
                            <li>
                                <a href="{{ asset('documentos/pqr/' . $anexo->url) }}" target="_blank"
                                    rel="noopener noreferrer">{{ $anexo->titulo }}</a>
                            </li>
                        @endforeach
                    @endif
                @endforeach
            </ul>
            @if ($num_anexos == 1)
                <p> <strong>Nota : La relación de anexos anterior no implica que se ha verificado su
                        contenido.</strong></p>
            @endif
                <p>En cualquier momento usted podrá consultar el estado y las respuestas a su solicitud ingresando a
                    nuestro sistema <a href="{{ route('index') }}" target="_blank"
                        rel="noopener noreferrer">Quiku</a>
                    opción listado PQR</p>
        @endif
    </main> 
</body>
</html>
