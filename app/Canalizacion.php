<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Canalizacion extends Model
{
    protected $table ="canalizacion";
    protected $primaryKey="id_canalizacion";
    public $timestamps=false;
    protected $fillable=["id_alumno","id_personal","fecha_canalizacion","hora","aspectos_personales1","aspectos_personales2","aspectos_personales3"
        ,"aspectos_sociologicos1","aspectos_sociologicos2","aspectos_sociologicos3","aspectos_academicos1","aspectos_academicos2","aspectos_academicos3"
        ,"observaciones","otros","notificacion","id_area"];
}
