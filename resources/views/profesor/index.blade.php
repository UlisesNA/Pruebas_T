@extends('layouts.app')
@section('content')
    <div class="container" id="ind">
        <div class="row" v-show="menugrupos==true">
            <div class="col-12">
                <div class="row">
                    <div class="col-3" v-for="grupo in grupos">
                        <div class="card">
                            <div class="card-header text-center font-weight-bold"> @{{ grupo.nombre }}</div>
                            <div class="card-body text-center">
                                <h5 class="card-title">Generación @{{ grupo.generacion }}</h5>
                                <p class="card-text">Grupo @{{ grupo.grupo }}</p>
                                <a href="#" @click="getlista(grupo)" class="btn btn-outline-primary">Ver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" v-show="menu==true">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-9 text-center font-weight-bold">@{{ carrera }}</div>
                            <div class="col-1"><button class="btn text-white btn-success" @click="getAlumnos()" data-toggle="tooltip" data-placement="bottom" title="Lista"><i class="fas fa-list"></i></button></div>
                            <div class="col-1"><button class="btn text-white btn-primary" @click="graficagenero()" data-toggle="tooltip" data-placement="bottom" title="Gráficas"><i class="fas fa-chart-pie"></i></button></div>
                            <div class="col-1"><button class="btn text-white btn-danger"  @click="getAlumnos1()"><i class="fas fa-file-alt"></i></button></div>
                        </div>
                        <div class="row"><div class="col-9 text-center">@{{ gen }}</div></div>
                    </div>
                    <div class="card-body" v-show="lista==true" >
                        <div class="row">
                            <div class="col-12">
                                <div class="row pb-2">
                                    <div class="col-11"></div>
                                    <button @click="pdf()" target="_blank" class="btn btn-danger text-white float-right" data-toggle="tooltip" data-placement="bottom" title="Generar lista"> <i class="fas fa-file-pdf"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-sm">
                                    <thead class=" text-center" >
                                    <tr class="">
                                        <th>Cuenta</th>
                                        <th>Nombre</th>
                                        <th>Normal, Baja temporal, Baja definitiva</th>
                                        <th>Expediente</th>
                                        <th>Canalización</th>
                                    </tr>
                                    </thead>
                                    <tbody class="">
                                    <tr v-for="alumno in datos">
                                        <td class="text-center font-weight-bold" v-bind:class="[alumno.estado==2 ? 'bg-warning' : alumno.estado==3 ? 'bg-danger':'']">@{{ alumno.cuenta }}</td>
                                        <td class="">@{{ alumno.apaterno }} @{{ alumno.amaterno }} @{{ alumno.nombre }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-outline-success" @click="cambio(alumno,1)" data-toggle="tooltip" data-placement="bottom" title="Normal"><i class="fas fa-check-circle"></i></button>
                                            <button class="btn btn-outline-warning m-1" @click="cambio(alumno,2)" data-toggle="tooltip" data-placement="bottom" title="Baja temporal"><i class="fas fa-minus-circle"></i></button>
                                            <button class="btn btn-outline-danger m-1" @click="cambio(alumno,3)" data-toggle="tooltip" data-placement="bottom" title="Baja definitiva"><i class="fas fa-times-circle"></i></button>
                                           <!-- <i class="fas h2 text-success fa-check-circle pt-2"></i>-->
                                        </td>
                                        <td class="text-center" v-if="alumno.expediente">
                                            <button class="btn btn-outline-primary m-1" @click="ver(alumno)" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="far fa-edit"></i></button>
                                            <button class="btn btn-outline-danger" @click="pdfAlumno(alumno)" data-toggle="tooltip" data-placement="bottom" title="Expediente"><i class="far fa-file-pdf"></i></button>
                                        </td>
                                        <td v-else class="text-center"><i class="fas h4 fa-times text-danger pt-2"></i></td>
                                        <td class="text-center"><button class="btn btn-outline-secondary"  @click="getAlumnos2(alumno)"><i class="fas fa-check-square"></i></button></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card-body" v-show="listaa==true" >
                        <div class="row">
                            <div class="col-md-12">
                                <br>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="primero" role="tabpanel" aria-labelledby="primero-tab">
                                        <br>
                                        <div class="form-group row">
                                            <div class="col-sm-11" align="center"><h5>Planeación</h5></div>
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
                                            @foreach($semestre as $dat)
                                                <tr onmouseover="this.style.backgroundColor='#DBE7F3'" onmouseout="this.style.backgroundColor='white'">
                                                    <td class="date">{{$dat->fecha_inicio}}</td>
                                                    <td>{{$dat->fecha_fin}}</td>
                                                    <td>{{$dat->desc_actividad}}</td>
                                                    <td>{{$dat->objetivo}}</td>
                                                    <td>{{$dat->instrucciones}}</td>
                                                    <td>
                                                        @foreach($semestre1 as $semes)
                                                            @if($semes->id_semestre == $dat->id_semestre)
                                                                {{$semes->descripcion}}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    @if($dat->id_estrategia==0)
                                                        @if($dat->id_sugerencia==0)
                                                            <td>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span class="btn btn-primary" data-toggle="modal" data-target="#myModal_{{$dat->id_planeacion}}_tar" style="background: #067a39;color: white">Sugerir cambio</span>
                                                                </button>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span class="btn btn-primary" data-toggle="modal" data-target="#myModal_{{$dat->id_planeacion}}_estrate" style="background: #067a39;color: white">Asignar estrategia</span>
                                                                </button>
                                                            </td>
                                                        @else
                                                            @if($dat->id_sugerencia==1)
                                                                <td>
                                                                    <a>Sugerencia Aceptada</a>
                                                                </td>
                                                                <td>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span class="btn btn-primary" data-toggle="modal" data-target="#myModal_{{$dat->id_planeacion}}_estrate" style="background: #067a39;color: white">Asignar estrategia</span>
                                                                    </button>
                                                                </td>
                                                            @else
                                                                @if($dat->id_sugerencia==3)
                                                                    <td>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span class="btn btn-primary" data-toggle="modal" data-target="#myModal_{{$dat->id_planeacion}}_tar" style="background: #067a39;color: white">Revisar sugerencia</span>
                                                                        </button>
                                                                    </td>
                                                                    <td>
                                                                        <a>Sugerencia No Aceptada, Corregir</a>
                                                                    </td>
                                                                @else
                                                                    @if($dat->id_sugerencia==2)
                                                                        <td>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span class="btn btn-primary" data-toggle="modal" data-target="#myModal_{{$dat->id_planeacion}}_tar" style="background: #067a39;color: white">Editar sugerencia</span>
                                                                            </button>
                                                                        </td>
                                                                        <td>
                                                                            <a>Sugerencia Aun no Revisada</a>
                                                                        </td>
                                                                    @endif
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
                                                                    <span class="btn btn-primary" data-toggle="modal" data-target="#myModal_{{$dat->id_planeacion}}_estrate" style="background: #067a39;color: white">Revisar estrategia</span>
                                                                </button>
                                                            </td>
                                                        @else
                                                            @if($dat->id_estrategia==1)
                                                                <td>
                                                                    <a>Sin Sugerencias</a>
                                                                </td>
                                                                <td>
                                                                    <a>Estrategia Aceptada</a>
                                                                </td>
                                                            @endif
                                                        @endif
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" v-show="listacanaliza==true" >
                        <div  v-for="alumno in datos1">
                            <form action="{{url('canalizacion')}}" method="post">
                                {{ csrf_field() }}
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header"></div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12 ">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                <tr>
                                                                    <th scope="col" colspan="4" class="text-center">DATOS DEL ESTUDIANTE</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td scope="col" colspan="3">
                                                                        CARRERA: @{{alumno.carre}}
                                                                    </td>
                                                                    <td scope="col">SEMESTRE: @{{alumno.sem}}
                                                                    </td>
                                                                    <td scope="col" >FECHA CITA ANTERIOR: <input type="date" class="form-control" id="fecha_canalizacion_anterior" name="fecha_canalizacion_anterior"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row" colspan="3">NOMBRE DEL ESTUDIANTE: @{{alumno.nombre}} @{{alumno.apaterno}} @{{alumno.amaterno}}</td>
                                                                    <td>GRUPO:
                                                                        @{{alumno.grup}}
                                                                    </td>
                                                                    <td scope="col" >FECHA CITA: <input type="date" class="form-control" id="fecha_canalizacion" name="fecha_canalizacion"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td scope="row" colspan="3">NOMBRE DEL TUTOR:
                                                                        @foreach ($tutor as $dato)
                                                                            {{$dato->nombre}}
                                                                        @endforeach
                                                                    </td>
                                                                    <td>HORA: <input type="time" class="form-control" id="hora" name="hora" ></td>
                                                                    </td>
                                                                    <td scope="col" >FECHA DE SIGUIENTE CITA: <input type="date" class="form-control" id="fecha_canalizacion_siguiente" name="fecha_canalizacion"></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>


                                                            <table class="table table-bordered">
                                                                <thead>
                                                                <tr>
                                                                    <th scope="col" colspan="4" class="text-center">OBSERVACIONES</th>
                                                                    <th scope="col" class="text-center">OBSERVACIONES GENERALES</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <th scope="row" colspan="3" >Aspectos sociológicos</th>
                                                                    <th scope="row" colspan="6" rowspan="9" ><textarea type="text" id="observaciones" name="observaciones" class="form-control"></textarea></th>
                                                                </tr>
                                                                <tr>
                                                                    <td>Indisciplina:</td>
                                                                    <td> <input type="checkbox" class="" id="aspectos_sociologicos1" name="aspectos_sociologicos1" value="1"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Problemas de integración:</td>
                                                                    <td> <input type="checkbox" class="" id="aspectos_sociologicos2" name="aspectos_sociologicos2" value="1"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Problemas familiares:</td>
                                                                    <td> <input type="checkbox" class="" id="aspectos_sociologicos3" name="aspectos_sociologicos3" value="1"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" colspan="3" >Aspectos académicos</th>
                                                                </tr>
                                                                <tr>
                                                                    <td>Dificultades de concentración:</td>
                                                                    <td> <input type="checkbox" class="" id="aspectos_academicos1" name="aspectos_academicos1" value="1"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Falta de motivación académica:</td>
                                                                    <td> <input type="checkbox" class="" id="aspectos_academicos2" name="aspectos_academicos2" value="1"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Bajo rendimiento académico:</td>
                                                                    <td> <input type="checkbox" class="" id="aspectos_academicos3" name="aspectos_academicos3" value="1"></td>
                                                                </tr>

                                                                <tr>
                                                                    <th scope="row" colspan="3">OTROS (especifique):<br><textarea type="text" id="otros" name="otros" class="form-control"></textarea></th>
                                                                </tr>
                                                                </tbody>
                                                            </table>

                                                            <table class="table table-bordered">
                                                                <thead>
                                                                <tr>
                                                                    <th scope="col" colspan="4" class="text-center">Status</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input type="radio" class="form-check-input" id="status" name="status" value="0">
                                                                            <label class="form-check-label" for="materialGroupExample2">En Proceso</label>
                                                                        </div>

                                                                        <div class="form-check">
                                                                            <input type="radio" class="form-check-input" id="status" name="status" value="1">
                                                                            <label class="form-check-label" for="materialGroupExample3">Terminado</label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>

                                                            <table class="table table-bordered">
                                                                <thead>
                                                                <tr>
                                                                    <th scope="col" colspan="3">Área a canalizar tutorado</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <select name="id_area" id="id_area" class="custom-select custom-select-md">
                                                                            <option value="" selected>Elija área a canalizar</option>
                                                                            @foreach ($areas as $dato)
                                                                                <option value="{{$dato->id_area}}" >{{$dato->descripcion_area}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                            <div style="display: none">
                                                                <textarea type="number" class="form-control"  id="id_alumno" name="id_alumno">@{{alumno.id_alumno}}</textarea>
                                                                @foreach ($tutor as $dato)
                                                                    <input type="number" class="form-control"  id="id_personal" name="id_personal" value="{{$dato->id_personal}}">
                                                                @endforeach

                                                            </div>
                                                            <div align="center">
                                                                <input type="submit" value="Agregar">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row" v-show="graficas==true">
                        <div class="col-12">
                            <div class="row pt-3">
                                <div class="col-11"></div>
                                <div class="col-1"><a href="#!"  class="btn text-white btn-danger" ><i class="fas fa-file-pdf"></i></a></div>
                            </div>
                            <div class="row m-2"><div class="col-12 "><h5 class="alert alert-primary text-center">Estadísticas</h5></div></div>
                            <div class="row text-center"><div class="col-4"></div><div class="col-4 graf" id="genero"></div></div>
                            <div class="row pl-4">
                                <div class="col-12 pt-4">
                                    <div class="nav  nav-tabs" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active" id="v-pills-general-tab" data-toggle="pill"
                                           href="#v-pills-general" role="tab" aria-controls="v-pills-general" aria-selected="true">Datos Generales</a>
                                        <a class="nav-link" id="v-pills-antecedentes-tab" data-toggle="pill"
                                           href="#v-pills-antecedentes" role="tab" aria-controls="v-pills-antecedentes" aria-selected="false">Antecedentes Acádemicos</a>
                                        <a class="nav-link" id="v-pills-familiares-tab" data-toggle="pill"
                                           href="#v-pills-familiares" role="tab" aria-controls="v-pills-familiares" aria-selected="false">Datos Familiares</a>
                                        <a class="nav-link" id="v-pills-habitos-tab" data-toggle="pill"
                                           href="#v-pills-habitos" role="tab" aria-controls="v-pills-habitos" aria-selected="false">Hábitos de Estudio</a>
                                        <a class="nav-link" id="v-pills-formacion-tab" data-toggle="pill"
                                           href="#v-pills-formacion" role="tab" aria-controls="v-pills-formacion" aria-selected="false">Formación Integral/Salud</a>
                                        <a class="nav-link" id="v-pills-area-tab" data-toggle="pill"
                                           href="#v-pills-area" role="tab" aria-controls="v-pills-area" aria-selected="false">Área Psicopedagógica</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id='cont-preg'>
                                <div class="col-12">
                                    <div class="tab-content text-justify" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab">
                                            <div class="row pt-4">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-4 graf" id="estadoc"></div>
                                                        <div class="col-4 graf" id="ne"></div>
                                                        <div class="col-4 graf" id="tra"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4 graf" id="bec"></div>
                                                        <div class="col-4 graf" id="est"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-antecedentes" role="tabpanel" aria-labelledby="v-pills-antecedentes-tab">
                                            <div class="row pt-4">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-4 graf " id="bach">Hola</div>
                                                        <div class="col-4 graf" id="otraca"></div>
                                                        <div class="col-4 graf" id="gusta"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4 graf" id="estimula"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-familiares" role="tabpanel" aria-labelledby="v-pills-familiares-tab">
                                            <div class="row pt-4">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-4 graf" id="vive"></div>
                                                        <div class="col-4 graf" id="etnia"></div>
                                                        <div class="col-4 graf" id="lengua"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-habitos" role="tabpanel" aria-labelledby="v-pills-habitos-tab">
                                            <div class="row pt-4">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-4 graf" id="intelectual"></div>
                                                        <div class="col-4 graf" id="tiempo"></div>
                                                        <div class="col-4 graf" id=""></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-formacion" role="tabpanel" aria-labelledby="v-pills-formacion-tab">
                                            <div class="row pt-4">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-4 graf" id="enfermedadc"></div>
                                                        <div class="col-4 graf" id="enfermedadv"></div>
                                                        <div class="col-4 graf" id="lentes"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-area" role="tabpanel" aria-labelledby="v-pills-area-tab">
                                            <div class="row pt-4">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-4 graf" id="rendimiento"></div>
                                                        <div class="col-4 graf" id="computo"></div>
                                                        <div class="col-4 graf" id="comprension"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4 graf" id="preparacion"></div>
                                                        <div class="col-4 graf" id="concentracion"></div>
                                                        <div class="col-4 graf" id="trabajo"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('profesor.modaleditar')
    </div>


    @foreach($semestre as $dato)
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
                                    <input type="number" class="form-control" name="id_sugerencia" value="2" hidden>
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
    @foreach($semestre as $dato)
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
                                    <div class="form-group">
                                        <label>Seleccionar si el tutorado equiere subir evidencia</label>
                                        @if($dato->id_estado==1)
                                            <input type="checkbox" class="" id="id_evidencia" name="id_evidencia" value="1" checked>
                                        @else
                                            <input type="checkbox" class="" id="id_evidencia" name="id_evidencia" value="1">
                                        @endif
                                    </div>
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
    <script>
        new Vue({
            el:"#ind",
            created:function(){
                this.lista=false;
                this.menugrupos=true;
                this.graficas=false;
                this.menu=false;
                this.getTut();
            },
            data:{
                rut:"/profesor",
                rutaa:"/semestre",
                grup:"/grupos",
                act:'/actualiza',
                cambios:'/cambio',
                academico:'graphics/academico',
                rutgen:"/graphics/genero",
                generales:"/graphics/generales",
                familiares:"/graphics/familiares",
                habitos:"/graphics/habitos",
                salud:"/graphics/salud",
                area:"/graphics/area",
                pd:"pdf/lista",
                palu:'pdf/alumno',
                veralu:'/ver',
                datos:[],
                datos1:[],
                grupos:[],
                alumnog:[],
                eg:[],
                ea:[],
                ef:[],
                eh:[],
                es:[],
                eas:[],
                vista:[],
                periodos:[],
                semestres:[],
                carreras:[],
                grupo:[],
                estadociv:[],
                nivel:[],
                bachiller:[],
                vive:[],
                union:[],
                turno:[],
                tiempo:[],
                intelectual:[],
                parentesco:[],
                escala:[],
                bebidas:[],
                lista:false,
                listaa:false,
                listacanaliza:false,
                menugrupos:true,
                menu:false,
                graficas:false,
                carrera:"",
                gen:"",
                idca:null,
                idasigna:null,
                content_modal:"",
                alu:{
                    generales:{
                        id_exp_general:"",
                        id_periodo:"",
                        nombre:"",
                        edad:"",
                        sexo:"",
                        fecha_nacimientos:"",
                        lugar_nacimientos:"",
                        id_semestre:"",
                        id_estado_civil:"",
                        no_hijos:"",
                        direccion:"",
                        correo:"",
                        tel_casa:"",
                        cel:"",
                        id_nivel_economico:"",
                        trabaja:"",
                        ocupacion:"",
                        horario:"",
                        no_cuenta:"",
                        beca:"",
                        tipo_beca:"",
                        estado:"",
                        turno:"",
                        id_grupo:"",
                        id_carrera:"",
                        poblacion:"",
                        ant_inst:"",
                        satisfaccion_c:"",
                        materias_repeticion:"",
                        tot_repe:"",
                        materias_especial:"",
                        tot_espe:"",
                        gen_espe:"",
                        id_alumno:"",
                    },
                    academicos:{
                        id_exp_antecedentes_academicos:"",
                        id_bachillerato:"",
                        otros_estudios:"",
                        anos_curso_bachillerato:"",
                        ano_terminacion:"",
                        escuela_procedente:"",
                        promedio:"",
                        materias_reprobadas:"",
                        otra_carrera_ini:"",
                        institucion:"",
                        semestres_cursados:"",
                        interrupciones_estudios:"",
                        razones_interrupcion:"",
                        razon_descide_estudiar_tesvb:"",
                        sabedel_perfil_profesional:"",
                        otras_opciones_vocales:"",
                        cuales_otras_opciones_vocales:"",
                        tegusta_carrera_elegida:"",
                        porque_carrera_elegida:"",
                        suspension_estudios_bachillerato:"",
                        razones_suspension_estudios:"",
                        teestimula_familia:"",
                        id_alumno:"",
                    },
                    familiares:{
                        id_exp_datos_familiares:"",
                        nombre_padre:"",
                        edad_padre:"",
                        ocupacion_padre:"",
                        lugar_residencia_padre:"",
                        nombre_madre:"",
                        edad_madre:"",
                        ocupacion_madre:"",
                        lugar_residencia_madre:"",
                        no_hermanos:"",
                        lugar_ocupas:"",
                        id_opc_vives:"",
                        no_personas:"",
                        etnia_indigena:"",
                        cual_etnia:"",
                        hablas_lengua_indigena:"",
                        sostiene_economia_hogar:"",
                        id_familia_union:"",
                        nombre_tutor:"",
                        id_parentesco:"",
                        id_alumno:""
,                    },
                    estudio:{
                        id_exp_habitos_estudio:"",
                        tiempo_empleado_estudiar:"",
                        id_opc_intelectual:"",
                        forma_estudio:"",
                        tiempo_libre:"",
                        asignatura_preferida:"",
                        porque_asignatura:"",
                        asignatura_dificil:"",
                        porque_asignatura_dificil:"",
                        opinion_tu_mismo_estudiante:"",
                        id_alumno:""
,                    },
                    integral:{
                        id_exp_formacion_integral:"",
                        practica_deporte:"",
                        especifica_deporte:"",
                        practica_artistica:"",
                        especifica_artistica:"",
                        pasatiempo:"",
                        actividades_culturales:"",
                        cuales_act:"",
                        estado_salud:"",
                        enfermedad_cronica:"",
                        especifica_enf_cron:"",
                        enf_cron_padre:"",
                        especifica_enf_cron_padres:"",
                        operacion:"",
                        deque_operacion:"",
                        enfer_visual:"",
                        especifica_enf:"",
                        usas_lentes:"",
                        medicamento_controlado:"",
                        especifica_medicamento:"",
                        estatura:"",
                        peso:"",
                        accidente_grave:"",
                        relata_breve:"",
                        id_expbebidas:"",
                        id_alumno:"",
                    },
                    area:{
                        id_exp_area_psicopedagogica:"",
                        rendimiento_escolar:"",
                        dominio_idioma:"",
                        otro_idioma:"",
                        conocimiento_compu:"",
                        aptitud_especial:"",
                        comprension:"",
                        preparacion:"",
                        estrategias_aprendizaje:"",
                        organizacion_actividades:"",
                        concentracion:"",
                        solucion_problemas:"",
                        condiciones_ambientales:"",
                        busqueda_bibliografica:"",
                        trabajo_equipo:"",
                        id_alumno:"",
                    }

                },
            },
            methods:{
                getTut:function(){
                    axios.get(this.grup).then(response=>{
                        this.grupos=response.data;
                    }).catch(error=>{ });
                },
                getlista:function (grupo) {

                    this.idca=grupo.id_carrera;
                    this.idasigna=grupo.id_asigna_generacion;
                    this.carrera=grupo.nombre;
                    this.gen=" GENERACIÓN "+grupo.generacion+" GRUPO "+grupo.grupo;
                    this.getAlumnos();
                    //this.getAlumnos1();
                },
                getAlumnos:function()
                {
                    axios.post(this.rut,{id_asigna_generacion:this.idasigna,id_carrera:this.idca}).then(response=>{
                        this.menugrupos=false;
                        this.menu=true;
                        this.lista=true;
                        this.listaa=false;
                        this.listacanaliza=false;
                        this.graficas=false;
                        this.datos=response.data;

                    }).catch(error=>{ });
                },
                getAlumnos1:function()
                {
                    this.menugrupos=false;
                    this.menu=true;
                    this.lista=false;
                    this.listaa=true;
                    this.listacanaliza=false;
                    this.graficas=false;
                    //this.datos=response.data;
                },
                getAlumnos2:function(alumno)
                {
                    axios.post(this.rutaa,{id_alumno:alumno.id_alumno}).then(response=>{
                        this.menugrupos=false;
                        this.menu=true;
                        this.lista=false;
                        this.listaa=false;
                        this.listacanaliza=true;
                        this.graficas=false;
                        this.datos1=response.data;
                    });

                    //this.datos=response.data;
                },
                graficagenero:function()
                {
                    this.lista=false;
                    this.menugrupos=false;
                    this.graficas=true;
                    this.listacanaliza=false;
                    axios.post(this.rutgen,{id_carrera:this.idca}).then(response=>{
                        this.alumnog=response.data;
                        Highcharts.chart('genero', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Alumnos por género'
                            },
                            xAxis: {
                                type: 'category'
                            },
                            yAxis: {
                                title: {
                                    text: 'Total'
                                }
                            },
                            legend: {
                                enabled: false
                            },
                            plotOptions: {
                                series: {
                                    borderWidth: 0,
                                    dataLabels: {
                                        enabled: true,
                                        format: '{point.y:.1f}'
                                    }
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> total<br/>'
                            },
                            series: [{
                                data: [{
                                    name: 'Mujeres',
                                    y: this.alumnog.mujeres[0].mujeres,

                                }, {
                                    name: 'Hombres',
                                    y: this.alumnog.hombres[0].hombres,
                                }]
                            }]
                        });
                    }).catch(error=>{ });

                    axios.post(this.generales,{id_carrera:this.idca}).then(response=>{
                        this.eg=response.data;
                        Highcharts.chart('ne', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Nivel económico'
                            },
                            xAxis: {
                                categories:this.eg.categoria,
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Total'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Nivel económico',
                                data: this.eg.cantidad,
                            }]
                        });
                        Highcharts.chart('tra', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Trabaja'
                            },
                            xAxis: {
                                categories:this.eg.cattrabaja,
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Total'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Trabaja',
                                data: this.eg.canttrabaja,
                            }]
                        });
                        Highcharts.chart('bec', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Beca'
                            },
                            xAxis: {
                                categories:this.eg.catbeca,
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Total'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Beca',
                                data: this.eg.cantbeca,
                            }]
                        });
                        Highcharts.chart('est', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Situación académica'
                            },
                            xAxis: {
                                categories:this.eg.catestado,
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Total'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Estado',
                                data: this.eg.cantestado,
                            }]
                        });
                        Highcharts.chart('estadoc', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Estado civil'
                            },
                            xAxis: {
                                categories:this.eg.catcivil,
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Total'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Estado civil',
                                data: this.eg.cantcivil,
                            }]
                        });

                    }).catch(error=>{ });
                    axios.post(this.academico,{id_carrera:this.idca}).then(response=>{
                        this.ea=response.data;
                        Highcharts.chart('bach', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Bachillerato'
                            },
                            xAxis: {
                                categories:this.ea.catbachillerato,
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Total'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Tipo de bachillerato',
                                data: this.ea.cantbachillerato,
                            }]
                        });
                        Highcharts.chart('otraca', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Otra carrera iniciada'
                            },
                            xAxis: {
                                categories:this.ea.catotra,
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Total'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Carrera iniciada',
                                data: this.ea.cantotra,
                            }]
                        });
                        Highcharts.chart('gusta', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Gusto por la carrera'
                            },
                            xAxis: {
                                categories:this.ea.catgusta,
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Total'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Gusto por la carrera',
                                data: this.ea.cantgusta,
                            }]
                        });
                        Highcharts.chart('estimula', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Estimula la familia'
                            },
                            xAxis: {
                                categories:this.ea.catestimula,
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Total'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Estimula',
                                data: this.ea.cantestimula,
                            }]
                        });

                    }).catch(error=>{ });
                    axios.post(this.academico,{id_carrera:this.idca}).then(response=>{
                        this.ea=response.data;
                        Highcharts.chart('bach', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Bachillerato'
                            },
                            xAxis: {
                                categories:this.ea.catbachillerato,
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Total'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Tipo de bachillerato',
                                data: this.ea.cantbachillerato,
                            }]
                        });
                        Highcharts.chart('otraca', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Otra carrera iniciada'
                            },
                            xAxis: {
                                categories:this.ea.catotra,
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Total'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Carrera iniciada',
                                data: this.ea.cantotra,
                            }]
                        });
                        Highcharts.chart('gusta', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Gusto por la carrera'
                            },
                            xAxis: {
                                categories:this.ea.catgusta,
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Total'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Gusto por la carrera',
                                data: this.ea.cantgusta,
                            }]
                        });
                        Highcharts.chart('estimula', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Estimula la familia'
                            },
                            xAxis: {
                                categories:this.ea.catestimula,
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Total'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Estimula',
                                data: this.ea.cantestimula,
                            }]
                        });

                    }).catch(error=>{ });
                    axios.post(this.familiares,{id_carrera:this.idca,id_asigna_generacion:this.idasigna}).then(response=>{
                        this.ef=response.data;
                        Highcharts.chart('vive', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Actualmente viven con'
                            },
                            xAxis: {
                                categories:this.ef.catvive,
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Total'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Vive',
                                data: this.ef.cantvive,
                            }]
                        });
                        Highcharts.chart('etnia', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Pertenece a etnia indígena'
                            },
                            xAxis: {
                                categories:this.ef.catetnia,
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Total'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Etnia',
                                data: this.ef.cantetnia,
                            }]
                        });
                        Highcharts.chart('lengua', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Hablan lengua indígena'
                            },
                            xAxis: {
                                categories:this.ef.catlengua,
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Total'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Lengua indígena',
                                data: this.ef.cantlengua,
                            }]
                        });
                    }).catch(error=>{ });

                    axios.post(this.habitos,{id_carrera:this.idca,id_asigna_generacion:this.idasigna}).then(response=>{
                        this.eh=response.data;
                        Highcharts.chart('intelectual', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Forma de trabajo intelectual'
                            },
                            xAxis: {
                                categories:this.eh.catintelectual,
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Total'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Forma',
                                data: this.eh.cantintelectual,
                            }]
                        });
                        Highcharts.chart('tiempo', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Tiempo dedicado a estudiar'
                            },
                            xAxis: {
                                categories:this.eh.cattiempo,
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Total'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Tiempo',
                                data: this.eh.canttiempo,
                            }]
                        });

                    }).catch(error=>{ });
                    axios.post(this.salud,{id_carrera:this.idca,id_asigna_generacion:this.idasigna}).then(response=>{
                        this.es=response.data;
                        Highcharts.chart('enfermedadc', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Enfermedad Crónica'
                            },
                            xAxis: {
                                categories:this.es.catenfermedadc,
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Total'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Enfermedad Crónica',
                                data: this.es.cantenfermedadc,
                            }]
                        });
                        Highcharts.chart('enfermedadv', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Enfermedad Visual'
                            },
                            xAxis: {
                                categories:this.es.catenfermedadv,
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Total'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Enfermedad Visual',
                                data: this.es.cantenfermedadv,
                            }]
                        });
                        Highcharts.chart('lentes', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Uso de lentes'
                            },
                            xAxis: {
                                categories:this.es.catlentes,
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Total'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Uso de lentes',
                                data: this.es.cantlentes,
                            }]
                        });

                    }).catch(error=>{ });
                    axios.post(this.area,{id_carrera:this.idca,id_asigna_generacion:this.idasigna}).then(response=>{
                        this.eas=response.data;
                        Highcharts.chart('rendimiento', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Rendimiento escolar'
                            },
                            xAxis: {
                                categories:this.eas.catrendimiento,
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Total'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Rendimiento escolar',
                                data: this.eas.cantrendimiento,
                            }]
                        });
                        Highcharts.chart('computo', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Conocimientos en cómputo'
                            },
                            xAxis: {
                                categories:this.eas.catcomputo,
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Total'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Conocimientos en cómputo',
                                data: this.eas.cantcomputo,
                            }]
                        });
                        Highcharts.chart('comprension', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Comprensión y retención en clase'
                            },
                            xAxis: {
                                categories:this.eas.catcomprension,
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Total'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Comprensión',
                                data: this.eas.cantcomprension,
                            }]
                        });
                        Highcharts.chart('preparacion', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Preparación y presentación de exámenes'
                            },
                            xAxis: {
                                categories:this.eas.catpreparacion,
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Total'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Preparación',
                                data: this.eas.cantpreparacion,
                            }]
                        });
                        Highcharts.chart('concentracion', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Concentración durante el estudio'
                            },
                            xAxis: {
                                categories:this.eas.catconcentracion,
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Total'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Concentración',
                                data: this.eas.cantconcentracion,
                            }]
                        });
                        Highcharts.chart('trabajo', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Trabajo en equipo'
                            },
                            xAxis: {
                                categories:this.eas.cattrabajo,
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Total'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Trabajo en equipo',
                                data: this.eas.canttrabajo,
                            }]
                        });

                    }).catch(error=>{ });


                },
                grafacademico:function()
                {
                    alert('académico');
                },
                cambio:function (alumno,num) {
                    axios.post(this.cambios,{id_asigna_alumno:alumno.id_asigna_alumno,estado:num}).then(response=>{
                        this.getAlumnos();
                    });
                },
                actualiza:function()
                {
                    axios.post(this.act,{alu:this.alu}).then(response=> {
                        $("#modaleditar").modal("hide");
                    });
                },
                ver:function (alumno) {
                    $("#modaleditar").modal("show");
                    axios.post(this.veralu,{id:alumno.id_alumno}).then(response=>{
                        this.alu.generales.id_exp_general=response.data.generales[0].id_exp_general;
                        this.alu.generales.id_periodo=response.data.generales[0].id_periodo;
                        this.alu.generales.nombre=response.data.generales[0].nombre;
                        this.alu.generales.edad=response.data.generales[0].edad;
                        this.alu.generales.sexo=response.data.generales[0].sexo;
                        this.alu.generales.fecha_nacimientos=response.data.generales[0].fecha_nacimientos;
                        this.alu.generales.lugar_nacimientos=response.data.generales[0].lugar_nacimientos;
                        this.alu.generales.id_semestre=response.data.generales[0].id_semestre;
                        this.alu.generales.id_estado_civil=response.data.generales[0].id_estado_civil;
                        this.alu.generales.no_hijos=response.data.generales[0].no_hijos;
                        this.alu.generales.direccion=response.data.generales[0].direccion;
                        this.alu.generales.correo=response.data.generales[0].correo;
                        this.alu.generales.tel_casa=response.data.generales[0].tel_casa;
                        this.alu.generales.cel=response.data.generales[0].cel;
                        this.alu.generales.id_nivel_economico=response.data.generales[0].id_nivel_economico;
                        this.alu.generales.trabaja=response.data.generales[0].trabaja;
                        this.alu.generales.ocupacion=response.data.generales[0].ocupacion;
                        this.alu.generales.horario=response.data.generales[0].horario;
                        this.alu.generales.no_cuenta=response.data.generales[0].no_cuenta;
                        this.alu.generales.beca=response.data.generales[0].beca;
                        this.alu.generales.tipo_beca=response.data.generales[0].tipo_beca;
                        this.alu.generales.estado=response.data.generales[0].estado;
                        this.alu.generales.turno=response.data.generales[0].turno;
                        this.alu.generales.id_alumno=response.data.generales[0].id_alumno;
                        this.alu.generales.id_grupo=response.data.generales[0].id_grupo;
                        this.alu.generales.id_carrera=response.data.generales[0].id_carrera;
                        this.alu.generales.poblacion=response.data.generales[0].poblacion;
                        this.alu.generales.ant_inst=response.data.generales[0].ant_inst;
                        this.alu.generales.ant_inst=response.data.generales[0].ant_inst;
                        this.alu.generales.satisfaccion_c=response.data.generales[0].satisfaccion_c;
                        this.alu.generales.materias_repeticion=response.data.generales[0].materias_repeticion;
                        this.alu.generales.tot_repe=response.data.generales[0].tot_repe;
                        this.alu.generales.materias_especial=response.data.generales[0].materias_especial;
                        this.alu.generales.tot_espe=response.data.generales[0].tot_espe;
                        this.alu.generales.gen_espe=response.data.generales[0].gen_espe;
                        this.alu.academicos.id_exp_antecedentes_academicos=response.data.academicos[0].id_exp_antecedentes_academicos;
                        this.alu.academicos.id_bachillerato=response.data.academicos[0].id_bachillerato;
                        this.alu.academicos.otros_estudios=response.data.academicos[0].otros_estudios;
                        this.alu.academicos.anos_curso_bachillerato=response.data.academicos[0].anos_curso_bachillerato;
                        this.alu.academicos.ano_terminacion=response.data.academicos[0].ano_terminacion;
                        this.alu.academicos.escuela_procedente=response.data.academicos[0].escuela_procedente;
                        this.alu.academicos.promedio=response.data.academicos[0].promedio;
                        this.alu.academicos.materias_reprobadas=response.data.academicos[0].materias_reprobadas;
                        this.alu.academicos.otra_carrera_ini=response.data.academicos[0].otra_carrera_ini;
                        this.alu.academicos.institucion=response.data.academicos[0].institucion;
                        this.alu.academicos.semestres_cursados=response.data.academicos[0].semestres_cursados;
                        this.alu.academicos.interrupciones_estudios=response.data.academicos[0].interrupciones_estudios;
                        this.alu.academicos.razones_interrupcion=response.data.academicos[0].razones_interrupcion;
                        this.alu.academicos.razon_descide_estudiar_tesvb=response.data.academicos[0].razon_descide_estudiar_tesvb;
                        this.alu.academicos.sabedel_perfil_profesional=response.data.academicos[0].sabedel_perfil_profesional;
                        this.alu.academicos.otras_opciones_vocales=response.data.academicos[0].otras_opciones_vocales;
                        this.alu.academicos.cuales_otras_opciones_vocales=response.data.academicos[0].cuales_otras_opciones_vocales;
                        this.alu.academicos.tegusta_carrera_elegida=response.data.academicos[0].tegusta_carrera_elegida;
                        this.alu.academicos.porque_carrera_elegida=response.data.academicos[0].porque_carrera_elegida;
                        this.alu.academicos.suspension_estudios_bachillerato=response.data.academicos[0].suspension_estudios_bachillerato;
                        this.alu.academicos.razones_suspension_estudios=response.data.academicos[0].razones_suspension_estudios;
                        this.alu.academicos.teestimula_familia=response.data.academicos[0].teestimula_familia;
                        this.alu.academicos.id_alumno=response.data.academicos[0].id_alumno;
                        this.alu.familiares.id_exp_datos_familiares=response.data.familiares[0].id_exp_datos_familiares;
                        this.alu.familiares.nombre_padre=response.data.familiares[0].nombre_padre;
                        this.alu.familiares.edad_padre=response.data.familiares[0].edad_padre;
                        this.alu.familiares.ocupacion_padre=response.data.familiares[0].ocupacion_padre;
                        this.alu.familiares.lugar_residencia_padre=response.data.familiares[0].lugar_residencia_padre;
                        this.alu.familiares.nombre_madre=response.data.familiares[0].nombre_madre;
                        this.alu.familiares.edad_madre=response.data.familiares[0].edad_madre;
                        this.alu.familiares.ocupacion_madre=response.data.familiares[0].ocupacion_madre;
                        this.alu.familiares.lugar_residencia_madre=response.data.familiares[0].lugar_residencia_madre;
                        this.alu.familiares.no_hermanos=response.data.familiares[0].no_hermanos;
                        this.alu.familiares.lugar_ocupas=response.data.familiares[0].lugar_ocupas;
                        this.alu.familiares.id_opc_vives=response.data.familiares[0].id_opc_vives;
                        this.alu.familiares.no_personas=response.data.familiares[0].no_personas;
                        this.alu.familiares.etnia_indigena=response.data.familiares[0].etnia_indigena;
                        this.alu.familiares.cual_etnia=response.data.familiares[0].cual_etnia;
                        this.alu.familiares.hablas_lengua_indigena=response.data.familiares[0].hablas_lengua_indigena;
                        this.alu.familiares.sostiene_economia_hogar=response.data.familiares[0].sostiene_economia_hogar;
                        this.alu.familiares.id_familia_union=response.data.familiares[0].id_familia_union;
                        this.alu.familiares.nombre_tutor=response.data.familiares[0].nombre_tutor;
                        this.alu.familiares.id_parentesco=response.data.familiares[0].id_parentesco;
                        this.alu.familiares.id_alumno=response.data.familiares[0].id_alumno;
                        this.alu.estudio.id_exp_habitos_estudio=response.data.estudio[0].id_exp_habitos_estudio;
                        this.alu.estudio.tiempo_empleado_estudiar=response.data.estudio[0].tiempo_empleado_estudiar;
                        this.alu.estudio.id_opc_intelectual=response.data.estudio[0].id_opc_intelectual;
                        this.alu.estudio.forma_estudio=response.data.estudio[0].forma_estudio;
                        this.alu.estudio.tiempo_libre=response.data.estudio[0].tiempo_libre;
                        this.alu.estudio.asignatura_preferida=response.data.estudio[0].asignatura_preferida;
                        this.alu.estudio.porque_asignatura=response.data.estudio[0].porque_asignatura;
                        this.alu.estudio.asignatura_dificil=response.data.estudio[0].asignatura_dificil;
                        this.alu.estudio.porque_asignatura_dificil=response.data.estudio[0].porque_asignatura_dificil;
                        this.alu.estudio.opinion_tu_mismo_estudiante=response.data.estudio[0].opinion_tu_mismo_estudiante;
                        this.alu.estudio.id_alumno=response.data.estudio[0].id_alumno;
                        this.alu.integral.id_exp_formacion_integral=response.data.integral[0].id_exp_formacion_integral;
                        this.alu.integral.practica_deporte=response.data.integral[0].practica_deporte;
                        this.alu.integral.especifica_deporte=response.data.integral[0].especifica_deporte;
                        this.alu.integral.practica_artistica=response.data.integral[0].practica_artistica;
                        this.alu.integral.especifica_artistica=response.data.integral[0].especifica_artistica;
                        this.alu.integral.pasatiempo=response.data.integral[0].pasatiempo;
                        this.alu.integral.actividades_culturales=response.data.integral[0].actividades_culturales;
                        this.alu.integral.cuales_act=response.data.integral[0].cuales_act;
                        this.alu.integral.estado_salud=response.data.integral[0].estado_salud;
                        this.alu.integral.enfermedad_cronica=response.data.integral[0].enfermedad_cronica;
                        this.alu.integral.especifica_enf_cron=response.data.integral[0].especifica_enf_cron;
                        this.alu.integral.enf_cron_padre=response.data.integral[0].enf_cron_padre;
                        this.alu.integral.especifica_enf_cron_padres=response.data.integral[0].especifica_enf_cron_padres;
                        this.alu.integral.operacion=response.data.integral[0].operacion;
                        this.alu.integral.deque_operacion=response.data.integral[0].deque_operacion;
                        this.alu.integral.enfer_visual=response.data.integral[0].enfer_visual;
                        this.alu.integral.especifica_enf=response.data.integral[0].especifica_enf;
                        this.alu.integral.usas_lentes=response.data.integral[0].usas_lentes;
                        this.alu.integral.medicamento_controlado=response.data.integral[0].medicamento_controlado;
                        this.alu.integral.especifica_medicamento=response.data.integral[0].especifica_medicamento;
                        this.alu.integral.estatura=response.data.integral[0].estatura;
                        this.alu.integral.peso=response.data.integral[0].peso;
                        this.alu.integral.accidente_grave=response.data.integral[0].accidente_grave;
                        this.alu.integral.relata_breve=response.data.integral[0].relata_breve;
                        this.alu.integral.id_expbebidas=response.data.integral[0].id_expbebidas;
                        this.alu.integral.id_alumno=response.data.integral[0].id_alumno;
                        this.alu.area.id_exp_area_psicopedagogica=response.data.area[0].id_exp_area_psicopedagogica;
                        this.alu.area.rendimiento_escolar=response.data.area[0].rendimiento_escolar;
                        this.alu.area.dominio_idioma=response.data.area[0].dominio_idioma;
                        this.alu.area.otro_idioma=response.data.area[0].otro_idioma;
                        this.alu.area.conocimiento_compu=response.data.area[0].conocimiento_compu;
                        this.alu.area.aptitud_especial=response.data.area[0].aptitud_especial;
                        this.alu.area.comprension=response.data.area[0].comprension;
                        this.alu.area.preparacion=response.data.area[0].preparacion;
                        this.alu.area.estrategias_aprendizaje=response.data.area[0].estrategias_aprendizaje;
                        this.alu.area.organizacion_actividades=response.data.area[0].organizacion_actividades;
                        this.alu.area.concentracion=response.data.area[0].concentracion;
                        this.alu.area.solucion_problemas=response.data.area[0].solucion_problemas;
                        this.alu.area.condiciones_ambientales=response.data.area[0].condiciones_ambientales;
                        this.alu.area.busqueda_bibliografica=response.data.area[0].busqueda_bibliografica;
                        this.alu.area.trabajo_equipo=response.data.area[0].trabajo_equipo;
                        this.alu.area.id_alumno=response.data.area[0].id_alumno;
                        ///CATALOGOS
                        this.periodos=response.data.periodos;
                        this.semestres=response.data.semestres;
                        this.carreras=response.data.carreras;
                        this.grupo=response.data.grupos;
                        this.estadociv=response.data.estadocivil;
                        this.nivel=response.data.nivel;
                        this.bachiller=response.data.bachillerato;
                        this.vive=response.data.vive;
                        this.union=response.data.unionfam;
                        this.turno=response.data.turno;
                        this.tiempo=response.data.tiempoestudia;
                        this.intelectual=response.data.intelectual;
                        this.parentesco=response.data.parentesco;
                        this.escala=response.data.escala;
                        this.bebidas=response.data.bebidas;

                    });
                },
                borra_institucion:function(){
                  this.alu.academicos.institucion=null;
                  this.alu.academicos.semestres_cursados=null;
                },
                pdf:function () {
                    axios.post(this.pd,{id_asigna_generacion:this.idasigna,id_carrera:this.idca,generacion:this.gen},{
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/pdf'
                        },
                        responseType: "blob"
                    }).then(response=>{
                        console.log(response.data);
                        const blob = new Blob([response.data], { type: 'application/pdf' });
                        const objectUrl = URL.createObjectURL(blob);
                        window.open(objectUrl)
                    });
                },
                pdfAlumno:function (alumno) {
                    axios.post(this.palu,{id_alumno:alumno.id_alumno},{
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/pdf'
                        },
                        responseType: "blob"
                    }).then(response=>{
                        console.log(response.data);
                        const blob = new Blob([response.data], { type: 'application/pdf' });
                        const objectUrl = URL.createObjectURL(blob);
                        window.open(objectUrl)
                    });
                }
            },

        });
    </script>


@endsection
