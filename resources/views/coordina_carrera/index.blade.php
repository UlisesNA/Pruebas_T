@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Alumnos</div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="generacion-tab" data-toggle="tab" href="#generacion" role="tab"  aria-controls="generacion" aria-selected="false">Profesores</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
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
                                                <a class="nav-link border m-1" @click="getAlumnosGeneracion(gen.generacion)" id="pills-generalgen-tab" data-toggle="pill" href="#generalgen" role="tab" aria-controls="'pills-generalgen" >General</a>
                                            </li>
                                            <li class="nav-item btn-group" v-for="grupo in gen.grupos">
                                                <a class="nav-link border m-1 "  @click="getAlumnosGrupo(grupo.id_asigna_generacion)" :id="'pills-'+grupo.id_asigna_generacion+'-tab'" data-toggle="pill" :href="'#pills-'+grupo.id_asigna_generacion" role="tab" :aria-controls="'pills-'+grupo.id_asigna_generacion">Grupo @{{ grupo.grupo }}</a>
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
                                        <div class="tab-content" id="grupo-tabContent" v-if="(alumno.length>0)">
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
        @include('alumno.modalCrearGrupo')
        @include('alumno.EliminarGrupo')
        @include('alumno.AgregarAlumnos')
        @include('alumno.EliminarAlumno')
    </div>
    </div>
@endsection
<script src="{{asset('js/jquery.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#planea').click(function(){
            var con= true;
            var datos = $('#form-expe').serialize();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "coordina_carrera",
                method: "POST",
                dataType: "json",
                data:datos,
                success:function (data) {
                    location.reload();
                },
                error:function(request,status,data)
                {
                    alert("Hubo un error al insertar el dato, intentelo de nuevo")
                    console.log(request)
                    console.log(status)
                    console.log(data)
                }
            });
        });
    });
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("docente");
        filter = input.value.toUpperCase();
        table = document.getElementById("Table");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
    function verificar() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("verifica");
        filter = input.value.toUpperCase();
        table = document.getElementById("tabla_v");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>

