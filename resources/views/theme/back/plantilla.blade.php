@yield ('funciones_php')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- head general de la pagina -->
    @include("theme.back.head")
    <!-- -------------------------------------- -->
    <!-- Estilos proios de la pagina -->
    @yield ('estilosHojas')
    <!-- -------------------------------------- -->
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- menu superior -->
        @include("theme.back.menu_sup")
        <!-- /.menu superior -->
        <!-- -------------------------------------- -->
        <!-- menu lateral -->
        @include("theme.back.menu_lat")
        <!-- /.menu lateral -->
        <!-- -------------------------------------- -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12 col-lg-12">
                            <h3 class="m-0 text-dark">@yield ('tituloHoja')</h3>
                        </div><!-- /.col -->
                        <div class="col-12 col-sm-6 col-lg-6 text-right">
                            @yield ('volver_listado')
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- -------------------------------------- -->
                            <!--/. Cuerpo de la pagina -->
                            @yield ('cuerpo_pagina')
                            <!-- -------------------------------------- -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- -------------------------------------- -->
        <!-- footer lateral -->
        @include("theme.back.footer")
        <!-- /.menu lateral -->
        <!-- -------------------------------------- -->
    </div>
    <!-- -------------------------------------- -->
    <!-- scripts general lateral -->
    @include("theme.back.scripts")
    <!-- -------------------------------------- -->
    <!--/. scripts de la pagina -->
    @yield ('scripts_exportar_tabla')
    @yield ('scripts_pagina')
    <!-- -------------------------------------- -->
</body>

</html>
