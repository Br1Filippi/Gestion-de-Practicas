@extends('templates.master')

@section('contenido-principal')
<div class="container mt-4">
    <!-- Formulario de búsqueda -->
    <form action="{{ route('ofertas.index') }}" method="GET" class="mb-4">
        <div class="row">
            <!-- Dropdown para seleccionar el área -->
            <div class="col-md-4">
                <select name="area" class="form-control">
                    <option value="">Seleccione un área</option>
                    <!-- Agrega las opciones de áreas aquí -->
                    <option value="Tecnología">Tecnología</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Finanzas">Finanzas</option>
                    <!-- Añade más opciones según sea necesario -->
                </select>
            </div>

            <!-- Dropdown para seleccionar la comuna -->
            <div class="col-md-4">
                <select name="comuna" class="form-control">
                    <option value="">Seleccione una comuna</option>
                    <!-- Agrega las opciones de comunas aquí -->
                    <option value="Santiago">Santiago</option>
                    <option value="Providencia">Providencia</option>
                    <option value="Ñuñoa">Ñuñoa</option>
                    <!-- Añade más opciones según sea necesario -->
                </select>
            </div>

            <!-- Dropdown para seleccionar la ciudad -->
            <div class="col-md-4">
                <select name="ciudad" class="form-control">
                    <option value="">Seleccione una ciudad</option>
                    <!-- Agrega las opciones de ciudades aquí -->
                    <option value="Santiago">Santiago</option>
                    <option value="Valparaíso">Valparaíso</option>
                    <option value="Concepción">Concepción</option>
                    <!-- Añade más opciones según sea necesario -->
                </select>
            </div>
        </div>

        <div class="row mt-3">
            <!-- Barra de búsqueda para términos específicos -->
            <div class="col-md-8">
                <input type="text" name="termino" class="form-control" placeholder="Buscar por descripción, tipo, etc.">
            </div>

            <!-- Botón de búsqueda -->
            <div class="col-md-4 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </div>
    </form>

    <div class="d-flex justify-content-center">
        <div class="row w-100">
            <!-- Columna Izquierda -->
            <div class="col-md-6 d-flex flex-column align-items-center">
                {{-- @foreach($ofertas as $oferta) --}}
                    <div class="card mb-1 w-75">
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text">gyat</p>
                        </div>
                    </div>
                {{-- @endforeach --}}
            </div>

            <!-- Columna Derecha -->
            <div class="col-md-6 d-flex justify-content-center h-100">
                <!-- Código existente de las tarjetas grandes -->
            </div>
            {{-- Columna Derecha --}}
            
            <!-- Puedes agregar más código aquí para la tarjeta grande si es necesario -->
        </div>
    </div>
</div>
@endsection
