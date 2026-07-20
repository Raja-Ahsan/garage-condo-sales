<section class="container-lux mt-16 md:mt-32">
    <p class="eyebrow">Lifestyle</p>
    <h2 class="section-title-lux mt-4 max-w-2xl">More Than a Garage. A Private Chapter of Your Life.</h2>
    <div class="mt-8 md:mt-12 grid sm:grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
        @foreach ([
            ["Collector's Vault", 'Climate-controlled, secure display for exotics, classics and race cars.'],
            ['Executive Retreat', 'A private office and lounge above the shop — miles from the noise.'],
            ['Workshop & Studio', 'Wired for pro-grade tools, media production, restoration or fabrication.'],
            ["Legacy Asset", "Rare commercial condo pair in North Dallas' fastest-appreciating corridor."],
        ] as [$title, $desc])
            <div class="p-6 hairline">
                <h3 class="text-lg">{{ $title }}</h3>
                <p class="mt-3 text-sm text-muted-foreground leading-relaxed">{{ $desc }}</p>
            </div>
        @endforeach
    </div>
</section>
