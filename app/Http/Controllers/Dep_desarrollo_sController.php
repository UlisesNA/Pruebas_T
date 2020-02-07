<?php
namespace App\Http\Controllers;
use App\Planeacion;
use Illuminate\Http\Request;
use App\Plan_asigna_planeacion_actividad;
use App\Exp_asigna_generacion;
use App\Plan_Planeacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class Dep_desarrollo_sController extends Controller
{
    public function index()
    {
        $planeacion = Planeacion::all();
        $fecha=DB::select('SELECT date(sysdate()) as dia,date(DATE_ADD(sysdate(), interval 365 day)) as max;');
        return view('dep_desarrollo.dep_segundo', compact('planeacion','fecha'));
    }
    public function update(Request $request, $id)
    {
        $plan = Plan_asigna_planeacion_actividad::find($id);
        $plan->comentario = $request->comentario;
        $plan->id_estado = $request->id_estado;
        $plan->save();
        return redirect()->back();
    }
}
