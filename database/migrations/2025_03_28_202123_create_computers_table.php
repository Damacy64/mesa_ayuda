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
        Schema::create('computers', function (Blueprint $table) {
            $table->unsignedBigInteger('numero_serie')->primary();
            $table->string('numero_inventario');
            $table->string('modelo');
            $table->string('direccion_ip', 15);
            $table->string('internet');
            $table->string('serie_monitor')->nullable();
            $table->string('serie_mouse')->nullable();
            $table->string('serie_teclado')->nullable();
            $table->string('version_procesador')->nullable();
            $table->string('flash')->nullable();
            $table->string('estado')->default('HABILITADO'); // HABILITADO, DESHABILITADO
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computers');
    }
};
