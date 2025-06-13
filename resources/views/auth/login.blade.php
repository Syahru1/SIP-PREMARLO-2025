<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | COMPQUEST</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet"> --}}
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link href="{{ asset('assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('plugins/sweetalerts/promise-polyfill.js') }}"></script>
    <link href="{{ asset('plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/sweetalerts/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/components/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <!-- Fonts & Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="{{ asset('assets/css/partial/login.css') }}" rel="stylesheet">
</head>

<body>

    <div class="login-wrapper">
        <div class="login-card">
            <h3 class="fw-bold text-center mb-4">COMPQUEST</h3>

            <form action="{{ url('login') }}" method="POST" id="form-login">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" class="form-control shadow-sm"
                        placeholder="Masukkan Username Anda">
                </div>

                <div class="mb-2">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" class="form-control shadow-sm"
                        placeholder="Masukkan Password Anda">
                </div>

                {{-- <div class="d-flex justify-content-end mb-4">
                    <a class="text-link" href="#">Lupa Password</a>
                </div> --}}

                <div class="d-grid">
                    <button type="submit" class="btn btn-login">Login</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert Library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ asset('plugins/highlight/highlight.pack.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="{{ asset('assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('assets/js/forms/bootstrap_validation/bs_validation_script.js') }}"></script>
    <script src="{{ asset('plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalerts/custom-sweetalert.js') }}"></script>
    <!--  END CUSTOM SCRIPTS FILE  -->
    <script>
        // Tambahkan meta csrf-token di head jika belum ada
        if ($('meta[name="csrf-token"]').length === 0) {
            $('head').append('<meta name="csrf-token" content="{{ csrf_token() }}">');
        }

        // Setup CSRF token untuk AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Validasi dan submit form login
        $(document).ready(function() {
            $('#form-login').on('submit', function(e) {
                e.preventDefault();

                // Hapus error sebelumnya
                $('.invalid-feedback').remove();
                $('.is-invalid').removeClass('is-invalid');

                let username = $('#username').val().trim();
                let password = $('#password').val().trim();
                let valid = true;

                // Validasi username
                if (username.length < 6 || username.length > 10) {
                    $('#username').addClass('is-invalid')
                        .after(
                            '<span class="invalid-feedback d-block">Username harus 4-20 karakter.</span>');
                    valid = false;
                }

                // Validasi password
                if (password.length < 5 || password.length > 16) {
                    $('#password').addClass('is-invalid')
                        .after(
                            '<span class="invalid-feedback d-block">Password harus 5-20 karakter.</span>');
                    valid = false;
                }

                if (!valid) return;

                // AJAX login
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: {
                        username: username,
                        password: password,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.status) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message,
                            }).then(function() {
                                window.location = response.redirect;
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan',
                                text: response.message
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Kesalahan',
                            text: 'Username atau password salah.'
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>
