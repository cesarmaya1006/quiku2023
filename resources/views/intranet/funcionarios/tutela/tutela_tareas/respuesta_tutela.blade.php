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
        .tabla table, .tabla th, .tabla td { border: 1px solid black; border-collapse: collapse;}
        .p-negro { line-height: .3; }
            
        }
    </style>
</head>
<body>
    @php
        $aprueba = $tutela->asignaciontareas->where('tareas_id', 4)[3];
    @endphp
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
            @php
                $accionantes = $tutela->accions->where('tipo_accion', 'Accionante');
                $contadorAccionates = 0;
                $accionado = $tutela->accions->where('tipo_accion', 'Accionado')->first();
            @endphp
            <p>Ref. Acción de tutela de: 
            @foreach ($accionantes as $key => $accionante)
                <strong>{{$accionante->nombres_accion}} {{$accionante->apellidos_accion}}, </strong>
            @endforeach 
            contra <strong>Cesar Maya.</strong></p>
            <p>Radicación N° {{$tutela->radicado}}</p>
            <p>Respetado Señor Juez (a): {{$tutela->nombre_juez}}</p>
            <p>{{ $aprueba->empleado->nombre1 . ' ' .$aprueba->empleado->nombre2 . ' ' . $aprueba->empleado->apellido1 . ' ' . $aprueba->empleado->apellido2}}, mayor de edad, con domicilio en la ciudad de Bogotá, D.C., identificado con la {{$aprueba->empleado->tipo_id}} N° {{$aprueba->empleado->identificacion}} de Bogotá D. C., en calidad de representante legal de {{$tutela->unidadNegocio->nombres}}, ante Usted acudo para dar contestación con la presente, a la demanda instaurada dentro del sub lite, solicitándole desde ya a su Señoría desatienda las súplicas de la demandada, formuladas a través de dicha Acción.
            </p>
        </div>
        <div>
            <h4 style="text-align: center;">I.  PRONUNCIAMIENTO FRENTE A LOS HECHOS</h4>
            @foreach($tutela->respuestasHechos as $key => $respuesta)
                <h4>Hechos:</h4>
                @if($tutela->cantidad_hechos)
                    <p style="text-transform: capitalize;">
                        @foreach($respuesta->relacion as $key => $relacion)
                            {{$relacion->hecho->consecutivo}},
                        @endforeach
                    </p>
                @else
                    @foreach($respuesta->relacion as $key => $relacion)
                        <p style="text-transform: capitalize;"><strong class="fw-bold">Hecho # {{$relacion->hecho->consecutivo}}: </strong>{{$relacion->hecho->hecho}}</p>
                    @endforeach
                @endif
                <h4>Respuesta</h4>
                <p> {!! $respuesta->respuesta !!}</p>
            @endforeach
        </div>
        <div>
            <h4 style="text-align: center;">II.  HECHOS DE LA DEFENSA</h4>
            @foreach($resuelves as $key => $resuelve)
                <p style="text-transform: capitalize;"><strong>{{$resuelve->numeracion->ordinal}} :</strong></p>
                <p>{!! $resuelve->resuelve !!}</p>
            @endforeach
        </div>
        <div>
            <h4 style="text-align: center;">III.  FUNDAMENTOS Y RAZONES DE DERECHO</h4>
            @foreach($tutela->respuestasPretensiones as $key => $respuesta)
                <h4>Prestensión(es):</h4>
                @if($tutela->cantidad_pretensiones)
                    <p style="text-transform: capitalize;">
                        @foreach($respuesta->relacion as $key => $relacion)
                            {{$relacion->pretension->consecutivo}},
                        @endforeach
                    </p>
                @else
                    @foreach($respuesta->relacion as $key => $relacion)
                        <p style="text-transform: capitalize;"><strong class="fw-bold">Pretensión # {{$relacion->pretension->consecutivo}}: </strong>{{$relacion->pretension->pretension}}</p>
                    @endforeach
                @endif
                <h4>Respuesta</h4>
                <p> {!! $respuesta->respuesta !!}</p>
            @endforeach
        </div>
        <div class="tabla">
            <h4 style="text-align: center;">IV.  PRUEBAS APORTADAS CON LA CONTESTACIÓN</h4>
            <ol>
                @php
                    $validardor_anexos = false;
                @endphp
                @foreach ($tutela->respuestasHechos as $key => $respuesta)
                    @foreach ($respuesta->documentos as $key => $anexo)
                        @php
                            $validador_anexos = true;
                        @endphp
                        <li>
                            <p class="text-justify">{{ $anexo->titulo }}</p>
                        </li>
                    @endforeach
                @endforeach
                @foreach ($tutela->respuestasPretensiones as $key => $respuesta)
                    @foreach ($respuesta->documentos as $key => $anexo)
                        @php
                            $validador_anexos = true;
                        @endphp
                        <li>
                            <p class="text-justify">{{ $anexo->titulo }}</p>
                        </li>
                    @endforeach
                @endforeach
                @if (!$validardor_anexos)
                    <p class="text-justify">Sin pruebas.</p>
                @endif
            </ol>
        </div>
        <div>
            <h4 style="text-align: center;">V.  ANEXOS</h4>
            <p>Se anexa con la presente contestación la documental ya referida en el acápite de las pruebas allegadas, y, en el entendido por demás que el Poder que me fuere conferido ya obra al plenario.</p>
        </div>
        <div>
            <h4 style="text-align: center;">VI.  NOTIFICACIONES</h4>
            <p>La dirección de MGL y Asociados S.A.S. en la ciudad de Bogotá en la carrera 13 # 76-12 piso 4, o al correo electrónico dlopez@mglasociados.com</p>
        </div>
        <div>
            <p>Del Señor (a) Juez,</p>
        </div>
        <div>
            <p>Atentamente,</p>
        </div>
        <div>

            @if($firma && $firma != '') 
                <img src="{{ $firma }}" class="firma" alt="firma">
            @else
                <p style="font-style: italic;">* Espacio para estanpar firma electrónica</p>
            @endif
            <p style="font-weight: bold;">{{ $aprueba->empleado->nombre1 . ' ' .$aprueba->empleado->nombre2 . ' ' . $aprueba->empleado->apellido1 . ' ' . $aprueba->empleado->apellido2}}</p>
            <p class="p-negro">{{$aprueba->empleado->tipos_docu->abreb_id}} {{$aprueba->empleado->identificacion}}</p>
            <p class="p-negro">Representante Legal</p>
            <p class="p-negro">MGL y Asociados S.A.S.</p>
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
