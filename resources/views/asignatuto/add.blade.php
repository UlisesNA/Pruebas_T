<div class="modal fade bd-example-modal-lg" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Asigna generación</h5>
                <button type="button" @click="borrar()" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="" class="row">
                    <div class="col-md-4">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                            </tr>
                            </thead>
                            <tbody >
                                <tr v-for="profesor in datos.profesores" @click="profesores(profesor)" v-bind:data-id='profesor.id_personal' v-bind:data-name="profesor.nombre" >
                                    <td>@{{profesor.nombre}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Tutor</th>
                                <th scope="col">Generación</th>
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
                    <div class="col-md-4">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Generación</th>
                            </tr>
                            </thead>
                            <tbody id="datos-tabla">
                                <tr v-for="grupo in datos.grupos" class="gen" v-bind:id="grupo.id_asigna_generacion"  v-on:click.prevent="generaciones(grupo)" >
                                    <td>@{{grupo.generacion}} grupo: @{{grupo.grupo}}</td>
                                </tr>
                                <tr v-if="datos.grupos==null"><td>Se han asignado todas las generaciones</td></tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>