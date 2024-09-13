@extends('templates.master')

@section('contenido-principal')
<div class="container mt-4">
    <!-- Formulario de búsqueda -->
    <form action="{{ route('ofertas.index') }}" method="GET" class="mb-4">
        @csrf
        <div class="row mb-3">
            {{-- Barra de Busqueda --}}
            <div class="row mb-3">
                <div class="col-md-8">
                    <input type="text" name="termino" class="form-control" placeholder="Buscar por tus preferencias">
                </div>
    
                <!-- Botón de búsqueda -->
                <div class="col-md-4 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </div>

            {{-- Filtros --}}
            <!-- Filtro de Tipo -->
            <div class="col">
                <select name="tipo" class="form-control">
                    <option value="">Seleccione un tipo</option>
                    @foreach ($tipos as $tipo)
                        <option value="{{ $tipo->id}}">{{$tipo->nombre}} </option>
                    @endforeach
                </select>
            </div>
            {{-- Filtro de carrera --}}
            <div class="col">
                <select name="carrera" class="form-control">
                    <option value="">Seleccione una Carrera</option>
                    @foreach ($carreras as $carrera)
                        <option value="{{ $carrera->id}}">{{$carrera->nombre}} </option>
                    @endforeach
                </select>
            </div>
            {{-- Filtro de Region --}}
            <div class="col">
                <select name="regiones" class="form-control">
                    <option value="">Seleccione una Region</option>
                    @foreach ($regiones as $region)
                        <option value="{{ $region->id}}">{{$region->nombre}} </option>
                    @endforeach
                </select>
            </div>
            {{-- Filtro de Comuna --}}
            <div class="col">
                <select name="comunas" class="form-control">
                    <option value="">Seleccione una Comuna</option>
                    @foreach ($comunas as $comuna)
                        <option value="{{ $comuna->id}}">{{$comuna->nombre}} </option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

    <div class="d-flex justify-content-center mt-3">
        <div class="row w-100">
            <!-- Columna Izquierda (Ofertas con Scroll) -->
            <div class="col-md-6 d-flex flex-column align-items-center">
                <!-- Contenedor con scroll -->
                <div class="w-75 overflow-auto" style="max-height: 80vh;">
                    @foreach($ofertas as $oferta)
                        <div class="card mb-1 oferta-card" data-id="{{ $oferta->id }}" onclick="showDetails({{ $oferta->id }})">
                            <div class="card-body">
                                <h5 class="card-title">{{ $oferta->titulo }}</h5>
                                <p class="card-text"><strong>Fecha de Publicación:</strong> {{ $oferta->fecha_publicacion }}</p>
                                <p class="card-text"><strong>Cupos Disponibles:</strong> {{ $oferta->cupos }}</p>
                                <p class="card-text"><strong>Region:</strong> {{ $oferta->region->nombre }}</p>
                                <p class="card-text"><strong>Carrera:</strong> {{ $oferta->carrera->nombre }}</p>
                            </div>
                        </div>
                    @endforeach
                    @foreach($ofertas as $oferta)
                        <div class="card mb-1 oferta-card" data-id="{{ $oferta->id }}" onclick="showDetails({{ $oferta->id }})">
                            <div class="card-body">
                                <h5 class="card-title">{{ $oferta->titulo }}</h5>
                                <p class="card-text"><strong>Fecha de Publicación:</strong> {{ $oferta->fecha_publicacion }}</p>
                                <p class="card-text"><strong>Cupos Disponibles:</strong> {{ $oferta->cupos }}</p>
                                <p class="card-text"><strong>Region:</strong> {{ $oferta->region->nombre }}</p>
                                <p class="card-text"><strong>Carrera:</strong> {{ $oferta->carrera->nombre }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Columna Derecha -->
            <div class="col-md-6 d-flex justify-content-center h-100">
                <div id="details-card" class="card w-100">
                    <div class="card-body">
                        <h5 class="card-title">Selecciona una oferta para ver detalles</h5>
                        <p id="details-description">Haz clic en una oferta en la columna izquierda para ver más información aquí.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Información de las ofertas, puede ser cargada de forma dinámica en un entorno real
    const ofertas = @json($ofertas);

    function showDetails(id) {
        // Buscar la oferta seleccionada por ID
        const oferta = ofertas.find(oferta => oferta.id === id);
        if (oferta) {
            // Actualizar el contenido de la tarjeta de detalles
            const detailsCard = document.getElementById('details-card');
            detailsCard.querySelector('.card-title').textContent = oferta.titulo;
            detailsCard.querySelector('#details-description').innerHTML = `
                <strong>Fecha de Publicación:</strong> ${oferta.fecha_publicacion}<br>
                <strong>Cupos Disponibles:</strong> ${oferta.cupos}<br>
                <strong>Region:</strong> ${oferta.region.nombre}<br>
                <strong>Carrera:</strong> ${oferta.carrera.nombre}
            `;
        }
    }
</script>
@endsection
