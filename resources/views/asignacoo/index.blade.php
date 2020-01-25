@extends('layouts.app')
@section('content')
<div class="container" id="principal">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Asigna Coordinador </div>
                        <div class="card-body" v-if="datos.check">
                            Ya ha sido asignado un coordinador
                        </div>
                    <div class="card-body text-center" v-else>
                        <h5>Selecciona el periodo</h5>
                        <select name="periodo" id="periodo" class="form-control" v-model="selecte">
                            <option value="">Selecciona el periodo</option>
                            <option  v-bind:value="periodo.id_periodo" v-for="periodo in datos.periodos">@{{ periodo.periodo }}</option>
                        </select>
                        <br>
                        <button class="btn btn-outline-success" v-if="selecte!=null" v-on:click="abrir" id="btn-add">Asigna coordinador</button>
                        </div>
                </div>
            </div>
        </div>
    @include('asignacoo.asignaco')
</div>
<script>
    new Vue({
        el:"#principal",
        created:function(){
            this.getDatos();

        },
        data:{
            coor:"{{url("/asignacoordinador")}}",
            datos:[],
            selecte:null,
            name:"",
            idname:"",
        },
        methods:{
            getDatos:function () {
                axios.get(this.coor).then(response=>{
                    this.datos=response.data;
                }).catch(error=>{ });
            },
            abrir:function () {
                $('#modal-add').modal('show');
            },
            funclick:function (profesor) {
                this.name= profesor.nombre;
                this.idname= profesor.id_personal;


            },
            borrar:function () {
                $('#val').html('');
                $('#btnAsigCoo').hide();
            },
            agregarCo:function () {
                axios.post(this.coor,{id_personal:this.idname}).then(response=>{

                });
            }

        },
    });
</script>
    @endsection
