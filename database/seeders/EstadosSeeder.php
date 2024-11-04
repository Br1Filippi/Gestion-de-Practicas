<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estados')->insert([
        [
            'nombre_estado' => 'en revision'
        ],
        [
            'nombre_estado' => 'aceptada'
        ],
        [
            'nombre_estado' => 'rechazada'
        ]
        ]);
    }
}
