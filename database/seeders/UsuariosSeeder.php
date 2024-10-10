<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class UsuariosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('usuarios')->insert([

            [
                'correo_usuario' => 'Alumno1@usm.cl',
                'password' => Hash::make('123'),
                'nombre' => 'Dagoberto',
                'apellido' => 'Cabrera',
                'imagen'=> null,
            ],
            [
                'correo_usuario' => 'Alumno2@usm.cl',
                'password' => Hash::make('123'),
                'nombre' => 'Maximiliano',
                'apellido' => 'Salazar',
                'imagen'=> null,
            ],
            [
                'correo_usuario' => 'JefeDeCarrera1@usm.cl',
                'password' => Hash::make('123'),
                'nombre' => 'Carlos',
                'apellido' => 'Alten',
                'imagen'=> null,
            ],
            [
                'correo_usuario' => 'Secretaria1@usm.cl',
                'password' => Hash::make('123'),
                'nombre' => 'Secretaria',
                'apellido' => '1',
                'imagen'=> null,
            ],
            [
                'correo_usuario' => 'Empresa1@gmail.cl',
                'password' => Hash::make('123'),
                'nombre' => 'Globant',
                'apellido' => '',
                'imagen'=> null,
            ],
            [
                'correo_usuario' => 'Supervisor1@gmail.cl',
                'password' => Hash::make('123'),
                'nombre' => 'Daglas',
                'apellido' => 'Ruiz',
                'imagen'=> null,
            ],
            [
                'correo_usuario' => 'Empresa2@gmail.cl',
                'password' => Hash::make('123'),
                'nombre' => 'Mercado Libre',
                'apellido' => '',
                'imagen'=> null,
            ],
            [
                'correo_usuario' => 'Supervisor2@gmail.com',
                'password' => Hash::make('123'),
                'nombre' => 'Rodrigo',
                'apellido' => 'Espinoza',
                'imagen' => 'public/usuarios/7J8ZfQiGH8ki4vCEwkaFVGLZf1fs1eEypNOUhwdI.jpg',
            ],
            [
                'correo_usuario' => 'Administrador1@gmail.com',
                'password' => Hash::make('123'),
                'nombre' => 'Admin',
                'apellido' => '',
                'imagen'=> null,
            ],
        ]);
    }
}
