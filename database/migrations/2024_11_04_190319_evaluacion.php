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
        Schema::create('evaluacion', function (Blueprint $table) {
            $table->id();
            $table->integer('capacidad');
            $table->integer('confianza');
            $table->integer('aplicacion');
            $table->integer('adaptabilidad');
            $table->integer('iniciativa');
            $table->integer('aptitud');
            $table->integer('conocimiento');
            $table->integer('asistencia');
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
