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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id('folio');
            $table->string('prioridad_id', 50);
            $table->string('estatus_id', 50);
            $table->unsignedBigInteger('equipo_id');
            $table->string('titulo');
            $table->text('descripcion');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('fecha_termino')->nullable();
            $table->timestamp('tiempo_solucion')->nullable();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('tecnico_id');

            $table->foreign('prioridad_id')->references('nombre')->on('priority');
            $table->foreign('estatus_id')->references('nombre')->on('status');
            $table->foreign('equipo_id')->references('numero_serie')->on('equipos');
            $table->foreign('usuario_id')->references('id')->on('user_finals');
            $table->foreign('tecnico_id')->references('id')->on('support');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
