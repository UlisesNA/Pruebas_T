<div id="modalagregaract" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Agregar Actividad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="nombre">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label >Fecha Inicio</label>
                                <input type="date" class="form-control " id="fi_actividad" name="fi_actividad" v-model="agract.fi_actividad" min="<?php echo date("Y-m-d"); ?>" required="true">
                            </div>
                            <div class="col">
                                <label >Fecha Límite</label>
                                <input type="date" class="form-control"  id="ff_actividad" name="ff_actividad" v-model="agract.ff_actividad" min="" max="" required="true">
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nombre de Actividad</label>
                        <textarea class="form-control" rows="3" id="desc_actividad" name="desc_actividad" v-model="agract.desc_actividad" required="true"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Objetivo</label>
                        <textarea class="form-control" rows="3" id="objetivo_actividad" name="objetivo_actividad" v-model="agract.objetivo_actividad" required="true"></textarea>
                    </div>
                    <input type="text" name="id_generacion" id="id_generacion" v-model="agract.id_generacion" hidden="true">
                    <input type="text" name="id_asigna_generacion" id="id_asigna_generacion" v-model="agract.id_asigna_generacion" hidden="true">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" @click='submitAgregar()'>Agregar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
