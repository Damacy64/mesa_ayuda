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
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_tecnico');
            $table->unsignedBigInteger('id_categoria');
            $table->string('id_prioridad');
            $table->string('id_estatus');
            $table->string('titulo');
            $table->string('descripcion');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_termino')->nullable();
            $table->time('tiempo_resolucion')->nullable();
            $table->timestamps();

            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_tecnico')->references('id')->on('tecnico')->onDelete('cascade');
            $table->foreign('id_categoria')->references('id')->on('categoria')->onDelete('cascade');
            $table->foreign('id_prioridad')->references('nombre')->on('prioridad')->onDelete('cascade');
            $table->foreign('id_estatus')->references('nombre')->on('estatus')->onDelete('cascade');
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
