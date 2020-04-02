@php
    $query = $query ?? null;
    $type  = $type ?? 'news';
@endphp

<div class="">
    <form action="{{ route('search') }}" method="get" class="flex items-center border rounded-md border-cyan-500">
        <input
            type="text"
            name="query"
            @if ($query) value="{{ $query }}" @endif
            placeholder="{{ __('search.placeholder' )}}"
            minlength="3"
            class="flex-grow block w-full p-4 leading-tight appearance-none rounded-l-md focus:outline-none"
        >

        <input type="hidden" name="type" value="{{ $type }}" />

        <button type="submit" class="inline-flex p-4 ease-in-out rounded-r-md hover:text-cyan-500 focus:text-cyan-700 focus:outline-none focus:shadow-outline">
            @svg('icons/search', 'w-5 h-5')
        </button>
    </form>
</div>
