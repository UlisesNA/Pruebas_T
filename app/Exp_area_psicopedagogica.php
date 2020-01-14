<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exp_area_psicopedagogica extends Model
{
    protected $table ="exp_area_psicopedagogica";
    protected $primaryKey="id_exp_area_psicopedagogica";
    public $timestamps = false;
    protected $fillable=["rendimiento_escolar","dominio_idioma","otro_idioma","conocimiento_compu","aptitud_especial",
        "comprension","preparacion","estrategias_aprendizaje","organizacion_actividades","concentracion","solucion_problemas",
        "condiciones_ambientales","busqueda_bibliografica","trabajo_equipo"];
}
