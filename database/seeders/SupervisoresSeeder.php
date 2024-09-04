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
                'rut_supervisor' => '11111111-1',
                'nombre_supervisor' => 'Juan Pérez',
                'titulo_supervisor' => 'Ingeniero de Software',
                'fono_supervisor' => '+56 9 1234 5678',
                'cargo_supervisor' => 'Jefe de Desarrollo',
                'firma_supervisor' => 'firma_juan_perez.png',
                'id_empresa' => 1,
            ],
            [
                'rut_supervisor' => '22222222-2',
                'nombre_supervisor' => 'Ana Martínez',
                'titulo_supervisor' => 'Ingeniera de Redes',
                'fono_supervisor' => '+56 9 8765 4321',
                'cargo_supervisor' => 'Gerente de IT',
                'firma_supervisor' => 'firma_ana_martinez.png',
                'id_empresa' => 1,
            ],
        ]);
    }
}
