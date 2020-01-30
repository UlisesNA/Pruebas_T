<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exp_asigna_alumnos extends Model
{
    //
    use SoftDeletes;
    protected $table='exp_asigna_alumnos';
    protected $primaryKey='id_asigna_alumno';
    protected $fillable=['id_alumno','id_asigna_generacion','estado'];
}
