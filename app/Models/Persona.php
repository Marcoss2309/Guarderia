<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persona extends Model
{
    use SoftDeletes;
    //
    protected $table="personas";
    protected $primaryKey="id_persona";
    public $timestamps=false;

    protected $fillable=[
        "nombre",
        "apellido_paterno",
        "fecha_nacimiento",
        "apellido_materno"
    ];
    //created_at, updated_at, deleted_at (timestamps) pueden llevar valores null
}
