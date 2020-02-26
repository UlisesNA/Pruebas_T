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

        $id=Auth::user()->email;
        $evento=Plan_actividades::join('plan_asigna_planeacion_actividad','plan_asigna_planeacion_actividad.id_plan_actividad','=','plan_actividades.id_plan_actividad')
           // ->join('plan_planeacion','plan_planeacion.id_planeacion','=','plan_asigna_planeacion_actividad.id_planeacion')
            ->join('plan_asigna_planeacion_tutor','plan_asigna_planeacion_tutor.id_asigna_planeacion_actividad','=','plan_asigna_planeacion_actividad.id_asigna_planeacion_actividad')
            ->join('exp_asigna_generacion','exp_asigna_generacion.id_generacion','=','plan_actividades.id_generacion')
            ->join('exp_asigna_alumnos','exp_asigna_alumnos.id_asigna_generacion','=','exp_asigna_generacion.id_asigna_generacion')


            ->join('exp_asigna_tutor', function ($join){
                $join->on('exp_asigna_tutor.id_asigna_tutor','=','plan_asigna_planeacion_tutor.id_asigna_generacion');
                //   ->where('exp_asigna_tutor.id_asigna_generacion','=','exp_asigna_generacion.id_asigna_generacion');
            })
            //id alumno
            ->join('gnral_alumnos','exp_asigna_alumnos.id_alumno' , '=',  'gnral_alumnos.id_alumno')
            ->join('users','gnral_alumnos.id_usuario', '=', 'users.id')
            ->where('users.email','=',$id)

            ->whereRaw("exp_asigna_tutor.id_asigna_generacion=exp_asigna_generacion.id_asigna_generacion")

            ->where('plan_asigna_planeacion_actividad.id_estado','=', 1)
            ->where('plan_asigna_planeacion_tutor.id_estrategia','=', 2)
            ->whereNull ('exp_asigna_alumnos.deleted_at')
            ->whereNull('exp_asigna_tutor.deleted_at')

            ->select('plan_actividades.desc_actividad', 'plan_actividades.objetivo_actividad',
                'plan_actividades.fi_actividad', 'plan_actividades.ff_actividad','plan_asigna_planeacion_tutor.estrategia','plan_asigna_planeacion_tutor.requiere_evidencia',
                'plan_asigna_planeacion_tutor.id_asigna_planeacion_tutor',
                'exp_asigna_tutor.id_asigna_generacion','exp_asigna_generacion.id_asigna_generacion as id_asigna_generacion2')
            ->get();

        return view('calendario_eventos.calendario_eventos')->with(compact( 'evento'));
    }


}
