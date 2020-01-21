<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profesor;
use App\Alumno;
use App\AsignaExpediente;
use App\AsignaCoordinador;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;


class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function alumnos(Request $request)
    {
        return (DB::select('SELECT gnral_alumnos.*, exp_asigna_alumnos.estado,exp_asigna_alumnos.id_asigna_alumno
                 from gnral_alumnos JOIN exp_asigna_alumnos ON exp_asigna_alumnos.id_alumno=gnral_alumnos.id_alumno 
                 where exp_asigna_alumnos.id_asigna_generacion='.$request->id_asigna_generacion.' and 
                 gnral_alumnos.id_carrera='.$request->id_carrera.' order by(gnral_alumnos.apaterno)'));

    }
    public  function grupos()
    {
        $grupos=DB::select('select gnral_carreras.id_carrera, gnral_carreras.nombre,exp_generacion.generacion, 
                exp_asigna_generacion.grupo, exp_asigna_generacion.id_asigna_generacion from gnral_jefes_periodos
                JOIN exp_asigna_tutor on exp_asigna_tutor.id_jefe_periodo=gnral_jefes_periodos.id_jefe_periodo JOIN
                gnral_personales ON gnral_personales.id_personal=exp_asigna_tutor.id_personal JOIN gnral_carreras on
                gnral_carreras.id_carrera=gnral_jefes_periodos.id_carrera JOIN exp_asigna_generacion ON 
                exp_asigna_generacion.id_asigna_generacion=exp_asigna_tutor.id_asigna_generacion JOIN exp_generacion
                ON exp_generacion.id_generacion=exp_asigna_generacion.id_generacion where gnral_personales.tipo_usuario='.Auth::user()->id);

        return $grupos;
    }
    public function cambio(Request $request)
    {
        DB::update('UPDATE exp_asigna_alumnos set estado='.$request->estado.' where id_asigna_alumno='.$request->id_asigna_alumno);
    }


    /////NO SE HAN OCUPADO
    public function getAll(){
        //dd($request);
        $datosAlum=Profesor::getAlumnos();
        //dd($datos);
        return $datosAlum;
    }
    public function updateEstado(Request $request){
        //dd($request);
        Alumno::updateEst($request);
        return redirect('profesor');
    }
    public function setAlumnoId(Request $request){
        //dd($request);
        Session::put('id_alumno',$request->id_alumno);
        return Session::get('id_alumno');
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
