@php
    $menuItems = [
        [
            'url' => '#',
            'label' => 'Link 1',
        ],
        [
            'url' => '#',
            'label' => 'Link 2',
        ],
        [
            'url' => '#',
            'label' => 'Link 3',
        ],
        [
            'url' => '#',
            'label' => 'Link 4',
        ],
        [
            'url' => '#',
            'label' => 'Link 5',
        ],
    ];
@endphp

<nav class="lg:shadow-none" x-data="{ open: false }" :class="{ 'shadow-lg': open }">
    <div class="container flex flex-wrap items-center justify-between py-5 border-b">
        <a href="{{ route('pages.index') }}" class="inline-block">
            <img src="{{ asset('assets/images/logo.png') }}" class="block w-auto h-8" alt="">
            {{-- @svg('logo', 'block w-auto h-8') --}}
        </a>

        <div class="flex justify-end col-span-1 lg:hidden">
            <button class="p-4 focus:bg-gray-200 focus:outline-none" x-on:click="open = !open">
                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path :d="open
                        ? 'M10 8.6L2.9 1.5 1.5 2.9 8.6 10l-7.1 7.1 1.4 1.4 7.1-7.1 7.1 7.1 1.4-1.4-7.1-7.1 7.1-7.1-1.4-1.4L10 8.6z'
                        : 'M0 3h20v2H0zM0 9h20v2H0zM0 15h20v2H0z'" />
                </svg>
            </button>
        </div>

        <ul id="header-menu" class="items-center justify-end w-full col-span-4 pt-10 lg:pt-0 lg:w-auto lg:flex lg:col-span-9 lg:col-start-4"
            :class="{ 'hidden' : !open }" x-on:click.away="open = false">

            @foreach ($menuItems as $item)
                <li class="relative py-2 lg:ml-6">
                    <a class="py-2 rounded lg:px-3 hover:bg-gray-100 focus:bg-gray-200 focus:outline-none" href="{{ $item['url'] }}">{{ $item['label'] }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>

<aside class="container flex flex-wrap text-sm lg:justify-end">
    <div class="inline-flex items-end justify-between w-full py-5 border-b lg:w-auto">
        <span>Un proiect dezvoltat de</span>
        <a href="https://code4.ro" target="_blank" class="inline-block px-2">
            @svg('code4romania', 'block h-8 w-auto')
        </a>
    </div>
    <div class="inline-flex items-end justify-between w-full py-5 border-b lg:pl-4 lg:w-auto">
        <span>În parteneriat cu</span>
        <a href="https://www.gov.ro/" target="_blank" class="inline-block px-2">
            @svg('govro', 'block h-12 w-auto')
        </a>
    </div>
</aside>
