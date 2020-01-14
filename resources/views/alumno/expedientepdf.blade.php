<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Expediente</title>
    <style>
        h3{
            text-align: center;
            text-transform: uppercase;
        }
        .contenido{
            font-size: 12px;
        }
        #primero{
            background-color: #ccc;
        }
        #segundo{
            color:#44a359;
        }
        #tercero{
            text-decoration:line-through;
        }
    </style>
</head>
<body>
<h3>EXPEDIENTE ACADÉMICO</h3>
<hr>
<div class="contenido">
    <table class="table" id="Table" border="1" cellpadding="0" cellspacing="0" width="100%">
        <thead>
        <tr>
            <td scope="col" colspan="12" align="center" style="background: #e0e0e0">DATOS GENERALES</td>
        </tr>
            <tr>

                <td scope="col" colspan="2">Carrera:</td>
                <td scope="col" colspan="5" rowspan="1">{{$datos->exp_generales[0]->carrera[0]->nombre}}</td>
                <td scope="col">Periodo:</td>
                <td scope="col" colspan="2">{{$datos->exp_generales[0]->periodo[0]->periodo}}</td>
                <td scope="col">Grupo:</td>
                <td scope="col">{{$datos->exp_generales[0]->grupo[0]->grupo}}</td>
            </tr>
            <tr>

                <td scope="col">Nombre:</td>
                <td scope="col" colspan="6">{{$datos->exp_generales[0]->nombre}}</td>
                <td scope="col" colspan="2">Edad:</td>
                <td scope="col"colspan="">{{$datos->exp_generales[0]->edad}}</td>
                <td scope="col">Sexo:</td>
                <td scope="col"colspan="">{{$datos->exp_generales[0]->sexo==1?"Masculino":"Femenino"}}</td>
             </tr>
            <tr>

                <td scope="col" colspan="2">Fecha nacimiento:</td>
                <td scope="col" colspan="2">{{$datos->exp_generales[0]->fecha_nacimientos}}</td>
                <td scope="col" colspan="3">Lugar de nacimiento: </td>
                <td scope="col" colspan="3">{{$datos->exp_generales[0]->lugar_nacimientos}}</td>
                <td scope="col">Semestre: </td>
                <td scope="col">{{$datos->exp_generales[0]->semestre[0]->descripcion}}</td>

            </tr>
            <tr>
                <td scope="col" colspan="2">Estado Civil: </td>
                <td scope="col" colspan="3">{{$datos->exp_generales[0]->civil[0]->desc_ec}}</td>
                <td scope="col">Dirección: </td>
                <td scope="col" colspan="6" rowspan="2">{{$datos->exp_generales[0]->direccion}}</td>
            </tr>
            <tr>

                <td scope="col">E-mail: </td>
                <td scope="col" colspan="5">{{$datos->exp_generales[0]->correo}}</td>

            </tr>
            <tr>

                <td scope="col" colspan="2">Tel. Casa: </td>
                <td scope="col" colspan="3">{{$datos->exp_generales[0]->tel_casa}}</td>
                <td scope="col" colspan="1">Cel:</td>
                <td scope="col" colspan="2">{{$datos->exp_generales[0]->cel}}</td>
                <td scope="col" colspan="3">Nivel Socio-económico: </td>
                <td scope="col">{{$datos->exp_generales[0]->nivel[0]->desc_opc}}</td>

            </tr>
            <tr>
                <td scope="col">¿Trabaja?:</td>
                <td scope="col">{{$datos->exp_generales[0]->trabaja==1?"Si":"No"}}</td>
                <td scope="col" colspan="2">Ocupación: </td>
                <td scope="col" colspan="5">{{$datos->exp_generales[0]->ocupacion}}</td>
                <td scope="col">Horario: </td>
                <td scope="col" colspan="2">{{$datos->exp_generales[0]->horario}}</td>


            </tr>
            <tr>
                <td scope="col">No Cuenta: </td>
                <td scope="col">{{$datos->exp_generales[0]->no_cuenta}}</td>
                <td scope="col">Beca: </td>
                <td scope="col"> {{$datos->exp_generales[0]->beca==1?"Si":"No"}}</td>
                <td scope="col">Tipo beca: </td>
                <td scope="col" colspan="3">{{$datos->exp_generales[0]->tipo_beca}}</td>
                <td scope="col">Estado: </td>
                <td scope="col">{{$datos->exp_generales[0]->estado==1?"Regular":"Irregular"}}</td>
                <td scope="col">Turno: </td>
                <td scope="col">{{$datos->exp_generales[0]->turno}}</td>

            </tr>
            <tr>
                <td scope="col" colspan="12" align="center" style="background: #e0e0e0">ANTECEDENTES ACADEMICOS</td>
            </tr>

            <tr>

                <td scope="col">Bachillerato:</td>
                <td scope="col">{{$datos->exp_antecedentes_academicos[0]->bachillerato[0]->desc_bachillerato}}</td>
                <td scope="col" colspan="3">Otros estudios: </td>
                <td scope="col">{{$datos->exp_antecedentes_academicos[0]->otros_estudios}}</td>
                <td scope="col" colspan="3">Años en que curso el bachillerato: </td>
                <td scope="col">{{$datos->exp_antecedentes_academicos[0]->anos_curso_bachillerato}}</td>
                <td scope="col">Año de terminación: </td>
                <td scope="col" colspan="0.5">{{$datos->exp_antecedentes_academicos[0]->ano_terminacion}}</td>
            </tr>
            <tr>
                <td scope="col" colspan="3">Escuela Procedente:</td>
                <td scope="col" colspan="7">{{$datos->exp_antecedentes_academicos[0]->escuela_procedente}}</td>
                <td scope="col">Promedio: </td>
                <td scope="col">{{$datos->exp_antecedentes_academicos[0]->promedio}}</td>
            </tr>
        <tr>
            <td scope="col" colspan="3">Materias reprobadas en bach: </td>
            <td scope="col" colspan="9">{{$datos->exp_antecedentes_academicos[0]->materias_reprobadas}}</td>
        </tr>
        <tr>
            <td scope="col" colspan="3">Otra carrera iniciada: </td>
            <td scope="col">{{$datos->exp_antecedentes_academicos[0]->otra_carrera}}</td>
            <td scope="col">Institución: </td>
            <td scope="col" colspan="4">{{$datos->exp_antecedentes_academicos[0]->institucion}}</td>
            <td scope="col" colspan="2">Semestres cursados: </td>
            <td scope="col">{{$datos->exp_antecedentes_academicos[0]->semestres_cursados}}</td>
        </tr>
            <tr>
                <td scope="col" colspan="3">Interrupciones en los estudios: </td>
                <td scope="col">{{$datos->exp_antecedentes_academicos[0]->interrupciones_estudios==1?"Si":"No"}}</td>
                <td scope="col">Razones: </td>
                <td scope="col" colspan="7">{{$datos->exp_antecedentes_academicos[0]->razones_interrupcion}}</td>
            </tr>
            <tr>
                <td scope="col" colspan="4" >¿Cuál fue la razón por la que decidiste estudiar en el TESVB?: </td>
                <td scope="col" colspan="8"> {{$datos->exp_antecedentes_academicos[0]->razon_descide_estudiar_tesvb}}</td>
            </tr>
            <tr>
                <td scope="col" colspan="5">¿Tienes información sobre el perfil profesional de la carrera?: </td>
                <td scope="col" colspan="7">{{$datos->exp_antecedentes_academicos[0]->sabedel_perfil_profesional}}</td>
            </tr>
            <tr>
                <td scope="col" colspan="6">¿Tuviste otras opciones vocacionales o preferencias por otras carreras?:</td>
                <td scope="col">{{$datos->exp_antecedentes_academicos[0]->otras_opciones_vocales==1?"Si":"No"}}</td>
                <td scope="col">¿Cuáles?: </td>
                <td scope="col" colspan="4">{{$datos->exp_antecedentes_academicos[0]->cuales_otras_opciones_vocales}}</td>
            </tr>
            <tr>
                <td scope="col" colspan="3">¿Te gusta la carrera elegida?: </td>
                <td scope="col">¿{{$datos->exp_antecedentes_academicos[0]->tegusta_carrera_elegida==1?"Si":"No"}}</td>
                <td scope="col">¿Por qué?: </td>
                <td scope="col" colspan="7">{{$datos->exp_antecedentes_academicos[0]->porque_carrera_elegida}}</td>
            </tr>
            <tr>
                <td scope="col" colspan="6">Suspensión de estudios después de terminado el bachillerato:</td>
                <td scope="col">{{$datos->exp_antecedentes_academicos[0]->suspension_estudios_bachillerato==1?"Si":"No"}}</td>
                <td scope="col">Razones: </td>
                <td scope="col" colspan="4">{{$datos->exp_antecedentes_academicos[0]->razones_suspension_estudios}}</td>
            </tr>
            <tr>
                <td scope="col" colspan="4">¿Te estimula tu familia en tus estudios?: </td>
                <td scope="col" colspan="8"> {{$datos->exp_antecedentes_academicos[0]->teestimula_familia==1?"Si":"No"}}</td>
            </tr>
            <tr>
                <td scope="col" colspan="12" align="center" style="background: #e0e0e0">DATOS FAMILIARES</td>
            </tr>
            <tr>
                <td scope="col" colspan="2">Nombre del padre: </td>
                <td scope="col" colspan="8">{{$datos->exp_datos_familiares[0]->nombre_padre}}</td>
                <td scope="col" >Edad: </td>
                <td scope="col" >{{$datos->exp_datos_familiares[0]->edad_padre}}</td>
            </tr>
            <tr>
                <td scope="col">Ocupación: </td>
                <td scope="col" colspan="4"> {{$datos->exp_datos_familiares[0]->ocupacion_padre}}</td>
                <td scope="col" colspan="3">Lugar de Residencia: </td>
                <td scope="col" colspan="4">{{$datos->exp_datos_familiares[0]->lugar_residencia_padre}}</td>
            </tr>
            <tr>
                <td scope="col" colspan="2">Nombre de la madre: </td>
                <td scope="col" colspan="8">{{$datos->exp_datos_familiares[0]->nombre_madre}}</td>
                <td scope="col" >Edad: </td>
                <td scope="col"> {{$datos->exp_datos_familiares[0]->edad_madre}}</td>
            </tr>
            <tr>
                <td scope="col">Ocupación: </td>
                <td scope="col" colspan="4">{{$datos->exp_datos_familiares[0]->ocupacion_madre}}</td>
                <td scope="col" colspan="3">Lugar de Residencia: </td>
                <td scope="col" colspan="4">{{$datos->exp_datos_familiares[0]->lugar_residencia_madre}}</td>
            </tr>
            <tr>
                <td scope="col" colspan="">No. Hermanos: </td>
                <td scope="col"> {{$datos->exp_datos_familiares[0]->no_hermanos}}</td>
                <td scope="col" colspan="3">Lugar que ocupas entre ellos: </td>
                <td scope="col">{{$datos->exp_datos_familiares[0]->lugar_ocupas}}</td>
                <td scope="col" colspan="3">En el estado de México vives: </td>
                <td scope="col">{{$datos->exp_datos_familiares[0]->vives[0]->desc_opc}}</td>
                <td scope="col">No. de personas: </td>
                <td scope="col">{{$datos->exp_datos_familiares[0]->no_personas}}</td>
            </tr>
            <tr>
                <td scope="col" colspan="4">¿Quién sostiene económicamente tu hogar?: </td>
                <td scope="col">{{$datos->exp_datos_familiares[0]->sostiene_economia_hogar}}</td>
                <td scope="col" colspan="3">Consideras a tu familia: </td>
                <td scope="col" colspan="4">{{$datos->exp_datos_familiares[0]->union[0]->desc_union}}</td>
            </tr>
            <tr>
                <td scope="col" colspan="2">Nombre del Tutor: </td>
                <td scope="col" colspan="7">{{$datos->exp_datos_familiares[0]->nombre_tutor}}</td>
                <td scope="col">Parentesco: </td>
                <td scope="col" colspan="2"> {{$datos->exp_datos_familiares[0]->parentesco[0]->desc_parentesco}}</td>
            </tr>
            <tr>
                <td scope="col" colspan="12" align="center" style="background: #e0e0e0">HÁBITOS DE ESTUDIO</td>
            </tr>
            <tr>
                <td scope="col" colspan="5">Tiempo dedicado a estudiar diariamente fuera de clase: </td>
                <td scope="col">{{$datos->exp_habitos_estudio[0]->tiempo[0]->tiempo_empelado_estudiar}}</td>
                <td scope="col" colspan="5">¿Cómo es tú forma de trabajo intelectual?: </td>
                <td scope="col" colspan="">{{$datos->exp_habitos_estudio[0]->intelectual[0]->desc_opc}}</td>
            </tr>
            <tr>
                <td scope="col" colspan="4">Tu forma de estudio mas utilizada: </td>
                <td scope="col" colspan="8">{{$datos->exp_habitos_estudio[0]->forma_estudio}}</td>
            </tr>
            <tr>
                <td scope="col" colspan="4">¿Cómo empleas tu tiempo libre?:</td>
                <td scope="col" colspan="8">{{$datos->exp_habitos_estudio[0]->tiempo_libre}}</td>
            </tr>
            <tr>
                <td scope="col" colspan="3">Asignaturas preferidas: </td>
                <td scope="col" colspan="9">{{$datos->exp_habitos_estudio[0]->asignatura_preferida}}</td>
            </tr>
            <tr>
                <td scope="col">¿Por qué?: </td>
                <td scope="col" colspan="11">{{$datos->exp_habitos_estudio[0]->porque_asignatura}}</td>
            </tr>
            <tr>
                <td scope="col" colspan="4">Asignaturas que te han sido difíciles: </td>
                <td scope="col" colspan="8">{{$datos->exp_habitos_estudio[0]->asignatura_dificil}}</td>
            </tr>
            <tr>
                <td scope="col">¿Por qué?: </td>
                <td scope="col" colspan="11">{{$datos->exp_habitos_estudio[0]->porque_asignatura_dificil}}</td>
            </tr>
            <tr>
                <td scope="col" colspan="5">¿Qué opinión tienes de ti mismo como estudiante?: </td>
                <td scope="col" colspan="7">{{$datos->exp_habitos_estudio[0]->opinion_tu_mismo_estudiante}}</td>
            </tr>
            <tr>
                <td scope="col" colspan="12" align="center" style="background: #e0e0e0">FORMACIÓN INTEGRAL/ SALUD</td>
            </tr>
            <tr>
                <td scope="col" colspan="4">¿Practicas regularmente algún deporte?: </td>
                <td scope="col">{{$datos->exp_formacion_integral[0]->practica_deporte==1?"Si":"No"}}</td>
                <td scope="col">Especifica: </td>
                <td scope="col" colspan="6">{{$datos->exp_formacion_integral[0]->especifica_deporte}}</td>
            </tr>
            <tr>

                <td scope="col" colspan="4">¿Practicas alguna actividad artística?: </td>
                <td scope="col"> {{$datos->exp_formacion_integral[0]->practica_artistica==1?"Si":"No"}}</td>
                <td scope="col">Especifica: </td>
                <td scope="col" colspan="6">{{$datos->exp_formacion_integral[0]->especifica_artistica}}</td>
            </tr>
            <tr>
                <td scope="col" colspan="3">Tu pasatiempo favorito: </td>
                <td scope="col" colspan="9">{{$datos->exp_formacion_integral[0]->pasatiempo}}</td>
            </tr>
            <tr>
                <td scope="col" colspan="5">¿Participas en actividades culturales, sociales?: </td>
                <td scope="col">{{$datos->exp_formacion_integral[0]->actividades_culturales==1?"Si":"No"}}</td>
                <td scope="col">¿Cuáles?: </td>
                <td scope="col" colspan="5">{{$datos->exp_formacion_integral[0]->cuales_act}}</td>
            </tr>
            <tr>
                <td scope="col" colspan="3">¿Cómo consideras tu estado de salud?: </td>
                <td scope="col">{{$datos->exp_formacion_integral[0]->estado_salud==1?"Excelente":"Buena"}}</td>
                <td scope="col" colspan="3">¿Padeces alguna enfermedad crónica?</td>
                <td scope="col"> {{$datos->exp_formacion_integral[0]->enfermedad_cronica==1?"Si":"No"}}</td>
                <td scope="col">Especificar: </td>
                <td scope="col" colspan="3">{{$datos->exp_formacion_integral[0]->especifica_enf_cron}}</td>

            </tr>
            <tr>
                <td scope="col" colspan="6">¿Te han realizado alguna operación médico-quirúrgica?: </td>
                <td scope="col">{{$datos->exp_formacion_integral[0]->operacion==1?"Si":"No"}}</td>
                <td scope="col">Especificar: </td>
                <td scope="col" colspan="4">{{$datos->exp_formacion_integral[0]->deque_operacion}}</td>
            </tr>
            <tr>
                <td scope="col" colspan="4">¿Has tenido algún accidente grave?: </td>
                <td scope="col">{{$datos->exp_formacion_integral[0]->accidente_grave==1?"Si":"No"}}</td>
                <td scope="col" colspan="2">Relata Brevemente: </td>
                <td scope="col" colspan="5">{{$datos->exp_formacion_integral[0]->relata_breve}}</td>
            </tr>
            <tr>
                <td scope="col" colspan="3">¿Ingiere bebidas alcoholicas?</td>
                <td scope="col" colspan="9">{{$datos->exp_formacion_integral[0]->escala[0]->desc_escala}}</td>
            </tr>
            <tr>
                <td scope="col" colspan="12" align="center" style="background: #e0e0e0">ÁREA PSICOPEDAGÓGICA (CONOCIMIENTOS Y HABILIDADES)</td>
            </tr>
            <tr>
                <td scope="col" colspan="2">Rendimiento Escolar:</td>
                <td scope="col">
                    @switch($datos->exp_area_psicopedagogica[0]->rendimiento_escolar)
                        @case(1)
                        Excelente
                        @break
                        @case(2)
                        Muy bien
                        @break
                        @case(3)
                        Bien
                        @break
                        @case(4)
                        Regular
                        @break
                        @case(5)
                        Mala
                        @break
                    @endswitch
                </td>
                <td scope="col" colspan="2">Dominio del propio idioma:</td>
                <td scope="col">
                    @switch($datos->exp_area_psicopedagogica[0]->dominio_idioma)
                        @case(1)
                        Excelente
                        @break
                        @case(2)
                        Muy bien
                        @break
                        @case(3)
                        Bien
                        @break
                        @case(4)
                        Regular
                        @break
                        @case(5)
                        Mala
                        @break
                    @endswitch
                </td>
                <td scope="col" colspan="">Otro idioma:</td>
                <td scope="col">
                    @switch($datos->exp_area_psicopedagogica[0]->otro_idioma)
                        @case(1)
                        Excelente
                        @break
                        @case(2)
                        Muy bien
                        @break
                        @case(3)
                        Bien
                        @break
                        @case(4)
                        Regular
                        @break
                        @case(5)
                        Mala
                        @break
                    @endswitch
                </td>
                <td scope="col" colspan="3">Conocimentos en cómputo:</td>
                <td scope="col">
                    @switch($datos->exp_area_psicopedagogica[0]->conocimiento_compu)
                        @case(1)
                        Excelente
                        @break
                        @case(2)
                        Muy bien
                        @break
                        @case(3)
                        Bien
                        @break
                        @case(4)
                        Regular
                        @break
                        @case(5)
                        Mala
                        @break
                    @endswitch
                </td>
            </tr>
            <tr>
                <td scope="col" colspan="2">Aptitudes Especiales:</td>
                <td scope="col">
                    @switch($datos->exp_area_psicopedagogica[0]->aptitud_especial)
                        @case(1)
                        Excelente
                        @break
                        @case(2)
                        Muy bien
                        @break
                        @case(3)
                        Bien
                        @break
                        @case(4)
                        Regular
                        @break
                        @case(5)
                        Mala
                        @break
                    @endswitch
                </td>
                <td scope="col" colspan="3">Comprensión y Retención en clase:</td>
                <td scope="col">
                    @switch($datos->exp_area_psicopedagogica[0]->comprension)
                        @case(1)
                        Excelente
                        @break
                        @case(2)
                        Muy bien
                        @break
                        @case(3)
                        Bien
                        @break
                        @case(4)
                        Regular
                        @break
                        @case(5)
                        Mala
                        @break
                    @endswitch
                </td>
                <td scope="col" colspan="4">Preparación y presentación de exámenes:</td>
                <td scope="col">
                    @switch($datos->exp_area_psicopedagogica[0]->preparacion)
                        @case(1)
                        Excelente
                        @break
                        @case(2)
                        Muy bien
                        @break
                        @case(3)
                        Bien
                        @break
                        @case(4)
                        Regular
                        @break
                        @case(5)
                        Mala
                        @break
                    @endswitch
                </td>
            </tr>
            <tr>
                <td scope="col" colspan="5">Aplicación de estrategias de aprendizaje y estudio:</td>
                <td scope="col">
                    @switch($datos->exp_area_psicopedagogica[0]->estrategias_aprendizaje)
                        @case(1)
                        Excelente
                        @break
                        @case(2)
                        Muy bien
                        @break
                        @case(3)
                        Bien
                        @break
                        @case(4)
                        Regular
                        @break
                        @case(5)
                        Mala
                        @break
                    @endswitch
                </td>
                <td scope="col" colspan="5">Organización en actividades de estudio:</td>
                <td scope="col">
                    @switch($datos->exp_area_psicopedagogica[0]->organizacion_actividades)
                        @case(1)
                        Excelente
                        @break
                        @case(2)
                        Muy bien
                        @break
                        @case(3)
                        Bien
                        @break
                        @case(4)
                        Regular
                        @break
                        @case(5)
                        Mala
                        @break
                    @endswitch
                </td>
            </tr>
            <tr>
                <td scope="col" colspan="4">Concentración durante el estudio:</td>
                <td scope="col">
                    @switch($datos->exp_area_psicopedagogica[0]->concentracion)
                        @case(1)
                        Excelente
                        @break
                        @case(2)
                        Muy bien
                        @break
                        @case(3)
                        Bien
                        @break
                        @case(4)
                        Regular
                        @break
                        @case(5)
                        Mala
                        @break
                    @endswitch
                </td>
                <td scope="col" colspan="6">Solución de problemas y aprendizaje de las matemáticas:</td>
                <td scope="col">
                    @switch($datos->exp_area_psicopedagogica[0]->solucion_problemas)
                        @case(1)
                        Excelente
                        @break
                        @case(2)
                        Muy bien
                        @break
                        @case(3)
                        Bien
                        @break
                        @case(4)
                        Regular
                        @break
                        @case(5)
                        Mala
                        @break
                    @endswitch
                </td>
            </tr>
            <tr>
                <td scope="col" colspan="5">Condiciones ambientales durante el estudio:</td>
                <td scope="col">
                    @switch($datos->exp_area_psicopedagogica[0]->condiciones_ambientales)
                        @case(1)
                        Excelente
                        @break
                        @case(2)
                        Muy bien
                        @break
                        @case(3)
                        Bien
                        @break
                        @case(4)
                        Regular
                        @break
                        @case(5)
                        Mala
                        @break
                    @endswitch
                </td>
                <td scope="col" colspan="5">Búsqueda bibliografica e integración de información:</td>
                <td scope="col">
                    @switch($datos->exp_area_psicopedagogica[0]->busqueda_bibliografica)
                        @case(1)
                        Excelente
                        @break
                        @case(2)
                        Muy bien
                        @break
                        @case(3)
                        Bien
                        @break
                        @case(4)
                        Regular
                        @break
                        @case(5)
                        Mala
                        @break
                    @endswitch
                </td>

            </tr>
            <tr>
                <td scope="col" colspan="2">Trabajo en equipo:</td>
                <td scope="col" colspan="10">
                    @switch($datos->exp_area_psicopedagogica[0]->trabajo_equipo)
                        @case(1)
                        Excelente
                        @break
                        @case(2)
                        Muy bien
                        @break
                        @case(3)
                        Bien
                        @break
                        @case(4)
                        Regular
                        @break
                        @case(5)
                        Mala
                        @break
                    @endswitch
                </td>
            </tr>
            <tr>
                <td scope="col" colspan="12" align="center" style="background: #e0e0e0">ÁREA SOCIAL</td>
            </tr>
            <tr>
                <td scope="col">No. de Hijos: </td>
                <td scope="col">{{$datos->exp_generales[0]->no_hijos}}</td>
                <td scope="col" colspan="3">¿Perteneces a algun grupo étnico? </td>
                <td scope="col">{{$datos->exp_datos_familiares[0]->etnia_indigena==1?"Si":"No"}}</td>
                <td scope="col">¿Cuál? </td>
                <td scope="col" colspan="5">{{$datos->exp_datos_familiares[0]->cual_etnia}}</td>

            </tr>

            <tr>
                <td scope="col" colspan="3">¿Dominas algun dialecto? </td>
                <td scope="col"> {{$datos->exp_datos_familiares[0]->hablas_lengua_indigena==1?"Si":"No"}}</td>
                <td scope="col" colspan="3">¿Padecedes alguna discapacidad? </td>
                <td scope="col"> {{$datos->exp_formacion_integral[0]->enfer_visual==1?"Si":"No"}}</td>
                <td scope="col">Especificar: </td>
                <td scope="col" colspan="3">{{$datos->exp_formacion_integral[0]->especifica_enf}}</td>
            </tr>
            <tr>
                <td scope="col">Población: </td>
                <td scope="col" colspan="2">{{$datos->exp_generales[0]->poblacion}}</td>
                <td scope="col" colspan="3">Antecedentes institucionales: </td>
                <td scope="col" colspan="6"> {{$datos->exp_generales[0]->ant_inst}}</td>
            </tr>
        <tr>
            <td scope="col" colspan="2">Satisfacción: </td>
            <td scope="col" colspan="2">{{$datos->exp_generales[0]->satisfaccion_c}}</td>
            <td scope="col" colspan="3">Materias en repetición: </td>
            <td scope="col" colspan=""> {{$datos->exp_generales[0]->materias_repeticion==1?"Si":"No"}}</td>
            <td scope="col" colspan="3">Número de materias en repetición: </td>
            <td scope="col">{{$datos->exp_generales[0]->tot_repe}}</td>
        </tr>
        <tr>
            <td scope="col" colspan="5">¿Tus padres padecen alguna enfermedad crónica?</td>
            <td scope="col">{{$datos->exp_formacion_integral[0]->enf_cron_padre==1?"Si":"No"}}</td>
            <td scope="col">Especificar: </td>
            <td scope="col" colspan="5">{{$datos->exp_formacion_integral[0]->especifica_enf_cron_padres}}</td>

        </tr>
        <tr>
            <td scope="col" colspan="2">¿Usas lentes?</td>
            <td scope="col">{{$datos->exp_formacion_integral[0]->usas_lentes==1?"Si":"No"}}</td>
            <td scope="col" colspan="4">¿Tomas medicamento controlado?</td>
            <td scope="col">{{$datos->exp_formacion_integral[0]->medicamento_controlado==1?"Si":"No"}}</td>
            <td scope="col">Especificar: </td>
            <td scope="col" colspan="3">{{$datos->exp_formacion_integral[0]->especifica_medicamento}}</td>

        </tr>
        <tr>
            <td scope="col" colspan="3">Estatura: </td>
            <td scope="col" colspan="2">{{$datos->exp_formacion_integral[0]->estatura}}</td>
            <td scope="col" colspan="3">Peso: </td>
            <td scope="col" colspan="4">{{$datos->exp_formacion_integral[0]->peso}}</td>
        </tr>


        </thead>
    </table>
</div>
</body>
</html>

