<div class="modal fade " id="modaleditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-body" id="">
                <div class="row">
                    <div class="col-12">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="exp-generales-tab" data-toggle="tab" href="#exp-generales" role="tab" aria-controls="exp-generales" aria-selected="true">Datos Generales</a>
                                <a class="nav-item nav-link" id="exp-antecedentes-tab" data-toggle="tab" href="#exp-antecedentes" role="tab" aria-controls="exp-antecedentes" aria-selected="false">Antecedentes Académicos</a>
                                <a class="nav-item nav-link" id="exp-familiares-tab" data-toggle="tab" href="#exp-familiares" role="tab" aria-controls="exp-familiares" aria-selected="false">Datos Familiares</a>
                                <a class="nav-item nav-link" id="exp-habitos-tab" data-toggle="tab" href="#exp-habitos" role="tab" aria-controls="exp-habitos" aria-selected="false">Hábitos de Estudio</a>
                                <a class="nav-item nav-link" id="formacion-tab" data-toggle="tab" href="#exp-formacion" role="tab" aria-controls="exp-formacion" aria-selected="false">Formación Integral/Salud</a>
                                <a class="nav-item nav-link" id="exp-area-tab" data-toggle="tab" href="#exp-area" role="tab" aria-controls="exp-area" aria-selected="false">Área Psicopedagógica</a>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="row" id='cont-preg'>
                            <div class="col-12">
                                <form id="form-expe">
                                    {{ csrf_field() }}
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="exp-generales" role="tabpanel" aria-labelledby="exp-generales-tab">
                                            <div class="" >
                                                <div class="row pt-3 pr-3 pl-3">
                                                    <div class=" col-12 align-content-center">
                                                        <h4 class="text-center alert alert-primary pt-4"><b>Datos Generales</b></h4>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="carrera">Carrera</label>
                                                            <select name="carrera" id="carrera" class="custom-select custom-select-md" v-model="alu.generales.id_carrera">
                                                                <option value="" >Elija una Carrera</option>
                                                                <option v-bind:value="car.id_carrera" v-bind:selected="alu.generales.id_carrera==car.id_carrera" v-for="car in carreras">@{{car.nombre}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="periodo">Periodo</label>
                                                            <select name="periodo" id="periodo" class="custom-select custom-select-md" v-model="alu.generales.id_periodo" >
                                                                <option value="" selected>Elija un Periodo</option>
                                                                <option v-bind:value="period.id_periodo" v-bind:selected="alu.generales.id_periodo==period.id_periodo" v-for="period in periodos">@{{period.periodo}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="grupo">Grupo</label>
                                                            <select name="grupo" id="grupo" v-model="alu.generales.id_grupo" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija un Grupo</option>
                                                                <option v-bind:value="gru.id_grupo" v-bind:selected="alu.generales.id_grupo==gru.id_grupo" v-for="gru in grupo">@{{gru.grupo}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="nombre">Nombre</label>
                                                            <input type="text" id="nombre" name="nombre" v-model="alu.generales.nombre" class="form-control" placeholder="Nombre">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="edad">Edad</label>
                                                            <input type="text" class="form-control" v-model="alu.generales.edad" id="edad" name="edad" placeholder="Edad">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="sexo">Sexo</label>
                                                            <select name="sexo" id="sexo"  class="custom-select custom-select-md" v-model="alu.generales.sexo">
                                                                <option value="" selected>Elija un Sexo</option>
                                                                <option value="M" v-bind:selected="alu.generales.sexo=='M'">Masculino</option>
                                                                <option value="F" v-bind:selected="alu.generales.sexo=='F'">Femenino</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="fn">Fecha de Nacimiento</label>
                                                            <input type="date" v-model="alu.generales.fecha_nacimientos" id="fn" name="fecha_nacimiento" class="form-control" placeholder="Fecha de Nacimiento">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="ln">Lugar de Nacimiento</label>
                                                            <input type="text" id="ln" v-model="alu.generales.lugar_nacimientos" name="lugar_nacimiento" class="form-control" placeholder="Lugar de Nacimiento">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="semestre">Semestre</label>
                                                            <select name="semestre" id="semestre" v-model="alu.generales.id_semestre" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija un Semestre</option>
                                                                <option v-bind:value="sem.id_semestre" v-bind:selected="alu.generales.id_semestre==sem.id_semestre" v-for="sem in semestres">@{{sem.descripcion}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="EC">Estado Civil</label>
                                                            <select name="estado_civil" id="EC" class="custom-select custom-select-md" v-model="alu.generales.id_estado_civil">
                                                                <option value="" selected >Elija el estado civil</option>
                                                                <option v-bind:value="es.id_estado_civil" v-bind:selected="alu.generales.id_estado_civil==es.id_estado_civil" v-for="es in estadociv">@{{es.desc_ec}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="nh">No. Hijos</label>
                                                            <input type="text" v-model="alu.generales.no_hijos" id="nh" name="no_hijos" class="form-control" placeholder="No. Hijos">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="direccion">Dirección</label>
                                                            <input type="text" v-model="alu.generales.direccion"  id="direccion" name="direccion" class="form-control" placeholder="Dirección">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="correo">Correo</label>
                                                            <input type="text" v-model="alu.generales.correo"  id="correo" name="correo" class="form-control" placeholder="Correo">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="tel-casa">Tel. Casa</label>
                                                            <input type="text" v-model="alu.generales.tel_casa" id="tel-casa" name="tel_casa" class="form-control" placeholder="Tel. Casa">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="cel">Celular</label>
                                                            <input type="text" v-model="alu.generales.cel"  id="cel" name="cel" class="form-control" placeholder="Cel">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="NSE">Nivel Socio-Económico</label>
                                                            <select name="nivel_socioeconomico" v-model="alu.generales.id_nivel_economico" id="NSE" class="custom-select custom-select-md">
                                                                <option value="" >Elija el nivel Socio-económico</option>
                                                                <option v-bind:value="niv.id_nivel_economico" v-bind:selected="alu.generales.id_nivel_economico==niv.id_nivel_economico" v-for="niv in nivel">@{{niv.desc_opc}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="poblacion">Población</label>
                                                            <select name="poblacion" id="poblacion" v-model="alu.generales.poblacion" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija Opción</option>
                                                                <option value="Rural" v-bind:selected="alu.generales.poblacion=='Rural'">Rural</option>
                                                                <option value="Urbana" v-bind:selected="alu.generales.poblacion=='Urbana'">Urbana</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="trabaja">Trabaja</label>
                                                            <select name="trabaja" id="trabaja" v-model="alu.generales.trabaja" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija Opción</option>
                                                                <option value="1" v-bind:selected="alu.generales.trabaja=='1'">Si</option>
                                                                <option value="2" v-bind:selected="alu.generales.trabaja=='2'">No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row" id="ocupacion">
                                                        <div class="col-md-12">
                                                            <label for="ocupacion">Ocupación</label>
                                                            <input type="text" v-model="alu.generales.ocupacion"  name="ocupacion" class="form-control" placeholder="Ocupación">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="horario">Horario</label>
                                                            <input type="text" v-model="alu.generales.horario"  id="horario" name="horario" class="form-control" placeholder="Horario">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="noC">No. Cuenta</label>
                                                            <input type="text" id="noC"  name="no_cuenta" class="form-control" v-model="alu.generales.no_cuenta"  placeholder="No. Cuenta">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="beca">Beca</label>
                                                            <select name="beca" id="beca" v-model="alu.generales.beca" class="custom-select custom-select-md">
                                                                <option value="" selected>Eliga Opción</option>
                                                                <option value="1" v-bind:selected="alu.generales.beca=='1'">Si</option>
                                                                <option value="2" v-bind:selected="alu.generales.beca=='2'">No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row" id="tbeca">
                                                        <div class="col-md-4">
                                                            <label for="tbeca">Tipo Beca</label>
                                                            <input type="text" v-model="alu.generales.tipo_beca"  name="tbeca" class="form-control" placeholder="Tipo Beca">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="ant_inst">Antecedentes institucionales</label>
                                                            <select name="ant_inst" id="ant_inst" v-model="alu.generales.ant_inst" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija Opción</option>
                                                                <option value="Continuación de estudios" v-bind:selected="alu.generales.ant_inst=='Continuación de estudios'">Continuación de estudios</option>
                                                                <option value="Cambio de carrera/institución" v-bind:selected="alu.generales.ant_inst=='Cambio de carrera/institución'">Cambio de carrera/institución</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="satisfaccion_c">Nivel de satisfacción con la carrera</label>
                                                            <select name="satisfaccion_c" id="satisfaccion_c" v-model="alu.generales.satisfaccion_c" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija Opción</option>
                                                                <option value="Muy satisfecho" v-bind:selected="alu.generales.satisfaccion_c=='Muy satisfecho'">Muy satisfecho</option>
                                                                <option value="Satisfecho" v-bind:selected="alu.generales.satisfaccion_c=='Satisfecho'">Satisfecho</option>
                                                                <option value="Regular" v-bind:selected="alu.generales.satisfaccion_c=='Regular'">Regular</option>
                                                                <option value="Inconforme" v-bind:selected="alu.generales.satisfaccion_c=='Inconforme'">Inconforme</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="materias_repeticion">Materias en repeticion</label>
                                                            <select name="materias_repeticion" id="materias_repeticion" v-model="alu.generales.materias_repeticion" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija Opción</option>
                                                                <option value="1" v-bind:selected="alu.generales.materias_repeticion=='1'">Si</option>
                                                                <option value="2" v-bind:selected="alu.generales.materias_repeticion=='2'">No</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="tot_repe">Número de materias en repetición</label>
                                                            <select name="tot_repe" v-model="alu.generales.tot_repe" id="tot_repe" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija Opción</option>
                                                                <option value="1" v-bind:selected="alu.generales.tot_repe=='1'">0</option>
                                                                <option value="2" v-bind:selected="alu.generales.tot_repe=='2'">1</option>
                                                                <option value="3" v-bind:selected="alu.generales.tot_repe=='3'">2</option>
                                                                <option value="4" v-bind:selected="alu.generales.tot_repe=='4'">3 o más</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="materias_especial">Materias en especial</label>
                                                            <select name="materias_especial" v-model="alu.generales.materias_especial" id="materias_especial" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija Opción</option>
                                                                <option value="1" v-bind:selected="alu.generales.materias_especial=='1'">Si</option>
                                                                <option value="2" v-bind:selected="alu.generales.materias_especial=='2'">No</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="tot_espe">Número de materias en especial</label>
                                                            <select name="tot_espe" id="tot_espe" v-model="alu.generales.tot_espe" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija Opción</option>
                                                                <option value="1" v-bind:selected="alu.generales.tot_espe=='1'">0</option>
                                                                <option value="2" v-bind:selected="alu.generales.tot_espe=='2'">1</option>
                                                                <option value="3" v-bind:selected="alu.generales.tot_espe=='3'">2</option>
                                                                <option value="4" v-bind:selected="alu.generales.tot_espe=='4'">3 o más</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="gen_espe">Número de especiales totales</label>
                                                            <select name="gen_espe" v-model="alu.generales.gen_espe" id="gen_espe" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija Opción</option>
                                                                <option value="1" v-bind:selected="alu.generales.gen_espe=='1'">0</option>
                                                                <option value="2" v-bind:selected="alu.generales.gen_espe=='2'">1</option>
                                                                <option value="3" v-bind:selected="alu.generales.gen_espe=='3'">2</option>
                                                                <option value="4" v-bind:selected="alu.generales.gen_espe=='4'">3 o más</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="estado">Estado</label>
                                                            <select id="estado" name="estado" v-model="alu.generales.estado" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija estado académico</option>
                                                                <option value="1" v-bind:selected="alu.generales.estado=='1'">Regular</option>
                                                                <option value="2" v-bind:selected="alu.generales.estado=='2'">Irregular</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="turno">Turno</label>
                                                            <select name="turno" id="turno" v-model="alu.generales.turno" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija Turno</option>
                                                                <option v-bind:value="turn.id_turno" v-bind:selected="alu.generales.turno==turn.id_turno" v-for="turn in turno">@{{turn.descripcion_turno}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="exp-antecedentes" role="tabpanel" aria-labelledby="exp-antecedentes-tab">
                                            <div class="" >
                                                <div class="row pt-3 pr-3 pl-3">
                                                    <div class=" col-12 align-content-center">
                                                        <h4 class="text-center alert alert-primary pt-4"><b>Antecedentes Académicos</b></h4>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="bachillerato">Bachillerato</label>
                                                            <select name="bachillerato" v-model="alu.academicos.id_bachillerato" id="bachillerato" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija Bachillerato</option>
                                                                <option v-bind:value="bach.id_bachillerato" v-bind:selected="alu.academicos.id_bachillerato==bach.id_bachillerato" v-for="bach in bachiller">@{{bach.desc_bachillerato}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="oe">Otros Estudios</label>
                                                            <input name="otro_estudio" v-model="alu.academicos.otros_estudios" id="oe" class="form-control" placeholder="Otros Estudios">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="cb">Años en que Curso el Bachillerato</label>
                                                            <select v-model="alu.academicos.anos_curso_bachillerato" id="cb" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option value="1" v-bind:selected="alu.academicos.anos_curso_bachillerato=='1'">1</option>
                                                                <option value="2" v-bind:selected="alu.academicos.anos_curso_bachillerato=='2'">2</option>
                                                                <option value="3" v-bind:selected="alu.academicos.anos_curso_bachillerato=='3'">3</option>
                                                                <option value="4" v-bind:selected="alu.academicos.anos_curso_bachillerato=='4'">4</option>
                                                                <option value="5" v-bind:selected="alu.academicos.anos_curso_bachillerato=='5'">5</option>
                                                                <option value="6" v-bind:selected="alu.academicos.anos_curso_bachillerato=='6'">Más de 5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="at">Año de Terminación</label>
                                                            <input type="text" v-model="alu.academicos.ano_terminacion" name="ano_terminacion" id="at" class="form-control" placeholder="Año Ternimación">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="epro">Escuela de Procedencia</label>
                                                            <input type="text" v-model="alu.academicos.escuela_procedente" class="form-control" id="epro" name="escuela_procedencia" placeholder="Escuela de Procedencia">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="promedio">Promedio</label>
                                                            <input name="promedio" v-model="alu.academicos.promedio" id="promedio" class="form-control" placeholder="Promedio">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="mrb">Materias reprobadas en bachillerato</label>
                                                            <input type="text" v-model="alu.academicos.materias_reprobadas" id="mrb" name="materias_reprobadas" class="form-control" placeholder="Materias reprobadas en bachillerato">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="oti">Otra Carrera Iniciada</label>
                                                            <select v-model="alu.academicos.otra_carrera_ini" id="oti" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option value="1" v-bind:selected="alu.academicos.otra_carrera_ini=='1'">Si</option>
                                                                <option value="2" v-bind:selected="alu.academicos.otra_carrera_ini=='2'">No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="institucion">Institución</label>
                                                            <input name="institucion" v-model="alu.academicos.institucion" id="institucion" class="form-control" placeholder="Institución">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="SC">Semestres Cursados</label>
                                                            <select v-model="alu.academicos.semestres_cursados" id="SC" class="custom-select custom-select-md">
                                                                <option value="null" selected >Elija una Opción</option>
                                                                <option value="1" v-bind:selected="alu.academicos.semestres_cursados=='1'">1</option>
                                                                <option value="2" v-bind:selected="alu.academicos.semestres_cursados=='2'">2</option>
                                                                <option value="3" v-bind:selected="alu.academicos.semestres_cursados=='3'">3</option>
                                                                <option value="4" v-bind:selected="alu.academicos.semestres_cursados=='4'">4</option>
                                                                <option value="5" v-bind:selected="alu.academicos.semestres_cursados=='5'">5</option>
                                                                <option value="6" v-bind:selected="alu.academicos.semestres_cursados=='6'">Más de 5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="rde">Cuál fue la razón por la que decidiste estudiar en el TESVB</label>
                                                            <input type="text" v-model="alu.academicos.razon_descide_estudiar_tesvb" id="rde" name="razon_decide_estudiar_tesvb" class="form-control" placeholder="Cuál fue la razón por la que decidiste estudiar en el TESVB">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="perfil">Tienes información sobre el perfil profesional de la carrera</label>
                                                            <input type="text" v-model="alu.academicos.sabedel_perfil_profesional" id="perfil" name="perfil" class="form-control" placeholder="Tienes información sobre el perfil profesional de la carrera">
                                                        </div>
                                                    </div>
                                                    <div class="row" >
                                                        <div class="col-md-12">
                                                            <label for="ie">Interrupciones en los estudios</label>
                                                            <select  id="ie" v-model="alu.academicos.interrupciones_estudios" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option value="1" v-bind:selected="alu.academicos.interrupciones_estudios=='1'">Si</option>
                                                                <option value="2" v-bind:selected="alu.academicos.interrupciones_estudios=='2'">No</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12" id="razones">
                                                            <label for="razones">Razones</label>
                                                            <input type="text" v-model="alu.academicos.razones_interrupcion" id="razones" name="razones_interrupcion" class="form-control" placeholder="Razones">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="ov">Tuviste otras opciones vocacionales o preferencias por otras carreras</label>
                                                            <select id="ov" v-model="alu.academicos.otras_opciones_vocales" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option value="1"  v-bind:selected="alu.academicos.otras_opciones_vocales=='1'">Si</option>
                                                                <option value="2"  v-bind:selected="alu.academicos.otras_opciones_vocales=='2'">No</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12"  id="cuales">
                                                            <label for="cuales">¿Cuales?</label>
                                                            <input name="cuales" v-model="alu.academicos.cuales_otras_opciones_vocales" class="form-control" placeholder="¿Cuales?">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="cae">Te gusta la carrera elegida</label>
                                                            <select v-model="alu.academicos.tegusta_carrera_elegida" id="cae" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option value="1" v-bind:selected="alu.academicos.tegusta_carrera_elegida=='1'">Si</option>
                                                                <option value="2" v-bind:selected="alu.academicos.tegusta_carrera_elegida=='2'">No</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12" id="pq">
                                                            <label for="pq">¿Por qué?</label>
                                                            <input type="text" v-model="alu.academicos.porque_carrera_elegida" name="pq" class="form-control" placeholder="¿Por qué?">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <label for="tefe">Te estimula tu familia en tus estudios</label>
                                                            <select v-model="alu.academicos.teestimula_familia" id="tefe" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option value="1" v-bind:selected="alu.academicos.teestimula_familia=='1'">Si</option>
                                                                <option value="2" v-bind:selected="alu.academicos.teestimula_familia=='2'">No</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <label for="sus">Suspensión de Estudios después de terminado el bachillerato</label>
                                                            <select id="sus" v-model="alu.academicos.suspension_estudios_bachillerato" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option value="1"  v-bind:selected="alu.academicos.suspension_estudios_bachillerato=='1'">Si</option>
                                                                <option value="2"  v-bind:selected="alu.academicos.suspension_estudios_bachillerato=='2'">No</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="razonesSus">Razones</label>
                                                            <input type="text" v-model="alu.academicos.razones_suspension_estudios" name="razonesSus" class="form-control" placeholder="Razones">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="exp-familiares" role="tabpanel" aria-labelledby="exp-familiares-tab">
                                            <div class="" >
                                                <div class="row pt-3 pr-3 pl-3">
                                                    <div class=" col-12 align-content-center">
                                                        <h4 class="text-center alert alert-primary pt-4"><b>Datos Familiares</b></h4>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label for="np">Nombre del Padre</label>
                                                            <input name="nombre_padre" v-model="alu.familiares.nombre_padre" id="np" type="text" class="form-control" placeholder="Nombre del Padre">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="edadP">Edad</label>
                                                            <input type="text" v-model="alu.familiares.edad_padre" name="edad_padre" id="edadP" class="form-control" placeholder="Edad">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="ocupacionP">Ocupación</label>
                                                            <input name="ocupacion_padre" v-model="alu.familiares.ocupacion_padre" id="ocupacionP" type="text" class="form-control">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="LRP">Lugar de Residencia</label>
                                                            <input v-model="alu.familiares.lugar_residencia_padre" name="lugar_residencia_padre" id="LRP" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label for="nm">Nombre del Madre</label>
                                                            <input type="text" v-model="alu.familiares.nombre_madre" name="nombre_madre" id="nm" class="form-control" placeholder="Nombre del Madre">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="edadM">Edad</label>
                                                            <input type="text" v-model="alu.familiares.edad_madre" name="edad_madre" id="edadM" class="form-control" placeholder="Edad">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="ocupacionM">Ocupación</label>
                                                            <input id="ocupacionM" v-model="alu.familiares.ocupacion_madre" name="ocupacion_madre" type="text" class="form-control">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="LRM">Lugar de Residencia</label>
                                                            <input id="LRM" v-model="alu.familiares.lugar_residencia_madre" name="lugar_residencia_madre" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="nh">No. de Hermanos</label>
                                                            <input type="text" v-model="alu.familiares.no_hermanos" id="nh" name="no_hermanos" class="form-control" placeholder="No. de Hermanos">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="loe">Lugar que ocupas entre ellos</label>
                                                            <input type="text" v-model="alu.familiares.lugar_ocupas" id="loe" name="lugar_que_ocupas" class="form-control" placeholder="Lugar que ocupas entre ellos">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="av">Actualmente vives con </label>
                                                            <select name="actualmente_vives" id="av" v-model="alu.familiares.id_opc_vives" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option v-bind:value="viv.id_opc_vives" v-bind:selected="alu.familiares.id_opc_vives==viv.id_opc_vives" v-for="viv in vive">@{{viv.desc_opc}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="nop">No. de personas</label>
                                                            <input type="text" v-model="alu.familiares.no_personas" name="no_persona" id="nop" class="form-control" placeholder="No. de personas">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="etnia">Perteneces a una etnia indígena</label>
                                                            <select name="etnia" id="etnia" v-model="alu.familiares.etnia_indigena" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option value="1" v-bind:selected="alu.familiares.etnia_indigena=='1'">Si</option>
                                                                <option value="2" v-bind:selected="alu.familiares.etnia_indigena=='2'">No</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12" id="cualetnia">
                                                            <label for="cualetnia">¿Cual?</label>
                                                            <input type="text" v-model="alu.familiares.cual_etnia" name="cual_etnia" class="form-control" placeholder="¿Cual?">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="hablas">Hablas una Lengua indígena</label>
                                                            <select  id="hablas" v-model="alu.familiares.hablas_lengua_indigena" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option value="1" v-bind:selected="alu.familiares.hablas_lengua_indigena=='1'">Si</option>
                                                                <option value="2" v-bind:selected="alu.familiares.hablas_lengua_indigena=='2'">No</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="sostiene">¿Quién sostiene económicamente tu hogar?</label>
                                                            <input type="text" v-model="alu.familiares.sostiene_economia_hogar" id="sostiene" name="sosten_hogar" class="form-control" placeholder="¿Quién sostiene económicamente tu hogar?">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="consideras">Consideras a tu familia</label>
                                                            <select id="consideras" name="consideras_a_familia" v-model="alu.familiares.id_familia_union" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option v-bind:value="uni.id_familia_union" v-bind:selected="alu.familiares.id_familia_union==uni.id_familia_union" v-for="uni in union">@{{uni.desc_union}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="nt">Nombre del Tutor</label>
                                                            <input type="text" v-model="alu.familiares.nombre_tutor" name="nombre_tutor" id="nt" class="form-control" placeholder="Nombre del Tutor">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="parentesco">Parentesco</label>
                                                            <select name="parentesco" id="" class="custom-select custom-select-md"  v-model="alu.familiares.id_parentesco">
                                                                <option value="">Elija un parentesco</option>
                                                                <option v-bind:value="par.id_parentesco" v-bind:selected="alu.familiares.id_parentesco==par.id_parentesco" v-for="par in parentesco">@{{par.desc_parentesco}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="exp-habitos" role="tabpanel" aria-labelledby="exp-habitos-tab">
                                            <div class="" >
                                                <div class="row pt-3 pr-3 pl-3">
                                                    <div class=" col-12 align-content-center">
                                                        <h4 class="text-center alert alert-primary pt-4"><b>Hábitos de Estudio</b></h4>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="tiempo">Tiempo dedicado a estudiar diariamente fuera de clase</label>
                                                            <select v-model="alu.estudio.tiempo_empleado_estudiar" id="tiempo" type="text" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option v-bind:value="tiemp.id_opc_tiempo" v-bind:selected="alu.estudio.tiempo_empleado_estudiar==tiemp.id_opc_tiempo" v-for="tiemp in tiempo">@{{tiemp.desc_opc}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="fti">¿Cómo es tú forma de trabajo intelectual?</label>
                                                            <select  id="fti" v-model="alu.estudio.id_opc_intelectual" type="text" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option v-bind:value="int.id_opc_intelectual" v-bind:selected="alu.estudio.id_opc_intelectual==int.id_opc_intelectual" v-for="int in intelectual">@{{int.desc_opc}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="formaes">Tu forma de estudio mas utilizada</label>
                                                            <input name="forma_estudio" v-model="alu.estudio.forma_estudio" id="formaes" type="text" class="form-control" placeholder="Tu forma de estudio mas utilizada">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="empleas">¿Cómo empleas tu tiempo libre?</label>
                                                            <input type="text" v-model="alu.estudio.tiempo_libre" name="tiempo_libre" id="empleas" class="form-control" placeholder="¿Cómo empleas tu tiempo libre?">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="asignap">Asignaturas preferidas</label>
                                                            <input type="text" v-model="alu.estudio.asignatura_preferida" name="asigna_preferida" id="asignap" class="form-control" placeholder="Asignaturas preferidas">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="pqap">¿Por qué?</label>
                                                            <input name="porque_asignatura" v-model="alu.estudio.porque_asignatura" id="pqap" type="text" class="form-control" placeholder="¿Por qué?">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="asigdif">Asignaturas que te han sido difíciles</label>
                                                            <input type="text" v-model="alu.estudio.asignatura_dificil" id="asigdif" name="asignatura_dificil" class="form-control" placeholder="Asignaturas que te han sido difíciles">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="pqdifi">¿Por qué?</label>
                                                            <input name="porque_asignatura_dificil" v-model="alu.estudio.porque_asignatura_dificil" id="pqdifi" type="text" class="form-control" placeholder="¿Por qué?">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="qopin">¿Qué opinión tienes de ti mismo como estudiante?</label>
                                                            <input type="text" v-model="alu.estudio.opinion_tu_mismo_estudiante" name="opinion_tu_mismo_estudiante" id="qopin" placeholder="¿Qué opinión tienes de ti mismo como estudiante?" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="exp-formacion" role="tabpanel" aria-labelledby="formacion-tab">
                                            <div class="" >
                                                <div class="row pt-3 pr-3 pl-3">
                                                    <div class=" col-12 align-content-center">
                                                        <h4 class="text-center alert alert-primary pt-4"><b>Formación Integral/Salud</b></h4>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="depo">¿Practicas regularmente algún deporte?</label>
                                                            <select name="depo" id="depo" v-model="alu.integral.practica_deporte" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option value="1" v-bind:selected="alu.academicos.practica_deporte=='1'">Si</option>
                                                                <option value="2" v-bind:selected="alu.academicos.practica_deporte=='2'">No</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12" id="especifica1">
                                                            <label for="especifica1">Especifica</label>
                                                            <input type="text" v-model="alu.integral.especifica_deporte" placeholder="Especifica" name="especifica1" id="especifica1" class="form-control" >
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="artistica">¿Practicas alguna actividad artística?</label>
                                                            <select name="artistica" id="artistica" v-model="alu.integral.practica_artistica" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option value="1" v-bind:selected="alu.academicos.practica_artistica=='1'">Si</option>
                                                                <option value="2" v-bind:selected="alu.academicos.practica_artistica=='2'">No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12" id="especifica2">
                                                            <label for="especifica2">Especifica</label>
                                                            <input type="text" v-model="alu.integral.especifica_artistica" placeholder="Especifica" name="especifica2" class="form-control" >
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="escala">¿Ingiere bebidas alcoholicas?</label>
                                                            <select name="id_escala" id="id_escala" v-model="alu.integral.id_expbebidas" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option v-bind:value="bebi.id_expbebidas" v-bind:selected="alu.integral.id_expbebidas==bebi.id_expbebidas" v-for="bebi in bebidas">@{{bebi.descripcion_bebida}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="pasatiempo">Tu pasatiempo favorito</label>
                                                            <input  name="pasatiempo"  v-model="alu.integral.pasatiempo" id="pasatiempo" placeholder="Pasatiempo" class="form-control">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="actC">¿Participas en actividades culturales, sociales?</label>
                                                            <select  id="actC" name="actC" v-model="alu.integral.actividades_culturales" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option value="1" v-bind:selected="alu.integral.actividades_culturales=='1'">Si</option>
                                                                <option value="2" v-bind:selected="alu.integral.actividades_culturales=='2'">No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12" id="cualesAc">
                                                            <label for="cualesAc">¿Cuáles?</label>
                                                            <input type="text" v-model="alu.integral.cuales_act" name="cualesAc" class="form-control" placeholder="Cuáles">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="estSalud">¿Cómo consideras tu estado de salud?</label>
                                                            <select name="estSalud" v-model="alu.integral.estado_salud" id="estSalud" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option value="1" v-bind:selected="alu.integral.estado_salud=='1'">Excelente</option>
                                                                <option value="2" v-bind:selected="alu.integral.estado_salud=='2'">Buena</option>
                                                                <option value="3" v-bind:selected="alu.integral.estado_salud=='3'">Regular</option>
                                                                <option value="4" v-bind:selected="alu.integral.estado_salud=='4'">Mala</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="enferCron">¿Padeces alguna enfermedad crónica?</label>
                                                            <select name="enferCron" v-model="alu.integral.enfermedad_cronica" id="enferCron" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option value="1"  v-bind:selected="alu.integral.enfermedad_cronica=='1'">Si</option>
                                                                <option value="2"  v-bind:selected="alu.integral.enfermedad_cronica=='2'">No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12" id="especificarEnf">
                                                            <label for="especificarEnf">Especificar</label>
                                                            <input type="text" v-model="alu.integral.especifica_enf_cron" name="especificarEnf" class="form-control" placeholder="Especificar">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="EnfPa">¿Tus padres padecen alguna enfermedad crónica?</label>
                                                            <select id="EnfPa" name="EnfPa" v-model="alu.integral.enf_cron_padre"  class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option value="1" v-bind:selected="alu.integral.enf_cron_padre=='1'">Si</option>
                                                                <option value="2" v-bind:selected="alu.integral.enf_cron_padre=='2'">No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12" id="especificarEnfPa">
                                                            <label for="especificarEnfPa">Especificar</label>
                                                            <input type="text" v-model="alu.integral.especifica_enf_cron_padres" name="especificarEnfPa" class="form-control" placeholder="Especificar">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="operacion">¿Te han realizado alguna operación médico-quirúrgica?</label>
                                                            <select id="operacion" name="operacion" v-model="alu.integral.operacion" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option value="1" v-bind:selected="alu.integral.operacion=='1'">Si</option>
                                                                <option value="2" v-bind:selected="alu.integral.operacion=='2'">No</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12"id="especificarOpe">
                                                            <label for="especificarOpe">Especificar</label>
                                                            <input type="text" v-model="alu.integral.deque_operacion" id="especificarOpe" name="especificarOpe" class="form-control" placeholder="Especificar">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="EnVisual">¿Padeces alguna enfermedad visual?</label>
                                                            <select name="EnVisual" v-model="alu.integral.enfer_visual" id="EnVisual" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option value="1"  v-bind:selected="alu.integral.enfer_visual=='1'">Si</option>
                                                                <option value="2"  v-bind:selected="alu.integral.enfer_visual=='2'">No</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12" id="especificarEnVisual">
                                                            <label for="especificarEnVisual">Especificar</label>
                                                            <input type="text" v-model="alu.integral.especifica_enf" name="especificarEnVisual" class="form-control" placeholder="Especificar">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="lentes">¿Usas lentes?</label>
                                                            <select name="lentes" id="lentes" v-model="alu.integral.usas_lentes" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option value="1"  v-bind:selected="alu.integral.usas_lentes=='1'">Si</option>
                                                                <option value="2"  v-bind:selected="alu.integral.usas_lentes=='2'">No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="estatura">Estatura</label>
                                                            <input name="estatura" v-model="alu.integral.estatura"  id="estatura" type="text" placeholder="Estatura" class="form-control">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="peso">Peso</label>
                                                            <input type="text" v-model="alu.integral.peso" id="peso" name="peso" class="form-control" placeholder="Peso">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="mediContro">¿Tomas medicamento controlado?</label>
                                                            <select name="mediContro" v-model="alu.integral.medicamento_controlado" id="mediContro" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option value="1" v-bind:selected="alu.integral.medicamento_controlado=='1'">Si</option>
                                                                <option value="2" v-bind:selected="alu.integral.medicamento_controlado=='2'">No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12" id="especificarMed">
                                                            <label for="especificarMed">Especificar</label>
                                                            <input type="text"  v-model="alu.integral.especifica_medicamento"  name="especificarMed" class="form-control" placeholder="Especificar">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="accidente">¿Haz tenido algún accidente grave?</label>
                                                            <select name="accidente"  v-model="alu.integral.accidente_grave" id="accidente" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option value="1" v-bind:selected="alu.integral.accidente_grave=='1'">Si</option>
                                                                <option value="2" v-bind:selected="alu.integral.accidente_grave=='2'">No</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12" id="relata">
                                                            <label for="relata">Relata Brevemente</label>
                                                            <input type="text"  v-model="alu.integral.relata_breve" name="relata" class="form-control" placeholder="Relata">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="exp-area" role="tabpanel" aria-labelledby="exp-area-tab">
                                            <div class="" >
                                                <div class="row pt-3 pr-3 pl-3">
                                                    <div class=" col-12 align-content-center">
                                                        <h4 class="text-center alert alert-primary pt-4"><b>Área Psicopedagogica</b></h4>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="rendEsco">Rendimiento Escolar</label>
                                                            <select name="rendimiento_escolar" v-model="alu.area.rendimiento_escolar" id="rendEsco" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option v-bind:value="esc.id_escala" v-bind:selected="alu.area.rendimiento_escolar==esc.id_escala" v-for="esc in escala">@{{esc.desc_escala}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="dominio">Dominio del propio idioma</label>
                                                            <select name="dominio" id="dominio" v-model="alu.area.dominio_idioma" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option v-bind:value="esc.id_escala" v-bind:selected="alu.area.dominio_idioma==esc.id_escala" v-for="esc in escala">@{{esc.desc_escala}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="otro">Otro idioma</label>
                                                            <select name="otro_idioma" id="otro" v-model="alu.area.otro_idioma" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option v-bind:value="esc.id_escala" v-bind:selected="alu.area.otro_idioma==esc.id_escala" v-for="esc in escala">@{{esc.desc_escala}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="conComp">Conocimentos en cómputo</label>
                                                            <select name="conocimiento_computo" id="conComp" v-model="alu.area.conocimiento_compu" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option v-bind:value="esc.id_escala" v-bind:selected="alu.area.conocimiento_compu==esc.id_escala" v-for="esc in escala">@{{esc.desc_escala}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="aptitudes">Aptitudes Especiales</label>
                                                            <select name="aptitudes" id="aptitudes" v-model="alu.area.aptitud_especial" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option v-bind:value="esc.id_escala" v-bind:selected="alu.area.aptitud_especial==esc.id_escala" v-for="esc in escala">@{{esc.desc_escala}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="comprension">Comprensión y Retención en clase</label>
                                                            <select name="comprension" id="comprension" v-model="alu.area.comprension" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option v-bind:value="esc.id_escala" v-bind:selected="alu.area.comprension==esc.id_escala" v-for="esc in escala">@{{esc.desc_escala}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="preparacion">Preparación y presentación de exámenes</label>
                                                            <select name="preparacion" id="preparacion" v-model="alu.area.preparacion" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option v-bind:value="esc.id_escala" v-bind:selected="alu.area.preparacion==esc.id_escala" v-for="esc in escala">@{{esc.desc_escala}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="estrategias">Aplicación de estrategias de aprendizaje y estudio</label>
                                                            <select name="estrategias" id="estrategias" v-model="alu.area.estrategias_aprendizaje" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option v-bind:value="esc.id_escala" v-bind:selected="alu.area.estrategias_aprendizaje==esc.id_escala" v-for="esc in escala">@{{esc.desc_escala}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="actEst">Organización en actividades de estudio</label>
                                                            <select name="organizacion_actividades" v-model="alu.area.organizacion_actividades" id="actEst" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option v-bind:value="esc.id_escala" v-bind:selected="alu.area.organizacion_actividades==esc.id_escala" v-for="esc in escala">@{{esc.desc_escala}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="concentracion">Concentración durante el estudio</label>
                                                            <select name="concentracion" id="concentracion" v-model="alu.area.concentracion" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option v-bind:value="esc.id_escala" v-bind:selected="alu.area.concentracion==esc.id_escala" v-for="esc in escala">@{{esc.desc_escala}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="solucion">Solución de problemas y aprendizaje de las matemáticas</label>
                                                            <select name="solucion" id="solucion" v-model="alu.area.solucion_problemas" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option v-bind:value="esc.id_escala" v-bind:selected="alu.area.solucion_problemas==esc.id_escala" v-for="esc in escala">@{{esc.desc_escala}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="condiciones">Condiciones ambientales durante el estudio</label>
                                                            <select name="condiciones" id="condiciones" v-model="alu.area.condiciones_ambientales" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option v-bind:value="esc.id_escala" v-bind:selected="alu.area.condiciones_ambientales==esc.id_escala" v-for="esc in escala">@{{esc.desc_escala}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="bibliografica">Búsqueda bibliografica e integración de información</label>
                                                            <select name="bibliografica" id="bibliografica" v-model="alu.area.busqueda_bibliografica" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option v-bind:value="esc.id_escala" v-bind:selected="alu.area.busqueda_bibliografica==esc.id_escala" v-for="esc in escala">@{{esc.desc_escala}}</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="equipo">Trabajo en equipo</label>
                                                            <select name="equipo" id="equipo" v-model="alu.area.trabajo_equipo" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option v-bind:value="esc.id_escala" v-bind:selected="alu.area.trabajo_equipo==esc.id_escala" v-for="esc in escala">@{{esc.desc_escala}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" @click="actualiza()" class="btn btn-outline-primary">Actualizar Datos</button>
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>