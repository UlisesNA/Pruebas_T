<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exp_generacion;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class Plan_asigna_planeacion_actividad extends Model
{
    use SoftDeletes;
    protected $table='plan_asigna_planeacion_actividad';
    protected $primaryKey='id_asigna_planeacion_actividad';
    protected $fillable=['id_planeacion','id_plan_actividad','comentario','id_estado'];
}
