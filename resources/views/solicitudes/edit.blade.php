@extends('templates.master')

@section('contenido-principal')
<div class="col-10">
    <div class="d-flex justify-content-center align-items-center vh-95">
        <div class="card text-center" style="width: 50%;">
            <form method="POST" action="{{ route('solicitudes.update', $solicitud->id) }}">
                @csrf
                @method('PUT')
                <div class="card-body bg-white shadow-sm mt-2 pb-3">

                    {{-- Fecha de Inicio --}}
                    <h5 class="d-flex"><strong>Fecha de Inicio:</strong></h5>
                    <input 
                        type="date" 
                        name="fecha_inicio" 
                        class="form-control @error('fecha_inicio') is-invalid @enderror" 
                        value="{{ old('fecha_inicio', $solicitud->fecha_inicio) }}"
                    >
                    @error('fecha_inicio')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                    @enderror

                    {{-- Fecha de Término --}}
                    
                    <h5 class="d-flex mt-3"><strong>Fecha de Término:</strong></h5>
                    <input 
                        type="date" 
                        name="fecha_termino" 
                        class="form-control @error('fecha_termino') is-invalid @enderror" 
                        value="{{ old('fecha_termino', $solicitud->fecha_termino) }}"
                    >
                    @error('fecha_termino')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                    @enderror

                    {{-- Estado --}}
                    <h5 class="d-flex mt-3"><strong>Estado:</strong></h5>

                      <select name="estado" class="form-select @error('estado') is-invalid @enderror">

                        <option value="{{ $solicitud->estado->id }}">{{ $solicitud->estado->nombre_estado }}</option>

                         @foreach($estados as $estado)

                          <option value="{{ $estado->id }}" {{ old('estado', $solicitud->estado_id) == $estado->id ? 'selected' : '' }}>

                               {{ $estado->nombre_estado }}

                            </option>

                             @endforeach

                          </select>

                           @error('estado')
                                <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                           @enderror

                  

                    {{-- Supervisor --}}
                    <h5 class="d-flex mt-3"><strong>Supervisor:</strong></h5>
                    <select name="supervisor" class="form-select @error('supervisor') is-invalid @enderror">
                        <option value="{{$solicitud->supervisor->id}}">{{ $solicitud->supervisor->usuario->nombre }} {{ $solicitud->supervisor->usuario->apellido }} / {{ $solicitud->supervisor->empresa->usuario->nombre }}</option>
                        @foreach($supervisores as $supervisor)
                        <option value="{{ $supervisor->id }}" {{ old('supervisor', $solicitud->supervisor_id) == $supervisor->id ? 'selected' : '' }}>
                            {{ $supervisor->usuario->nombre }} {{ $supervisor->usuario->apellido }} / {{ $supervisor->empresa->usuario->nombre }}
                        </option>
                        @endforeach
                    </select>
                    @error('supervisor')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                    @enderror

                    {{-- Oferta --}}
                    <h5 class="d-flex mt-3"><strong>Oferta:</strong></h5>
                    <select name="oferta" class="form-select @error('oferta') is-invalid @enderror">
                        <option value="{{$solicitud->oferta->id}}">{{$solicitud->oferta->titulo}} / <strong> {{$solicitud->oferta->empresa->usuario->nombre}}</strong></option>
                        @foreach($ofertas as $oferta)
                        <option value="{{ $oferta->id }}" {{ old('oferta', $solicitud->oferta_id) == $oferta->id ? 'selected' : '' }}>
                            {{ $oferta->titulo }} / <strong> {{$oferta->empresa->usuario->nombre}}</strong>
                        </option>
                        @endforeach
                    </select>
                    @error('oferta')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                    @enderror

                    {{-- Estudiante --}}
                    <h5 class="d-flex mt-3"><strong>Estudiante:</strong></h5>
                    <select name="estudiante" class="form-select @error('estudiante') is-invalid @enderror">
                        <option value="{{$solicitud->estudiante->id}}">{{$solicitud->estudiante->usuario->nombre}} {{$solicitud->estudiante->usuario->apellido}}</option>
                        @foreach($estudiantes as $estudiante)
                        <option value="{{ $estudiante->id }}" {{ old('estudiante', $solicitud->estudiante_id) == $estudiante->id ? 'selected' : '' }}>
                            {{ $estudiante->usuario->nombre }} {{ $estudiante->usuario->apellido }}
                        </option>
                        @endforeach
                    </select>
                    @error('estudiante')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                    @enderror

                </div>
                {{-- Botones --}}
                <div class="card-footer text-muted d-flex justify-content-end align-items-center px-0 mx-0 mt-3">
                    <div class="col-md-2">
                        <a href="{{ route('solicitudes.index2') }}" class="btn btn-danger d-flex justify-content-center align-items-center">
                            <i class="material-icons">close</i>
                            <strong>Cancelar</strong>
                        </a>
                    </div>
                    <div class="col-md-2 me-3 ms-2">
                        <button type="submit" class="btn btn-success d-flex justify-content-center align-items-center">
                            <i class="material-icons">save</i>
                            <strong>Actualizar</strong>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection