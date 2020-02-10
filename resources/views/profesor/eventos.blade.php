@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel='stylesheet' href='{{ asset('css/sweetalert2.min.css') }}' />
    <script src="{{asset('js/sweetalert2.min.js')}}"></script>
    <div class="container card">
        <div class="row">
            <div class="col-md-12">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="primero" role="tabpanel" aria-labelledby="primero-tab">
                        <br>
                        <div class="form-group row">
                            <div class="col-sm-11" align="center"><h5>Eventos</h5></div>
                            <a class="btn btn-primary" data-toggle="modal" data-target="#myModal_1" style="background: #067a39;color: white">+</a>
                        </div>
                        <table class="table table-hover table-sm">
                            <tr>
                                <th>Titulo Evento</th>
                                <th>Descripcion Evento</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Modificar Evento</th>
                                <th>Eliminar Evento</th>
                            </tr>

                            @foreach ($eventos as $plan)
                                    <tr onmouseover="this.style.backgroundColor='#DBE7F3'" onmouseout="this.style.backgroundColor='white'">
                                        <td>{{$plan->titulo_evento}}</td>
                                        <td>{{$plan->desc_evento}}</td>
                                        <td>{{$plan->fecha}}</td>
                                        <td>{{$plan->hora}}</td>
                                        <td>
                                            <a class="btn btn-lg" data-toggle="modal" data-target="#myModal_{{$plan->id_evento}}_tar" style="background: #f0f0f0;">
                                                <i class="fas fa-eye" style="color: black"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('eventos.destroy', $plan->id_evento)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-lg" id="final"><i class="fas fa-times-circle"></i></button>
                                                
                                            </form>
                                        </td>
                                    </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach($eventos as $dato)
        <div class="modal fade" id="myModal_{{$dato->id_evento}}_tar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Sugerencia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('eventos.update',$dato->id_evento)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-group">
                                    <label >Fecha Evento</label>
                                    <input type="date" class="form-control" id="fecha" name="fecha" value="{{$dato->fecha}}">
                                </div>
                                <div class="form-group">
                                    <label>Titulo del Evento</label>
                                    <input class="form-control" type="text" id="titulo_evento" name="titulo_evento" value="{{$dato->titulo_evento}}">
                                </div>
                                <div class="form-group">
                                    <label>Descripción del Evento</label>
                                    <textarea class="form-control" rows="3" id="desc_evento" name="desc_evento">{{$dato->desc_evento}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Hora del Evento</label>
                                    <input class="form-control" type="time" id="hora" name="hora" value="{{$dato->hora}}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div align="center"><button type="submit" class="btn" style="background: #e0e0e0">Enviar</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="modal fade" id="myModal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="form-expe_1">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label >Fecha Evento</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" required>
                        </div>
                        <div class="form-group">
                            <label>Titulo del Evento</label>
                            <input class="form-control" type="text" id="titulo_evento" name="titulo_evento" required>
                        </div>
                        <div class="form-group">
                            <label>Descripción del Evento</label>
                            <textarea class="form-control" rows="3" id="desc_evento" name="desc_evento"  required></textarea >
                        </div>
                        <div class="form-group">
                            <label>Hora del Evento</label>
                            <input class="form-control" type="time" id="hora" name="hora" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary" id="final_primero" data-dismiss="modal" style="color: white">Agregar</a>
                </div>
            </div>
        </div>
    </div>
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
                url: "eventos",
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
                    alert("Falto 1 o más campos por llenar");
                }
            });
        });
    });
</script>

