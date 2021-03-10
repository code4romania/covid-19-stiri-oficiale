<nav class="grid grid-cols-2 gap-x-6 mt-12 mb-6 leading-tight">
    <div class="flex justify-start text-left">
        @if ($item->previous())
            <a class="flex focus:outline-none focus:ring" rel="prev" href="{{ route($route, $item->previous()->slug) }}" title="{{ $item->previous()->title }}">
                <i class="mr-2" aria-hidden="true">&larr;</i>
                <span class="inline-block text-base ">{{ $item->previous()->title }}</span>
            </a>
        @endif
    </div>

    <div class="flex justify-end text-right">
        @if ($item->next())
            <a class="flex focus:outline-none focus:ring" rel="next" href="{{  route($route, $item->next()->slug) }}" title="{{ $item->next()->title }}">
                <span class="inline-block text-base ">{{ $item->next()->title }}</span>
                <i class="ml-2" aria-hidden="true">&rarr;</i>
            </a>
        @endif
    </div>
</nav>
