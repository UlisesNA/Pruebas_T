<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\AsignaTutor;
use DB;

class JefeController extends Controller
{
    public function index()
    {
        $consulta=DB::select('select gnral_personales.nombre as nom ,gnral_personales.id_personal as id
                              from gnral_personales');
        $carreras=DB::select('select gnral_carreras.nombre as carr ,gnral_carreras.id_carrera as id
                              from gnral_carreras');
        $semestres=DB::select('select gnral_semestres.descripcion as sem, gnral_semestres.id_semestre as id 
                                from gnral_semestres');
        $condicion=DB::select('SELECT asigna_tutor.id_asigna_tutor , gnral_personales.nombre as doc,gnral_carreras.nombre as carr,gnral_semestres.descripcion as sem 
                                      from gnral_personales,gnral_carreras,gnral_semestres,asigna_tutor
                                      where gnral_personales.id_personal=asigna_tutor.id_personal
                                      and gnral_carreras.id_carrera=asigna_tutor.id_carrera
                                      and gnral_semestres.id_semestre=asigna_tutor.id_semestre;');
        $datosAT=AsignaTutor::all();
        return view('jefe.index')->with(compact('datosAT','consulta','semestres','condicion','carreras'));
    }
    public function store(Request $request)
    {
        $asigna = array(
            "id_personal"=>$request->id_personal,
            "id_carrera" => $request->id_carrera,
            "id_semestre" => $request->id_semestre,
        );
        AsignaTutor::create($asigna);
        return response()->json();
    }
    public function destroy($id)
    {
        $asigna = AsignaTutor::find($id);
        $asigna->delete();
        return redirect()->back();
    }
}
