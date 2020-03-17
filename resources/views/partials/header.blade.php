@php
    $menu = nova_get_menu('header');
@endphp

@include('partials.notice')

<nav class="lg:shadow-none" x-data="{ open: false }" :class="{ 'shadow-lg': open }">
    <div class="container flex flex-wrap items-center justify-between py-5 border-b">
        <a href="{{ route('pages.index') }}" class="inline-block focus:outline-none focus:shadow-outline">
            @svg('logo', 'block w-auto h-8')
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

            @foreach (($menu['menuItems'] ?? []) as $item)
                <li class="relative py-2 lg:ml-6">
                    @if ($item['type'] === 'text')
                        <span class="py-1 lg:px-3">{{ $item['name'] }}</span>
                    @else
                        <a
                            class="py-1 lg:px-3 hover:bg-gray-100 focus:outline-none focus:shadow-outline"
                            href="{{ $item['value'] }}"
                            target="{{ $item['target'] }}"
                        >
                            {{ $item['name'] }}
                        </a>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</nav>

<aside class="container flex flex-wrap text-sm lg:justify-end">
    <div class="inline-flex items-center justify-between w-full py-5 border-b lg:w-auto">
        <span>Un proiect dezvoltat de</span>
        <a href="https://code4.ro" target="_blank" rel="noopener" class="inline-block px-2 focus:outline-none focus:shadow-outline">
            @svg('code4romania', 'block w-auto h-8')
        </a>
    </div>
    <div class="inline-flex items-center justify-between w-full py-5 border-b lg:pl-4 lg:w-auto">
        <span>În parteneriat cu</span>
        <a href="https://www.gov.ro/" target="_blank" rel="noopener" class="inline-block px-2 focus:outline-none focus:shadow-outline">
            <img src="{{ asset('assets/images/gov.png') }}" class="block w-auto h-8 md:h-12" alt="">

        </a>
    </div>
</aside>
