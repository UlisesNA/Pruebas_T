<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exp_bebidas extends Model
{
    //
    protected $table ="exp_bebidas";
    protected $primaryKey="id_expbebida";

    protected $fillable=["descripcion_bebida"];
}
