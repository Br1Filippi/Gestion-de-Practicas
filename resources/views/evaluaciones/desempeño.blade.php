@extends('templates.master')

@section('contenido-principal')

<div class="container mt-4">
    {{-- Header --}}
    <div class="row mb-3 px-5 d-flex me-4 ">
        <div class="col-8">
            <h3><strong>Desempeño de {{$practica->estudiante->usuario->nombre}}
                    {{$practica->estudiante->usuario->apellido}}</strong></h3>
        </div>
        <div class="col-2 d-flex justify-content-end align-items-center">
            <a href="{{route('practicas.practicantes')}}"
                class="btn text-white btn-warning d-flex justify-content-center align-items-center">
                <i class="material-icons text-white mx-1">arrow_back</i>
                <strong>Volver</strong>
            </a>
        </div>
    </div>

    {{-- Body --}}
    <div class="d-flex justify-content-center mt-3">
        <div class="row w-100 ps-3">
            <div class="card custom-card shadow-sm" style="width: 85%;">
                <form action="{{route('evaluaciones.evaluarInforme',$practica->id)}}" method="POST">
                    @csrf
                    <div class="card-body overflow-auto" style="max-height: 79vh;">
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
                                    <th scope="row" class="text-start @error('capacidad') bg-danger @enderror">1.Capacidad </th>
                                    <td class="@error('capacidad') bg-danger @enderror"><input type="radio" name="capacidad" value="0"
                                            class="form-check-input mx-auto my-auto" {{ old('capacidad') == '0' ? 'checked' : '' }}></td>
                                    <td class="@error('capacidad') bg-danger @enderror"><input type="radio" name="capacidad" value="1" class="form-check-input mx-auto" {{ old('capacidad') == '1' ? 'checked' : '' }}>
                                    </td>
                                    <td class="@error('capacidad') bg-danger @enderror"><input type="radio" name="capacidad" value="2" class="form-check-input mx-auto" {{ old('capacidad') == '2' ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <th scope="row" class="text-start @error('confianza') bg-danger @enderror">2.Confianza</th>
                                    <td class="@error('confianza') bg-danger @enderror"><input type="radio" name="confianza" value="0"
                                            class="form-check-input mx-auto my-auto" {{ old('confianza') == '0' ? 'checked' : '' }}></td>
                                    <td class="@error('confianza') bg-danger @enderror"><input type="radio" name="confianza" value="1" class="form-check-input mx-auto" {{ old('confianza') == '1' ? 'checked' : '' }}>
                                    </td>
                                    <td class="@error('confianza') bg-danger @enderror"><input type="radio" name="confianza" value="2" class="form-check-input mx-auto" {{ old('confianza') == '2' ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <th scope="row" class="text-start @error('aplicacion') bg-danger @enderror">3.Aplicacion o empeño</th>
                                    <td class="@error('aplicacion') bg-danger @enderror"><input type="radio" name="aplicacion" value="0"
                                            class="form-check-input mx-auto my-auto" {{ old('aplicacion') == '0' ? 'checked' : '' }}></td>
                                    <td class="@error('aplicacion') bg-danger @enderror"><input type="radio" name="aplicacion" value="1" class="form-check-input mx-auto" {{ old('aplicacion') == '1' ? 'checked' : '' }}>
                                    </td>
                                    <td class="@error('aplicacion') bg-danger @enderror"><input type="radio" name="aplicacion" value="2" class="form-check-input mx-auto" {{ old('aplicacion') == '2' ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <th scope="row" class="text-start @error('adaptabilidad') bg-danger @enderror">4.Adaptabilidad</th>
                                    <td class="@error('adaptabilidad') bg-danger @enderror"><input type="radio" name="adaptabilidad" value="0"
                                            class="form-check-input mx-auto my-auto" {{ old('adaptabilidad') == '0' ? 'checked' : '' }}></td>
                                    <td class="@error('adaptabilidad') bg-danger @enderror"><input type="radio" name="adaptabilidad" value="1" class="form-check-input mx-auto" {{ old('adaptabilidad') == '1' ? 'checked' : '' }}>
                                    </td>
                                    <td class="@error('adaptabilidad') bg-danger @enderror"><input type="radio" name="adaptabilidad" value="2" class="form-check-input mx-auto" {{ old('adaptabilidad') == '2' ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <th scope="row" class="text-start @error('iniciativa') bg-danger @enderror">5.Iniciativa</th>
                                    <td class="@error('iniciativa') bg-danger @enderror"><input type="radio" name="iniciativa" value="0"
                                            class="form-check-input mx-auto my-auto" {{ old('iniciativa') == '0' ? 'checked' : '' }}></td>
                                    <td class="@error('iniciativa') bg-danger @enderror"><input type="radio" name="iniciativa" value="1" class="form-check-input mx-auto" {{ old('iniciativa') == '1' ? 'checked' : '' }}>
                                    </td>
                                    <td class="@error('iniciativa') bg-danger @enderror"><input type="radio" name="iniciativa" value="2" class="form-check-input mx-auto" {{ old('iniciativa') == '2' ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <th scope="row" class="text-start @error('aptitud') bg-danger @enderror">6.Aptitud para trabajar</th>
                                    <td class="@error('aptitud') bg-danger @enderror"><input type="radio" name="aptitud" value="0" class="form-check-input mx-auto my-auto" {{ old('aptitud') == '0' ? 'checked' : '' }}>
                                    </td>
                                    <td class="@error('aptitud') bg-danger @enderror"><input type="radio" name="aptitud" value="1" class="form-check-input mx-auto" {{ old('aptitud') == '1' ? 'checked' : '' }}>
                                    </td>
                                    <td class="@error('aptitud') bg-danger @enderror"><input type="radio" name="aptitud" value="2" class="form-check-input mx-auto" {{ old('aptitud') == '2' ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <th scope="row" class="text-start @error('conocimiento') bg-danger @enderror">7.Conocimiento</th>
                                    <td class="@error('conocimiento') bg-danger @enderror"><input type="radio" name="conocimiento" value="0"
                                            class="form-check-input mx-auto my-auto" {{ old('conocimiento') == '0' ? 'checked' : '' }}></td>
                                    <td class="@error('conocimiento') bg-danger @enderror"><input type="radio" name="conocimiento" value="1" class="form-check-input mx-auto" {{ old('conocimiento') == '1' ? 'checked' : '' }}>
                                    </td>
                                    <td class="@error('conocimiento') bg-danger @enderror"><input type="radio" name="conocimiento" value="2" class="form-check-input mx-auto" {{ old('conocimiento') == '2' ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <th scope="row" class="text-start @error('asistencia') bg-danger @enderror">8.Asistencia</th>
                                    <td class="@error('asistencia') bg-danger @enderror"><input type="radio" name="asistencia" value="0"
                                            class="form-check-input mx-auto my-auto" {{ old('asistencia') == '0' ? 'checked' : '' }}></td>
                                    <td class="@error('asistencia') bg-danger @enderror"><input type="radio" name="asistencia" value="1" class="form-check-input mx-auto" {{ old('asistencia') == '1' ? 'checked' : '' }}>
                                    </td>
                                    <td class="@error('asistencia') bg-danger @enderror"><input type="radio" name="asistencia" value="2" class="form-check-input mx-auto" {{ old('asistencia') == '2' ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex justify-content-end bg-white">
                        <div class="col-1">
                            <button type="submit"
                                class="btn btn-success d-flex justify-content-center align-items-center">
                                <i class="material-icons">task</i>
                                <strong>Evaluar</strong>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
