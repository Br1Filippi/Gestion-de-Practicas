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

                                
           

        </div>
    
    </div>
</div>
@endsection
