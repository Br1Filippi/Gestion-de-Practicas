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
                'nombre_supervisor' => 'Rodrigo Espinoza',
                'titulo_supervisor' => 'Ingeniero Informatico',
                'fono_supervisor' => '+56 9 2367 8912',
                'cargo_supervisor' => 'Team Lead IT',
                'firma_supervisor' => 'firma_rodrigo_espinoza.png',
                'id_empresa' => 2,
                'id_usuario' => 'rodrigoespinoza@gmail.com',
            ],
        ]);
    }
}
