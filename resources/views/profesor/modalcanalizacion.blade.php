<div class="modal fade " id="modalcanalizacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-body" id="">
                <div class="row">
                    <div class="col-md-12 ">
                        <!--<pre>@{{ canaliza }}</pre>-->
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col" colspan="4" class="text-center">DATOS DEL ESTUDIANTE</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td scope="col" colspan="3">CARRERA: @{{canaliza.valores.carrera}}
                                </td>
                                <td scope="col">SEMESTRE: @{{canaliza.valores.descripcion}}
                                </td>
                                <td scope="col" >FECHA CITA ANTERIOR: <input type="date" class="form-control" id="fecha_canalizacion_anterior" name="fecha_canalizacion_anterior"></td>
                            </tr>
                            <tr>
                                <td scope="row" colspan="3">NOMBRE DEL ESTUDIANTE: @{{canaliza.valores.apaterno}} @{{canaliza.valores.amaterno}} @{{canaliza.valores.nombre}}</td>
                                <td>GRUPO: @{{canaliza.valores.grupo}}
                                </td>
                                <td scope="col" >FECHA CITA: <input type="date" class="form-control" id="fecha_canalizacion" name="fecha_canalizacion"></td>
                            </tr>
                            <tr>
                                <td scope="row" colspan="3">NOMBRE DEL TUTOR: @{{canaliza.valores.nombre_tut}}
                                </td>
                                <td>HORA: <input type="time" class="form-control" id="hora" name="hora" ></td>
                                </td>
                                <td scope="col" >FECHA DE SIGUIENTE CITA: <input type="date" class="form-control" id="fecha_canalizacion_siguiente" name="fecha_canalizacion"></td>
                            </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col" colspan="4" class="text-center">OBSERVACIONES</th>
                                <th scope="col" class="text-center">OBSERVACIONES GENERALES</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row" colspan="3" >Aspectos sociológicos</th>
                                <th scope="row" colspan="6" rowspan="9" ><textarea type="text" id="observaciones" name="observaciones" class="form-control"></textarea></th>
                            </tr>
                            <tr>
                                <td>Indisciplina:</td>
                                <td> <input type="checkbox" class="" id="aspectos_sociologicos1" name="aspectos_sociologicos1" value="1"></td>
                            </tr>
                            <tr>
                                <td>Problemas de integración:</td>
                                <td> <input type="checkbox" class="" id="aspectos_sociologicos2" name="aspectos_sociologicos2" value="1"></td>
                            </tr>
                            <tr>
                                <td>Problemas familiares:</td>
                                <td> <input type="checkbox" class="" id="aspectos_sociologicos3" name="aspectos_sociologicos3" value="1"></td>
                            </tr>
                            <tr>
                                <th scope="row" colspan="3" >Aspectos académicos</th>
                            </tr>
                            <tr>
                                <td>Dificultades de concentración:</td>
                                <td> <input type="checkbox" class="" id="aspectos_academicos1" name="aspectos_academicos1" value="1"></td>
                            </tr>
                            <tr>
                                <td>Falta de motivación académica:</td>
                                <td> <input type="checkbox" class="" id="aspectos_academicos2" name="aspectos_academicos2" value="1"></td>
                            </tr>
                            <tr>
                                <td>Bajo rendimiento académico:</td>
                                <td> <input type="checkbox" class="" id="aspectos_academicos3" name="aspectos_academicos3" value="1"></td>
                            </tr>

                            <tr>
                                <th scope="row" colspan="3">OTROS (especifique):<br><textarea type="text" id="otros" name="otros" class="form-control"></textarea></th>
                            </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="status" name="status" value="0">
                                        <label class="form-check-label" for="materialGroupExample2">En Proceso</label>
                                    </div>

                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="status" name="status" value="1">
                                        <label class="form-check-label" for="materialGroupExample3">Terminado</label>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col" colspan="3">Área a canalizar tutorado</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <select name="id_area" id="id_area" class="custom-select custom-select-md" v-model="alu.generales.id_estado_civil" required>
                                        <option value="null" selected >Elija Área a canalizar</option>
                                        <option v-bind:value="ar.id_area" v-for="ar in areas">@{{ar.descripcion_area}}</option>
                                    </select>
                                    <small class="form-text text-danger" v-if='alu.generales.id_estado_civil==null || alu.generales.id_estado_civil=="null"'>Elija una opción</small>
                                </td>
                                <td>
                                    <select name="id_subarea" id="id_subarea" class="custom-select custom-select-md" v-model="alu.generales.id_estado_civil" required>
                                        <option value="null" selected >Elija Subarea a canalizar</option>
                                        <option v-bind:value="sub_ar.id_subarea" v-for="sub_ar in subareas">@{{sub_ar.descripcion_subarea}}</option>
                                    </select>
                                    <small class="form-text text-danger" v-if='alu.generales.id_estado_civil==null || alu.generales.id_estado_civil=="null"'>Elija una opción</small>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="modal-footer">
                    <div class="col-2">
                        <button type="button" @click="" class="btn btn-outline-primary">Guardar Datos</button>
                    </div>
                    <div class="col-1">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
            </div>
        </div>
    </div>
</div>
