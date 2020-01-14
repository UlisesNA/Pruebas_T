<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class actividades extends Model
{
    //
    protected $table ="actividades";
    protected $primaryKey="id_actividad";
    public $timestamps=false;
    protected $fillable=["id_planeacion","titulo_act","desc_act","instrucciones","evidencia","id_estado"];
}
