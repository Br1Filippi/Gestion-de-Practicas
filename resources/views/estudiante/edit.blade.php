@extends('templates.master')

@section('contenido-principal')
<div class="col-9">
    <div class="container d-flex align-items-center justify-content-center">
        <div class="card custom-card shadow-sm" style="width: 70%; max-height: 90vh; overflow-y: auto;">
            <form method="POST" action="{{route('estudiantes.update',$estudiante->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-header bg-white">

                    {{-- Correo del usuario --}}
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="correo_usuario" name="correo_usuario"
                            value="{{$estudiante->usuario->correo_usuario }}">
                    </div>

                    {{-- Contraseña --}}
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="password" name="password"
                            value="{{$estudiante->usuario->password}}">
                    </div>

                    {{-- Nombre --}}
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre"
                            name="nombre" value="{{ old('nombre', $estudiante->usuario->nombre) }}">
                        @error('nombre')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Apellido --}}
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido:</label>
                        <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido"
                            name="apellido" value="{{ old('apellido', $estudiante->usuario->apellido) }}">
                        @error('apellido')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Imagen --}}
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Foto de Perfil:</label>
                        <input type="file" class="form-control @error('imagen') is-invalid @enderror" id="imagen"
                            name="imagen">
                        @error('imagen')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Edad --}}
                    <div class="mb-3">
                        <label for="edad_estudiante" class="form-label">Edad:</label>
                        <input type="number" class="form-control @error('edad_estudiante') is-invalid @enderror"
                            id="edad_estudiante" name="edad_estudiante"
                            value="{{ old('edad_estudiante', $estudiante->edad_estudiante) }}">
                        @error('edad_estudiante')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- RUT --}}
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="rut_estudiante" name="rut_estudiante"
                            value="{{$estudiante->rut_estudiante }}">
                    </div>

                    {{-- Dirección --}}
                    <div class="mb-3">
                        <label for="direccion_estudiante" class="form-label">Dirección:</label>
                        <input type="text" class="form-control @error('direccion_estudiante') is-invalid @enderror"
                            id="direccion_estudiante" name="direccion_estudiante"
                            value="{{ old('direccion_estudiante', $estudiante->direccion_estudiante) }}">
                        @error('direccion_estudiante')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Carrera --}}
                    <div class="mb-3">
                        <input type="hidden" class="form-control" name="carrera" value="{{$estudiante->carrera->id }}">
                    </div>

                    {{-- Teléfono --}}
                    <div class="mb-3">
                        <label for="fono_estudiante" class="form-label">Teléfono:</label>
                        <input type="text" class="form-control @error('fono_estudiante') is-invalid @enderror"
                            id="fono_estudiante" name="fono_estudiante"
                            value="{{ old('fono_estudiante', $estudiante->fono_estudiante) }}">
                        @error('fono_estudiante')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="desc_estudiante" class="form-label"><strong>Acerca de mi:</strong></label>
                        @error('desc_estudiante')
                        <div class="text-danger d-flex" style="font-size: 0.8rem;">{{ $message }}</div>
                        @enderror
                        <textarea class="form-control @error('desc_estudiante') is-invalid @enderror"
                            id="desc_estudiante"
                            name="desc_estudiante">{{ old('desc_estudiante', $estudiante->desc_estudiante) }}</textarea>
                    </div>
                </div>
                <div class="card-footer">
                    {{-- Botones --}}
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('usuarios.perfil') }}"
                            class="btn btn-danger me-2"><strong>Cancelar</strong></a>
                        <button type="submit" class="btn btn-success"><strong>Actualizar</strong></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
<script>
    // Inicializar CKEditor 
    ClassicEditor.create(document.querySelector('#desc_estudiante'), {
        toolbar: ['bold', 'italic', 'link', 'bulletedList', 'numberedList']
    }).catch(error => {
        console.error(error);
    });

    // Sincronizar el contenido del CKEditor al formulario antes de enviarlo
    document.querySelector('form').addEventListener('submit', function() {
        const editorData = document.querySelector('#desc_estudiante').nextSibling.querySelector('.ck-content').innerHTML;
        document.querySelector('#desc_estudiante').value = editorData;
    });
</script>
@endsection