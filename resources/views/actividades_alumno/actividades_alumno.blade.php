@extends('layouts.app')
@section('content')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <div class="container card">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="primero" role="tabpanel" aria-labelledby="primero-tab">
                <br>
                <div class="form-group row">
                    <div class="col-sm-11" align="center"><h5>Actividades</h5></div>
                </div>
                <table class="table table-hover table-sm">
                    <tr>
                        <th>Actividad</th>
                        <th>Objetivo</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Estrategia</th>
                    </tr>
                    @foreach ($datos as $plan)
                        <tr onmouseover="this.style.backgroundColor='#DBE7F3'" onmouseout="this.style.backgroundColor='white'">
                            <td>{{$plan->desc_actividad}}</td>
                            <td>{{$plan->objetivo_actividad}}</td>
                            <td>{{$plan->fi_actividad}}</td>
                            <td>{{$plan->ff_actividad}}</td>
                            <td>{{$plan->estrategia}}</td>
                            @foreach($datos1 as $plan1)
                                @if($plan->requiere_evidencia==1)

                                    @if($plan1->evidencia==null)
                                        <td>Evidencia no agregada</td>
                                    @else
                                        <td><a href="{{url("/img/",$plan1->evidencia)}}" target="_blank">Evidencia</a></td>
                                    @endif
                                @else

                                @endif

                                @if($plan->requiere_evidencia==1)
                                    <td>
                                        <a class="btn btn-light" data-toggle="modal" data-target="#myModal_{{$plan1->id_evidencia}}_tar">
                                            Subir Evidencia
                                        </a>
                                    </td>
                                @else
                                    <td>Esta actividad no requiere evidencia</td>
                                @endif
                        </tr>
                    @endforeach
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    @foreach($datos1 as $dato)
        <div class="modal fade" id="myModal_{{$dato->id_evidencia}}_tar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Evidencia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('actividad.update',$dato->id_evidencia)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-group col-md-12">
                                    <input type="file" class="form-control" name="evidencia">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div align="center">
                                    <button type="submit" class="btn" style="background: #e0e0e0">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection












