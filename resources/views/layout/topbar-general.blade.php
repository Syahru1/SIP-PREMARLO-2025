<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Link ke file CSS eksternal -->
    <link href="{{ asset('assets/css/partial/topbar.css') }}" rel="stylesheet">
</head>

<body>

    <div class="container-fluid fixed-top d-flex justify-content-between align-items-center navbar-custom">
        
        <!-- Navigasi Menu -->
        <ul class="navbar-nav flex-row gap-3 mb-0">
            <li class="nav-item">
               <a class="nav-link nav-link-beranda" href="{{ url('/#beranda') }}">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-custom" href="{{ url('/#tentang') }}">Tentang</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-custom" href="{{ url('/#prestasi') }}">Prestasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-custom" href="{{ url('/#faq') }}">FAQ</a>
            </li>
        </ul>

        <!-- Tombol Login -->
        <a href="{{ route('login') }}" class="btn btn-login">Login</a>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
