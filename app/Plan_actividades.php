<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Exp_generacion;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;;

class Plan_actividades extends Model
{
    use SoftDeletes;
    protected $table='plan_actividades';
    protected $primaryKey='id_plan_actividad';
    protected $fillable=['desc_actividad','objetivo_actividad','fi_actividad','ff_actividad','id_generacion'];

}
