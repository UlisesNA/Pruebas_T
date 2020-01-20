    <div class="modal fade bd-example-modal-lg" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Asignar Coordinador</h5>
                    <button type="button" class="close" data-dismiss="modal" v-on:click="borrar()" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" id="">
                        <h5 class="pl-4">Selecciona el docente que sera asignado como coordinador</h5>
                        <div class="col-md-6" >
                            <table class="table table-bordered">
                                <thead>
                                <th>Nombre</th>
                                </thead>
                                <tbody>
                                    <tr class="prof" v-on:click="funclick(profesor)"  v-for="profesor in datos.profesores">
                                        <td >@{{profesor.nombre}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class=" col-md-6">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">Coordinador Asignado</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr id='val'><td   >@{{ name }}</td></tr>
                                </tbody>

                            </table>
                            <form action="" method="" id="form_asig" v-if="name!=''">
                                <input type="hidden" name="id_personal" id="id_personal">
                                <button id="btnAsigCoo" v-on:click="agregarCo()" class="btn btn-success btn-lg btn-block">Aceptar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" v-on:click="borrar()">Cancelar</button>
                </div>
            </div>
        </div>
    </div>