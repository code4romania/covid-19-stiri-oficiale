@php
    $menus = [
        nova_get_menu_by_slug('footer1'),
        nova_get_menu_by_slug('footer2'),
    ];
@endphp

<aside class="container flex flex-wrap text-sm lg:justify-end">
    <div class="inline-flex items-center justify-between w-full py-5 lg:w-auto">
        <span>proiect dezvoltat în programul</span>
        <a href="https://code4.ro" target="_blank" rel="noopener" class="inline-block px-2 ml-4 focus:outline-none focus:shadow-outline">
            @svg('code4romania-taskforce', 'block h-10 w-auto')
        </a>
    </div>
</aside>


<footer class="text-blue-100 bg-blue-500">
    <div class="container grid items-end gap-y-10 gap-x-6 py-12 lg:py-24 lg:grid-cols-2">
        <div class="flex flex-wrap">
            @foreach ($menus as $menu)
                @continue(is_null($menu))
                <ul class="w-full py-5 md:w-1/2 md:px-3 md:py-0">
                    <li class="mb-4 font-bold tracking-wide">
                        {{ $menu['name'] }}
                    </li>

                    @foreach (($menu['menuItems'] ?? []) as $item)
                        <li>
                            @if ($item['type'] === 'text')
                                <span>{{ $item['name'] }}</span>
                            @else
                                <a
                                    class="focus:outline-none focus:shadow-outline hover:underline"
                                    href="{{ $item['value'] }}"
                                    target="{{ $item['target'] }}"
                                    @if ($item['target'] === '_blank') rel="noopener" @endif
                                >{{ $item['name'] }}</a>
                            @endif
                        </li>
                    @endforeach
                </ul>
            @endforeach
        </div>
        <div class="tracking-wide lg:text-right">
            <a href="https://code4.ro/ro/" class="inline-block mb-4 focus:outline-none focus:shadow-outline">
                @svg('code4romania-gray', 'h-10')
            </a>

            <p>&copy; 2020 Code for Romania.</p>
            <p>Organizație neguvernamentală independentă, neafiliată politic și apolitică.</p>
        </div>
    </div>
</footer>
