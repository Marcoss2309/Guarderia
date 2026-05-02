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

    public function persona() //Relacion con la tabla personas, el primer id es la fk, la segunda la pk
    {
        return $this->belongsTo(Persona::class, 'id_persona', 'id_persona');
    }

    public function centro()
    {
        return $this->belongsTo(Centro::class, 'id_centro', 'id_centro');
    }
    // En app/Models/Ninio.php, agrega:
    public function abonos()
    {
        return $this->hasMany(Abono::class, 'id_ninio', 'id_ninio');
    }
}
