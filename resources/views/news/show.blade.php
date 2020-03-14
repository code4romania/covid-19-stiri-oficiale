@php
    $item = [
        'date' => \Carbon\Carbon::now(),
        'title' => 'Apel de la Guvernul României. Ce trebuie să facă cetățenii când primesc mesaje pe Facebook și WhatsApp despre coronavirus',
        'excerpt' => 'Guvernul României face apel la cetățenii români, prin intermediul unui clip video postat pe rețelele de socializare, să se informeze despre coronavirus doar din surse oficiale și să nu creadă orice informație venită prin intermediul Facebook sau WhatsApp.',
    ];
@endphp

@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.section-header')

        <div class="grid gap-12 py-16 lg:grid-cols-3">
            <section class="lg:col-span-2">
                <h1 class="mb-4 text-lg font-normal leading-tight lg:text-2xl xl:text-3xl">
                    Ultimele informații oficiale
                </h1>

                <x-content-card :card="$item" :read-more="false" />


                <div class="my-8 rich-text">
                    <p>A fost aprobată suspendarea procesului de învățământ în unitățile școlare din învățământul preșcolar, gimnazial, liceal, postliceal și profesional, în perioada 11-22 martie a.c., cu posibilitatea prelungirii acestei măsuri în funcție de situație.</p>

                    <p>A fost aprobată suspendarea transportului rutier de persoane pentru toate cursele înspre și dinspre Italia. Măsura este valabilă de astăzi, 10 martie până pe 31 martie 2020.</p>

                    <p>De asemenea, începând cu data de 12 martie și până la 31 martie a.c. sunt suspendate transporturile feroviare către și dinspre Italia.</p>

                    <p>Sunt sistate programele de studii de tip schimb de experiență și stagii de practică în spitale ale studenților și cursanților școlilor postliceale sanitare, dacă nu au fost începute înainte de 9 martie a.c.</p>

                    <p>A fost instituită obligația pentru unitățile de alimentație, precum și pentru furnizorii publici și privați de transport persoane, de a dezinfecta suprafețele frecvent, de a evita aglomerația de persoane în spațiile comerciale, de a dezinfecta frecvent habitaclul în mijloacele de transport.</p>

                    <p>Pentru evenimentele cu un număr de maxim 200 de participanți, nu este necesar să fie solicitat avizul direcției de sănătate publică.</p>

                    <p>Instituțiile publice și private vor analiza posibilitatea ca o parte din personal să-și poată desfășura atribuțiile de serviciu de la domiciliu.</p>

                    <p>Până astăzi, 10 martie, la nivel național au fost confirmate 17 cazuri de cetățeni infectați cu virusul COVID – 19 (coronavirus) pe teritoriul României.</p>
                </div>
            </section>

            @include('partials.sidebar')
        </div>
    </div>
@endsection



