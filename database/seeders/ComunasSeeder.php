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
            // Comunas de la Región de Arica y Parinacota
            ['nombre' => 'Arica', 'id_region' => 1],
            ['nombre' => 'Camarones', 'id_region' => 1],
            ['nombre' => 'General Lagos', 'id_region' => 1],
            ['nombre' => 'Putre', 'id_region' => 1],

            // Comunas de la Región de Tarapacá
            ['nombre' => 'Iquique', 'id_region' => 2],
            ['nombre' => 'Alto Hospicio', 'id_region' => 2],
            ['nombre' => 'Camiña', 'id_region' => 2],
            ['nombre' => 'Colchane', 'id_region' => 2],
            ['nombre' => 'Huara', 'id_region' => 2],
            ['nombre' => 'Pica', 'id_region' => 2],
            ['nombre' => 'Pozo Almonte', 'id_region' => 2],

            // Comunas de la Región de Antofagasta
            ['nombre' => 'Antofagasta', 'id_region' => 3],
            ['nombre' => 'Calama', 'id_region' => 3],
            ['nombre' => 'Mejillones', 'id_region' => 3],
            ['nombre' => 'Ollagüe', 'id_region' => 3],
            ['nombre' => 'San Pedro de Atacama', 'id_region' => 3],
            ['nombre' => 'Sierra Gorda', 'id_region' => 3],
            ['nombre' => 'Tocopilla', 'id_region' => 3],

            // Comunas de la Región de Atacama
            ['nombre' => 'Copiapó', 'id_region' => 4],
            ['nombre' => 'Caldera', 'id_region' => 4],
            ['nombre' => 'Tierra Amarilla', 'id_region' => 4],
            ['nombre' => 'Chañaral', 'id_region' => 4],
            ['nombre' => 'Diego de Almagro', 'id_region' => 4],
            ['nombre' => 'Huasco', 'id_region' => 4],

            // Comunas de la Región de Coquimbo
            ['nombre' => 'La Serena', 'id_region' => 5],
            ['nombre' => 'Coquimbo', 'id_region' => 5],
            ['nombre' => 'Andacollo', 'id_region' => 5],
            ['nombre' => 'La Higuera', 'id_region' => 5],
            ['nombre' => 'La Palmilla', 'id_region' => 5],
            ['nombre' => 'Ovalle', 'id_region' => 5],
            ['nombre' => 'Punitaqui', 'id_region' => 5],
            ['nombre' => 'Rí­o Hurtado', 'id_region' => 5],

            // Comunas de la Región de Valparaíso
            ['nombre' => 'Valparaíso', 'id_region' => 6],
            ['nombre' => 'Viña del Mar', 'id_region' => 6],
            ['nombre' => 'Quilpué', 'id_region' => 6],
            ['nombre' => 'Villa Alemana', 'id_region' => 6],
            ['nombre' => 'Concón', 'id_region' => 6],
            ['nombre' => 'Quillota', 'id_region' => 6],
            ['nombre' => 'San Antonio', 'id_region' => 6],
            ['nombre' => 'San Felipe', 'id_region' => 6],
            ['nombre' => 'Los Andes', 'id_region' => 6],
            ['nombre' => 'La Calera', 'id_region' => 6],
            ['nombre' => 'La Cruz', 'id_region' => 6],
            ['nombre' => 'La Ligua', 'id_region' => 6],
            ['nombre' => 'Petorca', 'id_region' => 6],
            ['nombre' => 'Zapallar', 'id_region' => 6],

            // Comunas de la Región Metropolitana de Santiago
            ['nombre' => 'Santiago', 'id_region' => 7],
            ['nombre' => 'Las Condes', 'id_region' => 7],
            ['nombre' => 'Providencia', 'id_region' => 7],
            ['nombre' => 'La Florida', 'id_region' => 7],
            ['nombre' => 'Maipú', 'id_region' => 7],
            ['nombre' => 'Ñuñoa', 'id_region' => 7],
            ['nombre' => 'San Miguel', 'id_region' => 7],
            ['nombre' => 'Pudahuel', 'id_region' => 7],
            ['nombre' => 'Estación Central', 'id_region' => 7],
            ['nombre' => 'Peñalolén', 'id_region' => 7],
            ['nombre' => 'Macul', 'id_region' => 7],
            ['nombre' => 'Cerrillos', 'id_region' => 7],
            ['nombre' => 'Cerro Navia', 'id_region' => 7],
            ['nombre' => 'Renca', 'id_region' => 7],

            // Comunas de la Región de O’Higgins
            ['nombre' => 'Rancagua', 'id_region' => 8],
            ['nombre' => 'Graneros', 'id_region' => 8],
            ['nombre' => 'Machalí', 'id_region' => 8],
            ['nombre' => 'San Fernando', 'id_region' => 8],
            ['nombre' => 'Chimbarongo', 'id_region' => 8],
            ['nombre' => 'Santa Cruz', 'id_region' => 8],

            // Comunas de la Región del Maule
            ['nombre' => 'Talca', 'id_region' => 9],
            ['nombre' => 'Curicó', 'id_region' => 9],
            ['nombre' => 'Maule', 'id_region' => 9],
            ['nombre' => 'Linares', 'id_region' => 9],
            ['nombre' => 'San Javier', 'id_region' => 9],
            ['nombre' => 'Parral', 'id_region' => 9],

            // Comunas de la Región del Biobío
            ['nombre' => 'Concepción', 'id_region' => 10],
            ['nombre' => 'Talcahuano', 'id_region' => 10],
            ['nombre' => 'Chiguayante', 'id_region' => 10],
            ['nombre' => 'Hualpén', 'id_region' => 10],
            ['nombre' => 'San Pedro de la Paz', 'id_region' => 10],
            ['nombre' => 'Los Ángeles', 'id_region' => 10],
            ['nombre' => 'Coronel', 'id_region' => 10],
            ['nombre' => 'Lota', 'id_region' => 10],

            // Comunas de la Región de Araucanía
            ['nombre' => 'Temuco', 'id_region' => 11],
            ['nombre' => 'Villarrica', 'id_region' => 11],
            ['nombre' => 'Pucón', 'id_region' => 11],
            ['nombre' => 'Angol', 'id_region' => 11],
            ['nombre' => 'Curanilahue', 'id_region' => 11],
            ['nombre' => 'Curacautín', 'id_region' => 11],

            // Comunas de la Región de Los Ríos
            ['nombre' => 'Valdivia', 'id_region' => 12],
            ['nombre' => 'Panguipulli', 'id_region' => 12],
            ['nombre' => 'Lanco', 'id_region' => 12],
            ['nombre' => 'Río Bueno', 'id_region' => 12],

            // Comunas de la Región de Los Lagos
            ['nombre' => 'Puerto Montt', 'id_region' => 13],
            ['nombre' => 'Osorno', 'id_region' => 13],
            ['nombre' => 'Puerto Varas', 'id_region' => 13],
            ['nombre' => 'Frutillar', 'id_region' => 13],
            ['nombre' => 'Castro', 'id_region' => 13],

            // Comunas de la Región de Aysén
            ['nombre' => 'Coyhaique', 'id_region' => 14],
            ['nombre' => 'Puerto Aysén', 'id_region' => 14],
            ['nombre' => 'Chile Chico', 'id_region' => 14],

            // Comunas de la Región de Magallanes y de la Antártica Chilena
            ['nombre' => 'Punta Arenas', 'id_region' => 15],
            ['nombre' => 'Puerto Natales', 'id_region' => 15],
            ['nombre' => 'Porvenir', 'id_region' => 15],
            ['nombre' => 'Cabo de Hornos', 'id_region' => 15],
            ['nombre' => 'Antártica Chilena', 'id_region' => 15],
        ]);
    }
}
