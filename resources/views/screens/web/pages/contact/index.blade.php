@extends('screens.web.layouts.app')

@section('title', 'Contact & Private Tours — Dual Luxury Garage Condos, Allen TX')
@section('meta_description', 'Book a private consultation or tour of the Dual Luxury Garage Condos in Allen, Texas.')
@section('og_title', 'Book a Private Tour — Dual Luxury Garage Condos')
@section('canonical', route('web.contact'))

@section('content')
    @include('screens.web.pages.contact.sections.inquiry')
    @include('screens.web.pages.contact.sections.map')
@endsection
