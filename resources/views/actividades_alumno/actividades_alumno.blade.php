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
                        <th>Actividad Planeacion</th>
                        <th>Actividad Evidencia</th>
                        <th>Descripcion Actividad Evidencia</th>
                        <th>Instrucciones</th>
                        <th>Evidencia</th>
                        <th>Accion</th>
                    </tr>

                    @foreach ($datos as $plan)
                            <tr onmouseover="this.style.backgroundColor='#DBE7F3'" onmouseout="this.style.backgroundColor='white'">
                                <td>{{$plan->desc_actividad}}</td>
                                <td>{{$plan->titulo_act}}</td>
                                <td>{{$plan->desc_act}}</td>
                                <td>{{$plan->instrucciones}}</td>
                                @if($plan->id_estado==1)
                                    @if($plan->evidencia==null)
                                        <td>Evidencia no agregada</td>
                                    @else
                                        <td><a href="{{url("/img/",$plan->evidencia)}}" target="_blank">Evidencia</a></td>
                                    @endif
                                @else
                                    <td>Esta actividad no requiere evidencia</td>
                                @endif

                                    @if($plan->id_estado==1)
                                    <td>
                                        <a class="btn btn-light" data-toggle="modal" data-target="#myModal_{{$plan->id_actividad}}_tar">
                                            Subir Evidencia
                                        </a>
                                    </td>
                                    @else
                                        <td>Esta actividad no requiere evidencia</td>
                                    @endif
                            </tr>
                    @endforeach
                </table>
            </div>
        </div>

        @foreach($datos as $dato)
            <div class="modal fade" id="myModal_{{$dato->id_actividad}}_tar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Evidencia</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('actividad.update',$dato->id_actividad)}}" method="post" enctype="multipart/form-data">
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






        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" name="evidencia">Seleccione archivoooooo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div><input type="file"></div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Subir</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal proyecto de vida-->
        <div class="modal fade" id="modalproyectodevida" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog" role="document" style="height:500px;overflow:auto;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Proyecto de vida</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ¿Qué es un proyecto de vida?<br>
                        Un proyecto de vida es una herramienta que te ayuda a describir tus objetivos a medio-largo plazo para
                        poder posteriormente crear una planificación que te acerque a conseguirlos. <br> <br>

                        Consiste en una serie de preguntas que te invitan a conectar con tu interior
                            analizar tu situación actual para ver lo que querrías cambiar y hacia dónde te querrías dirigir a partir de ahora.<br> <br>

                        ¿Cómo hago mi proyecto de vida?<br><br>
                        La pregunta principal que tu proyecto de vida va a resolver es: ¿en qué punto de mi vida me encuentro ahora mismo y adónde quiero llegar?<br><br>
                        1.	¿Dónde me encuentro? – Análisis de tu punto de partida. Reflexionar sobre tu situación actual puede ayudarte a identificar problemas,
                        inseguridades y aspectos de tu vida que desearías cambiar en un futuro.<br><br>
                        2.	¿Cómo he llegado hasta aquí? – Reflexión sobre tus decisiones hasta la fecha. Reconocer los patrones que has seguido
                        en tu toma de decisiones y los factores que más te han influenciado te ayudará a reflexionar sobre los valores que
                        quieres que dirijan tu vida y analizar si te permitirán acercarte a conseguir tus sueños y tus objetivos personales.<br><br>
                        3.	¿Hacia dónde me dirijo? – Identifica tus propósitos. Formula tu misión en la vida, lo que verdaderamente te gustaría alcanzar.<br><br>
                        4.	Visualiza tus objetivos. Estas preguntas te ayudan a imaginar de la forma más detallada posible cómo sería tu vida
                        si tus objetivos se hubieran hecho realidad<br><br>
                        5.	Conclusión

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection








