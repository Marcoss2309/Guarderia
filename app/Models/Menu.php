<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
     use SoftDeletes;
    //
    protected $table="menus";
    protected $primaryKey="id_menu";

    protected $fillable=[
        "id_plato",
        "id_ingrediente",
    ];

    public function plato(){
        return $this->belongsTo(Plato::class,'id_plato');
    }
    public function ingrediente(){
        return $this->belongsTo(Ingrediente::class,'id_ingrediente');
    }
}
