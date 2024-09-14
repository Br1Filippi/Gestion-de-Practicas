@extends('templates.master')

@section('contenido-principal')
<div class="container mt-4">
    <form action="{{ route('ofertas.index') }}" method="GET" class="mb-4">
        @csrf
        <div class="row mb-3">
            {{-- Barra de Busqueda --}}
            <div class="row mb-3">

                <div class="col-md-7">
                    <input type="text" name="termino" class="form-control" placeholder="Buscar por tus preferencias">
                </div>


                {{-- Crear Oferta --}}
                <a href='' class="col-md-2 btn btn-sm bg-success text-white fw-bold d-flex d-flex justify-content-center">
                    <span class="material-icons">add</span>
                    <span class="d-flex align-items-center">Crear Oferta</span>
                </a>


                {{-- Busqueda --}}
                <div class="col-md-1 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary"><strong>Buscar</strong></button>
                </div>

                
            </div>

            {{-- Filtros --}}

            {{-- Filtros de Tipo --}}
            <div class="col-2">
                <select name="tipo" class="form-control">
                    <option value="">Seleccione un tipo</option>
                    @foreach ($tipos as $tipo)
                        <option value="{{ $tipo->id}}">{{$tipo->nombre}} </option>
                    @endforeach
                </select>
            </div>

            {{-- Filtro de carrera --}}
            <div class="col-2">
                <select name="carrera" class="form-control">
                    <option value="">Seleccione una Carrera</option>
                    @foreach ($carreras as $carrera)
                        <option value="{{ $carrera->id}}">{{$carrera->nombre}} </option>
                    @endforeach
                </select>
            </div>

            {{-- Filtro de Region --}}
            <div class="col-2">
                <select name="regiones" class="form-control">
                    <option value="">Seleccione una Region</option>
                    @foreach ($regiones as $region)
                        <option value="{{ $region->id}}">{{$region->nombre}} </option>
                    @endforeach
                </select>
            </div>

            {{-- Filtro de Comuna --}}
            <div class="col-2">
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
            <!-- Columna Izquierda -->
            <div class="col-md-5 d-flex flex-column align-items-center">
                <div class="w-70 overflow-auto" style="max-height: 80vh;">
                    @foreach($ofertas as $oferta)
                        <div class="card mb-3 oferta-card " data-id="{{ $oferta->id }}" onclick="showDetails({{ $oferta->id }})">
                            <div class="card-body ">
                                <h5 class="card-title"><strong>{{ $oferta->titulo }}</strong></h5>
                                <a href="{{ $oferta->empresa->url_web }}">{{ $oferta->empresa->url_web }}</a>
                                <p class="card-text">
                                    <i class="material-icons" style="font-size: 1em">location_on</i>{{ $oferta->region->nombre }} / {{ $oferta->comuna->nombre }}
                                </p>
                                <p class="card-text">{{ $oferta->carrera->nombre }}</p>
                                <p class="card-text"><strong>{{ $oferta->tipo->nombre }} / {{ $oferta->cupos }} Cupos Disponibles</strong></p>
                                <p class="card-text"><strong>Fecha de Publicación:</strong> {{ $oferta->fecha_publicacion }}</p>
                            </div>
                        </div>
                    @endforeach
                    @foreach($ofertas as $oferta)
                        <div class="card mb-3 oferta-card " data-id="{{ $oferta->id }}" onclick="showDetails({{ $oferta->id }})">
                            <div class="card-body ">
                                <h5 class="card-title"><strong>{{ $oferta->titulo }}</strong></h5>
                                <a href="{{ $oferta->empresa->url_web }}">{{ $oferta->empresa->url_web }}</a>
                                <p class="card-text">{{ $oferta->region->nombre }} / {{ $oferta->comuna->nombre }}</p>
                                <p class="card-text">{{ $oferta->carrera->nombre }}</p>
                                <p class="card-text"><strong>{{ $oferta->tipo->nombre }} / {{ $oferta->cupos }} Cupos Disponibles</strong></p>
                                <p class="card-text"><strong>Fecha de Publicación:</strong> {{ $oferta->fecha_publicacion }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Columna Derecha -->
            <div class="col-md-6 d-flex h-100">
                <div id="details-card" class="card w-75">
                    <div class="card-header bg-white">
                        <h5 class="card-title">{{ $ofertas->first()->titulo }}</h5>
                        <a href="{{ $oferta->first()->empresa->url_web }}">{{ $oferta->first()->empresa->url_web }}</a>
                        <p class="card-text">
                            <i class="material-icons" style="font-size: 1em">location_on</i>
                            {{ $oferta->first()->region->nombre }} / {{ $oferta->first()->comuna->nombre }}
                        </p>
                        <p class="card-text">{{ $oferta->first()->carrera->nombre }}</p>
                        <p class="card-text"><strong>{{ $oferta->first()->tipo->nombre }} / {{ $oferta->first()->cupos }} Cupos Disponibles</strong></p>

                        {{-- Bottones --}}

                        {{-- Postular --}}
                        <button type="button" class="btn btn-primary "><strong>Postular</strong></button>

                        {{-- Modificar --}}
                        <a href="" class="btn text-white btn-warning ">
                            <i class="material-icons text-white" style="font-size: 1em">edit</i> Modificar
                        </a>

                        {{-- Eliminar --}}
                        <a href="" class="btn text-white btn-danger ">
                            <i class="material-icons text-white" style="font-size: 1em">delete</i> Eliminar
                        </a>

                    </div>
                    <div class="card-body overflow-auto "style="max-height: 55vh;">
                        <p id="details-description">
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const ofertas = @json($ofertas); // Asegúrate de que las ofertas estén en JSON

    function showDetails(id) {
        const oferta = ofertas.find(oferta => oferta.id === id); // Busca la oferta por ID
        if (oferta) {
            const detailsCard = document.getElementById('details-card');
            
            // Actualiza los campos con la información de la oferta seleccionada
            detailsCard.querySelector('.card-title').textContent = oferta.titulo;
            detailsCard.querySelector('a').textContent = oferta.empresa.url_web;
            detailsCard.querySelector('a').href = oferta.empresa.url_web;

            // Actualiza la región y comuna con el icono de ubicación
            detailsCard.querySelector('.card-header p.card-text').innerHTML = `
                <i class="material-icons" style="font-size: 1em">location_on</i> ${oferta.region.nombre} / ${oferta.comuna.nombre}
            `;

            // Actualiza carrera y tipo de oferta
            detailsCard.querySelector('.card-header p.card-text:nth-child(4)').textContent = oferta.carrera.nombre;
            detailsCard.querySelector('.card-header p.card-text:nth-child(5)').innerHTML = `
                <strong>${oferta.tipo.nombre} / ${oferta.cupos} Cupos Disponibles</strong>
            `;

            // Actualiza la descripción
            detailsCard.querySelector('#details-description').innerHTML = `
                <h5><strong>Descripcion</strong></h5>
                <p class="card-text">${oferta.descripcion}</p>
            `;
        }
    }

    // Cargar detalles de la primera oferta al cargar la página
    document.addEventListener("DOMContentLoaded", function() {
        showDetails(ofertas[0].id);
    });
</script>

@endsection
