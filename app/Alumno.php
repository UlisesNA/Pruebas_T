<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Alumno extends Model
{
    //
    public static function lista_grupo($dat)
    {

        //dd($dat->id);
        $al=DB::select('SELECT gnral_alumnos.cuenta, gnral_alumnos.nombre, gnral_alumnos.apaterno, gnral_alumnos.amaterno 
                              from gnral_alumnos, exp_asigna_alumnos WHERE gnral_alumnos.id_carrera=
                              (SELECT gnral_jefes_periodos.id_carrera from gnral_jefes_periodos, gnral_personales 
                              where gnral_personales.id_personal=gnral_jefes_periodos.id_personal AND 
                              gnral_jefes_periodos.id_periodo=2 and gnral_personales.tipo_usuario='.Auth::user()->id.') AND 
                              exp_asigna_alumnos.id_alumno=gnral_alumnos.id_alumno AND
                               exp_asigna_alumnos.id_asigna_generacion='.$dat->dato.' ORDER BY gnral_alumnos.nombre ');

        return $al;
    }
    public static function lista_general()
    {
        $alum=DB::select('SELECT gnral_alumnos.cuenta, gnral_alumnos.nombre, gnral_alumnos.apaterno, gnral_alumnos.amaterno from gnral_alumnos 
                  WHERE gnral_alumnos.id_carrera=(SELECT gnral_jefes_periodos.id_carrera from 
                  gnral_jefes_periodos, gnral_personales where gnral_personales.id_personal=gnral_jefes_periodos.id_personal 
                  AND gnral_jefes_periodos.id_periodo=2 and gnral_personales.tipo_usuario='.Auth::user()->id.') ORDER BY gnral_alumnos.nombre ');

        return $alum;
    }
    public static function generacion()
    {
        $gen=DB::select('SELECT exp_asigna_generacion.id_asigna_generacion,exp_generacion.generacion,exp_generacion.id_generacion, exp_asigna_generacion.grupo from exp_generacion, exp_asigna_generacion WHERE exp_generacion.id_generacion=exp_asigna_generacion.id_generacion AND exp_asigna_generacion.id_asigna_generacion NOT IN (SELECT exp_asigna_generacion.id_asigna_generacion
                              from gnral_personales, exp_asigna_tutor,exp_asigna_generacion,exp_generacion where
                               exp_asigna_tutor.id_personal=gnral_personales.id_personal AND exp_asigna_tutor.id_asigna_generacion=exp_asigna_generacion.id_asigna_generacion AND 
                               exp_asigna_generacion.id_generacion=exp_generacion.id_generacion AND exp_asigna_tutor.id_jefe_periodo in (SELECT gnral_jefes_periodos.id_jefe_periodo from gnral_jefes_periodos, gnral_personales where gnral_personales.id_personal=gnral_jefes_periodos.id_personal 
                                AND gnral_jefes_periodos.id_periodo=2 and gnral_personales.tipo_usuario='.Auth::user()->id.'))');
        return $gen;
    }
    public static function updateEst($datos){
        //dd($datos);
        //dd('UPDATE alumnos SET estado = '.$datos->estado.' WHERE (id_alumno = '.$datos->id.');');
        DB::update('UPDATE alumnos SET estado = '.$datos->estado.' WHERE (id_alumno = '.$datos->id.');');
    }
    public static function Verifica($datos){
        if ($datos->usuario=='Alumno') {
            $con= DB::select('SELECT * FROM gnral_alumnos where cuenta="'.$datos->contra.'";');
            if ($con) {
                return $con;
                # code...
            }
            # code...
        }
    }
    public static function getCuenta(){
            $con= DB::select('SELECT nombre,apaterno,amaterno,cuenta FROM gnral_alumnos where
            gnral_alumnos.id_usuario='.Auth::user()->id);
            return $con;
    }
}
