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
            //$table->unsignedBigInteger('usuario_id');
            $table->string('tecnico_id');
            $table->string('categoria_id');
            $table->string('prioridad_id');
            $table->string('estatus_id');
            $table->string('equipo_id');
            $table->string('titulo');
            $table->string('descripcion');
            $table->timestamp('fecha_inicio');
            $table->timestamp('fecha_termino')->nullable();
            $table->timestamp('tiempo_resolucion')->nullable();
            $table->timestamps();

            // $table->foreignId('usuario_id')->nullable()->constrained('users')->onDelete('cascade');
            // $table->foreign('tecnico_id')->references('id')->on('support')->onDelete('cascade');
            // $table->foreign('categoria_id')->references('id')->on('option')->onDelete('cascade');
            
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
