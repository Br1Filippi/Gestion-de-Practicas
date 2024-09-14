@extends('templates.master')

@section('contenido-principal')
<div class="container mt-4">
    <form action="{{ route('ofertas.index') }}" method="GET" class="mb-4">
        @csrf
        <div class="row mb-3 px-5 d-flex ">
            {{-- Barra de Busqueda --}}
            <div class="row mb-3 ">

                <div class="col-md-7">
                    <input type="text" name="termino" class="form-control" placeholder="Buscar por tus preferencias">
                </div>

                @if(Gate::allows('empresa-gestion'))
                {{-- Crear Oferta --}}
                <a href='' class="col-md-2 btn btn-sm bg-success text-white fw-bold d-flex d-flex justify-content-center">
                    <span class="material-icons">add</span>
                    <span class="d-flex align-items-center"><strong>Crear Oferta</strong></span>
                </a>
                @endif

                {{-- Busqueda --}}
                <div class="col-md-1 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary"><strong>Buscar</strong></button>
                </div>

                
            </div>

            {{-- Filtros --}}

            {{-- Filtros de Tipo --}}
            <div class="col-2">
                <select name="tipo " class="form-control fs-6">
                    <option value="" >Seleccione Tipo</option>
                    @foreach ($tipos as $tipo)
                        <option value="{{ $tipo->id}}">{{$tipo->nombre}} </option>
                    @endforeach
                </select>
            </div>

            {{-- Filtro de carrera --}}
            <div class="col-2 ">
                <select name="carrera" class="form-control">
                    <option value="" >Seleccione Carrera</option>
                    @foreach ($carreras as $carrera)
                        <option value="{{ $carrera->id}}">{{$carrera->nombre}} </option>
                    @endforeach
                </select>
            </div>

            {{-- Filtro de Region --}}
            <div class="col-2">
                <select name="regiones" class="form-control">
                    <option value="">Seleccione Region</option>
                    @foreach ($regiones as $region)
                        <option value="{{ $region->id}}">{{$region->nombre}} </option>
                    @endforeach
                </select>
            </div>

            {{-- Filtro de Comuna --}}
            <div class="col-2">
                <select name="comunas" class="form-control">
                    <option value="">Seleccione Comuna</option>
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
                        <div class="card mb-3 oferta-card shadow-sm" data-id="{{ $oferta->id }}" onclick="showDetails({{ $oferta->id }})" onmouseover="this.classList.add('shadow-sm')"onmouseout="this.classList.remove('shadow-sm')" >
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
                    
                </div>
            </div>

            <!-- Columna Derecha -->
            <div class="col-md-6 d-flex h-100 ">
                <div id="details-card" class="card w-75 ">
                    <div class="card-header bg-white shadow-sm">
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

                        @if(Gate::allows('empresa-gestion'))
                        {{-- Modificar --}}
                        <a href="" class="btn text-white btn-warning ">
                            <i class="material-icons text-white" style="font-size: 1em">edit</i> <strong>Modificar</strong>
                        </a>

                        {{-- Eliminar --}}
                        <a href="" class="btn text-white btn-danger ">
                            <i class="material-icons text-white" style="font-size: 1em">delete</i> <strong>Eliminar</strong>
                        </a>
                        @endif

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
    const ofertas = @json($ofertas); 

    function showDetails(id) {
    const oferta = ofertas.find(oferta => oferta.id === id); 
    if (oferta) {
        
        //Cambio de color de Oferta Seleccionada
        document.querySelectorAll('.oferta-card').forEach(card => {
            card.classList.remove('border-primary');
        });

        const selectedCard = document.querySelector(`.oferta-card[data-id="${id}"]`);
        selectedCard.classList.add('border-primary');

        // Actualiaciond e targeta
        const detailsCard = document.getElementById('details-card');
        detailsCard.querySelector('.card-title').textContent = oferta.titulo;
        detailsCard.querySelector('a').textContent = oferta.empresa.url_web;
        detailsCard.querySelector('a').href = oferta.empresa.url_web;

        detailsCard.querySelector('.card-header p.card-text').innerHTML = `
            <i class="material-icons" style="font-size: 1em">location_on</i> ${oferta.region.nombre} / ${oferta.comuna.nombre}
        `;

        detailsCard.querySelector('.card-header p.card-text:nth-child(4)').textContent = oferta.carrera.nombre;
        detailsCard.querySelector('.card-header p.card-text:nth-child(5)').innerHTML = `
            <strong>${oferta.tipo.nombre} / ${oferta.cupos} Cupos Disponibles</strong>
        `;

        detailsCard.querySelector('#details-description').innerHTML = `
            <h5><strong>Descripcion</strong></h5>
            <p class="card-text">${oferta.descripcion}</p>
        `;
    }
}

document.addEventListener("DOMContentLoaded", function() {
    showDetails(ofertas[0].id);
});
</script>

@endsection
