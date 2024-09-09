<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarrerasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('carreras')->insert([
            ['nombre' => 'Tecnico en Informatica'],
            ['nombre' => 'Ingeniería Informática'],
            ['nombre' => 'Ingeniería Civil'],
            ['nombre' => 'Ingeniería Electrónica'],
            ['nombre' => 'Ingeniería Mecánica'],
            ['nombre' => 'Ingeniería Comercial'],
        ]);
    }
}
