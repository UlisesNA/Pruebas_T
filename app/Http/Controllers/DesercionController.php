<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
class DesercionController extends Controller
{
    public function index(Request $request)
    {
        $pr=Auth::user()->email;
        $consulta=DB::table('prediccion')
            ->join('gnral_alumnos','gnral_alumnos.cuenta','=','prediccion.no_cuenta')
            ->join('exp_asigna_alumnos','exp_asigna_alumnos.id_alumno','=','gnral_alumnos.id_alumno')
            ->join('gnral_personales','gnral_personales.id_personal','=','gnral_personales.id_personal')
            ->join('exp_asigna_generacion','exp_asigna_generacion.id_asigna_generacion','=','exp_asigna_alumnos.id_asigna_generacion')
            ->join('exp_asigna_tutor','exp_asigna_tutor.id_asigna_generacion','=','exp_asigna_generacion.id_asigna_generacion')
            ->join('users','users.email','=','gnral_personales.correo')
            ->where('users.email','=',$pr)
            ->where('gnral_personales.id_perfil','=',7)
            ->select('prediccion.nombre','prediccion.no_hijos','prediccion.trabaja','prediccion.id_escala','prediccion.materias_repeticion',
                'prediccion.tot_repe','prediccion.materias_especial','prediccion.tot_espe','prediccion.total')
            ->get();
        return view('profesor.desercion', compact('consulta'));
    }

}
