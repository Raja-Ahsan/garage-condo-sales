@extends('screens.web.layouts.app')

@section('title', 'Bentley Promotion — Dual Luxury Garage Condos, Allen TX')
@section('meta_description', 'Bentley promotion showcase for the Dual Luxury Garage Condos in Allen, Texas — exclusive imagery and details.')
@section('og_title', 'Bentley Promotion — Dual Luxury Garage Condos')
@section('canonical', route('web.bentley'))

@section('content')
    @include('screens.web.pages.bentley-promotion.sections.intro')
    @include('screens.web.pages.bentley-promotion.sections.dimensions')
    @include('screens.web.pages.bentley-promotion.sections.gallery')
    @include('screens.web.pages.bentley-promotion.sections.double-bonus')
    @include('screens.web.partials.cta', [
        'eyebrow' => 'Private Showings',
        'title' => 'Experience the Bentley showcase in person.',
        'body' => 'Call to Schedule to see the suite and discuss this exclusive promotion.',
    ])
@endsection
