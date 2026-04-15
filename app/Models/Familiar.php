<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Familiar extends Model

{
    //
     use softDeletes;
     protected $table="familiares";
    protected $primaryKey = 'id_familiar';
    public $timestamps=false;

    protected $fillable=[
    'id_persona',
    'telefono',
    'dni',
    'direccion',
    'id_parentesco',
    'id_ninio'];
    //created_at, updated_at, deleted_at (timestamps) pueden llevar valores null

}
