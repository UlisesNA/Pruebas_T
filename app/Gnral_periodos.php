<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gnral_periodos extends Model
{
    use SoftDeletes;
    protected $table ="gnral_periodos";
    protected $primaryKey="id_periodo";
    protected $fillable=["periodo", "fecha_inicio","fecha_termino","ciclo"];
}
