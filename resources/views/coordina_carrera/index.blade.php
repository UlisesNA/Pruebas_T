@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel='stylesheet' href='{{ asset('css/sweetalert2.min.css') }}' />
    <script src="{{asset('js/sweetalert2.min.js')}}"></script>
    <div class="container card">
        <div class="row">
            <div class="col-md-12">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        @foreach($carreras as $dato)
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#target_{{$dato->id_carrera}}" role="tab" aria-controls="target_{{$dato->id_carrera}}" aria-selected="false">{{$dato->nombre}}</a>
                        @endforeach
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <br>
                    @foreach($carreras as $dato)
                        <div class="tab-pane fade" id="target_{{$dato->id_carrera}}" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="dropdown">
                                @foreach($datos as $dato)
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Generacion {{$dato->generacion}}
                                    </button>
                                    @foreach($datos as $dato)
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#target_{{$dato->grupo}}">Grupo {{$dato->grupo}}</a>
                                        </div>
                                    @endforeach

                                @endforeach
                                @foreach($datos as $dato)
                                        <div class="" id="target_{{$dato->grupo}}">
                                            <div class="container card">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <br>
                                                        <div class="tab-content" id="nav-tabContent">
                                                            <div class="tab-pane fade show active" id="primero" role="tabpanel" aria-labelledby="primero-tab">
                                                                <br>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-11" align="center"><h5>Planeación Generación {{$dato->generacion}}</h5></div>
                                                                </div>
                                                                <table class="table table-hover table-sm">
                                                                    <tr>
                                                                        <th>Fecha Inicio</th>
                                                                        <th>Fecha Fin</th>
                                                                        <th>Decripción Actividad</th>
                                                                        <th>Objetivo</th>
                                                                        <th>Sugerencia</th>
                                                                        <th>Estrategia</th>
                                                                    </tr>

                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection