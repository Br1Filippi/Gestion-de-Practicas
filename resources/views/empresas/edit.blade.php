@extends('templates.master')

@section('contenido-principal')
<div class="col-9">
    <div class="container d-flex align-items-center justify-content-center">
        <div class="card custom-card shadow-sm" style="width: 70%;">
            <form method="POST" action="{{route('empresas.update',$empresa->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body bg-white overflow-auto" style="max-height: 90vh;">
                    {{-- Correo del usuario --}}
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="correo_usuario" name="correo_usuario"
                            value="{{$empresa->usuario->correo_usuario }}">
                    </div>

                    {{-- Contraseña --}}
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="password" name="password"
                            value="{{$empresa->usuario->password}}">
                    </div>

                    {{-- Nombre --}}
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre"
                            name="nombre" value="{{ old('nombre', $empresa->usuario->nombre) }}">
                        @error('nombre')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Apellido --}}
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido:</label>
                        <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido"
                            name="apellido" value="{{ old('apellido', $empresa->usuario->apellido) }}">
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

                    {{-- Rut --}}
                    <div class="mb-3">
                        <label for="rut_empresa" class="form-label">Rut:</label>
                        <input type="text" class="form-control @error('rut_empresa') is-invalid @enderror"
                            id="rut_empresa" name="rut_empresa" value="{{ old('rut_empresa', $empresa->rut_empresa) }}">
                        @error('rut_empresa')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Url Web --}}
                    <div class="mb-3">
                        <label for="url_web" class="form-label">Url Web:</label>
                        <input type="url" class="form-control @error('url_web') is-invalid @enderror" id="url_web"
                            name="url_web" value="{{ old('url_web', $empresa->url_web) }}">
                        @error('url_web')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Email Contacto --}}
                    <div class="mb-3">
                        <label for="email_contacto" class="form-label">Email de contacto:</label>
                        <input type="email" class="form-control @error('email_contacto') is-invalid @enderror"
                            id="email_contacto" name="email_contacto" placeholder="Example@gmail.com"
                            value=" {{ old('email_contacto', $empresa->email_contacto) }}">
                        @error('email_contacto')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Direccion --}}
                    <div class="mb-3">
                        <label for="direccion_empresa" class="form-label">Direccion:</label>
                        <input type="text" class="form-control @error('direccion_empresa') is-invalid @enderror"
                            id="direccion_empresa" name="direccion_empresa"
                            value="{{ old('direccion_empresa', $empresa->direccion) }}">
                        @error('direccion_empresa')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Razon Social --}}
                    <div class="mb-3">
                        <label for="razon_social" class="form-label">Razon Social:</label>
                        <input type="text" class="form-control @error('razon_social') is-invalid @enderror"
                            id="razon_social" name="razon_social"
                            value="{{ old('razon_social', $empresa->razon_social) }}">
                        @error('razon_social')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    {{-- Botones --}}
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('usuarios.perfil') }}"
                            class="btn btn-danger me-2"><strong>Cancelar</strong></a>
                        <button type="submit" class="btn btn-success"><strong>Actualizar</strong></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection