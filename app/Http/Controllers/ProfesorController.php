<?php
namespace App\Http\Controllers;
use App\Exp_generale;
use Illuminate\Http\Request;
use App\Profesor;
use App\Alumno;
use App\AsignaExpediente;
use App\AsignaCoordinador;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Array_;
class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function alumnos(Request $request)
    {
        //dd($request);

        $datos=DB::table('gnral_alumnos')
            ->join('exp_asigna_alumnos','exp_asigna_alumnos.id_alumno','=','gnral_alumnos.id_alumno')
            ->select(DB::raw('UPPER(gnral_alumnos.nombre) as nombre, UPPER(gnral_alumnos.apaterno) as apaterno, UPPER(gnral_alumnos.amaterno) as amaterno, gnral_alumnos.id_alumno, gnral_alumnos.cuenta, exp_asigna_alumnos.estado, exp_asigna_alumnos.id_asigna_alumno'))
            ->where('exp_asigna_alumnos.id_asigna_generacion', '=', $request->id_asigna_generacion)
            ->where('gnral_alumnos.id_carrera','=',$request->id_carrera)
            ->whereNull('exp_asigna_alumnos.deleted_at')
            ->orderBy('gnral_alumnos.cuenta')
            ->get();


        $datos->map(function ($value, $key) {
            $gen=Exp_generale::where('id_alumno',$value->id_alumno)->count();
            $value->expediente=$gen>0?true:false;
            //$value->nombrec=$value->apaterno+" "+$value->amaterno+" "+$value->nombre;
            return $value;
        });


       // dd($nuevo);
        return $datos;

    }
    public function planeacion(Request $request)
    {
        $plan=DB::select('SELECT plan_actividades.*,plan_asigna_planeacion_tutor.*
FROM  plan_actividades,plan_asigna_planeacion_actividad,exp_asigna_generacion
,plan_asigna_planeacion_tutor,gnral_personales,exp_asigna_tutor
WHERE plan_actividades.id_plan_actividad=plan_asigna_planeacion_actividad.id_plan_actividad
AND plan_asigna_planeacion_actividad.id_asigna_generacion=exp_asigna_generacion.id_asigna_generacion
AND gnral_personales.id_personal=exp_asigna_tutor.id_personal
and plan_asigna_planeacion_actividad.id_asigna_generacion=exp_asigna_tutor.id_asigna_generacion
and plan_asigna_planeacion_tutor.id_asigna_planeacion_actividad=plan_asigna_planeacion_actividad.id_asigna_planeacion_actividad
and plan_asigna_planeacion_tutor.id_asigna_generacion=plan_asigna_planeacion_actividad.id_asigna_generacion
AND exp_asigna_tutor.deleted_at is null
AND exp_asigna_generacion.deleted_at is null
AND plan_actividades.deleted_at is null
AND plan_asigna_planeacion_actividad.id_estado=1
    AND gnral_personales.tipo_usuario='.Auth::user()->id.'
    AND exp_asigna_generacion.id_asigna_generacion='.$request->id_asigna_generacion);


        return $plan;
    }
    public  function grupos()
    {
        //dd(Session::get('id_periodo'));
        $datos=DB::select('select gnral_carreras.id_carrera, gnral_carreras.nombre,exp_generacion.generacion, 
                exp_asigna_generacion.grupo, exp_asigna_generacion.id_asigna_generacion from gnral_jefes_periodos
                JOIN exp_asigna_tutor on exp_asigna_tutor.id_jefe_periodo=gnral_jefes_periodos.id_jefe_periodo JOIN
                gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal JOIN gnral_carreras on
                gnral_carreras.id_carrera=gnral_jefes_periodos.id_carrera JOIN exp_asigna_generacion ON 
                exp_asigna_generacion.id_asigna_generacion=exp_asigna_tutor.id_asigna_generacion JOIN exp_generacion
                ON exp_generacion.id_generacion=exp_asigna_generacion.id_generacion where 
                gnral_jefes_periodos.id_periodo='.Session::get('id_periodo').' and 
                exp_asigna_tutor.deleted_at is null and gnral_personales.tipo_usuario='.Auth::user()->id);

        return $datos;
    }
    public function cambio(Request $request)
    {
        DB::update('UPDATE exp_asigna_alumnos set estado='.$request->estado.' where id_asigna_alumno='.$request->id_asigna_alumno);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
