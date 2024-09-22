@extends('templates.master')

@section('contenido-principal')
<div class="container mt-4">
    
    {{-- Body --}}
    <div class="d-flex justify-content-center mt-3">
        <div class="row w-100 ps-3">
            <div class="col-10 d-flex flex-column align-items-center ps-4" >
                <div class="w-100 overflow-auto" style="max-height: 80vh;">

                    <div class="card mb-3 oferta-card shadow-sm ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h4 class="mb-1">
                                        <strong>Practica *Nombre de la Oferta*</strong>
                                        <span class="badge bg-danger">Reprobado</span> 
                                    </h4>
                                    <p class="card-text mb-0"> Nombre de la empresa: </p>
                                    <p class="card-text mb-0"> Tipo de parctica:</p>
                                    <p class="card-text mb-0"> Fecha de Entrega:</p>
                                    <div class="row mb-0">
                                        <div class="col-4 mb-0">
                                            <p class="mb-1">Fecha Inicio:</p>
                                        </div>
                                        <div class="col-4 mb-0">
                                            <p class="mb-1">Fecha Término: </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 mt-4">
                                    <a href="" class="btn text-white btn-primary">
                                        <i class="material-icons text-white">info</i>
                                        <strong>Detalles</strong>
                                    </a>
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
                                        <span class="badge bg-warning">En Curso</span> 
                                    </h4>
                                    <p class="card-text mb-0"> Nombre de la empresa </p>
                                    <p class="card-text mb-0"> Tipo de parctica:</p>
                                    <p class="card-text mb-0"> Fecha de Entrega:</p>
                                    <div class="row mb-0">
                                        <div class="col-4 mb-0">
                                            <p class="mb-1">Fecha Inicio:</p>
                                        </div>
                                        <div class="col-4 mb-0">
                                            <p class="mb-1">Fecha Término: </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 mt-4">
                                    <a href="" class="btn text-white btn-primary">
                                        <i class="material-icons text-white">info</i>
                                        <strong>Detalles</strong>
                                    </a>
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
                                        <span class="badge bg-success">Aprobado</span> 
                                    </h4>
                                    <p class="card-text mb-0"> Nombre de la empresa </p>
                                    <p class="card-text mb-0"> Tipo de parctica:</p>
                                    <p class="card-text mb-0"> Fecha de Entrega:</p>
                                    <div class="row mb-0">
                                        <div class="col-4 mb-0">
                                            <p class="mb-1">Fecha Inicio:</p>
                                        </div>
                                        <div class="col-4 mb-0">
                                            <p class="mb-1">Fecha Término: </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 mt-4">
                                    <a href="" class="btn text-white btn-primary">
                                        <i class="material-icons text-white">info</i>
                                        <strong>Detalles</strong>
                                    </a>
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
