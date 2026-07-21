@php
    $heroPhotos = collect($heroPhotos ?? $photos ?? [])->map(fn ($p) => [
        'key' => $p['key'] ?? null,
        'src' => $p['src'],
    ])->values();
@endphp

<section class="hero-lux">
    <div
        data-react-component="HeroReel"
        data-props='@json(['photos' => $heroPhotos])'
        class="absolute inset-0"
    ></div>

    <div class="container-lux relative z-10 pb-14 sm:pb-20 md:pb-28 pt-8 min-w-0">
        <p class="eyebrow fade-up">The Unicorn Opportunity</p>
        <h1 class="hero-title fade-up mt-4 sm:mt-6" style="animation-delay: .15s">
            Rare Side-by-Side <span class="gold-text">Luxury Garage Condo</span> Suites in Allen, Texas
        </h1>
        <p class="hero-lead fade-up mt-4 sm:mt-6 text-muted-foreground" style="animation-delay: .3s">
            2,930 sq ft of curated
        </p>
        <ul class="hero-points fade-up mt-5 sm:mt-6 max-w-2xl space-y-2.5 sm:space-y-3" style="animation-delay: .38s">
            @foreach ([
                'There are 2 side-by-side garage units.',
                'The project sold out in 2017.',
                'No side-by-side unit has been available since the original sellout.',
                'This is a rare opportunity for buyers/investors looking for larger, connected garage space.',
            ] as $point)
                <li class="flex items-start gap-3 text-sm sm:text-[0.95rem] text-muted-foreground leading-relaxed">
                    <span class="gold-text font-display leading-none mt-1 shrink-0" aria-hidden="true">✦</span>
                    <span>{{ $point }}</span>
                </li>
            @endforeach
        </ul>
        <div class="fade-up mt-8 sm:mt-10 flex flex-wrap items-start gap-6 sm:gap-8" style="animation-delay: .45s">
            <div class="min-w-0">
                <p class="text-xs uppercase tracking-[0.25em] text-muted-foreground">Offered At</p>
                <p class="hero-price gold-text font-display">{{ $property['price_label'] }}</p>
                <p class="text-[11px] uppercase tracking-[0.2em] text-muted-foreground">For the pair · No commission</p>
            </div>
            <div class="hero-actions flex flex-wrap gap-3 w-full sm:w-auto">
                <a href="{{ Route::has('web.contact') ? route('web.contact') : '#' }}" class="btn-gold btn-gold-hover">
                    Schedule a Private Tour
                </a>
                <a href="{{ Route::has('web.gallery') ? route('web.gallery') : '#' }}" class="btn-ghost-lux">
                    View Gallery
                </a>
            </div>
        </div>
    </div>

    <div class="absolute bottom-4 sm:bottom-6 inset-x-0 flex justify-center z-10 pointer-events-none">
        <div class="w-px h-10 sm:h-14 bg-gradient-to-b from-primary to-transparent"></div>
    </div>
</section>
