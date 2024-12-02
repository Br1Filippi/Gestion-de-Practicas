@extends('templates.master')

@section('contenido-principal')
<div class="container mt-4">
    <form action="{{ route('ofertas.index2') }}" method="GET" class="mb-4">
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

    {{-- Tabla de Ofertas --}}
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Empresa</th>
                    <th>Región</th>
                    <th>Comuna</th>
                    <th>Carrera</th>
                    <th>Tipo</th>
                    <th>Cupos</th>
                    <th>Fecha Publicación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @if ($ofertas->isEmpty())
                <tr>
                    <td colspan="9" class="text-center">No se encontraron ofertas que coincidan con los filtros seleccionados.</td>
                </tr>
                @else
                @foreach ($ofertas as $oferta)
                <tr>
                    <td>{{ $oferta->titulo }}</td>
                    <td>{{$oferta->empresa->usuario->nombre}}</td>
                    <td>{{ $oferta->region->nombre }}</td>
                    <td>{{ $oferta->comuna->nombre }}</td>
                    <td>{{ $oferta->carrera->nombre }}</td>
                    <td>{{ $oferta->tipo->nombre }}</td>
                    <td>{{ $oferta->cupos }}</td>
                    <td>{{ \Carbon\Carbon::parse($oferta->fecha_publicacion)->diffForHumans() }}</td>
                    <td>

                        @if (Gate::allows('empresa-gestion') or Gate::allows('admin-gestion'))
                        <div class="d-flex">
                            <a href="{{ route('ofertas.edit', $oferta->id) }}" class="btn btn-warning btn-sm text-white me-2">
                                <i class="material-icons">edit</i>
                            </a>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalEliminar{{ $oferta->id }}">
                                <i class="material-icons">delete</i>
                            </button>
                        </div>

                        {{-- Modal Eliminar --}}
                        <div class="modal fade" id="modalEliminar{{ $oferta->id }}" tabindex="-1" aria-labelledby="modalEliminarLabel{{ $oferta->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4><strong>¡Esta acción no se puede deshacer!</strong></h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h5 class="modal-title" id="modalEliminarLabel{{ $oferta->id }}">
                                            ¿Está seguro de que desea eliminar la oferta <strong>{{ $oferta->titulo }}</strong>?
                                        </h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <form action="{{ route('ofertas.destroy', $oferta->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- /*Modal Eliminar --}}
                        @endif
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@if ($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
        errorModal.show();
    });
</script>

<!-- Modal Errores -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h4><strong>Error</strong></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{$errors->first()}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endif
<script>
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
</script>
@endsection