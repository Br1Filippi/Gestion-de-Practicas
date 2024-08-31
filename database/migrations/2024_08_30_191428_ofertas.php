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
        Schema::create('ofertas',function(Blueprint $table){
            
            $table->id();
            $table->date('fecha_publicacion');
            $table->unsignedBigInteger('cupos');
            $table->text('descripcion');
            $table->string('area');
            $table->string('comuna');
            $table->string('ciudad');
            $table->string('tipo');

            //relaciones
            $table->unsignedBigInteger('id_empresa');
            $table->foreign('id_empresa')->references('id')->on('empresas');

            $table->unsignedBigInteger('id_carrera');
            $table->foreign('id_carrera')->references('id')->on('carreras');
            
            //$table->timestamps();
            
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
