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
            $table->string('prioridad_id');
            $table->string('estatus_id');
            $table->string('equipo_id');
            $table->string('titulo');
            $table->string('descripcion');
            $table->timestamp('fecha_inicio');
            $table->timestamp('fecha_termino')->nullable();
            $table->timestamp('tiempo_resolucion')->nullable();
            $table->timestamps();

            $table->foreignId('usuario_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('tecnico_id')->nullable()->constrained('support')->onDelete('cascade');
            $table->foreignId('categoria_id')->nullable()->constrained('option')->onDelete('cascade');
            $table->foreign('prioridad_id')->references('nombre')->on('priority')->onDelete('cascade');
            $table->foreign('estatus_id')->references('nombre')->on('status')->onDelete('cascade');
            $table->foreign('equipo_id')->references('numero_serie')->on('computer')->onDelete('cascade');
            
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
