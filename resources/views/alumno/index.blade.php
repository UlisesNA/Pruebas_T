@extends('layouts.app')
@section('content')
    <div class="container" id="alumnoP">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">Alumnos</div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="generacion-tab" data-toggle="tab" href="#generacion" role="tab"  aria-controls="generacion" aria-selected="false">Generacion</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade pt-4 show active" id="generacion" role="tabpanel" aria-labelledby="generacion-tab">
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
                                                    <a class="nav-link border m-1" @click="getAlumnosGeneracion(gen.generacion)" id="pills-generalgen-tab" data-toggle="pill" href="#generalgen" role="tab" aria-controls="'pills-generalgen" >General</a>
                                                </li>
                                                <li class="nav-item btn-group" v-for="grupo in gen.grupos">
                                                    <a class="nav-link border m-1 "  @click="getAlumnosGrupo(grupo.id_asigna_generacion)" :id="'pills-'+grupo.id_asigna_generacion+'-tab'" data-toggle="pill" :href="'#pills-'+grupo.id_asigna_generacion" role="tab" :aria-controls="'pills-'+grupo.id_asigna_generacion">Grupo @{{ grupo.grupo }}</a>
                                                    <a href="#"><i class="fas text-danger fa-times h4 pt-3" data-toggle="tooltip" data-placement="bottom" title="Eliminar Grupo" @click="ConfirmaBorrar(grupo)"></i></a></td>
                                                </li>
                                            </ul>
                                            <div class="row border-bottom-1" >
                                                <div class="col-12">
                                                    <div class="row pb-3 pl-3">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-content" id="grupo-tabContent">
                                                <div class="row">
                                                    <div class="col-6 pb-3" v-if="(alumno.length>0)">
                                                        <form id="search">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="inputGroupPrepend3"><i class="fas fa-search"></i></span>
                                                                </div>
                                                                <input class="form-control" name="query" v-model="searchQuery" placeholder="Buscar">
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="col-3 " v-bind:class="[alumno.length==0? 'offset-9': 'offset-3']" v-if="clicgrupo">
                                                        <button type="button" class="btn btn-outline-success" @click="Agregar()"> <i class="fas fa-plus"></i> Asignar alumnos</button>
                                                    </div>
                                                </div>
                                                <div class="row" v-if="(alumno.length>0)">
                                                    <div class="col-12">
                                                        <div class="tableFixHead" id="LISTA">
                                                            <data-table class=" col-12 table table-sm" :data="alumno" :columns-to-display="gridColumns" :filter-key="searchQuery">
                                                                <template slot="Cuenta" scope="alu">
                                                                    <div class="font-weight-bold pt-2">@{{alu.entry.cuenta}}</div>
                                                                </template>
                                                                <template slot="Nombre" scope="alu">
                                                                    <div class="pt-2">@{{ alu.entry.apaterno }} @{{ alu.entry.amaterno}} @{{ alu.entry.nombre }}</div>
                                                                </template>
                                                                <template slot="Acción" scope="alu">
                                                                    <div v-if="clicgrupo"><button class="btn btn-outline-danger" @click="ConfirmaAlumno(alu.entry)"><i class="fas fa-times" data-toggle="tooltip" data-placement="bottom" title="Eliminar"></i></button></div>
                                                                </template>
                                                                <template slot="nodata">
                                                                    <div class=" alert font-weight-bold alert-danger text-center">Ningún dato encontrado</div>
                                                                </template>
                                                            </data-table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row pt-3" v-if="alumno.length==0 && clicgrupo==true">
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
        @include('alumno.modalCrearGrupo')
        @include('alumno.EliminarGrupo')
        @include('alumno.AgregarAlumnos')
        @include('alumno.EliminarAlumno')
        <pre>@{{ seleccionados }}</pre>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#LISTA').DataTable();
        } );
        new Vue({
            el:"#alumnoP",
            created:function(){
                this.getGeneracion();
            },
            data:{
                gene:'/generaciones',
                alugeneracion:'/alumnosgeneracion',
                alugrupo:'/alumnosgrupo',
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
                searchQuery: '',
                searchQuery1: '',
                columnasM:[' ','Cuenta','Nombre'],
                gridColumns: [],
            },
            methods:{
                getGeneracion:function () {
                    axios.get(this.gene).then(response=>{
                        this.generacion=response.data;
                    }).catch(error=>{ });
                },
                getAlumnosGrupo:function (grupo) {
                    this.idasignageneracion=grupo;
                    this.clicgrupo=true;
                    this.gridColumns= ['Cuenta','Nombre','Acción'];
                    this.clicgeneracion=false;
                    axios.post(this.alugrupo,{generacion:grupo}).then(response=>{
                        this.alumno=response.data;
                    }).catch(error=>{ });
                },
                getAlumnosGeneracion:function(genera)
                {
                    this.clicgrupo=false;
                    this.gridColumns= ['Cuenta','Nombre'];
                    this.clicgeneracion=true;
                    axios.post(this.alugeneracion,{generacion:genera}).then(response=>{
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
                        this.alumno=[];
                        this.clicgrupo=false;
                        this.popToast("Grupo eliminado correctamente");
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
                        this.getAlumnosGrupo(response.data);
                        this.popToast('Registro exitoso!');
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
                        this.getAlumnosGrupo(response.data);
                        this.popToast('Eliminado correctamente');

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

            },
        });

    </script>
@endsection


