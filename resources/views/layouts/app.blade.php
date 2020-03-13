<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset(mix('app.css', 'assets')) }}" rel="stylesheet">
</head>
<body class="flex flex-col min-h-screen font-light">
    @include('partials.header')

    <main class="flex-1 py-20 md:text-lg">
        @yield('content')
    </main>

    @include('partials.footer')

    <script src="{{ asset(mix('manifest.js', 'assets')) }}"></script>
    <script src="{{ asset(mix('vendor.js', 'assets')) }}"></script>
    <script src="{{ asset(mix('app.js', 'assets')) }}"></script>
</body>
</html>
