@extends('screens.web.layouts.app')

@section('title', 'Specifications — Dual Luxury Garage Condos, Allen TX')
@section('meta_description', 'Full architectural and mechanical specifications for both side-by-side garage condo suites in Allen, Texas.')
@section('og_title', 'Specifications — Dual Luxury Garage Condos')
@section('canonical', route('web.specifications'))

@section('content')
    @include('screens.web.pages.specifications.sections.intro')
    @include('screens.web.pages.specifications.sections.units')
    @include('screens.web.pages.specifications.sections.additional')
    @include('screens.web.partials.cta', [
        'eyebrow' => 'Terms',
        'title' => 'Package sale · Direct from owner',
        'body' => 'Both units offered as a package at '.$property['price_label'].' 30 days, cash at closing. Subject to change without notice.',
    ])
@endsection
