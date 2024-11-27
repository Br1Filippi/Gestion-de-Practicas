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
use App\Http\Controllers\PostulantesController;


//Rutas Publicas sin AUTH
Route::get('/',[HomeController::class,'index'])->name('home.index');
Route::get('/inicio',[HomeController::class,'inicio'])->name('home.fond');
Route::get('/usuarios/login',[UsuariosController::class,'login'])->name('usuarios.login');
Route::post('/usuarios/autenticar',[UsuariosController::class,'autenticar'])->name('usuarios.autenticar');
Route::get('/usuarios/crear',[EmpresasController::class,'crearEmpresa'])->name('usuarios.crearEmpresa');
Route::post('/usuarios/crear/empresa',[EmpresasController::class,'storeEmpresa'])->name('usuarios.storeEmpresa');
//Rutas Publicas sin AUTH

//Rutas Privadas

    //Usuarios
    Route::middleware(['auth'])->group(function(){
        Route::get('/usuarios/logout',[UsuariosController::class,'logout'])->name('usuarios.logout');
        Route::get('/usuarios/perfil',[UsuariosController::class,'perfil'])->name('usuarios.perfil');
        Route::get('/usuarios/index',[UsuariosController::class,'index'])->name('usuarios.index');
        Route::get('/usuarios/cambiarContra/{usuario}',[UsuariosController::class,'cambiarContra'])->name('usuarios.cambiarContra');
        Route::put('/usuarios/updateContra/{usuario}',[UsuariosController::class,'updateContra'])->name('usuarios.updateContra');
        Route::get('/usuarios/elegirRol',[UsuariosController::class,'elegirRol'])->name('usuarios.elegirRol');
        Route::get('/usuarios/create',[UsuariosController::class,'create'])->name('usuarios.create');
        Route::get('/usuarios/crearEmpresaD',[UsuariosController::class,'crearEmpresaD'])->name('usuarios.crearEmpresaD');
        Route::get('/usuarios/edit/{usuario}',[UsuariosController::class,'edit'])->name('usuarios.edit');

    });
    //Usuarios

    //Estudiante
    Route::middleware(['auth'])->group(function(){
        Route::get('/estudiante',[EstudiantesController::class,'index'])->name('estudiantes.index');
        Route::get('/estudiante/edit/{estudiante}',[EstudiantesController::class,'edit'])->name('estudiantes.edit');
        Route::put('/estudiante/edit/{estudiante}',[EstudiantesController::class,'update'])->name('estudiantes.update');
        Route::get('/estudiante/crear',[EstudiantesController::class,'create'])->name('estudiantes.create');
        Route::post('/estudiante/store',[EstudiantesController::class,'store'])->name('estudiantes.store');
    });
    //Estudiante

    //Empresa
    Route::middleware(['auth'])->group(function(){
        Route::get('/empresas',[EmpresasController::class,'index'])->name('empresas.index');
        Route::get('/empresas/edit/{empresa}',[EmpresasController::class,'edit'])->name('empresas.edit');
        Route::put('/empresas/edit/{empresa}',[EmpresasController::class,'update'])->name('empresas.update');
    });
    //Empresa

    //Secretaria
    Route::middleware(['auth'])->group(function(){
        Route::get('/secretarias',[SecretariasController::class,'index'])->name('secretarias.index');
        Route::get('/secretarias/crear',[SecretariasController::class,'create'])->name('secretarias.create');
        Route::post('/secretarias/store',[SecretariasController::class,'store'])->name('secretarias.store');
    });
    //Secretaria

    //Jefe de Carrera  
    Route::middleware(['auth'])->group(function(){
        Route::get('/jefe',[JefesController::class,'index'])->name('jefes.index');
        Route::get('/jefe/crear',[JefesController::class,'create'])->name('jefes.create');
        Route::post('/jefe/store',[JefesController::class,'store'])->name('jefes.store');
    });
    //Jefe de Carrera

    //Solicitudes
    Route::middleware(['auth'])->group(function(){
        Route::get('/solicitudes',[SolicitudesController::class,'index'])->name('solicitudes.index');
        Route::get('/solicitudes/detalles/{solicitud}',[SolicitudesController::class,'detalles'])->name('solicitudes.detalles');
        Route::post('/solicitudes/store/{postulante}',[SolicitudesController::class,'store'])->name('solicitudes.store');
        Route::put('/solicitudes/passar/{solicitud}',[SolicitudesController::class,'passar'])->name('solicitudes.passar');
        Route::put('/solicitudes/rechazar/{solicitud}',[SolicitudesController::class,'rechazar'])->name('solicitudes.rechazar');
    });
    //Solicitudes

    //Supervisores
    Route::middleware(['auth'])->group(function(){
        Route::get('/empresa/supervisores',[SupervisorController::class,'index'])->name('supervisores.index');
        Route::get('/empresa/supervisores/crear',[SupervisorController::class,'create'])->name('supervisores.create');
        Route::get('/empresa/supervisores/edit/{supervisor}',[SupervisorController::class,'edit'])->name('supervisores.edit');
        Route::put('empresa/supervisores/update/{supervisor}', [SupervisorController::class, 'update'])->name('supervisores.update');
        Route::post('/empresa/supervisores/store', [SupervisorController::class, 'store'])->name('supervisores.store');
        Route::delete('/empresa/supervisores/{supervisor}',[SupervisorController::class,'destroy'])->name('supervisores.destroy');
    });
    //Supervisores

    //Evaluaciones
    Route::middleware(['auth'])->group(function(){
        Route::get('/evaluaciones/informe/{practica}',[EvaluacionesController::class,'informe'])->name('evaluaciones.informe');
        Route::get('/evaluaciones/desempeño/{practica}',[EvaluacionesController::class,'desempeño'])->name('evaluaciones.desempeño');
        Route::post('/evaluaciones/informe/store/{practica}',[EvaluacionesController::class,'informeStore'])->name('evaluaciones.informeStore');
        Route::post('/evaluaciones/desempeño/store/{practica}',[EvaluacionesController::class,'evaluarInforme'])->name('evaluaciones.evaluarInforme');
        Route::get('/evaluaciones/verDesempeño/{practica}',[EvaluacionesController::class,'verDesempeño'])->name('evaluaciones.verDesempeño');
        Route::get('/evaluaciones/verInforme/{practica}',[EvaluacionesController::class,'verInforme'])->name('evaluaciones.verInforme');
    });
    //Evaluaciones

    //Practicas
    Route::middleware(['auth'])->group(function(){
        Route::get('/practicas/practicantes',[PracticasController::class,'practicantes'])->name('practicas.practicantes');
        Route::get('/practicas',[PracticasController::class,'index'])->name('practicas.index');
        Route::get('/practicas/detalles/{practica}',[PracticasController::class,'detalles'])->name('practicas.detalles');
        Route::post('/practicas/store/{solicitud}',[PracticasController::class,'store'])->name('practicas.store');
        Route::put('/practicas/passar/{practica}',[PracticasController::class,'passar'])->name('practicas.passar');
        Route::put('/practicas/rechazar/{practica}',[PracticasController::class,'rechazar'])->name('practicas.rechazar');
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
        Route::post('/ofertas/postular', [OfertasController::class, 'postular'])->name('ofertas.postular');
    });
    //Ofertas

    //Postulantes
    Route::middleware(['auth'])->group(function(){
        Route::get('/postulantes/{oferta}',[PostulantesController::class,'index'])->name('postulantes.index');
        Route::delete('/postulantes/{postulante}', [PostulantesController::class, 'destroy'])->name('postulantes.destroy');
        Route::get('/postulantes/aceptar/{postulante}',[PostulantesController::class,'aceptar'])->name('postulantes.aceptar');
    });
    //Postulantes

//Rutas Privadas