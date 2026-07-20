<section class="container-lux mt-16 md:mt-32">
    <div class="flex items-end justify-between flex-wrap gap-6">
        <div class="min-w-0">
            <p class="eyebrow">Signature Features</p>
            <h2 class="section-title-lux mt-4">Built for the Way You Live &amp; Collect</h2>
        </div>
        <p class="max-w-md text-muted-foreground">
            Every square foot is intentional — from commercial roll-ups to
            architect-detailed lofts.
        </p>
    </div>
    <div class="mt-8 md:mt-12 grid md:grid-cols-3 gap-4 md:gap-6">
        @foreach ([
            ['t' => 'Commercial Roll-Ups', 'd' => "12'×12' and 12'×15' electric commercial doors — clearance for lifted trucks, exotics and enclosed trailers."],
            ['t' => 'Finished Lofts', 'd' => "Three finished lofts including private offices, split-level lounge and a 6'×4' picture window."],
            ['t' => 'Full Kitchen & Baths', 'd' => 'Stone vanities, glass-enclosed shower, tankless water heaters, and a full working kitchen with pantry.'],
            ['t' => 'Industrial HVAC', 'd' => 'Excellent climate control with 72" industrial ceiling fans and remote — comfortable year-round in Texas.'],
            ['t' => 'Hardwired Infrastructure', 'd' => 'Upgraded electrical, WiFi, landlines and hardwired internet for shop, studio or home-office use.'],
            ['t' => 'Connected Suites', 'd' => "Two 3'×6'8\" steel passage doors with keypad locks — one upper, one lower — quietly join both units."],
        ] as $feature)
            <div class="card-lux p-6 sm:p-8 group min-w-0">
                <div class="w-10 h-10 hairline grid place-items-center mb-6">
                    <span class="gold-text font-display">✦</span>
                </div>
                <h3 class="text-xl">{{ $feature['t'] }}</h3>
                <p class="mt-3 text-sm text-muted-foreground leading-relaxed">{{ $feature['d'] }}</p>
            </div>
        @endforeach
    </div>
</section>
