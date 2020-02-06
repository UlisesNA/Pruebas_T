<?php
namespace App\Http\Controllers;

use App\actividades;
use App\Gnral_semestre;
use Illuminate\Http\Request;
use DB;
use App\Planeacion;
use App\Exp_asigna_generacion;
use App\Exp_asigna_tutor;
use App\Plan_Planeacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class Planea_tutorController extends Controller
{
    public function index()
    {
        $tabla=Exp_asigna_generacion::getDatosTut();
        $tabla1=Exp_asigna_generacion::getDatosAct();
//dd($tabla1);
        return view('profesor.planeacion',compact('tabla','tabla1'));
    }


    public function update(Request $request, $id)
    {
        $plan = Planeacion::find($id);
        $plan->id_estado = $request->id_estado;
        $plan->comentarios = $request->get('comentarios');
        $plan->sugerencia = $request->get('sugerencia');
        $plan->id_sugerencia = $request->get('id_sugerencia');
        $plan->id_estrategia = $request->id_estrategia;
        $plan->estrategia = $request->estrategia;
        $plan->id_evidencia = $request->id_evidencia;
        $plan->save();
        //return redirect()->back();
        //return('ok');
    }

}
