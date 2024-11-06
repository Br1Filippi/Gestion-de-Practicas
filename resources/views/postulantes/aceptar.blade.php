@extends('templates.master')

@section('contenido-principal')
<div class="col d-flex justify-content-start align-items-center">
    <a href="{{ url()->previous() }}"
        class="btn text-white btn-warning d-flex justify-content-center align-items-center">
        <i class="material-icons text-white mx-1" style="font-size: 1em">arrow_back</i>
        <strong>Volver</strong>
    </a>
</div>
<div class="col-10">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card " style="width: 60%">
            <form action="{{route('solicitudes.store',$postulante->id)}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group ">
                        <label for="fecha_inicio">Fecha de Inicio</label>
                        <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="fecha_termino">Fecha de Término</label>
                        <input type="date" class="form-control" id="fecha_termino" name="fecha_termino" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="supervisor">Supervisor a cargo del estudiante:</label>
                        <select class="form-control" id="supervisor" name="supervisor">
                            @foreach($supervisores as $supervisor)
                            <option value="{{ $supervisor->id }}">{{$supervisor->rut_supervisor}} {{
                                $supervisor->usuario->nombre }} {{ $supervisor->usuario->apellido }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="card-footer d-flex justify-content-end aling-items-end">
                    {{-- Botones --}}
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