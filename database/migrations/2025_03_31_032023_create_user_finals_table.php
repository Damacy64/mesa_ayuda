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
        Schema::create('user_finals', function (Blueprint $table) {
            $table->id();
            $table->string('ubicacion_id');
            $table->string('area_id');
            $table->string('estado')->default('HABILITADO');
            $table->timestamps();

            $table->foreign('ubicacion_id')->references('piso')->on('locations')->onDelete('cascade');
            $table->foreign('area_id')->references('nombre')->on('areas')->onDelete('cascade');
            //$table->foreign('departamento_id')->references('nombre')->on('departamentos')->onDelete('cascade');
            $table->foreignId('empleado_id')->nullable()->constrained('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_finals');
    }
};
