@include('screens.web.partials.page-banner', [
    'eyebrow' => 'Exclusive Showcase',
    'titleHtml' => 'Bentley <span class="gold-text">promotion</span>',
    'description' => 'Museum Quality Bentley Mulsanne w/MSRP $369,290.00 available,
    with accepted full price, cash at closing, transaction. w/ Additional Bonus Refurbished Genie GS-1930 Scissor Lift.',
])

<div class="container-lux mt-6 sm:mt-8">
    <a
        href="{{ Route::has('web.genie') ? route('web.genie') : '#' }}"
        class="btn-gold btn-gold-hover inline-flex"
    >
        Double Bonus
    </a>
</div>
