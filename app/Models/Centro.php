<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Centro extends Model
{
    //
     use softDeletes;
    protected $table="centros";
    protected $primaryKey = 'id_centro';
    public $timestamps=false;

    protected $fillable=[
    'nombre',
    'costo',
    'direccion'];
    //created_at, updated_at, deleted_at (timestamps) pueden llevar valores null
}
