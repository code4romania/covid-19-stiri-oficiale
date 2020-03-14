@extends('layouts.app')

@section('content')
    <article class="container flex flex-col items-center py-24">
        <h1 class="flex items-center mb-20 text-2xl font-normal leading-tight lg:text-4xl xl:text-5xl">
            @svg('icons/covid-all', 'w-8 h-8 mr-3')
            <span>{{ __('errors.404') }}</span>
        </h1>

        <a href="{{ url('/') }}" class="px-4 py-2 text-base font-bold tracking-wide text-center text-white transition-opacity duration-100 bg-blue-500 rounded curspo hover:opacity-75 focus:outline-none focus:shadow-outline">{{ __('errors.back') }}</a>
    </article>
@endsection
