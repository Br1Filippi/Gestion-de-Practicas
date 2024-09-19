@extends('templates.master')

@section('contenido-principal')
    <div class="col-10">
        <div class="d-flex justify-content-center align-items-center vh-95">

            <div class="card text-center" style="width: 50%;">
                <div class="card-header bg-white shadow-sm mt-2 pb-3">

                    <form method="POST" action="{{route('ofertas.update',$oferta->id)}}">
                        @csrf
                        @method('PUT')
                        {{-- Titulo de la oferta --}}
                        <h5 class="d-flex"><strong>Titulo:</strong></h5>
                        <input type="text" name="titulo" class="form-control" placeholder="Contador Auditor en Santiago" value="{{ $oferta->titulo }}">

                        {{-- Url de la empresa --}}
                        <a href="{{$empresa->url_web}}" class="d-flex my-3">{{$empresa->url_web}}</a>

                        {{-- Ubicacion de la Oferta --}}
                        <h5 class="d-flex"><strong>Ubicacion</strong></h5>
                        <div class="row mb-3">
                            <div class="col-4">
                                <select name="region" id="region-select" class="form-control" >
                                    <option value="{{$oferta->region->id}}">{{$oferta->region->nombre}}</option>
                                    @foreach ($regiones as $region)
                                        <option value="{{ $region->id }}">{{ $region->nombre }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <select name="comuna" id="comuna-select" class="form-control" >
                                    <option value="{{$oferta->comuna->id}}">{{$oferta->comuna->nombre}}</option>
                                </select>
                            </div>
                        </div>

                        {{-- Carrera relacionada con la Oferta --}}
                        <h5 class="d-flex mb-2"><strong>Carrera</strong></h5>
                        <div class="col-4 mb-3">
                            <select name="carrera" class="form-control" >
                                <option value="{{$oferta->carrera->id}}">{{$oferta->carrera->nombre}}</option>
                                @foreach ($carreras as $carrera)
                                    <option value="{{ $carrera->id }}">{{ $carrera->nombre }} </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Tipo de Oferta y Cupos --}}
                        <div class="row mb-3">
                            <div class="col-4 mb-3">
                                <h5 class="d-flex mb-2"><strong>Tipo de Oferta</strong></h5>
                                <select name="tipo" class="form-control fs-6" >
                                    <option value="{{$oferta->tipo->id}}">{{$oferta->tipo->nombre}}</option>
                                    @foreach ($tipos as $tipo)
                                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <h5 class="d-flex"><strong>Cantidad de Cupos</strong></h5>
                                <input type="number" name="cupos" class="form-control" placeholder="4" value="{{$oferta->cupos}}">
                            </div>
                        </div>
                        {{-- /*Tipo de Oferta y Cupos --}}
                    </div>

                        {{-- Descripcion de Oferta --}}
                        <div class="card-body" style="height: calc(58vh - 150px); overflow:auto;">
                            <h5 class="d-flex">
                                <strong>Descripcion</strong>
                            </h5>
                            <textarea class="form-control" style="height: calc(60vh)" id="descripcion" name="descripcion">{{ old('descripcion', $oferta->descripcion) }}</textarea>
                        </div>
                        {{-- /*Descripcion de Oferta --}}
                    
                    {{-- Footer --}}
                    <div class="card-footer text-muted d-flex justify-content-end align-items-center">

                        {{-- Botones --}}
                        <a href="{{route('ofertas.index')}}" class="btn text-white btn-danger d-flex justify-content-center align-items-center mx-2">
                            <i class="material-icons text-white">close</i>
                            <strong>Cancelar</strong>
                        </a>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-warning text-white d-flex justify-content-center align-items-center">
                                <i class="material-icons">edit</i>
                                <strong>Editar</strong>
                            </button>
                        </div>
                    </div>
                    {{-- /*Footer --}}

                    {{-- Errores --}}
                    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title  d-flex justify content-center aling-items-center" id="errorModalLabel"><strong>!Error!</strong></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @if ($errors->any())
                                        <ul class="list-unstyled">
                                            @foreach ($errors->all() as $error)
                                                <li class="text-danger">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- /*Errores --}}

                    </form>

                </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
    <script>

        //Modal de errores
        document.addEventListener('DOMContentLoaded', function () {
            @if ($errors->any())
                var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                errorModal.show();
            @endif
        });

        // Inicializar CKEditor 
        ClassicEditor
        
            .create(document.querySelector('#descripcion'), {
                toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList']
                
            })
            .catch(error => {
                console.error(error);
            });
        
        //Sync del plugin para que se guarde en la base de datos
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
