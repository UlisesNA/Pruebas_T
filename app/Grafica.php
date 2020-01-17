<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class Grafica extends Model
{
    //and exp_generales.id_tutor=4
    public static function getGraficasTutor(){
        {

            $carrera=DB::select('SELECT datos_personales.id_carrera FROM datos_personales,users,carreras where
            datos_personales.id_user=users.id and
            datos_personales.id_carrera=carreras.id_carrera and
            datos_personales.id_user='.Auth::user()->id);

            $ec=DB::select('SELECT count(exp_generales.id_estado_civil) y,civil_estados.desc_ec name FROM exp_generales,civil_estados where
            exp_generales.id_estado_civil=civil_estados.id_estado_civil and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and exp_generales.id_tutor='.Auth::user()->id.' group by exp_generales.id_estado_civil;');
            $nse=DB::select('SELECT count(exp_generales.id_nivel_economico) y, opc_nivel_socio.desc_opc nom
            FROM exp_generales,opc_nivel_socio where
            exp_generales.id_nivel_economico=opc_nivel_socio.id_opc_nivel_socio and exp_generales.id_carrera='.$carrera[0]->id_carrera.'
            and exp_generales.id_tutor='.Auth::user()->id.' group by exp_generales.id_nivel_economico;');

            $trabaja=DB::select('SELECT count(exp_generales.trabaja) y, CASE exp_generales.trabaja WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_generales
            where exp_generales.id_carrera='.$carrera[0]->id_carrera.' and exp_generales.id_tutor='.Auth::user()->id.' group by exp_generales.trabaja;');
            $beca=DB::select('SELECT count(exp_generales.beca) y, CASE exp_generales.beca WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_generales
            where exp_generales.id_carrera='.$carrera[0]->id_carrera.' and exp_generales.id_tutor='.Auth::user()->id.' group by exp_generales.beca;');
            $estado=DB::select('SELECT count(exp_generales.estado) y, CASE exp_generales.estado WHEN 1 THEN "Regular" WHEN 2 THEN "Inrregular" END name FROM exp_generales
            where exp_generales.id_carrera='.$carrera[0]->id_carrera.' and exp_generales.id_tutor='.Auth::user()->id.' group by exp_generales.estado;');
            $turno=DB::select('SELECT count(exp_generales.turno) y, opc_turnos.desc_opc name FROM exp_generales,opc_turnos
            where exp_generales.turno=opc_turnos.id_opc_turnos
            and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and exp_generales.id_tutor='.Auth::user()->id.' group by exp_generales.turno;');

            $aa1=DB::select('SELECT count(exp_antecedentes_academicos.id_bachillerato) y, CASE exp_antecedentes_academicos.id_bachillerato
            WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_antecedentes_academicos ,exp_generales where exp_antecedentes_academicos.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and exp_generales.id_tutor='.Auth::user()->id.' group by exp_antecedentes_academicos.id_bachillerato;');
            $aa2=DB::select('SELECT count(exp_antecedentes_academicos.otra_carrera_ini) y, CASE  exp_antecedentes_academicos.otra_carrera_ini
            WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_antecedentes_academicos ,exp_generales where exp_antecedentes_academicos.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and exp_generales.id_tutor='.Auth::user()->id.' group by exp_antecedentes_academicos.otra_carrera_ini;');
            $aa3=DB::select('SELECT count(exp_antecedentes_academicos.interrupciones_estudios) y, CASE  exp_antecedentes_academicos.interrupciones_estudios
            WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_antecedentes_academicos ,exp_generales where exp_antecedentes_academicos.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and exp_generales.id_tutor='.Auth::user()->id.' group by exp_antecedentes_academicos.interrupciones_estudios;');
            $aa4=DB::select('SELECT count(exp_antecedentes_academicos.otras_opciones_vocales) y, CASE  exp_antecedentes_academicos.otras_opciones_vocales
            WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_antecedentes_academicos ,exp_generales where exp_antecedentes_academicos.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and exp_generales.id_tutor='.Auth::user()->id.' group by exp_antecedentes_academicos.otras_opciones_vocales;');
            $aa5=DB::select('SELECT count(exp_antecedentes_academicos.tegusta_carrera_elegida) y, CASE  exp_antecedentes_academicos.tegusta_carrera_elegida
            WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_antecedentes_academicos ,exp_generales where exp_antecedentes_academicos.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and exp_generales.id_tutor='.Auth::user()->id.' group by exp_antecedentes_academicos.tegusta_carrera_elegida;');
            $aa6=DB::select('SELECT count(exp_antecedentes_academicos.teestimula_familia) y, CASE  exp_antecedentes_academicos.teestimula_familia
            WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_antecedentes_academicos ,exp_generales where exp_antecedentes_academicos.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and exp_generales.id_tutor='.Auth::user()->id.' group by exp_antecedentes_academicos.teestimula_familia;');
            $aa7=DB::select('SELECT count(exp_antecedentes_academicos.suspension_estudios_bachillerato) y, CASE  exp_antecedentes_academicos.suspension_estudios_bachillerato
            WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_antecedentes_academicos ,exp_generales where exp_antecedentes_academicos.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and exp_generales.id_tutor='.Auth::user()->id.' group by exp_antecedentes_academicos.suspension_estudios_bachillerato;');

            $df1=DB::select('SELECT count(exp_datos_familiares.vivienda_actual) y,opc_vives.desc_opc nom
            FROM exp_datos_familiares,opc_vives,exp_generales
            where exp_datos_familiares.vivienda_actual = opc_vives.id_opc_vives and
            exp_datos_familiares.id_alumno=exp_generales.id_alumno and
            exp_generales.id_carrera='.$carrera[0]->id_carrera.' and exp_generales.id_tutor='.Auth::user()->id.' group by exp_datos_familiares.vivienda_actual;');
            $df2=DB::select('SELECT count(exp_datos_familiares.etnia_indigena) y, CASE exp_datos_familiares.etnia_indigena WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_datos_familiares,exp_generales where
            exp_datos_familiares.id_alumno=exp_generales.id_alumno and
            exp_generales.id_carrera='.$carrera[0]->id_carrera.' and exp_generales.id_tutor='.Auth::user()->id.' group by exp_datos_familiares.etnia_indigena;');
            $df3=DB::select('SELECT count(exp_datos_familiares.hablas_lengua_indigena) y, CASE exp_datos_familiares.hablas_lengua_indigena WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_datos_familiares,exp_generales where
            exp_datos_familiares.id_alumno=exp_generales.id_alumno and
            exp_generales.id_carrera='.$carrera[0]->id_carrera.' and exp_generales.id_tutor='.Auth::user()->id.' group by exp_datos_familiares.hablas_lengua_indigena;');
            $df4=DB::select('SELECT count(exp_datos_familiares.id_consideras_familia) y,CASE exp_datos_familiares.id_consideras_familia WHEN 1 THEN "Unida" WHEN 2 THEN "Muy Unida" ELSE "Disfuncional" END name FROM exp_datos_familiares,exp_generales where
            exp_datos_familiares.id_alumno=exp_generales.id_alumno and
            exp_generales.id_carrera='.$carrera[0]->id_carrera.' and exp_generales.id_tutor='.Auth::user()->id.' group by exp_datos_familiares.id_consideras_familia;');

            $he1=DB::select('SELECT count(exp_habitos_estudio.tiempo_empelado_estudiar) y,opc_tiempo.desc_opc nom
            FROM exp_habitos_estudio, opc_tiempo,exp_generales
            where exp_habitos_estudio.tiempo_empelado_estudiar=opc_tiempo.id_opc_tiempo and
            exp_habitos_estudio.id_alumno=exp_generales.id_alumno and
            exp_generales.id_carrera='.$carrera[0]->id_carrera.' and exp_generales.id_tutor='.Auth::user()->id.' group by exp_habitos_estudio.tiempo_empelado_estudiar;');
            $he2=DB::select('SELECT count(exp_habitos_estudio.id_forma_trabajo) y,opc_intelectual.desc_opc nom
            FROM exp_habitos_estudio,opc_intelectual,exp_generales
            where exp_habitos_estudio.id_forma_trabajo=opc_intelectual.id_opc_intelectual and
            exp_habitos_estudio.id_alumno=exp_generales.id_alumno and
            exp_generales.id_carrera='.$carrera[0]->id_carrera.' and exp_generales.id_tutor='.Auth::user()->id.' group by exp_habitos_estudio.id_forma_trabajo;');

            $fis1=DB::select('SELECT count(exp_formacion_integral.practica_deporte) y, CASE  exp_formacion_integral.practica_deporte WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_formacion_integral,exp_generales where exp_formacion_integral.id_alumno=exp_generales.id_alumno and id_carrera='.$carrera[0]->id_carrera.'
            and exp_generales.id_tutor='.Auth::user()->id.' group by exp_formacion_integral.practica_deporte;');
            $fis2=DB::select('SELECT count(exp_formacion_integral.practica_artistica) y, CASE  exp_formacion_integral.practica_artistica WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_formacion_integral,exp_generales where exp_formacion_integral.id_alumno=exp_generales.id_alumno and id_carrera='.$carrera[0]->id_carrera.'
            and exp_generales.id_tutor='.Auth::user()->id.' group by exp_formacion_integral.practica_artistica;');
            $fis3=DB::select('SELECT count(exp_formacion_integral.actividades_culturales) y, CASE  exp_formacion_integral.actividades_culturales WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_formacion_integral,exp_generales where exp_formacion_integral.id_alumno=exp_generales.id_alumno and id_carrera='.$carrera[0]->id_carrera.'
            and exp_generales.id_tutor='.Auth::user()->id.' group by exp_formacion_integral.actividades_culturales;');

            $fis4=DB::select('SELECT count(exp_formacion_integral.estado_salud) y,escalas.desc_escala nom
            FROM exp_formacion_integral,escalas,exp_generales
            where exp_formacion_integral.id_alumno=exp_generales.id_alumno and
            id_carrera='.$carrera[0]->id_carrera.' and
            exp_formacion_integral.estado_salud=escalas.id_escala
            and exp_generales.id_tutor='.Auth::user()->id.' group by exp_formacion_integral.estado_salud;');

            $fis5=DB::select('SELECT count(exp_formacion_integral.enfermedad_cronica) y, CASE  exp_formacion_integral.enfermedad_cronica WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_formacion_integral,exp_generales where exp_formacion_integral.id_alumno=exp_generales.id_alumno and id_carrera='.$carrera[0]->id_carrera.'
            and exp_generales.id_tutor='.Auth::user()->id.' group by exp_formacion_integral.enfermedad_cronica;');
            $fis6=DB::select('SELECT count(exp_formacion_integral.enf_cron_padre) y, CASE  exp_formacion_integral.enf_cron_padre WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_formacion_integral,exp_generales where exp_formacion_integral.id_alumno=exp_generales.id_alumno and id_carrera='.$carrera[0]->id_carrera.'
            and exp_generales.id_tutor='.Auth::user()->id.' group by exp_formacion_integral.enf_cron_padre;');
            $fis7=DB::select('SELECT count(exp_formacion_integral.operacion) y, CASE  exp_formacion_integral.operacion WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_formacion_integral,exp_generales where exp_formacion_integral.id_alumno=exp_generales.id_alumno and id_carrera='.$carrera[0]->id_carrera.'
            and exp_generales.id_tutor='.Auth::user()->id.' group by exp_formacion_integral.operacion;');
            $fis8=DB::select('SELECT count(exp_formacion_integral.usas_lentes) y, CASE  exp_formacion_integral.usas_lentes WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_formacion_integral,exp_generales where exp_formacion_integral.id_alumno=exp_generales.id_alumno and id_carrera='.$carrera[0]->id_carrera.'
            and exp_generales.id_tutor='.Auth::user()->id.' group by exp_formacion_integral.usas_lentes;');
            $fis9=DB::select('SELECT count(exp_formacion_integral.enfer_visual) y, CASE  exp_formacion_integral.enfer_visual WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_formacion_integral,exp_generales where exp_formacion_integral.id_alumno=exp_generales.id_alumno and id_carrera='.$carrera[0]->id_carrera.'
            and exp_generales.id_tutor='.Auth::user()->id.' group by exp_formacion_integral.enfer_visual;');
            $fis10=DB::select('SELECT count(exp_formacion_integral.medicamento_controlado) y, CASE  exp_formacion_integral.medicamento_controlado WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_formacion_integral,exp_generales where exp_formacion_integral.id_alumno=exp_generales.id_alumno and id_carrera='.$carrera[0]->id_carrera.'
            and exp_generales.id_tutor='.Auth::user()->id.' group by exp_formacion_integral.medicamento_controlado;');
            $fis11=DB::select('SELECT count(exp_formacion_integral.accidente_grave) y, CASE  exp_formacion_integral.accidente_grave WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_formacion_integral,exp_generales where exp_formacion_integral.id_alumno=exp_generales.id_alumno and id_carrera='.$carrera[0]->id_carrera.'
            and exp_generales.id_tutor='.Auth::user()->id.' group by exp_formacion_integral.accidente_grave;');

            $ap1=DB::select('SELECT count(exp_area_psicopedagogica.rendimiento_escolar) y, escalas.desc_escala name FROM
            exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and
            exp_area_psicopedagogica.rendimiento_escolar=escalas.id_escala
            and exp_generales.id_tutor='.Auth::user()->id.' group by exp_area_psicopedagogica.rendimiento_escolar;');
            $ap2=DB::select('SELECT count(exp_area_psicopedagogica.dominio_idioma) y, escalas.desc_escala name FROM
            exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and
            exp_area_psicopedagogica.dominio_idioma=escalas.id_escala
            and exp_generales.id_tutor='.Auth::user()->id.' group by exp_area_psicopedagogica.dominio_idioma;');
            $ap3=DB::select('SELECT count(exp_area_psicopedagogica.otro_idioma) y, escalas.desc_escala name FROM
            exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and
            exp_area_psicopedagogica.otro_idioma=escalas.id_escala
            and exp_generales.id_tutor='.Auth::user()->id.' group by exp_area_psicopedagogica.otro_idioma;');
            $ap4=DB::select('SELECT count(exp_area_psicopedagogica.conocimiento_compu) y, escalas.desc_escala name FROM
            exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and
            exp_area_psicopedagogica.conocimiento_compu=escalas.id_escala
            and exp_generales.id_tutor='.Auth::user()->id.' group by exp_area_psicopedagogica.conocimiento_compu;');
            $ap5=DB::select('SELECT count(exp_area_psicopedagogica.aptitud_especial) y, escalas.desc_escala name FROM
            exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and
            exp_area_psicopedagogica.aptitud_especial=escalas.id_escala
            and exp_generales.id_tutor='.Auth::user()->id.' group by exp_area_psicopedagogica.aptitud_especial;');
            $ap6=DB::select('SELECT count(exp_area_psicopedagogica.comprension) y, escalas.desc_escala name FROM
            exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and
            exp_area_psicopedagogica.comprension=escalas.id_escala
            and exp_generales.id_tutor='.Auth::user()->id.' group by exp_area_psicopedagogica.comprension;');
            $ap7=DB::select('SELECT count(exp_area_psicopedagogica.preparacion) y, escalas.desc_escala name FROM
            exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and
            exp_area_psicopedagogica.preparacion=escalas.id_escala
            and exp_generales.id_tutor='.Auth::user()->id.' group by exp_area_psicopedagogica.preparacion;');
            $ap8=DB::select('SELECT count(exp_area_psicopedagogica.estrategias_aprendizaje) y, escalas.desc_escala name FROM
            exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and
            exp_area_psicopedagogica.estrategias_aprendizaje=escalas.id_escala
            and exp_generales.id_tutor='.Auth::user()->id.' group by exp_area_psicopedagogica.estrategias_aprendizaje;');
            $ap9=DB::select('SELECT count(exp_area_psicopedagogica.organizacion_actividades) y, escalas.desc_escala name FROM
            exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and
            exp_area_psicopedagogica.organizacion_actividades=escalas.id_escala
            and exp_generales.id_tutor='.Auth::user()->id.' group by exp_area_psicopedagogica.organizacion_actividades;');
            $ap10=DB::select('SELECT count(exp_area_psicopedagogica.concentracion) y, escalas.desc_escala name FROM
            exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and
            exp_area_psicopedagogica.concentracion=escalas.id_escala
            and exp_generales.id_tutor='.Auth::user()->id.' group by exp_area_psicopedagogica.concentracion;');
            $ap11=DB::select('SELECT count(exp_area_psicopedagogica.solucion_problemas) y, escalas.desc_escala name FROM
            exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and
            exp_area_psicopedagogica.solucion_problemas=escalas.id_escala
            and exp_generales.id_tutor='.Auth::user()->id.' group by exp_area_psicopedagogica.solucion_problemas;');
            $ap12=DB::select('SELECT count(exp_area_psicopedagogica.condiciones_ambientales) y, escalas.desc_escala name FROM
            exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and
            exp_area_psicopedagogica.condiciones_ambientales=escalas.id_escala
            and exp_generales.id_tutor='.Auth::user()->id.' group by exp_area_psicopedagogica.condiciones_ambientales;');
            $ap13=DB::select('SELECT count(exp_area_psicopedagogica.busqueda_bibliografica) y, escalas.desc_escala name FROM
            exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and
            exp_area_psicopedagogica.busqueda_bibliografica=escalas.id_escala
            and exp_generales.id_tutor='.Auth::user()->id.' group by exp_area_psicopedagogica.busqueda_bibliografica;');
            $ap14=DB::select('SELECT count(exp_area_psicopedagogica.trabajo_equipo) y, escalas.desc_escala name FROM
            exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and
            exp_area_psicopedagogica.trabajo_equipo=escalas.id_escala
            and exp_generales.id_tutor='.Auth::user()->id.' group by exp_area_psicopedagogica.trabajo_equipo;');
        }
        $datosG=array($ec,$nse,$trabaja,$beca,$estado,$turno);
        $datosA=array($aa1,$aa2,$aa3,$aa4,$aa5,$aa6,$aa7);
        $datosD=array($df1,$df2,$df3,$df4);
        $datosH=array($he1,$he2);
        $datosF=array($fis1,$fis2,$fis3,$fis4,$fis5,$fis6,$fis7,$fis8,$fis9,$fis10,$fis11);
        $datosAP=array($ap1,$ap2,$ap3,$ap4,$ap5,$ap6,$ap7,$ap8,$ap9,$ap10,$ap11,$ap12,$ap13,$ap14);
        $datos=array($datosG,$datosA,$datosD,$datosH,$datosF,$datosAP);
        //dd($datos);
        return $datos;
    }
    public static function getGraficasCoo(){
        {

            $carrera=DB::select('SELECT datos_personales.id_carrera FROM datos_personales,users,carreras where
            datos_personales.id_user=users.id and
            datos_personales.id_carrera=carreras.id_carrera and
            datos_personales.id_user='.Auth::user()->id);

            $ec=DB::select('SELECT count(exp_generales.id_estado_civil) cantidad,civil_estados.desc_ec nom FROM exp_generales,civil_estados where
            exp_generales.id_estado_civil=civil_estados.id_estado_civil and exp_generales.id_carrera='.$carrera[0]->id_carrera.' group by exp_generales.id_estado_civil;');

            $nse=DB::select('SELECT count(exp_generales.id_nivel_economico) cantidad, opc_nivel_socio.desc_opc nom
            FROM exp_generales,opc_nivel_socio where
            exp_generales.id_nivel_economico=opc_nivel_socio.id_opc_nivel_socio and exp_generales.id_carrera='.$carrera[0]->id_carrera.'
            group by exp_generales.id_nivel_economico;');
            $trabaja=DB::select('SELECT count(exp_generales.trabaja) cantidad, CASE exp_generales.trabaja WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_generales
            where exp_generales.id_carrera='.$carrera[0]->id_carrera.' group by exp_generales.trabaja;');
            $beca=DB::select('SELECT count(exp_generales.beca) cantidad, CASE exp_generales.beca WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_generales
            where exp_generales.id_carrera='.$carrera[0]->id_carrera.' group by exp_generales.beca;');
            $estado=DB::select('SELECT count(exp_generales.estado) cantidad, CASE exp_generales.estado WHEN 1 THEN "Regular" WHEN 2 THEN "Inrregular" END nom FROM exp_generales
            where exp_generales.id_carrera='.$carrera[0]->id_carrera.' group by exp_generales.estado;');
            $turno=DB::select('SELECT count(exp_generales.turno) cantidad, opc_turnos.desc_opc nom FROM exp_generales,opc_turnos
            where exp_generales.turno=opc_turnos.id_opc_turnos
            and exp_generales.id_carrera='.$carrera[0]->id_carrera.' group by exp_generales.turno;');

            $aa1=DB::select('SELECT count(exp_antecedentes_academicos.id_bachillerato) cantidad, CASE exp_antecedentes_academicos.id_bachillerato
            WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_antecedentes_academicos ,exp_generales where exp_antecedentes_academicos.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' group by exp_antecedentes_academicos.id_bachillerato;');
            $aa2=DB::select('SELECT count(exp_antecedentes_academicos.otra_carrera_ini) cantidad, CASE  exp_antecedentes_academicos.otra_carrera_ini
            WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_antecedentes_academicos ,exp_generales where exp_antecedentes_academicos.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' group by exp_antecedentes_academicos.otra_carrera_ini;');
            $aa3=DB::select('SELECT count(exp_antecedentes_academicos.interrupciones_estudios) cantidad, CASE  exp_antecedentes_academicos.interrupciones_estudios
            WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_antecedentes_academicos ,exp_generales where exp_antecedentes_academicos.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' group by exp_antecedentes_academicos.interrupciones_estudios;');
            $aa4=DB::select('SELECT count(exp_antecedentes_academicos.otras_opciones_vocales) cantidad, CASE  exp_antecedentes_academicos.otras_opciones_vocales
            WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_antecedentes_academicos ,exp_generales where exp_antecedentes_academicos.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' group by exp_antecedentes_academicos.otras_opciones_vocales;');
            $aa5=DB::select('SELECT count(exp_antecedentes_academicos.tegusta_carrera_elegida) cantidad, CASE  exp_antecedentes_academicos.tegusta_carrera_elegida
            WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_antecedentes_academicos ,exp_generales where exp_antecedentes_academicos.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' group by exp_antecedentes_academicos.tegusta_carrera_elegida;');
            $aa6=DB::select('SELECT count(exp_antecedentes_academicos.teestimula_familia) cantidad, CASE  exp_antecedentes_academicos.teestimula_familia
            WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_antecedentes_academicos ,exp_generales where exp_antecedentes_academicos.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' group by exp_antecedentes_academicos.teestimula_familia;');
            $aa7=DB::select('SELECT count(exp_antecedentes_academicos.suspension_estudios_bachillerato) cantidad, CASE  exp_antecedentes_academicos.suspension_estudios_bachillerato
            WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_antecedentes_academicos ,exp_generales where exp_antecedentes_academicos.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' group by exp_antecedentes_academicos.suspension_estudios_bachillerato;');

            $df1=DB::select('SELECT count(exp_datos_familiares.vivienda_actual) cantidad,opc_vives.desc_opc nom
            FROM exp_datos_familiares,opc_vives,exp_generales
            where exp_datos_familiares.vivienda_actual = opc_vives.id_opc_vives and
            exp_datos_familiares.id_alumno=exp_generales.id_alumno and
            exp_generales.id_carrera='.$carrera[0]->id_carrera.' group by exp_datos_familiares.vivienda_actual;');
            $df2=DB::select('SELECT count(exp_datos_familiares.etnia_indigena) cantidad, CASE exp_datos_familiares.etnia_indigena WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_datos_familiares,exp_generales where
            exp_datos_familiares.id_alumno=exp_generales.id_alumno and
            exp_generales.id_carrera='.$carrera[0]->id_carrera.' group by exp_datos_familiares.etnia_indigena;');
            $df3=DB::select('SELECT count(exp_datos_familiares.hablas_lengua_indigena) cantidad, CASE exp_datos_familiares.hablas_lengua_indigena WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_datos_familiares,exp_generales where
            exp_datos_familiares.id_alumno=exp_generales.id_alumno and
            exp_generales.id_carrera='.$carrera[0]->id_carrera.' group by exp_datos_familiares.hablas_lengua_indigena;');
            $df4=DB::select('SELECT count(exp_datos_familiares.id_consideras_familia) cantidad,CASE exp_datos_familiares.id_consideras_familia WHEN 1 THEN "Unida" WHEN 2 THEN "Muy Unida" ELSE "Disfuncional" END nom FROM exp_datos_familiares,exp_generales where
            exp_datos_familiares.id_alumno=exp_generales.id_alumno and
            exp_generales.id_carrera='.$carrera[0]->id_carrera.' group by exp_datos_familiares.id_consideras_familia;');

            $he1=DB::select('SELECT count(exp_habitos_estudio.tiempo_empelado_estudiar) cantidad,opc_tiempo.desc_opc nom
            FROM exp_habitos_estudio, opc_tiempo,exp_generales
            where exp_habitos_estudio.tiempo_empelado_estudiar=opc_tiempo.id_opc_tiempo and
            exp_habitos_estudio.id_alumno=exp_generales.id_alumno and
            exp_generales.id_carrera='.$carrera[0]->id_carrera.' group by exp_habitos_estudio.tiempo_empelado_estudiar;');
            $he2=DB::select('SELECT count(exp_habitos_estudio.id_forma_trabajo) cantidad,opc_intelectual.desc_opc nom
            FROM exp_habitos_estudio,opc_intelectual,exp_generales
            where exp_habitos_estudio.id_forma_trabajo=opc_intelectual.id_opc_intelectual and
            exp_habitos_estudio.id_alumno=exp_generales.id_alumno and
            exp_generales.id_carrera='.$carrera[0]->id_carrera.' group by exp_habitos_estudio.id_forma_trabajo;');

            $fis1=DB::select('SELECT count(exp_formacion_integral.practica_deporte) cantidad, CASE  exp_formacion_integral.practica_deporte WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_formacion_integral,exp_generales where exp_formacion_integral.id_alumno=exp_generales.id_alumno and id_carrera='.$carrera[0]->id_carrera.'
            group by exp_formacion_integral.practica_deporte;');
            $fis2=DB::select('SELECT count(exp_formacion_integral.practica_artistica) cantidad, CASE  exp_formacion_integral.practica_artistica WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_formacion_integral,exp_generales where exp_formacion_integral.id_alumno=exp_generales.id_alumno and id_carrera='.$carrera[0]->id_carrera.'
            group by exp_formacion_integral.practica_artistica;');
            $fis3=DB::select('SELECT count(exp_formacion_integral.actividades_culturales) cantidad, CASE  exp_formacion_integral.actividades_culturales WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_formacion_integral,exp_generales where exp_formacion_integral.id_alumno=exp_generales.id_alumno and id_carrera='.$carrera[0]->id_carrera.'
            group by exp_formacion_integral.actividades_culturales;');

            $fis4=DB::select('SELECT count(exp_formacion_integral.estado_salud) cantidad,escalas.desc_escala nom
            FROM exp_formacion_integral,escalas,exp_generales
            where exp_formacion_integral.id_alumno=exp_generales.id_alumno and
            id_carrera='.$carrera[0]->id_carrera.' and
            exp_formacion_integral.estado_salud=escalas.id_escala
            group by exp_formacion_integral.estado_salud;');

            $fis5=DB::select('SELECT count(exp_formacion_integral.enfermedad_cronica) cantidad, CASE  exp_formacion_integral.enfermedad_cronica WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_formacion_integral,exp_generales where exp_formacion_integral.id_alumno=exp_generales.id_alumno and id_carrera='.$carrera[0]->id_carrera.'
            group by exp_formacion_integral.enfermedad_cronica;');
            $fis6=DB::select('SELECT count(exp_formacion_integral.enf_cron_padre) cantidad, CASE  exp_formacion_integral.enf_cron_padre WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_formacion_integral,exp_generales where exp_formacion_integral.id_alumno=exp_generales.id_alumno and id_carrera='.$carrera[0]->id_carrera.'
            group by exp_formacion_integral.enf_cron_padre;');
            $fis7=DB::select('SELECT count(exp_formacion_integral.operacion) cantidad, CASE  exp_formacion_integral.operacion WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_formacion_integral,exp_generales where exp_formacion_integral.id_alumno=exp_generales.id_alumno and id_carrera='.$carrera[0]->id_carrera.'
            group by exp_formacion_integral.operacion;');
            $fis8=DB::select('SELECT count(exp_formacion_integral.usas_lentes) cantidad, CASE  exp_formacion_integral.usas_lentes WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_formacion_integral,exp_generales where exp_formacion_integral.id_alumno=exp_generales.id_alumno and id_carrera='.$carrera[0]->id_carrera.'
            group by exp_formacion_integral.usas_lentes;');
            $fis9=DB::select('SELECT count(exp_formacion_integral.enfer_visual) cantidad, CASE  exp_formacion_integral.enfer_visual WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_formacion_integral,exp_generales where exp_formacion_integral.id_alumno=exp_generales.id_alumno and id_carrera='.$carrera[0]->id_carrera.'
            group by exp_formacion_integral.enfer_visual;');
            $fis10=DB::select('SELECT count(exp_formacion_integral.medicamento_controlado) cantidad, CASE  exp_formacion_integral.medicamento_controlado WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_formacion_integral,exp_generales where exp_formacion_integral.id_alumno=exp_generales.id_alumno and id_carrera='.$carrera[0]->id_carrera.'
            group by exp_formacion_integral.medicamento_controlado;');
            $fis11=DB::select('SELECT count(exp_formacion_integral.accidente_grave) cantidad, CASE  exp_formacion_integral.accidente_grave WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_formacion_integral,exp_generales where exp_formacion_integral.id_alumno=exp_generales.id_alumno and id_carrera='.$carrera[0]->id_carrera.'
            group by exp_formacion_integral.accidente_grave;');

            $ap1=DB::select('SELECT count(exp_area_psicopedagogica.rendimiento_escolar) cantidad, escalas.desc_escala nom FROM
            exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and
            exp_area_psicopedagogica.rendimiento_escolar=escalas.id_escala
            group by exp_area_psicopedagogica.rendimiento_escolar;');
            $ap2=DB::select('SELECT count(exp_area_psicopedagogica.dominio_idioma) cantidad, escalas.desc_escala nom FROM
            exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and
            exp_area_psicopedagogica.dominio_idioma=escalas.id_escala
            group by exp_area_psicopedagogica.dominio_idioma;');
            $ap3=DB::select('SELECT count(exp_area_psicopedagogica.otro_idioma) cantidad, escalas.desc_escala nom FROM
            exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and
            exp_area_psicopedagogica.otro_idioma=escalas.id_escala
            group by exp_area_psicopedagogica.otro_idioma;');
            $ap4=DB::select('SELECT count(exp_area_psicopedagogica.conocimiento_compu) cantidad, escalas.desc_escala nom FROM
            exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and
            exp_area_psicopedagogica.conocimiento_compu=escalas.id_escala
            group by exp_area_psicopedagogica.conocimiento_compu;');
            $ap5=DB::select('SELECT count(exp_area_psicopedagogica.aptitud_especial) cantidad, escalas.desc_escala nom FROM
            exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and
            exp_area_psicopedagogica.aptitud_especial=escalas.id_escala
            group by exp_area_psicopedagogica.aptitud_especial;');
            $ap6=DB::select('SELECT count(exp_area_psicopedagogica.comprension) cantidad, escalas.desc_escala nom FROM
            exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and
            exp_area_psicopedagogica.comprension=escalas.id_escala
            group by exp_area_psicopedagogica.comprension;');
            $ap7=DB::select('SELECT count(exp_area_psicopedagogica.preparacion) cantidad, escalas.desc_escala nom FROM
            exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and
            exp_area_psicopedagogica.preparacion=escalas.id_escala
            group by exp_area_psicopedagogica.preparacion;');
            $ap8=DB::select('SELECT count(exp_area_psicopedagogica.estrategias_aprendizaje) cantidad, escalas.desc_escala nom FROM
            exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and
            exp_area_psicopedagogica.estrategias_aprendizaje=escalas.id_escala
            group by exp_area_psicopedagogica.estrategias_aprendizaje;');
            $ap9=DB::select('SELECT count(exp_area_psicopedagogica.organizacion_actividades) cantidad, escalas.desc_escala nom FROM
            exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and
            exp_area_psicopedagogica.organizacion_actividades=escalas.id_escala
            group by exp_area_psicopedagogica.organizacion_actividades;');
            $ap10=DB::select('SELECT count(exp_area_psicopedagogica.concentracion) cantidad, escalas.desc_escala nom FROM
            exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and
            exp_area_psicopedagogica.concentracion=escalas.id_escala
            group by exp_area_psicopedagogica.concentracion;');
            $ap11=DB::select('SELECT count(exp_area_psicopedagogica.solucion_problemas) cantidad, escalas.desc_escala nom FROM
            exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and
            exp_area_psicopedagogica.solucion_problemas=escalas.id_escala
            group by exp_area_psicopedagogica.solucion_problemas;');
            $ap12=DB::select('SELECT count(exp_area_psicopedagogica.condiciones_ambientales) cantidad, escalas.desc_escala nom FROM
            exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and
            exp_area_psicopedagogica.condiciones_ambientales=escalas.id_escala
            group by exp_area_psicopedagogica.condiciones_ambientales;');
            $ap13=DB::select('SELECT count(exp_area_psicopedagogica.busqueda_bibliografica) cantidad, escalas.desc_escala nom FROM
            exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and
            exp_area_psicopedagogica.busqueda_bibliografica=escalas.id_escala
            group by exp_area_psicopedagogica.busqueda_bibliografica;');
            $ap14=DB::select('SELECT count(exp_area_psicopedagogica.trabajo_equipo) cantidad, escalas.desc_escala nom FROM
            exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera[0]->id_carrera.' and
            exp_area_psicopedagogica.trabajo_equipo=escalas.id_escala
            group by exp_area_psicopedagogica.trabajo_equipo;');
        }
        $datosG=array($ec,$nse,$trabaja,$beca,$estado,$turno);
        $datosA=array($aa1,$aa2,$aa3,$aa4,$aa5,$aa6,$aa7);
        $datosD=array($df1,$df2,$df3,$df4);
        $datosH=array($he1,$he2);
        $datosF=array($fis1,$fis2,$fis3,$fis4,$fis5,$fis6,$fis7,$fis8,$fis9,$fis10,$fis11);
        $datosAP=array($ap1,$ap2,$ap3,$ap4,$ap5,$ap6,$ap7,$ap8,$ap9,$ap10,$ap11,$ap12,$ap13,$ap14);
        $datos=array($datosG,$datosA,$datosD,$datosH,$datosF,$datosAP);
        //dd($datosAP);
        return $datos;
    }
    public static function getGraficas($id){
        if ($id!=0) {
            # code...
            {

                $carrera=$id;

                $ec=DB::select('SELECT civil_estados.desc_ec name,count(exp_generales.id_estado_civil) y FROM exp_generales,civil_estados where
                exp_generales.id_estado_civil=civil_estados.id_estado_civil and exp_generales.id_carrera='.$carrera.' group by exp_generales.id_estado_civil;');

                $nse=DB::select('SELECT count(exp_generales.id_nivel_economico) y, opc_nivel_socio.desc_opc name
                FROM exp_generales,opc_nivel_socio where
                exp_generales.id_nivel_economico=opc_nivel_socio.id_opc_nivel_socio and exp_generales.id_carrera='.$carrera.'
                group by exp_generales.id_nivel_economico;');
                $trabaja=DB::select('SELECT count(exp_generales.trabaja) y, CASE exp_generales.trabaja WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_generales
                where exp_generales.id_carrera='.$carrera.' group by exp_generales.trabaja;');
                $beca=DB::select('SELECT count(exp_generales.beca) y, CASE exp_generales.beca WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_generales
                where exp_generales.id_carrera='.$carrera.' group by exp_generales.beca;');
                $estado=DB::select('SELECT count(exp_generales.estado) y, CASE exp_generales.estado WHEN 1 THEN "Regular" WHEN 2 THEN "Inrregular" END name FROM exp_generales
                where exp_generales.id_carrera='.$carrera.' group by exp_generales.estado;');
                $turno=DB::select('SELECT count(exp_generales.turno) y, opc_turnos.desc_opc name FROM exp_generales,opc_turnos
                where exp_generales.turno=opc_turnos.id_opc_turnos
                and exp_generales.id_carrera='.$carrera.' group by exp_generales.turno;');

                $aa1=DB::select('SELECT count(exp_antecedentes_academicos.id_bachillerato) y, CASE exp_antecedentes_academicos.id_bachillerato
                WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_antecedentes_academicos ,exp_generales where exp_antecedentes_academicos.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera.' group by exp_antecedentes_academicos.id_bachillerato;');
                $aa2=DB::select('SELECT count(exp_antecedentes_academicos.otra_carrera_ini) y, CASE  exp_antecedentes_academicos.otra_carrera_ini
                WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_antecedentes_academicos ,exp_generales where exp_antecedentes_academicos.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera.' group by exp_antecedentes_academicos.otra_carrera_ini;');
                $aa3=DB::select('SELECT count(exp_antecedentes_academicos.interrupciones_estudios) y, CASE  exp_antecedentes_academicos.interrupciones_estudios
                WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_antecedentes_academicos ,exp_generales where exp_antecedentes_academicos.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera.' group by exp_antecedentes_academicos.interrupciones_estudios;');
                $aa4=DB::select('SELECT count(exp_antecedentes_academicos.otras_opciones_vocales) y, CASE  exp_antecedentes_academicos.otras_opciones_vocales
                WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_antecedentes_academicos ,exp_generales where exp_antecedentes_academicos.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera.' group by exp_antecedentes_academicos.otras_opciones_vocales;');
                $aa5=DB::select('SELECT count(exp_antecedentes_academicos.tegusta_carrera_elegida) y, CASE  exp_antecedentes_academicos.tegusta_carrera_elegida
                WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_antecedentes_academicos ,exp_generales where exp_antecedentes_academicos.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera.' group by exp_antecedentes_academicos.tegusta_carrera_elegida;');
                $aa6=DB::select('SELECT count(exp_antecedentes_academicos.teestimula_familia) y, CASE  exp_antecedentes_academicos.teestimula_familia
                WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_antecedentes_academicos ,exp_generales where exp_antecedentes_academicos.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera.' group by exp_antecedentes_academicos.teestimula_familia;');
                $aa7=DB::select('SELECT count(exp_antecedentes_academicos.suspension_estudios_bachillerato) y, CASE  exp_antecedentes_academicos.suspension_estudios_bachillerato
                WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_antecedentes_academicos ,exp_generales where exp_antecedentes_academicos.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera.' group by exp_antecedentes_academicos.suspension_estudios_bachillerato;');

                $df1=DB::select('SELECT count(exp_datos_familiares.vivienda_actual) y,opc_vives.desc_opc name
                FROM exp_datos_familiares,opc_vives,exp_generales
                where exp_datos_familiares.vivienda_actual = opc_vives.id_opc_vives and
                exp_datos_familiares.id_alumno=exp_generales.id_alumno and
                exp_generales.id_carrera='.$carrera.' group by exp_datos_familiares.vivienda_actual;');
                $df2=DB::select('SELECT count(exp_datos_familiares.etnia_indigena) y, CASE exp_datos_familiares.etnia_indigena WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_datos_familiares,exp_generales where
                exp_datos_familiares.id_alumno=exp_generales.id_alumno and
                exp_generales.id_carrera='.$carrera.' group by exp_datos_familiares.etnia_indigena;');
                $df3=DB::select('SELECT count(exp_datos_familiares.hablas_lengua_indigena) y, CASE exp_datos_familiares.hablas_lengua_indigena WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_datos_familiares,exp_generales where
                exp_datos_familiares.id_alumno=exp_generales.id_alumno and
                exp_generales.id_carrera='.$carrera.' group by exp_datos_familiares.hablas_lengua_indigena;');
                $df4=DB::select('SELECT count(exp_datos_familiares.id_consideras_familia) y,CASE exp_datos_familiares.id_consideras_familia WHEN 1 THEN "Unida" WHEN 2 THEN "Muy Unida" ELSE "Disfuncional" END name FROM exp_datos_familiares,exp_generales where
                exp_datos_familiares.id_alumno=exp_generales.id_alumno and
                exp_generales.id_carrera='.$carrera.' group by exp_datos_familiares.id_consideras_familia;');

                $he1=DB::select('SELECT count(exp_habitos_estudio.tiempo_empelado_estudiar) y,opc_tiempo.desc_opc name
                FROM exp_habitos_estudio, opc_tiempo,exp_generales
                where exp_habitos_estudio.tiempo_empelado_estudiar=opc_tiempo.id_opc_tiempo and
                exp_habitos_estudio.id_alumno=exp_generales.id_alumno and
                exp_generales.id_carrera='.$carrera.' group by exp_habitos_estudio.tiempo_empelado_estudiar;');
                $he2=DB::select('SELECT count(exp_habitos_estudio.id_forma_trabajo) y,opc_intelectual.desc_opc name
                FROM exp_habitos_estudio,opc_intelectual,exp_generales
                where exp_habitos_estudio.id_forma_trabajo=opc_intelectual.id_opc_intelectual and
                exp_habitos_estudio.id_alumno=exp_generales.id_alumno and
                exp_generales.id_carrera='.$carrera.' group by exp_habitos_estudio.id_forma_trabajo;');

                $fis1=DB::select('SELECT count(exp_formacion_integral.practica_deporte) y, CASE  exp_formacion_integral.practica_deporte WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_formacion_integral,exp_generales where exp_formacion_integral.id_alumno=exp_generales.id_alumno and id_carrera='.$carrera.'
                group by exp_formacion_integral.practica_deporte;');
                $fis2=DB::select('SELECT count(exp_formacion_integral.practica_artistica) y, CASE  exp_formacion_integral.practica_artistica WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_formacion_integral,exp_generales where exp_formacion_integral.id_alumno=exp_generales.id_alumno and id_carrera='.$carrera.'
                group by exp_formacion_integral.practica_artistica;');
                $fis3=DB::select('SELECT count(exp_formacion_integral.actividades_culturales) y, CASE  exp_formacion_integral.actividades_culturales WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_formacion_integral,exp_generales where exp_formacion_integral.id_alumno=exp_generales.id_alumno and id_carrera='.$carrera.'
                group by exp_formacion_integral.actividades_culturales;');

                $fis4=DB::select('SELECT count(exp_formacion_integral.estado_salud) y,escalas.desc_escala name
                FROM exp_formacion_integral,escalas,exp_generales
                where exp_formacion_integral.id_alumno=exp_generales.id_alumno and
                id_carrera='.$carrera.' and
                exp_formacion_integral.estado_salud=escalas.id_escala
                group by exp_formacion_integral.estado_salud;');

                $fis5=DB::select('SELECT count(exp_formacion_integral.enfermedad_cronica) y, CASE  exp_formacion_integral.enfermedad_cronica WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_formacion_integral,exp_generales where exp_formacion_integral.id_alumno=exp_generales.id_alumno and id_carrera='.$carrera.'
                group by exp_formacion_integral.enfermedad_cronica;');
                $fis6=DB::select('SELECT count(exp_formacion_integral.enf_cron_padre) y, CASE  exp_formacion_integral.enf_cron_padre WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_formacion_integral,exp_generales where exp_formacion_integral.id_alumno=exp_generales.id_alumno and id_carrera='.$carrera.'
                group by exp_formacion_integral.enf_cron_padre;');
                $fis7=DB::select('SELECT count(exp_formacion_integral.operacion) y, CASE  exp_formacion_integral.operacion WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_formacion_integral,exp_generales where exp_formacion_integral.id_alumno=exp_generales.id_alumno and id_carrera='.$carrera.'
                group by exp_formacion_integral.operacion;');
                $fis8=DB::select('SELECT count(exp_formacion_integral.usas_lentes) y, CASE  exp_formacion_integral.usas_lentes WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_formacion_integral,exp_generales where exp_formacion_integral.id_alumno=exp_generales.id_alumno and id_carrera='.$carrera.'
                group by exp_formacion_integral.usas_lentes;');
                $fis9=DB::select('SELECT count(exp_formacion_integral.enfer_visual) y, CASE  exp_formacion_integral.enfer_visual WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_formacion_integral,exp_generales where exp_formacion_integral.id_alumno=exp_generales.id_alumno and id_carrera='.$carrera.'
                group by exp_formacion_integral.enfer_visual;');
                $fis10=DB::select('SELECT count(exp_formacion_integral.medicamento_controlado) y, CASE  exp_formacion_integral.medicamento_controlado WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_formacion_integral,exp_generales where exp_formacion_integral.id_alumno=exp_generales.id_alumno and id_carrera='.$carrera.'
                group by exp_formacion_integral.medicamento_controlado;');
                $fis11=DB::select('SELECT count(exp_formacion_integral.accidente_grave) y, CASE  exp_formacion_integral.accidente_grave WHEN 1 THEN "Si" WHEN 2 THEN "No" END name FROM exp_formacion_integral,exp_generales where exp_formacion_integral.id_alumno=exp_generales.id_alumno and id_carrera='.$carrera.'
                group by exp_formacion_integral.accidente_grave;');

                $ap1=DB::select('SELECT count(exp_area_psicopedagogica.rendimiento_escolar) y, escalas.desc_escala name FROM
                exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera.' and
                exp_area_psicopedagogica.rendimiento_escolar=escalas.id_escala
                group by exp_area_psicopedagogica.rendimiento_escolar;');
                $ap2=DB::select('SELECT count(exp_area_psicopedagogica.dominio_idioma) y, escalas.desc_escala name FROM
                exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera.' and
                exp_area_psicopedagogica.dominio_idioma=escalas.id_escala
                group by exp_area_psicopedagogica.dominio_idioma;');
                $ap3=DB::select('SELECT count(exp_area_psicopedagogica.otro_idioma) y, escalas.desc_escala name FROM
                exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera.' and
                exp_area_psicopedagogica.otro_idioma=escalas.id_escala
                group by exp_area_psicopedagogica.otro_idioma;');
                $ap4=DB::select('SELECT count(exp_area_psicopedagogica.conocimiento_compu) y, escalas.desc_escala name FROM
                exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera.' and
                exp_area_psicopedagogica.conocimiento_compu=escalas.id_escala
                group by exp_area_psicopedagogica.conocimiento_compu;');
                $ap5=DB::select('SELECT count(exp_area_psicopedagogica.aptitud_especial) y, escalas.desc_escala name FROM
                exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera.' and
                exp_area_psicopedagogica.aptitud_especial=escalas.id_escala
                group by exp_area_psicopedagogica.aptitud_especial;');
                $ap6=DB::select('SELECT count(exp_area_psicopedagogica.comprension) y, escalas.desc_escala name FROM
                exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera.' and
                exp_area_psicopedagogica.comprension=escalas.id_escala
                group by exp_area_psicopedagogica.comprension;');
                $ap7=DB::select('SELECT count(exp_area_psicopedagogica.preparacion) y, escalas.desc_escala name FROM
                exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera.' and
                exp_area_psicopedagogica.preparacion=escalas.id_escala
                group by exp_area_psicopedagogica.preparacion;');
                $ap8=DB::select('SELECT count(exp_area_psicopedagogica.estrategias_aprendizaje) y, escalas.desc_escala name FROM
                exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera.' and
                exp_area_psicopedagogica.estrategias_aprendizaje=escalas.id_escala
                group by exp_area_psicopedagogica.estrategias_aprendizaje;');
                $ap9=DB::select('SELECT count(exp_area_psicopedagogica.organizacion_actividades) y, escalas.desc_escala name FROM
                exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera.' and
                exp_area_psicopedagogica.organizacion_actividades=escalas.id_escala
                group by exp_area_psicopedagogica.organizacion_actividades;');
                $ap10=DB::select('SELECT count(exp_area_psicopedagogica.concentracion) y, escalas.desc_escala name FROM
                exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera.' and
                exp_area_psicopedagogica.concentracion=escalas.id_escala
                group by exp_area_psicopedagogica.concentracion;');
                $ap11=DB::select('SELECT count(exp_area_psicopedagogica.solucion_problemas) y, escalas.desc_escala name FROM
                exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera.' and
                exp_area_psicopedagogica.solucion_problemas=escalas.id_escala
                group by exp_area_psicopedagogica.solucion_problemas;');
                $ap12=DB::select('SELECT count(exp_area_psicopedagogica.condiciones_ambientales) y, escalas.desc_escala name FROM
                exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera.' and
                exp_area_psicopedagogica.condiciones_ambientales=escalas.id_escala
                group by exp_area_psicopedagogica.condiciones_ambientales;');
                $ap13=DB::select('SELECT count(exp_area_psicopedagogica.busqueda_bibliografica) y, escalas.desc_escala name FROM
                exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera.' and
                exp_area_psicopedagogica.busqueda_bibliografica=escalas.id_escala
                group by exp_area_psicopedagogica.busqueda_bibliografica;');
                $ap14=DB::select('SELECT count(exp_area_psicopedagogica.trabajo_equipo) y, escalas.desc_escala name FROM
                exp_area_psicopedagogica, escalas,exp_generales where  exp_area_psicopedagogica.id_alumno=exp_generales.id_alumno and exp_generales.id_carrera='.$carrera.' and
                exp_area_psicopedagogica.trabajo_equipo=escalas.id_escala
                group by exp_area_psicopedagogica.trabajo_equipo;');
            }
        }
        else {
            # code...
            {
                $ec=DB::select('SELECT count(exp_generales.id_estado_civil) cantidad,civil_estados.desc_ec nom FROM exp_generales,civil_estados where
                exp_generales.id_estado_civil=civil_estados.id_estado_civil group by exp_generales.id_estado_civil;');
                $nse=DB::select('SELECT count(exp_generales.id_nivel_economico) cantidad, opc_nivel_socio.desc_opc nom
                FROM exp_generales,opc_nivel_socio where
                exp_generales.id_nivel_economico=opc_nivel_socio.id_opc_nivel_socio
                group by exp_generales.id_nivel_economico;');
                $trabaja=DB::select('SELECT count(exp_generales.trabaja) cantidad, CASE exp_generales.trabaja WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_generales
                group by exp_generales.trabaja;');
                $beca=DB::select('SELECT count(exp_generales.beca) cantidad, CASE exp_generales.beca WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_generales
                group by exp_generales.beca;');
                $estado=DB::select('SELECT count(exp_generales.estado) cantidad, CASE exp_generales.estado WHEN 1 THEN "Regular" WHEN 2 THEN "Inrregular" END nom FROM exp_generales
                group by exp_generales.estado;');
                $turno=DB::select('SELECT count(exp_generales.turno) cantidad, opc_turnos.desc_opc nom FROM exp_generales,opc_turnos
                where exp_generales.turno=opc_turnos.id_opc_turnos
                group by exp_generales.turno;');
                $aa1=DB::select('SELECT count(exp_antecedentes_academicos.id_bachillerato) cantidad, CASE  exp_antecedentes_academicos.id_bachillerato
                WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_antecedentes_academicos group by exp_antecedentes_academicos.id_bachillerato;');
                $aa2=DB::select('SELECT count(exp_antecedentes_academicos.otra_carrera_ini) cantidad, CASE  exp_antecedentes_academicos.otra_carrera_ini
                WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_antecedentes_academicos group by exp_antecedentes_academicos.otra_carrera_ini;');
                $aa3=DB::select('SELECT count(exp_antecedentes_academicos.interrupciones_estudios) cantidad, CASE  exp_antecedentes_academicos.interrupciones_estudios
                WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_antecedentes_academicos group by exp_antecedentes_academicos.interrupciones_estudios;');
                $aa4=DB::select('SELECT count(exp_antecedentes_academicos.otras_opciones_vocales) cantidad, CASE  exp_antecedentes_academicos.otras_opciones_vocales
                WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_antecedentes_academicos group by exp_antecedentes_academicos.otras_opciones_vocales;');
                $aa5=DB::select('SELECT count(exp_antecedentes_academicos.tegusta_carrera_elegida) cantidad, CASE  exp_antecedentes_academicos.tegusta_carrera_elegida
                WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_antecedentes_academicos group by exp_antecedentes_academicos.tegusta_carrera_elegida;');
                $aa6=DB::select('SELECT count(exp_antecedentes_academicos.teestimula_familia) cantidad, CASE  exp_antecedentes_academicos.teestimula_familia
                WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_antecedentes_academicos group by exp_antecedentes_academicos.teestimula_familia;');
                $aa7=DB::select('SELECT count(exp_antecedentes_academicos.suspension_estudios_bachillerato) cantidad, CASE  exp_antecedentes_academicos.suspension_estudios_bachillerato
                WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_antecedentes_academicos group by exp_antecedentes_academicos.suspension_estudios_bachillerato;');

                $df1=DB::select('SELECT count(exp_datos_familiares.vivienda_actual) cantidad,opc_vives.desc_opc nom FROM exp_datos_familiares,opc_vives
                where exp_datos_familiares.vivienda_actual = opc_vives.id_opc_vives
                group by exp_datos_familiares.vivienda_actual;');
                $df2=DB::select('SELECT count(exp_datos_familiares.etnia_indigena) cantidad, CASE exp_datos_familiares.etnia_indigena WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_datos_familiares
                group by exp_datos_familiares.etnia_indigena;');
                $df3=DB::select('SELECT count(exp_datos_familiares.hablas_lengua_indigena) cantidad, CASE exp_datos_familiares.hablas_lengua_indigena WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_datos_familiares
                group by exp_datos_familiares.hablas_lengua_indigena;');
                $df4=DB::select('SELECT count(exp_datos_familiares.id_consideras_familia) cantidad,CASE exp_datos_familiares.id_consideras_familia WHEN 1 THEN "Unida" WHEN 2 THEN "Muy Unida" ELSE "Disfuncional" END nom FROM exp_datos_familiares
                group by exp_datos_familiares.id_consideras_familia;');

                $he1=DB::select('SELECT count(exp_habitos_estudio.tiempo_empelado_estudiar) cantidad,opc_tiempo.desc_opc nom FROM exp_habitos_estudio, opc_tiempo where
                exp_habitos_estudio.tiempo_empelado_estudiar=opc_tiempo.id_opc_tiempo group by exp_habitos_estudio.tiempo_empelado_estudiar;');
                $he2=DB::select('SELECT count(exp_habitos_estudio.id_forma_trabajo) cantidad,opc_intelectual.desc_opc nom FROM exp_habitos_estudio,opc_intelectual where
                exp_habitos_estudio.id_forma_trabajo=opc_intelectual.id_opc_intelectual group by exp_habitos_estudio.id_forma_trabajo;');

                $fis1=DB::select('SELECT count(exp_formacion_integral.practica_deporte) cantidad, CASE  exp_formacion_integral.practica_deporte WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_formacion_integral
                group by exp_formacion_integral.practica_deporte;');
                $fis2=DB::select('SELECT count(exp_formacion_integral.practica_artistica) cantidad, CASE  exp_formacion_integral.practica_artistica WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_formacion_integral
                group by exp_formacion_integral.practica_artistica;');
                $fis3=DB::select('SELECT count(exp_formacion_integral.actividades_culturales) cantidad, CASE  exp_formacion_integral.actividades_culturales WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_formacion_integral
                group by exp_formacion_integral.actividades_culturales;');
                $fis4=DB::select('SELECT count(exp_formacion_integral.estado_salud) cantidad,escalas.desc_escala nom FROM exp_formacion_integral,escalas
                where exp_formacion_integral.estado_salud=escalas.id_escala
                group by exp_formacion_integral.estado_salud;');
                $fis5=DB::select('SELECT count(exp_formacion_integral.enfermedad_cronica) cantidad, CASE  exp_formacion_integral.enfermedad_cronica WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_formacion_integral
                group by exp_formacion_integral.enfermedad_cronica;');
                $fis6=DB::select('SELECT count(exp_formacion_integral.enf_cron_padre) cantidad, CASE  exp_formacion_integral.enf_cron_padre WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_formacion_integral
                group by exp_formacion_integral.enf_cron_padre;');
                $fis7=DB::select('SELECT count(exp_formacion_integral.operacion) cantidad, CASE  exp_formacion_integral.operacion WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_formacion_integral
                group by exp_formacion_integral.operacion;');
                $fis8=DB::select('SELECT count(exp_formacion_integral.usas_lentes) cantidad, CASE  exp_formacion_integral.usas_lentes WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_formacion_integral
                group by exp_formacion_integral.usas_lentes;');
                $fis9=DB::select('SELECT count(exp_formacion_integral.enfer_visual) cantidad, CASE  exp_formacion_integral.enfer_visual WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_formacion_integral
                group by exp_formacion_integral.enfer_visual;');
                $fis10=DB::select('SELECT count(exp_formacion_integral.medicamento_controlado) cantidad, CASE  exp_formacion_integral.medicamento_controlado WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_formacion_integral
                group by exp_formacion_integral.medicamento_controlado;');
                $fis11=DB::select('SELECT count(exp_formacion_integral.accidente_grave) cantidad, CASE  exp_formacion_integral.accidente_grave WHEN 1 THEN "Si" WHEN 2 THEN "No" END nom FROM exp_formacion_integral
                group by exp_formacion_integral.accidente_grave;');

                $ap1=DB::select('SELECT count(exp_area_psicopedagogica.rendimiento_escolar) cantidad, escalas.desc_escala nom FROM
                exp_area_psicopedagogica, escalas where
                exp_area_psicopedagogica.rendimiento_escolar=escalas.id_escala
                group by exp_area_psicopedagogica.rendimiento_escolar;');
                $ap2=DB::select('SELECT count(exp_area_psicopedagogica.dominio_idioma) cantidad, escalas.desc_escala nom FROM
                exp_area_psicopedagogica, escalas where
                exp_area_psicopedagogica.dominio_idioma=escalas.id_escala
                group by exp_area_psicopedagogica.dominio_idioma;');
                $ap3=DB::select('SELECT count(exp_area_psicopedagogica.otro_idioma) cantidad, escalas.desc_escala nom FROM
                exp_area_psicopedagogica, escalas where
                exp_area_psicopedagogica.otro_idioma=escalas.id_escala
                group by exp_area_psicopedagogica.otro_idioma;');
                $ap4=DB::select('SELECT count(exp_area_psicopedagogica.conocimiento_compu) cantidad, escalas.desc_escala nom FROM
                exp_area_psicopedagogica, escalas where
                exp_area_psicopedagogica.conocimiento_compu=escalas.id_escala
                group by exp_area_psicopedagogica.conocimiento_compu;');
                $ap5=DB::select('SELECT count(exp_area_psicopedagogica.aptitud_especial) cantidad, escalas.desc_escala nom FROM
                exp_area_psicopedagogica, escalas where
                exp_area_psicopedagogica.aptitud_especial=escalas.id_escala
                group by exp_area_psicopedagogica.aptitud_especial;');
                $ap6=DB::select('SELECT count(exp_area_psicopedagogica.comprension) cantidad, escalas.desc_escala nom FROM
                exp_area_psicopedagogica, escalas where
                exp_area_psicopedagogica.comprension=escalas.id_escala
                group by exp_area_psicopedagogica.comprension;');
                $ap7=DB::select('SELECT count(exp_area_psicopedagogica.preparacion) cantidad, escalas.desc_escala nom FROM
                exp_area_psicopedagogica, escalas where
                exp_area_psicopedagogica.preparacion=escalas.id_escala
                group by exp_area_psicopedagogica.preparacion;');
                $ap8=DB::select('SELECT count(exp_area_psicopedagogica.estrategias_aprendizaje) cantidad, escalas.desc_escala nom FROM
                exp_area_psicopedagogica, escalas where
                exp_area_psicopedagogica.estrategias_aprendizaje=escalas.id_escala
                group by exp_area_psicopedagogica.estrategias_aprendizaje;');
                $ap9=DB::select('SELECT count(exp_area_psicopedagogica.organizacion_actividades) cantidad, escalas.desc_escala nom FROM
                exp_area_psicopedagogica, escalas where
                exp_area_psicopedagogica.organizacion_actividades=escalas.id_escala
                group by exp_area_psicopedagogica.organizacion_actividades;');
                $ap10=DB::select('SELECT count(exp_area_psicopedagogica.concentracion) cantidad, escalas.desc_escala nom FROM
                exp_area_psicopedagogica, escalas where
                exp_area_psicopedagogica.concentracion=escalas.id_escala
                group by exp_area_psicopedagogica.concentracion;');
                $ap11=DB::select('SELECT count(exp_area_psicopedagogica.solucion_problemas) cantidad, escalas.desc_escala nom FROM
                exp_area_psicopedagogica, escalas where
                exp_area_psicopedagogica.solucion_problemas=escalas.id_escala
                group by exp_area_psicopedagogica.solucion_problemas;');
                $ap12=DB::select('SELECT count(exp_area_psicopedagogica.condiciones_ambientales) cantidad, escalas.desc_escala nom FROM
                exp_area_psicopedagogica, escalas where
                exp_area_psicopedagogica.condiciones_ambientales=escalas.id_escala
                group by exp_area_psicopedagogica.condiciones_ambientales;');
                $ap13=DB::select('SELECT count(exp_area_psicopedagogica.busqueda_bibliografica) cantidad, escalas.desc_escala nom FROM
                exp_area_psicopedagogica, escalas where
                exp_area_psicopedagogica.busqueda_bibliografica=escalas.id_escala
                group by exp_area_psicopedagogica.busqueda_bibliografica;');
                $ap14=DB::select('SELECT count(exp_area_psicopedagogica.trabajo_equipo) cantidad, escalas.desc_escala nom FROM
                exp_area_psicopedagogica, escalas where
                exp_area_psicopedagogica.trabajo_equipo=escalas.id_escala
                group by exp_area_psicopedagogica.trabajo_equipo;');
            }
        }

        $datosG=array($ec,$nse,$trabaja,$beca,$estado,$turno);
        $datosA=array($aa1,$aa2,$aa3,$aa4,$aa5,$aa6,$aa7);
        $datosD=array($df1,$df2,$df3,$df4);
        $datosH=array($he1,$he2);
        $datosF=array($fis1,$fis2,$fis3,$fis4,$fis5,$fis6,$fis7,$fis8,$fis9,$fis10,$fis11);
        $datosAP=array($ap1,$ap2,$ap3,$ap4,$ap5,$ap6,$ap7,$ap8,$ap9,$ap10,$ap11,$ap12,$ap13,$ap14);
        $datos=array($datosG,$datosA,$datosD,$datosH,$datosF,$datosAP);
        //dd($datos);
        return $datos;
    }
}
