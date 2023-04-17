<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" value="{{ csrf_token() }}">
    @vite('resources/js/admin/app.js')
    @vite('resources/admin_scss/admin.scss')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&amp;display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{ url('img/faviconV4.png') }}">
    <title>@yield("title")</title>
    @stack('styles')
</head>

<body class="h-100 bg-section-secondary">
    <div class="wrapper">
        @include('layouts.admin.header')
        <div class="content-wrapper py-5">
            <div class="content">
                <div class="container px-0">
                    <div class="row justify-content-center">
                        @auth('admin')
                        @include('layouts.admin.sidebar')
                        @endauth
                        <div class="col-10 pb-5">
                            <main id="app">
                                @yield("content")
                            </main>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stack('modals')
    @stack('scripts')
</body>

</html>