<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuariosController;


//Iniciar Sesion o Crear Cuenta
Route::get('/',[HomeController::class,'index'])->name('home.index');
//*Iniciar Sesion o Crear Cuenta

Route::get('/usuarios/login',[UsuariosController::class,'login'])->name('usuarios.login');
