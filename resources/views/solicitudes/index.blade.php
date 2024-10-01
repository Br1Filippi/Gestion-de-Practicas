@extends('templates.master')

@section('contenido-principal')
<div class="container mt-4 " >

    <div class="col-10 me-5">
        
        {{-- Encabezado y Filtros --}}
        <div class="row mb-4 ">
            <div class="col d-flex justify-content-between align-items-center">
                
                {{-- Solicitud manual (estudiantes) --}}
                @if(Gate::allows('estudiante-gestion'))
                    <a href="{{asset('images/InscripcionManual.pdf')}}" download="{{ 'InscripcionManual.pdf' }}" class="btn btn-secondary">
                        <i class="material-icons">add_circle</i>
                        Solicitud manual
                    </a>
                @endif

                {{-- Barra de búsqueda y filtros (jefes) --}}
                @if(Gate::allows('jefe-gestion') or Gate::allows('secretaria-gestion'))
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
                    <option value="">Filtro 2 </option>
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

        {{-- Listado de Solicitudes --}}
        <div class="row row-cols-1 row-cols-md-2 g-4 overflow-auto" style="max-height: 80vh;">

            <div class="col">
                <div class="card h-100 shadow-sm ">
                    <div class="card-body d-flex flex-column justify-content-between">

                        {{-- Título y Estado de Solicitud --}}
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title d-flex ">
                                    <strong>Solicitud 1-Nombre de la oferta</strong>
                                </h5>
                            </div>
                            <div class="col-2 me-2">
                                @if(Gate::allows('estudiante-gestion'))
                                <span class="badge bg-danger">Rechazada</span>
                                @endif
                            </div>
                        </div>

                        {{-- Información de la Empresa y Fechas --}}
                        <div class="d-flex justify-content-between">
                            <p class="mb-0"><i class="material-icons">event</i> Inicio: </p>
                            <p class="mb-0"><i class="material-icons">event_busy</i> Término: </p>
                        </div>
                        <p class="mb-1">Nombre Empresa</p>
                        <p class="mb-1">Razon Social</p>

                        {{-- Botón de Detalles --}}
                        <div class="d-flex justify-content-end mt-3">
                            @if(Gate::allows('estudiante-gestion'))
                                <a href="{{route('solicitudes.detalles')}}" class="btn text-white btn-primary d-flex jusitfy-content-center aling-items-center">
                                    <i class="material-icons text-white">info</i>
                                    <strong>Detalles</strong>
                                </a>
                            @endif
                            @if(Gate::allows('jefe-gestion') or Gate::allows('secretaria-gestion'))
                                <a href="{{route('solicitudes.detalles')}}" class="btn text-white btn-primary d-flex jusitfy-content-center aling-items-center">
                                    <i class="material-icons text-white">document_scanner</i>
                                    <strong>Revisar</strong>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 shadow-sm ">
                    <div class="card-body d-flex flex-column justify-content-between">

                        {{-- Título y Estado de Solicitud --}}
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title d-flex ">
                                    <strong>Solicitud 2-Nombre de la oferta</strong>
                                </h5>
                            </div>
                            <div class="col-2 me-2">
                                @if(Gate::allows('estudiante-gestion'))
                                <span class="badge bg-warning">En Revision</span>
                                @endif
                            </div>
                        </div>

                        {{-- Información de la Empresa y Fechas --}}
                        <div class="d-flex justify-content-between">
                            <p class="mb-0"><i class="material-icons">event</i> Inicio: </p>
                            <p class="mb-0"><i class="material-icons">event_busy</i> Término: </p>
                        </div>
                        <p class="mb-1">Nombre Empresa</p>
                        <p class="mb-1">Razon Social</p>

                        {{-- Botón de Detalles --}}
                        <div class="d-flex justify-content-end mt-3">
                            @if(Gate::allows('estudiante-gestion'))
                                <a href="{{route('solicitudes.detalles')}}" class="btn text-white btn-primary d-flex jusitfy-content-center aling-items-center">
                                    <i class="material-icons text-white">info</i>
                                    <strong>Detalles</strong>
                                </a>
                            @endif
                            @if(Gate::allows('jefe-gestion') or Gate::allows('secretaria-gestion'))
                                <a href="{{route('solicitudes.detalles')}}" class="btn text-white btn-primary d-flex jusitfy-content-center aling-items-center">
                                    <i class="material-icons text-white">document_scanner</i>
                                    <strong>Revisar</strong>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 shadow-sm ">
                    <div class="card-body d-flex flex-column justify-content-between">

                        {{-- Título y Estado de Solicitud --}}
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title d-flex ">
                                    <strong>Solicitud 2-Nombre de la oferta</strong>
                                </h5>
                            </div>
                            <div class="col-2 me-2">
                                @if(Gate::allows('estudiante-gestion'))
                                <span class="badge bg-success">Aceptada</span>
                                @endif
                            </div>
                        </div>

                        {{-- Información de la Empresa y Fechas --}}
                        <div class="d-flex justify-content-between">
                            <p class="mb-0"><i class="material-icons">event</i> Inicio: </p>
                            <p class="mb-0"><i class="material-icons">event_busy</i> Término: </p>
                        </div>
                        <p class="mb-1">Nombre Empresa</p>
                        <p class="mb-1">Razon Social</p>

                        {{-- Botón de Detalles --}}
                        <div class="d-flex justify-content-end mt-3">
                            @if(Gate::allows('estudiante-gestion'))
                                <a href="{{route('solicitudes.detalles')}}" class="btn text-white btn-primary d-flex jusitfy-content-center aling-items-center">
                                    <i class="material-icons text-white">info</i>
                                    <strong>Detalles</strong>
                                </a>
                            @endif
                            @if(Gate::allows('jefe-gestion') or Gate::allows('secretaria-gestion'))
                                <a href="{{route('solicitudes.detalles')}}" class="btn text-white btn-primary d-flex jusitfy-content-center aling-items-center">
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
@endsection
