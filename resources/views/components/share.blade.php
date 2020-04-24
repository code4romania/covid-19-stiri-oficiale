<div class="flex items-center justify-between my-6 border-b">
    <div x-data="share">
        <span class="mr-3">{{ __('share.share') }}</span>

        @foreach ($platforms as $platform)
            <button
                @click="popup('{{ $url }}', '{{ $platform['uri'] }}')"
                class="w-8 h-8 mx-1 my-2 rounded-full hover:opacity-75 focus:outline-none focus:shadow-outline"
                aria-label="{{ __('share.platform', ['platform' => ucfirst($platform['id']) ]) }}"
            >
                @svg("icons/{$platform['id']}", 'w-full h-full')
            </button>
        @endforeach
    </div>
</div>
