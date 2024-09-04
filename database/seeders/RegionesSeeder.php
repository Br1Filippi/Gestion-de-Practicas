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
            ['nombre' => 'Región de Valparaíso'],
            ['nombre' => 'Región Metropolitana de Santiago'],
        ]);
    }
}
