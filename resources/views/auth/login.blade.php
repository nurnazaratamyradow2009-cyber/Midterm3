<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('app.auth.login_title') }}</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

        body {
            background: radial-gradient(circle at 10% 20%, rgb(239, 246, 255) 0%, rgb(219, 234, 254) 100%);
            min-height: 100vh;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #1e293b;
        }

        .login-card {
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.6);
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
        }

        .login-header {
            font-size: 2.75rem;
            font-weight: 800;
            letter-spacing: -1.5px;
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .form-control-custom {
            border-radius: 12px;
            padding: 12px 16px 12px 45px;
            border: 1px solid #cbd5e1;
            background-color: #f8fafc;
            transition: all 0.2s ease;
        }

        .form-control-custom:focus {
            background-color: #fff;
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.15);
        }

        .input-group-custom {
            position: relative;
        }

        .input-group-custom i.input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 1.2rem;
            z-index: 10;
        }

        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            cursor: pointer;
            z-index: 10;
            transition: color 0.2s;
        }

        .password-toggle:hover {
            color: #2563eb;
        }

        .btn-login {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
            transition: all 0.2s;
        }

        .btn-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.3);
        }

        .lang-dropdown {
            background-color: rgba(37, 99, 235, 0.06);
            color: #2563eb;
            font-weight: 600;
            border: none;
            border-radius: 10px;
            padding: 6px 14px;
        }

        .lang-dropdown:hover,
        .lang-dropdown:focus {
            background-color: rgba(37, 99, 235, 0.12);
            color: #1d4ed8;
        }
    </style>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>

<body>
    <div class="container min-vh-100 d-flex flex-column justify-content-center py-5">
        <div class="row justify-content-center w-100 m-0">
            <div class="col-11 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">

                <div class="d-flex justify-content-end mb-3">
                    <div class="dropdown">
                        <button class="btn lang-dropdown dropdown-toggle d-flex align-items-center gap-1" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-globe2 small"></i>
                            {{ strtoupper(app()->getLocale()) }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm p-1 mt-2 rounded-3">
                            <li>
                                <a class="dropdown-item rounded-2 d-flex justify-content-between align-items-center {{ app()->getLocale() == 'en' ? 'active' : '' }}"
                                    href="locale/en">
                                    English @if(app()->getLocale() == 'en') <i class="bi bi-check-lg ms-2"></i> @endif
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item rounded-2 d-flex justify-content-between align-items-center {{ app()->getLocale() == 'tm' ? 'active' : '' }}"
                                    href="locale/tm">
                                    Türkmen @if(app()->getLocale() == 'tm') <i class="bi bi-check-lg ms-2"></i> @endif
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item rounded-2 d-flex justify-content-between align-items-center {{ app()->getLocale() == 'ru' ? 'active' : '' }}"
                                    href="locale/ru">
                                    Русский @if(app()->getLocale() == 'ru') <i class="bi bi-check-lg ms-2"></i> @endif
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card login-card p-4 p-sm-5">

                    <div class="text-center mb-4">
                        <div class="login-header">CoreTech</div>
                        <p class="text-muted small mt-1 mb-0">{{ __('app.auth.secure_inventory') }}</p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger border-0 rounded-3 mb-4 py-2 small text-break shadow-sm"
                            role="alert">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-secondary">{{ __('app.auth.username') }}</label>
                            <div class="input-group-custom">
                                <i class="bi bi-person input-icon"></i>
                                <input type="text" name="username" value="{{ old('username') }}"
                                    class="form-control form-control-custom" placeholder="Enter your username" required
                                    autofocus>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <label class="form-label small fw-semibold text-secondary mb-0">{{ __('app.auth.password') }}</label>
                            </div>
                            <div class="input-group-custom">
                                <i class="bi bi-shield-lock input-icon"></i>
                                <input type="password" name="password" id="login-pass"
                                    class="form-control form-control-custom" placeholder="Enter your password" required>
                                <i class="bi bi-eye-slash password-toggle" id="toggle-eye"
                                    onclick="togglePasswordVisibility()"></i>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-login w-100 mt-3 text-white mb-3">
                            {{ __('app.auth.login') }}
                        </button>

                        <div class="text-center small text-muted">
                            Don't have an account? <a href="#"
                                class="text-decoration-none text-primary fw-medium">Register</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('login-pass');
            const toggleIcon = document.getElementById('toggle-eye');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
            }
        }
    </script>
</body>

</html>