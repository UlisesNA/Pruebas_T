<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exp_generale extends Model
{
    protected $table ="exp_generales";
    protected $primaryKey="id_exp_general";
    public $timestamps = false;
    protected $fillable=["id_carrera","id_periodo","id_grupo","nombre","edad","sexo","fecha_nacimientos","lugar_nacimientos","id_semestre",
        "id_estado_civil","no_hijos","direccion","correo","tel_casa","cel","id_nivel_economico","trabaja","ocupacion",
        "horario","no_cuenta","beca","tipo_beca","estado","turno","poblacion","ant_inst","satisfaccion_c","materias_repeticion","tot_repe",
        "materias_especial","tot_espe","gen_espe","id_alumno"];

    public function carrera (){
        return $this->hasMany('App\Gnral_carreras','id_carrera','id_carrera');

    }
    public function periodo (){
        return $this->hasMany('App\Gnral_periodos','id_periodo','id_periodo');

    }
    public function grupo (){
        return $this->hasMany('App\Gnral_grupos','id_grupo','id_grupo');

    }
    public function semestre (){
        return $this->hasMany('App\Gnral_semestre','id_semestre','id_semestre');

    }
    public function civil (){
        return $this->hasMany('App\Exp_civil_estado','id_estado_civil','id_estado_civil');

    }
    public function nivel (){
        return $this->hasMany('App\Exp_opc_nivel_socio','id_nivel_economico','id_nivel_economico');

    }
    public function turno (){
        return $this->hasMany('App\Exp_turno','id_turno','id_turno');

    }
}
