@extends('screens.web.layouts.app')

@section('title', 'Location & Map — Dual Luxury Garage Condos, Allen TX')
@section('meta_description', 'Location of the Dual Luxury Garage Condos at '.config('property.address').'.')
@section('og_title', 'Location — Dual Luxury Garage Condos')
@section('canonical', route('web.map'))

@section('content')
    @include('screens.web.pages.map.sections.intro')
    @include('screens.web.pages.map.sections.map')
    @include('screens.web.pages.map.sections.info')
    @include('screens.web.partials.cta', [
        'eyebrow' => 'See It In Person',
        'title' => 'Private tours by appointment.',
        'body' => 'Meet the owner on-site for a curated 45–60 minute walk-through.',
    ])
@endsection
