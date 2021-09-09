@extends("extranet.plantilla")
<!-- ************************************************************* -->
@section('css_pagina')
<link rel="stylesheet" href="{{ asset('css/extranet/login.css') }}">
@endsection
@section('cuerpo_pagina')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-sm-10 col-11 mt-4">
            <div class="card bg-white">
                <div class="card-body">
                    <div class="ayudas">
                        <h5 class="card-title">Preguntas frecuentes</h5>
                        <div class="card-text mt-5 justify-content-center">
                            <ol>
                                <h5 class="titulo"> 1- Glosario</h5>
                                <div class="p-2 mb-2 d-none bloque-contenido">
                                    <h6 class="titulo">¿Qué es un PQR?</h6>
                                    <div class="p-2 bloque-contenido">
                                        <p>Peticiones, quejas o reclamos (PQR) son diferentes tramites los cuales puedes generar para obtener una respuesta o ayuda.</p>
                                    </div>
                                    <h6 class="titulo">¿Qué es una petición?</h6>
                                    <div class="p-2 bloque-contenido">
                                        <p>Es una solicitud de información o acción por parte del cliente a un servicio o productos como: (información, cambios, supresión de datos etc.…).</p>
                                    </div>
                                    <h6 class="titulo">¿Qué es una queja?</h6>
                                    <div class="p-2 bloque-contenido">
                                        <p>Es una solicitud generada en base a una inconformidad de un producto o servicio como: (mal funcionamiento, mala atención, inconformidad con el servicio etc.…).</p>
                                    </div>
                                    <h6 class="titulo">¿Qué es un reclamo?</h6>
                                    <div class="p-2 bloque-contenido">
                                        <p>Es una solicitud con la que se espera solucionar un problema de un bien o servicio adquirido ejemplos (devoluciones, cancelación del servicio, descuentos etc.…).</p>
                                    </div>
                                    <h6 class="titulo">¿Qué es un número de radicado?</h6>
                                    <div class="p-2 bloque-contenido">
                                        <p>Es un numeró único al cual se asocia la documentación de un PQR generado de manera automática, que permite consultar y separar solicitudes. </p>
                                    </div>
                                    <h6 class="titulo">¿Qué es un producto?</h6>
                                    <div class="p-2 bloque-contenido">
                                        <p>Un producto es un objeto tangible, físico, que se puede tocar y ver, en general percibir a través de los sentidos, el cual se adquiere por medio de intercambios y tiende a satisfacer una necesidad ejemplos: (computador, celular, televisor, etc.…).</p>
                                    </div>
                                    <h6 class="titulo">¿Qué es un servicio?</h6>
                                    <div class="p-2 bloque-contenido">
                                        <p>Un servicio es una acción o conjunto de actividades destinadas a satisfacer una necesidad proporcionadas por un tercero como:(internet, luz, gas, etc.…).</p>
                                    </div>
                                    <h6 class="titulo">¿Qué es un anexo?</h6>
                                    <div class="p-2 bloque-contenido">
                                        <p>Es información extra la cual puede ayudar a complementar o completar una idea, acción o archivo.</p>
                                    </div>
                                    <h6 class="titulo">¿Qué es una prueba?</h6>
                                    <div class="p-2 bloque-contenido">
                                        <p>Es información contundente la cual corrobora la veracidad de un archivo, acción o idea.</p>
                                    </div>
                                    <h6 class="titulo">¿Qué es una apelación?</h6>
                                    <div class="p-2 bloque-contenido">
                                        <p>Procedimiento judicial mediante el cual se solicita a un juez o tribunal superior que anule o enmiende la sentencia dictada por otro de inferior rango por considerarla injusta</p>
                                    </div>
                                </div>
                                <h5 class="titulo"> 2- Preguntas</h5>
                                <div class="p-2 mb-2 d-none bloque-contenido">
                                    <h6 class="titulo">¿Cuál es tiempo máximo de confirmación de correo para el registro?</h6>
                                    <div class="p-2 bloque-contenido">
                                        <p>-------------</p>
                                    </div>
                                    <h6 class="titulo">¿Se puede navegar en la página web sin necesidad de estar registrado?</h6>
                                    <div class="p-2 bloque-contenido">
                                        <p>No, dado que el ingreso a la plataforma requiere un registro el cual te permite acceder a las funciones de la página.</p>
                                    </div>
                                    <h6 class="titulo">¿En qué países está disponible el servicio?</h6>
                                    <div class="p-2 bloque-contenido">
                                        <p>-------------</p>
                                    </div>
                                    <h6 class="titulo">¿En qué regiones se encuentra el servicio?</h6>
                                    <div class="p-2 bloque-contenido">
                                        <p>-------------</p>
                                    </div>
                                    <h6 class="titulo">¿Cuál es el número máximo de veces que se puede apelar una PQR?</h6>
                                    <div class="p-2 bloque-contenido">
                                        <p>-------------</p>
                                    </div>
                                    <h6 class="titulo">¿En qué sistemas operativos se pude usar la plataforma?</h6>
                                    <div class="p-2 bloque-contenido">
                                        <p>-------------</p>
                                    </div>
                                    <h6 class="titulo">¿Cuáles son las diferencias entre una petición, queja y reclamo?</h6>
                                    <div class="p-2 bloque-contenido">
                                        <p>El reclamo se refiere a la manifestación de inconformidad o insatisfacción que tienes frente a la prestación de un servicio determinado. En la queja manifiestas tu inconformidad con la acción de una de las personas que presta el servicio o tiene determinada función. Y en la petición haces una solicitud a determinada persona o entidad para un fin específico.</p>
                                    </div>
                                    <h6 class="titulo">¿Cuál es tiempo mínimo y máximo de respuesta de un proceso legal?</h6>
                                    <div class="p-2 bloque-contenido">
                                        <p>-------------</p>
                                    </div>
                                </div>
                                <h5 class="titulo"> 3- Creación de tareas</h5>
                                <div class="p-2 mb-2 d-none bloque-contenido">
                                    <h6 class="titulo">¿Cómo registrar una nueva cuenta?</h6>
                                    <div class="p-2 bloque-contenido">
                                        <p>1- Entra <a href="/index" target="-blank">Aquí</a></p>
                                        <p>2- Presiona el botón de <span style="color: #8037b7; font-weight: 700;">Registrar</span></p>
                                        <img class="img-fluid mr-3 p-2 mb-2" src="{{ asset('imagenes/sistema/inicio1.gif') }} "alt="">
                                        <p>3- Completa la información básica y dale al botón de <span style="color: #8037b7; font-weight: 700;">Siguiente</span></p>
                                        <img class="img-fluid mr-3 p-2 mb-2" src="{{ asset('imagenes/sistema/inicio2.gif') }} "alt="">
                                        <p>4- Verifica tu correo electrónico el cual registraste en el anterior paso, te llegara una notificación en la que debes dar <span style="color: #8037b7; font-weight: 700;">Clic en el Link</span> que te proporciona para confirmar tu correo</p>
                                        <img class="img-fluid mr-3 p-2 mb-2" src="{{ asset('imagenes/sistema/inicio3.gif') }} "alt="">
                                        <p>5- Registra tus datos personales y dale al botón <span style="color: #8037b7; font-weight: 700;">Continuar</span></p>
                                        <img class="img-fluid mr-3 p-2 mb-2" src="{{ asset('imagenes/sistema/inicio4.gif') }} "alt="">
                                        <p>6- Crea un usuario y contraseña y dale al botón <span style="color: #8037b7; font-weight: 700;">Enviar</span></p>
                                        <img class="img-fluid mr-3 p-2 mb-2" src="{{ asset('imagenes/sistema/inicio5.gif') }} "alt="">
                                        <p>Nota: No te olvides de leer y aceptar los términos y condiciones </p>
                                    </div>
                                    <h6 class="titulo">¿Como crear una PQR?</h6>
                                    <div class="p-2 bloque-contenido">
                                        <p>1- Debes dar <span style="color: #8037b7; font-weight: 700;">Clic</span> la parte superior izquierda <span style="color: #8037b7; font-weight: 700;">≡</span></p>
                                        <img class="img-fluid mr-3 p-2 mb-2" src="{{ asset('imagenes/sistema/pqr1.gif') }} "alt="">
                                        <p>2- Selecciona la opción de <span style="color: #8037b7; font-weight: 700;">Gestionar + Generar PQR</span></p>
                                        <img class="img-fluid mr-3 p-2 mb-2" src="{{ asset('imagenes/sistema/pqr2.gif') }} "alt="">
                                        <p>3- En la pantalla de generar PQR <span style="color: #8037b7; font-weight: 700;">selecciona uno de las opciones</span> (Petición, Queja, Reclamo, Solicitud sobre mis datos personales, Felicitaciones, Solicitud de documentos o información)</p>
                                        <img class="img-fluid mr-3 p-2 mb-2" src="{{ asset('imagenes/sistema/pqr3.gif') }} "alt="">
                                        <p>4- Completa los campos requeridos y dale al botón de <span style="color: #8037b7; font-weight: 700;">Crear</span></p>
                                        <img class="img-fluid mr-3 p-2 mb-2" src="{{ asset('imagenes/sistema/pqr4.gif') }} "alt="">
                                        <p>Nota: Recibirá un correo con la confirmación de que su PQR fue registrada de manera correcta</p>
                                    </div>
                                    <h6 class="titulo">¿Cómo consultar una PQR previamente creada?</h6>
                                    <div class="p-2 bloque-contenido">
                                        <p>1- Debes dar <span style="color: #8037b7; font-weight: 700;">Clic</span> la parte superior izquierda <span style="color: #8037b7; font-weight: 700;">≡</span></p>
                                        <img class="img-fluid mr-3 p-2 mb-2" src="{{ asset('imagenes/sistema/pqr5.gif') }} "alt="">
                                        <p>2- Selecciona la opción de <span style="color: #8037b7; font-weight: 700;">Gestionar + Listado PQR</span></p>
                                        <img class="img-fluid mr-3 p-2 mb-2" src="{{ asset('imagenes/sistema/pqr6.gif') }} "alt="">
                                        <p>3- En ésta pantalla podrás ver las PQR previamente creadas y dar <span style="color: #8037b7; font-weight: 700;">Clic</span> sobre las mismas para consultar más información.</p>
                                        <img class="img-fluid mr-3 p-2 mb-2" src="{{ asset('imagenes/sistema/pqr7.gif') }} "alt="">
                                    </div>
                                    <h6 class="titulo">¿Cómo descargar una PQR previamente creada?</h6>
                                    <div class="p-2 bloque-contenido">
                                        <p>1- Debes dar <span style="color: #8037b7; font-weight: 700;">Clic</span> la parte superior izquierda <span style="color: #8037b7; font-weight: 700;">≡</span></p>
                                        <img class="img-fluid mr-3 p-2 mb-2" src="{{ asset('imagenes/sistema/pqr8.gif') }} "alt="">
                                        <p>2- Selecciona la opción de <span style="color: #8037b7; font-weight: 700;">Gestionar + Listado PQR</span></p>
                                        <img class="img-fluid mr-3 p-2 mb-2" src="{{ asset('imagenes/sistema/pqr9.gif') }} "alt="">
                                        <p>3- En ésta pantalla podrás ver las PQR previamente creadas y dar <span style="color: #8037b7; font-weight: 700;">Clic en el símbolo de descarga</span></p>
                                        <img class="img-fluid mr-3 p-2 mb-2" src="{{ asset('imagenes/sistema/pqr10.gif') }} "alt="">
                                    </div>
                                </div>
                                <h5 class="titulo"> 4- Contactos y soporte</h5>
                                <div class="p-2 mb-2 d-none bloque-contenido">
                                    <h6 class="titulo">Canales de contacto</h6>
                                    <div class="p-2 bloque-contenido">
                                        <p>Correo electrónico: -----</p>
                                        <p>Dirección: ----- </p>
                                        <p>Teléfono fijo: -------------</p>
                                    </div>
                                </div>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script_pagina')
    <script src="{{ asset('js/extranet/ayuda.js') }}"></script>
@endsection
