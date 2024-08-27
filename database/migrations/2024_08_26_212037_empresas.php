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
        Schema::create('empresas',function(Blueprint $table){
            
            $table->id();
            $table->string('rut_empresa');
            $table->string('direccion');
            $table->string('firma_empresa');
            $table->string('razon_social');
            $table->string('email_contacto');
            $table->string('url_web');

            //relaciones
            $table->string('id_usuario');
            $table->foreign('id_usuario')->references('correo_usuario')->on('usuarios');

            $table->unsignedBigInteger('id_supervisor');
            $table->foreign('id_supervisor')->references('id')->on('supervisores');
            
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

