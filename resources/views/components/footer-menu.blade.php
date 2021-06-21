<nav class="flex flex-wrap">
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
</nav>
