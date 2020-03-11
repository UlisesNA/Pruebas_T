@extends('layouts.app')
@section('content')
    <div class="container" id="ind">
        <div class="row" v-show="menugrupos==true">
            <div class="col-12">
                <div align="center">
                    <h3>Seguimiento de Actividades</h3>
                </div>
                <div class="row">
                    <div class="col-3" v-for="grupo in grupos">
                        <div class="card">
                            <div class="card-header text-center font-weight-bold"> @{{ grupo.nombre }}</div>
                            <div class="card-body text-center">
                                <h5 class="card-title">Generación @{{ grupo.generacion }}</h5>
                                <p class="card-text">Grupo @{{ grupo.grupo }}</p>
                                <a href="#?" @click="getlista(grupo)" class="btn btn-outline-primary">Ver</a>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" v-show="menu==true">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 pb-3">
                        <i class="fas fa-chevron-left h5"></i>
                        <a href="{{url('/tutorias/seguimiento')}}" class="font-weight-bold h6 pb-1">{{\Illuminate\Support\Facades\Session::get('tutor')>1?'Regresar':'Regresar'}}</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card">
                                <div class="card-header">
                                    <div align="center">
                                        <div class="col-9 text-center font-weight-bold">@{{ carrera }}</div>
                                    </div>
                                    <div align="center"><div class="col-9 text-center">@{{ gen }}</div></div>
                                </div>
                                <div class="card-body" v-if="(lista==true && datos.length>0)">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row pb-3">
                                                <div class="col-6">
                                                    <form id="search">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="inputGroupPrepend3"><i class="fas fa-search"></i></span>
                                                            </div>
                                                            <input class="form-control" name="query" v-model="searchQuery" placeholder="Buscar">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="tableFixHeadLista">
                                                <data-table class=" col-12 table table-sm" :data="datos" :columns-to-display="gridColumns" :filter-key="searchQuery">
                                                    <template slot="Cuenta" scope="alumno">
                                                        <div class="pt-2">@{{ alumno.entry.cuenta }}</div>
                                                    </template>
                                                    <template slot="Nombre" scope="alumno">
                                                        <div class="pt-2">@{{ alumno.entry.apaterno }} @{{ alumno.entry.amaterno }} @{{ alumno.entry.nombre }}</div>
                                                    </template>
                                                    <template slot="Evidencias" scope="alumno">
                                                        <div>
                                                            @{{ alumno.entry.evidencia }}
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
                                        <h5 class="font-weight-bold">Los estudiantes no han subido evidencias</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        Vue.use(DataTable);
        new Vue({
            el: "#ind",
            created: function () {
                this.lista = false;
                this.menugrupos = true;
                this.menu = false;
                this.getTut();
            },
            data: {
                searchQuery: '',
                gridColumns: ['Cuenta', 'Nombre', 'Evidencias'],
                rut: "/tutorias/seguimientoplan",
                grup: "/tutorias/grupos",
                veralu: "/tutorias/ver",
                datos: [],
                grupos: [],
                alumnog: [],
                vista: [],
                periodos: [],
                semestres: [],
                carreras: [],
                grupo: [],
            },
            methods: {
                getTut: function () {
                    axios.get(this.grup).then(response => {
                        this.grupos = response.data;
                }).catch(error => {
                    });
                },
                getlista: function (grupo) {
                    this.idca = grupo.id_carrera;
                    this.idasigna = grupo.id_asigna_generacion;
                    this.carrera = grupo.nombre;
                    this.gen = " GENERACIÓN " + grupo.generacion + " GRUPO " + grupo.grupo;
                    this.gene = " GENERACIÓN " + grupo.generacion;
                    this.getAlumnos();
                },
                getAlumnos: function () {
                    axios.post(this.rut, {
                        id_asigna_generacion: this.idasigna,
                        id_carrera: this.idca
                    }).then(response => {
                        this.menugrupos = false;
                    this.menu = true;
                    this.lista = true;
                    this.plan = false;
                    this.listacanaliza = false;
                    this.graficas = false;
                    this.datos = response.data;
                    this.nuevos = response.data;
                }).catch(error => {
                    });
                },
            },
        });
    </script>
@endsection
