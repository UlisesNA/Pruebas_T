<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\VarDumper\Dumper\esc;

class SeguimientoPlanController extends Controller
{

    public function store(Request $request)
    {
        
    }

    public  function archivos(Request $request)
    {
        $data['va']=DB::select('SELECT plan_asigna_evidencias.id_alumno,plan_asigna_evidencias.evidencia,plan_actividades.desc_actividad
                                FROM plan_asigna_evidencias,gnral_alumnos,plan_asigna_planeacion_tutor,plan_asigna_planeacion_actividad,
                                plan_actividades,exp_asigna_alumnos
                                WHERE plan_asigna_evidencias.id_alumno=gnral_alumnos.id_alumno 
                                AND plan_asigna_evidencias.id_asigna_planeacion_tutor=plan_asigna_planeacion_tutor.id_asigna_planeacion_tutor
                                AND plan_asigna_planeacion_tutor.id_asigna_planeacion_actividad=plan_asigna_planeacion_actividad.id_asigna_planeacion_actividad
                                AND plan_asigna_planeacion_actividad.id_plan_actividad=plan_actividades.id_plan_actividad
                                AND exp_asigna_alumnos.id_alumno=gnral_alumnos.id_alumno
                                AND exp_asigna_alumnos.id_asigna_generacion=plan_asigna_planeacion_actividad.id_asigna_generacion
                                AND exp_asigna_alumnos.id_asigna_generacion=plan_asigna_planeacion_tutor.id_asigna_generacion
                                AND exp_asigna_alumnos.deleted_at is NULL
                                AND plan_asigna_evidencias.id_alumno='.$request->id);

        return $data;
    }

    public function show($id)
    {

    }
    public function edit($id)
    {

    }
    public function cerrar()
    {
        Session::flush();
    }
    public function update(Request $request, $id)
    {

    }
    public function destroy($id)
    {

    }
}
