@extends('layouts.app')
@section('content')
    <div class="container" id="ind">
        <div class="row" v-if="menu" >
            <div class="col-12">
                <div class="row">
                    <div class="col-3" v-for="carrera in carreras">
                        <div class="card">
                            <div class="card-header text-center font-weight-bold"> @{{ carrera.nombre }}</div>
                            <div class="card-body text-center">
                                <a href="#" @click="getGeneracion(carrera)" class="btn btn-outline-primary">Ver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" v-if="menucarrera" >
            <div class="col-12">
                <div class="card">
                    <div class="card-header">@{{ nombrecarrera }}</div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" @click="refrescar()" aria-controls="general" aria-selected="true">General</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="generacion-tab" data-toggle="tab" href="#generacion" role="tab"  aria-controls="generacion" aria-selected="false">Generacion</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">

                            </div>
                            <div class="tab-pane fade pt-4" id="generacion" role="tabpanel" aria-labelledby="generacion-tab">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" v-for="gen in generaciones">
                                        <a class="nav-link border m-1" @click="borrarAlumno(gen.generacion)" :id="'pills-'+gen.generacion+'-tab'" data-toggle="pill" :href="'#pills-'+gen.generacion" role="tab" :aria-controls="'pills-'+gen.generacion" aria-selected="true">@{{ gen.generacion }}</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade " v-for="gen in generaciones" :id="'pills-'+gen.generacion" role="tabpanel" :aria-labelledby="'pills-'+gen.generacion+'-tab'">
                                        <ul class="nav nav-pills mb-3" id="grupo-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link border m-1" @click="getAlumnos(gen.generacion)" id="pills-generalgen-tab" data-toggle="pill" href="#generalgen" role="tab" aria-controls="'pills-generalgen" >General</a>
                                            </li>
                                            <li class="nav-item btn-group" v-for="grupo in gen.grupos">
                                                <a class="nav-link border m-1 "  @click="getAlumnos(grupo.id_asigna_generacion)" :id="'pills-'+grupo.id_asigna_generacion+'-tab'" data-toggle="pill" :href="'#pills-'+grupo.id_asigna_generacion" role="tab" :aria-controls="'pills-'+grupo.id_asigna_generacion">Grupo @{{ grupo.grupo }}</a>
                                          </li>
                                        </ul>
                                        <div class="tab-content" id="grupo-tabContent" v-if="alumno.length>0">
                                            <div class="tableFixHead">
                                                <table class="table">
                                                    <thead>
                                                    <th>Cuenta</th>
                                                    <th>Nombre</th>
                                                    <th></th>
                                                    </thead>
                                                    <tbody>
                                                    <tr v-for="alu in alumno">
                                                        <td>@{{alu.cuenta}}</td>
                                                        <td>@{{alu.apaterno}} @{{alu.amaterno}} @{{alu.nombre}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row" v-if="alumno.length==0 && clicgrupo==true">
                                            <div class="col-12 border-danger">
                                                <h5 class="font-weight-bold text-center alert alert-danger">No existen alumnos asignados al grupo</h5>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <!--<div class="row" v-show="graficas==true">
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
                    </div>-->
            </div>
        </div>
    </div>

    <script>
        new Vue({
            el:"#ind",
            created:function(){
                this.getCarreras();
            },
            data:{
                rut:"/carrera",
                gen:'/generacionca',
                alu:'/alumnosgeneracion',
                carreras:[],
                alumno:[],
                menu:true,
                menucarrera:false,
                generaciones:[],
                nombrecarrera:null,
                clicgrupo:false,
            },
            methods:{
                getCarreras:function(){
                    axios.get(this.rut).then(response=>{
                        this.carreras=response.data;
                    }).catch(error=>{ });
                },
                getGeneracion:function (carrera) {
                    this.menu=false;
                    this.menucarrera=true;
                    this.nombrecarrera=carrera.nombre;
                    axios.post(this.gen,{id_carrera:carrera.id_carrera}).then(response=>{
                        this.generaciones=response.data;
                    }).catch(error=>{ });
                },
                getAlumnos:function (gene) {

                    if(gene>2000)
                    {
                        this.clicgrupo=false;
                    }
                    else {
                        this.clicgrupo=true;
                    }
                    axios.post(this.alu,{generacion:gene}).then(response=>{
                        this.alumno=response.data;
                    }).catch(error=>{ });
                },
                borrarAlumno:function (nombre) {
                    this.alumno=[];
                    this.clicgrupo=false;
                },

            },

        });
    </script>

@endsection
