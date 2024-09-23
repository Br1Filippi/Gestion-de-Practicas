@extends('templates.master')

@section('contenido-principal')
    <div class="col-10">
        <div class="d-flex justify-content-center align-items-center vh-95">

            <div class="card text-center" style="width: 50%;">
                <div class="card-header bg-white shadow-sm mt-2 pb-3">

                    <form method="POST" action="{{route('ofertas.store')}}">
                        @csrf

                        {{-- Título de la oferta --}}
                        <h5 class="d-flex"><strong>Título:</strong></h5>
                        <input 
                            type="text" 
                            name="titulo" 
                            class="form-control @error('titulo') is-invalid @enderror" 
                            placeholder="Contador Auditor en Santiago" 
                            value="{{ old('titulo') }}"
                        >
                        @error('titulo')
                            <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                        @enderror

                        {{-- Url de la empresa --}}
                        <a href="{{$empresa->url_web}}" class="d-flex my-3">{{$empresa->url_web}}</a>

                        {{-- Ubicación de la Oferta --}}
                        <h5 class="d-flex"><strong>Ubicación</strong></h5>
                        <div class="row mb-3">
                            <div class="col-4">
                                <select name="region" id="region-select" class="form-control @error('region') is-invalid @enderror">
                                    <option value="">Seleccione Región</option>
                                    @foreach ($regiones as $region)
                                        <option value="{{ $region->id }}" {{ old('region') == $region->id ? 'selected' : '' }}>
                                            {{ $region->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('region')
                                    <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <select name="comuna" id="comuna-select" class="form-control @error('comuna') is-invalid @enderror">
                                    <option value="">Seleccione Comuna</option>
                                </select>
                                @error('comuna')
                                    <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Carrera relacionada con la Oferta --}}
                        <h5 class="d-flex mb-2"><strong>Carrera</strong></h5>
                        <div class="col-4 mb-3">
                            <select name="carrera" class="form-control @error('carrera') is-invalid @enderror">
                                <option value="">Seleccione Carrera</option>
                                @foreach ($carreras as $carrera)
                                    <option value="{{ $carrera->id }}" {{ old('carrera') == $carrera->id ? 'selected' : '' }}>
                                        {{ $carrera->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('carrera')
                                <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Tipo de Oferta y Cupos --}}
                        <div class="row mb-3">
                            <div class="col-4 mb-3">
                                <h5 class="d-flex mb-2"><strong>Tipo de Oferta</strong></h5>
                                <select name="tipo" class="form-control fs-6 @error('tipo') is-invalid @enderror">
                                    <option value="">Seleccione Tipo</option>
                                    @foreach ($tipos as $tipo)
                                        <option value="{{ $tipo->id }}" {{ old('tipo') == $tipo->id ? 'selected' : '' }}>
                                            {{ $tipo->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('tipo')
                                    <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4">
                                <h5 class="d-flex"><strong>Cantidad de Cupos</strong></h5>
                                <input 
                                    type="number" 
                                    name="cupos" 
                                    class="form-control @error('cupos') is-invalid @enderror" 
                                    placeholder="4" 
                                    value="{{ old('cupos') }}"
                                >
                                @error('cupos')
                                    <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- Descripción de Oferta --}}
                    <div class="card-body" style="height:{{ $errors->any() ? 'calc(50vh - 150px)' : 'calc(58vh - 150px)' }}; overflow:auto;">
                        <h5 class="d-flex">
                            <strong>Descripción</strong>
                        </h5>
                        @error('descripcion')
                            <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                        @enderror
                        <textarea 
                            class="form-control @error('descripcion') is-invalid @enderror" 
                            style="height: calc(60vh)" 
                            id="descripcion" 
                            name="descripcion">{{ old('descripcion') }}</textarea>
                    </div>

                    {{-- Footer --}}
                    <div class="card-footer text-muted d-flex justify-content-end align-items-center px-0 mx-0">

                        {{-- Botones --}}
                        <a href="{{route('ofertas.index')}}" class="btn text-white btn-danger d-flex justify-content-center align-items-center mx-2">
                            <i class="material-icons text-white">close</i>
                            <strong>Cancelar</strong>
                        </a>
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
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
    <script>

        // Inicializar CKEditor 
        ClassicEditor.create(document.querySelector('#descripcion'), {
            toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList']
        }).catch(error => {
            console.error(error);
        });

        // Sync del plugin para que se guarde en la base de datos
        document.querySelector('form').addEventListener('submit', function() {
            const editorData = document.querySelector('#descripcion').nextSibling.querySelector('.ck-content').innerHTML;
            document.querySelector('#descripcion').value = editorData;
        });

        // Script de mostrar la comuna dependiendo de la región
        document.getElementById('region-select').addEventListener('change', function() {
            const regionId = this.value;
            const comunaSelect = document.getElementById('comuna-select');

            if (regionId) {
                fetch(`/comunas/${regionId}`)
                    .then(response => response.json())
                    .then(data => {
                        comunaSelect.innerHTML = '<option value="">Seleccione Comuna</option>';
                        data.comunas.forEach(comuna => {
                            const option = document.createElement('option');
                            option.value = comuna.id;
                            option.textContent = comuna.nombre;
                            comunaSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching comunas:', error));
            } else {
                comunaSelect.innerHTML = '<option value="">Seleccione Comuna</option>';
            }
        });
    </script>
@endsection
