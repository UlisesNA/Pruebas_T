<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
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
<h3>Expediente Académico</h3>
<hr>
<div class="contenido">
<h3>Datos Generales</h3>
    <table class="table" id="Table" border="1">
        <thead>
            <tr>
                <td scope="col">Nombre: {{$datos->exp_generales[0]->nombre}}</td>
                <td scope="col">Edad: {{$datos->exp_generales[0]->edad}}</td>
                <td scope="col">Sexo: {{$datos->exp_generales[0]->sexo==1?"Masculino":"Femenino"}}</td>
                <td scope="col">Fecha nacimiento: {{$datos->exp_generales[0]->fecha_nacimientos}}</td>
            </tr>
            <tr>
                <td scope="col">Lugar de nacimiento: {{$datos->exp_generales[0]->lugar_nacimientos}}</td>
                <td scope="col">Carrera: {{$datos->exp_generales[0]->carrera[0]->nombre}}</td>
                <td scope="col">Periodo: {{$datos->exp_generales[0]->periodo[0]->periodo}}</td>
                <td scope="col">Grupo: {{$datos->exp_generales[0]->grupo[0]->grupo}}</td>

            </tr>
            <tr>
                <td scope="col">Semestre: {{$datos->exp_generales[0]->semestre[0]->descripcion}}</td>
                <td scope="col">Estado Civil: {{$datos->exp_generales[0]->civil[0]->desc_ec}}</td>
                <td scope="col">Hijos: {{$datos->exp_generales[0]->no_hijos}}</td>
                <td scope="col">Dirección: {{$datos->exp_generales[0]->direccion}}</td>
            </tr>
            <tr>
                <td scope="col">Correo: {{$datos->exp_generales[0]->correo}}</td>
                <td scope="col">Tel Casa: {{$datos->exp_generales[0]->tel_casa}}</td>
                <td scope="col">Celular: {{$datos->exp_generales[0]->cel}}</td>
                <td scope="col">Nivel económico: {{$datos->exp_generales[0]->nivel[0]->desc_opc}}</td>
            </tr>
            <tr>
                <td scope="col">Trabaja: {{$datos->exp_generales[0]->trabaja==1?"Si":"No"}}</td>
                <td scope="col">Ocupación: {{$datos->exp_generales[0]->ocupacion}}</td>
                <td scope="col">Horario: {{$datos->exp_generales[0]->horario}}</td>
                <td scope="col">No Cuenta: {{$datos->exp_generales[0]->no_cuenta}}</td>
            </tr>
            <tr>
                <td scope="col">Beca: {{$datos->exp_generales[0]->beca==1?"Si":"No"}}</td>
                <td scope="col">Tipo beca: {{$datos->exp_generales[0]->tipo_beca}}</td>
                <td scope="col">Estado: {{$datos->exp_generales[0]->estado==1?"Regular":"Irregular"}}</td>
                <td scope="col">Turno: {{$datos->exp_generales[0]->turno}}</td>
            </tr>
            <tr>
                <td scope="col">Población: {{$datos->exp_generales[0]->poblacion}}</td>
                <td scope="col">Antecedentes institucionales: {{$datos->exp_generales[0]->ant_inst}}</td>
                <td scope="col">Satisfacción: {{$datos->exp_generales[0]->satisfaccion_c}}</td>
                <td scope="col">Materias en repetición: {{$datos->exp_generales[0]->materias_repeticion}}</td>
            </tr>
            <tr>
                <td scope="col">Materias en repetición: {{$datos->exp_generales[0]->tot_repe}}</td>
            </tr>
        </thead>
    </table>
    <br>
    <h3>Antecedentes Académicos </h3>
    <table class="table" id="Table" border="1">
        <thead>
        <tr>
            <td scope="col">Bachillerato: {{$datos->exp_antecedentes_academicos[0]->bachillerato[0]->desc_bachillerato}}</td>
            <td scope="col">Otros estudios: {{$datos->exp_antecedentes_academicos[0]->otros_estudios}}</td>
            <td scope="col">Años en que curso el bachillerato: {{$datos->exp_antecedentes_academicos[0]->anos_curso_bachillerato}}</td>
            <td scope="col">Año de terminación: {{$datos->exp_antecedentes_academicos[0]->ano_terminacion}}</td>
        </tr>

        <tr>
            <td scope="col">Escuela Procedente: {{$datos->exp_antecedentes_academicos[0]->escuela_procedente}}</td>
            <td scope="col">Promedio: {{$datos->exp_antecedentes_academicos[0]->promedio}}</td>
            <td scope="col">Materias reprobadas: {{$datos->exp_antecedentes_academicos[0]->materias_reprobadas}}</td>
            <td scope="col">Otra carrera: {{$datos->exp_antecedentes_academicos[0]->otra_carrera}}</td>
        </tr>
        <tr>
            <td scope="col">Institución: {{$datos->exp_antecedentes_academicos[0]->institucion}}</td>
            <td scope="col">Semestres cursados: {{$datos->exp_antecedentes_academicos[0]->semestres_cursados}}</td>
            <td scope="col">Interrupciones en los estudios: {{$datos->exp_antecedentes_academicos[0]->interrupciones_estudios==1?"Si":"No"}}</td>
            <td scope="col">Razones: {{$datos->exp_antecedentes_academicos[0]->razones_interrupcion}}</td>
        </tr>
        <tr>
            <td scope="col">¿Cuál fue la razón por la que decidiste estudiar en el TESVB?: {{$datos->exp_antecedentes_academicos[0]->razon_descide_estudiar_tesvb}}</td>
            <td scope="col">Tienes información sobre el perfil profesional de la carrera: {{$datos->exp_antecedentes_academicos[0]->sabedel_perfil_profesional}}</td>
            <td scope="col">Tuviste otras opciones vocacionales o preferencias por otras carreras: {{$datos->exp_antecedentes_academicos[0]->otras_opciones_vocales==1?"Si":"No"}}</td>
            <td scope="col">¿Cuáles?: {{$datos->exp_antecedentes_academicos[0]->cuales_otras_opciones_vocales}}</td>
        </tr>
        <tr>
            <td scope="col">¿Te gusta la carrera elegida?: {{$datos->exp_antecedentes_academicos[0]->tegusta_carrera_elegida==1?"Si":"No"}}</td>
            <td scope="col">¿Por qué?: {{$datos->exp_antecedentes_academicos[0]->porque_carrera_elegida}}</td>
            <td scope="col">Suspensión de estudios después de terminado el bachillerato: {{$datos->exp_antecedentes_academicos[0]->suspension_estudios_bachillerato==1?"Si":"No"}}</td>
            <td scope="col">Razones: {{$datos->exp_antecedentes_academicos[0]->razones_suspension_estudios}}</td>
        </tr>
        <tr>
            <td scope="col">Te estimula tu familia en tus estudios: {{$datos->exp_antecedentes_academicos[0]->teestimula_familia==1?"Si":"No"}}</td>
        </tr>
        </thead>

    </table>

    <h3>Datos Familiares </h3>
    <table class="table" id="Table" border="1">
        <thead>
        <tr>
            <td scope="col">Nombre del padre: {{$datos->exp_datos_familiares[0]->nombre_padre}}</td>
            <td scope="col">Edad del padre: {{$datos->exp_datos_familiares[0]->edad_padre}}</td>
            <td scope="col">Ocupación del padre: {{$datos->exp_datos_familiares[0]->ocupacion_padre}}</td>
            <td scope="col">Lugar de Residencia: {{$datos->exp_datos_familiares[0]->lugar_residencia_padre}}</td>
        </tr>
        <tr>
            <td scope="col">Nombre de la madre: {{$datos->exp_datos_familiares[0]->nombre_madre}}</td>
            <td scope="col">Edad de la madre: {{$datos->exp_datos_familiares[0]->edad_madre}}</td>
            <td scope="col">Ocupación de la madre: {{$datos->exp_datos_familiares[0]->ocupacion_madre}}</td>
            <td scope="col">Lugar de Residencia: {{$datos->exp_datos_familiares[0]->lugar_residencia_madre}}</td>
        </tr>
        <tr>
            <td scope="col">No. de Hermanos: {{$datos->exp_datos_familiares[0]->no_hermanos}}</td>
            <td scope="col">Lugar que ocupas entre ellos: {{$datos->exp_datos_familiares[0]->lugar_ocupas}}</td>
            <td scope="col">Actualmente vives: {{$datos->exp_datos_familiares[0]->vives[0]->desc_opc}}</td>
            <td scope="col">No. de personas: {{$datos->exp_datos_familiares[0]->no_personas}}</td>
        </tr>
        <tr>
            <td scope="col">Perteneces a una etnia indígena: {{$datos->exp_datos_familiares[0]->etnia_indigena==1?"Si":"No"}}</td>
            <td scope="col">¿Cuál?: {{$datos->exp_datos_familiares[0]->cual_etnia}}</td>
            <td scope="col">Hablas una Lengua indígena: {{$datos->exp_datos_familiares[0]->hablas_lengua_indigena==1?"Si":"No"}}</td>
            <td scope="col">¿Quién sostiene económicamente tu hogar?: {{$datos->exp_datos_familiares[0]->sostiene_economia_hogar}}</td>
        </tr>
        <tr>
            <td scope="col">Consideras a tu familia: {{$datos->exp_datos_familiares[0]->union[0]->desc_union}}</td>
            <td scope="col">Nombre del Tutor: {{$datos->exp_datos_familiares[0]->nombre_tutor}}</td>
            <td scope="col">Parentesco: {{$datos->exp_datos_familiares[0]->parentesco[0]->desc_parentesco}}</td>
        </tr>
        </thead>
    </table>
    <br>
    <h3>Hábitos de estudio </h3>
    <table class="table" id="Table" border="1">
        <thead>
        <tr>
            <td scope="col">Tiempo dedicado a estudiar diariamente fuera de clase: {{$datos->exp_habitos_estudio[0]->tiempo[0]->tiempo_empelado_estudiar}}</td>
            <td scope="col">¿Cómo es tú forma de trabajo intelectual?: {{$datos->exp_habitos_estudio[0]->intelectual[0]->desc_opc}}</td>
            <td scope="col">Tu forma de estudio mas utilizada: {{$datos->exp_habitos_estudio[0]->forma_estudio}}</td>
            <td scope="col">¿Cómo empleas tu tiempo libre?: {{$datos->exp_habitos_estudio[0]->tiempo_libre}}</td>
        </tr>
        <tr>
            <td scope="col">Asignaturas preferidas: {{$datos->exp_habitos_estudio[0]->asignatura_preferida}}</td>
            <td scope="col">¿Por qué?: {{$datos->exp_habitos_estudio[0]->porque_asignatura}}</td>
            <td scope="col">Asignaturas que te han sido difíciles: {{$datos->exp_habitos_estudio[0]->asignatura_dificil}}</td>
            <td scope="col">¿Por qué?: {{$datos->exp_habitos_estudio[0]->porque_asignatura_dificil}}</td>
        </tr>
        <tr>
            <td scope="col">¿Qué opinión tienes de ti mismo como estudiante?: {{$datos->exp_habitos_estudio[0]->opinion_tu_mismo_estudiante}}</td>
        </tr>
    </table>

    <br>
    <h3>Formación integral/salud </h3>
    <table class="table" id="Table" border="1">
        <thead>
        <tr>
            <td scope="col">¿Practicas regularmente algún deporte?: {{$datos->exp_formacion_integral[0]->practica_deporte==1?"Si":"No"}}</td>
            <td scope="col">Especifica: {{$datos->exp_formacion_integral[0]->especifica_deporte}}</td>
            <td scope="col">¿Practicas alguna actividad artística?: {{$datos->exp_formacion_integral[0]->practica_artistica==1?"Si":"No"}}</td>
            <td scope="col">Especifica: {{$datos->exp_formacion_integral[0]->especifica_artistica}}</td>
        </tr>
        <tr>
            <td scope="col">¿Participas en actividades culturales, sociales?: {{$datos->exp_formacion_integral[0]->actividades_culturales==1?"Si":"No"}}</td>
            <td scope="col">¿Cuáles?: {{$datos->exp_formacion_integral[0]->cuales_act}}</td>
            <td scope="col">¿Ingiere bebidas alcoholicas?: {{$datos->exp_formacion_integral[0]->escala[0]->desc_escala}}</td>
            <td scope="col">Tu pasatiempo favorito: {{$datos->exp_formacion_integral[0]->pasatiempo}}</td>
        </tr>
        <tr>
            <td scope="col">¿Cómo consideras tu estado de salud?: {{$datos->exp_formacion_integral[0]->estado_salud==1?"Excelente":"Buena"}}</td>
            <td scope="col">¿Padeces alguna enfermedad crónica?: {{$datos->exp_formacion_integral[0]->enfermedad_cronica==1?"Si":"No"}}</td>
            <td scope="col">Especificar: {{$datos->exp_formacion_integral[0]->especifica_enf_cron}}</td>

        </tr>
        <tr>
            <td scope="col">¿Tus padres padecen alguna enfermedad crónica?: {{$datos->exp_formacion_integral[0]->enf_cron_padre==1?"Si":"No"}}</td>
            <td scope="col">Especificar: {{$datos->exp_formacion_integral[0]->especifica_enf_cron_padres}}</td>
            <td scope="col">¿Te han realizado alguna operación médico-quirúrgica?: {{$datos->exp_formacion_integral[0]->operacion==1?"Si":"No"}}</td>
            <td scope="col">Especificar: {{$datos->exp_formacion_integral[0]->deque_operacion}}</td>
        </tr>
        <tr>
            <td scope="col">¿Usas lentes?: {{$datos->exp_formacion_integral[0]->usas_lentes==1?"Si":"No"}}</td>
            <td scope="col">¿Padeces alguna enfermedad visual?: {{$datos->exp_formacion_integral[0]->enfer_visual==1?"Si":"No"}}</td>
            <td scope="col">Especificar: {{$datos->exp_formacion_integral[0]->especifica_enf}}</td>
        </tr>
        <tr>
            <td scope="col">Estatura: {{$datos->exp_formacion_integral[0]->estatura}}</td>
            <td scope="col">Peso: {{$datos->exp_formacion_integral[0]->peso}}</td>
            <td scope="col">¿Tomas medicamento controlado?: {{$datos->exp_formacion_integral[0]->medicamento_controlado==1?"Si":"No"}}</td>
            <td scope="col">Especificar: {{$datos->exp_formacion_integral[0]->especifica_medicamento}}</td>
        </tr>
        <tr>
            <td scope="col">¿Has tenido algún accidente grave?: {{$datos->exp_formacion_integral[0]->accidente_grave==1?"Si":"No"}}</td>
            <td scope="col">Relata Brevemente: {{$datos->exp_formacion_integral[0]->relata_breve}}</td>

        </tr>
    </table>

    <br>
    <h3>Área psicopedagógica (conocimientos y habilidades) </h3>
    <table class="table" id="Table" border="1">
        <thead>
        <tr>
            <td scope="col">Rendimiento Escolar:
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
            <td scope="col">Dominio del propio idioma:
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
            <td scope="col">Otro idioma:
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
            <td scope="col">Conocimentos en cómputo:
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
            <td scope="col">Aptitudes Especiales:
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
            <td scope="col">Comprensión y Retención en clase:
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
            <td scope="col">Preparación y presentación de exámenes:
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
            <td scope="col">Aplicación de estrategias de aprendizaje y estudio:
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
        </tr>
        <tr>
            <td scope="col">Organización en actividades de estudio:
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
            <td scope="col">Concentración durante el estudio:
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
            <td scope="col">Solución de problemas y aprendizaje de las matemáticas:
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
            <td scope="col">Condiciones ambientales durante el estudio:
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
        </tr>
        <tr>
            <td scope="col">Búsqueda bibliografica e integración de información:
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
            <td scope="col">Trabajo en equipo:
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
        </thead>
    </table>

</div>


</body>
</html>

