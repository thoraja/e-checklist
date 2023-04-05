<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>{{ config('app.name') }}</title>

    {{-- Google Font: Source Sans Pro --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    {{-- Font Awesome Icons --}}
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    {{-- Theme style --}}
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    {{-- Styles stack --}}
    @stack('styles')
</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/checklist-icon.png') }}" width="30" class="d-inline-block align-top" alt="{{ config('app.name') }} Logo">
                <span class="brand-text font-weight-bold text-uppercase">{{ config('app.name') }}</span>
            </a>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
            </div>
        </div>
    </nav>
    {{-- /.navbar --}}
    {{ $slot }}
    <footer class="bg-light">
        <div class="container py-3">
            <strong>Copyright &copy; 2021 <a href="">Thoraja</a>.</strong> All rights reserved.
            <div class="float-right d-none d-sm-inline">
            Pertamina
            </div>
        </div>
    </footer>
    @stack('modals')
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
    @stack('scripts')
</body>

</html>
