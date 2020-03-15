<div class="flex items-center justify-between my-6 border-b">
    <div x-data="share">
        <span class="mr-3">Share on</span>

        @foreach ($platforms as $platform)
            <button
                @click="popup('{{ $url }}', '{{ $platform['uri'] }}')"
                class="w-8 h-8 mx-1 my-2 rounded-full hover:opacity-75 focus:outline-none focus:shadow-outline"
            >
                @svg("icons/{$platform['id']}", 'w-full h-full')
            </button>
        @endforeach
    </div>

    @if ($downloadable)
        <a
            class="w-6 h-6 mx-1 my-2 rounded hover:opacity-75 focus:outline-none focus:shadow-outline"
            href="{{ route('download', ['uuid' => $downloadable]) }}"
            download
        >
            @svg('icons/pdf', 'w-full h-full')
        </a>
    @endif
</div>
