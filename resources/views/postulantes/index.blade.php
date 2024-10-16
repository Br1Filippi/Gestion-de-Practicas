@extends('templates.master')

@section('contenido-principal')
<div class="col d-flex justify-content-start align-items-center">
    <a href="{{ route('ofertas.index') }}"
        class="btn text-white btn-warning d-flex justify-content-center align-items-center">
        <i class="material-icons text-white mx-1" style="font-size: 1em">arrow_back</i>
        <strong>Volver</strong>
    </a>
</div>
<div class="container mt-4">
    <div class="col-10">
        <form action="">
            <div class="row mb-3 me-5 ms-4">
                {{-- Barra de Busqueda --}}
                <div class="row mb-3 ">
                    <div class="col d-flex ">
                        <input type="text" name="termino" class="form-control" placeholder="Ingrese Rut de Postulante">
                    </div>

                    {{-- Busqueda --}}
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary d-flex justify-content-end align-items-end">
                            <i class="material-icons">search</i><strong>Buscar</strong></button>
                    </div>
                </div>
            </div>
        </form>

        {{-- Body --}}
        @if ($postulaciones->isEmpty())
        <div class="alert alert-warning col-10 ms-5">
            No se encontraron Postulantes.
        </div>
        @else
        <div class="d-flex justify-content-center mt-3">
            <div class="row w-100 ps-3">
                {{-- Card izquierda --}}
                <div class="col-5 d-flex flex-column align-items-center">
                    <div class="w-100 overflow-auto" style="max-height: 79vh;">
                        @foreach($postulaciones as $postulante)
                        <div class="card mb-3 oferta-card" data-id="{{ $postulante->id }}" onclick="showPostulanteDetails({{ $postulante->id }})">
                            <div class="card-body">
                                <h5 class="card-title"><strong>{{$postulante->estudiante->usuario->nombre}} {{$postulante->estudiante->usuario->apellido}}</strong></h5>
                                <p class="card-text mb-0"> {{$postulante->estudiante->rut_estudiante}}</p>
                                <p class="card-text mb-0"> {{$postulante->estudiante->direccion_estudiante}}</p>
                                <div class="row">
                                    <div class="col">
                                        <p class="card-text mb-0"> {{$postulante->estudiante->usuario->correo_usuario}}</p>
                                    </div>
                                    <div class="col">
                                        <p class="card-text mb-0"> {{$postulante->estudiante->fono_estudiante}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Card derecha --}}
                <div class="col-md-6 d-flex h-100">
                    <div id="details-card" class="card w-85 shadow-sm">
                        <div class="card-header bg-white">
                            <div class="row">
                                <div class="col-4">
                                    <img id="imagen" src="https://via.placeholder.com/800" class="card-img" alt="Imagen de Perfil">
                                </div>
                                <div class="col">
                                    <h5 id="nombre-apellido"><strong></strong></h5>
                                    <p id="rut-estudiante" class="mb-0"></p>
                                    <p id="direccion-estudiante" class="mb-0"></p>
                                    <p id="edad-estudiante" class="mb-0"></p>
                                    <p id="nombre-carrera" class="mb-0"></p>
                                    <div class="row mt-0">
                                        <div class="col mt-0">
                                            <p id="correo-usuario"></p>
                                        </div>
                                        <div class="col mt-0">
                                            <p id="fono-estudiante"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body overflow-auto" style="max-height: 50vh;">
                            <h5><strong>Acerca de mí:</strong></h5>
                            <div id="details-description"></div>
                        </div>
                        <div class="card-footer d-flex justify-content-end align-items-end">
                            {{-- Botones --}}
                            @if (Gate::allows('empresa-gestion'))
                            <a href="" class="btn text-white btn-danger mx-2 d-flex justify-content-center align-items-center">
                                <i class="material-icons text-white mx-1" style="font-size: 1em">cancel</i>
                                <strong>Rechazar</strong>
                            </a>
                            <a href="" class="btn text-white btn-success mx-2 d-flex justify-content-center align-items-center">
                                <i class="material-icons text-white mx-1" style="font-size: 1em">check</i>
                                <strong>Aceptar</strong>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
<script>
    const postulaciones = @json($postulaciones);

    // Crear un mapa para un acceso rápido
    const postulacionesMap = {};
    postulaciones.forEach(postulante => {
        postulacionesMap[postulante.id] = postulante;
    });

    function showPostulanteDetails(id) {
        const postulante = postulacionesMap[id];
        if (!postulante) {
            console.error(`No se encontró el postulante con id: ${id}`);
            return; // Salir de la función si no se encuentra
        }

        // Actualizar el contenido del detalle
        document.getElementById('details-description').innerHTML = postulante.estudiante.desc_estudiante;
        document.getElementById('nombre-apellido').innerHTML = `<strong>${postulante.estudiante.usuario.nombre} ${postulante.estudiante.usuario.apellido}</strong>`;
        document.getElementById('rut-estudiante').textContent = postulante.estudiante.rut_estudiante;
        document.getElementById('direccion-estudiante').textContent = postulante.estudiante.direccion_estudiante;
        document.getElementById('direccion-estudiante').textContent = `${postulante.estudiante.edad_estudiante} años`;
        // document.getElementById('nombre-carrera').textContent = postulante.estudiante.carrera.nombre;
        document.getElementById('correo-usuario').textContent = postulante.estudiante.usuario.correo_usuario ;
        document.getElementById('fono-estudiante').textContent = postulante.estudiante.fono_estudiante;

        // Resaltar la tarjeta seleccionada
        const ofertaCards = document.getElementsByClassName('oferta-card');
        for (let i = 0; i < ofertaCards.length; i++) {
            ofertaCards[i].classList.remove('border-primary'); 
        }

        const selectedCard = document.querySelector(`.oferta-card[data-id="${id}"]`);
        if (selectedCard) {
            selectedCard.classList.add('border-primary'); 
        }
    }

    window.onload = function() {
        if (postulaciones.length > 0) {
            showPostulanteDetails(postulaciones[0].id);
            const firstCard = document.querySelector('.oferta-card'); 
            if (firstCard) {
                firstCard.classList.add('border-primary'); 
            }
        }
    };
</script>
@endsection
