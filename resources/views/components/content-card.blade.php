<article class="flex bg-gray-300">
    <i class="px-4 py-5 bg-blue-200"></i>
    <div class="flex-1 p-4">
        <div class="flex items-center mb-2">
            <time
                class="mb-2 mr-4 text-sm tracking-wide text-gray-700"
                datetime="{{ $card['date']->toIso8601String() }}"
            >
                <span class="font-normal uppercase">
                    {{ $card['date']->isoFormat('d MMMM Y') }}
                </span>
                <strong class="font-semibold">
                    {{ $card['date']->isoFormat('HH:mm') }}
                </strong>
            </time>

            <span class="inline-block px-3 py-1 text-xs text-center bg-blue-300 rounded">
                Departamentul pentru situații de urgență
            </span>
        </div>

        <h1 class="mb-4 font-normal">{{ $card['title'] }}</h1>

        <p class="text-base">{{ $card['excerpt'] }}</p>

        @if ($readMore)
            <div class="mt-4 text-right">
                <a
                    href="{{ $card['url'] }}"
                    class="text-base font-normal text-blue-500 underline focus:outline-none focus:shadow-outline hover:no-underline"
                >
                    Citește mai mult
                </a>
            </div>
        @endif
    </div>
</article>
