<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exp_generacion extends Model
{
    //
    protected $table='exp_generacion';
    protected $primaryKey='id_generacion';
    protected $fillable=['generacion'];

    function getGrupo()
    {
        return $this->hasMany('App\Exp_asigna_generacion','id_generacion','id_generacion');
    }
}
