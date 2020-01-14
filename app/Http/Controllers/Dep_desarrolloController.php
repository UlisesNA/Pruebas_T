<?php
namespace App\Http\Controllers;
use App\Planeacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class Dep_desarrolloController extends Controller
{
    public function index()
    {
        $planeacion = Planeacion::all();
        $fecha=DB::select('SELECT date(sysdate()) as dia,date(DATE_ADD(sysdate(), interval 365 day)) as max;');
        return view('dep_desarrollo.index', compact('planeacion','fecha'));
    }
    public function edit($id)
    {
        $plan = Planeacion::find($id);
        return view('dep_desarrollo.edit', compact('plan'));
    }
    public function update(Request $request, $id)
    {
        $plan = Planeacion::find($id);
        $plan->id_estado = $request->get('id_estado');
        $plan->comentarios = $request->get('comentarios');
        $plan->save();
        return redirect()->route('dep_desarrollo.index');
    }
}
