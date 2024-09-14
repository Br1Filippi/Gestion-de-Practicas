<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion de Practicas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body style="background-color: #005E90">
    <div class="container vh-100 d-flex align-items-center justify-content-center">
        <div class="container-fluid">
            <div class="row">
          
                {{-- Logotipo --}}
                <div class="col-8">
    
                    <div class="row text-white">
                        <h1><strong>USM</strong></h1>
                        <h3>Gestion de Practicas</h3>
                    </div>
    
                    <div class="row text-white">
                        <h5>Aca podras inscribir y encontrar tus practicas tanto profesionales como industriales bla bla</h5>
                    </div>
    
                </div>
                {{--/* Logotipo --}}
                
                {{-- Menu --}}
                <div class="col-4">
    
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title "><strong>Acceder a la Plataforma</strong></h5>

                          <p class="card-text">Inicio de Sesion</p>
                          <div class="mb-3 mx-auto d-grid">
                            <a href="{{ route('usuarios.login') }}"  class="btn btn-primary " role="button" aria-disabled="true" style="background-color: #005E90">Iniciar Sesion</a>
                            </div>

                          <p class="card-text">Cuentas empresas</p>
                          <div class="mb-3 mx-auto d-grid">
                            <button type="submit" class="btn text-white" style="background-color: #005E90">Crear Cuenta</button>
                            </div>

                        </div>
                    </div>
                {{--/* Menu --}}

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>