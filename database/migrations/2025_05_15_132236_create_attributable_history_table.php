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
        Schema::create('attributable_history', function (Blueprint $table) {
            $table->id();
            $table->string('atributo_tipo');
            $table->string('atributo_valor_anterior')->nullable();
            $table->string('atributo_valor_nuevo');
            $table->unsignedBigInteger('attributable_id');
            $table->string('attributable_type');
            $table->timestamp('fecha_cambio')->useCurrent();
            //$table->string('usuario')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attributable_history');
    }
};
