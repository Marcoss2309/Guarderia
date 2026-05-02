<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('abonos', function (Blueprint $table) {
            $table->id('id_abono');
            $table->integer('id_ninio')->unsigned();  // ← CAMBIADO a integer
            $table->decimal('cantidad', 10, 2);
            $table->date('fecha');
            $table->timestamps();
            $table->softDeletes();
            
           
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('abonos');
    }
};