<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn-accion-tabla nav-link mr-3 text-primary">
                    <i class="fas fa-sign-out-alt fa-2x"></i>
                    <span class="badge badge-danger navbar-badge">
                        <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">Salir</font>
                        </font>
                    </span>
                </button>
            </form>
        </li>
    </ul>
</nav>
