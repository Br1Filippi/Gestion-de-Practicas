@extends('templates.master')

@section('contenido-principal')

    <div class="col-10">
        <div class="col-1 d-flex justify-content-center align-items-center mb-2 ms-3">
            <a href="{{route('solicitudes.index')}}" class="btn text-white btn-warning d-flex justify-content-center align-items-center">
                <i class="material-icons text-white mx-1">arrow_back</i>
                <strong>Volver</strong>
            </a>
        </div>
        <div class="container vh-95 d-flex justify-content-center align-items-center">
            <div class="card custom-card shadow-sm" style="width: 70%;">
                <div class="card-header shadow-sm">
                    <div class="row">
                        <h1 class="col-12"><strong>Datos de la Oferta</strong></h1>
                        <a class="col-12 mt-1 " href="{{$solicitud->empresa->url_web}}">
                            <i class="material-icons" style="font-size: 1em">language</i> {{$solicitud->empresa->url_web}}
                        </a>
                        <p class="col-12 mt-0 mb-0">
                            <i class="material-icons" style="font-size: 1em">location_on</i> {{$solicitud->oferta->region->nombre}} / {{$solicitud->oferta->comuna->nombre}}
                        </p>
                        <p class="col-12 mb-0">
                            <i class="material-icons" style="font-size: 1em">school</i> {{$solicitud->carrera->nombre}}
                        </p>
                        <p class="col-12">
                            <i class="material-icons" style="font-size: 1em">work</i> {{$solicitud->oferta->tipo->nombre}}
                        </p>
                        @if(Gate::allows('estudiante-gestion'))
                        <div class="col-4">
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
                        </div>
                        @endif

                    </div>
                </div>
                <div class="card-body overflow-auto" style="max-height: 59vh;">
                    <h4><strong>Datos de la solicitud</strong></h4>
                    <p>
                        <i class="material-icons" style="font-size: 1em">date_range</i> Fecha de Inicio: {{$solicitud->fecha_inicio}}  <i class="material-icons" style="font-size: 1em">date_range</i>Fecha De Termino: {{$solicitud->fecha_termino}}
                    </p>
                    <h4><strong>Datos de la Empresa</strong></h4>
                    <p>
                        <i class="material-icons" style="font-size: 1em">business</i> {{$solicitud->empresa->usuario->nombre}}
                    </p>
                    <p>
                        <i class="material-icons" style="font-size: 1em">badge</i> {{$solicitud->empresa->rut_empresa}}
                    </p>
                    <p>
                        <i class="material-icons" style="font-size: 1em">email</i> {{$solicitud->empresa->email_contacto}}
                    </p>
                    <h4><strong>Supervisor</strong></h4>
                    <p>
                        <i class="material-icons" style="font-size: 1em">person</i> {{$solicitud->supervisor->usuario->nombre}} {{$solicitud->supervisor->usuario->apellido}}
                    </p>
                    <p>
                        <i class="material-icons" style="font-size: 1em">work</i> {{$solicitud->supervisor->titulo_supervisor}} / {{$solicitud->supervisor->cargo_supervisor}}
                    </p>
                    <p>
                        <i class="material-icons" style="font-size: 1em">phone</i> {{$solicitud->supervisor->fono_supervisor}}
                    </p>
                    @if(Gate::allows('jefe-gestion') or Gate::allows('secretaria-gestion'))
                        <h4><strong>Datos del Estudiante</strong></h4>
                        <p>
                            <i class="material-icons" style="font-size: 1em">person</i> {{$solicitud->estudiante->usuario->nombre}} {{$solicitud->estudiante->usuario->apellido}}
                        </p>
                        <p>
                            <i class="material-icons" style="font-size: 1em">badge</i> {{$solicitud->estudiante->rut_estudiante}} {{$solicitud->estudiante->edad_estudiante}}
                        </p>
                        <p>
                            <i class="material-icons" style="font-size: 1em">phone</i> {{$solicitud->estudiante->fono_estudiante}} {{$solicitud->estudiante->direccion_estudiante}}
                        </p>
                        <p>
                            <i class="material-icons" style="font-size: 1em">school</i> {{$solicitud->estudiante->carrera->nombre}}
                        </p>
                    @endif
                </div>
                @if (Gate::allows('jefe-gestion') or Gate::allows('secretaria-gestion'))	
                <div class="card-footer d-flex justify-content-end align-items-end">
                    {{-- Botones --}}
                    <form action="{{route('solicitudes.rechazar',$solicitud->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn text-white btn-danger mx-2 d-flex justify-content-center align-items-center">
                            <i class="material-icons text-white mx-1" style="font-size: 1em">cancel</i>
                            <strong>Rechazar</strong>
                        </button>
                    </form>
                    
                    @if(Gate::allows('jefe-gestion'))
                    <form action="{{route('solicitudes.passar',$solicitud->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn text-white btn-success mx-2 d-flex justify-content-center align-items-center">
                            <i class="material-icons text-white mx-1" style="font-size: 1em">check</i>
                            <strong>Aceptar</strong>
                        </button>
                    </form>
                    @endif

                    @if(Gate::allows('secretaria-gestion'))
                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn text-white btn-success mx-2 d-flex justify-content-center align-items-center">
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
