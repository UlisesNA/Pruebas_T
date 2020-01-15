@extends('layouts.app')
@section('content')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <div class="container card">
        <br>

        <div class="row">
            <div class="col-6">

            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-general-tab" data-toggle="pill" href="#v-pills-general" role="tab" aria-controls="v-pills-general" aria-selected="true">Datos Generales</a>
                    <a class="nav-link disabled" id="v-pills-antecedentes-tab" data-toggle="pill" href="#v-pills-antecedentes" role="tab" aria-controls="v-pills-antecedentes" aria-selected="false">Antecedentes Acádemicos</a>
                    <a class="nav-link disabled" id="v-pills-familiares-tab" data-toggle="pill" href="#v-pills-familiares" role="tab" aria-controls="v-pills-familiares" aria-selected="false">Datos Familiares</a>
                    <a class="nav-link disabled" id="v-pills-habitos-tab" data-toggle="pill" href="#v-pills-habitos" role="tab" aria-controls="v-pills-habitos" aria-selected="false">Hábitos de Estudio</a>
                    <a class="nav-link disabled" id="v-pills-formacion-tab" data-toggle="pill" href="#v-pills-formacion" role="tab" aria-controls="v-pills-formacion" aria-selected="false">Formación Integral/Salud</a>
                    <a class="nav-link disabled" id="v-pills-area-tab" data-toggle="pill" href="#v-pills-area" role="tab" aria-controls="v-pills-area" aria-selected="false">Área Psicopedagógica</a>
                </div>
            </div>
            <div class="col-9">
                <form id="form-expe">
                    {{ csrf_field() }}
                    <div class="tab-content text-justify" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab">
                            <div class="card" >
                                <div class="card-body" >
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" id="nombre" name="nombre" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="edad">Edad</label>
                                            <input type="text" class="form-control" id="edad" name="edad">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="sexo">Sexo</label>
                                            <select name="sexo" id="sexo"  class="custom-select custom-select-md">
                                                <option value="" selected>Elija un Sexo</option>
                                                <option value="1">Masculino</option>
                                                <option value="2">Femenino</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="fn">Fecha de Nacimiento</label>
                                            <input type="date" value="" id="fecha_nacimientos" name="fecha_nacimientos" class="form-control" min="1990-01-01" max="2000-01-01">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="fn">Lugar de Nacimiento</label>
                                            <input type="text" value="" id="lugar_nacimientos" name="lugar_nacimientos" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="EC">Estado Civil</label>
                                            <select name="id_estado_civil" id="id_estado_civil" class="custom-select custom-select-md">
                                                <option value="" selected>Elija Estado Civil</option>
                                                @foreach ($estadocivil as $dato)
                                                    <option value="{{$dato->id_estado_civil}}" >{{$dato->desc_ec}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="nh">No. Hijos</label>
                                            <select name="no_hijos" id="no_hijos"  class="custom-select custom-select-md">
                                                <option value="" selected>Elija una opción</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5 o más</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="direccion">Dirección</label>
                                            <input type="text" value="{{isset($datos[0])?$datos[0]->direccion:''}}" id="direccion" name="direccion" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="correo">Correo</label>
                                            <input type="email" value="" id="correo" name="correo" class="form-control" >
                                        </div>
                                        <div class="col-md-4">
                                            <label for="tel-casa">Tel. Casa</label>
                                            <input type="text" value="" id="tel_casa" name="tel_casa" class="form-control" >
                                        </div>
                                        <div class="col-md-4">
                                            <label for="cel">Celular</label>
                                            <input type="text" value="" id="cel" name="cel" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="NSE">Nivel Socio-Económico</label>
                                            <select name="id_nivel_economico" id="id_nivel_economico" class="custom-select custom-select-md">
                                                <option value="" selected>Elija Nivel Socio-Económico</option>
                                                @foreach ($niveleconomico as $dato)
                                                    <option value="{{$dato->id_nivel_economico}}" >{{$dato->desc_opc}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="poblacion">Población</label>
                                            <select name="poblacion" id="poblacion" class="custom-select custom-select-md">
                                                <option value="" selected>Elija Opción</option>
                                                <option value="Rural">Rural</option>
                                                <option value="Urbana">Urbana</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="trabaja">Trabaja</label>
                                            <select name="trabaja" id="trabaja" class="custom-select custom-select-md">
                                                <option value="" selected>Elija Opción</option>
                                                <option value="1">Si</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="ocupacion">Ocupación</label>
                                            <input type="text" value="" name="ocupacion" id="ocupacion"class="form-control" >
                                        </div>
                                        <div class="col-md-4">
                                            <label for="horario">Horario</label>
                                            <input type="text" value="" id="horario" name="horario" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="carrera">Carrera</label>
                                            <select name="id_carrera" id="id_carrera" class="custom-select custom-select-md">
                                                <option value="" >Elija una Carrera</option>
                                                @foreach ($carreras as $dato)
                                                    <option value="{{$dato->id_carrera}}" >{{$dato->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="periodo">Periodo</label>
                                            <select name="id_periodo" id="id_periodo" value="{{isset($datos[0])?$datos[0]->id_periodo:''}}" class="custom-select custom-select-md">
                                                <option value="" selected>Elija un Periodo</option>
                                                @foreach ($periodos as $dato)
                                                    <option value="{{$dato->id_periodo}}" >{{$dato->periodo}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="noC">No. Cuenta</label>
                                            <input type="text" id="no_cuenta"  name="no_cuenta" class="form-control" value="{{Session::get('cuenta')}}" >
                                        </div>
                                        <div class="col-md-4">
                                            <label for="semestre">Semestre</label>
                                            <select name="id_semestre" id="id_semestre" class="custom-select custom-select-md">
                                                <option value="" selected>Elija un Semestre</option>
                                                @foreach ($semestres as $dato)
                                                    <option value="{{$dato->id_semestre}}" >{{$dato->descripcion}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="grupo">Grupo</label>
                                            <select name="id_grupo" id="id_grupo" value="{{isset($datos[0])?$datos[0]->id_grupo:''}}" class="custom-select custom-select-md">
                                                <option value="" selected>Elija un Grupo</option>
                                                @foreach ($grupos as $dato)
                                                    <option value="{{$dato->id_grupo}}" >{{$dato->grupo}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="estado">Estado</label>
                                            <select id="estado" name="estado" class="custom-select custom-select-md">
                                                <option value="" selected>Elija Estado</option>
                                                <option value="1">Regular</option>
                                                <option value="2">Irregular</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="turno">Turno</label>
                                            <select name="turno" id="turno" class="custom-select custom-select-md">
                                                <option value="" selected>Elija Turno</option>
                                                @foreach ($turno as $dato)
                                                    <option value="{{$dato->id_turno}}" >{{$dato->descripcion_turno}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="ant_inst">Antecedentes institucionales</label>
                                            <select name="ant_inst" id="ant_inst" class="custom-select custom-select-md">
                                                <option value="" selected>Elija Opción</option>
                                                <option value="Continuación de estudios">Continuación de estudios</option>
                                                <option value="Cambio de carrera">Cambio de carrera/institucion</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="satisfaccion_c">Nivel de satisfacción con la carrera</label>
                                            <select name="satisfaccion_c" id="satisfaccion_c" class="custom-select custom-select-md">
                                                <option value="" selected>Elija Opción</option>
                                                <option value="Muy satisfecho">Muy satisfecho</option>
                                                <option value="Satisfecho">Satisfecho</option>
                                                <option value="Regular">Regular</option>
                                                <option value="Inconforme">Inconforme</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="materias_repeticion">Materias en repeticion</label>
                                            <select name="materias_repeticion" id="materias_repeticion" class="custom-select custom-select-md">
                                                <option value="" selected>Elija Opción</option>
                                                <option value="1">Si</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="tot_repe">Número de materias en repetición</label>
                                            <select name="tot_repe" id="tot_repe" class="custom-select custom-select-md">
                                                <option value="" selected>Elija Opción</option>
                                                <option value="1">0</option>
                                                <option value="2">1</option>
                                                <option value="3">2</option>
                                                <option value="4">3 o más</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="materias_especial">Materias en especial</label>
                                            <select name="materias_especial" id="materias_especial" class="custom-select custom-select-md">
                                                <option value="" selected>Elija Opción</option>
                                                <option value="1">Si</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="tot_espe">Número de materias en especial</label>
                                            <select name="tot_espe" id="tot_espe" class="custom-select custom-select-md">
                                                <option value="" selected>Elija Opción</option>
                                                <option value="1">0</option>
                                                <option value="2">1</option>
                                                <option value="3">2</option>
                                                <option value="4">3</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="gen_espe">Número de especiales totales</label>
                                            <select name="gen_espe" id="gen_espe" class="custom-select custom-select-md">
                                                <option value="" selected>Elija Opción</option>
                                                <option value="1">0</option>
                                                <option value="2">1</option>
                                                <option value="3">2</option>
                                                <option value="4">3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="beca">Beca</label>
                                            <select name="beca" id="beca" class="custom-select custom-select-md">
                                                <option value="" selected>Elija Opción</option>
                                                <option value="1">Si</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="tbeca">Tipo Beca</label>
                                            <input type="text" value="{{isset($datos[0])?$datos[0]->tipo_beca:''}}"  name="tipo_beca" id="tipo_beca" class="form-control">
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
                                            <select name="id_bachillerato" id="id_bachillerato" class="custom-select custom-select-md">
                                                <option value="" selected>Elija Bachillerato</option>
                                                @foreach ($bachillerato as $dato)
                                                    <option value="{{$dato->id_bachillerato}}" >{{$dato->desc_bachillerato}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="oe">Otros Estudios</label>
                                            <input name="otros_estudios" id="otros_estudios" value="{{isset($datos[1])?$datos[1]->otros_estudios:''}}"class="form-control" placeholder="Otros Estudios">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="cb">Años en que Curso el Bachillerato</label>
                                            <select name="anos_curso_bachillerato" id="anos_curso_bachillerato" class="custom-select custom-select-md">
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
                                            <input type="text" value="{{isset($datos[1])?$datos[1]->año_terminacion:''}}" name="ano_terminacion" id="ano_terminacion" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="epro">Escuela de Procedencia</label>
                                            <input type="text" value="{{isset($datos[1])?$datos[1]->escuela_procedente:''}}" class="form-control" id="escuela_procedente" name="escuela_procedente" >
                                        </div>
                                        <div class="col-md-4">
                                            <label for="promedio">Promedio</label>
                                            <input name="promedio" value="{{isset($datos[1])?$datos[1]->promedio:''}}" id="promedio" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="mrb">Materias reprobadas en bachillerato</label>
                                            <input type="text" value="{{isset($datos[1])?$datos[1]->materias_reprobadas:''}}" id="materias_reprobadas" name="materias_reprobadas" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="oti">Otra Carrera Iniciada</label>
                                            <select name="otra_carrera_ini" id="otra_carrera_ini" class="custom-select custom-select-md">
                                                <option value="" selected>Elija una Opción</option>
                                                <option value="1">Si</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="institucion">Institución</label>
                                            <input name="institucion" value="{{isset($datos[1])?$datos[1]->institucion:''}}" id="institucion" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="SC">Semestres Cursados</label>
                                            <select name="semestres_cursados" id="semestres_cursados" class="custom-select custom-select-md">
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
                                            <input type="text" value="{{isset($datos[1])?$datos[1]->razon_descide_estudiar_tesvb:''}}" id="razon_descide_estudiar_tesvb" name="razon_descide_estudiar_tesvb" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="perfil">Tienes información sobre el perfil profesional de la carrera</label>
                                            <input type="text" value="" id="sabedel_perfil_profesional" name="sabedel_perfil_profesional" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row" >
                                        <div class="col-md-4">
                                            <label for="ie">Interrupciones en los estudios</label>
                                            <select  id="interrupciones_estudios" name="interrupciones_estudios" class="custom-select custom-select-md">
                                                <option value="" selected>Elija una Opción</option>
                                                <option value="1">Si</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-8" id="razones">
                                            <label for="razones">Razones</label>
                                            <input type="text" value="{{isset($datos[1])?$datos[1]->razones_interrupcion:''}}" id="razones_interrupcion" name="razones_interrupcion" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="ov">Tuviste otras opciones vocacionales o preferencias por otras carreras</label>
                                            <select id="otras_opciones_vocales" name="otras_opciones_vocales" class="custom-select custom-select-md">
                                                <option value="" selected>Elija una Opción</option>
                                                <option value="1">Si</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12"  id="cuales">
                                            <label for="cuales">¿Cuales?</label>
                                            <input name="cuales_otras_opciones_vocales" id="cuales_otras_opciones_vocales" value="{{isset($datos[1])?$datos[1]->cuales_otras_opciones_vocales:''}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="cae">Te gusta la carrera elegida</label>
                                            <select name="tegusta_carrera_elegida" id="tegusta_carrera_elegida" class="custom-select custom-select-md">
                                                <option value="" selected>Elija una Opción</option>
                                                <option value="1">Si</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-8" id="pq">
                                            <label for="pq">¿Por qué?</label>
                                            <input type="text" value="{{isset($datos[1])?$datos[1]->porque_carrera_elegida:''}}" name="porque_carrera_elegida" id="porque_carrera_elegida" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label for="tefe">Te estimula tu familia en tus estudios</label>
                                            <select name="teestimula_familia" id="teestimula_familia" class="custom-select custom-select-md">
                                                <option value="" selected>Elija una Opción</option>
                                                <option value="1">Si</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-7">
                                            <label for="sus">Suspensión de Estudios después de terminado el bachillerato</label>
                                            <select id="suspension_estudios_bachillerato" name="suspension_estudios_bachillerato" class="custom-select custom-select-md">
                                                <option value="" selected>Elija una Opción</option>
                                                <option value="1">Si</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12" id="razonesSus">
                                            <label for="razonesSus">Razones</label>
                                            <input type="text" value="{{isset($datos[1])?$datos[1]->razones_suspension_estudios:''}}" name="razones_suspension_estudios" id="razones_suspension_estudios" class="form-control">
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
                                            <input name="nombre_padre" value="{{isset($datos[2])?$datos[2]->nombre_padre:''}}" id="nombre_padre" type="text" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edadP">Edad</label>
                                            <input type="text" value="{{isset($datos[2])?$datos[2]->edad_padre:''}}" name="edad_padre" id="edad_padre" class="form-control" >
                                        </div>
                                        <div class="col-md-3">
                                            <label for="ocupacionP">Ocupación</label>
                                            <input name="ocupacion_padre" value="{{isset($datos[2])?$datos[2]->ocupacion_padre:''}}" id="ocupacion_padre" type="text" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="LRP">Lugar de Residencia</label>
                                            <input value="{{isset($datos[2])?$datos[2]->lugar_residencia_padre:''}}" name="lugar_residencia_padre" id="lugar_residencia_padre" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="nm">Nombre de la Madre</label>
                                            <input type="text" value="{{isset($datos[2])?$datos[2]->nombre_madre:''}}" name="nombre_madre" id="nombre_madre" class="form-control" >
                                        </div>
                                        <div class="col-md-3">
                                            <label for="edadM">Edad</label>
                                            <input type="text" value="{{isset($datos[2])?$datos[2]->edad_madre:''}}" name="edad_madre" id="edad_madre" class="form-control" >
                                        </div>
                                        <div class="col-md-3">
                                            <label for="ocupacionM">Ocupación</label>
                                            <input id="ocupacion_madre" value="{{isset($datos[2])?$datos[2]->ocupacion_madre:''}}" name="ocupacion_madre" type="text" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="LRM">Lugar de Residencia</label>
                                            <input id="lugar_residencia_madre" value="{{isset($datos[2])?$datos[2]->lugar_residencia_madre:''}}" name="lugar_residencia_madre" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="nh">No. de Hermanos</label>
                                            <select name="no_hermanos" id="no_hermanos"  class="custom-select custom-select-md">
                                                <option value="" selected>Elija una opción</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5 o más</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="loe">Lugar que ocupas entre ellos</label>
                                            <input type="text" value="{{isset($datos[2])?$datos[2]->lugar_ocupas:''}}" id="lugar_ocupas" name="lugar_ocupas" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="av">Actualmente vives</label>
                                            <select name="id_opc_vives" id="id_opc_vives" class="custom-select custom-select-md">
                                                <option value="" selected>Elija una Opción</option>
                                                @foreach ($vive as $dato)
                                                    <option value="{{$dato->id_opc_vives}}" >{{$dato->desc_opc}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="nop">No. de personas</label>
                                            <input type="text" value="{{isset($datos[2])?$datos[2]->no_personas:''}}" name="no_personas" id="no_personas" class="form-control" >
                                        </div>
                                        <div class="col-md-4">
                                            <label for="etnia">Perteneces a una etnia indígena</label>
                                            <select name="etnia_indigena" id="etnia_indigena" class="custom-select custom-select-md">
                                                <option value="" selected>Elija una Opción</option>
                                                <option value="1">Si</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4" id="cualetnia">
                                            <label for="cualetnia">¿Cual?</label>
                                            <input type="text" value="{{isset($datos[2])?$datos[2]->cual_etnia:''}}" name="cual_etnia" id="cual_etnia" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="hablas">Hablas una Lengua indígena</label>
                                            <select  id="hablas_lengua_indigena" name="hablas_lengua_indigena" class="custom-select custom-select-md">
                                                <option value="" selected>Elija una Opción</option>
                                                <option value="1">Si</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="sostiene">¿Quién sostiene económicamente tu hogar?</label>
                                            <input type="text" value="{{isset($datos[2])?$datos[2]->sostiene_economia_hogar:''}}" id="sostiene_economia_hogar" name="sostiene_economia_hogar" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="consideras">Consideras a tu familia</label>
                                            <select id="id_familia_union" name="id_familia_union" class="custom-select custom-select-md">
                                                <option value="" selected>Elija una Opción</option>
                                                @foreach ($familiaunion as $dato)
                                                    <option value="{{$dato->id_familia_union}}" >{{$dato->desc_union}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="nt">Nombre del Tutor</label>
                                            <input type="text" value="{{isset($datos[2])?$datos[2]->nombre_tutor:''}}" name="nombre_tutor" id="nombre_tutor" class="form-control" >
                                        </div>
                                        <div class="col-md-4">
                                            <label for="parentesco">Parentesco</label>
                                            <select id="id_parentesco" name="id_parentesco" class="custom-select custom-select-md">
                                                <option value="" selected>Elija una Opción</option>
                                                @foreach ($parentesco as $dato)
                                                    <option value="{{$dato->id_parentesco}}" >{{$dato->desc_parentesco}}</option>
                                                @endforeach
                                            </select>
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
                                            <select name="tiempo_empelado_estudiar" id="tiempo_empelado_estudiar" type="text" class="custom-select custom-select-md">
                                                <option value="" selected>Elija una Opción</option>
                                                @foreach ($tiempoestudia as $dato)
                                                    <option value="{{$dato->id_tiempoestudia}}" >{{$dato->descripcion_tiempo}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="fti">¿Cómo es tú forma de trabajo intelectual?</label>
                                            <select  id="id_opc_intelectual" name="id_opc_intelectual" class="custom-select custom-select-md">
                                                <option value="" selected>Elija una Opción</option>
                                                @foreach ($intelectual as $dato)
                                                    <option value="{{$dato->id_opc_intelectual}}" >{{$dato->desc_opc}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="formaes">Tu forma de estudio mas utilizada</label>
                                            <input name="forma_estudio" value="{{isset($datos[3])?$datos[3]->forma_estudio:''}}" id="forma_estudio" type="text" class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="empleas">¿Cómo empleas tu tiempo libre?</label>
                                            <input type="text" value="{{isset($datos[3])?$datos[3]->tiempo_libre:''}}" name="tiempo_libre" id="tiempo_libre" class="form-control" >
                                        </div>
                                        <div class="col-md-12">
                                            <label for="asignap">Asignaturas preferidas</label>
                                            <input type="text" value="{{isset($datos[3])?$datos[3]->asignatura_preferida:''}}" name="asignatura_preferida" id="asignatura_preferida" class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="pqap">¿Por qué?</label>
                                            <input name="porque_asignatura" value="{{isset($datos[3])?$datos[3]->porque_asignatura:''}}" id="porque_asignatura" type="text" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="asigdif">Asignaturas que te han sido difíciles</label>
                                            <input type="text" value="{{isset($datos[3])?$datos[3]->asignatura_dificil:''}}" id="asignatura_dificil" name="asignatura_dificil" class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="pqdifi">¿Por qué?</label>
                                            <input name="porque_asignatura_dificil" value="{{isset($datos[3])?$datos[3]->porque_asignatura_dificil:''}}" id="porque_asignatura_dificil" type="text" class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="qopin">¿Qué opinión tienes de ti mismo como estudiante?</label>
                                            <input type="text" value="{{isset($datos[3])?$datos[3]->opinion_tu_mismo_estudiante:''}}" name="opinion_tu_mismo_estudiante" id="opinion_tu_mismo_estudiante" class="form-control">
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
                                        <div class="col-md-6">
                                            <label for="depo">¿Practicas regularmente algún deporte?</label>
                                            <select name="practica_deporte" id="practica_deporte" class="custom-select custom-select-md">
                                                <option value="" selected>Elija una Opción</option>
                                                <option value="1">Si</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6" id="especifica1">
                                            <label for="especifica1">Especifica</label>
                                            <input type="text" value="{{isset($datos[4])?$datos[4]->especifica_deporte:''}}" name="especifica_deporte" id="especifica_deporte" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="artistica">¿Practicas alguna actividad artística?</label>
                                            <select name="practica_artistica" id="practica_artistica" class="custom-select custom-select-md">
                                                <option value="" selected>Elija una Opción</option>
                                                <option value="1">Si</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="especifica2">Especifica</label>
                                            <input type="text" value="{{isset($datos[4])?$datos[4]->especifica_artistica:''}}"  name="especifica_artistica" id="especifica_artistica" class="form-control" >
                                        </div>
                                        <div class="col-md-6">
                                            <label for="actC">¿Participas en actividades culturales, sociales?</label>
                                            <select  id="actividades_culturales" name="actividades_culturales" class="custom-select custom-select-md">
                                                <option value="" selected>Elija una Opción</option>
                                                <option value="1">Si</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6" id="cualesAc">
                                            <label for="cualesAc">¿Cuáles?</label>
                                            <input type="text" value="{{isset($datos[4])?$datos[4]->cuales_act:''}}" name="cuales_act" id="cuales_act" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="escala">¿Ingiere bebidas alcoholicas?</label>
                                            <select name="id_escala" id="id_escala" class="custom-select custom-select-md">
                                                <option value="" selected>Elija una Opción</option>
                                                @foreach ($escala as $dato)
                                                    <option value="{{$dato->id_escala}}" >{{$dato->desc_escala}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="pasatiempo">Tu pasatiempo favorito</label>
                                            <input  name="pasatiempo" value="{{isset($datos[4])?$datos[4]->pasatiempo:''}}" id="pasatiempo"class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="estSalud">¿Cómo consideras tu estado de salud?</label>
                                            <select name="estado_salud" id="estado_salud" class="custom-select custom-select-md">
                                                <option value="" selected>Elija una Opción</option>
                                                <option value="1">Excelente</option>
                                                <option value="2">Buena</option>
                                                <option value="3">Regular</option>
                                                <option value="4">Mala</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="enferCron">¿Padeces alguna enfermedad crónica?</label>
                                            <select name="enfermedad_cronica" id="enfermedad_cronica" class="custom-select custom-select-md">
                                                <option value="" selected>Elija una Opción</option>
                                                <option value="1">Si</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12" id="especificarEnf">
                                            <label for="especificarEnf">Especificar</label>
                                            <input type="text" value="{{isset($datos[4])?$datos[4]->especifica_enf_cron:''}}" name="especifica_enf_cron" id="especifica_enf_cron" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="EnfPa">¿Tus padres padecen alguna enfermedad crónica?</label>
                                            <select id="enf_cron_padre" name="enf_cron_padre" class="custom-select custom-select-md">
                                                <option value="" selected>Elija una Opción</option>
                                                <option value="1">Si</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6" id="especificarEnfPa">
                                            <label for="especificarEnfPa">Especificar</label>
                                            <input type="text" value="{{isset($datos[4])?$datos[4]->especifica_enf_cron_padres:''}}" name="especifica_enf_cron_padres" id="especifica_enf_cron_padres" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="operacion">¿Te han realizado alguna operación médico-quirúrgica?</label>
                                            <select id="operacion" name="operacion" class="custom-select custom-select-md">
                                                <option value="" selected>Elija una Opción</option>
                                                <option value="1">Si</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6"id="especificarOpe">
                                            <label for="especificarOpe">Especificar</label>
                                            <input type="text" value="{{isset($datos[4])?$datos[4]->deque_operacion:''}}" id="deque_operacion" name="deque_operacion" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="lentes">¿Usas lentes?</label>
                                            <select name="usas_lentes" id="usas_lentes" class="custom-select custom-select-md">
                                                <option value="" selected>Elija una Opción</option>
                                                <option value="1">Si</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="EnVisual">¿Padeces alguna enfermedad visual?</label>
                                            <select name="enfer_visual" id="enfer_visual" class="custom-select custom-select-md">
                                                <option value="" selected>Elija una Opción</option>
                                                <option value="1">Si</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-5" id="especificarEnVisual">
                                            <label for="especificarEnVisual">Especificar</label>
                                            <input type="text" value="{{isset($datos[4])?$datos[4]->especifica_enf:''}}" name="especifica_enf" id="especifica_enf" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="estatura">Estatura</label>
                                            <input name="estatura" value="{{isset($datos[4])?$datos[4]->estatura:''}}" id="estatura" type="text" class="form-control">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="peso">Peso</label>
                                            <input type="text" value="{{isset($datos[4])?$datos[4]->peso:''}}" id="peso" name="peso" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="mediContro">¿Tomas medicamento controlado?</label>
                                            <select name="medicamento_controlado" id="medicamento_controlado" class="custom-select custom-select-md">
                                                <option value="" selected>Elija una Opción</option>
                                                <option value="1">Si</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4" id="especificarMed">
                                            <label for="especificarMed">Especificar</label>
                                            <input type="text" value="{{isset($datos[4])?$datos[4]->especifica_medicamento:''}}" name="especifica_medicamento" id="especifica_medicamento" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="accidente">¿Has tenido algún accidente grave?</label>
                                            <select name="accidente_grave" id="accidente_grave" class="custom-select custom-select-md">
                                                <option value="" selected>Elija una Opción</option>
                                                <option value="1">Si</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6" id="relata">
                                            <label for="relata">Relata Brevemente</label>
                                            <input type="text" value="{{isset($datos[4])?$datos[4]->relata_breve:''}}" name="relata_breve" id="relata_breve" class="form-control">
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
                                            <select name="rendimiento_escolar" id="rendimiento_escolar" class="custom-select custom-select-md">
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
                                            <select name="dominio_idioma" id="dominio_idioma" class="custom-select custom-select-md">
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
                                            <select name="otro_idioma" id="otro_idioma" class="custom-select custom-select-md">
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
                                            <select name="conocimiento_compu" id="conocimiento_compu" class="custom-select custom-select-md">
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
                                            <select name="aptitud_especial" id="aptitud_especial" class="custom-select custom-select-md">
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
                                            <select name="estrategias_aprendizaje" id="estrategias_aprendizaje" class="custom-select custom-select-md">
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
                                            <select name="organizacion_actividades" id="organizacion_actividades" class="custom-select custom-select-md">
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
                                            <select name="solucion_problemas" id="solucion_problemas" class="custom-select custom-select-md">
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
                                            <select name="condiciones_ambientales" id="condiciones_ambientales" class="custom-select custom-select-md">
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
                                            <select name="busqueda_bibliografica" id="busqueda_bibliografica" class="custom-select custom-select-md">
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
                                            <select name="trabajo_equipo" id="trabajo_equipo" class="custom-select custom-select-md">
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
                                @if ($datos)
                                    <a class="btn btn-success" href="panel" id="update">Actualizar Datos</a>
                                @else
                                    <a class="btn btn-primary"  id="final" href="#!">Guardar Datos</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<script src="{{asset('js/jquery.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#siguiente1').click(function(){
            $('#v-pills-general-tab').removeClass('active');
            $('#v-pills-antecedentes-tab').addClass('active').removeClass('disabled');
            $('#v-pills-general').removeClass('show active');
            $('#v-pills-antecedentes').addClass('show active');
            //alert('das');\
            //$('#v-pills-general-tab').tab('show')
        });
        $('#siguiente2').click(function(){
            $('#v-pills-antecedentes-tab').removeClass('active');
            $('#v-pills-familiares-tab').addClass('active').removeClass('disabled');
            $('#v-pills-antecedentes').removeClass('show active');
            $('#v-pills-familiares').addClass('show active');
            //alert('das');\
            //$('#v-pills-general-tab').tab('show')
        });
        $('#siguiente3').click(function(){
            $('#v-pills-familiares-tab').removeClass('active');
            $('#v-pills-habitos-tab').addClass('active').removeClass('disabled');
            $('#v-pills-familiares').removeClass('show active');
            $('#v-pills-habitos').addClass('show active');
            //alert('das');\
            //$('#v-pills-general-tab').tab('show')
        });
        $('#siguiente4').click(function(){
            $('#v-pills-habitos-tab').removeClass('active');
            $('#v-pills-formacion-tab').addClass('active').removeClass('disabled');
            $('#v-pills-habitos').removeClass('show active');
            $('#v-pills-formacion').addClass('show active');
            //alert('das');\
            //$('#v-pills-general-tab').tab('show')
        });
        $('#siguiente5').click(function(){
            $('#v-pills-formacion-tab').removeClass('active');
            $('#v-pills-area-tab').addClass('active').removeClass('disabled');
            $('#v-pills-formacion').removeClass('show active');
            $('#v-pills-area').addClass('show active');
            //alert('das');\
            //$('#v-pills-general-tab').tab('show')
        });
        $('#final').click(function(){
            var con= true;
            var datos = $('#form-expe').serialize();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "alumno",
                method: "POST",
                dataType: "json",
                data:datos,
                success:function( response){
                    console.log(response)
                },error:function(error)
                {
                    $.each(error.responseJSON.errors,function(element, key){
                        console.log(element+"---"+key);
                        $("#"+element).after("<span class='text-danger'>"+key+"</span>");
                    })
                }
            });


        });
        $('#update').click(function(){
            var datos = $('#form-expe').serialize();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "UpdateAlum",
                method: "POST",
                dataType: "json",
                data:datos,

            });
        });

        $( "#fn" ).datepicker({
            changeYear: true
        });
        {
            $('#actC').on('change',function () {
                if ($(this).val()==1) {
                    $('#cualesAc').fadeIn();
                }else{
                    $('#cualesAc').fadeOut().find('input:text').val('');

                }
            });
            $('#enferCron').on('change',function () {
                if ($(this).val()==1) {
                    $('#especificarEnf').fadeIn();
                }else{
                    $('#especificarEnf').fadeOut().find('input:text').val('');

                }
            });
            $('#EnfPa').on('change',function () {
                if ($(this).val()==1) {
                    $('#especificarEnfPa').fadeIn();
                }else{
                    $('#especificarEnfPa').fadeOut().find('input:text').val('');

                }
            });
            $('#operacion').on('change',function () {
                if ($(this).val()==1) {
                    $('#especificarOpe').fadeIn();
                }else{
                    $('#especificarOpe').fadeOut().find('input:text').val('');

                }
            });
            $('#EnVisual').on('change',function () {
                if ($(this).val()==1) {
                    $('#especificarEnVisual').fadeIn();
                }else{
                    $('#especificarEnVisual').fadeOut().find('input:text').val('');

                }
            });
            $('#mediContro').on('change',function () {
                if ($(this).val()==1) {
                    $('#especificarMed').fadeIn();
                }else{
                    $('#especificarMed').fadeOut().find('input:text').val('');

                }
            });
            $('#accidente').on('change',function () {
                if ($(this).val()==1) {
                    $('#relata').fadeIn();
                }else{
                    $('#relata').fadeOut().find('input:text').val('');

                }
            });
            $('#depo').on('change',function () {
                if ($(this).val()==1) {
                    $('#especifica1').fadeIn();
                }else{
                    $('#especifica1').fadeOut().find('input:text').val('');

                }
            });
            $('#artistica').on('change',function () {
                if ($(this).val()==1) {
                    $('#especifica2').fadeIn();
                }else{
                    $('#especifica2').fadeOut().find('input:text').val('');

                }
            });
            $('#etnia').on('change',function () {
                if ($(this).val()==1) {
                    $('#cualetnia').fadeIn();
                }else{
                    $('#cualetnia').fadeOut().find('input:text').val('');

                }
            });
            $('#sus').on('change',function () {
                if ($(this).val()==1) {
                    $('#razonesSus').fadeIn();
                }else{
                    $('#razonesSus').fadeOut().find('input:text').val('');

                }
            });
            $('#cae').on('change',function () {
                if ($(this).val()==1) {
                    $('#pq').fadeIn();
                }else{
                    $('#pq').fadeOut().find('input:text').val('');

                }
            });
            $('#ov').on('change',function () {
                if ($(this).val()==1) {
                    $('#cuales').fadeIn();
                }else{
                    $('#cuales').fadeOut().find('input:text').val('');

                }
            });
            $('#trabaja').on('change',function () {
                if ($(this).val()==1) {
                    $('#ocupacion').fadeIn();
                }else{
                    $('#ocupacion').fadeOut().find('input:text').val('');

                }
            });
            $('#beca').on('change',function () {
                if ($(this).val()==1) {
                    $('#tbeca').fadeIn();
                }else{
                    $('#tbeca').fadeOut().find('input:text').val('');

                }
            });
            $('#oti').on('change',function () {
                if ($(this).val()==1) {
                    $('#otiOc').fadeIn();
                }else{
                    $('#otiOc').fadeOut().find('input:text').val('');

                }
            });
            $('#ie').on('change',function () {
                if ($(this).val()==1) {
                    $('#razones').fadeIn();
                }else{
                    $('#razones').fadeOut().find('input:text').val('');

                }
            });
        }

        if ($('#update').attr('id')) {
            @if($datos)
            $('.nav-link').removeClass('disabled');
            $("#carrera").val({{$datos[0]->id_carrera}});
            $("#periodo").val({{$datos[0]->id_periodo}});
            $("#grupo").val({{$datos[0]->id_grupo}});
            $("#sexo").val({{$datos[0]->sexo}});
            $("#semestre").val({{$datos[0]->id_semestre}});
            $("#EC").val({{$datos[0]->id_estado_civil}});
            $("#NSE").val({{$datos[0]->id_nivel_economico}});
            $("#trabaja").val({{$datos[0]->trabaja}});
            $("#beca").val({{$datos[0]->beca}});
            $("#estado").val({{$datos[0]->estado}});
            $("#turno").val({{$datos[0]->turno}});

            $("#bachillerato").val({{$datos[1]->id_bachillerato}});
            $("#cb").val({{$datos[1]->años_curso_bachillerato}});
            $("#oti").val({{$datos[1]->otra_carrera_ini}});
            $("#SC").val({{$datos[1]->semestres_cursados}});
            $("#ie").val({{$datos[1]->interrupciones_estudios}});
            $("#ov").val({{$datos[1]->otras_opciones_vocales}});
            $("#cae").val({{$datos[1]->tegusta_carrera_elegida}});
            $("#tefe").val({{$datos[1]->teestimula_familia}});
            $("#sus").val({{$datos[1]->suspension_estudios_bachillerato}});

            $("#av").val({{$datos[2]->vivienda_actual}});
            $("#etnia").val({{$datos[2]->etnia_indigena}});
            $("#hablas").val({{$datos[2]->hablas_lengua_indigena}});
            $("#consideras").val({{$datos[2]->id_consideras_familia}});

            $("#tiempo").val({{$datos[3]->tiempo_empelado_estudiar}});
            $("#fti").val({{$datos[3]->id_forma_trabajo}});

            $("#depo").val({{$datos[4]->practica_deporte}});
            $("#artistica").val({{$datos[4]->practica_artistica}});
            $("#actC").val({{$datos[4]->actividades_culturales}});
            $("#estSalud").val({{$datos[4]->estado_salud}});
            $("#enferCron").val({{$datos[4]->enfermedad_cronica}});
            $("#EnfPa").val({{$datos[4]->enf_cron_padre}});
            $("#operacion").val({{$datos[4]->operacion}});
            $("#lentes").val({{$datos[4]->usas_lentes}});
            $("#EnVisual").val({{$datos[4]->enfer_visual}});
            $("#mediContro").val({{$datos[4]->medicamento_controlado}});
            $("#accidente").val({{$datos[4]->accidente_grave}});

            $("#rendEsco").val({{$datos[5]->rendimiento_escolar}});
            $("#dominio").val({{$datos[5]->dominio_idioma}});
            $("#otro").val({{$datos[5]->otro_idioma}});
            $("#conComp").val({{$datos[5]->conocimiento_compu}});
            $("#aptitudes").val({{$datos[5]->aptitud_especial}});
            $("#comprension").val({{$datos[5]->comprension}});
            $("#preparacion").val({{$datos[5]->preparacion}});
            $("#estrategias").val({{$datos[5]->estrategias_aprendizaje}});
            $("#actEst").val({{$datos[5]->organizacion_actividades}});
            $("#concentracion").val({{$datos[5]->concentracion}});
            $("#solucion").val({{$datos[5]->solucion_problemas}});
            $("#condiciones").val({{$datos[5]->condiciones_ambientales}});
            $("#bibliografica").val({{$datos[5]->busqueda_bibliografica}});
            $("#equipo").val({{$datos[5]->trabajo_equipo}});
            @endif
        }else{
            $('#ocupacion').hide();
            $('#otiOc').hide();
            $('#tbeca').hide();
            $('#razones').hide();
            $('#cuales').hide();
            $('#pq').hide();
            $('#razonesSus').hide();
            $('#cualetnia').hide();
            $('#especifica1').hide();
            $('#especifica2').hide();
            $('#cualesAc').hide();
            $('#especificarEnf').hide();
            $('#especificarEnfPa').hide();
            $('#especificarOpe').hide();
            $('#especificarEnVisual').hide();
            $('#especificarMed').hide();
            $('#relata').hide();
        }
    });

</script>

