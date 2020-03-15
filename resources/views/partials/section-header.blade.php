<div>
    <h1 class="flex items-center mb-4 text-xl font-normal leading-tight lg:text-3xl xl:text-4xl">
        @svg('icons/covid-all', 'w-8 h-8 mr-3')
        <span>Informații din surse sigure</span>
    </h1>
    <p class="mb-6">
        O sursă de informare corectă, nealimentată de panică poate ajuta populația României să fie vigilentă în felul în care accesează, asimilează și distribuie rafalele de știri prezentate în media. Informați-vă doar din canalele media oficiale și verificați informațiile de fiecare.</p>
    <p class="mb-6">
        Acest proiect este realizat pro-bono de voluntarii Code for Romania, organizație neguvernamentală independentă, neafiliată politic și apolitică, în cadrul Code for Romania Task Force și în parteneriat cu Guvernul României prin Autoritatea pentru Digitalizarea României.
    </p>

    <div class="grid gap-4 lg:grid-cols-3">
        <x-section-button label="Ultimele informații oficiale" route="news.index" />
        <x-section-button label="Hotărâri și legislație" route="decisions.index" />
        <x-section-button label="Înregistrări video" route="videos.index" />
    </div>
</div>
