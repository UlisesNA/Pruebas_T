<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TutorExpedienteController extends Controller
{
    //

    public function mostrar(Request $request)
    {

        $datos=DB::select('SELECT exp_antecedentes_academicos.*,exp_area_psicopedagogica.*, 
         exp_generales.*,exp_datos_familiares.*,exp_formacion_integral.*, 
         exp_habitos_estudio.* from exp_asigna_expediente JOIN exp_antecedentes_academicos on 
         exp_antecedentes_academicos.id_exp_antecedentes_academicos=exp_asigna_expediente.id_exp_antecedentes_academicos
        JOIN exp_area_psicopedagogica on exp_area_psicopedagogica.id_exp_area_psicopedagogica=exp_asigna_expediente.id_exp_area_psicopedagogica 
        join exp_generales on exp_generales.id_exp_general=exp_asigna_expediente.id_exp_general JOIN exp_datos_familiares 
        on exp_datos_familiares.id_exp_datos_familiares=exp_asigna_expediente.id_exp_datos_familiares JOIN
         exp_formacion_integral on exp_formacion_integral.id_exp_formacion_integral=exp_asigna_expediente.id_exp_formacion_integral 
         JOIN exp_habitos_estudio ON exp_habitos_estudio.id_exp_habitos_estudio=exp_asigna_expediente.id_exp_habitos_estudio 
         JOIN gnral_alumnos on gnral_alumnos.id_alumno=exp_asigna_expediente.id_alumno where gnral_alumnos.id_alumno='.$request->id_alumno);
        $carreras=DB::table('gnral_carreras')->get();
        $grupos=DB::table('gnral_grupos')->get();
        $periodos= DB::table('gnral_periodos')->get();

        //return $datos;


        $dato=[$carreras,$grupos,$periodos,$datos];


        return view('alumnos.update');


    }
}
