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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('equipo_id');
            $table->unsignedBigInteger('usuario_id');
            $table->date('fecha_asignacion');
            $table->string('serie_teclado');
            $table->string('serie_mouse');
            $table->string('serie_monitor');
            $table->string('servicio_internet');
            $table->timestamps();

            $table->foreign('equipo_id')->references('numero_serie')->on('equipo')->onDelete('cascade');
            $table->foreignId('usuario_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
