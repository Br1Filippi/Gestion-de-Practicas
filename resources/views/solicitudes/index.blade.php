@extends('templates.master')

@section('contenido-principal')
<div class="container mt-4 ">

    <div class="col-10 me-5">

        {{-- Encabezado y Filtros --}}
        <div class="row mb-4 ">
            <div class="col d-flex justify-content-between align-items-center">

                {{-- Solicitud manual (estudiantes) --}}
                @if(Gate::allows('estudiante-gestion'))
                <a href="{{asset('images/InscripcionManual.pdf')}}" download="{{ 'InscripcionManual.pdf' }}"
                    class="btn btn-secondary">
                    <i class="material-icons">add_circle</i>
                    Solicitud manual
                </a>
                @endif

                {{-- Barra de búsqueda y filtros (jefes) --}}
                @if(Gate::allows('jefe-gestion') or Gate::allows('secretaria-gestion'))
                <form class="d-flex w-100" action="{{ route('solicitudes.index') }}" method="GET">
                    <div class="col me-3">
                        <input type="text" name="termino" class="form-control"
                            placeholder="Buscar por tus preferencias">
                    </div>

                    {{-- Filtros adicionales (solo jefes) --}}
                    @if(Gate::allows('jefe-gestion') or Gate::allows('secretaria-gestion'))
                    <div class="col-2 me-2">
                        <select name="tipo" class="form-select">
                            <option value="">Tipo</option>
                            @foreach ($tipos as $tipo)
                            <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if(Gate::allows('secretaria-gestion'))
                    <div class="col-2 me-2">
                        <select name="carrera" class="form-select">
                            <option value="">Carrera</option>
                            @foreach ($carreras as $carrera)
                            <option value="{{$carrera->id}}">{{$carrera->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                    @endif

                    {{-- Busqueda --}}
                    <div class="col-1 ">
                        <button type="submit" class="btn btn-primary d-flex justify-content-center align-items-center">
                            <i class="material-icons">search</i><strong>Buscar</strong></button>
                    </div>
                    @endif
                </form>

            </div>
        </div>

        {{-- Listado de Solicitudes --}}
        @if ($solicitudes->isEmpty())
        <div class="alert alert-warning  ms-4">
            No se encontraron solicitudes.
        </div>
        @else
        <div class="row row-cols-1 row-cols-md-2 g-4 overflow-auto" style="max-height: 80vh;">
            @foreach($solicitudes as $solicitud)
            <div class="col">
                <div class="card h-100 shadow-sm ">
                    <div class="card-body d-flex flex-column justify-content-between">

                        {{-- Título y Estado de Solicitud --}}
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title d-flex ">
                                    @if(Gate::allows('jefe-gestion') or (Gate::allows('secretaria-gestion')))
                                    <strong>{{ $solicitud->estudiante->usuario->nombre }} {{
                                        $solicitud->estudiante->usuario->apellido }}</strong>
                                    @endif
                                    @if(Gate::allows('estudiante-gestion'))
                                    <strong>{{ $solicitud->oferta->titulo}}</strong>
                                    @endif
                                </h5>
                            </div>
                            <div class="col-3 me-2">

                                @if(Gate::allows('estudiante-gestion'))
                                @if($solicitud->id_estado == 2)
                                <span class="badge bg-success">
                                    <strong>{{ $solicitud->estado->nombre_estado }}</strong>
                                </span>
                                @elseif($solicitud->id_estado == 3)
                                <span class="badge bg-danger">
                                    <strong>{{ $solicitud->estado->nombre_estado }}</strong>
                                </span>
                                @elseif($solicitud->id_estado == 1)
                                <span class="badge bg-warning">
                                    <strong>{{ $solicitud->estado->nombre_estado }}</strong>
                                </span>
                                @endif
                                @endif
                            </div>
                        </div>

                        @if(Gate::allows('jefe-gestion') or (Gate::allows('secretaria-gestion')))
                        <p class="mt-0 mb-0">{{$solicitud->estudiante->rut_estudiante}}</p>

                        @endif
                        @if(Gate::allows('secretaria-gestion'))
                        <p class="mt-0 mb-0">{{$solicitud->estudiante->carrera->nombre}}</p>
                        @endif

                        <p class="mb-1"><Strong> Empresa: </Strong>{{ $solicitud->empresa->usuario->nombre }}</p>
                        <p class="mb-1"><strong>Tipo De Practica: </strong>{{ $solicitud->tipo->nombre }}</p>
                        <div class="d-flex justify-content-between">
                            <p class="mb-0"><i class="material-icons">event</i><strong> Inicio: </strong>{{
                                $solicitud->fecha_inicio }}
                            </p>
                            <p class="mb-0"><i class="material-icons">event_busy</i><strong> Término: </strong>{{
                                $solicitud->fecha_termino }}</p>
                        </div>


                        {{-- Botón de Detalles --}}
                        <div class="d-flex justify-content-end mt-3">
                            @if(Gate::allows('estudiante-gestion'))
                            <a href="{{route('solicitudes.detalles',$solicitud->id)}}"
                                class="btn text-white btn-primary d-flex jusitfy-content-center aling-items-center">
                                <i class="material-icons text-white">info</i>
                                <strong>Detalles</strong>
                            </a>
                            @endif
                            @if(Gate::allows('jefe-gestion') or Gate::allows('secretaria-gestion'))
                            <a href="{{route('solicitudes.detalles',$solicitud->id)}}"
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
@endsection