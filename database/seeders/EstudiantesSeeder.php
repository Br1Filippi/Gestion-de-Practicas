<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstudiantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estudiantes')->insert([
            [
                'rut_estudiante' => '11111111-1',
                'edad_estudiante' => 72,
                'fono_estudiante' => '9 71987964',
                'direccion_estudiante' => 'Calle 1',
                'id_carrera' => 4,
                'id_usuario' => 'Alumno1@usm.cl',
                
            ]
        ]);
    }
}
