<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Canalizacion extends Model
{
    protected $table ="tutor_canalizacion";
    protected $primaryKey="id_canalizacion";
    protected $fillable=["id_alumno","id_personal","fecha_canalizacion","fecha_canalizacion_anterior","fecha_canalizacion_siguiente","hora"
        ,"aspectos_sociologicos1","aspectos_sociologicos2","aspectos_sociologicos3","aspectos_academicos1","aspectos_academicos2","aspectos_academicos3"
        ,"observaciones","otros","notificacion","id_area","id_subarea","status"];
}
