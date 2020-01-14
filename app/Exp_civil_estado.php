<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exp_civil_estado extends Model
{
    protected $table ="exp_civil_estados";
    protected $primaryKey="id_estado_civil";
    protected $fillable=["desc_ec"];
}
