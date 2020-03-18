@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.section-header')

        <div class="grid gap-12 py-16 lg:grid-cols-3">
            <section class="lg:col-span-2">
                <h1 class="mb-4 text-lg font-normal leading-tight lg:text-2xl xl:text-3xl">
                    Înregistrări video
                </h1>

                <x-content-card :item="$item" :read-more="false" />

                <x-share :item="$item"/>

                <div class="my-8 rich-text break-words">
                    {!! $item->content !!}
                </div>

                <x-share :item="$item"/>
            </section>

            @include('partials.sidebar')
        </div>
    </div>
@endsection



