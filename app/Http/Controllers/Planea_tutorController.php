<?php
namespace App\Http\Controllers;

use App\actividades;
use Illuminate\Http\Request;
use DB;
use App\Planeacion;
class Planea_tutorController extends Controller
{
    public function index()
    {
        $tabla=DB::select('SELECT gnral_semestres.id_semestre as id, gnral_semestres.descripcion as sem, planeacion.comentarios,planeacion.id_planeacion,planeacion.desc_actividad,planeacion.objetivo,planeacion.instrucciones, planeacion.comentarios
                                      from gnral_personales,gnral_carreras,gnral_semestres,asigna_tutor,asigna_planeacion_actividad,planeacion
                                        where gnral_personales.id_personal=asigna_tutor.id_personal 
                                        and gnral_carreras.id_carrera=asigna_tutor.id_carrera
                                        and gnral_semestres.id_semestre=asigna_tutor.id_semestre
                                        and asigna_planeacion_actividad.id_asigna_tutor=asigna_tutor.id_asigna_tutor
                                        and planeacion.id_semestre=asigna_tutor.id_semestre
                                        and planeacion.id_estado=1 GROUP BY planeacion.id_semestre');

        $tabla1=DB::select('SELECT planeacion.id_semestre as id, gnral_semestres.descripcion as sem, planeacion.sugerencia,planeacion.id_planeacion,planeacion.desc_actividad,planeacion.objetivo,planeacion.instrucciones, planeacion.comentarios,planeacion.id_sugerencia
                                      from gnral_personales,gnral_carreras,gnral_semestres,asigna_tutor,asigna_planeacion_actividad,planeacion
                                        where gnral_personales.id_personal=asigna_tutor.id_personal 
                                        and gnral_carreras.id_carrera=asigna_tutor.id_carrera
                                        and gnral_semestres.id_semestre=asigna_tutor.id_semestre
                                        and asigna_planeacion_actividad.id_asigna_tutor=asigna_tutor.id_asigna_tutor
                                        and planeacion.id_semestre=asigna_tutor.id_semestre
                                        and planeacion.id_estado=1');
        $actividades=actividades::all();

        return view('profesor.planeacion',compact('tabla','tabla1','actividades'));
    }


    public function update(Request $request, $id)
    {
        $plan = Planeacion::find($id);
        $plan->id_estado = $request->id_estado;
        $plan->comentarios = $request->get('comentarios');
        $plan->sugerencia = $request->get('sugerencia');
        $plan->id_sugerencia = $request->get('id_sugerencia');
        $plan->save();
        return redirect()->back();
    }

}
