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
        <pre> @{{ $data }}</pre>
        @include('alumno.modalCrearGrupo')
        @include('alumno.EliminarGrupo')
        @include('alumno.AgregarAlumnos')
        @include('alumno.EliminarAlumno')
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
                borrarAlumno:function (nombre) {
                    this.alumno=[];
                    this.clicgrupo=false;
                    this.nombregeneracion=nombre;
                },
                confirma:function(genera)
                {
                    this.idgeneracion=genera.id_generacion;
                    this.nomgen=genera.generacion;
                    this.nomg=genera.grupos.length+1;
                    $('#CrearGrupo').modal('show');
                },
                crearGrupo:function () {
                    axios.post(this.grup,{id_generacion:this.idgeneracion,nombre:this.nomg}).then(response=>{
                        $('#CrearGrupo').modal('hide');
                        this.getGeneracion();
                    }).catch(error=>{ });
                },
                ConfirmaBorrar:function(grupo)
                {
                    this.nomg=grupo.grupo;
                    this.idasignagen=grupo.id_asigna_generacion;
                    $('#EliminarGrupo').modal('show');
                },
                borrarGrupo:function () {
                    var url = '/alumnos/'+this.idasignagen;
                    axios.delete(url).then(response => {
                        this.getGeneracion();
                    });
                },
                Agregar:function () {
                    axios.post(this.buscar,{generacion:this.nombregeneracion,id_asigna_generacion:this.idasignageneracion}).then(response=>{
                        this.alumnosgeneracion=response.data;
                        $('#Alumnos').modal('show');
                    }).catch(error=>{ });
                },
                Guardar:function()
                {
                    axios.post(this.asignar,{alumnos:this.seleccionados,id_asigna_generacion:this.idasignageneracion}).then(response=>{
                        this.BorrarSeleccionados();
                        $('#Alumnos').modal('hide');
                        this.popToast('Registro exitoso!');
                        this.getAlumnos(response.data);
                    }).catch(error=>{ });
                },
                seleccionar_todos: function () {
                    this.seleccionados = [];
                    if (!this.selectAll) {
                        for (let i in this.alumnosgeneracion) {
                            this.seleccionados.push(this.alumnosgeneracion[i].id_alumno);
                        }
                    }
                },
                ConfirmaAlumno:function (alumno) {

                    this.nombrealumno=alumno.apaterno+" "+alumno.amaterno+" "+alumno.nombre;
                    this.idalumno=alumno.id_asigna_alumno;
                    $('#EliminarAlumno').modal('show');
                },
                EliminaAlumno:function () {

                    axios.post(this.eliminar,{id_asigna_alumno:this.idalumno,id_asigna_generacion:this.idasignageneracion}).then(response=>{
                        $('#EliminarAlumno').modal('hide');
                        this.popToast('Eliminado correctamente');
                        this.getAlumnos(response.data);
                    }).catch(error=>{ });
                },
                BorrarSeleccionados:function () {
                    this.seleccionados=[];
                    this.selectAll=false;
                },
                popToast(Mensaje) {
                    const h = this.$createElement;
                    const vNodesMsg = h(
                        'p',
                        { class: ['text-center', 'mb-0'] },
                        [
                            h('b-spinner', { props: { type: 'grow', small: true } }),
                            h('strong', {}, Mensaje),
                            h('b-spinner', { props: { type: 'grow', small: true } })
                        ]
                    );
                    this.$bvToast.toast([vNodesMsg], {
                        solid: true,
                        variant: 'success',
                        toaster:'b-toaster-top-full',
                        noCloseButton: true,
                        noHoverPause:false,
                        autoHideDelay:'2000',

                    });
                },
                refrescar:function () {
                    window.location.reload();
                }
            },
        });

    </script>
@endsection


