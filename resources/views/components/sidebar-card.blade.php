@php

@endphp


<div class="">
    <div class="flex bg-gray-300">
        <i class="w-3 {{ $card['color']['bg'] }}"></i>
        <h1 class="flex-1 px-4 py-6">{{ $card['title'] }}</h1>
    </div>

    @if ($card['text'] || isset($card['button']))
        <div class="px-6 py-4 bg-gray-100">
            @if ($card['text'])
                <p class="mb-4">{{ $card['text'] }}</p>
            @endif

            @if (isset($card['button']))
                <a
                    href="{{ $card['button']['url'] }}"
                    class="block text-center tracking-wide py-2 px-4 hover:opacity-75 transition-opacity duration-100 focus:outline-none focus:shadow-outline rounded font-bold text-base w-full {{ $card['color']['bg'] }} {{ $card['color']['text'] }}"
                >
                    {{ $card['button']['label'] }}
                </a>
            @endif
        </div>
    @endif
</div>

