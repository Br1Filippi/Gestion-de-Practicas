@extends('templates.master')

@section('contenido-principal')
<div class="col-9">
    <div class="container mt-4">
        <form action="{{ route('solicitudes.index2') }}" method="GET" class="mb-4">
            @csrf
    
            <div class="row mb-3 px-5 d-flex me-4 ">
    
                {{-- Barra de Busqueda --}}
                <div class="row mb-3 ">
                    <div class="col-9">
                        <input type="text" name="termino" class="form-control" placeholder="Buscar por tus preferencias">
                    </div>
    
                    {{-- Crear Solicitud --}}
                    @if (Gate::allows('empresa-gestion') or Gate::allows('admin-gestion'))
                    <a href="{{route('solicitudes.create')}}"
                        class="col-md-2 btn bg-success text-white fw-bold d-flex justify-content-center align-items-center">
                        <i class="material-icons text-white">add</i> <strong>Crear Solicitud</strong>
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
                        @foreach ($estado as $estado)
                        <option value="{{ $estado->id }}">{{ $estado->nombre_estado }} </option>
                        @endforeach
                    </select>
                </div>
                {{-- /*Filtro Estado --}}
    
            </div>
        </form>
        @if ($solicitudes->isEmpty())
        <div class="alert alert-warning  ms-4">
            No se encontraron solicitudes.
        </div>
        @else
        {{-- Tabla de Solicitudes --}}
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Estudiante</th>
                        <th>Empresa</th>
                        <th>Carrera</th>
                        <th>Tipo</th>
                        <th>Estado</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Término</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($solicitudes as $solicitud)
                    <tr>
                        <td>{{ $solicitud->oferta->titulo }}</td>
                        <td>{{ $solicitud->estudiante->usuario->nombre }} {{ $solicitud->estudiante->usuario->apellido }}</td>
                        <td>{{ $solicitud->empresa->usuario->nombre }}</td>
                        <td>{{ $solicitud->carrera->nombre }}</td>
                        <td>{{ $solicitud->tipo->nombre }}</td>
                        <td>{{ $solicitud->estado->nombre_estado }}</td>
                        <td>{{ $solicitud->fecha_inicio }}</td>
                        <td>{{ $solicitud->fecha_termino }}</td>
                        <td>
    
                            @if (Gate::allows('empresa-gestion') or Gate::allows('admin-gestion'))
                            <div class="d-flex">

                                <a href="{{route('solicitudes.detalles',$solicitud->id)}}" class="btn btn-info btn-sm text-white me-2">
                                    <i class="material-icons">visibility</i>
                                </a>
                                <a href="{{route('solicitudes.edit',$solicitud->id)}}" class="btn btn-warning btn-sm text-white me-2">
                                    <i class="material-icons">edit</i>
                                </a>
                                
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalEliminar{{ $solicitud->id }}">
                                    <i class="material-icons">delete</i>
                                </button>
                            </div>
    
                            {{-- Modal Eliminar --}}
                            <div class="modal fade" id="modalEliminar{{ $solicitud->id }}" tabindex="-1" aria-labelledby="modalEliminarLabel{{ $solicitud->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4><strong>¡Esta acción no se puede deshacer!</strong></h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="modal-title" id="modalEliminarLabel{{ $solicitud->id }}">
                                                ¿Está seguro de que desea eliminar la solicitud <strong>{{ $solicitud->titulo }}</strong>?
                                            </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <form action="{{route('solicitudes.destroy',$solicitud->id)}}" method="POST">
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