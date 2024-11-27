@extends('templates.master')

@section('contenido-principal')
<div class="container mt-4">
    {{-- Header --}}
    <div class="row mb-3 px-5 d-flex me-4 ">
        <form action="{{ route('usuarios.index') }}" method="GET">
            <div class="row mb-3 me-5">
                <div class="col-1 d-flex justify-content-center align-items-center mb-2 ms-3">
                    <a href="{{route('administrador.index')}}"
                        class="btn text-white btn-warning d-flex justify-content-center align-items-center">
                        <i class="material-icons text-white mx-1">arrow_back</i>
                        <strong>Volver</strong>
                    </a>
                </div>
                {{-- Barra de Busqueda --}}
                <div class="row mb-3 ">
                    <div class="col d-flex ">
                        <input type="text" name="termino" class="form-control" placeholder="Buscar Usuario"
                            value="{{ request('termino') }}">
                    </div>

                    <div class="col-2">
                        <select name="rol" class="form-select">
                            <option value="">Roles</option>
                            @foreach ($roles as $rol)
                            <option value="{{ $rol->id }}" {{ request('rol')==$rol->id ? 'selected' : '' }}>{{
                                $rol->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-2">
                        <a href="{{route('usuarios.elegirRol')}}"
                            class="btn bg-success text-white fw-bold d-flex justify-content-center align-items-center">
                            <i class="material-icons text-white">add</i> <strong>Agregar</strong>
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
            {{-- Card izquierda --}}
            <div class="col-10 d-flex flex-column align-items-center ps-4">
                <div class="w-100 overflow-auto" style="max-height: 77vh;">
                    @foreach ($usuarios as $usuario)
                    <div class="card mb-3 oferta-card shadow-sm ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2">
                                    <!-- Imagen de perfil -->
                                    <img src="{{ $usuario->imagen ? Storage::url($usuario->imagen) : 'https://via.placeholder.com/800' }}"
                                        class="card-img" alt="Imagen de Perfil">
                                </div>
                                <div class="col">
                                    <h4 class="mb-1"><strong>{{ $usuario->nombre }} {{ $usuario->apellido }}</strong>
                                    </h4>
                                    <p class="card-text mb-0">{{ $usuario->correo_usuario }}</p>
                                    <p class="card-text mb-0">Rol: {{ $usuario->roles->pluck('nombre')->join(', ') }}
                                    </p>
                                </div>
                                <div class="col-1">
                                    <div class="row-4 mt-3">
                                        <a href="{{route('usuarios.edit',$usuario->correo_usuario)}}"
                                            class="btn text-white btn-warning">
                                            <i class="material-icons text-white">edit</i>
                                        </a>
                                    </div>
                                    <div class="row-4 mt-3">
                                        @if($usuario->correo_usuario != auth()->user()->correo_usuario)
                                        <a href="" class="btn text-white btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalEliminar">
                                            <i class="material-icons text-white">delete</i>
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Eliminar -->
<div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="modalEliminarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4><strong>¡Esta acción no se puede deshacer!</strong></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5 class="modal-title" id="modalEliminarLabel">¿Está seguro?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary d-flex justify-content-center align-items-center mx-2"
                    data-bs-dismiss="modal">
                    <i class="material-icons text-white">close</i> Cancelar
                </button>
                <form id="delete-form" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger d-flex justify-content-center align-items-center mx-2">
                        <i class="material-icons text-white">delete</i> <strong>Eliminar</strong>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection