<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('js/highcharts.js')}}"></script>
    <script src="{{asset('js/highcharts-export.js')}}"></script>
    <script type="text/javascript">
        /**
         The missing SVG.toDataURL library for your SVG elements.

         Usage: SVGElement.toDataURL( type, { options } )
         Returns: the data URL, except when using native PNG renderer (needs callback).
         type	MIME type of the exported data.
         Default: image/svg+xml.
         Must support: image/png.
         Additional: image/jpeg.
         options is a map of options: {
		callback: function(dataURL)
			Callback function which is called when the data URL is ready.
			This is only necessary when using native PNG renderer.
			Default: undefined.

		[the rest of the options only apply when type="image/png" or type="image/jpeg"]
		renderer: "native"|"canvg"
			PNG renderer to use. Native renderer¹ might cause a security exception.
			Default: canvg if available, otherwise native.
		keepNonSafe: true|false
			Export non-safe (image and foreignObject) elements.
			This will set the Canvas origin-clean property to false, if this data is transferred to Canvas.
			Default: false, to keep origin-clean true.
			NOTE: not currently supported and is just ignored.
		keepOutsideViewport: true|false
			Export all drawn content, even if not visible.
			Default: false, export only visible viewport, similar to Canvas toDataURL().
			NOTE: only supported with canvg renderer.
	}
         See original paper¹ for more info on SVG to Canvas exporting.
         ¹ http://svgopen.org/2010/papers/62-From_SVG_to_Canvas_and_Back/#svg_to_canvas
         */

        SVGElement.prototype.toDataURL = function(type, options) {
            var _svg = this;

            function debug(s) {
                console.log("SVG.toDataURL:", s);
            }

            function exportSVG() {
                var svg_xml = XMLSerialize(_svg);
                var svg_dataurl = base64dataURLencode(svg_xml);
                debug(type + " length: " + svg_dataurl.length);

                // NOTE double data carrier
                if (options.callback) options.callback(svg_dataurl);
                return svg_dataurl;
            }

            function XMLSerialize(svg) {

                // quick-n-serialize an SVG dom, needed for IE9 where there's no XMLSerializer nor SVG.xml
                // s: SVG dom, which is the <svg> elemennt
                function XMLSerializerForIE(s) {
                    var out = "";

                    out += "<" + s.nodeName;
                    for (var n = 0; n < s.attributes.length; n++) {
                        out += " " + s.attributes[n].name + "=" + "'" + s.attributes[n].value + "'";
                    }

                    if (s.hasChildNodes()) {
                        out += ">\n";

                        for (var n = 0; n < s.childNodes.length; n++) {
                            out += XMLSerializerForIE(s.childNodes[n]);
                        }

                        out += "</" + s.nodeName + ">" + "\n";

                    } else out += " />\n";

                    return out;
                }


                if (window.XMLSerializer) {
                    debug("using standard XMLSerializer.serializeToString")
                    return (new XMLSerializer()).serializeToString(svg);
                } else {
                    debug("using custom XMLSerializerForIE")
                    return XMLSerializerForIE(svg);
                }

            }

            function base64dataURLencode(s) {
                var b64 = "data:image/svg+xml;base64,";

                // https://developer.mozilla.org/en/DOM/window.btoa
                if (window.btoa) {
                    debug("using window.btoa for base64 encoding");
                    b64 += btoa(s);
                } else {
                    debug("using custom base64 encoder");
                    b64 += Base64.encode(s);
                }

                return b64;
            }

            function exportImage(type) {
                var canvas = document.createElement("canvas");
                var ctx = canvas.getContext('2d');

                // TODO: if (options.keepOutsideViewport), do some translation magic?

                var svg_img = new Image();
                var svg_xml = XMLSerialize(_svg);
                svg_img.src = base64dataURLencode(svg_xml);

                svg_img.onload = function() {
                    debug("exported image size: " + [svg_img.width, svg_img.height])
                    canvas.width = svg_img.width;
                    canvas.height = svg_img.height;
                    ctx.drawImage(svg_img, 0, 0);

                    // SECURITY_ERR WILL HAPPEN NOW
                    var png_dataurl = canvas.toDataURL(type);
                    debug(type + " length: " + png_dataurl.length);

                    if (options.callback) options.callback( png_dataurl );
                    else debug("WARNING: no callback set, so nothing happens.");
                }

                svg_img.onerror = function() {
                    console.log(
                        "Can't export! Maybe your browser doesn't support " +
                        "SVG in img element or SVG input for Canvas drawImage?\n" +
                        "http://en.wikipedia.org/wiki/SVG#Native_support"
                    );
                }

                // NOTE: will not return anything
            }

            function exportImageCanvg(type) {
                var canvas = document.createElement("canvas");
                var ctx = canvas.getContext('2d');
                var svg_xml = XMLSerialize(_svg);

                // NOTE: canvg gets the SVG element dimensions incorrectly if not specified as attributes
                //debug("detected svg dimensions " + [_svg.clientWidth, _svg.clientHeight])
                //debug("canvas dimensions " + [canvas.width, canvas.height])

                var keepBB = options.keepOutsideViewport;
                if (keepBB) var bb = _svg.getBBox();

                // NOTE: this canvg call is synchronous and blocks
                canvg(canvas, svg_xml, {
                    ignoreMouse: true, ignoreAnimation: true,
                    offsetX: keepBB ? -bb.x : undefined,
                    offsetY: keepBB ? -bb.y : undefined,
                    scaleWidth: keepBB ? bb.width+bb.x : undefined,
                    scaleHeight: keepBB ? bb.height+bb.y : undefined,
                    renderCallback: function() {
                        debug("exported image dimensions " + [canvas.width, canvas.height]);
                        var png_dataurl = canvas.toDataURL(type);
                        debug(type + " length: " + png_dataurl.length);

                        if (options.callback) options.callback( png_dataurl );
                    }
                });

                // NOTE: return in addition to callback
                return canvas.toDataURL(type);
            }

            // BEGIN MAIN

            if (!type) type = "image/svg+xml";
            if (!options) options = {};

            if (options.keepNonSafe) debug("NOTE: keepNonSafe is NOT supported and will be ignored!");
            if (options.keepOutsideViewport) debug("NOTE: keepOutsideViewport is only supported with canvg exporter.");

            switch (type) {
                case "image/svg+xml":
                    return exportSVG();
                    break;

                case "image/png":
                case "image/jpeg":

                    if (!options.renderer) {
                        if (window.canvg) options.renderer = "canvg";
                        else options.renderer="native";
                    }

                    switch (options.renderer) {
                        case "canvg":
                            debug("using canvg renderer for png export");
                            return exportImageCanvg(type);
                            break;

                        case "native":
                            debug("using native renderer for png export. THIS MIGHT FAIL.");
                            return exportImage(type);
                            break;

                        default:
                            debug("unknown png renderer given, doing noting (" + options.renderer + ")");
                    }

                    break;

                default:
                    debug("Sorry! Exporting as '" + type + "' is not supported!")
            }
        }
    </script>




    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">


    <link type="text/css" rel="stylesheet" href="{{asset('css/all.css')}}">
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
    @if(Session::get('nombre'))
    <div class="row">
        <div class="col-12 text-right ">
            <h5> <span class="badge badge-primary">{{ Session::get('nombre')}}    Periodo: {{ Session::get('nombre_periodo')}} </span></h5>
        </div>
    </div>
    @endif
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
                            <a class="nav-link" href="/inicioalu">Expediente</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href=actividad>Actividades</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href=calendario>Calendario de Eventos</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-capitalize" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Session::get('nombre') }} <span class="caret"></span>
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
                    @else
                        @if (Session::get('desarrollo'))
                            <div class="dropdown">
                                <a class="dropdown-toggle btn border-0" type="button" id="MenuCoordinador" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Desarrollo Académico
                                </a>
                                <div class="dropdown-menu" aria-labelledby="MenuDesarrollo">
                                    <a class="dropdown-item" href="desarrollovista">Coordinador Institucional</a>
                                    <a class="dropdown-item" href="asignacorgenvista">Asigna Coordinador Institucional</a>
                                    <a class="dropdown-item" href="planeaciondesarrollo">Planeación</a>
                                    <a class="dropdown-item" href="/estadisticas/carreras">Carreras</a>
                                </div>
                            </div>
                        @endif
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
                                @if (Session::get('jefe'))
                                    <div class="dropdown">
                                        <a class="dropdown-toggle btn border-0" type="button" id="MenuJefe" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Tutorías
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="MenuJefe">
                                            <a class="dropdown-item" href="jefevista">Tutores y Coordinador</a>
                                            <a class="dropdown-item" href="asignacovista">Asigna Coordinador</a>
                                            <a class="dropdown-item" href="asignatuvista">Asigna Tutor</a>
                                            <a class="dropdown-item" href="alumnos">Alumnos</a>
                                        </div>
                                    </div>
                                @endif
                                @if (Session::get('tutor'))
                                    <div class="dropdown">
                                        <a class="dropdown-toggle btn border-0" type="button" id="MenuTutor" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Tutorías
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="MenuTutor">
                                            <a class="dropdown-item" href="tutorvista">Grupos Tutorías</a>
                                            <a class="dropdown-item" href="eventos">Eventos</a>
                                            <a class="dropdown-item" href="desercion">Deserción</a>
                                            <a class="dropdown-item" href="reporte">Reporte</a>
                                            <a class="dropdown-item" href="planeaciontutor">Planeación</a>
                                        </div>
                                    </div>
                                @endif
                                    @if (Session::get('coordinador'))
                                        <div class="dropdown">
                                            <a class="dropdown-toggle btn border-0" type="button" id="MenuCoordinador" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Coordinador
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="MenuCoordinador">
                                                <a class="dropdown-item" href="carreras">{{ \Illuminate\Support\Facades\Session::get('coordinador')>1 ? 'Carreras':'Carrera' }}</a>
                                            </div>
                                        </div>
                                    @endif
                                    @if (Session::get('coordinadorgeneral'))
                                        <div class="dropdown">
                                            <a class="dropdown-toggle btn border-0" type="button" id="MenuCoordinador" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Coordinador Institucional
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="MenuCoordinadorGeneral">
                                                <a class="dropdown-item" href="planeacioncoorgen">Planeación</a>
                                                <a class="dropdown-item" href="/estadisticas/carreras">Carreras</a>
                                            </div>
                                        </div>
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
