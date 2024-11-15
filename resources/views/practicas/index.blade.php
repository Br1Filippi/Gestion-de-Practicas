@extends('templates.master')

@section('contenido-principal')
<div class="container mt-4">

    {{-- Body --}}
    <div class="d-flex justify-content-center mt-3">
        <div class="row w-100 ps-3">
            <div class="col-10 ps-4">
                {{-- Encabezado y Filtros --}}
                <div class="row mb-4 ">
                    <div class="col d-flex justify-content-between align-items-center">


                        {{-- Barra de búsqueda y filtros (jefes) --}}
                        @if(Gate::allows('jefe-gestion') or Gate::allows('secretaria-gestion'))
                        <div class="col me-3">
                            <input type="text" name="termino" class="form-control"
                                placeholder="Buscar por tus preferencias">
                        </div>

                        {{-- Busqueda --}}
                        <div class="col-1 ">
                            <button type="submit"
                                class="btn btn-primary d-flex justify-content-center align-items-center">
                                <i class="material-icons">search</i><strong>Buscar</strong></button>
                        </div>
                        @endif
                    </div>
                </div>

                {{-- Filtros adicionales (solo jefes) --}}
                @if(Gate::allows('jefe-gestion') or Gate::allows('secretaria-gestion'))
                <div class="row mb-4">
                    <div class="col-md-3">
                        <select name="comuna" class="form-select">
                            <option value="">Filtro 1</option>
                            {{-- Opciones dinámicas --}}
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="region" class="form-select">
                            <option value="">Filtro 2</option>
                            {{-- Opciones dinámicas --}}
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="tipo" class="form-select">
                            <option value="">Filtro 3</option>
                            {{-- Opciones dinámicas --}}
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="estado" class="form-select">
                            <option value="">Filtro 4</option>
                            {{-- Opciones dinámicas --}}
                        </select>
                    </div>
                </div>
                @endif
                @if ($practicas->isEmpty())
                <div class="alert alert-warning  ms-4">
                    No se encontraron practicas.
                </div>
                @else
                <div class="w-100 overflow-auto" style="max-height: 80vh;">
                    @foreach($practicas as $practica)
                    <div class="card mb-3 oferta-card shadow-sm ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h4 class="mb-1">
                                        <strong>{{$practica->estudiante->usuario->nombre}}
                                            {{$practica->estudiante->usuario->apellido}}</strong>
                                        @if(Gate::allows('estudiante-gestion'))
                                        @if($practica->id_estado == 2)
                                        <span class="badge bg-success">
                                            <strong>{{ $practica->estado->nombre_estado }}</strong>
                                        </span>
                                        @elseif($practica->id_estado == 3)
                                        <span class="badge bg-danger">
                                            <strong>{{ $practica->estado->nombre_estado }}</strong>
                                        </span>
                                        @elseif($practica->id_estado == 1)
                                        <span class="badge bg-warning">
                                            <strong>{{ $practica->estado->nombre_estado }}</strong>
                                        </span>
                                        @endif
                                        @endif
                                    </h4>
                                    <p class="card-text mb-0"> Rut: {{$practica->estudiante->rut_estudiante}}</p>
                                    <p class="card-text mb-0"> Nombre de la empresa:
                                        {{$practica->empresa->usuario->nombre}}</p>
                                    <p class="card-text mb-0"> Tipo de parctica: {{$practica->tipo->nombre}}</p>
                                    <p class="card-text mb-0"> Fecha de Entrega: {{$practica->fecha_informes}}</p>
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-0"><i class="material-icons">event</i> Inicio:
                                            {{$practica->fecha_inicio}}</p>
                                        <p class="mb-0"><i class="material-icons">event_busy</i> Término:
                                            {{$practica->fecha_termino}}</p>
                                    </div>
                                </div>
                                <div class="col-2 mt-5">
                                    @if(Gate::allows('estudiante-gestion'))
                                    <a href="{{route('practicas.detalles',$practica->id)}}"
                                        class="btn text-white btn-primary d-flex jusitfy-content-center aling-items-center">
                                        <i class="material-icons text-white">info</i>
                                        <strong>Detalles</strong>
                                    </a>
                                    @endif
                                    @if(Gate::allows('jefe-gestion') or Gate::allows('secretaria-gestion'))
                                    <a href="{{route('practicas.detalles',$practica->id)}}"
                                        class="btn text-white btn-primary d-flex jusitfy-content-center aling-items-center">
                                        <i class="material-icons text-white">document_scanner</i>
                                        <strong>Revisar</strong>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection