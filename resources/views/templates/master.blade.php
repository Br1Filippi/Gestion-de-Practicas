<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion de Practicas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/trumbowyg@2.27.3/dist/ui/trumbowyg.min.css">
</head>

<body class="d-flex">
    <nav class="navbar navbar-expand-lg navbar-dark flex-column vh-100 p-3"
        style="width: 250px; background-color: #005E90;">
        {{-- Logo USM  --}}
        <a class="navbar-brand d-flex align-items-center mb-4" href="https://usm.cl/">
            <img src="{{ asset('images/Logo_UTFSM.png') }}" alt="Logo UTFSM" style="max-width: 80px; height: auto;">
            <h1 class="text-white fs-3 ms-2"><strong>USM</strong></h1>
        </a>
        {{-- /*Logo USM  --}}


        {{-- Menú de Navegación --}}
        <div class="collapse navbar-collapse flex-column d-flex justify-content-between h-100 w-100" id="navbarNav">
            <ul class="navbar-nav flex-column w-100 mb-4">

                {{-- Opciones de empresas --}}
                @if (Gate::allows('empresa-gestion') or Gate::allows('estudiante-gestion'))
                    <li class="nav-item mb-3 rounded"
                        onmouseover="this.classList.add('bg-secondary')"onmouseout="this.classList.remove('bg-secondary')">
                        <a class="nav-link text-white d-flex align-items-center" href="{{ route('ofertas.index') }}">
                            <span class="material-icons me-2 ">format_list_bulleted</span>
                            Ofertas
                        </a>
                    </li>
                @endif

                @if (Gate::allows('empresa-gestion'))

                    <li class="nav-item mb-3 rounded"
                        onmouseover="this.classList.add('bg-secondary')"onmouseout="this.classList.remove('bg-secondary')">
                        <a class="nav-link text-white d-flex align-items-center" href="{{route('supervisores.index')}}">
                            <span class="material-icons me-2">supervisor_account</span>
                            Supervisores
                        </a>
                    </li>
                @endif

                @if(Gate::allows('supervisor-gestion')) 
                    <li class="nav-item mb-3 rounded"
                        onmouseover="this.classList.add('bg-secondary')"onmouseout="this.classList.remove('bg-secondary')">
                        <a class="nav-link text-white d-flex align-items-center" href="{{route('practicas.practicantes')}}">
                            <span class="material-icons me-2">groups</span>
                            Practicantes
                        </a>
                    </li>   

                @endif
                {{-- /*Opciones de empresas --}}


            </ul>

            {{-- Perfil y Logout --}}
            <ul class="navbar-nav flex-column w-100 mt-auto ">
                <li class="nav-item py-0 bg-transparent border-0">
                    <div class="d-flex align-items-center justify-content-between rounded"
                        onmouseover="this.classList.add('bg-secondary')"onmouseout="this.classList.remove('bg-secondary')">
                        <a href="{{route('usuarios.perfil')}}" class="nav-link text-white d-flex fs-4 py-4" href="#">
                            <span class="material-icons me-2 fs-3">person</span>
                            Perfil
                        </a>
                        <a href="{{ route('usuarios.logout') }}"
                            class="btn btn-sm btn-danger d-flex align-items-center">
                            <span class="material-icons text-white">logout</span>
                        </a>
                    </div>
                </li>
            </ul>
            {{-- /*Perfil y Logout --}}

        </div>
        {{-- /*Menú de Navegación --}}
    </nav>

    {{-- Contenido Principal --}}
    <div class="flex-grow-1 p-4" style="background-color:#F6FBFF">
        @yield('contenido-principal')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>

</html>
