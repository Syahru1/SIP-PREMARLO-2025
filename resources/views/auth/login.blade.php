<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | COMPQUEST</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

    <!-- Fonts & Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="{{ asset('assets/css/partial/login.css') }}" rel="stylesheet">
</head>
<body>

<div class="login-wrapper">
    <div class="login-card">
        <h3 class="fw-bold text-center mb-4">COMPQUEST</h3>

        <form action="/dashboard" method="get">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" class="form-control shadow-sm" placeholder="Masukkan Username Anda">
            </div>

            <div class="mb-2">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-control shadow-sm" placeholder="Masukkan Password Anda">
            </div>

            <div class="d-flex justify-content-end mb-4">
                <a class="text-link" href="#">Lupa Password</a>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-login">Login</button>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
