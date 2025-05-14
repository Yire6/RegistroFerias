<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('feria_emprendedor', function (Blueprint $table) {
        // foreignId crea columna unsignedBigInt + FK
        $table->foreignId('feria_id')
              ->constrained('ferias')
              ->cascadeOnDelete();

        $table->foreignId('emprendedor_id')
              ->constrained('emprendedores')
              ->cascadeOnDelete();

        // clave primaria compuesta
        $table->primary(['feria_id', 'emprendedor_id']);
    });
}

public function down(): void
{
    Schema::dropIfExists('feria_emprendedor');
}

};
