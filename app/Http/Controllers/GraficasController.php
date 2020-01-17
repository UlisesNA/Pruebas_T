<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Profesor;
use App\Grafica;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth;
use function PHPSTORM_META\map;

class GraficasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //
        //dd($request->user());
        //$request->user()->authorizeRoles('2');
        //$datos=Grafica::getGraficasTutor();
       // $datosG=Profesor::getGeneroChar();//no tocar
        //$arr=['Datos Generales','Antecedentes Academicos','Datos Familiares','Habitos de Estudios','Formacion Integral/Salud','Area Psicopedagogica'];

        //dd($datos);
        return view('profesor.estadisticas');
    }
    public function genero(Request $request)
    {
        $hombres=DB::select('select count(gnral_alumnos.id_alumno) as hombres FROM gnral_alumnos JOIN exp_asigna_alumnos 
        ON gnral_alumnos.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_asigna_tutor ON 
        exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion JOIN gnral_personales ON 
        gnral_personales.id_personal=exp_asigna_tutor.id_personal WHERE gnral_alumnos.genero="M" AND gnral_alumnos.id_carrera='.$request->id_carrera.' AND gnral_personales.tipo_usuario='.\Illuminate\Support\Facades\Auth::user()->id);

        $mujeres=DB::select('SELECT COUNT(gnral_alumnos.id_alumno) as mujeres FROM gnral_alumnos JOIN exp_asigna_alumnos 
        ON gnral_alumnos.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_asigna_tutor ON 
        exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion JOIN gnral_personales ON 
        gnral_personales.id_personal=exp_asigna_tutor.id_personal WHERE gnral_alumnos.genero="F" AND gnral_alumnos.id_carrera='.$request->id_carrera.' AND gnral_personales.tipo_usuario='.\Illuminate\Support\Facades\Auth::user()->id);

        return response()->json(
            ["hombres"=>$hombres,
                "mujeres"=>$mujeres],200
        );
    }

    public function generales(Request $request)
    {
        $estado=DB::select('select COUNT(exp_generales.id_exp_general) as cant, exp_civil_estados.desc_ec
                     as estado FROM exp_generales JOIN exp_civil_estados ON exp_generales.id_estado_civil=exp_civil_estados.id_estado_civil
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND gnral_personales.tipo_usuario='.\Illuminate\Support\Facades\Auth::user()->id.' 
                      GROUP BY exp_civil_estados.id_estado_civil');
         $nivel=DB::select('select COUNT(exp_generales.id_exp_general) as cant, exp_opc_nivel_socio.desc_opc
                     as nivel FROM exp_generales JOIN exp_opc_nivel_socio ON exp_opc_nivel_socio.id_nivel_economico=exp_generales.id_nivel_economico
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND gnral_personales.tipo_usuario='.\Illuminate\Support\Facades\Auth::user()->id.'
                      GROUP BY exp_opc_nivel_socio.desc_opc');
         $trabaja=DB::select('select COUNT(exp_generales.id_exp_general) as cant,CASE exp_generales.trabaja 
                    WHEN 1 THEN "Si" WHEN 2 THEN "No" END as trabajo FROM exp_generales JOIN exp_asigna_alumnos ON 
                    exp_generales.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_asigna_tutor ON 
                    exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion JOIN gnral_personales ON 
                    gnral_personales.id_personal=exp_asigna_tutor.id_personal WHERE exp_generales.id_carrera='.$request->id_carrera.' AND 
                    gnral_personales.tipo_usuario='.\Illuminate\Support\Facades\Auth::user()->id.' GROUP BY exp_generales.trabaja ');
        $beca=DB::select('select COUNT(exp_generales.id_exp_general) as cant,CASE exp_generales.beca 
                    WHEN 1 THEN "Si" WHEN 2 THEN "No" END as beca FROM exp_generales JOIN exp_asigna_alumnos ON 
                    exp_generales.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_asigna_tutor ON 
                    exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion JOIN gnral_personales ON 
                    gnral_personales.id_personal=exp_asigna_tutor.id_personal WHERE exp_generales.id_carrera='.$request->id_carrera.' AND 
                    gnral_personales.tipo_usuario='.\Illuminate\Support\Facades\Auth::user()->id.' GROUP BY exp_generales.beca ');

        $estado=DB::select('select COUNT(exp_generales.id_exp_general) as cant,CASE exp_generales.estado 
                    WHEN 1 THEN "Regular" WHEN 2 THEN "Irregular" END as estado FROM exp_generales JOIN exp_asigna_alumnos ON 
                    exp_generales.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_asigna_tutor ON 
                    exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion JOIN gnral_personales ON 
                    gnral_personales.id_personal=exp_asigna_tutor.id_personal WHERE exp_generales.id_carrera='.$request->id_carrera.' AND 
                    gnral_personales.tipo_usuario='.\Illuminate\Support\Facades\Auth::user()->id.' GROUP BY exp_generales.estado ');

        return response()->json(
            ["categoria"=>array_pluck($nivel, 'nivel'),
                "cantidad"=>array_pluck($nivel, 'cant'),
                "cattrabaja"=>array_pluck($trabaja, 'trabajo'),
                "canttrabaja"=>array_pluck($trabaja, 'cant'),
                "catbeca"=>array_pluck($beca, 'beca'),
                "cantbeca"=>array_pluck($beca, 'cant'),
                "catestado"=>array_pluck($estado, 'estado'),
                "cantestado"=>array_pluck($estado, 'cant'),
                "catcivil"=>array_pluck($estado, 'estado'),
                "cantcivil"=>array_pluck($estado, 'cant')],200
        );
    }

    public function academico(Request $request)
    {
        $bachiller=DB::select('select COUNT(exp_antecedentes_academicos.id_exp_antecedentes_academicos)
                     as cant, exp_bachillerato.desc_bachillerato as bachillerato FROM exp_bachillerato JOIN exp_antecedentes_academicos
                      ON exp_bachillerato.id_bachillerato=exp_antecedentes_academicos.id_bachillerato JOIN exp_asigna_alumnos ON 
                      exp_antecedentes_academicos.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_generales on
                       exp_generales.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_asigna_tutor ON 
                       exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion JOIN 
                       gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal WHERE 
                       exp_generales.id_carrera='.$request->id_carrera.' AND gnral_personales.tipo_usuario='.\Illuminate\Support\Facades\Auth::user()->id.' GROUP BY 
                       exp_antecedentes_academicos.id_bachillerato ');
        $otraca=DB::select('select COUNT(exp_antecedentes_academicos.id_exp_antecedentes_academicos) 
                    as cant,CASE exp_antecedentes_academicos.otra_carrera_ini WHEN 1 THEN "Si" WHEN 2 THEN "No" END as otra 
                    from exp_antecedentes_academicos JOIN exp_asigna_alumnos ON exp_antecedentes_academicos.id_alumno=exp_asigna_alumnos.id_alumno 
                    JOIN exp_generales on exp_generales.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_asigna_tutor 
                    ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion JOIN gnral_personales 
                    ON gnral_personales.id_personal=exp_asigna_tutor.id_personal WHERE exp_generales.id_carrera='.$request->id_carrera.' AND 
                    gnral_personales.tipo_usuario='.\Illuminate\Support\Facades\Auth::user()->id.' GROUP BY exp_antecedentes_academicos.otra_carrera_ini ');

        $gusta=DB::select('select COUNT(exp_antecedentes_academicos.id_exp_antecedentes_academicos) 
                    as cant,CASE exp_antecedentes_academicos.tegusta_carrera_elegida WHEN 1 THEN "Si" WHEN 2 THEN "No" END as gusta 
                    from exp_antecedentes_academicos JOIN exp_asigna_alumnos ON exp_antecedentes_academicos.id_alumno=exp_asigna_alumnos.id_alumno 
                    JOIN exp_generales on exp_generales.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_asigna_tutor 
                    ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion JOIN gnral_personales 
                    ON gnral_personales.id_personal=exp_asigna_tutor.id_personal WHERE exp_generales.id_carrera='.$request->id_carrera.' AND 
                    gnral_personales.tipo_usuario='.\Illuminate\Support\Facades\Auth::user()->id.' GROUP BY exp_antecedentes_academicos.tegusta_carrera_elegida ');

        $estimula=DB::select('select COUNT(exp_antecedentes_academicos.id_exp_antecedentes_academicos) 
                    as cant,CASE exp_antecedentes_academicos.teestimula_familia WHEN 1 THEN "Si" WHEN 2 THEN "No" END as estimula 
                    from exp_antecedentes_academicos JOIN exp_asigna_alumnos ON exp_antecedentes_academicos.id_alumno=exp_asigna_alumnos.id_alumno 
                    JOIN exp_generales on exp_generales.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_asigna_tutor 
                    ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion JOIN gnral_personales 
                    ON gnral_personales.id_personal=exp_asigna_tutor.id_personal WHERE exp_generales.id_carrera='.$request->id_carrera.' AND 
                    gnral_personales.tipo_usuario='.\Illuminate\Support\Facades\Auth::user()->id.' GROUP BY exp_antecedentes_academicos.teestimula_familia ');

        return response()->json(
            ["catbachillerato"=>array_pluck($bachiller, 'bachillerato'),
                "cantbachillerato"=>array_pluck($bachiller, 'cant'),
                "catotra"=>array_pluck($otraca, 'otra'),
                "cantotra"=>array_pluck($otraca, 'cant'),
                "catgusta"=>array_pluck($gusta, 'gusta'),
                "cantgusta"=>array_pluck($gusta, 'cant'),
                "catestimula"=>array_pluck($estimula, 'estimula'),
                "cantestimula"=>array_pluck($estimula, 'cant'),],200
        );
    }

    ///CORREGIDAS
    public function familiares(Request $request)
    {

        $vive=DB::select('select COUNT(exp_datos_familiares.id_exp_datos_familiares) as 
                cant,exp_opc_vives.desc_opc as vive from exp_opc_vives JOIN exp_datos_familiares 
                ON exp_datos_familiares.id_opc_vives=exp_opc_vives.id_opc_vives JOIN exp_asigna_alumnos 
                ON exp_datos_familiares.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_generales 
                on exp_generales.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_asigna_tutor ON 
                exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion JOIN 
                gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal WHERE 
                exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' and exp_generales.id_carrera='.$request->id_carrera.' AND gnral_personales.tipo_usuario='.\Illuminate\Support\Facades\Auth::user()->id.' 
                GROUP BY exp_opc_vives.desc_opc ');
        $etnia=DB::select('select COUNT(exp_datos_familiares.id_exp_datos_familiares) as cant,
                CASE exp_datos_familiares.etnia_indigena WHEN 1 THEN "Si" WHEN 2 THEN "No" END as etnia from exp_datos_familiares 
                JOIN exp_asigna_alumnos ON exp_datos_familiares.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_generales 
                on exp_generales.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_asigna_tutor ON 
                exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion JOIN gnral_personales ON 
                gnral_personales.id_personal=exp_asigna_tutor.id_personal WHERE exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' and 
                exp_generales.id_carrera='.$request->id_carrera.' AND gnral_personales.tipo_usuario='.\Illuminate\Support\Facades\Auth::user()->id.' GROUP BY exp_datos_familiares.etnia_indigena ');

        $lengua=DB::select('select COUNT(exp_datos_familiares.id_exp_datos_familiares) as cant,
                CASE exp_datos_familiares.hablas_lengua_indigena WHEN 1 THEN "Si" WHEN 2 THEN "No" END as lengua from exp_datos_familiares 
                JOIN exp_asigna_alumnos ON exp_datos_familiares.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_generales 
                on exp_generales.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_asigna_tutor ON 
                exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion JOIN gnral_personales ON 
                gnral_personales.id_personal=exp_asigna_tutor.id_personal WHERE exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' and 
                exp_generales.id_carrera='.$request->id_carrera.' AND gnral_personales.tipo_usuario='.\Illuminate\Support\Facades\Auth::user()->id.' GROUP BY exp_datos_familiares.hablas_lengua_indigena');

        return response()->json(
            ["catvive"=>array_pluck($vive, 'vive'),
                "cantvive"=>array_pluck($vive, 'cant'),
                "catetnia"=>array_pluck($etnia, 'etnia'),
                "cantetnia"=>array_pluck($etnia, 'cant'),
                "catlengua"=>array_pluck($lengua, 'lengua'),
                "cantlengua"=>array_pluck($lengua, 'cant'),
                ],200
        );
    }
    public function habitos(Request $request)
    {
        $intelectual=DB::select('select COUNT(exp_habitos_estudio.id_exp_habitos_estudio) as cant,
                    exp_opc_intelectual.desc_opc as intelectual from exp_opc_intelectual JOIN exp_habitos_estudio ON 
                    exp_habitos_estudio.id_opc_intelectual=exp_opc_intelectual.id_opc_intelectual JOIN exp_asigna_alumnos ON 
                    exp_habitos_estudio.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_generales on 
                    exp_generales.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_asigna_tutor ON 
                    exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion JOIN gnral_personales 
                    ON gnral_personales.id_personal=exp_asigna_tutor.id_personal WHERE exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' 
                    and exp_generales.id_carrera='.$request->id_carrera.' AND gnral_personales.tipo_usuario='.\Illuminate\Support\Facades\Auth::user()->id.' GROUP BY exp_opc_intelectual.desc_opc ');

        $tiempo=DB::select('select COUNT(exp_habitos_estudio.id_exp_habitos_estudio) as cant,
                exp_opc_tiempo.desc_opc as tiempo from exp_opc_tiempo JOIN exp_habitos_estudio ON 
                exp_habitos_estudio.tiempo_empelado_estudiar=exp_opc_tiempo.id_opc_tiempo JOIN exp_asigna_alumnos ON 
                exp_habitos_estudio.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_generales on 
                exp_generales.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_asigna_tutor ON 
                exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion JOIN gnral_personales ON 
                gnral_personales.id_personal=exp_asigna_tutor.id_personal WHERE exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' 
                and exp_generales.id_carrera='.$request->id_carrera.' AND gnral_personales.tipo_usuario='.\Illuminate\Support\Facades\Auth::user()->id.' GROUP BY exp_opc_tiempo.desc_opc ');

        return response()->json(
            ["catintelectual"=>array_pluck($intelectual, 'intelectual'),
                "cantintelectual"=>array_pluck($intelectual, 'cant'),
                "cattiempo"=>array_pluck($tiempo, 'tiempo'),
                "canttiempo"=>array_pluck($tiempo, 'cant'),

            ],200
        );

    }
    public function salud(Request $request)
    {

        $enfermedadc=DB::select('select COUNT(exp_formacion_integral.id_exp_formacion_integral) as cant,
                CASE exp_formacion_integral.enfermedad_cronica WHEN 1 THEN "Si" WHEN 2 THEN "No" END as enfermedadc 
                from exp_formacion_integral JOIN exp_asigna_alumnos ON exp_formacion_integral.id_alumno=exp_asigna_alumnos.id_alumno
                 JOIN exp_generales on exp_generales.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_asigna_tutor ON 
                 exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion JOIN gnral_personales ON
                  gnral_personales.id_personal=exp_asigna_tutor.id_personal WHERE exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' 
                  and exp_generales.id_carrera='.$request->id_carrera.' AND gnral_personales.tipo_usuario='.\Illuminate\Support\Facades\Auth::user()->id.' GROUP BY exp_formacion_integral.enfermedad_cronica ');

        $enfermedadv=DB::select('select COUNT(exp_formacion_integral.id_exp_formacion_integral) as cant,
                CASE exp_formacion_integral.enfer_visual WHEN 1 THEN "Si" WHEN 2 THEN "No" END as enfermedadv 
                from exp_formacion_integral JOIN exp_asigna_alumnos ON exp_formacion_integral.id_alumno=exp_asigna_alumnos.id_alumno
                 JOIN exp_generales on exp_generales.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_asigna_tutor ON 
                 exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion JOIN gnral_personales ON
                  gnral_personales.id_personal=exp_asigna_tutor.id_personal WHERE exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' 
                  and exp_generales.id_carrera='.$request->id_carrera.' AND gnral_personales.tipo_usuario='.\Illuminate\Support\Facades\Auth::user()->id.' GROUP BY exp_formacion_integral.enfer_visual ');

        $lentes=DB::select('select COUNT(exp_formacion_integral.id_exp_formacion_integral) as cant,
                CASE exp_formacion_integral.usas_lentes WHEN 1 THEN "Si" WHEN 2 THEN "No" END as lentes 
                from exp_formacion_integral JOIN exp_asigna_alumnos ON exp_formacion_integral.id_alumno=exp_asigna_alumnos.id_alumno
                 JOIN exp_generales on exp_generales.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_asigna_tutor ON 
                 exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion JOIN gnral_personales ON
                  gnral_personales.id_personal=exp_asigna_tutor.id_personal WHERE exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' 
                  and exp_generales.id_carrera='.$request->id_carrera.' AND gnral_personales.tipo_usuario='.\Illuminate\Support\Facades\Auth::user()->id.' GROUP BY exp_formacion_integral.usas_lentes ');

        return response()->json(
            ["catenfermedadc"=>array_pluck($enfermedadc, 'enfermedadc'),
                "cantenfermedadc"=>array_pluck($enfermedadc, 'cant'),
                "catenfermedadv"=>array_pluck($enfermedadv, 'enfermedadv'),
                "cantenfermedadv"=>array_pluck($enfermedadv, 'cant'),
                "catlentes"=>array_pluck($lentes, 'lentes'),
                "cantlentes"=>array_pluck($lentes, 'cant'),

            ],200
        );

    }

    public function area(Request $request)
    {

        $rendimiento=DB::select('select COUNT(exp_area_psicopedagogica.id_exp_area_psicopedagogica) as 
                cant,exp_escalas.desc_escala as rendimiento from exp_escalas JOIN exp_area_psicopedagogica ON exp_escalas.id_escala=exp_area_psicopedagogica.rendimiento_escolar JOIN exp_asigna_alumnos 
                ON exp_area_psicopedagogica.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_generales 
                on exp_generales.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_asigna_tutor ON 
                exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion JOIN 
                gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal WHERE 
                exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' and exp_generales.id_carrera='.$request->id_carrera.' AND gnral_personales.tipo_usuario='.\Illuminate\Support\Facades\Auth::user()->id.' 
                GROUP BY exp_escalas.desc_escala');

        $computo=DB::select('select COUNT(exp_area_psicopedagogica.id_exp_area_psicopedagogica) as 
                cant,exp_escalas.desc_escala as computo from exp_escalas JOIN exp_area_psicopedagogica ON exp_escalas.id_escala=exp_area_psicopedagogica.conocimiento_compu JOIN exp_asigna_alumnos 
                ON exp_area_psicopedagogica.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_generales 
                on exp_generales.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_asigna_tutor ON 
                exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion JOIN 
                gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal WHERE 
                exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' and exp_generales.id_carrera='.$request->id_carrera.' AND gnral_personales.tipo_usuario='.\Illuminate\Support\Facades\Auth::user()->id.' 
                GROUP BY exp_escalas.desc_escala');

        $comprension=DB::select('select COUNT(exp_area_psicopedagogica.id_exp_area_psicopedagogica) as 
                cant,exp_escalas.desc_escala as comprension from exp_escalas JOIN exp_area_psicopedagogica ON exp_escalas.id_escala=exp_area_psicopedagogica.comprension JOIN exp_asigna_alumnos 
                ON exp_area_psicopedagogica.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_generales 
                on exp_generales.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_asigna_tutor ON 
                exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion JOIN 
                gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal WHERE 
                exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' and exp_generales.id_carrera='.$request->id_carrera.' AND gnral_personales.tipo_usuario='.\Illuminate\Support\Facades\Auth::user()->id.' 
                GROUP BY exp_escalas.desc_escala');
        $preparacion=DB::select('select COUNT(exp_area_psicopedagogica.id_exp_area_psicopedagogica) as 
                cant,exp_escalas.desc_escala as preparacion from exp_escalas JOIN exp_area_psicopedagogica ON exp_escalas.id_escala=exp_area_psicopedagogica.preparacion JOIN exp_asigna_alumnos 
                ON exp_area_psicopedagogica.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_generales 
                on exp_generales.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_asigna_tutor ON 
                exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion JOIN 
                gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal WHERE 
                exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' and exp_generales.id_carrera='.$request->id_carrera.' AND gnral_personales.tipo_usuario='.\Illuminate\Support\Facades\Auth::user()->id.' 
                GROUP BY exp_escalas.desc_escala');

        $concentracion=DB::select('select COUNT(exp_area_psicopedagogica.id_exp_area_psicopedagogica) as 
                cant,exp_escalas.desc_escala as concentracion from exp_escalas JOIN exp_area_psicopedagogica ON exp_escalas.id_escala=exp_area_psicopedagogica.concentracion JOIN exp_asigna_alumnos 
                ON exp_area_psicopedagogica.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_generales 
                on exp_generales.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_asigna_tutor ON 
                exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion JOIN 
                gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal WHERE 
                exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' and exp_generales.id_carrera='.$request->id_carrera.' AND gnral_personales.tipo_usuario='.\Illuminate\Support\Facades\Auth::user()->id.' 
                GROUP BY exp_escalas.desc_escala');
        $trabajo=DB::select('select COUNT(exp_area_psicopedagogica.id_exp_area_psicopedagogica) as 
                cant,exp_escalas.desc_escala as trabajo from exp_escalas JOIN exp_area_psicopedagogica ON exp_escalas.id_escala=exp_area_psicopedagogica.trabajo_equipo JOIN exp_asigna_alumnos 
                ON exp_area_psicopedagogica.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_generales 
                on exp_generales.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_asigna_tutor ON 
                exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion JOIN 
                gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal WHERE 
                exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' and exp_generales.id_carrera='.$request->id_carrera.' AND gnral_personales.tipo_usuario='.\Illuminate\Support\Facades\Auth::user()->id.' 
                GROUP BY exp_escalas.desc_escala');


        return response()->json(
            ["catrendimiento"=>array_pluck($rendimiento, 'rendimiento'),
                "cantrendimiento"=>array_pluck($rendimiento, 'cant'),
                "catcomputo"=>array_pluck($computo, 'computo'),
                "cantcomputo"=>array_pluck($computo, 'cant'),
                "catcomprension"=>array_pluck($comprension, 'comprension'),
                "cantcomprension"=>array_pluck($comprension, 'cant'),
                "catpreparacion"=>array_pluck($preparacion, 'preparacion'),
                "cantpreparacion"=>array_pluck($preparacion, 'cant'),
                "catconcentracion"=>array_pluck($concentracion, 'concentracion'),
                "cantconcentracion"=>array_pluck($concentracion, 'cant'),
                "cattrabajo"=>array_pluck($trabajo, 'trabajo'),
                "canttrabajo"=>array_pluck($trabajo, 'cant'),

            ],200
        );

    }

    public function getAll(){
        $datos=Grafica::getGraficasTutor();
        //dd($datos);
        //$datosAlum=Profesor::getAlumnos();
        //dd($datos);
        return $datos;
    }

    public function updateEstado(Request $request){
        //dd($request);
        //Alumno::updateEst($request);
        //return redirect('profesor');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
