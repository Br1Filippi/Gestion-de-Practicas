@extends('templates.master')

@section('contenido-principal')
<div class="col-10">
    <div class="col-1 d-flex justify-content-center align-items-center mb-2 ms-3">
        <a href="{{route('administrador.index')}}"
            class="btn text-white btn-warning d-flex justify-content-center align-items-center">
            <i class="material-icons text-white mx-1">arrow_back</i>
            <strong>Volver</strong>
        </a>
    </div>
    <div class="container">
        <h1 class="mb-4">Estadísticas de Prácticas</h1>

        <div class="row">
            <!-- Porcentaje de Inscritos -->
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">Prácticas Inscritas</div>
                    <div class="card-body">
                        <h5 class="card-title"><strong>{{ $totalPracticas }}</strong></h5>
                    </div>
                </div>
            </div>

            <!-- Porcentaje de Aprobación -->
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Aprobación</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ number_format($porcentajeAprobacion, 2) }}%</h5>
                    </div>
                </div>
            </div>

            <!-- Porcentaje de Rechazo -->
            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Rechazo</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ number_format($porcentajeRechazo, 2) }}%</h5>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection