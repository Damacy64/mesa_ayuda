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
        Schema::create('equipo_user_final', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_final_id')
                  ->constrained('user_finals')
                  ->onDelete('cascade');
            $table->unsignedInteger('equipo_id');
            $table->foreign('equipo_id')
                  ->references('numero_serie')
                  ->on('equipos')
                  ->onDelete('cascade');
            $table->timestamp('fecha_asignacion')->useCurrent();
            $table->timestamp('fecha_liberacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computer_user_final');
    }
};
