@foreach($feeds as $name => $feed)
    <link rel="alternate" type="{{ $feed['type'] ?? 'application/atom+xml' }}" href="{{ asset(route("feeds.{$name}", null, false)) }}" title="{{ $feed['title'] }}">
@endforeach
