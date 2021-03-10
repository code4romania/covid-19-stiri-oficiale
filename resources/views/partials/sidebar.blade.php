<aside>
    <h1 class="flex items-center mb-4 text-lg font-normal leading-tight lg:text-2xl xl:text-3xl">
        @svg('icons/covid-all', 'w-6 h-6 mr-2')
        <span>Instrumente utile</span>
    </h1>

    <div class="grid gap-y-8">
        @include('search.form')

        @foreach (\App\SidebarItem::ordered()->get() as $card)
            <x-sidebar-card :item="$card" />
        @endforeach

        @include('partials.newsletter')
    </div>
</aside>
