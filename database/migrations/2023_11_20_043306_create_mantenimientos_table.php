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
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->timestamps();
            $table->unsignedBigInteger('vehiculos_id')->nullable();
            $table->foreign('vehiculos_id')->references('id')->on('vehiculos');
            $table->unsignedBigInteger('rutinas_id')->nullable();
            $table->foreign('rutinas_id')->references('id')->on('rutinas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mantenimientos');
    }
};
