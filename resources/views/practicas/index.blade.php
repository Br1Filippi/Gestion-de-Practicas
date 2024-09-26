@extends('templates.master')

@section('contenido-principal')
<div class="container mt-4">
    
    {{-- Body --}}
    <div class="d-flex justify-content-center mt-3">
        <div class="row w-100 ps-3">
            <div class="col-10 ps-4" >
                {{-- Encabezado y Filtros --}}
                <div class="row mb-4 ">
                    <div class="col d-flex justify-content-between align-items-center">
                        
                        {{-- Solicitud manual (estudiantes) --}}
                        @if(Gate::allows('estudiante-gestion'))
                            <a href="" class="btn btn-secondary">
                                <i class="material-icons">add_circle</i>
                                Solicitud manual
                            </a>
                        @endif

                        {{-- Barra de búsqueda y filtros (jefes) --}}
                        @if(Gate::allows('jefe-gestion'))
                        <div class="col me-3">
                            <input type="text" name="termino" class="form-control" placeholder="Buscar por tus preferencias">
                        </div>

                        {{-- Busqueda --}}
                        <div class="col-1 ">
                            <button type="submit" class="btn btn-primary d-flex justify-content-center align-items-center">
                                <i class="material-icons">search</i><strong>Buscar</strong></button>
                        </div>
                        @endif
                    </div>
                </div>

                {{-- Filtros adicionales (solo jefes) --}}
                @if(Gate::allows('jefe-gestion'))
                <div class="row mb-4">
                    <div class="col-md-3">
                        <select name="comuna" class="form-select">
                            <option value="">Seleccione Comuna</option>
                            {{-- Opciones dinámicas --}}
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="region" class="form-select">
                            <option value="">Seleccione Región</option>
                            {{-- Opciones dinámicas --}}
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="tipo" class="form-select">
                            <option value="">Seleccione Tipo</option>
                            {{-- Opciones dinámicas --}}
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="estado" class="form-select">
                            <option value="">Seleccione Estado</option>
                            {{-- Opciones dinámicas --}}
                        </select>
                    </div>
                </div>
                @endif
                <div class="w-100 overflow-auto" style="max-height: 80vh;">

                    <div class="card mb-3 oferta-card shadow-sm ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h4 class="mb-1">
                                        <strong>Practica *Nombre de la Oferta*</strong>
                                        @if(Gate::allows('estudiante-gestion'))
                                            <span class="badge bg-danger">Reprobado</span> 
                                        @endif
                                    </h4>
                                    <p class="card-text mb-0"> Nombre de la empresa: </p>
                                    <p class="card-text mb-0"> Tipo de parctica:</p>
                                    <p class="card-text mb-0"> Fecha de Entrega:</p>
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-0"><i class="material-icons">event</i> Inicio: </p>
                                        <p class="mb-0"><i class="material-icons">event_busy</i> Término: </p>
                                    </div>
                                </div>
                                <div class="col-2 mt-5">
                                    @if(Gate::allows('estudiante-gestion'))
                                        <a href="" class="btn text-white btn-primary d-flex jusitfy-content-center aling-items-center">
                                            <i class="material-icons text-white">info</i>
                                            <strong>Detalles</strong>
                                        </a>
                                    @endif
                                    @if(Gate::allows('jefe-gestion'))
                                        <a href="" class="btn text-white btn-primary d-flex jusitfy-content-center aling-items-center">
                                            <i class="material-icons text-white">document_scanner</i>
                                            <strong>Revisar</strong>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3 oferta-card shadow-sm ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h4 class="mb-1">
                                        <strong>Practica *Nombre de la Oferta*</strong>
                                        @if(Gate::allows('estudiante-gestion'))
                                        <span class="badge bg-warning">En Curso</span> 
                                        @endif
                                    </h4>
                                    <p class="card-text mb-0"> Nombre de la empresa </p>
                                    <p class="card-text mb-0"> Tipo de parctica:</p>
                                    <p class="card-text mb-0"> Fecha de Entrega:</p>
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-0"><i class="material-icons">event</i> Inicio: </p>
                                        <p class="mb-0"><i class="material-icons">event_busy</i> Término: </p>
                                    </div>
                                </div>
                                <div class="col-2 mt-5">
                                    @if(Gate::allows('estudiante-gestion'))
                                        <a href="" class="btn text-white btn-primary d-flex jusitfy-content-center aling-items-center">
                                            <i class="material-icons text-white">info</i>
                                            <strong>Detalles</strong>
                                        </a>
                                    @endif
                                    @if(Gate::allows('jefe-gestion'))
                                        <a href="" class="btn text-white btn-primary d-flex jusitfy-content-center aling-items-center">
                                            <i class="material-icons text-white">document_scanner</i>
                                            <strong>Revisar</strong>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3 oferta-card shadow-sm ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h4 class="mb-1">
                                        <strong>Practica *Nombre de la Oferta*</strong>
                                        @if(Gate::allows('estudiante-gestion'))
                                        <span class="badge bg-success">Aprobado</span> 
                                        @endif
                                    </h4>
                                    <p class="card-text mb-0"> Nombre de la empresa </p>
                                    <p class="card-text mb-0"> Tipo de parctica:</p>
                                    <p class="card-text mb-0"> Fecha de Entrega:</p>
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-0"><i class="material-icons">event</i> Inicio: </p>
                                        <p class="mb-0"><i class="material-icons">event_busy</i> Término: </p>
                                    </div>
                                </div>
                                <div class="col-2 mt-5">
                                    @if(Gate::allows('estudiante-gestion'))
                                        <a href="" class="btn text-white btn-primary d-flex jusitfy-content-center aling-items-center">
                                            <i class="material-icons text-white">info</i>
                                            <strong>Detalles</strong>
                                        </a>
                                    @endif
                                    @if(Gate::allows('jefe-gestion'))
                                        <a href="" class="btn text-white btn-primary d-flex jusitfy-content-center aling-items-center">
                                            <i class="material-icons text-white">document_scanner</i>
                                            <strong>Revisar</strong>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
