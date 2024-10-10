<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\OfertasController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\PracticasController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\EvaluacionesController;
use App\Http\Controllers\SolicitudesController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\EstudiantesController;
use App\Http\Controllers\SecretariasController;
use App\Http\Controllers\JefesController;


//Rutas Publicas sin AUTH
Route::get('/',[HomeController::class,'index'])->name('home.index');
Route::get('/inicio',[HomeController::class,'inicio'])->name('home.fond');
Route::get('/usuarios/login',[UsuariosController::class,'login'])->name('usuarios.login');
Route::post('/usuarios/autenticar',[UsuariosController::class,'autenticar'])->name('usuarios.autenticar');
//Rutas Publicas sin AUTH

//Rutas Privadas

    //Usuarios
    Route::middleware(['auth'])->group(function(){
        Route::get('/usuarios/logout',[UsuariosController::class,'logout'])->name('usuarios.logout');
        Route::get('/usuarios/perfil',[UsuariosController::class,'perfil'])->name('usuarios.perfil');
        Route::get('/usuarios/index',[UsuariosController::class,'index'])->name('usuarios.index');
    });
    //Usuarios

    //Estudiante
    Route::middleware(['auth'])->group(function(){
        Route::get('/estudiante',[EstudiantesController::class,'index'])->name('estudiantes.index');
    });
    //Estudiante

    //Empresa
    Route::middleware(['auth'])->group(function(){
        Route::get('/empresas',[EmpresasController::class,'index'])->name('empresas.index');
    });
    //Empresa

    //Secretaria
    Route::middleware(['auth'])->group(function(){
        Route::get('/secretarias',[SecretariasController::class,'index'])->name('secretarias.index');
    });
    //Secretaria

    //Jefe de Carrera  
    Route::middleware(['auth'])->group(function(){
        Route::get('/jefe',[JefesController::class,'index'])->name('jefes.index');
    });
    //Jefe de Carrera

    //Solicitudes
    Route::middleware(['auth'])->group(function(){
        Route::get('/solicitudes',[SolicitudesController::class,'index'])->name('solicitudes.index');
        Route::get('/solicitudes/detalles',[SolicitudesController::class,'detalles'])->name('solicitudes.detalles');
    });
    //Solicitudes

    //Supervisores
    Route::middleware(['auth'])->group(function(){
        Route::get('/empresa/supervisores',[SupervisorController::class,'index'])->name('supervisores.index');
        Route::get('/empresa/supervisores/crear',[SupervisorController::class,'create'])->name('supervisores.create');
        Route::post('/empresa/supervisores/store',[SupervisorController::class,'store'])->name('supervisores.store');
    });
    //Supervisores

    //Evaluaciones
    Route::middleware(['auth'])->group(function(){
        Route::get('/evaluaciones/informe',[EvaluacionesController::class,'informe'])->name('evaluaciones.informe');
        Route::get('/evaluaciones/desempeño',[EvaluacionesController::class,'desempeño'])->name('evaluaciones.desempeño');
    });
    //Evaluaciones

    //Practicas
    Route::middleware(['auth'])->group(function(){
        Route::get('/practicas/practicantes',[PracticasController::class,'practicantes'])->name('practicas.practicantes');
        Route::get('/practicas',[PracticasController::class,'index'])->name('practicas.index');
        Route::get('/practicas/detalles',[PracticasController::class,'detalles'])->name('practicas.detalles');
    });
    //Practicas

    //Admin
    Route::middleware(['auth'])->group(function(){
        Route::get('/administrador', [AdministradorController::class, 'index'])->name('administrador.index');
        Route::get('/administrador/estadisticas', [AdministradorController::class, 'estadisticas'])->name('administrador.estadisticas');
    });
    //Admin

    //Ofertas
    Route::middleware(['auth'])->group(function(){
        Route::get('/ofertas',[OfertasController::class,'index'])->name('ofertas.index');
        Route::get('/ofertas/crear',[OfertasController::class,'create'])->name('ofertas.create');
        Route::post('/ofertas/crear',[OfertasController::class, 'store'])->name('ofertas.store');
        Route::get('/ofertas/edit/{oferta}',[OfertasController::class,'edit'])->name('ofertas.edit');
        Route::put('/ofertas/edit/{oferta}',[OfertasController::class,'update'])->name('ofertas.update');
        Route::get('/comunas/{regionId}', [OfertasController::class, 'getComunas']);
        Route::delete('/ofertas/{oferta}',[OfertasController::class,'destroy'])->name('ofertas.destroy');
        Route::get('ofertas/postulantes/',[OfertasController::class,'postulantes'])->name('ofertas.postulantes');
    });
    //Ofertas

//Rutas Privadas