<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asigna_planeacion extends Model
{
    protected $table ="asigna_planeacion_actividad";
    protected $primaryKey="id_asigna_planeacion_actividad";
    public $timestamps = false;
    protected $fillable=["id_planeacion", "id_asigna_tutor","id_modulo","sesion"];
}
