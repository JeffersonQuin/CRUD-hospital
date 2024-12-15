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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');         // Campo apellido
            $table->string('phone');            // Campo teléfono
            $table->string('address');          // Campo dirección
            $table->string('email')->unique();  // Campo correo electrónico (debe ser único)
            $table->string('password');         // Campo contraseña
            $table->integer('rol_id');          // Campo para rol
            $table->integer('specialty_id');    // Campo para especialidad
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};