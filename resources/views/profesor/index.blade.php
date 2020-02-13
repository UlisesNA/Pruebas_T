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
                            <div class="row" v-if="datos.length>0">
                                <div class="col-4"><button class="btn text-white btn-success" @click="getAlumnos()" data-toggle="tooltip" data-placement="bottom" title="Lista"><i class="fas fa-list"></i></button></div>
                                <div class="col-4"><button class="btn text-white btn-primary" @click="graficagenero()" data-toggle="tooltip" data-placement="bottom" title="Gráficas"><i class="fas fa-chart-pie"></i></button></div>
                                <div class="col-4"><button class="btn text-white btn-danger"  @click="getAlumnos1()"><i class="fas fa-file-alt"></i></button></div>
                            </div>
                        </div>
                        <div class="row"><div class="col-9 text-center">@{{ gen }}</div></div>
                    </div>
                    <div class="card-body" v-if="(lista==true && datos.length>0)">
                        <div class="row">
                            <div class="col-12">
                                <div class="row pb-2">
                                    <div class="col-11"></div>
                                    <button @click="pdf()" target="_blank" class="btn btn-danger text-white float-right" data-toggle="tooltip" data-placement="bottom" title="Generar lista"> <i class="fas fa-file-pdf"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 tableFixHeadLista">
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
                                        <td v-else class="text-center"><i class="fas h4 fa-times text-danger pt-2" data-toggle="tooltip" data-placement="bottom" title="Expediente sin llenar"></i></td>
                                        <td class="text-center"><button class="btn btn-outline-secondary"  @click="getAlumnos2(alumno)"><i class="fas fa-check-square"></i></button></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" v-if="datos.length==0">
                        <div class="row">
                            <div class="col-12 alert-info alert text-center">
                                <h5 class="font-weight-bold">No se han asignado alumnos al grupo</h5>
                            </div>
                        </div>
                    </div>

                        <div class="row" v-if="graficas==true">
                        <div class="col-12">
                            <div class="row pt-3">
                                <!--REPORTE PDF GRAFICAS-->
                                <div class="col-1 offset-11"><button @click="reporte()" target="_blank" class="btn text-white btn-danger" ><i class="fas fa-file-pdf"></i></button></div>
                            </div>
                            <div class="row m-2"><div class="col-12 "><h5 class="alert alert-primary text-center font-weight-bold">Estadísticas</h5></div></div>
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
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">Estado civil</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 graf" id="ecg"></div>
                                                                <div class="col-4 graf" id="ecf"></div>
                                                                <div class="col-4 graf" id="ecm"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">Nivel socioeconómico</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 graf" id="neg"></div>
                                                                <div class="col-4 graf" id="nef"></div>
                                                                <div class="col-4 graf" id="nem"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">Trabaja</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 graf" id="trag"></div>
                                                                <div class="col-4 graf" id="traf"></div>
                                                                <div class="col-4 graf" id="tram"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">Estado académico</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 graf" id="eag"></div>
                                                                <div class="col-4 graf" id="eaf"></div>
                                                                <div class="col-4 graf" id="eam"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">Beca</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 graf" id="bg"></div>
                                                                <div class="col-4 graf" id="bf"></div>
                                                                <div class="col-4 graf" id="bm"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">Tipo de beca</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 graf" id="tbg"></div>
                                                                <div class="col-4 graf" id="tbf"></div>
                                                                <div class="col-4 graf" id="tbm"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">Número de hijos</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 graf" id="hg"></div>
                                                                <div class="col-4 graf" id="hf"></div>
                                                                <div class="col-4 graf" id="hm"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-antecedentes" role="tabpanel" aria-labelledby="v-pills-antecedentes-tab">
                                            <div class="row pt-4">
                                                <div class="col-12">
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">¿Te gusta la carrera elegida?</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 graf" id="gg"></div>
                                                                <div class="col-4 graf" id="gf"></div>
                                                                <div class="col-4 graf" id="gm"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">¿Te motiva tu familia en tus estudios?</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 graf" id="esg"></div>
                                                                <div class="col-4 graf" id="esf"></div>
                                                                <div class="col-4 graf" id="esm"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">¿Otra carrera iniciada?</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 graf" id="og"></div>
                                                                <div class="col-4 graf" id="of"></div>
                                                                <div class="col-4 graf" id="om"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">Tipo de bachillerato</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 grafmd" id="bag"></div>
                                                                <div class="col-4 grafmd" id="baf"></div>
                                                                <div class="col-4 grafmd" id="bam"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-familiares" role="tabpanel" aria-labelledby="v-pills-familiares-tab">
                                            <div class="row pt-4">
                                                <div class="col-12">
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">Actualmente viven con</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 grafmd" id="vg"></div>
                                                                <div class="col-4 grafmd" id="vf"></div>
                                                                <div class="col-4 grafmd" id="vm"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">Pertenecen a etnia indígena</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 graf" id="etg"></div>
                                                                <div class="col-4 graf" id="etf"></div>
                                                                <div class="col-4 graf" id="etm"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">Hablan lengua indígena</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 graf" id="hag"></div>
                                                                <div class="col-4 graf" id="haf"></div>
                                                                <div class="col-4 graf" id="ham"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">Unión familiar</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 graf" id="ug"></div>
                                                                <div class="col-4 graf" id="uf"></div>
                                                                <div class="col-4 graf" id="um"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-habitos" role="tabpanel" aria-labelledby="v-pills-habitos-tab">
                                            <div class="row pt-4">
                                                <div class="col-12">
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">Tiempo dedicado a estudiar</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 grafmd" id="tg"></div>
                                                                <div class="col-4 grafmd" id="tf"></div>
                                                                <div class="col-4 grafmd" id="tm"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-formacion" role="tabpanel" aria-labelledby="v-pills-formacion-tab">
                                            <div class="row pt-4">
                                                <div class="col-12">
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">Practican deporte</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 graf" id="pdg"></div>
                                                                <div class="col-4 graf" id="pdf"></div>
                                                                <div class="col-4 graf" id="pdm"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">Practican alguna actividad artística</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 graf" id="ag"></div>
                                                                <div class="col-4 graf" id="af"></div>
                                                                <div class="col-4 graf" id="am"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">Participación en actividades culturales o sociales</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 graf" id="csg"></div>
                                                                <div class="col-4 graf" id="csf"></div>
                                                                <div class="col-4 graf" id="csm"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">Padecen enfermedad crónica</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 graf" id="enfcg"></div>
                                                                <div class="col-4 graf" id="enfcf"></div>
                                                                <div class="col-4 graf" id="enfcm"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">Padres que padecen enfermedad crónica</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 graf" id="penfcg"></div>
                                                                <div class="col-4 graf" id="penfcf"></div>
                                                                <div class="col-4 graf" id="penfcm"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">Han tenido una cirugía</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 graf" id="opeg"></div>
                                                                <div class="col-4 graf" id="opef"></div>
                                                                <div class="col-4 graf" id="opem"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">Padecen enfermedad visual</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 graf" id="visg"></div>
                                                                <div class="col-4 graf" id="visf"></div>
                                                                <div class="col-4 graf" id="vism"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">Usan lentes</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 graf" id="lg"></div>
                                                                <div class="col-4 graf" id="lf"></div>
                                                                <div class="col-4 graf" id="lm"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">Toman medicamento controlado</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 graf" id="meg"></div>
                                                                <div class="col-4 graf" id="mef"></div>
                                                                <div class="col-4 graf" id="mem"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-area" role="tabpanel" aria-labelledby="v-pills-area-tab">
                                            <div class="row pt-4">
                                                <div class="col-12">
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">Trabajo en equipo</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 graf" id="trg"></div>
                                                                <div class="col-4 graf" id="trf"></div>
                                                                <div class="col-4 graf" id="trm"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">Rendimiento escolar</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 graf" id="reng"></div>
                                                                <div class="col-4 graf" id="renf"></div>
                                                                <div class="col-4 graf" id="renm"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">Conocimientos en cómputo</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 graf" id="comg"></div>
                                                                <div class="col-4 graf" id="comf"></div>
                                                                <div class="col-4 graf" id="comm"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">Comprensión y retención en clase</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 graf" id="retg"></div>
                                                                <div class="col-4 graf" id="retf"></div>
                                                                <div class="col-4 graf" id="retm"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">Preparación de examenes</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 graf" id="exag"></div>
                                                                <div class="col-4 graf" id="exaf"></div>
                                                                <div class="col-4 graf" id="exam"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">Concentración durante el estudio</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 graf" id="cong"></div>
                                                                <div class="col-4 graf" id="conf"></div>
                                                                <div class="col-4 graf" id="conm"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">Búsqueda bibliográfica</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 graf" id="bbg"></div>
                                                                <div class="col-4 graf" id="bbf"></div>
                                                                <div class="col-4 graf" id="bbm"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">Dominio del idioma inglés</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 graf" id="oig"></div>
                                                                <div class="col-4 graf" id="oif"></div>
                                                                <div class="col-4 graf" id="oim"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row pt-3">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-10 offset-1"><h5 class="alert alert-info text-center font-weight-bold">Solución de problemas y aprendizaje de las matemáticas</h5></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-4 graf" id="matg"></div>
                                                                <div class="col-4 graf" id="matf"></div>
                                                                <div class="col-4 graf" id="matm"></div>
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
            </div>
        </div>
        @include('profesor.modaleditar')

    </div>
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
                rep:"pdf/reporte",
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
                /*nivel:[],*/
                becas:[],
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
                        nivel_economico:"",
                        trabaja:"",
                        ocupacion:"",
                        horario:"",
                        no_cuenta:"",
                        beca:"",
                        /*tipo_beca:"",*/
                        id_expbeca:null,
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
                    },
                    cadena:null

                },
                fin:true,
                titulosGrafica:['General','Mujeres','Hombres'],
                general:[
                            ['ecg','ecf','ecm'],['neg','nef','nem'],['trag','traf','tram'],
                            ['eag','eaf','eam'],['bg','bf','bm'],['tbg','tbf','tbm'],['hg','hf','hm']
                        ],
                academic:[['gg','gf','gm'],['esg','esf','esm'],['og','of','om'],['bag','baf','bam']],
                famili:[['vg','vf','vm'],['etg','etf','etm'],['hag','haf','ham'],['ug','uf','um']],
                habito:[['tg','tf','tm']],
                integra:[['pdg','pdf','pdm'],['ag','af','am'],['csg','csf','csm'],['enfcg','enfcf','enfcm'],['penfcg','penfcf','penfcm'],
                    ['opeg','opef','opem'],['visg','visf','vism'],['lg','lf','lm'],['meg','mef','mem']],
                areap:[['trg','trf','trm'],['reng','renf','renm'],['comg','comf','comm'],['retg','retf','retm'],['exag','exaf','exam'],
                ['cong','conf','conm'],['bbg','bbf','bbm'],['oig','oif','oim'],['matg','matf','matm']],
                direcciones_img:[],
                arreglo_graficas:['genero','hf','hm','etg','etf','etm','enfcg','enfcf','enfcm','eag','eaf','eam','bf','bm'],

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
                    axios.post(this.rutgen,{id_carrera:this.idca,id_asigna_generacion:this.idasigna}).then(response=>{
                        this.alumnog=response.data;
                        Highcharts.chart('genero', {
                            chart: {
                                type: 'column'
                            },
                            exporting: {
                                url: 'http://localhost',
                            },
                            navigation: {
                                buttonOptions: {
                                    enabled: false
                                }
                            },
                            credits: {
                                enabled: false
                            },
                            title: {
                                text: 'Alumnos por sexo'
                            },
                            accessibility: {
                                announceNewData: {
                                    enabled: true
                                }
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
                                        format: '{point.y:.1f}%'
                                    }
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> del total<br/>'
                            },
                            series: [
                                {
                                    name: "Sexo",
                                    colorByPoint: true,
                                    data: this.alumnog
                                }
                            ],

                        });
                    }).catch(error=>{ });
                    axios.post(this.generales,{id_carrera:this.idca,id_asigna_generacion:this.idasigna}).then(response=>{
                        this.eg=response.data;
                        for (let i in  this.eg)
                        {
                            for (let z in this.titulosGrafica)
                            {
                                Highcharts.chart(this.general[i][z], {
                                    chart: {
                                        type: 'column'
                                    },

                                    exporting: {
                                        url: 'http://localhost',
                                    },
                                    navigation: {
                                        buttonOptions: {
                                            enabled: false
                                        }
                                    },
                                    credits: {
                                        enabled: false
                                    },

                                    title: {
                                        text: this.titulosGrafica[z]
                                    },
                                    accessibility: {
                                        announceNewData: {
                                            enabled: true
                                        }
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
                                                format: '{point.y:.1f}%'
                                            }
                                        }
                                    },
                                    tooltip: {
                                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> del total<br/>'
                                    },
                                    series: [
                                        {
                                            name: this.titulosGrafica[z],
                                            colorByPoint: true,
                                            data: this.eg[i][z]
                                        }
                                    ],
                                });
                            }
                        }
                    }).catch(error=>{ this.sindato=true; });
                    axios.post(this.academico,{id_carrera:this.idca,id_asigna_generacion:this.idasigna}).then(response=>{
                        this.ea=response.data;
                        for (let i in  this.ea)
                        {
                            for (let z in this.titulosGrafica)
                            {
                                Highcharts.chart(this.academic[i][z], {
                                    chart: {
                                        type: 'column'
                                    },
                                    exporting: {
                                        url: 'http://localhost',
                                    },
                                    navigation: {
                                        buttonOptions: {
                                            enabled: false
                                        }
                                    },
                                    credits: {
                                        enabled: false
                                    },
                                    title: {
                                        text: this.titulosGrafica[z]
                                    },
                                    accessibility: {
                                        announceNewData: {
                                            enabled: true
                                        }
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
                                                format: '{point.y:.1f}%'
                                            }
                                        }
                                    },
                                    tooltip: {
                                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> del total<br/>'
                                    },
                                    series: [
                                        {
                                            name: this.titulosGrafica[z],
                                            colorByPoint: true,
                                            data: this.ea[i][z]
                                        }
                                    ],
                                });
                            }
                        }

                    }).catch(error=>{ });
                    axios.post(this.familiares,{id_carrera:this.idca,id_asigna_generacion:this.idasigna}).then(response=>{
                        this.ef=response.data;
                        for (let i in  this.ef)
                        {
                            for (let z in this.titulosGrafica)
                            {
                                Highcharts.chart(this.famili[i][z], {
                                    chart: {
                                        type: 'column'
                                    },
                                    exporting: {
                                        url: 'http://localhost',
                                    },
                                    navigation: {
                                        buttonOptions: {
                                            enabled: false
                                        }
                                    },
                                    credits: {
                                        enabled: false
                                    },
                                    title: {
                                        text: this.titulosGrafica[z]
                                    },
                                    accessibility: {
                                        announceNewData: {
                                            enabled: true
                                        }
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
                                                format: '{point.y:.1f}%'
                                            }
                                        }
                                    },
                                    tooltip: {
                                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> del total<br/>'
                                    },
                                    series: [
                                        {
                                            name: this.titulosGrafica[z],
                                            colorByPoint: true,
                                            data: this.ef[i][z]
                                        }
                                    ],
                                });
                            }
                        }

                    }).catch(error=>{ });
                    axios.post(this.habitos,{id_carrera:this.idca,id_asigna_generacion:this.idasigna}).then(response=>{
                        this.eh=response.data;
                        for (let i in  this.eh)
                        {
                            for (let z in this.titulosGrafica)
                            {
                                Highcharts.chart(this.habito[i][z], {
                                    chart: {
                                        type: 'column'
                                    },
                                    exporting: {
                                        url: 'http://localhost',
                                    },
                                    navigation: {
                                        buttonOptions: {
                                            enabled: false
                                        }
                                    },
                                    credits: {
                                        enabled: false
                                    },
                                    title: {
                                        text: this.titulosGrafica[z]
                                    },
                                    accessibility: {
                                        announceNewData: {
                                            enabled: true
                                        }
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
                                                format: '{point.y:.1f}%'
                                            }
                                        }
                                    },
                                    tooltip: {
                                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> del total<br/>'
                                    },
                                    series: [
                                        {
                                            name: this.titulosGrafica[z],
                                            colorByPoint: true,
                                            data: this.eh[i][z]
                                        }
                                    ],
                                });
                            }
                        }

                    }).catch(error=>{ });
                    axios.post(this.salud,{id_carrera:this.idca,id_asigna_generacion:this.idasigna}).then(response=>{
                        this.es=response.data;
                        for (let i in  this.es)
                        {
                            for (let z in this.titulosGrafica)
                            {
                                Highcharts.chart(this.integra[i][z], {
                                    chart: {
                                        type: 'column'
                                    },
                                    exporting: {
                                        url: 'http://localhost',
                                    },
                                    navigation: {
                                        buttonOptions: {
                                            enabled: false
                                        }
                                    },
                                    credits: {
                                        enabled: false
                                    },
                                    title: {
                                        text: this.titulosGrafica[z]
                                    },
                                    accessibility: {
                                        announceNewData: {
                                            enabled: true
                                        }
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
                                                format: '{point.y:.1f}%'
                                            }
                                        }
                                    },
                                    tooltip: {
                                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> del total<br/>'
                                    },
                                    series: [
                                        {
                                            name: this.titulosGrafica[z],
                                            colorByPoint: true,
                                            data: this.es[i][z]
                                        }
                                    ],
                                });
                            }
                        }

                    }).catch(error=>{ });
                    axios.post(this.area,{id_carrera:this.idca,id_asigna_generacion:this.idasigna}).then(response=>{
                        this.eas=response.data;
                        for (let i in  this.eas)
                        {
                            for (let z in this.titulosGrafica)
                            {
                                Highcharts.chart(this.areap[i][z], {
                                    chart: {
                                        type: 'column'
                                    },
                                    exporting: {
                                        url: 'http://localhost',
                                    },
                                    navigation: {
                                        buttonOptions: {
                                            enabled: false
                                        }
                                    },
                                    credits: {
                                        enabled: false
                                    },
                                    title: {
                                        text: this.titulosGrafica[z]
                                    },
                                    accessibility: {
                                        announceNewData: {
                                            enabled: true
                                        }
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
                                                format: '{point.y:.1f}%'
                                            }
                                        }
                                    },
                                    tooltip: {
                                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> del total<br/>'
                                    },
                                    series: [
                                        {
                                            name: this.titulosGrafica[z],
                                            colorByPoint: true,
                                            data: this.eas[i][z]
                                        }
                                    ],
                                });
                            }
                        }
                    }).catch(error=>{ });

                },
                cambio:function (alumno,num) {
                    axios.post(this.cambios,{id_asigna_alumno:alumno.id_asigna_alumno,estado:num}).then(response=>{
                        this.getAlumnos();
                    });
                },
                actualiza:function()
                {
                    /*AQUI*/
                    if(this.alu.generales.estado!="null"
                        && this.alu.generales.nivel_economico!="null"
                        && this.alu.generales.materias_especial!="null"
                        && this.alu.generales.materias_repeticion!="null"
                        && this.alu.generales.direccion!="null"
                        && this.alu.generales.id_periodo!="null"
                        && this.alu.generales.no_hijos!="null"
                        && this.alu.generales.id_grupo!="null"
                        && this.alu.generales.sexo!="null"
                        && this.alu.generales.id_estado_civil!="null"
                        && this.alu.generales.trabaja!="null"
                        && this.alu.academicos.teestimula_familia!="null"
                        && this.alu.academicos.tegusta_carrera_elegida!="null"
                        && this.alu.academicos.otra_carrera_ini!="null"
                        && this.alu.familiares.nombre_padre!="null"
                        && this.alu.familiares.nombre_madre!="null"
                        && this.alu.familiares.lugar_residencia_madre!="null"
                        && this.alu.familiares.lugar_residencia_padre!="null"
                        && this.alu.familiares.etnia_indigena!="null"
                        && this.alu.familiares.hablas_lengua_indigena!="null"
                        && this.alu.familiares.id_opc_vives!="null"
                        && this.alu.familiares.id_familia_union!="null"
                        && this.alu.familiares.nombre_tutor!="null"
                        && this.alu.familiares.id_parentesco!="null"
                        && this.alu.estudio.forma_estudio!="null"
                        && this.alu.estudio.tiempo_empleado_estudiar!="null"
                        && this.alu.estudio.id_opc_intelectual!="null"
                        && this.alu.integral.enfermedad_cronica!="null"
                        && this.alu.integral.enf_cron_padre!="null"
                        && this.alu.integral.operacion!="null"
                        && this.alu.integral.enfer_visual!="null"
                        && this.alu.integral.medicamento_controlado!="null"
                        && this.alu.integral.practica_deporte!="null"
                        && this.alu.integral.practica_artistica!="null"
                        && this.alu.integral.actividades_culturales!="null"
                        && this.alu.integral.usas_lentes!="null"
                        && this.alu.area.trabajo_equipo!="null"
                        && this.alu.area.rendimiento_escolar!="null"
                        && this.alu.area.conocimiento_compu!="null"
                        && this.alu.area.comprension!="null"
                        && this.alu.area.concentracion!="null"
                        && this.alu.area.otro_idioma!="null"
                        && this.alu.area.solucion_problemas!="null"
                        && this.alu.area.preparacion!="null"
                        && this.alu.area.busqueda_bibliografica!="null")
                    {
                        if(this.alu.generales.turno=="null")
                        {
                            this.fin=false;
                        }
                        else if (this.alu.generales.beca==1 && this.alu.generales.id_expbeca!="null" && this.alu.generales.id_expbeca!=null && this.alu.generales.id_expbeca!=0){
                            this.fin=true;
                            axios.post(this.act,{alu:this.alu}).then(response=> {
                                $("#modaleditar").modal("hide");
                            });
                        }
                        else if (this.alu.generales.beca==1 && this.alu.generales.id_expbeca=="null"){
                            this.fin=false;
                        }
                        else  if(this.alu.generales.beca==2)
                        {
                            this.fin=true;
                            axios.post(this.act,{alu:this.alu}).then(response=> {
                                $("#modaleditar").modal("hide");
                            });
                        }
                    }
                    else
                    {
                        this.fin=false;
                    }


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
                        this.alu.generales.nivel_economico=response.data.generales[0].nivel_economico;
                        this.alu.generales.trabaja=response.data.generales[0].trabaja;
                        this.alu.generales.ocupacion=response.data.generales[0].ocupacion;
                        this.alu.generales.horario=response.data.generales[0].horario;
                        this.alu.generales.no_cuenta=response.data.generales[0].no_cuenta;
                        this.alu.generales.beca=response.data.generales[0].beca;
                        this.alu.generales.id_expbeca=response.data.generales[0].id_expbeca;
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
                        this.becas=response.data.becas;

                    });
                },
                borra_institucion:function(){
                  this.alu.academicos.institucion=null;
                  this.alu.academicos.semestres_cursados=null;
                },
                borra_trabaja:function(){
                    this.alu.generales.ocupacion=null;
                    this.alu.generales.horario=null;
                },
                borra_beca:function(){
                    this.alu.generales.id_expbeca=null;
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
                reporte:function () {

                    this.direcciones_img=[];

                    for(let p in this.arreglo_graficas)
                    {
                        var chart = $('#'+this.arreglo_graficas[p]).highcharts();
                        var obj = {}, exportUrl = 'http://localhost:8004/';
                        obj.type = 'image/png';
                        obj.async = true;
                        obj.svg=chart.getSVG();

                        axios.post(exportUrl,obj).then(response=> {
                            this.direcciones_img.push(exportUrl+response.data);
                           // console.log(this.direcciones_img.length);
                            if((this.direcciones_img.length-1)=='13') {

                                axios.post(this.rep,{id_asigna_generacion:this.idasigna,id_carrera:this.idca,generacion:this.gen,imagen:this.direcciones_img},{
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'Accept': 'application/pdf'
                                    },
                                    responseType: "blob"
                                }).then(response=>{
                                    // console.log(response.data);
                                    const blob = new Blob([response.data], { type: 'application/pdf' });
                                    const objectUrl = URL.createObjectURL(blob);
                                    window.open(objectUrl)
                                });

                            }
                        });

                    }
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
                },

            },

        });
    </script>


@endsection
