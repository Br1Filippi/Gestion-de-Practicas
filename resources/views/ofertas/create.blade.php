@extends('templates.master')

@section('contenido-principal')
    <div class="col-10">
        <div class="d-flex justify-content-center align-items-center vh-95">
            <div class="card text-center" style="width: 50%;">
                <div class="card-header bg-white shadow-sm mt-2 pb-3">

                    {{-- Titulo de la oferta --}}
                    <h5 class="d-flex"><strong>Titulo:</strong></h5>
                    <input type="text" name="titulo" class="form-control" placeholder="Contador Auditor en Santiago">

                    {{-- Url de la empresa --}}
                    <a href="{{$empresa->url_web}}" class="d-flex">{{$empresa->url_web}}</a>

                    {{-- Ubicacion de la Oferta --}}
                    <h5 class="d-flex"><strong>Ubicacion</strong></h5>
                    <div class="row mb-3">
                        <div class="col-4">
                            <select name="region" id="region-select" class="form-control">
                                <option value="">Seleccione Región</option>
                                @foreach ($regiones as $region)
                                    <option value="{{ $region->id }}">{{ $region->nombre }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <select name="comuna" id="comuna-select" class="form-control">
                                <option value="">Seleccione Comuna</option>
                            </select>
                        </div>
                    </div>

                    {{-- Carrera relacionada con la Oferta --}}
                    <h5 class="d-flex mb-2"><strong>Carrera</strong></h5>
                    <div class="col-4 mb-3">
                        <select name="carrera" class="form-control">
                            <option value="">Seleccione Carrera</option>
                            @foreach ($carreras as $carrera)
                                <option value="{{ $carrera->id }}">{{ $carrera->nombre }} </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Tipo de Oferta y Cupos --}}
                    <div class="row mb-3">
                        <div class="col-4 mb-3">
                            <h5 class="d-flex mb-2"><strong>Tipo de Oferta</strong></h5>
                            <select name="tipo" class="form-control fs-6">
                                <option value="">Seleccione Tipo</option>
                                @foreach ($tipos as $tipo)
                                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <h5 class="d-flex"><strong>Cantidad de Cupos</strong></h5>
                            <input type="number" name="cupos" class="form-control" placeholder="4">
                        </div>
                    </div>
                    {{-- /*Tipo de Oferta y Cupos --}}
                </div>

                {{-- Descripcion de Oferta --}}
                <div class="card-body" style="height: calc(60vh - 150px); overflow: hidden;">
                    <h5 class="d-flex">
                        <strong>Descripcion</strong>
                    </h5>
                    <textarea class="form-control " style="height: calc(60vh)" id="descripcion" placeholder="Describe tu Oferta aqui..."></textarea>
                </div>
                {{-- /*Descripcion de Oferta --}}
                
                {{-- Footer --}}
                <div class="card-footer text-muted d-flex justify-content-end align-items-center">

                    {{-- Botones --}}
                    <a href="{{route('ofertas.index')}}" class="btn text-white btn-danger d-flex justify-content-center align-items-center mx-2">
                        <i class="material-icons text-white">close</i>
                        <strong>Cancelar</strong>
                    </a>
                    <a href="" class="btn text-white btn-success d-flex justify-content-center align-items-center mx-2">
                        <i class="material-icons text-white">check</i>
                        <strong>Crear</strong>
                    </a>
                </div>
                {{-- /*Footer --}}
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
    <script>
        // Inicializar CKEditor 
        ClassicEditor
        
            .create(document.querySelector('#descripcion'), {
                toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList']
                
            })
            .catch(error => {
                console.error(error);
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
