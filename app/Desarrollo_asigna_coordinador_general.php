<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class Desarrollo_asigna_coordinador_general extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table ="desarrollo_asigna_coordinador_general";
    protected $primaryKey="id_asigna_coordinador_general";
    protected $fillable=["id_personal_asigna","id_personal"];

    public static function getCoordinador(){

        $datos=DB::select('SELECT desarrollo_asigna_coordinador_general.id_asigna_coordinador_general,desarrollo_asigna_coordinador_general.id_personal,gnral_personales.nombre 
                                  FROM desarrollo_asigna_coordinador_general,gnral_personales where desarrollo_asigna_coordinador_general.id_personal=gnral_personales.id_personal and desarrollo_asigna_coordinador_general.deleted_at is null and 
                                  desarrollo_asigna_coordinador_general.id_personal_asigna='.Session::get('desarrollo'));
        return $datos;
    }
}
