<?php
namespace App\Http\Controllers;
use App\Plan_asigna_planeacion_tutor;
use App\Planeacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class Coordina_inst_cController extends Controller
{
    public function index()
    {
        $planeacion = Planeacion::all();
        $fecha=DB::select('SELECT date(sysdate()) as dia,date(DATE_ADD(sysdate(), interval 365 day)) as max;');
        return view('coordina_inst.cuarto_sem', compact('planeacion','fecha'));
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
        $plan->desc_actividad_cambio = $request->desc_actividad_cambio;
        $plan->objetivo_actividad_cambio = $request->objetivo_actividad_cambio;
        $plan->id_sugerencia = $request->id_sugerencia;
        $plan->save();
        return redirect()->back();
    }

}
