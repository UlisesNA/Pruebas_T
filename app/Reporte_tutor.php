<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
class Reporte_tutor extends Model
{
    protected $table = "reporte_tutor";
    protected $primaryKey = "id_reporte_tutor";
    public $timestamps = false;
    protected $fillable = ["id_asigna_tutor", "alumno","n_cuenta","tutoria_grupal", "tutoria_individual","beca","repeticion","especial","academico","medico",
        "psicologico","baja","observaciones"];
}
