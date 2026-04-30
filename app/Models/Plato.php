<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plato extends Model
{
    //
    use SoftDeletes;
    protected $table="platos";
    protected $primaryKey="id_plato";
    public $timestamps=false;
    

    protected $fillable=[
    'nombre',
    'precio'];
}