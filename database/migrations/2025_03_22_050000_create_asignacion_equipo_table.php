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
        Schema::create('asignacion_equipo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_equipo');
            $table->unsignedBigInteger('id_usuario');
            $table->date('fecha_asignacion');
            $table->string('serie_monitor');
            $table->string('serie_teclado');
            $table->string('serie_mouse');
            $table->string('direccion_ip');
            $table->string('servicio_internet');
            $table->timestamps();

            $table->foreign('id_equipo')->references('id')->on('equipo')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignacion_equipo');
    }
};
