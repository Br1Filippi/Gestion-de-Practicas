@extends('templates.master')

@section('contenido-principal')
<div class="container mt-4">
    {{-- Header --}}
    <div class="row mb-3 px-5 d-flex me-4 ">
        <div class="col-8">
            <h1><strong>*Oferta Seleccionada*</strong></h1>
        </div>
        <div class="col d-flex justify-content-end aling-items-center">
            <a href="{{route('ofertas.index')}}" class="btn text-white btn-warning  d-flex justify-content-center align-items-center">
                <i class="material-icons text-white mx-1" style="font-size: 1em">arrow_back</i>
                <strong>Volver</strong>
            </a>
        </div>
    </div>
    
    {{-- Body --}}
    <div class="d-flex justify-content-center mt-3">
        <div class="row w-100 ps-3">
            {{-- Card izquierda --}}
            <div class="col-5 d-flex flex-column align-items-center" >
                <div class="w-100 overflow-auto" style="max-height: 84vh;">

                    <div class="card mb-3 oferta-card shadow-sm ">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Postulante 1</strong></h5>
                            <p class="card-text"> Datos del estudiante </p>
                        </div>
                    </div>

                    <div class="card mb-3 oferta-card shadow-sm ">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Postulante 2</strong></h5>
                            <p class="card-text"> Datos del estudiante </p>
                        </div>
                    </div>

                    <div class="card mb-3 oferta-card shadow-sm ">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Postulante 3</strong></h5>
                            <p class="card-text"> Datos del estudiante </p>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Card derecha  --}}
            <div class="col-md-6 d-flex h-100">
                <div id="details-card" class="card w-85 shadow-sm">
                    <div class="card-header bg-white">
                        <div class="row">
                            <div class="col-3">
                                {{-- Imagen del perfil --}}
                                <img src="https://via.placeholder.com/800" class="card-img" alt="Imagen de Perfil">
                            </div>
                            <div class="col">
                                <h5><strong>Dagoberto Cabrera</strong></h5>
                                <p>27 años</p>
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
                    <div class="card-body overflow-auto" style="max-height: 60vh;">
                        <h5><strong>Acerca de mí:</strong></h5>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer in risus venenatis, varius odio in, vehicula justo. Quisque eleifend
                        hendrerit augue. Donec sollicitudin diam sit amet sapien rutrum luctus quis vel eros. Integer consequat nisi a lectus pharetra gravida.
                        Donec orci lectus, faucibus efcitur sem nec, ullamcorper suscipit nibh. Integer a rhoncus lacus. Nullam consectetur tellus quis
                        placerat eleifend. Donec sed tortor porta, fnibus nisi non, volutpat massa. Mauris feugiat rutrum ornare. Pellentesque habitant morbi
                        tristique senectus et netus et malesuada fames ac turpis egestas. Sed vitae ligula leo. Duis mattis lectus venenatis, ullamcorper elit id,
                        euismod augue. Aenean purus nulla, pharetra in felis eu, faucibus ornare ipsum. Mauris vitae lacus id dui vulputate bibendum placerat
                        ut nunc. Nullam placerat vel nunc ac feugiat. Integer consequat tempus neque, non commodo lacus varius ut.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer in risus venenatis, varius odio in, vehicula justo. Quisque eleifend
                        hendrerit augue. Donec sollicitudin diam sit amet sapien rutrum luctus quis vel eros. Integer consequat nisi a lectus pharetra gravida.
                        Donec orci lectus, faucibus efcitur sem nec, ullamcorper suscipit nibh. Integer a rhoncus lacus. Nullam consectetur tellus quis
                        placerat eleifend. Donec sed tortor porta, fnibus nisi non, volutpat massa. Mauris feugiat rutrum ornare. Pellentesque habitant morbi
                        tristique senectus et netus et malesuada fames ac turpis egestas. Sed vitae ligula leo. Duis mattis lectus venenatis, ullamcorper elit id,
                        euismod augue. Aenean purus nulla, pharetra in felis eu, faucibus ornare ipsum. Mauris vitae lacus id dui vulputate bibendum placerat
                        ut nunc. Nullam placerat vel nunc ac feugiat. Integer consequat tempus neque, non commodo lacus varius ut.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer in risus venenatis, varius odio in, vehicula justo. Quisque eleifend
                        hendrerit augue. Donec sollicitudin diam sit amet sapien rutrum luctus quis vel eros. Integer consequat nisi a lectus pharetra gravida.
                        Donec orci lectus, faucibus efcitur sem nec, ullamcorper suscipit nibh. Integer a rhoncus lacus. Nullam consectetur tellus quis
                        placerat eleifend. Donec sed tortor porta, fnibus nisi non, volutpat massa. Mauris feugiat rutrum ornare. Pellentesque habitant morbi
                        tristique senectus et netus et malesuada fames ac turpis egestas. Sed vitae ligula leo. Duis mattis lectus venenatis, ullamcorper elit id,
                        euismod augue. Aenean purus nulla, pharetra in felis eu, faucibus ornare ipsum. Mauris vitae lacus id dui vulputate bibendum placerat
                        ut nunc. Nullam placerat vel nunc ac feugiat. Integer consequat tempus neque, non commodo lacus varius ut.
                    </div>
                    <div class="card-footer d-flex justify-content-end align-items-end">
                        {{-- Botones --}}
                        @if (Gate::allows('empresa-gestion'))
                            <a href="" class="btn text-white btn-danger mx-2 d-flex justify-content-center align-items-center">
                                <i class="material-icons text-white mx-1" style="font-size: 1em">cancel</i>
                                <strong>Rechazar</strong>
                            </a>
                            <a href="" class="btn text-white btn-success mx-2 d-flex justify-content-center align-items-center">
                                <i class="material-icons text-white mx-1" style="font-size: 1em">check</i>
                                <strong>Aceptar</strong>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
