@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <div class="container card">
        <div class="row">
            <div class="col-md-12">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link" href="{{ url('dep_desarrollo')}}">Primero</a>
                        <a class="nav-item nav-link" href="{{ url('dep_segundo')}}">Segundo</a>
                        <a class="nav-item nav-link" href="{{ url('dep_tercero')}}">Tercero</a>
                        <a class="nav-item nav-link" href="{{ url('dep_cuarto')}}">Cuarto </a>
                        <a class="nav-item nav-link" href="{{ url('dep_quinto')}}">Quinto </a>
                        <a class="nav-item nav-link" href="{{ url('dep_sexto')}}">Sexto </a>
                        <a class="nav-item nav-link" href="{{ url('dep_septimo')}}">Septimo </a>
                        <a class="nav-item nav-link" href="{{ url('dep_octavo')}}">Octavo </a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="tercero" role="tabpanel" aria-labelledby="tercero-tab">
                        <br>
                        <div class="form-group row">
                            <div class="col-sm-11" align="center"><h5>Planeación Tercer Semestre</h5></div>
                        </div>
                        <table class="table table-hover table-sm">
                            <tr>
                                <th>Descripción de la actividad</th>
                                <th>Revisar Actividad</th>
                            </tr>

                            @foreach ($planeacion as $plan)
                                @if($plan->id_semestre==3 && $plan->id_estado==0)
                                    <tr onmouseover="this.style.backgroundColor='#DBE7F3'" onmouseout="this.style.backgroundColor='white'">
                                        <td>{{$plan->desc_actividad}}</td>
                                        <td>
                                            <form method="post">
                                                <a class="btn btn-lg" href="{{route('dep_desarrollo.edit',$plan->id_planeacion)}}" style="background: #f0f0f0;">
                                                    <i class="fas fa-eye" style="color: black"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
