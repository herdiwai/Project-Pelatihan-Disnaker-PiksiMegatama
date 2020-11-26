<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Staging Template">
    <meta name="keywords" content="Staging, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Staging | @yield('title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Aldrich&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('assetss/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assetss/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assetss/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assetss/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assetss/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assetss/css/slick.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assetss/css/style.css') }}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__logo">
            <a href="#"><img src="{{ asset('assetss/img/logo.png') }}" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__widget">
            <span>Call us for any questions</span>
            <h4>+01 123 456 789</h4>
        </div>
       
    </div>
    <!-- Offcanvas Menu End -->
    
    <!-- Header Section Begin -->
    @include('frontend.header')
    <!-- Header Section End -->
    
    <!-- Hero Section Begin -->
    <section>
        @yield('content')
    </section>
    <!-- Hero Section End -->

    <!-- Footer Section Begin -->
    @include('frontend.footer')

<!-- Footer Section End -->

@stack('before-scripts')
<!-- Js Plugins -->
<script src="{{ asset('assetss/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assetss/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assetss/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('assetss/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assetss/js/slick.min.js') }}"></script>
<script src="{{ asset('assetss/js/main.js') }}"></script>

@stack('page-script')
</body>

</html>