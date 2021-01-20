<?php

namespace App\Http\Controllers;
use App\Canalizacion;
use App\gnral_alumnos;
use App\asigna_tutor;
use App\areas_canalizacion;
use Illuminate\Http\Request;
use DB;
class Canalizados_tutorController extends Controller
{

    public function index()
    {
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $pa = array('id_alumno' =>$request->id_alumno , 
                    'id_personal' =>$request->id_personal,
                    'fecha_canalizacion'=>$request->fecha_canalizacion,
                    'hora'=>$request->hora,
                    'observaciones'=>$request->observaciones,
                    'aspectos_sociologicos1'=>$request->aspectos_sociologicos1,
                    'aspectos_sociologicos2'=>$request->aspectos_sociologicos2,
                    'aspectos_sociologicos3'=>$request->aspectos_sociologicos3,
                    'aspectos_academicos1'=>$request->aspectos_academicos1,
                    'aspectos_academicos2'=>$request->aspectos_academicos2,
                    'aspectos_academicos3'=>$request->aspectos_academicos3,
                    'otros'=>$request->otros,
                    'status'=>$request->status,
                    'desc_area'=>$request->desc_area,
                    'desc_subarea'=>$request->desc_subarea,);
        Canalizacion::create($pa);
    }

    public function canactualiza(Request $request)
    {
        $data['va']=DB::select('SELECT exp_asigna_generacion.grupo,gnral_alumnos.id_alumno,gnral_alumnos.nombre,gnral_alumnos.apaterno,
            gnral_alumnos.amaterno,gnral_carreras.nombre as carrera,gnral_semestres.descripcion,gnral_personales.nombre as nombre_tut,gnral_personales.id_personal,DATE_FORMAT(canalizacion.fecha_canalizacion,"%d-%m-%Y")as fecha_canalizacion,
                canalizacion.hora,canalizacion.observaciones,canalizacion.aspectos_sociologicos1,canalizacion.aspectos_sociologicos2,
                canalizacion.aspectos_sociologicos3,canalizacion.aspectos_academicos1,canalizacion.aspectos_academicos2,
                canalizacion.aspectos_academicos3,canalizacion.otros,canalizacion.status,canalizacion.desc_area,
                canalizacion.desc_subarea
            FROM exp_asigna_generacion,exp_asigna_alumnos,gnral_alumnos,gnral_carreras,
            gnral_semestres,gnral_personales,exp_asigna_tutor,canalizacion
            WHERE exp_asigna_generacion.id_asigna_generacion=exp_asigna_alumnos.id_asigna_generacion
            AND gnral_alumnos.id_alumno=exp_asigna_alumnos.id_alumno
            AND gnral_alumnos.id_carrera=gnral_carreras.id_carrera
            AND gnral_alumnos.id_semestre=gnral_semestres.id_semestre
            AND gnral_personales.id_personal=exp_asigna_tutor.id_personal
            AND exp_asigna_tutor.id_asigna_generacion=exp_asigna_generacion.id_asigna_generacion
            AND gnral_alumnos.id_alumno = canalizacion.id_alumno
            AND gnral_personales.id_personal = canalizacion.id_personal
            AND exp_asigna_alumnos.id_alumno='.$request->id);
        return $data;
    }

    public function datosact(Request $request)
    {
        DB::table('canalizacion')
                ->where('id_alumno', '=', $request->id_alumno)
                ->update(array("fecha_canalizacion"=>$request->fecha_canalizacion,
                               "hora"=>$request->hora,
                               "aspectos_sociologicos1"=>$request->aspectos_sociologicos1,
                               "aspectos_sociologicos2"=>$request->aspectos_sociologicos2,
                               "aspectos_sociologicos3"=>$request->aspectos_sociologicos3,
                               "aspectos_academicos1"=>$request->aspectos_academicos1,
                               "aspectos_academicos2"=>$request->aspectos_academicos2,
                               "aspectos_academicos3"=>$request->aspectos_academicos3,
                               "otros"=>$request->otros,
                               "observaciones"=>$request->observaciones,
                               "status"=>$request->status,
                               "desc_area"=>$request->desc_area,
                               "desc_subarea"=>$request->desc_subarea));
    }

    public function show($id)
    {
    }

    public function edit($id)
    {   
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {    
    }
}
