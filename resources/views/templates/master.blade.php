<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Empresas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light flex-column vh-100 p-3" style="width: 250px; background-color: #005E90; ">

        {{-- Logotipo --}}
        <a class="navbar-brand d-flex align-items-center mb-4" href="#">
            <img src="{{ asset('images/Logo_UTFSM.png') }}" alt="Logo UTFSM" style="max-width: 80px; height: auto;">
            <h1 class="text-white"><strong>USM</strong></h1>
        </a>
        {{-- /*Logotipo --}}

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-column d-flex" id="navbarNav">
            <ul class="navbar-nav flex-column w-100">
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Características</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Precios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Acerca de</a>
                </li>
                <li class="nav-item mt-auto">
                    <hr class="dropdown-divider" />
                    <a class="nav-link text-white d-flex align-items-center" href="#">
                        <span class="material-icons me-2">person</span>
                        Perfil
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    {{-- /*Navbar --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
