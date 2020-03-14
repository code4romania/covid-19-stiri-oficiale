@if ($paginator->hasPages())
    <nav class="flex items-center justify-between px-4 font-medium leading-5 text-gray-700 border-t border-gray-200 md:text-sm sm:px-0">
        {{-- Previous Page Link --}}
        <div class="flex flex-1 w-0">
            @if (!$paginator->onFirstPage())
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="inline-flex items-center py-4 pr-1 -mt-px border-t-2 border-transparent hover:text-gray-900 hover:border-blue-300 focus:outline-none focus:text-gray-700 focus:border-gray-400">
                    @lang('pagination.previous')
                </a>
            @endif
        </div>


        <div class="hidden md:flex">
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="inline-flex items-center p-4 -mt-px border-t-2 border-transparent">
                        {{ $element }}
                    </span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="inline-flex items-center p-4 -mt-px font-semibold text-blue-500 border-t-2 border-blue-500">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" class="inline-flex items-center p-4 -mt-px border-t-2 border-transparent hover:text-gray-900 hover:border-blue-300 focus:outline-none focus:border-blue-400">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Next Page Link --}}
        <div class="flex justify-end flex-1 w-0">
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="prev" class="inline-flex items-center py-4 pr-1 -mt-px border-t-2 border-transparent hover:text-gray-900 hover:border-blue-300 focus:outline-none focus:text-gray-700 focus:border-gray-400">
                    @lang('pagination.next')
                </a>
            @endif
        </div>
    </nav>
@endif
