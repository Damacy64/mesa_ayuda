<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {        
        Schema::create('attributable', function (Blueprint $table) {
            $table->string('atributo_tipo');
            $table->string('atributo_valor');
            $table->unsignedBigInteger('attributable_id');
            $table->string('attributable_type');
            $table->primary(['atributo_tipo', 'atributo_valor', 'attributable_type', 'attributable_id']);
        
            $table->foreign(['atributo_tipo', 'atributo_valor'])
                  ->references(['tipo', 'valor'])->on('attributes')
                  ->onDelete('cascade');
        
            $table->foreign('attributable_id')
                  ->references('numero_serie')->on('computer')
                  ->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attributes_computer');
    }
};
