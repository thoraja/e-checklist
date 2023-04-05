<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>{{ config('app.name') }} | {{ ucwords($title) }}</title>

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

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        {{-- Navbar --}}
        @include('layouts.components.navbar')
        {{-- /.navbar --}}

        {{-- Sidebar --}}
        @include('layouts.components.sidebar')
        {{-- /.sidebar --}}

        {{-- Content Wrapper. Contains page content --}}
        <div class="content-wrapper">
            {{-- Content Header (Page header) --}}
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col">
                            <h1 class="m-0">{{ ucwords($title) }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            {{-- /.content-header --}}

            {{-- Main content --}}
            <div class="content">
                <div class="container-fluid">
                    {{ $slot }}
                </div>
            </div>
            {{-- /.content --}}
        </div>

        {{-- /.content-wrapper --}}

        {{-- Footer --}}
        @include('layouts.components.footer')
        {{-- /.footer --}}
    </div>
    {{-- ./wrapper --}}

    {{-- REQUIRED SCRIPTS --}}

    {{-- jQuery --}}
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    {{-- Bootstrap 4 --}}
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    {{-- AdminLTE App --}}
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
    {{-- Scripts stack --}}
    @stack('scripts')
</body>

</html>
