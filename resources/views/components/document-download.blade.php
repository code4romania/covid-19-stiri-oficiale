@if ($url)
    <div class="flex justify-end my-6">
        <a
            class="flex items-center px-4 py-2 text-base duration-75 bg-gray-300 rounded transition-color hover:bg-blue-100 focus:outline-none focus:ring"
            href="{{ $url }}"
            download
        >
            <span>{{ __('content.download.document') }}</span>
            @svg('icons/pdf', 'w-5 h-5 ml-2')
        </a>
    </div>
@endif
