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
        $tabla=DB::table('exp_generacion')
        ->join('exp_asigna_generacion','exp_asigna_generacion.id_generacion','=','exp_generacion.id_generacion')
        ->join('gnral_jefes_periodos','gnral_jefes_periodos.id_jefe_periodo','=','exp_asigna_generacion.id_jefe_periodo')
        ->join('exp_asigna_tutor','exp_asigna_tutor.id_asigna_generacion','=','exp_asigna_generacion.id_asigna_generacion')
        ->join('exp_asigna_alumnos','exp_asigna_alumnos.id_asigna_generacion','=','exp_asigna_generacion.id_asigna_generacion')
        ->join('gnral_personales','gnral_personales.id_personal','=','exp_asigna_tutor.id_personal')
        ->join('gnral_jefes_periodos as p','p.id_jefe_periodo','=','exp_asigna_tutor.id_jefe_periodo')
        ->join('gnral_alumnos','gnral_alumnos.id_alumno','=','exp_asigna_alumnos.id_alumno')
        ->join('users','users.email','=','gnral_personales.correo')
        ->where('users.email','=',$pr)
        ->whereNull('exp_asigna_generacion.deleted_at')
        ->whereNull('exp_asigna_tutor.deleted_at')
        ->whereNull('exp_asigna_alumnos.deleted_at')
        ->where('exp_asigna_alumnos.estado','=',1)
        ->groupBY('exp_generacion.generacion')
        ->select('exp_generacion.id_generacion','exp_generacion.generacion','exp_asigna_generacion.grupo')
        ->get();
        ///////////////
        $consulta=DB::table('exp_generacion')
            ->join('exp_asigna_generacion','exp_asigna_generacion.id_generacion','=','exp_generacion.id_generacion')
            ->join('gnral_jefes_periodos','gnral_jefes_periodos.id_jefe_periodo','=','exp_asigna_generacion.id_jefe_periodo')
            ->join('exp_asigna_tutor','exp_asigna_tutor.id_asigna_generacion','=','exp_asigna_generacion.id_asigna_generacion')
            ->join('exp_asigna_alumnos','exp_asigna_alumnos.id_asigna_generacion','=','exp_asigna_generacion.id_asigna_generacion')
            ->join('gnral_personales','gnral_personales.id_personal','=','exp_asigna_tutor.id_personal')
            ->join('gnral_jefes_periodos as p','p.id_jefe_periodo','=','exp_asigna_tutor.id_jefe_periodo')
            ->join('gnral_alumnos','gnral_alumnos.id_alumno','=','exp_asigna_alumnos.id_alumno')
            ->join('prediccion','prediccion.no_cuenta','=','gnral_alumnos.cuenta')
            ->join('users','users.email','=','gnral_personales.correo')
            ->where('users.email','=',$pr)
            ->whereNull('exp_asigna_generacion.deleted_at')
            ->whereNull('exp_asigna_tutor.deleted_at')
            ->whereNull('exp_asigna_alumnos.deleted_at')
            ->where('exp_asigna_alumnos.estado','=',1)
            ->select('exp_generacion.generacion','prediccion.ap','prediccion.am','prediccion.nom','prediccion.no_hijos','prediccion.trabaja','prediccion.id_expbebidas','prediccion.materias_repeticion',
                'prediccion.tot_repe','prediccion.materias_especial','prediccion.tot_espe','prediccion.id_carrera_v',
                'prediccion.sexo_v','prediccion.id_estado_civil_v','prediccion.no_hijos_v','prediccion.no_hermanos_v',
                'prediccion.enfermedad_cronica_v','prediccion.trabaja_v','prediccion.practica_deporte_v','prediccion.actividades_culturales_v'
                ,'prediccion.etnia_indigena_v','prediccion.lugar_nacimientos_v','prediccion.nivel_economico_v','prediccion.sostiene_economia_hogar_v',
                'prediccion.tegusta_carrera_elegida_v','prediccion.beca_v','prediccion.estado_v','prediccion.id_expbebidas_v',
                'prediccion.poblacion_v','prediccion.ant_inst_v','prediccion.satisfaccion_c_v','prediccion.materias_repeticion_v',
                'prediccion.tot_repe_v','prediccion.materias_especial_v','prediccion.tot_espe_v','prediccion.gen_espe_v')
            ->get();
        return view('profesor.desercion', compact('tabla','consulta'));
    }
}
