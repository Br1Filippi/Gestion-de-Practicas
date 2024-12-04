@extends('templates.master')

@section('contenido-principal')
<div class="col-10">
    <div class="d-flex justify-content-center align-items-center vh-95">
        <div class="card text-center" style="width: 50%;">
            <form method="POST" action="{{route('solicitudes.store2')}}">
                @csrf
                <div class="card-body bg-white shadow-sm mt-2 pb-3">
                    {{-- Fecha de Inicio --}}
                    <h5 class="d-flex"><strong>Fecha de Inicio:</strong></h5>
                    <input 
                        type="date" 
                        name="fecha_inicio" 
                        class="form-control @error('fecha_inicio') is-invalid @enderror" 
                        value="{{ old('fecha_inicio') }}"
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
                        value="{{ old('fecha_termino') }}"
                    >
                    @error('fecha_termino')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                    @enderror

                    {{-- Estudiante --}}
                    <h5 class="d-flex mt-3"><strong>Estudiante:</strong></h5>
                    <select name="estudiante" class="form-select @error('estudiante') is-invalid @enderror">
                        <option value="">Seleccione Estudiante</option>
                        @foreach($estudiantes as $estudiante)
                        <option value="{{ $estudiante->id }}" {{ old('estudiante') == $estudiante->id ? 'selected' : '' }}>
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
                        <option value="">Seleccione Empresa</option>
                        @foreach($empresas as $empresa)
                        <option value="{{ $empresa->id }}" {{ old('empresa') == $empresa->id ? 'selected' : '' }}>
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
                        <option value="">Seleccione Supervisor</option>
                    </select>
                    @error('supervisor')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                    @enderror

                    {{-- Oferta --}}
                    <h5 class="d-flex mt-3"><strong>Oferta:</strong></h5>
                    <select name="oferta" id="oferta-select" class="form-select @error('oferta') is-invalid @enderror">
                        <option value="">Seleccione Oferta</option>
                    </select>
                    @error('oferta')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                    @enderror
                </div>
                {{-- Botones --}}
                <div class="card-footer text-muted d-flex justify-content-end align-items-center px-0 mx-0 mt-3">
                    <div class="col-md-2">
                        <a href="{{ route('solicitudes.index') }}" class="btn btn-danger d-flex justify-content-center align-items-center">
                            <i class="material-icons">close</i>
                            <strong>Cancelar</strong>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success d-flex justify-content-center align-items-center">
                            <i class="material-icons">add</i>
                            <strong>Crear</strong>
                        </button>
                    </div>
                </div>
            </form>
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