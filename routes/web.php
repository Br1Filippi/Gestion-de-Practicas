<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\OfertasController;


//Rutas Publicas sin AUTH
Route::get('/',[HomeController::class,'index'])->name('templates.master');
Route::get('/usuarios/login',[UsuariosController::class,'login'])->name('usuarios.login');
Route::post('/usuarios/autenticar',[UsuariosController::class,'autenticar'])->name('usuarios.autenticar');
//Rutas Publicas sin AUTH

//Rutas Privadas

//Empresa

//Empresa

//Oftertas
Route::get('/ofertas',[OfertasController::class,'index'])->name('ofertas.index');
//Oftertas

//Rutas Privadas