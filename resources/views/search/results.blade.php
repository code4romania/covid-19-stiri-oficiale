@extends('layouts.app')

@section('content')
    <article class="container">
        <h1 class="flex items-center text-xl font-normal leading-tight lg:text-3xl xl:text-4xl">
            @svg('icons/covid-all', 'w-8 h-8 mr-3')
            <span>{{ __('search.resultsFor', ['query' => $query]) }}</span>
        </h1>

        <div class="grid gap-12 py-16 lg:grid-cols-3">
            <div class="grid row-gap-12 lg:col-span-2">
                @foreach ($results as $group)
                    <section>
                        <h1 class="mb-4 text-lg font-normal leading-tight lg:text-2xl xl:text-3xl">
                            {{ __("content.{$group['model']}.title") }}
                        </h1>

                        <div class="grid row-gap-10">
                            @if ($group['model'] == 'video')
                                @forelse ($group['items'] as $item)
                                    <x-content-card :item="$item" :read-more="false" />
                                @empty
                                    <p>{{ __('search.noResults') }}</p>
                                @endforelse
                            @else
                                @forelse ($group['items'] as $item)
                                    <x-content-card :item="$item" :route="$group['route']" />
                                @empty
                                    <p>{{ __('search.noResults') }}</p>
                                @endforelse
                            @endif
                        </div>
                    </section>
                @endforeach
            </div>

            @include('partials.sidebar')
        </div>
    </article>
@endsection
