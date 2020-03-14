<div class="flex items-center my-6 border-b" x-data="share">
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
