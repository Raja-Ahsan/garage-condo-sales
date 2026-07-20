@extends('screens.web.layouts.app')

@section('title', 'Dual Luxury Garage Condos · Allen TX — Side-by-Side Suites')
@section('canonical', url('/'))

@section('content')
    @include('screens.web.pages.home.sections.hero')
    @include('screens.web.pages.home.sections.overview')
    @include('screens.web.pages.home.sections.highlights')
    @include('screens.web.pages.home.sections.units')
    @include('screens.web.pages.home.sections.gallery-teaser')
    @include('screens.web.pages.home.sections.investment')
    @include('screens.web.pages.home.sections.lifestyle')
    @include('screens.web.pages.home.sections.credibility')
    @include('screens.web.partials.cta')
@endsection
