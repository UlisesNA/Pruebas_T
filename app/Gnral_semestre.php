<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gnral_semestre extends Model
{
    protected $table ="gnral_semestres";
    protected $primaryKey="id_semestre";
    protected $fillable=["descripcion"];
}
