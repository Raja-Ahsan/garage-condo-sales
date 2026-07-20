@extends('screens.web.layouts.app')

@section('title', 'Comparables & Value — Dual Luxury Garage Condos, Allen TX')
@section('meta_description', 'How the '.$property['price_label'].' asking price compares to single-unit sales at Garages of America StarCreek.')
@section('og_title', 'Comparables — Dual Luxury Garage Condos')
@section('canonical', route('web.comparables'))

@section('content')
    @include('screens.web.pages.comparables.sections.intro')
    @include('screens.web.pages.comparables.sections.comp-cards')
    @include('screens.web.pages.comparables.sections.offering')
    @include('screens.web.pages.comparables.sections.premium')
    @include('screens.web.pages.comparables.sections.disclaimer')
    @include('screens.web.partials.cta', [
        'eyebrow' => 'Numbers Meet Reality',
        'title' => 'Walk the property yourself.',
        'body' => 'A private tour is the fastest way to understand what makes this pair unique.',
    ])
@endsection
