<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Usuario;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Carbon::setLocale('es');

        Gate::define('empresa-gestion',function(Usuario $usuario){
            return $usuario->esEmpresa();
        });

        Gate::define('estudiante-gestion',function(Usuario $usuario){
            return $usuario->esEstudiante();
        });
    }
}
