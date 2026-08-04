<section class="container-lux mt-16 md:mt-32 grid md:grid-cols-2 gap-10 md:gap-16 items-center">
    <div class="min-w-0">
        <p class="eyebrow">Investment Thesis</p>
        <h2 class="section-title-lux mt-4">Priced Below Comparable Singles.</h2>
        <p class="mt-6 text-muted-foreground leading-relaxed">
            Individual units in the Garages of America StarCreek community
            transact between <span class="text-foreground">$695,000 and $795,000</span>.
            This side-by-side pair — with the Left unit&apos;s premium upgrades
            and a fully connected floor plan — is offered at
            <span class="gold-text"> {{ $property['price_label'] }}</span> total.
        </p>
        <div class="mt-8 grid grid-cols-3 gap-2 sm:gap-4 stat-grid-tight">
            @foreach ([
                ['k' => '$485k', 'v' => 'Comp low'],
                ['k' => '$795k', 'v' => 'Comp high'],
                ['k' => '$1.28M', 'v' => 'Two singles'],
            ] as $stat)
                <div class="hairline p-3 sm:p-4 text-center min-w-0">
                    <p class="stat-value text-lg sm:text-xl gold-text font-display">{{ $stat['k'] }}</p>
                    <p class="stat-label text-[10px] uppercase tracking-[0.2em] text-muted-foreground mt-1">{{ $stat['v'] }}</p>
                </div>
            @endforeach
        </div>
        <a href="{{ Route::has('web.comparables') ? route('web.comparables') : '#' }}" class="btn-ghost-lux mt-8">
            See Comparables
        </a>
    </div>
    <div class="card-lux p-6 sm:p-8 md:p-10 min-w-0">
        <p class="text-xs uppercase tracking-[0.25em] text-muted-foreground">Package Pricing</p>
        <p class="package-price mt-3 gold-text font-display">{{ $property['price_label'] }}</p>
        <p class="mt-2 text-sm text-muted-foreground">For both units · offered directly by owner · no brokerage commission</p>
        <div class="gold-divider my-6"></div>
        <ul class="text-sm text-muted-foreground space-y-2">
            <li>· 60–90 days post-closing for relocation</li>
            <li>· All upgrades/paint approximately 1 year old</li>
            <li>· Original Right-unit staircase in storage, available</li>
        </ul>
        <a href="{{ Route::has('web.contact') ? route('web.contact') : '#' }}" class="btn-gold btn-gold-hover mt-8 w-full">
            Request Info Package
        </a>
    </div>
</section>
