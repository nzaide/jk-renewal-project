<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield("title"){{ __('J-K Network Services') }}</title>
    <meta name="description" content="@yield('description'){{ __('J-K Network Services - Jobs in the Philippines, Job Search & Job Opportunities') }}">
    <meta name="keywords" content="@yield('keywords'){{ __('Jobs,Philippines,Search,Opportunities,J-K Network Services') }}">

    <meta property="og:title" content="{{ __('J-K Network Services - Jobs in the Philippines, Job Search & Job Opportunities') }}">
    <meta property="og:site_name" content="{{ __('J-K Network Services') }}">
    <meta property="og:description" content="@yield('og_description'){{ __('J-K Network Services - Jobs in the Philippines, Job Search & Job Opportunities') }}">
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="og:image" content="{{ url('img/ogp1200x630V4.png') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&amp;family=Poppins:wght@300;400;500;600;700&amp;display=swap">
    @vite('resources/scss/app.scss')
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="https://unpkg.com/flickity-fade@1/flickity-fade.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="shortcut icon" href="{{ url('img/faviconV4.png') }}">
    @vite('resources/vendor/jk-network-static/style.css')
    @stack('style')
</head>
<body>
    @include('layouts.applicant.header')
    <main id="app">
        @yield('body')
    </main>
    @include('layouts.applicant.footer')
    @vite('resources/js/app.js')
    <script src="https://unpkg.com/imagesloaded@4.1.4/imagesloaded.pkgd.min.js"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://unpkg.com/flickity-fade@1/flickity-fade.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    @vite('resources/vendor/jk-network-static/index.js')
    @stack('script')
</body>

</html>