<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respuesta</title>
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
        .mt-3{ margin-top: 3%; }
        .firma{ max-width: 100px; max-height: 80px; margin-top: 3%; }

    </style>

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

    <main>
        <div style="margin-top: 15px;">
            <p>Honorable</p>
            <p>{{$tutela->juzgado}}</p>
            <p>E. S. D.</p>
        </div>
        <div>
            <p>Ref. Acción de tutela de: 
                @foreach ($tutela->accions as $key => $accion)
                @if($key < 2)
                    {{$accion->nombres_accion}} {{$accion->apellidos_accion}}
                @endif
            @endforeach 
            contra (accionado - si son más de dos coger dos y agregar “y otros”)</p>
            <p>Radicación N° {{$tutela->radicado}}</p>
            <p>Respetado Señor Juez (a): {{$tutela->nombre_juez}}</p>
            <p>
                (nombre apoderado accionado – Debe ser tomado de una tabla paramétrica en el momento de aprobación), mayor de edad, con domicilio en la Ciudad de Bogotá, D.C., identificado con la Cédula de Ciudadanía N° 1.018.417.398 de Bogotá D. C., Abogado en ejercicio, titular de la Tarjeta Profesional N° 249.746 del Consejo Superior de la Judicatura, en mi calidad de Apoderado de la Parte demandada, esto es, de la sociedad MEDIMÁS EPS SAS, según poder que me fuera concedido por el señor LEONARDO LÓPEZ AMAYA quien actúa Apoderado General de MEDIMÁS EPS SAS (Campo dentro de la misma tabla paramétrica), ante Usted acudo y en ejercicio del Poder conferido, para dar contestación con la presente, a la demanda instaurada dentro del sub lite, solicitándole desde ya a su Señoría desatienda las súplicas de la demandada, formuladas a través de dicha Acción.
            </p>
        </div>
        <div>
            <h4 style="text-align: center;">I.  PRONUNCIAMIENTO FRENTE A LOS HECHOS</h4>
            <ol>
                @foreach($tutela->hechos as $key => $hecho)
                <li style="list-style-type: upper-roman;">
                    <p style="text-transform: capitalize;"> {{$hecho->hecho}}</p>
                    <h4>Respuesta</h4>
                    <p> {!! $hecho->respuesta->respuesta !!}</p>
                </li>
                @endforeach
            </ol>
        </div>
        <div>
            <h4 style="text-align: center;">II.  HECHOS DE LA DEFENSA</h4>
            @foreach($resuelves as $key => $resuelve)
                <p style="text-transform: capitalize;"><strong>{{$resuelve->numeracion->ordinal}} :</strong></p>
                <p>{!! $resuelve->resuelve !!}</p>
            @endforeach
        </div>
        <div>
            <h4 style="text-align: center;">III.  PRONUNCIAMIENTO FRENTE A LAS PRETENSIONES</h4>
            @foreach($tutela->respuestasPretensiones as $key => $respuesta)
                @foreach($respuesta->relacion as $key => $relacion)
                    <p style="text-transform: capitalize;">{{$relacion->pretension->pretension}}</p>
                @endforeach
                <h4>Respuesta</h4>
                <p> {!! $respuesta->respuesta !!}</p>
            @endforeach
        </div>
        <div>
            <h4 style="text-align: center;">IV.  PRUEBAS APORTADAS CON LA CONTESTACIÓN</h4>
            <table class="table table-light"  style="font-size: 0.8em;" >
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tutela->hechos as $key => $hecho)
                        @foreach ($hecho->respuesta->documentos as $key => $anexo)
                            <tr>
                                <td class="text-justify">{{ $anexo->titulo }}
                                </td>
                                <td class="text-justify">{{ $anexo->descripcion }}
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                    @foreach ($tutela->respuestasPretensiones as $key => $respuesta)
                        @foreach ($respuesta->documentos as $key => $anexo)
                            <tr>
                                <td class="text-justify">{{ $anexo->titulo }}
                                </td>
                                <td class="text-justify">{{ $anexo->descripcion }}
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <h4 style="text-align: center;">V.  ANEXOS</h4>
            <p style="text-transform: capitalize;">Se anexa con la presente contestación la documental ya referida en el acápite de las pruebas allegadas, y, en el entendido por demás que el Poder que me fuere conferido ya obra al plenario.</p>
        </div>
        <div>
            <h4 style="text-align: center;">VI.  NOTIFICACIONES</h4>
            <p style="text-transform: capitalize;">La dirección de (nombre de cliente) en la (dirección cliente), o al correo electrónico (correo electrónico cliente)</p>
        </div>
        <div>
            <p>Del Señor (a) Juez,</p>
        </div>
        <div>
            <p>Atentamente,</p>
        </div>
        <div>
            @php
                $aprueba = $tutela->asignaciontareas->where('tareas_id', 4)[3];
            @endphp
            @if($firma && $firma != '') 
                <img src="{{ $firma }}" class="" alt="firma">
            @else
                <p style="font-style: italic;">* Espacio para estanpar firma electrónica</p>
            @endif
            <p style="font-weight: bold;">{{ $aprueba->empleado->nombre1 . ' ' .$aprueba->empleado->nombre2 . ' ' . $aprueba->empleado->apellido1 . ' ' . $aprueba->empleado->apellido2}}</p>
            <p>{{ $aprueba->empleado->cargo->cargo}}</p>
        </div>
    </main>
    <footer>
        <div style="footer width: 100%;text-align: center;font-weight: bold;font-size: 0.6em;">
            <p class="p-azul">57-1-7229497</p>
            <p class="p-azul">www.mglasociados.com</p>
            <p class="p-azul">Carrera 13 # 76-12 Of. 301 y Carrera 5 # 16-14 Of. 803</p>
            <p class="p-azul">3208380622</p>
        </div>
    </footer>
</body>

</html>
