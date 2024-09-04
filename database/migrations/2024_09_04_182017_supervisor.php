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
        Schema::create('supervisores',function(Blueprint $table){
            
            $table->id();
            $table->string('rut_supervisor');
            $table->string('nombre_supervisor');
            $table->string('titulo_supervisor');
            $table->string('fono_supervisor');
            $table->string('cargo_supervisor');
            $table->string('firma_supervisor');

            $table->unsignedBigInteger('id_empresa');
            $table->foreign('id_empresa')->references('id')->on('empresas');

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