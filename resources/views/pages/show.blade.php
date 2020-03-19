@extends('layouts.app')

@section('content')
    <article class="container">
        <h1 class="flex items-center text-xl font-normal leading-tight lg:text-3xl xl:text-4xl">
            @svg('icons/covid-all', 'w-8 h-8 mr-3')
            <span>{{ $item->title }}</span>
        </h1>

        <x-share />

        <div class="grid gap-12 py-16 lg:grid-cols-3">
            <div class="break-words lg:col-span-2 rich-text">
                {!! $item->content !!}
            </div>

            @include('partials.sidebar')
        </div>
    </article>
@endsection
