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
                                    <li class="nav-item" v-for="gen in generacion">
                                        <a class="nav-link border m-1" @click="borrarAlumno(gen.generacion)" :id="'pills-'+gen.generacion+'-tab'" data-toggle="pill" :href="'#pills-'+gen.generacion" role="tab" :aria-controls="'pills-'+gen.generacion" aria-selected="true">@{{ gen.generacion }}</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade " v-for="gen in generacion" :id="'pills-'+gen.generacion" role="tabpanel" :aria-labelledby="'pills-'+gen.generacion+'-tab'">
                                        <div class="row border-bottom">
                                            <div class="col-12">
                                                <div class="row pb-3 pl-3">
                                                    <button type="button" class="btn btn-outline-success" @click="confirma(gen)"> <i class="fas fa-plus"></i> Crear grupo</button>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="nav nav-pills mb-3" id="grupo-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link border m-1" @click="getAlumnos(gen.generacion)" id="pills-generalgen-tab" data-toggle="pill" href="#generalgen" role="tab" aria-controls="'pills-generalgen" >General</a>
                                            </li>
                                            <li class="nav-item btn-group" v-for="grupo in gen.grupos">
                                                <a class="nav-link border m-1 "  @click="getAlumnos(grupo.id_asigna_generacion)" :id="'pills-'+grupo.id_asigna_generacion+'-tab'" data-toggle="pill" :href="'#pills-'+grupo.id_asigna_generacion" role="tab" :aria-controls="'pills-'+grupo.id_asigna_generacion">Grupo @{{ grupo.grupo }}</a>
                                                <a href="#"><i class="fas text-danger fa-times h4 pt-3" data-toggle="tooltip" data-placement="bottom" title="Eliminar Grupo" @click="ConfirmaBorrar(grupo)"></i></a></td>
                                            </li>
                                        </ul>
                                        <div class="row border-bottom-1" v-if="clicgrupo">
                                            <div class="col-12">
                                                <div class="row pb-3 pl-3">
                                                    <button type="button" class="btn btn-outline-success" @click="Agregar()"> <i class="fas fa-plus"></i>Asignar alumnos</button>
                                                </div>
                                            </div>
                                        </div>
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
                                                        <td v-if="clicgrupo"><button class="btn btn-outline-danger" @click="ConfirmaAlumno(alu)"><i class="fas fa-times" data-toggle="tooltip" data-placement="bottom" title="Eliminar"></i></button></td>
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
                grup:'/creargrupo',
                borra:'/borragrupo',
                buscar:'/buscaalumnos',
                asignar:'/asignaralumnos',
                eliminar:'/eliminaralumno',
                generacion:[],
                alumno:[],
                alumnosgeneracion:[],
                idgeneracion:null,
                nomg:null,
                nomgen:null,
                idasignagen:null,
                clicgrupo:false,
                clicgeneracion:false,
                idasignageneracion:null,
                nombregeneracion:null,
                seleccionados:[],
                selectAll: false,
                nombrealumno:null,
                idalumno:null,
            },
            methods:{
                getGeneracion:function () {
                    axios.get(this.gene).then(response=>{
                        this.generacion=response.data;
                    }).catch(error=>{ });
                },
                getAlumnos:function (gene) {

                    this.idasignageneracion=gene;
                    if(gene>2000)
                    {
                        this.clicgrupo=false;
                        this.clicgeneracion=true;
                    }
                    else {
                        this.clicgrupo=true;
                        this.clicgeneracion=false;
                    }
                    axios.post(this.alug,{generacion:gene}).then(response=>{
                        this.alumno=response.data;
                    }).catch(error=>{ });
                },
            },
        });
    </script>
@endsection


