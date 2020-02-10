@extends('layouts.app')
@section('content')
    <div id="index_d">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12" id="coordinador">
                                    <div class="card" v-if="datos.coordinador!=null">
                                        <div class="card-header">
                                            <h5 class="card-title">Coordinador General Asignado</h5>
                                        </div>
                                        <div class="card-body">
                                            <table class="text-center table">
                                                <thead>
                                                <th>Nombre</th>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>@{{datos.coordinador[0].nombre}}</td>
                                                    <td><button  v-on:click="confirmC(datos.coordinador[0].id_asigna_coordinador_general)" class=" btn btn-outline-danger">X</button>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card" v-if="datos.coordinador==null">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Coordinador No Asignado</h5>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('jefe.eliminarcoor')
    </div>

    <script>
        new Vue({
            el:"#index_d",
            created:function(){
                this.getDatos();
            },
            data:{
                jefe:"{{url("/desarrollo")}}",
                datos:[],
                id_tu:null,
                id_c:null
            },
            methods:{
                getDatos:function () {
                    axios.get(this.jefe).then(response=>{
                        this.datos=response.data;
                    }).catch(error=>{ });
                },
                deleteC:function () {
                    var url = '/asignacoordinadorgeneral/' + this.id_co;
                    axios.delete(url).then(response => {
                        this.getDatos();
                    });
                },
                confirmC:function (id) {
                    this.id_co=id;
                    $('#EliminarCo').modal('show');
                },

            },
        });

    </script>
@endsection


