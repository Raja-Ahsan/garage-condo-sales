<section class="container-lux mt-16 md:mt-28 grid md:grid-cols-12 gap-8 md:gap-12 items-start">
    <div class="md:col-span-5 min-w-0">
        <p class="eyebrow">Property Overview</p>
        <h2 class="section-title-lux mt-4 md:mt-6">The Unicorn Opportunity.</h2>
        <div class="gold-divider my-6 md:my-8 max-w-[120px]"></div>
        <p class="text-muted-foreground leading-relaxed">
            Two side-by-side units, connected upstairs and down, totaling
            approximately <strong class="text-foreground">2,930 sq ft</strong> at
            the widest point of 42.5&apos;. A one-of-one footprint in a community
            where singles rarely trade — and pairs are effectively unheard of.
        </p>
        <p class="mt-4 text-muted-foreground leading-relaxed">
            Fully upgraded within the last year: fresh paint, abundant LED,
            72&quot; industrial fans, tankless water, full kitchen, private baths,
            finished lofts and hardwired data throughout.
        </p>
        <a href="{{ Route::has('web.specifications') ? route('web.specifications') : '#' }}" class="btn-ghost-lux mt-8">
            Full Specifications
        </a>
    </div>
    <div class="md:col-span-7 grid grid-cols-2 gap-3 sm:gap-4 min-w-0">
        @foreach ([
            ['k' => '2,930', 'v' => 'Total sq ft'],
            ['k' => '2', 'v' => 'Connected units'],
            ['k' => "24–26'", 'v' => 'Ceiling heights'],
            ['k' => '3', 'v' => 'Finished lofts'],
        ] as $stat)
            <div class="card-lux p-4 sm:p-6 md:p-8 min-w-0">
                <p class="text-3xl sm:text-4xl md:text-5xl gold-text font-display">{{ $stat['k'] }}</p>
                <p class="mt-2 text-[10px] sm:text-xs uppercase tracking-[0.2em] sm:tracking-[0.25em] text-muted-foreground">{{ $stat['v'] }}</p>
            </div>
        @endforeach
    </div>
</section>
