@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <div class="container card">
        <div class="row">
            <div class="col-md-12">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        @foreach($tabla as $dato)
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#target_{{$dato->id}}" role="tab" aria-controls="target_{{$dato->id}}" aria-selected="false">{{$dato->sem}}</a>
                        @endforeach
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    @foreach($tabla1 as $dato)
                        <div class="tab-pane fade" id="target_{{$dato->id}}" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="container card">
                                <div class="row">
                                    <div class="col-md-12">
                                        <br>
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="primero" role="tabpanel" aria-labelledby="primero-tab">
                                                <br>
                                                <div class="form-group row">
                                                    <div class="col-sm-11" align="center"><h5>Planeación {{$dato->sem}} Semestre</h5></div>
                                                </div>
                                                <table class="table table-hover table-sm">
                                                    <tr>
                                                        <th>Fecha Inicio</th>
                                                        <th>Fecha Fin</th>
                                                        <th>Decripción Actividad</th>
                                                        <th>Objetivo</th>
                                                        <th>Instrucciones</th>
                                                        <th>Semestre</th>
                                                        <th>Sugerencia</th>
                                                        <th>Estrategia</th>
                                                    </tr>
                                                    @foreach($tabla1 as $dat)
                                                        @if($dato->id==$dat->id)
                                                            <tr onmouseover="this.style.backgroundColor='#DBE7F3'" onmouseout="this.style.backgroundColor='white'">
                                                                <td>{{$dat->fecha_inicio}}</td>
                                                                <td>{{$dat->fecha_fin}}</td>
                                                                <td>{{$dat->desc_actividad}}</td>
                                                                <td>{{$dat->objetivo}}</td>
                                                                <td>{{$dat->instrucciones}}</td>
                                                                <td>
                                                                    @foreach($semestre as $semes)
                                                                        @if($semes->id_semestre == $dat->id_semestre)
                                                                            {{$semes->descripcion}}
                                                                        @endif
                                                                    @endforeach
                                                                </td>
                                                                @if($dat->id_estrategia==0)
                                                                    @if($dat->id_sugerencia==0)
                                                                        <td>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span class="btn btn-primary" data-toggle="modal" data-target="#myModal_{{$dato->id_planeacion}}_tar" style="background: #067a39;color: white">Sugerir cambio</span>
                                                                            </button>
                                                                        </td>
                                                                        <td>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span class="btn btn-primary" data-toggle="modal" data-target="#myModal_{{$dato->id_planeacion}}_estrate" style="background: #067a39;color: white">Asignar estrategia</span>
                                                                            </button>
                                                                        </td>
                                                                    @else
                                                                        @if($dat->id_sugerencia==1)
                                                                            <td>
                                                                                <a>Sugerencia Aceptada</a>
                                                                            </td>
                                                                            <td>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span class="btn btn-primary" data-toggle="modal" data-target="#myModal_{{$dato->id_planeacion}}_estrate" style="background: #067a39;color: white">Asignar estrategia</span>
                                                                                </button>
                                                                            </td>
                                                                        @else
                                                                            @if($dat->id_sugerencia==3)
                                                                                <td>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span class="btn btn-primary" data-toggle="modal" data-target="#myModal_{{$dato->id_planeacion}}_tar" style="background: #067a39;color: white">Revisar sugerencia</span>
                                                                                    </button>
                                                                                </td>
                                                                                <td>
                                                                                    <a>Sugerencia No Aceptada, Corregir</a>
                                                                                </td>
                                                                            @endif
                                                                        @endif
                                                                    @endif
                                                                @else
                                                                    @if($dat->id_estrategia==2)
                                                                        <td>
                                                                            <a>Sin Sugerencias</a>
                                                                        </td>
                                                                        <td>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span class="btn btn-primary" data-toggle="modal" data-target="#myModal_{{$dato->id_planeacion}}_estrate" style="background: #067a39;color: white">Revisar estrategia</span>
                                                                            </button>
                                                                        </td>
                                                                    @else
                                                                        @if($dat->id_estrategia==1)
                                                                            <td>
                                                                                <a>Sin Sugerencias</a>
                                                                            </td>
                                                                            <td>
                                                                                <a>Estrategia Aceptada</a>
                                                                                @foreach($actividades as $acti)
                                                                                    @if($acti->id_planeacion == $dat->id_planeacion)
                                                                                    @else
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span class="btn btn-primary" data-toggle="modal" data-target="#myModal_{{$dato->id_planeacion}}_acti" style="background: #067a39;color: white">Asignar Actividad</span>
                                                                                        </button>
                                                                                    @endif
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span class="btn btn-primary" data-toggle="modal" data-target="#myModal_{{$dato->id_planeacion}}_actu " style="background: #067a39;color: white">Editar Actividad</span>
                                                                                        </button>
                                                                                @endforeach
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
            <!--<a class="btn btn-primary" data-toggle="modal" data-target="#myModal_{{$dat->id_planeacion}}" style="background: #f0f0f0;">
                                                                            <i class="fas fa-eye" style="color: black"></i>
                                                                        </a>-->
            <!--<a class="btn btn-primary" data-toggle="modal" data-target="#myModal_{{$dat->id_planeacion}}" style="background: #f0f0f0;">
                                                                        <i class="fas fa-eye" style="color: black"></i>
                                                                    </a>-->

                @foreach($tabla1 as $dato)
                    <div class="modal fade" id="myModal_{{$dato->id_planeacion}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <form>
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label>Objetivo</label>
                                            <textarea class="form-control" rows="3" id="desc_actividad" name="desc_actividad" disabled>{{$dato->desc_actividad}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Descripción de la actividad</label>
                                            <textarea class="form-control" rows="3" id="objetivo" name="objetivo" disabled>{{$dato->objetivo}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Instrucciones</label>
                                            <textarea class="form-control" rows="3" id="instrucciones" name="instrucciones" disabled>{{$dato->instrucciones}}</textarea>
                                        </div>
                                        <div style="display: none">
                                            <input type="number" class="form-control"  id="id_semestre" name="id_semestre" value="1">
                                            <input type="number" class="form-control"  id="id_estado" name="id_estado" value="0">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    @if(empty($actividades[0]))
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span class="btn btn-primary" data-toggle="modal" data-target="#myModal_{{$dato->id_planeacion}}_tar" style="background: #067a39;color: white">Sugerir cambio</span>
                                        </button>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span class="btn btn-primary" data-toggle="modal" data-target="#myModal_{{$dato->id_planeacion}}_acti" style="background: #067a39;color: white">Asignar Actividad</span>
                                        </button>
                                    @elseif($dato->id_sugerencia ==0 || $dato->id_sugerencia ==1)
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span class="btn btn-primary" data-toggle="modal" data-target="#myModal_{{$dato->id_planeacion}}_tar" style="background: #067a39;color: white">Sugerir cambio</span>
                                            </button>
                                        @else
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span class="btn btn-primary" data-toggle="modal" data-target="#myModal_{{$dato->id_planeacion}}_tar" style="background: #067a39;color: white">Sugerir cambio</span>
                                            </button>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span class="btn btn-primary" data-toggle="modal" data-target="#myModal_{{$dato->id_planeacion}}_acti" style="background: #067a39;color: white">Asignar Actividad</span>
                                            </button>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!--Modal Crear Sugerencia -->
                @foreach($tabla1 as $dato)
                    <div class="modal fade" id="myModal_{{$dato->id_planeacion}}_tar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Sugerencia</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('planeacion.update',$dato->id_planeacion)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="form-group col-md-12">
                                                <textarea class="form-control" rows="12" name="sugerencia">{{$dato->sugerencia}}</textarea>
                                                <textarea class="form-control" rows="12" name="comentarios" hidden>{{$dato->comentarios}}</textarea>
                                                <textarea class="form-control" rows="12" name="estrategia" hidden>{{$dato->estrategia}}</textarea>
                                                <input type="number" class="form-control" name="id_estado" value="1" hidden>
                                                <input type="number" class="form-control" name="id_sugerencia" value="0" hidden>
                                                <input type="number" class="form-control" name="id_estrategia" value="{{$dato->id_estrategia}}" hidden>
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

                <!--Modal Crear Estrategia -->
                @foreach($tabla1 as $dato)
                    <div class="modal fade" id="myModal_{{$dato->id_planeacion}}_estrate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Estrategia</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('planeacion.update',$dato->id_planeacion)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="form-group col-md-12">
                                                <textarea class="form-control" rows="12" name="estrategia">{{$dato->estrategia}}</textarea>
                                                <textarea class="form-control" rows="12" name="comentarios" hidden>{{$dato->comentarios}}</textarea>
                                                <textarea class="form-control" rows="12" name="sugerencia" hidden>{{$dato->sugerencia}}</textarea>
                                                <input type="number" class="form-control" name="id_estado" value="1" hidden>
                                                <input type="number" class="form-control" name="id_sugerencia" value="{{$dato->id_sugerencia}}" hidden>
                                                <input type="number" class="form-control" name="id_estrategia" value="2" hidden>
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

                <!--Modal Crear Actividad -->
                @foreach($tabla1 as $dato)
                    <div class="modal fade" id="myModal_{{$dato->id_planeacion}}_acti" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{url('actividades')}}" method="post">
                                    {{ csrf_field() }}
                                    <div class="modal-header">
                                        <h5 class="modal-title">Crear Actividad</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Titulo Actividad</label>
                                            <input type="text" class="form-control" id="titulo_act" name="titulo_act">
                                        </div>
                                        <div class="form-group">
                                            <label>Descripción de la actividad</label>
                                            <textarea class="form-control" rows="3" id="desc_act" name="desc_act"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Instrucciones</label>
                                            <textarea class="form-control" rows="3" id="instrucciones" name="instrucciones"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Seleccionar si el tutorado equiere subir evidencia</label>
                                            <input type="checkbox" class="" id="id_estado" name="id_estado" value="1">
                                        </div>
                                        <div style="display: none">
                                            <input type="number" class="form-control"  id="id_planeacion" name="id_planeacion" value="{{$dato->id_planeacion}}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                            <button type="submit" class="btn" style="background: #e0e0e0" id="trg1">Enviar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!--Modal Actualizar Actividad -->
                @foreach($actividades as $dato)
                    <div class="modal fade" id="myModal_{{$dato->id_planeacion}}_actu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{route('actividades.update',$dato->id_actividad)}}" method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title">Actualizar Actividad</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label>Titulo Actividad</label>
                                            <input type="text" class="form-control" id="titulo_act" name="titulo_act" value="{{$dato->titulo_act}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Descripción de la actividad</label>
                                            <textarea class="form-control" rows="3" id="desc_act" name="desc_act">{{$dato->desc_act}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Instrucciones</label>
                                            <textarea class="form-control" rows="3" id="instrucciones" name="instrucciones">{{$dato->instrucciones}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Seleccionar si el tutorado equiere subir evidencia</label>
                                            @if($dato->id_estado==1)
                                                <input type="checkbox" class="" id="id_estado" name="id_estado" value="1" checked>
                                            @else
                                                <input type="checkbox" class="" id="id_estado" name="id_estado" value="1">
                                            @endif
                                        </div>
                                        <div style="display: none">
                                            <input type="number" class="form-control"  id="id_planeacion" name="id_planeacion" value="{{$dato->id_planeacion}}">
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn" style="background: #e0e0e0">Enviar</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
<script src="{{asset('js/jquery.js')}}"></script>
<script>
    $(document).ready(function () {
        //alert("ok1");
        $('#final_primero').click(function(){
            //alert("ok2");
            var con= true;
            var datos = $('#form-expe_1').serialize();
            //alert("ok3")
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
                    alert("Hubo un error al insertar el dato, intentelo de nuevo")
                    console.log(request)
                    console.log(status)
                    console.log(data)
                }
            });
        });
    });
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("docente");
        filter = input.value.toUpperCase();
        table = document.getElementById("Table");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
    function verificar() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("verifica");
        filter = input.value.toUpperCase();
        table = document.getElementById("tabla_v");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>

