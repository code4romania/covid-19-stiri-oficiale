@extends('layouts.app')

@section('content')
    <div class="container">
        <x-section-header
            title="Informații din surse sigure de informare"
            text="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dignissim auctor bibendum sit in amet duis pellentesque lorem. Euismod est non et tincidunt amet, amet, lectus nec, vestibulum. At turpis imperdiet adipiscing volutpat aliquam. Varius non, nisl massa tincidunt cursus dignissim nulla. Mauris pharetra, ultrices tortor suspendisse. Vitae eu, purus enim egestas. Proin arcu bibendum sapien, velit dictumst velit felis."
        >
            <x-section-button label="Ultimele informații oficiale" url="#blog" />
            <x-section-button label="Hotarări și legislație" url="#legal" />
            <x-section-button label="Înregistrări video" url="#video" />
        </x-section-header>
    </div>
@endsection
