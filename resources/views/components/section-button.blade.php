<a href="{{ $url }}" class="flex hover:bg-blue-200 focus:shadow-outline focus:outline-none {{ $active ? 'bg-blue-200' : 'bg-gray-300' }}">
    <i class="px-4 py-5 bg-blue-200 {{ $active ? 'text-blue-500' : 'text-white' }}">
        @svg('icons/check', 'w-5')
    </i>
    <div class="flex-1 p-4 font-normal {{ $active ? 'text-blue-500' : 'text-black' }}">
        {{ $label }}
    </div>
</a>
