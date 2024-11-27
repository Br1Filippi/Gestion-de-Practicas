@extends('templates.master')

@section('contenido-principal')
<div class="col d-flex justify-content-start align-items-center">
    <a href="{{ route('usuarios.index') }}"
        class="btn text-white btn-warning d-flex justify-content-center align-items-center">
        <i class="material-icons text-white mx-1" style="font-size: 1em">arrow_back</i>
        <strong>Volver</strong>
    </a>
</div>
<div class="col-10">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card " style="width: 60%">
            <form action="{{ route('usuarios.create')}}" method="GET">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="rol">Seleccione el rol de la nueva cuenta:</label>
                        <select class="form-control @error('rol') is-invalid @enderror" id="rol" name="rol">
                            <option value="">Roles</option>
                            @foreach ($roles as $rol)
                            <option value="{{$rol->id}}">{{$rol->nombre}}</option>
                            @endforeach
                        </select>
                        @error('rol')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end align-items-end">
                    <a href="{{ url()->previous() }}"
                        class="btn text-white btn-danger d-flex justify-content-center align-items-center mx-2">
                        <i class="material-icons text-white">close</i>
                        <strong>Cancelar</strong>
                    </a>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success d-flex justify-content-center align-items-center">
                            <i class="material-icons">check</i>
                            <strong>Aceptar</strong>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection