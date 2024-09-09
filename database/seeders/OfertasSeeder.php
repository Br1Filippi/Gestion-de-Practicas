<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfertasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ofertas')->insert([
            [
                'titulo' => 'Desarrollador Junior en Valparaíso', 
                'fecha_publicacion' => '2024-09-01', 
                'cupos' => 5,
                'descripcion' => 'Oferta para desarrollador junior en Valparaíso.',
                'id_comuna' => 1, 
                'id_region' => 1, 
                'id_tipo' => 2, 
                'id_empresa' => 1, 
                'id_carrera' => 2, 
            ],
            [
                'titulo' => 'Ingeniero Civil para Obra en Santiago Centro', 
                'fecha_publicacion' => '2024-09-05', 
                'cupos' => 2,
                'descripcion' => 'Ingeniero civil para obra en Santiago Centro.',
                'id_comuna' => 18, 
                'id_region' => 2, 
                'id_tipo' => 2, 
                'id_empresa' => 1, 
                'id_carrera' => 3, 
            ],
            [
                'titulo' => 'Práctica Profesional en Ingeniería Electrónica', 
                'fecha_publicacion' => '2024-09-07', 
                'cupos' => 3,
                'descripcion' => 'Práctica profesional para ingeniero electrónico.',
                'id_comuna' => 14, 
                'id_region' => 2, 
                'id_tipo' => 1, 
                'id_empresa' => 1, 
                'id_carrera' => 4, 
            ],
        ]);
    }
}
