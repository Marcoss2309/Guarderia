<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parentesco extends Model
{
    //
    use softDeletes;
    protected $table="parentescos";
    protected $primaryKey="id_parentesco";
    public $timestamps=false;

    protected $fillable=[
        "nombre",
       
    ];
}
