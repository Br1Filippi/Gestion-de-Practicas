@extends('templates.master')

@section('contenido-principal')
<div class="col-9">
    <div class="container mt-4">
        <form action="{{ route('practicas.index2') }}" method="GET" class="mb-4">
            @csrf

            <div class="row mb-3 px-5 d-flex me-4 ">

                {{-- Barra de Busqueda --}}
                <div class="row mb-3 ">
                    <div class="col-9">
                        <input type="text" name="termino" class="form-control" placeholder="Buscar por tus preferencias">
                    </div>

                    {{-- Crear Práctica --}}
                    @if (Gate::allows('empresa-gestion') or Gate::allows('admin-gestion'))
                    <a href="{{route('practicas.create')}}"
                        class="col-md-2 btn bg-success text-white fw-bold d-flex justify-content-center align-items-center">
                        <i class="material-icons text-white">add</i> <strong>Crear Práctica</strong>
                    </a>
                    @endif

                    {{-- Busqueda --}}
                    <div class="col-md-1">
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

                {{-- Filtro Estado --}}
                <div class="col-2">
                    <select name="estado" class="form-select">
                        <option value="">Estado</option>
                        @foreach ($estados as $estado)
                        <option value="{{ $estado->id }}">{{ $estado->nombre_estado }} </option>
                        @endforeach
                    </select>
                </div>
                {{-- /*Filtro Estado --}}

            </div>
        </form>
        @if ($practicas->isEmpty())
        <div class="alert alert-warning  ms-4">
            No se encontraron prácticas.
        </div>
        @else
        {{-- Tabla de Prácticas --}}
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Estudiante</th>
                        <th>Empresa</th>
                        <th>Carrera</th>
                        <th>Tipo</th>
                        <th>Estado</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Término</th>
                        <th>Informe</th>
                        <th>Evaluación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($practicas as $practica)
                    <tr>
                        <td>{{ $practica->estudiante->usuario->nombre }} {{ $practica->estudiante->usuario->apellido }}</td>
                        <td>{{ $practica->empresa->usuario->nombre }}</td>
                        <td>{{ $practica->carrera->nombre }}</td>
                        <td>{{ $practica->tipo->nombre }}</td>
                        <td>{{ $practica->estado->nombre_estado }}</td>
                        <td>{{ $practica->fecha_inicio }}</td>
                        <td>{{ $practica->fecha_termino }}</td>
                        <td>{{ $practica->informe ? 'Evaluado' : 'No Evaluado' }}</td>
                        <td>{{ $practica->evaluacion ? 'Evaluado' : 'No Evaluado' }}</td>
                        <td>

                            @if (Gate::allows('empresa-gestion') or Gate::allows('admin-gestion'))
                            <div class="d-flex">

                                <a href="{{route('practicas.detalles',$practica->id)}}" class="btn btn-info btn-sm text-white me-2">
                                    <i class="material-icons">visibility</i>
                                </a>
                                <a href="{{route('practicas.edit',$practica->id)}}" class="btn btn-warning btn-sm text-white me-2">
                                    <i class="material-icons">edit</i>
                                </a>
                                
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalEliminar{{ $practica->id }}">
                                    <i class="material-icons">delete</i>
                                </button>
                            </div>

                            {{-- Modal Eliminar --}}
                            <div class="modal fade" id="modalEliminar{{ $practica->id }}" tabindex="-1" aria-labelledby="modalEliminarLabel{{ $practica->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4><strong>¡Esta acción no se puede deshacer!</strong></h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="modal-title" id="modalEliminarLabel{{ $practica->id }}">
                                                ¿Está seguro de que desea eliminar la práctica de <strong>{{ $practica->estudiante->usuario->nombre }}</strong>?
                                            </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <form action="{{route('practicas.destroy',$practica->id)}}" method="POST">
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
                    
                </tbody>
            </table>
        </div>
        @endif
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
@endsection