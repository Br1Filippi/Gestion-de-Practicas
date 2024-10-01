@extends('templates.master')

@section('contenido-principal')

    <div class="col-10 ">
        <div class="col-1 d-flex justify-content-center align-items-center mb-2 ms-3">
            <a href="{{route('solicitudes.index')}}" class="btn text-white btn-warning d-flex justify-content-center align-items-center">
                <i class="material-icons text-white mx-1">arrow_back</i>
                <strong>Volver</strong>
            </a>
        </div>
        <div class="container vh-95 d-flex justify-content-center align-items-center ">
            <div class="card custom-card shadow-sm" style="width: 70%;">
                <div class="card-header bg-white shadow-sm">
                    <div class="row">
                        <H1>Datos de la Oferta</H1>
                        <p>url_web</p>
                        <p>Ubicacion</p>
                        <p>Carrera de la oferta</p>
                        <p>Tipo y ubicacion</p>
                    </div>
                </div>
                <div class="card-body overflow-auto" style="max-height: 59vh;">
                    <h4>Datos de la solicitud</h4>
                    <p>Fecha de inicio y de termino</p>
                    <H4>Datos de la Empresa</H4>
                    <p>Nombre de la empresa</p>
                    <P>rut y correo del usuario</P>
                    <p>direccion y email de contacto</p>
                    <h4>Supervisor</h4>
                    <p>Nombre y apellido del supervisor</p>
                    <p>titulo y cargo</p>
                    <p>Fono del supervisor</p>
                    @if(Gate::allows('jefe-gestion') or Gate::allows('secretaria-gestion'))
                        <H4>Datos del Estudiante</H4>
                        <p>Nombre y apellido</p>
                        <p>rut y edad</p>
                        <p>Fono y direccion </p>
                        <p>Carrera</p>
                    @endif
                </div>
                @if (Gate::allows('jefe-gestion') or Gate::allows('secretaria-gestion'))
                <div class="card-footer d-flex justify-content-end align-items-end">
                    {{-- Botones --}}
                        <a href="" class="btn text-white btn-danger mx-2 d-flex justify-content-center align-items-center">
                            <i class="material-icons text-white mx-1" style="font-size: 1em">cancel</i>
                            <strong>Rechazar</strong>
                        </a>
                        <a href="" class="btn text-white btn-success mx-2 d-flex justify-content-center align-items-center">
                            <i class="material-icons text-white mx-1" style="font-size: 1em">check</i>
                            <strong>Aceptar</strong>
                        </a>
                </div>
                @endif
            </div>
        </div>
    </div>

@endsection
