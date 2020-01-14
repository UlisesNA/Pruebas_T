<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exp_familia_union extends Model
{
    protected $table ="exp_familia_union";
    protected $primaryKey="id_familia_union";
    protected $fillable=["desc_union"];
}
