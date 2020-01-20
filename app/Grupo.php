<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class Grupo extends Model
{
    //
    public  $table='gnral_grupos';
    public $primaryKey='id_grupo';
    public $fillable=['grupo'];

    public static function generacion()
    {
        $gen=DB::select('SELECT exp_asigna_generacion.id_asigna_generacion,exp_generacion.generacion,exp_generacion.id_generacion, exp_asigna_generacion.grupo
                                from exp_generacion, exp_asigna_generacion WHERE exp_generacion.id_generacion=exp_asigna_generacion.id_generacion
                              AND exp_asigna_generacion.id_asigna_generacion NOT IN (SELECT exp_asigna_generacion.id_asigna_generacion
                              from gnral_personales, exp_asigna_tutor,exp_asigna_generacion,exp_generacion where
                               exp_asigna_tutor.id_personal=gnral_personales.id_personal AND exp_asigna_tutor.id_asigna_generacion=exp_asigna_generacion.id_asigna_generacion AND 
                               exp_asigna_generacion.id_generacion=exp_generacion.id_generacion and exp_asigna_tutor.deleted_at is null AND exp_asigna_tutor.id_jefe_periodo in 
                               (SELECT gnral_jefes_periodos.id_jefe_periodo from gnral_jefes_periodos, gnral_personales 
                               where gnral_personales.id_personal=gnral_jefes_periodos.id_personal 
                                AND gnral_jefes_periodos.id_periodo=2 and gnral_personales.tipo_usuario='.Auth::user()->id.')) AND exp_asigna_generacion.id='.Auth::user()->id.' ORDER BY exp_generacion.generacion');
        return $gen;
    }

}
