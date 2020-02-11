<?php
namespace App\Http\Controllers;
use App\Asigna_planeacion;
use App\AsignaTutor;
use Illuminate\Http\Request;
use DB;

class Coordina_carrController extends Controller
{
    public function index()
    {

        return view('coordina_carrera.index');
    }
    public function store(Request $request)
    {
        $asigna = array(
            "id_planeacion" => $request->id_planeacion,
            "id_asigna_tutor" => $request->id_asigna_tutor,
        );
        Asigna_planeacion::create($asigna);
        return response()->json();
    }
    public function destroy($id)
    {
        $planea = Asigna_planeacion::find($id);
        $planea->delete();
        return redirect()->back();
    }
}
