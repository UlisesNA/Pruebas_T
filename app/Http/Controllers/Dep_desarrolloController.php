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
        //$tabla=Exp_asigna_generacion::getGeneraciont1();
        ///$tabla1=Exp_asigna_generacion::getDatos();
        return view('dep_desarrollo.index');
    }
    public  function generacion()
    {
        //dd(Session::get('id_periodo'));
        $datos=DB::select('SELECT exp_asigna_generacion.*,exp_generacion.generacion
            FROM exp_asigna_generacion,exp_generacion,exp_asigna_tutor
            WHERE exp_asigna_generacion.id_generacion=exp_generacion.id_generacion
            AND exp_asigna_generacion.deleted_at is null
            and exp_asigna_generacion.id_jefe_periodo=exp_asigna_tutor.id_jefe_periodo
            GROUP BY exp_generacion.generacion ASC');

        return $datos;
    }

    public  function actividades(Request $request)
    {
        $datos=DB::select('SELECT plan_actividades.id_plan_actividad,plan_actividades.desc_actividad,plan_actividades.objetivo_actividad,DATE_FORMAT(plan_actividades.fi_actividad, \'%d/%m/%Y\') as fi_acti,
                                  DATE_FORMAT(plan_actividades.ff_actividad, \'%d/%m/%Y\') as ff_acti,exp_asigna_generacion.id_asigna_generacion,plan_asigna_planeacion_actividad.comentario,plan_asigna_planeacion_actividad.id_estado,plan_asigna_planeacion_actividad.id_asigna_planeacion_actividad,plan_actividades.fi_actividad,plan_actividades.fi_actividad,plan_actividades.ff_actividad
                                    FROM plan_actividades,exp_asigna_generacion,plan_asigna_planeacion_actividad,exp_generacion
                                    WHERE plan_asigna_planeacion_actividad.id_asigna_generacion=exp_asigna_generacion.id_asigna_generacion
                                    AND plan_asigna_planeacion_actividad.id_plan_actividad=plan_actividades.id_plan_actividad
                                    AND exp_asigna_generacion.id_generacion=exp_generacion.id_generacion
                                    AND exp_generacion.id_generacion='.$request->id_generacion.'
                                    AND exp_asigna_generacion.id_asigna_generacion='.$request->id_asigna_generacion.'
                                    AND plan_actividades.deleted_at is null
                                    AND plan_asigna_planeacion_actividad.deleted_at is null');

        /*$datos->map(function ($value, $key) {
            $can=Plan_asigna_planeacion_actividad::where('id_estado',$value->id_estado)->count();
            $value->estado=$can>0?true:false;
            return $value;
        });*/
        return $datos;
    }

    public function actuactivi(Request $request)
    {
        $data['va']=DB::select('SELECT plan_actividades.id_plan_actividad,plan_actividades.desc_actividad,plan_actividades.objetivo_actividad,(plan_actividades.fi_actividad) as fi_acti,
                                  (plan_actividades.ff_actividad) as ff_acti,exp_asigna_generacion.id_asigna_generacion,plan_asigna_planeacion_actividad.comentario,
                                    plan_asigna_planeacion_actividad.id_estado,plan_asigna_planeacion_actividad.id_asigna_planeacion_actividad,
                                    plan_actividades.fi_actividad,plan_actividades.fi_actividad,plan_actividades.ff_actividad,exp_generacion.id_generacion,exp_generacion.generacion
                                    FROM plan_actividades,exp_asigna_generacion,plan_asigna_planeacion_actividad,exp_generacion
                                    WHERE plan_asigna_planeacion_actividad.id_asigna_generacion=exp_asigna_generacion.id_asigna_generacion
                                    AND plan_asigna_planeacion_actividad.id_plan_actividad=plan_actividades.id_plan_actividad
                                    AND exp_asigna_generacion.id_generacion=exp_generacion.id_generacion
                                    AND plan_actividades.id_plan_actividad='.$request->id.'
                                    AND plan_actividades.deleted_at is null
                                    AND plan_asigna_planeacion_actividad.deleted_at is null
                                    GROUP BY plan_actividades.id_plan_actividad');
        return $data;
        //dd($num);

        /*$ic=count($num);
        for ($i = 0; $i <$ic; $i++) {
            $plan = Plan_asigna_planeacion_actividad::find($num[$i]->id_asigna_planeacion_actividad);
            $plan->id_estado = $request->id_estado;
            $plan->save();
        }
        return redirect()->back();*/
    }
    public function apruactivi(Request $request)
    {
        DB::table('Plan_asigna_planeacion_actividad')
            ->where('id_plan_actividad', '=', $request->id_plan_actividad)
            ->update(array("id_estado"=>$request->id_estado));

        return $request;
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
