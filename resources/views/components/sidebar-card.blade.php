<div class="">
    <div class="flex bg-gray-300">
        <i class="w-3 {{ $color['bg'] }}"></i>
        <h1 class="flex-1 px-4 py-6">{{ $model->title }}</h1>
    </div>

    @if ($model->description || ($model->link_button && $model->text_button))
        <div class="px-6 py-4 bg-gray-100">
            @if ($model->description)
                <div class="mb-4 rich-text">
                    {!! $model->description !!}
                </div>
            @endif

            @if ($model->link_button && $model->text_button)
                <a
                    href="{{ $model->link_button }}"
                    target="_blank"
                    rel="noopener"
                    class="block text-center tracking-wide py-2 px-4 hover:opacity-75 transition-opacity duration-100 focus:outline-none focus:shadow-outline rounded font-bold text-base w-full {{ $color['bg'] }} {{ $color['text'] }}"
                >
                    {{ $model->text_button }}
                </a>
            @endif
        </div>
    @endif
</div>

