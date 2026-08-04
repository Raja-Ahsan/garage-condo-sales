@extends('screens.web.layouts.app')

@section('title', 'Gallery — Dual Luxury Garage Condos, Allen TX')
@section('meta_description', 'Photo gallery of the Dual Luxury Garage Condo suites in Allen, Texas — interiors, lofts, and finishes.')
@section('og_title', 'Gallery — Dual Luxury Garage Condos')
@section('canonical', route('web.gallery'))

@section('content')
    @include('screens.web.pages.gallery.sections.intro')
    @include('screens.web.pages.gallery.sections.grid')
    @include('screens.web.partials.cta', [
        'eyebrow' => 'See It In Person',
        'title' => 'Photos tell part of the story. A tour tells the rest.',
        'body' => 'Schedule a private walk-through to experience the connected suites in person.',
    ])
@endsection
