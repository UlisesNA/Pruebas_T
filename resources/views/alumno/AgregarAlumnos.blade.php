<div class="modal fade" id="Alumnos" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Asignar Alumnos</h5>
            </div>
            <div class="modal-body">
                <form id="search1" class="pb-2" v-if="alumnosgeneracion.length>0">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="i"><i class="fas fa-search"></i></span>
                        </div>
                        <input class="form-control" name="query" v-model="searchQuery1" placeholder="Buscar">
                    </div>
                </form>
                <div class="tableFixHeadModal" v-if="alumnosgeneracion.length>0">
                    <data-table class=" col-12 table table-sm" :data="alumnosgeneracion" :columns-to-display="columnasM" :filter-key="searchQuery1">
                        <template slot="columns-to-display" scope="alu">
                            <label class="form-checkbox">
                                <input type="checkbox" v-model="selectAll" @click="seleccionar_todos">
                                <i class="form-icon"></i>
                            </label>
                        </template>
                        <template slot=" " scope="alu">
                            <input type="checkbox" :value="alu.entry.id_alumno" v-model="seleccionados">
                            <i class="form-icon"></i>

                        </template>
                        <template slot="Cuenta" scope="alu">
                            <div class="font-weight-bold pt-2">
                                @{{alu.entry.cuenta}}
                            </div>
                        </template>
                        <template slot="Nombre" scope="alu">
                            <div class="pt-2">@{{ alu.entry.apaterno }} @{{ alu.entry.amaterno}} @{{ alu.entry.nombre }}</div>
                        </template>
                        <template slot="nodata">
                            <div class=" alert font-weight-bold alert-danger text-center">Ningún dato encontrado</div>
                        </template>
                    </data-table>
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
