<?php
namespace App\Http\Controllers;

use App\actividades;
use App\Plan_actividades;
use App\Plan_asigna_planeacion_actividad;
use App\Plan_asigna_planeacion_tutor;
use FontLib\Table\Type\name;
use App\Exp_asigna_generacion;
use App\Exp_asigna_tutor;
use App\Plan_Planeacion;
use App\Planeacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class Actividades_tutorController extends Controller
{
    public function index()
    {
        //return view('profesor.actividades');
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        /*$acti = array(
            "id_planeacion"=>$request->id_planeacion,
            "titulo_act" => $request->titulo_act ,
            "desc_act" => $request-> desc_act,
            "instrucciones" => $request->instrucciones,
            "id_estado"=>$request->id_estado
        );
        actividades::create($acti);
        return response()->json();*/
        /*$planea = array(
            "fi_actividad"=>$request->fi_actividad,
            "ff_actividad" => $request->ff_actividad,
            "desc_actividad" => $request->desc_actividad,
            "objetivo_actividad" => $request->objetivo_actividad,
        );
        Plan_actividades::create($planea);
        return response()->json();*/
        //dd($request->id_generacion);
        $num=DB::select('SELECT exp_asigna_generacion.id_asigna_generacion
        FROM exp_asigna_generacion
        WHERE exp_asigna_generacion.deleted_at is null
        AND exp_asigna_generacion.id_generacion='.$request->id_generacion);
        //dd($num);
        $datos=request()->except('_token');
        Plan_actividades::create($datos);
        $id_actividad=DB::select('SELECT @@identity as id_ac');

        $ic=count($num);
        for ($i = 0; $i <$ic; $i++) {
            Plan_asigna_planeacion_actividad::create([
                "id_asigna_generacion"=>$num[$i]->id_asigna_generacion,
                //"id_actividad "=>$id_actividad[0]->id_ac,
            ]);
            $id=DB::select('SELECT @@identity as id');

            $plan = Plan_asigna_planeacion_actividad::find($id[0]->id);
            $plan->id_plan_actividad = $id_actividad[0]->id_ac;
            $plan->id_estado = $request->id_estado;
            $plan->save();

            Plan_asigna_planeacion_tutor::create([
                "id_asigna_planeacion_actividad"=>$id[0]->id,
                "id_asigna_generacion"=>$num[$i]->id_asigna_generacion,
            ]);
            $idt=DB::select('SELECT @@identity as idt');
            $plan = Plan_asigna_planeacion_tutor::find($idt[0]->idt);
            $plan->id_asigna_planeacion_actividad = $id[0]->id;
            $plan->id_asigna_generacion = $num[$i]->id_asigna_generacion;
            $plan->save();
        }
        return $request;
        //return redirect()->back();
    }

    public function actu(Request $request)
    {
        DB::table('plan_actividades')
            ->where('id_plan_actividad', '=', $request->id_plan_actividad)
            ->update(array("desc_actividad"=>$request->desc_actividad,
                            "objetivo_actividad"=>$request->objetivo_actividad,
                            "fi_actividad"=>$request->fi_actividad,
                            "ff_actividad"=>$request->ff_actividad));
        $num=DB::select('SELECT plan_asigna_planeacion_actividad.id_asigna_planeacion_actividad
        FROM plan_asigna_planeacion_actividad,plan_actividades
        WHERE plan_actividades.deleted_at is null
        AND plan_actividades.id_plan_actividad=plan_asigna_planeacion_actividad.id_plan_actividad
        AND plan_asigna_planeacion_actividad.id_plan_actividad='.$request->id_plan_actividad);
        //dd($num);
        $ic=count($num);
        for ($i = 0; $i <$ic; $i++) {
            $plan = Plan_asigna_planeacion_actividad::find($num[$i]->id_asigna_planeacion_actividad);
            $plan->id_estado = $request->id_estado;
            $plan->save();
        }
        return $request;
    }
    public function update1(Request $request, $id)
    {
        $plan = Plan_asigna_planeacion_actividad::find($id);
        $plan->id_estado = $request->id_estado;
        $plan->save();
        return redirect()->back();
    }
    public function update2(Request $request, $id)
    {
        $plan = Plan_asigna_planeacion_actividad::find($id);
        $plan->comentario = $request->comentario;
        $plan->id_estado = $request->id_estado;
        $plan->save();
        return redirect()->back();
    }


    public function destroy($id)
    {
        Plan_actividades::find($id)->delete();
    }

    public function idgene(Request $request)
    {
        $data['va'] = DB::select('SELECT exp_asigna_generacion.id_asigna_generacion,exp_asigna_generacion.id_generacion,exp_generacion.generacion
            FROM exp_asigna_generacion,exp_generacion,exp_asigna_tutor
            WHERE exp_asigna_generacion.id_generacion=exp_generacion.id_generacion
            AND exp_asigna_generacion.deleted_at is null
            and exp_asigna_generacion.id_jefe_periodo=exp_asigna_tutor.id_jefe_periodo
            and exp_asigna_generacion.id_generacion='.$request->idg.'
            GROUP BY exp_generacion.generacion ASC');
        //dd($data);
        return $data;
    }
}
