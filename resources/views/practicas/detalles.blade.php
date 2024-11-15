@extends('templates.master')

@section('contenido-principal')

<div class="col-10">
    <div class="col-1 d-flex justify-content-center align-items-center mb-2 ms-3">
        <a href="{{route('practicas.index')}}"
            class="btn text-white btn-warning d-flex justify-content-center align-items-center">
            <i class="material-icons text-white mx-1">arrow_back</i>
            <strong>Volver</strong>
        </a>
    </div>
    <div class="container vh-95 d-flex justify-content-center align-items-center">
        <div class="card custom-card shadow-sm" style="width: 70%;">
            <div class="card-header shadow-sm">
                <div class="row">
                    <div class="col-9">
                        <h1 class="col-12"><strong>Datos de la Oferta</strong></h1>
                        <a class="col-12 mt-1" href="{{$practica->empresa->url_web}}">
                            <i class="material-icons" style="font-size: 1em">language</i>
                            {{$practica->empresa->url_web}}
                        </a>
                        <p class="col-12 mt-0 mb-0">
                            <i class="material-icons" style="font-size: 1em">location_on</i>
                            {{$practica->oferta->region->nombre}} / {{$practica->oferta->comuna->nombre}}
                        </p>
                        <p class="col-12 mb-0">
                            <i class="material-icons" style="font-size: 1em">school</i> {{$practica->carrera->nombre}}
                        </p>
                        <p class="col-12">
                            <i class="material-icons" style="font-size: 1em">work</i> Tipo de Practica:
                            {{$practica->oferta->tipo->nombre}}
                        </p>
                        @if(Gate::allows('estudiante-gestion'))
                        <div class="col-4">
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
                        </div>
                        @endif
                    </div>
                    <div class="col-3 d-flex justify-content-center aling-items-center">
                        @if(Gate::allows('jefe-gestion') or Gate::allows('secretaria-gestion'))
                        <div class="row">
                            <div class="col mt-4 mb-0 pb-0">
                                {{-- Botones para ver informe y evaluación --}}
                                <a href="{{route('evaluaciones.verInforme', $practica->id)}}"
                                    class="  btn text-white btn-primary mx-2 d-flex justify-content-center align-items-center ">
                                    <i class="material-icons text-white mx-1" style="font-size: 1em">description</i>
                                    <strong>Ver Informe</strong>
                                </a>
                            </div>
                            <div class="col mt-0">
                                <a href="{{route('evaluaciones.verDesempeño', $practica->id)}}"
                                    class="  btn text-white btn-warning mx-2 d-flex justify-content-center align-items-center">
                                    <i class="material-icons text-white mx-1" style="font-size: 1em">assessment</i>
                                    <strong>Ver Evaluación</strong>
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body overflow-auto" style="max-height: 59vh;">
                <h4><strong>Datos de la Practica</strong></h4>
                <p>
                    <i class="material-icons" style="font-size: 1em">date_range</i> Fecha de Inicio:
                    {{$practica->fecha_inicio}} <i class="material-icons" style="font-size: 1em">date_range</i>Fecha De
                    Termino: {{$practica->fecha_termino}}
                </p>
                <h4><strong>Datos de la Empresa</strong></h4>
                <p>
                    <i class="material-icons" style="font-size: 1em">business</i>
                    {{$practica->empresa->usuario->nombre}}
                </p>
                <p>
                    <i class="material-icons" style="font-size: 1em">badge</i> {{$practica->empresa->rut_empresa}}
                </p>
                <p>
                    <i class="material-icons" style="font-size: 1em">email</i> {{$practica->empresa->email_contacto}}
                </p>
                <h4><strong>Supervisor</strong></h4>
                <p>
                    <i class="material-icons" style="font-size: 1em">person</i>
                    {{$practica->supervisor->usuario->nombre}} {{$practica->supervisor->usuario->apellido}}
                </p>
                <p>
                    <i class="material-icons" style="font-size: 1em">school</i>
                    {{$practica->supervisor->titulo_supervisor}} / <i class="material-icons"
                        style="font-size: 1em">work</i>{{$practica->supervisor->cargo_supervisor}}
                </p>
                <p>
                    <i class="material-icons" style="font-size: 1em">phone</i>
                    {{$practica->supervisor->fono_supervisor}}
                </p>
                @if(Gate::allows('jefe-gestion') or Gate::allows('secretaria-gestion'))
                <h4><strong>Datos del Estudiante</strong></h4>
                <p>
                    <i class="material-icons" style="font-size: 1em">person</i>
                    {{$practica->estudiante->usuario->nombre}} {{$practica->estudiante->usuario->apellido}}
                </p>
                <p>
                    <i class="material-icons" style="font-size: 1em">badge</i>
                    {{$practica->estudiante->rut_estudiante}} / {{$practica->estudiante->edad_estudiante}} años
                </p>
                <p>
                    <i class="material-icons" style="font-size: 1em">phone</i>
                    {{$practica->estudiante->fono_estudiante}} / <i class="material-icons"
                        style="font-size: 1em">home</i> {{$practica->estudiante->direccion_estudiante}}
                </p>
                <p>
                    <i class="material-icons" style="font-size: 1em">school</i>
                    {{$practica->estudiante->carrera->nombre}}
                </p>
                @endif
            </div>
            @if (Gate::allows('jefe-gestion') or Gate::allows('secretaria-gestion'))
            <div class="card-footer d-flex justify-content-end align-items-end">
                {{-- Botones de Aceptar y Rechazar --}}
                <form action="{{route('practicas.rechazar',$practica->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit"
                        class="btn text-white btn-danger mx-2 d-flex justify-content-center align-items-center">
                        <i class="material-icons text-white mx-1" style="font-size: 1em">cancel</i>
                        <strong>Rechazar</strong>
                    </button>
                </form>

                @if(Gate::allows('jefe-gestion') or Gate::allows('secretaria-gestion'))
                <form action="{{route('practicas.passar',$practica->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit"
                        class="btn text-white btn-success mx-2 d-flex justify-content-center align-items-center">
                        <i class="material-icons text-white mx-1" style="font-size: 1em">check</i>
                        <strong>Aceptar</strong>
                    </button>
                </form>
                @endif

            </div>
            @endif
        </div>
    </div>
</div>

@endsection