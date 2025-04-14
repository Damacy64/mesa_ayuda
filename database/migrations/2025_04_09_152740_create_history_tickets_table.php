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
            $table->unsignedBigInteger('ticket_id');
            $table->string('estado_anterior', 50);
            $table->string('estado_nuevo', 50);
            $table->string('comentario', 255);
            $table->foreignId('usuario_responsable_id')->constrained('user_finals');
            $table->timestamps();

            $table->foreign('ticket_id')->references('folio')->on('tickets')->onDelete('cascade');
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
