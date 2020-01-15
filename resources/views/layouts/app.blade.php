<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("css/app.css")}}" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>@yield("title")</title>
    <link rel="stylesheet" href="{{ asset('assets/css/estilos.css') }}">
    <link rel='stylesheet' href='{{ asset('css/fullcalendar.css') }}' />
    <script src="{{ asset('js/moment.min.js') }}" defer></script>
    <script src="{{ asset('js/fullcalendar.min.js') }}" defer></script>
    <script src="{{ asset('js/locale/es.js') }}" defer></script>
</head>
<body>
<header id="header" >
    <div  class="colorheader col-12 card "  >
        <div class="row">
            <div class="col-xs-1 col-sm-1 col-md-1"></div>
            <div class="col-xs-1 col-sm-1 col-md-1">
                <img id="logo1" src="{{ asset('img/logos/gem.png') }}" />
            </div>
            <div class="col-xs1 col-sm-1 col-md-1">
                <img id="logo2" src="{{ asset('img/logos/EdoMEXvertical.png') }}" />
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 lineas text-center pt-3">
                <h5 class="font-weight-bold">Sistema de Seguimiento al Programa Institucional de Tutorias para Educación Superior</h5>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <img id="logo3" src="{{ asset ('assets/img/tes.png') }}" />
            </div>
        </div>
    </div>
</header>
<br>
<div id="app" class="container">
    <nav class="navbar navbar-expand-md navbar-light shadow-sm subm bg-white">
        <div class="container" >
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @if (Session::has('cuenta'))
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="panel">Inicio</a>
                        </li>
                        <a class="nav-link btn text-dark" href="Alumno" onclick="document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                        <form id="logout-form" action="cerrar" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="{{ route('register') }}">{{ __('Registrate') }}</a>
                                </li>
                            @endif
                        @else
                            @if (Auth::user()->id_rol ==1)
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="coordina_inst" >Crear Planeación</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="peticiones_inst" >Peticiones</a>
                                </li>
                            @endif
                                @if (Auth::user()->id_rol ==2)
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href="/planeacion" >Planeación</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href="/eventos" >Eventos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href="/canalizacion" >Canalizar Tutorados</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href="/canalizados" >Tutorados Canalizados</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href="/profesor" >Deserción</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href="/listado_alumnos" >Listado</a>
                                    </li>
                                @endif
                                @if (Auth::user()->id_rol ==3)
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href=home>Inicio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href=alumno>Expediente</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href=actividad>Actividades</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href=calendario>Calendario de Eventos</a>
                                    </li>
                                @endif
                                @if (Auth::user()->id_rol ==4)
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href="coordina_carrera" >Asignar Planeación</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href="peticiones" >Peticiones</a>
                                    </li>
                                @endif
                                @if (Auth::user()->id_rol ==5)
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href="dep_desarrollo" >Revisión Planeación</a>
                                    </li>
                                @endif
                                @if (Auth::user()->id_rol ==6)
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href="jefe" >Asignar Tutores</a>
                                    </li>
                                @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->email }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <main class="py-4">
        <div class="container">

            @yield('content')
        </div>
    </main>
</div>
<br>
<footer class="colorfooter col-12 footer-responsive">
    <div class="col-xs-6 col-sm-6 col-md-6">
        Tecnológico de Estudios Superiores Valle de Bravo
        Gobierno Del Estado De México
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        Km. 30 de la Carretera Federal Monumento-Valle de Bravo Ejido de San Antonio de la Laguna Valle de Bravo C.P 51200
    </div>
    <div class="container center" style="text-align: center" >
        Algunos Derechos Reservados 2011 Gobierno del Estado de México | <strong>Dudas y comentarios Webmaster</strong>
    </div>
</footer>
</body>
</html>
