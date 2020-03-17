<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! SEO::generate() !!}

    <link href="{{ asset(mix('app.css', 'assets')) }}" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/images/favicons/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/images/favicons/manifest.json') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <meta name="msapplication-config" content="{{ asset('assets/images/favicons/browserconfig.xml') }}">
</head>
<body class="flex flex-col min-h-screen font-light">
    @include('partials.header')

    <main class="flex-1 py-20 md:text-lg">
        @yield('content')
    </main>

    @include('partials.footer')
    @include('partials.analytics')

    <script src="{{ asset(mix('manifest.js', 'assets')) }}"></script>
    <script src="{{ asset(mix('vendor.js', 'assets')) }}"></script>
    <script src="{{ asset(mix('app.js', 'assets')) }}"></script>
</body>
</html>
