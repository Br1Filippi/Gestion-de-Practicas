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
        Schema::create('comunas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); 
            $table->unsignedBigInteger('id_region');
            $table->foreign('id_region')->references('id')->on('regiones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
