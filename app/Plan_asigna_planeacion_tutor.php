<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Exp_generacion;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class Plan_asigna_planeacion_tutor extends Model
{
    use SoftDeletes;
    protected $table='plan_asigna_planeacion_tutor';
    protected $primaryKey='id_asigna_planeacion_tutor';
    protected $fillable=[' 	id_asigna_planeacion_actividad','id_tutor ','id_estrategia ','estrategia','id_sugerencia','sugerencia','requiere_evidencia'];

}
