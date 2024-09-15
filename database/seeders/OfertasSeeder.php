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
                'id_comuna' => 33, 
                'id_region' => 6, 
                'id_tipo' => 2,
                'id_empresa' => 1,
                'id_carrera' => 2,
            ],
            [
                'titulo' => 'Ingeniero Civil para Obra en Santiago Centro',
                'fecha_publicacion' => '2024-09-05',
                'cupos' => 2,
                'descripcion' => 'Ingeniero civil para obra en Santiago Centro.',
                'id_comuna' => 47, 
                'id_region' => 7, 
                'id_tipo' => 1,
                'id_empresa' => 1,
                'id_carrera' => 3,
            ],
            [
                'titulo' => 'Práctica Profesional en Ingeniería Electrónica',
                'fecha_publicacion' => '2024-09-07',
                'cupos' => 3,
                'descripcion' => 'Práctica profesional para ingeniero electrónico.',
                'id_comuna' => 81, 
                'id_region' => 11, 
                'id_tipo' => 1,
                'id_empresa' => 2,
                'id_carrera' => 4,
            ],
            [
                'titulo' => 'Analista de Sistemas en Antofagasta',
                'fecha_publicacion' => '2024-09-10',
                'cupos' => 4,
                'descripcion' => 'Oferta para analista de sistemas en Antofagasta.',
                'id_comuna' => 12, 
                'id_region' => 3, 
                'id_tipo' => 2,
                'id_empresa' => 2,
                'id_carrera' => 1,
            ],
            [
                'titulo' => 'Ingeniero de Software en Santiago',
                'fecha_publicacion' => '2024-09-12',
                'cupos' => 6,
                'descripcion' => 'Ingeniero de software para empresa en Santiago.',
                'id_comuna' => 48, 
                'id_region' => 7, 
                'id_tipo' => 2,
                'id_empresa' => 2,
                'id_carrera' => 2,
            ],
            [
                'titulo' => 'Técnico en Redes en Valparaíso',
                'fecha_publicacion' => '2024-09-15',
                'cupos' => 2,
                'descripcion' => 'Técnico en redes para empresa en Valparaíso.',
                'id_comuna' => 36, 
                'id_region' => 6, 
                'id_tipo' => 1,
                'id_empresa' => 2,
                'id_carrera' => 7,
            ],

        ]);
    }
}
