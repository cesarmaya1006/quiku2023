{{-- <div class="row">
    <div class="col-12">
        {{ $usuario->empleado->nombre1 . ' ' . $usuario->empleado->nombre2 . ' ' . $usuario->empleado->apellido1 . ' ' . $usuario->empleado->apellido2 }}
    </div>
</div> --}}

<form action="{{ route('funcionario-actualizar') }}" method="POST" autocomplete="off">
    @csrf
    @method('post')
    <div class="card-body" id="registro_ini">
        <div class="card-text mb-3">
            <div class="form-row row">
                <div class="form-group mt-3 col-md-6">
                    <label class="requerido" for="tipodocumento">Tipo documento</label>
                    <span class="form-control myPopover"
                        data-toggle="popover">{{ $usuario->empleado->tipos_docu->abreb_id }}</span>
                </div>
                <div class="form-group mt-3 col-md-6">
                    <label class="requerido" for="numerodocumento">Número de documento</label>
                    <span class="form-control myPopover"
                        data-toggle="popover">{{ $usuario->empleado->identificacion }}</span>
                </div>
            </div>
            <div class="form-row row mt-3">
                <div class="col-md-6 mb-3">
                    <label class="requerido" for="nombre1">Primer Nombre</label>
                    <span class="form-control myPopover"
                        data-toggle="popover">{{ $usuario->empleado->nombre1 }}</span>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="nombre2">Segundo Nombre</label>
                    <span class="form-control myPopover"
                        data-toggle="popover">{{ $usuario->empleado->nombre2 }}</span>
                </div>
            </div>
            <div class="form-row row mt-3">
                <div class="col-md-6 mb-3">
                    <label class="requerido" for="apellido1">Primer Apellido</label>
                    <span class="form-control myPopover"
                        data-toggle="popover">{{ $usuario->empleado->apellido1 }}</span>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="apellido2">Segundo Apellido</label>
                    <span class="form-control myPopover"
                        data-toggle="popover">{{ $usuario->empleado->apellido2 }}</span>
                </div>
            </div>
            <div class="form-row row mt-3">
                <div class="col-md-6 mb-3">
                    <label class="requerido" for="telefono_celu">Teléfono Celular</label>
                    <input type="tel" class="form-control" id="telefono_celu" placeholder="Teléfono Celular"
                        name="telefono_celu"
                        onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;"
                        value="{{ $usuario->empleado->telefono_celu }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="requerido" for="direccion">Dirección</label>
                    <input type="text" class="form-control" id="direccion" placeholder="Dirección" name="direccion"
                        required value="{{ $usuario->empleado->direccion }}">
                </div>
            </div>
            <div class="form-row row mt-3">
                <div class="col-md-6 mb-3">
                    <label class="requerido" for="genero">Elija su Genero</label>
                    <span class="form-control myPopover" data-toggle="popover">{{ $usuario->empleado->genero }}</span>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="requerido" for="fechanacimiento">Fecha nacimiento</label>
                    <span class="form-control myPopover"
                        data-toggle="popover">{{ $usuario->empleado->fecha_nacimiento }}</span>
                </div>
            </div>
            <div class="form-group mt-3">
                <label class="requerido" for="email">Correo electrónico</label>
                <span class="form-control myPopover" data-toggle="popover">{{ $usuario->empleado->email }}</span>
                <p>Al diligenciar su correo electrónico, está aceptando que las respuestas y
                    comunicaciones sobre sus peticiones, quejas y reclamos, sean enviadas a esta
                    dirección.</p>
            </div>
            <button class="mt-3 btn btn-primary pl-5 pr-5" type="submit">Actualizar</button>
        </div>
    </div>
</form>
