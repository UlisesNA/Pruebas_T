<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exp_generacion;

class Exp_asigna_generacion extends Model
{
    //
    protected $table='exp_asigna_generacion';
    protected $fillable=['id_generacion','grupo','id'];

    function getGrupo()
    {
        return $this->hasMany('App\Exp_generacion','id_generacion','id_generacion');
    }
}
