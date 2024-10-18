<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JefesdecarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jefedecarrera')->insert([
            [
                'id_usuario' => 'JefeDeCarrera1@usm.cl',
                'id_carrera' => 1,
            ],
        ]);
    }
}
