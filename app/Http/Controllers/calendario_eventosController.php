<?php

namespace App\Http\Controllers;
use App\Plan_actividades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class calendario_eventosController extends Controller
{

    public function index()
    {
      /*  $evento = DB::select('SELECT DISTINCT desc_actividad, objetivo_actividad, fi_actividad, ff_actividad, estrategia from plan_actividades,
plan_planeacion, plan_asigna_planeacion_actividad, plan_asigna_planeacion_tutor, exp_asigna_generacion, exp_asigna_tutor, exp_asigna_alumnos 
where id_alumno=10
and plan_asigna_planeacion_actividad.id_planeacion=plan_planeacion.id_planeacion
and plan_asigna_planeacion_actividad.id_plan_actividad=plan_actividades.id_plan_actividad
and plan_asigna_planeacion_tutor.id_asigna_planaeacion_actividad=plan_asigna_planeacion_actividad.id_asigna_planeacion_actividad
and plan_asigna_planeacion_tutor.id_asigna_tutor=exp_asigna_tutor.id_asigna_tutor');
        $evento1 = DB::select('select *
                              FROM eventos;');*/

        $id=Auth::user()->email;
        $evento=Plan_actividades::join('plan_asigna_planeacion_actividad','plan_asigna_planeacion_actividad.id_plan_actividad','=','plan_actividades.id_plan_actividad')
            ->join('plan_planeacion','plan_planeacion.id_planeacion','=','plan_asigna_planeacion_actividad.id_planeacion')
            ->join('plan_asigna_planeacion_tutor','plan_asigna_planeacion_tutor.id_asigna_planeacion_actividad','=',
                'plan_asigna_planeacion_actividad.id_asigna_planeacion_actividad')
            ->join('exp_asigna_generacion','exp_asigna_generacion.id_generacion','=','plan_planeacion.id_generacion')
            ->join('exp_asigna_alumnos','exp_asigna_alumnos.id_asigna_generacion','=','exp_asigna_generacion.id_asigna_generacion')
            ->join('gnral_alumnos','exp_asigna_alumnos.id_alumno' , '=',  'gnral_alumnos.id_alumno')
            ->join('users','gnral_alumnos.id_usuario', '=', 'users.id')
            ->where('users.email','=',$id)
            ->where('plan_asigna_planeacion_actividad.id_estado','=', 1)
            -> select('plan_actividades.desc_actividad', 'plan_actividades.objetivo_actividad',
                'plan_actividades.fi_actividad', 'plan_actividades.ff_actividad','plan_asigna_planeacion_tutor.estrategia',
                'plan_asigna_planeacion_tutor.requiere_evidencia')
            ->get();


       /* $evento=DB::table('plan_actividades')
            ->join('plan_asigna_planeacion_actividad','plan_asigna_planeacion_actividad.id_plan_actividad','=','plan_actividades.id_plan_actividad')
            ->join('plan_planeacion','plan_planeacion.id_planeacion','=','plan_asigna_planeacion_actividad.id_planeacion')
            ->join('plan_asigna_planeacion_tutor','plan_asigna_planeacion_tutor.id_asigna_planaeacion_actividad','=',
                'plan_asigna_planeacion_actividad.id_asigna_planeacion_actividad')
            ->join('plan_asigna_evidencias','plan_asigna_evidencias.id_asigna_planeacion_tutor','=','plan_asigna_planeacion_tutor.id_asigna_planeacion_tutor')
            ->join('exp_asigna_tutor','exp_asigna_tutor.id_asigna_tutor','=','plan_asigna_planeacion_tutor.id_asigna_tutor')
            ->join('gnral_alumnos','gnral_alumnos.id_alumno','=','plan_asigna_evidencias.id_alumno')
            ->join('users', 'users.email', '=', 'gnral_alumnos.correo_al')
            ->where('users.email','=',$id)
            -> select('plan_actividades.desc_actividad', 'plan_actividades.objetivo_actividad',
                'plan_actividades.fi_actividad', 'plan_actividades.ff_actividad')
            ->get();*/


        return view('calendario_eventos.calendario_eventos')->with(compact( 'evento'));
    }


}
