<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            RolesSeeder::class,
            UsuariosSeeder::class,
            Rol_UsuarioSeeder::class,
            EmpresasSeeder::class,
            SupervisoresSeeder::class,
            TiposSeeder::class,
            RegionesSeeder::class,
            ComunasSeeder::class,
            CarrerasSeeder::class,
            OfertasSeeder::class,
        ]);
    }
}
