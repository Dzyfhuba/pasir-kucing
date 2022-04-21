<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body id="public">
    <div id="app">
        @if (!(Request::is('login') || Request::is('register')))
            <nav class="navbar navbar-expand-lg navbar-color fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <i class="fa-solid fa-bars"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link{{ Request::is('/') ? ' active' : '' }}"
                                    href="{{ route('home') }}">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link{{ Request::is('offer/*') ? ' active' : '' }}"
                                    href="{{ route('offer') }}">Penawaran</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link{{ Request::is('about/*') ? ' active' : '' }}"
                                    href="{{ route('about') }}">Tentang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link{{ Request::is('service/*') ? ' active' : '' }}"
                                    href="{{ route('service') }}">Layanan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link{{ Request::is('product/*') ? ' active' : '' }}"
                                    href="{{ route('product') }}">Produk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link{{ Request::is('portfolio/*') ? ' active' : '' }}"
                                    href="{{ route('portfolio') }}">Portofolio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link{{ Request::is('client/*') ? ' active' : '' }}"
                                    href="{{ route('client') }}">Klien</a>
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link guest" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link guest"
                                            href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('admin.index') }}">Admin Page</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        @endif

        <main class="bg-white">
            @if (Request::is('/'))
                @include('home.head')
            @elseif(Request::is('login') || Request::is('register'))
            @else
                @include('layouts.headcomp')
            @endif
            @yield('content')
        </main>
    </div>
</body>

</html>
