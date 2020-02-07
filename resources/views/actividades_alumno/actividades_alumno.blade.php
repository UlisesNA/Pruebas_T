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
                            <td>
                                @if($plan->requiere_evidencia==null)
                                    <h6>No requiere evidencia</h6>
                                @endif
                                @if(isset($plan->evidencia[0]))
                                    <a href="{{url("/img/",$plan->evidencia[0]->evidencia)}}" target="_blank">Evidencia</a>
                                @else
                                    @if($plan->requiere_evidencia==1)
                                            <button type="button" class="btn btn-success edit" value="{{$plan->id_asigna_planeacion_tutor}}">
                                                <span class="glyphicon-edit"></span>Subir evidencia</button>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <form action="{{url('actividad')}}" method="post">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="container-fluid">
                        <div class="form-group col-md-12">
                            <input type="file" class="form-control" name="evidencia" id="evidencia" >
                            <input type="number" id="id_asigna_planeacion_tutor" hidden>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                    <button type="submit" class="btn btn-primary" style="background: #0c7a0e" id="trg1"><span class="glyphicon glyphicon-edit"></span>Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $(document).on('click', '.edit', function(){
                var id=$(this).val();

                $('#edit').modal('show');
                $('#id_asigna_planeacion_tutor').val(id);
            });
        });
    </script>
@endsection












