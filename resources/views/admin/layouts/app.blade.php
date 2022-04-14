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
        <div class="col p-2 bg-navbar">
            <h1 class="m-0">Pasir Kucing</h1>
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
                    <a class="nav-link" href="#">Layanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Jenis Klien</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Klien</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kategori Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#portfolio" role="button"
                        aria-expanded="false" aria-controls="portfolio">Portfolio</a>
                </li>
                <div class="collapse" id="portfolio">
                    <li class="nav-item ps-3">
                        <a class="nav-link" href="">Foto</a>
                    </li>
                    <li class="nav-item ps-3">
                        <a class="nav-link" href="">Video</a>
                    </li>
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kontak Kami</a>
                </li>
            </ul>
        </div>
        <div class="sidebar-rest"></div>
        <div class="col p-3">
            @yield('content')
        </div>
    </div>
</body>

</html>
