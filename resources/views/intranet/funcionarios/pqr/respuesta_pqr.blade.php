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
    <footer>
        <div style="footer width: 100%;text-align: center;font-weight: bold;font-size: 0.6em;">
            <p class="p-azul">57-1-7229497</p>
            <p class="p-azul">www.mglasociados.com</p>
            <p class="p-azul">Carrera 13 # 76-12 Of. 301 y Carrera 5 # 16-14 Of. 803</p>
            <p class="p-azul">3208380622</p>
        </div>
    </footer>
    <main>
        <div style="margin-top: 15px;">
            <p>Señor(a)</p>
            {{-- Bloque para peticionario persona natural --}}
            @if($pqr->persona_id)
                <p class="line-height"><strong>{{ $pqr->persona->nombre1 . ' ' . $pqr->persona->nombre2 . ' ' . $pqr->persona->apellido1 . ' ' . $pqr->persona->apellido2 }}</strong></p>
                <p class="line-height">{{ $pqr->persona->tipos_docu->tipo_id }} No. {{ $pqr->persona->identificacion }}</p>
                @if($pqr->persona->email)
                    <p class="line-height">E-mail: {{ $pqr->persona->email }} </p>
                @else
                    <p class="line-height">Dirección: {{ $pqr->persona->direccion }}</p>
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
        <div>
            <p class="mt-3">Referencia: {{ $pqr->num_radicado }}</p>
            <p>Asunto: Respuesta a su petición.</p>
        </div>
        <div>
            @if($pqr->persona_id)
                <p>Respetado(a) señor(a) {{ $pqr->persona->nombre1 . ' ' . $pqr->persona->nombre2 . ' ' . $pqr->persona->apellido1 . ' ' . $pqr->persona->apellido2 }} </p>
            @elseif($pqr->empresa_id)
                <p>Respetado(a) señor(a) {{ $pqr->persona->nombre1 . ' ' . $pqr->persona->nombre2 . ' ' . $pqr->persona->apellido1 . ' ' . $pqr->persona->apellido2 }} </p>
            @endif
            <p>En atención a su comunicación del {{ $pqr->fecha_radicado}}, mediante la cual nos formula la PQR {{ $pqr->radicado}}, nos permitimos responder sus solicitudes en el mismo orden en el que fueron formuladas.</p>
        </div>
        @foreach($pqr->peticiones as $key => $peticion)
            <div>
                @if($peticion->justificacion)
                    <p><strong>Solicitud {{$key + 1}}: </strong> "{{ $peticion->justificacion }}"</p>
                @elseif($peticion->descripcionsolicitud)
                    <p><strong>Solicitud {{$key + 1}}: </strong> "{{ $peticion->descripcionsolicitud }}"</p>
                @elseif($peticion->consulta)
                    <p><strong>Solicitud {{$key + 1}}: </strong> "{{ $peticion->consulta }}"</p>
                @elseif($peticion->irregularidad)
                    <p><strong>Solicitud {{$key + 1}}: </strong> "{{ $peticion->irregularidad }}"</p>
                @endif
                @if($peticion->respuesta)
                    <p>Respuesta:</p>
                    <p>{!! $peticion->respuesta->respuesta !!}</p>
                @endif
            </div>
        @endforeach
        <div>
            <p>En mérito de lo expuesto,</p>
        </div>
        <div>
            <h4 style="text-align: center;">RESUELVE</h4>
            @foreach($resuelves as $key => $resuelve)
                <p style="text-transform: capitalize;"><strong>{{$resuelve->numeracion->ordinal}} :</strong></p>
                <p>{!! $resuelve->resuelve !!}</p>
            @endforeach
        </div>
        <div>
            <p>Cordialmente,</p>
        </div>
        <div>
            @php
                $aprueba = $pqr->asignaciontareas->where('tareas_id', 4)[3];
            @endphp
            @if($firma && $firma != '') 
                <img src="{{ $firma }}" class="firma" style="line-height: 0.5px;" alt="firma">
            @else
                <p style="font-style: italic;">* Espacio para estanpar firma electrónica</p>
            @endif
            <p style="font-weight: bold; line-height: 0.5px;">{{ $aprueba->empleado->nombre1 . ' ' .$aprueba->empleado->nombre2 . ' ' . $aprueba->empleado->apellido1 . ' ' . $aprueba->empleado->apellido2}}</p>
            <p>{{ $aprueba->empleado->cargo->cargo}}</p>
        </div>
        <div>
            @php
                $tareas = $pqr->asignaciontareas;
            @endphp
            @foreach($tareas as $key => $tarea)
                @if($tarea->tareas_id == 2)    
                    <p style="font-size: 11px; line-height: 1px;">Proyectó: {{$tarea->empleado->nombre1 . ' ' . $tarea->empleado->nombre2 . ' ' . $tarea->empleado->apellido1 . ' ' .$tarea->empleado->apellido2}}</p>
                @elseif($tarea->tareas_id == 3)
                    <p style="font-size: 11px; line-height: 1px;">Revisó: {{$tarea->empleado->nombre1 . ' ' . $tarea->empleado->nombre2 . ' ' . $tarea->empleado->apellido1 . ' ' .$tarea->empleado->apellido2}}</p>
                @elseif($tarea->tareas_id == 4)
                    <p style="font-size: 11px; line-height: 1px;">Aprovó: {{$tarea->empleado->nombre1 . ' ' . $tarea->empleado->nombre2 . ' ' . $tarea->empleado->apellido1 . ' ' .$tarea->empleado->apellido2}}</p>
                @endif
            @endforeach
        </div>
    </main>
</body>

</html>
