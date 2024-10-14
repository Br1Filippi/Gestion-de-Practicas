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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('rut_estudiante');
            $table->unsignedBigInteger('edad_estudiante');
            $table->string('fono_estudiante');
            $table->string('direccion_estudiante');
            $table->text('desc_estudiante');

            $table->unsignedBigInteger('id_carrera');
            $table->foreign('id_carrera')->references('id')->on('carreras');
            
            $table->string('id_usuario');
            $table->foreign('id_usuario')->references('correo_usuario')->on('usuarios');

            // $table->timestamps() 
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
