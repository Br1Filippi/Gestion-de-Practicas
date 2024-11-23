@extends('templates.master')

@section('contenido-principal')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                <div class="card-body">
                    <form method="POST" action="{{ route('usuarios.storeEmpresa') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body bg-white overflow-auto" style="max-height: 70vh;">
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
                                <input type="hidden" class="form-control @error('apellido') is-invalid @enderror"
                                    id="apellido" name="apellido" value="Corp">
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
                                <label for="rut_empresa" class="form-label">Rut:</label>
                                <input type="text" class="form-control @error('rut_empresa') is-invalid @enderror"
                                    id="rut_empresa" name="rut_empresa" value="{{ old('rut_empresa') }}">
                                @error('rut_empresa')
                                <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Url Web --}}
                            <div class="mb-3">
                                <label for="url_web" class="form-label">Url Web:</label>
                                <input type="url" class="form-control @error('url_web') is-invalid @enderror"
                                    id="url_web" name="url_web" value="{{ old('url_web') }}">
                                @error('url_web')
                                <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Email Contacto --}}
                            <div class="mb-3">
                                <label for="email_contacto" class="form-label">Email de contacto:</label>
                                <input type="email" class="form-control @error('email_contacto') is-invalid @enderror"
                                    id="email_contacto" name="email_contacto" placeholder="Example@gmail.com"
                                    value=" {{ old('email_contacto') }}">
                                @error('email_contacto')
                                <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Direccion --}}
                            <div class="mb-3">
                                <label for="direccion_empresa" class="form-label">Direccion:</label>
                                <input type="text" class="form-control @error('direccion_empresa') is-invalid @enderror"
                                    id="direccion_empresa" name="direccion_empresa"
                                    value="{{ old('direccion_empresa') }}">
                                @error('direccion_empresa')
                                <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Razon Social --}}
                            <div class="mb-3">
                                <label for="razon_social" class="form-label">Razon Social:</label>
                                <input type="text" class="form-control @error('razon_social') is-invalid @enderror"
                                    id="razon_social" name="razon_social" value="{{ old('razon_social') }}">
                                @error('razon_social')
                                <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    {{-- Botones --}}
                    <div class="d-flex justify-content-end">
                        <a href="" class="btn btn-danger me-2"><strong>Cancelar</strong></a>
                        <button type="submit" class="btn btn-success"><strong>Crear Cuenta</strong></button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection