<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exp_asigna_tutor extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table ="exp_asigna_tutor";
    protected $primaryKey="id_asigna_tutor";
    protected $fillable=["id_jefe_periodo","id_personal","id_asigna_generacion"];

}
