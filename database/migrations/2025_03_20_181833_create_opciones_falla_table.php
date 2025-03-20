<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Livewire\on;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('opciones_falla', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sub_opciones');
            $table->timestamps();
            $table->foreign('id_sub_opciones')->references('id')->on('opciones_falla')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opciones_falla');
    }
};
