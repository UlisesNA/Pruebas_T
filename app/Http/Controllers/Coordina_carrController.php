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
        $datos=AsignaTutor::all();
        $condicion=DB::select('SELECT asigna_tutor.id_asigna_tutor , gnral_personales.nombre as doc,gnral_carreras.nombre as carr,gnral_semestres.descripcion as sem 
                                      from gnral_personales,gnral_carreras,gnral_semestres,asigna_tutor
                                      where gnral_personales.id_personal=asigna_tutor.id_personal
                                      and gnral_carreras.id_carrera=asigna_tutor.id_carrera
                                      and gnral_semestres.id_semestre=asigna_tutor.id_semestre;');
        $tabla=DB::select('SELECT asigna_planeacion_actividad.id_asigna_planeacion_actividad , gnral_personales.nombre as doc,gnral_carreras.nombre as carr,gnral_semestres.descripcion as sem,
									  asigna_planeacion_actividad.id_planeacion as plan
                                      from gnral_personales,gnral_carreras,gnral_semestres,asigna_tutor,asigna_planeacion_actividad
                                      where gnral_personales.id_personal=asigna_tutor.id_personal
                                      and gnral_carreras.id_carrera=asigna_tutor.id_carrera
                                      and gnral_semestres.id_semestre=asigna_tutor.id_semestre
                                      and asigna_planeacion_actividad.id_asigna_tutor=asigna_tutor.id_asigna_tutor;');
        return view('coordina_carrera.index',compact('datos','condicion','tabla'));
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
