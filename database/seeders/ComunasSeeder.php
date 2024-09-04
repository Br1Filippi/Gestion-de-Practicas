<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ComunasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comunas')->insert([

            // Región de Valparaíso
            ['nombre' => 'Valparaíso', 'id_region' => 1],
            ['nombre' => 'Viña del Mar', 'id_region' => 1],
            ['nombre' => 'Concón', 'id_region' => 1],
            ['nombre' => 'Quillota', 'id_region' => 1],
            ['nombre' => 'San Antonio', 'id_region' => 1],
            ['nombre' => 'San Felipe', 'id_region' => 1],
            ['nombre' => 'Los Andes', 'id_region' => 1],
            ['nombre' => 'La Calera', 'id_region' => 1],
            ['nombre' => 'La Ligua', 'id_region' => 1],
            ['nombre' => 'Limache', 'id_region' => 1],
            ['nombre' => 'Petorca', 'id_region' => 1],
            ['nombre' => 'Quilpué', 'id_region' => 1],
            ['nombre' => 'Villa Alemana', 'id_region' => 1],

            // Región Metropolitana de Santiago
            ['nombre' => 'Santiago', 'id_region' => 2],
            ['nombre' => 'Las Condes', 'id_region' => 2],
            ['nombre' => 'Providencia', 'id_region' => 2],
            ['nombre' => 'Ñuñoa', 'id_region' => 2],
            ['nombre' => 'La Reina', 'id_region' => 2],
            ['nombre' => 'Macul', 'id_region' => 2],
            ['nombre' => 'Peñalolén', 'id_region' => 2],
            ['nombre' => 'San Miguel', 'id_region' => 2],
            ['nombre' => 'San Joaquín', 'id_region' => 2],
            ['nombre' => 'San Bernardo', 'id_region' => 2],
            ['nombre' => 'Maipú', 'id_region' => 2],
            ['nombre' => 'Pudahuel', 'id_region' => 2],
            ['nombre' => 'Independencia', 'id_region' => 2],
            ['nombre' => 'Recoleta', 'id_region' => 2],
            ['nombre' => 'Cerro Navia', 'id_region' => 2],
            ['nombre' => 'Quinta Normal', 'id_region' => 2],
            ['nombre' => 'Estación Central', 'id_region' => 2],
            ['nombre' => 'Santiago Centro', 'id_region' => 2],
            ['nombre' => 'Vitacura', 'id_region' => 2],
            ['nombre' => 'El Bosque', 'id_region' => 2],
            ['nombre' => 'La Florida', 'id_region' => 2],
            ['nombre' => 'La Pintana', 'id_region' => 2],
            ['nombre' => 'La Granja', 'id_region' => 2],
            ['nombre' => 'San Ramón', 'id_region' => 2],

        ]);
    }
}
