<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan_asigna_planeacion_actividad extends Model
{
    //
    protected $table ="plan_asigna_planeacion_actividad";
    protected $primaryKey=" 	id_asigna_planeacion_actividad";
    public $timestamps=false;
    protected $fillable=["id_planeacion ","id_plan_actividad  ","comentario ","id_estado"];
}
