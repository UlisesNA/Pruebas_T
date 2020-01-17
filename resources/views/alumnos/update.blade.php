

<div class="container">
    <div class="row">
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <div class="container card">
                <br>
                <div class="row">
                    <div class="col-12 pt-4">
                        <div class="nav  nav-tabs" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-general-tab" data-toggle="pill" href="#v-pills-general" role="tab" aria-controls="v-pills-general" aria-selected="true">Datos Generales</a>
                            <a class="nav-link disabled" id="v-pills-antecedentes-tab" data-toggle="pill" href="#v-pills-antecedentes" role="tab" aria-controls="v-pills-antecedentes" aria-selected="false">Antecedentes Acádemicos</a>
                            <a class="nav-link disabled" id="v-pills-familiares-tab" data-toggle="pill" href="#v-pills-familiares" role="tab" aria-controls="v-pills-familiares" aria-selected="false">Datos Familiares</a>
                            <a class="nav-link disabled" id="v-pills-habitos-tab" data-toggle="pill" href="#v-pills-habitos" role="tab" aria-controls="v-pills-habitos" aria-selected="false">Hábitos de Estudio</a>
                            <a class="nav-link disabled" id="v-pills-formacion-tab" data-toggle="pill" href="#v-pills-formacion" role="tab" aria-controls="v-pills-formacion" aria-selected="false">Formación Integral/Salud</a>
                            <a class="nav-link disabled" id="v-pills-area-tab" data-toggle="pill" href="#v-pills-area" role="tab" aria-controls="v-pills-area" aria-selected="false">Área Psicopedagógica</a>
                        </div>
                    </div>
                </div>
                        <div class="col-9">
                            <form id="form-expe">
                                {{ csrf_field() }}
                            <div class="tab-content text-justify" id="v-pills-tabContent">

                                <div class="tab-pane fade show active" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab">
                                        <div class="card" >
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="carrera">Carrera</label>
                                                        <select name="carrera" id="carrera" class="custom-select custom-select-md">
                                                            <option value="">Elija una Carrera</option>

                                                         </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="periodo">Periodo</label>
                                                    <select name="periodo" id="periodo" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija un Periodo</option>

                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="grupo">Grupo</label>
                                                    <select name="grupo" id="grupo" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija un Grupo</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="nombre">Nombre</label>
                                                <input type="text" id="nombre" name="nombre" value="{{Session::get('alumno')}}" class="form-control" placeholder="Nombre">
                                                </div>
                                                <div class="col-md-4">
                                                        <label for="edad">Edad</label>
                                                        <input type="text" class="form-control" id="edad" name="edad" placeholder="Edad">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="sexo">Sexo</label>
                                                    <select name="sexo" id="sexo" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija un Sexo</option>
                                                        <option value="1">M</option>
                                                        <option value="2">F</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="fn">Fecha de Nacimiento</label>
                                                    <input type="text" id="fn" name="fecha_nacimiento" class="form-control" placeholder="Fecha de Nacimiento">
                                                </div>
                                                <div class="col-md-4">
                                                        <label for="ln">Lugar de Nacimiento</label>
                                                        <input type="text" id="ln" name="lugar_nacimiento" class="form-control" placeholder="Lugar de Nacimiento">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="semestre">Semestre</label>
                                                    <select name="semestre" id="semestre" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija un Semestre</option>
                                                        <option value="1">Primero</option>
                                                        <option value="2">Segundo</option>
                                                        <option value="3">Tercero</option>
                                                        <option value="4">Cuarto</option>
                                                        <option value="5">Quinto</option>
                                                        <option value="6">Sexto</option>
                                                        <option value="7">Septimo</option>
                                                        <option value="8">Octavo</option>
                                                        <option value="9">Noveno</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="EC">Estado Civil</label>
                                                    <select name="estado_civil" id="EC" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija Estado Civil</option>
                                                        <option value="1">Soltero</option>
                                                        <option value="2">Casado</option>
                                                        <option value="3">Union Libre</option>
                                                        <option value="4">Divorciado</option>
                                                        <option value="5">Viudo</option>

                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                        <label for="nh">No. Hijos</label>
                                                        <input type="text" id="nh" name="no_hijos" class="form-control" placeholder="No. Hijos">
                                                </div>
                                                <div class="col-md-4">
                                                        <label for="direccion">Dirección</label>
                                                        <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Dirección">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="correo">Correo</label>
                                                    <input type="text" id="correo" name="correo" class="form-control" placeholder="Correo">
                                                </div>
                                                <div class="col-md-4">
                                                        <label for="tel-casa">Tel. Casa</label>
                                                        <input type="text" id="tel-casa" name="tel_casa" class="form-control" placeholder="Tel. Casa">
                                                </div>
                                                <div class="col-md-4">
                                                        <label for="cel">Celular</label>
                                                        <input type="text" id="cel" name="cel" class="form-control" placeholder="Cel">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="NSE">Nivel Socio-Económico</label>
                                                    <select name="nivel_socioeconomico" id="NSE" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija Nivel Socio-Económico</option>
                                                        <option value="1">Alto</option>
                                                        <option value="2">Medio</option>
                                                        <option value="3">Bajo</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="trabaja">Trabaja</label>
                                                    <select name="trabaja" id="trabaja" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija Opción</option>
                                                        <option value="1">Si</option>
                                                        <option value="2">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row" id="ocupacion">
                                                <div class="col-md-12">
                                                        <label for="ocupacion">Ocupación</label>
                                                        <input type="text"  name="ocupacion" class="form-control" placeholder="Ocupación">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="horario">Horario</label>
                                                    <input type="text" id="horario" name="horario" class="form-control" placeholder="Horario">
                                                </div>
                                                <div class="col-md-4">
                                                        <label for="noC">No. Cuenta</label>
                                                <input type="text" id="noC" name="no_cuenta" class="form-control" value="{{Session::get('cuenta')}}" placeholder="No. Cuenta">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="beca">Beca</label>
                                                    <select name="beca" id="beca" class="custom-select custom-select-md">
                                                        <option value="" selected>Eliga Opción</option>
                                                        <option value="1">Si</option>
                                                        <option value="2">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row" id="tbeca">
                                                <div class="col-md-12">
                                                    <label for="tbeca">Tipo Beca</label>
                                                    <input type="text"  name="tbeca" class="form-control" placeholder="Tipo Beca">
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                        <label for="estado">Estado</label>
                                                        <select id="estado" name="estado" class="custom-select custom-select-md">
                                                            <option value="" selected>Elija Turno</option>
                                                            <option value="1">Regular</option>
                                                            <option value="2">Inrregular</option>
                                                        </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="turno">Turno</label>
                                                    <select name="turno" id="turno" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija Turno</option>
                                                        <option value="1">Matutino</option>
                                                        <option value="2">Vespertino</option>
                                                        <option value="3">Mixto</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="btn btn-primary text-white" id="siguiente1">Siguiente</a>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-antecedentes" role="tabpanel" aria-labelledby="v-pills-antecedentes-tab">
                                    <div class="card" >
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="bachillerato">Bachillerato</label>
                                                    <select name="bachillerato" id="bachillerato" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija Bachillerato</option>
                                                        <option value="1">Tecnico</option>
                                                        <option value="2">General</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="oe">Otros Estudios</label>
                                                    <input name="otro_estudio" id="oe" class="form-control" placeholder="Otros Estudios">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="cb">Años en que Curso el Bachillerato</label>
                                                    <select name="ano_curso_bachillerato" id="cb" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija una Opción</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">Mas</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="at">Año de Terminación</label>
                                                    <input type="text" name="ano_terminacion" id="at" class="form-control" placeholder="Año Ternimación">
                                                </div>
                                                <div class="col-md-4">
                                                        <label for="epro">Escuela de Procedencia</label>
                                                        <input type="text" class="form-control" id="epro" name="escuela_procedencia" placeholder="Escuela de Procedencia">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="promedio">Promedio</label>
                                                    <input name="promedio" id="promedio" class="form-control" placeholder="Promedio">

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="mrb">Materias reprobadas en bachillerato</label>
                                                    <input type="text" id="mrb" name="materias_reprobadas" class="form-control" placeholder="Materias reprobadas en bachillerato">
                                                </div>
                                                <div class="col-md-6">
                                                        <label for="oti">Otra Carrera Iniciada</label>
                                                        <select name="otra_carrera_ini" id="oti" class="custom-select custom-select-md">
                                                            <option value="" selected>Elija una Opción</option>
                                                            <option value="1">Si</option>
                                                            <option value="2">No</option>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="row" id="otiOc">
                                                <div class="col-md-6">
                                                    <label for="institucion">Institución</label>
                                                    <input name="institucion" id="institucion" class="form-control" placeholder="Institución">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="SC">Semestres Cursados</label>
                                                    <select name="semestre_cursado" id="SC" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija una Opción</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">Mas</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="rde">Cuál fue la razón por la que decidiste estudiar en el TESVB</label>
                                                    <input type="text" id="rde" name="razon_decide_estudiar_tesvb" class="form-control" placeholder="Cuál fue la razón por la que decidiste estudiar en el TESVB">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                        <label for="perfil">Tienes información sobre el perfil profesional de la carrera</label>
                                                        <input type="text" id="perfil" name="perfil" class="form-control" placeholder="Tienes información sobre el perfil profesional de la carrera">
                                                </div>
                                            </div>
                                            <div class="row" >
                                                <div class="col-md-12">
                                                    <label for="ie">Interrupciones en los estudios</label>
                                                    <select  id="ie" name="interrucpion_estudio"class="custom-select custom-select-md">
                                                        <option value="" selected>Elija una Opción</option>
                                                        <option value="1">Si</option>
                                                        <option value="2">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12" id="razones">
                                                        <label for="razones">Razones</label>
                                                        <input type="text" id="razones" name="razones_interrupcion" class="form-control" placeholder="Razones">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                        <label for="ov">Tuviste otras opciones vocacionales o preferencias por otras carreras</label>
                                                        <select id="ov" name="otras_opciones_vocacionales" class="custom-select custom-select-md">
                                                            <option value="" selected>Elija una Opción</option>
                                                            <option value="1">Si</option>
                                                            <option value="2">No</option>
                                                        </select>
                                                </div>
                                                <div class="col-md-12"  id="cuales">
                                                    <label for="cuales">¿Cuales?</label>
                                                    <input name="cuales" class="form-control" placeholder="¿Cuales?">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="cae">Te gusta la carrera elegida</label>
                                                    <select name="tegusta_carrera_elegida" id="cae" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija una Opción</option>
                                                        <option value="1">Si</option>
                                                        <option value="2">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12" id="pq">
                                                        <label for="pq">¿Por qué?</label>
                                                        <input type="text"  name="pq" class="form-control" placeholder="¿Por qué?">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <label for="tefe">Te estimula tu familia en tus estudios</label>
                                                    <select name="te_estimula_familia" id="tefe" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija una Opción</option>
                                                        <option value="1">Si</option>
                                                        <option value="2">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7">
                                                    <label for="sus">Suspensión de Estudios después de terminado el bachillerato</label>
                                                    <select id="sus" name="suspension_estudios_bachillerato" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija una Opción</option>
                                                        <option value="1">Si</option>
                                                        <option value="2">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12" id="razonesSus">
                                                        <label for="razonesSus">Razones</label>
                                                        <input type="text"  name="razonesSus" class="form-control" placeholder="Razones">
                                                </div>
                                            </div>

                                        </div>
                                        <a class="btn btn-primary text-white" id="siguiente2">Siguiente</a>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-familiares" role="tabpanel" aria-labelledby="v-pills-familiares-tab">
                                    <div class="card" >
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="np">Nombre del Padre</label>
                                                    <input name="nombre_padre" id="np" type="text" class="form-control" placeholder="Nombre del Padre">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="edadP">Edad</label>
                                                    <input type="text" name="edad_padre" id="edadP" class="form-control" placeholder="Edad">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="ocupacionP">Ocupación</label>
                                                    <input name="ocupacion_padre" id="ocupacionP" type="text" class="form-control">
                                                </div>
                                                <div class="col-md-3">
                                                        <label for="LRP">Lugar de Residencia</label>
                                                        <input name="lugar_residencia_padre" id="LRP" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="nm">Nombre del Madre</label>
                                                    <input type="text" name="nombre_madre" id="nm" class="form-control" placeholder="Nombre del Madre">
                                                </div>
                                                <div class="col-md-3">
                                                        <label for="edadM">Edad</label>
                                                        <input type="text" name="edad_madre" id="edadM" class="form-control" placeholder="Edad">
                                                    </div>
                                                <div class="col-md-3">
                                                    <label for="ocupacionM">Ocupación</label>
                                                    <input id="ocupacionM" name="ocupacion_madre" type="text" class="form-control">
                                                </div>
                                                <div class="col-md-3">
                                                        <label for="LRM">Lugar de Residencia</label>
                                                        <input id="LRM" name="lugar_residencia_madre" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="nh">No. de Hermanos</label>
                                                    <input type="text" id="nh" name="no_hermanos" class="form-control" placeholder="No. de Hermanos">
                                                </div>
                                                <div class="col-md-4">
                                                        <label for="loe">Lugar que ocupas entre ellos</label>
                                                        <input type="text" id="loe" name="lugar_que_ocupas" class="form-control" placeholder="Lugar que ocupas entre ellos">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="av">Actualmente vives</label>
                                                    <select name="actualmente_vives" id="av" class="custom-select custom-select-md">
                                                            <option value="" selected>Elija una Opción</option>
                                                            <option value="1">Con los padres</option>
                                                            <option value="2">Con otros estudiantes</option>
                                                            <option value="3">Con tios u otros familiares</option>
                                                            <option value="4">Solo</option>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="nop">No. de personas</label>
                                                    <input type="text" name="no_persona" id="nop" class="form-control" placeholder="No. de personas">
                                                </div>
                                                <div class="col-md-6">
                                                        <label for="etnia">Perteneces a una etnia indígena</label>
                                                        <select name="etnia" id="etnia" class="custom-select custom-select-md">
                                                            <option value="" selected>Elija una Opción</option>
                                                            <option value="1">Si</option>
                                                            <option value="2">No</option>
                                                        </select>
                                                </div>
                                                <div class="col-md-12" id="cualetnia">
                                                        <label for="cualetnia">¿Cual?</label>
                                                        <input type="text"  name="cual_etnia" class="form-control" placeholder="¿Cual?">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="hablas">Hablas una Lengua indígena</label>
                                                    <select  id="hablas" name="hablas" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija una Opción</option>
                                                        <option value="1">Si</option>
                                                        <option value="2">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                        <label for="sostiene">¿Quién sostiene económicamente tu hogar?</label>
                                                        <input type="text" id="sostiene" name="sosten_hogar" class="form-control" placeholder="¿Quién sostiene económicamente tu hogar?">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                        <label for="consideras">Consideras a tu familia</label>
                                                        <select id="consideras" name="consideras_a_familia" class="custom-select custom-select-md">
                                                            <option value="" selected>Elija una Opción</option>
                                                            <option value="1">Unida</option>
                                                            <option value="2">Muy Unida</option>
                                                            <option value="3">Disfuncional</option>
                                                        </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="nt">Nombre del Tutor</label>
                                                    <input type="text" name="nombre_tutor" id="nt" class="form-control" placeholder="Nombre del Tutor">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="parentesco">Parentesco</label>
                                                    <input name="parentesco" id="parentesco" type="text" class="form-control" placeholder="Parentesco">
                                                </div>
                                            </div>
                                        </div>
                                        <a class="btn btn-primary text-white" id="siguiente3">Siguiente</a>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-habitos" role="tabpanel" aria-labelledby="v-pills-habitos-tab">
                                    <div class="card" >
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="tiempo">Tiempo dedicado a estudiar diariamente fuera de clase</label>
                                                    <select name="tiempo_empleado_estudiar" id="tiempo" type="text" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija una Opción</option>
                                                        <option value="1">Menos de 1 hora</option>
                                                        <option value="2">1 hora</option>
                                                        <option value="3">2 horas</option>
                                                        <option value="4">3 horas</option>
                                                        <option value="5">mas de 4 horas</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="fti">¿Cómo es tú forma de trabajo intelectual?</label>
                                                    <select  id="fti" name="forma_trabajo" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija una Opción</option>
                                                        <option value="1">Muy Rapido</option>
                                                        <option value="2">Rapido</option>
                                                        <option value="3">Regular</option>
                                                        <option value="4">Lento</option>
                                                        <option value="5">Muy Lento</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="formaes">Tu forma de estudio mas utilizada</label>
                                                    <input name="forma_estudio" id="formaes" type="text" class="form-control" placeholder="Tu forma de estudio mas utilizada">
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="empleas">¿Cómo empleas tu tiempo libre?</label>
                                                    <input type="text" name="tiempo_libre" id="empleas" class="form-control" placeholder="¿Cómo empleas tu tiempo libre?">
                                                </div>
                                                <div class="col-md-12">
                                                        <label for="asignap">Asignaturas preferidas</label>
                                                        <input type="text" name="asigna_preferida" id="asignap" class="form-control" placeholder="Asignaturas preferidas">
                                                    </div>
                                                <div class="col-md-12">
                                                    <label for="pqap">¿Por qué?</label>
                                                    <input name="porque_asignatura" id="pqap" type="text" class="form-control" placeholder="¿Por qué?">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="asigdif">Asignaturas que te han sido difíciles</label>
                                                    <input type="text" id="asigdif" name="asignatura_dificil" class="form-control" placeholder="Asignaturas que te han sido difíciles">
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="pqdifi">¿Por qué?</label>
                                                    <input name="porque_asignatura_dificil" id="pqdifi" type="text" class="form-control" placeholder="¿Por qué?">
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="qopin">¿Qué opinión tienes de ti mismo como estudiante?</label>
                                                    <input type="text" name="opinion_tu_mismo_estudiante" id="qopin" placeholder="¿Qué opinión tienes de ti mismo como estudiante?" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <a class="btn btn-primary text-white" id="siguiente4">Siguiente</a>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-formacion" role="tabpanel" aria-labelledby="v-pills-formacion-tab">
                                    <div class="card" >
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="depo">¿Practicas regularmente algún deporte?</label>
                                                    <select name="depo" id="depo" class="custom-select custom-select-md">
                                                            <option value="" selected>Elija una Opción</option>
                                                            <option value="1">Si</option>
                                                            <option value="2">No</option>
                                                        </select>
                                                </div>
                                                <div class="col-md-12" id="especifica1">
                                                    <label for="especifica1">Especifica</label>
                                                    <input type="text" placeholder="Especifica" name="especifica1" id="especifica1" class="form-control" >
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="artistica">¿Practicas alguna actividad artística?</label>
                                                    <select name="artistica" id="artistica" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija una Opción</option>
                                                        <option value="1">Si</option>
                                                        <option value="2">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                    <div class="col-md-12" id="especifica2">
                                                            <label for="especifica2">Especifica</label>
                                                            <input type="text" placeholder="Especifica" name="especifica2" class="form-control" >
                                                        </div>
                                                <div class="col-md-6">
                                                    <label for="pasatiempo">Tu pasatiempo favorito</label>
                                                    <input  name="pasatiempo" id="pasatiempo" placeholder="Pasatiempo" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="actC">¿Participas en actividades culturales, sociales?</label>
                                                    <select  id="actC" name="actC" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija una Opción</option>
                                                        <option value="1">Si</option>
                                                        <option value="2">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12" id="cualesAc">
                                                        <label for="cualesAc">¿Cuáles?</label>
                                                        <input type="text"  name="cualesAc" class="form-control" placeholder="Cuáles">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="estSalud">¿Cómo consideras tu estado de salud?</label>
                                                    <select name="estSalud" id="estSalud" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija una Opción</option>
                                                        <option value="1">Excelente</option>
                                                        <option value="2">Buena</option>
                                                        <option value="3">Regular</option>
                                                        <option value="4">Mala</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="enferCron">¿Padeces alguna enfermedad crónica?</label>
                                                    <select name="enferCron" id="enferCron" class="custom-select custom-select-md">
                                                            <option value="" selected>Elija una Opción</option>
                                                            <option value="1">Si</option>
                                                            <option value="2">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12" id="especificarEnf">
                                                        <label for="especificarEnf">Especificar</label>
                                                        <input type="text" name="especificarEnf" class="form-control" placeholder="Especificar">
                                                </div>
                                                <div class="col-md-12">
                                                        <label for="EnfPa">¿Tus padres padecen alguna enfermedad crónica?</label>
                                                        <select id="EnfPa" name="EnfPa" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option value="1">Si</option>
                                                                <option value="2">No</option>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12" id="especificarEnfPa">
                                                        <label for="especificarEnfPa">Especificar</label>
                                                        <input type="text"  name="especificarEnfPa" class="form-control" placeholder="Especificar">
                                                </div>
                                                <div class="col-md-12">
                                                        <label for="operacion">¿Te han realizado alguna operación médico-quirúrgica?</label>
                                                        <select id="operacion" name="operacion" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option value="1">Si</option>
                                                                <option value="2">No</option>
                                                        </select>
                                                </div>
                                                <div class="col-md-12"id="especificarOpe">
                                                        <label for="especificarOpe">Especificar</label>
                                                        <input type="text" id="especificarOpe" name="especificarOpe" class="form-control" placeholder="Especificar">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                        <label for="lentes">¿Usas lentes?</label>
                                                        <select name="lentes" id="lentes" class="custom-select custom-select-md">
                                                                <option value="" selected>Elija una Opción</option>
                                                                <option value="1">Si</option>
                                                                <option value="2">No</option>
                                                        </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="EnVisual">¿Padeces alguna enfermedad visual?</label>
                                                    <select name="EnVisual" id="EnVisual" class="custom-select custom-select-md">
                                                            <option value="" selected>Elija una Opción</option>
                                                            <option value="1">Si</option>
                                                            <option value="2">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12" id="especificarEnVisual">
                                                        <label for="especificarEnVisual">Especificar</label>
                                                        <input type="text"  name="especificarEnVisual" class="form-control" placeholder="Especificar">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="estatura">Estatura</label>
                                                    <input name="estatura" id="estatura" type="text" placeholder="Estatura" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="peso">Peso</label>
                                                    <input type="text" id="peso" name="peso" class="form-control" placeholder="Peso">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="mediContro">¿Tomas medicamento controlado?</label>
                                                    <select name="mediContro" id="mediContro" class="custom-select custom-select-md">
                                                            <option value="" selected>Elija una Opción</option>
                                                            <option value="1">Si</option>
                                                            <option value="2">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12" id="especificarMed">
                                                        <label for="especificarMed">Especificar</label>
                                                        <input type="text"  name="especificarMed" class="form-control" placeholder="Especificar">
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="accidente">¿Haz tenido algún accidente grave?</label>
                                                    <select name="accidente" id="accidente" class="custom-select custom-select-md">
                                                            <option value="" selected>Elija una Opción</option>
                                                            <option value="1">Si</option>
                                                            <option value="2">No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12" id="relata">
                                                        <label for="relata">Relata Brevemente</label>
                                                        <input type="text"  name="relata" class="form-control" placeholder="Relata">
                                                </div>
                                            </div>
                                        </div>
                                        <a class="btn btn-primary text-white" id="siguiente5">Siguiente</a>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-area" role="tabpanel" aria-labelledby="v-pills-area-tab">
                                    <div class="card" >
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="rendEsco">Rendimiento Escolar</label>
                                                    <select name="rendimiento_escolar" id="rendEsco" class="custom-select custom-select-md">
                                                            <option value="" selected>Elija una Opción</option>
                                                            <option value="1">Excelente</option>
                                                            <option value="2">Muy Bien</option>
                                                            <option value="3">Bien</option>
                                                            <option value="4">Regular</option>
                                                            <option value="5">Mala</option>
                                                        </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="dominio">Dominio del propio idioma</label>
                                                    <select name="dominio" id="dominio" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija una Opción</option>
                                                        <option value="1">Excelente</option>
                                                        <option value="2">Muy Bien</option>
                                                        <option value="3">Bien</option>
                                                        <option value="4">Regular</option>
                                                        <option value="5">Mala</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="otro">Otro idioma</label>
                                                    <select name="otro_idioma" id="otro" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija una Opción</option>
                                                        <option value="1">Excelente</option>
                                                        <option value="2">Muy Bien</option>
                                                        <option value="3">Bien</option>
                                                        <option value="4">Regular</option>
                                                        <option value="5">Mala</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="conComp">Conocimentos en cómputo</label>
                                                    <select name="conocimiento_computo" id="conComp" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija una Opción</option>
                                                        <option value="1">Excelente</option>
                                                        <option value="2">Muy Bien</option>
                                                        <option value="3">Bien</option>
                                                        <option value="4">Regular</option>
                                                        <option value="5">Mala</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="aptitudes">Aptitudes Especiales</label>
                                                    <select name="aptitudes" id="aptitudes" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija una Opción</option>
                                                        <option value="1">Excelente</option>
                                                        <option value="2">Muy Bien</option>
                                                        <option value="3">Bien</option>
                                                        <option value="4">Regular</option>
                                                        <option value="5">Mala</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="comprension">Comprensión y Retención en clase</label>
                                                    <select name="comprension" id="comprension" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija una Opción</option>
                                                        <option value="1">Excelente</option>
                                                        <option value="2">Muy Bien</option>
                                                        <option value="3">Bien</option>
                                                        <option value="4">Regular</option>
                                                        <option value="5">Mala</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="preparacion">Preparación y presentación de exámenes</label>
                                                    <select name="preparacion" id="preparacion" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija una Opción</option>
                                                        <option value="1">Excelente</option>
                                                        <option value="2">Muy Bien</option>
                                                        <option value="3">Bien</option>
                                                        <option value="4">Regular</option>
                                                        <option value="5">Mala</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="estrategias">Aplicación de estrategias de aprendizaje y estudio</label>
                                                    <select name="estrategias" id="estrategias" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija una Opción</option>
                                                        <option value="1">Excelente</option>
                                                        <option value="2">Muy Bien</option>
                                                        <option value="3">Bien</option>
                                                        <option value="4">Regular</option>
                                                        <option value="5">Mala</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="actEst">Organización en actividades de estudio</label>
                                                    <select name="organizacion_actividades" id="actEst" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija una Opción</option>
                                                        <option value="1">Excelente</option>
                                                        <option value="2">Muy Bien</option>
                                                        <option value="3">Bien</option>
                                                        <option value="4">Regular</option>
                                                        <option value="5">Mala</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="concentracion">Concentración durante el estudio</label>
                                                    <select name="concentracion" id="concentracion" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija una Opción</option>
                                                        <option value="1">Excelente</option>
                                                        <option value="2">Muy Bien</option>
                                                        <option value="3">Bien</option>
                                                        <option value="4">Regular</option>
                                                        <option value="5">Mala</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="solucion">Solución de problemas y aprendizaje de las matemáticas</label>
                                                    <select name="solucion" id="solucion" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija una Opción</option>
                                                        <option value="1">Excelente</option>
                                                        <option value="2">Muy Bien</option>
                                                        <option value="3">Bien</option>
                                                        <option value="4">Regular</option>
                                                        <option value="5">Mala</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="condiciones">Condiciones ambientales durante el estudio</label>
                                                    <select name="condiciones" id="condiciones" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija una Opción</option>
                                                        <option value="1">Excelente</option>
                                                        <option value="2">Muy Bien</option>
                                                        <option value="3">Bien</option>
                                                        <option value="4">Regular</option>
                                                        <option value="5">Mala</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="bibliografica">Búsqueda bibliografica e integración de información</label>
                                                    <select name="bibliografica" id="bibliografica" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija una Opción</option>
                                                        <option value="1">Excelente</option>
                                                        <option value="2">Muy Bien</option>
                                                        <option value="3">Bien</option>
                                                        <option value="4">Regular</option>
                                                        <option value="5">Mala</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="equipo">Trabajo en equipo</label>
                                                    <select name="equipo" id="equipo" class="custom-select custom-select-md">
                                                        <option value="" selected>Elija una Opción</option>
                                                        <option value="1">Excelente</option>
                                                        <option value="2">Muy Bien</option>
                                                        <option value="3">Bien</option>
                                                        <option value="4">Regular</option>
                                                        <option value="5">Mala</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="btn btn-primary" href="panel" id="final">Guardar Datos</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
            </div>
    </div>
</div>

