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
                        @foreach($tabla as $dato)
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#target_{{$dato->id_asigna_generacion}}" role="tab" aria-controls="target_{{$dato->id_asigna_generacion}}" aria-selected="false">Generacion {{$dato->generacion}}</a>
                        @endforeach
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    @foreach($tabla as $dato)
                        <div class="tab-pane fade" id="target_{{$dato->id_asigna_generacion}}" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="container card">
                                <div class="row">
                                    <div class="col-md-12">
                                        <br>
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="primero" role="tabpanel" aria-labelledby="primero-tab">
                                                <br>
                                                <div class="form-group row">
                                                    <div class="col-sm-11" align="center"><h5>Planeación Generacion {{$dato->generacion}}</h5></div>
                                                </div>
                                                <table class="table table-hover table-sm">
                                                    <tr>
                                                        <th>Fecha Inicio</th>
                                                        <th>Fecha Fin</th>
                                                        <th>Decripción Actividad</th>
                                                        <th>Revisar</th>
                                                    </tr>
                                                    @foreach($tabla1 as $dat)
                                                        @if($dato->id_generacion==$dat->id_generacion)
                                                            <tr onmouseover="this.style.backgroundColor='#DBE7F3'" onmouseout="this.style.backgroundColor='white'">
                                                                <td>{{$dat->fi_actividad}}</td>
                                                                <td>{{$dat->ff_actividad}}</td>
                                                                <td>{{$dat->desc_actividad}}</td>
                                                                @if($dat->id_estado == 2)
                                                                    <td>
                                                                        <a class="btn btn-lg" data-toggle="modal" data-target="#myModal_{{$dat->id_plan_actividad}}_tar" style="background: #f0f0f0;">
                                                                            <i class="fas fa-eye" style="color: black"></i>
                                                                        </a>
                                                                    </td>
                                                                @else
                                                                    @if($dat->id_estado == 3)
                                                                    <td>
                                                                        <a>
                                                                           Actividad Revisada
                                                                        </a>
                                                                    </td>
                                                                    @else
                                                                        @if($dat->id_estado == 1)
                                                                            <td>
                                                                                <a>
                                                                                    Actividad Aprobada
                                                                                </a>
                                                                            </td>
                                                                        @endif
                                                                    @endif
                                                                @endif
                                                            </tr>
                                                        @endif
                                                    @endforeach
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
        </div>
    </div>

    <!-- crear actividad-->
    @foreach($tabla as $dato)
        <div class="modal fade" id="myModal_{{$dato->id_generacion}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{url('actividades')}}" method="post">
                        <div class="modal-body">

                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="row">

                                    <div class="col">
                                        <label >Fecha Inicio</label>
                                        <input type="date" class="form-control" id="fi_actividad" name="fi_actividad" min="">
                                    </div>
                                    <div class="col">
                                        <label >Fecha Limite</label>
                                        <input type="date" class="form-control"  id="ff_actividad" name="ff_actividad" min="" max="">
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <label>Descripción de la actividad</label>
                                <textarea class="form-control" rows="3" id="desc_actividad" name="desc_actividad"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Objetivo</label>
                                <textarea class="form-control" rows="3" id="objetivo_actividad" name="objetivo_actividad"></textarea>
                            </div>
                            <div style="display: none">
                                <input type="number" class="form-control"  id="id_generacion" name="id_generacion" value="{{$dato->id_generacion}}">
                                <input type="number" class="form-control"  id="id_estado" name="id_estado" value="2">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" style="background: #0c7a0e" id="trg1">Guardar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    @endforeach

    <!-- revisar actividad-->
    @foreach($tabla1 as $dato)
        <div class="modal fade" id="myModal_{{$dato->id_plan_actividad}}_tar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Actividad</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('dep_desarrollo.update',$dato->id_asigna_planeacion_actividad)}}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="modal-body">
                                @if($dato->comentario == NULL)
                                @else
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Correciones anteriores</label>
                                            <textarea class="form-control" rows="3" disabled>{{$dato->comentario}}</textarea>
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <div class="row">

                                        <div class="col">
                                            <label >Fecha Inicio</label>
                                            <input type="text" class="form-control" id="fi_actividad" name="fi_actividad" min="" value="{{$dato->fi_actividad}}" disabled>
                                        </div>
                                        <div class="col">
                                            <label >Fecha Limite</label>
                                            <input type="text" class="form-control"  id="ff_actividad" name="ff_actividad" min="" max="" value="{{$dato->ff_actividad}}" disabled>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Descripción de la actividad</label>
                                    <textarea class="form-control" rows="3" id="desc_actividad" name="desc_actividad" disabled>{{$dato->desc_actividad }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Objetivo</label>
                                    <textarea class="form-control" rows="3" id="objetivo_actividad" name="objetivo_actividad" disabled>{{$dato->objetivo_actividad}}</textarea>
                                </div>
                                    <input type="number" class="form-control" name="id_estado" value="1" hidden>
                            </div>
                            <div class="modal-footer">
                                    <div align="center"><button type="submit" class="btn" style="background: #e0e0e0">Aprobar</button></div>
                                <div class="form-group col-md-6">
                                    <div align="center">
                                        <a data-toggle="modal" data-target="#coment_{{$dato->id_asigna_planeacion_actividad}}" class="btn" style="background: #e0e0e0;color: black">Reenviar</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    @endforeach
    @foreach($tabla1 as $dato)
        <div id="coment_{{$dato->id_asigna_planeacion_actividad}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Correcciones</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('dep_segundo.update',$dato->id_asigna_planeacion_actividad)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group col-md-12">
                            <textarea class="form-control" rows="8" name="comentario"></textarea>
                            <input type="number" class="form-control" name="id_estado" value="3" hidden>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div align="center"><button type="submit" class="btn" style="background: #e0e0e0">Enviar</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

@endsection
<script src="{{asset('js/jquery.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#final_primero').click(function(){
            var con= true;
            var datos = $('#form-expe_1').serialize();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "actividades",
                method: "POST",
                dataType: "json",
                data:datos,
                success:function (data) {
                    location.reload();
                },
                error:function(request,status,data)
                {
                    console.log(request);
                    console.log(status);
                    console.log(data);
                    alert("Hubo un error al insertar el dato, intentelo de nuevo");
                }
            });
        });
    });
</script>