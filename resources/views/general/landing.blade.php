<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <title>SIRLO - Landing</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}"/>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <style>
        * {
            font-family: 'Urbanist', sans-serif !important;
        }
    </style>

    @stack('styles')
</head>
<body class="bg-light">

    <!-- Topbar General -->
    @include('layout.topbar-general')

    <!-- Content -->
     <!-- Halaman Awal -->
    <section id="beranda" class="d-flex align-items-center justify-content-center text-center bg-white" style="min-height: 100vh;">
        <div class="container">
            <h1 class="fw-bold display-4 text-dark">Selamat Datang di <span class="text-custom" style="color: #4337F1;">COMPQUEST</span></h1>
            <p class="lead text-secondary">Empower Your Vision. Drive Your Success</p>
           
        </div>
    </section>

    <!-- Tentang -->
   <section id="tentang" class="d-flex align-items-center justify-content-center text-start bg-light" style="min-height: 100vh; padding: 3rem 1rem;">
    <div class="container">
        <h1 class="fw-bold display-4 mb-4 text-dark">
        Tentang <span class="text-custom" style="color: #4337F1;">COMPQUEST</span>
        </h1>
        <p class="lead text-secondary mb-4" style="max-width: 700px; line-height: 1.6;">
        COMPQUEST adalah platform inovatif yang membantu Anda mewujudkan visi dan mencapai kesuksesan.  
        Kami berkomitmen memberikan solusi terbaik untuk kebutuhan Anda dengan teknologi terkini dan pendekatan yang tepat sasaran.<br><br>
        Didukung oleh <strong>JTI Polinema</strong>, kami siap menjadi partner andalan Anda.
        </p>
    </div>
  </section>

  <!-- Prestasi Mahasiswa -->
   <section id="prestasi" class="d-flex align-items-center justify-content-center text-start bg-white" style="min-height: 100vh; padding: 3rem 1rem;">
    <div class="container">
            <h2 class="mb-4 text-center text-dark fw-bold">Leaderboard Mahasiswa Berprestasi</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center" style="width: 60px;">#</th>
                            <th>Nama Mahasiswa</th>
                            <th class="text-center" style="width: 80px;">Poin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="assets/img/90x90.jpg" class="rounded-circle me-3 border border-dark mr-4" width="40" height="40" alt="avatar">
                                    <span>Shaun</span>
                                </div>
                            </td>
                            <td class="text-center">640</td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="assets/img/90x90.jpg" class="rounded-circle me-3 border border-dark mr-4" width="40" height="40" alt="avatar">
                                    <span>Sheep</span>
                                </div>
                            </td>
                            <td class="text-center">320</td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="assets/img/90x90.jpg" class="rounded-circle me-3 border border-dark mr-4" width="40" height="40" alt="avatar">
                                    <span>Timmy</span>
                                </div>
                            </td>
                            <td class="text-center">160</td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </section>



    <!-- FAQ Section -->
    <section id="faq" class="py-5 bg-white">
    <div class="container">
        <h2 class="mb-5 text-start text-dark fw-bold">FAQ</h2>

        <div class="mb-4">
        <h5 class="fw-semibold text-dark">Apa itu COMPQUEST?</h5>
        <p class="text-secondary" style="max-width: 800px;">
            COMPQUEST adalah platform kompetisi digital yang dirancang untuk mewadahi mahasiswa dalam berinovasi, bersaing, dan mengembangkan kemampuan mereka di bidang teknologi.
        </p>
        </div>

        <div class="mb-4">
        <h5 class="fw-semibold text-dark">Siapa saja yang bisa ikut serta?</h5>
        <p class="text-secondary" style="max-width: 800px;">
            Semua mahasiswa aktif dari berbagai jurusan dan perguruan tinggi di Indonesia dapat ikut serta dalam kompetisi yang tersedia di COMPQUEST.
        </p>
        </div>

        <div class="mb-4">
        <h5 class="fw-semibold text-dark">Apakah mengikuti kompetisi dikenakan biaya?</h5>
        <p class="text-secondary" style="max-width: 800px;">
            Umumnya gratis, tetapi beberapa kompetisi mungkin memerlukan biaya pendaftaran yang akan diinformasikan di halaman detail masing-masing lomba.
        </p>
        </div>
    </div>
    </section>

    @include('layout.footer')


    <!-- Scripts -->
    <script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/active-section.js') }}"></script>


    @stack('scripts')
</body>

</html>
