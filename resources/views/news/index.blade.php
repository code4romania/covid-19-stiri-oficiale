@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.section-header')

        <div class="grid gap-12 py-16 lg:grid-cols-3">
            <section class="lg:col-span-2">
                <h1 class="mb-4 text-lg font-normal leading-tight lg:text-2xl xl:text-3xl">
                    Ultimele informații oficiale
                </h1>
{{--             @dd($menu)--}}

                @php
                    $items = [
                        [
                            'date' => \Carbon\Carbon::now(),
                            'title' => 'Apel de la Guvernul României. Ce trebuie să facă cetățenii când primesc mesaje pe Facebook și WhatsApp despre coronavirus',
                            'excerpt' => 'Guvernul României face apel la cetățenii români, prin intermediul unui clip video postat pe rețelele de socializare, să se informeze despre coronavirus doar din surse oficiale și să nu creadă orice informație venită prin intermediul Facebook sau WhatsApp.',
                        ],
                        [
                            'date' => \Carbon\Carbon::now(),
                            'title' => 'Apel de la Guvernul României. Ce trebuie să facă cetățenii când primesc mesaje pe Facebook și WhatsApp despre coronavirus',
                            'excerpt' => 'Guvernul României face apel la cetățenii români, prin intermediul unui clip video postat pe rețelele de socializare, să se informeze despre coronavirus doar din surse oficiale și să nu creadă orice informație venită prin intermediul Facebook sau WhatsApp.',
                        ],
                        [
                            'date' => \Carbon\Carbon::now(),
                            'title' => 'Apel de la Guvernul României. Ce trebuie să facă cetățenii când primesc mesaje pe Facebook și WhatsApp despre coronavirus',
                            'excerpt' => 'Guvernul României face apel la cetățenii români, prin intermediul unui clip video postat pe rețelele de socializare, să se informeze despre coronavirus doar din surse oficiale și să nu creadă orice informație venită prin intermediul Facebook sau WhatsApp.',
                        ],
                        [
                            'date' => \Carbon\Carbon::now(),
                            'title' => 'Apel de la Guvernul României. Ce trebuie să facă cetățenii când primesc mesaje pe Facebook și WhatsApp despre coronavirus',
                            'excerpt' => 'Guvernul României face apel la cetățenii români, prin intermediul unui clip video postat pe rețelele de socializare, să se informeze despre coronavirus doar din surse oficiale și să nu creadă orice informație venită prin intermediul Facebook sau WhatsApp.',
                        ],
                        [
                            'date' => \Carbon\Carbon::now(),
                            'title' => 'Apel de la Guvernul României. Ce trebuie să facă cetățenii când primesc mesaje pe Facebook și WhatsApp despre coronavirus',
                            'excerpt' => 'Guvernul României face apel la cetățenii români, prin intermediul unui clip video postat pe rețelele de socializare, să se informeze despre coronavirus doar din surse oficiale și să nu creadă orice informație venită prin intermediul Facebook sau WhatsApp.',
                        ],
                        [
                            'date' => \Carbon\Carbon::now(),
                            'title' => 'Apel de la Guvernul României. Ce trebuie să facă cetățenii când primesc mesaje pe Facebook și WhatsApp despre coronavirus',
                            'excerpt' => 'Guvernul României face apel la cetățenii români, prin intermediul unui clip video postat pe rețelele de socializare, să se informeze despre coronavirus doar din surse oficiale și să nu creadă orice informație venită prin intermediul Facebook sau WhatsApp.',
                        ],
                    ];
                @endphp

                <div class="grid row-gap-10">
                @foreach ($items as $item)
                    <x-content-card :card="$item" />
                @endforeach
                </div>
            </section>

            @include('partials.sidebar')
        </div>
    </div>
@endsection



