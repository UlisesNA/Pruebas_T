<?php
namespace App\Http\Controllers;
use App\Exp_asigna_generacion;
use App\Plan_asigna_planeacion_actividad;
use App\Plan_Planeacion;
use App\Planeacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class Dep_desarrolloController extends Controller
{
    public function index(Request $request)
    {
        $tabla=Exp_asigna_generacion::getGeneraciont1();
        $tabla1=Exp_asigna_generacion::getDatos();
        return view('dep_desarrollo.index',compact('tabla','tabla1'));
    }

    public function update(Request $request, $id)
    {
        $num=DB::select('SELECT plan_asigna_planeacion_actividad.id_asigna_planeacion_actividad
        FROM plan_asigna_planeacion_actividad,plan_actividades
        WHERE plan_actividades.deleted_at is null
        AND plan_actividades.id_plan_actividad=plan_asigna_planeacion_actividad.id_plan_actividad
        AND plan_asigna_planeacion_actividad.id_plan_actividad='.$id);
        //dd($num);

        $ic=count($num);
        for ($i = 0; $i <$ic; $i++) {
            $plan = Plan_asigna_planeacion_actividad::find($num[$i]->id_asigna_planeacion_actividad);
            $plan->id_estado = $request->id_estado;
            $plan->save();
        }

        return redirect()->back();
    }
}
