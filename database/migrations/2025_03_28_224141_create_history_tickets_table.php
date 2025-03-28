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
        Schema::create('history_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_id');
            $table->timestamp('fecha_actualizacion');
            $table->string('campo_modificado');
            $table->string('estado_anterior');
            $table->string('estado_nuevo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_tickets');
    }
};
