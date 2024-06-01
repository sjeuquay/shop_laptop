<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/Site/bootstrap.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('css/Site/magnific-popup.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/Site/font-awesome.css') }}">
    <!-- Fancybox -->
    <link rel="stylesheet" href="{{ asset('css/Site/jquery.fancybox.min.css') }}">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="{{ asset('css/Site/themify-icons.css') }}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('css/Site/niceselect.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('css/Site/animate.css') }}">
    <!-- Flex Slider CSS -->
    <link rel="stylesheet" href="{{ asset('css/Site/flex-slider.min.css') }}">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('css/Site/owl-carousel.css') }}">
    <!-- Slicknav -->
    <link rel="stylesheet" href="{{ asset('css/Site/slicknav.min.css') }}">

    <!-- Eshop StyleSheet -->
    <link rel="stylesheet" href="{{ asset('css/Site/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Site/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Site/responsive.css') }}">
    @stack('product')
    <title>@yield('title')</title>
</head>

<body class="js">


    @include('Site.header')

    @yield('content')

    @include('Site.footer')

    <!-- Jquery -->
    <script src="{{ asset('js/Site/jquery.min.js') }}"></script>
    <script src="{{ asset('js/Site/jquery-migrate-3.0.0.js') }}"></script>
    <script src="{{ asset('js/Site/jquery-ui.min.js') }}"></script>
    <!-- Popper JS -->
    <script src="{{ asset('js/Site/popper.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('js/Site/bootstrap.min.js') }}"></script>
    <!-- Color JS -->
    <script src="{{ asset('js/Site/colors.js') }}"></script>
    <!-- Slicknav JS -->
    <script src="{{ asset('js/Site/slicknav.min.js') }}"></script>
    <!-- Owl Carousel JS -->
    <script src="{{ asset('js/Site/owl-carousel.js') }}"></script>
    <!-- Magnific Popup JS -->
    <script src="{{ asset('js/Site/magnific-popup.js') }}"></script>
    <!-- Waypoints JS -->
    <script src="{{ asset('js/Site/waypoints.min.js') }}"></script>
    <!-- Countdown JS -->
    <script src="{{ asset('js/Site/finalcountdown.min.js') }}"></script>
    <!-- Nice Select JS -->
    <script src="{{ asset('js/Site/nicesellect.js') }}"></script>
    <!-- Flex Slider JS -->
    <script src="{{ asset('js/Site/flex-slider.js') }}"></script>
    <!-- ScrollUp JS -->
    <script src="{{ asset('js/Site/scrollup.js') }}"></script>
    <!-- Onepage Nav JS -->
    <script src="{{ asset('js/Site/onepage-nav.min.js') }}"></script>
    <!-- Easing JS -->
    <script src="{{ asset('js/Site/easing.js') }}"></script>
    <!-- Active JS -->
    <script src="{{ asset('js/Site/active.js') }}"></script>
    <script src="{{ asset('js/Site/scipt.js') }}"></script>

    @stack('modal')
    @stack('quantity')
</body>

</html>
