<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
  ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Bootstrap CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/admin/bootstrap.min.css') }}">
    <!-- Bootstrap CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/admin/font-awesome.min.css') }}">
    <!-- nalika Icon CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/admin/nalika-icon.css') }}">
    <!-- owl.carousel CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/admin/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/owl.transitions.css') }}">
    <!-- animate CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/admin/animate.css') }}">
    <!-- normalize CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/admin/normalize.css') }}">
    <!-- meanmenu icon CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/admin/meanmenu.min.css') }}">
    <!-- main CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/admin/main.css') }}">
    <!-- morrisjs CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/admin/morrisjs/morris.css') }}">
    <!-- mCustomScrollbar CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/admin/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <!-- metisMenu CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/admin/metisMenu/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/metisMenu/metisMenu-vertical.css') }}">
    <!-- calendar CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/admin/calendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/calendar/fullcalendar.print.min.css') }}">
    <!-- style CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    <!-- responsive CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ asset('css/admin/responsive.css') }}">
    <!-- modernizr JS
  ============================================ -->
    <script src="{{ asset('js/admin/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    @include('admin.sidebar')
    <div class="all-content-wrapper" style="position: relative">
        @include('admin.header')

        @yield('admin')

        @include('admin.footer')
    </div>

    <!-- jquery
  ============================================ -->
    <script src="{{ asset('js/admin/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- bootstrap JS
            ============================================ -->
    <script src="{{ asset('js/admin/bootstrap.min.js') }}"></script>
    <!-- wow JS
            ============================================ -->
    <script src="{{ asset('js/admin/wow.min.js') }}"></script>
    <!-- price-slider JS
            ============================================ -->
    <script src="{{ asset('js/admin/jquery-price-slider.js') }}"></script>
    <!-- meanmenu JS
            ============================================ -->
    <script src="{{ asset('js/admin/jquery.meanmenu.js') }}"></script>
    <!-- owl.carousel JS
            ============================================ -->
    <script src="{{ asset('js/admin/owl.carousel.min.js') }}"></script>
    <!-- sticky JS
            ============================================ -->
    <script src="{{ asset('js/admin/jquery.sticky.js') }}"></script>
    <!-- scrollUp JS
            ============================================ -->
    <script src="{{ asset('js/admin/jquery.scrollUp.min.js') }}"></script>
    <!-- mCustomScrollbar JS
            ============================================ -->
    <script src="{{ asset('js/admin/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/admin/scrollbar/mCustomScrollbar-active.js') }}"></script>
    <!-- metisMenu JS
            ============================================ -->
    <script src="{{ asset('js/admin/metisMenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('js/admin/metisMenu/metisMenu-active.js') }}"></script>
    <!-- morrisjs JS
            ============================================ -->
    <script src="{{ asset('js/admin/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('js/admin/sparkline/jquery.charts-sparkline.js') }}"></script>
    <!-- calendar JS
            ============================================ -->
    <script src="{{ asset('js/admin/calendar/moment.min.js') }}"></script>
    <script src="{{ asset('js/admin/calendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('js/admin/calendar/fullcalendar-active.js') }}"></script>
    <!-- float JS
            ============================================ -->
    <script src="{{ asset('js/admin/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('js/admin/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('js/admin/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('js/admin/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('js/admin/flot/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('js/admin/flot/curvedLines.js') }}"></script>
    <script src="{{ asset('js/admin/flot/flot-active.js') }}"></script>
    <!-- plugins JS
            ============================================ -->
    <script src="{{ asset('js/admin/plugins.js') }}"></script>
    <!-- main JS
            ============================================ -->
    <script src="{{ asset('js/admin/main.js') }}"></script>
</body>

</html>
