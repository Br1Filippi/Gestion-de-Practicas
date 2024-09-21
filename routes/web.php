<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\OfertasController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\PracticasController;


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
    });
    //Usuarios

    //Empresa

    //Empresa

    //Practicas
    Route::middleware(['auth'])->group(function(){
        Route::get('/practicas/practicantes',[PracticasController::class,'practicantes'])->name('practicas.practicantes');
    });
    //Practicas


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