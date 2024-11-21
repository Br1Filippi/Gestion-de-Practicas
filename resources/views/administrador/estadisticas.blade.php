@extends('templates.master')

@section('contenido-principal')
<div class="container mt-4">
    <div class="row mb-4">
        <div class="col text-center">
            <h1 class="display-4">Panel de Estadísticas</h1>
        </div>
    </div>

    <div class="row">
        <!-- Total Prácticas -->
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Prácticas Inscritas</div>
                <div class="card-body">
                    <h5 class="card-title"><strong>{{ $totalPracticas }}</strong></h5>
                </div>
            </div>
        </div>

        <!-- Total Solicitudes -->
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Solicitudes Inscritas</div>
                <div class="card-body">
                    <h5 class="card-title"><strong>{{ $totalSolicitudes }}</strong></h5>
                </div>
            </div>
        </div>

        <!-- Porcentaje de Aprobación de Solicitudes -->
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Aprobación de Solicitudes</div>
                <div class="card-body">
                    <h5 class="card-title">{{ number_format($porcentajeAprobacionSolicitudes, 2) }}%</h5>
                </div>
            </div>
        </div>

        <!-- Porcentaje de Rechazo de Solicitudes -->
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Rechazo de Solicitudes</div>
                <div class="card-body">
                    <h5 class="card-title">{{ number_format($porcentajeRechazoSolicitudes, 2) }}%</h5>
                </div>
            </div>
        </div>

        <!-- Porcentaje de Aprobación de Prácticas -->
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Aprobación de Prácticas</div>
                <div class="card-body">
                    <h5 class="card-title">{{ number_format($porcentajeAprobacionPracticas, 2) }}%</h5>
                </div>
            </div>
        </div>

        <!-- Porcentaje de Rechazo de Prácticas -->
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Rechazo de Prácticas</div>
                <div class="card-body">
                    <h5 class="card-title">{{ number_format($porcentajeRechazoPracticas, 2) }}%</h5>
                </div>
            </div>
        </div>

        <!-- Total Estudiantes -->
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Total Estudiantes</div>
                <div class="card-body">
                    <h5 class="card-title"><strong>{{ $totalEstudiantes }}</strong></h5>
                </div>
            </div>
        </div>

        <!-- Total Empresas -->
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Empresas</div>
                <div class="card-body">
                    <h5 class="card-title"><strong>{{ $totalEmpresas }}</strong></h5>
                </div>
            </div>
        </div>

        <!-- Promedio Duración de Prácticas -->
        <div class="col-md-4">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-header">Promedio Duración de Prácticas</div>
                <div class="card-body">
                    <h5 class="card-title">
                        @if($promedioDuracionPracticas !== null)
                            {{ number_format($promedioDuracionPracticas, 2) }} días
                        @else
                            No disponible
                        @endif
                    </h5>
                </div>
            </div>
        </div>

        <!-- Prácticas por Carrera -->
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">Prácticas por Carrera</div>
                <div class="card-body">
                    <ul>
                        @foreach($practicasPorCarrera as $carrera)
                            <li>{{ $carrera->nombre }}: {{ $carrera->practicas_count }} prácticas</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Top 5 Empresas por Número de Prácticas -->
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">Top 5 Empresas por Número de Prácticas</div>
                <div class="card-body">
                    <ul>
                        @foreach($topEmpresas as $empresa)
                            <li>{{ $empresa->razon_social }}: {{ $empresa->practicas_count }} prácticas</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection