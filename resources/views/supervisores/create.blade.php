@extends('templates.master')

@section('contenido-principal')
<div class="col-10">
    <div class="col d-flex justify-content-start align-items-center">
        <a href="{{route('supervisores.index')}}"
            class="btn text-white btn-warning d-flex justify-content-center align-items-center">
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
                        <div class="card-body overflow-auto" style="max-height: 80vh;">

                            {{-- Correo del usuario --}}
                            <div class="mb-3">
                                <label for="correo_usuario" class="form-label">Correo:</label>
                                <input type="email" class="form-control @error('correo_usuario') is-invalid @enderror"
                                    id="correo_usuario" name="correo_usuario" placeholder="dago@gmail.com"
                                    value="{{ old('correo_usuario') }}">
                                @error('correo_usuario')
                                <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Contraseña --}}
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña:</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password">
                                @error('password')
                                <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Nombre --}}
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                    id="nombre" name="nombre" value="{{ old('nombre') }}">
                                @error('nombre')
                                <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Apellido --}}
                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido:</label>
                                <input type="text" class="form-control @error('apellido') is-invalid @enderror"
                                    id="apellido" name="apellido" value="{{ old('apellido') }}">
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

                            @if(Gate::allows('admin-gestion'))
                            {{-- Empresa --}}
                            <div class="mb-3">
                                <label for="empresa" class="form-label">Empresa:</label>
                                <select class="form-control @error('empresa_id') is-invalid @enderror" id="empresa"
                                    name="empresa">
                                    <option value="">Seleccione una empresa</option>
                                    @foreach($empresas as $empresa)
                                    <option value="{{ $empresa->id }}" {{ old('empresa')==$empresa->id ? 'selected' : ''
                                        }}>
                                        {{ $empresa->usuario->nombre }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('empresa')
                                <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                                @enderror
                            </div>
                            @endif

                            {{-- Rut --}}
                            <div class="mb-3">
                                <label for="rut_supervisor" class="form-label">Rut:</label>
                                <input type="text" class="form-control @error('rut_supervisor') is-invalid @enderror"
                                    id="rut_supervisor" name="rut_supervisor" value="{{ old('rut_supervisor') }}">
                                @error('rut_supervisor')
                                <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Título --}}
                            <div class="mb-3">
                                <label for="titulo_supervisor" class="form-label">Título:</label>
                                <input type="text" class="form-control @error('titulo_supervisor') is-invalid @enderror"
                                    id="titulo_supervisor" name="titulo_supervisor"
                                    value="{{ old('titulo_supervisor') }}">
                                @error('titulo_supervisor')
                                <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Cargo --}}
                            <div class="mb-3">
                                <label for="cargo_supervisor" class="form-label">Cargo:</label>
                                <input type="text" class="form-control @error('cargo_supervisor') is-invalid @enderror"
                                    id="cargo_supervisor" name="cargo_supervisor" value="{{ old('cargo_supervisor') }}">
                                @error('cargo_supervisor')
                                <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Fono --}}
                            <div class="mb-3">
                                <label for="fono_supervisor" class="form-label">Fono:</label>
                                <input type="text" class="form-control @error('fono_supervisor') is-invalid @enderror"
                                    id="fono_supervisor" name="fono_supervisor" value="{{ old('fono_supervisor') }}">
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
                                <button type="submit" class="btn btn-success"><strong>Crear Supervisor</strong></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection