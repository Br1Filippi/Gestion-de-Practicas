@extends('templates.master')

@section('contenido-principal')
<div class="col-9">
    <div class="card mx-auto" style="max-width: 500px;">
        <form action="{{route('usuarios.updateContra',$usuario->correo_usuario)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="current_password">Contraseña Actual</label>
                    <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                        id="current_password" name="current_password">
                    @error('current_password')
                    <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="new_password">Nueva Contraseña</label>
                    <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                        id="new_password" name="new_password">
                    @error('new_password')
                    <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="new_password_confirmation">Confirmar Nueva Contraseña</label>
                    <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror"
                        id="new_password_confirmation" name="new_password_confirmation">
                    @error('new_password_confirmation')
                    <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                    @enderror
                </div>
                {{-- Mostrar errores generales --}}
                @if ($errors->any())
                <div class="alert alert-danger mt-2">
                    {{$errors->first()}}
                </div>
                @endif
            </div>
            <div class="card-footer">
                {{-- Botones --}}
                <div class="d-flex justify-content-end">
                    <a href="{{ route('usuarios.perfil') }}" class="btn btn-danger me-2"><strong>Cancelar</strong></a>
                    <button type="submit" class="btn btn-success"><strong>Cambiar Contraseña</strong></button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection