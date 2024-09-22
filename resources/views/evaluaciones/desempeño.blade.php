@extends('templates.master')

@section('contenido-principal')

<div class="container mt-4">
    {{-- Header --}}
    <div class="row mb-3 px-5 d-flex me-4 ">
        <div class="col-8">
            <h3><strong>Desempeño de *Practicante*</strong></h3>
        </div>
        <div class="col-2 d-flex justify-content-end align-items-center">
            <a href="{{route('practicas.practicantes')}}" class="btn text-white btn-warning d-flex justify-content-center align-items-center">
                <i class="material-icons text-white mx-1">arrow_back</i>
                <strong>Volver</strong>
            </a>
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
                                <td><input type="checkbox" name="puntualidad_no_logrado" class="form-check-input mx-auto my-auto"></td>
                                <td><input type="checkbox" name="puntualidad_satisfactoriamente_logrado" class="form-check-input mx-auto"></td>
                                <td><input type="checkbox" name="puntualidad_plenamente_l" class="form-check-input mx-auto"></td>
                            </tr>
                            <tr class="text-center">
                                <th scope="row" class="text-start">2.Confianza</th>
                                <td><input type="checkbox" name="confianza_no_logrado" class="form-check-input mx-auto my-auto"></td>
                                <td><input type="checkbox" name="confianza_satisfactoriamente_logrado" class="form-check-input mx-auto"></td>
                                <td><input type="checkbox" name="confianza_plenamente_l" class="form-check-input mx-auto"></td>
                            </tr>
                            <tr class="text-center">
                                <th scope="row" class="text-start">3.Aplicacion o empeño</th>
                                <td><input type="checkbox" name="aplicacion_no_logrado" class="form-check-input mx-auto"></td>
                                <td><input type="checkbox" name="aplicacion_satisfactoriamente_logrado" class="form-check-input mx-auto"></td>
                                <td><input type="checkbox" name="aplicacion_plenamente_l" class="form-check-input mx-auto"></td>
                            </tr>
                            <tr class="text-center">
                                <th scope="row" class="text-start">4.Adaptabilidad</th>
                                <td><input type="checkbox" name="adaptabilidad_no_logrado" class="form-check-input mx-auto"></td>
                                <td><input type="checkbox" name="adaptabilidad_satisfactoriamente_logrado" class="form-check-input mx-auto"></td>
                                <td><input type="checkbox" name="adaptabilidad_plenamente_l" class="form-check-input mx-auto"></td>
                            </tr>
                            <tr class="text-center">
                                <th scope="row" class="text-start">5.Iniciativa</th>
                                <td><input type="checkbox" name="iniciativa_no_logrado" class="form-check-input mx-auto"></td>
                                <td><input type="checkbox" name="iniciativa_satisfactoriamente_logrado" class="form-check-input mx-auto"></td>
                                <td><input type="checkbox" name="iniciativa_plenamente_l" class="form-check-input mx-auto"></td>
                            </tr>
                            <tr class="text-center">
                                <th scope="row" class="text-start">6.Aptitud para trabajar</th>
                                <td><input type="checkbox" name="aptitud_no_logrado" class="form-check-input mx-auto"></td>
                                <td><input type="checkbox" name="aptitud_satisfactoriamente_logrado" class="form-check-input mx-auto"></td>
                                <td><input type="checkbox" name="aptitud_plenamente_l" class="form-check-input mx-auto"></td>
                            </tr>
                            <tr class="text-center">
                                <th scope="row" class="text-start">7.Conocimiento</th>
                                <td><input type="checkbox" name="conocimiento_no_logrado" class="form-check-input mx-auto"></td>
                                <td><input type="checkbox" name="conocimiento_satisfactoriamente_logrado" class="form-check-input mx-auto"></td>
                                <td><input type="checkbox" name="conocimiento_plenamente_l" class="form-check-input mx-auto"></td>
                            </tr>
                            <tr class="text-center">
                                <th scope="row" class="text-start">8.Asistencia</th>
                                <td><input type="checkbox" name="asistencia_no_logrado" class="form-check-input mx-auto"></td>
                                <td><input type="checkbox" name="asistencia_satisfactoriamente_logrado" class="form-check-input mx-auto"></td>
                                <td><input type="checkbox" name="asistencia_plenamente_l" class="form-check-input mx-auto"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>  
                <div class="card-footer d-flex justify-content-end bg-white">
                    <div class="col-1">
                        <button type="submit" class="btn btn-success d-flex justify-content-center align-items-center">
                            <i class="material-icons">task</i>
                            <strong>Evaluar</strong>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
