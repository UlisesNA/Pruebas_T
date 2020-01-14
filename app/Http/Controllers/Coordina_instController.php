<?php
namespace App\Http\Controllers;
use App\Planeacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class Coordina_instController extends Controller
{
    public function index(Request $request)
    {
        $planeacion = Planeacion::all();
        $fecha=DB::select('SELECT date(sysdate()) as dia,date(DATE_ADD(sysdate(), interval 365 day)) as max;');
        return view('coordina_inst.index', compact('planeacion','fecha'));
    }
    public function store(Request $request)
    {
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
    public function edit($id)
    {
        $plan = Planeacion::find($id);
        return view('coordina_inst.edit', compact('plan'));
    }
    public function update(Request $request, $id)
    {
        $plan = Planeacion::find($id);
        $plan->fecha_inicio = $request->get('fecha_inicio');
        $plan->fecha_fin = $request->get('fecha_fin');
        $plan->objetivo = $request->get('objetivo');
        $plan->desc_actividad = $request->get('desc_actividad');
        $plan->instrucciones = $request->get('instrucciones');
        $plan->save();
        return redirect()->route('coordina_inst.index');
    }
    public function destroy($id)
    {
        $plan = Planeacion::find($id);
        $plan->delete();
        return redirect()->back();
    }
}
