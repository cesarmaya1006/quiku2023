<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-10">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Inicio</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Parametrización
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="font-size: 0.8em;">
                                    <li><a class="dropdown-item"
                                            href="{{ route('admin-funcionario-area-index') }}">Areas</a>
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="{{ route('admin-funcionario-nivel-index') }}">Niveles</a>
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="{{ route('admin-funcionario-cargo-index') }}">Cargos</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="{{ route('admin-funcionario-sedes-index') }}">Sedes</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="{{ route('admin-funcionario-areas_influencia-index') }}">Areas
                                            Influencia</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="{{ route('admin-funcionario-asignacion_particular-index') }}">Asignación
                                            Particular</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="{{ route('admin-funcionario-asociacion_wiku_tutelas-index') }}">Asociación Wiku Tutelas</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('funcionarios_funcionarios-index') }}">Funcionarios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('wiku-index') }}">Wiku</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Analitica
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="font-size: 0.8em;">
                                    <li><a class="dropdown-item" href="{{ route('analitica-cantidad') }}">Anlítica
                                            por
                                            volumen</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('analitica-index') }}">Analítica por
                                            tiempos de respuesta</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
