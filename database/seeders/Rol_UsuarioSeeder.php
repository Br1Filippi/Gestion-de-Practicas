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
                'id_usuario' => 'Alumno1@usm.cl',
                'id_rol' => 2, // ID del rol "estudiante"
            ],
            [
                'id_usuario' => 'JefeDeCarrera1@usm.cl',
                'id_rol' => 4, // ID del rol "Jefe de Carrera"
            ],
            [
                'id_usuario' => 'Alumno2@usm.cl',
                'id_rol' => 2, // ID del rol "estudiante"
            ],
            [
                'id_usuario' => 'Empresa1@gmail.cl',
                'id_rol' => 1, // ID del rol "empresa"
            ],
            [
                'id_usuario' => 'Secretaria1@usm.cl',
                'id_rol' => 3, // ID del rol "secretaria"
            ],
            [
                'id_usuario' => 'Supervisor1@gmail.cl',
                'id_rol' => 5, // ID del rol "estudiante"
            ],
            [
                'id_usuario' => 'Empresa2@gmail.cl',
                'id_rol' => 1, // ID del rol "empresa"
            ],
            [
                'id_usuario' => 'Supervisor2@gmail.com',
                'id_rol' => 5, // ID del rol "supervisor"
            ],
            [
                'id_usuario' => 'Administrador1@gmail.com',
                'id_rol' => 6, // ID del rol "supervisor"
            ],
        ]);
    }
}
