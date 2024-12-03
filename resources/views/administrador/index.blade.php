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

             {{-- Gestión de Estadísticas --}}
             <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="material-icons text-warning" style="font-size: 48px;">bar_chart</i>
                        <h5 class="card-title">Estadísticas del Sistema</h5>
                        <a href="{{route('administrador.estadisticas')}}" class="btn btn-warning text-white">Ver Estadísticas</a>
                    </div>
                </div>
            </div>

            {{-- Gestión de Usuarios --}}
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="material-icons text-primary" style="font-size: 48px;">supervised_user_circle</i>
                        <h5 class="card-title">Gestión de Usuarios</h5>
                        <a href="{{route('usuarios.index')}}" class="btn btn-primary">Gestionar Usuarios</a>
                    </div>
                </div>
            </div>

            {{-- Gestion de Ofertas --}}
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="material-icons text-danger" style="font-size: 48px;">format_list_bulleted</i>
                        <h5 class="card-title">Gestión de Ofertas</h5>
                        <a href="{{route('ofertas.index2')}}" class="btn btn-danger">Gestionar Ofertas</a>
                    </div>
                </div>
            </div> 
            
            {{-- Gestion de Solicitudes --}}
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="material-icons text-success" style="font-size: 48px;">file_open</i>
                        <h5 class="card-title">Gestión de Solicidtudes</h5>
                        <a href="{{route('solicitudes.index2')}}" class="btn btn-success">Gestionar Solicitudes</a>
                    </div>
                </div>
            </div> 

            {{-- Gestion de Practicas --}}
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <i class="material-icons text-info" style="font-size: 48px;">diversity_3</i>
                        <h5 class="card-title">Gestión de Practicas</h5>
                        <a href="{{route('solicitudes.index2')}}" class="btn btn-info text-white">Gestionar Practicas</a>
                    </div>
                </div>
            </div> 

        </div>
    </div>
</div>

@endsection
