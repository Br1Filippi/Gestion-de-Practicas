@extends('templates.master')

@section('contenido-principal')

<div class="col-10 ">
    <div class="container vh-95 d-flex justify-content-center align-items-center ">
        <div class="card custom-card shadow-sm" style="width: 70%;">
            <div class="card-header bg-white">
                <div class="row">
                    @if ($usuario->imagen == null)
                    <div class="col-3">
                        <!-- Imagen de perfil por defecto -->
                        <img src="https://via.placeholder.com/800" class="card-img" alt="Imagen de Perfil">
                    </div>
                    @else
                    <div class="col-3">
                        <!-- Imagen almacenada del usuario -->
                        <img src="{{ Storage::url($usuario->imagen) }}" class="card-img img-fluid"
                            alt="Imagen de Perfil">
                    </div>
                    @endif
                    {{-- Estudiante --}}
                    @if(Gate::allows('estudiante-gestion'))
                    <div class="col">
                        <div class="row">
                            <div class="col-9">
                                <h3><strong>{{$usuario->nombre}} {{$usuario->apellido}}</strong></h3>
                            </div>
                            <div class="col-3 d-flex justify-content-end align-items-end">
                                <a href="" class="btn text-white btn-warning">
                                    <i class="material-icons text-white" style="font-size: 1em">edit</i>
                                    <strong>Editar</strong>
                                </a>
                            </div>
                        </div>
                        <p class="mb-1">{{$estudiante->edad_estudiante}} años</p>
                        <p class="mb-1">{{$estudiante->rut_estudiante}}</p>
                        <p class="mb-1">{{$estudiante->direccion_estudiante}}</p>
                        <p class="mb-1">{{$estudiante->carrera->nombre}}</p>
                        <div class="row">
                            <div class="col-4">
                                <p>{{$usuario->correo_usuario}}</p>
                            </div>
                            <div class="col-4">
                                <p>+56 {{$estudiante->fono_estudiante}}</p>
                            </div>
                        </div>
                    </div>
                    @endif

                    {{-- Empresas --}}
                    @if(Gate::allows('empresa-gestion'))
                    <div class="col">
                        <div class="row">
                            <div class="col-9">
                                <h3><strong>{{$usuario->nombre}} {{$usuario->apellido}}</strong></h3>
                            </div>
                            <div class="col-3 d-flex justify-content-end align-items-end">
                                <a href="" class="btn text-white btn-warning">
                                    <i class="material-icons text-white" style="font-size: 1em">edit</i>
                                    <strong>Editar</strong>
                                </a>
                            </div>
                        </div>
                        <a class="mb-1" href='{{$empresa->url_web}}'>{{$empresa->url_web}}</a>
                        <p class="mb-1">{{$empresa->rut_empresa}}</p>
                        <div class="row">
                            <div class="col-4">
                                <p>{{$empresa->direccion}}</p>
                            </div>
                            <div class="col-4">
                                <p>{{$empresa->email_contacto}}</p>
                            </div>
                        </div>
                        <p>{{$empresa->razon_social}}</p>
                    </div>
                    @endif
                    {{-- Supervisor --}}
                    @if(Gate::allows('supervisor-gestion'))
                    <div class="col">
                        <div class="row">
                            <div class="col-9">
                                <h3><strong>{{$usuario->nombre}} {{$usuario->apellido}}</strong></h3>
                            </div>
                            <div class="col-3 d-flex justify-content-end align-items-end">
                                <a href="" class="btn text-white btn-warning">
                                    <i class="material-icons text-white" style="font-size: 1em">edit</i>
                                    <strong>Editar</strong>
                                </a>
                            </div>
                        </div>
                        <p class="mb-1">{{$supervisor->rut_supervisor}}</p>
                        <p class="mb-1">{{$usuario->correo_usuario}}</p>
                        <p class="mb-1">{{$supervisor->fono_supervisor}}</p>
                        <div class="row">
                            <div class="col-4">
                                <p>{{$supervisor->titulo_supervisor}}</p>
                            </div>
                            <div class="col-4">
                                <p>{{$supervisor->cargo_supervisor}}</p>
                            </div>
                        </div>
                        <p></p>
                    </div>
                    @endif
                </div>
            </div>
            @if (Gate::allows('estudiante-gestion'))
            <div class="card-body overflow-auto" style="max-height: 70vh;">
                <h5><strong>Acerca de Mi:</strong></h5>
                <div id="descripcion">
                    {!! $estudiante->desc_estudiante !!}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection