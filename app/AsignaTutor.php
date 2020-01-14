<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;
class AsignaTutor extends Model
{
    protected $table ="asigna_tutor";
    protected $primaryKey="id_asigna_tutor";
    public $timestamps = false;
    protected $fillable=["id_personal","id_grupo","id_carrera","id_semestre"];
}
