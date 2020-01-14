<?php
namespace App\Http\Controllers;

use App\actividades;
use Illuminate\Http\Request;
use DB;
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
        $datos=request()->except('_token');
        actividades::insert($datos);
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $plan = actividades::find($id);
        $plan->id_planeacion = $request->id_planeacion;
        $plan->titulo_act = $request->titulo_act;
        $plan->desc_act = $request->desc_act;
        $plan->instrucciones = $request->instrucciones;
        $plan->id_estado = $request->id_estado;
        $plan->save();
        return redirect()->back();
    }
}
