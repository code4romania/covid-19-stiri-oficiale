
<x-header-menu />

<aside class="container flex flex-wrap text-sm lg:justify-end">
    <div class="inline-flex items-center justify-between w-full py-5 border-b lg:w-auto">
        <span>Un proiect în parteneriat cu</span>
        <div class="flex items-center">
            <a href="https://www.gov.ro/" target="_blank" rel="noopener" class="inline-block px-2 focus:outline-none focus:ring">
                <img src="{{ asset('assets/images/gov.png') }}" class="block w-auto h-8" alt="">
            </a>
            <a href="http://www.dsu.mai.gov.ro/" target="_blank" rel="noopener" class="inline-block px-2 focus:outline-none focus:ring">
                <img src="{{ asset('assets/images/dsu.png') }}" class="block w-auto h-6 sm:h-8" alt="">
            </a>
        </div>
    </div>
    <div class="inline-flex items-center justify-between w-full py-5 border-b lg:pl-4 lg:w-auto">
        <span>realizat de</span>
        <a href="https://code4.ro" target="_blank" rel="noopener" class="inline-block px-2 focus:outline-none focus:ring">
            @svg('code4romania', 'block w-auto h-8')
        </a>
    </div>
</aside>
