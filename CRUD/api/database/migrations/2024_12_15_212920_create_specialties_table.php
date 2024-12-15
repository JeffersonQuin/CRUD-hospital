<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('specialties', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Definir el nombre o las columnas necesarias para specialties
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('specialties');
}
};
