<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingrediente extends Model
{
    //
     use softDeletes;
    protected $table="Ingredientes";
    protected $primaryKey="id_ingrediente";
    public $timestamps=false;
    

    protected $fillable=[
    'nombre',
    ];
    //created_at, updated_at, deleted_at (timestamps) pueden llevar valores null
}
