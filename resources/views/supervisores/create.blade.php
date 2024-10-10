@extends('templates.master')

@section('contenido-principal')
<div class="col-10">
    <div class="col d-flex justify-content-start aling-items-center">
        <a href="{{route('supervisores.index')}}"
            class="btn text-white btn-warning  d-flex justify-content-center align-items-center">
            <i class="material-icons text-white mx-1" style="font-size: 1em">arrow_back</i>
            <strong>Volver</strong>
        </a>
    </div>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <form method="POST" action="{{ route('supervisores.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body overflow-auto " style="max-height: 80vh;">

                            {{-- Correo del usuario --}}
                            <div class="mb-3">
                                <label for="correo_usuario" class="form-label">Correo:</label>
                                <input type="email" class="form-control" id="correo_usuario" name="correo_usuario"
                                    placeholder="dago@gmail.com">
                            </div>

                            {{-- Contraseña --}}
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña:</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>

                            {{-- Nombre --}}
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre">
                            </div>

                            {{-- Apellido --}}
                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido:</label>
                                <input type="text" class="form-control" id="apellido" name="apellido">
                            </div>

                            {{-- Imagen --}}
                            <div class="mb-3">
                                <label for="imagen" class="form-label">Foto de Perfil:</label>
                                <input type="file" class="form-control" id="imagen" name="imagen">
                            </div>

                            {{-- Rut --}}
                            <div class="mb-3">
                                <label for="rut_supervisor" class="form-label">Rut:</label>
                                <input type="text" class="form-control" id="rut_supervisor" name="rut_supervisor">
                            </div>

                            {{-- Título --}}
                            <div class="mb-3">
                                <label for="titulo_supervisor" class="form-label">Título:</label>
                                <input type="text" class="form-control" id="titulo_supervisor" name="titulo_supervisor">
                            </div>

                            {{-- Cargo --}}
                            <div class="mb-3">
                                <label for="cargo_supervisor" class="form-label">Cargo:</label>
                                <input type="text" class="form-control" id="cargo_supervisor" name="cargo_supervisor">
                            </div>

                            {{-- Fono --}}
                            <div class="mb-3">
                                <label for="fono_supervisor" class="form-label">Fono:</label>
                                <input type="text" class="form-control" id="fono_supervisor" name="fono_supervisor">
                            </div>
                        </div>
                        <div class="card-footer">
                            {{-- Botones --}}
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('supervisores.index') }}" class="btn btn-danger me-2">Cancelar</a>
                                <button type="submit" class="btn btn-success">Crear Supervisor</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection