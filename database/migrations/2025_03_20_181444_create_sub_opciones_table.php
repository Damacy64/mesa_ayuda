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
        Schema::create('sub_opciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_opc_categoria');
            $table->string('nombre_opcion');
            $table->timestamps();
            $table->foreign('id_opc_categoria')->references('id')->on('opciones_categoria')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_opciones');
    }
};
