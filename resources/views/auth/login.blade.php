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

    <style>
        * {
            font-family: 'Urbanist', sans-serif !important;
        }

        body {
            background-color: #f4f6f9;
        }

        .login-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            width: 100%;
            max-width: 450px;
            background-color: #fff;
            border: 5px solid #4337F1;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(67, 55, 241, 0.25);
            border-color: #4337F1;
        }

        .btn-login {
            background-color: #4337F1;
            color: white;
            padding: 10px 16px;
            border-radius: 6px;
            border: none;
        }

        .btn-login:hover {
            background-color: #2f27b6;
        }

        a.text-link {
            color: #4337F1;
            font-size: 0.875rem;
            text-decoration: none;
        }

        a.text-link:hover {
            text-decoration: underline;
        }
    </style>
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
