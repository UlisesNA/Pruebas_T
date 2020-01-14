<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gnral_periodos extends Model
{
    protected $table ="gnral_periodos";
    protected $primaryKey="id_periodo";
    protected $fillable=["periodo", "fecha_inicio","fecha_termino","ciclo"];
}
