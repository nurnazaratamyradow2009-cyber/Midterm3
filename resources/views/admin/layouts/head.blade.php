<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('app.admin.title') }}</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css.map') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
    <style>
        body {
            background: linear-gradient(135deg, #e9f2ff 0%, #f9fbff 100%);
            color: #1f2937;
            min-height: 100vh;
        }
        .bg-primary-custom {
            background: linear-gradient(135deg, #4f46e5 0%, #22c55e 100%) !important;
        }
        .btn-primary-custom, .btn-primary-custom:hover {
            border-radius: 12px;
        }
        .card-soft {
            border-radius: 22px;
            box-shadow: 0 18px 45px rgba(15, 23, 42, 0.08);
            border: none;
        }
    </style>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js.map') }}"></script>
</head>

<body>
    
    @include('admin.partials.navbar')

    @yield('main-content')

</body>

</html>