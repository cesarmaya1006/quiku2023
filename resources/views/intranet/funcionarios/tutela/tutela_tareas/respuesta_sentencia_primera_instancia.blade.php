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
        table {width: 100%; margin: auto; }
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
            <p>Señor:</p>
            <p>{{$tutela->juzgado}}</p>
            <p>E. S. D.</p>
        </div>
        <div class="tabla">
            <table class="" style="width:75%; text-align:end;">
                <body>
                    <tr>
                        <td>REFERENCIA:</td>
                        <td>ACCION DE TUTELA </td>
                    </tr>
                    <tr>
                        <td>RADICADO:</td>
                        <td>2021-348 </td>
                    </tr>
                    <tr>
                        <td>ACCIONANTE:</td>
                        <td>LUIS FERNANDO FORIGUA RIVERA </td>
                    </tr>
                    <tr>
                        <td>ACCIONADA:</td>
                        <td>COLPENSIONES </td>
                    </tr>
                </body>
            </table>
        </div>
        <div>
            <p>Señor Juez</p>
            <p>{{ $aprueba->empleado->nombre1 . ' ' .$aprueba->empleado->nombre2 . ' ' . $aprueba->empleado->apellido1 . ' ' . $aprueba->empleado->apellido2}}, identificado con la {{$aprueba->empleado->tipo_id}} N° {{$aprueba->empleado->identificacion}}, domiciliado y residente en Bogotá D.C como aparece al pie de mi firma, allego ante su Señoría para manifestarle, con el usual respeto, que IMPUGNO la Sentencia de primera instancia proferida dentro del presente trámite, con miras a que el Juzgado Tercero Civil del Circuito de  Bogotá, analice detenidamente las razones de la Acción de Tutela y de la Impugnación, la revoque y conceda todas las pretensiones del  accionante, en los siguientes términos:
            </p>
        </div>
        <div>
            <h4 style="text-align: center;">FUNDAMENTOS Y RAZONES DE DERECHO</h4>
            <p>OPORTUNIDAD DEL PRESENTE RECURSO DE IMPUGNACIÓN Y EN SUBSIDIO APELACIÓN</p>
            <p>De conformidad con el artículo 32 del decreto 2591 de 1991, el fallo de primera instancia de una acción de tutela podrá ser impugnado por el accionante dentro de los tres (3) días siguientes a su notificación. </p>
            <p>Considerando que la sentencia de tutela objeto de la presente impugnación se notificó por correo electrónico el 23 de agosto de 2021, el término previsto en la norma previamente citada vence el 26 de agosto de 2021. De allí que la presente impugnación y en subsidio apelación se presenta en términos y de manera oportuna.</p>
            @foreach($tutela->primeraInstancia->respuestasImpugnacionesiInternas as $key => $respuesta)
                <h4>Resuelves:</h4>
                @if($tutela->primeraInstancia->cantidad_resuelves)
                    <p style="text-transform: capitalize;">
                        @foreach($respuesta->relacion as $key => $relacion)
                            {{$relacion->impugancion->consecutivo}},
                        @endforeach
                    </p>
                @else
                    @foreach($respuesta->relacion as $key => $relacion)
                        <p style="text-transform: capitalize;"><strong class="fw-bold">resuelve # {{$relacion->impugancion->consecutivo}}: </strong>{{$relacion->impugancion->resuelve}}</p>
                    @endforeach
                @endif
                <h4>Respuesta</h4>
                <p> {!! $respuesta->respuesta !!}</p>
            @endforeach
        </div>
        <div>
            <h4>DELIMITACIÓN RATIO DECIDENDI FALLO DE TUTELA</h4>
            <p>Para fundamentar el recurso, en primer lugar, vamos a delimitar la Ratio Decidendi que soporta la decisión del Juez Treinta y Seis Penal Municipal con Funciones de Conocimiento de Bogotá, para negar las pretensiones de la acción de tutela.</p>
            <p>Esto, con la finalidad de demostrar posteriormente que dichas razones son equivocadas y que, por lo tanto, se debe conceder la totalidad de las pretensiones del accionante, veamos:</p>
            <p>El juzgado indica en la parte considerativa que la situación descrita:</p>
            <p>“Que no se encuentra configurado en el caso concreto el riesgo cierto e inminente propio de la figura del perjuicio irremediable, pues tras la apreciación de los hechos se observó que tal como lo manifestó el accionante la pérdida de capacidad laboral se reduce al 15.70%, por tanto al ser la reducción de la pérdida de capacidad laboral – moderada no permite deducir una atención urgente o el decrete de medidas necesarias e inaplazables para su protección constitucional y por tanto el bien jurídico tutelado que se pone en riesgo no se considera amenazado adicionalmente señala que este porcentaje no lo hace beneficiario de la estabilidad laboral reforzada.”</p>
            <p>Descrito lo anterior, me centraré en demostrar la existencia del perjuicio irremediable y la viabilidad de aplicar en el presente caso la estabilidad laboral reforzada en los siguientes términos: </p>
        </div>
        <div class="tabla">
            <h4 style="text-align: center;">Anexos</h4>
            <ol>
                @foreach ($tutela->primeraInstancia->respuestasImpugnacionesiInternas as $key => $respuesta)
                    @foreach ($respuesta->documentos as $key => $anexo)
                        <li>
                            <p class="text-justify">{{ $anexo->titulo }}</p>
                        </li>
                    @endforeach
                @endforeach
            </ol>
        </div>

        <div>
            <h4 style="text-align: center;">NOTIFICACIONES</h4>
            <p>El suscrito recibirá notificaciones en Carrera 78ª No 85ª -85 sur casa 205, Celular: 3143987782 Correo electrónico: luisanibal205@gmail.com</p>
            <p>La parte accionada en: Carrera 46 No 163B-77 Teléfonos: 7046371-6954657</p> 
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
        <div class ="footer" style="width: 100%;text-align: center;font-weight: bold;font-size: 0.6em;">
            <p class="p-azul">57-1-7229497</p>
            <p class="p-azul">www.mglasociados.com</p>
            <p class="p-azul">Carrera 13 # 76-12 Of. 301 y Carrera 5 # 16-14 Of. 803</p>
            <p class="p-azul">3208380622</p>
        </div>
    </footer>
</body>

</html>
