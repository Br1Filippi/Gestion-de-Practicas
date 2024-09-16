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
            $table->string('titulo');
            $table->date('fecha_publicacion');
            $table->unsignedBigInteger('cupos');
            $table->text('descripcion');
            $table->softDeletes();

            //relaciones
            $table->unsignedBigInteger('id_comuna');
            $table->foreign('id_comuna')->references('id')->on('comunas');

            $table->unsignedBigInteger('id_region');
            $table->foreign('id_region')->references('id')->on('regiones');

            $table->unsignedBigInteger('id_tipo');
            $table->foreign('id_tipo')->references('id')->on('tipos');

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
        Schema::create('ofertas', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
