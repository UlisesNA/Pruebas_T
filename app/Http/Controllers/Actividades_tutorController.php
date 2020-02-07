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
        $num=DB::select('SELECT id_planeacion FROM plan_planeacion WHERE id_generacion='.$request->id_generacion);
        $gen=DB::select('SELECT exp_asigna_tutor.id_asigna_tutor
                                    FROM exp_asigna_tutor,exp_asigna_generacion,exp_generacion
                                    WHERE exp_generacion.id_generacion=exp_asigna_generacion.id_generacion
                                    AND exp_asigna_generacion.id_asigna_generacion=exp_asigna_tutor.id_asigna_generacion
                                    AND exp_asigna_tutor.deleted_at is null
                                    AND exp_generacion.id_generacion='.$request->id_generacion.'
                                    GROUP BY exp_asigna_tutor.id_personal;');
        //dd($gen);


        if($num==null)
        {
           // dd($request->id_generacion);

            //dd($id_planeacion);
            $datos=request()->except('_token');
            //dd($request->id_generacion);
            Plan_actividades::create($datos);
            $id_actividad=DB::select('SELECT @@identity as id_ac');

            Plan_Planeacion::create([
                "id_periodo"=>Session::get('id_periodo'),
                "id_generacion"=>$request->id_generacion
            ]);
            $id_planeacion=DB::select('SELECT @@identity as id_p');
            //dd($id_planeacion);
            Plan_asigna_planeacion_actividad::create([
                "id_planeacion"=>$id_planeacion[0]->id_p,
                //"id_actividad "=>$id_actividad[0]->id_ac,
            ]);
            $id=DB::select('SELECT @@identity as id');

            $plan = Plan_asigna_planeacion_actividad::find($id[0]->id);
            $plan->id_plan_actividad = $id_actividad[0]->id_ac;
            $plan->id_estado = $request->id_estado;
            $plan->save();

            $ic=count($gen);
            for ($i = 0; $i <$ic; $i++) {
                Plan_asigna_planeacion_tutor::create([
                    "id_asigna_planeacion_actividad"=>$id[0]->id,
                    "id_asigna_tutor"=>$gen[$i]->id_asigna_tutor,
                ]);
                $idt=DB::select('SELECT @@identity as idt');
                $plan = Plan_asigna_planeacion_tutor::find($idt[0]->idt);
                $plan->id_asigna_planeacion_actividad = $id[0]->id;
                $plan->id_asigna_tutor = $gen[$i]->id_asigna_tutor;
                $plan->save();
            }
            //dd($plan);
            //return redirect()->back();
        }else
        {
            //dd($num);
            $datos=request()->except('_token');
            //dd($request->id_generacion);
            Plan_actividades::create($datos);
            $id_actividad=DB::select('SELECT @@identity as id_ac');

            Plan_asigna_planeacion_actividad::create([
                "id_planeacion"=>$num[0]->id_planeacion,
                //"id_actividad "=>$id_actividad[0]->id_ac,
            ]);
            $id=DB::select('SELECT @@identity as id');

            $plan = Plan_asigna_planeacion_actividad::find($id[0]->id);
            $plan->id_plan_actividad = $id_actividad[0]->id_ac;
            $plan->id_estado = $request->id_estado;
            $plan->save();


            /*foreach ($gen as $dato)
            {
                dd($gen->id_tutor);
                Plan_asigna_planeacion_tutor::create([
                    "id_asigna_planeacion_actividad"=>$id[0]->id,
                    "id_tutor"=>$dato->id_tutor,
                ]);
            }*/
            $ic=count($gen);
            for ($i = 0; $i <$ic; $i++) {
                Plan_asigna_planeacion_tutor::create([
                    "id_asigna_planeacion_actividad"=>$id[0]->id,
                    "id_asigna_tutor"=>$gen[$i]->id_asigna_tutor,
                ]);
                $idt=DB::select('SELECT @@identity as idt');
                $plan = Plan_asigna_planeacion_tutor::find($idt[0]->idt);
                $plan->id_asigna_planeacion_actividad = $id[0]->id;
                $plan->id_asigna_tutor = $gen[$i]->id_asigna_tutor;
                $plan->save();
            }
            //dd($i);
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        $plan = Plan_actividades::find($id);
        $plan->fi_actividad = $request->fi_actividad;
        $plan->ff_actividad = $request->ff_actividad;
        $plan->desc_actividad = $request->desc_actividad;
        $plan->objetivo_actividad = $request->objetivo_actividad;
        $plan->save();
        return redirect()->back();
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
        $plan = Plan_actividades::find($id);
        $plan->delete();
        return redirect()->back();
    }
}
