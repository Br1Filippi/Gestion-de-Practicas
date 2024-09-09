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

    </form>

    <div class="d-flex justify-content-center mt-3">
        <div class="row w-100">
            <!-- Columna Izquierda -->
            <div class="col-md-6 d-flex flex-column align-items-center">
                @foreach($ofertas as $oferta)
                    <div class="card mb-1 w-75">
                        <div class="card-body">

                            <h5 class="card-title">{{ $oferta->titulo }}</h5>
                            <p class="card-text"><strong>Fecha de Publicación:</strong> {{ $oferta->fecha_publicacion }}</p>
                            <p class="card-text"><strong>Cupos Disponibles:</strong> {{ $oferta->cupos }}</p>
                            <p class="card-text"><strong>Carrera:</strong> {{ $oferta->carrera->nombre }}</p>
                        </div>
                    </div>
                @endforeach
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
