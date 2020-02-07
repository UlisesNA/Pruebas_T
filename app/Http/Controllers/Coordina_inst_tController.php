<?php
namespace App\Http\Controllers;
use App\Plan_asigna_planeacion_tutor;
use App\Planeacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class Coordina_inst_tController extends Controller
{
    public function index()
    {
        $planeacion = Planeacion::all();
        $fecha=DB::select('SELECT date(sysdate()) as dia,date(DATE_ADD(sysdate(), interval 365 day)) as max;');
        return view('coordina_inst.tercer_sem', compact('planeacion','fecha'));
    }
    public function store(Request $request)
    {
        $request->user()->authorizeRoles('1');
        $planea = array(
            "fecha_inicio"=>$request->fecha_inicio,
            "fecha_fin" => $request->fecha_fin,
            "desc_actividad" => $request->desc_actividad,
            "objetivo" => $request->objetivo,
            "instrucciones" => $request->instrucciones,
            "id_semestre"=>$request->id_semestre,
            "id_estado"=>$request->id_estado
        );
        Planeacion::create($planea);
        return response()->json();
    }

    public function update(Request $request, $id)
    {
        $plan = Plan_asigna_planeacion_tutor::find($id);
        //dd($plan);
        $plan->estrategia = $request->estrategia;
        $plan->requiere_evidencia = $request->requiere_evidencia;
        $plan->id_estrategia = $request->id_estrategia;
        $plan->save();
        return redirect()->back();
    }

}
