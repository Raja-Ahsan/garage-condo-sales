@extends('screens.web.layouts.app')

@section('title', 'Genie GS-1930 Scissor Lift — Dual Luxury Garage Condos, Allen TX')
@section('meta_description', 'Refurbished Genie GS-1930 scissor lift bonus offer — platform, dimensions, and operational specifications.')
@section('og_title', 'Genie GS-1930 Scissor Lift')
@section('canonical', route('web.genie'))

@section('content')
    @include('screens.web.pages.genie-scissor-lift.sections.intro')
    @include('screens.web.pages.genie-scissor-lift.sections.specs')
    @include('screens.web.pages.genie-scissor-lift.sections.gallery')
    @include('screens.web.partials.cta', [
        'eyebrow' => 'Bonus Offer',
        'title' => 'Ask about the Genie GS-1930 with your cash closing.',
        'body' => 'Schedule a private tour to see the suite and discuss this refurbished scissor lift bonus.',
    ])
@endsection
