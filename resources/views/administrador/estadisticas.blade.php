@extends('templates.master')

@section('contenido-principal')
<div class="col-10">
    <div class="container">
        <h1 class="mb-4">Estadísticas de Prácticas</h1>
        
        <div class="row">
            <!-- Porcentaje de Aprobación -->
            <!-- Porcentaje de Inscritos -->
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">Prácticas Inscritas</div>
                    <div class="card-body">
                        <h5 class="card-title"><Strong>15</Strong></h5>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Aprobación</div>
                    <div class="card-body">
                        <h5 class="card-title">80%</h5> 
                    </div>
                </div>
            </div>

            <!-- Porcentaje de Rechazo -->
            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Rechazo</div>
                    <div class="card-body">
                        <h5 class="card-title">20%</h5>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
