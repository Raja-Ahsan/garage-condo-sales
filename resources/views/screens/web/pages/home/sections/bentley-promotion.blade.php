@php
    $bentleyImages = [
        [
            'src' => asset('images/bentleypromotion/IMG_0363.JPG'),
            'alt' => 'Bentley promotion — suite interior',
        ],
        [
            'src' => asset('images/bentleypromotion/IMG_0361.JPG'),
            'alt' => 'Bentley promotion — loft overlook',
        ],
    ];
@endphp

<section class="container-lux mt-16 md:mt-28 grid md:grid-cols-12 gap-8 md:gap-12 items-start">
    <div class="md:col-span-5 min-w-0">
        <p class="eyebrow">Exclusive Showcase</p>
        <h2 class="section-title-lux mt-4 md:mt-6">
            Bentley <span class="gold-text">promotion</span>
        </h2>
        <div class="gold-divider my-6 md:my-8 max-w-[120px]"></div>
        <p class="text-muted-foreground leading-relaxed">
        Museum Quality Bentley Mulsanne w/MSRP $369,290.00 available,
        with accepted full price, cash at closing, transaction. 
        </p>
        <p class="mt-4 text-muted-foreground leading-relaxed">
        w/ Additional Bonus Refurbished Genie GS-1930 Scissor Lift.
    
        </p>
        <a href="{{ Route::has('web.bentley') ? route('web.bentley') : '#' }}" class="btn-ghost-lux mt-8">
            View Details
        </a>
    </div>
    <div class="md:col-span-7 grid grid-cols-2 gap-3 sm:gap-4 min-w-0">
        @foreach ($bentleyImages as $image)
            <div class="aspect-[4/3] overflow-hidden group min-w-0">
                <img
                    src="{{ $image['src'] }}"
                    alt="{{ $image['alt'] }}"
                    loading="lazy"
                    class="w-full h-full object-cover transition-transform duration-[1200ms] group-hover:scale-110"
                >
            </div>
        @endforeach
    </div>
</section>

<div class="container-lux mt-10 grid md:grid-cols-2 gap-3">
    <div class="aspect-[16/7] hairline grid place-items-center text-center p-8 bg-surface/40">
        <div>
            <p class="eyebrow justify-center">Coming Soon</p>
            <p class="mt-3 text-lg text-muted-foreground">Bentley in-suite showcase photography</p>
        </div>
    </div>
    <div class="aspect-[16/7] hairline grid place-items-center text-center p-8 bg-surface/40">
        <div>
            <p class="eyebrow justify-center">Coming Soon</p>
            <p class="mt-3 text-lg text-muted-foreground">Scissor lift &amp; service bay photography</p>
        </div>
    </div>
</div>
