<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exp_generacion;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exp_asigna_generacion extends Model
{
    //
    use SoftDeletes;
    protected $table='exp_asigna_generacion';
    protected $primaryKey='id_asigna_generacion';
    protected $fillable=['id_generacion','grupo','id_jefe_periodo'];

    function getGeneracion()
    {
        return $this->hasMany('App\Exp_generacion','id_generacion','id_generacion');
    }
}
