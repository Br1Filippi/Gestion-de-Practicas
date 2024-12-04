@extends('templates.master')

@section('contenido-principal')
<div class="col-10">
    <div class="d-flex justify-content-center align-items-center vh-95">
        <div class="card text-center" style="width: 50%;">
            <form method="POST" action="{{ route('practicas.update', $practica->id) }}">
                @csrf
                @method('PUT')
                <div class="card-body bg-white shadow-sm mt-2 pb-3">
                    {{-- Fecha de Inicio --}}
                    <h5 class="d-flex"><strong>Fecha de Inicio:</strong></h5>
                    <input 
                        type="date" 
                        name="fecha_inicio" 
                        class="form-control @error('fecha_inicio') is-invalid @enderror" 
                        value="{{ old('fecha_inicio', $practica->fecha_inicio) }}"
                    >
                    @error('fecha_inicio')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                    @enderror

                    {{-- Fecha de Término --}}
                    <h5 class="d-flex mt-3"><strong>Fecha de Término:</strong></h5>
                    <input 
                        type="date" 
                        name="fecha_termino" 
                        class="form-control @error('fecha_termino') is-invalid @enderror" 
                        value="{{ old('fecha_termino', $practica->fecha_termino) }}"
                    >
                    @error('fecha_termino')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                    @enderror

                    {{-- Estado --}}
                    <h5 class="d-flex mt-3"><strong>Estado:</strong></h5>
                    <select name="estado" class="form-select @error('estado') is-invalid @enderror">
                        <option value="{{ $practica->estado->id }}">{{ $practica->estado->nombre_estado }}</option>
                        @foreach($estados as $estado)
                            <option value="{{ $estado->id }}" {{ old('estado', $practica->estado_id) == $estado->id ? 'selected' : '' }}>
                                {{ $estado->nombre_estado }}
                            </option>
                        @endforeach
                    </select>
                    @error('estado')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                    @enderror

                    {{-- Estudiante --}}
                    <h5 class="d-flex mt-3"><strong>Estudiante:</strong></h5>
                    <select name="estudiante" class="form-select @error('estudiante') is-invalid @enderror">
                        <option value="{{$practica->estudiante->id}}">Rut: {{$practica->estudiante->rut_estudiante}} / Nombre: {{$practica->estudiante->usuario->nombre}} {{$practica->estudiante->usuario->apellido}}</option>
                        @foreach($estudiantes as $estudiante)
                            <option value="{{ $estudiante->id }}" {{ old('estudiante', $practica->estudiante_id) == $estudiante->id ? 'selected' : '' }}>
                                Rut: {{$estudiante->rut_estudiante}} / Nombre: {{ $estudiante->usuario->nombre }} {{ $estudiante->usuario->apellido }} / Carrera: {{ $estudiante->carrera->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('estudiante')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                    @enderror

                    {{-- Empresa --}}
                    <h5 class="d-flex mt-3"><strong>Empresa:</strong></h5>
                    <select name="empresa" id="empresa-select" class="form-select @error('empresa') is-invalid @enderror">
                        <option value="{{$practica->empresa->id}}">{{$practica->empresa->usuario->nombre}}</option>
                        @foreach($empresas as $empresa)
                            <option value="{{ $empresa->id }}" {{ old('empresa', $practica->empresa_id) == $empresa->id ? 'selected' : '' }}>
                                {{ $empresa->usuario->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('empresa')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                    @enderror

                    {{-- Supervisor --}}
                    <h5 class="d-flex mt-3"><strong>Supervisor:</strong></h5>
                    <select name="supervisor" id="supervisor-select" class="form-select @error('supervisor') is-invalid @enderror">
                        <option value="{{$practica->supervisor->id}}">{{$practica->supervisor->usuario->nombre}} {{$practica->supervisor->usuario->apellido}}</option>
                    </select>
                    @error('supervisor')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                    @enderror

                    {{-- Oferta --}}
                    <h5 class="d-flex mt-3"><strong>Oferta:</strong></h5>
                    <select name="oferta" id="oferta-select" class="form-select @error('oferta') is-invalid @enderror">
                        <option value="{{$practica->oferta->id}}">Id:{{$practica->oferta->id}} / {{$practica->oferta->titulo}}</option>
                    </select>
                    @error('oferta')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                    @enderror

                    <div class="row mt-4 mb-0 pb-0">
                        {{-- Botones para ver informe y evaluación --}}
                        <div class="col">
                            <div class="d-flex justify-content-center align-items-center">
                                @if($practica->id_informe == null)
                                <a href="{{route('evaluaciones.informe', $practica->id)}}"
                                    class="btn text-white btn-primary mx-2 d-flex justify-content-center align-items-center">
                                    <i class="material-icons text-white mx-1" style="font-size: 1em">description</i>
                                    <strong>Evaluar Informe</strong>
                                </a>
                                @else
                                <a href="{{route('evaluaciones.verInforme', $practica->id)}}"
                                    class="btn text-white btn-primary mx-2 d-flex justify-content-center align-items-center">
                                    <i class="material-icons text-white mx-1" style="font-size: 1em">description</i>
                                    <strong>Ver Informe</strong>
                                </a>
                                @endif
                                @if($practica->id_informe != null)
                                <button type="button" class="btn text-white btn-danger mx-2 d-flex justify-content-center align-items-center" data-bs-toggle="modal" data-bs-target="#deleteInformeModal">
                                    <i class="material-icons text-white mx-1" style="font-size: 1em">delete</i>
                                </button>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex justify-content-center align-items-center">
                                @if($practica->id_evaluacion == null)
                                <a href="{{route('evaluaciones.desempeño', $practica->id)}}"
                                    class="btn text-white btn-warning mx-2 d-flex justify-content-center align-items-center">
                                    <i class="material-icons text-white mx-1" style="font-size: 1em">assessment</i>
                                    <strong>Evaluar</strong>
                                </a>
                                @else
                                <a href="{{route('evaluaciones.verDesempeño', $practica->id)}}"
                                    class="btn text-white btn-warning mx-2 d-flex justify-content-center align-items-center">
                                    <i class="material-icons text-white mx-1" style="font-size: 1em">assessment</i>
                                    <strong>Ver Evaluación</strong>
                                </a>
                                @endif
                                @if($practica->id_evaluacion != null)
                                <button type="button" class="btn text-white btn-danger mx-2 d-flex justify-content-center align-items-center" data-bs-toggle="modal" data-bs-target="#deleteEvaluacionModal">
                                    <i class="material-icons text-white mx-1" style="font-size: 1em">delete</i>
                                </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Botones --}}
                <div class="card-footer text-muted d-flex justify-content-end align-items-center px-0 mx-0 mt-3">
                    <div class="col-md-2 me-2">
                        <a href="{{ route('practicas.index2') }}" class="btn btn-danger d-flex justify-content-center align-items-center">
                            <i class="material-icons">close</i>
                            <strong>Cancelar</strong>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success d-flex justify-content-center align-items-center">
                            <strong>Modificar</strong>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal para eliminar evaluación --}}
