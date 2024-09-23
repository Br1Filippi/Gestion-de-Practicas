<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('empresas')->insert([
            [
                'rut_empresa' => '12345678-9',
                'direccion' => 'Camino Troncal 2091',
                'firma_empresa' => 'Firma S.A.G.R',
                'razon_social' => 'Smile S.A.G.R',
                'email_contacto' => 'Smile@empresa.com',
                'url_web' => 'https://www.globant.com/es/',
                'id_usuario' => 'Empresa1@gmail.cl', 
            ],
            [
                'rut_empresa' => '98765432-1',
                'direccion' => 'Camino del Sol 800',
                'firma_empresa' => 'Firma/MercadoLibre',
                'razon_social' => 'TRANSPORTE, ALMACENAMIENTO Y COMUNICACIONES',
                'email_contacto' => 'Support@mercadolibre.com',
                'url_web' => 'https://www.mercadolibre.cl/',
                'id_usuario' => 'Empresa2@gmail.cl', 
            ],
        ]);
    }
}
