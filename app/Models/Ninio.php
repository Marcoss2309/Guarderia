<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ninio extends Model
{
    //
    use softDeletes;
    protected $table="ninios";
    protected $primaryKey="id_ninio";
    public $timestamps=false;

    protected $fillable=[
        "matricula",
        "id_persona",
        "id_centro",
        "fecha_ingreso",
    ];
}
