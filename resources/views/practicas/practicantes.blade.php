@extends('templates.master')

@section('contenido-principal')
<div class="container mt-4">
    {{-- Header --}}
    <div class="row mb-3 px-5 d-flex me-4 ">
        <form action="">
            <div class="row mb-3">
                {{-- Barra de Busqueda --}}
                <div class="row mb-3 ">
                    <div class="col d-flex ">
                        <input type="text" name="termino" class="form-control" placeholder="Buscar por Nombre o Rut del Practicante">
                    </div>

                    {{-- Busqueda --}}
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary d-flex justify-content-end align-items-end">
                            <i class="material-icons">search</i><strong>Buscar</strong></button>
                    </div>
                </div>

                {{-- Filtros --}}

                {{-- Filtro estado --}}
                <div class="col-3 ms-5">
                    <select name="estado" class="form-control fs-6">
                        <option value="">Seleccione un Estado</option>

                    </select>
                </div>

                {{-- Filtro de tipo de practica --}}
                <div class="col-3">
                    <select name="tipo" class="form-control fs-6">
                        <option value="">Seleccione un Tipo</option>

                    </select>
                </div>

                {{-- Filtro de evaluacion --}}
                <div class="col-3">
                    <select name="tipo" class="form-control fs-6">
                        <option value="">Seleccione Estado de Evaluacion</option>

                    </select>
                </div>
            </div>
        </form>
    </div>
    
    {{-- Body --}}
    <div class="d-flex justify-content-center mt-3">
        <div class="row w-100 ps-3">
            {{-- Card izquierda --}}
            <div class="col-5 d-flex flex-column align-items-center ps-4" >
                <div class="w-100 overflow-auto" style="max-height: 79vh;">

                    <div class="card mb-3 oferta-card shadow-sm ">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Practicante 1</strong></h5>
                            <p class="card-text mb-1"> Estado:</p>
                            <p class="card-text mb-1"> Fecha Inicio:</p>
                            <p class="card-text mb-1"> Fecha Termino:</p>
                            <p class="card-text mb-1"> Tipo de Practica: </p>
                        </div>
                    </div>

                    <div class="card mb-3 oferta-card shadow-sm ">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Practicante 2</strong></h5>
                            <p class="card-text mb-1"> Estado:</p>
                            <p class="card-text mb-1"> Fecha Inicio:</p>
                            <p class="card-text mb-1"> Fecha Termino:</p>
                            <p class="card-text mb-1"> Tipo de Practica: </p>
                        </div>
                    </div>

                    <div class="card mb-3 oferta-card shadow-sm ">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Practicante 3</strong></h5>
                            <p class="card-text mb-1"> Estado:</p>
                            <p class="card-text mb-1"> Fecha Inicio:</p>
                            <p class="card-text mb-1"> Fecha Termino:</p>
                            <p class="card-text mb-1"> Tipo de Practica: </p>
                        </div>
                    </div>

                    <div class="card mb-3 oferta-card shadow-sm ">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Practicante 4</strong></h5>
                            <p class="card-text mb-1"> Estado:</p>
                            <p class="card-text mb-1"> Fecha Inicio:</p>
                            <p class="card-text mb-1"> Fecha Termino:</p>
                            <p class="card-text mb-1"> Tipo de Practica: </p>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Card derecha  --}}
            <div class="col-md-6 d-flex h-100 pe-5">
                <div id="details-card" class="card w-100 shadow-sm">
                    <div class="card-header bg-white">
                        <div class="row">
                            <div class="col-3">
                                {{-- Imagen del perfil --}}
                                <img src="https://via.placeholder.com/800" class="card-img" alt="Imagen de Perfil">
                            </div>
                            <div class="col">
                                <h4><strong>Practicante 2</strong></h4>
                                <p>21280193-3</p>
                                <div class="row">
                                    <div class="col">
                                        <p>dagobertocabrera@usm.cl</p>
                                    </div>
                                    <div class="col">
                                        <p>+569 77893712</p>
                                    </div>
                                </div>
                                <p>Ingeniero Civil Electrónico</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4>Datos de la Practica</h4>
                        <p>Tipo de Practica: </p>
                        <p>Fecha de Inicio:</p>
                        <p>Fecha de Termino:</p>
                        <p>Informe de la empresa:</p>
                        <p>Evaluacion del Alumno:</p>
                        <H4>Datos del Supervisor</H4>
                        <p>Suprvisor a cargo: </p>
                        <p>Titulo: </p>
                        <p>Cargo: </p>
                        <p>Fono: </p>

                    </div>
                    <div class="card-footer d-flex justify-content-end align-items-end">
                        {{-- Botones --}}
                        <a href="" class="btn text-white btn-warning mx-2 d-flex justify-content-center align-items-center" data-bs-toggle="modal" data-bs-target="#evaluacionModal">
                            <i class="material-icons text-white mx-1" style="font-size: 1em">quiz</i>
                            <strong>Evaluar</strong>
                        </a>
                    </div>

                    {{-- Modal Evaluaciones --}}
                    <div class="modal fade" id="evaluacionModal" tabindex="-1" aria-labelledby="evaluacionModal" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header ">
                              <h1 class="modal-title fs-5" id="evaluacionModal">Evaluaciones de Practicante 2</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <p class="mt-2">Informe de la empresa : sin evaluar</p>
                                    </div>
                                    <div class="col-4">
                                        <a href="{{route('evaluaciones.informe')}}" class="btn text-white btn-warning mx-2 d-flex justify-content-center align-items-center">
                                            <i class="material-icons text-white mx-1" >description</i>
                                            <strong>Evaluar</strong>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p class="mt-2">Evaluacion de desempeño: sin evaluar</p>
                                    </div>
                                    <div class="col-4">
                                        <a href="{{route('evaluaciones.desempeño')}}" class="btn text-white btn-warning mx-2 d-flex justify-content-center align-items-center" >
                                            <i class="material-icons text-white mx-1" >checklist_rtl</i>
                                            <strong>Evaluar</strong>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
