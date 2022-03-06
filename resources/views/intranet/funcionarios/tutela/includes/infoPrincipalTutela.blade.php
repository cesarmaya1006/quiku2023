<div class="row">
    <div class="col-12">
        <a class="card-header collapsed card-link" data-bs-toggle="collapse" href="#infoPrincipalTutela" role="button"
            aria-expanded="false" aria-controls="infoPrincipalTutela">
            Información Principal Tutela
            <i class="fa fa-plus-circle mr-2" aria-hidden="true"></i>
        </a>
    </div>
</div>
<div class="row collapse mt-4 mb-5" id="infoPrincipalTutela">
    <div class="col-12 col-md-6">
        Número de radicado:
        <strong>{{ $tutela->radicado }}</strong>
    </div>
    <div class="col-12 col-md-6">
        Fecha de notificación: <strong>{{ $tutela->fecha_notificacion }}</strong>
    </div>
    <div class="col-12 col-md-6">
        Fecha de radicado: <strong>{{ $tutela->fecha_radicado }}</strong>
    </div>
    <div class="col-12 col-md-6">
        Jurisdicción: <strong>{{ $tutela->jurisdiccion }}</strong>
    </div>
    <div class="col-12 col-md-6">
        Juzgado: <strong>{{ $tutela->juzgado }}</strong>
    </div>
    <div class="col-12 col-md-6">
        Departatmento :
        <strong>{{ $tutela->departamento }}</strong>
    </div>
    <div class="col-12 col-md-6">
        Municipio : <strong>{{ $tutela->municipio }}</strong>
    </div>
    <div class="col-12 col-md-6">
        Nombre Juez : <strong>{{ $tutela->nombre_juez }}</strong>
    </div>
    <div class="col-12 col-md-6">
        Dirección Juzgado : <strong>{{ $tutela->direccion_juez }}</strong>
    </div>
    <div class="col-12 col-md-6">
        Teléfono Juzgado: <strong>{{ $tutela->telefono_juez }}</strong>
    </div>
    <div class="col-12 col-md-6">
        Correo Juzgado: <strong>{{ $tutela->correo_juez }}</strong>
    </div>
    <div class="col-12 col-md-6">
        Estado : <strong>{{ $tutela->estado->estado_funcionario }}</strong>
    </div>
    <div class="col-12 col-md-6">
        Prioridad : <strong>{{ $tutela->prioridad->prioridad }}</strong>
    </div>
    <div class="col-12 col-md-6">
        Fecha límite: <strong>{{ $tutela->fecha_limite }}</strong>
    </div>
</div>
<hr>
