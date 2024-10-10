@extends('templates.master')

@section('contenido-principal')
<div class="container mt-4">
    {{-- Header --}}
    <div class="row mb-3 px-5 d-flex me-4 ">
        <form action="">

            <div class="row mb-3 me-5">
                {{-- Barra de Busqueda --}}
                <div class="row mb-3 ">
                    <div class="col d-flex ">
                        <input type="text" name="termino" class="form-control" placeholder="Buscar Supervisor">
                    </div>

                    {{-- Crear --}}
                    <div class="col-3">
                        <a href="{{route('supervisores.create')}}"
                            class="btn bg-success text-white fw-bold d-flex justify-content-center align-items-center">
                            <i class="material-icons text-white">add</i> <strong>Agregar Supervisor</strong>
                        </a>
                    </div>

                    {{-- Busqueda --}}
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary d-flex justify-content-end align-items-end">
                            <i class="material-icons">search</i><strong>Buscar</strong></button>
                    </div>
                </div>

            </div>
        </form>
    </div>

    {{-- Body --}}
    <div class="d-flex justify-content-center mt-3">
        <div class="row w-100 ps-3">
            @if ($supervisores->isEmpty())
            <div class="alert alert-warning col-9  ms-4">
                No se encontraron Supervisores que coincidan con los filtros seleccionados.
            </div>
            @else
            <div class="col-10 d-flex flex-column align-items-center ps-4">
                <div class="w-100 overflow-auto" style="max-height: 79vh;">
                    @foreach ($supervisores as $supervisor)
                    <div class="card mb-3 oferta-card shadow-sm ">
                        <div class="card-body">
                            <div class="row">
                                @if ($supervisor->usuario->imagen == null)
                                <div class="col-2">
                                    <!-- Imagen de perfil por defecto -->
                                    <img src="https://via.placeholder.com/800" class="card-img" alt="Imagen de Perfil">
                                </div>
                                @else
                                <div class="col-2 ">
                                    <!-- Imagen almacenada del usuario -->
                                    <img src="{{ Storage::url($supervisor->usuario->imagen) }}"
                                        class="card-img img-fluid" alt="Imagen de Perfil">
                                </div>
                                @endif
                                <div class="col">
                                    <h4 class="mb-1"><strong>{{$supervisor->usuario->nombre}}
                                            {{$supervisor->usuario->apellido}}</strong></h4>
                                    <p class="card-text mb-0">{{$supervisor->rut_supervisor}}</p>
                                    <p class="card-text mb-0">{{$supervisor->fono_supervisor}}</p>
                                    <div class="row mb-0">
                                        <div class="col-4 mb-0">
                                            <p class="mb-1">{{$supervisor->cargo_supervisor}}</p>
                                        </div>
                                        <div class="col-4 mb-0">
                                            <p class="mb-1">{{$supervisor->titulo_supervisor}}</p>
                                        </div>
                                    </div>
                                    <p class="card-text mb-0 mt-0"> cantidad de practicantes a su cargo: Working on it
                                    </p>
                                </div>
                                <div class="col-1">
                                    <div class="row-4 mt-3">
                                        <a href="" class="btn text-white btn-warning">
                                            <i class="material-icons text-white">edit</i>
                                        </a>
                                        <div class="row-4 mt-3">
                                            <a href="" class="btn text-white btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#modalEliminar">
                                                <i class="material-icons text-white">delete</i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection