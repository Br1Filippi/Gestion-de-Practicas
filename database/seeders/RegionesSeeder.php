<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RegionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('regiones')->insert([
            ['nombre' => 'Arica y Parinacota'],
            ['nombre' => 'Tarapacá'],
            ['nombre' => 'Antofagasta'],
            ['nombre' => 'Atacama'],
            ['nombre' => 'Coquimbo'],
            ['nombre' => 'Valparaíso'],
            ['nombre' => 'Metropolitana '],
            ['nombre' => 'OHiggins'],
            ['nombre' => 'Maule'],
            ['nombre' => 'Biobío'],
            ['nombre' => 'Araucanía'],
            ['nombre' => 'Los Ríos'],
            ['nombre' => 'Los Lagos'],
            ['nombre' => 'Aysén'],
            ['nombre' => 'Magallanes']
        ]);
    }
}
