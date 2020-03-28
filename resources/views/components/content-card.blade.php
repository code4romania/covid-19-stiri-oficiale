<article class="flex bg-gray-300">
    <i class="px-4 py-5 bg-blue-200"></i>
    <div class="flex-1 px-8 py-5">
        <div class="flex flex-wrap items-center justify-between mb-2">
            <div>
                <time
                    class="my-1 mr-4 text-sm tracking-wide text-gray-700"
                    datetime="{{ $model->created_at->toIso8601String() }}"
                >
                    <span class="font-normal uppercase">
                        {{ $model->created_at->isoFormat('D MMMM Y') }}
                    </span>
                    <strong class="font-semibold">
                        {{ $model->created_at->isoFormat('HH:mm') }}
                    </strong>
                </time>

                <span
                    class="inline-block px-3 py-1 text-xs text-center rounded"
                    style="background-color: {{ $model->institution->color }}"
                >
                    {{ $model->institution->name }}
                </span>
            </div>

            @if ($model->tags)
                <div>
                    @foreach ($model->tags as $tag)
                        <span class="inline-block px-2 text-xs text-center bg-gray-100 rounded">{{ $tag->name }}</span>
                    @endforeach
                </div>
            @endif
        </div>

        @if ($model->updated_at->greaterThan($model->created_at))
            <div class="flex flex-wrap items-center mb-2">
                <time
                class="my-1 mr-4 text-sm tracking-wide text-gray-700"
                datetime="{{ $model->updated_at->toIso8601String() }}"
                >
                    <span>Actualizat la: </span>
                    <span class="font-normal uppercase">
                        {{ $model->updated_at->isoFormat('D MMMM Y') }}
                    </span>
                    <strong class="font-semibold">
                        {{ $model->updated_at->isoFormat('HH:mm') }}
                    </strong>
                </time>
            </div>
        @endif

        <h1 class="mb-4 font-semibold">
            @if ($readMore)
                <a href="{{ route($route, ['slug' => $model->slug]) }}" class="inline-block underline hover:no-underline">
                    {{ $model->title }}
                </a>
            @else
                {{ $model->title }}
            @endif
        </h1>

        <div class="rich-text break-words">
            {!! $model->short_content !!}
        </div>

        @if ($readMore)
            <div class="mt-4 text-right">
                <a
                    href="{{ route($route, ['slug' => $model->slug]) }}"
                    class="text-base font-normal text-blue-500 underline focus:outline-none focus:shadow-outline hover:no-underline"
                >
                    Citește mai mult
                </a>
            </div>
        @endif
    </div>
</article>
