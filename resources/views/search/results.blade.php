@extends('layouts.app')

@section('content')
    <article class="container">
        <h1 class="flex items-center mb-8 text-xl font-normal leading-tight lg:text-3xl xl:text-4xl">
            @svg('icons/covid-all', 'w-8 h-8 mr-3')
            <span>{{ __('search.resultsFor', ['query' => $query]) }}</span>
        </h1>

        <div class="grid gap-4 lg:grid-cols-3">
            <x-section-button label="Ultimele informații oficiale" :url="route('search', ['query' => $query, 'type' => 'news'])" :active="$type === 'news'" />
            <x-section-button label="Hotărâri și legislație" :url="route('search', ['query' => $query, 'type' => 'decision'])" :active="$type === 'decision'" />
            <x-section-button label="Înregistrări video" :url="route('search', ['query' => $query, 'type' => 'video'])" :active="$type === 'video'" />
        </div>

        <div class="grid gap-12 py-16 lg:grid-cols-3">
            <div class="grid row-gap-12 lg:col-span-2">
                <section>
                    <h1 class="mb-4 text-lg font-normal leading-tight lg:text-2xl xl:text-3xl">
                        {{ __("content.{$type}.title") }}
                    </h1>
                    <div class="grid row-gap-10">
                        @if ($type == 'video')
                            @forelse ($results['items'] as $item)
                                <x-content-card :item="$item" :read-more="false" />
                            @empty
                                <p>{{ __('search.noResults') }}</p>
                            @endforelse
                        @else
                            @forelse ($results['items'] as $item)
                                <x-content-card :item="$item" :route="$results['route']" />
                            @empty
                                <p>{{ __('search.noResults') }}</p>
                            @endforelse
                        @endif
                    </div>
                </section>
            </div>

            @include('partials.sidebar')
        </div>
    </article>
@endsection
