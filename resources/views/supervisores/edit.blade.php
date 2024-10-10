@extends('templates.master')

@section('contenido-principal')
<div class="col-10">
    <div class="col d-flex justify-content-start align-items-center">
        <a href="{{ route('supervisores.index') }}"
            class="btn text-white btn-warning d-flex justify-content-center align-items-center">
            <i class="material-icons text-white mx-1" style="font-size: 1em">arrow_back</i>
            <strong>Volver</strong>
        </a>
    </div>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <form method="POST" action="{{ route('supervisores.update', $supervisor->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Campo oculto para el correo del usuario --}}
                        <input type="hidden" name="correo_usuario" value="{{ $supervisor->usuario->correo_usuario }}">

                        {{-- Campo oculto para la contraseña --}}
                        <input type="hidden" name="password" value="{{ $supervisor->usuario->password }}">

                        <div class="card-body overflow-auto" style="max-height: 80vh;">

                            {{-- Nombre --}}
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                    id="nombre" name="nombre" value="{{ old('nombre', $supervisor->usuario->nombre) }}">
                                @error('nombre')
                                <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Apellido --}}
                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido:</label>
                                <input type="text" class="form-control @error('apellido') is-invalid @enderror"
                                    id="apellido" name="apellido"
                                    value="{{ old('apellido', $supervisor->usuario->apellido) }}">
                                @error('apellido')
                                <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Imagen --}}
                            <div class="mb-3">
                                <label for="imagen" class="form-label">Foto de Perfil:</label>
                                <input type="file" class="form-control @error('imagen') is-invalid @enderror"
                                    id="imagen" name="imagen">
                                @error('imagen')
                                <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Rut --}}
                            <div class="mb-3">
                                <label for="rut_supervisor" class="form-label">Rut:</label>
                                <input type="text" class="form-control @error('rut_supervisor') is-invalid @enderror"
                                    id="rut_supervisor" name="rut_supervisor"
                                    value="{{ old('rut_supervisor', $supervisor->rut_supervisor) }}">
                                @error('rut_supervisor')
                                <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Título --}}
                            <div class="mb-3">
                                <label for="titulo_supervisor" class="form-label">Título:</label>
                                <input type="text" class="form-control @error('titulo_supervisor') is-invalid @enderror"
                                    id="titulo_supervisor" name="titulo_supervisor"
                                    value="{{ old('titulo_supervisor', $supervisor->titulo_supervisor) }}">
                                @error('titulo_supervisor')
                                <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Cargo --}}
                            <div class="mb-3">
                                <label for="cargo_supervisor" class="form-label">Cargo:</label>
                                <input type="text" class="form-control @error('cargo_supervisor') is-invalid @enderror"
                                    id="cargo_supervisor" name="cargo_supervisor"
                                    value="{{ old('cargo_supervisor', $supervisor->cargo_supervisor) }}">
                                @error('cargo_supervisor')
                                <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Fono --}}
                            <div class="mb-3">
                                <label for="fono_supervisor" class="form-label">Fono:</label>
                                <input type="text" class="form-control @error('fono_supervisor') is-invalid @enderror"
                                    id="fono_supervisor" name="fono_supervisor"
                                    value="{{ old('fono_supervisor', $supervisor->fono_supervisor) }}">
                                @error('fono_supervisor')
                                <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            {{-- Botones --}}
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('supervisores.index') }}"
                                    class="btn btn-danger me-2"><strong>Cancelar</strong></a>
                                <button type="submit" class="btn btn-success"><strong>Guardar Cambios</strong></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection