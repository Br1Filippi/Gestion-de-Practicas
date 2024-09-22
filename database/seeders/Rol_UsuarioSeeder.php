<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Rol_UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rol_usuario')->insert([
            [
                'id_usuario' => 'DagobertoCabrera@usm.cl',
                'id_rol' => 2, // ID del rol "estudiante"
            ],
            [
                'id_usuario' => 'CarlosAlten@usm.cl',
                'id_rol' => 4, // ID del rol "Jefe de Carrera"
            ],
            [
                'id_usuario' => 'Maxicraft13@usm.cl',
                'id_rol' => 2, // ID del rol "estudiante"
            ],
            [
                'id_usuario' => 'PaoloRuiz@usm.cl',
                'id_rol' => 1, // ID del rol "empresa"
            ],
            [
                'id_usuario' => 'RicardoCahe@usm.cl',
                'id_rol' => 3, // ID del rol "secretaria"
            ],
            [
                'id_usuario' => 'bfilippi@usm.cl',
                'id_rol' => 2, // ID del rol "estudiante"
            ],
            [
                'id_usuario' => 'MercadoLibre@gmail.cl',
                'id_rol' => 1, // ID del rol "empresa"
            ],
            [
                'id_usuario' => 'rodrigoespinoza@gmail.com',
                'id_rol' => 5, // ID del rol "supervisor"
            ],
        ]);
    }
}
