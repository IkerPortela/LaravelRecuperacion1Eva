<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    <li class="nav-item {{ request()->routeIs('departments.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('departments.index') }}">{{ __('Departamentos') }}</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('categories.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('categories.index') }}">{{ __('Categorias') }}</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('incidences.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('incidences.index') }}">{{ __('Incidencias') }}</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('priorities.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('priorities.index') }}">{{ __('Prioridades') }}</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('statuses.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('statuses.index') }}">{{ __('Estados') }}</a>
                    </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesion
                                        ') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguestexitr
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="{{ route('departments.index') }}" class="nav-link px-2 text-body-secondary">Departamentos</a></li>
                <li class="nav-item"><a href="{{ route('categories.index') }}" class="nav-link px-2 text-body-secondary">Categorias</a></li>
                <li class="nav-item"><a href="{{ route('incidences.index') }}" class="nav-link px-2 text-body-secondary">Incidencias</a></li>
                <li class="nav-item"><a href="{{ route('priorities.index') }}" class="nav-link px-2 text-body-secondary">Prioridades</a></li>
                <li class="nav-item"><a href="{{ route('statuses.index') }}" class="nav-link px-2 text-body-secondary">Estados</a></li>
            </ul>
            <p class="text-center text-body-secondary">© 2023 Compañia, S.A</p>
        </footer>
</div>
</body>
</html>