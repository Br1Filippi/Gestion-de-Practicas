@extends('templates.master')

@section('contenido-principal')
<div class="col-9">
    <div class="container d-flex align-items-center justify-content-center">
        <div class="card custom-card shadow-sm" style="width: 70%; max-height: 90vh; overflow-y: auto;">
            <form method="POST" action="{{ route('jefes.update', $jefe->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-header bg-white">

                    {{-- Correo del usuario --}}
                    <div class="mb-3">
                        <input type="hidden" class="form-control @error('correo_usuario') is-invalid @enderror"
                            id="correo_usuario" name="correo_usuario" value="{{ old('correo_usuario', $jefe->usuario->correo_usuario) }}">
                    </div>

                    {{-- Contraseña --}}
                    <div class="mb-3">
                        <input type="hidden" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" value="{{$jefe->usuario->password}}">
                    </div>

                    {{-- Nombre --}}
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre"
                            name="nombre" value="{{ old('nombre', $jefe->usuario->nombre) }}">
                        @error('nombre')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Apellido --}}
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido:</label>
                        <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido"
                            name="apellido" value="{{ old('apellido', $jefe->usuario->apellido) }}">
                        @error('apellido')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Imagen --}}
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Foto de Perfil:</label>
                        <input type="file" class="form-control @error('imagen') is-invalid @enderror" id="imagen"
                            name="imagen">
                        @error('imagen')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Carrera --}}
                    <div class="mb-3">
                        <label for="carrera" class="form-label">Carrera:</label>
                        <select class="form-control @error('carrera') is-invalid @enderror" id="carrera" name="carrera">
                            <option value="{{$jefe->carrera->id}}">{{$jefe->carrera->nombre}}</option>
                            @foreach($carreras as $carrera)
                            <option value="{{ $carrera->id }}" {{ old('carrera', $jefe->carrera_id) == $carrera->id ? 'selected' : '' }}>
                                {{ $carrera->nombre }}
                            </option>
                            @endforeach
                        </select>
                        @error('carrera')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                        @enderror
                    </div>
                   
                </div>

                <div class="card-footer">
                    {{-- Botones --}}
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('usuarios.index') }}" class="btn btn-danger me-2"><strong>Cancelar</strong></a>
                        <button type="submit" class="btn btn-success"><strong>Actualizar</strong></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection