@extends('layouts.app')
@section('content')
    <div class="container" id="alumnoP">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Alumnos</div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">General</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="generacion-tab" data-toggle="tab" href="#generacion" role="tab" aria-controls="generacion" aria-selected="false">Generacion</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                                    <div class="list-group">
                                        <table class="table">
                                            <thead>
                                            <th>Cuenta</th>
                                            <th>Nombre</th>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade pt-4" id="generacion" role="tabpanel" aria-labelledby="generacion-tab">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        <li class="nav-item" v-for="gen in generacion">
                                            <a class="nav-link border m-1" @click="borrarAlumno()" :id="'pills-'+gen.generacion+'-tab'" data-toggle="pill" :href="'#pills-'+gen.generacion" role="tab" :aria-controls="'pills-'+gen.generacion" aria-selected="true">@{{ gen.generacion }}</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade " v-for="gen in generacion" :id="'pills-'+gen.generacion" role="tabpanel" :aria-labelledby="'pills-'+gen.generacion+'-tab'">


                                            <ul class="nav nav-pills mb-3" id="grupo-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link border m-1" v-bind:class="{active:activo}" @click="getAlumnos(gen.generacion)" id="pills-generalgen-tab" data-toggle="pill" href="#generalgen" role="tab" aria-controls="'pills-generalgen" aria-selected="true">General</a>
                                                </li>
                                                <li class="nav-item" v-for="grupo in gen.grupos">
                                                    <a class="nav-link border m-1 " v-bind:class="{active:activo}" @click="getAlumnos(grupo.id_asigna_generacion)" :id="'pills-'+grupo.id_asigna_generacion+'-tab'" data-toggle="pill" :href="'#pills-'+grupo.id_asigna_generacion" role="tab" :aria-controls="'pills-'+grupo.id_asigna_generacion" aria-selected="true">Grupo @{{ grupo.grupo }}</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="grupo-tabContent" v-if="alumno.length>0">
                                                <div class="list-group">
                                                    <table class="table">
                                                        <thead>
                                                        <th>Cuenta</th>
                                                        <th>Nombre</th>
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
    <script>
        new Vue({
            el:"#alumnoP",
            created:function(){
                this.getGeneracion();
            },
            data:{
                gene:'/generaciones',
                alug:'/alumnosgeneracion',
                generacion:[],
                alumno:[],
                activo:false,
            },
            methods:{
                getGeneracion:function () {
                    axios.get(this.gene).then(response=>{
                        this.generacion=response.data;
                    }).catch(error=>{ });
                },
                getAlumnos:function (gene) {
                    axios.post(this.alug,{generacion:gene}).then(response=>{
                        this.alumno=response.data;
                        console.log(this.alumno.length);
                    }).catch(error=>{ });
                },
                borrarAlumno:function () {
                    this.alumno=[];
                    this.activo=true;
                }
            },
        });

    </script>
@endsection


