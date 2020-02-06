<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan_actividades extends Model
{
    //
    protected $table ="plan_actividades";
    protected $primaryKey="id_plan_actividad";
    public $timestamps=false;
    protected $fillable=["desc_actividad","objetivo_actividad","fi_actividad ","ff_actividad "];
}
