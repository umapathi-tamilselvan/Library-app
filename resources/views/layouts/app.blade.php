<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Metronic CSS -->
    <link href="{{ asset('path-to-metronic/css/style.bundle.css') }}" rel="stylesheet">
    <!-- Metronic JS -->
    <script src="{{ asset('path-to-metronic/js/scripts.bundle.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="app-blank">
    <div id="app">
        <!-- Metronic Header -->
        <header id="kt_header" class="header align-items-stretch">
            <div class="container-fluid d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <!-- Logo -->
                    <a href="{{ url('/') }}" class="navbar-brand">
                        <img src="{{ asset('path-to-metronic/media/logos/logo.png') }}" alt="Logo" class="logo">
                    </a>
                </div>

                <!-- Navbar -->
                <div class="d-flex align-items-center">
                    <!-- Left Side of Navbar (Optional) -->
                    <ul class="navbar-nav me-auto"></ul>

                    <!-- Right Side of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
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
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </header>

        <!-- Metronic Main Content -->
        <main class="py-4">
            @yield('content')
        </main>

        <!-- Metronic Footer -->
        <footer class="footer py-4">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <div class="text-muted">
                    &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
                </div>
                <div class="text-muted">
                    <a href="https://www.yourwebsite.com/privacy-policy" class="text-decoration-none">Privacy Policy</a> |
                    <a href="https://www.yourwebsite.com/terms-of-service" class="text-decoration-none">Terms of Service</a>
                </div>
            </div>
        </footer>
    </div>

    <!-- Metronic JS -->
    <script src="{{ asset('path-to-metronic/js/scripts.bundle.js') }}"></script>
</body>
</html>
