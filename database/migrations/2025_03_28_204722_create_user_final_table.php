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
        Schema::create('user_final', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empleados_id');
            $table->string('ubicacion_id');
            $table->string('area_id');
            $table->timestamps();

            $table->foreign('ubicacion_id')->references('piso')->on('ubicacion')->onDelete('cascade');
            $table->foreign('area_id')->references('departamento')->on('area')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_final');
    }
};
