<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;
use App\Models\Rol;

class Rol_UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Obtener los usuarios por su correo
        $dagoberto = Usuario::where('correo_usuario', 'DagobertoCabrera@usm.cl')->first();
        $carlos = Usuario::where('correo_usuario', 'CarlosAlten@usm.cl')->first();
        $maximiliano = Usuario::where('correo_usuario', 'Maxicraft13@usm.cl')->first();
        $paolo = Usuario::where('correo_usuario', 'PaoloRuiz@usm.cl')->first();
        $ricardo = Usuario::where('correo_usuario', 'RicardoCahe@usm.cl')->first();
        $bruno = Usuario::where('correo_usuario', 'bfilippi@usm.cl')->first();

        //Obtener los roles 
        $empresa = Rol::where('nombre','empresa')->first();
        $estudiante = Rol::where('nombre','estudiante')->first();
        $secretaria = Rol::where('nombre','secretaria')->first();
        $jefec = Rol::where('nombre','Jefe de Carrera')->first();


        //Asignar los roles
        $dagoberto->roles()->attach($estudiante->id);
        $carlos->roles()->attach($jefec->id);
        $maximiliano->roles()->attach($estudiante->id);
        $paolo->roles()->attach($empresa->id);
        $ricardo->roles()->attach($secretaria->id);
        $bruno->roles()->attach($estudiante->id);

    }
}
