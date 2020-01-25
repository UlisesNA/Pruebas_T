@extends('layouts.app')
@section('content')
    <div class="container" id="principaltutor">
        <div class="offset-1 col-lg-10">
            <div class="card">
                <div class="card-header">
                    <div class="row align-content-center">
                        <div class="col-8">
                                <h6>Asignación de tutores</h6>
                        </div>
                        <div class="offset-3 col-1">
                            <button class="btn btn-outline-success" v-if="selected!=null"  v-on:click.prevent="abrir()">+</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                        </div>
                        <div class="col-6 text-center">
                            <h5>Selecciona el periodo</h5>
                            <select name="periodo" id="periodo" class="form-control" v-model="selected">
                                <option value="">Selecciona el periodo</option>
                                <option  v-bind:value="periodo.id_periodo" v-for="periodo in datos.periodos">@{{ periodo.periodo }}</option>
                            </select>
                        </div>
                    </div>
                    <!--<div class="row pt-5">
                        <div class=" col-12">
                            <div id="" class="row" v-if="selected!=null">
                                <div class="col-4">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="text-center">Nombre</th>
                                        </tr>
                                        </thead>
                                        <tbody >
                                        <tr v-for="profesor in datos.profesores" @click="profesores(profesor)" v-bind:data-id='profesor.id_personal' v-bind:data-name="profesor.nombre" >
                                            <td>@{{profesor.nombre}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-5">
                                    <table class="table table-bordered align-content-center">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="text-center">Tutor</th>
                                            <th scope="col" class="text-center">Generación</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th id='' >@{{ nameP }}</th>
                                            <th id=''>@{{ generaciong }}</th>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <button id="btnAsigCoo" v-if="conP==true && conG==true" @click="guardar()" class="btn btn-outline-primary btn-lg btn-block">Asignar</button>
                                </div>
                                <div class="col-3">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="text-center">Generación</th>
                                        </tr>
                                        </thead>
                                        <tbody id="datos-tabla">
                                        <tr v-for="grupo in datos.grupos" class="gen" v-bind:id="grupo.id_asigna_generacion"  v-on:click.prevent="generaciones(grupo)" >
                                            <td class="text-center">@{{grupo.generacion}} grupo: @{{grupo.grupo}}</td>
                                        </tr>
                                        <tr v-if="datos.grupos==null"><td>Se han asignado todas las generaciones</td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>

        @include('asignatuto.add');

    </div>

    <script>
        new Vue({
            el:"#principaltutor",
            created:function(){
                this.getDatos();
            },
            data:{
                tut:"{{url("/asignatutores")}}",
                selected:null,
                datos:[],
                grup:null,
                gen:null,
                idgene:null,
                conG:false,
                conP:false,
                nameP:"",
                idP:"",
                generaciong:"",
            },
            methods:{
                getDatos:function () {
                    axios.get(this.tut).then(response=>{
                        this.datos=response.data;
                    }).catch(error=>{ });
                },
                abrir:function () {
                    $('#add').modal('show');
                },
                borrar:function () {
                    this.conP=false;
                    this.conG=false;
                    this.nameP="";
                    this.generaciong="";
                },
                generaciones:function (genera) {
                    this.grup=genera.grupo;
                    this.gen=genera.generacion;
                    this.idgene=genera.id_asigna_generacion;
                    this.generaciong=this.gen+" grupo: "+this.grup;
                    this.conG=true;
                },
                profesores:function (profesor) {
                    this.nameP=profesor.nombre;
                    this.idP=profesor.id_personal;
                    this.conP=true;
                },
                guardar:function () {
                    axios.post(this.tut,{id_personal:this.idP,id_asigna_generacion:this.idgene}).then(response=>{
                        this.borrar();
                        $('#'+this.idgene).toggle();
                    });
                }

            },
        });
    </script>
@endsection
<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script-->
<script src="{{asset('js/jquery.js')}}"></script>
