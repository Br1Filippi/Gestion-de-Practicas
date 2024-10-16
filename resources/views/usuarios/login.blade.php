<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion de Practicas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body style="background-color: #005E90">

    <div class="container vh-100 d-flex align-items-center">
        <div class="row w-100">
            <div class="offset-1 col-10 offset-md-3 col-md-6 d-flex justify-content-center">
                <div class="card w-100">
                    <div class="card-body">
                        <h5 class="card-title mb-4"><strong>Iniciar Sesión</strong></h5>
                        <form method="POST" action="">
                            @csrf
                            {{-- Input Email --}}
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            </div>
                            {{-- /*Input Email --}}

                            {{-- Input Password --}}
                            <div class="mb-3">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            {{-- /*Input Password --}}


                            <div class="mb-3 d-grid gap-2 d-md-block text-end">
                                <button type="submit" class="btn" style="background-color: #005E90">Ingresar</button>
                            </div>
                            

                        </form>

                        {{-- Errores --}}
                        @if($errors->any())
                        <div class="alert alert-danger py-1">
                            {{ $errors->all()[0] }}
                        </div>
                        @endif
                        {{-- /Errores --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
  </html>
    