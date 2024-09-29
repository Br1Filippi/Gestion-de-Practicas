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
                        <input type="text" name="termino" class="form-control" placeholder="Buscar Usuario">
                    </div>

                    <div class="col-2">
                        <select name="region" class="form-select">
                            <option value="">Roles </option>
                            
                        </select>
                    </div>

                    <div class="col-2">
                        <a href="" class="btn bg-success text-white fw-bold d-flex justify-content-center align-items-center">
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
            <div class="col-10 d-flex flex-column align-items-center ps-4" >
                <div class="w-100 overflow-auto" style="max-height: 79vh;">

                    <div class="card mb-3 oferta-card shadow-sm ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2">
                                    <!-- Imagen de perfil -->
                                    <img src="https://via.placeholder.com/800" class="card-img" alt="Imagen de Perfil">
                                </div>
                                <div class="col">
                                    <h4 class="mb-1"><strong>Nombre y Apellido</strong></h4>
                                    <p class="card-text mb-0"> Correo del Usuario</p>
                                    <p class="card-text mb-0"> Rol</p>
                                </div>
                                <div class="col-1">
                                    <div class="row-4 mt-3">
                                        <a href="" class="btn text-white btn-warning">
                                            <i class="material-icons text-white">edit</i>
                                        </a>
                                    <div class="row-4 mt-3">
                                        <a href="" class="btn text-white btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalEliminar">
                                            <i class="material-icons text-white" >delete</i>
                                        </a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection