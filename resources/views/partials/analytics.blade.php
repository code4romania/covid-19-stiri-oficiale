{{-- Global site tag (gtag.js) - Google Analytics --}}
@if (config('analytics.trackId'))
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('analytics.trackId') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{ config('analytics.trackId') }}');
    </script>
@endif
