<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class GnralJefePeriodos extends Model
{
    //

    protected $table="gnral_jefes_periodos";
    protected $primaryKey='id_jefe_periodo';
    protected $fillable=['id_carrera','id_personal','tipo_cargo','id_periodo'];


}
