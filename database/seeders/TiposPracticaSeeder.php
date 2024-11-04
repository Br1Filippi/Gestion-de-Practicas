<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TiposPracticaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_practica')->insert([
            'nombre_tipo' => 'Práctica Profesional',
            'nombre_tipo' => 'Práctica Industrial',
        ]);
    }
}
