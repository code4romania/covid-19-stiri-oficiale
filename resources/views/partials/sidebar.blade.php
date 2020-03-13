@php
    $cards = [
        [
            'type' => 'teal',
            'title' => 'Instalează-ți add-on-ul de depistat știrile false',
        ],
        [
            'type' => 'yellow',
            'title' => 'Află ce ai de făcut în orice situație',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Elit, duis pretium.',
            'button' => [
                'label' => 'Cele mai noi informații oficiale',
                'url' => '#',
            ],
        ],
        [
            'type' => 'red',
            'title' => 'Vrei să ajuți. Intră aici',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Elit, duis pretium.',
            'button' => [
                'label' => 'Centrul de sprijin',
                'url' => '#',
            ],
        ],
        [
            'type' => 'pink',
            'title' => 'Date în timp real',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Elit, duis pretium.',
            'button' => [
                'label' => 'Vezi situația curentă',
                'url' => '#',
            ],
        ],
    ];
@endphp

<aside>
    <h1 class="mb-4 text-lg font-normal leading-tight lg:text-2xl xl:text-3xl">
        Instrumente utile
    </h1>

    <div class="grid row-gap-8">
        @foreach ($cards as $card)
            <x-sidebar-card :card="$card" />
        @endforeach
    </div>
</aside>
