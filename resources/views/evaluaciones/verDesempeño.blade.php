@extends('templates.master')

@section('contenido-principal')

<div class="container mt-4">
    {{-- Header --}}
    <div class="row mb-3 px-5 d-flex me-4 ">
        <div class="col-8">
            <h3><strong>Desempeño de {{$practica->estudiante->usuario->nombre}}
                    {{$practica->estudiante->usuario->apellido}}</strong></h3>
        </div>
    </div>

    {{-- Body --}}
    <div class="d-flex justify-content-center mt-3">
        <div class="row w-100 ps-3">
            <div class="card custom-card shadow-sm" style="width: 85%;">
                <div class="card-body overflow-auto" style="max-height: 80vh;">
                    {{-- Tabla de evaluación --}}
                    <table class="table table-bordered table-hover" style="font-size: 1.2em;">
                        <thead class="thead-light text-center">
                            <tr>
                                <th class="col-3">Aspectos</th>
                                <th class="col-2">No Logrado</th>
                                <th class="col-2">Satisfactoriamente Logrado</th>
                                <th class="col-2">Plenamente Logrado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <th scope="row" class="text-start">1.Capacidad </th>
                                <td><input type="radio" name="capacidad" value="0"
                                        class="form-check-input mx-auto my-auto" disabled
                                        @if($practica->evaluacion->capacidad == 0)checked @endif></td>
                                <td><input type="radio" name="capacidad" value="1" class="form-check-input mx-auto"
                                        disabled @if($practica->evaluacion->capacidad == 1)checked @endif></td>
                                <td><input type="radio" name="capacidad" value="2" class="form-check-input mx-auto"
                                        disabled @if($practica->evaluacion->capacidad == 2)checked @endif></td>
                            </tr>
                            <tr class="text-center">
                                <th scope="row" class="text-start">2.Confianza</th>
                                <td><input type="radio" name="confianza" value="0"
                                        class="form-check-input mx-auto my-auto" disabled
                                        @if($practica->evaluacion->confianza == 0)checked @endif></td>
                                <td><input type="radio" name="confianza" value="1" class="form-check-input mx-auto"
                                        disabled @if($practica->evaluacion->confianza == 1)checked @endif></td>
                                <td><input type="radio" name="confianza" value="2" class="form-check-input mx-auto"
                                        disabled @if($practica->evaluacion->confianza == 2)checked @endif></td>
                            </tr>
                            <tr class="text-center">
                                <th scope="row" class="text-start">3.Aplicacion o empeño</th>
                                <td><input type="radio" name="aplicacion" value="0" class="form-check-input mx-auto"
                                        disabled @if($practica->evaluacion->aplicacion == 0)checked @endif></td>
                                <td><input type="radio" name="aplicacion" value="1" class="form-check-input mx-auto"
                                        disabled @if($practica->evaluacion->aplicacion == 1)checked @endif></td>
                                <td><input type="radio" name="aplicacion" value="2" class="form-check-input mx-auto"
                                        disabled @if($practica->evaluacion->aplicacion == 2)checked @endif></td>
                            </tr>
                            <tr class="text-center">
                                <th scope="row" class="text-start">4.Adaptabilidad</th>
                                <td><input type="radio" name="adaptabilidad" value="0" class="form-check-input mx-auto"
                                        disabled @if($practica->evaluacion->adaptabilidad == 0)checked @endif></td>
                                <td><input type="radio" name="adaptabilidad" value="1" class="form-check-input mx-auto"
                                        disabled @if($practica->evaluacion->adaptabilidad == 1)checked @endif></td>
                                <td><input type="radio" name="adaptabilidad" value="2" class="form-check-input mx-auto"
                                        disabled @if($practica->evaluacion->adaptabilidad == 2)checked @endif></td>
                            </tr>
                            <tr class="text-center">
                                <th scope="row" class="text-start">5.Iniciativa</th>
                                <td><input type="radio" name="iniciativa" value="0" class="form-check-input mx-auto"
                                        disabled @if($practica->evaluacion->iniciativa == 0)checked @endif></td>
                                <td><input type="radio" name="iniciativa" value="1" class="form-check-input mx-auto"
                                        disabled @if($practica->evaluacion->iniciativa == 1)checked @endif></td>
                                <td><input type="radio" name="iniciativa" value="2" class="form-check-input mx-auto"
                                        disabled @if($practica->evaluacion->iniciativa == 2)checked @endif></td>
                            </tr>
                            <tr class="text-center">
                                <th scope="row" class="text-start">6.Aptitud para trabajar</th>
                                <td><input type="radio" name="aptitud" value="0" class="form-check-input mx-auto"
                                        disabled @if($practica->evaluacion->aptitud == 0)checked @endif></td>
                                <td><input type="radio" name="aptitud" value="1" class="form-check-input mx-auto"
                                        disabled @if($practica->evaluacion->aptitud == 1)checked @endif></td>
                                <td><input type="radio" name="aptitud" value="2" class="form-check-input mx-auto"
                                        disabled @if($practica->evaluacion->aptitud == 2)checked @endif></td>
                            </tr>
                            <tr class="text-center">
                                <th scope="row" class="text-start">7.Conocimiento</th>
                                <td><input type="radio" name="conocimiento" value="0" class="form-check-input mx-auto"
                                        disabled @if($practica->evaluacion->conocimiento == 0)checked @endif></td>
                                <td><input type="radio" name="conocimiento" value="1" class="form-check-input mx-auto"
                                        disabled @if($practica->evaluacion->conocimiento == 1)checked @endif></td>
                                <td><input type="radio" name="conocimiento" value="2" class="form-check-input mx-auto"
                                        disabled @if($practica->evaluacion->conocimiento == 2)checked @endif></td>
                            </tr>
                            <tr class="text-center">
                                <th scope="row" class="text-start">8.Asistencia</th>
                                <td><input type="radio" name="asistencia" value="0" class="form-check-input mx-auto"
                                        disabled @if($practica->evaluacion->asistencia == 0)checked @endif></td>
                                <td><input type="radio" name="asistencia" value="1" class="form-check-input mx-auto"
                                        disabled @if($practica->evaluacion->asistencia == 1)checked @endif></td>
                                <td><input type="radio" name="asistencia" value="2" class="form-check-input mx-auto"
                                        disabled @if($practica->evaluacion->asistencia == 2)checked @endif></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex justify-content-end bg-white">
                    <div class="col-1">
                        <a href="{{route('practicas.detalles',$practica->id)}}"
                            class="btn btn-success d-flex justify-content-center align-items-center">
                            <i class="material-icons">task</i>
                            <strong>Volver</strong>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection