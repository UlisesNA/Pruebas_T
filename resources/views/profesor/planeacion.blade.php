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
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#target_{{$dato->id_generacion}}" role="tab" aria-controls="target_{{$dato->id_generacion}}" aria-selected="false">Generación {{$dato->generacion}}</a>
                        @endforeach
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    @foreach($tabla1 as $dato)
                        <div class="tab-pane fade" id="target_{{$dato->id_generacion}}" role="tabpanel" aria-labelledby="nav-profile-tab">
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
                                                    @foreach($tabla1 as $dat)
                                                        @if($dato->id_generacion==$dat->id_generacion)
                                                            <tr onmouseover="this.style.backgroundColor='#DBE7F3'" onmouseout="this.style.backgroundColor='white'">
                                                                <td>{{$dat->fi_actividad}}</td>
                                                                <td>{{$dat->ff_actividad}}</td>
                                                                <td>{{$dat->desc_actividad}}</td>
                                                                <td>{{$dat->objetivo_actividad}}</td>
                                                                @if($dat->id_sugerencia==null)
                                                                    @if($dat->id_estrategia==null)
                                                                        <td>
                                                                            <a class="btn btn-lg" data-toggle="modal" data-target="#myModal_{{$dat->id_asigna_planeacion_tutor}}_su" style="background: #f0f0f0;">
                                                                                <i class="fas fa-pen" style="color: black">agregar sugerenca</i>
                                                                            </a>
                                                                        </td>
                                                                        <td>
                                                                            <a class="btn btn-lg" data-toggle="modal" data-target="#myModal_{{$dat->id_asigna_planeacion_tutor}}_es" style="background: #f0f0f0;">
                                                                                <i class="fas fa-pen" style="color: black">agregar estrategia</i>
                                                                            </a>
                                                                        </td>
                                                                    @else
                                                                        @if($dat->id_estrategia==2)
                                                                            <td>
                                                                                <a>
                                                                                    Estrategia Asignada
                                                                                </a>
                                                                            </td>
                                                                            <td>
                                                                                <a class="btn btn-lg" data-toggle="modal" data-target="#myModal_{{$dat->id_asigna_planeacion_tutor}}_es" style="background: #f0f0f0;">
                                                                                    <i class="fas fa-eye" style="color: black">ver/editar estrategia</i>
                                                                                </a>
                                                                            </td>
                                                                        @else
                                                                            <td>
                                                                                <a>
                                                                                    Sugerencia Aceptada
                                                                                </a>
                                                                            </td>
                                                                            <td>
                                                                                <a>
                                                                                    Estrategia Aceptada
                                                                                </a>
                                                                            </td>
                                                                        @endif
                                                                    @endif
                                                                @else
                                                                    @if($dat->id_sugerencia==2)
                                                                        @if($dat->id_estrategia==null)
                                                                            <td>
                                                                                <a class="btn btn-lg" data-toggle="modal" data-target="#myModal_{{$dat->id_asigna_planeacion_tutor}}_su" style="background: #f0f0f0;">
                                                                                    <i class="fas fa-pen" style="color: black">ver/editar sugerencia</i>
                                                                                </a>
                                                                            </td>
                                                                            <td>
                                                                                <a>
                                                                                    Sugerencia Asignada
                                                                                </a>
                                                                            </td>
                                                                        @else
                                                                            @if($dat->id_estrategia==2)
                                                                                <td>
                                                                                    <a>
                                                                                        Estrategia Asignada
                                                                                    </a>
                                                                                </td>
                                                                                <td>
                                                                                    <a class="btn btn-lg" data-toggle="modal" data-target="#myModal_{{$dat->id_asigna_planeacion_tutor}}_es" style="background: #f0f0f0;">
                                                                                        <i class="fas fa-eye" style="color: black"></i>
                                                                                    </a>
                                                                                </td>
                                                                            @endif
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


    @foreach($tabla1 as $dato)
        <div id="myModal_{{$dato->id_asigna_planeacion_tutor}}_es" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        @if($dato->id_estrategia!=null)
                            <h5 class="modal-title">Actualizar Estrategia</h5>
                        @else
                            <h5 class="modal-title">Estrategia</h5>
                        @endif
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('tercer_sem.update',$dato->id_asigna_planeacion_tutor)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group col-md-12">
                                <textarea required class="form-control" rows="8" id="estrategia" name="estrategia">{{$dato->estrategia}}</textarea>
                                <label>Requiere subir evidencia</label>
                                @if($dato->requiere_evidencia==1)
                                    <input type="checkbox" class="" id="requiere_evidencia" name="requiere_evidencia" value="1" checked>
                                @else
                                    <input type="checkbox" class="" id="requiere_evidencia" name="requiere_evidencia" value="1">
                                @endif
                                <input type="number" class="form-control" name="id_estrategia" value="2" hidden>
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

    <!-- crear sugerencia-->
    @foreach($tabla1 as $dato)
        <div id="myModal_{{$dato->id_asigna_planeacion_tutor}}_su" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        @if($dato->id_sugerencia!=null)
                            <h5 class="modal-title">Actualizar Sugerencia</h5>
                        @else
                            <h5 class="modal-title">Sugerencia</h5>
                        @endif
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('cuarto_sem.update',$dato->id_asigna_planeacion_tutor)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            @if($dato->id_sugerencia!=null)
                                <div class="form-group col-md-12">
                                    <label>Decripción Actividad</label>
                                    <textarea class="form-control" rows="4" disabled>{{$dato->desc_actividad}}</textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Sugerencia de Cambio de Decripción Actividad</label>
                                    <textarea class="form-control" rows="4" name="desc_actividad_cambio">{{$dato->desc_actividad_cambio}}</textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Objetivo</label>
                                    <textarea class="form-control" rows="4" disabled>{{$dato->objetivo_actividad}}</textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Sugerencia de Cambio de Objetivo</label>
                                    <textarea class="form-control" rows="4" name="objetivo_actividad_cambio">{{$dato->objetivo_actividad_cambio}}</textarea>
                                </div>
                            @else
                                <div class="form-group col-md-12">
                                    <label>Decripción Actividad</label>
                                    <textarea class="form-control" rows="4" disabled>{{$dato->desc_actividad}}</textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Sugerencia de Cambio de Decripción Actividad</label>
                                    <textarea class="form-control" rows="4" name="desc_actividad_cambio">{{$dato->desc_actividad}}</textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Objetivo</label>
                                    <textarea class="form-control" rows="4" disabled>{{$dato->objetivo_actividad}}</textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Sugerencia de Cambio de Objetivo</label>
                                    <textarea class="form-control" rows="4" name="objetivo_actividad_cambio">{{$dato->objetivo_actividad}}</textarea>
                                </div>
                            @endif
                        </div>
                        <input type="number" class="form-control" name="id_sugerencia" value="2" hidden>
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
