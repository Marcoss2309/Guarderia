<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
     use softDeletes;
    //
     protected $table="menus";
    protected $primaryKey="id_menu";
    public $timestamps=false;

    protected $fillable=[
        "id_plato",
        "id_ingrediente",
    ];

}
