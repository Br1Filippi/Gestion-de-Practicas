@extends('templates.master')

@section('contenido-principal')
<div class="container mt-4 d-flex justify-content-center">
    <div class="row w-100">
        <!-- Columna Izquierda -->
        <div class="col-md-6 d-flex flex-column align-items-center">
            <!-- Varias tarjetas pequeñas con menos margen entre ellas -->
            <div class="card mb-1 w-75">
                <div class="card-body">
                    <h5 class="card-title">Card Pequeña 1</h5>
                    <p class="card-text">Contenido de la tarjeta pequeña 1.</p>
                </div>
            </div>
            <div class="card mb-1 w-75">
                <div class="card-body">
                    <h5 class="card-title">Card Pequeña 2</h5>
                    <p class="card-text">Contenido de la tarjeta pequeña 2.</p>
                </div>
            </div>
            <!-- Añade más tarjetas pequeñas según sea necesario -->
        </div>

        <!-- Columna Derecha -->
        <div class="col-md-6 d-flex justify-content-center h-100">
            <!-- Tarjeta grande que ocupa todo el espacio vertical disponible -->
            <div class="card w-75 h-100">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title">Card Grande</h5>
                    <p class="card-text">Contenido de la tarjeta grande.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
