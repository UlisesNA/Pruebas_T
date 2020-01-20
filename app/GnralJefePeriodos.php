<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class GnralJefePeriodos extends Model
{
    //

    protected $table="gnral_jefes_periodos";
    protected $primaryKey='id_jefe_periodo';
    protected $fillable=['id_carrera','id_personal','tipo_cargo','id_periodo'];


    public static function isJefe($data){
        //dd($data);
        $datos= DB::select('SELECT gnral_personales.nombre, gnral_personales.id_departamento,gnral_personales.tipo_usuario,gnral_jefes_periodos.id_carrera,gnral_jefes_periodos.id_personal from
        gnral_personales,users,gnral_jefes_periodos, gnral_carreras where
        gnral_personales.tipo_usuario=users.id and
        gnral_jefes_periodos.id_personal=gnral_personales.id_personal and
        gnral_jefes_periodos.id_carrera=gnral_carreras.id_carrera and
        gnral_jefes_periodos.id_periodo=2 and
        gnral_personales.tipo_usuario='.$data->id);
        //gnral_jefes_periodos.id_carrera
        return $datos;
    }
}
