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
                'correo_usuario' => 'DagobertoCabrera@usm.cl',
                'password' => Hash::make('123'),
                'nombre' => 'Dagoberto',
                'apellido' => 'Cabrera',

            ],
            [
                'correo_usuario' => 'CarlosAlten@usm.cl',
                'password' => Hash::make('123'),
                'nombre' => 'Carlos',
                'apellido' => 'Alten',
                
            ],
            [
                'correo_usuario' => 'Maxicraft13@usm.cl',
                'password' => Hash::make('123'),
                'nombre' => 'Maximiliano',
                'apellido' => 'Salazar',
                
            ],
            [
                'correo_usuario' => 'PaoloRuiz@usm.cl',
                'password' => Hash::make('123'),
                'nombre' => 'Paolo',
                'apellido' => 'Ruiz',
                
            ],
            [
                'correo_usuario' => 'RicardoCahe@usm.cl',
                'password' => Hash::make('123'),
                'nombre' => 'Ricardo',
                'apellido' => 'Cahe',
                
            ],
            [
                'correo_usuario' => 'bfilippi@usm.cl',
                'password' => Hash::make('123'),
                'nombre' => 'Bruno',
                'apellido' => 'Filippi',
                
            ],
        ]);
    }
}
