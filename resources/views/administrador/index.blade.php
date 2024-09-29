@extends('templates.master')

@section('contenido-principal')
<div class="col-10">
    <div class="container mt-4">

        {{-- Título --}}
        <div class="row mb-4">
            <div class="col text-center">
                <h1 class="display-4">Panel de Control</h1>
            </div>
        </div>
    
    
        {{-- Funciones del Administrador --}}
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="material-icons text-primary" style="font-size: 48px;">supervised_user_circle</i>
                        <h5 class="card-title">Gestión de Usuarios</h5>
                        <p class="card-text">Agrega, edita o elimina usuarios del sistema.</p>
                        <a href="#" class="btn btn-primary">Ir a Gestión</a>
                    </div>
                </div>
            </div>
    
            <div class="col-lg-4 col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="material-icons text-success" style="font-size: 48px;">check_circle</i>
                        <h5 class="card-title">Moderación de Solicitudes</h5>
                        <p class="card-text">Aprueba o rechaza solicitudes de prácticas.</p>
                        <a href="#" class="btn btn-success">Ir a Moderación</a>
                    </div>
                </div>
            </div>
    
            <div class="col-lg-4 col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="material-icons text-warning" style="font-size: 48px;">bar_chart</i>
                        <h5 class="card-title">Estadísticas del Sistema</h5>
                        <p class="card-text">Visualiza datos y tendencias del sistema.</p>
                        <a href="#" class="btn btn-warning">Ver Estadísticas</a>
                    </div>
                </div>
            </div>
        </div>
    
    
    </div>
</div>
@endsection
