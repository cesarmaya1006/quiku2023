@extends("extranet.plantilla")
<!-- ************************************************************* -->
@section('css_pagina')
    <link rel="stylesheet" href="{{ asset('css/extranet/login.css') }}">
@endsection
@section('cuerpo_pagina')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11 col-sm-10 col-md-8 mt-5">
                <div class="card">
                    <form action="{{ route('registropn-guardar') }}" method="POST" autocomplete="off">
                        @csrf
                        @method('post')
                        <div class="card-body" id="registro_ini">
                            <p class="m-0 text-right"><strong>1/2</strong></p>
                            <h5 class="card-title">Registro Datos Persona Natural</h5>
                            <div class="card-text mt-5">
                                <div class="form-row row">
                                    <div class="form-group mt-3 col-md-6">
                                        <label class="requerido" for="tipodocumento">Tipo documento</label>
                                        <select class="form-control" name="docutipos_id" id="docutipos_id" required
                                            readonly="true">
                                            <option value="">--Seleccione un tipo--</option>
                                            @foreach ($tipos_docu as $tipodocu)
                                                <option value="{{ $tipodocu->id }}"
                                                    {{ $tipodocu->id == $docutipos_id ? 'selected' : '' }}>
                                                    {{ $tipodocu->abreb_id }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mt-3 col-md-6">
                                        <label class="requerido" for="numerodocumento">Número de documento</label>
                                        <input type="text" class="form-control" id="numerodocumento"
                                            placeholder="Número documento" value="{{ $identificacion }}" required
                                            readonly="true">
                                    </div>
                                </div>
                                <div class="form-row row mt-3">
                                    <div class="col-md-6 mb-3">
                                        <label class="requerido" for="primernombre">Primer Nombre</label>
                                        <input type="text" class="form-control" id="primernombre"
                                            placeholder="Primer Nombre" name="primernombre" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="segundonombre">Segundo Nombre</label>
                                        <input type="text" class="form-control" id="segundonombre"
                                            placeholder="Segundo Nombre" name="segundonombre">
                                    </div>
                                </div>
                                <div class="form-row row mt-3">
                                    <div class="col-md-6 mb-3">
                                        <label class="requerido" for="primerapellido">Primer Apellido</label>
                                        <input type="text" class="form-control" id="primerapellido"
                                            placeholder="Primer Apellido" name="primerapellido" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="segundoapelldio">Segundo Apellido</label>
                                        <input type="text" class="form-control" id="segundoapelldio"
                                            placeholder="Segundo Apellido" name="segundoapelldio">
                                    </div>
                                </div>
                                <div class="form-row row mt-3">
                                    <div class="col-md-6 mb-3">
                                        <label for="telefonofijo">Teléfono fijo</label>
                                        <input type="text" class="form-control" id="telefonofijo"
                                            placeholder="Teléfono fijo" name="telefonofijo">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="requerido" for="telefonocelular">Teléfono Celular</label>
                                        <input type="text" class="form-control" id="telefonocelular"
                                            placeholder="Teléfono Celular" name="telefonocelular" required>
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="form-group mt-3 col-md-6">
                                        <label class="requerido" for="direccion">Dirección</label>
                                        <input type="text" class="form-control" id="direccion" placeholder="Dirección"
                                            name="direccion" required>
                                    </div>
                                    <div class="form-group mt-3 col-md-6">
                                        <label class="requerido" for="pais">País</label>
                                        <select class="form-control" name="pais" id="pais" required>
                                            <option value="">--Seleccione--</option>
                                            @foreach ($paises as $pais)
                                                <option value="{{ $pais->id }}"
                                                    {{ $pais->pais == 'Colombia' ? 'selected' : '' }}>{{ $pais->pais }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row row" id="caja_departamento">
                                    <div class="form-group mt-3 col-md-6">
                                        <label class="requerido" for="departamento">Departamento</label>
                                        <select class="form-control departamentos" id="departamento"
                                            data_url="{{ route('cargar_municipios') }}">
                                            <option value="">--Seleccione--</option>
                                            @foreach ($departamentos as $departamento)
                                                <option value="{{ $departamento->id }}">
                                                    {{ $departamento->departamento }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mt-3 col-md-6">
                                        <label class="requerido" for="municipio_id">Ciudad</label>
                                        <select class="form-control" name="municipio_id" id="municipio_id">
                                            <option value="">--Seleccione--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row row mt-3">
                                    <div class="col-md-6 mb-3">
                                        <label class="requerido" for="nacionalidad">Nacionalidad</label>
                                        <input type="text" class="form-control" id="nacionalidad" placeholder="Nacionalidad"
                                            name="nacionalidad" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="requerido" for="grado">Último grado de educación obtenido</label>
                                        <select class="form-control" name="grado" id="grado" required>
                                            <option value="">--Seleccione--</option>
                                            <option value="Basica Primaria">Basica Primaria</option>
                                            <option value="Bachiller">Bachiller</option>
                                            <option value="Tecnico">Tecnico</option>
                                            <option value="Tecnologo">Tecnologo</option>
                                            <option value="Superior">Superior</option>
                                            <option value="Post Grado">Post Grado</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row row mt-3">
                                    <div class="col-md-6 mb-3">
                                        <label class="requerido" for="genero">Elija su Genero</label>
                                        <select class="form-control" name="genero" id="genero" required>
                                            <option value="">--Seleccione--</option>
                                            <option value="">Femenino</option>
                                            <option value="">Masculino</option> 
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="requerido" for="fechanacimiento">Fecha nacimiento</label>
                                        <input type="date" class="form-control" id="fechanacimiento" name="fechanacimiento"
                                            max="{{ date('Y-m-d', strtotime(date('Y-m-d') . '- 18 years')) }}"
                                            value="{{ date('Y-m-d', strtotime(date('Y-m-d') . '- 18 years')) }}"
                                            required>
                                    </div>
                                </div>
                                <div class="form-row row mt-3">
                                    <div class="col-md-6 mb-3">
                                        <label class="requerido" for="grupoetnico">Grupo Étnico</label>
                                        <select class="form-control" name="grupoetnico" id="grupoetnico" required>
                                            <option value="">--Seleccione--</option>
                                            <option value="1">Sin pertenencia étnica</option>
                                            <option value="2">Negro, mulato, afrodescendiente, afrocolombiano</option>
                                            <option value="3">Indígena</option>
                                            <option value="4">Raizal</option>
                                            <option value="5">Palenquero</option>
                                            <option value="6">Gitano</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="requerido" for="discapacidad">Es usted persona en condición de discapacidad?</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="discapasidad"
                                                id="discapacidad1" value="si">
                                            <label class="form-check-label" for="discapacidad1">
                                                Sí
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="discapasidad"
                                                id="discapacidad2" value="no" checked>
                                            <label class="form-check-label" for="discapacidad2">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3 d-none" id="tipodiscapacidadcaja">
                                    <label for="tipodiscapacidad">Tipo discapacidad?</label>
                                    <select class="form-control" name="tipodiscapacidad" id="tipodiscapacidad">
                                        <option value="">--Seleccione--</option>
                                        <option value="1">Incapacidad Permanente Parcial</option>
                                        <option value="2">Incapacidad Permanente Total</option>
                                        <option value="3">Incapacidad Permanente Total Cualificada</option>
                                        <option value="4">Incapacidad Permanente Absoluta</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label class="requerido" for="email">Correo electrónico</label>
                                    <input type="email" class="form-control" id="email" placeholder="Correo electrónico"
                                        value="{{ $email }}" required>
                                    <p>Al diligenciar su correo electrónico, está aceptando que las respuestas y
                                        comunicaciones sobre sus peticiones, quejas y reclamos, sean enviadas a esta
                                        dirección.</p>
                                </div>
                                <button class="mt-3 btn btn-primary" id="boton_continuar">Continuar</button>
                            </div>
                        </div>
                        <div class="card-body d-none" id="registro_fin">
                            <p class="m-0 text-right"><strong>2/2</strong></p>
                            <h5 class="card-title">Registro</h5>
                            <h5 class="card-title">Usuario y clave de acceso</h5>
                            <div class="card-text mt-5">
                                <div class="form-row row mt-3">
                                    <div class="col-md-12 mb-3">
                                        <label class="requerido" for="usuario">Nombre de usuario</label>
                                        <input type="text" class="form-control" id="usuario" placeholder="Nombre de usuario"
                                            name="usuario" required>
                                    </div>
                                </div>
                                <div class="form-row row mt-3">
                                    <div class="col-md-6 mb-3">
                                        <label class="requerido" for="password">Clave o Contraseña</label>
                                        <input type="password" class="form-control" id="password"
                                            placeholder="Clave o Contraseña" name="password" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="requerido" for="verificacionpassword">Repetir clave o contraseña</label>
                                        <input type="password" class="form-control" id="verificacionpassword"
                                            placeholder="Repetir clave o contraseña" name="verificacionpassword" required>
                                    </div>
                                </div>
                                <div class="form-row row mt-3">
                                    <div class="col-md-12 mb-3">
                                        <label>Términos y condiciones de uso</label>

                                        <p class="bg-white p-5">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Veritatis alias nesciunt, enim voluptatibus, provident esse accusamus quisquam
                                            corporis optio earum aut error dolore architecto qui illo quaerat placeat
                                            aperiam velit, facilis est excepturi doloremque officia ipsam temporibus! Odio
                                            dolore ipsa officiis accusamus a fugit, magni dicta eius necessitatibus qui
                                            culpa provident voluptatibus perferendis quasi facilis, quae recusandae
                                            doloribus atque rem expedita, molestias assumenda! Itaque vitae ex nihil omnis
                                            nostrum delectus consequatur quaerat minima error commodi eum eos non minus
                                            quasi corporis modi, fuga corrupti, et distinctio iure. Deleniti voluptate
                                            molestias unde vel suscipit quia eum quisquam saepe, qui dolore atque ex! Quo
                                            quia veniam repellendus minima rerum ad explicabo architecto laborum adipisci ea
                                            facere voluptatibus, numquam hic quisquam. Tempore in eveniet rem excepturi
                                            officiis beatae quia fuga cupiditate quae dignissimos. Non ducimus dignissimos
                                            harum recusandae nemo accusamus, nostrum labore! Non consectetur, beatae quam at
                                            distinctio ipsa libero praesentium repudiandae id necessitatibus amet aspernatur
                                            perferendis voluptatem dicta incidunt quo sint vel! Harum explicabo nulla culpa
                                            voluptatum atque officia commodi, minus, mollitia laborum, perferendis fuga
                                            quibusdam? Placeat in amet rem inventore odit nostrum aperiam, eum blanditiis
                                            quasi iure voluptatum, cupiditate quae sit provident autem et! Ducimus dolorem
                                            sed eum commodi vel quidem optio animi neque quia, autem dolor earum totam, odio
                                            iusto ex sequi veritatis harum quae, voluptates cumque doloribus ad expedita. Ad
                                            ex illo minus quam doloremque minima quod, qui cumque nihil dicta odio laborum
                                            eum reprehenderit sequi non ullam voluptatum aut in suscipit possimus? Minima
                                            unde nam quasi, facere blanditiis, dicta quod ullam qui labore nulla laboriosam
                                            dolorem, mollitia corporis placeat provident optio possimus asperiores inventore
                                            suscipit perferendis eum. Asperiores quaerat ullam non odit autem quasi fugit,
                                            necessitatibus est quis beatae unde qui nulla soluta perspiciatis. Accusantium
                                            nulla nobis eius nam! Laboriosam molestias iusto autem aliquid dolor. Earum
                                            asperiores consequatur itaque in commodi ex, nisi ab architecto provident sequi
                                            enim qui suscipit cum eveniet quidem accusantium distinctio sit corporis dicta!
                                            Quidem ipsam numquam, cumque ea obcaecati voluptas officia. Voluptate corrupti,
                                            mollitia, quibusdam blanditiis illum consectetur doloribus ratione
                                            exercitationem quae maiores nobis quam consequuntur harum vel perferendis
                                            pariatur ipsam! Maiores distinctio magnam voluptatum et eum labore porro eveniet
                                            eius, necessitatibus rerum, molestiae reiciendis. Magnam optio praesentium error
                                            dolorem eum saepe quam cupiditate doloribus sit rerum est tempora mollitia
                                            asperiores incidunt minima, perferendis iure esse animi rem. Nemo aliquam
                                            veritatis ea facere ex quo sed eos aut totam, nihil, culpa vitae autem excepturi
                                            eum officiis mollitia maiores explicabo! Tempora, unde impedit molestias,
                                            architecto accusamus adipisci possimus vel eum eveniet officia, temporibus
                                            excepturi mollitia exercitationem earum sequi quod laboriosam sunt ad
                                            aspernatur? Perspiciatis saepe incidunt labore impedit illum eaque autem dolorum
                                            amet sed repudiandae repellendus repellat ducimus, maiores eveniet odit ab!
                                            Possimus dignissimos deserunt ipsam pariatur iste quae, dolorem in? Ea eum
                                            tempora architecto sunt, corrupti illum voluptate impedit labore culpa quaerat.
                                            Dolor, placeat architecto quidem consequuntur, eos harum enim similique nobis
                                            rerum a ipsam, pariatur natus? Veniam temporibus odit enim consequatur modi
                                            recusandae quam, sunt dolores nemo distinctio nam sequi laborum iusto.</p>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Acepto los términos y
                                            condiciones.</label>
                                    </div>
                                </div>
                                <button class="mt-3 btn btn-primary" type="submit">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script_pagina')
    <script src="{{ asset('js/extranet/registro.js') }}"></script>
@endsection
