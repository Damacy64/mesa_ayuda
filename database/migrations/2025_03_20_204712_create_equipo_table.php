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
        Schema::create('equipo', function (Blueprint $table) {
            $table->id();
            $table->string('id_tipo_dispositivo');
            $table->string('id_marca');
            $table->string('modelo');
            $table->string('numero_serie');
            $table->string('id_sistema_operativo');
            $table->string('numero_inventario');
            $table->string('id_office');
            $table->string('id_procesador');
            $table->string('velocidad_procesador');
            $table->string('id_capacidad_disco');
            $table->string('id_capacidad_ram');
            $table->string('unidad_flash');
            $table->timestamps();

            $table->foreign('id_tipo_dispositivo')->references('tipo_dispositivo')->on('tipo_dispositivo')->onDelete('cascade');
            $table->foreign('id_marca')->references('marca_dispositivo')->on('marca')->onDelete('cascade');
            $table->foreign('id_sistema_operativo')->references('sistema')->on('sistema_operativo')->onDelete('cascade');
            $table->foreign('id_office')->references('version')->on('office')->onDelete('cascade');
            $table->foreign('id_procesador')->references('nombre_procesador')->on('procesador')->onDelete('cascade');
            $table->foreign('id_capacidad_disco')->references('capacidad')->on('disco_duro')->onDelete('cascade');
            $table->foreign('id_capacidad_ram')->references('capacidad')->on('memoria_ram')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipo');
    }
};
