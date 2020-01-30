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


    public static function getCuenta(){
            $con= DB::select('SELECT nombre,apaterno,amaterno,cuenta FROM gnral_alumnos where
            gnral_alumnos.id_usuario='.Auth::user()->id);
            return $con;
    }
}
