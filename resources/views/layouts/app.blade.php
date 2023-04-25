<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('') }}">

    <title>{{ config('app.name', 'MyPaninda') }}</title>

    <!-- SEO Meta Tags-->
    <meta name="description" content="mypaninda">
    <meta name="keywords" content="mypaninda, shopping, ecommerce, networking">
    <meta name="author" content="mypaninda">

    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <meta name="msapplication-TileColor" content="#111">
    <meta name="theme-color" content="#ffffff">

    <!-- Owl Slider -->
    <link rel="stylesheet" href="{{ asset('css/assets/owl.carousel.min.css') }}">

    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="{{ asset('css/vendor.min.css') }}">
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" id="main-styles" href="{{ asset('css/theme.min.css') }}">
    <!-- Customizer styles and scripts-->
    @stack('styles')
    <style>
        a.nav-link {
            color: #444444!important;
        }

        @media (min-width: 992px){
            a.nav-link {
                color: #fff!important;
            }
        }
    </style>
  </head>

  <!-- Body-->
  <body>
    @include('partials.header')

    @yield('content')

    @include('partials.footer')

    <!-- Utils -->
    @auth
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    @endauth

    <!-- JavaScript (jQuery) libraries, plugins and custom scripts -->
    <script src="{{ asset('js/vendor.min.js') }}"></script>
    <script src="{{ asset('js/theme.min.js') }}"></script>

    @stack('scripts')
  </body>
</html>
