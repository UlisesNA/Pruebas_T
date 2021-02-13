@extends('layouts.app')
@section('content')
    <div class="container" id="ind">
        <div class="row" v-show="menugrupos==true">
            <div class="col-12">
                <div class="row" >
                    <div class="col-2 pt-2" v-for="grupo in grupos">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Generación @{{ grupo.generacion }}</h5>
                                <a href="#" @click="getlista(grupo)" class="btn btn-outline-primary">Ver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" v-show="menu==true">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 pb-3">
                        <i class="fas fa-chevron-right h5"></i>
                        <a href="{{url('/tutorias/planeacioncoorgen')}}" class="font-weight-bold h6 pb-1">GENERACIONES</a>
                        <i class="fas fa-chevron-right h5"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-11 text-center">PLANEACIÓN @{{ gen }}</div>
                                        <div class="col-1 text-center">
                                            <button class="btn btn-outline-info m-1"
                                                    @click="agregaract()" data-toggle="tooltip" data-placement="bottom" title="Agregar Actividad">+
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" v-if="(lista==true && datos.length>0)">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="tableFixHeadLista">
                                                <data-table class=" col-12 table-hover table-sm" :data="datos" :columns-to-display="gridColumns">
                                                    <template slot="Fecha Inicio" scope="alumno">
                                                        <div class="text-center pt-2">@{{ alumno.entry.fi_acti}}</div>
                                                    </template>
                                                    <template slot="Fecha Fin" scope="alumno">
                                                        <div class="text-center pt-2">@{{ alumno.entry.ff_acti}}</div>
                                                    </template>
                                                    <template slot="Nombre Actividad" scope="alumno">
                                                        <div class="text-center pt-2">@{{ alumno.entry.desc_actividad}}</div>
                                                    </template>
                                                    <template slot="Acciones" scope="alumno">
                                                        <div class="text-center" v-if="alumno.entry.id_estado==2 && alumno.entry.comentario!=null">
                                                            <button class="btn btn-outline-primary m-1"
                                                                    @click="acticam(alumno.entry)" data-toggle="tooltip" data-placement="bottom" title="Editar Actividad"><i class="far fa-edit"></i>
                                                            </button>
                                                        </div>
                                                        <div class="text-center" v-else-if="alumno.entry.id_estado==2 && alumno.entry.comentario==null">
                                                            <button class="btn btn-outline-primary m-1"
                                                                    @click="acticam(alumno.entry)" data-toggle="tooltip" data-placement="bottom" title="Editar Actividad"><i class="far fa-edit"></i>
                                                            </button>
                                                        </div>
                                                        <div class="text-center" v-else-if="alumno.entry.id_estado==1">
                                                            <button class="btn btn-outline-primary m-1"
                                                                    @click="acticam(alumno.entry)" data-toggle="tooltip" data-placement="bottom" title="Ver Actividad"><i class="far fa-eye"></i>
                                                            </button>
                                                        </div>
                                                        <div class="text-center" v-else-if="alumno.entry.id_estado==3">
                                                            <button class="btn btn-outline-primary m-1"
                                                                    @click="acticam(alumno.entry)" data-toggle="tooltip" data-placement="bottom" title="Actividad con Cambios"><i class="far fa-edit"></i>
                                                            </button>
                                                        </div>
                                                    </template>
                                                    <template slot="Mensaje" scope="alumno">
                                                        <div class="text-center" v-if="alumno.entry.id_estado==2 && alumno.entry.comentario!=null">
                                                            <a>Actividad Corregida</a>
                                                        </div>
                                                        <div class="text-center" v-else-if="alumno.entry.id_estado==2 && alumno.entry.comentario==null">
                                                            <button  v-on:click="confirmC(alumno.entry.id_plan_actividad)" class=" btn btn-outline-danger" data-toggle="tooltip" title="Eliminar Actividad"><i class="fa fa-times"></i></button>
                                                        </div>
                                                        <div class="text-center" v-else-if="alumno.entry.id_estado==1">
                                                            <a>Actividad Aprobada</a>
                                                        </div>
                                                        <div class="text-center" v-else-if="alumno.entry.id_estado==3">
                                                            <a>Actividad Con Cambios</a>
                                                        </div>
                                                    </template>
                                                    <template slot="nodata">
                                                        <div class=" alert font-weight-bold alert-danger text-center">Ningún dato encontrado</div>
                                                    </template>
                                                </data-table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body" v-if="datos.length==0">
                                <div class="row ">
                                    <div class="col-12 alert-info alert text-center">
                                        <h5 class="font-weight-bold">No se han asignado actividades</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('coordina_inst.modalagregaract')
        @include('coordina_inst.eliminaracti')
        @include('coordina_inst.modalact')
    </div>
    <script type="text/javascript">
        Vue.use(DataTable);
        new Vue({
            el: "#ind",
            created: function () {
                this.lista = false;
                this.plan = false;
                this.menugrupos = true;
                this.graficas = false;
                this.menu = false;
                this.getTut();
            },
            data: {
                gridColumns: ['Fecha Inicio', 'Fecha Fin', 'Nombre Actividad', 'Acciones', 'Mensaje'],
                rut: "/tutorias/actividadescoor",/////////////////
                rutaa: "/tutorias/semestre",
                generacion: "/tutorias/generacion",/////////////////////
                act: '/tutorias/actualiza',////////
                actestra: '/tutorias/actualizaestra',
                actsuge: '/tutorias/actualizasuge',
                cambios: '/tutorias/cambio',
                editaract : '/tutorias/modalactactidesa',//////////////////////////
                editaractcoor: '/tutorias/editaractcoor',/////////////////////////////
                correc : '/tutorias/modalcorrecion',//////////////////////////
                actividadid: '/tutorias/modalagregaractividad',//////////////////////////
                aprucorrect: '/tutorias/apruebacorreccion',/////////////////////////////
                prueba: '/tutorias/agactcoorgen',
                datos: [],////////////////////
                grupos: [],///////////
                alumnog: [],
                semestres: [],
                carreras: [],
                grupo: [],
                lista: false,
                listaa: false,
                listacanaliza: false,
                menugrupos: true,/////////
                menu: false,
                carrera: "",
                gen: "",
                gene: "",
                idca: null,
                idasigna: null,
                content_modal: "",
                act: {
                    va: {
                        id_plan_actividad: "",
                        desc_actividad: "",
                        objetivo_actividad: "",
                        fi_acti: "",
                        ff_acti: "",
                        id_asigna_generacion: "",
                        comentario: "",
                        id_estado: "",
                        id_asigna_planeacion_actividad: "",
                        id_generacion: "",
                        generacion: "",
                    },
                },
                correct: {
                    va: {
                        id_plan_actividad: "",
                        id_asigna_generacion: "",
                        comentario: "",
                        id_estado: "",
                        id_asigna_planeacion_actividad: "",
                        id_generacion: "",
                        generacion: "",
                    },
                },
                agract:{
                    id_generacion: "",
                    id_asigna_generacion: "",
                    fi_actividad: "",
                    ff_actividad: "",
                    desc_actividad: "",
                    objetivo_actividad: "",
                    id_estado: "2",
                }
            },
            methods: {
                ////////////////////////
                getTut: function () {
                    axios.get(this.generacion).then(response => {
                        this.grupos = response.data;
                    }).catch(error => {
                    });
                },
                ////////////
                getlista: function (grupo) {
                    this.idgenera = grupo.id_generacion;
                    this.idasigna = grupo.id_asigna_generacion;
                    this.gen = " GENERACIÓN " + grupo.generacion;
                    this.getAlumnos();
                },
                getAlumnos: function () {
                    this.id= this.idgenera;
                    axios.post(this.rut, {
                        id_generacion: this.idgenera,
                        id_asigna_generacion: this.idasigna
                    }).then(response => {
                        this.menugrupos = false;
                        this.menu = true;
                        this.lista = true;
                        this.plan = false;
                        this.listacanaliza = false;
                        this.graficas = false;
                        this.datos = response.data;
                    }).catch(error => {
                    });
                },
                agregaract: function () {
                    axios.post(this.actividadid, {
                        idg:this.id,
                    }).then(response => {
                        this.agract.id_generacion=response.data.va[0].id_generacion;
                        this.agract.id_asigna_generacion=response.data.va[0].id_asigna_generacion;
                        $("#modalagregaract").modal("show");
                    });
                },
                submitAgregar: function(){
                    axios.post(this.prueba,  {
                        fi_actividad:this.agract.fi_actividad,
                        ff_actividad:this.agract.ff_actividad,
                        desc_actividad:this.agract.desc_actividad,
                        objetivo_actividad:this.agract.objetivo_actividad,
                        id_estado:this.agract.id_estado,
                        id_generacion:this.agract.id_generacion,
                    })
                        .then(response => {
                            $("#modalagregaract").modal("hide");
                            this.agract.fi_actividad="";
                            this.agract.ff_actividad="";
                            this.agract.desc_actividad="";
                            this.agract.objetivo_actividad="";
                            this.getAlumnos();
                            this.popToast('Actividad Agregada');
                        });
                },
                acticam: function (alumno) {
                    console.log(alumno);
                    axios.post(this.editaract, {id: alumno.id_plan_actividad}).then(response => {
                        this.act.va.id_plan_actividad = response.data.va[0].id_plan_actividad;
                        this.act.va.desc_actividad = response.data.va[0].desc_actividad;
                        this.act.va.objetivo_actividad = response.data.va[0].objetivo_actividad;
                        this.act.va.fi_acti = response.data.va[0].fi_acti;
                        this.act.va.ff_acti = response.data.va[0].ff_acti;
                        this.act.va.id_asigna_generacion = response.data.va[0].id_asigna_generacion;
                        this.act.va.comentario = response.data.va[0].comentario;
                        this.act.va.id_estado = response.data.va[0].id_estado;
                        this.act.va.id_asigna_planeacion_actividad = response.data.va[0].id_asigna_planeacion_actividad;
                        this.act.va.id_generacion = response.data.va[0].id_generacion;
                        this.act.va.generacion = response.data.va[0].generacion;
                        $("#modalact").modal("show");
                    });
                },
                submitAprobar: function(){
                    axios.post(this.editaractcoor,  {
                        id_plan_actividad: this.act.va.id_plan_actividad,
                        id_generacion: this.act.va.id_generacion,
                        id_asigna_generacion: this.act.va.id_asigna_generacion,
                        fi_actividad:this.act.va.fi_actividad,
                        ff_actividad:this.act.va.ff_actividad,
                        desc_actividad:this.act.va.desc_actividad,
                        objetivo_actividad:this.act.va.objetivo_actividad,
                        generacion: this.act.va.generacion,
                        comentario: this.act.va.comentario,
                        id_estado:2,
                    })
                        .then(response => {
                            $("#modalact").modal("hide");
                            //alert(response.data)
                            this.getlista(response.data);
                            this.popToast('Actividad Corregida');
                        });
                },
                deleteC:function () {
                    var url = '/tutorias/actividades/' + this.id_co;
                    axios.delete(url).then(response => {
                        this.getAlumnos();
                        this.popToast1('Actividad Eliminada');
                    });
                },
                confirmC:function (id) {
                    this.id_co=id;
                    $('#EliminarAct').modal('show');
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
                popToast1(Mensaje) {
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
                        variant: 'warning',
                        toaster:'b-toaster-top-full',
                        noCloseButton: true,
                        noHoverPause:false,
                        autoHideDelay:'2000',

                    });
                },
            },
        }).catch(error=>{ });
    </script>
@endsection

