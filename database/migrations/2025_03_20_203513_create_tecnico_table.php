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
        Schema::create('tecnico', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_administrador');
            $table->string('id_area');
            $table->string('id_location');
            $table->string('number_employer');
            $table->string('specialty');
            $table->string('name');
            $table->string('last_name_p');
            $table->string('last_name_m')->nullable();
            $table->string('sex');
            $table->string('workload');
            $table->string('availability');
            $table->string('email');
            $table->string('password');
            $table->timestamps();

            $table->foreign('id_administrador')->references('id')->on('administrador')->onDelete('cascade');
            $table->foreign('id_location')->references('piso')->on('ubicacion')->onDelete('cascade');
            $table->foreign('id_area')->references('departamento')->on('area')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tecnico');
    }
};
