@extends('templates.master')

@section('contenido-principal')
<div class="container mt-4">
    <form action="{{ route('ofertas.index') }}" method="GET" class="mb-4">
        @csrf

        <div class="row mb-3 px-5 d-flex me-4 ">

            {{-- Barra de Busqueda --}}
            <div class="row mb-3 ">
                <div
                    class="{{ Gate::allows('empresa-gestion') || Gate::allows('admin-gestion')  ? 'col-7' : 'col-9' }}">
                    <input type="text" name="termino" class="form-control" placeholder="Buscar por tus preferencias">
                </div>

                {{-- Crear Oferta --}}
                @if (Gate::allows('empresa-gestion') or Gate::allows('admin-gestion'))
                <a href="{{ route('ofertas.create') }}"
                    class="col-md-2 btn bg-success text-white fw-bold d-flex justify-content-center align-items-center">
                    <i class="material-icons text-white">add</i> <strong>Crear Oferta</strong>
                </a>
                @endif

                {{-- Busqueda --}}
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary d-flex justify-content-center align-items-center">
                        <i class="material-icons">search</i><strong>Buscar</strong></button>
                </div>
            </div>

            {{-- Filtros --}}

            {{-- Filtro Tipo --}}
            <div class="col-2">
                <select name="tipo" class="form-select">
                    <option value="" class="fs-7">Tipo </option>
                    @foreach ($tipos as $tipo)
                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }} </option>
                    @endforeach

                </select>
            </div>
            {{-- /*Filtro Tipo --}}

            {{-- Filtro Carrera --}}
            <div class="col-2 fs-7">
                <select name="carrera" class="form-select">
                    <option value="">Carrera</option>
                    @foreach ($carreras as $carrera)
                    <option value="{{ $carrera->id }}">{{ $carrera->nombre }} </option>
                    @endforeach
                </select>
            </div>
            {{-- /*Filtro Carrera --}}

            {{-- Filtro Región --}}
            <div class="col-2">
                <select name="region" id="region-select" class="form-select">
                    <option value="">Región</option>
                    @foreach ($regiones as $region)
                    <option value="{{ $region->id }}">{{ $region->nombre }} </option>
                    @endforeach
                </select>
            </div>
            {{-- /*Filtro Región --}}

            {{-- Filtro Comuna --}}
            <div class="col-2">
                <select name="comuna" id="comuna-select" class="form-select">
                    <option value="">Comuna</option>
                </select>
            </div>
            {{-- /*Filtro Comuna --}}

            {{-- Filtro por fechas --}}
            <div class="col-2">
                <select name="rango_fecha" class="form-select">
                    <option value="">Fecha</option>
                    <option value="1_semanas">Hace 1 Semana</option>
                    <option value="2_semanas">Hace 2 Semanas</option>
                    <option value="1_mes">Hace 1 Mes</option>
                    <option value="2_meses">Hace 2 Meses</option>
                    <option value="3_meses">Hace 3 Meses</option>
                    <option value="mas_3_meses">Hace más de 3 Meses</option>
                </select>
            </div>
            {{-- /*Filtro por fechas --}}

        </div>
    </form>


    {{-- Body --}}
    <div class="d-flex justify-content-center mt-3">
        <div class="row w-100 ps-3">
            @if ($ofertas->isEmpty())
            <div class="alert alert-warning col-9  ms-4">
                No se encontraron ofertas que coincidan con los filtros seleccionados.
            </div>
            @else
            <!-- Columna Izquierda -->
            <div class="col-5 d-flex flex-column align-items-center">
                <div class="w-100 overflow-auto ms-5" style="max-height: 79vh;">
                    @foreach ($ofertas as $oferta)
                    <div class="card mb-3 oferta-card shadow-sm" data-id="{{ $oferta->id }}"
                        onclick="showDetails({{ $oferta->id }})" onmouseover="this.classList.add('shadow-sm')"
                        onmouseout="this.classList.remove('shadow-sm')">

                        <div class="card-body">
                            <h5 class="card-title"><strong>{{ $oferta->titulo }}</strong></h5>
                            <a href="{{ $oferta->empresa->url_web }}">{{ $oferta->empresa->url_web }}</a>
                            <p class="card-text">
                                <i class="material-icons" style="font-size: 1em">location_on</i>
                                {{ $oferta->region->nombre }} / {{ $oferta->comuna->nombre }}
                            </p>
                            <p class="card-text">{{ $oferta->carrera->nombre }}</p>
                            <p class="card-text"><strong>{{ $oferta->tipo->nombre }} / {{ $oferta->cupos }} Cupos
                                    Disponibles</strong></p>
                            <p class="card-text">Publicado {{
                                \Carbon\Carbon::parse($oferta->fecha_publicacion)->diffForHumans() }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Columna Derecha -->
            <div class="col-md-6 d-flex h-100">
                <div id="details-card" class="card w-75">
                    <div class="card-header bg-white shadow-sm">
                        {{-- Titulo --}}
                        <h5 class="card-title"><strong>{{ $ofertas->first()->titulo }}</strong></h5>

                        {{-- Url web --}}
                        <a href="{{ $ofertas->first()->empresa->url_web }}">{{ $ofertas->first()->empresa->url_web
                            }}</a>

                        {{-- Location Region y Comuna --}}
                        <p class="card-text">
                            <i class="material-icons" style="font-size: 1em">location_on</i>
                            {{ $ofertas->first()->region->nombre }} / {{ $ofertas->first()->comuna->nombre }}
                        </p>
                        {{-- Carrera --}}
                        <p class="card-text">{{ $ofertas->first()->carrera->nombre }}</p>
                        {{-- Tipo y Cupos --}}
                        <p class="card-text"><strong>{{ $ofertas->first()->tipo->nombre }} / {{ $ofertas->first()->cupos
                                }} Cupos Disponibles</strong></p>

                        {{-- Botones --}}
                        @if (Gate::allows('estudiante-gestion'))
                        <form id='postular-form' action="{{ route('ofertas.postular') }}" method="POST"
                            style="display:inline;">
                            @csrf
                            <input type="hidden" name="oferta_id" id="oferta_id" value="">
                            <button type="submit" class="btn btn-primary" id="postular-button">
                                <i class="material-icons text-white" style="font-size: 1em">send</i>
                                <strong>Postular</strong>
                            </button>
                        </form>
                        @else
                        <input type="hidden" name="oferta_id" id="oferta_id" value="">
                        @endif

                        @if (Gate::allows('empresa-gestion') or Gate::allows('admin-gestion'))

                        {{-- Postulantes --}}
                        <a id="postulantes" href="{{route('postulantes.index',$oferta->id)}}" class="btn text-white btn-primary">
                            <i class="material-icons text-white" style="font-size: 1em">pending_actions</i>
                            <strong>Postulantes</strong>
                        </a>

                        {{-- Modificar --}}
                        <a href="{{ route('ofertas.edit', $oferta->id) }}" class="btn text-white btn-warning">
                            <i class="material-icons text-white" style="font-size: 1em">edit</i>
                            <strong>Editar</strong>
                        </a>

                        {{-- Eliminar --}}
                        <a href="" class="btn text-white btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalEliminar">
                            <i class="material-icons text-white" style="font-size: 1em">delete</i>
                            <strong>Eliminar</strong>
                        </a>
                        @endif

                        {{-- Modal Eliminar --}}
                        <div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="modalEliminarLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4><strong>¡Esta acción no se puede deshacer!</strong></h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h5 class="modal-title" id="modalEliminarLabel">
                                            ¿Está seguro de que desea eliminar la oferta <strong
                                                id="modal-titulo"></strong>?
                                        </h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button"
                                            class="btn btn-secondary d-flex justify-content-center aling-items-center mx-2"
                                            data-bs-dismiss="modal">
                                            <i class="material-icons text-white">close</i>
                                            Cancelar
                                        </button>
                                        <form id="delete-form" action="" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-danger d-flex justify-content-center aling-items-center mx-2">
                                                <i class="material-icons text-white">delete</i><strong>Eliminar</strong>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- /*Modal Eliminar --}}

                    </div>
                    <div class="card-body overflow-auto" style="max-height: 50vh;">
                        <h5><strong>Descripción</strong></h5>
                        <div id="details-description"></div>
                    </div>

                    <!-- Modal de éxito -->
                    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-success text-white">
                                    <h5 class="modal-title" id="successModalLabel"><strong>¡Postulado!</strong></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {{ session('success') }}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal de error -->
                    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title" id="errorModalLabel"><strong>¡Error!</strong></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {{ session('error') }}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
<script>
    // Inicializar CKEditor
        ClassicEditor
            .create(document.querySelector('#descripcion'), {
                toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList']
            })
            .then(editor => {
                window.editor = editor; // Acceso opcional al editor
            })
            .catch(error => {
                console.error(error);
            });

        // Script de mostrar la comuna dependiendo de la región
        document.getElementById('region-select').addEventListener('change', function() {
            const regionId = this.value;
            const comunaSelect = document.getElementById('comuna-select');

            if (regionId) {
                fetch(`/comunas/${regionId}`)
                    .then(response => response.json())
                    .then(data => {
                        comunaSelect.innerHTML = '<option value="">Comuna</option>';
                        data.comunas.forEach(comuna => {
                            const option = document.createElement('option');
                            option.value = comuna.id;
                            option.textContent = comuna.nombre;
                            comunaSelect.appendChild(option);
                        });
                    });
            } else {
                comunaSelect.innerHTML = '<option value="">Seleccione Comuna</option>';
            }
        });

        // Script de selección de ofertas
        const ofertas = @json($ofertas);

        function showDetails(id) {
            const oferta = ofertas.find(oferta => oferta.id === id);
            //Asignar id al value del boton postular
            document.getElementById('oferta_id').value = oferta.id;
            if (oferta) {
                document.querySelectorAll('.oferta-card').forEach(card => {
                    card.classList.remove('border-primary');
                });

                const selectedCard = document.querySelector(`.oferta-card[data-id="${id}"]`);
                selectedCard.classList.add('border-primary');

                const detailsCard = document.getElementById('details-card');
                detailsCard.querySelector('.card-title').innerHTML = `<strong>${oferta.titulo}</strong>`;
                detailsCard.querySelector('a').textContent = oferta.empresa.url_web;
                detailsCard.querySelector('a').href = oferta.empresa.url_web;
                detailsCard.querySelector('.card-header p.card-text').innerHTML = `
                    <i class="material-icons" style="font-size: 1em">location_on</i> ${oferta.region.nombre} / ${oferta.comuna.nombre}
                `;
                detailsCard.querySelector('.card-header p.card-text:nth-child(4)').textContent = oferta.carrera.nombre;
                detailsCard.querySelector('.card-header p.card-text:nth-child(5)').innerHTML = `
                    <strong>${oferta.tipo.nombre} / ${oferta.cupos} Cupos Disponibles</strong>
                `;
                document.getElementById('details-description').innerHTML = oferta.descripcion; // Mostrar contenido enriquecido

                // Actualizar el modal de eliminación
                document.getElementById('modal-titulo').textContent = oferta.titulo;
                document.getElementById('delete-form').action = `/ofertas/${oferta.id}`;

                //Actualizar modificar
                document.querySelector('.btn-warning').href = `/ofertas/edit/${oferta.id}`;
                
                //Actualizar Postulantes
                document.getElementById('postulantes').href = `/postulantes/${oferta.id}`;
            }
        }

        //Mostrar Errores y Succes en las postulaciones
        document.addEventListener('DOMContentLoaded', function () {
            if (ofertas.length > 0) {
                showDetails(ofertas[0].id);
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
        // Mostrar el modal de éxito si hay un mensaje de éxito
        @if(session('success'))
            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
        @endif

        // Mostrar el modal de error si hay un mensaje de error
        @if(session('error'))
            var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
            errorModal.show();
        @endif
    });
</script>
@endsection