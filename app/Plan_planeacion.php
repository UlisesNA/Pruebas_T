<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan_planeacion extends Model
{
    //
    protected $table ="plan_planeacion";
    protected $primaryKey="id_planeacion";
   // public $timestamps=false;
    protected $fillable=["id_asigna_generacion"];
}
