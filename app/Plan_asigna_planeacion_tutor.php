<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan_asigna_planeacion_tutor extends Model
{
    //
    protected $table ="plan_asigna_planeacion_tutor";
    protected $primaryKey="id_asigna_planeacion_tutor";
    public $timestamps=false;
    protected $fillable=["id_asigna_planaeacion_actividad","id_asigna_tutor ","id_estrategia","estrategia","id_sugerencia ",
        "sugerencia ", "requiere_evidencia "];
}
