<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- <meta name="author" content="Creative Tim"> -->
        <title>Jewepe | @yield('title')</title>
        <!-- Favicon -->
        <link rel="icon" href="{{ asset('assets/img/brand/favicon.png') }}" type="image/png">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
        <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
        <!-- Icons -->
        <link rel="stylesheet" href="{{ asset('assets') }}/vendor/nucleo/css/nucleo.css" type="text/css">
        <link rel="stylesheet" href="{{ asset('assets') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
        <!-- Page plugins -->
        <link rel="stylesheet" href="{{ asset('assets') }}/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="{{ asset('assets') }}/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
        <link rel="stylesheet" href="{{ asset('assets') }}/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
        <link rel="stylesheet" href="{{ asset('assets') }}//vendor/select2/dist/css/select2.min.css">
        <!-- Argon CSS -->
        <link rel="stylesheet" href="{{ asset('assets') }}/css/argon.css?v=1.1.0" type="text/css">
        
        <!-- Optional Alert -->
        <link rel="stylesheet" href="{{ asset('assets') }}/vendor/sweetalert2/dist/sweetalert2.min.css">
        @yield('css')
    </head>

   
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.navbars.sidebar')
        @endauth
        
        <div class="main-content" id="panel">
            @include('layouts.navbars.navbar')
            <!-- include('sweetalert::alert') -->
            @include('sweetalert::alert')
            @yield('content')
        </div>

        @guest()
            @include('layouts.footers.guest')
        @endguest

        <!-- Core -->
        <script src="{{ asset('assets') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('assets') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('assets') }}/vendor/js-cookie/js.cookie.js"></script>
        <script src=".{{ asset('assets') }}/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
        
        <!-- Optional JS -->

        <script src="{{ asset('assets') }}/vendor/select2/dist/js/select2.min.js"></script>
        <script src="{{ asset('assets') }}/js/jQuery.print.js"></script>
        <script src="{{ asset('assets') }}/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
        <script src="{{ asset('assets') }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="{{ asset('assets') }}/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="{{ asset('assets') }}/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="{{ asset('assets') }}/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="{{ asset('assets') }}/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="{{ asset('assets') }}/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="{{ asset('assets') }}/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="{{ asset('assets') }}/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
        <script src="{{ asset('assets') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('assets') }}/vendor/chart.js/dist/Chart.extension.js"></script>
        <script src="{{ asset('assets') }}/vendor/dropzone/dist/min/dropzone.min.js"></script>


        @yield('optionaljs')
        <script src="{{ asset('assets') }}/js/argon.js"></script>
        
        <!-- Demo JS - remove this in your project -->
        <!-- <script src="{{ asset('assets') }}/js/newsupply.js"></script>  -->
        @yield('scripts')
    </body>
</html>