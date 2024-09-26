<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion de Practicas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="background-color: #005E90">

    <div class="container vh-100 d-flex align-items-center">
        <div class="row w-100">
            <div class="offset-1 col-10 offset-md-3 col-md-6 d-flex justify-content-center">
                <div class="card w-100">
                    <div class="row g-0">
                        {{-- Columna del formulario --}}
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title mb-4"><strong>Iniciar Sesión</strong></h5>
                                <form method="POST" action="{{ route('usuarios.autenticar') }}">
                                    @csrf
                                    {{-- Input Email --}}
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ old('email') }}">
                                    </div>
                                    {{-- /*Input Email --}}

                                    {{-- Input Password --}}
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                    {{-- /*Input Password --}}

                                    <div class="mb-3 d-grid gap-2 d-md-block text-end">
                                        <button type="submit" class="btn text-white" style="background-color: #005E90"><strong>Ingresar</strong></button>
                                    </div>
                                </form>

                                {{-- Errores --}}
                                @if ($errors->any())
                                    <div class="alert alert-danger py-1">
                                        {{ $errors->all()[0] }}
                                    </div>
                                @endif
                                {{-- /Errores --}}
                            </div>
                        </div>
                        {{-- /* Columna del formulario --}}

                        {{-- Columna de la imagen --}}
                        <div class="col-md-4 d-flex align-items-center justify-content-center bg-light">
                            <img src="{{asset('images/usm_login.jpg')}}" alt="Imagen login" class="img-fluid rounded-end" style="height: 100%; width: auto;">
                        </div>
                        {{-- /* Columna de la imagen --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
