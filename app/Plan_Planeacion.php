<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exp_generacion;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class Plan_Planeacion extends Model
{
    use SoftDeletes;
    protected $table='plan_planeacion';
    protected $primaryKey='id_planeacion';
    protected $fillable=['id_generacion','id_periodo'];
}
