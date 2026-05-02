<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Abono extends Model
{
    use SoftDeletes;

    protected $table = 'abonos';
    protected $primaryKey = 'id_abono';
    
    protected $fillable = [
        'id_ninio',
        'cantidad',
        'fecha'
    ];

    protected $casts = [
        'fecha' => 'date',
        'cantidad' => 'decimal:2'
    ];

    // Relación con Niño
    public function ninio()
    {
        return $this->belongsTo(Ninio::class, 'id_ninio', 'id_ninio');
    }
}