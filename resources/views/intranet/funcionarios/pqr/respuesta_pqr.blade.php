<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respuesta</title>
    <style>
        @page {
            margin: 1cm 0cm;
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
            bottom: -1.3cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            color: rgb(0, 0, 0);
            text-align: center;
            line-height: 35px;
            padding-bottom: 5px;
        }

        p {
            line-height: 15px;
            text-align: justify;
        }

        table {
            width: 90%;
            margin: auto;
        }

    </style>

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

    <main>
        <table>
            <tr>
                <td>
                    <div style="margin-top: 15px;">
                        <p>Señor(a)</p>
                        {{-- Bloque para peticionario persona natural --}}
                        @if($pqr->persona_id)
                            <p><strong>{{ $pqr->persona->nombre1 . ' ' . $pqr->persona->nombre2 . ' ' . $pqr->persona->apellido1 . ' ' . $pqr->persona->apellido2 }}</strong></p>
                            <p>{{ $pqr->persona->tipos_docu->tipo_id }} No. {{ $pqr->persona->identificacion }}</p>
                            @if($pqr->persona->email)
                                <p>E-mail: {{ $pqr->persona->email }} </p>
                            @else
                                <p>Dirección: {{ $pqr->persona->direccion }}</p>
                            @endif 
                        {{-- Bloque para peticionario persona jurídica
                        @elseif($pqr->empresa_id)
                            {{-- <p><strong>{{ $pqr->persona->nombre1 . ' ' . $pqr->persona->nombre2 . ' ' . $pqr->persona->apellido1 . ' ' . $pqr->persona->apellido2 }}</strong></p>
                            <p>{{ $tipo_doc }} No. {{ $identificacion }}</p>
                            @if($email)
                                <p>E-mail: {{ $email }} </p>
                            @else
                                <p>Dirección: {{ $email }}</p>
                            @endif --}}
                        @endif
                    </div>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <p>Referencia: {{ $pqr->num_radicado }}</p>
                    <p>Asunto: Respuesta a su petición.</p>
                </td>
            </tr>
            <tr>
                <td>
                    @if($pqr->persona_id)
                        <p>Respetado(a) señor(a) {{ $pqr->persona->nombre1 . ' ' . $pqr->persona->nombre2 . ' ' . $pqr->persona->apellido1 . ' ' . $pqr->persona->apellido2 }} </p>
                    @elseif($pqr->empresa_id)
                        <p>Respetado(a) señor(a) {{ $pqr->persona->nombre1 . ' ' . $pqr->persona->nombre2 . ' ' . $pqr->persona->apellido1 . ' ' . $pqr->persona->apellido2 }} </p>
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    <p>En atención a su comunicación del {{ $pqr->fecha_radicado}}, mediante la cual nos formula la PQR {{ $pqr->radicado}}, nos permitimos responder sus solicitudes en el mismo orden en el que fueron formuladas.</p>
                </td>
            </tr>
        </table>
        <table>
            @foreach($pqr->peticiones as $key => $peticion)
            <tr>
                <td>
                    @if($peticion->justificacion)
                        <p><strong>Solicitud {{$key + 1}}: </strong> "{{ $peticion->justificacion }}"</p>
                    @elseif($peticion->descripcionsolicitud)
                        <p><strong>Solicitud {{$key + 1}}: </strong> "{{ $peticion->descripcionsolicitud }}"</p>
                    @elseif($peticion->consulta)
                        <p><strong>Solicitud {{$key + 1}}: </strong> "{{ $peticion->consulta }}"</p>
                    @elseif($peticion->irregularidad)
                        <p><strong>Solicitud {{$key + 1}}: </strong> "{{ $peticion->irregularidad }}"</p>
                    @endif
                    <p>Respuesta:</p>
                    <p>{!! $peticion->respuesta->respuesta !!}</p>
                </td>
            </tr>
            @endforeach
            <tr>
                <td>En mérito de lo expuesto,</td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <h4 style="text-align: center;">RESUELVE</h4>
                    @foreach($resuelves as $key => $resuelve)
                        <p style="text-transform: capitalize;"><strong>{{$resuelve->numeracion->ordinal}} :</strong></p>
                        <p>{!! $resuelve->resuelve !!}</p>
                    @endforeach
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <p>Cordialmente,</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Firma Digital</p>
                    @php
                        $aprueba = $pqr->asignaciontareas->where('tareas_id', 4)[3];
                    @endphp
                    {{-- @if($aprueba->empleado->url)
                        <img src="{{ asset('documentos/usuarios/' . $aprueba->empleado->url) }}" class="" alt="...">
                    @endif --}}
                    <p>{{ $aprueba->empleado->nombre1 . ' ' .$aprueba->empleado->nombre2 . ' ' . $aprueba->empleado->apellido1 . ' ' . $aprueba->empleado->apellido2}}</p>
                    <p>{{ $aprueba->empleado->cargo->cargo}}</p>
                </td>
            </tr>
            <tr>
                <td>
                    @php
                        $tareas = $pqr->asignaciontareas;
                    @endphp
                    @foreach($tareas as $key => $tarea)
                        @if($tarea->tareas_id == 2)    
                            <p>Proyectó: {{$tarea->empleado->nombre1 . ' ' . $tarea->empleado->nombre2 . ' ' . $tarea->empleado->apellido1 . ' ' .$tarea->empleado->apellido2}}</p>
                        @elseif($tarea->tareas_id == 3)
                            <p>Revisó: {{$tarea->empleado->nombre1 . ' ' . $tarea->empleado->nombre2 . ' ' . $tarea->empleado->apellido1 . ' ' .$tarea->empleado->apellido2}}</p>
                        @elseif($tarea->tareas_id == 4)
                            <p>Aprovó: {{$tarea->empleado->nombre1 . ' ' . $tarea->empleado->nombre2 . ' ' . $tarea->empleado->apellido1 . ' ' .$tarea->empleado->apellido2}}</p>
                        @endif
                    @endforeach
                </td>
            </tr>
        </table>
    </main>
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
</body>

</html>
