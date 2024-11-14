@extends('templates.master')

@section('contenido-principal')
<div class="container mt-4">
    <div class="row mb-3 px-5 d-flex me-4 ">
        <form action="">
            <div class="row mb-3">
                <div class="row mb-3 ">
                    <div class="col d-flex ">
                        <input type="text" name="termino" class="form-control"
                            placeholder="Buscar por Nombre o Rut del Practicante">
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary d-flex justify-content-end align-items-end">
                            <i class="material-icons">search</i><strong>Buscar</strong></button>
                    </div>
                </div>
                <div class="col-3 ms-5">
                    <select name="estado" class="form-control fs-6">
                        <option value="">Seleccione un Estado</option>
                    </select>
                </div>
                <div class="col-3">
                    <select name="tipo" class="form-control fs-6">
                        <option value="">Seleccione un Tipo</option>
                    </select>
                </div>
                <div class="col-3">
                    <select name="tipo" class="form-control fs-6">
                        <option value="">Seleccione Estado de Evaluacion</option>
                    </select>
                </div>
            </div>
        </form>
    </div>

    @if ($practicantes->isEmpty())
    <div class="alert alert-warning col-10 ms-5">
        No se encontraron Practicantes.
    </div>
    @else
    <div class="d-flex justify-content-center mt-3">
        <div class="row w-100 ps-3">
            <div class="col-5 d-flex flex-column align-items-center ps-4">
                <div class="w-100 overflow-auto" style="max-height: 79vh;">
                    @foreach($practicantes as $practicante)
                    <div class="card mb-3 oferta-card shadow-sm" data-id="{{ $practicante->id }}"
                        onclick="showPracticanteDetails({{ $practicante->id }})">
                        <div class="card-body">
                            <h5 class="card-title"><strong>{{ $practicante->estudiante->usuario->nombre }} {{
                                    $practicante->estudiante->usuario->apellido }}</strong></h5>
                            <p class="card-text mb-1"> Fecha Inicio: {{ $practicante->fecha_inicio }}</p>
                            <p class="card-text mb-1"> Fecha Termino: {{ $practicante->fecha_termino }}</p>
                            <p class="card-text mb-1"> Tipo de Practica: {{ $practicante->tipo->nombre }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-6 d-flex h-100 pe-5">
                <div id="details-card" class="card w-100 shadow-sm">
                    <div class="card-header bg-white">
                        <div class="row">
                            <div class="col-3">
                                <img src="https://via.placeholder.com/800" id="profile-image" class="card-img"
                                    alt="Imagen de Perfil">
                            </div>
                            <div class="col">
                                <h4 id="nombre-apellido"><strong></strong></h4>
                                <p class="mt-0" id="rut-practicante"></p>
                                <div class="row mt-0">
                                    <div class="col mt-0">
                                        <p class="mt-0" id="correo-practicante"></p>
                                    </div>
                                    <div class="col mt-0">
                                        <p class="mt-0 mb-0" id="fono-practicante"></p>
                                    </div>
                                </div>
                                <p class="mt-0" id="carrera-practicante"></p>
                                <p class="mt-0" id="ubicaion"></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4>Datos de la Practica</h4>
                        <p id="tipo-practica"></p>
                        <p id="fecha-inicio"></p>
                        <p id="fecha-termino"></p>
                        <p id="informe-empresa"></p>
                        <p id="evaluacion-alumno"></p>



                    </div>
                    <div class="card-footer d-flex justify-content-end align-items-end">
                        <a href="" id="btn-evaluar"
                            class="btn text-white btn-warning mx-2 d-flex justify-content-center align-items-center">
                            <i class="material-icons text-white mx-1" style="font-size: 1em">quiz</i>
                            <strong>Evaluar</strong>
                        </a>
                        <a href="" id="btn-informe"
                            class="btn text-white btn-primary mx-2 d-flex justify-content-center align-items-center">
                            <i class="material-icons text-white mx-1" style="font-size: 1em">quiz</i>
                            <strong>Informe</strong>
                        </a>
                        <form action="" id="btn-enviar" method="POST" class="mt-0">
                            @csrf
                            @method('put')
                            <button type="submit" id="btn-enviar"
                                class="btn text-white btn-success mx-2 d-flex justify-content-center align-items-center">
                                <i class="material-icons text-white mx-1" style="font-size: 1em">send</i>
                                <strong>Enviar</strong>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

<script>
    const practicantes = @json($practicantes);

    const practicantesMap = {};
    practicantes.forEach(practicante => {
        practicantesMap[practicante.id] = practicante;
    });

    function showPracticanteDetails(id) {
        const practicante = practicantesMap[id];
        if (!practicante) {
            console.error(`No se encontró el practicante con id: ${id}`);
            return;
        }
        const storageUrl = "{{ Storage::url('') }}";

        document.getElementById('nombre-apellido').innerHTML = `<strong>${practicante.estudiante.usuario.nombre} ${practicante.estudiante.usuario.apellido}</strong>`;
        document.getElementById('rut-practicante').textContent = practicante.estudiante.rut_estudiante;
        document.getElementById('correo-practicante').textContent = practicante.estudiante.usuario.correo_usuario;
        document.getElementById('fono-practicante').textContent = practicante.estudiante.fono_estudiante;
        document.getElementById('carrera-practicante').textContent = practicante.estudiante.carrera;
        document.getElementById('tipo-practica').textContent = `Tipo de Practica: ${practicante.tipo.nombre}`;
        document.getElementById('fecha-inicio').textContent = `Fecha de Inicio: ${practicante.fecha_inicio}`;
        document.getElementById('fecha-termino').textContent = `Fecha de Termino: ${practicante.fecha_termino}`;
        document.getElementById('informe-empresa').textContent = '';
        if (practicante.id_informe) {
            document.getElementById('informe-empresa').textContent += 'Informe: Evaluado';
        } else {
            document.getElementById('informe-empresa').textContent += 'Informe: No Evaluado';
        }
        

        document.getElementById('evaluacion-alumno').textContent = '';
        if (practicante.id_evaluacion) {
            document.getElementById('evaluacion-alumno').textContent += 'Evaluacion: Evaluada';
        } else {
            document.getElementById('evaluacion-alumno').textContent += 'Evaluacion: No Evaluada';
        }
        document.getElementById('btn-evaluar').href = `{{ route('evaluaciones.desempeño', '') }}/${practicante.id}`;
        document.getElementById('btn-informe').href = `{{ route('evaluaciones.informe', '') }}/${practicante.id}`;
        document.getElementById('btn-enviar').action = `{{ route('practicas.passar', '') }}/${practicante.id}`;
        if (practicante.id_informe) {
            document.getElementById('btn-informe').style.display = 'block';
        } else {
            document.getElementById('btn-informe').style.display = 'none';
        }

        const path = practicante.imagen
        ? `${storageUrl}${practicante.imagen}`
        : 'https://via.placeholder.com/800';
    
        document.getElementById('profile-image').src = path;

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
        if (practicantes.length > 0) {
            showPracticanteDetails(practicantes[0].id);
            const firstCard = document.querySelector('.oferta-card');
            if (firstCard) {
                firstCard.classList.add('border-primary');
            }
        }
    };
</script>
@endsection
@if ($errors->any())
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="errorModalLabel">Error</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
                @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
        errorModal.show();
    });
</script>
@endif