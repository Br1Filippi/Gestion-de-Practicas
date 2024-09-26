<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::Table('usuarios')->insert([

            [
                'correo_usuario' => 'Alumno1@usm.cl',
                'password' => Hash::make('123'),
                'nombre' => 'Dagoberto',
                'apellido' => 'Cabrera',

            ],
            [
                'correo_usuario' => 'Alumno2@usm.cl',
                'password' => Hash::make('123'),
                'nombre' => 'Maximiliano',
                'apellido' => 'Salazar',
                
            ],
            [
                'correo_usuario' => 'JefeDeCarrera1@usm.cl',
                'password' => Hash::make('123'),
                'nombre' => 'Carlos',
                'apellido' => 'Alten',
                
            ],
            [
                'correo_usuario' => 'Secretaria1@usm.cl',
                'password' => Hash::make('123'),
                'nombre' => 'Secretaria',
                'apellido' => '1',
                
            ],
            [
                'correo_usuario' => 'Empresa1@gmail.cl',
                'password' => Hash::make('123'),
                'nombre' => 'Globant',
                'apellido' => '',
                
            ],
            [
                'correo_usuario' => 'Supervisor1@gmail.cl',
                'password' => Hash::make('123'),
                'nombre' => 'Bruno',
                'apellido' => 'Filippi',
                
            ],
            [
                'correo_usuario' => 'Empresa2@gmail.cl',
                'password' => Hash::make('123'),
                'nombre' => 'Mercado Libre',
                'apellido' => '',
            ],
            [
                'correo_usuario' => 'Supervisor2@gmail.com',
                'password' => Hash::make('123'),
                'nombre' => 'Rodrigo',
                'apellido' => 'Espinoza',
            ],
            [
                'correo_usuario' => 'Administrador1@gmail.com',
                'password' => Hash::make('123'),
                'nombre' => 'Admin',
                'apellido' => '',
            ],
        ]);
    }
}
