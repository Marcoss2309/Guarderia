<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parentezco extends Model
{
    //
    protected $table = "parentezcos";
    // protected $primary_key="valor de primary key";
    public $timestamps = false;

    protected $fillable = ['id_parentezcos', 'nom'];

    //created_at, updated_at, deleted_at (timestamps) pueden llevar valores null
}
