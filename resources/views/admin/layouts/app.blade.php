<!DOCTYPE html>
<html lang="en">

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

<body id="admin">
    <div class="nav">
        <div class="col-3 text-center p-2 bg-white text-mango"><i class="fa-solid fa-paw h1 m-0"></i></div>
        <div class="col p-2 bg-navbar navbar">
            <h1 class="m-0">Pasir Kucing</h1>
            <a id="navbarDropdown" class="bg-navbar dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                <i class="fa-solid fa-user fa-2xl"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('admin.index') }}">Admin Page</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
    <div class="row m-0 p-0">
        <div class="col-3 bg-sidebar sidebar">
            <ul class="nav flex-column">
                <li class="nav-item{{ Route::currentRouteName() == 'admin.about-us' ? ' active' : '' }}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#aboutus" role="button"
                        aria-expanded="false" aria-controls="aboutus">Tentang Kami</a>
                </li>
                <div class="collapse{{ Route::currentRouteName() == 'admin.about-us' ? ' show' : '' }}" id="aboutus">
                    <li class="nav-item ps-3">
                        <a class="nav-link" href="{{ route('admin.about-us', 'history') }}">Sejarah</a>
                    </li>
                    <li class="nav-item ps-3">
                        <a class="nav-link" href="{{ route('admin.about-us', 'vision') }}">Visi</a>
                    </li>
                    <li class="nav-item ps-3">
                        <a class="nav-link" href="{{ route('admin.about-us', 'mission') }}">Misi</a>
                    </li>
                    <li class="nav-item ps-3">
                        <a class="nav-link" href="{{ route('admin.about-us', 'certificate') }}">Sertifikat</a>
                    </li>
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.service.index') }}">Layanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.product.index') }}">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.clientcate.index') }}">Jenis Klien</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.client.index') }}">Klien</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.portfoliocate.index') }}">Kategori Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.portfolio.index') }}">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.contact.index') }}">Kontak Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.offer.index') }}">Penawaran</a>
                </li>
            </ul>
            <div class="sidebar-rest"></div>
        </div>
        <div class="col p-3">
            @yield('content')
        </div>
    </div>
</body>

</html>
