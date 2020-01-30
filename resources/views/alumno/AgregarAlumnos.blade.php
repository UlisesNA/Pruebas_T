<div class="modal fade" id="Alumnos" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Asignar Alumnos</h5>
            </div>
            <div class="modal-body">
                <div class="tableFixHeadModal" v-if="alumnosgeneracion.length>0">
                    <table class="table">
                        <thead>
                        <th>
                            <label class="form-checkbox">
                                <input type="checkbox" v-model="selectAll" @click="seleccionar_todos">
                                <i class="form-icon"></i>
                            </label>
                        </th>
                        <th>Cuenta</th>
                        <th>Nombre</th>
                        </thead>
                        <tbody>
                        <tr v-for="alu in alumnosgeneracion">
                            <td>
                                <label class="form-checkbox">
                                    <input type="checkbox" :value="alu.id_alumno" v-model="seleccionados">
                                    <i class="form-icon"></i>
                                </label>
                            </td>
                            <td>@{{alu.cuenta}}</td>
                            <td>@{{alu.apaterno}} @{{alu.amaterno}} @{{alu.nombre}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row" v-else>
                    <div class="col-12 text-center">
                        <h5 class="alert alert-info font-weight-bold">Se han asignado todos los alumnos</h5>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" v-if="alumnosgeneracion.length>0" @click="Guardar()">Asignar</button>
                <button type="button" class="btn btn-outline-danger" @click="BorrarSeleccionados()" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
