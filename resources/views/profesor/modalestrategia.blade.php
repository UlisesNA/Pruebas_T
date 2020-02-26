<div id="modalestrategia" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                    <div v-if="estra.planeacion.id_estrategia!=null">
                        <h5 class="modal-title">Actualizar Estrategia</h5>
                    </div>
                    <div v-else>
                        <h5 class="modal-title">Estrategia</h5>
                    </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                {{ csrf_field() }}
                <div class="modal-body">
                    <!--<pre>@{{ estra }}</pre>-->
                    <div class="form-group col-md-12">
                        <textarea required class="form-control" rows="8" id="estrategia" name="estrategia" v-model="estra.planeacion.estrategia"></textarea>
                        <label>Requiere subir evidencia</label>
                        <div v-if="estra.planeacion.requiere_evidencia==1">
                            <input type="checkbox" class="" id="requiere_evidencia" name="requiere_evidencia" v-model="estra.planeacion.requiere_evidencia" checked>
                        </div>
                        <div v-else>
                            <input type="checkbox" class="" id="requiere_evidencia" name="requiere_evidencia"  v-model="estra.planeacion.requiere_evidencia">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div>
                        <button type="button" @click="actualizaestra()" class="btn btn-outline-primary">Guardar</button>
                    </div>
                    <div>
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


