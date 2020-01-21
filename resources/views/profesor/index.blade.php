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
                            <div class="col-10 text-center font-weight-bold">@{{ carrera }}</div>
                            <div class="col-1"><button class="btn text-white btn-success" @click="getAlumnos()" ><i class="fas fa-list"></i></button></div>
                            <div class="col-1"><button class="btn text-white btn-primary" @click="graficagenero()" ><i class="fas fa-chart-pie"></i></button></div>
                        </div>
                        <div class="row"><div class="col-10 text-center">@{{ gen }}</div></div>
                    </div>
                    <div class="card-body" v-show="lista==true" >
                        <div class="row">
                            <div class="col-12">
                                <div class="row pb-2">
                                    <div class="col-11"></div>
                                    <a @click="pdf()" target="_blank" class="btn btn-danger text-white float-right"> <i class="fas fa-file-pdf"></i></a>
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
                                        <th>Acciones</th>
                                        <th>Expediente</th>
                                    </tr>
                                    </thead>
                                    <tbody class="">
                                    <tr v-for="alumno in datos">
                                        <td class="text-center font-weight-bold" v-bind:class="[alumno.estado==2 ? 'bg-warning' : alumno.estado==3 ? 'bg-danger':'']">@{{ alumno.cuenta }}</td>
                                        <td class="">@{{ alumno.apaterno }} @{{ alumno.amaterno }} @{{ alumno.nombre }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-outline-success" @click="cambio(alumno,1)">N</button>
                                            <button class="btn btn-outline-warning m-1" @click="cambio(alumno,2)">T</button>
                                            <button class="btn btn-outline-danger m-1" @click="cambio(alumno,3)">B</button>
                                        </td>
                                        <td class="text-center"><button class="btn btn-outline-primary" @click="ver(alumno)">E</button></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
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
                grup:"/grupos",
                act:'/UpdateA',
                cambios:'/cambio',
                academico:'graphics/academico',
                rutgen:"/graphics/genero",
                generales:"/graphics/generales",
                familiares:"/graphics/familiares",
                habitos:"/graphics/habitos",
                salud:"/graphics/salud",
                area:"/graphics/area",
                pd:"pdf/lista",
                datos:[],
                grupos:[],
                alumnog:[],
                eg:[],
                ea:[],
                ef:[],
                eh:[],
                es:[],
                eas:[],
                vista:[],
                lista:false,
                menugrupos:true,
                menu:false,
                graficas:false,
                carrera:"",
                gen:"",
                idca:null,
                idasigna:null,
                content_modal:"",
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
                },
                getAlumnos:function()
                {
                    axios.post(this.rut,{id_asigna_generacion:this.idasigna,id_carrera:this.idca}).then(response=>{
                        this.menugrupos=false;
                        this.menu=true;
                        this.lista=true;
                        this.graficas=false;
                        this.datos=response.data;

                    }).catch(error=>{ });
                },
                graficagenero:function()
                {
                    this.lista=false;
                    this.menugrupos=false;
                    this.graficas=true;
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
                ver:function (alumno) {
                    $("#modaleditar").modal("show")
                    /*axios.post(this.act,{id_alumno:alumno.id_alumno}).then(response=>{
                        //this.content_modal=response


                    });*/
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
                }
            },

        });
    </script>


@endsection
