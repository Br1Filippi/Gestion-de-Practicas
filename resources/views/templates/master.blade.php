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
    <nav class="navbar navbar-expand-lg navbar-light flex-column vh-100 p-3" style="width: 250px; background-color: #005E90;">
        
        {{-- Logotipo --}}
        <a class="navbar-brand d-flex align-items-center mb-4" href="#">
            <img src="{{ asset('images/Logo_UTFSM.png') }}" alt="Logo UTFSM" style="max-width: 80px; height: auto;">
            <h1 class="text-white"><strong>USM</strong></h1>
        </a>
        {{-- /*Logotipo --}}

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse flex-column d-flex justify-content-between h-100" id="navbarNav">

            {{-- Menu de Navegacion  --}}
            <ul class="navbar-nav flex-column w-100 list-group">

                {{-- Empresas --}}
                {{-- @if(Route::current()->getName()=='home.index') active @endif" --}}
                <a class="list-group-item list-group-item-action d-flex align-items-center " href="">
                    <span class="material-icons me-2 ">view_list</span>
                    Ofertas
                </a>
                <a class="list-group-item list-group-item-action d-flex align-items-center" href="">
                    <span class="material-icons me-2 ">groups</span>
                    Practicantes
                </a>
                {{-- Empresas --}}


            </ul>
            {{-- Menu de Navegacion  --}}

            {{-- Perfil  --}}
            <ul class="navbar-nav flex-column w-100">
                <li class="nav-item">
                    <hr class="dropdown-divider" />
                    <a class="nav-link text-white d-flex align-items-center fs-4 py-4" href="#">
                        <span class="material-icons me-2 fs-3">person</span>
                        Perfil
                    </a>
                </li>
            </ul>
            {{-- /*Perfil  --}}

        </div>
    </nav>
    {{-- /*Navbar --}}

    {{-- Pagina Principal --}}
    <div class="p-3 pt-1">
        @yield('contenido-principal')
    </div>
{{-- /Pagina Principal --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
