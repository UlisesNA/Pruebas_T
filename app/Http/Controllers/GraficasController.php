<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Profesor;
use App\Grafica;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
        return view('profesor.estadisticas');
    }
    public function genero(Request $request)
    {
        ///ALUMNOS EXPEDIENTE LLENO
        ///
        $alumnos=DB::select('Select (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' and gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="M") as M, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' and gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="F") as F');
        $totalcontestaron=$alumnos[0]->M+$alumnos[0]->F;
        Session::put('total_alumnos',$totalcontestaron==0?1:$totalcontestaron);
        Session::put('total_mujeres',$alumnos[0]->F==0?1:$alumnos[0]->F);
        Session::put('total_hombres',$alumnos[0]->M==0?1:$alumnos[0]->M);

        ///ALUMNOS TOTALES
        $datos=DB::select('SELECT (select count(gnral_alumnos.id_alumno) as Masculino FROM gnral_alumnos 
        JOIN exp_asigna_alumnos ON gnral_alumnos.id_alumno=exp_asigna_alumnos.id_alumno 
        JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion 
        JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal 
        WHERE gnral_alumnos.genero="M" AND exp_asigna_alumnos.deleted_at is null AND gnral_alumnos.id_carrera='.$request->id_carrera.' AND 
        exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.')  as MAS,
         (select count(gnral_alumnos.id_alumno) as Femenino FROM gnral_alumnos 
        JOIN exp_asigna_alumnos ON gnral_alumnos.id_alumno=exp_asigna_alumnos.id_alumno 
        JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion 
        JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal 
        WHERE gnral_alumnos.genero="F" AND exp_asigna_alumnos.deleted_at is null AND gnral_alumnos.id_carrera='.$request->id_carrera.' AND 
        exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.') as FEM');

        $total=$datos[0]->MAS+$datos[0]->FEM;

        return response()->json(
            [["name"=>"Masculino","y"=>round(($datos[0]->MAS)*100/$total)],
                ["name"=>"Femenino","y"=>round(($datos[0]->FEM)*100/$total)]],200
        );
    }

    public function generales(Request $request)
    {
        ////TOTAL ALUMNOS RESPONDIO///
         ///ESTADO CIVIL///
        $estadogen=DB::select('SELECT (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.id_estado_civil=1) as soltero, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.id_estado_civil=2) as casado,(select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.id_estado_civil=3) as unionlibre,(select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.id_estado_civil=4) as divorsiado, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.id_estado_civil=5) as viudo');
        $estadoF=DB::select('SELECT (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.id_estado_civil=1 and exp_generales.sexo="F") as soltero, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.id_estado_civil=2 and exp_generales.sexo="F") as casado,(select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.id_estado_civil=3 and exp_generales.sexo="F") as unionlibre,(select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.id_estado_civil=4 and exp_generales.sexo="F") as divorsiado, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.id_estado_civil=5 and exp_generales.sexo="F") as viudo');
        $estadoM=DB::select('SELECT (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.id_estado_civil=1 and exp_generales.sexo="M") as soltero, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.id_estado_civil=2 and exp_generales.sexo="M") as casado,(select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.id_estado_civil=3 and exp_generales.sexo="M") as unionlibre,(select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.id_estado_civil=4 and exp_generales.sexo="M") as divorsiado, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.id_estado_civil=5 and exp_generales.sexo="M") as viudo');

        $nivelgen=DB::select('Select (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.nivel_economico="A/B") as AB, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.nivel_economico="C+") as CC,(select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.nivel_economico="C") as C, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.nivel_economico="C-") as CCC, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.nivel_economico="D+") as DD, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.nivel_economico="D") as D,  (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.nivel_economico="E") as E');
        $nivelF=DB::select('Select (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="F" AND exp_generales.nivel_economico="A/B") as AB, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="F" AND exp_generales.nivel_economico="C+") as CC,(select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="F" AND exp_generales.nivel_economico="C") as C, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="F" AND exp_generales.nivel_economico="C-") as CCC, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="F" AND exp_generales.nivel_economico="D+") as DD, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="F" AND exp_generales.nivel_economico="D") as D,  (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="F" AND exp_generales.nivel_economico="E") as E');
        $nivelM=DB::select('Select (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="M" AND exp_generales.nivel_economico="A/B") as AB, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="M" AND exp_generales.nivel_economico="C+") as CC,(select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="M" AND exp_generales.nivel_economico="C") as C, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="M" AND exp_generales.nivel_economico="C-") as CCC, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="M" AND exp_generales.nivel_economico="D+") as DD, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="M" AND exp_generales.nivel_economico="D") as D,  (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="M" AND exp_generales.nivel_economico="E") as E');

        $trabajagen=DB::select('SELECT (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.trabaja=1) as SI, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.trabaja=2) as NOO');
        $trabajaF=DB::select('SELECT (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="F" AND exp_generales.trabaja=1) as SI, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="F" AND exp_generales.trabaja=2) as NOO');
        $trabajaM=DB::select('SELECT (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="M" AND exp_generales.trabaja=1) as SI, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="M" AND exp_generales.trabaja=2) as NOO');

        $academicogen=DB::select('SELECT (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.estado=1) as R, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.estado=2) as I, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.estado=3) as S, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.estado=4) as BJ, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.estado=5) as BD');
        $academicoF=DB::select('SELECT (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="F" AND exp_generales.estado=1) as R, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="F" AND exp_generales.estado=2) as I, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="F" AND exp_generales.estado=3) as S, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="F" AND exp_generales.estado=4) as BJ, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="F" AND exp_generales.estado=5) as BD');
        $academicoM=DB::select('SELECT (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="M" AND exp_generales.estado=1) as R, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="M" AND exp_generales.estado=2) as I, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="M" AND exp_generales.estado=3) as S, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="M" AND exp_generales.estado=4) as BJ, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="M" AND exp_generales.estado=5) as BD');

        $becagen=DB::select('SELECT (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.beca=1) as SI, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.beca=2) as NOO');
        $becaF=DB::select('SELECT (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="F" AND exp_generales.beca=1) as SI, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="F" AND exp_generales.beca=2) as NOO');
        $becaM=DB::select('SELECT (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="M" AND exp_generales.beca=1) as SI, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="M" AND exp_generales.beca=2) as NOO');

        $tbecagen=DB::select('SELECT (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.id_expbeca=1) as Ma, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.id_expbeca=2) as Be, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.id_expbeca=3) as Pe, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.id_expbeca=4) as Ea');
        $tbecaF=DB::select('SELECT (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="F" AND exp_generales.id_expbeca=1) as Ma, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="F" AND exp_generales.id_expbeca=2) as Be, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="F" AND exp_generales.id_expbeca=3) as Pe, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="F" AND exp_generales.id_expbeca=4) as Ea');
        $tbecaM=DB::select('SELECT (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="M" AND exp_generales.id_expbeca=1) as Ma, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="M" AND exp_generales.id_expbeca=2) as Be, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="M" AND exp_generales.id_expbeca=3) as Pe, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="M" AND exp_generales.id_expbeca=4) as Ea');

        $hijosgen=DB::select('SELECT (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.no_hijos=1) as C, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.no_hijos=2) as U, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.no_hijos=3) as D, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.no_hijos=4) as T, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.no_hijos=5) as M');
        $hijosF=DB::select('SELECT (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="F" AND exp_generales.no_hijos=1) as C, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="F" AND exp_generales.no_hijos=2) as U, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="F" AND exp_generales.no_hijos=3) as D, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="F" AND exp_generales.no_hijos=4) as T, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="F" AND exp_generales.no_hijos=5) as M');
        $hijosM=DB::select('SELECT (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="M" AND exp_generales.no_hijos=1) as C, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="M" AND exp_generales.no_hijos=2) as U, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="M" AND exp_generales.no_hijos=3) as D, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="M" AND exp_generales.no_hijos=4) as T, (select COUNT(exp_generales.id_exp_general)
                      FROM exp_generales
                     JOIN exp_asigna_alumnos ON exp_generales.id_alumno=exp_asigna_alumnos.id_alumno 
                     JOIN exp_asigna_tutor ON exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion  
                     JOIN gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal
                      WHERE  exp_generales.id_carrera='.$request->id_carrera.' AND exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' AND gnral_personales.tipo_usuario='.Auth::user()->id.' AND exp_generales.sexo="M" AND exp_generales.no_hijos=5) as M');

        return response()->json(
            [
                [
                    [
                       ["name"=>"Soltero","y"=>round(($estadogen[0]->soltero)*100/Session::get('total_alumnos'))],["name"=>"Casado","y"=>round(($estadogen[0]->casado)*100/Session::get('total_alumnos'))],["name"=>"Unión libre","y"=>round(($estadogen[0]->unionlibre)*100/Session::get('total_alumnos'))],["name"=>"Divorsiado","y"=>round(($estadogen[0]->divorsiado)*100/Session::get('total_alumnos'))],["name"=>"Viudo","y"=>round(($estadogen[0]->viudo)*100/Session::get('total_alumnos'))]
                    ],
                    [
                        ["name"=>"Soltero","y"=>round(($estadoF[0]->soltero)*100/Session::get('total_mujeres'))],["name"=>"Casado","y"=>round(($estadoF[0]->casado)*100/Session::get('total_mujeres'))],["name"=>"Unión libre","y"=>round(($estadoF[0]->unionlibre)*100/Session::get('total_mujeres'))],["name"=>"Divorsiado","y"=>round(($estadoF[0]->divorsiado)*100/Session::get('total_mujeres'))],["name"=>"Viudo","y"=>round(($estadoF[0]->viudo)*100/Session::get('total_mujeres'))]
                    ],
                    [
                        ["name"=>"Soltero","y"=>round(($estadoM[0]->soltero)*100/Session::get('total_hombres'))],["name"=>"Casado","y"=>round(($estadoM[0]->casado)*100/Session::get('total_hombres'))],["name"=>"Unión libre","y"=>round(($estadoM[0]->unionlibre)*100/Session::get('total_hombres'))],["name"=>"Divorsiado","y"=>round(($estadoM[0]->divorsiado)*100/Session::get('total_hombres'))],["name"=>"Viudo","y"=>round(($estadoM[0]->viudo)*100/Session::get('total_hombres'))]
                    ]
                ],
                [
                    [
                        ["name"=>"A/B","y"=>round(($nivelgen[0]->AB)*100/Session::get('total_alumnos'))],["name"=>"C+","y"=>round(($nivelgen[0]->CC)*100/Session::get('total_alumnos'))],["name"=>"C","y"=>round(($nivelgen[0]->C)*100/Session::get('total_alumnos'))],["name"=>"C-","y"=>round(($nivelgen[0]->CCC)*100/Session::get('total_alumnos'))],["name"=>"D+","y"=>round(($nivelgen[0]->DD)*100/Session::get('total_alumnos'))],["name"=>"D","y"=>round(($nivelgen[0]->D)*100/Session::get('total_alumnos'))],["name"=>"E","y"=>round(($nivelgen[0]->E)*100/Session::get('total_alumnos'))]
                    ],
                    [
                        ["name"=>"A/B","y"=>round(($nivelF[0]->AB)*100/Session::get('total_mujeres'))],["name"=>"C+","y"=>round(($nivelF[0]->CC)*100/Session::get('total_mujeres'))],["name"=>"C","y"=>round(($nivelF[0]->C)*100/Session::get('total_mujeres'))],["name"=>"C-","y"=>round(($nivelF[0]->CCC)*100/Session::get('total_mujeres'))],["name"=>"D+","y"=>round(($nivelF[0]->DD)*100/Session::get('total_mujeres'))],["name"=>"D","y"=>round(($nivelF[0]->D)*100/Session::get('total_mujeres'))],["name"=>"E","y"=>round(($nivelF[0]->E)*100/Session::get('total_mujeres'))]
                    ],
                    [
                        ["name"=>"A/B","y"=>round(($nivelM[0]->AB)*100/Session::get('total_hombres'))],["name"=>"C+","y"=>round(($nivelM[0]->CC)*100/Session::get('total_hombres'))],["name"=>"C","y"=>round(($nivelM[0]->C)*100/Session::get('total_hombres'))],["name"=>"C-","y"=>round(($nivelM[0]->CCC)*100/Session::get('total_hombres'))],["name"=>"D+","y"=>round(($nivelM[0]->DD)*100/Session::get('total_hombres'))],["name"=>"D","y"=>round(($nivelM[0]->D)*100/Session::get('total_hombres'))],["name"=>"E","y"=>round(($nivelM[0]->E)*100/Session::get('total_hombres'))]
                    ],
                ],
                [
                    [
                        ["name"=>"Si","y"=>round(($trabajagen[0]->SI)*100/Session::get('total_alumnos'))],["name"=>"No","y"=>round(($trabajagen[0]->NOO)*100/Session::get('total_alumnos'))]
                    ],
                    [
                        ["name"=>"Si","y"=>round(($trabajaF[0]->SI)*100/Session::get('total_mujeres'))],["name"=>"No","y"=>round(($trabajaF[0]->NOO)*100/Session::get('total_mujeres'))]
                    ],
                    [
                        ["name"=>"Si","y"=>round(($trabajaM[0]->SI)*100/Session::get('total_hombres'))],["name"=>"No","y"=>round(($trabajaM[0]->NOO)*100/Session::get('total_hombres'))]
                    ]
                ],
                [
                    [
                        ["name"=>"Regular","y"=>round(($academicogen[0]->R)*100/Session::get('total_alumnos'))],["name"=>"Irregular","y"=>round(($academicogen[0]->I)*100/Session::get('total_alumnos'))],["name"=>"Suspensión","y"=>round(($academicogen[0]->S)*100/Session::get('total_alumnos'))],["name"=>"Baja temporal","y"=>round(($academicogen[0]->BJ)*100/Session::get('total_alumnos'))],["name"=>"Baja definitiva","y"=>round(($academicogen[0]->BD)*100/Session::get('total_alumnos'))]
                    ],
                    [
                        ["name"=>"Regular","y"=>round(($academicoF[0]->R)*100/Session::get('total_mujeres'))],["name"=>"Irregular","y"=>round(($academicoF[0]->I)*100/Session::get('total_mujeres'))],["name"=>"Suspensión","y"=>round(($academicoF[0]->S)*100/Session::get('total_mujeres'))],["name"=>"Baja temporal","y"=>round(($academicoF[0]->BJ)*100/Session::get('total_mujeres'))],["name"=>"Baja definitiva","y"=>round(($academicoF[0]->BD)*100/Session::get('total_mujeres'))]
                    ],
                    [
                        ["name"=>"Regular","y"=>round(($academicoM[0]->R)*100/Session::get('total_hombres'))],["name"=>"Irregular","y"=>round(($academicoM[0]->I)*100/Session::get('total_hombres'))],["name"=>"Suspensión","y"=>round(($academicoM[0]->S)*100/Session::get('total_hombres'))],["name"=>"Baja temporal","y"=>round(($academicoM[0]->BJ)*100/Session::get('total_hombres'))],["name"=>"Baja definitiva","y"=>round(($academicoM[0]->BD)*100/Session::get('total_hombres'))]
                    ]
                ],
                [
                    [
                        ["name"=>"Si","y"=>round(($becagen[0]->SI)*100/Session::get('total_alumnos'))],["name"=>"No","y"=>round(($becagen[0]->NOO)*100/Session::get('total_alumnos'))]
                    ],
                    [
                        ["name"=>"Si","y"=>round(($becaF[0]->SI)*100/Session::get('total_mujeres'))],["name"=>"No","y"=>round(($becaF[0]->NOO)*100/Session::get('total_mujeres'))]
                    ],
                    [
                        ["name"=>"Si","y"=>round(($becaM[0]->SI)*100/Session::get('total_hombres'))],["name"=>"No","y"=>round(($becaM[0]->NOO)*100/Session::get('total_hombres'))]
                    ]
                ],
                [
                    [
                        ["name"=>"Manutención Federal","y"=>round(($tbecagen[0]->Ma)*100/($becagen[0]->SI==0?1:$becagen[0]->SI))],["name"=>"Benito Juárez","y"=>round(($tbecagen[0]->Be)*100/($becagen[0]->SI==0?1:$becagen[0]->SI))],["name"=>"Permanencia","y"=>round(($tbecagen[0]->Pe)*100/($becagen[0]->SI==0?1:$becagen[0]->SI))],["name"=>"Excelencia Académica","y"=>round(($tbecagen[0]->Ea)*100/($becagen[0]->SI==0?1:$becagen[0]->SI))]
                    ],
                    [
                        ["name"=>"Manutención Federal","y"=>round(($tbecaF[0]->Ma)*100/($becaF[0]->SI==0?1:$becaF[0]->SI))],["name"=>"Benito Juárez","y"=>round(($tbecaF[0]->Be)*100/($becaF[0]->SI==0?1:$becaF[0]->SI))],["name"=>"Permanencia","y"=>round(($tbecaF[0]->Pe)*100/($becaF[0]->SI==0?1:$becaF[0]->SI))],["name"=>"Excelencia Académica","y"=>round(($tbecaF[0]->Ea)*100/($becaF[0]->SI==0?1:$becaF[0]->SI))]
                    ],
                    [
                        ["name"=>"Manutención Federal","y"=>round(($tbecaM[0]->Ma)*100/($becaM[0]->SI==0?1:$becaM[0]->SI))],["name"=>"Benito Juárez","y"=>round(($tbecaM[0]->Be)*100/($becaM[0]->SI==0?1:$becaM[0]->SI))],["name"=>"Permanencia","y"=>round(($tbecaM[0]->Pe)*100/($becaM[0]->SI==0?1:$becaM[0]->SI))],["name"=>"Excelencia Académica","y"=>round(($tbecaM[0]->Ea)*100/($becaM[0]->SI==0?1:$becaM[0]->SI))]
                    ]
                ],
                [
                    [
                        ["name"=>"0","y"=>round(($hijosgen[0]->C)*100/Session::get('total_alumnos'))],["name"=>"1","y"=>round(($hijosgen[0]->U)*100/Session::get('total_alumnos'))],["name"=>"2","y"=>round(($hijosgen[0]->D)*100/Session::get('total_alumnos'))],["name"=>"3","y"=>round(($hijosgen[0]->T)*100/Session::get('total_alumnos'))],["name"=>"4 o más","y"=>round(($hijosgen[0]->M)*100/Session::get('total_alumnos'))]
                    ],
                    [
                        ["name"=>"0","y"=>round(($hijosF[0]->C)*100/Session::get('total_mujeres'))],["name"=>"1","y"=>round(($hijosF[0]->U)*100/Session::get('total_mujeres'))],["name"=>"2","y"=>round(($hijosF[0]->D)*100/Session::get('total_mujeres'))],["name"=>"3","y"=>round(($hijosF[0]->T)*100/Session::get('total_mujeres'))],["name"=>"4 o más","y"=>round(($hijosF[0]->M)*100/Session::get('total_mujeres'))]
                    ],
                    [
                        ["name"=>"0","y"=>round(($hijosM[0]->C)*100/Session::get('total_hombres'))],["name"=>"1","y"=>round(($hijosM[0]->U)*100/Session::get('total_hombres'))],["name"=>"2","y"=>round(($hijosM[0]->D)*100/Session::get('total_hombres'))],["name"=>"3","y"=>round(($hijosM[0]->T)*100/Session::get('total_hombres'))],["name"=>"4 o más","y"=>round(($hijosM[0]->M)*100/Session::get('total_hombres'))]
                    ]
                ]
            ],200
        );


/*


         $trabaja=DB::select('select COUNT(exp_generales.id_exp_general) as cant,CASE exp_generales.trabaja 
                    WHEN 1 THEN "Si" WHEN 2 THEN "No" END as trabajo FROM exp_generales JOIN exp_asigna_alumnos ON 
                    exp_generales.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_asigna_tutor ON 
                    exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion JOIN gnral_personales ON 
                    gnral_personales.id_personal=exp_asigna_tutor.id_personal WHERE exp_generales.id_carrera='.$request->id_carrera.' AND 
                    gnral_personales.tipo_usuario='.Auth::user()->id.' GROUP BY exp_generales.trabaja ');
        $beca=DB::select('select COUNT(exp_generales.id_exp_general) as cant,CASE exp_generales.beca 
                    WHEN 1 THEN "Si" WHEN 2 THEN "No" END as beca FROM exp_generales JOIN exp_asigna_alumnos ON 
                    exp_generales.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_asigna_tutor ON 
                    exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion JOIN gnral_personales ON 
                    gnral_personales.id_personal=exp_asigna_tutor.id_personal WHERE exp_generales.id_carrera='.$request->id_carrera.' AND 
                    gnral_personales.tipo_usuario='.Auth::user()->id.' GROUP BY exp_generales.beca ');

        $estado=DB::select('select COUNT(exp_generales.id_exp_general) as cant,CASE exp_generales.estado 
                    WHEN 1 THEN "Regular" WHEN 2 THEN "Irregular" END as estado FROM exp_generales JOIN exp_asigna_alumnos ON 
                    exp_generales.id_alumno=exp_asigna_alumnos.id_alumno JOIN exp_asigna_tutor ON 
                    exp_asigna_tutor.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion JOIN gnral_personales ON 
                    gnral_personales.id_personal=exp_asigna_tutor.id_personal WHERE exp_generales.id_carrera='.$request->id_carrera.' AND 
                    gnral_personales.tipo_usuario='.Auth::user()->id.' GROUP BY exp_generales.estado ');

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
        );*/
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
