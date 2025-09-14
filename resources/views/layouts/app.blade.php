<!Doctype html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') | HARMONIE DU SAVOIR</title>



    <meta name="description" content="@yield('description', 'Regards sur les Moteurs du Progrès.')">

    <!-- Open Graph (Facebook, LinkedIn, WhatsApp) -->
    <meta property="og:title" content="@yield('title', 'COMPLEXE SCOLAIRE HARMONIE DU SAVOIR')">
    <meta property="og:description" content="@yield('description', 'Regards sur les Moteurs du Progrès.')">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image" content="@yield('image', asset('logo_blanc.jpg'))">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'COMPLEXE SCOLAIRE HARMONIE DU SAVOIR')">
    <meta name="twitter:description" content="@yield('description', 'Regards sur les Moteurs du Progrès.')">
    <meta property="og:image:type" content="image/jpeg">
    <meta name="twitter:image" content="@yield('image', asset('logo_blanc.jpg'))">


    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/odometer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

</head>

<body>
<!-- sidebar-information-area-start -->
<div class="sidebar-info side-info">
    <div class="sidebar-logo-wrapper mb-25">
        <div class="row align-items-center">
            <div class="col-xl-6 col-8">
                <div class="sidebar-logo">
                    <a href="index.html"><img src="assets/img/logo/logo-white.png" alt="logo-img"></a>
                </div>
            </div>
            <div class="col-xl-6 col-4">
                <div class="sidebar-close-wrapper text-end">
                    <button class="sidebar-close side-info-close"><i class="fal fa-times"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-menu-wrapper fix">
        <div class="mobile-menu"></div>
    </div>
</div>
<div class="offcanvas-overlay"></div>
<!-- sidebar-information-area-end -->

@include('partials._header')

<main>
    @yield('content')
</main>

@include('partials._footer')



<!-- JS here -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/odometer.min.js') }}"></script>
<script src="{{ asset('assets/js/appear.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>

<!-- Mirrored from themephi.net/template/eduan/eduan/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 14 Sep 2025 02:13:54 GMT -->
</html>
