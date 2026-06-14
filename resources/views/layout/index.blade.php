<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TechDev Solutions - Enterprise App Development')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/select2-bootstrap-5-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/all.min.css') }}">
    <link href="{{ asset('assets/vendor/select2/select2.min.css') }}" rel="stylesheet" />

    <style>
        /* Global Styles */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            /* Warna background abu-abu kebiruan muda */
            color: #334155;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            /* Memastikan body selalu setinggi layar penuh */
        }

        html {
            scroll-behavior: smooth;
            /* Efek scroll halus saat klik menu navbar */
        }

        /* Glassmorphism Navbar */
        .navbar-custom {
            background: rgba(15, 23, 42, 0.95) !important;
            /* Warna dark blue elegan */
            backdrop-filter: blur(10px);
            /* Efek kaca/blur di belakang navbar */
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease-in-out;
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .navbar-brand span {
            color: #3b82f6;
            /* Aksen titik warna biru primary */
        }

        .nav-link {
            font-weight: 600;
            font-size: 0.95rem;
            margin-left: 15px;
            color: #cbd5e1 !important;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #3b82f6 !important;
        }

        /* Main Content Wrapper */
        main {
            flex: 1;
            /* Mendorong footer otomatis selalu ke paling bawah */
        }

        /* Modern Footer */
        .footer-custom {
            background-color: #0f172a;
            color: #94a3b8;
            border-top: 3px solid #3b82f6;
        }

        .footer-icon {
            color: #94a3b8;
            transition: 0.3s;
        }

        .footer-icon:hover {
            color: #3b82f6;
        }

        /* Custom Scrollbar (Opsional untuk estetika) */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
    @yield('js')
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top py-3 shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">TechDev<span>.</span></a>

            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}#beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}#layanan">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}#review">Ulasan Klien</a></li>

                    <li class="nav-item ms-lg-4 mt-3 mt-lg-0">
                        <a class="btn btn-primary rounded-pill px-4 fw-semibold shadow-sm"
                            href="{{ url('/') }}#kontak">
                            Hubungi Kami
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
        @yield('modal')
    </main>

    <footer class="footer-custom py-5 mt-auto">
        <div class="container">
            <div class="row gy-4 align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <h5 class="text-white fw-bold mb-2">TechDev<span>.</span></h5>
                    <p class="mb-0 small">Membangun Ekosistem Digital yang Tangguh, Aman, dan Terukur.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="d-inline-flex gap-3">
                        <a href="#" class="footer-icon text-decoration-none"><i class="bi bi-github fs-5"></i></a>
                        <a href="#" class="footer-icon text-decoration-none"><i
                                class="bi bi-linkedin fs-5"></i></a>
                        <a href="#" class="footer-icon text-decoration-none"><i
                                class="bi bi-envelope-fill fs-5"></i></a>
                    </div>
                </div>
            </div>
            <hr class="border-secondary opacity-25 my-4">
            <div class="text-center small">
                &copy; {{ date('Y') }} TechDev Solutions. All rights reserved.
            </div>
        </div>
    </footer>
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/font-awesome/all.min.js') }}"></script>
    @yield('js')
    @stack('scripts')
</body>

</html>
