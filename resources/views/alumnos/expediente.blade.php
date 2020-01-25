@extends('layouts.app')
@section('content')


<link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">

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
        <div class="row" id='cont-preg'>
            <div class="col-12">
                <form id="form-expe">
                    {{ csrf_field() }}
                <div class="tab-content text-justify" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab">
                        <div class="card" >
                            <div class="row pt-3 pr-3 pl-3">
                                <div class=" col-12 align-content-center">
                                    <h4 class="text-center alert alert-primary pt-4"><b>Datos Generales</b></h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="carrera">Carrera</label>
                                        <select name="carrera" id="carrera" value="{{isset($datos[0])?$datos[0]->id_carrera:''}}" class="custom-select custom-select-md">
                                            <option value="" >Elija una Carrera</option>
                                            @foreach ($carreras as $dato)
                                                <option value="{{$dato->id_carrera}}" >{{$dato->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="periodo">Periodo</label>
                                        <select name="periodo" id="periodo" value="{{isset($datos[0])?$datos[0]->id_periodo:''}}" class="custom-select custom-select-md">
                                            <option value="" selected>Elija un Periodo</option>
                                            @foreach ($periodos as $dato)
                                                <option value="{{$dato->id_periodo}}" >{{$dato->periodo}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="grupo">Grupo</label>
                                        <select name="grupo" id="grupo" value="{{isset($datos[0])?$datos[0]->id_grupo:''}}" class="custom-select custom-select-md">
                                            <option value="" selected>Elija un Grupo</option>
                                            @foreach ($grupos as $dato)
                                                <option value="{{$dato->id_grupo}}" >{{$dato->grupo}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" id="nombre" name="nombre" value="{{isset($datos[0])?$datos[0]->nombre:Session::get('alumno')}}" class="form-control" placeholder="Nombre">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="edad">Edad</label>
                                        <input type="text" class="form-control" value="{{isset($datos[0])?$datos[0]->edad:''}}" id="edad" name="edad" placeholder="Edad">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="sexo">Sexo</label>
                                        <select name="sexo" id="sexo"  class="custom-select custom-select-md">
                                            <option value="" selected>Elija un Sexo</option>
                                            <option value="M">Masculino</option>
                                            <option value="F">Femenino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="fn">Fecha de Nacimiento</label>
                                        <input type="date" value="{{isset($datos[0])?$datos[0]->fecha_nacimientos:''}}" id="fn" name="fecha_nacimientos" class="form-control" placeholder="Fecha de Nacimiento">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="ln">Lugar de Nacimiento</label>
                                        <input type="text" id="ln" value="{{isset($datos[0])?$datos[0]->lugar_nacimientos:''}}" name="lugar_nacimientos" class="form-control" placeholder="Lugar de Nacimiento">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="semestre">Semestre</label>
                                        <select name="semestre" id="semestre" class="custom-select custom-select-md">
                                            <option value="" selected>Elija un Semestre</option>
                                            @foreach ($semestres as $dato)
                                                <option value="{{$dato->id_semestre}}" >{{$dato->descripcion}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="EC">Estado Civil</label>
                                        <select name="estado_civil" id="EC" class="custom-select custom-select-md">
                                            <option value="" selected >Elija el estado civil</option>
                                            @foreach ($estadocivil as $dato)
                                                <option value="{{$dato->id_estado_civil}}" >{{$dato->desc_ec}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="nh">No. Hijos</label>
                                        <input type="text" value="{{isset($datos[0])?$datos[0]->no_hijos:''}}" id="nh" name="no_hijos" class="form-control" placeholder="No. Hijos">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="direccion">Dirección</label>
                                        <input type="text" value="{{isset($datos[0])?$datos[0]->direccion:''}}" id="direccion" name="direccion" class="form-control" placeholder="Dirección">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="correo">Correo</label>
                                        <input type="text" value="{{isset($datos[0])?$datos[0]->correo:''}}" id="correo" name="correo" class="form-control" placeholder="Correo">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tel-casa">Tel. Casa</label>
                                        <input type="text" value="{{isset($datos[0])?$datos[0]->tel_casa:''}}" id="tel-casa" name="tel_casa" class="form-control" placeholder="Tel. Casa">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="cel">Celular</label>
                                        <input type="text" value="{{isset($datos[0])?$datos[0]->cel:''}}" id="cel" name="cel" class="form-control" placeholder="Cel">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="NSE">Nivel Socio-Económico</label>
                                        <select name="nivel_socioeconomico" id="NSE" class="custom-select custom-select-md">
                                            <option value="" >Elija el nivel Socio-económico</option>
                                            @foreach ($niveleconomico as $dato)
                                                <option value="{{$dato->id_nivel_economico}}" >{{$dato->desc_opc}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="poblacion">Población</label>
                                        <select name="poblacion" id="poblacion" class="custom-select custom-select-md">
                                            <option value="" selected>Elija Opción</option>
                                            <option value="1">Rural</option>
                                            <option value="2">Urbana</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
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
                                        <input type="text" value="{{isset($datos[0])?$datos[0]->ocupacion:''}}" name="ocupacion" class="form-control" placeholder="Ocupación">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="horario">Horario</label>
                                        <input type="text" value="{{isset($datos[0])?$datos[0]->horario:''}}" id="horario" name="horario" class="form-control" placeholder="Horario">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="noC">No. Cuenta</label>
                                        <input type="text" id="noC"  name="no_cuenta" class="form-control" value="{{isset($datos[0])?$datos[0]->no_cuenta:Session::get('cuenta')}}" placeholder="No. Cuenta">
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
                                        <input type="text" value="{{isset($datos[0])?$datos[0]->tipo_beca:''}}"  name="tbeca" class="form-control" placeholder="Tipo Beca">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="ant_inst">Antecedentes institucionales</label>
                                        <select name="ant_inst" id="ant_inst" class="custom-select custom-select-md">
                                            <option value="" selected>Elija Opción</option>
                                            <option value="1">Continuación de estudios</option>
                                            <option value="2">Cambio de carrera/institucion</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="satisfaccion_c">Nivel de satisfacción con la carrera</label>
                                        <select name="satisfaccion_c" id="satisfaccion_c" class="custom-select custom-select-md">
                                            <option value="" selected>Elija Opción</option>
                                            <option value="1">Muy satisfecho</option>
                                            <option value="2">Satisfecho</option>
                                            <option value="3">Regular</option>
                                            <option value="4">Inconforme</option>
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
                                    <div class="col-md-6">
                                        <label for="estado">Estado</label>
                                        <select id="estado" name="estado" class="custom-select custom-select-md">
                                            <option value="" selected>Elija estado académico</option>
                                            <option value="1">Regular</option>
                                            <option value="2">Inrregular</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="turno">Turno</label>
                                        <select name="turno" id="turno" class="custom-select custom-select-md">
                                            <option value="" selected>Elija Turno</option>
                                            @foreach ($turno as $dato)
                                                <option value="{{$dato->id_turno}}" >{{$dato->descripcion_turno}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-primary text-white" id="siguiente1">Siguiente</a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-antecedentes" role="tabpanel" aria-labelledby="v-pills-antecedentes-tab">
                        <div class="card" >
                            <div class="row pt-3 pr-3 pl-3">
                                <div class=" col-12 align-content-center">
                                    <h4 class="text-center alert alert-primary pt-4"><b>Antecedentes Académicos</b></h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="bachillerato">Bachillerato</label>
                                        <select name="bachillerato" id="bachillerato" class="custom-select custom-select-md">
                                            <option value="" selected>Elija Bachillerato</option>
                                            @foreach ($bachillerato as $dato)
                                                <option value="{{$dato->id_bachillerato}}" >{{$dato->desc_bachillerato}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="oe">Otros Estudios</label>
                                        <input name="otro_estudio" value="{{isset($datos[1])?$datos[1]->otros_estudios:''}}" id="oe" class="form-control" placeholder="Otros Estudios">
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
                                        <input type="text" value="{{isset($datos[1])?$datos[1]->ano_terminacion:''}}" name="ano_terminacion" id="at" class="form-control" placeholder="Año Ternimación">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="epro">Escuela de Procedencia</label>
                                        <input type="text" value="{{isset($datos[1])?$datos[1]->escuela_procedente:''}}" class="form-control" id="epro" name="escuela_procedencia" placeholder="Escuela de Procedencia">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="promedio">Promedio</label>
                                        <input name="promedio" value="{{isset($datos[1])?$datos[1]->promedio:''}}" id="promedio" class="form-control" placeholder="Promedio">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="mrb">Materias reprobadas en bachillerato</label>
                                        <input type="text" value="{{isset($datos[1])?$datos[1]->materias_reprobadas:''}}" id="mrb" name="materias_reprobadas" class="form-control" placeholder="Materias reprobadas en bachillerato">
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
                                        <input name="institucion" value="{{isset($datos[1])?$datos[1]->institucion:''}}" id="institucion" class="form-control" placeholder="Institución">
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
                                        <input type="text" value="{{isset($datos[1])?$datos[1]->razon_descide_estudiar_tesvb:''}}" id="rde" name="razon_decide_estudiar_tesvb" class="form-control" placeholder="Cuál fue la razón por la que decidiste estudiar en el TESVB">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="perfil">Tienes información sobre el perfil profesional de la carrera</label>
                                        <input type="text" value="{{isset($datos[1])?$datos[1]->sabedel_perfil_profesional:''}}" id="perfil" name="perfil" class="form-control" placeholder="Tienes información sobre el perfil profesional de la carrera">
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
                                        <input type="text" value="{{isset($datos[1])?$datos[1]->razones_interrupcion:''}}" id="razones" name="razones_interrupcion" class="form-control" placeholder="Razones">
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
                                        <input name="cuales" value="{{isset($datos[1])?$datos[1]->cuales_otras_opciones_vocales:''}}" class="form-control" placeholder="¿Cuales?">
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
                                        <input type="text" value="{{isset($datos[1])?$datos[1]->porque_carrera_elegida:''}}" name="pq" class="form-control" placeholder="¿Por qué?">
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
                                        <input type="text" value="{{isset($datos[1])?$datos[1]->razones_suspension_estudios:''}}" name="razonesSus" class="form-control" placeholder="Razones">
                                    </div>
                                </div>

                            </div>
                            <a class="btn btn-primary text-white" id="siguiente2">Siguiente</a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-familiares" role="tabpanel" aria-labelledby="v-pills-familiares-tab">
                        <div class="card" >
                            <div class="row pt-3 pr-3 pl-3">
                                <div class=" col-12 align-content-center">
                                    <h4 class="text-center alert alert-primary pt-4"><b>Datos Familiares</b></h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="np">Nombre del Padre</label>
                                        <input name="nombre_padre" value="{{isset($datos[2])?$datos[2]->nombre_padre:''}}" id="np" type="text" class="form-control" placeholder="Nombre del Padre">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="edadP">Edad</label>
                                        <input type="text" value="{{isset($datos[2])?$datos[2]->edad_padre:''}}" name="edad_padre" id="edadP" class="form-control" placeholder="Edad">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="ocupacionP">Ocupación</label>
                                        <input name="ocupacion_padre" value="{{isset($datos[2])?$datos[2]->ocupacion_padre:''}}" id="ocupacionP" type="text" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="LRP">Lugar de Residencia</label>
                                        <input value="{{isset($datos[2])?$datos[2]->lugar_residencia_padre:''}}" name="lugar_residencia_padre" id="LRP" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="nm">Nombre del Madre</label>
                                        <input type="text" value="{{isset($datos[2])?$datos[2]->nombre_madre:''}}" name="nombre_madre" id="nm" class="form-control" placeholder="Nombre del Madre">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="edadM">Edad</label>
                                        <input type="text" value="{{isset($datos[2])?$datos[2]->edad_madre:''}}" name="edad_madre" id="edadM" class="form-control" placeholder="Edad">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="ocupacionM">Ocupación</label>
                                        <input id="ocupacionM" value="{{isset($datos[2])?$datos[2]->ocupacion_madre:''}}" name="ocupacion_madre" type="text" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="LRM">Lugar de Residencia</label>
                                        <input id="LRM" value="{{isset($datos[2])?$datos[2]->lugar_residencia_madre:''}}" name="lugar_residencia_madre" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="nh">No. de Hermanos</label>
                                        <input type="text" value="{{isset($datos[2])?$datos[2]->no_hermanos:''}}" id="nh" name="no_hermanos" class="form-control" placeholder="No. de Hermanos">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="loe">Lugar que ocupas entre ellos</label>
                                        <input type="text" value="{{isset($datos[2])?$datos[2]->lugar_ocupas:''}}" id="loe" name="lugar_que_ocupas" class="form-control" placeholder="Lugar que ocupas entre ellos">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="av">Actualmente vives</label>
                                        <select name="actualmente_vives" id="av" class="custom-select custom-select-md">
                                            <option value="" selected>Elija una Opción</option>
                                            @foreach ($vive as $dato)
                                                <option value="{{$dato->id_opc_vives}}" >{{$dato->desc_opc}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="nop">No. de personas</label>
                                        <input type="text" value="{{isset($datos[2])?$datos[2]->no_personas:''}}" name="no_persona" id="nop" class="form-control" placeholder="No. de personas">
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
                                        <input type="text" value="{{isset($datos[2])?$datos[2]->cual_etnia:''}}" name="cual_etnia" class="form-control" placeholder="¿Cual?">
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
                                        <input type="text" value="{{isset($datos[2])?$datos[2]->sostiene_economia_hogar:''}}" id="sostiene" name="sosten_hogar" class="form-control" placeholder="¿Quién sostiene económicamente tu hogar?">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="consideras">Consideras a tu familia</label>
                                        <select id="consideras" name="consideras_a_familia" class="custom-select custom-select-md">
                                            <option value="" selected>Elija una Opción</option>
                                            @foreach ($familiaunion as $dato)
                                                <option value="{{$dato->id_familia_union}}" >{{$dato->desc_union}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="nt">Nombre del Tutor</label>
                                        <input type="text" value="{{isset($datos[2])?$datos[2]->nombre_tutor:''}}" name="nombre_tutor" id="nt" class="form-control" placeholder="Nombre del Tutor">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="parentesco">Parentesco</label>
                                        <select name="parentesco" id="parentesco" class="custom-select custom-select-md">
                                            <option value="">Elija un parentesco</option>
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
                            <div class="row pt-3 pr-3 pl-3">
                                <div class=" col-12 align-content-center">
                                    <h4 class="text-center alert alert-primary pt-4"><b>Habitos de Estudio</b></h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="tiempo">Tiempo dedicado a estudiar diariamente fuera de clase</label>
                                        <select name="tiempo_empleado_estudiar" id="tiempo" type="text" class="custom-select custom-select-md">
                                            <option value="" selected>Elija una Opción</option>
                                            @foreach ($tiempoestudia as $dato)
                                                <option value="{{$dato->id_tiempoestudia}}" >{{$dato->descripcion_tiempo}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="fti">¿Cómo es tú forma de trabajo intelectual?</label>
                                        <select  id="fti" name="forma_trabajo" type="text" class="custom-select custom-select-md">
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
                                        <input name="forma_estudio" value="{{isset($datos[3])?$datos[3]->forma_estudio:''}}" id="formaes" type="text" class="form-control" placeholder="Tu forma de estudio mas utilizada">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="empleas">¿Cómo empleas tu tiempo libre?</label>
                                        <input type="text" value="{{isset($datos[3])?$datos[3]->tiempo_libre:''}}" name="tiempo_libre" id="empleas" class="form-control" placeholder="¿Cómo empleas tu tiempo libre?">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="asignap">Asignaturas preferidas</label>
                                        <input type="text" value="{{isset($datos[3])?$datos[3]->asignatura_preferida:''}}" name="asigna_preferida" id="asignap" class="form-control" placeholder="Asignaturas preferidas">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="pqap">¿Por qué?</label>
                                        <input name="porque_asignatura" value="{{isset($datos[3])?$datos[3]->porque_asignatura:''}}" id="pqap" type="text" class="form-control" placeholder="¿Por qué?">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="asigdif">Asignaturas que te han sido difíciles</label>
                                        <input type="text" value="{{isset($datos[3])?$datos[3]->asignatura_dificil:''}}" id="asigdif" name="asignatura_dificil" class="form-control" placeholder="Asignaturas que te han sido difíciles">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="pqdifi">¿Por qué?</label>
                                        <input name="porque_asignatura_dificil" value="{{isset($datos[3])?$datos[3]->porque_asignatura_dificil:''}}" id="pqdifi" type="text" class="form-control" placeholder="¿Por qué?">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="qopin">¿Qué opinión tienes de ti mismo como estudiante?</label>
                                        <input type="text" value="{{isset($datos[3])?$datos[3]->opinion_tu_mismo_estudiante:''}}" name="opinion_tu_mismo_estudiante" id="qopin" placeholder="¿Qué opinión tienes de ti mismo como estudiante?" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-primary text-white" id="siguiente4">Siguiente</a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-formacion" role="tabpanel" aria-labelledby="v-pills-formacion-tab">
                        <div class="card" >
                            <div class="row pt-3 pr-3 pl-3">
                                <div class=" col-12 align-content-center">
                                    <h4 class="text-center alert alert-primary pt-4"><b>Formación Integral/Salud</b></h4>
                                </div>
                            </div>
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
                                        <input type="text" value="{{isset($datos[4])?$datos[4]->especifica_deporte:''}}" placeholder="Especifica" name="especifica1" id="especifica1" class="form-control" >
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
                                        <input type="text" value="{{isset($datos[4])?$datos[4]->especifica_artistica:''}}" placeholder="Especifica" name="especifica2" class="form-control" >
                                    </div>
                                    <div class="col-md-4">
                                        <label for="escala">¿Ingiere bebidas alcoholicas?</label>
                                        <select name="id_expbebidas" id="id_expbebidas" class="custom-select custom-select-md">
                                            <option value="" selected>Elija una Opción</option>
                                            @foreach ($bebidas as $dato)
                                                <option value="{{$dato->id_expbebidas}}" >{{$dato->descripcion_bebida}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="pasatiempo">Tu pasatiempo favorito</label>
                                        <input  name="pasatiempo" value="{{isset($datos[4])?$datos[4]->pasatiempo:''}}" id="pasatiempo" placeholder="Pasatiempo" class="form-control">
                                    </div>
                                    <div class="col-md-4">
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
                                        <input type="text" value="{{isset($datos[4])?$datos[4]->cuales_act:''}}" name="cualesAc" class="form-control" placeholder="Cuáles">
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
                                        <input type="text" value="{{isset($datos[4])?$datos[4]->especifica_enf_cron:''}}" name="especificarEnf" class="form-control" placeholder="Especificar">
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
                                        <input type="text" value="{{isset($datos[4])?$datos[4]->especifica_enf_cron_padres:''}}" name="especificarEnfPa" class="form-control" placeholder="Especificar">
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
                                        <input type="text" value="{{isset($datos[4])?$datos[4]->deque_operacion:''}}" id="especificarOpe" name="especificarOpe" class="form-control" placeholder="Especificar">
                                    </div>
                                </div>
                                <div class="row">
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
                                        <input type="text" value="{{isset($datos[4])?$datos[4]->especifica_enf:''}}" name="especificarEnVisual" class="form-control" placeholder="Especificar">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lentes">¿Usas lentes?</label>
                                        <select name="lentes" id="lentes" class="custom-select custom-select-md">
                                            <option value="" selected>Elija una Opción</option>
                                            <option value="1">Si</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="estatura">Estatura</label>
                                        <input name="estatura" value="{{isset($datos[4])?$datos[4]->estatura:''}}" id="estatura" type="text" placeholder="Estatura" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="peso">Peso</label>
                                        <input type="text" value="{{isset($datos[4])?$datos[4]->peso:''}}" id="peso" name="peso" class="form-control" placeholder="Peso">
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
                                        <input type="text" value="{{isset($datos[4])?$datos[4]->especifica_medicamento:''}}" name="especificarMed" class="form-control" placeholder="Especificar">
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
                                        <input type="text" value="{{isset($datos[4])?$datos[4]->relata_breve:''}}" name="relata" class="form-control" placeholder="Relata">
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-primary text-white" id="siguiente5">Siguiente</a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-area" role="tabpanel" aria-labelledby="v-pills-area-tab">
                        <div class="card" >
                            <div class="row pt-3 pr-3 pl-3">
                                <div class=" col-12 align-content-center">
                                    <h4 class="text-center alert alert-primary pt-4"><b>Área Psicopedagogica</b></h4>
                                </div>
                            </div>
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
                            @if ($datos)
                                <a class="btn btn-success" href="panel" id="update">Actualizar Datos</a>

                            @else
                                <a class="btn btn-primary"  id="final">Guardar Datos</a>
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

       // $( "#fn" ).datepicker({
            //changeYear: true
        //});

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
            //var arr=$('#form-expe').serializeArray();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "Alum",
                method: "POST",
                dataType: 'html',
                data:datos,
                success:function(respuesta){
                    location.href="/panel";
                }
            });


            //}
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
            $("#fn").val({{$datos[0]->fecha_nacimientos}});
            $("#semestre").val({{$datos[0]->id_semestre}});
            $("#EC").val({{$datos[0]->id_estado_civil}});
            $("#NSE").val({{$datos[0]->id_nivel_economico}});
            $("#trabaja").val({{$datos[0]->trabaja}});
            $("#noC").val({{$datos[0]->no_cuenta}});
            $("#beca").val({{$datos[0]->beca}});
            $("#estado").val({{$datos[0]->estado}});
            $("#turno").val({{$datos[0]->turno}});
            $("#poblacion").val({{$datos[0]->poblacion}});
            $("#ant_inst").val({{$datos[0]->ant_inst}});
            $("#satisfaccion_c").val({{$datos[0]->satisfaccion_c}});
            $("#materias_repeticion").val({{$datos[0]->materias_repeticion}});
            $("#tot_repe").val({{$datos[0]->tot_repe}});
            $("#materias_especial").val({{$datos[0]->materias_especial}});
            $("#tot_espe").val({{$datos[0]->tot_espe}});
            $("#gen_espe").val({{$datos[0]->gen_espe}});

            $("#bachillerato").val({{$datos[1]->id_bachillerato}});
            $("#cb").val({{$datos[1]->anos_curso_bachillerato}});
            $("#oti").val({{$datos[1]->otra_carrera_ini}});
            $("#SC").val({{$datos[1]->semestres_cursados}});
            $("#ie").val({{$datos[1]->interrupciones_estudios}});
            $("#ov").val({{$datos[1]->otras_opciones_vocales}});
            $("#cae").val({{$datos[1]->tegusta_carrera_elegida}});
            $("#tefe").val({{$datos[1]->teestimula_familia}});
            $("#sus").val({{$datos[1]->suspension_estudios_bachillerato}});

            $("#av").val({{$datos[2]->id_opc_vives}});
            $("#etnia").val({{$datos[2]->etnia_indigena}});
            $("#hablas").val({{$datos[2]->hablas_lengua_indigena}});
            $("#parentesco").val({{$datos[2]->id_parentesco}});
            $("#consideras").val({{$datos[2]->id_familia_union}});

            $("#tiempo").val({{$datos[3]->tiempo_empelado_estudiar}});
            $("#fti").val({{$datos[3]->id_opc_intelectual}});

            $("#depo").val({{$datos[4]->practica_deporte}});
            $("#artistica").val({{$datos[4]->practica_artistica}});
            $("#id_expbebidas").val({{$datos[4]->id_expbebidas}});
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
        }

        else{

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

