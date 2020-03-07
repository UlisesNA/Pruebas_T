@extends('layouts.app')
@section('content')
<div class="container pb-5 pt-5" id="principal">
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-10 align-middle"><h5>{{Session::get('nombre')}}</h5></div>
                                <div class="col-2" v-if="datos==1">
                                    <a href="{{url('/tutorias/pdf/all')}}" target="_blank" class="btn btn-danger text-white float-right"> <i class="fas fa-file-pdf"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <a href="AlumActualizar" v-if="datos==1" class="btn btn-success"> <h1><i class="fas fa-folder"></i></h1> Editar Expediente</a>
                        <a href="Alum" v-if="datos==2" class="btn btn-primary"> <h1><i class="fas fa-folder"></i></h1> Llenar Expediente</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    new Vue({
        el: "#principal",
        created: function () {
            this.getDatos();
        },
        data: {
            rut: "/tutorias/panel",
            datos:[],
        },
        methods: {
            getDatos: function () {
                axios.get(this.rut).then(response => {
                    this.datos = response.data;
                }).catch(error => {
                });
            },
        }
    });
</script>
@endsection
