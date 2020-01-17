<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exp_parentesco extends Model
{
    protected $table ="exp_parentescos";
    protected $primaryKey="id_parentesco";
    public $timestamps = false;
    protected $fillable=["desc_parentesco"];
}