<div class="modal fade" id="deleteEvaluacionModal" tabindex="-1" aria-labelledby="deleteEvaluacionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteEvaluacionModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar esta evaluación?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{route('evaluaciones.destroyDesempeño', $practica->id)}}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Modal para eliminar informe --}}
<div class="modal fade" id="deleteInformeModal" tabindex="-1" aria-labelledby="deleteInformeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteInformeModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar este informe?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{route('evaluaciones.destroyInforme', $practica->id)}}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        const baseUrl = "{{ url('/practicas/supervisores-ofertas') }}";

        $('#empresa-select').on('change', function () {
            const empresaId = $(this).val();
            
            if (!empresaId) {
                console.error('No se ha seleccionado ninguna empresa.');
                return;
            }

            const requestUrl = `${baseUrl}/${empresaId}`;
            console.log(`URL usada: ${requestUrl}`);

            $.ajax({
                url: requestUrl,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    console.log('Datos recibidos:', data);

                    // Resto del código para actualizar selectores
                    const supervisorSelect = $('#supervisor-select');
                    const ofertaSelect = $('#oferta-select');

                    supervisorSelect.empty().append('<option value="">Seleccione Supervisor</option>');
                    $.each(data.supervisores, function (index, supervisor) {
                        supervisorSelect.append(`<option value="${supervisor.id}">Rut: ${supervisor.rut_supervisor} / Nombre: ${supervisor.usuario.nombre} ${supervisor.usuario.apellido}</option>`);
                    });

                    ofertaSelect.empty().append('<option value="">Seleccione Oferta</option>');
                    $.each(data.ofertas, function (index, oferta) {
                        ofertaSelect.append(`<option value="${oferta.id}">Id: ${oferta.id} / ${oferta.titulo}</option>`);
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error en la solicitud Ajax:', error);
                }
            });
        });
    });
</script>
@endsection