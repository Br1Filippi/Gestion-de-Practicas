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
            {{-- Gestión de Usuarios --}}
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="material-icons text-primary" style="font-size: 48px;">supervised_user_circle</i>
                        <h5 class="card-title">Gestión de Usuarios</h5>
                        <a href="{{route('usuarios.index')}}" class="btn btn-primary">Ir a Gestión</a>
                    </div>
                </div>
            </div>

            {{-- Gestión de Estadísticas --}}
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="material-icons text-warning" style="font-size: 48px;">bar_chart</i>
                        <h5 class="card-title">Estadísticas del Sistema</h5>
                        <a href="{{route('administrador.estadisticas')}}" class="btn btn-warning">Ver Estadísticas</a>
                    </div>
                </div>
            </div>

            {{-- Gestión de Empresas --}}
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="material-icons text-info" style="font-size: 48px;">business</i>
                        <h5 class="card-title">Gestión de Empresas</h5>
                        <a href="" class="btn btn-info">Gestionar Empresas</a>
                    </div>
                </div>
            </div>
    
            {{-- Gestión de Estudiantes --}}
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="material-icons text-success" style="font-size: 48px;">school</i>
                        <h5 class="card-title">Gestión de Estudiantes</h5>
                        <a href="" class="btn btn-success">Gestionar Estudiantes</a>
                    </div>
                </div>
            </div>
    
            {{-- Gestión de Secretarias --}}
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="material-icons text-secondary" style="font-size: 48px;">assignment</i>
                        <h5 class="card-title">Gestión de Secretarias</h5>
                        <a href="" class="btn btn-secondary">Gestionar Secretarias</a>
                    </div>
                </div>
            </div>

            {{-- Gestión de Jefes de Carrera --}}
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="material-icons text-dark" style="font-size: 48px;">engineering</i>
                        <h5 class="card-title">Gestión de Jefes de Carrera</h5>
                        <a href="" class="btn btn-dark">Gestionar Jefes</a>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</div>
@endsection
