<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestión de Prácticas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="background-image: url({{asset('images/Fondo.jpg')}});">
    <div style="background-color: rgba(0, 94, 144, 0.75);">

        <div class="container vh-100 d-flex align-items-center justify-content-center">
            <div class="container-fluid">
                <div class="row bg-light rounded shadow p-4">
                    
                    {{-- Logotipo --}}
                    <div class="col-lg-8 col-md-7 text-white d-flex flex-column justify-content-center mb-4 mb-md-0">
                        <div class="row">
                            <div class="col-1">
                                <img src="{{ asset('images/Logo_UTFSM.png') }}" alt="Logo UTFSM" style="max-width: 80px; height: auto;">
                            </div>
                            <div class="col ms-3">
                                <h1 class="display-4 fw-bold text-black"><strong>USM</strong></h1>
                            </div>
                        </div>
                        <h3 class="fw-light text-black">Gestión de Prácticas</h3>
                        <p class="fs-5 mt-3 text-black">En esta plataforma podrás inscribir y buscar tus prácticas, ya sean profesionales o industriales.</p>
                    </div>
                    {{-- /* Logotipo --}}
    
                    {{-- Menú --}}
                    <div class="col-lg-4 col-md-5">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title text-center mb-3"><strong>Acceder a la Plataforma</strong></h5>
    
                                <p class="card-text text-center">Inicio de Sesión</p>
                                <div class="mb-3 d-grid">
                                    <a href="{{ route('usuarios.login') }}" class="btn btn-primary "
                                        style="background-color: #005E90; border-color: #005E90; ">Iniciar Sesión</a>
                                </div>
    
                                <hr>
    
                                <p class="card-text text-center">Cuentas Empresas</p>
                                <div class="d-grid">
                                    <a type="button" class="btn btn-outline-ligth"
                                        style="border-color: #005E90; color: #005E90;">Crear Cuenta</a> 
                                </div>
                                    
                            </div>
                        </div>
                    </div>
                    {{-- /* Menú --}}
    
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
