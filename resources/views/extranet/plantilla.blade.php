<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/vnd.microsoft.icon" href="{{ asset('imagenes/sistema/icono_sistema.png') }}"
        sizes="64x64">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/extranet/general.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
    <title>Quiku</title>
    @yield('css_pagina')
    <style>
        body {
            background-image: linear-gradient(to bottom right, #f9cc5d, #f38782, #3359fa 85%);
            /* background-image: linear-gradient(to right, {{ $parametro->fondo1 }}, {{ $parametro->fondo2 }}); */
            /* background-image: url({{ asset('imagenes/img-inicio/img-principal-inicio4.jpg') }});
            background-size: cover; */
        }

        .header h2 a {
            color: {{ $parametro->color_titulo }};
        }

        /* .card {
            box-shadow: 0px 0px 20px -5px var(--color-black);
            background-color: {{ $parametro->bg_caja . 'BB' }};
        } */

        .card-title {
            color: #3359fa;
        }

        .card-text {
            color: #3359fa;
        }

        .btn-primary {
            background-color: white;
            border-color: #3359fa;
            color: #3359fa;
            font-weight: bold;
            border-radius: 50px;
        }

        .btn-primary:hover,
        .btn-primary:active,
        .btn-primary:focus {
            /* box-shadow: 0 0 0 0.25rem #3359fa; */
        }

        /* .header {
            background-color: {{ $parametro->bg_titulo }};

        } */

    </style>
</head>

<body>
    {{-- <div class="header container-fluid d-flex justify-content-center">
        <h2 class="container"><img class="img-fluid mr-3" src="{{ asset('imagenes/sistema/' . $parametro->logo) }}"
                alt=""><a href="/index">Sistema de Registro de Peticiones,
                Quejas
                y
                Reclamos</a></h2>
    </div> --}}
    @yield('cuerpo_pagina')
    <!-- Optional JavaScript; choose one of the two! -->
    <a href="{{ route('preguntas_frecuentes') }}">
        <img src="{{ asset('imagenes/sistema/preguntas_frecuentes.png') }}"
            class="rounded d-block preguntas-frecuentes" alt="...">
    </a>
    <div class="row fixed-bottom p-3 mt-5" style="background-color: rgba(26, 26, 26, 0.4)">
        <div class="col-12 text-center text-white">
            <strong>Copyright &copy; 2021 <a href="http://www.mglasociados.com/" style="color: white">MGL</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
    @yield('script_pagina')
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>
