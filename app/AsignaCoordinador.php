<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class AsignaCoordinador extends Model
{


    public static function getExistCoordinador(){
        $datos=DB::select('SELECT exp_asigna_coordinador.id_asigna_coordinador,exp_asigna_coordinador.id_personal,gnral_personales.nombre FROM exp_asigna_coordinador,gnral_personales where exp_asigna_coordinador.id_personal=gnral_personales.id_personal and 
                                   exp_asigna_coordinador.deleted_at is null and
                                  exp_asigna_coordinador.id_jefe_periodo=(SELECT gnral_jefes_periodos.id_jefe_periodo from gnral_jefes_periodos, gnral_personales where gnral_personales.id_personal=gnral_jefes_periodos.id_personal 
                                  AND gnral_jefes_periodos.id_periodo=2 and gnral_personales.tipo_usuario='.Auth::user()->id.')');
        if(($datos))
        {
           return true;
        }
        else{
            return false;
        }
    }
    public static function getCoordinador(){

        $datos=DB::select('SELECT exp_asigna_coordinador.id_asigna_coordinador,exp_asigna_coordinador.id_personal,gnral_personales.nombre 
                                  FROM exp_asigna_coordinador,gnral_personales where exp_asigna_coordinador.id_personal=gnral_personales.id_personal and exp_asigna_coordinador.deleted_at is null and 
                                  exp_asigna_coordinador.id_jefe_periodo=(SELECT gnral_jefes_periodos.id_jefe_periodo 
                                  from gnral_jefes_periodos, gnral_personales where gnral_personales.id_personal=gnral_jefes_periodos.id_personal 
                                  AND gnral_jefes_periodos.id_periodo=2 and gnral_personales.tipo_usuario='.Auth::user()->id.')');
        return $datos;
    }


    public static function getAllProf(){

        $profesores=DB::select('SELECT gnral_personales.id_personal, gnral_personales.nombre 
          FROM gnral_horarios,gnral_periodo_carreras, gnral_personales 
          WHERE gnral_personales.id_personal=gnral_horarios.id_personal 
          AND gnral_horarios.id_periodo_carrera=gnral_periodo_carreras.id_periodo_carrera 
          AND gnral_periodo_carreras.id_periodo=2 
          and gnral_periodo_carreras.id_carrera in 
          (SELECT gnral_jefes_periodos.id_carrera from gnral_jefes_periodos,gnral_personales 
          WHERE gnral_jefes_periodos.id_personal=gnral_personales.id_personal 
          and gnral_personales.tipo_usuario='.Auth::user()->id.') ORDER BY gnral_personales.nombre ');
        return $profesores;
    }
}
