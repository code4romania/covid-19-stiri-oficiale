@php
    // TODO: replace with actual menu data
    $menus = [
        [
            'name' => 'Link-uri utile',
            'items' => [
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
            ],
        ],
        [
            'name' => 'Link-uri utile',
            'items' => [
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
            ],
        ],
    ];
@endphp

<footer class="text-blue-100 bg-blue-500">
    <div class="container grid row-gap-10 col-gap-6 py-12 lg:py-24 lg:grid-cols-2">
        <div class="flex flex-wrap">
            @foreach ($menus as $menu)
                <ul class="w-full py-5 md:w-1/2 md:px-3 md:py-0">
                    <li class="mb-4 font-bold tracking-wide">
                        {{ $menu['name'] }}
                    </li>

                    @foreach ($menu['items'] as $item)
                        <li class="mt-2">
                            <a
                                class="focus:outline-none focus:shadow-outline hover:underline"
                                href="{{ $item['url'] }}"
                            >{{ $item['label'] }}</a>
                        </li>
                    @endforeach
                </ul>
            @endforeach
        </div>
        <div class="tracking-wide lg:text-right">
            <a href="https://code4.ro/ro/" class="inline-block mb-4 focus:outline-none focus:shadow-outline">
                @svg('code4romania-gray', 'h-10')
            </a>

            <p>© 2019 Code for Romania.</p>
            <p>Organizație neguvernamentală independentă, neafiliată politic și apolitică.</p>
        </div>
    </div>
</footer>
