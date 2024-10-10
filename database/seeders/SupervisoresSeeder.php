<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupervisoresSeeder extends Seeder

{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('supervisores')->insert([
            [
                'rut_supervisor' => '33333333-3',
                'titulo_supervisor' => 'Ingeniero Informatico',
                'fono_supervisor' => '+56 9 2367 8912',
                'cargo_supervisor' => 'Tech Leader',
                'id_empresa' => 2,
                'id_usuario' => 'Supervisor2@gmail.com',
            ],
            [
                'rut_supervisor' => '11111111-1',
                'titulo_supervisor' => 'Tecnico Universitario en Informatica',
                'fono_supervisor' => '+56 9 8921 4762',
                'cargo_supervisor' => 'Front end Developer',
                'id_empresa' => 1,
                'id_usuario' => 'Supervisor1@gmail.cl',
            ],
        ]);
    }
}
