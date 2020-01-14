<?php
namespace App\Http\Controllers;
use App\eventos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class Eventos_tutorController extends Controller
{
    public function index()
    {
        $eventos = eventos::all();
        return view('profesor.eventos',compact('eventos'));
    }
    public function store(Request $request)
    {
        $planea = array(
            "titulo_evento"=>$request->titulo_evento,
            "desc_evento" => $request->desc_evento,
            "fecha" => $request->fecha,
            "hora" => $request->hora
        );
        eventos::create($planea);
        return response()->json();
    }
    public function edit($id)
    {
        $plan = eventos::find($id);
        return view('coordina_inst.edit', compact('plan'));
    }
    public function update(Request $request, $id)
    {
        $plan = eventos::find($id);
        $plan->titulo_evento = $request->get('titulo_evento');
        $plan->desc_evento = $request->get('desc_evento');
        $plan->fecha = $request->get('fecha');
        $plan->hora = $request->get('hora');
        $plan->save();
        return redirect()->back();
    }
    public function destroy($id)
    {
        $plan = eventos::find($id);
        $plan->delete();
        return redirect()->back();
    }
}
