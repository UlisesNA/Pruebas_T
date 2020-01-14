<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gnral_carreras extends Model
{
    protected $table ="gnral_carreras";
    protected $primaryKey="id_carrera";
    protected $fillable=["nombre", "siglas","COLOR"];
}
